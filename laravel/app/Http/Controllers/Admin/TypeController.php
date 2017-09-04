<?php
namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Type;
class TypeController extends Controller
{
	/**
	 * 酒店类型管理首页
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function type_list(Request $request)
	{
		//查询所有数据
		$list = Type::all();
		return view('type_back.type_list',['list'=>$list]);
	}

	/**
	 * 酒店类型管理添加
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function type_add(Request $request)
	{
		if($request->isMethod('post'))
		{
			//接收数据
			$data = $request->all();
			//实例化model
			$type = new Type;
			//添加数据入库
			$type->room_type_name = $data['room_type_name'];
			$type->bed_type = $data['bed_type'];
			$type->max_people   = $data['max_people'];
			$type->room_area   = $data['room_area'];
			$type->rack_price   = $data['rack_price'];
			$type->vip_price   = $data['vip_price'];
			$type->room_desc   = $data['room_desc'];
			$type->sort   = $data['sort'];
			$type->status   = $data['status'];
			$bool = $type->save();
			if($bool)
			{
				return Redirect::to('admin/type/type_list');
			}
		}else{
			return view('type_back.type_add');
		}
	}

	/**
	 * 酒店类型管理删除
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function type_del(Request $request)
	{
		return view('type_back.type_del');
	}

	/**
	 * 酒店类型管理修改
	 * @author [meng] <[920417690@qq.com]>
	 * @access public
	 * @param  $[name] [description]
	 * @return [type] [description]
	 */
	public function type_save(Request $request)
	{
		if($request->isMethod('post'))
		{

		}else{
			return view('type_back.type_save');
		}
	}
}