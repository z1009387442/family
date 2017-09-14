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
		if ($request->isMethod('post')) {

			$data = $request->all();

			$region_one = Region::where('region_name',$data['region_name'])->first();

			if (empty($data['business_district_id'])) {

				$businessdistrict = new Businessdistrict;
				$businessdistrict->business_district_name = $data['business_district_name'];
				$businessdistrict->region_id = $region_one->region_id;
				$bool = $businessdistrict->save();
				$data['business_district_id'] = $businessdistrict->business_district_id;
			}

			$new_name = md5(rand(1,999).$data['hotel_img']->getClientOriginalName()).".".$data['hotel_img']->getClientOriginalExtension();

			$path=$data['hotel_img']->move(public_path().'/uploads/',$new_name);

			$data['hotel_img']='/uploads/'.$new_name;

			$hotel = new Hotel;

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
			if ($bool) {

				return Redirect::to('admin/hotel/hotel_list');
			}
		} else {

			$rooms_facilities = RoomsFacilities::where('status',1)->get();

			$complex_facilities = ComplexFacilities::where('status',1)->get();

			$brand = Brand::where('status',1)->get();

			return view('hotel_back.hotel_add',[
				'roomsFacilities'=>$rooms_facilities,
				'complexFacilities'=>$complex_facilities,
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

		$hotel_bool = Hotel::destroy($request->hotel_id);
		if ($hotel_bool) {

			$type_bool = Hoteltype::where('hotel_id', $request->hotel_id)->delete();
			if ($type_bool) {

				$room_bool = Room::where('hotel_id', $request->hotel_id)->delete();
				if ($room_bool) {

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

		$bool = Hotel::where('hotel_id', $request->hotel_id)
	          ->update(['status' => $request->status]);

	    if ($bool) {

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
		if($request->isMethod('post')){
			
			//判断是否修改图片
			if (empty($request->new_img)) {

				$request->hotel_img = $request->old_img;

			} else {

				$newName = md5(date('ymdhis').$request->new_img->getClientOriginalName()).".".$request->new_img->getClientOriginalExtension();

				$path=$request->new_img->move(public_path().'/uploads/',$newName);

				$request->hotel_img='/uploads/'.$newName;
			}
			//判断是否手动输入商圈
			if ($request->business_district_id == '0') {

				$businessdistrict = new Businessdistrict;

				$businessdistrict = Businessdistrict::find($request->business_id);

				$businessdistrict->business_district_name = $request->business_district_name;

				$businessdistrict->region_id = $request->region_id;

				$bool = $businessdistrict->save();

				$request->business_district_id = $businessdistrict->business_district_id;
			}

			$hotel = new Hotel;

			$hotel = Hotel::find($request->hotel_id);

			$hotel->hotel_name = $request->hotel_name;

			$hotel->region_id = $request->region_id;
			
			$hotel->brand_id = $request->brand_id;
			
			$hotel->business_district_id = $request->business_district_id;
			
			$hotel->sort   = $request->sort;
			
			$hotel->hotel_img = $request->hotel_img;
			
			$hotel->hotel_address   = $request->hotel_address;
			
			$hotel->hotel_tel   = $request->hotel_tel;
			
			$hotel->hotel_hint   = $request->hotel_hint;
			
			$hotel->hotel_fax   = $request->hotel_fax;
			
			$hotel->hotel_desc   = $request->hotel_desc;
			
			$hotel->complex_facilities_id   = implode(',',$request->complex_facilities_id);
			
			$hotel->rooms_facilities_id   = implode(',',$request->rooms_facilities_id);
			
			$hotel->status   = $request->status;
			
			$bool = $hotel->save();
			if ($bool) {

				return Redirect::to('admin/hotel/hotel_list');
			}

		}else{

			$region = Region::all();

			$hotel = Hotel::find($request->id);

			$name = DB::table('business_district')
					->select('business_district_name')
					->where('business_district_id',$hotel
				 	->business_district_id)
				 	->first();

			$hotel->business_district_name = $name->business_district_name;

			$hotel['complex_facilities_id'] = explode(',',$hotel->complex_facilities_id);
			$hotel['rooms_facilities_id'] = explode(',',$hotel->rooms_facilities_id);

			$rooms_facilities = RoomsFacilities::where('status',1)->get();

			$complex_facilities = ComplexFacilities::where('status',1)->get();

			$brand = Brand::where('status',1)->get();

			return view('hotel_back.hotel_save',[
						'hotel'=>$hotel,
						'roomsFacilities'=>$rooms_facilities,
						'complexFacilities'=>$complex_facilities,
						'brand'=>$brand,
						'complex_facilities_id'=>$hotel['complex_facilities_id'],
						'rooms_facilities_id' =>$hotel['rooms_facilities_id'],
						'region'=>$region
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
		if (!isset($request->region_id)) {

			$results = Region::where('region_name',$request->region_name)->get();

			foreach ($results as $result) {

	   			$region_id = $result->region_id;
			}
		} else {

			$region_id = $request->region_id;
		}
		
		return json_encode(Businessdistrict::where('status',1)->where('region_id',$region_id)->get()->toArray());
	}
}