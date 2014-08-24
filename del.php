<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Details | Booksaway</title>
	<link rel="stylesheet" type="text/css" href="Styles/ribbons.css">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script type="text/javascript">
		
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
				$("div[id^='del-error']").css("display","none");
				$('#del-main-container').css('height', '850px');

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
				}
			});
		}
		
		function edit_request() {

			var user_id = $('#bookid').val();
			var user_email = $('#email').val();
			var user_password = $('#password').val();
			console.log(user_email);
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
					if(result) {
						var response = JSON.parse(result);
						console.log(response);
						console.log(response['status']);
						if(response['status'] == 'success') {
							console.log('correct');
							
							$('#del-main').css('display','none');
							$('#edit-form').css('display','block');
							
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
							$('#del-error_incorrect').css('display','block');
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

		$('#del-new-button').click( function(event) {
			var del_height = $('#del-main-container').css('height');
			var edit_form_height = $('#edit-form').css('height');
			var flag = false;
			var error_count = 0;
			var before_pass = 0;
	
			$('div[id^="error"]').css("display","none");
			
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

				var del_new_height = parseInt(del_height) + 35*count_change + 'px';

				$('#del-main-container').css({
					"height" : del_new_height
				});
				
				var edit_new_height = parseInt(edit_form_height) + 35*count_change + 'px';
	
				$('#edit-form').css({
					"height" : edit_new_height
				});

				prev_error_count = error_count;	
			}
		});
	}

		function confirm_delete() {

		 	$('#delete-button').on('click', function () {
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
                    		$('#edit-form').css('display','none');
                    		$('#edit-success').css('display','block');
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

							$('#edit-form').css('display','none');
							$('#edit-success').html('You have successfully deleted your book!');
							$('#edit-success').css('display','block');
						}
					}
					else {
						console.log("Problem with Ajax delete request")
					}
				}
			});
		}

	</script>
</head>
<body>
	<?php
	require_once('topbar.php');
	?>
	<div class="main-heads">
		<h2>Edit</h2>
	</div>
	<div id="del-main-container">
		<div id="del-main">
			<div id="del-desc">
				To edit the details of your book or to remove the book you added,
				<br><br>
				Enter the following details:
			</div>
			<form id="del-form" class="pure-form pure-form-stacked" novalidate>
				<div class="sub"><input type="text" class="del-input" id="email" placeholder="Email Address" required></div><div id="del-error_email"></div>
				<div class="sub"><input type="text" class="del-input" id="bookid" placeholder="Book ID" required></div><div id="del-error_bookid"></div>
				<div class="sub"><input type="password" class="del-input" id="password" placeholder="Password" required></div><div id="del-error_pass"></div>
				<div id="del-error_incorrect"></div>
				<div><input class="del-input" type="submit" value="Submit" id="submit"></div>
			</form>
		</div>
		<div id="edit-form">
			<button id="delete-button">Delete this book</button>
			<div id="edit-head">
					<div id="or"><h3 id="or-text">OR</h3></div>
					<p id="edit-desc"> Edit the details you want and click on "Edit" button when finished.</p>
			</div>
			<form name="eform" class="pure-form pure-form-stacked" id="eform" method="POST" action="sqldata.php" novalidate>
				<div class="del-pure-g" id="del-pure-g-del">
					<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required disabled>
					<br>
					<input type="email" name="email" id="email-form" class="sell-input" autocomplete="on" placeholder="Email" required disabled>
					<br>
					<input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number" required>  <div id="error_phone"></div> 
					<br>
					<input id="select-subject" class="sell-input" placeholder="Select Subject" disabled>
					<select name="subject" id="subject" class="sell-input" required>
						<?php
						require_once('categories.php');
						?>
					</select>
					<div id="error9"></div>
					<br>
					<input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Books Title" required>  <div id="error_book_name"></div>
					<br>
					<input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author" required> <div id="error_author"></div>
					<br>
					<textarea name="book-desc" id="book-desc" class="sell-input" autocomplete="on" maxlength="250" placeholder="Description(max 250 characters)"></textarea>
					<br>
					<input type="url" name="cover-url" class="sell-input" placeholder="Image URL of Book (Example-'http://..../book_cover.png')" id="cover-url"><div id="error_url"></div>
					<br>
					<input type="text" name="book-for" id="book-for" class="sell-input" placeholder="The Book is For" disabled>
					<select name="sellrent" id="sell-rent" class="sell-input">
						<option value="3" selected>Both Sale and Rent</option>
						<option value="1">Sale</option>
						<option value="2">Rent</option>
					</select>
					<br>
					<input type="number" min="0" name="sellprice" class="sell-input" id="s-cost" placeholder="Sale Cost(INR)"> <div id="error_sale_price"></div> 
					<br>
					<input type="number" min="0" name="rentprice" class="sell-input" id="r-cost" autocomplete="on" placeholder="Rent Cost(INR)">
					<select name="rentpricetime" id="rent-price" class="sell-input">
						<option value="week">per Week</option>
						<option value="month">per Month</option>
					</select>
					<div id="error_rent_price"></div>
					<div hidden>
						<input type="text" id="source" name="source" value="edit_book">
						<input type="text" id="book_id_hid" name="book_id_hid">
					</div> 
					<br><br>
				</div>
				<button class="button-success pure-button" id = "del-new-button">Edit</button>
			</form>
		</div>
		<div id="edit-success">Congratulations!!<br>You have successfully edited your response.</div>
	</div>
	<?php
			require_once('footer.php');
	?>
</body>
</html>