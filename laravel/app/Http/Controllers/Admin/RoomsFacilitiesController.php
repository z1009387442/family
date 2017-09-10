<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\RoomsFacilities;

class RoomsFacilitiesController extends Controller
{
	/**
	 * 客房设施
	 * @author yanhong Yang
	 */
	public function facilities_list()
	{
		$list = RoomsFacilities::paginate(2);

		return view('rooms_facilities_back.rooms_facilities_list',['list'=>$list]);
	}

	/**
	 * 客房设施添加
	  * @author yanhong Yang
	 */
	public function facilities_add(Request $request)
	{
		if ($request->isMethod('post')) {
			$data = $request->all();
			//实例化model
			$rooms_facilities = new RoomsFacilities;
			//添加数据入库
			$rooms_facilities->rooms_facilities_name = $data['rooms_facilities_name'];
			$rooms_facilities->sort   = $data['sort'];
			$rooms_facilities->status   = $data['status'];
			$bool = $rooms_facilities->save();
			if ($bool) {

				return Redirect::to('admin/rooms/facilities_list');
			}
		} else {

			return view('rooms_facilities_back.rooms_facilities_add');
		}
	}

	/**
	 * 客房设施删除
	 * @author yanhong Yang 
	 */
	public function facilities_del(Request $request)
	{
		//接收id
		$id = $request->id;
		//删除
		$bool = RoomsFacilities::destroy($id);
		if($bool)
		{
			return Redirect::to('admin/rooms/facilities_list');
		}
	}

	/**
	 * 客房设施修改
	 * @author yanhong Yang
	 */
	public function facilities_save(Request $request)
	{
		if ($request->isMethod('post')) {
				//接收数据
				$data = $request->all();
				if (empty($data['rooms_facilities_name'])) {
					$RoomsFacilities = new RoomsFacilities;
					$RoomsFacilities = RoomsFacilities::find($data['id']);
					$RoomsFacilities->rooms_facilities_name = $data['rooms_facilities_name'];
					$RoomsFacilities->sort   = $data['sort'];
					$RoomsFacilities->status   = $data['status'];
					$bool = $RoomsFacilities->save();	
				} else {
					//实例化model
					$RoomsFacilities = new RoomsFacilities;
					//添加数据入库
					$RoomsFacilities = RoomsFacilities::find($data['id']);
					$RoomsFacilities->rooms_facilities_name = $data['rooms_facilities_name'];
					$RoomsFacilities->status   = $data['status'];
					$RoomsFacilities->sort   = $data['sort'];
					$bool = $RoomsFacilities->save();	
				}
					if($bool) {

						return Redirect::to('admin/rooms/facilities_list');
						
					}
				
		} else {

				$one = RoomsFacilities::where('rooms_facilities_id',$request->id)->first();

				return view('rooms_facilities_back.rooms_facilities_save',['one'=>$one]);
		}		
	}
}