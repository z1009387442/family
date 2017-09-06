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
use App\Models\RoomsTypeAlbum;
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
		$list = Room::where('hotel_id',$request->hotel_id)
				->where('room_type_id',$request->type_id)
				->get();
		return view('room_back.room_list',['list'=>$list,'type_id'=>$request->type_id,'hotel_id'=>$request->hotel_id]);
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
			$hotel = Hotel::where('status',1)->get();
			$type = Type::where('status',1)->get();
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
		$bool = Room::destroy($request->id);
		if($bool)
		{
			return Redirect::to('admin/room/room_list?hotel_id='.$request->hotel_id."&&type_id=".$request->type_id);
		}
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
			$room = new Room;
			//添加数据入库
			$room = Room::find($request->room_id);
			$room->status   = $request->status;
			$room->room_floor = $request->room_floor;
			$room->room_dicection = $request->room_dicection;
			$room->room_number = $request->room_number;
			$bool = $room->save();
			if($bool)
			{
				return Redirect::to('admin/room/room_list?hotel_id='.$room->hotel_id."&&type_id=".$room->room_type_id);
			}

		}else{
			$room = Room::find($request->id);
			$hotel = Hotel::where('status',1)->get();
			$type = Type::where('status',1)->get();
			return view('room_back.room_save',['room'=>$room,'hotel'=>$hotel,'type'=>$type,'type_id'=>$request->type_id,'hotel_id'=>$request->hotel_id]);
		}
	}
	public function room_type_album_add(Request $request)
	{
		if($request->isMethod('post'))
		{
			$hotel_id = $request->hotel_id;
			$room_type_id = $request->room_type_id;
			$img_path=$request->img_path; //房间图片
		$newName = md5(date('ymdhis').$img_path->getClientOriginalName()).".".$img_path->getClientOriginalExtension();   //图片重命名
		$path=$img_path->move(public_path().'\uploads/',$newName);
	
		$new_path='/uploads/'.$newName;
		$data['hotel_id']=$hotel_id;
		$data['room_type_id']=$room_type_id;
		$data['img_path']=$new_path;
		$RoomsTypeAlbum = new RoomsTypeAlbum;
		$bool=$RoomsTypeAlbum->insert($data);
		if($bool)
		{
			$hotel_id=$request->hotel_id; //酒店id
			$room_arr=DB::table('rooms_type_album')
			->join('rooms_type',"rooms_type_album.room_type_id",'=',"rooms_type.room_type_id")
			->where('rooms_type_album.hotel_id',$hotel_id)
			->get();
			return view('room_back.room_type_album_show',['room_arr'=>$room_arr]);
		}
		}else {

			$data['hotel_id'] = $request->hotel_id;
			$data['room_type_id'] = $request->room_type_id;
			return view('room_back.room_type_album_list',['data'=>$data]);
	}
	}
}