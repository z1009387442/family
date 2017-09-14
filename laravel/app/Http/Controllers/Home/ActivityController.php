<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Discounts;
use App\Models\Region;
use App\Models\Hotel;

class ActivityController extends Controller
{

    public function index()
    {
    	//查询打折表
		$act_arr=Discounts::get()->toArray();
		//查询所有酒店
		$hotel_arr=Hotel::get()->toArray();

		$hotel_info=[];
		//获取所有酒店的ID
		$id=array_column($act_arr,'hotel_id');
		//将酒店匹配出
		$hotel_arr['new_']=Hotel::whereIn('hotel_id',$id)->get()->toArray();
		//追加打折
		foreach ($hotel_arr['new_'] as $key=>$val) {
				$hotel_arr['new_'][$key]['discount']=$act_arr[$key]['discounts_num'];
		}
		//把酒店根据地区id分成数组
		foreach ($hotel_arr['new_'] as $k=>$v) {
		    if (!isset($hotel_info[$v['region_id']])) {
		        $hotel_info[$v['region_id']][]=$v;
		    } else {
		        $hotel_info[$v['region_id']][]=$v;
		    }
		}
		$region_id=array_values(array_unique(array_column($act_arr,'region_id')));
		$region_arr=Region::whereIn('region_id',$region_id)->get()->toArray();
		$hotel_info=array_values($hotel_info);
		//发送数
		return view('activity.index',[
			'hotel'=>$hotel_info,
			'region'=>$region_arr
		]);
    }
}
