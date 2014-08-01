//It sends a post request to a php file which fetches all the data about books from database
//Also need to add the whole jquery widget of autocomplete and also need to include jquery as link src in main file

//
//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME
//


 $(document).ready(function(){
	
	book_data_display();
	click_toggle();

	newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
	console.log(newURL);

	$max_price = $('#a').val();
	$search_by = $('#search_by option:selected').val();
	$buy_subject = $('#buy_subject option:selected').val();

	console.log($max_price);
	console.log($search_by);
	console.log($buy_subject);

});

function showthis(bookid) {
	
	var str = bookid;
	str = str.split("books-data-").join("");
	console.log(str);
	str = "#seller-data-" + str;
	$(str).toggle();
}

Ultimate_data       = [];
booklist_array      = [];
authorlist_array    = [];
sellername_array    = [];
sellerphone_array   = [];
selleremail_array   = [];
bookid_array        = [];
bookfor_array       = [];
rentprice_array     = [];
sellprice_array     = [];
renttime_array      = [];

function book_data_display () {
	
	$.ajax({
		type: "POST",
		url: "sqldata.php", //Make sure URL Doesnt cause problem in future
		data: { 'source': 'view' },
		success: function (result) {
			if(result) {
				var counter = 0;
				var json = JSON.parse(result);
				console.log(json);
				while(json[counter]) {
					
					booklist_array.push(json[counter].book_name);
					authorlist_array.push(json[counter].author_name);
					sellername_array.push(json[counter].seller_name);
					sellerphone_array.push(json[counter].seller_phone);
					selleremail_array.push(json[counter].seller_email);
					bookid_array.push(json[counter].book_id);
					bookfor_array.push(json[counter].sell_rent);
					rentprice_array.push(json[counter].rent_price);
					sellprice_array.push(json[counter].sell_price);
					renttime_array.push(json[counter].rent_time);

					Ultimate_data.push({
						'book_id':json[counter].book_id,
						'book_name':json[counter].book_name,
						'author_name':json[counter].author_name,
						'seller_name':json[counter].seller_name,
						'seller_phone':json[counter].seller_phone,
						'seller_email':json[counter].seller_email,
						'book_for':json[counter].sell_rent,
						'rent_price':json[counter].rent_price,
						'sell_price':json[counter].sell_price,
						'rent_time':json[counter].rent_time
					});

					console.log(json[counter].book_name + " " + json[counter].author_name);
					
					if(json[counter].sell_rent !="2") {
						
						$('#latest-outer > .latest-additions').append("<div class='books-data' id='books-data-"+json[counter].book_id+"' >"+json[counter].book_name + " " + json[counter].author_name+"</div>");
						$('#latest-outer > .latest-additions').append("<div class='seller-data' id='seller-data-"+json[counter].book_id+"' style='display:none;'>"+json[counter].seller_name + " " + json[counter].seller_phone+"</div>");
					
						counter = counter +1;
					}
					else{
						counter = counter +1;
					}
				}
				//console.log(booklist_array);
				console.log(Ultimate_data);
				
				$( "#search-bar" ).autocomplete({
					source: booklist_array
				});
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
