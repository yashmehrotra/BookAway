		$(function(){
			$('.developer-profile').on('mouseenter mouseleave', function(){
				$(this).toggleClass('profile-onhover');
			});
			$('.developer-profile').on('click',function(){
				$('#about-us-container').append("<div class='about-detailed-desc' style='hidden'>Write the description here. </div>")
			});
		});