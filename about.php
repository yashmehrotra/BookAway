<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){
			$('.c123').on('mouseenter mouseleave', function(){
				$(this).toggleClass('blue');
			});
			$('.m123').on('mouseenter mouseleave', function(){
				$(this).toggleClass('img-blue');
			});
		});
	</script>
</head>
<body>
	<img src="Styles/Images/favicon1.png" id="favicon">
		<div class="index-wrapper">
	<div class="top-panel">
		<ul class="top-panel-list">
			<li class="top-opt"><div class="top-divs"><a href="index.php" class="top-panel-links">Home</a></div></li>
			<li class="top-opt"><a href="buy.php" class="top-panel-links">Buy</a></li>
			<li class="top-opt"><a href="sell.php" class="top-panel-links">Sell</a></li>
			<li class="top-opt"><a href="rent.php" class="top-panel-links">Rent</a></li>
			<li class="top-opt"><a href="del.php" class="top-panel-links">Edit</a></li>
			<li class="top-opt"><a href="feedback.php" class="top-panel-links">Feedback</a></li>
		</ul>
	</div>
	</div>
	<div class="main-heads">
		<h2 id="about-us-text">About Us</h2>
	</div>
	<div class="main-container">
		<div class="c123" id="c1">
			<a href="Styles/Images/avijit.jpg"><img src="Styles/Images/avijit.jpg" class="m123" id="m1" alt="img1"></a>
			<p class="desc">Avijit Gupta
				<br><br>
				Frontend Developer
			</p>
			<div onclick="location.href='https://www.facebook.com/526avijitgupta';" class="f-t" id="icf1" ></div>
			<div onclick="location.href='http://www.twitter.com/526avijit';" class="f-t" id="ict1"></div>
			<div onclick="location.href='https://www.linkedin.com/pub/avijit-gupta/9a/22/6';" class="f-t" id="icl1" ></div>
			<div onclick="location.href='https://github.com/526avijitgupta';" class="f-t" id="icg1"></div>
		</div>
		<div class="c123" id="c2">
			<a href="Styles/Images/yash.jpg"><img src="Styles/Images/yash.jpg" class="m123" id="m2" alt="img2"></a>
			<p class="desc">Yash Mehrotra
				<br><br>
				Backend Developer
			</p>
			<div onclick="location.href='https://www.facebook.com/yashm95';" class="f-t" id="icf2" ></div>
			<div onclick="location.href='http://www.twitter.com/yashm95';" class="f-t" id="ict2"></div>
			<div onclick="location.href='in.linkedin.com/in/yashmehrotra';" class="f-t" id="icl2" ></div>
			<div onclick="location.href='https://github.com/yashmehrotra/';" class="f-t" id="icg2"></div>
		</div>
		<div class="c123" id="c3">
			<a href="Styles/Images/sidhant.jpg"><img src="Styles/Images/sidhant.jpg" class="m123" id="m3" alt="img3"></a>
			<p class="desc">Sidhant Sharma
				<br><br>
				Content Manager
			</p>
			<div onclick="location.href='https://www.facebook.com/sid.sharma15';" class="f-t" id="icf3" ></div>
			<div onclick="location.href='http://www.twitter.com/SidMail15';" class="f-t" id="ict3"></div>
			<div onclick="location.href='http://in.linkedin.com/pub/sidhant-sharma/91/960/230';" class="f-t" id="icl3" ></div>
			<div onclick="location.href='https://github.com/sid15sharma';" class="f-t" id="icg3"></div>
		</div>
		<div class="bottom-panel">
		<ul class="bottom-panel-list">
			<li class="home-about-contact"><a href="index.php" class="bottom-links">Home</a></li>
			<li class="home-about-contact"><a href="about.php" class="bottom-links">About</a></li>
			<li class="home-about-contact"><a href="contact.php" class="bottom-links">Contact</a></li>
		</ul>
	</div>
		<div id="co-developed">
			<code>Copyright</code><code>2014 .All Rights Reserved. Booksforbucks.com</code>
		</div>
	</div>
</body>
</html>