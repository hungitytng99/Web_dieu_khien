<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Cookie;
use \DB;

class UserController extends Controller{

public function __construct() {
        @session_start();        
}    
public function postlogin(Request $request){
        $username=$request->username;
        $password=$request->password;
        if(empty($username)||empty($password))
            return redirect()->action('LoginController@login')->with('error', 'Login failed! User account or password not null'); 
        $admin=DB::table('admin') 
            ->where('username','like',$username)
            ->get();
        foreach ($admin as $value) {
            # code...
            if(Hash::check($password, $value->password)){
                $id=$value->id;
                //Session::put('login', true);
                //Session::push('user.id', $id);
                Cookie::queue("table", 'admin', 365*24*60);
                Cookie::queue("ID", $id, 365*24*60);
                //Cookie::queue("login", true, 365*24*60);
                
                return redirect()->action('HomeController@homead'); 
                break; 
            }
        } 
        
        $user=DB::table('users') 
        	->where('username','like',$username)
        	->get();
        foreach ($user as $value) {
        	# code...
        	if(Hash::check($password, $value->password)){

                
                $id=$value->id;
                if($value->google2fa_secret!=NULL){
                    // return view('login',compact('id'));
                    return redirect()->action('UserController@one_time_password', ['id' => $id]);

                } else {
                    //Session::push('user.id', $id);
                    Cookie::queue("table", 'user', 365*24*60);
                    Cookie::queue("ID", $id, 365*24*60);
                    return redirect()->action('HomeController@home', ['id' => $id]);
                }
                //return redirect()->action('LoginController@index', ['id' => $id]);    
        	}
        	
        }


    return redirect()->action('LoginController@login')->with('error', 'Login failed! User account or password incorrect.');   
               
}

public function one_time_password($id){
        //return view('login',compact('id'));
        return view('google2fa.googlef2a_index',compact('id'));

    }

public function post_one_time_password(Request $request,$id){
    $key=$request->one_time_password;
    
    $user=DB::table('users') 
        ->where('id',$id)
        ->first();
    //dd($user->google2fa_secret);
    $google2fa = app('pragmarx.google2fa');
    $valid = $google2fa->verifyKey($user->google2fa_secret, $key);
    //dd($valid);
    if($valid==true){
        Session::push('user.id', $id);
        Cookie::queue("ID", $id, 365*24*60);
        return redirect()->action('HomeController@home', ['id' => $id]);
    }else{
        //dd("run2");
        return redirect()->action('LoginController@login')->with('error', 'Login failed! One time password incorrect.');
    }
    

}

public function postregister(Request $request){
    DB::table('users')
        ->insert(
            [ 'username'=>$request->username,
            'fullname'=>$request->fullname ,
            'email'=>$request->email ,
            'password'=>Hash::make($request->password)]);
        return redirect()->action('LoginController@login');
}

protected function create(array $data)
    {
        return User::create([
            'username'=>$request->username,
            'fullname'=>$request->fullname ,
            'email'=>$request->email ,
            'password'=>Hash::make($request->password),
            'google2fa_secret' => $data['google2fa_secret'],
        ]);
    }

protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

use RegistersUsers {
     // change the name of the name of the trait's method in this class
     // so it does not clash with our own register method
        register as registration;
    }

public function register(Request $request)
    {

        //Validate the incoming request using the already included validator method
        $this->validator($request->all());

        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');
        //dd($google2fa->generateSecretKey());

        // Save the registration data in an array
        $registration_data = $request->all();
        //dd($registration_data['email']);

        // Add the secret key to the registration data
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

        // Save the registration data to the user session for just the next request
        $request->session()->flash('registration_data', $registration_data);

        // Generate the QR image. This is the image the user will scan with their app
     // to set up two factor authentication
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );
        //dd($registration_data);
        // Pass the QR barcode image to our view
        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    }



public function logout(){
    
    $id=Cookie::get('ID');  
    
    //Session::pull('user.id', $id);
    Cookie::queue("login", false, 365*24*60);
    // dd(Session::get('login'));
    Cookie::forget('ID');
    Cookie::forget('table');
    Cookie::queue("ID", null, 365*24*60);
    Cookie::queue("table", null, 365*24*60);
    //dd(Session::get('ID'));
    return redirect()->action('LoginController@login');
}
}
?>
