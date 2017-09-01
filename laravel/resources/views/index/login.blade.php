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
	<div class="nature"><img src="/qiantai/images/bg.png" class="img-responsive" alt="" /></div>
	<form action="{{url('home/login')}}" method="post" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input type="text" name="email" class="text" value="" placeholder="请输入您的邮箱" >
		<span class='state1'></span><br/>
		<input type="password" name="user_pwd" value="" placeholder="请输入密码">
		<span class='state1'></span><br/>
		<div class="submit"><input type="submit"  onclick="myFunction()" value="登  录" ></div>
		<div class="clear"></div>
		<a href="{{url('home/register')}}" class="hvr-bounce-to-bottom">注  册</a>
		<div class="links">
			<p><a href="#">Forgot Password ?</a></p>
			<p class="sign">New here ?<a href="{{url('Home/register')}}"> Sign Up</a></p>
			<div class="clear"></div>
		</div>
			
			</form>
		</div>
	<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2017 All rights  Reserved | Template by NationalHotel.com</p>
		</div>
	<!--//end-copyright-->
</body>
</html>
<script src="/qiantai/js/jquery.js"></script>
<script>
 $(function(){
 	// var ok1=false;
    var ok2=false;
    // var ok3=false;
    var ok4=false;
     // 验证用户名
        $('input[name="username"]').focus(function(){
        $(this).next().text('用户名应该为3-20位之间').removeClass('state1').addClass('state2');
          }).blur(function(){
          if($(this).val().length >= 3 && $(this).val().length <=12 && $(this).val()!=''){
            $(this).next().text('输入成功').removeClass('state1').addClass('state4');
            ok1=true;
          }else{
            $(this).next().text('用户名应该为3-20位之间').removeClass('state1').addClass('state3');
          }
            
        });
     //验证邮箱
	$('input[name="email"]').blur(function(){
	  	if($(this).val().search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==-1){
	    	$(this).next().text('请输入正确的EMAIL格式').removeClass('state1').addClass('state3');
	  	}else{         
	    	$(this).next().text('✔').removeClass('state1').addClass('state4');
	   		ok4=true;
	  	}
	});
	//验证密码
	$('input[name="user_pwd"]').blur(function(){
		if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!=''){
			$(this).next().text('✔').removeClass('state1').addClass('state4');
			ok2=true;
		}else{
			$(this).next().text('密码应该为6-20位之间').removeClass('state1').addClass('state3');
		}
	});
  	//提交按钮,所有验证通过可提交
    $('.submit').click(function(){
      	if(ok2 &&ok4 ==true){
        	$('form').submit();
      	}else{
      		return false;
      	}
   	});
});
</script>
