<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vendor\Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Input;
use App\Models\Admin;
use Session;

class LoginController extends Controller
{
	public function index()
	{
		return 1;
	}

	/**
	 * [登录 description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function login(Request $request)
	{
		if ($request->isMethod('post')) {
			//接收数据
			$name=$request->input('name');
			$pwd=$request->input('pwd');
			//根据姓名和密码查询数据
			$admin_info=Admin::where(['name'=>$name,'pwd'=>$pwd])->first();						
			if ($admin_info) {
				//查询到管理员信息
				$admin_id=$admin_info->id;			
				$admin_name=$admin_info->name;
				//把管理员信息存储到session				
				$request->session()->put('admin_id', $admin_id);
				$request->session()->put('admin_name', $admin_name);				
				return redirect('/admin/index/index');
			} else {
				//未查询到管理员信息
				return view('login_back.index');				
			}			
		} else {

			return view('login_back.index');
		}
		
	}

	/**
	 * [注册 description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function regist(Request $request)
	{
		if ($request->isMethod('post')) {
			$admin=new Admin;
			$admin->name=$request->name;
			$admin->pwd=$request->pwd;
			$admin->email=$request->email;
			$admin->tel=$request->tel;
			$res=$admin->save();
			if ($res) {
				//注册成功
				$request->session()->put('admin_id', $admin->id);
				$request->session()->put('admin_name', $admin->name);

				return redirect('/admin/index/index');			
			} else {

				return view('login_back.regist');
			}
		} else {

			return view('login_back.regist');
		}
		
	}
	/**
	 * [判断用户名是否重复注册 description]
	 * @return [type] [description]
	 */
	public function check_name()
	{
		$admin_name=Input::get('admin_name')?Input::get('admin_name'):"";
		$admin_info=Admin::where('name',$admin_name)->first();
		if ($admin_info) {

			return 4;//重复
		} else {

			return 2;//不重复
		}
	}

	public function logout(Request $request)
	{
		if ($request->session()->has('admin_id')&&$request->session()->has('admin_name')) {
            $is_forget=$request->session()->forget('admin_id');
            $is_forget=$request->session()->forget('admin_name');
            if($is_forget===null){

            	return redirect('/admin/login/login');
            }else{

            	return redirect('/admin/index/index');
            }
        } else {
        	
        	return redirect('/admin/index/index');
        }
	}

}