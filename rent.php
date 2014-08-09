<!DOCTYPE html>
<html>
<head>
	<title>Rent Books | BooksforBucks.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script type="text/javascript" src="Scripts/scroll.js"></script>
</head>
<body>
	<img src="Styles/Images/favicon1.png" id="favicon">
	<?php
	require_once('topbar.php');
	?>
	<div class="main-heads">
		<h2>Rent Books</h2>
	</div>
	<div id="rent-container">
	<div class="rent-left-panel">
	<form id="rent-search">
	<div><input class="input" type="search" placeholder="Search here" maxlength="200" results=3 autofocus></div>
	<div><button class="search" type="submit">Search</button></div>
	</form>
	<br>
	<div class="search-filters">
		<h3 id="search-filter-text">Search Filters:-</h3>
		<p>Search By:</p>
		<select name="search-by" class="search-by">
			<option value="booktitle">By Book Title</option>
			<option value="authorname">By Author</option>
			<option value="publication">By Publication</option>
			<option value="isbn">By ISBN</option>
		</select>
	<div class="sub-select">
		<p id="sub">Select subject:</p>
		<select name="select-subject" class="search-by">
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
		</select>
		</div>
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
			<code>Copyright2014 .All Rights Reserved. Booksforbucks.com</code>
		</div>
	</div>
</body>
</html>