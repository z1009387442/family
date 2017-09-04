
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>后台注册</title>

    <!-- Icons -->
    <link href="/frname/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frname/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/frname/css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mx-2">
                <form method="post" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="card-block p-2">             
                        <h1>注册管理员</h1>
                        <p class="text-muted">注册个人账户</p>
                        <div class="input-group mb-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input type="text" name="name" class="form-control admin_name" placeholder="Username">
                            <span></span>
                        </div>

                        <div class="input-group mb-1">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" class="form-control admin_email" placeholder="Email">
                            <span></span>
                        </div>

                        <!-- <div class="input-group mb-1">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="position" class="form-control" placeholder="position">
                        </div> -->

                        <div class="input-group mb-1">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="tel" class="form-control admin_tel" placeholder="tel">
                            <span></span>
                        </div>

                        <div class="input-group mb-1">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password" name="pwd" class="form-control admin_pwd" placeholder="Password">
                            <span></span>
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password" name="re_pwd" class="form-control admin_repwd" placeholder="Repeat password">
                            <span></span>
                        </div>

                        <input type="submit" class="btn btn-block btn-success checkover" value="创建账户">
                    </div>
                </form>
                    <div class="card-footer p-2">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-facebook" type="button">
                                    <span>facebook</span>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-twitter" type="button">
                                    <span>twitter</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
	<script src="/frname/assets/js/libs/jquery.min.js"></script>
	<script src="/frname/assets/js/libs/tether.min.js"></script>
	<script src="/frname/assets/js/libs/bootstrap.min.js"></script>

<script>
    flag=0;
    flag_email=0;
    flag_tel=0;
    flag_pwd=0;
    flag_repwd=0;
    $(".admin_name").blur(function(){
        //验证用户名
        var admin_name=$(this).val();  
        var obj=$(this);
        var reg=/^[\u4e00-\u9fa5]{2,4}$/;
        var res="*必填项,请输入您的名字2-4位";
        $.ajax({
           type: "GET",
           url: "/index.php/admin/login/check_name",
           data: "admin_name="+admin_name,
           success: function(msg){
             if(msg==4){
                flag=0;
                obj.next().html('*用户名已存在');
             }else{
                flag=check_data(reg,admin_name,obj,res);
             }
           }
        });
    
    })


    $(".admin_email").blur(function(){
        //验证邮箱
        var admin_email=$(this).val();  
        var reg=/^\w+@\w+(\.)\w+$/;
        var obj=$(this);
        var msg="*必填项,请输入正确的邮箱地址";
        flag_email=check_data(reg,admin_email,obj,msg);
    })

    $(".admin_tel").blur(function(){
        //验证手机号
        var admin_tel=$(this).val();
        var obj=$(this);
        var reg=/^1[3578]\d{9}$/;
        var msg="*必填项,手机号必须11位且以13,15,17,18开头";
        flag_tel=check_data(reg,admin_tel,obj,msg);
 
    })

    $(".admin_pwd").blur(function(){
        //验证密码
        var admin_pwd=$(this).val();
        var obj=$(this);
        var reg=/^\w{5,19}$/i;
        var msg="*必填项,6-20位字母、数字、_";
        flag_pwd=check_data(reg,admin_pwd,obj,msg);
    })

    $(".admin_repwd").blur(function(){
        //验证密码2
        var admin_pwd=$(".admin_pwd").val();
        var admin_repwd=$(this).val();
        if(admin_pwd!=admin_repwd){
            flag_repwd=0;
            $(this).next().html('两次密码不一致');
        }else{
            flag_repwd=1;
            $(this).next().html('');
        }
    })


    function check_data(reg,data,obj,msg){
        if(reg.test(data)){
            obj.next().html('');
            return 1;
        }else{
            obj.next().html(msg);
            return 0;
        }
    }

    $(".checkover").click(function(){
        if(flag==0||flag_email==0||flag_tel==0||flag_pwd==0||flag_repwd==0){
            return false;
        }else{
            return true;
        }
    })
</script>


</body>

</html>