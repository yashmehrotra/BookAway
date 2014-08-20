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
		<!--<h2 id="latest-text">Latest Additions</h2>
		<div id="buy-new-search">
		<form class="pure-form pure-form-stacked" id="home-search-new">
		<div class="ui-widget">
			<input id="search-bar-new" placeholder="Search Here">
		</div>
		<button class="search-new" id="search-button-new">Search</button>	
	</div>-->
	<div class="buy-left-panel">
	<form id="home-search">
	<div>
		<div class="ui-widget"><input id="search-bar"></div>
	</div> 
	<div><button class="search" id="search-button">Search</button></div>
	</form>
	<br>
	<div class="search-filters">
		<h3 id="search-filter-text">Search Filters:-</h3>
		<!--<p>Search By:</p>
		<select name="search-by" class="search-by" id="search_by">
			<option value="booktitle">By Book Title</option>
			<option value="authorname">By Author</option>
			<option value="publication">By Publication</option>
		</select>
		<p>Select Maximum Price:</p>
		<div class="price-bar">
		<form oninput="x.value=parseInt(10*a.value)" class="pure-form pure-form-stacked" id="price-max">100
	<input type="range" id="a" min="10" max="100" value="100">1000 
	<output name="x" for="a" id="output"></output>
	</form>
	</div>-->
	<div class="clg-select">
		<p id="sub">Select College:</p>
		<select name="select-college" class="clg-by" id="select_clg">
			<?php
			require_once ('list.php');
			?>
		</select>
	</div>
	<div class="sub-select">
		<p id="sub">Select subject:</p>
		<select name="select-subject" class="search-by" id="buy_subject">
			<?php
			require_once ('categories.php');
			?>
		</select>
	</div>
	</div>
	</div>
	<div id="latest-outer">
		<!--<table id="buy-table">
			<tbody>
			</tbody>
		</table>-->
		<button id="load-more">Load more</button>
	</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>