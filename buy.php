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
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
	<script src="Scripts/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="Scripts/buypage.js"></script>
	<script type="text/javascript" src="Scripts/bpopup-min.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.core.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.position.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.menu.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.autocomplete.js"></script>
	<script src="Scripts/google_analytics.js"></script>
	<script src="Scripts/top-panel.js"></script>
	<script>
		$(function(){
			$('#buy').attr('id','focus');
		});
	</script>
</head>
<body>
	<?php
	require_once('header.php');
	?>
	<div class="page-header">
			<h2>Buy Books</h2>
	</div>
	<blockquote>
		<article class="instructions" id="buy-instructions">
			<h2>Instructions:</h2>
			<ol class="instructions-list">
				<li class="instructions-list-item">Search for the book you want to get.</li>
				<li class="instructions-list-item">Click on a displayed result to view the seller contact details.</li>
				<li class="instructions-list-item">Contact the seller.</li>
			</ol>
		</article>
	</blockquote>
	<div class="main-containers" id="buy-container">
		<aside class="left-panel">
			<form class="pure-form pure-form-stacked">
				<div id="buy-search-filters">
					<div id="search-filters-college-select">
						<input type="text" id="search-filters-college-search" placeholder="Select College">
						<button class="ion-android-arrow-forward pointer-onhover" id="search-filters-college-btn"></button>
					</div>
					<div class="ui-widget">
						<input type="search" id="left-panel-search-bar" placeholder="Search Here">
					</div>
					<button class="ion-android-search pointer-onhover" id="left-panel-search-btn"></button>
					<div class="sub-select" id="left-panel-sub-select">
						<div class="left-panel-text-wrap" id="sub-text-wrapper">
							Category:
						</div>
						<div id="sub-scroll-bar">
							<?php 
								require_once("categories.php"); 
							?>
						</div>
					</div>
				<!--<div class="sub-select">-->
					<div class="left-panel-text-wrap" id="book-for-text-wrapper">
						Available For:
					</div>
					<label><input type="radio" name="radio-name" class="radio-available-for" value="4" checked>All</label>
					<br>
					<label><input type="radio" name="radio-name" class="radio-available-for" value="3">Both Buy and Rent</label>
					<br>
					<label><input type="radio" name="radio-name" class="radio-available-for" value="1">Buy</label>
					<br>
					<label><input type="radio" name="radio-name" class="radio-available-for" value="2">Rent</label>
					<br>
				<!--</div>-->
					<div id="left-panel-price-range">
						<div class="left-panel-text-wrap" id="price-range-text-wrapper">
							Price Range:
						</div>
						<input type="number" id="range-min" min="0"> to <input type="number" min="1" id="range-max">
						<button class="pointer-onhover" id="price-range">Go</button>
					</div>
				</div>
			</form>
		</aside>
		<div id="buy-content-container">
			<!-- Books content appended here -->
		</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>