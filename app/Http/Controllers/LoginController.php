<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use Session;
use Cookie;
use \DB;
//use App\Http\Controllers\Cookie;

class LoginController extends Controller{   
    public function login() {
    	//dd(Cookie::get('ID'));
    	if(Cookie::get('ID')==null) return view('login');
    	if(Cookie::get('ID')=='admin'){
    		$id=0;
            Session::put('login', true);
            Session::push('user.id', $id);
			return redirect()->action('HomeController@homead'); 
    	}
    	if(Cookie::get('ID')!=0){
    		$id=Cookie::get('ID');
            Session::put('login', true);
            Session::push('user.id', $id);
			return redirect()->action('HomeController@home', ['id' => $id]);
                 
    	}
    }
    public function register(){
        return view('myregister');
    }

    public function index($id){
        $user=DB::table('users') 
            ->where('id',$id)
            ->first();
        if($user->google2fa_secret==NULL){
            Session::push('user.id', $id);
            Cookie::queue("ID", $id, 365*24*60);
            return redirect()->action('HomeController@home', ['id' => $id]);
        } else return view('google2fa.index');
    }

    public function postindex(Request $request,$id){
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
}
?>