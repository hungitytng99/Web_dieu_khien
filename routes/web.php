
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'LoginController@login');
Route::post('/', 'UserController@postlogin');
// Route::get('/admin', 'LoginController@admin');
Route::get('/home/{id}', 'HomeController@home');
Route::get('/homead', 'HomeController@homead');
Route::post('/home/{id}','HomeController@change');
Route::post('/homead','HomeController@changead');
Route::get('/admin_user', 'AdminUserController@index');
Route::get('/admin_thiet_bi', 'AdminThietBiController@index');
Route::get('/editus/{id}', 'AdminUserController@edit');
Route::PATCH('/updateus/{id}', 'AdminUserController@update');
Route::get('/edittb/{id}', 'AdminThietBiController@edit');
Route::PATCH('/updatetb/{id}', 'AdminThietBiController@update');
Route::get('/deleteus/{id}', 'AdminUserController@delete');
Route::get('/deletetb/{id}', 'AdminThietbiController@delete');
Route::post('/addus', 'AdminUserController@add');
Route::post('/addtb', 'AdminThietBiController@add');
Route::get('/connective','ConnectiveController@connective');
Route::post('/addcn','ConnectiveController@add');
Route::get('/deletecn/{id}', 'ConnectiveController@delete');
Route::get('/logout','UserController@logout' );

?>


