<?php
namespace App\Http\Controllers\Home;
use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;
use App\Models\Region;

class IndexController extends Controller
{
	public function index(Request $request)
	{
		$data = $this->getCity();
		// p($data);
		return view('index.index');
	}


	private function getCity()
	{
		return Region::all();
	}
	

}