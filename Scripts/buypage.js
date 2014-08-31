//It sends a post request to a sqldata.php file which fetches all the data about books from database

//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME

var total_results = 0;
 $(document).ready(function() {
	book_data_display();
	newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
	console.log(newURL);

	// $max_price = $('#a').val();
	// $search_by = $('#search_by option:selected').val();
	// $buy_subject = $('#buy_subject option:selected').val();

	// console.log($max_price);
	// console.log($search_by);
	// console.log($buy_subject);
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
description_array   = [];
image_source_array  = [];
college_name_array 	= [];

college_list        = [];

search_books        = [];
search_authors      = [];

function book_data_display () {
	
	$('#buy-container').append('<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:150px; left:805px;">');	
	$.ajax({
		type: "POST",
		url: "sqldata.php", //Make sure URL Doesnt cause problem in future
		data: { 'source': 'view' },
		success: function (result) {
			$('#loading-gif').hide();
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
					description_array.push(json[counter].book_description);
					image_source_array.push(json[counter].image_source);
					college_name_array.push(json[counter].college);

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
						'rent_time':json[counter].rent_time,
						'book_description':json[counter].book_description,
						'image_source':json[counter].image_source,
						'college_name':json[counter].college,
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
			}

			else {
				console.log("Problem with Ajax Request")
			}
			var counter_clone = 0;
			var NO_BOOK_IMAGE = "Styles/Images/noimage.jpg";

			while(counter_clone != counter) {

				if( json[counter_clone].image_source == "" ) {					
					json[counter_clone].image_source = NO_BOOK_IMAGE;
				}

				var BASE_HTML_BOOK_DETAILS = "<div class='books-data' id='book-data-"+json[counter_clone].book_id+"'"+" data-sell-price='"+json[counter_clone].sell_price+"'"+" data-shown-by='default'"+ "data-college='"+ json[counter_clone].college +"'" +" data-book-for='"+json[counter_clone].sell_rent+"' >"+"<div class='image-buy-wrapper'><img class='books-data-images' src='"+json[counter_clone].image_source+"'></div><div class='name-buy-wrapper'>"+json[counter_clone].book_name+"</div><div class='author-buy-wrapper'><i>"+json[counter_clone].author_name+"</i></div><div class='desc-buy-wrapper'>"+json[counter_clone].book_description;

				if( json[counter_clone].rent_price == "" ) {
					
					console.log("No rent price");
					json[counter_clone].rent_price = "-";
					json[counter_clone].rent_time = "";

					$('#buy-content-container').prepend( BASE_HTML_BOOK_DETAILS + "</div><div class='sell-buy-wrapper'> Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].sell_price+"</div></div>");
				
				} else if( json[counter_clone].sell_price == "" ) {
					
					json[counter_clone].sell_price = "-";
					$('#buy-content-container').prepend( BASE_HTML_BOOK_DETAILS + "</div><div class='rent-buy-wrapper'>  Rent price: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].rent_price+ " / " +json[counter_clone].rent_time +"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/
				
				} else {
					
					$('#buy-content-container').prepend( BASE_HTML_BOOK_DETAILS + "</div><div class='sell-buy-wrapper'>  Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].sell_price+"</div><div class='rent-buy-wrapper'> Rent price: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].rent_price+ " / " +json[counter_clone].rent_time +"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/
				}
				counter_clone += 1;
			}

			if(Ultimate_data.length===counter) {
				
				books_data();
				seller_data();
				filter();
			}

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
		
			$( "#left-panel-search-bar" ).catcomplete({
				delay: 0,
				source: search_data,
				select: function(event, ui) {
					$('#left-panel-search-bar').append("<div hidden id='category-search'></div>")
           			$('#category-search').val(ui.item.category);
           		}
			});

			//For College List

			$.ajax({
				type: "POST",
				url: "sqldata.php", //Make sure URL Doesnt cause problem in future //{ 'source': 'view'
				data: { 'source': 'college_list' },
				success: function (result_college) {
					if(result_college) {
						var ajax_college_list = JSON.parse(result_college);
						console.log(ajax_college_list);
						var counter_college = 0;
						while(ajax_college_list[counter_college]) {

							college_list.push(ajax_college_list[counter_college]);
							counter_college += 1;
						}
						console.log('look down');
						console.log(college_list);
					}
				}
			});

			$('#search-filters-college-search').autocomplete({
				source: college_list
			});
		}
	});
}

function load_more () {
	$('#load-more-btn').on('click', function(){
		var counter_visible = $('.books-data:visible').size();
		var clone_visible = counter_visible;
		var visible_flag = 0;
		if( counter_visible >= total_results ) {
			//$('#load-more-btn').css('display','none');
			$('#load-more-btn').hide();
			visible_flag = 1;
		}
		if( total_results - counter_visible < 12 ) {
			counter_visible = total_results;
			$('#load-more-btn').hide();
			visible_flag = 1;
			var flag = 1;
		}	else {
			$('#load-more-btn').show();
			counter_visible = counter_visible + 12;
			var flag = 0;
		}

		$('div[class="books-data"]:gt(' + clone_visible + '):lt(13)').slideDown(600);
		var buy_height = $('#buy-container').height();
		var latest_outer_height = $('#buy-content-container').height();
		console.log(buy_height,latest_outer_height);
		var change = 230*(counter_visible - clone_visible);
	
		if(visible_flag == 1) {
			change = change - 130;
		}

		$('#buy-container').css('height',buy_height+change+'px');
		$('#buy-content-container').css('height',latest_outer_height+change+'px');
	});
}

function books_data() {
	console.log('total_results'+total_results);
	//$('#buy-container > #buy-content-container > #buy-table > tbody > .seller-data').css("display","none");
	var results_counter = 0;
	// $('div[class="books-data"]:gt(11)').css("display","none");
	$('div[class="books-data"]:gt(11)').hide();
	if( total_results < 12) {
		// $('#load-more-btn').css("display","none");
		// $('#load-more-btn').hide();
		results_counter= total_results;
	} else {
		$('#load-more-btn').show();
		results_counter= 12;
	}
	if ( results_counter > 3 ) {
	// buy_height = $('#buy-container').css('height');
	var buy_height = $('#buy-container').height();
	console.log(buy_height);
	var latest_outer_height = $('#buy-content-container').height();
	// console.log(latest_outer_height);
	var h_change = 220*(results_counter-3);
	$('#buy-container').height(buy_height + h_change + 'px');
	$('#buy-content-container').height( latest_outer_height + h_change + 'px');
	}
	load_more();
}

function filter() {

	console.log('yash');
	//Search First

	$('#left-panel-search-btn').click(function(e) {
		e.preventDefault();
		console.log('search');
		var search_value = $("#left-panel-search-bar").val();
		var search_category = $("#category-search").val();
		console.log(search_value);
		console.log(search_category);
		load_specific(search_value,search_category);
	});

	$('#search-filters-college-btn').on('click',function(e) {

		e.preventDefault();
		var user_college_name = $('#search-filters-college-search').val();
		var current_college_name = "";
		$('#buy-container > #buy-content-container >.books-data').each(
			function(index) {
				current_college_name = $(this).data('college');

				if( $(this).attr('display') == 'block' && $(this).data('shown-by') != 'not_search' ) {

					$(this).show();
				}

				if( current_college_name != user_college_name ) {

					$(this).attr('data-shown-by','not college')
					$(this).hide();
				}
			}
		);
	});

	$('.radio-available-for').on('click',function(e) {
		// e.preventDefault();
		var radio_value = $('.radio-available-for:checked').val();
		console.log(radio_value);
		$('#buy-container > #buy-content-container >.books-data').each(
			function(index) {
				var available_for = $(this).data('book-for');
				$(this).show();
				if ( available_for != radio_value && radio_value != '4' ) {
					console.log(available_for);
					console.log('above radio');
					$(this).hide();
				}
			}
		);

	});

	$('#price-range').on('click',function(e) {
		e.preventDefault();
		var min_price = $('#range-min').val();
		var max_price = $('#range-max').val();
		$('#buy-container > #buy-content-container >.books-data').each(
			function(index) {
				$(this).show();
				var sell_price_filter = $(this).data('sell-price');
				console.log(sell_price_filter);
				if( sell_price_filter <= min_price || sell_price_filter >= max_price) {
					$(this).hide();
				}
			}
		);
	});
}

function load_specific(search_value, search_category) {

	$.ajax({
		type: "POST",
		url: "sqldata.php", 
		data: { 'source': 'search', 'search_category': search_category, 'search_value': search_value },
		success: function (result) {
			if(result) {
				console.log(search_category);
				console.log(search_value);
				var search_result = JSON.parse(result);
				console.log(search_result);

				var search_list_book_id = [];
				var counter = 0;
				while (search_result[counter]) {

					search_list_book_id.push(search_result[counter].book_id);
					counter += 1;
				}

				$('#buy-container > #buy-content-container >.books-data').each(
					function(index) {
						$(this).show();
						$(this).attr('data-shown-by','search');
						var current_id = $(this).attr('id');
						current_id = current_id.split('book-data-').join('');
						if( $.inArray(current_id,search_list_book_id) == -1 ) {

							$(this).attr('data-shown-by','not_search');
							$(this).hide();
						}
					}
				);
				
			} else {
				console.log("Thenga")
			}
		}
	});
}

function seller_data(book_id) {
	$('.books-data').on('click', function(){
		console.log("Hello");
		var book_onclick_id = $(this).attr('id');
		var id_clone = '#'+book_onclick_id;
		console.log(id_clone);
		book_onclick_id = book_onclick_id.split("book-data-").join("");
		book_id = book_onclick_id;
		$.ajax({
			type: "POST",
			url: "sqldata.php",
			data: { 'source':'seller_data', 'book_id':book_id },
			success: function (result_seller_data) {
				if(result_seller_data) {
					//var counter = 0;
					var ajax_seller_data = JSON.parse(result_seller_data);
					console.log(ajax_seller_data);

					sell_data_id = "seller-data-" + book_onclick_id;
					$(''+id_clone+'').after('<div class="seller-data" id='+sell_data_id+' style="display:none;"><p id="seller-details-head"> To buy/rent this book, contact the seller directly through the mentioned contact details: </p><div class="name-seller-wrap"><span class="ion-person" id="name-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_name+'</div><div class="phone-seller-wrap"><span class="ion-android-call" id="phone-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_phone+'</div><div class="email-seller-wrap"><span class="ion-email" id="email-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_email+'</div><div class="college-seller-wrap"><span class="ion-android-location" id="college-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_college+'</div></div>');
					// $(+id_clone+).after('<div class="seller-data" id='+sell_data_id+'><div class="seller-name-wrap">'+ajax_seller_data.seller_name+'</div><div class="seller-phone-wrap">'+ajax_seller_data.seller_phone+'</div><div class="seller-email-wrap">'+ajax_seller_data.seller_email+'</div><div class="seller-college-wrap">'+ajax_seller_data.seller_college+'</div></div>');
					$('#'+sell_data_id+'').bPopup();
				} else {
					console.log('Problem with seller request');
				}				
			}
		});
	});
}
