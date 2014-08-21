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
	<title>Buy and Rent Books | Bookaway.in</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/ribbons.css">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" href="Styles/jquery-ui.css">
	<script src="Scripts/jquery.js"></script>
	<script src="Scripts/jquery-ui.js"></script>
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
	require_once('fork.php');
	?>
	<div class="main-heads">
			<h2>Buy Books</h2>
	</div>
	<div id="buy-container">
	<div class="buy-left-panel">
	<form class="pure-form pure-form-stacked" id="home-search">
	<div>
		<div class="ui-widget"><input id="search-bar" placeholder="Search Here"></div>
	</div> 
	<br>
	<div class="search-filters">
	<div class="clg-select">
		<input type="text" class="input" id="" placeholder="Enter Name of the College">
	</div>
	<div class="sub-select">
		<p id="sub">Subject:</p>
		<div id="sub-scroll-bar">
			<div class="sub-cbox">
				<input type="checkbox" value="All">All
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Computers">Computers
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Electronics">Electronics
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Maths">Maths
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Fiction">Fiction
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Non-Fiction">Non-Fiction
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Physics">Physics
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Magazines">Magazines
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Biographies">Biographies
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Health">Health
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Travel">Travel
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Medical">Medical
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Law">Law
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Music">Music
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Business">Business
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Religion">Religion &amp; Spiritual
				<br>
			</div>
			<div class="sub-cbox">
				<input type="checkbox" value="Miscellaneous">Miscellaneous
				<br>
			</div>
		</div>
	</div>
	<div class="price-range">
		Price Range
		<br>
		<input type="number" id="range-min"> to <input type="number" id="range-max">
		<button>Go</button>
	</div>
	</div>

	</form>
	</div>
	<div id="latest-outer">
		<button id="load-more">Load more</button>
	</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>