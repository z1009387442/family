@extends('magic.qiantai')


@section('title', '预订房间')
@section('header')
    @parent
@endsection

@section('content')
<link rel="stylesheet" href="/qiantai/date_use/daterangepicker.min.css">
<style type="text/css">
	.sub_btn{border: 1px solid #993366;border-radius: 0.5em;padding: 0.5em 2em 0.55em;color: #fef4e9;font: 16px/100%;background-color:#993366; margin-top: 15px;}
	.tab_box h2{color: #c32143;font-size: 1.5em};
	.basic_1 h4{color: #c32143;font-size: 1.5em};
	.hotel_name{font-size: 2em};
	ul.profile_item li.profile_item-desc .hotel_name{font-size: 2em};
</style>
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
			   
		<form method="post" action="{{url('home/order/order_cre')}}">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			   <input type="hidden" name="hotel_id" value="{{$hotel_data->hotel_id}}" />
			   <input type="hidden" name="room_type_id" value="{{$room_data->room_type_id}}" />
			   <input type="hidden" name="room_price" value="{{$room_data->vip_price}}">
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    <div class="tab_box">
				    	<h2>请完成您的预订信息</h2>
				    	<p>Please complete your booking information</p>
				    </div>
				    <div class="basic_1">
				    	<h4>预订信息</h4>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours">
				        	<tbody>
				        		<tr class="opened_1">
									<td class="day_label">入住时间 :</td>
									<td class="day_value">
										<input type="text" name="check_time" id="date-range13" value="<?=$my_date['today']?>" placeholder="<?=$my_date['today']?>" />
									</td>
								</tr>
								<tr class="opened_1">
									<td class="day_label">离开时间 :</td>
									<td class="day_value">
										<input type="text" name="end_time" id="date-range14" value="<?=$my_date['tomorrow']?>" placeholder="<?=$my_date['tomorrow']?>" />
									</td>
								</tr>
							    <tr class="opened">
									<td class="day_label">房间数量 :</td>
									<td class="day_value">
										<select class="room_sum" name="room_sum" style="width: 80px; border: 1px solid #D7CFCF">
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
									<td class="day_label"><span class="my_flag">*</span>入住人:</td>
									<td class="day_value resident_people">
										<input type="text" name="resident_people[]" size="6" placeholder="姓名">
									</td>
								</tr>
								<tr class="opened">
								</tr>
				        		<tr class="opened">
									<td class="day_label"><span class="my_flag">*</span>手机号码:</td>
									<td class="day_value"><input type="text" class="user_tel" name="cell_phone"><span class="check_tel"></span></td>
								</tr>
							 </tbody>
				          </table>
				          @if(Session::get('user_id'))
							<input class="check_data sub_btn" type="submit" value="确认预订">
						 @else
						 	<a href="/home/login"><input type="button" class="sub_btn" value="去登陆"></a>
						 @endif

				         </div>
				       </div>
				    </div>	    				    
				  </div>		 

		     </div>
		     </form>
		  </div>
	   </div>
   	 </div>
     <div class="col-md-4 profile_right">
     	<div class="newsletter">
		   <h3>酒店风采</h3>
        </div>
        <div class="view_profile">	
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="{{$hotel_data->hotel_img}}" width="200" height="200" alt=""/>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
          
       </div>
       <div class="view_profile view_profile1">
        	<ul class="profile_item">
        	   <li class="profile_item-desc">
        	   	  <h4 class="hotel_name">{{$hotel_data->hotel_name}}</h4>
        	   	  <p></p>
        	   	  <p>{{$hotel_data->hotel_address}}<p>
        	   	  <p></p>
        	   	  <p>{{$hotel_data->hotel_tel}}</p>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <p>{{$hotel_data->hotel_desc}}</p>
        	   	  <p></p>
        	   	  <p>{{$hotel_data->hotel_hint}}</p>
        	   </li>
        	   <div class="clearfix"> </div>
           </ul>
           
         </div>
        </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>


<!-- FlexSlider -->
<script defer src="/qiantai/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="/qiantai/css/flexslider.css" type="text/css" media="screen" />
<script>
	flag_tel=0;
	$(".check_data").click(function(){
		if(flag_tel==0){
			alert('请填写完整标红选项');
			return false;
		}else{
			return true;
		}
	})

	$("#date-range13").blur(function(){
		change_price();
	})

	$("#date-range14").blur(function(){
		change_price();
	})

	function change_price(){
		var room_one=$("#room_one_price").text();
		var count=$(".room_sum").val();
		var start_time=$("#date-range13").val();
		var end_time=$("#date-range14").val();
		var total_price=count*room_one;
		if(start_time!=''&&end_time!=''){
			var total_day=DateDiff(start_time,end_time);
			total_price=total_price*total_day;
		}	
		total_price=total_price.toFixed(2);
		$("#room_total_price").text('￥'+total_price);
	}


	$(".user_tel").blur(function(){
		var user_tel=$(this).val();
        var reg=/^1[3578]\d{9}$/;
        if(reg.test(user_tel)){
        	$(".check_tel").text('');
            flag_tel=1;
        }else{
        	flag_tel=0;
            $(".check_tel").text('必填项');
        }
	})

	$(".room_sum").change(function(){
		change_price();
		$(".resident_people").html('');
		var count=$(this).val();
		for(var i=0;i<count;i++){
			$(".resident_people").append('<input type="text" name="resident_people[]" size="6" placeholder="姓名">');
		}
	})

	function  DateDiff(sDate1,  sDate2){    //sDate1和sDate2是2002-12-18格式 
       var  aDate,  oDate1,  oDate2,  iDays 
       aDate  =  sDate1.split("-") 
       oDate1  =  new  Date(aDate[1]  +  '-'  +  aDate[2]  +  '-'  +  aDate[0])    //转换为12-18-2002格式 
       aDate  =  sDate2.split("-") 
       oDate2  =  new  Date(aDate[1]  +  '-'  +  aDate[2]  +  '-'  +  aDate[0]) 
       iDays  =  parseInt(Math.abs(oDate1  -  oDate2)  /  1000  /  60  /  60  /24)    //把相差的毫秒数转换为天数 
       return  iDays 
	}
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

<script type="text/javascript" src="/qiantai/date_use/moment.min.js"></script>
<script type="text/javascript" src="/qiantai/date_use/jquery.min.js"></script>
<script type="text/javascript" src="/qiantai/date_use/jquery.daterangepicker.min.js"></script>
<script>
var now_date="<?=$my_date['today']?>";
var tomo="<?=$my_date['tomorrow']?>";
$('#date-range13').dateRangePicker(
	{
		startDate: now_date,
		autoClose: true,
		singleDate : true,
		showShortcuts: false 
	});
$('#date-range14').dateRangePicker(
	{
		startDate: tomo,
		autoClose: true,
		singleDate : true,
		showShortcuts: false 
	});
</script>

@endsection

@section('footer')
  @parent
@endsection
