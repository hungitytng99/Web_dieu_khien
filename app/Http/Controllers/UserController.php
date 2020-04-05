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
                $id=0;
                Session::put('login', true);
                Session::push('user.id', $id);
                Cookie::queue("ID", $id, 365*24*60);
                return redirect()->action('LoginController@admin'); 
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
                Session::put('login', true);
                Session::push('user.id', $id);
                Cookie::queue("ID", $id, 365*24*60);

                return redirect()->action('HomeController@home', ['id' => $id]);    
        	}
        	
        }


    return redirect()->action('LoginController@login')->with('error', 'Login failed! User account or password incorrect.');   
               
}
public function getuser(){
    $user=DB::table('users') 
            ->get();
    return $user;
}
public function logout(){
        $id=Cookie::get('ID');
        $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
        foreach ($st as $value){
            if($value->isOn=='1'){
                $count=$value->login;
                $count-=1;
                DB::table('thiet_bi') ->where('id',$value->id)->update(['login'=>$count]);
            }
        }

    Session::pull('user.id', $id);
    Session::put('login', false);
    Cookie::forget("ID");
    return redirect()->action('LoginController@login');
}
}
?>
