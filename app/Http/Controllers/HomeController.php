<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;

/**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
*/

class HomeController extends Controller{   
    public function home($id) {
    
        if (Cookie::get('ID')!=$id){
            return redirect()->action('LoginController@login');}
        DB::table('users')->update(['on'=>0]);
        $list_id =Session::get('user.id');
        foreach ($list_id as $key => $value) {
            DB::table('users')->where('id',$value)->update(['on'=>1]);
        }

        $tb=DB::table('thiet_bi')->get();
        foreach ($tb as $value) {
            # code...
            $st = DB::table('connective')
                ->join('thiet_bi', 'thiet_bi.id', '=', 'connective.id_tb')
                ->join('users', 'users.id', '=', 'connective.id_us')
                ->where('connective.id_tb',$value->id)
                ->where('users.on',1)
                ->where('thiet_bi.isOn',1)
                ->count();
            DB::table('thiet_bi') ->where('id',$value->id)->update(['login'=>$st]);
        }

        
        $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
        return view('home',compact('st'));
        
     }

    public function homead(){
        if (Cookie::get('ID')!=0){
            return redirect()->action('LoginController@login');}
    	DB::table('users')->update(['on'=>0]);
        $list_id =Session::get('user.id');
        foreach ($list_id as $key => $value) {
            DB::table('users')->where('id',$value)->update(['on'=>1]);
        }

        $tb=DB::table('thiet_bi')->get();
        foreach ($tb as $value) {
            # code...
            $st = DB::table('connective')
                ->join('thiet_bi', 'thiet_bi.id', '=', 'connective.id_tb')
                ->join('users', 'users.id', '=', 'connective.id_us')
                ->where('connective.id_tb',$value->id)
                ->where('users.on',1)
                ->where('thiet_bi.isOn',1)
                ->count();
            
            DB::table('thiet_bi') ->where('id',$value->id)->update(['login'=>$st]);
        }
        $st = DB::table('thiet_bi')
        ->orderBy('id', 'asc')
        ->get();
        return view('admin',compact('st'));
    }

    public function change(Request $request, $id)
    {
    	//$stt = DB::table('thiet_bi')->get();
    	//dd($request);
        if (Cookie::get('ID')!=$id){
            return redirect()->action('LoginController@login');}
    	$st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
    	foreach ($st as $key) {
    	// 	# code...
    	// 	//dd($stt);
    		if($request->has($key->id))
    		{
    			DB::table('thiet_bi') ->where('id',$key->id)->update(['isOn'=>1]);
    		}
    		else{
    		    DB::table('thiet_bi')->where('id',$key->id)->update(['isOn'=>0]);
    		}
    	}
    	
        return redirect()->action('HomeController@home', ['id' => $id])->with('success', 'The change has been saved');
    	
    }
    public function changead(Request $request)
    {
        if (Cookie::get('ID')!=0){
            return redirect()->action('LoginController@login');}
    	$stt = DB::table('thiet_bi')->get();
    	foreach ($stt as $key) {
    		# code...
    		if($request->has($key->id))
    		{
    			DB::table('thiet_bi') ->where('id',$key->id)->update(['isOn'=>1]);
    		}
    		else{
    		    DB::table('thiet_bi')->where('id',$key->id)->update(['isOn'=>0]);
    		}
    	}
    	
        return redirect()->action('HomeController@homead')->with('success', 'The change has been saved!!!');
    	
    }
}
