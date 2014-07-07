<!DOCTYPE html>
<html>
<head>
	<title>Rent Books | BooksforBucks.com</title>
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
			<li class="top-opt"><a href="sell.php" class="top-panel-links">Sell</a></li>
			<li class="top-opt"><a href="rent.php" class="top-panel-links" id="focus">Rent</a></li>
			<li class="top-opt"><a href="del.php" class="top-panel-links">Delete</a></li>
			<li class="top-opt"><a href="feedback.php" class="top-panel-links">Feedback</a></li>
		</ul>
	</div>
	</div>
	<div id="rent-container">
		<h2 id="main-head">Rent Books</h2>
	<div class="rent-left-panel">
	<form id="rent-search">
	<div><input id="input" type="search" placeholder="Search here" autofocus></div>
	<div><button id="search-btn" type="submit">Search</button></div>
	</form>
	<br>
	<div class="search-filters">
		<h3 id="search-filter-text">Search Filters:-</h3>
		<p>Search By:</p>
		<select name="search-by" id="search-by">
			<option value="Book Title">Book Title</option>
			<option value="Author-name">Author</option>
			<option value="Publications">Publication</option>
		</select>
		<!--<p>Select Maximum Price:</p>
		<div class="price-bar">`
		<form oninput="x.value=parseInt(10*a.value)" id="price-max">100
	<input type="range" id="a" min="10" max="100" value="100">1000 
	<output name="x" for="a" id="output"></output>
	</form>
	</div>-->
	</div>
	<div class="rent-period">
	<p id="time">Maximum Renting Period</p>
		<div class="rent-time"><input type="radio" name="rent-time" checked>Unspecified</div>
		<div class="rent-time"><input type="radio" name="rent-time">1 Week</div>
		<div class="rent-time"><input type="radio" name="rent-time">1 Fortnight</div>
		<div class="rent-time"><input type="radio" name="rent-time">1 Month</div>
	</div>
	<div class="sub-select">
		<p id="sub">Select subject:</p>
		<div class="subs"><input type="radio" name="sub" checked>All</div>
		<div class="subs"><input type="radio" name="sub">Computers</div>
		<div class="subs"><input type="radio" name="sub">Electronics</div>
		<div class="subs"><input type="radio" name="sub">Mathematics</div>
		<div class="subs"><input type="radio" name="sub">Literature</div>
		<div class="subs"><input type="radio" name="sub">Physics</div>
		<div class="subs"><input type="radio" name="sub">Medical</div>
		<div class="subs"><input type="radio" name="sub">Law</div>
		<div class="subs"><input type="radio" name="sub">Music</div>
		<div class="subs"><input type="radio" name="sub">Business</div>
		<div class="subs"><input type="radio" name="sub">Miscellaneous</div>
	</div>
	</div>
	<div class="main">
		<div class="latest-additions">
		<h2>Some Latest Additions</h2>
		<a href="" class="book-link"><img src="" class="books" alt="book1"></a>
		<a href="" class="book-link"><img src="" class="books" alt="book2"></a>
		<a href="" class="book-link"><img src="" class="books" alt="book3"></a>
		<a href="" class="book-link"><img src="" class="books" alt="book4"></a>
		<a href="" class="book-link"><img src="" class="books" alt="book5"></a>
		</div>
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