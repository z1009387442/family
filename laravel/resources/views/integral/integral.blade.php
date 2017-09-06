@extends('magic.integral')
<!-- 页面标题 -->
@section('title', '积分')
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
 background-image:url(/integral/jifen.jpg);
 background-size:100% 100%;
 background-repeat:no-repeat;
 background-attachment:fixed
} 
.box1{
	margin-top:70px; margin-bottom:50px
}

/*.gallery_item_intro ul{margin:0}
.gallery_item_intro ul li{padding:0;list-style:none;line-height:14pt }*/

.gallery_item_intro { background-color:black;width: 250px;height: 900px; float: left;margin-left:200px;position: absolute; margin-right:35px; margin-top:40px;}
.gallery_item_intro h1{color:#996600; }
.gallery_item_intro ul{overflow:hidden;width:100%;}
.gallery_item_intro ul li {width:100%;float:left;list-style:none; margin-left:20px;}
.gallery_item_intro ul li a{float:left;list-style:none; color: #999966; text-decoration: none; margin-top: 10px;}

.article_div {width: 800px;height: 1000px; float: left;margin-left:500px; margin-right:65px;position: absolute;}
.article_div ul{overflow:hidden;width:100%;}
.article_div ul li {width:33.333%;float:left;list-style:none;}
.article_div p{ background-color:white;margin-left: 30px;height: 50px;}
.article_div p a{margin-left: 150px;}
.article_list a img {width:223px;height:220px; margin-left:30px; margin-top:40px;}
.box_z{width: 100%;height: 200%; }









</style> 
</head>
<body> 



<div class="box_z">
		<div class="gallery_item_intro" style="text-align:center">
			<h1>ORANGE HOTEL</h1>
			<hr>
				<ul class="usp_list">
					<li><a href="/beijing/">北京桔子酒店</a></li>
					<li><a href="/cangzhou/">沧州桔子酒店</a></li>
					<li><a href="/xichang/">西昌桔子酒店</a></li>
					<li><a href="/xiamen/">厦门桔子酒店</a></li>
					<li><a href="/taian/">泰安桔子酒店</a></li>
					<li><a href="/xining/">chengenxu酒店</a></li>
					<li><a href="/jining/">济宁桔子酒店</a></li>
					<li><a href="/wuhan/">武汉桔子酒店</a></li>
				</ul></div>

<div class="article_div">

	<ul class="article_list">
							<li class="">
							<a href="{{url('home/integral/convert')}}" title="抵用券1000元">
							<img src="/integral/1000.jpg">
							</a><p class="shopps"><a href="{{url('home/integral/convert')}}" title="抵用券1000元">查看详情</a></p></li>
		

							<li class="">
							<a href="/Shop/detail/166" title="兑换房间13000分">
							<img src="/integral/13000.jpg">
							</a><p class="shopps"><a href="/Shop/detail/166" title="兑换房间13000分">查看详情</a></p></li>

							<li class="">			
							<a href="/Shop/detail/170" title="兑换房间18000分">
							<img src="/integral/18000.jpg">
							</a><p class="shopps"><a href="/Shop/detail/170" title="兑换房间18000分">查看详情</a></p></li>

							<li class="">
							<a href="/Shop/detail/171" title="兑换房间28000分">
							<img src="/integral/28000.jpg">
							</a><p class="shopps"><a href="/Shop/detail/171" title="兑换房间28000分">查看详情</a></p></li>

							<li class="">
							<a href="/Shop/detail/172" title="兑换房间33000分">
							<img src="/integral/33000.jpg">
							</a><p class="shopps"><a href="/Shop/detail/172" title="兑换房间33000分">查看详情</a></p></li>

							<li class="">
							<a href="/Shop/detail/172" title="兑换房间38000分">
							<img src="/integral/38000.jpg">
							</a><p class="shopps" ><a href="/Shop/detail/172" title="兑换房间38000分" >查看详情</a></p></li>

							<li class="">
							<a href="/Shop/detail/172" title="兑换房间50000分">
							<img src="/integral/50000.jpg">
							</a><p class="shopps"><a href="/Shop/detail/172" title="兑换房间50000分">查看详情</a></p></li>

							</ul>
							</div>

</div>



</body></html>




@endsection
