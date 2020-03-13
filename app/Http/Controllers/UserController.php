<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
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
                // $login=$request::session()->put('login', true);
                // $loginid=$request::session()->put('ID', $value->id);
                return view('admin'); 
                break; 
            }
        } 
        
        $user=DB::table('users') 
        	->where('username','like',$username)
        	->get();
        foreach ($user as $value) {
        	# code...
        	if($value->password==$password){
        		
                //$idus=$value->id;
            	// $cn= DB::table('connective')
             //    ->select('id_tb')
             //    ->where('id_us', $value->id)
             //    ->get();

                $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$value->id)
                ->get();
                //->whereColumn('thiet_bi.id','=','connective.id_tb')
                //->where('id_us',$value->id)
                //->orderBy('id', 'asc')
                //->get();
                //dd($st);
                $id=$value->id;
                // $login=$request::session()->put('login', true);
                // $loginid=$request::session()->put('ID', $value->id);


               return redirect()->action('HomeController@home', ['id' => $id]);
                 
        	}
        	else{
            return redirect('/login')->withMessage('User approved successfully'); 
        } 
        }

        
               
}
public function getuser(){
    $user=DB::table('users') 
            ->get();
    return $user;
}
}
?>
