<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | BooksforBucks.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<noscript><meta http-equiv="refresh" content="0; url=sell-nojs.php" /></noscript>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script type="text/javascript">
	setInterval ( "hide()", 100 );

	function validate()		{
		var node = document.getElementById('error');
		var node1 = document.getElementById('error1');
		var node2 = document.getElementById('error2');
		var node3 = document.getElementById('error3');
		var node4 = document.getElementById('error4');
		var node5 = document.getElementById('error5');
		var node6 = document.getElementById('error6');
		var node7 = document.getElementById('error7');
		var node8 = document.getElementById('error8');

		while (node.hasChildNodes()) {
			node.removeChild(node.firstChild);
		}
		while (node1.hasChildNodes()) {
			node1.removeChild(node1.firstChild);
		}
		while (node2.hasChildNodes()) {
			node2.removeChild(node2.firstChild);
		}
		while (node3.hasChildNodes()) {
			node3.removeChild(node3.firstChild);
		}
		while (node4.hasChildNodes()) {
			node4.removeChild(node4.firstChild);
		}
		while (node5.hasChildNodes()) {
			node5.removeChild(node5.firstChild);
		}
		while (node6.hasChildNodes()) {
			node6.removeChild(node6.firstChild);
		}
		while (node7.hasChildNodes()) {
			node7.removeChild(node7.firstChild);
		}
		while (node8.hasChildNodes()) {
			node8.removeChild(node8.firstChild);
		}

		var flag = false;

		if( document.myform.name.value == "" || document.myform.name.value.length < 2)
		{
			document.getElementById('error').innerHTML = "Please provide your name" ;
			document.myform.name.focus() ;
			document.getElementById('error').style.display="inline-block";
			flag = true;;
		}
		var x= document.myform.email.value;
		atpos = x.indexOf("@");
		dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length || x.indexOf("@") == -1) {
			document.getElementById('error1').innerHTML = "Please provide a valid email address" ;
			document.getElementById('error1').style.display="inline-block";
			document.myform.email.focus() ;
			flag = true;;
		}
		if( document.myform.phone.value == ""  || document.myform.phone.value.length < 10 || isNaN(document.myform.phone.value)||document.myform.phone.value.indexOf(" ")!=-1)
		{
			document.getElementById('error2').innerHTML = "Please provide a phone number of 10 digits" ;
			document.getElementById('error2').style.display="inline-block";
			document.myform.phone.focus() ;
			flag = true;;
		}
		if( document.myform.password.value == "" || document.myform.password.value.length < 4 )
		{
			document.getElementById('error3').innerHTML = "Password must contain at least 4 characters" ;
			document.getElementById('error3').style.display="inline-block";
			document.myform.password.focus() ;
			flag = true;;
		}
		if(document.myform.password.value != document.myform.password1.value)
		{
			document.getElementById('error4').innerHTML = "The passwords do not match" ;
			document.getElementById('error4').style.display="inline-block";
			document.myform.password1.focus() ;
			flag = true;;
		}
	/*var e = document.myform.subject;
	strUser = e.options[e.selectedIndex].value;
	if( strUser == "" )
	{
		alert( "Please select the subject!" );
		document.myform.subject.focus() ;
		flag = true;;
	}
 	if( document.myform.book.value == "" )
   {
     document.getElementById('error5').innerHTML = "Please provide a name" ;
     document.getElementById('error5').style.display="inline-block";
     document.myform.book.focus() ;
     flag = true;;
 }*/
 if(document.myform.book.value == "" )
 {
 	document.getElementById('error5').innerHTML = "Please provide the name of the book" ;
 	document.getElementById('error5').style.display="inline-block";
 	document.myform.book.focus() ;
 	flag = true;;
 }
 if( document.myform.author.value == "" )
 {
 	document.getElementById('error6').innerHTML = "Please provide the name of the author" ;
 	document.getElementById('error6').style.display="inline-block";
 	document.myform.author.focus() ;
 	flag = true;;
 }
 var e = document.myform.sellrent;
 strUser = e.options[e.selectedIndex].value;
 if( strUser == 1 )
 {
 	if( document.myform.sellprice.value == "" )
 	{
 		document.getElementById('error7').innerHTML = "Please provide the sale price" ;
 		document.getElementById('error7').style.display="inline-block";
 		document.myform.sellprice.focus();
 		flag = true;;
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
 	}
		/*var e = document.myform.rentpricetime;
		strUser1 = e.options[e.selectedIndex].value;
		if( strUser1 == "" )
		{
			document.getElementById('error8').innerHTML = "Please provide the time for the  ." ;
     		document.getElementById('error8').style.display="inline-block";
			document.myform.rentpricetime.focus() ;
			flag = true;;
		}
		if( document.myform.rentperiodnumber.value == "" )
		{
			alert( "Please enter the number of weeks/months to rent the book!" );
			document.myform.rentperiodnumber.focus();
			flag = true;;
		}
		var e = document.myform.rentperiod;
		strUser2 = e.options[e.selectedIndex].value;
		if( strUser2 == "" )
		{
			alert( "Please enter the time for the renting the book!" );
			document.myform.rentperiod.focus() ;
			flag = true;;
		}*/
	}
	if( strUser == 3 )
	{
		if( document.myform.sellprice.value == "" )
		{
			document.getElementById('error7').innerHTML = "Please provide the sale price" ;
			document.getElementById('error7').style.display="inline-block";
			document.myform.sellprice.focus();
			flag = true;;
		}

		if( document.myform.rentprice.value == "" )
		{
			document.getElementById('error8').innerHTML = "Please provide the rent price" ;
			document.getElementById('error8').style.display="inline-block";
			document.myform.rentprice.focus();
			flag = true;;
		}
	}
	if(flag)	{
		return false;
	}
	else 	{
		return( true );
	}
}

function hide()	{
	var e = document.myform.sellrent;
	strUser = e.options[e.selectedIndex].value;
	if(strUser == 1)
	{
		document.myform.rentprice.style.display="none";
		document.myform.rentpricetime.style.display="none";
		document.myform.rentperiodnumber.style.display="none";
		document.myform.rentperiod.style.display="none";
		document.myform.sellprice.style.display="block";
	}
	if(strUser == 2)
	{
		document.myform.sellprice.style.display="none";
		document.myform.rentprice.style.display="block";
		document.myform.rentpricetime.style.display="block";
		document.myform.rentperiodnumber.style.display="block";
		document.myform.rentperiod.style.display="block";
	}
	if(strUser == 3)
	{
		document.myform.rentprice.style.display="block";
		document.myform.rentpricetime.style.display="block";
		document.myform.rentperiodnumber.style.display="block";
		document.myform.rentperiod.style.display="block";
		document.myform.sellprice.style.display="block";
	}
}
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
			<form name="myform" novalidate action="entry.php" method="POST" onsubmit="return validate();">
				Name:*	<div id="error"></div>      <input type="text" name="name" id="name" class="sell-input" placeholder="Name" autocomplete="on" required>
				<br>
				E-mail:* <div id="error1"></div>   <input type="email" name="email" id="email" class="sell-input" autocomplete="on" required>
				<br>
				Mobile Number:*  <div id="error2"></div>   <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" required>
				<br>	
				Password:* <div id="error3"></div>  <input type="password" name="password" class="sell-input" required>
				<br>
				Confirm Password:* <div id="error4"></div>	<input type="password" name="password1" class="sell-input" required onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false">
				<br>
				Subject:* <select name="subject" id="subject" class="sell-input" required>
				<option value="All" selected>All</option>
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

			</select>
			<br>
			Book Title:*  <div id="error5"></div>    <input type="text" name="book" class="sell-input" autocomplete="on" required>
			<br>
			Author:*  <div id="error6"></div>  <input type="text" name="author" class="sell-input" autocomplete="on" required>
			<br>
			The book is for:*	<select name="sellrent" id="sell-rent" class="sell-input" required>
			<option value="3" selected>Both Sale and Rent</option>
			<option value="1">Sale</option>
			<option value="2">Rent</option>
		</select>
		<br>
		Sale Cost(INR): <div id="error7"></div> <input type="number" min="0" name="sellprice" class="sell-input" id="s-cost">
		<br>
		Rent Cost(INR): <div id="error8"></div> <input type="number" min="0" name="rentprice" class="sell-input" id="r-cost" autocomplete="on">
		<select name="rentpricetime" id="rent-price" class="sell-input">
			<option value="week">per Week</option>
			<option value="month">per Month</option>
		</select>
		<br><br>
		<!-- <div><input type="submit" value="Submit" id="submit-button" title="Please fill in the required fields before submitting"></div> -->
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