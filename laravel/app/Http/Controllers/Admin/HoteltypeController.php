<?php
namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Hotel;
use App\Models\Hoteltype;
use App\Models\Type;
use App\Models\Room;

class HoteltypeController extends Controller
{
	/**
	 * 酒店管理首页
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $list 所有的类型
	 * @return object
	 */
	public function hotel_type_list(Request $request)
	{
		$hotel_id = $request->get('id');

		$hotel_types = Hoteltype::where('hotel_id', $hotel_id)->get();

		foreach ($hotel_types as $hotel_type)
		{
			$hotel_type_id[] = $hotel_type->hotel_room_type_id;
		}

		$types = Type::where('status',1)->get();

		foreach ($types as $type)
		{
			$type_id[] = $type ->room_type_id;
		}

		if (empty($hotel_type_id)) {

			$type_list = Type::where('status',1)->get();

		} else {

			$other_id = array_diff($type_id,$hotel_type_id);

			if (empty($other_id)) {

				$type_list = '';

			} else {

				$type_list = Type::where('status',1)->whereIn('room_type_id' ,$other_id)->get();
			}
		}
		if (empty($hotel_type_id)) {

			$list = "";

		} else {

			$list = Type::whereIn('room_type_id' ,$hotel_type_id)->get();
		}
		return view('hotel_type_back.hotel_type_list',[
					'type_list'=>$type_list,
					'list'=>$list,
					'hotel_id'=>$hotel_id
				]);
	}

	/**
	 * 酒店管理添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $bool 
	 * @return bool
	 */
	public function hotel_type_add(Request $request)
	{
		$hotel_room_type_id = $request->hotel_room_type_id;

		$hotel_id = $request->hotel_id;
		
		$data = '';
		
		foreach ($hotel_room_type_id as $k=>$v)
		{
			$data[$k]['hotel_id'] = $hotel_id;
			$data[$k]['hotel_room_type_id'] = $v;
		}
		
		$bool = Hoteltype::insert($data);
		
		if ($bool) {

			return Redirect::to('admin/hotel_type/hotel_type_list?id='."$hotel_id");
		}
	}

	/**
	 * 酒店管理删除
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_type_del(Request $request)
	{

		$type_bool = Hoteltype::where('hotel_id',$request->hotel_id)->where('hotel_room_type_id', $request->room_type_id)->delete();
		
		if ($type_bool) {

			$room_bool = Room::where('hotel_id',$request->hotel_id)->where('room_type_id', $request->room_type_id)->delete();

			if ($room_bool) {
				
				return 1;
			}
		}
	
	}
}