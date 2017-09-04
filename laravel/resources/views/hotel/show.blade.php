@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '酒店')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')

<div class="grid_3">
  <div class="container">

  <div class="col-md-9 profile_left1">
  	<h1>Recently Viewed Profile</h1>
<!-- 酒店结束 -->
<?php  foreach($hotel_arr as $hotel) { ?>
    <div class="profile_top"><a href="view_profile.html">
      
	    <div class="col-sm-3 profile_left-top">
	    	<img src="<?php echo $hotel->hotel_img; ?>" class="img-responsive" alt=""/>
	    </div>
	    <div class="col-sm-3">
	      <ul class="login_details1">
			 <li><h2><?php echo $hotel->hotel_name; ?></h2></li>
			 <li><p><?php  echo $hotel->hotel_desc; ?></p></li>
		  </ul>
	    </div>
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
						<td class="day_label1">Tell:</td>
						<td class="day_value"><?php echo $hotel->hotel_tel; ?></td>
					</tr>
	        		<tr class="opened_1">
						<td class="day_label1">酒店地址:</td>
						<td class="day_value"><?php echo $hotel->hotel_address; ?></td>
					</tr>

			    </tbody>
		   </table>
		   <div class="buttons">
			 
			   <div class="vertical"><a href="{{url('home/hotel/room')}}/id/<?php echo $hotel->hotel_id; ?>">查看详情</a></div>
		   </div>
	    </div>
	    <div class="clearfix"> </div>
    </a>
</div>
<?php } ?>
<!-- 酒店结束 -->
  
</div>
<!--右边div-->
<div class="col-md-3 match_right">


</div>
<!--右边div（结束）-->
<div class="clearfix"> </div>
  </div>
</div>
<link href="/qiantai/css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="/qiantai/js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>

@endsection

@section('footer')
	@parent
@endsection