// Global variables
var prev_error_count = 0;
var college_list = [];

$(function() {

    $('#sell').attr('id', 'focus');
    
    auto_help_popup();
    show_password();
    help_popup();
    google_image_search();
    sell_validate_form();
    sell_validate_instantly();
    $('#cover-url').on('change',image_append);
    $('#sell-rent').on('change',hide_price);
    
});

$.ajax({

    type: "POST",
    url: "sqldata.php", //Make sure URL Doesnt cause problem in future //{ 'source': 'view'
    data: {
        'source': 'college_list'
    },
    success: function(result_college) {

        if (result_college) {

            var ajax_college_list = JSON.parse(result_college);
            console.log(ajax_college_list);
            var counter_college = 0;
            while (ajax_college_list[counter_college]) {

                college_list.push(ajax_college_list[counter_college]);
                counter_college += 1;
            }
            console.log('look down');
            console.log(college_list);
//            $('#sell-clg').autocomplete({
//
//                source: college_list
//            });
			// <input type="text" name="clg" id="sell-clg" class="sell-input" autocomplete="on" placeholder="Select College/Institute"><br>-->
			$('#search-filters-college-search').selectToAutocomplete();
        }
    }
});

function sell_validate_form() {

    var help_popup_top = $('#help-popup').css('top');
    var show_pass_top = $('#show-password').css('top');
    var help_top = $('#help').css('top');

    $('#sell-form').submit(function(event) {

        var sell_height = $('#sell-container').css('height');
        var flag = false;
        var error_count = 0;
        var name_error = false;
        var email_error = false;
        var phone_error = false;
        var before_pass = 0;

        $('.pure-g').find('div').hide();

        if ($('#name').val() == "" || $('#name').val().length < 2) {

            $('#error_name').html("Please provide your name");
            $('#name').focus();
            $('#error_name').css("display", "inline-block");
            flag = true;
            error_count += 1;
            name_error = true;
            before_pass = before_pass + 1;
        }

        var emval = $('#email').val();
        var emat = emval.indexOf("@");
        var emdot = emval.lastIndexOf(".");

        if (emval == "" || emat < -1 || emdot - emat < 2 || emval.length - emdot <= 2) {

            $('#error_email').html("Please provide a valid email address");
            $('#email').focus();
            $('#error_email').css("display", "inline-block");
            flag = true;;
            error_count += 1;
            email_error = true;
            before_pass = before_pass + 1;
        }

        if ($('#phone').val() == "" || $('#phone').val().length != 10 || isNaN($('#phone').val()) || $('#phone').val().indexOf(" ") != -1) {

            $('#error_phone').html("Phone number must contain 10 digits");
            $('#error_phone').css("display", "inline-block");
            $('#phone').focus();
            flag = true;;
            error_count += 1;
            phone_error = true;
            before_pass = before_pass + 1;
        }

        if ($('#password').val() == "" || $('#password').val().length < 4) {

            $('#error_pass').html("Password must contain at least 4 characters");
            $('#error_pass').css("display", "inline-block");
            $('#password').focus();
            flag = true;
            error_count += 1;
        }

        if ($('#subject :selected').val() == "") {

            $('#error_category').html("Please select the category of the book");
            $('#error_category').css("display", "inline-block");
            $('#subject').focus();
            flag = true;
            error_count += 1;
        }

        if ($('#book').val() == "") {

            $('#error_book_name').html("Please provide the name of the book");
            $('#error_book_name').css("display", "inline-block");
            $('#book').focus();
            flag = true;
            error_count += 1;
        }

        if ($('#author').val() == "") {

            $('#error_author').html("Please mention the author of the book");
            $('#error_author').css("display", "inline-block");
            $('#author').focus();
            flag = true;
            error_count += 1;
        }

        if ($('#cover-url').val() != "" &&
                !((/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test($('#cover-url').val()) &&
                !/^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i.test($('#cover-url').val())) ||
                (!/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test($('#cover-url').val()) &&
                /^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i.test($('#cover-url').val())))) {

            $('#error_url').html("Please provide a valid link");
            $('#error_url').css("display", "inline-block");
            $('#cover-url').focus();
            flag = true;
            error_count += 1;
        }

        var sell_or_rent = $('#sell-rent option:selected').val();

        if (sell_or_rent == 1) {

            if ($('#s-cost').val() == "") {

                $('#error_sale_price').html("Please provide the sale price");
                $('#error_sale_price').css("display", "inline-block");
                $('#s-cost').focus();
                flag = true;
                error_count += 1;
            }
        } else if (sell_or_rent == 2) {

            if ($('#r-cost').val() == "") {

                $('#error_rent_price').html("Please provide rent price");
                $('#error_rent_price').css("display", "inline-block");
                $('#r-cost').focus();
                flag = true;
                error_count += 1;
            }
        } else if (sell_or_rent == 3) {

            if ($('#s-cost').val() == "") {

                $('#error_sale_price').html("Please provide the sale price");
                $('#error_sale_price').css("display", "inline-block");
                $('#s-cost').focus();
                flag = true;
                error_count += 1;
            }

            if ($('#r-cost').val() == "") {

                $('#error_rent_price').html("Please provide the rent price");
                $('#error_rent_price').css("display", "inline-block");
                $('#r-cost').focus();
                flag = true;
                error_count += 1;
            }
        }
        
        if ($('#captcha-input').val() == "") {
        
            $('#error_captcha').html("Please input the captcha shown above");
            $('#error_captcha').css("display", "inline-block");
            $('#captcha-input').focus();
            flag = true;
            error_count += 1;
        }

        event.preventDefault();

        if (flag) {

            var count_change = error_count - prev_error_count;
            var sell_new_height = parseInt(sell_height) + 50 * count_change + 'px';

            $('#sell-container').css({
                "height": sell_new_height
            });
            
            prev_error_count = error_count;

            $('#help-popup').css('top', parseInt(help_popup_top) + 48 * before_pass + 'px');
            $('#show-password').css('top', parseInt(show_pass_top) + 52 * before_pass + 'px');
            $('#help').css('top', parseInt(help_top) + 50 * before_pass + 'px');

        } else {

            $('#sell-container').append(
                '<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:950px; left:405px;">'
            );
            $.ajax({

                url: "sqldata.php",
                type: 'POST',
                data: $(this).serialize(),
                success: function(result_addbook) {

                    $('#loading-gif').remove();
                    var response = JSON.parse(result_addbook);
                    console.log(response.status);
                    if (response.status == "success") {

                        console.log("Book addition successful");
                        $('#before-form-msg').hide();
                        $('#sell-form-wrap').hide();
                        $('#step-1').hide();
                        $('#entry').show();
                        $('#sell-container').css({
                            
                            'height': '450px',
                            'width': '800px'
                        });
                        $('#seller_name_span').html(response.seller_name)
                        $('#book_id_span').html(response.book_id);
                    } else if (response.status == "wrong_auth") {
                        
                        $('#error_captcha').html("Invalid input. Please re-enter the captcha.");
                        $('#error_captcha').show();
                        $('#captcha-input').focus();
                    }
                }
            });
        }
    });
}

function show_password() {

    var click_password = 0;
    $("#show-password").click(function() {

        if (click_password === 0) {

            var password = $("#password").val()
            $("#password").attr("type", "text");
            $("#password").text(password);
            click_password = 1;
        } else {

            $("#password").attr("type", "password");
            click_password = 0;
        }
    });
}

function help_popup() {

    $('#help').on('mouseenter mouseleave', function() {

        $('#help-popup').fadeToggle('50');
    });
}

function hide_price() {

    var sell_or_rent = $('#sell-rent option:selected').val();
    if (sell_or_rent == 1) {

        $('#r-cost').slideUp(300);
        $('#rent-price').slideUp(300);
        $('#s-cost').slideDown(300);
        $('#error_rent_price').slideUp(300);
        if ($('#error_sale_price').html() != "") {
            
            $('#error_sale_price').slideDown(300);
        }
        flag = true;
    } else if (sell_or_rent == 2) {

        $('#s-cost').slideUp(300);
        $('#r-cost').slideDown(300);
        $('#rent-price').slideDown(300);
        $('#error_sale_price').slideUp(300);
        if ($('#error_rent_price').html() != "") {
            
            $('#error_rent_price').slideDown(300);
        }
        flag = true;
    } else if (sell_or_rent == 3) {

        $('#s-cost').slideDown(300);
        $('#r-cost').slideDown(300);
        $('#rent-price').slideDown(300);
        if ($('#error_sale_price').html() != "") {
            
            $('#error_sale_price').slideDown(300);
        }
        if ($('#error_rent_price').html() != "") {
            
            $('#error_rent_price').slideDown(300);
        }
        flag = true;
    }
}

function image_append() {
    
    var cover_url = $('#cover-url').val();
    if( cover_url != '' &&
            ((/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test(cover_url) &&
            !/^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i.test($('#cover-url').val())) ||
            (!/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test(cover_url) &&
            /^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i.test($('#cover-url').val())))) {
        
        $('#cover-image').html('<img src="' + cover_url + '"alt="cover-image" id="cover-image-img-src">');
        console.log('abcd');
    }
}

function auto_help_popup() {
    
    $('#password').on('focus',function (){
        
        $('#help-popup').show();
    });
    
    $('#password').on('blur',function (){
    
        $('#help-popup').hide();
    });
}

function google_image_search() {

    $('#author').on('blur',function (){
        
        var GOOGLE_IMG_URL_BEFORE_INPUT = "https://www.google.co.in/search?espv=2&biw=1317&bih=657&tbm=isch&sa=1&q=";
        var book_name = $('#book').val().split(" ").join("+");
        var book_author = $('#author').val().split(" ").join("+");
        var GOOGLE_IMG_URL_AFTER_INPUT = "&espv=2&tbas=0&tbm=isch&source=lnt&tbs=isz:m&sa=X&ei=IzljVM-5CpCiugSUiICQAg&ved=0CBQQpwU&dpr=1&biw=1317&bih=657";
        var construced_url = GOOGLE_IMG_URL_BEFORE_INPUT + book_name + '+by+' + book_author + GOOGLE_IMG_URL_AFTER_INPUT;

        if($('#img-search-link').length == 0 && book_name != "" && book_author != "") {
            
          $('#book-desc').after('<p id="img-url-info">1. <a href="'+ construced_url +'" id="img-search-link" target="_blank">Click here</a> to search google images for book covers<br>2. Right click on an image and select <strong><u>Copy Image URL</u></strong><br>3. Paste that copied URL into the field below!</p>'); 
        } else if($('#image-search-link').length != 0) {

            $('#image-search-link').prop('href',construced_url);
        }
    });
}

function sell_validate_instantly() {
        
        CORRECT_IMAGE = "<img src='Styles/Images/correct.png' alt='correct input' class='correct-incorrect-img'></img>"
        INCORRECT_IMAGE = "<img src='Styles/Images/incorrect.png' alt='correct input' class='correct-incorrect-img'></img>"    
        
        $('#name').on('keyup change paste',function (){

            $('#error_name').css("display", "inline-block");
            
            if ($('#name').val() == "" || $('#name').val().length < 2) {

                $('#error_name').html(INCORRECT_IMAGE);
            } else {

                $('#error_name').html(CORRECT_IMAGE);
            }
        });
        
        $('#email').on('keyup change paste',function (){
            
            $('#error_email').css("display", "inline-block");
            
            var emval = $('#email').val();
            var emat = emval.indexOf("@");
            var emdot = emval.lastIndexOf(".");

            if (emval == "" || emat < -1 || emdot - emat < 2 || emval.length - emdot <= 2) {

                $('#error_email').html(INCORRECT_IMAGE);
            } else {

                $('#error_email').html(CORRECT_IMAGE);
            }
         });
            
        $('#phone').on('keyup change paste',function (){
                
            $('#error_phone').css("display", "inline-block");
            
            if ($('#phone').val() == "" || $('#phone').val().length != 10 || isNaN($('#phone').val()) || $('#phone').val().indexOf(" ") != -1) {

                $('#error_phone').html(INCORRECT_IMAGE);
            } else {

                $('#error_phone').html(CORRECT_IMAGE);
            }
        });
    
         $('#password').on('keyup change paste',function (){
            
            $('#error_pass').css("display", "inline-block"); 
             
            if ($('#password').val() == "" || $('#password').val().length < 4) {

                $('#error_pass').html(INCORRECT_IMAGE);
            } else {

                $('#error_pass').html(CORRECT_IMAGE);
            }
         });
        
         $('#subject').on('keyup change paste',function (){
            
            $('#error_category').css("display", "inline-block"); 
             
            if ($('#subject :selected').val() == "") {

                $('#error_category').html(INCORRECT_IMAGE);
            } else {

                $('#error_category').html(CORRECT_IMAGE);
            }
         });
        
         $('#book').on('keyup change paste',function (){
            
            $('#error_book_name').css("display", "inline-block"); 
             
            if ($('#book').val() == "") {

                $('#error_book_name').html(INCORRECT_IMAGE);
            } else {

                $('#error_book_name').html(CORRECT_IMAGE);
            }
         });
            
         $('#author').on('keyup change paste',function (){
            
            $('#error_author').css("display", "inline-block"); 
             
            if ($('#author').val() == "") {

                $('#error_author').html(INCORRECT_IMAGE);
            } else {

                $('#error_author').html(CORRECT_IMAGE);
            }
         });
            
//         $('#cover-url').on('keyup change paste',function (){
//            
//            $('#error_url').css("display", "inline-block"); 
//             
//            if ($('#cover-url').val() != "" &&
//                    !((/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test($('#cover-url').val()) &&
//                    !/^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i.test($('#cover-url').val())) ||
//                    (!/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test($('#cover-url').val()) &&
//                    /^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i.test($('#cover-url').val())))) {
//
//                $('#error_url').html(INCORRECT_IMAGE);
//            } else {
//
//                $('#error_url').html(CORRECT_IMAGE);
//            }
//         });
            
         $('#sell-rent').on('keyup change paste',function (){
            
            var sell_or_rent = $('#sell-rent option:selected').val();

            if (sell_or_rent == 1) {
                
                $('#s-cost').on('keyup change paste',function (){
                    
                    $('#error_sale_price').css("display", "inline-block"); 
                    
                    if ($('#s-cost').val() == "") {

                        $('#error_sale_price').html(INCORRECT_IMAGE);
                    } else {

                        $('#error_sell_price').html(CORRECT_IMAGE);
                    }
                });
            } else if (sell_or_rent == 2) {
                
                $('#s-cost').on('keyup change paste',function (){
                    
                    $('#error_rent_price').css("display", "inline-block"); 
                    
                    if ($('#r-cost').val() == "") {

                        $('#error_rent_price').html(INCORRECT_IMAGE);
                    } else {

                        $('#error_rent_price').html(CORRECT_IMAGE);
                    }
                });
            } else if (sell_or_rent == 3) {
                
                 $('#s-cost').on('keyup change paste',function (){
                    
                    $('#error_sale_price').css("display", "inline-block"); 
                    
                    if ($('#s-cost').val() == "") {

                        $('#error_sale_price').html(INCORRECT_IMAGE);
                    } else {

                        $('#error_sale_price').html(CORRECT_IMAGE);
                    }
                 });
                
                 $('#r-cost').on('keyup change paste',function (){
                    
                    $('#error_rent_price').css("display", "inline-block"); 
                    
                    if ($('#r-cost').val() == "") {

                        $('#error_rent_price').html(INCORRECT_IMAGE);
                    }
                    else {

                        $('#error_rent_price').html(CORRECT_IMAGE);
                    }
                 });
            }
         });
}