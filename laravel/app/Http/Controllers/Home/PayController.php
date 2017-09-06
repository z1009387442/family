<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PayController extends Controller
{



    public function create()
    {
    	// 创建支付单。
		$alipay = app('alipay.web');
		$alipay->setOutTradeNo('4324242255211');
		$alipay->setTotalFee('0.01');
		$alipay->setSubject('测试');
		$alipay->setBody('测试desc');
		
		// $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

		// 跳转到支付页面。
		return redirect()->to($alipay->getPayLink());

    }


    public function webNotify()
    {
    	// 验证请求。
		if (! app('alipay.web')->verify()) {
			Log::notice('Alipay notify post data verification fail.', [
				'data' => Request::instance()->getContent()
			]);
			return 'fail';
		}

		// 判断通知类型。
		switch (Input::get('trade_status')) {
			case 'TRADE_SUCCESS':
			case 'TRADE_FINISHED':
				// TODO: 支付成功，取得订单号进行其它相关操作。
				Log::debug('Alipay notify post data verification success.', [
					'out_trade_no' => Input::get('out_trade_no'),
					'trade_no' => Input::get('trade_no')
				]);
				break;
		}
	
		return 'success';
    }



    public function webReturn()
	{
		// 验证请求。
		if (! app('alipay.web')->verify()) {
			Log::notice('Alipay return query data verification fail.', [
				'data' => Request::getQueryString()
			]);
			return view('alipay.fail');
		}

		// 判断通知类型。
		switch (Input::get('trade_status')) {
			case 'TRADE_SUCCESS':
			case 'TRADE_FINISHED':
				// TODO: 支付成功，取得订单号进行其它相关操作。
				Log::debug('Alipay notify get data verification success.', [
					'out_trade_no' => Input::get('out_trade_no'),
					'trade_no' => Input::get('trade_no')
				]);
				break;
		}

		return view('alipay.success');
	}



	function yiPage()
	{
		p($_POST);
	}


	function tongPage()
	{
		p($_GET);
	}
}
