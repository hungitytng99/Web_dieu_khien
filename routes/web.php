
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|create_register
*/
Route::get('/', 'LoginController@login');
Route::post('/', 'UserController@postlogin');
Route::get('/one_time_password/{id}', 'UserController@one_time_password');
Route::post('/one_time_password/{id}', 'UserController@post_one_time_password');

Route::get('/myregister', 'LoginController@register');
// Route::post('/myregister', 'UserController@register');
Route::post('/myregister', 'Auth\RegisterController@register');
Route::get('/creat_register', 'Auth\RegisterController@create_register');
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
Route::get('/deletetb/{id}', 'AdminThietBiController@delete');
Route::post('/addus', 'AdminUserController@add');
Route::post('/addtb', 'AdminThietBiController@add');
Route::get('/connective','ConnectiveController@connective');
Route::post('/addcn','ConnectiveController@add');
Route::get('/deletecn/{id}', 'ConnectiveController@delete');
Route::get('/logout','UserController@logout' );
Auth::routes();
//Route::get('/complete-registration', 'UserController@completeRegistration');
Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');

?>





