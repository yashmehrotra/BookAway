// It sends a post request to a sqldata.php file which fetches all the data about books from database


// Global variables

// Max count of the books to be shown at once when buypage is loaded
var RESULTS_TO_SHOW_ONCE = 10;

// To save the value of college id entered on startup, globally
var clg_id_global;

var total_results = 0;
var previous_scroll = 0;
var list_to_show = [];

var filter_dict = {
    'college':'',
    'name':{
        'value':'',
        'category':''
    },
    'category':'',
    'for':'4',
    'range': []
};


$(function() {

    $('#buy').attr('id','focus');
    
    $('#go-to-top').hide();

    var clg_data_from_cookie = get_clg_data_from_cookies();

    if(!clg_data_from_cookie) {
	popup_for_clg();
    } else {
        clg_id_global = clg_data_from_cookie;
	$('#college-input-onload').remove();
        book_data_display(clg_data_from_cookie, 'id','ASC');
    }

    $('#search-filters-college-search').selectToAutocomplete();
    
    input_college_text(clg_data_from_cookie);
    
    filter();
    input_keydowns();
    sort_by();

    $('.sub-cbox input:checked').parent().css('color', 'black');
    $('.radio-available-for:checked').parent().css('color', 'black');

    $('.sub-cbox,.radio-available-for').on('click', left_panel_selected_inputs);

    $(document).on('scroll', go_to_top);

});


var checkbox_array = [];
var Ultimate_data = [];

var search_data = [];

var booklist_array = [];
var authorlist_array = [];
var sellername_array = [];
var sellerphone_array = [];
var selleremail_array = [];
var bookid_array = [];
var bookfor_array = [];
var rentprice_array = [];
var sellprice_array = [];
var renttime_array = [];
var description_array = [];
var image_source_array = [];
var college_name_array = [];
var category_array = [];

var college_list = [];

var search_books = [];
var search_authors = [];

String.prototype.toProperCase = function() { 
    return this.replace(
            /\w\S*/g, function(txt) {
		return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
    );
};

function get_clg_name() {
    $('#bpopup-close').on('click',function() {
        var clg_id = $('select.sell-input:last option:selected').data('college-id');
	console.log(invalid_college(clg_id));
	if (!invalid_college(clg_id)) {
            save_clg_data_to_cookies(clg_id);
            clg_id_global = clg_id;
            $('#college-input-onload').bPopup().close();
            book_data_display(clg_id,'id','ASC');
	    input_college_text(clg_id);
	}
    });
}

function book_data_display(clg_id, show, show_by) {
    Ultimate_data = [];
    
    booklist_array = [];
    authorlist_array = [];
    sellername_array = [];
    sellerphone_array = [];
    selleremail_array = [];
    bookid_array = [];
    bookfor_array = [];
    rentprice_array = [];
    sellprice_array = [];
    renttime_array = [];
    description_array = [];
    image_source_array = [];
    college_name_array = [];
    category_array = [];

    $('#buy-container').append(
        '<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:fixed; top:60%; left:60%;" alt="Loading-image">'
    );
    $.ajax({
        type: "POST",
        url: "sqldata.php",
        data: {
            'source': 'view',
            'college_id': clg_id,
            'show':show,           // sell_price or id
            'show_by':show_by      // ASC or DESC
        },
        success: function(result) {
            $('#loading-gif').remove();

            if (result) {
                var counter = 0;
                var json = JSON.parse(result);

                while (json[counter]) {
                    booklist_array.push(json[counter].book_name);
                    authorlist_array.push(json[counter].author_name);
                    category_array.push(json[counter].category);
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
                        'book_id': json[counter].book_id,
                        'book_name': json[counter].book_name,
                        'author_name': json[counter].author_name,
                        'category': json[counter].category,
                        'seller_name': json[counter].seller_name,
                        'seller_phone': json[counter].seller_phone,
                        'seller_email': json[counter].seller_email,
                        'book_for': json[counter].sell_rent,
                        'rent_price': json[counter].rent_price,
                        'sell_price': json[counter].sell_price,
                        'rent_time': json[counter].rent_time,
                        'book_description': json[counter].book_description,
                        'image_source': json[counter].image_source,
                        'college_name': json[counter].college             // refrain from a trailing comma, it is not supported in some browsers
                    });
		 
                    // Conversion to title case
                    book_name_title_case = json[counter].book_name.toProperCase();
                    author_name_title_case = json[counter].author_name.toProperCase();

                    // To add different inputs to the array for autocomplete

                    if ($.inArray(book_name_title_case, search_books) == -1) {
                        search_books.push(book_name_title_case);
                        search_data.push({
                            label: book_name_title_case,
                            category: "Books"
                        });
                    }

                    if ($.inArray(author_name_title_case, search_authors) == -1) {
                        search_authors.push(author_name_title_case);
                        search_data.push({
                            label: author_name_title_case,
                            category: "Author"
                        });
                    }
                    total_results += 1;
                    counter += 1;
                }
		$('.books-data').remove();
                append();
            } else {
                console.log("Problem with Ajax Request");
            }
        }
    });
}

function append() {
    var counter_clone = 0;
    var NO_BOOK_IMAGE = "Styles/Images/noimage.jpg";

    var image_source_temp;
    var rent_price_temp;
    var rent_time_temp;
    var sell_price_temp;

    while (counter_clone != Ultimate_data.length) {
        if (!Ultimate_data[counter_clone].image_source) {
            image_source_temp = NO_BOOK_IMAGE;
        } else {
            image_source_temp = Ultimate_data[counter_clone].image_source;
        }

        var BASE_HTML_BOOK_DETAILS = "<div class='books-data' id='book-data-" + Ultimate_data[counter_clone].book_id + "'" +
		" data-sell-price='" + Ultimate_data[counter_clone].sell_price + "'" + " data-shown-by='default'" +
		"data-college='" + Ultimate_data[counter_clone].college_name + "'" + " data-book-for='" + Ultimate_data[counter_clone].book_for + "' >" +
		"<div class='image-buy-wrapper'><img class='books-data-images' src='" + image_source_temp +
		"'></div><div class='name-buy-wrapper'>" + Ultimate_data[counter_clone].book_name +
		"</div><div class='author-buy-wrapper'><i> by " + Ultimate_data[counter_clone].author_name +
		"</i></div><div class='category-buy-wrapper'>Category : " + Ultimate_data[counter_clone].category +
		"</div><div class='desc-buy-wrapper'>" + Ultimate_data[counter_clone].book_description;

        if (!Ultimate_data[counter_clone].rent_price) {
            $('#buy-content-container').prepend(BASE_HTML_BOOK_DETAILS + "</div><div class='sell-buy-wrapper'> Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif' alt='ruppee-gif'>" + Ultimate_data[counter_clone].sell_price + "</div></div>");
        } else if (!Ultimate_data[counter_clone].sell_price) {
            $('#buy-content-container').prepend(BASE_HTML_BOOK_DETAILS + "</div><div class='rent-buy-wrapper'>  Rent price : <img class='ruppee-img' src='Styles/Images/ruppee.gif' alt='ruppee-gif'>" + Ultimate_data[counter_clone].rent_price + " / " + Ultimate_data[counter_clone].rent_time + "</div></div>");
        } else {
            $('#buy-content-container').prepend(BASE_HTML_BOOK_DETAILS + "</div><div class='sell-buy-wrapper'>  Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif' alt='ruppee-gif'>" + Ultimate_data[counter_clone].sell_price + "</div><div class='rent-buy-wrapper'> Rent price : <img class='ruppee-img' src='Styles/Images/ruppee.gif' alt='ruppee-gif'>" + Ultimate_data[counter_clone].rent_price + " / " + Ultimate_data[counter_clone].rent_time + "</div></div>");
        }
        counter_clone += 1;
    }
    
    // Compiling the list of books to be shown    
    list_to_show = $('.books-data').map(function() {
        return $(this).attr('id');
    });
    
    // call to functions when all book data has been loaded
    if (Ultimate_data.length === counter_clone) {
        auto_load_more();
        seller_data();
        filter();
        go_to_top();
        search_bar_autocomple(search_data);
    }
}

function filter() {
    //Search  Sequence in descending order of priority

    // Name Based Search
    $('#left-panel-search-btn').on('click', function(e) {
        e.preventDefault();
        $(document).scrollTop(100);

        var search_value = $("#left-panel-search-bar").val();
        var search_category = $("#category-search").val();     // "Books" or "Author"

        filter_dict['name']['value'] = search_value;
        filter_dict['name']['category'] = search_category;

        filter_everything();
    });

    // College Based Search
    $('#search-filters-college-btn').on('click', function(e) {
        e.preventDefault();

	var clg_id_save = $('select.sell-input option:selected').data('college-id');
	console.log((clg_id_save));
	console.log(invalid_college(clg_id_save));
	if(invalid_college(clg_id_save)) {
	    return;
	}

        $(document).scrollTop(100);

        var user_college_name = $('.ui-autocomplete-input').val();

	setCookie('bookaway_clg_id',clg_id_save);
	
	window.location.reload();

        filter_dict['college'] = user_college_name;

        filter_everything();
    });

    // Radio Based Search Available For
    $('.radio-available-for').on('click', function(e) {
        $(document).scrollTop(100);
        
        var radio_value = $('.radio-available-for:checked').val();
        
        filter_dict['for'] = radio_value;
        filter_everything();
    });

    // Price Range Filter
    $('#price-range').on('click', function(e) {
        e.preventDefault();
        $(document).scrollTop(100);

        var min_price = $('#range-min').val();
        var max_price = $('#range-max').val();

        filter_dict['range'] = [min_price,max_price];
        filter_everything();
    });

    // Category Filter
    $('.sub-cbox-input').on('click', function(e) {
        $(document).scrollTop(100);

        var checkbox_value = $(this).val();
        checkbox_array = [];

        if ( $('#checkbox-all').prop('checked',false) && checkbox_value == "All" ) {
            $('#checkbox-all').prop('checked',true);
        }

        if ( $('#checkbox-all').prop('checked') && checkbox_value == "All" ) {
            $('.sub-cbox-input').each(function(index) {
                if( $(this).val() != "All") {
                    $(this).prop('checked',false);
                }
            });
        } else {
            $('#checkbox-all').prop('checked',false);
        }

        $('.sub-cbox-input').each(function(index) {
            if( $(this).prop('checked') ) {
                checkbox_array.push($(this).val());
            }
        });

        if (checkbox_array.length == 0) {
            $('#checkbox-all').prop('checked',true);
            checkbox_array = ['All'];
        }

        filter_dict['category'] = checkbox_array;
        filter_everything();
    });
}

function search_bar_autocomple(search_data) {
    $.widget("custom.catcomplete", $.ui.autocomplete, {
        _create: function() {
            this._super();
            this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
        },
        _renderMenu: function(ul, items) {
            var that = this,
                currentCategory = "";

            $.each(items, function(index, item) {
                var li;

                if (item.category != currentCategory) {
                    ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                    currentCategory = item.category;
                }
                li = that._renderItemData(ul, item);
                if (item.category) {
                    li.attr("aria-label", item.category + " : " + item.label);
                }
            });
        }
    });

    $("#left-panel-search-bar").catcomplete({
        delay: 0,
        source: search_data,

        select: function(event, ui) {
            $('#left-panel-search-bar').append("<div hidden id='category-search'></div>");
            $('#category-search').val(ui.item.category);
        }
    });
}

function seller_data(book_id) {
    $('.books-data').on('click', function() {
        var book_onclick_id = $(this).attr('id');
        var id_clone = '#' + book_onclick_id;

        book_onclick_id = book_onclick_id.split("book-data-").join("");
        book_id = book_onclick_id;

        $('#buy-container').append(
            '<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:fixed; top:50%; left:60%;">'
        );

        $.ajax({
            type: "POST",
            url: "sqldata.php",
            data: {
                'source': 'seller_data',
                'book_id': book_id
            },
            success: function(result_seller_data) {
                $('#loading-gif').remove();

                if (result_seller_data) {
                    var ajax_seller_data = JSON.parse(result_seller_data);
                    console.log(ajax_seller_data);

                    sell_data_id = "seller-data-" + book_onclick_id;
                    $('' + id_clone + '').after('<div class="seller-data" id=' + sell_data_id +
						' style="display:none;"><p id="seller-details-head"> Seller Contact Details: </p><div class="name-seller-wrap"><span class="ion-person" id="name-seller-icon"></span><p>&nbsp;' +
						ajax_seller_data.seller_name + '</p></div><div class="phone-seller-wrap"><span class="ion-android-call" id="phone-seller-icon"></span><p>&nbsp;+91-&nbsp;' +
						ajax_seller_data.seller_phone + '</p></div><div class="email-seller-wrap"><span class="ion-email" id="email-seller-icon"></span><p>&nbsp;' +
						ajax_seller_data.seller_email + '</p></div><div class="college-seller-wrap"><span class="ion-android-location" id="college-seller-icon"></span><p>&nbsp;' +
						ajax_seller_data.seller_college + '</p></div></div>');
                    $('#' + sell_data_id + '').bPopup();
                } else {
                    console.log('Problem with seller request');
                }
            }
        });
    });
}

function popup_for_clg() {
    $('#search-filters-college-search').css({'font-size':'18px','padding-left':'10px'});
    $('#search-filters-college-search').selectToAutocomplete();

    // $('#buy-container').prepend("<div id='college-input-onload'><p>Please enter the name of your college to continue:</p> <?php require('colleges.php'); ?> <button class='pointer-onhover' id='bpopup-close'>Go</button></div>");

    $('#college-input-onload').bPopup();
    $('.ui-autocomplete-input').height(30);

    get_clg_name();

    // input_college_text(clg_data_from_cookie);

    // $('#search-filters-college-search').val();
}

function convert_id_to_Ultimate_index(html_id) {
    var converted_book_id = html_id.split('book-data-').join('');
    var index_id_book = $.inArray(converted_book_id, bookid_array);

    return index_id_book;
}

// Implementation of filter function
function filter_everything() {
    $('.books-data').each(
        function(index) {
            // show everything first
            $(this).show();

	    
            var index_id = convert_id_to_Ultimate_index($(this).attr('id'));
	    
	    console.log(Ultimate_data[index_id]);

            var filter_college_name = Ultimate_data[index_id]['college_name'];
            var filter_book_name    = Ultimate_data[index_id]['book_name'];
            var filter_author_name  = Ultimate_data[index_id]['author_name'];
            var filter_category     = Ultimate_data[index_id]['category'];
            var filter_for          = Ultimate_data[index_id]['book_for'];
            var filter_price        = Ultimate_data[index_id]['sell_price'];
	    
            filter_price = parseInt(filter_price);   // It is better to push it into ultimate data as an integer

            filter_book_name = filter_book_name.toProperCase();
            filter_author_name = filter_author_name.toProperCase();

            if (filter_dict['college']) {
		// hide those which do not match college
		if (filter_college_name != filter_dict['college']) {
                    $(this).hide();
		}
	    }

            if (filter_dict['name']['value']) {
                // hide those which do not match name
                if ( filter_dict['name']['category'] == "Books" ) {
                    if ( filter_book_name != filter_dict['name']['value'] ) {
                        $(this).hide();
                    }
                } else if ( filter_dict['name']['category'] == "Author" ) {
                    if ( filter_author_name != filter_dict['name']['value'] ) {
                        $(this).hide();
                    }
                } 
            }
	    
            if (filter_dict['category']) {
                // hide those which are not in the category list
                if (checkbox_array.indexOf(filter_category) == -1 && checkbox_array.indexOf("All") == -1) {
                    $(this).hide();
                }
            }

            if (filter_dict['for'] != '4') {
                // hide those which do not match user's for
                if (filter_for != filter_dict['for']) {
                    $(this).hide();
                }
            }

            if (filter_dict['range']) {
                // hide those who do not come under the range
                var min_range = parseInt(filter_dict['range'][0]);
                var max_range = parseInt(filter_dict['range'][1]);

                if( filter_price < min_range || filter_price > max_range ) {
                    $(this).hide();
                }
            }
        }
    );    
    list_to_show = [];
    
    list_to_show = $('.books-data:visible').map(function() {
        return $(this).attr('id');
    });
    
    auto_load_more();
}

function input_keydowns() {

    $('.ui-autocomplete-input').keypress(function(event) {
	if (event.which == 13) {
	    event.preventDefault();
	    $('#bpopup-close').trigger('click');
	    $('#search-filters-college-btn').trigger('click');
	}
    });

    $('#left-panel-search-bar').keypress(function (event) {
	if ( event.which == 13 ) {
	    event.preventDefault();
	    $('#left-panel-search-btn').trigger('click');
	}
    });

    $('#range-min').keypress(function (event) {
	if ( event.which == 13 ) {
	    event.preventDefault();
	    $('#price-range').trigger('click');
	}
    });

    $('#range-max').keypress(function (event) {
	if ( event.which == 13 ) {
	    event.preventDefault();
	    $('#price-range').trigger('click');
	}
    });

}

function get_clg_data_from_cookies() {
    var temp = getCookie('bookaway_clg_id');
    if(temp) {
	return temp;
    }
    return false;
}

function save_clg_data_to_cookies(clg_id) {
    if (!getCookie('bookaway_clg_id')) {
	setCookie('bookaway_clg_id',clg_id);
    }
}


function input_college_text(clg_data_from_cookie) {
    clg_data_from_cookie = get_clg_data_from_cookies();
    $('.ui-autocomplete-input:first').val($('#search-filters-college-search option:eq(' + clg_data_from_cookie  + ')').text());
}

function auto_load_more() {
    $('.books-data').hide();

    var list_to_show_len = list_to_show.length;
    var lower_lim = 0;
    
    if(RESULTS_TO_SHOW_ONCE > list_to_show_len) {
        var upper_lim = list_to_show_len;
    } else {
        upper_lim = RESULTS_TO_SHOW_ONCE;
    }
    var count = 0;        

    $('.books-data').map(function() {
        if($.inArray($(this).attr('id'),list_to_show) != -1 && count <= upper_lim) {
            $(this).show("fast","swing");
            count += 1;
        }
    });          

    // Add debounce function here, to boost functionality and speed
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 400) {
            upper_lim += RESULTS_TO_SHOW_ONCE;
            var count = 0;        
            
            $('.books-data').map(function() {
                if($.inArray($(this).attr('id'),list_to_show) != -1 && count <= upper_lim) {
                    $(this).show("fast","swing");
                    count += 1;
                }
            });   
        }
    });
}

// Temporary function - should be removed as soon as buy-container bug is fixed.
function set_height_container() {
    var count_books = $('.books-data:visible').size();
    var height = count_books * 230;
    // alert(height);
    $('#buy-container').css('height', height);
    $('#buy-content-container').css('height', height);
}

function left_panel_selected_inputs() {
    $('.sub-cbox-input').each(function() {
        if ($(this).is(':checked')) {
            $(this).parent().css('color', 'black');
        } else {
            $(this).parent().css('color', 'gray');
        }
    });

    $('.radio-available-for').each(function() {
        if ($(this).is(':checked')) {
            $(this).parent().css('color', 'black');
        } else {
            $(this).parent().css('color', 'gray');
        }
    });
}

function go_to_top() {
    var currentScroll = $(document).scrollTop();

    if (currentScroll < previous_scroll && currentScroll > 900) {
        $('#go-to-top').show();
    } else if (!(currentScroll < previous_scroll && currentScroll > 900)) {
        $('#go-to-top').hide();
    }
    previous_scroll = currentScroll;
}

// Function to clear the dict(before running through filter_everything()) + resetting value on the Frontend
function clear_dict(index) {
    if (index) {
	if (index == 1) {
	    filter_dict['college'] = "";

	    $('.ui-autocomplete-input').val("");
	} else if (index == 2) {
	    filter_dict['name']['value'] = "";
	    filter_dict['name']['category'] = "";
	    
	    $('#left-panel-search-bar').val("");
	} else if (index == 3) {
	    filter_dict['category'] = "";

	    $('.sub-cbox-input').prop('checked', false);
	    $('#checkbox-all').prop('checked', true);

	    left_panel_selected_inputs();
	} else if (index == 4) {
	    filter_dict['for'] = '4';

	    $('#radio-for-all').prop('checked', true);

	    left_panel_selected_inputs();
	} else if (index == 5) {
	    filter_dict['range'] = [];

	    // for resetting the value of $('#range-min') and $('#range-max') to null
	    $('input[id^="range-m"]').val("");
	}
    } else {
	alert("Wrong input!"); // Well, this is embaressing!
    }
}

function sort_by() {
    $('#sort-by').on('change', function() {
        var clg_id = clg_id_global;
        clg_id = parseInt(clg_id);

        temp_list = $('#sort-by :selected').val().split("-");
        console.log(temp_list,clg_id);
        book_data_display(clg_id, temp_list[0], temp_list[1]);
    });
}

function smooth_scroll_to_top() {
    $('html, body').animate({
        scrollTop: $('body').offset().top
    }, 1800);
}

function clear_college() {
    clear_dict(1);

    filter_everything();
}

function clear_search_query() {
    clear_dict(2);

    filter_everything();
}

function clear_category() {
    clear_dict(3);

    filter_everything();
}

function clear_available_for() {
    clear_dict(4);

    filter_everything();
}

function clear_price_range() {
    clear_dict(5);

    filter_everything();
}

function clear_all() {
    for (var i = 2; i < 5; i++) {
	clear_dict(i);
    }

    filter_everything();
}

Array.prototype.clean = function(deleteValue) {
  for (var i = 0; i < this.length; i++) {
    if (this[i] == deleteValue) {         
      this.splice(i, 1);
      i--;
    }
  }
  return this;
};

function invalid_college(clg_id) {
    var college_list_for_validate = [];
    $('#search-filters-college-search option').each(function() {
	college_list_for_validate.push($(this).data('college-id'));
    });
    // console.log(college_list_for_validate, clg_id);
    // college_list_for_validate = college_list_for_validate.slice(1, college_list_for_validate.length);
    college_list_for_validate = college_list_for_validate.clean(undefined);
    // college_list_for_validate.filter(function(value) {
	// return value !== "" && value !== undefined;
    // });
    console.log(college_list_for_validate, clg_id);
    console.log($.inArray(clg_id, college_list_for_validate));
    if ($.inArray(clg_id, college_list_for_validate) != -1) {
	console.log($.inArray(college_list_for_validate, clg_id));
	return false;
    }
    return true;
}