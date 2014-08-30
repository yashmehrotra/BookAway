var back_img = $('#index-home');

$(function(){
	var links_array = $('.index-nav-list:nth-child(n)');
	setInterval(function(){
		for(var i=0;i<3;i++) {
			links_array[i].css('list-style-type','disc');
			if( i == 0 ) {
				back_img.css('background','url("Styles/Images/book-1.jpg")');
			} if( i == 1 ) {
				back_img.css('background','url("Styles/Images/book-2.jpg")');
			} if( i == 2 ) {
				back_img.css('background','url("Styles/Images/book-3.jpg")');
			} 
		}
	} , 1000);
});