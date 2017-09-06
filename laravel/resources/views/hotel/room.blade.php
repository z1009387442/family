@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', '房间')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<div class="grid_3">
  <div class="container">
   <div class="profile">
     <div class="col-md-8 profile_left">
      <div class="col_3">
            <div class="col-sm-4 row_2">
        <div class="flexslider">
           <ul class="slides">
           <?php foreach($hotel_img as $img) {?>
            <li data-thumb="<?php echo $img->hotel_img; ?>">
              <img src="<?php echo $img->hotel_img; ?>" />
            </li>
            <?php } ?>
           </ul>
          </div>
      </div>

      <div class="col-sm-8 row_1">
        <table class="table_working_hours">
        <h2><?php echo $hotel['hotel_name']; ?></h2>
              <tbody>
            <tr class="opened_1">
              <td class="day_label">酒店电话</td>
              <td class="day_value"><?php echo $hotel['hotel_tel']; ?></td>
            </tr>
            <tr class="opened_1">
              <td class="day_label">酒店地址</td>
              <td class="day_value"><?php echo $hotel['hotel_address']; ?></td>
            </tr>
           
            </tbody>
        </table>
        <ul class="login_details">
            <li><?php echo $hotel['hotel_desc']; ?></li>

          </ul>
      </div>

      <div class="clearfix"> </div>
    </div>
    <div class="col_4">
<!-- 内容插入 -->

<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

         <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">


<!--房间列表-->
<?php foreach($rooms as $key=>$val) {?>
            <div class="jobs-item with-thumb">
            <div class="thumb_top">
                <div class="thumb"><a href="view_profile.html"><img src="<?php echo $val['type_img']; ?>" class="img-responsive" alt=""/></a></div>
              <div class="jobs_right">
              <h6 class="title"><?php echo $val['room_type_name']; ?></h6>
              <ul class="top-btns">
                
                <li><a href="#" class="fa fa-google-plus"></a></li>
              </ul>

              <p class="description">会员价格:
                      @if($price['up_down']==1)
                        {{($val['vip_price'])*(1+$price['price']/100)}}
                      @elseif($price['up_down']==0)
                        {{($val['vip_price'])*(1-5/100)}}
                      @endif 
                　　<span class="m_1"></span> 非会员价:
                      @if($price['up_down']==1)
                        {{($val['rack_price'])*(1+$price['price']/100)}}
                      @elseif($price['up_down']==0)
                        {{($val['rack_price'])*(1-5/100)}}
                      @endif
                　　<span class="m_1"></span>床型 : <?php echo $val['bed_type']; ?></p>
                      
            </div>
            <div class="clearfix"> </div>
             </div>
             <div class="thumb_bottom">
              @if($val['a']!=0)
                  <div class="thumb"><a href="{{url('home/order/create')}}/room_type_id/<?=$val['room_type_id']?>/hotel_id/{{$hotel['hotel_id']}}" class="photo_view">订房房间</a></div>
              @else
                  <div class=""><a style="background-color:black;padding:7px 10px;color:#fff;font-size:12px" href="javascript:;">已经满了</a></div>
              @endif
                <div class="clearfix"> </div>
             </div>
            </div>
<?php } ?>
<!--房间列表（结束）-->


          </div>
         </div>

       </div> 
      </div>

<!-- 结束 --> 
     </div>
     </div>
     <div class="col-md-4 profile_right">
      <div class="newsletter">
       <form>
        <input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
        <input type="submit" value="Go">
       </form>
        </div>
        <div class="view_profile">
<!--热门房间-->
          <h3>热门房间</h3>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="/qiantai/images/p8.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
<!--热门房间(结束)-->
       </div>
       <div class="view_profile view_profile1">
          <h3>推荐房间</h3>
<!--推荐房间-->          
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="/qiantai/images/p10.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
<!--推荐房间(结束)-->
         </div>
        </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>
<script defer src="/qiantai/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="/qiantai/css/flexslider.css" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>   
@endsection

@section('footer')
	@parent
@endsection