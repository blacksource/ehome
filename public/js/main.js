$(function(){
	$(".nav-bar-top li").mouseover(function(){
		var index = $(".nav-bar-top li").index($(this));
		var target = $(".top-nav-sub div")[index];
		$(target).show();
	});
	$(".nav-bar-top li").mouseout(function(){
		$(".top-nav-sub div").hide();
	});
})