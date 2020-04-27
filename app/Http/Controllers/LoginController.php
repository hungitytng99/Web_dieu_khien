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
    	if(Cookie::get('table')==null) return view('login');
    	if(Cookie::get('table')=='admin'){
            // Session::put('login', true);
            // Session::push('user.id', $id);
			return redirect()->action('HomeController@homead'); 
    	}
    	if(Cookie::get('table')=='user'){
    		$id=Cookie::get('ID');
            // Session::put('login', true);
            // Session::push('user.id', $id);
			return redirect()->action('HomeController@home', ['id' => $id]);
                 
    	}
    }
    public function register(){
        return view('myregister');
    }

    
}
?>