// JavaScript Document
$(document).ready(function(e) {
	$("#contextBg").css("height",$(this).height()-150+"px");
	$(".contextBgItemRight").css("width",$("#contextBg").width()-230+"px");
	$(".contextBgItemLeft").css("height",$("#contextBg").height()+"px");
	$(".contextBgItemRight").css("height",$("#contextBg").height()+"px");
	$("#Demo").css("height",$(".contextBgItemRight").height()-181+"px");
	$("#Demo").css("max-height",$(".contextBgItemRight").height()-181+"px");
	$("#foot").css("height",151+"px");
    $(".headMenuItem").hover(function() {
    $(this).find(".menuItem").css("display", "block").css("opacity",0);
    $(this).find(".menuItem").animate({marginTop:"50px",opacity:1
    }, 100);
}, function() {
	  $(this).find(".menuItem").animate({marginTop:"100px",opacity:0},100,function(){$(this).css("display", "none");});

});
});

window.onresize=function(){
	$("#contextBg").css("height",$(this).height()-150+"px");
	$(".contextBgItemRight").css("width",$("#contextBg").width()-230+"px");
	$(".contextBgItemLeft").css("height",$("#contextBg").height()+"px");
	$(".contextBgItemRight").css("height",$("#contextBg").height()+"px");
	$("#Demo").css("height",$(".contextBgItemRight").height()-181+"px");
}