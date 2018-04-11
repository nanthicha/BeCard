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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/connect', function () {
    if (DB::connection()->getDatabaseName()) {
        $sitename = DB::table('beCard_Setting')->first();
        echo "Site name is : " . $sitename->siteName;
        return " Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});

Auth::routes();

Route::get('/index', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'MyController@index');
Route::get('/users','UserController@index');
Route::get('/setting','UserController@setting');

Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

Route::post('update-profile',['as'=>'update.profile','uses'=>'UserController@updateProfile']);

Route::get('/admin/users','AdminController@users');