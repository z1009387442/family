@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '酒店')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<link rel="stylesheet" type="text/css" href="/qiantai/css/h-ui/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/qiantai/css/h-ui/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/qiantai/css/h-ui/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/qiantai/css/h-ui/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/qiantai/css/h-ui/style.css" />

<div class="page-container">
    <form class="form form-horizontal" id="form-article-add" action="{{url('home/personal_data')}}" method="post" enctype="multipart/form-data">
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl">
                <span>个人资料</span>
                <span>我的订单</span>
                <span>我的积分</span>
                <span>我的余额</span>
                <span>我的兑换券</span>
                
            </div>
        
        <?php  foreach($user_info as $v) { ?>
            <div class="tabCon">   
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        昵称：</label>
                    <div class="formControls col-xs-8 col-sm-9" style="width:800px;">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                        <input name="user_name" class="input-text radius size-L" type="text" value="<?php echo  $v->user_name; ?>" readonly="true">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        邮箱：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                       <input name="email" class="input-text radius size-L" value="<?php echo $v->email ?>" type="text"  readonly="true">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        电话：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                       <input name="tel" class="input-text radius size-L" type="text" value="<?php echo $v->tel ?>" readonly="true">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">上传头像：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                    <div class="img"><img src="<?php if($v->img==NULL){echo "/qiantai/images//default.png";}else{echo $v->img;}?>" width="100px" height="97px"></div>
                        <input type="hidden" name="img" value="">
                        <span class="btn-upload">
                        <a href="javascript:void();" class="btn btn-primary radius"><i class="iconfont">&#xf0020;</i> 上传头像</a>
                        <input style="width:100px" type="file" multiple="true"  class="input-file" name="uploadFile" id="upload_file" onchange="uploadPic()">
                    <div id="queue"></div>
                       </span>
                    </div>
                </div>
                <div class="row cl">
                 <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <input style="width:110px;" class="btn btn-primary radius" type="submit" value=" 保存">
                    <button style="width:110px;" class="btn btn-default radius edit" type="button" >&nbsp;&nbsp;编辑&nbsp;&nbsp;</button>
                    <button style="width:110px;" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                 </div>
            </div>
            </div>
        <?php } ?>


            <div class="tabCon">
                这是订单
            </div>
            <div class="tabCon">
                这是积分
            </div>
            <div class="tabCon">
                这是余额
            </div>
            <div class="tabCon">
                这是兑换券
            </div>
        </div>        
    </form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/qiantai/js/h-ui/jquery.min.js"></script>
<script type="text/javascript" src="/qiantai/js/h-ui/layer.js"></script>
<script type="text/javascript" src="/qiantai/js/h-ui/H-ui.min.js"></script>
<script type="text/javascript" src="/qiantai/js/h-ui/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/qiantai/js/h-ui/WdatePicker.js"></script>
<script type="text/javascript" src="/qiantai/js/h-ui/jquery.validate.js"></script>
<script type="text/javascript" src="/qiantai/js/h-ui/validate-methods.js"></script>
<script type="text/javascript" src="/qiantai/js/h-ui/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    $("#tab-system").Huitab({
        index:0
    });
});

    //图片处理
function uploadPic(){
    var pic = $('#upload_file')[0].files[0];
    var fd = new FormData();
    fd.append('uploadFile', pic);
    var token=$("#token").val();
    var obj=$(this);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        url:"user_img",
        type:"post",
        'X-XSRF-TOKEN':"token",
        // Form数据
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success:function(msg){
           $('.img').html("<img src="+msg+" alt=''width='100px' height='97px'>");
           $("input[name='img']").val(msg);
        }
    });
                        
}
    $(".edit").click(function(){
       $("input").removeAttr("readonly",'false');
    });


 </script>


@endsection

@section('footer')
    @parent
@endsection
