<?php
namespace App\Http\Controllers\Home;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;

class AboutController extends Controller
{
	public function index(Request $request)
	{
		$list = Team::all();
		return view('about.about',['list'=>$list]);
	}
	

}