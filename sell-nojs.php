<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | BooksforBucks.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
</head>
<body>
	<div id="wrapper">
	<div class="top-panel">
		<ul class="top-panel-list">
			<li class="top-opt"><div class="top-divs"><a href="index.php" class="top-panel-links">Home</a></div></li>
			<li class="top-opt"><a href="buy.php" class="top-panel-links">Buy</a></li>
			<li class="top-opt"><a href="sell.php" class="top-panel-links" id="focus">Sell</a></li>
			<li class="top-opt"><a href="rent.php" class="top-panel-links">Rent</a></li>
			<li class="top-opt"><a href="del.php" class="top-panel-links">Delete</a></li>
			<li class="top-opt"><a href="feedback.php" class="top-panel-links">Feedback</a></li>
		</ul>
	</div>
	</div>
	<div id="sell-main-head">
		<h2 id="sell-books-text">Sell Books</h2>
	</div>
	<div id="sell-container">
	<div id="step-1">
		<h3 id="step-1-text"><u>Step 1:</u> Fill out and submit the form below with your complete details</h3>
	</div>
	<div id="sell-form">
		<p id="compulsary-text"><strong><u>Note:</u></strong> (Fields Marked with * are compulsary)</p>
	<form name="myform" action="entry.php" method="POST" onsubmit="return validate();">
Name:*      <input type="text" name="name" id="name" class="sell-input" autocomplete="on" required>
<br>
E-mail:*    <input type="email" name="email" id="email" class="sell-input" autocomplete="on" required>
<br>
Phone:*     <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" required>
<br>	
Password:*  <input type="password" name="password" class="sell-input" required>(To Delete the Sold book later on)
<br>
Subject:*  <select name="subject" id="subject" class="sell-input" required>
					<option value="">Select</option>
					<option value="all">All</option>
					<option value="Computer Science">Computer Science</option>
					<option value="Electronics">Electronics</option>
					<option value="Maths">Maths</option>
					<option value="Literature">Literature</option>
					<option value="Physics">Physics</option>
					<option value="Other">Miscellaneous</option>
				</select>
				<br>
Book Title:*      <input type="text" name="book" class="sell-input" autocomplete="on" required>
<br>
Author:*    <input type="text" name="author" class="sell-input" autocomplete="on" required>
<br>
Added to:*	<select name="sellrent" id="sell-rent" class="sell-input" required>
						<option value="">Select</option>
						<option value="1">Sell</option>
						<option value="2">Rent</option>
						<option value="3">Both</option>
					</select>
					<br>
(If Selling)* Cost(INR): <input type="number" min="0" name="sellprice" class="sell-input">
<br>
(If Renting)* Price(INR): <input type="number" min="0" name="rentprice" class="sell-input" autocomplete="on"> per 
<select name="rentpricetime" id="rent-price" class="sell-input">
	<option value="week">Week</option>
	<option value="forntight">Fortnight</option>
	<option value="month">Month</option>
</select>
<br>
(If Renting)* Maximum Renting Period: <input type="number" min="1" name="rentperiodnumber"  class="sell-input" autocomplete="on">
 <select name="rentperiod" class="sell-input">
 <option value="" selected>Select</option>
<option value="d">Days</option>
<option value="w">Weeks</option>
<option value="m">Months</option>
</select><br>  
Condition:		<select name="cond" class="sell-input">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>/5<br>
Suggested for:  <select name="year" class="sell-input">
					<option value="all">All</option>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
					<option value="MBA">MBA</option>
				</select>Year<br>
<div><input type="submit" value="Submit" id="submit-button" title="Please fill in the required fields before submitting"></div>
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