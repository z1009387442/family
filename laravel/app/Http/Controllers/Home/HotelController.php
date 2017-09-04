<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
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
	public function room(){


	
	}
}
