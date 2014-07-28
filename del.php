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
				var $emval = $('#email').val();
	
				if( $emval == "" || $emval.indexOf("@") == -1 || $emval.indexOf(".") == -1 ) {
					$('#del-error1').html('Invalid email address!');
					$('#email').focus();
					$('#del-error1').css("display","inline-block");
					$check = true;
				};
				if( $('#bookid').val() == "" ) {
					$('#del-error2').html('Fill in this field!');
					$('#bookid').focus();
					$('#del-error2').css("display","inline-block");
					$check = true;
				};
				if( $('#password').val() == "" || $('#password').val().length < 4 ) {
					$('#del-error3').html('At least 4 characters long!');
					$('#password').focus();
					$('#del-error3').css("display","inline-block");
					$check = true;
				};
				if (!$check) {
					// If (matches from database)
					$('#del-main').css('display','none');
					$('#edit-form').css('display','block');
				};
			});
		});
		
		function edit_request() {

			var user_id = "";
			var user_email = "";
			var user_password = "";
			$.ajax({
				type: "POST",
				url: "sqldata.php",
				data: {'user_id':user_id, 'user_email':user_email, 'user_password':user_password , 'source':'edit' },
				success: function(result) {
					if(result) {
						var response = JSON.parse(result);
						console.log(response);
					}
					else {
						console.log("Problem with Ajax Edit Request");
					}
				}
			});
		}

		function delete_request() {

			var user_id = "";
			var user_password = "";

			$.ajax({
				type: "POST",
				url: "sqldata.php",
				data: {'user_id':user_id, 'user_email':user_email, 'user_password':user_password , 'source':'edit' },
				success: function(result) {
					if(result) {
						var response = JSON.parse(result);
						console.log(response);
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
		<div><input class="del-input" type="submit" value="Submit" id="submit"></div>
		</form>
	</div>
	<div id="edit-form">

		<form name="eform" class="pure-form pure-form-stacked" id="eform" method="POST" novalidate>
			<div class="pure-g">
				<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required disabled>
				<br>
				<input type="email" name="email" id="email" class="sell-input" autocomplete="on" placeholder="Email" required disabled>
				<br>
				<input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number" required>  
				<br>
				<input type="password" name="password" class="sell-input" placeholder="Password(at least 4 characters)" id="password" required disabled>
				<br>
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
			<br>
			<input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Books Title" required>   
			<br>
			<input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author" required>
			<br>
			<input type="text" name="book-for" id="book-for" class="sell-input" placeholder="The Book is For" disabled>
			<select name="sellrent" id="sell-rent" class="sell-input">
				<option value="3" selected>Both Sale and Rent</option>
				<option value="1">Sale</option>
				<option value="2">Rent</option>
			</select>
			<br>
			<input type="number" min="0" name="sellprice" class="sell-input" id="s-cost" placeholder="Sale Cost(INR)"><div id="error7"></div> 
			<br>
			<input type="number" min="0" name="rentprice" class="sell-input" id="r-cost" autocomplete="on" placeholder="Rent Cost(INR)">
			<select name="rentpricetime" id="rent-price" class="sell-input">
				<option value="week">per Week</option>
				<option value="month">per Month</option>
			</select> 
			<br><br>
			</div>
		<button class="button-success pure-button" id = "del-new-button">Submit</button>
	</form>

	</div>
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