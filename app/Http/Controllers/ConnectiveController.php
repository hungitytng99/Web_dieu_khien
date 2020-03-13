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
    class ConnectiveController extends Controller{   

    public function connective()
    {
        //$cn = DB::table('connective')->orderBy('id_us', 'asc')->get();
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
        return view('/connective',compact('user', 'st', 'cn'));

    }
    public function delete($id)
    {
        $value = DB::table('connective')
                ->where('id_cn',$id)
                ->delete();
        
        return redirect()->action('ConnectiveController@connective');
    }

}

