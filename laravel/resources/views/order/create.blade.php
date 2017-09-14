@extends('magic.qiantai')


@section('title', '预订房间')
@section('header')
    @parent
@endsection

@section('content')
<link rel="stylesheet" href="/qiantai/date_use/daterangepicker.min.css">
<style type="text/css">
	.sub_btn{border: 1px solid #993366;border-radius: 0.5em;padding: 0.5em 2em 0.55em;color: #fef4e9;font: 16px/100%;background-color:#993366; margin-top: 15px;}
	.container{font-size:14px;};	
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
						 	<input class="sub_btn click_login" type="submit" value="确认预订">
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
       
<!--弹出层时背景层DIV-->  
<div id="fade" class="black_overlay">  
</div>  
 <div id="MyDiv" class="white_content">  
   <div style="text-align: right; cursor: default; height: 40px;">  
   <span id="XX"  style="font-size: 16px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')">×</span>  
  </div>  
  <!-- 登录表单 --> 
  <div class="Myform">
  	<ul>
  		<li>邮箱：<input type="text" class="user_email" value="" placeholder="请输入邮箱"></li>
  		<li>密码：<input type="password" class="user_pwd" value="" placeholder="请输入密码"></li>
  		<li><button class="MyBut user_login">登录</button><a href="/index.php/home/register">还没有账号？点我注册</a></li>
  		<li class="error_mes"></li>
  	</ul>
  </div>
   <!-- 登录表单 --> 
 </div> 
       <div class="clearfix"> </div>
    </div>
  </div>
</div>
<style> 
.Myform .MyBut{
	border: 1px solid #5a98de;
	border-radius: 0.5em;
	padding: 0.2em 1em 0.2em;
	color: #fef4e9;
	font: 16px/100%;
	background-color:#5a98de;
	margin-top: 15px;
	margin-right: 30px;
}
.Myform li {
	text-align: center;
    font-size: 1.5em;
    line-height: 1.5em;
    margin-top: 20px;
    margin-bottom: 3px;
}
.black_overlay{  
 display: none;  
 position: absolute;  
 top: 0%;  
 left: 0%;  
 width: 100%;  
 height: 100%;  
 background-color: black;  
 z-index:1001;  
 -moz-opacity: 0.8;  
 opacity:.100;  
 filter: alpha(opacity=80);
}  
.white_content { 
 display: none;  
 position: absolute;  
 top: 35%;  
 left: 35%;  
 width: 30%;  
 height: 40%;  
 border: 5px solid lightblue;  
 background-color: white;
 z-index:1002;  
 overflow: auto;  
}  
.white_content_small {  
 display: none;  
 position: absolute;  
 top: 20%;  
 left: 30%;  
 width: 40%;  
 height: 50%;  
 border: 16px solid lightblue;  
 background-color: white;  
 z-index:1002;
 overflow: auto;  
}  
#XX{
    text-align:center;
    margin-right:1px;
    display: inline-block;
    width:30px;
    height: 30px;
    line-height: 30px;
  }
 #XX:hover{background-color: #EE0000}
</style> 

<script type="text/javascript">  
//弹出隐藏层  
function ShowDiv(show_div,bg_div){  
 document.getElementById(show_div).style.display='block';  
 document.getElementById(bg_div).style.display='block' ;  
 var bgdiv = document.getElementById(bg_div);  
 bgdiv.style.width = document.body.scrollWidth;   
 // bgdiv.style.height = $(document).height();  
 $("#"+bg_div).height($(document).height());  
};  
//关闭弹出层  
function CloseDiv(show_div,bg_div)  
{  
 document.getElementById(show_div).style.display='none';  
 document.getElementById(bg_div).style.display='none';  
};  

$(document).on("click",".click_login",function(){
	ShowDiv('MyDiv','fade');
	return false;
})

	$(".user_login").click(function(){
		var obj=$(".sub_btn");
		var user_email=$(".user_email").val();
		var user_pwd=$(".user_pwd").val();
		if(user_email==''){
			alert('请输入邮箱');
			return false;
		}
		if(user_pwd==''){
			alert('请输入密码');
			return false;
		}
		$.ajax({
		   type: "GET",
		   url: "/home/order/login",
		   data: {"user_email":user_email,"user_pwd":user_pwd},
		   success: function(msg){
		     if(msg==2){
		     	//登录成功
		     	obj.removeClass("click_login");
		     	obj.addClass("check_data");
		     	CloseDiv('MyDiv','fade');
		     }else{
		     	$(".error_mes").html('邮箱或密码输入错误');
		     }
		   }
		});
	})
</script>


<!-- FlexSlider -->
<script defer src="/qiantai/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="/qiantai/css/flexslider.css" type="text/css" media="screen" />
<script>
	flag_tel=0;
	flag_money=1;
	$(document).on("click",".check_data",function(){
		var start_time=$("#date-range13").val();
		var end_time=$("#date-range14").val();
		var Start = new Date(start_time).getTime();
		var End = new Date(end_time).getTime();
		if(End < Start){
			alert('结束日期不能小于开始日期！');
			return false;
		}
		if(flag_tel==0){
			alert('请完成您的预订信息');
			return false;
		}else{
			return true;
		}
	})

	$("#date-range13").change(function(){
		change_price();
	})

	$("#date-range14").change(function(){
		change_price();
	})

	function change_price(){
		var total_price=0;
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
