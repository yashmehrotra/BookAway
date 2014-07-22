$(function () {
		move();
	$(window).resize(move);
});

function move() {
		var $width = $(this).width();
		var $wrapper = parseInt($('#wrapper').css('width'));
		if($width < $wrapper)
		{
			$('#wrapper').css('left','-30px');	
		}
		else
		{
			$('#wrapper').css('left',0.46*($width - $wrapper));
		}
	}
