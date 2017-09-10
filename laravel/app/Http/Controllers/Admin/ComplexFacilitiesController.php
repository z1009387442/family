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
	 * @link   {{string}}
	 * @param  [type]     $id [description]
	 * @return [type]         [description]
	 */
	public function facilities_list(Request $request)
	{
		$list = complexFacilities::all();

		return view('complex_facilities_back.complex_facilities_list',['list'=>$list]);
	}

	/**
	 * 综合设施添加
	 * @access public
	 * @author yanhong Yang
	 * @link   {{string}}
	 * @param  [type]     $id [description]
	 * @return [type]         [description]
	 */
	public function facilities_add(Request $request)
	{
		if ($request->isMethod('post')) {
			$data = $request->all();
			//实例化model
			$ComplexFacilities = new ComplexFacilities;
			//添加数据入库
			$ComplexFacilities->complex_facilities_name = $data['complex_facilities_name'];
			$ComplexFacilities->sort   = $data['sort'];
			$ComplexFacilities->status   = $data['status'];
			$bool = $ComplexFacilities->save();
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
	 * @link   {{string}}
	 * @param  [type]     $id [description]
	 * @return [type]         [description]
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
	 * @link   {{string}}
	 * @param  [type]     $id [description]
	 * @return [type]         [description]
	 */
	public function facilities_save(Request $request)
	{

	if ($request->isMethod('post')) {
			//接收数据
			$data = $request->all();
			if (empty($data['complex_facilities_name'])) {
				$complexFacilities = new complexFacilities;
				$complexFacilities = complexFacilities::find($data['id']);
				$complexFacilities->complex_facilities_name = $data['complex_facilities_name'];
				$complexFacilities->sort   = $data['sort'];
				$complexFacilities->status   = $data['status'];
				$bool = $complexFacilities->save();	
			} else {
				//实例化model
				$complexFacilities = new complexFacilities;
				//添加数据入库
				$complexFacilities = complexFacilities::find($data['id']);
				$complexFacilities->complex_facilities_name = $data['complex_facilities_name'];
				$complexFacilities->status   = $data['status'];
				$complexFacilities->sort   = $data['sort'];
				$bool = $complexFacilities->save();
			}
				if ($bool) {
					return Redirect::to('admin/complex/facilities_list');
				}
	  } else {
			$one = complexFacilities::where('complex_facilities_id',$request->id)->first();
			return view('complex_facilities_back.complex_facilities_save',['one'=>$one]);
		}





		
	}
}