@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '房间')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link rel="stylesheet" type="text/css" href="/qiantai/room_type/style1503546983737.css"><style type="text/css">.amap-indoor-map .label-canvas{position:absolute;top:0;left:0}.amap-indoor-map .highlight-image-con *{pointer-events:none}.amap-indoormap-floorbar-control{position:absolute;margin:auto 0;bottom:165px;right:12px;width:35px;text-align:center;line-height:1.3em;overflow:hidden;padding:0 2px}.amap-indoormap-floorbar-control .panel-box{background-color:rgba(255,255,255,.9);border-radius:3px;border:1px solid #ccc}.amap-indoormap-floorbar-control .select-dock{position:absolute;top:0;left:0;width:100%;box-sizing:border-box;height:30px;border:solid #4196ff;border-width:0 2px;border-radius:2px;pointer-events:none;background:linear-gradient(to bottom,#f6f8f9 0,#e5ebee 50%,#d7dee3 51%,#f5f7f9 100%)}.amap-indoor-map .transition{transition:opacity .2s},.amap-indoormap-floorbar-control .transition{transition:top .2s,margin-top .2s}.amap-indoormap-floorbar-control .select-dock:after,.amap-indoormap-floorbar-control .select-dock:before{content:"";position:absolute;width:0;height:0;left:0;top:10px;border:solid transparent;border-width:4px;border-left-color:#4196ff}.amap-indoormap-floorbar-control .select-dock:after{right:0;left:auto;border-left-color:transparent;border-right-color:#4196ff}.amap-indoormap-floorbar-control.is-mobile{width:37px}.amap-indoormap-floorbar-control.is-mobile .floor-btn{height:35px;line-height:35px}.amap-indoormap-floorbar-control.is-mobile .select-dock{height:35px;top:36px}.amap-indoormap-floorbar-control.is-mobile .select-dock:after,.amap-indoormap-floorbar-control.is-mobile .select-dock:before{top:13px}.amap-indoormap-floorbar-control.is-mobile .floor-list-box{height:105px}.amap-indoormap-floorbar-control .floor-list-item .floor-btn{color:#555;font-family:"Times New Roman",sans-serif,"Microsoft Yahei";font-size:16px}.amap-indoormap-floorbar-control .floor-list-item.selected .floor-btn{color:#000}.amap-indoormap-floorbar-control .floor-btn{height:28px;line-height:28px;overflow:hidden;cursor:pointer;position:relative;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.amap-indoormap-floorbar-control .floor-btn:hover{background-color:rgba(221,221,221,.4)}.amap-indoormap-floorbar-control .floor-minus,.amap-indoormap-floorbar-control .floor-plus{position:relative;text-indent:-1000em}.amap-indoormap-floorbar-control .floor-minus:after,.amap-indoormap-floorbar-control .floor-plus:after{content:"";position:absolute;margin:auto;top:9px;left:0;right:0;width:0;height:0;border:solid transparent;border-width:10px 8px;border-top-color:#777}.amap-indoormap-floorbar-control .floor-minus.disabled,.amap-indoormap-floorbar-control .floor-plus.disabled{opacity:.3}.amap-indoormap-floorbar-control .floor-plus:after{border-bottom-color:#777;border-top-color:transparent;top:-3px}.amap-indoormap-floorbar-control .floor-list-box{max-height:153px;position:relative;overflow-y:hidden}.amap-indoormap-floorbar-control .floor-list{margin:0;padding:0;list-style:none}.amap-indoormap-floorbar-control .floor-list-item{position:relative}.amap-indoormap-floorbar-control .floor-btn.disabled,.amap-indoormap-floorbar-control .floor-btn.disabled *,.amap-indoormap-floorbar-control.with-indrm-loader *{-webkit-pointer-events:none!important;pointer-events:none!important}.amap-indoormap-floorbar-control .with-indrm-loader .floor-nonas{opacity:.5}.amap-indoor-map-moverf-marker{color:#555;background-color:#FFFEEF;border:1px solid #7E7E7E;padding:3px 6px;font-size:12px;white-space:nowrap;display:inline-block;position:absolute;top:1em;left:1.2em}.amap-indoormap-floorbar-control .amap-indrm-loader{-moz-animation:amap-indrm-loader 1.25s infinite linear;-webkit-animation:amap-indrm-loader 1.25s infinite linear;animation:amap-indrm-loader 1.25s infinite linear;border:2px solid #91A3D8;border-right-color:transparent;box-sizing:border-box;display:inline-block;overflow:hidden;text-indent:-9999px;width:13px;height:13px;border-radius:7px;position:absolute;margin:auto;top:0;left:0;right:0;bottom:0}@-moz-keyframes amap-indrm-loader{0%{-moz-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes amap-indrm-loader{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes amap-indrm-loader{0%{-moz-transform:rotate(0);-ms-transform:rotate(0);-webkit-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);-webkit-transform:rotate(360deg);transform:rotate(360deg)}}</style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; IE=8">

    <link rel="stylesheet" href="/qiantai/room_type/main.14f7aa84.css">
    <style type="text/css">
        var {
        background-repeat: no-repeat;
        }
.p29_0_0,.p29_0_1,.p29_0_2,.p29_0_3,.p29_0_4,.p29_0_5,.p29_0_6,.p29_0_7,.p29_0_8,.p29_0_9,.p29_0_10{background-image: url('/Blur/Pic?b=5a664b2d7a83492181fcc12a20c0c84d'); font-size: 27px } .p29_0_0{ background-position: -4px -4px; padding: 0 8px } .p29_0_1{ background-position: -64px -4px; padding: 0 8px } .p29_0_2{ background-position: -109px -4px; padding: 0 8px } .p29_0_3{ background-position: -148px -4px; padding: 0 8px } .p29_0_4{ background-position: -219px -4px; padding: 0 8px } .p29_0_5{ background-position: -246px -4px; padding: 0 4px } .p29_0_6{ background-position: -264px -4px; padding: 0 8px } .p29_0_7{ background-position: -313px -4px; padding: 0 8px } .p29_0_8{ background-position: -343px -4px; padding: 0 8px } .p29_0_9{ background-position: -383px -4px; padding: 0 8px } .p29_0_10{ background-position: -453px -4px; padding: 0 8px } .p18_0_0,.p18_1_0,.p18_0_1,.p18_1_1,.p18_0_2,.p18_1_2,.p18_0_3,.p18_1_3,.p18_0_4,.p18_1_4,.p18_0_5,.p18_1_5,.p18_0_6,.p18_1_6,.p18_0_7,.p18_1_7,.p18_0_8,.p18_1_8,.p18_0_9,.p18_1_9,.p18_0_10,.p18_1_10{background-image: url('/Blur/Pic?b=2230f503618d4821b8883c3cc238cdc0'); font-size: 16px } .p18_0_0{ background-position: -2px -1px; padding: 0 5px } .p18_1_0{ background-position: -2px -21px; padding: 0 5px } .p18_0_1{ background-position: -19px -1px; padding: 0 5px } .p18_1_1{ background-position: -19px -21px; padding: 0 5px } .p18_0_2{ background-position: -36px -1px; padding: 0 5px } .p18_1_2{ background-position: -36px -21px; padding: 0 5px } .p18_0_3{ background-position: -64px -1px; padding: 0 5px } .p18_1_3{ background-position: -64px -21px; padding: 0 5px } .p18_0_4{ background-position: -89px -1px; padding: 0 5px } .p18_1_4{ background-position: -89px -21px; padding: 0 5px } .p18_0_5{ background-position: -111px -1px; padding: 0 2px } .p18_1_5{ background-position: -111px -21px; padding: 0 2px } .p18_0_6{ background-position: -120px -1px; padding: 0 5px } .p18_1_6{ background-position: -120px -21px; padding: 0 5px } .p18_0_7{ background-position: -153px -1px; padding: 0 5px } .p18_1_7{ background-position: -153px -21px; padding: 0 5px } .p18_0_8{ background-position: -171px -1px; padding: 0 5px } .p18_1_8{ background-position: -171px -21px; padding: 0 5px } .p18_0_9{ background-position: -194px -1px; padding: 0 5px } .p18_1_9{ background-position: -194px -21px; padding: 0 5px } .p18_0_10{ background-position: -232px -1px; padding: 0 5px } .p18_1_10{ background-position: -232px -21px; padding: 0 5px } .p16_0_0,.p16_1_0,.p16_0_1,.p16_1_1,.p16_0_2,.p16_1_2,.p16_0_3,.p16_1_3,.p16_0_4,.p16_1_4,.p16_0_5,.p16_1_5,.p16_0_6,.p16_1_6,.p16_0_7,.p16_1_7,.p16_0_8,.p16_1_8,.p16_0_9,.p16_1_9,.p16_0_10,.p16_1_10{background-image: url('/Blur/Pic?b=e917c9a7da79483aa180c39173ebdf3e'); font-size: 15px } .p16_0_0{ background-position: -2px -2px; padding: 0 4px } .p16_1_0{ background-position: -2px -20px; padding: 0 4px } .p16_0_1{ background-position: -18px -2px; padding: 0 4px } .p16_1_1{ background-position: -18px -20px; padding: 0 4px } .p16_0_2{ background-position: -34px -2px; padding: 0 4px } .p16_1_2{ background-position: -34px -20px; padding: 0 4px } .p16_0_3{ background-position: -60px -2px; padding: 0 4px } .p16_1_3{ background-position: -60px -20px; padding: 0 4px } .p16_0_4{ background-position: -83px -2px; padding: 0 2px } .p16_1_4{ background-position: -83px -20px; padding: 0 2px } .p16_0_5{ background-position: -97px -2px; padding: 0 4px } .p16_1_5{ background-position: -97px -20px; padding: 0 4px } .p16_0_6{ background-position: -111px -2px; padding: 0 4px } .p16_1_6{ background-position: -111px -20px; padding: 0 4px } .p16_0_7{ background-position: -142px -2px; padding: 0 4px } .p16_1_7{ background-position: -142px -20px; padding: 0 4px } .p16_0_8{ background-position: -158px -2px; padding: 0 4px } .p16_1_8{ background-position: -158px -20px; padding: 0 4px } .p16_0_9{ background-position: -179px -2px; padding: 0 4px } .p16_1_9{ background-position: -179px -20px; padding: 0 4px } .p16_0_10{ background-position: -214px -2px; padding: 0 4px } .p16_1_10{ background-position: -214px -20px; padding: 0 4px } .p14_0_0,.p14_0_1,.p14_0_2,.p14_0_3,.p14_0_4,.p14_0_5,.p14_0_6,.p14_0_7,.p14_0_8,.p14_0_9,.p14_0_10{background-image: url('/Blur/Pic?b=d7422dd20a284b7d86b6f947014c82b2'); font-size: 13px } .p14_0_0{ background-position: -2px -2px; padding: 0 4px } .p14_0_1{ background-position: -15px -2px; padding: 0 4px } .p14_0_2{ background-position: -29px -2px; padding: 0 4px } .p14_0_3{ background-position: -51px -2px; padding: 0 4px } .p14_0_4{ background-position: -70px -2px; padding: 0 3px } .p14_0_5{ background-position: -82px -2px; padding: 0 4px } .p14_0_6{ background-position: -94px -2px; padding: 0 4px } .p14_0_7{ background-position: -120px -2px; padding: 0 4px } .p14_0_8{ background-position: -134px -2px; padding: 0 4px } .p14_0_9{ background-position: -152px -2px; padding: 0 4px } .p14_0_10{ background-position: -182px -2px; padding: 0 4px } .p12_0_0,.p12_1_0,.p12_0_1,.p12_1_1,.p12_0_2,.p12_1_2,.p12_0_3,.p12_1_3,.p12_0_4,.p12_1_4,.p12_0_5,.p12_1_5,.p12_0_6,.p12_1_6,.p12_0_7,.p12_1_7,.p12_0_8,.p12_1_8,.p12_0_9,.p12_1_9,.p12_0_10,.p12_1_10{background-image: url('/Blur/Pic?b=da133aa928b44ca8a85c27ddeedd177d'); font-size: 12px } .p12_0_0{ background-position: -2px -3px; padding: 0 3px } .p12_1_0{ background-position: -2px -18px; padding: 0 3px } .p12_0_1{ background-position: -14px -3px; padding: 0 3px } .p12_1_1{ background-position: -14px -18px; padding: 0 3px } .p12_0_2{ background-position: -26px -3px; padding: 0 3px } .p12_1_2{ background-position: -26px -18px; padding: 0 3px } .p12_0_3{ background-position: -46px -3px; padding: 0 3px } .p12_1_3{ background-position: -46px -18px; padding: 0 3px } .p12_0_4{ background-position: -63px -3px; padding: 0 1px } .p12_1_4{ background-position: -63px -18px; padding: 0 1px } .p12_0_5{ background-position: -74px -3px; padding: 0 3px } .p12_1_5{ background-position: -74px -18px; padding: 0 3px } .p12_0_6{ background-position: -85px -3px; padding: 0 3px } .p12_1_6{ background-position: -85px -18px; padding: 0 3px } .p12_0_7{ background-position: -108px -3px; padding: 0 3px } .p12_1_7{ background-position: -108px -18px; padding: 0 3px } .p12_0_8{ background-position: -121px -3px; padding: 0 3px } .p12_1_8{ background-position: -121px -18px; padding: 0 3px } .p12_0_9{ background-position: -137px -3px; padding: 0 3px } .p12_1_9{ background-position: -137px -18px; padding: 0 3px } .p12_0_10{ background-position: -164px -3px; padding: 0 3px } .p12_1_10{ background-position: -164px -18px; padding: 0 3px }     </style>
<style type="text/css">.amap-container{cursor:url(http://webapi.amap.com/theme/v1.3/openhand.cur),default;}.amap-drag{cursor:url(http://webapi.amap.com/theme/v1.3/closedhand.cur),default;}</style></head>

<div class="Cmbox">
    <div class="inner Cwrap">
        <div id="Pdetail_part1" class="Pdetail_part1">
            <div class="top Lcfx">
                <div class="hotelinfo Lfll">
                    <div class="hotelname">
                        <h1>
                        {{$hotel['hotel_name']}}
                        </h1>
                    </div>
                    <div class="address Lmt5">{{$hotel['hotel_address']}}</div>
                </div>
            </div>
            <div class="Lcfx Lmt5">
                <div class="hotelpic Lfll Lposr">
                                                    <img src="{{$hotel['hotel_img']}}" data-index="0" width="265" height="265" class="large Lfll">
                            <div class="imagebox Lfll">
                                <div class="clipinner Lcfx">
                                            <?php foreach($hotel_img as $img) {?>
                                            <img src="{{$img->hotel_img}}" data-index="1" width="175" height="130" class="img">
                                            <?php } ?>
                                            </div>
                            </div>

                </div>
<!--百度地图-->
                <div class="topcomment Lflr Lposr">

                </div>
<!--百度地图(结束)-->
            </div>
        </div>

        <div id="Pdetail_part2" class="Pdetail_part2 Lposr Lmt10">
            <div class="hotelroom_block" data-nblock-id="block/hotelDetailRoom">
                <div class="roomtypebox Lmt25">
<div class="roomtype">
    <table>
        <thead>
            <tr>
                <td width="200">房型</td>
                <td width="210">床型</td>
                <td width="100">门市价</td>         
                <td width="100">会员价</td>
                <td width="140">描述</td>
                <td width="250">&nbsp;</td>
            </tr>
        </thead>
<?php foreach($rooms as $key=>$val){?>
        <tbody>
        <tr class="room first">
            <td class="roomtd" rowspan="1">
                <div class="roomname">
                    <div class="floatimage"></div>
                    <img src="{{$val['type_img']}}" width="54" height="54" class="img">
                    <h3>{{$val['room_type_name']}}</h3>
                </div>
            </td>
                <td width="100">{{$val['bed_type']}}</td>
                <td width="100"><span class="oldprice"><i>￥<span>
                    @if($price['up_down']==1)
                        {{($val['vip_price'])*(1+$price['price']/100)}}
                      @elseif($price['up_down']==0)
                        {{($val['vip_price'])*(1-5/100)}}
                      @endif </span></i></span></td>
                <td width="140" class="pricearea Lposr" data-member-type="persnal" data-room-type="TTMDCF" data-activity-id="">
                    <span class="price"><i>￥<span>
                    @if($price['up_down']==1)
                        {{($val['rack_price'])*(1+$price['price']/100)}}
                      @elseif($price['up_down']==0)
                        {{($val['rack_price'])*(1-5/100)}}
                      @endif</span></i></span>
                </td>
                <td width="140">{{$val['room_desc']}}</td>
                <td width="210" class="bookbox">
                @if($val['a']!=0)
                <a href="{{url('home/order/create')}}/room_type_id/<?=$val['room_type_id']?>/hotel_id/{{$hotel['hotel_id']}}" class="Cbtn orderbtn" data-room-type="TTMDCF" data-activity-id="" data-isagents="0">预订</a>
                @else
                <a href="javascript:;" class="Cbtn orderbtn" style="background-color:black;color:#fff;font-size:12px" data-room-type="TTMDCF" data-activity-id="" data-isagents="0">房间售空</a>
                @endif
                </td>
        </tr>
    </tbody>
<?php } ?>
   </table>
</div>
</div>
               
                
                

</div>
<div id="Pdetail_basicinfo" class="Pdetail_basicinfo Lmt20">
                    <h3 class="title"><i class="Cicon small_purulecircle"></i>酒店概况</h3>
                    <div class="content Lovh">
                        <div class="item">
                            <span class="label"><i class="Cicon small_telephone"></i>酒店电话</span>
                            <div class="text itembox"><span>{{$hotel['hotel_tel']}}</span></div>
                        </div>
                        <div class="item">
                            <span class="label"><i class="Cicon small_littlehome"></i>酒店介绍</span>
                            <div id="hotelDescText" class="text desc Lpb35">
                                <div class="textbox"><p>{{$hotel['hotel_desc']}}</p></div>
                            </div>
                        </div>
                        <div class="item">
                            <span class="label"><i class="Cicon small_bell"></i>入住提示</span>
                            <div id="hotelNoticeText" class="text checkin_notice">
                                <div class="textbox" style="height: auto;">
                                    <p>{{$hotel['hotel_hint']}}
                                    </p>
                                </div>
                                <a href="javascript:;" class="more" style="display: none;">查看更多<i class="arrow"></i></a>
                            </div>
                        </div>
                                <div class="item">
                                    <span class="label"><i class="Cicon small_chair"></i>服务项目</span>
                                    <div class="text itembox">
                                    <?php foreach($new_2 as $new_22) {?>
                                            <span>{{$new_22->complex_facilities_name}}</span>
                                    <?php } ?>
                                    </div>
                                </div>
                               
                                <div class="item">
                                    <span class="label"><i class="Cicon small_bed"></i>客房设施</span>
                                    <div class="text itembox">
                                    <?php foreach($new_1 as $new_11) {?>
                                            <span>{{$new_11->rooms_facilities_name}}</span>
                                    <?php } ?>
                                    </div>
                                </div>
                    </div>
                


                </div>
                <br>
<div class="Pdetail_comment Lmt20" data-nblock-id="block/hotelDetailComment">
<h3 class="title Lcfx"><i class="Cicon small_purulecircle"></i>酒店点评
    <!--
    <a href="javascript:;" class="Cbtn commentbtn Lflr Ldn">
        <i class="Cicon small_write"></i>我要点评
    </a>
    -->
</h3>
<div class="content">
    
    <div class="top">
        <div class="scorebox">
           <span class="label"><font color="black">综合评分</font></span>
           <input type="hidden" value="{{$hotel['hotel_id']}}" class="hotel_id">
            <div class="score">
                　<span class="Ldib Lpl5"><font>★★★★</font></span>
                <span class="Ldib Lpl5">4/5分
                </span>
            </div>
        </div>
        <div class="keybox Lmt5">
            <span class="label">大家都在说</span>
            <div class="keys">
                <span class="key active" data-map-new-prop-id="0">不限</span><span class="key" data-map-new-prop-id="46">服务态度({{$s_num}})</span><span class="key" data-map-new-prop-id="51">环境情况{{$h_num}}</span><span class="key" data-map-new-prop-id="558">干净卫生({{$w_num}})</span><span class="key" data-map-new-prop-id="558">地理位置({{$r_num}})</span>
            </div>
        </div>
    </div>
    <div class="count_">
    @if(empty($assess))
    该酒店暂时还没有评价内容！
    @else
    @foreach($assess as $k=>$v)
    <div class="commentbox Lovh">
        <div class="commentitem" data-hotel-id="4302232">
            <div class="user"><img src="{{$v->img}}" width="53" height="53" class="img"><span class="name">{{$v->user_name}}</span>
                
                <span class="memberlevel">会员</span>
                
            </div>
            <div>
                <div class="commentitemlist">
                    
                    <div class="replybox">
                        <div class="reply"><div class="cont">酒店回复：尊敬的客户，感谢您的入住并留下宝贵的意见，我们一直致力于为您打造一个温馨甜蜜之家，您入住得舒适舒心是我们的最高追求。期待您再次光临。</div></div>
                        
                        <i class="Cicon arrow " style="display: inline;"></i>
                    </div>
                    
                    <div class="ctextbox">

                        <div class="ctext"><div class="cont"><span>{{$v->assess_desc}}</span> </div></div>
                        <i class="Cicon arrow"></i>
                    </div>
                    
                    <!-- <div class="highQualityCommenttag">优质点评</div> -->
                    
                </div>
                
                <div class="cbottom Ltar Lcfx">
                    <span class="score Lfll">
                        <span class="Ldib Lpl5">用户评分　@for($i = 0;$i<$v->assess_num;$i++)<font style="color: red">★</font> @endfor
                        {{$v->assess_num}}<i>分</i></span>
                    </span>
               
                    <span class="cdate">{{$v->created_at}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="pages" style="height: 87px; float: right">
    @endif  
{!! $assess->links() !!}


    </div>
</div>

</div>
</div>
<script type="text/javascript">
    $(".key").click(function(){
        $(this).siblings().css("background-color","rgba(221,221,221,.4)"); 
        $(this).siblings().css("color","#993366");
        $(this).css("background-color","#993366");
        $(this).css("color","#ffffff");
        var keyword = $(this).html();
        if(keyword == "不限")
        {
            window.location.reload();
        }else{
            var hotel_id = $(".hotel_id").val();
            //window.location.href="{{url('/home/hotel/room/id/12?page=1')}}";
            $.ajax({
                'type':'get',
                'url':'http://www.sunshine.com/home/hotel/assess',
                'data':{keyword:keyword,hotel_id:hotel_id},
                success:function(msg){

                    $('.count_').html(' ');
                    $('.count_').append(msg);

                }
            });
       }
    });
</script>
@endsection

@section('footer')
	@parent
@endsection