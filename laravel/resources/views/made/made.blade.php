@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '定制')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')

<html><head>
<title>背景附着属性 background-attachment</title>
<style type="text/css">
body {
 background-image:url(/qiantai/images/m4.jpg);
 background-size:100% 100%;
 background-repeat:no-repeat;
 background-attachment:fixed
} 
.box1{
	margin-top:70px; margin-bottom:50px
}
.box2{
	margin-top:50px; margin-bottom:50px
}
.box3{
	margin-top:400px; margin-bottom:50px
}

</style> 
</head>
<body> 
<div>
<div class="box1"></div>
<div align="center" class="box2"><img src="/qiantai/images/made.jpg" alt=""></div>

</div>

</body></html>




@endsection

@section('footer')
	@parent
@endsection