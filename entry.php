<?php
	
	$name        = $_POST['name'];
	$email       = $_POST['email'];
	$phone       = $_POST['phone'];
	$password    = md5($_POST['password']);
	$subject     = $_POST['subject'];
	$book        = $_POST['book'];
	$author      = $_POST['author'];
	$sell_rent   = $_POST['sellrent'];
	$sell_price  = $_POST['sellprice'];
	$rent_price  = $_POST['rentprice'];
	$rent_time   = $_POST['rentpricetime'];
	$rent_period = $_POST['rentperiod'];

	echo "<br>";
	echo $name;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $phone;
	echo "<br>";
	echo $password;
	echo "<br>";
	echo $subject;
	echo "<br>";
	echo $book;
	echo "<br>";
	echo $author;
	echo "<br>";
	echo $sell_rent;
	echo "<br>";
	echo $sell_price;
	echo "<br>";
	echo $rent_price;
	echo "<br>";
	echo $rent_time;
	echo "<br>";
	echo $rent_period;
	echo "<br>";
	//
	//For Sell rent - 3 is both,1 is sale , 2 is rent
	//
	//
	//
	//
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
	//mysqli_query($con,"INSERT INTO books (year,subject,book,author,cost,cond,name,phone,email,password) VALUES ('$year','$subject','$book','$author','$cost','$cond','$name','$phone','$email','$password')");
	
	mysqli_close($con);
?>
<!DOCTYPE html>
<head>
	<title>Books for Bucks</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
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
	<div class="content">
		<div id="step-2">
			<h3 id="step-2-text"><u>Step 2:</u> Verification Process...</h3>
		</div>
		<div id="s2">
			<p id="successful-text">Thankyou for contributing!!!<br>
			Your response will be processed and implemented within 24 hours.</p>
		</div>
		<div class="links-list">
			<div class="links-box"><a href="index.php" class="links">Return 
			to homepage</a></div>
			<div class="links-box"><a href="sell.php" class="links">Sell another Book</a></div>
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