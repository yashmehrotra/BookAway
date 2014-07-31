<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BooksforBucks | Delete the Book Added</title>
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#del-form').submit(function (e) {
				e.preventDefault();				
				$("div[id^='del-error']").css("display","none");

				var $check = false;
				$emval = $('#email').val();
				$bookval = $('#bookid').val();
				$passval = $('#password').val();
	
				if( $emval == "" || $emval.indexOf("@") == -1 || $emval.indexOf(".") == -1 ) {
					$('#del-error1').html('Invalid email address!');
					$('#email').focus();
					$('#del-error1').css("display","inline-block");
					$check = true;
				};
				if( $bookval == "" ) {
					$('#del-error2').html('Fill in this field!');
					$('#bookid').focus();
					$('#del-error2').css("display","inline-block");
					$check = true;
				};
				if( !$.isNumeric($bookval) ) {
					$('#del-error2').html('Only numbers are allowed!');
					$('#bookid').focus();
					$('#del-error2').css("display","inline-block");
					$check = true;
				};
				if( $passval == "" || $passval.length < 4 ) {
					$('#del-error3').html('At least 4 characters long!');
					$('#password').focus();
					$('#del-error3').css("display","inline-block");
					$check = true;
				};
				if (!$check) {
					console.log('Submit');
					edit_request();
					var book_id = $('#bookid').val();
					$('#book_id_hid').val(book_id);
				};
			});
		});
		
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
							$('#subject').val(response['subject']);
							$('#book').val(response['book_name']);
							$('#author').val(response['author']);
							$('#sell-rent').val(response['sell_rent']);
							$('#s-cost').val(response['sell_price']);
							$('#r-cost').val(response['rent_price']);
							$('#rent-price').attr('value',response['rent_time']);

						}
						else {
							console.log('wrong');
							$('#del-error4').html('The email, password or Book ID you entered are incorrect!')
							$('#del-error4').css('display','block');
						}
					}
					else {
						console.log("Problem with Ajax Edit Request");
					}
				}
			});
		}

		$(function () {
		setInterval(function() {
			var $a =  $('#sell-rent option:selected').val();
			if( $a == 1 ) {
				
				$('#r-cost').slideUp(300);
				$('#rent-price').slideUp(300);
				$('#s-cost').slideDown(300);
				$('#error8').slideUp(300);
				if( $('#error7').html() != "" ) {
				$('#error7').slideDown(300);
				}
				$flag = true;
			}

			if( $a == 2 ) {
				
				$('#s-cost').slideUp(300);
				$('#r-cost').slideDown(300);
				$('#rent-price').slideDown(300);
				$('#error7').slideUp(300);
				if( $('#error8').html() != "" ) {
				$('#error8').slideDown(300);
				}
				$flag = true;
			}
			
			if( $a == 3 ) {
				
				$('#s-cost').slideDown(300);
				$('#r-cost').slideDown(300);
				$('#rent-price').slideDown(300);
				if( $('#error7').html() != "" ) {
				$('#error7').slideDown(300);
				}
				if( $('#error8').html() != "" ) {
				$('#error8').slideDown(300);
				}
				$flag = true;
			}

		}, 100);
	});
		
		$copy = 0; 

	$(function() {
		$('#del-new-button').click( function(fr) {
			var $height = $('#del-main-container').css('height');
			var $eheight = $('#edit-form').css('height');
			var $flag = false;
			var $count = 0;
			var $fcount = 0;
			console.log('1');
			$('div[id^="error"]').css("display","none");
			console.log('2')
			if( $('#phone').val() == ""  || $('#phone').val().length != 10 || !$.isNumeric('#phone').val() || $('#phone').val().indexOf(" ")!=-1) {
				
				$('#error1').html("Phone number must contain 10 digits");
				$('#error1').css("display","inline-block");
				$('#phone').focus() ;
				$flag = true;;
				var $count = $count + 1;
				var $fcount = $fcount + 1;
			}

			strUser = $('#subject').val();
			
			if( strUser == "" ) {
				
				$('#error9').html("Please select the subject");
				$('#error9').css("display","inline-block");
				$('#subject').focus() ;
				$flag = true;;
				var $count = $count + 1;
			}

 			if($('#book').val() == "" ) {
 	
				$('#error5').html("Please provide the name of the book");
				$('#error5').css("display","inline-block");
				$('#book').focus() ;
				$flag = true;;
				var $count = $count + 1;
		 	}

 			if( $('#author').val() == "" ) {
 	
				$('#error6').html("Please provide the name of the author");
				$('#error6').css("display","inline-block");
				$('#author').focus() ;
				$flag = true;;
				var $count = $count + 1;
			}

			var $b = $('#sell-rent option:selected').val();

			if( $b == 1 ) {
				if( $('#s-cost').val() == "" ) {
					
					$('#error7').html("Please provide the sale price");
					$('#error7').css("display","inline-block");
					$('#s-cost').focus();
					$flag = true;;
					var $count = $count + 1;
				}
			}

			if( $b == 2 ) {	
				if( $('#r-cost').val() == "" ) {
					
					$('#error8').html("Please provide rent price");
					$('#error8').css("display","inline-block");
					$('#r-cost').focus();
					$flag = true;;
					var $count = $count + 1;
				}
			}

			if( $b == 3 ) {
				if( $('#s-cost').val() == "" ) {
				
					$('#error7').html("Please provide the sale price");
					$('#error7').css("display","inline-block");
					$('#s-cost').focus();
					$flag = true;;
					var $count = $count + 1;
				}

				if( $('#r-cost').val() == "" ) {
				
					$('#error8').html("Please provide the rent price");
					$('#error8').css("display","inline-block");
					$('#r-cost').focus();
					$flag = true;;
					var $count = $count + 1;
				}
			}

			if($flag) {
				
				fr.preventDefault();
				var $c = $count - $copy;

				var $newheight = parseInt($height) + 35*$c ;
				var $change = $newheight + 'px' ;

				$('#del-main-container').css({
					"height" : $change
				});
				
				var $enewheight = parseInt($eheight) + 35*$c ;
				var $echange = $enewheight + 'px' ;
	
				$('#edit-form').css({
					"height" : $echange
				});

				$copy = $count;	
			}
		});
	});

		$(function() {

		 	$('#delete-button').on('click', function () {
		 		delete_request();
		 	});

            $("#eform").on("submit", function(e) {
                e.preventDefault();
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
        
        });

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
	<div id="wrapper">
	<div class="top-panel">
		<img src="Styles/Images/favicon1.png" id="favicon">
		<ul class="top-panel-list">
			<li class="top-opt"><div class="top-divs"><a href="index.php" class="top-panel-links">Home</a></div></li>
			<li class="top-opt"><a href="buy.php" class="top-panel-links">Buy</a></li>
			<li class="top-opt"><a href="sell.php" class="top-panel-links">Sell</a></li>
			<li class="top-opt"><a href="rent.php" class="top-panel-links">Rent</a></li>
			<li class="top-opt"><a href="del.php" class="top-panel-links" id="focus">Edit</a></li>
			<li class="top-opt"><a href="feedback.php" class="top-panel-links">Feedback</a></li>
		</ul>
	</div>
	</div>
	<div id="del-main-container">
		<h2 id="delete-text">Delete</h2>
	<div id="del-main">
		<div id="del-desc">
			To edit the details of your book or to remove the book you added,
			<br><br>
			Enter the following details:
		</div>
		<form id="del-form" class="pure-form pure-form-stacked" novalidate>
		<div class="sub"> <input type="text" class="del-input" id="email" placeholder="Email Address" required></div><div id="del-error1"></div>
		<div class="sub"> <input type="text" class="del-input" id="bookid" placeholder="Book ID" required></div><div id="del-error2"></div>
		<div class="sub"> <input type="password" class="del-input" id="password" placeholder="Password" required></div><div id="del-error3"></div>
		<div id="del-error4"></div>
		<div><input class="del-input" type="submit" value="Submit" id="submit"></div>
		</form>
	</div>
	<div id="edit-form">
		<button id="delete-button">Delete this book</button>
		<form name="eform" class="pure-form pure-form-stacked" id="eform" method="POST" action="sqldata.php" novalidate>
			<div class="del-pure-g" id="del-pure-g-del">
				<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required disabled>
				<br>
				<input type="email" name="email" id="email-form" class="sell-input" autocomplete="on" placeholder="Email" required disabled>
				<br>
				<input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number" required>  <div id="error1"></div> 
				<br>
				<!-- <input type="password" name="password" class="sell-input" placeholder="Password(at least 4 characters)" id="password" required disabled>
				<br> -->
				<input id="select-subject" class="sell-input" placeholder="Select Subject" disabled>
				<select name="subject" id="subject" class="sell-input" required>
					<option value="All">All</option>
					<option value="Computers">Computers</option>
					<option value="Electronics">Electronics</option>
					<option value="Maths">Maths</option>
					<option value="Literature">Literature</option>
					<option value="Physics">Physics</option>
					<option value="Medical">Medical</option>
					<option value="Law">Law</option>
					<option value="Music">Music</option>
					<option value="Business">Business</option>
					<option value="Miscellaneous">Miscellaneous</option>
			<div id="error9"></div>
			<br>
			<input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Books Title" required>  <div id="error5"></div>
			<br>
			<input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author" required> <div id="error6"></div>
			<br>
			<input type="text" name="book-for" id="book-for" class="sell-input" placeholder="The Book is For" disabled>
			<select name="sellrent" id="sell-rent" class="sell-input">
				<option value="3" selected>Both Sale and Rent</option>
				<option value="1">Sale</option>
				<option value="2">Rent</option>
			</select>
			<div id="error2"></div>
			<br>
			<input type="number" min="0" name="sellprice" class="sell-input" id="s-cost" placeholder="Sale Cost(INR)"> <div id="error7"></div> 
			<br>
			<input type="number" min="0" name="rentprice" class="sell-input" id="r-cost" autocomplete="on" placeholder="Rent Cost(INR)">
			<select name="rentpricetime" id="rent-price" class="sell-input">
				<option value="week">per Week</option>
				<option value="month">per Month</option>
			</select>
			<div id="error8"></div>
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
	<div class="bottom-panel">
		<ul class="bottom-panel-list">
			<li class="home-about-contact"><a href="index.php" class="bottom-links">Home</a></li>
			<li class="home-about-contact"><a href="about.php" class="bottom-links">About</a></li>
			<li class="home-about-contact"><a href="contact.php" class="bottom-links">Contact</a></li>
		</ul>
	</div>
		<div id="co-developed">
			<code>Copyright</code><code>2014 .All Rights Reserved. Booksforbucks.com</code>
		</div>
	</div>
</body>
</html>