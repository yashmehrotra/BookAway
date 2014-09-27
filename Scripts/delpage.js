
var prev_error_count = 0; 

$(function() {

	$('#del').attr('id','focus');

	del_validate_form();
	hide_price();
	sell_validate_form();
	confirm_delete();
});

function del_validate_form() {

	$('#del-form').submit(function (event) {
		event.preventDefault();				
		//$("div[id^='del-error']").css("display","none");
		$("div[id^='del-error']").hide();
		// $('#del-main-container').css('height', '600px');

		var check = false;
		var emval = $('#email').val();
		var bookval = $('#bookid').val();
		var passval = $('#password').val();

		if( emval == "" || emval.indexOf("@") == -1 || emval.indexOf(".") == -1 ) {

			$('#del-error_email').html('Invalid email address!');
			$('#email').focus();
			$('#del-error_email').css("display","inline-block");
			check = true;
		}
		if( bookval == "" ) {

			$('#del-error_bookid').html('Fill in this field!');
			$('#bookid').focus();
			$('#del-error_bookid').css("display","inline-block");
			check = true;
		}
		if( !$.isNumeric(bookval) ) {

			$('#del-error_bookid').html('Only numbers are allowed!');
			$('#bookid').focus();
			$('#del-error_bookid').css("display","inline-block");
			check = true;
		}
		if( passval == "" || passval.length < 4 ) {

			$('#del-error_pass').html('At least 4 characters long!');
			$('#password').focus();
			$('#del-error_pass').css("display","inline-block");
			check = true;
		}
		if (!check) {

			console.log('Submit');
			edit_request();
			var book_id = $('#bookid').val();
			$('#book_id_hid').val(book_id);
			$('#del-main-container').height(900);
		}
	});
}

function edit_request() {

	var user_id = $('#bookid').val();
	var user_email = $('#email').val();
	var user_password = $('#password').val();
	console.log(user_email);
	$('#del-main-container').append('<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:800px; left:405px;">');
	$.ajax({
		type: "POST",
		url: "sqldata.php",
		data: {
			'user_id':user_id, 
			'user_email':user_email, 
			'user_password':user_password , 
			'source':'edit_user' 
		},
		success: function(result) {
			$('#loading-gif').hide();
			if(result) {
				var response = JSON.parse(result);
				console.log(response);
				console.log(response['status']);
				if(response['status'] == 'success') {
					console.log('correct');
					
					// $('#del-main').css('display','none');
					$('#del-main').hide();
					// $('#edit-form').css('display','block');
					$('#edit-form').show();
					
					$('#name').val(response['seller_name']);
					$('#email-form').val(response['seller_email']);
					$('#phone').val(response['seller_phone']);
					$('#subject').val(response['category']);
					$('#book').val(response['book_name']);
					$('#author').val(response['author']);
					$('#book-desc').val(response['book_description']);
					$('#cover-url').val(response['image_source']);
					$('#sell-rent').val(response['sell_rent']);
					$('#s-cost').val(response['sell_price']);
					$('#r-cost').val(response['rent_price']);
					$('#rent-price').attr('value',response['rent_time']);

				} else {
					console.log('wrong');
					$('#del-error_incorrect').html('The email, password or Book ID you entered are incorrect!')
					// $('#del-error_incorrect').css('display','block');
					$('#del-error_incorrect').show();
				}
			} else {
				console.log("Problem with Ajax Edit Request");
			}
		}
	});
}

function hide_price() {

	setInterval(function() {
		
		var sell_or_rent =  $('#sell-rent option:selected').val();
		if( sell_or_rent == 1 ) {
			
			$('#r-cost').slideUp(300);
			$('#rent-price').slideUp(300);
			$('#s-cost').slideDown(300);
			$('#error_rent_price').slideUp(300);
			if( $('#error_sale_price').html() != "" ) {
			$('#error_sale_price').slideDown(300);
			}
			flag = true;
		}

		if( sell_or_rent == 2 ) {
			
			$('#s-cost').slideUp(300);
			$('#r-cost').slideDown(300);
			$('#rent-price').slideDown(300);
			$('#error_sale_price').slideUp(300);
			if( $('#error_rent_price').html() != "" ) {
			$('#error_rent_price').slideDown(300);
			}
			flag = true;
		}
		
		if( sell_or_rent == 3 ) {
			
			$('#s-cost').slideDown(300);
			$('#r-cost').slideDown(300);
			$('#rent-price').slideDown(300);
			if( $('#error_sale_price').html() != "" ) {
			$('#error_sale_price').slideDown(300);
			}
			if( $('#error_rent_price').html() != "" ) {
			$('#error_rent_price').slideDown(300);
			}
			flag = true;
		}
	}, 100);
}

function sell_validate_form() {

$('#del-new-btn').click( function(event) {
	// var del_height = $('#del-main-container').css('height');
	var del_height = $('#del-main-container').height();
	// var edit_form_height = $('#edit-form').css('height');
	var edit_form_height = $('#edit-form').height();
	var flag = false;
	var error_count = 0;
	var before_pass = 0;

	// $('div[id^="error"]').css("display","none");
	$('div[id^="error"]').hide();
	
	if( $('#phone').val() == ""  || $('#phone').val().length != 10 || isNaN($('#phone').val())||$('#phone').val().indexOf(" ")!=-1) {
		
		$('#error_phone').html("Phone number must contain 10 digits");
		$('#error_phone').css("display","inline-block");
		$('#phone').focus() ;
		flag = true;;
		error_count = error_count + 1;
		before_pass = before_pass + 1;
	}

		if($('#book').val() == "" ) {

		$('#error_book_name').html("Please provide the name of the book");
		$('#error_book_name').css("display","inline-block");
		$('#book').focus() ;
		flag = true;;
		error_count = error_count + 1;
 	}

		if( $('#author').val() == "" ) {

		$('#error_author').html("Please mention the author of the book");
		$('#error_author').css("display","inline-block");
		$('#author').focus() ;
		flag = true;;
		error_count = error_count + 1;
	}

	var sell_or_rent = $('#sell-rent option:selected').val();

	if( sell_or_rent == 1 ) {
		if( $('#s-cost').val() == "" ) {
			
			$('#error_sale_price').html("Please provide the sale price");
			$('#error_sale_price').css("display","inline-block");
			$('#s-cost').focus();
			flag = true;;
			error_count = error_count + 1;
		}
	}

	if( sell_or_rent == 2 ) {	
		if( $('#r-cost').val() == "" ) {
			
			$('#error_rent_price').html("Please provide rent price");
			$('#error_rent_price').css("display","inline-block");
			$('#r-cost').focus();
			flag = true;;
			error_count = error_count + 1;
		}
	}

	if( sell_or_rent == 3 ) {
		if( $('#s-cost').val() == "" ) {
		
			$('#error_sale_price').html("Please provide the sale price");
			$('#error_sale_price').css("display","inline-block");
			$('#s-cost').focus();
			flag = true;;
			error_count = error_count + 1;
		}

		if( $('#r-cost').val() == "" ) {
		
			$('#error_rent_price').html("Please provide the rent price");
			$('#error_rent_price').css("display","inline-block");
			$('#r-cost').focus();
			flag = true;;
			error_count = error_count + 1;
		}
	}

	if(flag) {
		
		event.preventDefault();
		var count_change = error_count - prev_error_count;

		// var del_new_height = parseInt(del_height) + 35*count_change + 'px';
		var del_new_height = del_height + 35*count_change + 'px';

		$('#del-main-container').css({
			"height" : del_new_height
		});
		
		// var edit_new_height = parseInt(edit_form_height) + 35*count_change + 'px';
		var edit_new_height = edit_form_height + 35*count_change + 'px';

		$('#edit-form').css({
			"height" : edit_new_height
		});

		prev_error_count = error_count;	
	}
});
}

function confirm_delete() {

 	$('#delete-btn').on('click', function () {
 		var user_choice = confirm("Are you sure you want to Delete this Book");

 		if (user_choice == true) {
 			console.log("Book Deleted")
 			delete_request();
 		}
 	});

    $("#eform").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: 'POST',
            data: $(this).serialize(),
            success: function(result_editbook) {
            	var response = JSON.parse(result_editbook);
            	console.log(response.status);
            	if(response.status == "success") {
            		console.log("Edit successful");
            		// $('#edit-form').css('display','none');
            		$('#edit-form').hide();
            		$('#del-main-container').height(300);
            		// $('#edit-success').css('display','block');
            		$('#edit-success').show();
            	}
            }
        });
    });
}

function delete_request() {

	var user_id = $('#bookid').val();
	var user_password = $('#password').val();

	$.ajax({
		type: "POST",
		url: "sqldata.php",
		data: {
			'user_id':user_id, 
			'user_password':user_password , 
			'source':'delete' 
		},
		success: function(result) {
			if(result) {
				var response = JSON.parse(result);
				console.log(response.status);
				if(response.status == "success") {
					console.log('Hogaya Delete');

					// $('#edit-form').css('display','none');
					$('#edit-form').hide();
					$('#edit-success').html('You have successfully deleted your book!');
					// $('#edit-success').css('display','block');
					$('#edit-success').show();
				}
			}
			else {
				console.log("Problem with Ajax delete request")
			}
		}
	});
}
