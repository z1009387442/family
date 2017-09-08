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
	 * 城市列表
	 * @author [meng] <[1009387442@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function region_list()
	{
		$data = DB::table('region')->paginate(15);
		return view('region_back.region_list',['data' => $data]);
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
		if($request->isMethod('post')){
			$floating_value = $request->floating_value;
			$region_id = $request->region_id;
			//实例化model
			$Region = new Region;
			$Region = Region::find($region_id);
			//添加数据入库
			$Region->floating_value = $floating_value;
			$Region->update_time = time();
			$bool = $Region->save();
			if($bool){
				return Redirect::to('admin/region/region_list');
			}
		}
		else{
				$region_id = $request->id;
				$data = Region::find($region_id);
				return view('region_back.region_list_save',['data' => $data]);
		}
	}
	
}
