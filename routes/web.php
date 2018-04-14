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
// Register Affiliate
Route::get('/register/{id}', [
	'as' => 'registerAffi',
	'uses' => 'MyController@regisAffiliate']);
Route::post('regis-affi', [
	'as' => 'registerAffi.regis',
	'uses' => 'auth\RegisterController@createAffi']);
Route::get('/affiliate', [
	'as' => 'affiliate',
	'uses' => 'UserController@affiliate']);

// General Route
Route::get('/index', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'MyController@index');
Route::get('/users', 'UserController@index');
Route::get('/setting', 'UserController@setting');
Route::get('/reward', ['as'=>'reward','uses'=>'UserController@reward']);


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
	'uses' => 'AdminController@usersLogs']);

Route::get('/admin/userslogs/{name}', [
	'as' => 'admin.userslogs.name',
	'uses' => 'AdminController@usersLogsName']);

Route::get('/admin/affiliates', [
	'as' => 'admin.affiliates',
	'uses' => 'AdminController@affiliates']);

Route::get('/admin/rewards', [
	'as' => 'admin.rewards',
	'uses' => 'AdminController@rewards']);

Route::get('/admin/rewards/new', [
	'as' => 'admin.rewards.new',
	'uses' => 'AdminController@rewardsnew']);

Route::post('/admin/rewards/create-new', [
	'as' => 'admin.rewardsnew.post',
	'uses' => 'AdminController@rewardsnewPost']);

Route::get('/admin/rewards/edit/{code}', [
	'as' => 'admin.rewards.edit',
	'uses' => 'AdminController@rewardsnewEdit']);

Route::post('/admin/rewards/update', [
	'as' => 'admin.rewards.edit.post',
	'uses' => 'AdminController@rewardsEdited']);

Route::get('/admin/bepoints', [
	'as' => 'admin.bepoints',
	'uses' => 'AdminController@bePoints']);