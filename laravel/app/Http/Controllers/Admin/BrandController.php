<?php
namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Brand;

class BrandController extends Controller
{
	/**
	 * 品牌展示
	 * @access public
	 * @author yanhong Yang
	 */
	public function brand_list(Request $request)
	{
		$list = Brand::paginate(2);

		return view('brand_back.brand_list',['list'=>$list]);
	}

	/**
	 * 品牌添加
	 * @access public
	 * @author yanhong Yang
	 */
	public function brand_add(Request $request)
	{
		if ($request->isMethod('post')) {
			$data = $request->all();
			//实例化model
			$Brand = new Brand;
			//添加数据入库
			$Brand->brand_name = $data['brand_name'];
			$Brand->sort   = $data['sort'];
			$Brand->status   = $data['status'];
			$bool = $Brand->save();
				if ($bool) {
					return Redirect::to('admin/brand/brand_list');
				}
		} else {
			
			return view('brand_back.brand_add');
		}
	}

	/**
	 * 品牌删除
	 * @access public
	 * @author yanhong Yang
	 */
	public function brand_del(Request $request)
	{
		//接收id
		$id = $request->id;
		//删除
		$bool = Brand::destroy($id);
		if ($bool) {
			return Redirect::to('admin/brand/brand_list');
		}
	}

/**
	 * 品牌修改
	 * @access public
	 * @author yanhong Yang
	 */
	public function brand_save(Request $request)
	{

	if ($request->isMethod('post')) {
			//接收数据
			$data = $request->all();
			if (empty($data['brand_name'])) {
				$Brand = new Brand;
				$Brand = Brand::find($data['id']);
				$Brand->brand_name = $data['brand_name'];
				$Brand->sort   = $data['sort'];
				$Brand->status   = $data['status'];
				$bool = $Brand->save();	
			} else {
				//实例化model
				$Brand = new Brand;
				//添加数据入库
				$Brand = Brand::find($data['id']);
				$Brand->brand_name = $data['brand_name'];
				$Brand->status   = $data['status'];
				$Brand->sort   = $data['sort'];
				$bool = $Brand->save();
			}
				if ($bool) {
					return Redirect::to('admin/brand/brand_list');
				}
	  } else {
			$one = Brand::where('brand_id',$request->id)->first();
			return view('brand_back.brand_save',['one'=>$one]);
		}





		
	}
}