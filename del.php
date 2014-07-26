<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BooksforBucks | Delete the Book Added</title>
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
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
			Not satisfied with the price, or want to edit some details about the book, or want to remove the book you added!!
			<br><br>
			Enter the following details:
		</div>
		<form id="del-form" class="pure-form pure-form-stacked">
		<div class="sub"> <input type="text" class="del-input" placeholder="Email Address" required></div>
		<div class="sub"> <input type="text" class="del-input" placeholder="Book ID" required></div>
		<div class="sub"> <input type="password" class="del-input" placeholder="Password" required></div>
		<div><input class="del-input" type="submit" value="Submit" id="submit"></div>
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