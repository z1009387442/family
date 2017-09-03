<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Hotel;
use App\Models\hotelAlbum;
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
		$hotel_arr = Hotel::where('hotel_id',$request->id)->find(1);
		$hotel=['hotel_name'=>$hotel_arr->hotel_name,
				'hotel_id'	=>$hotel_arr->hotel_id,
				'hotel_address'=>$hotel_arr->hotel_address,
				'hotel_tel'=>$hotel_arr->hotel_tel,
				'hotel_desc'=>$hotel_arr->hotel_desc,];
		//酒店图片查询
		$hotel_img_arr=hotelAlbum::where('hotel_id',$request->id)->get();
		//酒店房间类型查询 和照片查询
		$room_arr = DB::table('hotel_room_type')
            ->join('rooms_type', 'hotel_room_type.hotel_room_type_id', '=', 'rooms_type.room_type_id')
            ->join('rooms_type_album', 'hotel_room_type.hotel_room_type_id', '=', 'rooms_type_album.hotel_id')
            ->where('hotel_room_type.hotel_id',$request->id)
            ->get();
        //渲染页面传值
		return view('hotel.room',['hotel'=>$hotel,'hotel_img'=>$hotel_img_arr,'rooms'=>$room_arr]);
	}
}
