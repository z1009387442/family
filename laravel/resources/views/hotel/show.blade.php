@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '首页')
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
<div class="address">
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
						<td class="day_value city" ><?php echo $hotel->hotel_address; ?></td>
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
</div>
<?php } ?>
<!-- 酒店结束 -->

</div>
<div class="col-md-3 match_right">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    
    #allmap{
      position:fixed;right:10px;top:150px;width:280px;height:352px;
      overflow: hidden; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;
    }
    p{margin-left:5px; font-size:14px;}
  </style>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=skiLvOXleNYZrnh8Sokp3he4G2mX47Gn"></script>

  <div id="allmap"></div>
<script src="jquery.js"></script>
<script type="text/javascript">
  $(".address").mouseenter(function(){
    var address = $(this).find(".city").text();
    //百度地图API功能
  var map = new BMap.Map("allmap");          
  map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
  var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map}
  });
  local.search(address);
  $("#allmap").removeAttr("style");
  });

  
</script>
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