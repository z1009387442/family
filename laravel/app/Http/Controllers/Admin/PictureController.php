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
	//房间图片添加
	public function room_add_album(Request $request)
	{
		//接收数据
		$hotel_id=$request->hotel_id; //酒店id
		$room_type_id=$request->room_type_id; //房间类型
		//$data=$request->all();
		$img_path=$request->img_path; //房间图片
		$newName = md5(date('ymdhis').$img_path->getClientOriginalName()).".".$img_path->getClientOriginalExtension();   //图片重命名
		$path=$img_path->move(public_path().'\uploads/',$newName);
	
		$new_path='/uploads/'.$newName;
		$data['hotel_id']=$hotel_id;
		$data['room_type_id']=$room_type_id;
		$data['img_path']=$new_path;
		$RoomsTypeAlbum = new RoomsTypeAlbum;
		$bool=$RoomsTypeAlbum->insert($data);
		if($bool)
		{
			//return redirect('admin/picture/room_album_list');
		}
	}
	public function room_album_type_list(Request $request)
	{
		$hotel_id=$request->hotel_id; //酒店id
		$room_arr=DB::table('rooms_type_album')
			->join('rooms_type',"rooms_type_album.room_type_id",'=',"rooms_type.room_type_id")
			->where('rooms_type_album.hotel_id',$hotel_id)
			->get();
		return view('picture_back.room_type_album_list',['room_arr'=>$room_arr]);
		// $room_type_id=Type::whereIn('room_type_id',$room_type_id)->get();
		// $data['hotel_data']=$hotel_data;
		// $data['room_type_id']=$room_type_id;

	}

}