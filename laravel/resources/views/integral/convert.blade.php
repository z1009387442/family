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

.gallery_item_intro { background-color:black;width: 250px;height: 900px; float: left;margin-left:100px;position: absolute; margin-right:35px; margin-top:40px;}
.gallery_item_intro h1{color:#996600; }
.gallery_item_intro ul{overflow:hidden;width:100%;}
.gallery_item_intro ul li {width:100%;float:left;list-style:none; margin-left:20px;}
.gallery_item_intro ul li a{float:left;list-style:none; color: #999966; text-decoration: none; margin-top: 10px;}

.article_div {width: 800px;height: 1000px; float: left;margin-left:400px; margin-right:65px;position: absolute;}
.article_div ul{overflow:hidden;width:100%;}
.article_div ul li {width:33.333%;float:left;list-style:none;}
.article_div p{ background-color:white;margin-left: 30px;height: 50px;}
.article_div p a{margin-left: 150px;}
.article_list a img {width:223px;height:220px; margin-left:30px; margin-top:40px;}
.box_z{width: 100%;height: 200%; }



/*-------*/


p{padding:0 0 10px 0;clear:both;position:relative}
.p_line {background: url("/./Tpl/default/Public/images/p_line.png") no-repeat 15px 5px;}
.article_div {padding-top:20px;}
.article_list li {width:200px;height:240px;background:#FFF;margin:11px;float:left;}
.article_list a img {width:200px;height:200px;}
.user_div {background:#FFF;padding:5px 10px;overflow:auto;margin-top:25px;}
.shopps {float:right;margin-top:5px;}
.item {float:left;}
.sep {font-family: simsun;padding: 0 10px;font-size:16px;}
.infodetail_div {background:#FFF;overflow:auto;margin-top:1px;padding:30px; height: 700px;}
.infodetail_l_div {width:260px;float:left;}
.infodetail_r_div { position:relative;left:30px;float:left; height: 400px}
.infodetail_r_div p{max-width:370px;word-wrap:break-word;word-break:normal;}

#numSel{
width                    : 14em;
height                   : 3.2em;
padding                  : 0.2em 0.4em 0.2em 0.4em;
vertical-align           : middle;
border                   : 2px solid #94c1e7;
-moz-border-radius       : 0.2em;
-webkit-border-radius    : 0.2em;
border-radius            : 0.2em;
-webkit-appearance       : none;
-moz-appearance          : none;
appearance               : none;
background               : #ffffff;
font-family              : SimHei;
font-size                : 14px;
color                    :  	#660000 ;
cursor                   : pointer;
background: url("http://ourjs.github.io/static/2015/arrow.png") no-repeat scroll right center transparent;
}

.button-rounded {
    border-radius: 4px;
}
.button-caution, .button-caution-flat {
    background-color: #FF4351;
    border-color: #FF4351;
    color: #FFF;
}
.button-caution1, .button-caution-flat1 {
    background-color: #C0C0C0;
    border-color: #C0C0C0;
    color: #FFF;
}

.button {
    font-weight: 300;
    font-size: 16px;
    font-family: "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    text-decoration: none;
    text-align: center;
    line-height: 40px;
    height: 40px;
    padding: 0 40px;
    margin: 0;
    display: inline-block;
    appearance: none;
    cursor: pointer;
    border: none;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    transition-property: all;
    transition-duration: .3s;
}
.button-jumbo {
    font-size: 24px;
    height: 50px;
    line-height: 50px;
    padding: 0 60px;
    
}
.parent a{text-decoration: none;
			
			font-size: 18px;
			}



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






<div>
	<div class="gallery_hotel">
	<div id="content">
		<div class="selecter">
			<div class="selecterBtns">
				<div class="user_div">
				<div class="item"><a href="{{url('home/integral/index')}}">积分兑换</a></div><div class="item sep">&gt;</div>
				<div class="item">{{$goods_one->goods_name}}</div><div style="float:right"><div>
					
					@if(isset($user->integral))
						当前积分:<span style="color:red">{{$user->integral}}</span>
						@else
						 <a href="{{url('home/login')}}">请先登录</a> 	
					@endif
				</div>
				</div>
			</div>
		<div class="infodetail_div">
	<div class="infodetail_l_div">
<img src="{{$goods_one->goods_img}}" />
</div><form name="frmChange" id="frmChange" action="" method="POST">
	<div class="infodetail_r_div">
	<div>
		<p class="p_name"><b>{{$goods_one->goods_name}}</b></p>

		
		@foreach($goods_desc as $k=>$v)
		<p class="p_name">
		{{$v}};
		</p>
		@endforeach


	
	</div>

<input type="hidden" name="goods_id" id="goods_id" value="{{$goods_one->goods_id}}" />
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="__hash__" value="9f8d21860b55b264aad61a305ca66197_4d29c16f1ebc82cdb3b250d42bd73170" />
<input type="hidden" name="goods_price" value="{{$goods_one->goods_price}}" />
<input type="hidden" name="goods_name" value="{{$goods_one->goods_name}}" />
</div>
		<p class="1">
			<div class="parent">
	

<p class="p_name" >&nbsp;</p>
		<p class="p_name" style="text-align:center">

			   @if(!Session::has('user_id'))
			  
			  <a href="{{url('home/login')}}">请先登录</a> 	
			   @elseif($goods_one->goods_price > $user->integral)
				
			   <a class="button button-caution button-rounded button-jumbo" href="{{url('home/integral/index')}}">积分不足</a>
			   	@else
			    <input type="submit"  class="button button-caution button-rounded button-jumbo" id="btnChange" value="点击兑换">
			    @endif
		
		</p>
		<p class="p_name">&nbsp;</p><p class="p_name">&nbsp;</p>
		</div></p>

		</div>
		</div></form>
</div></div></div></div></div><!--foot--><div id="footer">



	
</div>



</body></html>




@endsection
