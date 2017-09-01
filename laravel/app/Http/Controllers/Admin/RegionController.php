<?php
namespace App\Http\Controllers\Admin;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
class RegionController extends Controller
{
	/**
	 * 添加城市
	 * @author [meng] <[1009387442@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function region_add()
	{
		return view('region_back.region_add');
	}

	
}
