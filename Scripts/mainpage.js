
/*$(function () {
	//var $destination = $('#buy-box').css('left');
	var $sbox = $('#sell-box').css('left');
	var $rbox = $('#rent-box').css('left');
	$('.box').on('mouseover mouseout', function() {
		$(this).toggleClass('box-new', 1000);
	});
	$('.box').on('mouseover', function() {
		$(this).css('left','0px');
	});
	$('#sell-box').on('mouseout', function () {
		$(this).css('left',$sbox);
	});
	$('#rent-box').on('mouseout', function () {
		$(this).css('left',$rbox);
	});
});
*/

$(function (){
	$('#buy-box').on('mouseover mouseout', function (){
		var toggleWidth = $(this).css('width') == "260px" ? "1040px" : "260px";
		$(this).animate({
			'width':toggleWidth
		},{ duration: 200});
	});
	$('#sell-box').on('mouseover mouseout', function (){
		var toggleWidth = $(this).css('width') == "260px" ? "1040px" : "260px";
		var toggleLeft = $(this).css('left') == "360px" ? "0px" : "360px";
		$(this).animate({ width:toggleWidth, left:toggleLeft });
	});
});
