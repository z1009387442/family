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
				
				/**
				 * 后台酒店管理相关操作
				 * @author [meng] <[920417690@qq.com]>
				 */
				//后台酒店列表
				Route::any('hotel/hotel_list',[
				'uses'=>'HotelController@hotel_list',
				]);
				//后台酒店添加
				Route::any('hotel/hotel_add',[
				'uses'=>'HotelController@hotel_add',
				]);
				//后台酒店修改
				Route::any('hotel/hotel_save',[
				'uses'=>'HotelController@hotel_save',
				]);
				//后台酒店删除
				Route::any('hotel/hotel_del',[
				'uses'=>'HotelController@hotel_del',
				]);

				/**
				 * 后台酒店类型管理相关操作
				 * @author [meng] <[920417690@qq.com]>
				 */
				//后台房间类型列表
				Route::any('type/type_list',[
				'uses'=>'TypeController@type_list',
				]);
				//后台房间类型添加
				Route::any('type/type_add',[
				'uses'=>'TypeController@type_add',
				]);
				//后台房间类型修改
				Route::any('type/type_save',[
				'uses'=>'TypeController@type_save',
				]);
				//后台房间类型删除
				Route::any('type/type_del',[
				'uses'=>'TypeController@type_del',
				]);

				/**
				 * 后台房间管理相关操作
				 * @author [meng] <[920417690@qq.com]>
				 */
				//后台房间列表
				Route::any('room/room_list',[
				'uses'=>'RoomController@room_list',
				]);
				//后台房间添加
				Route::any('room/room_add',[
				'uses'=>'RoomController@room_add',
				]);
				//后台房间修改
				Route::any('room/room_save',[
				'uses'=>'RoomController@room_save',
				]);
				//后台房间删除
				Route::any('room/room_del',[
				'uses'=>'RoomController@room_del',
				]);

				/**后台酒店分配类型相关操作
				 * @author [meng] <[920417690@qq.com]>
				 */
				//后台酒店拥有类型列表
				Route::any('hotel_type/hotel_type_list',[
				'uses'=>'HoteltypeController@hotel_type_list',
				]);
				//后台酒店拥有类型添加
				Route::any('hotel_type/hotel_type_add',[
				'uses'=>'HoteltypeController@hotel_type_add',
				]);
				//后台酒店拥有类型修改
				Route::any('hotel_type/hotel_type_save',[
				'uses'=>'HoteltypeController@hotel_type_save',
				]);
				//后台酒店拥有类型删除
				Route::any('hotel_type/hotel_type_del',[
				'uses'=>'HoteltypeController@hotel_type_del',
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


