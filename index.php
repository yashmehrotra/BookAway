<!DOCTYPE html>
<html>
<head>
	<title>Bookaway.in | Buy | Sell | Rent | Books</title>
	<meta name="Description" content="Bookaway.in - Online portal for buying, selling and renting books. With a user-friendly interface, books can be bought, sold and rented under various categories such as IT, computers, electronics, mathematics, novels, physics, and more.">
	<meta name="Keywords" content="book,books,jiit,used,buy,sell,rent,textbook,india,IT,computers,electronics,mathematics,literature,novels,physics,music,medical">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="shortcut icon" href="favicon.ico">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<!--<script src="Scripts/homepage.js" type="text/javascript"></script>-->
	<script type="text/javascript" src="Scripts/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="Scripts/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="Scripts/jquery-easing-compatibility.1.2.pack.js"></script>
	<script type="text/javascript" src="Scripts/coda-slider.1.1.1.pack.js"></script>
	
	<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 6 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>

</head>
<body id="index-home">
	<?php
	require_once('header.php');
	?>
	<div class="page-header">
		<h2>Bookaway.in</h2>
	</div>
	<div class="main-containers" id="index-container">
		<!--<div class="box" id="buy-box">
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
		</div>-->
		<!--<a href="#"><img src="Styles/Styles/Images/book-1.jpg"></a> -->
		<!-- <ul id="index-nav">
			<li class="index-nav-list">
				<a href="#" class="index-nav-links" id="nav-link-1"></a>
			</li>
			<li class="index-nav-list">
				<a href="#" class="index-nav-links" id="nav-link-1"></a>
			</li>
			<li class="index-nav-list">
				<a href="#" class="index-nav-links" id="nav-link-1"></a>
			</li>
		</ul> -->

		<div class="slider-wrap">
			<div id="main-photo-slider" class="csw">
				<div class="panelContainer">

					<div class="panel" title="Panel 1">
						<div class="img-wrapper">
							<!-- REGULAR IMAGE PANEL -->
							<img src="Styles/Images/tempphoto-1.jpg" alt="temp" class="imgSlide" />
							<div class="photo-meta-data">
								Photo Credit: <a href="http://flickr.com/photos/astrolondon/2396265240/">Kaustav Bhattacharya</a><br />
								<span>"Free Tibet" Protest at the Olympic Torch Rally</span>
							</div>
						</div>
					</div>
					<div class="panel" title="Panel 2">
						<div class="wrapper">
							<!-- PANEL CONTENT -->
						</div>
					</div>		
					<div class="panel" title="Panel 3">
						<div class="wrapper">
							<!-- EXAMPLE OF OTHER PANEL POSSIBILITIES -->
							<img src="Styles/Images/scotch-egg.jpg" alt="scotch egg" class="floatLeft imgSlide"/>
					
							<h1>How to Cook a Scotch Egg</h1>
					
							<ul>
								<li>6 hard-boiled eggs, well chilled (i try to cook them to just past soft boiled stage, then stick them in the coldest part of the fridge to firm up)</li>
								<li>1 pound good quality sausage meat (i used ground turkey meat, seasoned with sage, white pepper, salt and a tiny bit of maple syrup)</li>
								<li>1/2 cup AP flour</li>
								<li>1-2 eggs, beaten</li>
								<li>3/4 cup panko-style bread crumbs</li>
								<li>Vegetable oil for frying</li>
							</ul>
						</div>
					</div>
					<div class="panel" title="Panel 4">
						<div class="wrapper">
							<!-- PANEL CONTENT -->
						</div>
					</div>
					<div class="panel" title="Panel 5">
						<div class="wrapper">
							<!-- PANEL CONTENT -->
						</div>
					</div>
					<div class="panel" title="Panel 6">
						<div class="wrapper">
							<!-- PANEL CONTENT -->
						</div>
					</div>

				</div>
			</div>

			<!-- TO MAKE THESE THUMBNAILS ACTUALLY WORK, BOTH THE HASH VALUE (#1, ETC.)
		          AND THE CLASS="CROSS-LINK" ARE REQUIRED -->

			<a href="#1" class="cross-link active-thumb"><img src="Styles/Images/tempphoto-1thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a>
			<div id="movers-row">
				<div><a href="#2" class="cross-link"><img src="Styles/Images/tempphoto-2thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
				<div><a href="#3" class="cross-link"><img src="Styles/Images/tempphoto-3thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
				<div><a href="#4" class="cross-link"><img src="Styles/Images/tempphoto-4thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
				<div><a href="#5" class="cross-link"><img src="Styles/Images/tempphoto-5thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
				<div><a href="#6" class="cross-link"><img src="Styles/Images/tempphoto-6thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
			</div>
		</div>

	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>