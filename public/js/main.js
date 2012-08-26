$(function(){
	$(".nav-bar-top li").each(function(){
		$(this).hover(
			function(){
				$(this).find(".nav-sub-box").show();
				$(this).find("a").addClass("nav-bar-top-hover");
			},
			function(){
				$(this).find(".nav-sub-box").hide();
				$(this).find("a").removeClass("nav-bar-top-hover");
			}
		);
	});

	$(".ad-top").slidy({
		animation:	'slide',
		children:	'a',
		menu:		true,
		pause:		true,
		speed:		200,
		time:		4000,
		width:		730,
		height:		330
	});

	$(".min-bar-toggle li").mouseover(function(){
		var index = $(".min-bar-toggle li").index($(this));
		$(".min-bar-content ul").hide();
		var target = $(".min-bar-content ul")[index];
		$(target).show();
		$(".min-bar-toggle li").removeClass("selected");
		$(this).addClass("selected");
	});


	$('#items .item').hover(
		function () {
			$(this).siblings().css({'opacity': '0.75'});	
			$(this).css({'opacity': '1.0'}).addClass('effect');
			$(this).children('.caption').show();	
		},
		function () {
			$(this).children('.caption').hide();		
		}
	);
	
	$('#items').mouseleave(function () {
		$(this).children().fadeTo('100', '1.0').removeClass('effect');		
	});


});