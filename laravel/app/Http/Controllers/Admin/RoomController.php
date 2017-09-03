<?php
namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Room;
use App\Models\Type;
use App\Models\Hotel;
class RoomController extends Controller
{
	/**
	 * 房间管理首页
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function room_list(Request $request)
	{
		$type_id = $request->type_id;
		$hotel_id = $request->hotel_id;
		$list = Room::where('hotel_id',$hotel_id)
				->where('room_type_id',$type_id)
				->get();
		return view('room_back.room_list',['list'=>$list]);
	}

	/**
	 * 房间管理添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function room_add(Request $request)
	{
		if($request->isMethod('post'))
		{
			//接收数据
			$data = $request->all();
			//实例化model
			$room = new Room;
			//添加数据入库
			$room->room_type_id = $data['type_id'];
			$room->status   = $data['status'];
			$room->hotel_id   = $data['hotel_id'];
			$room->room_floor = $data['room_floor'];
			$room->room_dicection = $data['room_dicection'];
			$room->room_number = $data['room_number'];
			$bool = $room->save();
			if($bool)
			{
				return Redirect::to('admin/room/room_list?hotel_id='.$data['hotel_id']."&&type_id=".$data['type_id']);
			}
		}else{
			$type_id = $request->type_id;
			$hotel_id = $request->hotel_id;
			$hotel = Hotel::all();
			$type = Type::all();
			// print_r($type);die;
			return view('room_back.room_add',['hotel'=>$hotel,'type'=>$type,'type_id'=>$type_id,'hotel_id'=>$hotel_id]);
		}
	}

	/**
	 * 房间管理删除
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function room_del(Request $request)
	{
		return view('room_back.room_del');
	}

	/**
	 * 房间管理修改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function room_save(Request $request)
	{
		if($request->isMethod('post'))
		{

		}else{
			return view('room_back.room_save');
		}
	}
}