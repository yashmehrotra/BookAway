<!DOCTYPE html>
<html>
<head>
	<title>Bookaway.in | Buy | Sell | Rent | Books</title>
	<meta name="Description" content="Bookaway.in - Online portal for buying, selling and renting books. With a user-friendly interface, books can be bought, sold and rented under various categories such as IT, computers, electronics, mathematics, novels, physics, and more.">
	<meta name="Keywords" content="book,books,jiit,used,buy,sell,rent,textbook,india,IT,computers,electronics,mathematics,literature,novels,physics,music,medical">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/ribbons.css">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="shortcut icon" href="favicon.ico">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script>
		$(function(){
			$('#home').attr('id','focus');
		});
	</script>
</head>
<body id="index-home">
	<?php
	require_once('topbar.php');
	?>
	<div class="main-heads">
	<h2>Bookaway.in</h2>
	</div>
	<div id="home-container">
	<div class="box" id="buy-box">
		<h1>BUY</h1>
		<p class="home-desc">Search and buy.<br><br> Directly contact the seller through phone.</p>
		<div  class="continue-buy"><a href="buy.php" class="buy-link"><code><strong>Continue &gt;&gt;&gt;</strong></code></a></div>
	</div>
	<div class="box" id="sell-box">
		<h1>SELL</h1>
		<p class="home-desc">Add your books for selling or renting in 2 easy steps:</p>
			<ol>
				<li>Fill and submit a form with the complete details and contact info.</li><br>
				<li>Wait 24 hours for the book to be added to database and be available for buying or renting.</li><br>
			</ol>
			<div class="continue-sell"><a href="sell.php" class="sell-link"><code><strong>Continue &gt;&gt;&gt;</strong></code></a></div>
	</div>
	<div class="box" id="rent-box">
		<h1>RENT</h1>
		<p class="home-desc">Don't want to buy books?<br>Rent them.<br><br>Pay as per week or month.</p>
		<div class="continue-rent"><a href="rent.php" class="rent-link"><code><strong>Continue &gt;&gt;&gt;</strong></code></a></div>
	</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>