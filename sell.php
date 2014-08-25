<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | Bookaway.in</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/ribbons.css">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
	<link rel="stylesheet" href="Styles/jquery-ui.css">
	<noscript><meta http-equiv="refresh" content="0; url=sell-nojs.php"></noscript>
	<script src="Scripts/jquery.js"></script>
	<script src="Scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script type="text/javascript">

	var prev_error_count = 0; 
	college_list         = [];
	$(function () {

		$('#sell').attr('id','focus');

		sell_validate_form();
		show_password();
		help_popup();
		hide_price();
	});

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
					$('#sell-clg').autocomplete({
						source: college_list
					});
				}
			}
	});

	


	function sell_validate_form(){

		$('#myform').submit(function(event){
			var sell_height = $('#sell-container').css('height');
			var submit_bottom = $('#new-button').css('bottom');
			var flag = false;
			var error_count = 0;
			var name_error = false;
			var email_error = false;
			var phone_error = false;
			var before_pass = 0;

			$('.pure-g').find('div').css("display","none");
	
			if( $('#name').val() == "" || $('#name').val().length < 2) {
				
				$('#error_name').html("Please provide your name");
				$('#name').focus() ;
				$('#error_name').css("display","inline-block");
				flag = true;;
				error_count = error_count + 1;
				name_error = true;;
				before_pass = before_pass + 1;
			}
			
			var emval = $('#email').val(); 
			var emat = emval.indexOf("@");
			var emdot = emval.lastIndexOf(".");

			if( emval == "" || emat < -1 || emdot - emat < 2 ||  emval.length - emdot <= 2 ) {
				
				$('#error_email').html("Please provide a valid email address");
				$('#email').focus() ;
				$('#error_email').css("display","inline-block");
				flag = true;;
				error_count = error_count + 1;
				email_error = true;;
				before_pass = before_pass + 1;
			}

			if( $('#phone').val() == ""  || $('#phone').val().length != 10 || isNaN($('#phone').val())||$('#phone').val().indexOf(" ")!=-1) {
				
				$('#error_phone').html("Phone number must contain 10 digits");
				$('#error_phone').css("display","inline-block");
				$('#phone').focus() ;
				flag = true;;
				error_count = error_count + 1;
				phone_error = true;;
				before_pass = before_pass + 1;
			}
			if( $('#password').val() == "" || $('#password').val().length < 4 ) {
				
				$('#error_pass').html("Password must contain at least 4 characters");
				$('#error_pass').css("display","inline-block");
				$('#password').focus() ;
				flag = true;;
				error_count = error_count + 1;
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

 			if( $('#cover-url').val() != "" && !/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/.test($('#cover-url').val())) {
				$('#error_url').html("Please provide a valid link");
				$('#error_url').css("display","inline-block");
				$('#cover-url').focus() ;
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

			event.preventDefault();

			if(flag) {
		
				var count_change = error_count - prev_error_count;
				var sell_new_height = parseInt(sell_height) + 40*count_change + 'px';

				$('#sell-container').css({
					"height" : sell_new_height
				});

				var submit_new_bottom = parseInt(submit_bottom) - 40*count_change + 'px';

				$('#new-button').css({
					"bottom" : submit_new_bottom
				});
		
				prev_error_count = error_count;

				if(before_pass == 0) {
				
					$('#help-popup').css("top","176px") ;
					$('#show-password').css("top","240px") ;
					$('#help').css("top","240px") ;
				}

				if(before_pass == 1) {
					
					$('#help-popup').css("top","219px") ;
					$('#show-password').css("top","283px") ;
					$('#help').css("top","283px") ;
				}

				if(before_pass == 2) {
					
					$('#help-popup').css("top","255px") ;
					$('#show-password').css("top","320px") ;
					$('#help').css("top","320px") ;
				}

				if(before_pass == 3) {

					$('#help-popup').css("top","303px") ;
					$('#show-password').css("top","363px") ;
					$('#help').css("top","363px") ;
				}	
			} else {

	        $.ajax({
	            url: "sqldata.php",
	            type: 'POST',
	            data: $(this).serialize(),
	            success: function(result_addbook) {
	            	var response = JSON.parse(result_addbook);
	            	console.log(response.status);
	            	if(response.status == "success") {
	            		console.log("Book addition successful");
	            		$('#sell-form').css('display','none');
	            		$('#step-1').css('display','none');
	            		$('#entry').css('display','block');
	            		$('#sell-container').css({
	            			'height':'450px',
	            			'width':'800px'
	            		});
	            		$('#book_id_span').html(response.book_id);
	            	}
	            }
	        });
			}
		});
	}

	function show_password() {

		var click_password = 0;
		$("#show-password").click(function () {
			if(click_password === 0) {
				var password = $("#password").val()
				$("#password").attr("type","text");
				$("#password").text(password);
				click_password = 1;
			} else {
				$("#password").attr("type","password");
				click_password = 0;
			}
		});
	}	 

	function help_popup() {
		$('#help').on('mouseenter mouseleave', function () {
			$('#help-popup').fadeToggle('300');
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

	</script>
</head>
<body>
	<?php
	require_once('topbar.php');
	?>
	<div class="main-heads" id="sell-main-head">
		<h2 id="sell-books-text">Sell Books</h2>
	</div>
	<div id="sell-container">
		<div id="step-1">
			<h3 id="step-1-text">To add your book for sale/rent, Fill the form below with correct details:</h3>
		</div>
	<div id="sell-form">
		<p id="compulsary-text"><strong><u>Note</u>:</strong> Fields Marked with * are compulsary.</p>
		<form name="myform" class="pure-form pure-form-stacked" id="myform" novalidate>
			<div class="pure-g">
				<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on"> <p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error_name"></div>
				<br>
				<input type="email" name="email" id="email" class="sell-input" autocomplete="on" placeholder="Email"> <p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error_email"></div> 
				<br>
				<input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number"><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error_phone"></div>   
				<br>
				<input type="password" name="password" class="sell-input" placeholder="Password(at least 4 characters)" id="password"><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p> <span class="ion-eye" title="Show Password" id="show-password"></span><img src="Styles/Images/help.jpg" id="help"> <span id="help-popup">Password is to later edit the response or to delete the book when it is sold!</span> <div id="error_pass"></div>
				<br>
				<input type="text" name="clg" id="sell-clg" class="sell-input" autocomplete="on" placeholder="Name of College/Institute"><br>
				<input id="select-subject" class="sell-input" placeholder="Select Category" disabled>
				<select name="subject" id="subject" class="sell-input">
				<?php
					require_once ('categories.php');
				?>
				<br>
				<input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Books Title"><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error_book_name"></div>    
				<br>
				<input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author"><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error_author"></div>  
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
					<option value="semester">per Semester</option>
				</select>
				<div id="error_rent_price"></div> 
				<br><br>
				<div hidden>
					<input type="text" id="source" name="source" value="add_book">
				</div>
			</div>
			<button class="button-success pure-button" id = "new-button">Submit</button>
		</form>
	</div>
	<div id="entry">
		<div id="s2">
			<p id="successful-text">Form Successfully Submitted.<br>
			Your book id is <span id="book_id_span" style="color: red;"></span> .<br>
			Your response will be processed and implemented within a few hours.</p>
		</div>
		<div class="links-list">
			<div class="links-box"><a href="index.php" class="links">Return 
			to homepage</a></div>
			<div class="links-box"><a href="sell.php" class="links">Sell another Book</a></div>
		</div>
	</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>
