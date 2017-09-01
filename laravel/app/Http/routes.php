<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/',[
			'uses'=>'Home\IndexController@index',
			]);//设置默认访问控制器方法名




// Route::get('/captcha',function(){
// 	$builder = new CaptchaBuilder;
// 	$builder->build();
// 	return response($builder->output())->header('Content-type','image/jpeg');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



//后台登录不用admin中间件
Route::group(['middleware' => ['web']], function () {
	Route::group(['namespace' => 'Admin'], function(){
			Route::group(['prefix'=>'admin'],function(){
				//后台登录
				Route::any('login/login',['uses'=>'LoginController@login']);
				//后台注册
				Route::any('login/regist',['uses'=>'LoginController@regist']);
				//后台注册验证唯一
				Route::any('login/check_name',['uses'=>'LoginController@check_name']);
				//后台退出登录
				Route::any('login/logout',['uses'=>'LoginController@logout']);
			});
	});
});


Route::group(['middleware' => ['web']], function () {

        //前台路由群组
		Route::group(['namespace' => 'Home'], function(){

			Route::group(['prefix'=>'home'],function(){
				
				Route::any('index/index',[
				'uses'=>'IndexController@index',
				]);
				//前台关于团队展示
				Route::any('about/index',[
				'uses'=>'AboutController@index',
				]);
				

			});
		});





	


//后台路由群组
Route::group(['middleware' => ['admin']], function () {
	Route::group(['namespace' => 'Admin'], function(){
		Route::group(['prefix'=>'admin'],function(){
				//后台首页
				Route::any('index/index',[
				'uses'=>'IndexController@index',
				]);
				//后台添加城市
				Route::any('region/region_add',[
				'uses'=>'RegionController@region_add',
				]);
				//后台修改城市
				Route::any('region/region_save',[
				'uses'=>'RegionController@region_save',
				]);
				//后台关于添加团队
				Route::any('about/add_about',[
				'uses'=>'AboutController@add_about',
				]);
				//后台关于团队列表
				Route::any('about/team_list',[
				'uses'=>'AboutController@team_list',
				]);
				//后台关于团队修改
				Route::any('about/team_save',[
				'uses'=>'AboutController@team_save',
				]);
				//后台关于团队删除
				Route::any('about/team_del',[
				'uses'=>'AboutController@team_del',
				]);

		});
	});
});

			//人员路由 Personnel
			Route::group(['namespace' => 'Personnel'], function(){

			Route::group(['prefix'=>'personnel'],function(){
				
				Route::any('index/index',[
					'uses'=>'IndexController@index',
				]);
				
			});
		});
});


