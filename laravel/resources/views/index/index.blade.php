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
      <h3>Millions of verified Members</h3>
      <a href="view_profile.html" class="hvr-shutter-out-horizontal">come on baby</a>
    </div>
  </div>
  <div class="profile_search">
  	<div class="container wrap_1">
	  <form action="{{url('home/hotel/show')}}" method="get">
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="gender_1">目的地:</label>
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
		  <label class="gender_1">入住时间:</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<input type="text" class="input" name="check_in" id="pickdate" style="color:#000" />
          </div>
        </div>
        <div class="inline-block">
		  <label class="gender_1">离开时间:</label>
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
		   <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
		</form>
     </div>
    </div>
  </div> 
</div> 
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>

<div class="grid_2">
<!-- 	<div class="container">
		<h2>Success Stories</h2>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
        <div class="row_1">

	
	  </div>
    </div> -->
    <div class="bg">
		<div class="container"> 
			<h3>网站免责声明</h3>
			<div class="heart-divider">
				<span class="grey-line"></span>
				<i class="fa fa-heart pink-heart"></i>
				<i class="fa fa-heart grey-heart"></i>
				<span class="grey-line"></span>
            </div>
            <div class="col-sm-6">
            	<div class="bg_left">
            		<h4>测试环境,请勿进行真实业务行为</h4>
            		<h5>本网站一切内容都是为了更好地服务受众，不保证所有信息、图片、视频、链接及其它项目的绝对准确性和完整性，也并不意味着赞同其观点或证实其内容的真实性、科学性及严肃性等，使用者使用这些信息时，需要经过进一步核实。</h5>
            		<p>本站采用的非本站原创文章及图片等内容无法一一和版权者联系，如果原作者及编辑认为其作品不宜在网络传播，或不应无偿使用，请及时用电子邮件或电话通知我们，并提供以下资料：一是著作权人的身份证明，包括身份证、法人执照、营业执照等有效身份证件;二是著作权权属证明，包括有关著作权登记证书或创作原手稿等。本网站将迅速采取适当措施，避免给双方造成不必要的损失。</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="col-sm-6">
            	<div class="bg_left">
            		<h4>测试环境,请勿进行真实业务行为</h4>
            		<h5>本网站一切内容都是为了更好地服务受众，不保证所有信息、图片、视频、链接及其它项目的绝对准确性和完整性，也并不意味着赞同其观点或证实其内容的真实性、科学性及严肃性等，使用者使用这些信息时，需要经过进一步核实。</h5>
            		<p>本站采用的非本站原创文章及图片等内容无法一一和版权者联系，如果原作者及编辑认为其作品不宜在网络传播，或不应无偿使用，请及时用电子邮件或电话通知我们，并提供以下资料：一是著作权人的身份证明，包括身份证、法人执照、营业执照等有效身份证件;二是著作权权属证明，包括有关著作权登记证书或创作原手稿等。本网站将迅速采取适当措施，避免给双方造成不必要的损失。</p>
            	   <ul class="team-socials">
                    <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                    <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                   </ul>
            	</div>
            </div>
            <div class="clearfix"> </div>
		</div>

	</div>
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