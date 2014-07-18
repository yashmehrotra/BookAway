<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | BooksforBucks.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<noscript><meta http-equiv="refresh" content="0; url=sell-nojs.php" /></noscript>
	<script type="text/javascript">
	
	function validate()		{
		document.getElementById('error').style.display="none";
		document.getElementById('error1').style.display="none";;
		document.getElementById('error2').style.display="none";;
		document.getElementById('error3').style.display="none";;
		document.getElementById('error5').style.display="none";;
		document.getElementById('error6').style.display="none";;
		document.getElementById('error7').style.display="none";;
		document.getElementById('error8').style.display="none";;
		document.getElementById('error9').style.display="none";;

		var flag = false;
		var count = 0;
		var f1 = false;
		var f2 = false; 

		if( document.myform.name.value == "" || document.myform.name.value.length < 2)
		{
			document.getElementById('error').innerHTML = "Please provide your name" ;
			document.myform.name.focus() ;
			document.getElementById('error').style.display="inline-block";
			flag = true;;
			var count = count + 1;
			f1 = true;;
		}
		if( document.myform.phone.value == ""  || document.myform.phone.value.length != 10 || isNaN(document.myform.phone.value)||document.myform.phone.value.indexOf(" ")!=-1)
		{
			document.getElementById('error1').innerHTML = "Phone number must contain 10 digits" ;
			document.getElementById('error1').style.display="inline-block";
			document.myform.phone.focus() ;
			flag = true;;
			var count = count + 1;
			f2 = true;;
		}
		if( document.myform.password.value == "" || document.myform.password.value.length < 4 )
		{
			document.getElementById('error3').innerHTML = "Password must contain at least 4 characters" ;
			document.getElementById('error3').style.display="inline-block";
			document.myform.password.focus() ;
			flag = true;;
			var count = count + 1;
		}
	var e = document.myform.subject;
	strUser = e.options[e.selectedIndex].value;
	if( strUser == "" )
	{
		document.getElementById('error9').innerHTML = "Please select the subject" ;
		document.getElementById('error9').style.display="inline-block";
		document.myform.subject.focus() ;
		flag = true;;
		var count = count + 1;
	}
 if(document.myform.book.value == "" )
 {
 	document.getElementById('error5').innerHTML = "Please provide the name of the book" ;
 	document.getElementById('error5').style.display="inline-block";
 	document.myform.book.focus() ;
 	flag = true;;
 	var count = count + 1;
 }
 if( document.myform.author.value == "" )
 {
 	document.getElementById('error6').innerHTML = "Please provide the name of the author" ;
 	document.getElementById('error6').style.display="inline-block";
 	document.myform.author.focus() ;
 	flag = true;;
 	var count = count + 1;
 }
 var e = document.myform.sellrent;
 strUser = e.options[e.selectedIndex].value;
 if( strUser == "" )
 {
 	document.getElementById('error2').innerHTML = "Please select one of the options" ;
 	document.getElementById('error2').style.display="inline-block";
 	document.myform.sellrent.focus();
 	flag = true;;
 	var count = count + 1;
 }
 if( strUser == 1 )
 {
 	if( document.myform.sellprice.value == "" )
 	{
 		document.getElementById('error7').innerHTML = "Please provide the sale price" ;
 		document.getElementById('error7').style.display="inline-block";
 		document.myform.sellprice.focus();
 		flag = true;;
 		var count = count + 1;
 	}
 }
 if( strUser == 2 )
 {	
 	if( document.myform.rentprice.value == "" )
 	{
 		document.getElementById('error8').innerHTML = "Please provide rent price" ;
 		document.getElementById('error8').style.display="inline-block";
 		document.myform.rentprice.focus();
 		flag = true;;
 		var count = count + 1;
 	}
	}
	if( strUser == 3 )
	{
		if( document.myform.sellprice.value == "" )
		{
			document.getElementById('error7').innerHTML = "Please provide the sale price" ;
			document.getElementById('error7').style.display="inline-block";
			document.myform.sellprice.focus();
			flag = true;;
			var count = count + 1;
		}

		if( document.myform.rentprice.value == "" )
		{
			document.getElementById('error8').innerHTML = "Please provide the rent price" ;
			document.getElementById('error8').style.display="inline-block";
			document.myform.rentprice.focus();
			flag = true;;
			var count = count + 1;
		}
	}
	if(flag)	{
		if( count ==1 )
		{
			document.getElementById('sell-container').style.height="840px";
			document.getElementById('new-button').style.bottom="10px";
			
		}
		if( count ==2 )
		{
			document.getElementById('sell-container').style.height="880px";
			document.getElementById('new-button').style.bottom="-45px";
		}
			
		if( count ==3 )
		{
			document.getElementById('sell-container').style.height="915px";
			document.getElementById('new-button').style.bottom="-80px";
			
		}
		if( count ==4 )
		{
			document.getElementById('sell-container').style.height="950px";
			document.getElementById('new-button').style.bottom="-115px";
			
		}
		if( count ==5 )
		{
			document.getElementById('sell-container').style.height="985px";
			document.getElementById('new-button').style.bottom="-150px";
			
		}
		if( count ==6 )
		{
			document.getElementById('sell-container').style.height="1020px";
			document.getElementById('new-button').style.bottom="-185px";
			
		}
		if( count ==7 )
		{
			document.getElementById('sell-container').style.height="1055px";
			document.getElementById('new-button').style.bottom="-220px";
			
		}
		if( count ==8 )
		{
			document.getElementById('sell-container').style.height="1090px";
			document.getElementById('new-button').style.bottom="-255px";
		}
		if( count ==9 )
		{
			document.getElementById('sell-container').style.height="1125px";
			document.getElementById('new-button').style.bottom="-290px";
			
		}

		if(f1 || f2)
		{
			document.getElementById('help-popup').style.top="208px" ;
		}

		if(f1 && f2)
		{
			document.getElementById('help-popup').style.top="246px" ;
		}

		if(!f1 && !f2)
		{
			document.getElementById('help-popup').style.top="170px" ;
		}
		return false;
	}
	else 	{
		return( true );
	}
}
</script>

<script src="Scripts/jquery.js"></script>
<script>

	$(function () {
		$('#help').next("span").hide();
		$("#help").hover(function () {
		$(this).next("span").fadeIn(300);
	}, function() {
		$(this).next("span").fadeOut(300);
		})
	});
</script>
<script>
  $(function () {
  	setInterval(function() {
  	var a =  $('#sell-rent option:selected').val();
if( a == 1 )
		{
			$('#r-cost').slideUp(300);
			$('#rent-price').slideUp(300);
			$('#s-cost').slideDown(300);
			flag = true;
		}
if(a == 2 )
	{
		$('#s-cost').slideUp(300);
		$('#r-cost').slideDown(300);
		$('#rent-price').slideDown(300);
		flag = true;
	}
if(a == 3 )
	{
		$('#s-cost').slideDown(300);
		$('#r-cost').slideDown(300);
		$('#rent-price').slideDown(300);
		flag = true;
	}
			}, 100);
  });

  /*$(function () {
  $("#password").each(function (index, '#password') {
    var $input = $('#password');
    $("#show-password").click(function () {
      var change = "";
      if ($(this).html() == "Show Password") {
        $(this).html("Hide Password")
        change = "text";
      } else {
        $(this).html("Show Password");
        change = "password";
      }
      var rep = $("<input type='" + change + "' />")
        .attr("id", $input.attr("id"))
        .attr("name", $input.attr("name"))
        .attr('class', $input.attr('class'))
        .val($input.val())
        .insertBefore($input);
      $input.remove();
      $input = rep;
    }).insertAfter($input);
  });
});
*/
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
		<form name="myform" class="pure-form pure-form-stacked" id="myform" novalidate action="entry.php" method="POST" onsubmit= "return validate();">
			<div class="pure-g">
				<input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required> <p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p> <div id="error"></div> 
				<br>

				<input type="email" name="email" id="email" class="sell-input" autocomplete="on" placeholder="Email">
				
				<br>
				
				<input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error1"></div>   
				
				<br>
				
				<input type="password" name="password" class="sell-input" placeholder="Password(at least 4 characters)" id="password" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p> <!--<button id="show-password">Show Password</button>--> <img src="Styles/Images/help.jpg" id="help"> <span id="help-popup">Password is required to later edit the response or to delete the book when it is sold!</span> <div id="error3"></div>
				
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
			
			<input type="text" name="book" class="sell-input" autocomplete="on" placeholder="Books Title" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error5"></div>    
			<br>
			
			<input type="text" name="author" class="sell-input" autocomplete="on" placeholder="Author" required><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>  <div id="error6"></div>  
			<br>
			<input type="text" name="book-for" id="book-for" class="sell-input" placeholder="The Book is For" disabled>
			<select name="sellrent" id="sell-rent" class="sell-input" required>
			<option value="3" selected>Both Sale and Rent</option>
			<option value="1">Sale</option>
			<option value="2">Rent</option>
		</select><p style="color:red; margin:0px; padding:0px; width:10px; display:inline-block;">*</p>
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
</div>
</div>
</body>
</html>