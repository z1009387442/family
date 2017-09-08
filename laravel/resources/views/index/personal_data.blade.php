@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '酒店')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<style type="text/css">
      #login
      {
          display:none;
          border:3px solid grey;
         height:62%;
         width:62%;
         position:absolute;/*让节点脱离文档流,我的理解就是,从页面上浮出来,不再按照文档其它内容布局*/
         top:20%;/*节点脱离了文档流,如果设置位置需要用top和left,right,bottom定位*/
         left:20%;
         z-index:2;/*个人理解为层级关系,由于这个节点要在顶部显示,所以这个值比其余节点的都大*/
         background: white;
     }
     #over
     {
         width: 100%;
         height: 100%;
         opacity:0.8;/*设置背景色透明度,1为完全不透明,IE需要使用filter:alpha(opacity=80);*/
         filter:alpha(opacity=80);
         display: none;
         position:absolute;
         top:0;
        left:0;
         z-index:1;
         background: silver;
     }
     </style>
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
                    <div class="img"><img src="<?php if($v->img==NULL){echo '/qiantai/images/default.png';}else{echo $v->img;}?>" width="100px" height="97px"></div>
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
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                <a href="javascript:show()">使用规则 </a> <span class="r">共有兑换券：<strong><?php echo count($detailed); ?></strong> 张</span> </div>
                <div class="mt-20">
                         <table class="table table-border table-bg">
                            <thead class="text-c">
                                <tr>
                                  <th>可兑换商品名称</th>
                                  <th>可兑换商品预览</th>
                                  <th>兑换券使用状态</th>
                                  <th>有效期</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($detailed as $v)
                                <tr class="text-c">
                                  <td>{{$v->goods_name}}</td>
                                  <td><img src='{{$v->goods_img}}' alt="" width="100px" height="70px"></td>
                                  <td>
                                    @if($v->status==0)
                                        未使用
                                    @elseif($v->status==1)
                                        已使用
                                    @endif    
                                  </td>
                                  <td>长期有效</td>
                                
                                </tr>
                            @endforeach   
                              </tbody>
                        </table>
                </div>
                </div>
            </div>
        


        </div>        
    </form>
</div>
<!-- 弹出层 -->
<div id="login">
<a href="javascript:hide()">✖</a>
<div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2">兑换券使用细则</font><br>
1.兑换券不得兑换现金<br/>
2.每张兑换券仅能够使用一次，不找零，不退换<br/>
3.使用兑换券抵扣部分的金额不开具发票<br/>
4.兑换券不能抵扣运费<br/>
5.兑换券应在系统显示的有效期内使用，逾期作废<br/>
6.用户同意按照兑换券规则使用各类优惠券<br/>
7.按满足兑换券使用条件的商品统计，优惠券会按比例抵扣在每个符合条件的商品上。<br/>
8.使用兑换券的订单，未支付或已支付未配货的订单如果发生订单取消在成功后，系统会立即把兑换券退回帐号，有效期不变。（若交易在使用兑换券有效期之外发生取消订单，该兑换券部分不予退还）<br/>
9.兑换券中未载明的规则，如本规则有规定的，对兑换券的使用亦发生效力；本规则与兑换券中载明的规则不一致时，以本规则为准。<br/>
10.本规则最终解释权归sunshine酒店所有。
         </div>
     </div>
  <div id="over"></div>
<!-- 弹出层结束 -->

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
<!-- Resource jQuery -->
<script type="text/javascript">
var login = document.getElementById('login');
var over = document.getElementById('over');
    function show()
   {
      login.style.display = "block";
       over.style.display = "block";
    }
    function hide()
    {
         login.style.display = "none";
         over.style.display = "none";
    }
 

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
