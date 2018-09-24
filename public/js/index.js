// JavaScript Document
$(function(){

	//头部分
	$('.header_b ul>li').click(function(){
		$(this).addClass('act_act').siblings().removeClass('act_act');
	});
		$('.b_nav ul>li').hover(function(){
		$(this).addClass('act').siblings().removeClass('act')
		$(this).children('ol').show()
	},function(){
		$(this).removeClass('act');
		$(this).children('ol').hide()
	});
	$('.header_b .input ').hover(function(){
		$('.chooseS').show()
	},function(){
		$('.chooseS').hide()	
	});
	$('.header_top .r_nav .Account ').hover(function(){
		$('.header_top .r_nav ul li ul').show()	
	},function(){
		$('.header_top .r_nav ul li ul').hide()		
	});
	$('.denglu_top p').click(function(){
		$(this).addClass('act').siblings().removeClass('act')	
	});
	//banner下边新闻公告
	var time = null ; 
	var num = 0 ;
	time = setInterval(aotoplay,3000)
	function aotoplay(){
		num++;
		if(num>4){
			num=0;
			$('.notice .wp ul').css('top', '0');
		}
		$('.notice .wp ul').stop().animate({top: -num*46+'px'}, 1000)
	}
	$('.notice ').hover(function() {
		clearInterval(time)
	}, function() {
		clearInterval(time)
		time = setInterval(aotoplay,3000)
	});
	$('.notice .button .l').click(function(){
		num--;
		if (num<0) {num=4};
		$('.notice .wp ul').stop().animate({top: -num*46+'px'}, 1000);
	});
	$('.notice .button .r').click(function(){
		num++;
		if (num>4) {num=0};
		$('.notice .wp ul').stop().animate({top: -num*46+'px'}, 1000);
	});
	//返回顶部
	 $('.Foot .dingbu').click(function(event) {
           $('html,body').animate({'scrollTop':0});
    });

});
