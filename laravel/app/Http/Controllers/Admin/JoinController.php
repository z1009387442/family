<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Join;

class JoinController extends Controller
{
	/**
	 * 招商
	 */
	public function join_list(Request $request)
	{
		$list = Join::all();

		return view('join_back.join_list',['list'=>$list]);
	}

}