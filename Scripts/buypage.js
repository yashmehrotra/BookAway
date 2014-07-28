//It sends a post request to a php file which fetches all the data about books from database
//Also need to add the whole jquery widget of autocomplete and also need to include jquery as link src in main file

//
//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME
//


 $(document).ready(function(){
	
	book_data_display();
	click_toggle();

});


var booklist_autocomplete   = [];
var authorlist_autocomplete = [];
var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
console.log(newURL);


function showthis(bookid) {
	
	var str = bookid;
	str = str.split("books-data-").join("");
	console.log(str);
	str = "#seller-data-" + str;
	$(str).toggle();
}

function book_data_display () {
	
	$.ajax({
		type: "GET",
		url: "sqldata.php", //Make sure URL Doesnt cause problem in future
		success: function (result) {
			if(result) {
				var counter = 0;
				var json = JSON.parse(result);
				while(json[counter]) {
					//booklist_autocomplete.push(/*Correct Response*/);
					//authorlist_autocomplete.push(/*Correct Response*/);
					console.log(json);
					console.log(json[counter].book_name + " " + json[counter].author_name);
					if(json[counter].sell_rent !="2") {
						$('#latest-outer > .latest-additions').append("<div class='books-data' id='books-data-"+json[counter].book_id+"' >"+json[counter].book_name + " " + json[counter].author_name+"</div>");
						$('#latest-outer > .latest-additions').append("<div class='seller-data' id='seller-data-"+json[counter].book_id+"' style='display:none;'>"+json[counter].seller_name + " " + json[counter].seller_phone+"</div>");
					//console.log("2");
						counter = counter +1;
					}
					else{
						counter = counter +1;
					}
				}
			}
			else {
				console.log("Problem with Ajax Request")
			}
		}
	});
}

function click_toggle () {
	
	$('#latest-outer > .latest-additions').on('click', '.books-data', function() {
		console.log("click");
		var book_id = $(this).attr('id');
		book_id = book_id.split("books-data-").join("");
		var seller_data =  "#seller-data-" + book_id;
		$(seller_data).toggle();
	});
}
