@extends('magic.qiantai')


@section('title', '预订房间')
@section('header')
    @parent
@endsection

@section('content')
<style>
	
	.index{
		color:#18AF03;
		font-size: 25px;
	}
	.integral{
		color: #FA0808;
	}
	.order_sn{
		font-size: 30px;
		color: #038CBF;
	}
</style>
	<div align="center" style="margin-top: 30px;">
		<h2>预定房间成功</h2>
		<h3>您的住房码为：<span class="order_sn">{{$order_sn}}</span>&nbsp;&nbsp;&nbsp;&nbsp;	
		@if($integral)
			赠送您<span class="integral">{{$integral}}</span>积分
		@endif
		</h3>
		<h5>请务必保存好住房号码，防止泄露，到酒店柜台请出示身份证<a class="index" href="{{url('home/index/index')}}">返回首页</a></h5>
	</div>
@endsection

@section('footer')
  @parent
@endsection