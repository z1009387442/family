<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Hotel;

class BaseController extends Controller
{
   	public function __construct()
   	{
   		$this->getHotHotel();
   	}


   	/**
   	 * [getHotHotel description]
   	 * 描述：获取热门酒店
   	 * @access public
   	 * @author JiaHui Wang
   	 * @link   {{string}}
   	 * @return [type]     [description]
   	 */
   	private function getHotHotel()
   	{
   		$arrHotHotel = Hotel::join('region', 'region.region_id', '=', 'hotel.region_id')
   		->take(3)->get()->toArray();

   		$newHotHotel = $this->get_price($arrHotHotel);
   		
   		view()->share('hot_hotel', $newHotHotel);
   	}



    /**
     * 获取酒店列表最低价格
     */
    public function get_price($hotel_arr)
    {
    	// p($hotel_arr);die;
    	//下标从0开始
		$hotel_arr = array_values($hotel_arr);
		$price_arr = [
			'floating_value' => substr($hotel_arr[0]['floating_value'], 2),
			'up_down' => substr($hotel_arr[0]['floating_value'], 0, 1)
		];
		
		//获取所有酒店id
		foreach($hotel_arr as $kk=>$vv){
			$h_id[] = $vv['hotel_id'];
		}
		$h_id = implode(' or `hotel_id` = ',$h_id);

		$hotel_type_arr = DB::select("select * from `sun_hotel_room_type` where `hotel_id` = $h_id");
        $hotel_type_arr = json_decode(json_encode($hotel_type_arr),true);

        //查询所有房型
        $rooms_type_arr = DB::select('select `room_type_id`,`rack_price` from sun_rooms_type');
        $rooms_type_arr = json_decode(json_encode($rooms_type_arr),true);

        // p($rooms_type_arr);die;
        foreach($hotel_type_arr as $key=>&$val){
        	foreach($rooms_type_arr as $kkk=>$vvv){
        		if ($val['hotel_room_type_id'] == $vvv['room_type_id']) {
        			$val['price'] = $vvv['rack_price'];

        			$hotel_price_arr[$val['hotel_id']]['hotel_id'] = $val['hotel_id'];

        			if (isset($hotel_price_arr[$val['hotel_id']]['price'])) {
        				$hotel_price_arr[$val['hotel_id']]['price'] = ($hotel_price_arr[$val['hotel_id']]['price'] > $val['price'] ? $val['price'] : $hotel_price_arr[$val['hotel_id']]['price']);
        
        			} else {
        				$hotel_price_arr[$val['hotel_id']]['price'] = $val['price'];
        			}

        		}
        	}
        	
        }

        foreach($hotel_arr as $ks => $vs){
        	foreach($hotel_price_arr as $kks => $vvs){
        		if ($vs['hotel_id'] == $vvs['hotel_id']) {
        			$price = $price_arr['up_down']==1 ? $vvs['price']+$vvs['price']*$price_arr['floating_value']/100 : $vvs['price']-$vvs['price']*$price_arr['floating_value']/100;
        			$hotel_arr[$ks]['price'] = ceil($price);
        		}
        	}
        }
        	return $hotel_arr;
    }
}
