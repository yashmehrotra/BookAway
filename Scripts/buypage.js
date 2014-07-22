//It sends a post request to a php file which fetches all the data about books from database
//Also need to add the whole jquery widget of autocomplete and also need to include jquery as link src in main file

//
//CHANGE THE JAVASCRIPT TO JQUERY
//


// $(document).ready(function(){
	
// 	// $("#seller-data").hide();
// 	console.log("ready");
// 	 $("#books-data").click(function(){
// 	 	console.log("click");
// 	// 	$("#seller-data").toggle();
// 	 });
// });


var booklist_autocomplete   = [];
var authorlist_autocomplete = [];
var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
console.log(newURL);
$.ajax({
	type: "GET",
	url: "/Books-for-bucks/sqldata.php",
	success: function (result) {
		if(result) {
			var counter = 0;
			var json = JSON.parse(result);
			while(json[counter]) {
				//booklist_autocomplete.push(/*Correct Response*/);
				//authorlist_autocomplete.push(/*Correct Response*/);
				console.log(json[counter].book_name + " " + json[counter].author_name);
				$('#latest-outer > .latest-additions').append("<div class='books-data' id='books-data-"+json[counter].book_id+"' onClick='showthis(this.id)'>"+json[counter].book_name + " " + json[counter].author_name+"</div>");
				$('#latest-outer > .latest-additions').append("<div class='seller-data' id='seller-data-"+json[counter].book_id+"' style='display:none;' >"+json[counter].seller_name + " " + json[counter].seller_phone+"</div>");
				//console.log("2");
				counter = counter +1;
			}
		}
	}
});

function showthis(bookid) {
	
	var str = bookid;
	str = str.split("books-data-").join("");
	console.log(str);
	str = "#seller-data-" + str;
	$(str).show();
}
