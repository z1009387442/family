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
		//获取关于环境评价的条数
		$h_num = Assess::where('assess_desc','like','%环境%')->count();
		//获取关于服务评价的条数
		$s_num = Assess::where('assess_desc','like','%服务%')->count();
		//获取关于位置评价的条数
		$r_num = Assess::where('assess_desc','like','%位置%')->count();
		//获取关于卫生评价的条数
		$w_num = Assess::where('assess_desc','like','%干净%')->count();
		//查询用户评价
		$keyword=mb_substr($request->keyword,0,2);
		$assess = DB::table('assess')
			   ->join('user','assess.user_id','=','user.user_id')
			   ->where('hotel_id',$request->id)
			   ->where('assess_desc','like','%'.$keyword.'%')
		       ->paginate(6);    
        //渲染页面传值
		return view('hotel.room',['hotel'=>$hotel,'hotel_img'=>$hotel_img_arr,'rooms'=>$NewArrData,'price'=>$price,'new_2'=>$complex_facilities_arr,'new_1'=>$rooms_facilities_arr,'assess'=>$assess,'h_num'=>$h_num,'s_num'=>$s_num,'r_num'=>$r_num,'w_num'=>$w_num]);
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
                        <span class="Ldib Lpl5">'.$new_str.'
                      
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