<?php

namespace App\Http\Controllers\Home;

use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;
use App\Models\Region;
use App\Libs\REST;

class IndexController extends BaseController
{
	public function index(Request $request)
	{
		$user_id = $request->session()->get('user_id');
		$img = Index::where(['user_id'=>$user_id])->first();
		if(!empty($img->img)){
			$user_img = $request->session()->put('img',$img->img);
		}else{
			$user_img = $request->session()->put('img','/qiantai/images/default.png');
		}
		
		return view('index.index');
	}

	//用户登录
	public function login(Request $request){
		if ($request->isMethod('post')) {
			$email = $request->input('email');
			$user_pwd = md5($request->input('user_pwd'));
			$user_info = Index::where(['email'=>$email,'user_pwd'=>$user_pwd])->get();
			foreach ($user_info as $v) {
			   $user_id = $v->user_id;
		  	 $user_name = $v->user_name;	 
		  	}
			
			if ($user_info->isEmpty()) {
				echo '<script>alert("用户名或密码错误")</script>';

				return view('index.login');
			}else{
				$user_id = $user_id;
				$user_name = $user_name;
				$request->session()->put('user_id',$user_id);
				$request->session()->put('user_name',$user_name);

				return redirect()->action('Home\IndexController@index');
			}
		} else {

			return view('index.login');
		}
	}

	//用户个人中心
	public function personal_data(Request $request){


		if ($request->isMethod('post')) {
			$user_id = $request->session()->get('user_id');
			$user_name = $request->input('user_name');
			$tel = $request->input('tel');
			$email = $request->input('email');
			$img = $request->input('img');
			$request->session()->put('img',$img);
			//保存修改数据
			$obj=Index::find($user_id);
			$obj->user_name = $user_name;
			$obj->email = $email;
			$obj->tel = $tel;
			$obj->img = $img;
			$bool = $obj->save();
			if($bool){

				return redirect()->action('Home\IndexController@personal_data');
			}
		}else{
			//当前用户ID
			$user_id = $request->session()->get('user_id');
			//用户基本信息
			$user_info = Index::where(['user_id'=>$user_id])->get();	

			//查询兑换券使用情况
			$detailed = DB::table('detailed')
				->join('goods','detailed.goods_id','=','goods.goods_id')
				->where('detailed.user_id',$user_id)
				->get();

			//查询订单信息
			$order = DB::table('order')
				->where('user_id',$user_id)
				->get();
			foreach ($order as $v) {
				$order_id =	$v->order_id;
				$hotel_id = $v->hotel_id;
				$room_type_id = $v->room_type_id;
				$room_num = $v->room_num;
				}
			if(empty($order)){

				return view("index.personal_data",[
					'user_info' => $user_info,
					'detailed' => $detailed,
					'order' => $order
					]);
			}else{
				//酒店信息
				$hotel_name = DB::table('hotel')
					->where('hotel_id',$hotel_id)
					->get();

				//酒店房间信息
				$room_type = DB::table('rooms_type')
					->where('room_type_id',$room_type_id)
					->get();

				//房间号
				$room_num = DB::table('rooms')
					->where('room_id',$room_num)
					->get();

				return view("index.personal_data",[
					'user_info' => $user_info,
					'detailed' => $detailed,
					'order' => $order,
					'hotel_name' => $hotel_name,
					'room_type' => $room_type,
					'room_num' => $room_num
					]);
			}
			
		}
	}

	//用户头像
	public function user_img(Request $request){
		$user_img = $request->file('uploadFile');
		//将图片重命名
		$newName = md5(date('ymdhis').$user_img->getClientOriginalName()).".".$user_img->getClientOriginalExtension();
		//移动文件到uploads
		$path = $user_img->move(public_path().'/uploads/',$newName);
		//文件访问路径
		$url='/uploads/'.$newName;

		return $url;
	}
	

	//渲染用户注册页面
	public function register(Request $request){

		return  view('index.register');
	}


	//判断用户名唯一
	public function verify_name(Request $request){
		$mingzi=Input::get('mingzi');
		$name=Index::where(['user_name'=>$mingzi])->first();
		if ($name) {

			return 0;
		} else {

			return 1;
		}
	}


	//判断邮箱唯一
	public function verify_email(Request $request){
		$youxiang = $request->input('youxiang');
		$email = Index::where(['email'=>$youxiang])->first();
		if ($email) {

			return 0;
		} else {

			return 1;
		}
	}


	//用户注册  信息添加入库
	public function register_do(Request $request){
		$user_name = $request->input('user_name');
		$email = $request->input('email');
		$tel = $request->input('tel');
		$user_pwd = md5($request->input('user_pwd'));
		//添加入库
		$obj = new Index();
		$obj->user_name = $user_name;
		$obj->user_pwd = $user_pwd;
		$obj->email = $email;
		$obj->tel = $tel;
		$bool = $obj->save();
		$user_id = $obj->user_id;
		if ($bool==true) {
			$request->session()->put('user_id',$user_id);

			return redirect()->action('Home\IndexController@index');
		}
	}

	//用户注销
	public function login_out(Request $request){
		$request->session()->flush();

		return redirect()->action('Home\IndexController@login');
	}

	/**
	 * 接收手机号 调用接口 发送验证码
	 * @return [type] [description]
	 */
	public function send_verify_code(Request $request){

		//接收前台手机号
		$tel=$request->input('tel');

		//生成随机验证码并发送
		$rand=rand("1000",'9999');
  		$arr= array($rand);
  		$save_time=time();

  		//存入session
  		$request->session()->put('save_time',$save_time);
  		$request->session()->put('verify_code',$rand);
  		$request->session()->put('tel',$tel);
		$res=$this->sendTemplateSMS($tel,$arr,"1");

		if ($res=='成功') {
			echo json_encode(0);
		} else {
			echo json_encode(1);
		}
	}
	/**
	 * [验证用户输入验证码]
	 * @return [json] [description]
	 */
	public function verify_user_code(Request $request){
		//前台数据
		$user_verify_code = $request->input('verify_code');
		$user_tel = $request->input('user_tel');

		//session数据
		$tel = $request->session()->get('tel');
		$save_time = $request->session()->get('save_time');
		$verify_code = $request->session()->get('verify_code');
		$now = time();
		if(	!$user_tel == $tel && $user_verify_code==$verify_code ){
			
			return 2;
		}

		return  ($now-$save_time <= 60)?0 : 1;
	}
	
	/**
	  * 接口调用 
	  * 发送模板短信
	  * @param to 手机号码集合,用英文逗号分开
	  * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
	  * @param $tempId 模板Id
	  */       
	public function sendTemplateSMS($to,$datas,$tempId)
	{	
		//主帐号
		$accountSid = '8aaf07085e2d97fd015e363c66bd02c1';

		//主帐号Token
		$accountToken = '4d5a7afd731746c0aae23560a936866d';

		//应用Id
		$appId ='8aaf07085e2d97fd015e3646b8a102d9';

		//请求地址，格式如下，不需要写https://
		$serverIP ='app.cloopen.com';

		//请求端口 
		$serverPort = '8883';

		//REST版本号
		$softVersion = '2013-12-26';

	    $rest = new REST($serverIP,$serverPort,$softVersion);
	    $res = $rest->setAccount($accountSid,$accountToken);
	    $rest->setAppId($appId);
	    // 发送模板短信
	    // echo "Sending TemplateSMS to $to <br/>";
	    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
	    if ($result->statusCode!=0) {

	        return  "失败";
	         //TODO 添加错误处理逻辑
	    }else{

	        return  "成功";
	         //TODO 添加成功处理逻辑
	    }
	}
	/**
	 * [用户评论]
	 * @return [const] [description]
	 */
	public function assess_desc(Request $request){
		$user_id = $request->session()->get('user_id');
		$order_id = $request->input('order_id');
		$assess_desc = $request->input('assess_desc');
		$assess_num = $request->input('assess_num');
		$hotel_id = $request->input('hotel_id');
		$res = DB::table('assess')->insert([
			'order_id'=>$order_id,
			'user_id'=>$user_id,
			'assess_desc'=>$assess_desc,
			'assess_num'=>$assess_num,
			'hotel_id'=>$hotel_id
			]);
			DB::table('order')->where('order_id',$order_id)->update([
			'status'=>1
			]);
		
		return $res ? 1 : 2;
	}

	/**
	 * 弹窗登录
	 */
	public function order_login(Request $request)
	{
		$user_email = $request->input('user_email');
		$user_pwd = md5($request->input('user_pwd'));
		$user_info = Index::where(['email'=>$user_email,'user_pwd'=>$user_pwd])->first();
		if ($user_info) {
			$user_id = $user_info->user_id;
			$user_name = $user_info->user_name;
			$request->session()->put('user_id',$user_id);
			$request->session()->put('user_name',$user_name);

			return 2;
		} else {

			return 3;
		}
	}
	
}