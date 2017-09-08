<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Hotel;
use App\Models\HotelAlbum;
use App\Models\Region;
use App\Models\ComplexFacilities;
use App\Models\RoomsFacilities;
class HotelController extends Controller
{
    public function index()
	{
		return view('index.index');
	}
	public function show(Request $request){

		$Hotel_arr = DB::table('region')
            ->join('hotel', 'region.region_id', '=', 'hotel.region_id')
            ->where('region.region_name',$request->city_name)
            ->get();
		return view('hotel.show',['hotel_arr'=>$Hotel_arr]);
	}
	
	public function room(Request $request){
		//酒店 的详细信息
		$hotel_arr = Hotel::where('hotel_id',$request->id)->find($request->id);
		$hotel=['hotel_name'=>$hotel_arr->hotel_name,
				'hotel_id'	=>$hotel_arr->hotel_id,
				'hotel_address'=>$hotel_arr->hotel_address,
				'hotel_tel'=>$hotel_arr->hotel_tel,
				'hotel_desc'=>$hotel_arr->hotel_desc,
				'hotel_img'=>$hotel_arr->hotel_img,
				'hotel_hint'=>$hotel_arr->hotel_hint,
				'rooms_facilities_id'=>$hotel_arr->rooms_facilities_id,
				'complex_facilities_id'=>$hotel_arr->complex_facilities_id,
				];
		//酒店图片查询
		$hotel_img_arr=HotelAlbum::where('hotel_id',$request->id)->get();
		//查看房间有没有
		$room_status=DB::select('SELECT room_type_id, count(`status`)as a FROM `sun_rooms` where `status`=1 group by room_type_id');
		$room_status = json_decode(json_encode($room_status),true);

		$arrRoomTypeId = array_column($room_status, 'room_type_id');
		$arrNewRoomStatus = array_combine($arrRoomTypeId, $room_status);
		$room_arr = DB::table('rooms_type')
            ->join('hotel_room_type', 'rooms_type.room_type_id', '=', 'hotel_room_type.hotel_room_type_id')
            ->where('hotel_room_type.hotel_id',$request->id)
            ->get();
        $room_arr = json_decode(json_encode($room_arr),true);

		$arrRoomTypeId2 = array_column($room_arr, 'room_type_id');
		$Newroom_arr = array_combine($arrRoomTypeId2, $room_arr);
		foreach ($Newroom_arr as $k => $v) {
			if(!isset($arrNewRoomStatus[$k])){
				$NewArrData[] = array_merge(['a' => 0], $Newroom_arr[$k]);
			}else{
				$NewArrData[] = array_merge($arrNewRoomStatus[$k], $Newroom_arr[$k]);
			}	
		}
		//查询客房设施
		$complex_facilities_arr=ComplexFacilities::whereIn('complex_facilities_id',explode(',',$hotel['complex_facilities_id']))->get();

		//查询服务项目
		$rooms_facilities_arr=RoomsFacilities::whereIn('rooms_facilities_id',explode(',',$hotel['rooms_facilities_id']))->get();
        //查询地区房间的买的价格
		$region_arr=Region::find($hotel_arr->region_id);
		$price=['price'=>substr($region_arr->floating_value,2),'up_down'=>substr($region_arr->floating_value,0,1)];
        //渲染页面传值
		return view('hotel.room',['hotel'=>$hotel,'hotel_img'=>$hotel_img_arr,'rooms'=>$NewArrData,'price'=>$price,'new_2'=>$complex_facilities_arr,'new_1'=>$rooms_facilities_arr]);
	}

}