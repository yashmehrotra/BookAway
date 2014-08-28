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
	<script src="Scripts/jquery.js"></script>
	<script src="Scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script type="text/javascript" src="Scripts/buypage.js"></script>
	<script type="text/javascript" src="Scripts/buypage_new.js"></script>
	<script type="text/javascript" src="Scripts/scroll.js"></script>
	<script type="text/javascript" src="Scripts/bpopup-min.js"></script>
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
	<div class="main-containers" id="buy-container">
		<div class="left-panel" id="buy-left-panel">
			<form class="pure-form pure-form-stacked" id="left-panel-search-form">
				<div>
					<div class="ui-widget"><input class="left-panel-input" id="left-panel-search-bar" placeholder="Search Here"></div>
					<button class="ion-android-search search-filters-btn" id="left-panel-search-btn"></button>
				</div> 
				<br>
				<div class="search-filters" id="buy-search-filters">
					<div id="search-filters-college-select">
						<input type="text" class="left-panel-input" id="search-filters-college-search" placeholder="Select College">
						<button class="ion-android-arrow-forward search-filters-btn" id="search-filters-college-btn"></button>
					</div>
					<div class="sub-select" id="left-panel-sub-select">
						<div class="left-panel-text-wrappers" id="sub-text-wrapper">
							Category:
						</div>
						<div id="sub-scroll-bar">
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="All">All
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Computers">Computers
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Electronics">Electronics
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Maths">Maths
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Fiction">Fiction
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Non-Fiction">Non-Fiction
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Physics">Physics
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Magazines">Magazines
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Biographies">Biographies
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Health">Health
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Travel">Travel
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Medical">Medical
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Law">Law
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Music">Music
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Business">Business
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Religion">Religion &amp; Spiritual
								<br>
							</div>
							<div class="sub-cbox">
								<input type="checkbox" class="sub-cbox-input" value="Miscellaneous">Miscellaneous
								<br>
							</div>
						</div>
					</div>
				<!--<div class="sub-select">-->
					<div class="left-panel-text-wrappers" id="book-for-text-wrapper">
						Available For:
					</div>
					<input type="checkbox" value="All" checked>Buy
					<br>
					<input type="checkbox" value="Computers" checked>Rent
					<br>
				<!--</div>-->
					<div id="left-panel-price-range">
						<div class="left-panel-text-wrappers" id="price-range-text-wrapper">
							Price Range:
						</div>
						<input type="number" id="range-min" min="0"> to <input type="number" min="1" id="range-max">
						<button class="search-filters-btn" id="price-range">Go</button>
					</div>
				</div>
			</form>
		</div>
		<div id="buy-content-container">
			<button id="load-more-btn">Load more</button>
		</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>