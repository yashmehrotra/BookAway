$(function () {
    
    window_resize();
    $(window).resize(window_resize);
    
    $.getScript("Scripts/fellow_developer.js");

});

function window_resize() {
    if ($(window).width() < 1200 ) {
	$('.header-wrapper-fixed').css('position','relative');
    } else {
	$('.header-wrapper-fixed').css('position','fixed');
    }
}
