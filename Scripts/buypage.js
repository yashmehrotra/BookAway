//It sends a post request to a sqldata.php file which fetches all the data about books from database

//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME

var total_results = 0;
 $(document).ready(function() {
	book_data_display();
	show_search();
	//console.log("Main--",c);
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
search_data         = [];
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

search_books        = [];
search_authors      = [];

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

					//To add different inputs
					if( $.inArray(json[counter].book_name,search_books) == -1 ) {
						search_books.push(json[counter].book_name);
						search_data.push(
							{ label: json[counter].book_name, category: "Books" }
						)
					}

					if( $.inArray(json[counter].author_name,search_authors) == -1 ) {
						search_authors.push(json[counter].author_name);
						search_data.push(
							{ label: json[counter].author_name, category: "Author" }
						)
					}
			
					total_results = total_results + 1;
					counter = counter +1;
			}

			//var counter_clone = counter;
			var counter_clone = 0;
			//while(counter_clone--) {
			while(counter_clone != counter) {
				if( json[counter_clone].rent_price == "" ) {
						console.log("No rent price");
						json[counter_clone].rent_price = "-";
						json[counter_clone].rent_time = "";
						$('#latest-outer').prepend("<div class='books-data' id='book-data-"+json[counter_clone].book_id+"'"+">"+"<div class='image-wrapper'><img class='books-data-images' src='Styles/Images/Five+Point+Someone1-site1.n'></div><div class='name-wrapper'>"+json[counter_clone].book_name+"</div><div class='author-wrapper'><i>"+json[counter_clone].author_name+"</i></div><div class='sell-wrapper'> Buy price: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].sell_price+"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/
					} else if( json[counter_clone].sell_price == "" ) {
						json[counter_clone].sell_price = "-";
						$('#latest-outer').prepend("<div class='books-data' id='book-data-"+json[counter_clone].book_id+"'"+">"+"<div class='image-wrapper'><img class='books-data-images' src='Styles/Images/Five+Point+Someone1-site1.n'></div><div class='name-wrapper'>"+json[counter_clone].book_name+"</div><div class='author-wrapper'><i>"+json[counter_clone].author_name+"</i></div><div class='rent-wrapper'>  Rent price: <img class='ruppee-img' src='Styles/Images/ruppee.gif'> " +json[counter_clone].rent_price+ " per " +json[counter_clone].rent_time +"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/
					} else {
						$('#latest-outer').prepend("<div class='books-data' id='book-data-"+json[counter_clone].book_id+"'"+">"+"<div class='image-wrapper'><img class='books-data-images' src='Styles/Images/Five+Point+Someone1-site1.n'></div><div class='name-wrapper'>"+json[counter_clone].book_name+"</div><div class='author-wrapper'><i>"+json[counter_clone].author_name+"</i></div><div class='sell-wrapper'>  Buy price: <img class='ruppee-img' src='Styles/Images/ruppee.gif'> " +json[counter_clone].sell_price+"</div><div class='rent-wrapper'>  Rent price: <img class='ruppee-img' src='Styles/Images/ruppee.gif'> " +json[counter_clone].rent_price+ " per " +json[counter_clone].rent_time +"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/
					}
					counter_clone = counter_clone + 1;
			}

			if(Ultimate_data.length===counter) {
					books_data();
				};

			//For Autocomplete
			$.widget( "custom.catcomplete", $.ui.autocomplete, {
			    _create: function() {
			    	this._super();
			    	this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
				},
			    _renderMenu: function( ul, items ) {
			    	var that = this,
			        currentCategory = "";
			    	$.each( items, function( index, item ) {
			    		var li;
			        	if ( item.category != currentCategory ) {
			        		ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
			        		currentCategory = item.category;
			        	}
			        	li = that._renderItemData( ul, item );
			        	if ( item.category ) {
			        		li.attr( "aria-label", item.category + " : " + item.label );
			        	}
			    	});
			    }
			});
			
			$( "#search-bar" ).catcomplete({
					delay: 0,
					source: search_data,
					select: function(event, ui) {
						$('#search-button').append("<div hidden id='category-search'></div>")
               			$('#category-search').val(ui.item.category);
               		}
				});
			} else {
				console.log("Problem with Ajax Request")
			}
		}
	});
}

function load_more () {
	$('#load-more').on('click', function(){
		var counter_visible = $('.books-data:visible').size();
		var clone_visible = counter_visible;
		var visible_flag = 0;
		if( counter_visible >= total_results ) {
			$('#load-more').css('display','none');
			visible_flag = 1;
		}
		if( total_results - counter_visible < 12 ) {
			counter_visible = total_results;
			var flag = 1;
		}
		else {
			counter_visible = counter_visible + 12;
			var flag = 0;
		}
		if( counter_visible == total_results ) {
			$('#load-more').css('display','none');
		}
		//counter_visible = counter_visible - 1;
		//clone_visible = clone_visible - 1; 
		$('#buy-container > #latest-outer > div[class="books-data"]:gt(' + clone_visible + '):lt(13)').slideDown(600);
		var buy_height = $('#buy-container').height();
		var latest_outer_height = $('#latest-outer').height();
		console.log(buy_height,latest_outer_height);
		var change = 220*(counter_visible - clone_visible);
		//if( visible_flag == 1 ) {
		//	change = change - 100;
		//}
		$('#buy-container').css('height',parseInt(buy_height)+change+'px');
		$('#latest-outer').css('height',parseInt(latest_outer_height)+change+'px');
	});
}

function show_search() {
	$('#search-button').on('click',function(e) {
		e.preventDefault();
		var search_value = $("#search-bar").val();
		var search_category = $("#category-search").val();
		console.log(search_value);
		console.log(search_category);
		load_specific(search_value,search_category);
	})
}

function load_specific(search_value, search_category) {
	$('.outer-divs').remove();
	$('.inner-divs').remove();
	$.ajax({
		type: "POST",
		url: "sqldata.php", //Make sure URL Doesnt cause problem in future //{ 'source': 'view'
		data: { 'source': 'search', 'search_category': search_category, 'search_value': search_value },  //, 'search_category': search_category, 'search_value': search_value
		success: function (result) {
			if(result) {
				console.log(search_category);
				console.log(search_value);
				var json = JSON.parse(result);
				console.log(json);
			} else {
				console.log("Thenga")
			}
		}
	});
}

function books_data() {
	//$('#buy-container > #latest-outer > #buy-table > tbody > .seller-data').css("display","none");
	var results_counter = 0;
	$('#buy-container > #latest-outer > div[class="books-data"]:gt(11)').css("display","none");
	if( total_results < 12) {
		$('#load-more').css("display","none");
		results_counter= total_results;
	}
	else {
		results_counter= 12;
	}
	buy_height = $('#buy-container').css('height');
	latest_outer_height = $('#latest-outer').css('height');
	while( results_counter > 2 )
	$('#buy-container').css('height',parseInt(buy_height)+200*results_counter+'px');
	$('#latest-outer').css('height',parseInt(latest_outer_height)+200*results_counter+'px');
	var scopy = 0;
	$('#buy-container > #latest-outer > #buy-table > tbody').on('click', '.books-data', function() {
		var id = $(this).attr('id');
		var copy = id;
		id = id.split("book-data-").join("");
		copy = "#seller-data-" + id;
		var style =  $(copy).slideToggle(100);
		var size = $('tr[id^="seller-data"]:visible').size();
		buy_height = $('#buy-container').css('height');
		latest_outer_height = $('#latest-outer').css('height');
		console.log(size,scopy); 
		change = 30*(size-scopy);
		$('#buy-container').css('height',parseInt(buy_height)+change+'px');
		$('#latest-outer').css('height',parseInt(latest_outer_height)+change+'px');
		scopy = size;
	});
	load_more();
}
