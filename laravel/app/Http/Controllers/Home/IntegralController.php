<?php
namespace App\Http\Controllers\Home;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;

class IntegralController extends Controller
{
	public function index(Request $request)
	{
		//$list = Team::all();
		return view('integral.integral');
	}
	public function convert(Request $request)
	{
		return view('integral.convert');
	}

}