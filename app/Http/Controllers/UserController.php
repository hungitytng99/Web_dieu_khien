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
                Cookie::queue("login", 'admin', 365*24*60);
                $id=$value->id;
                if($value->google2fa_secret!=NULL){
                    // return view('login',compact('id'));
                    return redirect()->action('GoogleAuthController@one_time_password', ['id' => $id]);

                } else {
                    //Session::push('user.id', $id);
                    Cookie::queue("table", 'admin', 365*24*60);
                    Cookie::queue("ID", $id, 365*24*60);
                    return redirect()->action('HomeController@homead', ['id' => $id]);
                }
                
                
                break; 
            }
        } 
        
        $user=DB::table('users') 
        	->where('username','like',$username)
        	->get();
        foreach ($user as $value) {
        	# code...
        	if(Hash::check($password, $value->password)){
                Cookie::queue("login", 'user', 365*24*60);
                
                $id=$value->id;
                if($value->google2fa_secret!=NULL){
                    // return view('login',compact('id'));
                    return redirect()->action('GoogleAuthController@one_time_password', ['id' => $id]);

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
