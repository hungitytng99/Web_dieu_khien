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
        
        $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
        return view('home',compact('st'));
        
     }

    public function homead(){
        if (Cookie::get('ID')!='admin'){
            return redirect()->action('LoginController@login');}
    	
        $st = DB::table('thiet_bi')
        ->orderBy('id', 'asc')
        ->get();
        return view('admin',compact('st'));
    }

    public function change(Request $request, $id)
    {
    	
        if (Cookie::get('ID')!=$id){
            return redirect()->action('LoginController@login');}
    	$st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
    	foreach ($st as $key) {
    		if($request->has($key->id))
    		{
                if($key->isOn==0){
                    $this->TurnOn($key->id);
                    DB::table('thiet_bi') ->where('id',$key->id)->update(['isOn'=>1]);
                }
    		}
    		else{
                if($key->isOn==1){
                    $this->TurnOff($key->id);
                    DB::table('thiet_bi') ->where('id',$key->id)->update(['isOn'=>0]);
                }
    		}
    	}
    	
        return redirect()->action('HomeController@home', ['id' => $id])->with('success', 'The change has been saved');
    	
    }
    public function changead(Request $request)
    {
        if (Cookie::get('ID')!='admin'){
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

    public function TurnOn($id){

    }
    public function TurnOff($id){

    }
}
