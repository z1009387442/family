<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Discounts;
use Redirect;
use Illuminate\Support\Facades\Input;


class DiscountsController extends Controller
{

	 /**
	 * 酒店折扣展示
	 * @access public
	 * @author yanhong Yang
	 */
	public function discounts_list(Request $request)
	{
	
	 $list = DB::table('discounts')
		->join('hotel','discounts.hotel_id','=','hotel.hotel_id')
		->get();
	
		return view('discounts_back.discounts_list',['list'=>$list]);
	}

	/**
	 * [selectPay description]
	 * 酒店折扣添加
	 * @access public
	 * @author yangyan hong
	 * @return [type]     id [description]
	 */
	public function discounts_add(Request $request)
	{
		if ($request->isMethod('post')) {
			//接收数据
			$hotel_id=$request->hotel_id;
			$hotel = Hotel::where('hotel_id','=',$hotel_id)->first();
			//入库数据
			$data = $request->all();
			$discounts = new Discounts;
			//添加数据入库
			$discounts->hotel_id = $hotel->hotel_id;
			$discounts->discounts_num = $request->discounts_num;
			$discounts->region_id = $hotel->region_id;
			$discounts->sort = $request->sort;

			$bool = $discounts->save();
				if ($bool) {
					
					return Redirect::to('admin/discounts/discounts_list');
			       }
		    } else {
			  $hotel = Hotel::all();

			return view('discounts_back.discounts_add',['hotel'=>$hotel]);
			}
	}

	 /**
	 * 酒店折扣删除
	 * @access public
	 * @author yanhong Yang
	 */
		public function discounts_del(Request $request)
	{
		//接收id
		$id = $request->id;
		//删除
		$bool = Discounts::destroy($id);
		if ($bool) {

			return Redirect::to('admin/discounts/discounts_list');
		}
	}



}