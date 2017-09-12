<?php
namespace App\Http\Controllers\Home;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Join;

class JoinController extends BaseController
{
	/**
	 * 加盟注册添加
	 */
	public function index(Request $request)
	{
		if ($request->isMethod('post')) {
		//接收数据
			$data = $request->all();
			//实例化model
			$Join = new Join;
			//添加数据入库
			$Join->join_people_name = $data['join_people_name'];
			$Join->join_people_phone = $data['join_people_phone'];
			$Join->join_people_sex = $data['join_people_sex'];
			$Join->join_people_age = $data['join_people_age'];
			$Join->join_people_email = $data['join_people_email'];
			$Join->join_people_fax = $data['join_people_fax'];
			$Join->join_people_tel = $data['join_people_tel'];
			$Join->join_people_business = $data['join_people_business'];
			$Join->join_people_address = $data['join_people_address'];
			$Join->hotel_city_name = $data['hotel_city_name'];
			$Join->corporation = $data['corporation'];
			$Join->area = $data['area'];
			$Join->tenement = $data['tenement'];
			$Join->tenement_address = $data['tenement_address'];
			$Join->property = $data['property'];
			$Join->others = $data['others'];
			$bool = $Join->save();
			if ($bool) {
				echo '<script>alert("已经提交成功，等待结果吧！亲")</script>';

				return view('index.index');
			}
		} else {
			return view('join.index');
		}
	}
}