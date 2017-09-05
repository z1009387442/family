<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelAlbum;
use App\Models\HotelRoomType;
use App\Models\Type;
use App\Models\RoomsTypeAlbum;
use Illuminate\Support\Facades\Input;


class PictureController extends Controller
{
	//酒店内部相册添加
	public function hotel_album_add(Request $request)
	{
		if($request->isMethod('post'))
		{
			//接收数据
			$hotel_id=$request->hotel_id;
			$file=$request->hotel_img;
			foreach ($file as $k=>$v) {				
			$newName = md5(date('ymdhis').$v->getClientOriginalName()).".".$v->getClientOriginalExtension();   //图片重命名
			$path=$v->move(public_path().'\uploads/',$newName);
		
			$new_path[]='/uploads/'.$newName;
			
			}
			$HotelAlbum = new HotelAlbum;
			$data['hotel_id']=$hotel_id;
			$data['hotel_img']=$new_path;
			$new_data=array();
			foreach ($data['hotel_img'] as $key => $value) {
				$new_data[$key]['hotel_id']=$data['hotel_id'];
				$new_data[$key]['hotel_img']=$value;
			}
			$bool=$HotelAlbum->insert($new_data);
			if($bool)
			{
				return redirect('admin/picture/hotel_album_add');
			}
		}else {
			$hotel=Hotel::all();
			return view('picture_back.hotel_album',['hotel'=>$hotel]);
		}
	}
	//酒店房间操作
	public function room_album_list(Request $request)
	{
		
			$hotel=Hotel::all();

			return view('picture_back.room_album',['hotel'=>$hotel]);		
	}

	//酒店编辑
	public function room_album_add(Request $request)
	{
		//接收数据
		$hotel_id=$request->hotel_id; //酒店id
		$HotelRoomType=  new HotelRoomType;
		$hotel_data=$HotelRoomType->where(['hotel_id'=>$hotel_id])->get();
		$room_type_id=[];
		foreach ($hotel_data as $k=>$v)
		{
			$room_type_id[]=$v['room_type_id'];
		}
		$room_type_id=Type::whereIn('room_type_id',$room_type_id)->get();
		$data['room_type_id']=$room_type_id;
		$data['hotel_id']=$hotel_id;
		return view('picture_back.room_type_album',['data'=>$data]);
		
	}


}