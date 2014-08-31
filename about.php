<!DOCTYPE html>
<html>
<head>
	<title>About Us | Bookaway.in</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/aboutpage.js"></script>
</head>
<body>
	<?php
	require_once('header.php');
	?>
	<div class="page-header">
		<h2>About Us</h2>
	</div>
	<div class="main-containers" id="about-us-container">
		<div class="developer-profile" id="profile1">
			<a href="Styles/Images/avijit.jpg"><img src="Styles/Images/avijit.jpg" class="profile-image" id="profile-image1" alt="img1"></a>
			<p class="developer-title">Avijit Gupta
				<br><br>
				Frontend Developer
			</p>
			<div onclick="location.href='https://www.facebook.com/526avijitgupta';" class="profile-links fb"></div>
			<div onclick="location.href='http://www.twitter.com/526avijit';" class="profile-links tw"></div>
			<div onclick="location.href='https://www.linkedin.com/pub/avijit-gupta/9a/22/6';" class="profile-links li"></div>
			<div onclick="location.href='https://github.com/526avijitgupta';" class="profile-links gi"></div>
		</div>
		<div class="developer-profile" id="profile2">
			<a href="Styles/Images/yash.jpg"><img src="Styles/Images/yash.jpg" class="profile-image" id="profile-image2" alt="img2"></a>
			<p class="developer-title">Yash Mehrotra
				<br><br>
				Backend Developer
			</p>
			<div onclick="location.href='https://www.facebook.com/yashm95';" class="profile-links fb"></div>
			<div onclick="location.href='http://www.twitter.com/yashm95';" class="profile-links tw"></div>
			<div onclick="location.href='in.linkedin.com/in/yashmehrotra';" class="profile-links li"></div>
			<div onclick="location.href='https://github.com/yashmehrotra/';" class="profile-links gi"></div>
		</div>
		<div class="developer-profile" id="profile3">
			<a href="Styles/Images/sidhant.jpg"><img src="Styles/Images/sidhant.jpg" class="profile-image" id="profile-image3" alt="img3"></a>
			<p class="developer-title">Sidhant Sharma
				<br><br>
				Graphics Designer
			</p>
			<div onclick="location.href='https://www.facebook.com/sid.sharma15';" class="profile-links fb"></div>
			<div onclick="location.href='http://www.twitter.com/SidMail15';" class="profile-links tw"></div>
			<div onclick="location.href='http://in.linkedin.com/pub/sidhant-sharma/91/960/230';" class="profile-links li"></div>
			<div onclick="location.href='https://github.com/sid15sharma';" class="profile-links gi"></div>
		</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>