<?php
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=md5($_POST['password']);
	$subject=$_POST['subject'];
	$book=$_POST['book'];
	$author=$_POST['author'];
	$cost=$_POST['cost'];
	$year=$_POST['year'];
	$cond=$_POST['cond'];

	// Create connection
	$con=mysqli_connect("localhost","root","44rrff","bfb");

	//Check connection
	if (mysqli_connect_errno()) 
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		echo "epic";
	}
	mysqli_query($con,"INSERT INTO books (year,subject,book,author,cost,cond,name,phone,email,password) VALUES ('$year','$subject','$book','$author','$cost','$cond','$name','$phone','$email','$password')");
	
	mysqli_close($con);
?>

<!DOCTYPE html>
<title>Books for Bucks</title>
<head>
	<link rel="stylesheet" type="text/css" href="entrystyle.css">
</head>
<body>
	<div class="content">
		<div id="step-2" align="center">
			<h3><u>Step 2:</u> Verification Process...</h3>
		</div>
		<div id="s2">
			<p>Thankyou for contributing!!!<br>
			Now you will receive a phone call within 24 hours for the verification details.</p>
		</div>
		<div class="links-list">
			<div class="links-box"><a href="althomepage.html" class="links">Return 
			to homepage</a></div>
			<div class="links-box"><a href="sell.html" class="links">Sell another Book</a></div>
		</div>
		<div class="bottom-panel" align="center">
		<ul class="bottom-panel-list">
			<li class="home-about-contact"><a href="althomepage.html" class="bottom-links">Home</a></li>
			<li class="home-about-contact"><a href="about.html" class="bottom-links">About</a></li>
			<li class="home-about-contact"><a href="contact.html" class="bottom-links">Contact</a></li>
		</ul>
	</div>
		<div id="co-developed" align="center">
			<code>Copyright</code><code>2014 .All Rights Reserved. Website co-developed by Avijit Gupta and Yash Mehrotra</code>
		</div>
	</div>
</body>
</html>