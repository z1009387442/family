@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '活动')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<link rel="stylesheet" href="/qiantai/index/index1/public.css">
<link rel="stylesheet" href="/qiantai/index/index1/reset.css"> 
<link rel="stylesheet" href="/qiantai/index/index1/index.css">
<script type="text/javascript"></script>
    <div class="top_1"></div>
    <div class="city_posi">
        <!--酒店地区列表便利-->
        <ul class="city_list LoutiNav" style="margin-bottom: 35px; margin-top: 25px;">
            <?php foreach($region as $key=>$val) {?>
            <li><a href="#{{$val['region_name']}}" class="region_name city_list">{{$val['region_name']}}</a></li>
            <?php } ?>
        </ul>
        <!--酒店地区列表便利（结束）-->
    </div>
    <div class="new_content main_w1100">
    <?php foreach($region as $key=>$val) {?>
        <div class="cityhotel" id="{{$val['region_name']}}" >
           
            <div class="hotel_list" style="margin-top:28px">
                <a href="" id="{{$val['region_name']}}"></a>
                <p class="cityNmae">
                    <span class="title_city" style="margin-left: -45px;">{{$val['region_name']}}</span>
                    <span class="sign_l"></span>
                    <span class="sign_r"></span>
                </p>
                <ul>
                <?php foreach($hotel[$key] as $k=>$v) {?>
                    <li>
                        <img src="{{$v['hotel_img']}}">
                        <a class="city_name">{{$val['region_name']}}</a>
                        <p class="title">{{$v['hotel_name']}}</p>
                        <div class="price fix">
                            <span class="price_l fl">{{$v['discount']}}<code>折</code></span>
                            <p class="price_r fl">
                                <span class="remind">最高返</span>
                                <span class="return_price">100</span>
                            </p>
                        </div>
                        <div class="mask">
                            <div class="mask_"></div>
                            <div class="mask_cont">
                                <a href="">立即预订</a>
                            <!--线条-->
                            <div class="border_t"></div>
                            <div class="border_r"></div>
                            <div class="border_b"></div>
                            <div class="border_l"></div>
                            <!--线条（结束）-->
                            </div>
                        </div>
                    </li>
                <?php } ?>
                </ul>   
            </div>
        </div>
        <?php } ?>
</div>
<div onclick="dianji();" style="z-index: 9999; text-align: center; width: 50px; height: 46px; cursor: pointer; background-image:url('/qiantai/images/top.png'); position: fixed; top: 80%; right: 5%;">
</div>


<script src="/qiantai/index/index1/jquery.js"></script>
<script type="text/javascript">
$('.region_name').click(function(){
    var region_name=$(this).html();
    window.location.hash = "."+region_name;
})
function aa(){
   history.go(0);
}
function dianji(){
    scrollTo(0,0);
    // history.go(0);
}
</script>   
@endsection

@section('footer')
    @parent
@endsection
