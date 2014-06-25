<!DOCTYPE html>
<html>
<head>
	<title>
		BooksforBucks- Buy, Sell, Rent Books
	</title>
	<link rel="stylesheet" type="text/css" href="sellstyle.css">
</head>
<body>
	<div class="main" align="center">
	<div id="step-1" align="center">
		<h3><u> Fill out and submit the form below with your complete details</u></h3>
	</div>
	<div align="center" id="sell-form">
		<p><strong><u>Note:</u></strong> (Fields Marked with * are compulsary)</p>
	<form action="entry.php" method="POST">
Name:      <input type="text" name="name" id="name" class="sell-input" autocomplete="on" required autofocus>
<br>
E-mail:    <input type="email" name="email" id="email" class="sell-input" autocomplete="on" required>
<br>
Phone:     <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" required>
<br>	
Password:  <input type="password" name="password" class="sell-input" required>(To Delete the Sold book later on)
<br>
Subject:  <select name="subject" class="sell-input" autocomplete="on" required>
					<option value="all">All</option>
					<option value="Computer Science">Computer Science</option>
					<option value="Electronics">Electronics</option>
					<option value="Maths">Maths</option>
					<option value="Literature">Literature</option>
					<option value="Physics">Physics</option>
					<option value="Other">Miscellaneous</option>
				</select>
				<br>
Book Title:      <input type="text" name="book" class="sell-input" autocomplete="on" required>
<br>
Author:    <input type="text" name="author" class="sell-input" autocomplete="on" required>
<br>
The Book is for:	<select name="future" class="sell-input" autocomplete="on" required>
						<option value="boths">Sale and Rent</option>
						<option value="sale">Sale only</option>
						<option value="rent">Rent Only</option>
					</select>
					<br>
Cost(INR): <input type="text" name="cost" class="sell-input">
<br>
(If Renting) Price(INR): <input type="number" min="0" name="rent-price" class="sell-input" autocomplete="on"> per 
<select name="rent-price" class="sell-input" autocomplete="on">
	<option value="week">Week</option>
	<option value="forntight">Fortnight</option>
	<option value="month">Month</option>
</select>
<br><br><br>
<div align="center"><input type="submit" value="Submit" id="submit-button" title="Please fill in the required fields to enable this button"></div>
</form>
</div>
<div class="bottom-panel" align="center">
		<ul class="bottom-panel-list">
			<li class="home-about-contact"><a href="althomepage.html" class="bottom-links">Home</a></li>
			<li class="home-about-contact"><a href="about.html" class="bottom-links">About</a></li>
			<li class="home-about-contact"><a href="contact.html" class="bottom-links">Contact</a></li>
		</ul>
	</div>
		<div id="co-developed" align="center">
			<code>Website co-developed by Avijit Gupta and Yash Mehrotra</code>
		</div>
</div>
</body>
</html>