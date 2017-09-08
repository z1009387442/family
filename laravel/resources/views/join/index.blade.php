<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8">

    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="viewport" content="width=device-width">
    <title>加盟申请</title>

    <!--icon refrence: http://fortawesome.github.io/Font-Awesome/3.2.1/icons/ -->
    <link rel="stylesheet" type="text/css" href="/qiantai/jiameng/font-awesome.css">

    <!--[if IE 7]>
      <link rel="stylesheet" href="/Styles/font-awesome-ie7.css">
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/qiantai/jiameng/main.css">
    <link href="/qiantai/jiameng/easyui.css" rel="stylesheet" type="text/css">
    <link href="/qiantai/jiameng/icon.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/qiantai/jiameng/uploadify.css">
    <link rel="stylesheet" type="text/css" href="/qiantai/jiameng/uploadifive.css">
    <link href="/qiantai/jiameng/WdatePicker.css" rel="stylesheet" type="text/css">
        

    <!--上传 start-->


    <!--上传 end-->
    
    
    <link rel="stylesheet" type="text/css" href="/qiantai/jiameng/login.css">


</head>
<body>

    
<div data-role="page">
    <div data-role="header">
        <img src="/qiantai/jiameng/header-logo.png" class="logo">
        
    <div class="left-logo">欢迎登录</div>

    </div>
    <div data-role="content">
        


<link rel="stylesheet" type="text/css" href="/qiantai/jiameng/editPage.css">
<!-- <script type="text/javascript" src="/qiantai/jiameng/jquery_003.js"></script>
<script src="/qiantai/jiameng/joinIntention.js"></script> -->
<style type="text/css">
    html, [data-role="page"] {
        height: auto;
    }

    [data-role="content"] {
        width: 99%;
        height: 100%;
        background: white;
        margin: 0.5%;
        position: relative;
        top: 0px;
    }

    .contentArea {
        margin: 0 auto;
        width: 100%;
        background: white;
    }

    .head {
        height: 30px;
        line-height: 30px;
        background: #A8A8A8;
    }

    body {
        height: auto;
        position: relative;
    }
</style>
<form action="" data-ajax="true" data-ajax-method="POST" data-ajax-success="successOperate(data)" id="FormIntention" method="post">    <div class="contentArea">
        <div class="head">在线申请</div>
        <div class="selectList">

            <div class="infoTitle">加盟人信息</div>
            <div class="selectBlock">
                <ul data-role="select_threeCol" class="textSy">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <li>
                        <div class="infoName"><span style="color: red;">*</span>姓名:</div>
                        <input class="infoEdit" id="ChineseName" maxlength="20" name="join_people_name" style="width: 200px;" type="text">
                        <span class="redBorder">请填写姓名</span>
                    </li>
                    <li>
                        <div class="infoName"><span style="color: red;">*</span>性别:</div>
                        <select class="infoEdit" id="Gender" name="join_people_sex" style="width: 200px;"><option value="" selected="selected">请选择</option>
<option value="男">男</option>
<option value="女">女</option>
</select>
                        <span class="redBorder">请选择性别</span>
                    </li>
                    <li>
                        <div class="infoName">年龄:</div>
                        <input class="infoEdit" data-val="true" data-val-number="字段 Age 必须是一个数字。" id="Age" maxlength="3" name="join_people_age" style="width: 200px;" type="text">
                        <span class="typeError" id="AgeTypeError">年龄格式不正确</span>
                    </li>
                    <li>
                        <div class="infoName"><span style="color: red;">*</span>手机:</div>
                        <input class="infoEdit" id="Mobile" maxlength="11" name="join_people_phone" style="width: 200px;" type="text">
                        <span class="redBorder">请填写手机</span>
                        <span class="typeError" id="MobileTypeError">手机格式不正确</span>
                    </li>
                    <li>
                        <div class="infoName">Email:</div>
                        <input class="infoEdit" id="Email" name="join_people_email" style="width: 200px;" type="text">
                        <span class="typeError" id="EmailTypeError">邮箱格式不正确</span>
                    </li>
                    <li>
                        <div class="infoName">座机:</div>
                        <input class="infoEdit" id="Phone" name="join_people_tel" style="width: 200px;" type="text">
                        <span class="typeError" id="PhoneTypeError">座机格式不正确</span>
                    </li>
                    <li>
                        <div class="infoName">传真:</div>
                        <input class="infoEdit" id="Fax" name="join_people_fax" style="width: 200px;" type="text">
                    </li>
                    <li>
                        <div class="infoName">从事行业:</div>
                        <input class="infoEdit" id="Industry" name="join_people_business" style="width: 200px;" type="text">
                    </li>
                </ul>
                <ul data-role="select_oneCol" class="textSy">
                    <li>
                        <div class="infoName">联系地址:</div>
                        <input class="infoEdit" id="ContactAddress" maxlength="255" name="join_people_address" style="width: 940px;" title="" type="text">
                    </li>
                </ul>
            </div>
            <div class="divideLine">
                <div class="infoTitle">物业信息</div>
                <div class="selectBlock">
                    <ul data-role="select_threeCol" class="textSy">
                        <li>
            <div class="age_box1" style="max-width: 100%; display: inline-block;">
                <div class="city-select" id="single-select-1">
                    
                    <div class="city-info">
                        <div class="city-name">
                            <!-- <span id='region'>北京市</span> -->
                        </div>
                        <div class="city-input">
                            <input type="text" class="input-search" id="city_name" name="hotel_city_name" value="" placeholder="请选择城市" />
                        </div>
                    </div>

                </div>
           </div>
                           
                        </li>
                      
                    </ul>
                    <ul data-role="select_threeCol" class="textSy">
                        <li>
                            <div class="infoName"><span style="color: red;">*</span>合作意向:</div>
                            <select class="infoEdit" id="HotelProperty" name="corporation" style="width: 200px;"><option value="" selected="selected">请选择</option>
<option value="直营">直营</option>
<option value="加盟">加盟</option>
</select>
                            <span class="redBorder">请选择合作意向</span>
                        </li>
                        <li>
                            <div class="infoName"><span style="color: red;">*</span>面积:</div>
                            <input class="infoEdit" data-val="true" data-val-number="字段 Area 必须是一个数字。" id="Area" maxlength="7" name="area" style="width: 200px;" type="text">
                            <span class="redBorder">请输入面积</span>
                            <span class="typeError" id="AreaTypeError">面积格式不正确</span>
                        </li>
                    </ul>
                    <ul data-role="select_twoCol" class="textSy">
                        <li>
                            <div class="infoName">是否有物业:</div>
                            <select class="infoEdit" data-val="true" data-val-number="字段 IsHaveTenementValue 必须是一个数字。" id="IsHaveTenementValue" name="tenement" style="width: 200px;"><option value="1" selected="selected">是</option>
<option value="2">否</option>
</select>
                        </li>
                        <li style="width: 64%;" id="liTenementAddress">
                            <div class="infoName"><span style="color: red;">*</span>物业地址:</div>
                            <input class="infoEdit" id="TenementAddress" maxlength="256" name="tenement_address" style="width: 570px;" title="" type="text">
                            <span class="redBorder">请填写物业地址</span>
                        </li>
                    </ul>
                    <ul data-role="select_twoCol" class="textSy">
                        <li>
                            <div class="infoName"><span style="color: red;">*</span>产权情况:</div>

                            <select class="infoEdit" data-val="true" data-val-number="字段 PropertyRight 必须是一个数字。" id="PropertyRight" name="property" style="width: 200px;"><option value="" selected="selected">请选择</option>
<option value="自有物业">自有物业</option>
<option value="租赁物业">租赁物业</option>
<option value="我是中介">我是中介</option>
</select>
                            <span class="redBorder">请选择产权情况</span>
                            <div style="clear: both;"></div>
                        </li>
                        <li style="width: 64%;">
                            <div class="infoName">其他:</div>
                            <input class="infoEdit" id="Others" maxlength="2000" name="others" style="width: 570px;" title="" type="text">
                        </li>
                        <input data-val="true" data-val-number="字段 InfoIntegrity 必须是一个数字。" id="InfoIntegrity" name="InfoIntegrity" value="" type="hidden">
                        <input id="DataSource" name="DataSource" value="加盟商" type="hidden">
                        <input id="IsSubmit" name="IsSubmit" value="" type="hidden">
                    </ul>
                    <ul data-role="select_twoCol" class="textSy">
                        <li>
                            <div class="infoName"><span style="color: red;">*</span>验证码:</div>
                            <input id="ImgCode" class="infoEdit" maxlength="4" style="width: 135px" name="ImgCode" type="text">
                            <img class="imgCode" src="/qiantai/jiameng/GetIntentionVeriCodeImg.jpg" onclick="getIntentionImageCode()" title="点击验证码刷新" style="width: 55px; margin-bottom: -8px;">
                            <span class="redBorder">请填写验证码</span>
                            <span class="typeError" id="ImageCodeTypeError"></span>
                            <div style="clear: both;"></div>
                        </li>
                    </ul>
                </div>

                <center><input type="submit" class="submit_" value="提交"></center>
            
            </div>
        </div>
    </div>
    <input type="hidden" value="" name="hotel_city_name" class="city_">
</form>







        <div data-role="footer">
            
            <div class="footer-img">
                <img src="/qiantai/jiameng/footer_New.png" height="40">
            </div>
        </div>
    </div>
</div>
<div class="opePanel">
    <ul>
        <li>
            <a href="http://www.htinnsjm.com/File/ExportFileToResponse?saveName=%2fDownloadFiles%2f%e7%94%a8%e6%88%b7%e6%89%8b%e5%86%8c.doc" target="_blank">
                <div class="icons userHelp">
                </div>
            </a>
        </li>
        <li>
            <div class="icons toTop"></div>
        </li>
    </ul>

</div>

    <div class="loading_ajax" id="ajaxLoading">
        <img src="/qiantai/jiameng/loading.gif">
    </div>

    <div style="display: none;">
        <input id="AUTHID" name="AUTHID" value="" type="hidden">
        <input id="ASPSESSID" name="ASPSESSID" value="kc1ys00sp3o1cf13dlb2ql4q" type="hidden">
    </div>

</body></html>


    <link rel="stylesheet" type="text/css" href="/qiantai/xiala/css/city-select.css">
<script src="https://cdn.bootcss.com/jquery/1.8.1/jquery.js"></script>
    <script type="text/javascript" src="/qiantai/xiala/js/citydata.min.js"></script>
    <script type="text/javascript" src="/qiantai/xiala/js/citySelect-1.0.0.min.js?v=1"></script>
    <script type="text/javascript">

$(".submit_").click(function(){

    var region_name = $(".city-info").text();
    $(".city_").val(region_name);
});
// $("#region").

    $(function() {

        // 单选
        var singleSelect1 = $('#single-select-1').citySelect({
            dataJson: cityData,
            multiSelect: false,
            shorthand: true,
            search: true,
            onInit: function () {
                console.log(this)
            },
            onTabsAfter: function (target) {
                console.log(target)
            },
            onCallerAfter: function (target, values) {
                console.log(JSON.stringify(values))
            }
        });

        // 单选设置城市
        singleSelect1.setCityVal('北京市');

        // 单选
        var singleSelect2 = $('#single-select-2').citySelect({
            dataJson: cityData
        });

        // 单选设置城市
        singleSelect2.setCityVal('北京市');

        // 禁止点击显示的接口
        singleSelect2.status('readonly');

        //单选
        var singleSelect3 = $('#single-select-3').citySelect({
            dataJson: cityData
        });

        // 单选设置城市
        singleSelect3.setCityVal('广州市');

        // 禁止点击显示的接口
        singleSelect3.status('disabled');

    });
    </script>