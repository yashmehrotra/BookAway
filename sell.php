<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | BooksforBucks.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
	<noscript><meta http-equiv="refresh" content="0; url=sell-nojs.php" /></noscript>
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script>
	$(function(){
			$('#sell').attr('id','focus');
		});
	</script>
	<script type="text/javascript">
	
	$copy = 0; 
	
	$(document).ready(function () {
		
		$('#myform').submit(function(fr){
			var $height = $('#sell-container').css('height');
			var $bheight = $('#new-button').css('bottom');
			var $flag = false;
			var $count = 0;
			var $f1 = false;
			var $f2 = false;
			var $f3 = false;
			var $fcount = 0;

			$('.pure-g').find('div').css("display","none");
	
			if( $('#name').val() == "" || $('#name').val().length < 2) {
				
				$('#error').html("Please provide your name");
				$('#name').focus() ;
				$('#error').css("display","inline-block");
				$flag = true;;
				var $count = $count + 1;
				$f1 = true;;
				var $fcount = $fcount + 1;
			}
			
			var emval = $('#email').val(); 
			var emat = emval.indexOf("@");
			var emdot = emval.lastIndexOf(".");

			if( emval == "" || emat < -1 || emdot - emat < 2 ||  emval.length - emdot <= 2 ) {
				
				$('#error4').html("Please provide a valid email address");
				$('#email').focus() ;
				$('#error4').css("display","inline-block");
				$flag = true;;
				var $count = $count + 1;
				$f2 = true;;
				var $fcount = $fcount + 1;
			}

			if( $('#phone').val() == ""  || $('#phone').val().length != 10 || isNaN($('#phone').val())||$('#phone').val().indexOf(" ")!=-1) {
				
				$('#error1').html("Phone number must contain 10 digits");
				$('#error1').css("display","inline-block");
				$('#phone').focus() ;
				$flag = true;;
				var $count = $count + 1;
				$f3 = true;;
				var $fcount = $fcount + 1;
			}
			if( $('#password').val() == "" || $('#password').val().length < 4 ) {
				
				$('#error3').html("Password must contain at least 4 characters");
				$('#error3').css("display","inline-block");
				$('#password').focus() ;
				$flag = true;;
				var $count = $count + 1;
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

			fr.preventDefault();

			if($flag) {
		
				var $c = $count - $copy;
				var $newheight = parseInt($height) + 40*$c ;
				var $change = $newheight + 'px' ;

				$('#sell-container').css({
					"height" : $change
				});

				var $bnewheight = parseInt($bheight) - 40*$c ;
				var $bchange = $bnewheight + 'px' ;

				$('#new-button').css({
					"bottom" : $bchange
				});
		
				$copy = $count;

				if($fcount == 0) {
				
					$('#help-popup').css("top","176px") ;
					$('#show-password').css("top","240px") ;
					$('#help').css("top","240px") ;
				}

				if($fcount == 1) {
					
					$('#help-popup').css("top","219px") ;
					$('#show-password').css("top","283px") ;
					$('#help').css("top","283px") ;
				}

				if($fcount == 2) {
					
					$('#help-popup').css("top","262px") ;
					$('#show-password').css("top","325px") ;
					$('#help').css("top","325px") ;
				}

				if($fcount == 3) {

					$('#help-popup').css("top","308px") ;
					$('#show-password').css("top","368px") ;
					$('#help').css("top","368px") ;
				}	
			}
			else {

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
	});

	$( document ).ready( function () {

		click_password = 0;
		$("#myform>.pure-g>#show-password").click(function () {
			if(click_password === 0) {
				var password = $("#password").val()
				$("#password").attr("type","text");
				$("#password").text(password);
				click_password = 1;
			}
			else {
				$("#password").attr("type","password");
				click_password = 0;
			}
		});
	});	 



	$(function () {
		$('#help').on(' mouseenter mouseleave', function () {
			$('#help-popup').fadeToggle('300');
		});
	});
	
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
			<h3 id="step-1-text">Fill the form with correct details:</h3>
		</div>
	<div id="sell-form">
		<p id="compulsary-text"><strong><u>Note</u>:</strong> Fields Marked with * are compulsary.</p>
		<form name="myform" class="pure-form pure-form-stacked" id="myform" novalidate>
			<div class="pure-g">
				<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required> <p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error"></div>
				<br>
				<input type="email" name="email" id="email" class="sell-input" autocomplete="on" placeholder="Email"> <p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error4"></div> 
				<br>
				<input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error1"></div>   
				<br>
				<input type="password" name="password" class="sell-input" placeholder="Password(at least 4 characters)" id="password" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p> <span class="ion-eye" title="Show Password" id="show-password"></span><img src="Styles/Images/help.jpg" id="help"> <span id="help-popup">Password is required to later edit the response or to delete the book when it is sold!</span> <div id="error3"></div>
				<br>
				<input id="select-subject" class="sell-input" placeholder="Select Subject" disabled>
				<select name="subject" id="subject" class="sell-input" required>
					<option value="All">All</option>
					<option value="Computers">Computers</option>
					<option value="Electronics">Electronics</option>
					<option value="Maths">Maths</option>
					<option value="Novels">Novels(Fiction + Non-Fiction)</option>
					<option value="Magazines">Magazines</option>
					<option value="Biographies">Biographies</option>
					<option value="Physics">Physics</option>
					<option value="Health">Health</option>
					<option value="Travel">Travel</option>
					<option value="Medical">Medical</option>
					<option value="Law">Law</option>
					<option value="Music">Music</option>
					<option value="Business">Business</option>
					<option value="Religion">Religion & Spiritual</option>
					<option value="Miscellaneous">Miscellaneous</option>
				<div id="error9"></div>
				<br>
				<input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Books Title" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error5"></div>    
				<br>
				<input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error6"></div>  
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
				<br><br>
				<div hidden>
					<input type="text" id="source" name="source" value="add_book">
				</div>
			</div>
		<button class="button-success pure-button" id = "new-button">Submit</button>
	</form>
</div>

<div id="entry">
	<div id="step-2">
			<h3 id="step-2-text"><u>Step 2:</u> Verification Process...</h3>
		</div>
		<div id="s2">
			<p id="successful-text">Form Successfully Submitted.<br>
			Your book id is <span id="book_id_span"></span> .<br> Please remember to check it's status.<br>
			Your response will be processed and implemented within 24 hours.</p>
		</div>
		<div class="links-list">
			<div class="links-box"><a href="index.php" class="links">Return 
			to homepage</a></div>
			<div class="links-box"><a href="sell.php" class="links">Sell another Book</a></div>
		</div>
</div>

<?php
	require_once('footer.php');
?>
</div>
</body>
</html>
