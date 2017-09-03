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
class HoteltypeController extends Controller
{
	/**
	 * 酒店管理首页
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_type_list(Request $request)
	{
		//获取酒店id
		$hotel_id = $request->get('id');
		//查询酒店拥有分类的id
		$hotel_types = Hoteltype::where('hotel_id', $hotel_id)->get();
		//获取酒店拥有类型单列
		foreach($hotel_types as $hotel_type)
		{
			$hotel_type_id[] = $hotel_type->hotel_room_type_id;
		}
		//查询所有分类
		$types = Type::all();
		//获取所有分类id
		foreach($types as $type){
			$type_id[] = $type ->room_type_id;
		}
		if(empty($hotel_type_id))
		{
			$type_list = Type::all();
		}else{
			//对比酒店已有类型id和所有类型id
			$other_id = array_diff($type_id,$hotel_type_id);
			//如果other_id为空说明
			if(empty($other_id))
			{
				$type_list = '';
			}else{
				//查询酒店还没有的房间类型
				$type_list = Type::whereIn('room_type_id' ,$other_id)->get();
			}
		}
		if(empty($hotel_type_id))
		{
			$list = "";
		}else{
			//根据关联id查询酒店拥有的类型
			$list = Type::whereIn('room_type_id' ,$hotel_type_id)->get();
		}
		return view('hotel_type_back.hotel_type_list',['type_list'=>$type_list,'list'=>$list,'hotel_id'=>$hotel_id]);
	}

	/**
	 * 酒店管理添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_type_add(Request $request)
	{
		$hotel_room_type_id = $request->hotel_room_type_id;;
		$hotel_id = $request->hotel_id;
		// dd($hotel_room_type_id);die;
		$data = '';
		foreach($hotel_room_type_id as $k=>$v)
		{
			$data[$k]['hotel_id'] = $hotel_id;
			$data[$k]['hotel_room_type_id'] = $v;
		}
		$bool = Hoteltype::insert($data);
		if($bool)
		{
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
		
	}

	/**
	 * 酒店管理修改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_type_save(Request $request)
	{
		if($request->isMethod('post'))
		{

		}else{
			return view('hotel_back.hotel_save');
		}
	}
}