@extends('magic.qiantai')


@section('title', '预订房间')
@section('header')
    @parent
@endsection

@section('content')
<style>
	.payType{
		width: 200px;
		height: 200px;
		display: inline-block;
		margin-left: 20px;
		cursor: pointer;
	}
	.payType:hover{

		background-color: #65D8C4;
		padding-bottom: 50px;
	}
	.bor{
		border: 2px solid #ED4B4B;
	}
	.pay{
		display: inline-block;
		width: 150px;
		height: 50px;
		line-height: 50px;
		border: 1px solid #E0DFDF;
		background-color: #56FD06;
		font-size: 25px;
		color: #fff;
		margin-top: 50px;
		cursor: pointer;
	}
	.pay:hover{
		background-color: #C8B928;
	}

</style>
<div align="center" style="margin-top: 30px;">
	<h1>选择支付方式</h1>
	<div style="margin-top: 30px;">
		<div class="payType"><img src="/qiantai/images/weixin.gif" data-id=1 alt="" width="195" height="195"></div>
		<div class="payType"><img src="/qiantai/images/zhifubao.gif" data-id=2 alt="" width="195" height="195"></div>
		<div class="payType"><img src="/qiantai/images/duihuanquan.gif" data-id=3 alt="" width="195" height="195"></div>
		<div class="payType"><img src="/qiantai/images/yve.gif" data-id=4 alt="" width="195" height="195"></div>
		<input type="hidden" value="{{$id}}" class="order">
	</div>
	<span class="pay">确认支付</span>
</div>
<script>
	$('.payType').click(function() {
		$(this).addClass('bor')
		$(this).siblings().removeClass('bor')
	})
	$('.pay').click(function() {
		var orderId = $('.order').val()
		var payType = $('.bor').find('img').data('id')
		location.href='/home/pay/create/'+orderId+'/'+payType
	})
</script>
@endsection

@section('footer')
  @parent
@endsection