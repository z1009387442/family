<?php
return [

	// 安全检验码，以数字和字母组成的32位字符。
	'key' => '1cvr0ix35iyy7qbkgs3gwymeiqlgromm',

	//签名方式
	'sign_type' => 'MD5',

	// 服务器异步通知页面路径。
	'notify_url' => 'http://www.sunshine.com/home/pay/webReturn',

	// 页面跳转同步通知页面路径。
	'return_url' => 'http://www.sunshine.com/home/pay/webNotify'
];
