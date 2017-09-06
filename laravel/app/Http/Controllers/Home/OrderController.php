<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\RoomsType;
use App\Models\RoomsTypeAlbum;
use App\Models\Order;

class OrderController extends Controller
{
	/**
	 * [生成订单]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function create(Request $request)
	{
		$room_type_id=$request->room_type_id;//接收房间类型ID
		$hotel_id=$request->hotel_id;//接收房间类型ID
		//房间类型照片信息、数据 room_type
		$room_data = RoomsType::find($room_type_id);
		//查房间类型表和房间类型的相册表room_type_albunm
		$room_img = RoomsTypeAlbum::find($room_type_id);
		//查酒店表，酒店地址和名字hotel
		$hotel_data=Hotel::find($hotel_id);//用name和address
		
		return view('order.create',['room_data'=>$room_data,'room_img'=>$room_img,'hotel_data'=>$hotel_data]);

	}

	public function order_cre(Request $request)
	{
		$hotel_id=$request->input('hotel_id');
		$room_type_id=$request->input('room_type_id');
		$room_price=$request->input('room_price');
		$check_time=$request->input('check_time');
		$end_time=$request->input('end_time');
		$room_sum=$request->input('room_sum');
		$resident_people=$request->input('resident_people');//数组
		$cell_phone=$request->input('cell_phone');



		$total_price=$room_price*$room_sum;//计算房费总价
		$order_sn=$this->get_sn();//获取订单号
		$resident_people=$this->get_peo($resident_people);//获取入住人
		//获取用户ID
		if($request->session()->has('user_id')){
			$user_id=$request->session()->has('user_id');
		}else{
			$user_id=0;
		}
		//生成订单
		$order=new Order;
		$order->user_id = $user_id;
		$order->order_sn = $order_sn;
		$order->check_time =$check_time;
		$order->end_time =$end_time;
		$order->room_num =$room_sum;
		$order->resident_people =$resident_people;
		$order->cell_phone =$cell_phone;
		$order->hotel_id =$hotel_id;
		$order->room_type_id =$room_type_id;
		$order->total_price =$total_price;
		if($order->save()){
			//生成订单去支付
			return Redirect::to('home/order/pay_money');
		}


		die;	
	}

	public function get_sn()
	{
		return 'sunshine-'.date('Ymd').rand(1000,9999);
	}

	public function get_peo($arr)
	{
		$str='';
		foreach($arr as $k=>$v){
			$str.='|'.$v;
		}
		$str=substr($str,1);
		return $str;
	}

	public function pay_money()
	{
		return 123;
	}
}
