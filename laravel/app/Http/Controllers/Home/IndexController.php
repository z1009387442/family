<?php
namespace App\Http\Controllers\Home;
use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
	public function index()
	{
		return view('index.index');
	}
	

}