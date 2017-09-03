<?php
namespace App\Http\Controllers\Admin;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Region;
class RegionController extends Controller
{
	/**
	 * 添加城市
	 * @author [meng] <[1009387442@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function region_add(Request $request)
	{
		if($request->isMethod('post')){
			$data = $request->all();
			//实例化model
			$Region = new Region;
			//添加数据入库
			$Region->region_name = $data['region_name'];
			$Region->short = $data['short'];
			$Region->sort   = $data['sort'];
			$Region->floating_value = $data['floating_value'];
			$Region->lng = $data['lng'];
			$Region->lat = $data['lat'];
			$Region->add_time = time();
			$bool = $Region->save();
			if($bool)
			{
				return Redirect::to('admin/region/region_add');
			}
			
		}else{
			return view('region_back.region_add');
		}
		
	}

	/**
	 * 修改浮动值
	 * @author [meng] <[1009387442@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function region_list()
	{
		//实例化model
		$Region = new Region;
		$list = $Region->all();
		return view('region_back.region_list',['list'=>$list]);
	}

	/**
	 * 修改浮动值
	 * @author [meng] <[1009387442@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function region_save(Request $request)
	{
		if($request->isMethod('get')){
			// $data = $request->all();
			// //实例化model
			// $Region = new Region;
			// //添加数据入库
			// $Region->region_name = $data['region_name'];
			// $Region->short = $data['short'];
			// $Region->sort   = $data['sort'];
			// $Region->floating_value = $data['floating_value'];
			// $Region->lng = $data['lng'];
			// $Region->lat = $data['lat'];
			// $Region->add_time = time();
			// $bool = $Region->save();
			// if($bool)
			// {
			// 	return Redirect::to('admin/region/region_add');
			// }
			
		}else{
			return view('region_back.region_add');
		}
	}
	
}
