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
	'uses' => 'Auth\RegisterController@createAffi']);
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
Route::get('/voucher', ['as'=>'voucher','uses'=>'UserController@voucher']);

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

Route::get('/admin/shops', [
	'as' => 'admin.shops',
	'uses' => 'AdminController@shops']);

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

//Shop
Route::get('/shop', [
	'as' => 'shop.show',
	'uses' => 'ShopController@index']);
Route::get('/shop/create/{id}', [
	'as' => 'shop.create',
	'uses' => 'ShopController@create']);
Route::post('/shop/create', [
	'as' => 'shop.create.post',
	'uses' => 'ShopController@store']);
//--------ศรัทธา ใส่ register เพิ่ม------------
Route::get('/shop/register', [
	'as' => 'shop.register',
	'uses' => 'EntrepreneurController@register']);
  Route::post('/shop/register', [
  	'as' => 'shop.regiter.post',
  	'uses' => 'EntrepreneurController@storeEntrepreneur']);

//----------shop---------
Route::get('/shop' , [
	'as' => 'shop.index',
	'uses' => 'ShopController@index'
]);

Route::get('/shop/show' , [
	'as' => 'shop.show',
	'uses' => 'ShopController@show'
]);

Route::get('/shop/branch' , [
	'as' => 'shop.branch',
	'uses' => 'BranchController@show'
]);
Route::get('/shop/cashier' , [
	'as' => 'shop.cashier',
	'uses' => 'CashierController@show'
]);
Route::get('/shop/setting' , [
	'as' => 'shop.setting',
	'uses' => 'ShopController@settingGen']);

Route::get('/shop/setting/timeline' ,[
	'as' => 'shop.setting.timeline',
	'uses' => 'ShopController@settingTL'
	]);

Route::get('/shop/setting/promotion' ,[
	'as' => 'shop.setting.promotion',
	'uses' => 'ShopController@settingPT'
	]);

Route::get('/shop/membercard' , [
	'as' => 'shop.membercard',
	'uses' => 'ShopController@membercard']);
Route::post('/shop/membercard/create' , [
	'as' => 'shop.membercard.create',
	'uses' => 'ShopController@membercardCreate']);
Route::get('/shop/membercard/{key}/view' , [
	'as' => 'shop.membercard.view',
	'uses' => 'ShopController@membercardView']);
Route::get('/shop/membercard/{key}/edit' , [
	'as' => 'shop.membercard.edit',
	'uses' => 'ShopController@membercardEdit']);
Route::get('/shop/membercard/{key}/print' , [
	'as' => 'shop.membercard.print',
	'uses' => 'ShopController@membercardPrint']);
Route::post('/shop/membercard/update' , [
	'as' => 'shop.membercard.update',
	'uses' => 'ShopController@membercardUpdate']);
Route::get('/join/{key}' , [
	'as' => 'join',
	'uses' => 'UserController@joinCard']);
Route::get('/shop/reward' , [
	'as' => 'shop.reward',
	'uses' => 'ShopController@reward']);
Route::get('/shop/reward/{code}/view' , [
	'as' => 'shop.reward.view',
	'uses' => 'ShopController@rewardView']);
Route::get('/shop/reward/{code}/edit' , [
	'as' => 'shop.reward.edit',
	'uses' => 'ShopController@rewardEdit']);
Route::post('/shop/reward/update' , [
	'as' => 'shop.reward.update',
	'uses' => 'ShopController@rewardUpdate']);
Route::post('/shop/reward/create' , [
	'as' => 'shop.reward.create',
	'uses' => 'ShopController@rewardCreate']);
Route::get('/shop/reward/iwant/{code}' , [
	'as' => 'shop.reward.iwant',
	'uses' => 'ShopController@iwant']);
Route::get('/user/voucher/{id}' , [
	'as' => 'user.voucher.id',
	'uses' => 'UserController@showVoucherID']);
Route::get('/shop/usevoucher/{id}' , [
	'as' => 'shop.usevoucher',
	'uses' => 'ShopController@useVoucher']);

Route::get('/shop/branch/edit','BranchController@edit');
Route::get('/shop/preview' , 'ShopController@previewShop');

Route::get('/shop/show/{name}' , 'ShopController@showName');
Route::get('/shop/branch/{name}' , 'BranchController@showName');
Route::post('/shop/branch' , 'BranchController@store');
Route::post('/shop/cashier' , 'CashierController@store');
Route::put('/shop/update/general' ,[
	'as' => 'shop.update.general',
	'uses' => 'ShopController@updateGen'
]);
Route::put('/shop/update/timeline' ,[
	'as' => 'shop.update.timeline',
	'uses' => 'ShopController@updateTL'
]);
Route::put('/shop/update/promotion' ,[
	'as' => 'shop.update.promotion',
	'uses' => 'ShopController@updatePT'
]);
Route::delete('/shop/promotion/delete' , 'ShopController@deletePT');
Route::put('/shop/branch/update' , 'BranchController@update');
Route::delete('/shop/branch/delete' , 'BranchController@destroy');
Route::delete('/shop/cashier/delete' , 'CashierController@destroy');


//-----------------------------

//Cashier
Route::get('/cashier/add', [
	'as' => 'cashier.add',
	'uses' => 'CashierController@toAdd']);
Route::get('/cashier/yes', [
	'as' => 'cashier.yes',
	'uses' => 'CashierController@yes']);
Route::post('/cashier/add/store', [
	'as' => 'cashier.add.store',
	'uses' => 'CashierController@addData']);
Route::get('/cashier/history', [
	'as' => 'cashier.history',
	'uses' => 'CashierController@history']);
Route::get('/cashier/resetPassword' , 'CashierController@resetPwd');
Route::post('/cashier/resetPassword' , 'CashierController@updatePwd');

//API
Route::post('/api/cashierStep1', [
	'as' => 'api.cashierStep1',
	'uses' => 'ApiController@cashierStep1']);
Route::get('/api/image', [
	'as' => 'api.image',
	'uses' => 'ApiController@image']);

// Route::get('/success' , function(){
// 	return view('foundations.successAnimate');
// });


Route::get('/allshop', [
	'as' => 'all.shop',
	'uses' => 'HomeController@allshop']);

//Email
Route::get('/verifyAccount/{username}' , 'UserController@verifyAccount');


