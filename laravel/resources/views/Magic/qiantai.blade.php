<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- 引入插件样式 -->
<link rel="stylesheet" type="text/css" href="/qiantai/codebase/GooCalendar.css"/>

<link href="/qiantai/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/qiantai/js/jquery.min.js"></script>
<script src="/qiantai/js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="/qiantai/css/style.css" rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>


 <div class="navbar navbar-inverse-blue navbar">
 @section('header')

 <?php require('/qiantai/index.html'); ?>
<script src='http://home.wolive.cc/assets/libs/jquery/jquery.min.js'></script>
<script src='http://home.wolive.cc/assets/js/index/kefu_online.js'></script>
<a  href='http://home.wolive.cc'   user_id='' username='' avatar=''  web_id='zhangzhen'   id='workerman-kefu'></a>
      <div class="navbar-inner">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
			   <ul>
				<li class="green">
					<a href="#" class="icon-home"></a>
					<ul>@if(Session::has('user_id'))
						<li><a href="{{url('home/personal_data')}}">个人资料</a></li>
						<li><a href="{{url('home/personal_data')}}">我的优惠券</a></li>
						<li><a href="{{url('home/personal_data')}}">我的订单</a></li>
					    <li><a href="{{url('home/login_out')}}">注销</a></li>
					    @else
					    <li><a href="{{url('home/login')}}">登录</a></li>
					    <li><a href="{{url('home/register')}}">注册</a></li>
					    @endif
					</ul>
				</li>
			   </ul>
             </nav>
           </div>
           <a class="brand" href="index.html"><img src="/qiantai/images/logo.png" alt="logo"></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="{{url('/')}}">首页</a></li>
		            <li>
		              <a href="">酒店预订</a>		              
		            </li>
		            
		    		<li>
		              <a href="{{url('home/made/index')}}">定制服务</a>
		              
		            </li>
		            <li>
		              <a href="{{url('home/integral/index')}}">积分兑换</a>		              
		            </li>
					 <li>
		              <a href="{{url('home/join/index')}}">招商专栏</a>		              
		            </li>
		             <li class="last"><a href="contact.html">优惠促销</a></li>
		            <li><a href="{{url('home/about/index')}}">关于我们</a></li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
@show
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
@yield('content')

    <div class="footer">
@section('footer')
    	<div class="container">
    		<div class="clearfix"> </div>
    		<div>
    			
    		</div>
    		<div class="copy">
		      <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
	        </div>
    	</div>
@show
    </div>
</body>
</html>