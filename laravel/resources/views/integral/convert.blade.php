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



/*-------*/


p{padding:0 0 10px 0;clear:both;position:relative}
.p_line {background: url("/./Tpl/default/Public/images/p_line.png") no-repeat 15px 5px;}
.article_div {padding-top:20px;}
.article_list li {width:200px;height:240px;background:#FFF;margin:11px;float:left;}
.article_list a img {width:200px;height:200px;}
.user_div {background:#FFF;padding:5px 10px;overflow:auto;}
.shopps {float:right;margin-top:5px;}
.item {float:left;}
.sep {font-family: simsun;padding: 0 10px;font-size:16px;}
.infodetail_div {background:#FFF;overflow:auto;margin-top:1px;padding:30px;}
.infodetail_l_div {width:260px;float:left;}
.infodetail_r_div { position:relative;left:30px;float:left;}
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
				<div class="item"><a href="/Shop/i2017">积分兑换</a></div><div class="item sep">&gt;</div><div class="item">升级券1间夜</div><div style="float:right"><div><a href="/User/login">点击登录</a></div>
				</div>
			</div>
		<div class="infodetail_div">
	<div class="infodetail_l_div">
<img src="/integral/1000.jpg" />
</div><form name="frmChange" id="frmChange" action="/Shop/change" method="POST">
	<div class="infodetail_r_div">
	<div>
		<p class="p_name"><b>升级券1间夜</b></p>

		<p class="p_name">
		1、当所预订房型满足升级条件时，升级券可用于该房型升级；<br />

		2、仅限通过桔子水晶酒店集团官网及微信客户端预订时使用，需手工选择并使用；<br />
		
		3、1张升级券可使用于1间1晚的房型升级；<br />
		
		4、升级券无法和积分换房同时使用；<br />
		
		5、此商品仅限在桔子水晶酒店集团官网兑换，不接受其它形式兑换；<br />
		
		6、最终解释权归桔子水晶酒店集团所有。<br/>
		</p>

	
	</div>

<input type="hidden" name="id" id="id" value=164 />
<input type="hidden" name="__hash__" value="9f8d21860b55b264aad61a305ca66197_4d29c16f1ebc82cdb3b250d42bd73170" />
</div>
		<p class="">
			<div class="parent">
			<a>兑换数量:</a>
		<select name="numSel" id="numSel">
		<option>1</option><option>2</option><option>3</option>
		<option>4</option><option>5</option><option>6</option>
		<option>7</option><option>8</option><option>9</option>
		</select></div></p>

		<p class="p_name">&nbsp;</p>
		<p class="p_name" style="text-align:center;"><input type="submit"  class="button button-caution button-rounded button-jumbo" id="btnChange" value="点击兑换"></p>
		<p class="p_name">&nbsp;</p><p class="p_name">&nbsp;</p></div>
		</div></form>
</div></div></div></div></div><!--foot--><div id="footer"><script>
















	
</div>



</body></html>




@endsection
