@extends('magic.qiantai')


@section('title', '预订房间')
@section('header')
    @parent
@endsection

@section('content')

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">订单详情</li>
     </ul>
   </div>
   <div class="profile">
   	 <div class="col-md-8 profile_left">
   	 	<h2>{{$room_data->room_type_name}}</h2>
   	 	<div class="col_3">

   	        <div class="col-sm-4 row_2">
   	        <img src="{{$room_data->type_img}}" width="200" height="200" />
				<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="images/p1.jpg">
						</li>
						
					 </ul>
				  </div>
			</div>
			<div class="col-sm-8 row_1">
				<table class="table_working_hours">
		        	<tbody>
		        		<tr class="opened">
							<td class="day_label">酒店名称 :</td>
							<td class="day_value">{{$hotel_data->hotel_name}}</td>
						</tr>
						<tr class="opened">
							<td class="day_label">地址 :</td>
							<td class="day_value">{{$hotel_data->hotel_address}}</td>
						</tr>
			        	<tr class="opened">
							<td class="day_label">房间类型名称 :</td>
							<td class="day_value">{{$room_data->room_type_name}}</td>
						</tr>
						<tr class="opened">
							<td class="day_label">床型 :</td>
							<td class="day_value">{{$room_data->bed_type}}</td>
						</tr>
						<tr class="opened">
							<td class="day_label">最大居住人数 :</td>
							<td class="day_value">{{$room_data->max_people}}</td>
						</tr>
						<tr class="opened">
							<td class="day_label">房间面积 :</td>
							<td class="day_value">{{$room_data->room_area}}平米</td>
						</tr>
						<tr class="opened">
							<td class="day_label">会员价 :</td>
							<td class="day_value"><span id="room_one_price">{{$room_data->vip_price}}</span>RMB</td>
						</tr>
					   
				    </tbody>
				</table><!-- 
				<ul class="login_details">
			      <li>Already a member? <a href="login.html">Login Now</a></li>
			      <li>If not a member? <a href="register.html">Register Now</a></li>
			    </ul> -->
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col_4">
		    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			   <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
				  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">预订信息</a></li>
			   </ul>
		<form method="post" action="{{url('home/order/order_cre')}}">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			   <input type="hidden" name="hotel_id" value="{{$hotel_data->hotel_id}}" />
			   <input type="hidden" name="room_type_id" value="{{$room_data->room_type_id}}" />
			   <input type="hidden" name="room_price" value="{{$room_data->vip_price}}">
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    <div class="tab_box">
				    	<h1>请完成您的预订信息</h1>
				    	<p>Please complete your booking information</p>
				    </div>
				    <div class="basic_1">
				    	<h3>预订信息</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">入住时间 :</td>
									<td class="day_value">
										<input type="text" name="check_time" class="check_time" value="" id="calen1"/>
									</td>
								</tr>
								<tr class="opened_1">
									<td class="day_label">离开时间 :</td>
									<td class="day_value">
										<input type="text" name="end_time" class="end_time" value="" id="calen2"/>
									</td>
								</tr>
							    <tr class="opened">
									<td class="day_label">房间数量 :</td>
									<td class="day_value">
										<select class="room_sum" name="room_sum" style="width: 150px; border: 1px solid #D7CFCF">
										@for($i=1;$i<=3;$i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
										</select>
									</td>
								</tr>
							    <tr class="opened">
									<td class="day_label">房费总价 :</td>
									<td class="day_value" id="room_total_price">￥{{$room_data->vip_price}}</td>
								</tr>
							    
						    </tbody>
				          </table>
				         </div>
				         
				        <div class="clearfix"> </div>
				    </div>

				    <div class="basic_3">
				    	<h4>入住信息</h4>
				    	<div class="basic_1 basic_2">
				    	<h3></h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened">
									<td class="day_label">入住人:</td>
									<td class="day_value resident_people">
										<input type="text" name="resident_people[]" size="6">
									</td>
								</tr>
								<tr class="opened">
								</tr>
				        		<tr class="opened">
									<td class="day_label">手机号码:</td>
									<td class="day_value"><input type="text" name="cell_phone"></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				       </div>
				    </div>	    				    
				  </div>
				 @if(Session::get('user_id'))
					<input type="submit" value="确认预订">
				 @else
				 	<a href="/home/login"><input type="button" value="去登陆"></a>
				 @endif
				 
		     </div>
		     </form>
		  </div>
	   </div>
   	 </div>
     <div class="col-md-4 profile_right">
     	<div class="newsletter">
		   <form>
			  <input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
			  <input type="submit" value="Go">
		   </form>
        </div>
        <div class="view_profile">
        	<h3>热门酒店</h3>
        	
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
          
       </div>
       <div class="view_profile view_profile1">
        	<h3>热销房型</h3>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   <img src="">
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           
         </div>
        </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>

<!-- 时间插件 -->
<script  type="text/javascript" src="/qiantai/codebase/jquery-1.3.2.min.js"></script>
<script  type="text/javascript" src="/qiantai/codebase/GooFunc.js"></script>
<script  type="text/javascript" src="/qiantai/codebase/GooCalendar.js"></script>
<script type="text/javascript">
var property2={
	divId:"demo2",//日历控件最外层DIV的ID
	needTime:false,//是否需要显示精确到秒的时间选择器，即输出时间中是否需要精确到小时：分：秒 默认为FALSE可不填
	yearRange:[2017,2020],//可选年份的范围,数组第一个为开始年份，第二个为结束年份,如[1970,2030],可不填
	week:['日','一','二','三','四','五','六'],//数组，设定了周日至周六的显示格式,可不填
	month:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],//数组，设定了12个月份的显示格式,可不填
	format:"yyyy-MM-dd"
};
$(document).ready(function(){
	canva2=$.createGooCalendar("calen2",property2);
});
$(document).ready(function(){
    canva2=$.createGooCalendar("calen1",property2);
});
</script>
<!-- 时间插件 -->

<!-- FlexSlider -->
<script defer src="/qiantai/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="/qiantai/css/flexslider.css" type="text/css" media="screen" />
<script>
	$(".room_sum").change(function(){
		var room_one=$("#room_one_price").text();
		var count=$(this).val();
		var total_price=count*room_one;
		total_price=total_price.toFixed(2);
		$("#room_total_price").text('￥'+total_price);
		$(".resident_people").html('');
		for(var i=0;i<count;i++){
			$(".resident_people").append('<input type="text" name="resident_people[]" size="6">');
		}
	})
</script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>  


@endsection

@section('footer')
  @parent
@endsection