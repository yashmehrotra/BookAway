$(function () {
		move();
	$(window).resize(move);
});

function move() {
		var $width = $(this).width();
		var $wrapper = parseInt($('#wrapper').css('width'));
		if($width < $wrapper)
		{
			$('#wrapper').css('display','none');
		}
		else
		{
			$('#wrapper').css({"display":"block","left":0.46*($width - $wrapper)});
		}
	}
