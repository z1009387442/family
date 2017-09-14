<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Region;
use App\Models\RoomsType;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends BaseController
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
		$room_data = RoomsType::find($room_type_id);//房间类型照片信息、数据 room_type		
		$hotel_data=Hotel::find($hotel_id);//查酒店表，酒店地址和名字hotel
		$region_data=Region::find($hotel_data->region_id);//获取当前酒店地区
		$real_price=['price'=>substr($region_data->floating_value,2),'up_down'=>substr($region_data->floating_value,0,1)];
		if ($real_price['up_down']==1) {
			$room_data->vip_price=ceil(($room_data->vip_price)*(1+$real_price['price']/100));
		} else {
			$room_data->vip_price=ceil(($room_data->vip_price)*(1-$real_price['price']/100));
		}
		$my_date['today']=Carbon::now()->toDateString();
		$my_date['tomorrow']=Carbon::tomorrow('Europe/London')->toDateString();

		return view('order.create',[
			'my_date'=>$my_date,
			'room_data'=>$room_data,
			'hotel_data'=>$hotel_data
		]);
	}

	public function order_cre(Request $request)
	{
		$hotel_id=$request->input('hotel_id');
		$room_type_id=$request->input('room_type_id');
		$room_price=$request->input('room_price');
		$check_time=$request->input('check_time');
		$end_time=$request->input('end_time');
		if ($check_time=='') {
			$check_time=Carbon::now()->toDateString();
		}
		if ($end_time=='') {
			$end_time=Carbon::tomorrow('Europe/London')->toDateString();
		}
		$start_date=strtotime($check_time);
		$end_date=strtotime($end_time);
		$total_days=round(($end_date-$start_date)/3600/24);
		$room_sum=$request->input('room_sum');
		$resident_people=$request->input('resident_people');//数组
		$cell_phone=$request->input('cell_phone');
		$total_price=$room_price*$room_sum*$total_days;//计算房费总价
		$order_sn=$this->get_sn();//获取订单号
		$resident_people=$this->get_peo($resident_people);//获取入住人
		//获取用户ID
		if ($request->session()->has('user_id')) {
			$user_id=$request->session()->has('user_id');
		} else {
			$user_id=0;
		}
		//生成订单
		$order=new Order;
		$order->user_id=$user_id;
		$order->order_sn=$order_sn;
		$order->check_time=$check_time;
		$order->end_time=$end_time;
		$order->room_num=$room_sum;
		$order->resident_people=$resident_people;
		$order->cell_phone=$cell_phone;
		$order->hotel_id=$hotel_id;
		$order->room_type_id=$room_type_id;
		$order->total_price=$total_price;
		if ($order->save()) {
			//生成订单去支付
			return Redirect::to('home/pay/select/order_id/'.$order->order_id);
		}
	
	}

	public function get_sn()
	{
		$dt=Carbon::now();
		return 'sunshine-'.$dt->timestamp.rand(1000,9999);
	}

	public function get_peo($resident_people)
	{
		if (!empty($resident_people)) {

			return implode('|',$resident_people);
		} else {
			
			return '';
		}	
		
	}

	public function pay_money(Request $request)
	{
		return $request->order_id;//接收订单号
	}
}
