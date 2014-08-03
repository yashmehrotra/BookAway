$(function () {
		move();
	$(window).resize(move);
});

function move() {
		var $width = $(this).width();
		//var $wrapper = parseInt($('.top-panel-list').css('width'));
		//if($width < $wrapper)
		//{	
		//	$('.top-panel-list').css({"marginLeft":"0px"});
		//}
		//else
		//{
			$('.top-panel-list').css({"marginLeft":0.155*$width});
		//}
	}
