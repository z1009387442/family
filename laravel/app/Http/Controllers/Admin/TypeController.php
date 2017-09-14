<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Type;

class TypeController extends Controller
{
	/**
	 * 酒店类型管理首页
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $list 所有的类型
	 * @return [type] [description]
	 */
	public function type_list(Request $request)
	{
		$list = Type::where('status',1)->get();

		return view('type_back.type_list',['list'=>$list]);
	}

	/**
	 * 酒店类型管理添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $bool
	 * @return bool 
	 */
	public function type_add(Request $request)
	{
		if ($request->isMethod('post')) {

			$data = $request->all();

			$new_name = md5(rand(1,999).$data['type_img']->getClientOriginalName()).".".$data['type_img']->getClientOriginalExtension();

			$path=$data['type_img']->move(public_path().'/uploads/',$new_name);

			$data['type_img']='/uploads/'.$new_name;

			$type = new Type;

			$type->room_type_name = $data['room_type_name'];
			
			$type->bed_type = $data['bed_type'];
			
			$type->type_img = $data['type_img'];
			
			$type->max_people   = $data['max_people'];
			
			$type->room_area   = $data['room_area'];
			
			$type->rack_price   = $data['rack_price'];
			
			$type->vip_price   = $data['vip_price'];
			
			$type->room_desc   = $data['room_desc'];
			
			$type->sort   = $data['sort'];
			
			$type->status   = $data['status'];
			
			$bool = $type->save();
			
			if ($bool){

				return Redirect::to('admin/type/type_list');
			}
		} else {

			return view('type_back.type_add');
		}
	}
	/**
	 * 酒店类型管理删除
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $list 该类型下的所有房间
	 * @return object
	 */
	public function type_room(Request $request)
	{
		$list = DB::table('rooms')
				  ->join('hotel','rooms.hotel_id','=','hotel.hotel_id')
				  ->join('region','hotel.region_id','=','region.region_id')
				  ->where('rooms.room_type_id',$request->id)
				  ->get();

		return view('type_back.type_room_list',['list'=>$list]);
	}

	/**
	 * 酒店类型管理状态即点即改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function type_save_status(Request $request)
	{
		$type = new Type;

		$bool = Type::where('room_type_id', $request->type_id)
	          		->update(['status' => $request->status]);

	    if ($bool) {

	    	return 1;
	    }
	}

	/**
	 * 酒店类型管理修改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function type_save(Request $request)
	{
		if ($request->isMethod('post')) {

			$type = new Type;

			$data = $request->all();

			if (empty($data['type_img'])) {

				$type = Type::find($data['room_type_id']);
				
				$type->room_type_name = $data['room_type_name'];
				
				$type->bed_type = $data['bed_type'];
				
				$type->max_people   = $data['max_people'];
				
				$type->room_area   = $data['room_area'];
				
				$type->rack_price   = $data['rack_price'];
				
				$type->vip_price   = $data['vip_price'];
				
				$type->room_desc   = $data['room_desc'];
				
				$type->sort   = $data['sort'];
				
				$type->status   = $data['status'];
				
				$bool = $type->save();
				
				if ($bool) {

					return Redirect::to('admin/type/type_list');
				}
			} else {

				$new_name = md5(rand(1,999).$data['type_img']->getClientOriginalName()).".".$data['type_img']->getClientOriginalExtension();

				$path=$data['type_img']->move(public_path().'/uploads/',$new_name);

				$data['type_img']='/uploads/'.$new_name;

				$type = Type::find($data['room_type_id']);
				
				$type->room_type_name = $data['room_type_name'];
				
				$type->bed_type = $data['bed_type'];
				
				$type->type_img = $data['type_img'];
				
				$type->max_people   = $data['max_people'];
				
				$type->room_area   = $data['room_area'];
				
				$type->rack_price   = $data['rack_price'];
				
				$type->vip_price   = $data['vip_price'];
				
				$type->room_desc   = $data['room_desc'];
				
				$type->sort   = $data['sort'];
				
				$type->status   = $data['status'];
				
				$bool = $type->save();
				if($bool){
					
					return Redirect::to('admin/type/type_list');
				}
			}
		} else {

			$type = Type::find($request->id);
			
			return view('type_back.type_save',['type'=>$type]);
		}
	}
}