<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\ComplexFacilities;

class ComplexFacilitiesController extends Controller
{
	/**
	 * 综合设施展示
	 * @access public
	 * @author yanhong Yang
	 */
	public function facilities_list(Request $request)
	{
		$list = complexFacilities::paginate(2);

		return view('complex_facilities_back.complex_facilities_list',['list'=>$list]);
	}

	/**
	 * 综合设施添加
	 * @access public
	 * @author yanhong Yang
	 */
	public function facilities_add(Request $request)
	{
		if ($request->isMethod('post')) {

			$data = $request->all();
			//实例化model
			$complex_facilities = new ComplexFacilities;
			//添加数据入库
			$complex_facilities->complex_facilities_name = $data['complex_facilities_name'];
			$complex_facilities->sort   = $data['sort'];
			$complex_facilities->status   = $data['status'];
			$bool = $complex_facilities->save();
				if ($bool) {

					return Redirect::to('admin/complex/facilities_list');
				}
		} else {
			
			return view('complex_facilities_back.complex_facilities_add');
		}
	}

	/**
	 * 综合设施删除
	 * @access public
	 * @author yanhong Yang
	 */
	public function facilities_del(Request $request)
	{
		//接收id
		$id = $request->id;
		//删除
		$bool = ComplexFacilities::destroy($id);

		if ($bool) {

			return Redirect::to('admin/complex/facilities_list');
		}
	}

/**
	 * 综合设施修改
	 * @access public
	 * @author yanhong Yang
	 */
	public function facilities_save(Request $request)
	{

		if ($request->isMethod('post')) {
				//接收数据
				$data = $request->all();
				$complex_facilities = new complexFacilities;
				//添加数据入库
				$complex_facilities = complexFacilities::find($data['id']);
				$complex_facilities->complex_facilities_name = $data['complex_facilities_name'];
				$complex_facilities->status   = $data['status'];
				$complex_facilities->sort   = $data['sort'];
		        $bool = $complex_facilities->save();
				if ($bool) {

					return Redirect::to('admin/complex/facilities_list');
				}
		  } else {
				$one = complexfacilities::where('complex_facilities_id',$request->id)->first();

				return view('complex_facilities_back.complex_facilities_save',['one'=>$one]);
		 }
	}

}