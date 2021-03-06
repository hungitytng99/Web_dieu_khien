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

class GoogleAuthController extends Controller{
	public function one_time_password($id){
        //return view('login',compact('id'));
        return view('google2fa.googlef2a_index',compact('id'));

    }
    public function __construct() {
        @session_start();        
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

    public function post_one_time_password(Request $request,$id){
    $key=$request->one_time_password;
    if(Cookie::get("login")=='user'){
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
            Cookie::queue("table", 'user', 365*24*60);
            return redirect()->action('HomeController@home', ['id' => $id]);
        }else{
            //dd("run2");
            return redirect()->action('LoginController@login')->with('error', 'Login failed! One time password incorrect.');
        }
        
    }
    if(Cookie::get("login")=='admin'){
        $user=DB::table('admin') 
            ->where('id',$id)
            ->first();
        //dd($user->google2fa_secret);
        $google2fa = app('pragmarx.google2fa');
        $valid = $google2fa->verifyKey($user->google2fa_secret, $key);
        //dd($valid);
        if($valid==true){
            Session::push('user.id', $id);
            Cookie::queue("ID", $id, 365*24*60);
            Cookie::queue("table", 'admin', 365*24*60);
            return redirect()->action('HomeController@homead', ['id' => $id]);
        }else{
            //dd("run2");
            return redirect()->action('LoginController@login')->with('error', 'Login failed! One time password incorrect.');
        }
        
    }
    

	}

	public function get_update_prf(){
	    return view('edit_prf');
	}

	public function update_prf(Request $request){
	    if(Cookie::get("login")==null) return redirect()->action('LoginController@login');
	    else{
	        $this->validator($request->all());

	        // Initialise the 2FA class
	        $google2fa = app('pragmarx.google2fa');
	        //dd($google2fa->generateSecretKey());

	        // Save the registration data in an array
	        $registration_data = $request->all();
	        //dd($registration_data['email']);

	        // Add the secret key to the registration data
	        $registration_data["id"] = Cookie::get("ID");
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
	    
	}

}
