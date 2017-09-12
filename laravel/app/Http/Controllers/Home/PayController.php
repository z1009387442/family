<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Hotel;
use App\Models\RoomsType;
use App\Models\IntegralLog;
use App\Models\Index;
use Illuminate\Support\Facades\Input;
use App\Models\Detailed;
use App\Models\Goods;

/**
 * 支付控制器
 */
class PayController extends Controller
{

	/**
	 * [selectPay description]
	 * 描述：选择支付方式
	 * @access public
	 * @author JiaHui Wang
	 * @link   {{string}}
	 * @param  [type]     $id [description]
	 * @return [type]         [description]
	 */
	public function selectPay($id)
	{
		return view('pay/pay-select', [
            'id' => $id,
        ]);
	}


	/**
	 * [create description]
	 * 描述：创建支付
	 * @access public
	 * @author JiaHui Wang
	 * @link   {{string}}
	 * @param  [type]     $orderId [description]
	 * @param  [type]     $payType [description]
	 * @return [type]              [description]
	 */
    public function create($orderId, $payType)
    {

    	Order::where('order_id', $orderId)->update(['pay_type' => $payType]);
    	switch ($payType) {
    		case 1 : 
    		    $this->weixin($orderId); break;

    		case 2 : 
		        $PayLink = $this->zhifubao($orderId);
			    return redirect()->to($PayLink);

    		case 3 : 
			    $this->credential($orderId);
			    break;

    		case 4 : 
			    $arrReturn = $this->yve($orderId);

			if ($arrReturn['status'] == 1) {

				return view($arrReturn['link'], [
                    'order_sn' => Order::find($orderId)->order_sn, 
                    'integral' => $arrReturn['integral']
                ]);

			} else {

				return view($arrReturn['link'], [
                    'error' => '账户余额不足'
                ]);

			}
    	}

    }





    /**
     * [weixin description]
     * 描述：微信支付
     * @access public
     * @author JiaHui Wang
     * @link   {{string}}
     * @param  [type]     $orderId [description]
     * @return [type]              [description]
     */
    public function weixin($orderId)
    {
    	echo "暂未实现";die;
    }





    /**
     * [credential description]
     * 描述：兑换券支付
     * @access public
     * @author JiaHui Wang
     * @link   {{string}}
     * @param  [type]     $orderId [description]
     * @return [type]              [description]
     */
    public function credential($orderId)
    {
    	echo "暂未实现";die;
    }





    /**
     * [yve description]
     * 描述：余额支付
     * @access public
     * @author JiaHui Wang
     * @link   {{string}}
     * @param  [type]     $orderId [description]
     * @return [type]              [description]
     */
    public function yve($orderId)
    {
    	$order_arr = Order::find($orderId);

    	$user_arr = Index::where('user_id','=',\Session::get('user_id'))->first();

    	$balance = $user_arr->balance-$order_arr->total_price;

    	if ($balance >= 0) {

    		Index::where('user_id', '=', \Session::get('user_id'))->update(['balance' => $balance]);
    		//修改订单付款状态
    		Order::where('order_id', '=', $orderId)->update(['pay_status' => 1]);
    		//给用户增加积分
    		$num = $user_arr['integral'] + ceil($order_arr['total_price']);
    		Index::where('user_id', \Session::get('user_id'))->update(['integral' => $num]);
    		//积分日志拼装数组
    		$arrLog = [
                'action' => '预定房间', 'num' => ceil($order_arr['total_price']), 
                'order_sn' => $order_arr['order_sn'], 
                'regulation' => 1, 
                'user_id' => \Session::get('user_id'), 
                'create_at' => time()
            ];
    		//插入积分操作
			IntegralLog::insert($arrLog);

    			
    		return [
                'link' => 'pay.end', 
                'status' =>1,
                'integral' => ceil($order_arr['total_price'])
            ];

    	}else{

    		return [
                'link' => 'pay.error', 
                'status' => 2
            ];

    	}

    }





    /**
     * [zhifubao description]
     * 描述：支付宝支付
     * @access public
     * @author JiaHui Wang
     * @link   {{string}}
     * @param  [type]     $orderId [description]
     * @return [type]              [description]
     */
    public function zhifubao($orderId)
    {

    	$orderData = Order::find($orderId);

    	$hotelName = Hotel::select('hotel_name')
    	->where('hotel_id', $orderData->hotel_id)
    	->first();

    	$roomType = RoomsType::select('room_type_name','room_desc')
    	->where('room_type_id', $orderData->room_type_id)
    	->first();


    	// 创建支付单。
		$alipay = app('alipay.web');
		$alipay->setOutTradeNo($orderData->order_sn);
		$alipay->setTotalFee('0.01');
		$alipay->setSubject($hotelName->hotel_name.$roomType->room_type_name);
		$alipay->setBody($roomType->room_desc);

		//返回支付链接
		return $alipay->getPayLink();
    }







    /**
     * [webNotify description]
     * 描述：支付宝异步通知页面
     * @access public
     * @author JiaHui Wang
     * @link   {{string}}
     * @return [type]     [description]
     */
    public function webNotify()
    {
    	// 验证请求。
		if (! app('alipay.web')->verify()) {
			//支付失败
			return view('pay.error',[
                'error'=>'支付宝余额不足',
            ]);
		}

		// 判断通知类型。
		switch (Input::get('trade_status')) {
			case 'TRADE_SUCCESS':
			case 'TRADE_FINISHED':

			Order::where('order_sn', Input::get('out_trade_no'))->update(['pay_status' => 1]);

			$arrIntegralLod = Index::find(\Session::get('user_id'));

			if ($arrIntegralLod) {

				$num = $arrIntegralLod['integral'] + ceil(Input::get('total_fee'));

				Index::where('user_id', \Session::get('user_id'))->update(['integral' => $num]);

			}

			$arrLog = [
    			'action' => '预定房间', 
    			'num' => ceil(Input::get('total_fee')),
    			'order_sn' => Input::get('out_trade_no'),
    			'regulation' => 1,
    			'user_id' => \Session::get('user_id'), 
    			'create_at' => time()
			];

			IntegralLog::insert($arrLog);
		}
	
		return view('pay.end', ['order_sn' => Input::get('out_trade_no')]);
    }




    /**
     * [webReturn description]
     * 描述：支付宝同步支付页面
     * @access public
     * @author JiaHui Wang
     * @link   {{string}}
     * @return [type]     [description]
     */
    public function webReturn()
	{
		// 验证请求。
		if (! app('alipay.web')->verify()) {
			return view('pay.error',['error'=>'支付宝支付异常']);
		}

		// 判断通知类型。
		switch (Input::get('trade_status')) {
			case 'TRADE_SUCCESS':
			case 'TRADE_FINISHED':
			Order::where('order_sn', Input::get('out_trade_no'))->update(['pay_status' => 1]);

            $arrIntegralLod = Index::find(\Session::get('user_id'));

            if ($arrIntegralLod) {

                $num = $arrIntegralLod['integral'] + ceil(Input::get('total_fee'));

                Index::where('user_id', \Session::get('user_id'))->update(['integral' => $num]);

            }

            $arrLog = [
                'action' => '预定房间', 
                'num' => ceil(Input::get('total_fee')),
                'order_sn' => Input::get('out_trade_no'),
                'regulation' => 1,
                'user_id' => \Session::get('user_id'), 
                'create_at' => time()
            ];
            IntegralLog::insert($arrLog);
                break;
        }
    
        return view('pay.end', [
            'order_sn' => Input::get('out_trade_no'),
            'integral' => ceil(Input::get('total_fee'))
        ]);
	}

}
