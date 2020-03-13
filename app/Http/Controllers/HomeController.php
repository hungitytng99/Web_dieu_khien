<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
*/

class HomeController extends Controller{   
    public function home($id) {
    // 	// $cn= DB::table('connective')
    // 	// ->where('id_us', $idus);
    // 	// $st = DB::table('thiet_bi')
    // 	// ->whereIn('id',$cn->id_tb)
    // 	// ->orderBy('id', 'asc')
    // 	// ->get();
    	$st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
        return view('home',compact('st'));
     }

    public function homead(){
    	$st = DB::table('thiet_bi')
    	->orderBy('id', 'asc')
    	->get();
        return view('home',compact('st'));
    }

    public function change(Request $request, $id)
    {
    	//$stt = DB::table('thiet_bi')->get();
    	//dd($request);
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
    	
        return redirect()->action('HomeController@home', ['id' => $id]);
    	
    }
    public function changead(Request $request)
    {
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
    	
        return redirect()->action('HomeController@homead');
    	
    }
}
?>