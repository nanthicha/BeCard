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
use App\Http\Middleware\AuthAdministrator;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('home.index');
});
Route::get('/connect', function () {
    if (DB::connection()->getDatabaseName()) {
    	$sitename = DB::table('beCard_Setting')->first();
		echo "Site name is : ".$sitename->siteName;
        return " Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => array('auth','admin'), 'namespace' => 'Admin'], function (){
		Route::get('/home', function()
		{
			return View('admin.dashboard');
		});
});