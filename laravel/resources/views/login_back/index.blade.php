
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

    <title>后台登录</title>


    <!-- Icons -->
    <link href="/frname/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frname/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="/frname/css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                <form method="post" action="">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="card p-2">

                        <div class="card-block">
                            <h1>登录</h1>
                            <p class="text-muted">登录到您的帐户</p>
                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="text" name="name" class="form-control admin_name" placeholder="Username">
                                <span></span>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" name="pwd" class="form-control admin_pwd" placeholder="Password">
                                <span></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary px-2 checkover" value="登录">
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                    <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>注册</h2>
                                <p>创建一个属于您的个人账户</p>
                                <a href="{{URL('admin/login/regist')}}"><button type="button" class="btn btn-primary active mt-1">Register Now!</button></a>
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
    $(".admin_name").blur(function(){
        //验证用户名
        var admin_name=$(this).val();
        if(admin_name==''){
            flag=0;
            $(this).next().html("用户名不能为空");
        }else{
            flag=1;
            $(this).next().html('');
        }
    
    })

    $(".admin_pwd").blur(function(){
        //验证密码
        var admin_pwd=$(this).val();
        if(admin_pwd==''){
            flag=0;
            $(this).next().html("密码不能为空");
        }else{
            flag=1;
            $(this).next().html('');
        }
    })

    $(".checkover").click(function(){
        if(flag==0){
            return false;
        }else{
            return true;
        }
    })
</script>

</body>

</html>