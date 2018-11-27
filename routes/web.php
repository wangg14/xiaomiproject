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
//后台登录和退出
Route::resource('/adminlogin','Admin\AdminloginController');

//中间件
Route::group(['middleware'=>'adminlogin'],function(){
	//后台首页
	Route::resource("/admin","Admin\AdminController");
	//后台管理员管理
	Route::resource("/admin_user","Admin\AdminuserController");
	//分配角色
	Route::get("/rolelist/{id}","Admin\AdminuserController@rolelist");
	//保存角色
	Route::post('/saverole','Admin\AdminuserController@saverole');
	//后台角色列表
	Route::resource("/role","Admin\RolelistController");
	//分配权限
	Route::get('/authrole/{id}','Admin\RolelistController@auth');
	//保存权限
	Route::post('/saveauth','Admin\RolelistController@saveauth');
	//后台权限
	Route::resource('/authlist','Admin\AuthlistController');
	//后台用户
	Route::resource("/adminusers","Admin\UsersController");
	//后台订单
	Route::resource("/adminuserss","Admin\UserssController");
	//收货地址
	Route::get("/address/{id}","Admin\UsersController@address");
	//后台无限分类模块
	Route::resource("/admincates","Admin\CatesController");
	//后台公告
	Route::resource('/adminannource','Admin\AnnourceController');
	//公告批量删除
	Route::get("/annourcedel","Admin\AnnourceController@annourcedel");
	//友情链接
	Route::resource('/links','Admin\LinksController');
	//轮播图
	Route::resource("/carouse","Admin\CarousesController");
	//商品管理
	Route::resource("/shop","Admin\ShopController");
	//模型做会员模块
	// Route::resource("/adminuserss","Admin\UserssController");
});


//前台中间件
Route::group(['middleware'=>'homelogin'],function(){
	//购物车
	Route::resource("/flow","Home\FlowController");
	Route::get("/homeaddress","Home\FlowController@address");
	Route::get("/addresses","Home\FlowController@addresses");
	Route::post("/flows","Home\FlowController@updates");
	//支付接口
	Route::get("/pays","Home\FlowController@pays");
	Route::get("/returnurl","Home\FlowController@returnurl");
	
	//前台个人订单
	Route::resource("/homeuser","Home\UserController");
	Route::resource("/homeusers","Home\UserController");
	Route::post("/homeuserss","Home\UserController@edits");
	Route::get("/orderlist","Home\UserController@orderlist");
	Route::get("/off","Home\UserController@off");
	Route::get("/order","Home\UserController@order");
	Route::get("/orderaddress","Home\UserController@orderaddress");
	Route::get("/addressdel","Home\UserController@addressdel");
	Route::post("/addressadd","Home\UserController@addressadd");
	Route::post("/addressedit","Home\UserController@addressedit");
});
//前台登录
Route::resource("/homelogin","Home\LoginController");
Route::get("/back","Home\LoginController@back");
//邮件发送
Route::post("/find","Home\LoginController@find");
Route::get("/edit","Home\LoginController@edit1");
Route::post("/idd","Home\LoginController@idd");
//引入验证码
Route::get("/code","Home\LoginController@code");
//前台注册
Route::resource("/homeregister","Home\RegisterController");
Route::get("/checkphone","Home\RegisterController@checkphone");
Route::get("/getcode","Home\RegisterController@getcode");
Route::get("/checkcode","Home\RegisterController@checkcode");
Route::get("/getpassword","Home\RegisterController@getpassword");
Route::post("/checkpassword","Home\RegisterController@checkpassword");
Route::post("/add","Home\RegisterController@add");
//前台首页
Route::resource("/homeindex","Home\IndexController");
//前台商品列表
Route::resource("/category","Home\CategoryController");
//前台商品
Route::resource("/goods","Home\GoodsController");
//前台购物车
Route::resource("/homecart","Home\CartController");
Route::get("/jian","Home\CartController@jian");
Route::get("/addd","Home\CartController@add");
Route::get("/del","Home\CartController@del");
Route::get("/empty","Home\CartController@empty");

