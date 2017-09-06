<?php
namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Hotel;
use App\Models\Region;
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
		$list = Hotel::all();
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
		if($request->isMethod('post'))
		{
			$data = $request->all();
			//查询地区id
			$region_one = Region::where('region_name',$data['region_name'])->first();
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
		}else{
			$region = Region::all();
			// print_r($region);die;
			return view('hotel_back.hotel_add',['region'=>$region]);
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

		}else{
			return view('hotel_back.hotel_save');
		}
	}
}