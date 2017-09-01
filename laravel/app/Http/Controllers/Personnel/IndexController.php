<?php
namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use Session;

class IndexController extends Controller
{
	public function index()
	{
		return view('personnel.index');
	}

}