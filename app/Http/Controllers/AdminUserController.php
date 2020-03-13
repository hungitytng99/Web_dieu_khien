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
    class AdminUserController extends Controller{   

    public function index()
    {
        $user = DB::table('users')->orderBy('id', 'asc')->get();
        return view('/admin_user',compact('user'));
    }
    public function edit($id)
    {
        $value = DB::table('users')->find($id);
        $pageName = 'News - Update';
        return view('/edit_user', compact('value', 'pageName'));
    }
    public function update(Request $request, $id)
    {
        //$value=$request->all();
        $news = DB::table('users')
                ->where('id',$id)
                ->update(array(
                    'username'=> $request->username,
                    'password'=> $request->password,
                    'comment'=> $request->comment
                ));
        // $news->username = $request->username;
        // $news->password = $request->password;
        // $news->comment = $request->comment;

        // $news->save();
        return redirect()->action('AdminUserController@index');
        
    }
    public function delete($id)
    {
        $value = DB::table('users')
                ->where('id',$id)
                ->delete();
        
        return redirect()->action('AdminUserController@index');
    }
    public function add(Request $request)
    {
        DB::table('users')
        ->insert(
            ['id'=>$request->id, 'username'=>$request->username, 'password'=>$request->password, 'comment'=>$request->comment]);
        return redirect()->action('AdminUserController@index');

    }
    }
