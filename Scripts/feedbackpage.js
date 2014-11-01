$(function (){

	$('#feedback-container').append('<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:-20px; left:48%;">'); 

	$('iframe').ready(function () {
		$('#loading-gif').remove();
	});
});