@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '首页')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<!--时间插件引入文件-->
<style type="text/css">
	.gender_1,.age_box1{
		vertical-align: middle;
	}
</style>
<link rel="stylesheet" type="text/css" href="/qiantai/time/datedropper.css">
<link rel="stylesheet" type="text/css" href="/qiantai/time/timedropper.min.css">
<!--时间插件引入文件（结束）-->
<div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3>New experience</h3>
    </div>
  </div>
  <div class="profile_search">
  	<div class="container wrap_1" >
	  <form action="{{url('home/hotel/show')}}" method="get">
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="">目的地:</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<div class="city-select" id="single-select-1">
					
					<div class="city-info">
						<div class="city-name" style="width: 10px;height: 10px;">
							<!-- <span id='region'>北京市</span> -->
						</div>
						<div class="city-input">
							<input type="text" class="input-search" value="" placeholder="请选择城市" />
						</div>
					</div>

				</div>
		   </div>
	    </div>
        <div class="inline-block">
		  <label class="">入住时间:</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<input type="text" class="input" name="check_in" id="pickdate" style="color:#000" />
          </div>
        </div>
        <div class="inline-block">
		  <label class="">离开时间:</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<input type="text" class="input" name="check_out" id="pickdate1" style="color:#000"/>
          </div>
       </div>
     </div>

<script type="text/javascript" src="/qiantai/time/jquery-1.12.3.min.js"></script>
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
		<div class="submit inline-block">
			<input type="hidden" value="" name="city_name" id="region">
		   <input id="submit-btn" class="" type="submit" value="Find Matches">
		</form>
     </div>
    </div>
  </div>
</div> 
<!--搜索下面内容-->
<link href="/qiantai/index/reset.css" rel="stylesheet">
<link href="/qiantai/index/brand.css" rel="stylesheet">
<script src="/qiantai/index/jquery"></script>
<script src="/qiantai/index/index"></script>



<div class="main_w1200">
    <div class="prefer_main">
        <h1>会员尊享特惠</h1>
            <ul class="prefer_box" style="margin-right: 45px;">
                <a href="{{url('home/activity/index')}}" class="prefer_img1" target="_blank">
                    <img src="/qiantai/index/la.jpg" height="489">
                    <span></span>
                    <b style="bottom: 9px;">无数精彩礼遇尽在家宾会</b>
                </a>
            </ul>
                    <ul class="prefer_box">
                <a href="{{url('home/activity/index')}}" class="prefer_img2" target="_blank">
                    <img src="/qiantai/index/789.jpg" height="222">
                    <span></span>
                    <b style="bottom: 9px;">如家巴士</b>
                </a>
            </ul>
                    <ul class="prefer_box" style="margin-right: 0px;">
                <a href="{{url('home/activity/index')}}" class="prefer_img2" target="_blank">
                    <img src="/qiantai/index/110.jpg" height="222">
                    <span></span>
                    <b style="bottom: 9px;">199元住五星酒店</b>
                </a>
            </ul>
                    <ul class="prefer_box">
                <a href="{{url('home/activity/index')}}" class="prefer_img2" target="_blank">
                    <img src="/qiantai/index/123.jpg" height="222">
                    <span></span>
                    <b style="bottom: 9px;">官方渠道低价保障 买贵赔3倍</b>
                </a>
            </ul>
                    <ul class="prefer_box" style="margin-right: 0px;">
                <a href="{{url('home/activity/index')}}" class="hot_img2" target="_blank">
                    <img src="/qiantai/index/456.png" height="222">
                    <span></span>
                    <b>青春无所谓</b>
                </a>
            </ul>
    </div>
</div>
<div class="sub_box fix">
    <div class="main_w1200">
        <dl>
            <dt>测试环境,请勿进行真实业务行为<br></dt>
            <dd>
               本网站一切内容都是为了更好地服务受众，不保证所有信息、图片、视频、链接及其它项目的绝对准确性和完整性，也并不意味着赞同其观点或证实其内容的真实性、科学性及严肃性等，使用者使用这些信息时，需要经过进一步核实。
            </dd>
            <a href="http://www.bthhotels.com/hotel/JG0026">探索更多主题</a>
        </dl>
        <div class="sub_imgbox fl" style="width:675px; margin-left:146px;">
            <ul class="sub_imgL fl" style="margin-right:4px;">
               <a href="http://www.bthhotels.com/hotel/K21001" target="_blank" class="">
                   <img src="/qiantai/index/subL1.jpg" width="446" height="446">
                   <span></span>
                   <b>漫趣乐园-如家上海浦东机场店</b>
               </a>
            </ul>
            
            <ul class="sub_imgR fl">
                <li style="margin-bottom:5px;">
                    <a href="http://images.homeinns.com/Activity/theme/parent_child/parent_child.html?_gscu_=03306786c7z6l220&amp;_gscs_=05179366h2is4d10%7Cpv%3A1" target="_blank">
                        <img src="/qiantai/index/subRa1.jpg" width="221" height="221">
                        <span class="sp_b"></span>
                        <p>亲子游主题-北京松鹤建国饭店</p>
                    </a>


                </li>
                <li>
                    <a href="http://images.homeinns.com/Activity/theme/holidays/holidays.html?_gscu_=03306786c7z6l220&amp;_gscs_=05179366h2is4d10%7Cpv%3A1" target="_blank">
                        <img src="/qiantai/index/subRa2.jpg" width="221" height="221">
                        <span class="sp_b"></span>
                        <p>休闲度假主题-三亚天通建国酒店</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="hot_tj fix">
    <h3>热门推荐酒店</h3>
    <ul class="main_w1200">
        @foreach($hot_hotel as $v)
            <li class="fl" style="background: rgba(0, 0, 0, 0) url({{$v['hotel_img']}}) no-repeat scroll center center; margin-right: 0px;">
                <span></span>
                <b style="display: block;">{{$v['hotel_name']}}</b>
                <div class="hot_tmbg" style="display: none;"></div>
                <dl style="display: none;">
                    <dt>{{$v['hotel_name']}}<br>{{$v['hotel_address']}}</dt>
                    <p></p>
                    <dd>特惠价：<code>￥{{$v['price']}}</code>/晚</dd>
                    <a href="{{url('home/hotel/room/id/'.$v['hotel_id'])}}" target="_blank">立即预订</a>
                </dl>
            </li>
        @endforeach
    </ul>
</div>
<!--搜索下面内容（结束）-->

<link rel="stylesheet" type="text/css" href="/qiantai/xiala/css/city-select.css">
<script src="https://cdn.bootcss.com/jquery/1.8.1/jquery.js"></script>
<script type="text/javascript" src="/qiantai/xiala/js/citydata.min.js"></script>
<script type="text/javascript" src="/qiantai/xiala/js/citySelect-1.0.0.min.js?v=1"></script>
<script type="text/javascript">

$("#submit-btn").click(function(){
	var region_name = $(".city-info").text();
	$("#region").val(region_name);
	
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
@endsection

@section('footer')
	@parent
@endsection