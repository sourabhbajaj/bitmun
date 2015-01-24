$(document).ready(function(){
	$("#nav li a").hover(function(){
		$(this).addClass("focus",200);
	}, function(){
		$(this).removeClass("focus",200);		
	});
	$("#nav li").hover(function(){
		$(this).width($(this).width());
		$(this).height($(this).height());
		$(this).find(".sub-nav").slideDown(200);
	},function(){
		$(this).find(".sub-nav").slideUp(200);		
	});
});