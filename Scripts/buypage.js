//It sends a post request to a sqldata.php file which fetches all the data about books from database

//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME

// " A GENIUS NEEDS AN AUDIENCE. "
//                          - Yash Mehrotra
//
// " FROM EVIDENCE TO DEDUCTION - THE STORY OF MY LIFE" --> Yash's Autobiography
//
//     Visit bookaway.in/funny

// Global Variables
// Total number of books shown when the page loads, wihout scrolling down
var results_to_show_once = 8;

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

});

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

String.prototype.toProperCase = function() { 
    
    return this.replace(
        /\w\S*/g, function(txt) {
            
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }
    );
};


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
            
            // Compiling the list of books to be shown    
            list_to_show = $('.books-data').map(function() {
                
                return $(this).attr('id');
            });

            if (Ultimate_data.length === counter) {

                auto_load_more();
                seller_data();
                filter();
                go_to_top();
                search_bar_autocomple(search_data);
            }

        }
    });
    
}

function filter() {

    //Search First

    // Name Based Search
    $('#left-panel-search-btn').click(function(e) {

        e.preventDefault();
        $(document).scrollTop(150);

        var search_value = $("#left-panel-search-bar").val();
        var search_category = $("#category-search").val();

        filter_dict['name']['value'] = search_value;
        filter_dict['name']['category'] = search_category;

        filter_everything();

    });

    // College Based Search
    $('#search-filters-college-btn').on('click', function(e) {

        e.preventDefault();
        $(document).scrollTop(150);
        var user_college_name = $('#search-filters-college-search').val();

        filter_dict['college'] = user_college_name;
        filter_everything();

    });

    // Radio Based Search Available For
    $('.radio-available-for').on('click', function(e) {

        $(document).scrollTop(150);
        var radio_value = $('.radio-available-for:checked').val();
        
        filter_dict['for'] = radio_value;
        filter_everything();

    });

    // Buy Price Range Filter
    $('#price-range').on('click', function(e) {

        e.preventDefault();
        $(document).scrollTop(150);
        var min_price = $('#range-min').val();
        var max_price = $('#range-max').val();

        filter_dict['range'] = [min_price,max_price];
        filter_everything();

    });

    // Category Filter
    $('.sub-cbox-input').on('click', function(e) {

        $(document).scrollTop(150);

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

        console.log("Yash is awesome because",checkbox_array)

        // if (checkbox_value == "All") {

        //     $('.sub-cbox-input').each(function(index) {
        //         $(this).prop('checked', false);
        //     });

        //     $(this).prop('checked', true);

        //     checkbox_array = ['All'];

        // } else {

        //     $('.sub-cbox-input').each(function(index) {

        //         if ($(this).val() == "All") {
        //             $(this).prop('checked', false);
        //         } else if ($(this).prop('checked')) {
        //             if (checkbox_array.indexOf($(this).val(), checkbox_array) == -1) {
        //                 checkbox_array.push($(this).val());
        //             }
        //         }
        //     });
        // }

        //
        
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
            $('#left-panel-search-bar').append("<div hidden id='category-search'></div>")
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

                var colleges_list = [];
                var i=0;
                
                while (colleges[i]) {
                    colleges_list.push(colleges[i]);
                    i+=1;
                }

                $('#search-filters-college-search').autocomplete({
                    source: colleges_list
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
                if( checkbox_array.indexOf(filter_category) == -1 && checkbox_array.indexOf("All") == -1 ) {
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
    
    list_to_show.length = 0;
    
    list_to_show = $('.books-data:visible').map(function() {
                
        return $(this).attr('id');
    });
    
    auto_load_more();
}

//=============================================================//
// Backend Guys BEWARE , FROM HERE ON CSS STARTS , NA NA NA !  //
//=============================================================//

//    ||    ||      //==\\     //======    ||    ||
//    ||    ||     //    \\   =            ||    ||
//     \\  //      ||    ||   =            ||    ||
//      \\//       ||====||    \\====\\    ||====||          ||
//       ||        ||    ||           =    ||    ||          ||
//       ||        ||    ||           =    ||    ||          ||
//       ||        ||    ||    ======//    ||    ||          ||



// CSS RELATED Functions

function auto_load_more() {
    
    $('.books-data').hide();
    var list_to_show_len = list_to_show.length;
    var lower_lim = 0;
    
    if(results_to_show_once > list_to_show_len) {
        
        var upper_lim = list_to_show_len;
    } else {
        
        upper_lim = results_to_show_once;
    }
    
    var count = 0;        
    $('.books-data').map(function() {
        
        if($.inArray($(this).attr('id'),list_to_show) != -1 && count <= upper_lim) {
        
            $(this).show("fast","swing");
            count += 1;
        }
    });          
    
    $(window).scroll(function() {
        
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 400) {
            
            upper_lim += results_to_show_once;
            
            var count = 0;        
            $('.books-data').map(function() {
        
                console.log("Checking for each book!");
                if($.inArray($(this).attr('id'),list_to_show) != -1 && count <= upper_lim) {

                    $(this).show("fast","swing");
                    count += 1;
                }
            });   
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

function go_to_top() {

    var currentScroll = $(document).scrollTop();

    if (currentScroll < previous_scroll && currentScroll > 900) {
        $('#go-to-top').show();
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