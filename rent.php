<!DOCTYPE html>
<html>
<head>
	<title>
		BooksforBucks- Buy,Sell,Rent Books!!
	</title>
	<link rel="stylesheet" type="text/css" href="rentstyle.css">
</head>
<body>
		<div class="content" align="center">
	<div class="left-panel">
	<form>
	<form id="home-search">
	<div><input class="input" type="search" placeholder="Search here"></div>
	<div><button class="search" type="submit">Search</button></div>
	</form>
	<br>
	<div class-"search-filters">
		<h3>Search Filters:-</h3>
		<p>Search By:</p>
		<select name="search-by" class="search-by" autocomplete="on">
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
		</select>
	</div>
	<div class="sub-select">
		<p id="sub">Select subject:</p>
		<div class="subs"><input type="radio" name="sub" checked>All</div>
		<div class="subs"><input type="radio" name="sub">Computers</div>
		<div class="subs"><input type="radio" name="sub">Electronics</div>
		<div class="subs"><input type="radio" name="sub">Mathematics</div>
		<div class="subs"><input type="radio" name="sub">Literature</div>
		<div class="subs"><input type="radio" name="sub">Physics</div>
		<div class="subs"><input type="radio" name="sub">Miscellaneous</div>
	</div>
	</form>
	</div>
	<div class="main">
		<div class="latest-additions">
		<h2>Some Latest Additions</h2>
		<a href="" class="book-link"><img src="" class="books"></a>
		<a href="" class="book-link"><img src="" class="books"></a>
		<a href="" class="book-link"><img src="" class="books"></a>
		<a href="" class="book-link"><img src="" class="books"></a>
		<a href="" class="book-link"><img src="" class="books"></a>
		</div>
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