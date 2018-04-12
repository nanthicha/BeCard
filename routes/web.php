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
Route::get('/users', 'UserController@index');
Route::get('/setting', 'UserController@setting');

// Image Upload & Update Profile Route -----------
Route::get('image-upload', ['as' => 'image.upload', 'uses' => 'ImageUploadController@imageUpload']);
Route::post('image-upload', ['as' => 'image.upload.post', 'uses' => 'ImageUploadController@imageUploadPost']);
Route::post('update-profile', ['as' => 'update.profile', 'uses' => 'UserController@updateProfile']);
Route::post('admin-update-profile', ['as' => 'adminupdate.profile', 'uses' => 'UserController@adminUpdateProfile']);

// Admin Route -----------
Route::get('/admin', [
	'as' => 'admin',
	'uses' => 'AdminController@index']);

Route::get('/admin/dashboard', [
	'as' => 'admin.dashboard',
	'uses' => 'AdminController@index']);

Route::get('/admin/users', [
	'as' => 'admin.users',
	'uses' => 'AdminController@users']);

Route::get('/admin/users/edit/{user}', [
	'as' => 'admin.user.edit',
	'uses' => 'AdminController@userEdit']);

Route::get('/admin/userslogs', [
	'as' => 'admin.userslogs',
	'uses' => 'AdminController@users']);

Route::get('/admin/systemlogs', [
	'as' => 'admin.systemlogs',
	'uses' => 'AdminController@users']);






