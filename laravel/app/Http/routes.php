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




Route::group(['middleware' => ['web']], function () {

        //前台路由群组
		Route::group(['namespace' => 'Home'], function(){

			Route::group(['prefix'=>'home'],function(){
				
				Route::any('index/index',[
				'uses'=>'IndexController@index',
				]);
				//前台登录
				Route::any('login',[
				'uses'=>'IndexController@login'
				]);

				//前台注册 渲染模板
				Route::any('register',[
					'uses'=>'IndexController@register'
				]);	

				//前台用户注册
				Route::any('register_do',[
					'uses'=>'IndexController@register_do'
				]);	

				//前台验证用户名唯一
				Route::any('verify_name',[
					'uses'=>'IndexController@verify_name'
				]);

				//前台验证邮箱唯一
				Route::any('verify_email',[
					'uses'=>'IndexController@verify_email'
				]);	
		
				//前台发送验证码
				Route::any('send_verify_code',[
					'uses'=>'IndexController@send_verify_code'
				]);	

				//验证前台用户输入验证码
				Route::any('verify_user_code',[
					'uses'=>'IndexController@verify_user_code'
				]);	

			});
		});





	


//后台路由群组

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


