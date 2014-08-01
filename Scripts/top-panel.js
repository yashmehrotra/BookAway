$(function () {
		move();
	$(window).resize(move);
});

function move() {
		var $width = $(this).width();
		var $wrapper = parseInt($('#wrapper').css('width'));
		if($width < $wrapper)
		{	
			$('#wrapper').css({"left":"0px"});
			if(parseInt($width) < 750) {
			$('#wrapper').css({"display":"none"});
			}
			else {
				$('#wrapper').css({"display":"block"});
			}
		}
		else
		{
			$('#wrapper').css({"left":0.447*($width - $wrapper),"display":"block"});
		}
	}
