<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Goods;

class GoodsController extends Controller
{
	/**
	 * 商品积分
	 * @author yanhong Yang
	 * @link   {{string}}
	 */
	public function goods_list(Request $request)
	{
		$list = Goods::paginate(2);

		return view('goods_back.goods_list',['list'=>$list]);
	}

	/**
	 * 商品积分添加
	 * @author yanhong Yang
	 * @link   {{string}}
	  */
	public function goods_add(Request $request)
	{
		if ($request->isMethod('post')) {
		//接收数据
			$data = $request->all();
			//print_r($data);die;
			//将图片重命名
			$newName = md5(date('ymdhis').$data['goods_img']->getClientOriginalName()).".".$data['goods_img']->getClientOriginalExtension();
			//移动文件到uploads
			$path=$data['goods_img']->move(public_path().'/uploads/',$newName);
			//文件访问路径
			$data['goods_img']='/uploads/'.$newName;
			//实例化model
			$goods = new Goods;
			//添加数据入库
			$goods->goods_name = $data['goods_name'];
			$goods->goods_price = $data['goods_price'];
			$goods->goods_desc = $data['goods_desc'];
			$goods->goods_img = $data['goods_img'];
			$goods->goods_desc   = $data['goods_desc'];
			$goods->use_of   = $data['use_of'];
			$bool = $goods->save();

			if ($bool) {

				return Redirect::to('admin/goods/goods_list');
			}
		} else {

			return view('goods_back.goods_add');
		}
	}

	/**
	 * 商品积分删除
	 * @author yanhong Yang
	 * @link   {{string}} 
	 */
	public function goods_del(Request $request)
	{
		//接收id
		$id = $request->id;
		//删除
		$bool = goods::destroy($id);
		
		if ($bool) {

			return Redirect::to('admin/goods/goods_list');
		}
	}

	/**
	 * 商品积分修改
	 * @author yanhong Yang
	 * @link   {{string}}
	 */
	public function goods_save(Request $request)
	{

		if($request->isMethod('post'))
			{
				//接收数据
				$data = $request->all();

				if (empty($data['goods_img'])) {
					
					$goods = new Goods;
					$goods = goods::find($data['goods_id']);
					$goods->goods_name = $data['goods_name'];
					$goods->goods_price   = $data['goods_price'];
					$goods->goods_desc   = $data['goods_desc'];
					$goods->use_of   = $data['use_of'];
					$bool = $goods->save();				
				} else {

					$newName = md5(date('ymdhis').$data['goods_img']->getClientOriginalName()).".".$data['goods_img']->getClientOriginalExtension();
					//移动文件到uploads
					$path=$data['goods_img']->move(public_path().'/uploads/',$newName);
					//文件访问路径
					$data['goods_img']='/uploads/'.$newName;
					//实例化model
					$goods = new Goods;
					//添加数据入库
					$goods = goods::find($data['goods_id']);
					$goods->goods_name = $data['goods_name'];
					$goods->goods_img = $data['goods_img'];
					$goods->goods_price   = $data['goods_price'];
					$goods->goods_desc   = $data['goods_desc'];
					$goods->use_of   = $data['use_of'];
					$bool = $goods->save();
					
				}
				if ($bool) {

					return Redirect::to('admin/goods/goods_list');
				}
				
			} else {

				$one = Goods::where('goods_id',$request->id)->first();

				return view('goods_back.goods_save',['one'=>$one]);
			}
	}
}