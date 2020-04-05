<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
//use App\Http\Controllers\Cookie;

class LoginController extends Controller{   
    public function login() {
    	//dd(Cookie::get('ID'));
    	if(Cookie::get('ID')==-1)return view('login');
    	if(Cookie::get('ID')==0){
    		$id=0;
            Session::put('login', true);
            Session::push('user.id', $id);
			return redirect()->action('LoginController@admin'); 
    	}
    	if(Cookie::get('ID')!=0){
    		$id=Cookie::get('ID');
            Session::put('login', true);
            Session::push('user.id', $id);
			return redirect()->action('HomeController@home', ['id' => $id]);
                 
    	}
    }

  
    public function admin() {
    	if (Session::get('login')==false){
            return redirect()->action('LoginController@login');}
        else{
        	return view('admin');
        }
        
    }
}
?>