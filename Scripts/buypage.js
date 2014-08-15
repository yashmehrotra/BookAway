//It sends a post request to a php file which fetches all the data about books from database
//Also need to add the whole jquery widget of autocomplete and also need to include jquery as link src in main file

//
//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME
//


 $(document).ready(function() {
	$c = 0;
	book_data_display();
	//click_toggle();
	show_search();
	load_more();
	newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
	console.log(newURL);

	$max_price = $('#a').val();
	$search_by = $('#search_by option:selected').val();
	$buy_subject = $('#buy_subject option:selected').val();

	console.log($max_price);
	console.log($search_by);
	console.log($buy_subject);
	//books_data();

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


					// search_data.push(
					// 	{ label: json[counter].book_name, category: "Books" },
					// 	{ label: json[counter].author_name, category: "Author" }
					// )

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
					//
					//console.log("Above");

					//

					//console.log(json[counter].book_name + " " + json[counter].author_name);
					 //
					//if($c != 12 ) {
						if( json[counter].rent_price == "" ) {
							json[counter].rent_price = "-";
							json[counter].rent_time = "";
							$('#latest-outer > #buy-table > tbody > .books-header').after("<tr class='books-data' id='book-data-"+json[counter].book_id+"'"+">"+"<td>"+json[counter].book_name+"</td><td>"+json[counter].author_name+"</td><td>"+json[counter].sell_price+"</td><td>"+json[counter].rent_price+ " " +json[counter].rent_time+"</td></tr><tr class='seller-data' id='seller-data-"+json[counter].book_id+"'"+">"+"<td><u>Seller Name:</u> "+json[counter].seller_name+"</td><td><u>Contact:</u> "+json[counter].seller_phone+"</td></tr>");
						} 
						else if( json[counter].sell_price == "" ) {
							json[counter].sell_price = "-";
							$('#latest-outer > #buy-table > tbody > .books-header').after("<tr class='books-data' id='book-data-"+json[counter].book_id+"'"+">"+"<td>"+json[counter].book_name+"</td><td>"+json[counter].author_name+"</td><td>"+json[counter].sell_price+"</td><td>"+json[counter].rent_price+ " - per " +json[counter].rent_time+"</td></tr><tr class='seller-data' id='seller-data-"+json[counter].book_id+"'"+">"+"<td><u>Seller Name:</u> "+json[counter].seller_name+"</td><td><u>Contact:</u> "+json[counter].seller_phone+"</td></tr>");
						} 
						else {
							$('#latest-outer > #buy-table > tbody > .books-header').after("<tr class='books-data' id='book-data-"+json[counter].book_id+"'"+">"+"<td>"+json[counter].book_name+"</td><td>"+json[counter].author_name+"</td><td>"+json[counter].sell_price+"</td><td>"+json[counter].rent_price+ " - per " +json[counter].rent_time+"</td></tr><tr class='seller-data' id='seller-data-"+json[counter].book_id+"'"+">"+"<td><u>Seller Name:</u> "+json[counter].seller_name+"</td><td><u>Contact:</u> "+json[counter].seller_phone+"</td></tr>");
						}
						//$('#latest-outer >').append("");
						$c = $c + 1;
						console.log($c);
						counter = counter +1;
					//}
					//else{
					//	counter = counter +1;
					//}
					
				}
				//console.log(counter+"yash");
				if(Ultimate_data.length===counter) {
						console.log("Hoola");
						books_data();
					}
				//console.log(booklist_array);
				console.log(Ultimate_data);
				console.log(search_data);
				//For Autocomplete
				/////////////////////
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
			}
			else {
				console.log("Problem with Ajax Request")
			}
		}
	});

	// books_data();
}

/*function click_toggle () {
	
	$('#latest-outer > .latest-additions').on('click', '.books-data', function() {
		//console.log("click");
		var book_id = $(this).attr('id');
		book_id = book_id.split("books-data-").join("");
		var seller_data =  "#seller-data-" + book_id;
		$(seller_data).slideToggle(300);
	});
}
*/
function load_more () {
	//if( $c < 11 ) {
		//$('#load-more').css('display','none');
	//}
	//else {
		//$('#load-more').css('display','block');
		$('#load-more').on('click', function(){
			console.log("click");
			$height = $('#buy-table').height();
			$num = parseInt(($height - 50)/42);
			$cnum = $num;
			if( $num >= $c ) {
				$('#load-more').css('display','none');
			}
			console.log($num, $cnum, $c);
			if( $c - $num < 12 ) {
				$num = $c;
				$flag = 1;
			}
			else {
				$num = $num + 12;
				$flag = 0;
			}
			if( $num == $c ) {
				$('#load-more').css('display','none');
			}
			console.log($num, $cnum, $c);
			$num = $num - 1;
			$cnum = $cnum - 1; 
			$('#buy-container > #latest-outer > #buy-table > tbody > tr[class="books-data"]:gt(' + $cnum + '):lt(12)').slideDown(600);
			//$num = $num + 11;
			//console.log($num, $cnum, $c);
			$bheight = $('#buy-container').css('height');
			$lheight = $('#latest-outer').css('height');
			$change = 42.4*($num - $cnum);
			//$change = 52.5*($num - $cnum);
			//if( $flag == 1 ){
			//	$change = $change - 40;
			//}
			$('#buy-container').css('height',parseInt($bheight)+$change+'px');
			//$('#buy-container').css('height',parseInt($bheight)*2+'px');
			$('#latest-outer').css('height',parseInt($lheight)+$change+'px');
			//$('#latest-outer').css('height',parseInt($lheight)*2+'px');
		});
}

function show_search() {

	$('#search-button').on('click',function(e) {
		// console.log()
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
	//$('#latest-outer > .latest-additions').append(book_name_search);
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
				
			}
			else {
				console.log("Thenga")
			}
		}
	});

}

function books_data() {
	$('#buy-container > #latest-outer > #buy-table > tbody > .seller-data').css("display","none");;
	n=0;
	//for ($i=0;$i<($c-15);$i++) {
	//$('#buy-container > #latest-outer > #buy-table > tbody > tr:last').slideUp(50);
	//n=$c -15 + $i + 1;
	$('#buy-container > #latest-outer > #buy-table > tbody > tr[class="books-data"]:gt(11)').css("display","none");
	//console.log($c-$i);
	//}
	//});
	// $('tr[id^="books-data"]').click(function(){
	//console.log("fucjjjjj");
	// $('#buy-container > #latest-outer >#buy-table>tbody>.books-data').click(function(){
	$scopy = 0;
	$('#buy-container > #latest-outer >#buy-table>tbody').on('click', '.books-data', function() {
		//console.log("ABCD");
		$visible = 0;
		$id = $(this).attr('id');
		$copy = $id;
		//console.log($id);
		$id = $id.split("book-data-").join("");
		//console.log($id);
		//var seller_data =  "#seller-data-" + $id;
		//console.log(seller_data);
		$disp = $(this).find("#seller-data-"+$id);
		//console.log($disp);
		$copy = "#seller-data-" + $id;
		//$($copy).slideToggle(3000);
		$style =  $($copy).slideToggle(100);
		$size = $('tr[id^="seller-data"] :visible').size()/4;
		$bheight = $('#buy-container').css('height');
		$lheight = $('#latest-outer').css('height');
		console.log($size,$scopy); 
		$change = 30*($size-$scopy);
			//$change = 52.5*($num - $cnum);
			//if( $flag == 1 ){
			//	$change = $change - 40;
			//}
		$('#buy-container').css('height',parseInt($bheight)+$change+'px');
			//$('#buy-container').css('height',parseInt($bheight)*2+'px');
		$('#latest-outer').css('height',parseInt($lheight)+$change+'px');
		$scopy = $size;
		/*if( $style == 'display:none;' ) {
			console.log("HRlloWorld");*/
		//	$($copy).attr('style','display:block;');
			//console.log(" $c = ");
			//console.log($c);
		/*}
		else {
			$($copy).attr('style','display:none;');
		}*/
	});
}
