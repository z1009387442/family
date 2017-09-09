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
</style>
	<div align="center" style="margin-top: 30px;">
		<h2>预定房间失败</h2>
		<h3>失败原因可能为：{{$error}}</h3>
		<h5><a class="index" href="{{url('home/index/index')}}">返回首页</a></h5>
	</div>
@endsection

@section('footer')
  @parent
@endsection