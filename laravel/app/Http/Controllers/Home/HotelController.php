<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Hotel;
use App\Models\HotelAlbum;
use App\Models\Region;
use App\Models\Assess;
use App\Models\ComplexFacilities;
use App\Models\RoomsFacilities;
use App\Models\Brand;
use Illuminate\Support\Facades\Redis;

class HotelController extends BaseController
{
    public function index()
	{
		return view('index.index');
	}

	public function show(Request $request){

		$hotel_count = DB::table('region')
            ->join('hotel', 'region.region_id', '=', 'hotel.region_id')
            ->where('region.region_name',$request->city_name)
            ->count();
           
		$hotel_arr = DB::table('region')
            ->join('hotel', 'region.region_id', '=', 'hotel.region_id')
            ->where('region.region_name',$request->city_name)
            ->offset(0)->limit(10)->get();
            // echo "<pre>";
            // print_r($hotel_arr);die;
        //所有品牌
        $brand_arr = Brand::all();
        //所有设施
        $facilities_arr = RoomsFacilities::all();
        //所有服务项目
        $complex_arr = ComplexFacilities::all();

        $hotel_arr = json_decode(json_encode($hotel_arr),true);
        if (empty($hotel_arr)) {

			return '暂未搜索到符合条件的酒店！';
		}else{
			$region_id = $hotel_arr[0]['region_id'];
			$business_arr = DB::table('business_district')->select('business_district_id','business_district_name')->where('region_id','=',$region_id)->get();
		}
		// p($hotel_arr);die;
        //获取最低价格
        $hotel_arr = $this->get_price($hotel_arr);

        $hotel_page = ceil($hotel_count/10);

        	return view('hotel.show',[
        			'hotel_arr' => $hotel_arr,
        			'brand' => $brand_arr,
        			'facilities' => $facilities_arr,
        			'complex' => $complex_arr,
        			'count' => $hotel_count,
        			'business_arr' => $business_arr,
        			'hotel_count' => $hotel_count,
        			'hotel_page' => $hotel_page,
        		]);
		
	}

	/**
	 * 酒店搜索
	 */
	public function hotel_search(Request $request)
	{
		//当前页
		$page = $request->page;
		//echo $page;die;

		//商圈搜索
		$business_district_id = $request->business_district_id;
		$business_district_id = explode(',',$business_district_id);
		//价格搜索
		$price_type = $request->price_type;
		$price_type_arr = explode(',',$price_type);

		//设施id
		$rooms_facilities_id = $request->rooms_facilities_id;
		$rooms_facilities_id = explode(',',$rooms_facilities_id);
		//服务id
		$complex_facilities_id = $request->complex_facilities_id;
		$complex_facilities_id = explode(',',$complex_facilities_id);
		//品牌id
		$brand_id = $request->brand_id;
		$brand_id = explode(',',$brand_id);


		$redis = new \Redis();
		$redis->connect('127.0.0.1',6379);
		if($redis->get("$request->city_name")){
			$hotel_arr = $redis->get("$request->city_name");//获取变量值
			$hotel_arr = json_decode($hotel_arr,true);
		}else{
			$hotel_arr = DB::table('region')
            ->join('hotel', 'region.region_id', '=', 'hotel.region_id')
            ->where('region.region_name',$request->city_name)
            ->get();
	        $hotel_arr = json_decode(json_encode($hotel_arr),true);
	        $hotel_arrs = json_encode($hotel_arr);//避免第一次缓存没有结果
	        $redis->set($request->city_name,$hotel_arrs);
		}

        //品牌
		if($brand_id[0]!=''){
			foreach($hotel_arr as $k=>&$v){
				$num = 0;
        		foreach($brand_id as $key=>$val){
        			$coun = count($brand_id);
	        		if ( $v['brand_id'] == $val ){
	        			
	        			break;
	        		}else{
	        			$num++;
	        			if( $num == $coun ){
	        				unset($hotel_arr[$k]);
	        			}
	        		}
        		}
        	}
		}

        //设施
		if($rooms_facilities_id[0]!=''){
			foreach($hotel_arr as $k=>&$v){
        	$v['rooms_facilities_id'] = explode(',',$v['rooms_facilities_id']);
        		foreach($rooms_facilities_id as $key=>$val){
        			if (!in_array($val,$v['rooms_facilities_id'])) {
 						unset($hotel_arr[$k]);
        			}

        		}
        	}
		}
		//服务
		if($complex_facilities_id[0]!=''){
			foreach($hotel_arr as $k=>&$v){
        	$v['complex_facilities_id'] = explode(',',$v['complex_facilities_id']);
        		foreach($complex_facilities_id as $key=>$val){
        			if (!in_array($val,$v['complex_facilities_id'])) {
 						unset($hotel_arr[$k]);
        			}

        		}
        	}
		}

		if (empty($hotel_arr)) {

			return '暂未搜索到符合条件的酒店！';
		} else {
			if ($business_district_id[0]!='') {
			foreach($business_district_id as $kkk=>$vvv){
				$business_district_id[] = $vvv;
			}
			$business_district_id = implode(' or `business_district_id` = ',$business_district_id);
			
			// $region_id = $hotel_arr[0]['region_id'];
			$business_arr = DB::select("select business_district_id,business_district_name from `sun_business_district` where `business_district_id` = $business_district_id");
			
			$business_arr = json_decode(json_encode($business_arr),true);
		
				if ($business_arr[0]!='') {
					foreach($hotel_arr as $k=>&$v){
						$num = 0;
		        		foreach($business_arr as $key=>$val){
		        			$coun = count($business_arr);
			        		if ( $v['business_district_id'] == $val['business_district_id'] ){

			        			break;
			        		}else{
			        			$num++;
			        			if( $num == $coun ){
			        				unset($hotel_arr[$k]);
			        			}
			        		}
		        		}
		        	}
				}
			}

		}
		


		//获取最低价格
		$hotel_arr = $this->get_price($hotel_arr);

		if ($price_type_arr[0]!='') {
			foreach($hotel_arr as $k=>&$v){
        	$num = 0;
        		foreach($price_type_arr as $key=>$val){
        			$cou = count($price_type_arr);
        			$value = explode('-',$val);
	        		if ( $value[0] < $v['price'] && $v['price'] < $value[1] ){
	        			
	        			break;
	        		}else{
	        			
	        			$num++;
	        			if( $num == $cou ){
	        				
	        				unset($hotel_arr[$k]);
	        			}
	        		}
        		}
        	}
		}
		
		if(empty($hotel_arr)){

			return '暂未搜索到符合条件的酒店！';
		}

		$hotel_count = count($hotel_arr);
		$hotel_page = ceil($hotel_count/10);
		$limit = ($page-1)*10;

		$hotel_arr = array_slice($hotel_arr,$limit,10);
		// echo "<pre>";
		// print_r($hotel_arr);die;

		return view('hotel.search',[
				'hotel_arr' => $hotel_arr,
				'count' => $hotel_count,
				'hotel_page' => $hotel_page,
				'page' => $page,
			]);
	}


	/**
	 * 全部酒店展示
	 */
	public function show_all(Request $request){
	
		$hotel_arr = DB::table('hotel')->get();

		return view('hotel.show',['hotel_arr' => $hotel_arr]);
	}
	
	/**
	 * 酒店 的详细信息
	 */
	public function room(Request $request){
		
		$hotel_arr = Hotel::where('hotel_id',$request->id)->find($request->id);
		$hotel=[
			'hotel_name'            => $hotel_arr->hotel_name,
			'hotel_id'              => $hotel_arr->hotel_id,
			'hotel_address'         => $hotel_arr->hotel_address,
			'hotel_tel'             => $hotel_arr->hotel_tel,
			'hotel_desc'            => $hotel_arr->hotel_desc,
			'hotel_img'             => $hotel_arr->hotel_img,
			'hotel_hint'            => $hotel_arr->hotel_hint,
			'rooms_facilities_id'   => $hotel_arr->rooms_facilities_id,
			'complex_facilities_id' => $hotel_arr->complex_facilities_id,
		];
		//酒店图片查询
		$hotel_img_arr=HotelAlbum::where('hotel_id',$request->id)->get();
		//查看房间有没有
		$room_status=DB::select('SELECT room_type_id, count(`status`)as a FROM `sun_rooms` where `status`=1 and hotel_id='.$request->id.' group by room_type_id');
		$room_status = json_decode(json_encode($room_status),true);
		$arr_room_type_id = array_column($room_status, 'room_type_id');
		$arr_new_room_status = array_combine($arr_room_type_id, $room_status);
		$room_arr = DB::table('rooms_type')
            ->join('hotel_room_type', 'rooms_type.room_type_id', '=', 'hotel_room_type.hotel_room_type_id')
            ->where('hotel_room_type.hotel_id',$request->id)
            ->get();
        $room_arr = json_decode(json_encode($room_arr),true);

		$arr_room_type_id2 = array_column($room_arr, 'room_type_id');
		$newroom_arr = array_combine($arr_room_type_id2, $room_arr);
		if (empty($newroom_arr)) {

			return "<center><h1>酒店正在维护中...</h1><a href='".url('home/index/index')."'>返回首页</a><center>";
		}
			foreach ($newroom_arr as $k => $v) {
				if (!isset($arr_new_room_status[$k])) {
					$new_arr_data[] = array_merge(['a' => 0], $newroom_arr[$k]);
				} else {
					$new_arr_data[] = array_merge($arr_new_room_status[$k], $newroom_arr[$k]);
				}	
			}
			//查询客房设施
		$complex_facilities_arr=ComplexFacilities::whereIn('complex_facilities_id',explode(',',$hotel['complex_facilities_id']))->get();

		//查询服务项目
		$rooms_facilities_arr=RoomsFacilities::whereIn('rooms_facilities_id',explode(',',$hotel['rooms_facilities_id']))->get();
        //查询地区房间的买的价格
		$region_arr=Region::find($hotel_arr->region_id);
		$price=['price'=>substr($region_arr->floating_value,2),'up_down'=>substr($region_arr->floating_value,0,1)];
		//获取关于环境评价的条数
		$h_num = Assess::where('hotel_id',$request->id)->where('assess_desc','like','%环境%')->count();
		//获取关于服务评价的条数
		$s_num = Assess::where('hotel_id',$request->id)->where('assess_desc','like','%服务%')->count();
		//获取关于位置评价的条数
		$r_num = Assess::where('hotel_id',$request->id)->where('assess_desc','like','%位置%')->count();
		//获取关于卫生评价的条数
		$w_num = Assess::where('hotel_id',$request->id)->where('assess_desc','like','%干净%')->count();
		//查询用户评价
		$keyword=mb_substr($request->keyword,0,2);
		$assess = DB::table('assess')
			   ->join('user','assess.user_id','=','user.user_id')
			   ->where('hotel_id',$request->id)
			   ->where('assess_desc','like','%'.$keyword.'%')
		       ->paginate(6);    
        //渲染页面传值
		return view('hotel.room',[
				'hotel'=>$hotel,
				'hotel_img'=>$hotel_img_arr,
				'rooms'=>$new_arr_data,
				'price'=>$price,
				'new_2'=>$complex_facilities_arr,
				'new_1'=>$rooms_facilities_arr,
				'assess'=>$assess,
				'h_num'=>$h_num,
				's_num'=>$s_num,
				'r_num'=>$r_num,
				'w_num'=>$w_num
			]);
	}
	/**
	 * 评价关键字查询
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function assess(Request $request)
	{
		//echo $request->id;
		//查询的关键字
		$keyword=mb_substr($request->keyword,0,2);
		$assess = DB::table('assess')
			   ->join('user','assess.user_id','=','user.user_id')
			   ->where('hotel_id',$request->hotel_id)
			   ->where('assess_desc','like','%'.$keyword.'%')
		       ->paginate(6);
		$new_str='';
		foreach($assess as $v){

		for($i = 0;$i<$v->assess_num;$i++){
			$new_str.='<font style="color: red">★</font>';
		};


	echo '<div class="commentbox Lovh">
        <div class="commentitem" data-hotel-id="4302232">
            <div class="user"><img src="'.$v->img.'" width="53" height="53" class="img"><span class="name">'.$v->user_name.'</span>
                
                <span class="memberlevel">会员</span>
                
            </div>
            <div>
                <div class="commentitemlist">
                    
                    <div class="replybox">
                        <div class="reply"><div class="cont">酒店回复：尊敬的客户，感谢您的入住并留下宝贵的意见，我们一直致力于为您打造一个温馨甜蜜之家，您入住得舒适舒心是我们的最高追求。期待您再次光临。</div></div>
                        
                        <i class="Cicon arrow " style="display: inline;"></i>
                    </div>
                    
                    <div class="ctextbox">

                        <div class="ctext"><div class="cont"><span>'.$v->assess_desc.'</span> </div></div>
                        <i class="Cicon arrow"></i>
                    </div>
                    
                   
                    
                </div>
                
                <div class="cbottom Ltar Lcfx">
                    <span class="score Lfll">
                        <span class="Ldib Lpl5">'.$new_str.$v->assess_num.'<i>分</i></span>
                      
                        <i class="Cicon small_phone">
                        </i>
                    </span>
                    <span class="cdate">'.$v->created_at.'</span>
                </div>
            </div>
        </div>
    </div>';
}
echo '<div class="pages" style="height: 87px; float: right">'.$assess->links().'</div></div></div>';

 	}

}