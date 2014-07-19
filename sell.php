<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | BooksforBucks.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
	<noscript><meta http-equiv="refresh" content="0; url=sell-nojs.php" /></noscript>
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript">
	$copy = 0; 
	$bcopy = 0;
	$(document).ready(function () {
		$('#myform').submit(function(fr){
			fr.preventDefault();
		var $height = $('#sell-container').css('height');
		var $bheight = $('#new-button').css('bottom');
		var $flag = false;
		var $count = 0;
		var $f1 = false;
		var $f2 = false;

		$('#error').css("display","none");
		$('#error1').css("display","none");
		$('#error2').css("display","none");
		$('#error3').css("display","none");
		$('#error4').css("display","none");
		$('#error5').css("display","none");
		$('#error6').css("display","none");
		$('#error7').css("display","none");
		$('#error8').css("display","none");
		$('#error9').css("display","none");

		if( $('#name').val() == "" || $('#name').val().length < 2)
		{
			$('#error').html("Please provide your name");
			$('#name').focus() ;
			$('#error').css("display","inline-block");
			$flag = true;;
			var $count = $count + 1;
			$f1 = true;;
		}
		if( $('#phone').val() == ""  || $('#phone').val().length != 10 || isNaN($('#phone').val())||$('#phone').val().indexOf(" ")!=-1)
		{
			$('#error1').html("Phone number must contain 10 digits");
			$('#error1').css("display","inline-block");
			$('#phone').focus() ;
			$flag = true;;
			var $count = $count + 1;
			$f2 = true;;
		}
		if( $('#password').val() == "" || $('#password').val().length < 4 )
		{
			$('#error3').html("Password must contain at least 4 characters");
			$('#error3').css("display","inline-block");
			$('#password').focus() ;
			$flag = true;;
			var $count = $count + 1;
		}

	strUser = $('#subject').val();
	if( strUser == "" )
	{
		$('#error9').html("Please select the subject");
		$('#error9').css("display","inline-block");
		$('#subject').focus() ;
		$flag = true;;
		var $count = $count + 1;
	}

 if($('#book').val() == "" )
 {
 	$('#error5').html("Please provide the name of the book");
 	$('#error5').css("display","inline-block");
 	$('#book').focus() ;
 	$flag = true;;
 	var $count = $count + 1;
 }
 if( $('#author').val() == "" )
 {
 	$('#error6').html("Please provide the name of the author");
 	$('#error6').css("display","inline-block");
 	$('#author').focus() ;
 	$flag = true;;
 	var $count = $count + 1;
 }
var $b = $('#sell-rent option:selected').val();

 if( $b == 1 )
 {
 	if( $('#s-cost').val() == "" )
 	{
 		$('#error7').html("Please provide the sale price");
 		$('#error7').css("display","inline-block");
 		$('#s-cost').focus();
 		$flag = true;;
 		var $count = $count + 1;
 	}
 }
 if( $b == 2 )
 {	
 	if( $('#r-cost').val() == "" )
 	{
 		$('#error8').html("Please provide rent price");
 		$('#error8').css("display","inline-block");
 		$('#r-cost').focus();
 		$flag = true;;
 		var $count = $count + 1;
 	}
}
if( $b == 3 )
{
	if( $('#s-cost').val() == "" )
	{
		$('#error7').html("Please provide the sale price");
		$('#error7').css("display","inline-block");
		$('#s-cost').focus();
		$flag = true;;
		var $count = $count + 1;
	}

	if( $('#r-cost').val() == "" )
	{
		$('#error8').html("Please provide the rent price");
		$('#error8').css("display","inline-block");
		$('#r-cost').focus();
		$flag = true;;
		var $count = $count + 1;
	}
}
	if($flag)	{
			var $c = $count - $copy;
			var $newheight = parseInt($height) + 35*$c ;
			var $change = $newheight + 'px' ;

		$('#sell-container').css({
			"height" : $change
		});

		var $c = $count - $bcopy;
			var $bnewheight = parseInt($bheight) - 35*$c ;
			var $bchange = $bnewheight + 'px' ;

		$('#new-button').css({
			"bottom" : $bchange
		});
		$copy = $count;
		$bcopy = $count;

		if($f1 || $f2)
		{
			$('#help-popup').css("top","208px") ;
		}

		if($f1 && $f2)
		{
			$('#help-popup').css("top","246px") ;
		}

		if(!$f1 && !$f2)
		{
			$('#help-popup').css("top","170px") ;
		}
			}
	});
		});

 $( document ).ready( function () {

        var click_password = 0;
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
</script>

<script>
		$(function () {
		$('#help').on(' mouseenter mouseleave', function () {
			$('#help-popup').fadeToggle('300');
		});
	});
</script>
<script>
  $(function () {
  	setInterval(function() {
  	var $a =  $('#sell-rent option:selected').val();
if( $a == 1 )
		{
			$('#r-cost').slideUp(300);
			$('#rent-price').slideUp(300);
			$('#s-cost').slideDown(300);
			$flag = true;
		}
if( $a == 2 )
	{
		$('#s-cost').slideUp(300);
		$('#r-cost').slideDown(300);
		$('#rent-price').slideDown(300);
		$flag = true;
	}
if( $a == 3 )
	{
		$('#s-cost').slideDown(300);
		$('#r-cost').slideDown(300);
		$('#rent-price').slideDown(300);
		$flag = true;
	}
			}, 100);
  });

  </script>

</head>
<body>
	<div id="sell-main-head">
		<h2 id="sell-books-text">Sell Books</h2>
	</div>
	<div id="sell-container">
		<div id="step-1">
			<h3 id="step-1-text"><u>Step 1:</u> Fill out and submit the form below with your complete details</h3>
		</div>
	<div id="sell-form">
		<p id="compulsary-text"><strong><u>Note:</u></strong> (Fields Marked with * are compulsary)</p>
		<form name="myform" class="pure-form pure-form-stacked" id="myform" novalidate action="entry.php" method="POST">
			<div class="pure-g">
				<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required> <p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p> <div id="error"></div> 
				<br>

				<input type="email" name="email" id="email" class="sell-input" autocomplete="on" placeholder="Email">
				
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
				<option value="Literature">Literature</option>
				<option value="Physics">Physics</option>
				<option value="Medical">Medical</option>
				<option value="Law">Law</option>
				<option value="Music">Music</option>
				<option value="Business">Business</option>
				<option value="Miscellaneous">Miscellaneous</option>
				</select><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>
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
		
		<input type="number" min="0" name="sellprice" class="sell-input" id="s-cost" placeholder="Sale Cost(INR)"><div id="error7"></div> 
		<br>
		
		<input type="number" min="0" name="rentprice" class="sell-input" id="r-cost" autocomplete="on" placeholder="Rent Cost(INR)">
		<select name="rentpricetime" id="rent-price" class="sell-input">
			<option value="week">per Week</option>
			<option value="month">per Month</option>
		</select>
		<div id="error8"></div> 
		<br><br>
		<!-- <div><input type="submit" value="Submit" id="submit-button" title="Please fill in the required fields before submitting"></div> -->
		</div>
		<button class="button-success pure-button" id = "new-button">Submit</button>
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
	<code>Copyright2014 .All Rights Reserved. BooksforBucks.com</code>
	<span class="ionicon">&#xf133;</span>
</div>
</div>
</body>
</html>