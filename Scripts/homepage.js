BACKGROUND_IMGS_LIST = ["Styles/Images/1.jpg", "Styles/Images/3.jpeg"];

var index = 0;

$(function () {

    window_resize();
    setInterval(set_background, 5000);

    $(window).resize(window_resize);
    
});

function window_resize() {
    if ($(window).width() < 1200 ) {
	$('.header-wrapper-fixed').css('position','relative');
    } else {
	$('.header-wrapper-fixed').css('position','fixed');
    }
}

function set_background() {
    if (index < BACKGROUND_IMGS_LIST.length - 1) {
	index += 1;
    } else {
	index = 0;
    }
    var bg = "url(" + '"' + BACKGROUND_IMGS_LIST[index] + '") repeat scroll 0% 0% / cover padding-box border-box';

    $('#index-body').css('background', bg);
}