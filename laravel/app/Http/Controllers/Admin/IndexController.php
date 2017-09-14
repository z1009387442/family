<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Input;
use App\Models\HotelContact;

class IndexController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}

}