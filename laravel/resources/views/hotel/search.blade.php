                <div class="lbox">
                    <div id="Plist_hotel" class="Plist_hotel" data-nblock-id="block/hotelListHotels?initHotelList=hotelListData">
                        <div class="citycount">
                            当前城市，为您找到<b><?php echo $count; ?></b>家酒店
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
        
        
        <div class="img"><img src="<?php echo $hotel['hotel_img']; ?>" width="190" height="160"></div>
        <div class="desc">
            <div class="hotelname  hasTaxBedge">
                <a class="name" title="<?php echo $hotel['hotel_name']; ?>" href="{{url('home/hotel/room')}}/id/<?php echo $hotel['hotel_id']; ?>" target="_blank">
                    <h2><?php echo $hotel['hotel_name']; ?></h2>
                </a>
                
                <span class="tax_bedge tax_bedge_0">普票立取</span>
            </div>
            <div class="address city"><?php echo $hotel['hotel_address']; ?></div>
            
            
            <div class="lastorder"></div>
            <div class="commentseg hasLabel"><i class="Cicon small_msg"></i>大家说：<span>干净卫生</span></div>
            <div class="service">
                
                
                
                <i class="Cicon small_wifi" title="客房Wifi覆盖"></i>
                
                
                
                <i class="Cicon small_breakfast" title="餐厅"></i>
                
                
                
                <span class="favor_count"><i class="Cicon small_favor"></i><span>收藏</span><span class="num">23</span></span>
            </div>
        </div>
        <div class="rarea">
            <div class="pricearea Ltar" data-hotel-lowest-price="-143"><span class="price"><i>￥</i><i><font size="6"><?php echo $hotel['price']; ?></font>起</i></span></div>
            <div class="score Ltar">
                <i class="Cicon star full"></i><i class="Cicon star full"></i><i class="Cicon star full"></i><i class="Cicon star full"></i><i class="Cicon star full"></i>
                <span class="Ldib Lpl5">5<i>/5分</i></span>
            </div>
            <div class="comment Ltar"><a href="{{url('home/hotel/room')}}/id/<?php echo $hotel['hotel_id']; ?>" target="_blank">共0条评论</a></div>
            <div class="btnbox Ltar"><a href="{{url('home/hotel/room')}}/id/<?php echo $hotel['hotel_id']; ?>" target="_blank" class="Cbtn viewexpand">查看详情</a></div>
            
            <div class="expandlink Ltar">
                <a class="viewroomtype" href="javascript:;"><span>展开全部房型</span><i class="arrow"></i></a>
            </div>
            
        </div>
    </div>
</div>
<?php } ?>
</div>