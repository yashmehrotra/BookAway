BACKGROUND_IMGS_LIST = ["Styles/Images/new-1.jpeg", "Styles/Images/2.jpg", "Styles/Images/1.jpg"];

var index = 0;

$(function () {
    
    window_resize();
    setInterval(set_background, 5000);

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

function set_background() {
    if (index < BACKGROUND_IMGS_LIST.length - 1) {
	index += 1;
    } else {
	index = 0;
    }
    var bg = "url(" + '"' + BACKGROUND_IMGS_LIST[index] + '") repeat scroll 0% 0% / cover padding-box border-box';
    // console.log(bg);

    $('#index-body').css('background', bg);
}