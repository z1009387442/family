<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\RoomsType;

class SearchController extends Controller
{
	public function index()
	{
		return view('search.search');
	}
}
