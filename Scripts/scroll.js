$(function(){

			$(window).scroll(function(){

				if($(window).scrollTop() > 100) {

					$('.header-wrapper').addClass('header-wrapper-fixed');
				} else {
					
					$('.header-wrapper').removeClass('header-wrapper-fixed');
				}
			});
	});