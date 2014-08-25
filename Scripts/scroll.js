$(function(){
			$(window).scroll(function(){
				if($(window).scrollTop() > 100) {
					$('.index-wrapper').addClass('wrapper');
				} else {
					$('.index-wrapper').removeClass('wrapper');
				}
			});
	});