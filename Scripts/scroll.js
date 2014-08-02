$(function(){
			$(window).scroll(function(){
				if($(window).scrollTop() > 100) {
					$('.index-wrapper').addClass('wrapper');
				}
				if($(window).scrollTop() <= 100) {
					$('.index-wrapper').removeClass('wrapper');
				}
			});
	});