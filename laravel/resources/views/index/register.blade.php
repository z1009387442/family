<!DOCTYPE html>
<html>
<head>
<title>Quality life</title>
<style>
	.state1{
        color:#aaa;
      }
      .state2{
        color:#000;
      }
      .state3{
        color:red;
      }
      .state4{
        color:green;
      }
</style>
<link href="/qiantai/css/style.min.css" rel='stylesheet' type='text/css' />
<link href="/qiantai/css/button.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>

</head>
<body>
	<h1>Quality life
</h1>
<div class="app-nature">
	<div class="nature">
		<img src="/qiantai/images/bg.png" class="img-responsive" alt="" />
	</div>
	<form action="{{url('home/register_do')}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="text" name="user_name" placeholder="请输入用户名">
		<span class='state1'></span><br/> 
		<input type="text" name="email" class="text" value="" placeholder="请输入邮箱">
		<span class='state1'></span><br/> 
		<input type="password" name="user_pwd"  placeholder="请输入密码">
		<span class='state1'></span><br/>

		<input type="text" placeholder="请输入您的手机号" class="tel" >
		<input type="text" style="width:105px" placeholder="请输入验证码" class="verify_code">
		
		<input class="button blue send"  style="float:right" type="button" value="发送验证码" />
			<span class='state1'></span>
		<div class="submit"><input type="submit" class="submit" value="注    册" ></div>
	</form>
</div>
	<!--start-copyright-->
<div class="copy-right">
<p>Copyright &copy; 2017 All rights  Reserved | Template by NationalHotel.com</p>
</div>
</body>
</html>
<script src="/qiantai/js/jquery.js"></script>
<script>

 	var ok1=false;
    var ok3=false;
    var ok2=false;
    var ok4=false;


	var InterValObj; //timer变量，控制时间 
	var count = 60; //间隔函数，1秒执行 
	var curCount;//当前剩余秒数 
	//验证用户输入验证码
	$('.verify_code').blur(function(){
		var obj = $(this);
		var verify_code=$(this).val();
		var user_tel=$('.tel').val();
		$.ajax({
			type:'get',
			url:"verify_user_code",
			data:{'verify_code':verify_code,'user_tel':user_tel},
			dataType:'json',
			success:function(msg){
				if(msg==0){
					obj.next().next().text('✔ 验证码正确').removeClass('state1').addClass('state4');
					ok3=true;
				}else if(msg==1){
					alert('验证码已过期，请重新发送');
				}else if(msg==2){
					alert('您输入的验证码无效');
				}
			}

		})
	})

	//发送验证码
	$(".send").click(function(){
		var obj=$(this);
		var tel=$('.tel').val();
		$.ajax({
			type:"get",
			url:"send_verify_code",
			data:{'tel':tel},
			headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
			dataType:'json',
			success:function(msg){
				if(msg==0){
					curCount = count; 
					obj.attr("disabled", "true");
					obj.removeClass('blue').addClass('white');
					obj.val(curCount + "秒后重发");
					InterValObj = window.setInterval(SetRemainTime, 1000); 
				}else{
			       	alert(' ✖ 验证码发送失败，请重新发送');
				}
			}
		})
	});
	//计时器
	function SetRemainTime() { 
		if (curCount == 0) {         
	        window.clearInterval(InterValObj);//停止计时器 
	        $(".send").removeAttr("disabled");//启用按钮 
	        $(".send").removeClass('white').addClass('blue');
	        $(".send").val("发送验证码");
		}else{ 
        	curCount--; 
        	$(".send").val(curCount + "秒后重发"); 
      	} 		
	}
	


    // 验证用户名
    $('input[name="user_name"]').blur(function(){
	    if($(this).val().length >= 3 && $(this).val().length <=12 && $(this).val()!=''){
	    	var mingzi=$(this).val();
	    	var obj=$(this);
		    $.ajax({
		    	type:"get",
				url:"verify_name",
				data:{'mingzi':mingzi},
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				success:function(msg){
					if(msg==0){
						alert('用户名已存在');
					}else{
				       	obj.next().text('✔').removeClass('state1').addClass('state4');
				        ok1=true;
					}
				}
		    })   
	    }else{
	        $(this).next().text('用户名应该为3-20位之间').removeClass('state1').addClass('state3');
	    }
    });
     //验证邮箱
	$('input[name="email"]').blur(function(){
	  	if($(this).val().search( /^([a-zA-Z0-9_-])+@\w+\.(com|net|con|yeah)/)==-1){
	    	$(this).next().text('请输入正确的EMAIL格式').removeClass('state1').addClass('state3');
	  	}else{ 	
	  		var youxiang=$(this).val();
	    	var obj=$(this);
	    	$.ajax({
		    	type:"get",
				url:"verify_email",
				data:{'youxiang':youxiang},
				headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				success:function(msg){
					if(msg==0){
						alert('邮箱已存在');
					}else{
				       	obj.next().text('✔').removeClass('state1').addClass('state4');
				        ok4=true;
					}
				}
		    })   
	  	}
	});
	//验证密码
	$('input[name="user_pwd"]').blur(function(){
		if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!=''){
			$(this).next().text('✔').removeClass('state1').addClass('state4');
			ok2=true;
		}else{
			$(this).next().text('密码应在6-20位之间').removeClass('state1').addClass('state3');
		}
	});
	
  	//提交按钮,所有验证通过可提交
    $('.submit').click(function(){
      	if(ok1 && ok2 && ok3 && ok4 ==true){
        	$('form').submit();
      	}else{
      		return false;
      	}
   	});

</script>