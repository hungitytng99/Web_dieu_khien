<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
//use App\Http\Controllers\Cookie;
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
        $admin=DB::table('admin') 
            ->where('username','like',$username)
            ->get();
        foreach ($admin as $value) {
            # code...
            if($value->password==$password){
                $id='admin';
                //Session::put('login', true);
                Session::push('user.id', $id);
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
        	if($value->password==$password){
        		
            

                $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$value->id)
                ->get();
                $id=$value->id;
                //Session::put('login', true);
                Session::push('user.id', $id);
                Cookie::queue("ID", $id, 365*24*60);
                //Cookie::queue("login", true, 365*24*60);
                return redirect()->action('HomeController@home', ['id' => $id]);    
        	}
        	
        }


    return redirect()->action('LoginController@login')->with('error', 'Login failed! User account or password incorrect.');   
               
}

public function logout(){
        
    $id=-1;
    Session::pull('user.id', $id);
    Cookie::queue("login", false, 365*24*60);
    // dd(Session::get('login'));
    Cookie::queue("ID", $id, 365*24*60);
    //dd(Session::get('ID'));
    return redirect()->action('LoginController@login');
}
}
?>
