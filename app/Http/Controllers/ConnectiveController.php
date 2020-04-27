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
    class ConnectiveController extends Controller{   

    public function connective()
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        $user = DB::table('users')->orderBy('id', 'asc')->get();
        $st = DB::table('thiet_bi')->orderBy('id', 'asc')->get();
        $cn = DB::table('connective')
                ->join('thiet_bi', 'thiet_bi.id', '=', 'connective.id_tb')
                ->join('users', 'users.id', '=', 'connective.id_us')
                ->orderBy('id_us', 'asc')
                ->get();
        return view('/connective',compact('user', 'st', 'cn'));
    }
    public function add(Request $request){
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}

        $users = DB::table('users')->find($request->idus);
        $sts = DB::table('thiet_bi')->find($request->idtb);

        if((!empty($users))&&(!empty($sts))){
            DB::table('connective')
            ->where('id_us',$request->idus)
            ->where('id_tb',$request->idtb)
            ->delete();
            DB::table('connective')
            ->insert([
                'id_us'=>$request->idus, 'id_tb'=>$request->idtb]);
        }
        $cn = DB::table('connective')
                ->join('thiet_bi', 'thiet_bi.id', '=', 'connective.id_tb')
                ->join('users', 'users.id', '=', 'connective.id_us')
                ->orderBy('id_us', 'asc')
                ->get();
        $user = DB::table('users')->orderBy('id', 'asc')->get();
        $st = DB::table('thiet_bi')->orderBy('id', 'asc')->get();
        return redirect()->action('ConnectiveController@connective',['user'=>$user, 'st'=>$st, 'cn'=>$cn])->with('success', 'Add success.');

    }
    public function delete($id)
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        $value = DB::table('connective')
                ->where('id_cn',$id)
                ->delete();
        
        return redirect()->action('ConnectiveController@connective')->with('success', 'Delete success.');
    }

}

