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
    class AdminThietBiController extends Controller{   

    public function index()
    {
        $st = DB::table('thiet_bi')->orderBy('id', 'asc')->get();
        return view('/admin_thiet_bi',compact('st'));
    }
    public function edit($id)
    {
        $value = DB::table('thiet_bi')->find($id);
        $pageName = 'Update Thiet Bi';
        return view('/edit_thiet_bi', compact('value', 'pageName'));
    }
    public function update(Request $request, $id)
    {
        //$value=$request->all();
        $news = DB::table('thiet_bi')
                ->where('id',$id)
                ->update(array(
                    'name'=> $request->name,
                    'isOn'=> $request->isOn,
                    'comment'=> $request->comment
                ));
        // $news->username = $request->username;
        // $news->password = $request->password;
        // $news->comment = $request->comment;

        // $news->save();
        return redirect()->action('AdminThietBiController@index');
        
    }
    public function delete($id)
    {
        $value = DB::table('thiet_bi')
                ->where('id',$id)
                ->delete();
        
        return redirect()->action('AdminThietBiController@index');
    }
    public function add(Request $request)
    {
        DB::table('thiet_bi')
        ->insert(
            ['id'=>$request->id, 'name'=>$request->name, 'isOn'=>$request->isOn, 'comment'=>$request->comment]);
        return redirect()->action('AdminThietBiController@index');

    }
    }