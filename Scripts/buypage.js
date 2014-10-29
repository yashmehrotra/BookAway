//It sends a post request to a sqldata.php file which fetches all the data about books from database

//CHANGE THE JAVASCRIPT TO JQUERY   ---OH WAIT , YASH DID IT CAUSE HE IS AWESOME

// Important Filter Logic , when any filter is clicked all the filters should be checked in an order of precedence which is pretty
// messed up right now. Use data attributes like shown by and hidden by and then use Ultimate Data.

// " A GENIUS NEEDS AN AUDIENCE. "
//                          - Yash Mehrotra
//
// " FROM EVIDENCE TO DEDUCTION - THE STORY OF MY LIFE" --> Yash's Autobiography

var total_results = 0;
var RESULTS_SHOWN = 12;
var previousScroll = 0;

 $(function() {

  instructions_cookie();
  book_data_display();

  $('.sub-cbox input:checked').parent().css('color','black');
  $('.radio-available-for:checked').parent().css('color','black');
  $('.sub-cbox,.radio-available-for').on('click',function () {

    left_panel_selected_inputs();
  });

  $(document).on('scroll',function () {

    go_to_top();
  });

  newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
  console.log("Hello fellow developer , welcome to ",newURL,"\nTo peek behind the scenes go to Github");

});

function showthis(bookid) {

  var str = bookid;
  str = str.split("books-data-").join("");
  console.log(str);
  str = "#seller-data-" + str;
  $(str).toggle();
}

function go_to_top() {

  var currentScroll = $(document).scrollTop();
  if (currentScroll < previousScroll && currentScroll > 1000) {

    $('#buy-container').append("<a href='#buy-container'><img class='go-to-top-btn' id='go-to-top' src='Styles/Images/arrow1.png' alt='Go to top' title='Go to top'></a>");
    console.log('Appended !');
    console.log(previousScroll,currentScroll);
  } else {

    $('.go-to-top-btn').parent().remove();
  }
  previousScroll = currentScroll;
}

function instructions_cookie() {

  var cookies = document.cookie;
  if ( cookies.indexOf('bookawaybuycookie') != -1 ) {

    $('#buy-instructions').hide();
  } else {

    document.cookie = 'bookawaybuycookie=yes,expires=;path=/';
  }
}

checkbox_array      = [];
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
college_name_array  = [];
category_array      = [];

college_list        = [];

search_books        = [];
search_authors      = [];

function book_data_display () {

  $('#buy-container').append('<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:150px; left:805px;">');
  $.ajax({

    type: "POST",
    url: "sqldata.php",
    data: { 'source': 'view' },
    success: function (result) {

      $('#loading-gif').remove();
      if(result) {
        var counter = 0;
        var json = JSON.parse(result);
        console.log(json);
        while(json[counter]) {


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
            'book_id':json[counter].book_id,
            'book_name':json[counter].book_name,
            'author_name':json[counter].author_name,
            'category':json[counter].category,
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

          String.prototype.toProperCase = function () {

            return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
          };

          // Conversion to title case
          book_name_title_case = json[counter].book_name.toProperCase();
          author_name_title_case = json[counter].author_name.toProperCase();

          console.log(book_name_title_case,author_name_title_case);

          // To add different inputs
          if( $.inArray(book_name_title_case,search_books) == -1 ) {

            search_books.push(book_name_title_case);
            search_data.push(
              { label: book_name_title_case, category: "Books" }
            )
          }

          if( $.inArray(author_name_title_case,search_authors) == -1 ) {

            search_authors.push(author_name_title_case);
            search_data.push(
              { label: author_name_title_case, category: "Author" }
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

        var BASE_HTML_BOOK_DETAILS = "<div class='books-data' id='book-data-"+json[counter_clone].book_id+"'"+" data-sell-price='"+json[counter_clone].sell_price+"'"+" data-shown-by='default'"+ "data-college='"+ json[counter_clone].college +"'" +" data-book-for='"+json[counter_clone].sell_rent+"' >"+"<div class='image-buy-wrapper'><img class='books-data-images' src='"+json[counter_clone].image_source+"'></div><div class='name-buy-wrapper'>"+json[counter_clone].book_name+"</div><div class='author-buy-wrapper'><i> by "+json[counter_clone].author_name+"</i></div><div class='category-buy-wrapper'>Category : "+json[counter_clone].category+"</div><div class='desc-buy-wrapper'>"+json[counter_clone].book_description;

        if( json[counter_clone].rent_price == "" ) {

          console.log("No rent price");
          json[counter_clone].rent_price = "-";
          json[counter_clone].rent_time = "";

          $('#buy-content-container').prepend( BASE_HTML_BOOK_DETAILS + "</div><div class='sell-buy-wrapper'> Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].sell_price+"</div></div>");

        } else if( json[counter_clone].sell_price == "" ) {

          json[counter_clone].sell_price = "-";
          $('#buy-content-container').prepend( BASE_HTML_BOOK_DETAILS + "</div><div class='rent-buy-wrapper'>  Rent price : <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].rent_price+ " / " +json[counter_clone].rent_time +"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/

        } else {

          $('#buy-content-container').prepend( BASE_HTML_BOOK_DETAILS + "</div><div class='sell-buy-wrapper'>  Buy price &nbsp;: <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].sell_price+"</div><div class='rent-buy-wrapper'> Rent price : <img class='ruppee-img' src='Styles/Images/ruppee.gif'>" +json[counter_clone].rent_price+ " / " +json[counter_clone].rent_time +"</div></div>");/*</tr><tr class='seller-data' id='seller-data-"+json[counter_clone].book_id+"'"+">"+"<u>Seller Name:</u> "+json[counter_clone].seller_name+"<u>Contact:</u> "+json[counter_clone].seller_phone+"</tr>"*/
        }
        counter_clone += 1;
      }

      if(Ultimate_data.length===counter) {

        books_data();
        seller_data();
        filter();
        go_to_top();
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

function auto_load_more() {

  $(window).scroll(function() {

   if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {

    var counter_visible = $('.books-data:visible').size();
    var clone_visible = counter_visible;
    var visible_flag = 0;
    var all_results_visible = 0;
    console.log(counter_visible,total_results);
    if( counter_visible >= total_results ) {

      visible_flag = 1;
      all_results_visible = 1;
    }
    if( total_results - counter_visible < RESULTS_SHOWN ) {

      counter_visible = total_results;
      visible_flag = 1;
    } else {

      counter_visible += RESULTS_SHOWN;
    }

    if( !all_results_visible ) {

      var buy_height = $('#buy-container').height();
      var content_container_height = $('#buy-content-container').height();
      var change = 242*(counter_visible - clone_visible);
      // if ( (change + buy_height) <= max_height ) {
        $('#buy-container').height(buy_height+change+'px');
        $('#buy-content-container').height(content_container_height+change+'px');
      // }
      $('div[class="books-data"]:gt(' + (clone_visible-1) + '):lt(' + (RESULTS_SHOWN+1) + ')').slideDown(600);
      console.log(buy_height,content_container_height);
    }

    }
  });
}

function books_data() {

  console.log('total_results'+total_results);
  var results_counter = 0;
  // var max_height = total_results*230;

  // $('#buy-container').css('max-height',max_height+'px');
  // $('#buy-content-container').css('max-height',max_height+'px');

  $('div[class="books-data"]:gt(' + (RESULTS_SHOWN-1) + ')').hide();
  if( total_results < RESULTS_SHOWN ) {
    results_counter= total_results;
  } else {
    results_counter= RESULTS_SHOWN;
  }
  if ( results_counter > 3 ) {
  var buy_height = $('#buy-container').height();
  console.log("buy height",buy_height);
  var content_container_height = $('#buy-content-container').height();
  var h_change = 242*(results_counter - 3);
  $('#buy-container').height(buy_height + h_change + 'px');
  $('#buy-content-container').height( content_container_height + h_change + 'px');
  }
  auto_load_more();
}

function filter_college() {
  // College Based Search
  $('#search-filters-college-btn').on('click',function(e) {

    e.preventDefault();
    $(document).scrollTop(150);
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
}

function filter_name() {
  // Name Based Search
  $('#left-panel-search-btn').click(function(e) {

    e.preventDefault();
    $(document).scrollTop(150);
    console.log('search');
    var search_value = $("#left-panel-search-bar").val();
    var search_category = $("#category-search").val();
    console.log(search_value);
    console.log(search_category);
    load_specific(search_value,search_category);
  });
}

function filter_radio() {
  // Radio Based Search Available For
  $('.radio-available-for').on('click',function(e) {

    $(document).scrollTop(150);
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
}
function filter_range() {

  // Buy Price Range Filter
  $('#price-range').on('click',function(e) {

    e.preventDefault();
    $(document).scrollTop(150);
    var min_price = $('#range-min').val();
    var max_price = $('#range-max').val();
    $('#buy-container > #buy-content-container >.books-data').each(

      function(index) {

        $(this).show();
        //TEst yash
        var temp_id = $(this).attr('id');
        index_current = convert_id_to_Ultimate_index(temp_id);
        console.log(Ultimate_data[index_current]['book_name'],Ultimate_data[index_current]['author_name']);
        // Test Yash Over
        var sell_price_filter = $(this).data('sell-price');
        console.log(sell_price_filter);
        if( sell_price_filter < min_price || sell_price_filter > max_price) {
          $(this).hide();
        }
      }
    );
  });
}

function filter_category() {
    // Category Filter
  $('.sub-cbox-input').on('click',function(e) {

    $(document).scrollTop(150);

    var checkbox_value = $(this).val();
    checkbox_array = [];
    console.log(checkbox_value);

    if(checkbox_value == "All") {

      $('.sub-cbox-input').each(function(index){
        $(this).prop('checked',false);
      });

      $(this).prop('checked',true);

      $('.books-data').each(function(index) {
          $(this).show();
      });

    } else {

      $('.sub-cbox-input').each(function(index){
        if($(this).val() == "All") {
          $(this).prop('checked',false);
        } else if ($(this).prop('checked')) {
          if(checkbox_array.indexOf($(this).val(),checkbox_array) == -1) {
            checkbox_array.push($(this).val());
          }
        }
      });
      
      console.log(checkbox_array);
      $('.books-data').each(

        function(index) {

          $(this).hide();
          var index_book = convert_id_to_Ultimate_index($(this).attr('id'));
          var current_book_category = Ultimate_data[index_book]['category'];
          if(checkbox_array.indexOf(current_book_category) > -1) {

            $(this).show();
          }
      });
    }
  });
}

function filter() {
  
  filter_college();
  filter_name();
  filter_category();
  filter_radio();
  filter_range();
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

    $('#buy-container').append('<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:150px; left:805px;">');

    $.ajax({

      type: "POST",
      url: "sqldata.php",
      data: { 'source':'seller_data', 'book_id':book_id },
      success: function (result_seller_data) {

        $('#loading-gif').remove();
        if(result_seller_data) {
          var ajax_seller_data = JSON.parse(result_seller_data);
          console.log(ajax_seller_data);

          sell_data_id = "seller-data-" + book_onclick_id;
          $(''+id_clone+'').after('<div class="seller-data" id='+sell_data_id+' style="display:none;"><p id="seller-details-head"> Seller Contact Details: </p><div class="name-seller-wrap"><span class="ion-person" id="name-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_name+'</div><div class="phone-seller-wrap"><span class="ion-android-call" id="phone-seller-icon"></span>&nbsp;+91-&nbsp;'+ajax_seller_data.seller_phone+'</div><div class="email-seller-wrap"><span class="ion-email" id="email-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_email+'</div><div class="college-seller-wrap"><span class="ion-android-location" id="college-seller-icon"></span>&nbsp;'+ajax_seller_data.seller_college+'</div></div>');
          $('#'+sell_data_id+'').bPopup();
        } else {

          console.log('Problem with seller request');
        }
      }
    });

  });
}

function convert_id_to_Ultimate_index (html_id) {

  var converted_book_id = html_id.split('book-data-').join('');
  var index_id_book = $.inArray(converted_book_id,bookid_array)
  return index_id_book;
}

function split_into_different_words(param) {

    var return_array = [];
    if(typeof(param) == "string") {

        return_array = param.split(/&/).join().split(',');
    } else {

        for (var i=0;i<param.length;i++) {

            return_array.push(param[i].split(/&/).join().split(','));
        }
        return_array.map(Function.prototype.call, String.prototype.trim);
    }
    return return_array;
}

function left_panel_selected_inputs () {

    // $('.sub-cbox-input:checked').parent().css('color','black');
  $('.sub-cbox-input').each(function () {

    if ( $(this).is(':checked') ) {

      $(this).parent().css('color','black');
    } else {

      $(this).parent().css('color','gray');
    }
  });

  // $('.radio-available-for:checked').parent().css('color','black');

  $('.radio-available-for').each(function () {

    if ( $(this).is(':checked') ) {

      $(this).parent().css('color','black');
    } else {

      $(this).parent().css('color','gray');
    }
  });

}
