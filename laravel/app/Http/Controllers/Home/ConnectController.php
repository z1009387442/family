<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConnectController extends Controller
{
	public function album()
	{
		return view('Connect/album');
	}
    
}
