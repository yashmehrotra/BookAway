$(function () {
    // window_resize();
    // $(window).resize(window_resize);
    // $('#header-wrapper-fixed').width($('#outer-page-wrap').width()); 
});

function window_resize() {
    if ($(window).width() < 1200 ) {
	$('#fork-on-github').hide();
	$('.header-wrapper-fixed').css('position','relative');
	$('footer').css('position','absolute');
    } else {
	$('#fork-on-github').show();
	$('.header-wrapper-fixed').css('position','fixed');
    }
    // $('#index-body').css('background-image');
}