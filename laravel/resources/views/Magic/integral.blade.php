<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="_token" content="{{ csrf_token() }}"/>
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
<link href="/qiantai/css/integral.css" rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>


 <div class="navbar navbar-inverse-blue navbar">
 @section('header')

<script src='http://home.wolive.cc/assets/libs/jquery/jquery.min.js'></script>
<script src='http://home.wolive.cc/assets/js/index/kefu_online.js'></script>
<a  href='http://home.wolive.cc'   user_id='' username='' avatar=''  web_id='zhangzhen'   id='workerman-kefu'></a>
      <div class="navbar-inner"  style="background-image: url(/qiantai/images/123.png);">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
             @if(Session::has('user_id'))
				<ul>
				 <li><a href="{{url('home/personal_data')}}"><img class="avatar size-L radius" src="{{Session::get('img')}}"></a>
		         <ul>
	              	<li><a href="{{url('home/personal_data')}}">个人资料</a></li>
					<li><a href="{{url('home/personal_data')}}">我的优惠券</a></li>
					<li><a href="{{url('home/personal_data')}}">我的订单</a></li>
				    <li><a href="{{url('home/login_out')}}">注销</a></li>
		         </ul>	
				</li>
			   </ul>
			@else
			 	<div class="signin">
				 	<a href="{{url('home/login')}}">登录</a>
				 	<a href="{{url('home/register')}}">注册</a>
				</div>
			 @endif
             </nav>
           </div>
           <a class="brand" href="javascript:;"><img src="/qiantai/images/logo.png" alt="logo"></a>
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
		            <li><a href="{{url('/')}}"><b>首页</b></a></li>
		            <li>
		              <a href="{{url('home/hotel/show_all')}}"><b>酒店预订</b></a>		              
		            </li>
		            
		    		<li>
		              <a href="{{url('home/made/index')}}"><b>定制服务</b></a>
		              
		            </li>
		            <li>
		              <a href="{{url('home/integral/index')}}"><b>积分兑换</b></a>		              
		            </li>
					 <li>
		              <a href="{{url('home/join/index')}}"><b>招商专栏</b></a>		              
		            </li>
		            <li><a href="{{url('home/about/index')}}"><b>关于我们</b></a></li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->

    </div> <!-- end navbar-inverse-blue -->

<!-- ============================  Navigation End ============================ -->
@yield('content')

  


</body>
</html>