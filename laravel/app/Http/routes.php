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
				//酒店列表
				Route::any('hotel/show',[
				'uses'=>'HotelController@show',
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

				//前台用户注销
				Route::any('login_out',[
					'uses'=>'IndexController@login_out'
				]);

				//前台用户个人资料
				Route::any('personal_data',[
					'uses'=>'IndexController@personal_data'
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

				//前台关于团队展示
				Route::any('about/index',[
				'uses'=>'AboutController@index',
				]);

				//定制服务展示
				Route::any('made/index',[
				'uses'=>'MadeController@index',
				]);
				//积分换礼
				Route::any('integral/index',[
				'uses'=>'IntegralController@index',
				]);
				//兑换数量
				Route::any('integral/convert',[
				'uses'=>'IntegralController@convert',
				]);

				//酒店房间展示页面
				Route::any('hotel/room/id/{id}',[
				'uses'=>'HotelController@room',
				])->where(['id'=>'[0-9]+']);

				//前台关于团队展示
				Route::any('hotel/room',[
				'uses'=>'HotelController@room',
				]);

				//预订房间
				Route::any('order/create/room_type_id/{room_type_id}/hotel_id/{hotel_id}',[
				'uses'=>'OrderController@create',
				])->where(['room_type_id'=>'[0-9]+','hotel_id'=>'[0-9]+']);
				
				//生成订单
				Route::any('order/order_cre',[
				'uses'=>'OrderController@order_cre',
				]);
				
				//模拟支付页面
				Route::any('order/pay_money/order_id/{order_id}',[
				'uses'=>'OrderController@pay_money',
				])->where(['order_id'=>'[0-9]+']);

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
				//后台城市列表
				Route::any('region/region_list',[
				'uses'=>'RegionController@region_list',
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
				//后台酒店状态即点即改
				Route::any('hotel/hotel_save_status',[
				'uses'=>'HotelController@hotel_save_status',
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
				//后台房间类型状态即点即改
				Route::any('type/type_save_status',[
				'uses'=>'TypeController@type_save_status',
				]);
				//后台查询该类型下所有的房间
				Route::any('type/type_room',[
				'uses'=>'TypeController@type_room',
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
				Route::any('room/room_type_album_add',[
				'uses'=>'RoomController@room_type_album_add',
				]);
				Route::any('room/room_type_album_list',[
				'uses'=>'RoomController@room_type_album_list',
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

					//酒店内部相册添加
				Route::any('picture/hotel_album_add',[
				'uses'=>'PictureController@hotel_album_add',
				]);
				//酒店展示
				Route::any('picture/room_album_list',[
				'uses'=>'PictureController@room_album_list',
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


