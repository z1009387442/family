@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '酒店')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')

<!DOCTYPE html>
<html><!--[if IE 8]><html class="ie ie8 ltie9"><![endif]--><!--[if gte IE 9]><html class="ie ie9"><![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="/qiantai/search_style/style1503546983737.css">
<style type="text/css">
.amap-indoor-map .label-canvas{position:absolute;top:0;left:0}.amap-indoor-map .highlight-image-con *{pointer-events:none}.amap-indoormap-floorbar-control{position:absolute;margin:auto 0;bottom:165px;right:12px;width:35px;text-align:center;line-height:1.3em;overflow:hidden;padding:0 2px}.amap-indoormap-floorbar-control .panel-box{background-color:rgba(255,255,255,.9);border-radius:3px;border:1px solid #ccc}.amap-indoormap-floorbar-control .select-dock{position:absolute;top:0;left:0;width:100%;box-sizing:border-box;height:30px;border:solid #4196ff;border-width:0 2px;border-radius:2px;pointer-events:none;background:linear-gradient(to bottom,#f6f8f9 0,#e5ebee 50%,#d7dee3 51%,#f5f7f9 100%)}.amap-indoor-map .transition{transition:opacity .2s},.amap-indoormap-floorbar-control .transition{transition:top .2s,margin-top .2s}.amap-indoormap-floorbar-control .select-dock:after,.amap-indoormap-floorbar-control .select-dock:before{content:"";position:absolute;width:0;height:0;left:0;top:10px;border:solid transparent;border-width:4px;border-left-color:#4196ff}.amap-indoormap-floorbar-control .select-dock:after{right:0;left:auto;border-left-color:transparent;border-right-color:#4196ff}.amap-indoormap-floorbar-control.is-mobile{width:37px}.amap-indoormap-floorbar-control.is-mobile .floor-btn{height:35px;line-height:35px}.amap-indoormap-floorbar-control.is-mobile .select-dock{height:35px;top:36px}.amap-indoormap-floorbar-control.is-mobile .select-dock:after,.amap-indoormap-floorbar-control.is-mobile .select-dock:before{top:13px}.amap-indoormap-floorbar-control.is-mobile .floor-list-box{height:105px}.amap-indoormap-floorbar-control .floor-list-item .floor-btn{color:#555;font-family:"Times New Roman",sans-serif,"Microsoft Yahei";font-size:16px}.amap-indoormap-floorbar-control .floor-list-item.selected .floor-btn{color:#000}.amap-indoormap-floorbar-control .floor-btn{height:28px;line-height:28px;overflow:hidden;cursor:pointer;position:relative;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.amap-indoormap-floorbar-control .floor-btn:hover{background-color:rgba(221,221,221,.4)}.amap-indoormap-floorbar-control .floor-minus,.amap-indoormap-floorbar-control .floor-plus{position:relative;text-indent:-1000em}.amap-indoormap-floorbar-control .floor-minus:after,.amap-indoormap-floorbar-control .floor-plus:after{content:"";position:absolute;margin:auto;top:9px;left:0;right:0;width:0;height:0;border:solid transparent;border-width:10px 8px;border-top-color:#777}.amap-indoormap-floorbar-control .floor-minus.disabled,.amap-indoormap-floorbar-control .floor-plus.disabled{opacity:.3}.amap-indoormap-floorbar-control .floor-plus:after{border-bottom-color:#777;border-top-color:transparent;top:-3px}.amap-indoormap-floorbar-control .floor-list-box{max-height:153px;position:relative;overflow-y:hidden}.amap-indoormap-floorbar-control .floor-list{margin:0;padding:0;list-style:none}.amap-indoormap-floorbar-control .floor-list-item{position:relative}.amap-indoormap-floorbar-control .floor-btn.disabled,.amap-indoormap-floorbar-control .floor-btn.disabled *,.amap-indoormap-floorbar-control.with-indrm-loader *{-webkit-pointer-events:none!important;pointer-events:none!important}.amap-indoormap-floorbar-control .with-indrm-loader .floor-nonas{opacity:.5}.amap-indoor-map-moverf-marker{color:#555;background-color:#FFFEEF;border:1px solid #7E7E7E;padding:3px 6px;font-size:12px;white-space:nowrap;display:inline-block;position:absolute;top:1em;left:1.2em}.amap-indoormap-floorbar-control .amap-indrm-loader{-moz-animation:amap-indrm-loader 1.25s infinite linear;-webkit-animation:amap-indrm-loader 1.25s infinite linear;animation:amap-indrm-loader 1.25s infinite linear;border:2px solid #91A3D8;border-right-color:transparent;box-sizing:border-box;display:inline-block;overflow:hidden;text-indent:-9999px;width:13px;height:13px;border-radius:7px;position:absolute;margin:auto;top:0;left:0;right:0;bottom:0}@-moz-keyframes amap-indrm-loader{0%{-moz-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes amap-indrm-loader{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes amap-indrm-loader{0%{-moz-transform:rotate(0);-ms-transform:rotate(0);-webkit-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);-webkit-transform:rotate(360deg);transform:rotate(360deg)}}
</style>
    <meta charset="UTF-8">
    <title>sunshine</title>
<style type="text/css">
    #key_word{width: 60px;height: 20px;line-height: 20px;}
</style>
<link rel="stylesheet" href="/qiantai/loading/css/fakeLoader.css">
<!--时间插件引入文件-->
<link rel="stylesheet" type="text/css" href="/qiantai/time/datedropper.css">
<link rel="stylesheet" type="text/css" href="/qiantai/time/timedropper.min.css">
<!--时间插件引入文件（结束）-->
    <link rel="stylesheet" href="/qiantai/search_style/main.css">
    <!--[if lte IE 9]><script src="http://ws-www.hantinghotels.com/newweb/hotels/lib/html5/html5shiv-printshiv.05f5ae90.js"></script><![endif]-->

<style type="text/css">
        var {
        background-repeat: no-repeat;
        }
.p29_0_0,.p29_0_1,.p29_0_2,.p29_0_3,.p29_0_4,.p29_0_5,.p29_0_6,.p29_0_7,.p29_0_8,.p29_0_9,.p29_0_10{background-image: url('/Blur/Pic?b=ba37f0a457ac4c0494c8a0233d8afe0d'); font-size: 27px } .p29_0_0{ background-position: -4px -4px; padding: 0 8px } .p29_0_1{ background-position: -51px -4px; padding: 0 8px } .p29_0_2{ background-position: -109px -4px; padding: 0 8px } .p29_0_3{ background-position: -171px -4px; padding: 0 8px } .p29_0_4{ background-position: -196px -4px; padding: 0 8px } .p29_0_5{ background-position: -258px -4px; padding: 0 8px } .p29_0_6{ background-position: -305px -4px; padding: 0 4px } .p29_0_7{ background-position: -341px -4px; padding: 0 8px } .p29_0_8{ background-position: -389px -4px; padding: 0 8px } .p29_0_9{ background-position: -420px -4px; padding: 0 8px } .p29_0_10{ background-position: -489px -4px; padding: 0 8px } .p18_0_0,.p18_1_0,.p18_0_1,.p18_1_1,.p18_0_2,.p18_1_2,.p18_0_3,.p18_1_3,.p18_0_4,.p18_1_4,.p18_0_5,.p18_1_5,.p18_0_6,.p18_1_6,.p18_0_7,.p18_1_7,.p18_0_8,.p18_1_8,.p18_0_9,.p18_1_9,.p18_0_10,.p18_1_10{background-image: url('/Blur/Pic?b=d1902153e21048c58eaf4e0e838aff69'); font-size: 16px } .p18_0_0{ background-position: -2px -1px; padding: 0 5px } .p18_1_0{ background-position: -2px -21px; padding: 0 5px } .p18_0_1{ background-position: -25px -1px; padding: 0 5px } .p18_1_1{ background-position: -25px -21px; padding: 0 5px } .p18_0_2{ background-position: -42px -1px; padding: 0 5px } .p18_1_2{ background-position: -42px -21px; padding: 0 5px } .p18_0_3{ background-position: -64px -1px; padding: 0 5px } .p18_1_3{ background-position: -64px -21px; padding: 0 5px } .p18_0_4{ background-position: -84px -1px; padding: 0 5px } .p18_1_4{ background-position: -84px -21px; padding: 0 5px } .p18_0_5{ background-position: -114px -1px; padding: 0 5px } .p18_1_5{ background-position: -114px -21px; padding: 0 5px } .p18_0_6{ background-position: -144px -1px; padding: 0 2px } .p18_1_6{ background-position: -144px -21px; padding: 0 2px } .p18_0_7{ background-position: -159px -1px; padding: 0 5px } .p18_1_7{ background-position: -159px -21px; padding: 0 5px } .p18_0_8{ background-position: -174px -1px; padding: 0 5px } .p18_1_8{ background-position: -174px -21px; padding: 0 5px } .p18_0_9{ background-position: -188px -1px; padding: 0 5px } .p18_1_9{ background-position: -188px -21px; padding: 0 5px } .p18_0_10{ background-position: -215px -1px; padding: 0 5px } .p18_1_10{ background-position: -215px -21px; padding: 0 5px } .p16_0_0,.p16_1_0,.p16_0_1,.p16_1_1,.p16_0_2,.p16_1_2,.p16_0_3,.p16_1_3,.p16_0_4,.p16_1_4,.p16_0_5,.p16_1_5,.p16_0_6,.p16_1_6,.p16_0_7,.p16_1_7,.p16_0_8,.p16_1_8,.p16_0_9,.p16_1_9,.p16_0_10,.p16_1_10{background-image: url('/Blur/Pic?b=8abba637b7ba46ce9a25dd009f960189'); font-size: 15px } .p16_0_0{ background-position: -2px -2px; padding: 0 4px } .p16_1_0{ background-position: -2px -20px; padding: 0 4px } .p16_0_1{ background-position: -32px -2px; padding: 0 4px } .p16_1_1{ background-position: -32px -20px; padding: 0 4px } .p16_0_2{ background-position: -66px -2px; padding: 0 4px } .p16_1_2{ background-position: -66px -20px; padding: 0 4px } .p16_0_3{ background-position: -91px -2px; padding: 0 4px } .p16_1_3{ background-position: -91px -20px; padding: 0 4px } .p16_0_4{ background-position: -121px -2px; padding: 0 4px } .p16_1_4{ background-position: -121px -20px; padding: 0 4px } .p16_0_5{ background-position: -154px -2px; padding: 0 4px } .p16_1_5{ background-position: -154px -20px; padding: 0 4px } .p16_0_6{ background-position: -181px -2px; padding: 0 2px } .p16_1_6{ background-position: -181px -20px; padding: 0 2px } .p16_0_7{ background-position: -199px -2px; padding: 0 4px } .p16_1_7{ background-position: -199px -20px; padding: 0 4px } .p16_0_8{ background-position: -213px -2px; padding: 0 4px } .p16_1_8{ background-position: -213px -20px; padding: 0 4px } .p16_0_9{ background-position: -251px -2px; padding: 0 4px } .p16_1_9{ background-position: -251px -20px; padding: 0 4px } .p16_0_10{ background-position: -273px -2px; padding: 0 4px } .p16_1_10{ background-position: -273px -20px; padding: 0 4px } .p14_0_0,.p14_0_1,.p14_0_2,.p14_0_3,.p14_0_4,.p14_0_5,.p14_0_6,.p14_0_7,.p14_0_8,.p14_0_9,.p14_0_10{background-image: url('/Blur/Pic?b=9b619e82e1384d8fa633432e91414433'); font-size: 13px } .p14_0_0{ background-position: -2px -2px; padding: 0 4px } .p14_0_1{ background-position: -28px -2px; padding: 0 4px } .p14_0_2{ background-position: -56px -2px; padding: 0 4px } .p14_0_3{ background-position: -77px -2px; padding: 0 4px } .p14_0_4{ background-position: -102px -2px; padding: 0 4px } .p14_0_5{ background-position: -130px -2px; padding: 0 4px } .p14_0_6{ background-position: -153px -2px; padding: 0 3px } .p14_0_7{ background-position: -169px -2px; padding: 0 4px } .p14_0_8{ background-position: -181px -2px; padding: 0 4px } .p14_0_9{ background-position: -213px -2px; padding: 0 4px } .p14_0_10{ background-position: -232px -2px; padding: 0 4px } .p12_0_0,.p12_1_0,.p12_0_1,.p12_1_1,.p12_0_2,.p12_1_2,.p12_0_3,.p12_1_3,.p12_0_4,.p12_1_4,.p12_0_5,.p12_1_5,.p12_0_6,.p12_1_6,.p12_0_7,.p12_1_7,.p12_0_8,.p12_1_8,.p12_0_9,.p12_1_9,.p12_0_10,.p12_1_10{background-image: url('/Blur/Pic?b=10c45e24f84a4e0fbefa9bb40efba0d6'); font-size: 12px } .p12_0_0{ background-position: -2px -3px; padding: 0 3px } .p12_1_0{ background-position: -2px -18px; padding: 0 3px } .p12_0_1{ background-position: -12px -3px; padding: 0 3px } .p12_1_1{ background-position: -12px -18px; padding: 0 3px } .p12_0_2{ background-position: -32px -3px; padding: 0 3px } .p12_1_2{ background-position: -32px -18px; padding: 0 3px } .p12_0_3{ background-position: -55px -3px; padding: 0 3px } .p12_1_3{ background-position: -55px -18px; padding: 0 3px } .p12_0_4{ background-position: -66px -3px; padding: 0 3px } .p12_1_4{ background-position: -66px -18px; padding: 0 3px } .p12_0_5{ background-position: -76px -3px; padding: 0 3px } .p12_1_5{ background-position: -76px -18px; padding: 0 3px } .p12_0_6{ background-position: -97px -3px; padding: 0 1px } .p12_1_6{ background-position: -97px -18px; padding: 0 1px } .p12_0_7{ background-position: -113px -3px; padding: 0 3px } .p12_1_7{ background-position: -113px -18px; padding: 0 3px } .p12_0_8{ background-position: -124px -3px; padding: 0 3px } .p12_1_8{ background-position: -124px -18px; padding: 0 3px } .p12_0_9{ background-position: -153px -3px; padding: 0 3px } .p12_1_9{ background-position: -153px -18px; padding: 0 3px } .p12_0_10{ background-position: -168px -3px; padding: 0 3px } .p12_1_10{ background-position: -168px -18px; padding: 0 3px }     </style>
<style type="text/css">.amap-container{cursor:url(http://webapi.amap.com/theme/v1.3/openhand.cur),default;}.amap-drag{cursor:url(http://webapi.amap.com/theme/v1.3/closedhand.cur),default;}</style><script charset="utf-8" src="/qiantai/search_style/v.htm"></script></head>

<body>
<!-- loading -->
<!-- <div class="fakeloader"></div> -->
<!-- loading -->
<style type="text/css">
	.chufa{
		display: none;
	}
</style>
<script type="text/javascript">

	$(window).scroll(function () {
	if ($(window).scrollTop() >= 45) {
		$(".chufa").show();
	}else{
		$(".chufa").hide();
	}
});
</script>
<div class="newCommonHeader Lposr">
	


	<div id="Plist_checkin" class="Plist_checkin">
                <div id="Plist_checkin" class="Plist_checkin">
                <div class="checkinbox shadow " style="position: absolute; left: 77px;  width: 100%;">
                    <div class="Lcfx">
                        <div class="item Lfll" data-nblock-id="ui/checkinCity">
                            <span class="ltext">城市</span>
                            <div class="inputbox">
                                <div class="city-select" id="single-select-1">
                                    <div class="city-info">
                                        <div class="city-name">
                                            <!-- <span id='region'></span> -->
                                        </div>
                                        <div class="city-input">
                                            <input value="上海" class="input1 checkincity input-search" type="text">
                                            <!-- <input type="text" class="input-search" value="" placeholder="请选择城市" /> -->
                                        </div>
                                    </div>
                                </div>    
                                <div class="arrowbox"><i class="Cicon drop_arrow"></i></div>
                            </div>
                        </div>
                        <div class="Lfll" data-nblock-id="ui/checkinDate?offset=0px-10px">
                            <div class="item Lfll">
                                <span class="ltext">入住日期</span>
                                <div class="inputbox">
                                    <!-- <input type="text" class="input" id="pickdate" style="color:#000" /> -->
                                    <input value="2017-09-07" class="input1" id="pickdate" type="text">
                                    <div class="arrowbox"><i class="Cicon drop_arrow"></i></div>
                                </div>
                            </div>
                            <div class="item Lfll">
                                <span class="ltext">退房日期</span>
                                <div class="inputbox">
                                    <input value="2017-09-08" class="input1" id="pickdate1" type="text">
                                    <div class="arrowbox"><i class="Cicon drop_arrow"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="item Lfll" data-nblock-id="ui/checkinKeyword">
                            <span class="ltext">关键字</span>
                            <div class="inputbox">
                                <input id="key_word" placeholder="酒店名称" data-keyword="" type="text">
                            </div>
                        </div>
                        <div class="btnbox Lfll"><a href="javascript:;" rel="nofollow" class="Cbtn std_small Lmr10 search">搜索</a></div>
                    </div>
                </div>
            </div>
    </div>
</div>
    <div class="Cmbox">
        <div class="inner Cwrap">
            <div id="Plist_checkin" class="Plist_checkin">
                <div class="checkinbox shadow chufa " style="top: 0px; position: fixed; width: 100%;">
                    <div class="Lcfx">
                        <div class="item Lfll" data-nblock-id="ui/checkinCity">
                            <span class="ltext">城市</span>
                            <div class="inputbox">
                                <div class="city-select" id="single-select-1">
                                    <div class="city-info">
                                        <div class="city-name">
                                            <!-- <span id='region'></span> -->
                                        </div>
                                        <div class="city-input">
                                            <input value="上海" class="input1 checkincity input-search" type="text">
                                            <!-- <input type="text" class="input-search" value="" placeholder="请选择城市" /> -->
                                        </div>
                                    </div>
                                </div>    
                                <div class="arrowbox"><i class="Cicon drop_arrow"></i></div>
                            </div>
                        </div>
                        <div class="Lfll" data-nblock-id="ui/checkinDate?offset=0px-10px">
                            <div class="item Lfll">
                                <span class="ltext">入住日期</span>
                                <div class="inputbox">
                                    <!-- <input type="text" class="input" id="pickdate" style="color:#000" /> -->
                                    <input value="2017-09-07" class="input1" id="pickdate" type="text">
                                    <div class="arrowbox"><i class="Cicon drop_arrow"></i></div>
                                </div>
                            </div>
                            <div class="item Lfll">
                                <span class="ltext">退房日期</span>
                                <div class="inputbox">
                                    <input value="2017-09-08" class="input1" id="pickdate1" type="text">
                                    <div class="arrowbox"><i class="Cicon drop_arrow"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="item Lfll" data-nblock-id="ui/checkinKeyword">
                            <span class="ltext">关键字</span>
                            <div class="inputbox">
                                <input id="key_word" placeholder="酒店名称" data-keyword="" type="text">
                            </div>
                        </div>
                        <div class="btnbox Lfll"><a href="javascript:;" rel="nofollow" class="Cbtn std_small Lmr10 search">搜索</a></div>
                    </div>
                </div>
            </div>


            <div id="Plist_filter" class="Plist_filter Lposr" data-nblock-id="block/hotelListFilter">
                <!-- <a href="javascript:;" class="expand expand_big shrink"><span>展开</span>设施&amp;评论<i class="arrow"></i></a> --> 
                        
                            <div class="filteritem">
                                <span class="name">品牌</span>
                                <div class="itembox Lcfx branditem" data-param="HotelStyleList">
                                    <span class=" clean">不限</span>
                                            <label class="item" title="桔子水晶">
                                                <input class="check1" data-search-code="14" type="checkbox">桔子水晶
                                            </label>
                                </div>
                            </div>
                            <div class="filteritem">
                                <span class="name">价格</span>
                                <div class="itembox Lcfx priceitem" data-param="PriceRange">
                                    <span class=" clean">不限</span>
                                            <label class="item" title="￥150以下">
                                                <input class="check1" data-search-code="A" type="checkbox">￥150以下
                                            </label>
                                            <label class="item" title="￥150-￥300">
                                                <input class="check1" data-search-code="B" type="checkbox">￥150-￥300
                                            </label>
                                            <label class="item" title="￥301-￥450">
                                                <input class="check1" data-search-code="C" type="checkbox">￥301-￥450
                                            </label>
                                            <label class="item" title="￥451-￥600">
                                                <input class="check1" data-search-code="D" type="checkbox">￥451-￥600
                                            </label>
                                            <label class="item" title="￥600以上">
                                                <input class="check1" data-search-code="E" type="checkbox">￥600以上
                                            </label>
                                </div>
                            </div>
                            <div class="filteritem" style="display: block;">
                                <span class="name">设施与服务</span>
                                <div class="itembox Lcfx serviceitem" data-param="FacilityList">
                                    <span class=" clean">不限</span>
                                            <label class="item" title="会议室">
                                                <input class="check1" data-search-code="3" type="checkbox">会议室
                                            </label>
                                </div>
                            </div>
                            <div class="filteritem" style="display: block;">
                                <span class="name">评价</span>
                                <div class="itembox Lcfx commentitem" data-param="UserOptimization">
                                    <span class=" clean">不限</span>
                                            <label class="item" title="周边繁华">
                                                <input name="UserOptimization" class="check1" data-search-code="SDN" type="radio">周边繁华
                                            </label>
                                </div>
                            </div>

            </div>
            <div class="Plist_mbox Lcfx">
                <div class="searchfilter Cdir"><div class="all Ldib">
    <span class="icon-tag">所有</span>
    <span class="next">&gt;</span>
</div>

<!-- 区域展示 -->

<!-- 品牌展示 -->

<!-- 价格展示 -->

<!-- 设施展示 -->

<!-- 评价展示 -->

<!--价格范围展示-->

<!-- 关键词展示 -->
<div class="areakeyword Ldib" data-param="areakeyword" style="display:none">
    <a class="icon-tag" data-keyword="" data-type="" data-value=""></a>
    
</div>


</div>
                <div class="lbox">
                    <div id="Plist_hotel" class="Plist_hotel" data-nblock-id="block/hotelListHotels?initHotelList=hotelListData">
                        <div class="citycount">
                            当前城市，为您找到<b>503</b>家酒店
                        </div>
                        <div class="filterbox">
                            <div class="filterbar Lcfx" style="top: 52px; left: 164.6px; position: static; width: auto;">
                                <div class="Lfll sortbox">
                                    <a href="javascript:;" rel="nofollow" class="label active" data-type="NoSet">默认排序</a>
                                    <a href="javascript:;" rel="nofollow" class="sort" data-type="LowestPrice" data-sort="Asc" data-title-prefix="价格" title="价格从低到高">价格<i class="Cicon sortup"></i></a>
                                    <a href="javascript:;" rel="nofollow" class="sort" data-type="CommentScore" data-sort="Desc" data-title-prefix="评分" title="评分从高到低">评分<i class="Cicon sortdown"></i></a>
                                </div>
                                <div class="Lflr typebox Ldn">
                                    <label class="type">
                                        <input class="radio1" type="radio"> 全日房
                                    </label>
                                    <label class="type">
                                        <input class="radio1" type="radio"> 仅看时租房
                                    </label>
                                    <label class="type">
                                        <input class="radio1" type="radio"> 仅看夜宵房
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hotellist_box">

<div class="hotellist Lmt10">



<?php  foreach($hotel_arr as $hotel) { ?>
<div class="hotel address" data-hotel-id="8000234" data-hotel-currencycode="CNY" data-open-rev="true" data-hotel-source="1" data-hotel-style="16" data-lat="31.247319" data-lng="121.489472" data-hall-ids="" data-query-room-type="0">
    <div class="hotelbox">
        
        
        <div class="img"><img src="<?php echo $hotel->hotel_img; ?>" width="190" height="160"></div>
        <div class="desc">
            <div class="hotelname  hasTaxBedge">
                <a class="name" title="<?php echo $hotel->hotel_name; ?>" href="{{url('home/hotel/room')}}/id/<?php echo $hotel->hotel_id; ?>" target="_blank">
                    <h2><?php echo $hotel->hotel_name; ?></h2>
                </a>
                
                <span class="tax_bedge tax_bedge_0">普票立取</span>
            </div>
            <div class="address city"><?php echo $hotel->hotel_address; ?></div>
            
            
            <div class="lastorder"></div>
            <div class="commentseg hasLabel"><i class="Cicon small_msg"></i>大家说：<span>干净卫生</span></div>
            <div class="service">
                
                
                
                <i class="Cicon small_wifi" title="客房Wifi覆盖"></i>
                
                
                
                <i class="Cicon small_breakfast" title="餐厅"></i>
                
                
                
                <span class="favor_count"><i class="Cicon small_favor"></i><span>收藏</span><span class="num">23</span></span>
            </div>
        </div>
        <div class="rarea">
            <div class="pricearea Ltar" data-hotel-lowest-price="-143"><span class="price"><i>￥</i><var class="p29_0_0"></var><var class="p29_0_4"></var><var class="p29_0_3"></var><i>起</i></span></div>
            <div class="score Ltar">
                <i class="Cicon star full"></i><i class="Cicon star full"></i><i class="Cicon star full"></i><i class="Cicon star full"></i><i class="Cicon star full"></i>
                <span class="Ldib Lpl5">5<i>/5分</i></span>
            </div>
            <div class="comment Ltar"><a href="{{url('home/hotel/room')}}/id/<?php echo $hotel->hotel_id; ?>" target="_blank">共0条评论</a></div>
            <div class="btnbox Ltar"><a href="{{url('home/hotel/room')}}/id/<?php echo $hotel->hotel_id; ?>" target="_blank" class="Cbtn viewexpand">查看详情</a></div>
            
            <div class="expandlink Ltar">
                <a class="viewroomtype" href="javascript:;"><span>展开全部房型</span><i class="arrow"></i></a>
            </div>
            
        </div>
    </div>
</div>
<?php } ?>
</div>
</div>

<div class="pages">
<div class="Cpage Ltar">
<a href="#" class="active" data-page-index="1">1</a><a href="#" data-page-index="2">2</a><a href="#" data-page-index="3">3</a><a href="#" class="needspace" data-page-index="2">下一页</a><a href="#" class="needspace" data-page-index="51">尾页</a>
</div>
</div>

<div class="recommend_hotellist_box"></div>
</div>
</div>


            </div>
        </div>
        <div class="Lpt20">&nbsp;</div>
    </div>



      
    <div class="Ldn" id="scriptArea" data-page-id="hotel/list">
        <!--[if lte IE 9]><div data-nblock-id="ui/wideScreen"></div><![endif]-->
        <div data-nblock-id="ui/loading"></div>
        <div data-nblock-id="ui/error"></div>
        <div data-nblock-id="block/hotelUserInfo"></div>
        <div data-nblock-id="block/trackCompatibleMode"></div>

        <script src="/qiantai/search_style/hm.js"></script>
        <script type="text/javascript" async="" src="/qiantai/search_style/piwik.js"></script>
        <script type="text/javascript" async="" src="/qiantai/search_style/ga.js"></script><script type="text/javascript" async="" src="/qiantai/search_style/vds.js"></script><script type="text/javascript" src="/qiantai/search_style/mainApp.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/jquery.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/mainBlock.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/CheckinCityTemplate.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/CheckinCitySuggestTemplate.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/CheckinKeywordTemplate.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/CheckinKeySuggestTemplate.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/CheckinCityFixedTemplate.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/searchFilterList.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/VisitedHotelItem.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/checkinCity.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/checkinKeyword.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/visitedHotel.js" async="true"></script><link type="text/css" rel="stylesheet" href="/qiantai/search_style/jquery-ui.css"><link type="text/css" rel="stylesheet" href="/qiantai/search_style/jquery-ui_002.css"><script type="text/javascript" src="/qiantai/search_style/jquery-ui.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/HotelBox.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/RoomType.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/util.js" async="true"></script><script type="text/javascript" src="/qiantai/search_style/datepicker-zh-CN.js" async="true"></script><script src="/qiantai/search_style/library.js"></script>
        <!--[if lte IE 9]>
            <script src="http://ws-www.hantinghotels.com/newweb/hotels/lib/jquery/jquery.placeholder.min.5fbd3e01.js"></script>
            <script>$('input, textarea').placeholder({ customClass: 'Cplaceholder' });</script>
        <![endif]-->
        <script src="/qiantai/search_style/Config.js"></script>
        <script src="/qiantai/search_style/common.js"></script>
        
    
            <script src="/qiantai/search_style/huazhu_track.js"></script>
    <script type="text/javascript" src="/qiantai/search_style/maps"></script></div>

<!-- 引入loading加载 -->
<script src="/qiantai/loading/js/jquery.min.js"></script>
    <script src="/qiantai/loading/js/fakeLoader.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".fakeloader").fakeLoader({
                timeToHide:1200,
                bgColor:"#34495e",
                spinner:"spinner1"
            });
        });
    </script>
<!-- 引入loading加载 -->

    <link rel="stylesheet" type="text/css" href="/qiantai/xiala/css/city-select.css">
    <script type="text/javascript" src="/qiantai/xiala/js/citydata.min.js"></script>
    <script type="text/javascript" src="/qiantai/xiala/js/citySelect-1.0.0.min.js?v=1"></script>
<script>
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

<script src="/qiantai/time/datedropper.min.js"></script>
<script src="/qiantai/time/timedropper.min.js"></script>
<script>
$("#pickdate").dateDropper({
    animate: false,
    format: 'Y-m-d',
    maxYear: '2020'
});
$("#pickdate1").dateDropper({
    animate: false,
    format: 'Y-m-d',
    maxYear: '2020'
});

</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?cc58f09bfb6ccacac51c4e5d7787d7d0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>







</div>
<!--右边div-->
<div class="col-md-3 match_right">



</div>
<!--右边div（结束）-->
<div class="clearfix"> </div>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    
    #allmap{
      position:fixed;right:10px;top:150px;width:280px;height:352px;
      overflow: hidden; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;
    }
    p{margin-left:5px; font-size:14px;}
  </style>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=skiLvOXleNYZrnh8Sokp3he4G2mX47Gn"></script>

  <div id="allmap"></div>
<script src="jquery.js"></script>
<script type="text/javascript">
  $(".address").mouseenter(function(){
    var address = $(this).find(".city").text();
    //百度地图API功能
  var map = new BMap.Map("allmap");          
  map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
  var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map}
  });
  local.search(address);
  $("#allmap").removeAttr("style");
  });

  
</script>

  </div>
</div>
<link href="/qiantai/css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="/qiantai/js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>

@endsection

@section('footer')
	@parent
@endsection