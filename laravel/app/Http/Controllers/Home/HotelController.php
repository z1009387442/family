<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function index()
	{
		return view('index.index');
	}
	public function show(Request $request){
		
		
		return view('hotel.show');
	}
}
