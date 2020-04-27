<?php

    namespace App\Http\Controllers;

    use App\News;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Session;
    use Cookie;

    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    class AdminUserController extends Controller{   

    public function index()
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        $user = DB::table('users')->orderBy('id', 'asc')->get();
        return view('/admin_user',compact('user'));
    }
    public function edit($id)
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        $value = DB::table('users')->find($id);
        $pageName = 'News - Update';
        return view('/edit_user', compact('value', 'pageName'));
    }
    public function update(Request $request, $id)
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        //$value=$request->all();
        if(($request->username==null)||($request->password==null)||($request->fullname==null)){
        
        return redirect()->action('AdminUserController@edit',['id'=>$id])->with('error', 'Name, password, comment may not be blank.');    
        }

        $news = DB::table('users')
                ->where('id',$id)
                ->update(array(
                    'username'=> $request->username,
                    'fullname'=> $request->fullname,
                    'email'=> $request->email,
                    'password'=> Hash::make($request->password)
                ));
        return redirect()->action('AdminUserController@index')->with('success', 'Update success.');
        
    }
    public function delete($id)
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        $value = DB::table('users')
                ->where('id',$id)
                ->delete();

        $value = DB::table('connective')
                ->where('id_us',$id)
                ->delete();

        return redirect()->action('AdminUserController@index')->with('success', 'Delete success.');
    }
    public function add(Request $request)
    {
        if (Cookie::get('table')!='admin'){
            return redirect()->action('LoginController@login');}
        DB::table('users')
        ->insert(
            [ 'username'=>$request->username, 'fullname'=>$request->fullname , 'email'=>$request->email , 'password'=>Hash::make($request->password)]);
        return redirect()->action('AdminUserController@index')->with('success', 'Add success.');

    }
    }
