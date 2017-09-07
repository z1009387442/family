<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Team;
class AboutController extends Controller
{

	/**
	 * 添加团队信息
	 */
	public function add_about(Request $request)
	{
		if($request->isMethod('post')){
			
			//接收数据
			$data = $request->all();
			//print_r($data);die;
			//将图片重命名
			$newName = md5(date('ymdhis').$data['team_images']->getClientOriginalName()).".".$data['team_images']->getClientOriginalExtension();
			//移动文件到uploads
			$path=$data['team_images']->move(public_path().'/uploads/',$newName);
			//文件访问路径
			$data['team_images']='/uploads/'.$newName;
			//实例化model
			$Team = new Team;
			//添加数据入库
			$Team->team_name = $data['team_name'];
			$Team->team_images = $data['team_images'];
			$Team->team_desc   = $data['team_desc'];
			$Team->status   = $data['status'];
			$bool = $Team->save();
			if($bool)
			{
				return Redirect::to('admin/about/team_list');
			}else{
				return view('about_back.add');
			}
		}else{
			return view('about_back.add');
		}
		
	}


	public function team_list()
	{
		$list = Team::all();
		return view('about_back.team_list',['list'=>$list]);
	}

	public function team_save(Request $request)
	{
		if($request->isMethod('post'))
		{
			//接收数据
			$data = $request->all();

			if(empty($data['team_images'])){
				$Team = new Team;
				$Team = Team::find($data['id']);
				$Team->team_name = $data['team_name'];
				$Team->team_desc   = $data['team_desc'];
				$Team->status   = $data['status'];
				$bool = $Team->save();
				
			}else{
				$newName = md5(date('ymdhis').$data['team_images']->getClientOriginalName()).".".$data['team_images']->getClientOriginalExtension();
				//移动文件到uploads
				$path=$data['team_images']->move(public_path().'/uploads/',$newName);
				//文件访问路径
				$data['team_images']='/uploads/'.$newName;
				//实例化model
				$Team = new Team;
				//添加数据入库
				$Team = Team::find($data['id']);
				$Team->team_name = $data['team_name'];
				$Team->team_images = $data['team_images'];
				$Team->team_desc   = $data['team_desc'];
				$Team->status   = $data['status'];
				$bool = $Team->save();
				
			}
			if($bool)
			{
				return Redirect::to('admin/about/team_list');
			}
			
		}else{
			$one = Team::where('id',$request->id)->first();
			return view('about_back.team_save',['one'=>$one]);
		}


	}


	public function team_del(Request $request)
	{
		//接收id
		$id = $request->id;
		//删除
		$bool = Team::destroy($id);
		if($bool)
		{
			return Redirect::to('admin/about/team_list');
		}
	}

}