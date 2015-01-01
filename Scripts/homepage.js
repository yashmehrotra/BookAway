$(function () {

	window_resize();
	$(window).resize(window_resize);
});

function window_resize() {

	if ($(window).width() < 1200 ) {

			$('#fork-on-github').hide();
		} else {

			$('#fork-on-github').show();
		}
}