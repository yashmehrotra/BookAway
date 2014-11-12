//It sends a post request to a sqldata.php file which fetches all the data about books from database

//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME

// Important Filter Logic , when any filter is clicked all the filters should be checked in an order of precedence which is pretty
// messed up right now. Use data attributes like shown by and hidden by and then use Ultimate Data.

// " A GENIUS NEEDS AN AUDIENCE. "
//                          - Yash Mehrotra
//
// " FROM EVIDENCE TO DEDUCTION - THE STORY OF MY LIFE" --> Yash's Autobiography
//
// " FROM DEDUCTION TO EVIDENCE - HOW TO SUCK AT DECLARING VARIABLES (An autobiography based on Yash Mehrotra's Personal Lackey)" 
//                            ^^^^ Avijit's Autobiography
//
//
//     go to bookaway.in/funny

// Global Variables
// Total number of books shown when the page loads, wihout scrolling down
var RESULTS_SHOWN = 12;

var total_results = 0;
var previous_scroll = 0;

var filter_dict = {
    'college':'',
    'name':{
        'value':'',
        'category':''
    },
    'category':'',
    'for':'4',
    'range':[],
};

$(function() {

    instructions_cookie();
    load_college();
    book_data_display();

    $('#go-to-top').hide();

    $('.sub-cbox input:checked').parent().css('color', 'black');
    $('.radio-available-for:checked').parent().css('color', 'black');
    $('.sub-cbox,.radio-available-for').on('click', function() {

        left_panel_selected_inputs();
    });

    $(document).on('scroll', function() {

        go_to_top();
    });

    newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
    console.log("Hello fellow developer , welcome to ", newURL, "\nTo peek behind the scenes go to Github");

    // setInterval(function(){
    //     console.log(filter_dict);
    // },5000);

});

function showthis(bookid) {

    var str = bookid;
    str = str.split("books-data-").join("");
    console.log(str);
    str = "#seller-data-" + str;
    $(str).toggle();
}

function instructions_cookie() {

    var cookies = document.cookie;
    if (cookies.indexOf('bookawaybuycookie') != -1) {

        $('#buy-instructions').hide();
    } else {

        document.cookie = 'bookawaybuycookie=yes,expires=;path=/';
    }
}

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


function book_data_display() {

    $('#buy-container').append(
        '<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:fixed; top:60%; left:60%;">'
    );
    $.ajax({

        type: "POST",
        url: "sqldata.php",
        data: {
            'source': 'view'
        },
        success: function(result) {

            $('#loading-gif').remove();
            if (result) {

                var counter = 0;
                var json = JSON.parse(result);
                console.log(json);
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
                        'college_name': json[counter].college,
                    });

                    String.prototype.toProperCase = function() {

                        return this.replace(
                            /\w\S*/g, function(txt) {
                                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                            }
                        );
                    };

                    // Conversion to title case
                    book_name_title_case = json[counter].book_name.toProperCase();
                    author_name_title_case = json[counter].author_name.toProperCase();

                    console.log(book_name_title_case, author_name_title_case);

                    // To add different inputs
                    if ($.inArray(book_name_title_case, search_books) == -1) {

                        search_books.push(book_name_title_case);
                        search_data.push({
                            label: book_name_title_case,
                            category: "Books"
                        })
                    }

                    if ($.inArray(author_name_title_case, search_authors) == -1) {

                        search_authors.push(author_name_title_case);
                        search_data.push({
                            label: author_name_title_case,
                            category: "Author"
                        })
                    }

                    total_results = total_results + 1;
                    counter = counter + 1;
                }
            } else {

                console.log("Problem with Ajax Request")
            }
            var counter_clone = 0;
            var NO_BOOK_IMAGE = "Styles/Images/noimage.jpg";

            while (counter_clone != counter) {

                if (json[counter_clone].image_source == "") {

                    json[counter_clone].image_source = NO_BOOK_IMAGE;
                }

                var BASE_HTML_BOOK_DETAILS = "<div class='books-data' id='book-data-" + json[counter_clone].book_id + "'" +
                     " data-sell-price='" + json[counter_clone].sell_price + "'" + " data-shown-by='default'" +
                     "data-college='" + json[counter_clone].college + "'" + " data-book-for='" + json[counter_clone].sell_rent + "' >" +
                     "<div class='image-buy-wrapper'><img class='books-data-images' src='" + json[counter_clone].image_source +
                     "'></div><div class='name-buy-wrapper'>" + json[counter_clone].book_name +
                     "</div><div class='author-buy-wrapper'><i> by " + json[counter_clone].author_name +
                     "</i></div><div class='category-buy-wrapper'>Category : " + json[counter_clone].category +
                     "</div><div class='desc-buy-wrapper'>" + json[counter_clone].book_description;

                if (json[counter_clone].rent_price == "") {

                    console.log("No rent price");
                    json[counter_clone].rent_price = "-";
                    json[counter_clone].rent_time = "";

                    $('#buy-content-container').prepend(BASE_HTML_BOOK_DETAILS +
                        "</div><div class='sell-buy-wrapper'> Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +
                        json[counter_clone].sell_price + "</div></div>");

                } else if (json[counter_clone].sell_price == "") {

                    json[counter_clone].sell_price = "-";
                    $('#buy-content-container').prepend(BASE_HTML_BOOK_DETAILS +
                        "</div><div class='rent-buy-wrapper'>  Rent price : <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +
                        json[counter_clone].rent_price + " / " + json[counter_clone].rent_time + "</div></div>");

                } else {

                    $('#buy-content-container').prepend(BASE_HTML_BOOK_DETAILS +
                        "</div><div class='sell-buy-wrapper'>  Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +
                        json[counter_clone].sell_price + "</div><div class='rent-buy-wrapper'> Rent price : <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +
                        json[counter_clone].rent_price + " / " + json[counter_clone].rent_time + "</div></div>");
                }
                counter_clone += 1;
            }

            if (Ultimate_data.length === counter) {

                books_data();
                seller_data();
                filter();
                go_to_top();
            }

            // For Autocomplete
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
                    $('#left-panel-search-bar').append("<div hidden id='category-search'></div>")
                    $('#category-search').val(ui.item.category);
                }
            });

        }
    });
}

function filter() {

    //Search First

    // Name Based Search
    $('#left-panel-search-btn').click(function(e) {

        e.preventDefault();
        $(document).scrollTop(150);
        console.log('search');
        var search_value = $("#left-panel-search-bar").val();
        var search_category = $("#category-search").val();

        filter_dict['name']['value'] = search_value;
        filter_dict['name']['category'] = search_category;

        filter_everything();

        // console.log(search_value);
        // console.log(search_category);

        // load_specific(search_value, search_category);
    });

    // College Based Search
    $('#search-filters-college-btn').on('click', function(e) {

        e.preventDefault();
        $(document).scrollTop(150);
        var user_college_name = $('#search-filters-college-search').val();

        filter_dict['college'] = user_college_name;
        filter_everything();
        // var current_college_name = "";
        // $('#buy-container > #buy-content-container >.books-data').each(
        //     function(index) {

        //         current_college_name = $(this).data('college');

        //         if ($(this).attr('display') == 'block' && $(this).data('shown-by') != 'not_search') {

        //             $(this).show();
        //         }

        //         if (current_college_name != user_college_name) {

        //             $(this).attr('data-shown-by', 'not college')
        //             $(this).hide();
        //         }
        //     }
        // );
    });

    // Radio Based Search Available For
    $('.radio-available-for').on('click', function(e) {

        $(document).scrollTop(150);
        var radio_value = $('.radio-available-for:checked').val();
        
        filter_dict['for'] = radio_value;
        filter_everything();

        // console.log(radio_value);
        // $('#buy-container > #buy-content-container >.books-data').each(

        //     function(index) {

        //         var available_for = $(this).data('book-for');
        //         $(this).show();
        //         if (available_for != radio_value && radio_value != '4') {
        //             $(this).hide();
        //         }
        //     }
        // );

    });

    // Buy Price Range Filter
    $('#price-range').on('click', function(e) {

        e.preventDefault();
        $(document).scrollTop(150);
        var min_price = $('#range-min').val();
        var max_price = $('#range-max').val();

        filter_dict['range'] = [min_price,max_price];
        filter_everything();


        // $('#buy-container > #buy-content-container >.books-data').each(
        //     function(index) {

        //         $(this).show();
        //         var temp_id = $(this).attr('id');
        //         index_current = convert_id_to_Ultimate_index(temp_id);
        //         console.log(Ultimate_data[index_current]['book_name'], Ultimate_data[index_current]['author_name']);
        //         var sell_price_filter = $(this).data('sell-price');
        //         console.log(sell_price_filter);
        //         if (sell_price_filter < min_price || sell_price_filter > max_price) {

        //             $(this).hide();
        //         }
        //     }
        // );
    });

    // Category Filter
    $('.sub-cbox-input').on('click', function(e) {

        $(document).scrollTop(150);

        var checkbox_value = $(this).val();
        checkbox_array = [];
        console.log(checkbox_value);

        if (checkbox_value == "All") {

            $('.sub-cbox-input').each(function(index) {

                $(this).prop('checked', false);
            });

            $(this).prop('checked', true);

            $('.books-data').each(

                function(index) {

                    $(this).show();
                });

        } else {

            $('.sub-cbox-input').each(function(index) {

                if ($(this).val() == "All") {

                    $(this).prop('checked', false);
                } else if ($(this).prop('checked')) {

                    if (checkbox_array.indexOf($(this).val(), checkbox_array) == -1) {

                        checkbox_array.push($(this).val());
                    }
                }
            });
            console.log(checkbox_array);

            filter_dict['category'] = checkbox_array;
            filter_everything();
            
            // $('.books-data').each(

            //     function(index) {

            //         $(this).hide();
            //         var index_book = convert_id_to_Ultimate_index($(this).attr('id'));
            //         var current_book_category = Ultimate_data[index_book]['category'];
            //         if (checkbox_array.indexOf(current_book_category) > -1) {

            //             $(this).show();
            //         }
            //     });
        }
    });
}

function load_specific(search_value, search_category) {

    $.ajax({

        type: "POST",
        url: "sqldata.php",
        data: {
            'source': 'search',
            'search_category': search_category,
            'search_value': search_value
        },
        success: function(result) {

            if (result) {

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
                        $(this).attr('data-shown-by', 'search');
                        var current_id = $(this).attr('id');
                        current_id = current_id.split('book-data-').join('');
                        if ($.inArray(current_id, search_list_book_id) == -1) {

                            $(this).attr('data-shown-by', 'not_search');
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

    $('.books-data').on('click', function() {

        console.log("Hello");

        var book_onclick_id = $(this).attr('id');
        var id_clone = '#' + book_onclick_id;

        console.log(id_clone);
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
                         ' style="display:none;"><p id="seller-details-head"> Seller Contact Details: </p><div class="name-seller-wrap"><span class="ion-person" id="name-seller-icon"></span>&nbsp;' +
                         ajax_seller_data.seller_name + '</div><div class="phone-seller-wrap"><span class="ion-android-call" id="phone-seller-icon"></span>&nbsp;+91-&nbsp;' +
                         ajax_seller_data.seller_phone + '</div><div class="email-seller-wrap"><span class="ion-email" id="email-seller-icon"></span>&nbsp;' +
                         ajax_seller_data.seller_email + '</div><div class="college-seller-wrap"><span class="ion-android-location" id="college-seller-icon"></span>&nbsp;' +
                         ajax_seller_data.seller_college + '</div></div>');
                    $('#' + sell_data_id + '').bPopup();
                } else {

                    console.log('Problem with seller request');
                }
            }
        });

    });
}

function load_college() {
    
    //For College List
    $.ajax({
        type: "POST",
        url: "sqldata.php",
        data: {
            'source': 'college_list'
        },
        success: function(result) {
            if (result) {
                var colleges = JSON.parse(result);
                $('#search-filters-college-search').autocomplete({
                    source: colleges
                });      
            }
        }
    });

} 

function convert_id_to_Ultimate_index(html_id) {

    var converted_book_id = html_id.split('book-data-').join('');
    var index_id_book = $.inArray(converted_book_id, bookid_array)
    return index_id_book;
}

// Implementation of filter function

function filter_everything() {

    $('.books-data').each(
        function(index) {
            
            // show everything first
            $(this).show();

            var index_id = convert_id_to_Ultimate_index($(this).attr('id'));

            var filter_college_name = Ultimate_data[index_id]['college_name'];
            var filter_book_name    = Ultimate_data[index_id]['book_name'];
            var filter_author_name  = Ultimate_data[index_id]['author_name'];
            var filter_category     = Ultimate_data[index_id]['category'];
            var filter_for          = Ultimate_data[index_id]['book_for'];
            var filter_price        = Ultimate_data[index_id]['sell_price'];

            filter_price = parseInt(filter_price);   // It is better to push it into ultimate data as an integer


            //Make it global ///
            String.prototype.toProperCase = function() {

                        return this.replace(
                            /\w\S*/g, function(txt) {
                                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                            }
                        );
            };

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
                if( checkbox_array.indexOf(filter_category) == -1 ) {
                    $(this).hide();
                }
            }
            if ( filter_dict['for'] != '4' ) {
                // hide those which do not match user's for
                if( filter_for != filter_dict['for']) {
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
}

//=============================================================//
// Backend Guys BEWARE , FROM HERE ON CSS STARTS , NA NA NA !  //
//=============================================================//

//    ||    ||      //==\\     //======    ||    ||
//    ||    ||     //    \\   =            ||    ||
//     \\  //      ||    ||   =            ||    ||
//      \\//       ||====||    \\====\\    ||====||
//       ||        ||    ||           =    ||    ||
//       ||        ||    ||           =    ||    ||
//       ||        ||    ||    ======//    ||    ||

// PS - The above part, even though is of frontend, was majorly coded by a backend guy , and 
//      as you can observe, all of that requires a lot of logic and analytical abilites



// Below are the CSS RELATED Functions

function auto_load_more() {

    $(window).scroll(function() {

        if ($(window).scrollTop() + $(window).height() > $(document).height() - 200) {

            var counter_visible = $('.books-data:visible').size();
            var clone_visible = counter_visible;
            var visible_flag = 0;
            var all_results_visible = 0;
            console.log(counter_visible, total_results);
            if (counter_visible >= total_results) {

                visible_flag = 1;
                all_results_visible = 1;
            }
            if (total_results - counter_visible < RESULTS_SHOWN) {

                counter_visible = total_results;
                visible_flag = 1;
            } else {

                counter_visible += RESULTS_SHOWN;
            }

            if (!all_results_visible) {

                var buy_height = $('#buy-container').height();
                var content_container_height = $('#buy-content-container').height();
                var change = 242 * (counter_visible - clone_visible);

                // To change the height of the main container div dynamically
                $('#buy-container').height(content_container_height + change + 'px');

                // To show more book tiles on scroll down
                $('div[class="books-data"]:gt(' + (clone_visible - 1) + '):lt(' + (RESULTS_SHOWN + 1) + ')').slideDown(300);
                console.log(buy_height, content_container_height);
            }

        }
    });
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

function books_data() {

    console.log('total_results' + total_results);
    var results_counter = 0;

    $('div[class="books-data"]:gt(' + (RESULTS_SHOWN - 1) + ')').hide();
    if (total_results < RESULTS_SHOWN) {

        results_counter = total_results;
    } else {

        results_counter = RESULTS_SHOWN;
    }
    auto_load_more();
}

function go_to_top() {

    var currentScroll = $(document).scrollTop();

    if (currentScroll < previous_scroll && currentScroll > 900) {

        $('#go-to-top').show()
    } else if (!(currentScroll < previous_scroll && currentScroll > 900)) {

        $('#go-to-top').hide();
    }
    previous_scroll = currentScroll;
}

function smooth_scroll_to_top() {

    $('html, body').animate({

        scrollTop: $('body').offset().top
    }, 1800);
}

function go_to_top_onhover() {

    $('#go-to-top').on('mouseenter', function() {

        $(this).fadeTo("slow", 0.5);
    });
}