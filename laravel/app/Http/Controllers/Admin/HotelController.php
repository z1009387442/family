<?php
namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Hotel;
use App\Models\Hoteltype;
use App\Models\Region;
use App\Models\Room;
use App\Models\ComplexFacilities;
use App\Models\RoomsFacilities;
use App\Models\Businessdistrict;
use App\Models\Brand;

class HotelController extends Controller
{
	/**
	 * 酒店管理首页
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_list(Request $request)
	{
		$list = DB::table('hotel')
			->join('region','hotel.region_id','=','region.region_id')
			->get();
		return view('hotel_back.hotel_list',['list'=>$list]);
	}

	/**
	 * 酒店管理添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_add(Request $request)
	{
		if($request->isMethod('post')){
			$data = $request->all();
			//查询地区id
			$region_one = Region::where('region_name',$data['region_name'])->first();
			if(empty($data['business_district_id'])){
				$businessdistrict = new Businessdistrict;
				$businessdistrict->business_district_name = $data['business_district_name'];
				$businessdistrict->region_id = $region_one->region_id;
				$bool = $businessdistrict->save();
				$data['business_district_id'] = $businessdistrict->business_district_id;
			}
			//将图片重命名
			$newName = md5(date('ymdhis').$data['hotel_img']->getClientOriginalName()).".".$data['hotel_img']->getClientOriginalExtension();
			//移动文件到uploads
			$path=$data['hotel_img']->move(public_path().'/uploads/',$newName);
			//文件访问路径
			$data['hotel_img']='/uploads/'.$newName;
			//实例化model
			$hotel = new Hotel;
			//添加数据入库
			$hotel->hotel_name = $data['hotel_name'];
			$hotel->region_id = $region_one->region_id;
			$hotel->brand_id = $data['brand_id'];
			$hotel->business_district_id = $data['business_district_id'];
			$hotel->sort   = $data['sort'];
			$hotel->hotel_img = $data['hotel_img'];
			$hotel->hotel_address   = $data['hotel_address'];
			$hotel->hotel_tel   = $data['hotel_tel'];
			$hotel->hotel_hint   = $data['hotel_hint'];
			$hotel->hotel_fax   = $data['hotel_fax'];
			$hotel->hotel_desc   = $data['hotel_desc'];
			$hotel->complex_facilities_id   = implode(',',$data['complex_facilities_id']);
			$hotel->rooms_facilities_id   = implode(',',$data['rooms_facilities_id']);
			$hotel->status   = $data['status'];
			$bool = $hotel->save();
			if($bool)
			{
				return Redirect::to('admin/hotel/hotel_list');
			}
		}else{
			//查询所有房间设施
			$roomsFacilities = RoomsFacilities::where('status',1)->get();
			//查询所有服务项目
			$complexFacilities = ComplexFacilities::where('status',1)->get();
			//查询所有品牌
			$brand = Brand::where('status',1)->get();
			return view('hotel_back.hotel_add',[
				'roomsFacilities'=>$roomsFacilities,
				'complexFacilities'=>$complexFacilities,
				'brand'=>$brand
			]);
		}
	}

	/**
	 * 酒店管理删除
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_del(Request $request)
	{
		//删除酒店
		$hotel_bool = Hotel::destroy($request->hotel_id);
		if($hotel_bool)
		{
			//删除酒店下的分类
			$type_bool = Hoteltype::where('hotel_id', $request->hotel_id)->delete();
			if($type_bool)
			{
				//删除酒店下的所有房间
				$room_bool = Room::where('hotel_id', $request->hotel_id)->delete();
				if($room_bool)
				{
					return 1;
				}
			}
		}

	}
	/**
	 * 酒店状态即点即改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_save_status(Request $request)
	{
		$type = new Hotel;
		//修改数据
		$bool = Hotel::where('hotel_id', $request->hotel_id)
	          ->update(['status' => $request->status]);
	    if($bool)
	    {
	    	return 1;
	    }
	}
	/**
	 * 酒店管理修改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function hotel_save(Request $request)
	{
		if($request->isMethod('post'))
		{
			$data = $request->all();
			//实例化model
			$hotel = new Hotel;
			//判断图片是否为空
			if(empty($data['hotel_img'])){
				//添加数据入库
				$hotel = Hotel::find($data['hotel_id']);
				$hotel->hotel_name = $data['hotel_name'];
				$hotel->region_id = $data['region_id'];
				$hotel->sort   = $data['sort'];
				$hotel->hotel_address   = $data['hotel_address'];
				$hotel->hotel_tel   = $data['hotel_tel'];
				$hotel->hotel_hint   = $data['hotel_hint'];
				$hotel->hotel_fax   = $data['hotel_fax'];
				$hotel->hotel_desc   = $data['hotel_desc'];
				$hotel->service_items_id   = $data['service_items_id'];
				$hotel->room_facilities_id   = $data['room_facilities_id'];
				$hotel->status   = $data['status'];
				$bool = $hotel->save();
				if($bool)
				{
					return Redirect::to('admin/hotel/hotel_list');
				}
			}else{
				$newName = md5(date('ymdhis').$data['hotel_img']->getClientOriginalName()).".".$data['hotel_img']->getClientOriginalExtension();
				//移动文件到uploads
				$path=$data['hotel_img']->move(public_path().'/uploads/',$newName);
				//文件访问路径
				$data['hotel_img']='/uploads/'.$newName;
				//添加数据入库
				$hotel = Hotel::find($data['hotel_id']);
				$hotel->hotel_name = $data['hotel_name'];
				$hotel->region_id = $data['region_id'];
				$hotel->sort   = $data['sort'];
				$hotel->hotel_img = $data['hotel_img'];
				$hotel->hotel_address   = $data['hotel_address'];
				$hotel->hotel_tel   = $data['hotel_tel'];
				$hotel->hotel_hint   = $data['hotel_hint'];
				$hotel->hotel_fax   = $data['hotel_fax'];
				$hotel->hotel_desc   = $data['hotel_desc'];
				$hotel->service_items_id   = $data['service_items_id'];
				$hotel->room_facilities_id   = $data['room_facilities_id'];
				$hotel->status   = $data['status'];
				$bool = $hotel->save();
				if($bool)
				{
					return Redirect::to('admin/hotel/hotel_list');
				}
			}
			
		}else{
			$id = $request->id;
			$hotel = Hotel::find($id);
			$hotel['complex_facilities_id'] = explode(',',$hotel->complex_facilities_id);
			$hotel['rooms_facilities_id'] = explode(',',$hotel->rooms_facilities_id);
			//查询所有房间设施
			$roomsFacilities = RoomsFacilities::where('status',1)->get();
			//查询所有服务项目
			$complexFacilities = ComplexFacilities::where('status',1)->get();
			//查询所有品牌
			$brand = Brand::where('status',1)->get();
			return view('hotel_back.hotel_save',[
				'hotel'=>$hotel,
				'roomsFacilities'=>$roomsFacilities,
				'complexFacilities'=>$complexFacilities,
				'brand'=>$brand,
				'complex_facilities_id'=>$hotel['complex_facilities_id'],
				'rooms_facilities_id' =>$hotel['rooms_facilities_id']
			]);
		}
	}
	/**
	 * 根据所选城市，查询商圈
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function business_district(Request $request)
	{
		$results = Region::where('region_name',$request->region_name)->get();
		foreach ($results as $result) {
   			$id = $result->region_id;
		}
		return json_encode(Businessdistrict::where('status',1)->where('region_id',$id)->get()->toArray());
	}
}