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
	/**
	 * [selectPay description]
	 * 酒店内部相册添加
	 * @access public
	 * @author cex
	 * @return [type]     id [description]
	 */
	public function hotel_album_add(Request $request)
	{
		if ($request->isMethod('post')) {
			//接收数据
			$hotel_id=$request->hotel_id;
			$file=$request->hotel_img;
			foreach ($file as $k=>$v) {	
			//图片重命名			
			$newName = md5(date('ymdhis').$v->getClientOriginalName()).".".$v->getClientOriginalExtension();   
			$path=$v->move(public_path().'\uploads/',$newName);
			$new_path[]='/uploads/'.$newName;
			}
			$HotelAlbum = new HotelAlbum;
			$data['hotel_id'] =$hotel_id;
			$data['hotel_img']=$new_path;
			$new_data=array();
			foreach ($data['hotel_img'] as $key => $value) {
				$new_data[$key]['hotel_id']=$data['hotel_id'];
				$new_data[$key]['hotel_img']=$value;
			}
			$bool=$HotelAlbum->insert($new_data);
			if ($bool) {

				return redirect('admin/picture/hotel_album_add');
			}
		} else {
			$hotel=Hotel::all();

			return view('picture_back.hotel_album',['hotel'=>$hotel]);
		}
	}



}