$(function(){
	var time=null;
	var city_w=$(".cityNmae .title_city").width()/2
	$(".cityNmae .title_city").css("marginLeft",-(city_w+15))
	
	$(".back").click(function(){
		 $('html,body').animate({scrollTop:0},'slow');
	})

	 //点击字母跳转到相应的位置   
    var $list = $(".city_list").find("li");
        $list.each(function (i, element) {
            $(element).click(function () {           	
            	$(".gd_city ul li").removeClass("active")
            	$(".city_list li a").removeClass("active")
            	$(this).find("a").addClass("active")
               	var $anchor = $(element).find('a');
 				var scrollTop=$('body').scrollTop();
                $('html,body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top-150
                }, 500);
            });
        });
    isback()
	
    isScroll()
    $(window).scroll(function(){		
    		isScroll();
			isback();
	})
    $(document).on("mousewheel DOMMouseScroll", function (e) {
    	$(".city_list li a").removeClass("active")
    	$(".gd_city ul li").removeClass("active")
    })
    
    //城市列表悬浮
    function isScroll(){
    	if($(window).scrollTop()>=$(".new_content").offset().top+100){
    		$(".city_posi").css("box-shadow", "0px 4px 23px 1px #cccccc")
    		$(".mz").show()
	    	$(".city_posi").css({
	    		"position":"fixed",
	    		"zIndex":9999,
	    		"top":0,
	    	})
	    	$(".city_list").css({
	    		"margin-bottom":0,
	    		"margin-top":25,
	    	})
	    }else{
	    	$(".mz").hide()
	    	$(".city_posi").css({
	    		"position":"relative",
	    		"zIndex":1,
	    		"top":0,
	    	})
	    	$(".city_list").css({
	    		"margin-bottom":35,
	    		"margin-top":25,
	    	})
	    	$(".city_posi").css("box-shadow", "0px 0px 0px 0px #cccccc")
	    }
    }   
    function isback(){
    	if($(window).scrollTop()>500){
			$(".back").show()
		}else{
			$(".back").hide()
		}
    }
    $(".activity_rules").click(function(){
    	$(".mk_Event_c").show()
    })
    $(".clear").click(function(){
    	$(".mk_Event_c").hide()
    })
    $(".mk_Event_c").height($(document).height())
    
    
    //活动规则hover效果
    $(".activity_rules").hover(function(){
    	$(this).addClass("active")
    },function(){
    	$(this).removeClass("active")
    })
    //更多城市选中效果
    var cityName=$(".gd_city ul li");
    var city_val=null;
    $(".genduo").each(function(i,el){
    	$(el).click(function(){
    		city_val=$(el).find("a").html()
    		$(cityName).each(function(j,element){
    			var My_val=$(element).find(".city_name").html()
    			if(My_val==city_val){
    				$(element).addClass("active").siblings().removeClass("active")
    			}
    		})
    		
    	})
    })
})
