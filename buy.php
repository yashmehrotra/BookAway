<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BooksforBucks- Buy, Sell, Rent Books!!</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
	<script src="Scripts/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script type="text/javascript" src="Scripts/buypage.js"></script>
	<script type="text/javascript" src="Scripts/scroll.js"></script>
	<script>
		$(function(){
			$('#buy').attr('id','focus');
		});
	</script>
</head>
<body>
	<?php
	require_once('topbar.php');
	?>
	<div class="main-heads">
			<h2>Buy Books</h2>
	</div>
	<div id="buy-container">
	<div class="buy-left-panel">
	<form id="home-search">
	<div>
		<div class="ui-widget"><input id="search-bar"></div>
	</div> 
	<div><button class="search" type="submit">Search</button></div>
	</form>
	<br>
	<div class="search-filters">
		<h3 id="search-filter-text">Search Filters:-</h3>
		<p>Search By:</p>
		<select name="search-by" class="search-by" id="search_by">
			<option value="booktitle">By Book Title</option>
			<option value="authorname">By Author</option>
			<option value="publication">By Publication</option>
		</select>
		<p>Select Maximum Price:</p>
		<div class="price-bar">
		<form oninput="x.value=parseInt(10*a.value)" id="price-max">100
	<input type="range" id="a" min="10" max="100" value="100">1000 
	<output name="x" for="a" id="output"></output>
	</form>
	</div>
	<div class="sub-select">
		<p id="sub">Select subject:</p>
		<select name="select-subject" class="search-by" id="buy_subject">
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
	<div id="latest-outer">
		<div class="latest-additions"></div>
		<button id="load-more">Load more</button>
	</div>
	<?php
		require_once('footer.php');
	?>
	</div>
</body>
</html>