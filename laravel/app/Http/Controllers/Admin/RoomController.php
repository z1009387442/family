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
	 * @param  $list 所有的房间
	 * @return [object]
	 */
	public function room_list(Request $request)
	{
		$list = Room::where('hotel_id',$request->hotel_id)
					->where('room_type_id',$request->type_id)
				    ->get();

		return view('room_back.room_list',[
					'list'=>$list,
					'type_id'=>$request->type_id,
					'hotel_id'=>$request->hotel_id
				]);
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
		if ($request->isMethod('post')) {

			$room = new Room;

			$room->room_type_id = $request->type_id;

			$room->status   = $request->status;
			
			$room->hotel_id   = $request->hotel_id;
			
			$room->room_floor = $request->room_floor;
			
			$room->room_dicection = $request->room_dicection;
			
			$room->room_number = $request->room_number;
			
			$bool = $room->save();

			if ($bool) {

				return Redirect::to('admin/room/room_list?hotel_id='.$request->hotel_id."&&type_id=".$request->type_id);
			}
		} else {

			$type_id = $request->type_id;

			$hotel_id = $request->hotel_id;
			
			$hotel = Hotel::where('status',1)->get();
			
			$type = Type::where('status',1)->get();

			return view('room_back.room_add',[
						'hotel'=>$hotel,
					    'type'=>$type,
				        'type_id'=>$type_id,
						'hotel_id'=>$hotel_id
					]);
		}
	}

	/**
	 * 房间管理删除
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $bool 删除成功的返回值
	 * @return bool
	 */
	public function room_del(Request $request)
	{
		$bool = Room::destroy($request->id);

		if ($bool) {

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
		if ($request->isMethod('post')) {

			$room = new Room;

			$room = Room::find($request->room_id);

			$room->status   = $request->status;

			$room->room_floor = $request->room_floor;
			
			$room->room_dicection = $request->room_dicection;
			
			$room->room_number = $request->room_number;
			
			$bool = $room->save();
			
			if ($bool) {
				return Redirect::to('admin/room/room_list?hotel_id='.$room->hotel_id."&&type_id=".$room->room_type_id);
			}
		} else {

			$room = Room::find($request->id);
			
			$hotel = Hotel::where('status',1)->get();
			
			$type = Type::where('status',1)->get();
			
			return view('room_back.room_save',[
						'room'=>$room,
						'hotel'=>$hotel,
						'type'=>$type,
						'type_id'=>$request->type_id,
						'hotel_id'=>$request->hotel_id]);
		}
	}

	/**
	 * 房间管理相册添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function room_type_album_add(Request $request)
	{
		if ($request->isMethod('post')) {

			$hotel_id = $request->hotel_id;

			$room_type_id = $request->room_type_id;
			
			$img_path=$request->img_path; //房间图片
			
			$new_name = md5(rand(1,999).$img_path->getClientOriginalName()).".".$img_path->getClientOriginalExtension();   //图片重命名
			
			$path=$img_path->move(public_path().'\uploads/',$new_name);
		
			$new_path='/uploads/'.$new_name;
			
			$data['hotel_id']=$hotel_id;
			
			$data['room_type_id']=$room_type_id;
			
			$data['img_path']=$new_path;
			
			$rooms_type_album = new RoomsTypeAlbum;
			
			$bool=$rooms_type_album->insert($data);
			
			if ($bool) {

				$hotel_id=$request->hotel_id; 

				$room_arr=DB::table('rooms_type_album')
							->join('rooms_type',"rooms_type_album.room_type_id",'=',"rooms_type.room_type_id")
							->where('rooms_type_album.hotel_id',$hotel_id)
							->get();

				return view('room_back.room_type_album_show',['room_arr'=>$room_arr]);
			}

		} else {

			$data['hotel_id'] = $request->hotel_id;

			$data['room_type_id'] = $request->room_type_id;

			return view('room_back.room_type_album_list',['data'=>$data]);
		}
	}
}