<!DOCTYPE html>
<html>
    <head>
	<title>About Us | BookAway.in</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="Scripts/aboutpage.js"></script>
	<script src="Scripts/google_analytics.js"></script>
	<script src="Scripts/top-panel.js"></script>
    </head>
    <body>
        <div class="outer-page-wrap">
	    <?php
	        require_once('header.php');
	    ?>
	    <div class="main-containers" id="about-us-container">
		<h2 class="head-text">Our Team</h2>
		<div class="developer-profile" id="profile1">
		    <a href="Styles/Images/avijit.jpg"><img src="Styles/Images/avijit.jpg" class="profile-image" id="profile-image1" alt="img1"></a>
		    <p>Avijit Gupta
			<br><br>
			Frontend Developer
		    </p>
		    <div onclick="location.href='www.facebook.com/526avijitgupta';" class="pointer-onhover fb"></div>
		    <div onclick="location.href='www.twitter.com/526avijit';" class="pointer-onhover tw"></div>
		    <div onclick="location.href='www.linkedin.com/pub/avijit-gupta/9a/22/6';" class="pointer-onhover li"></div>
		    <div onclick="location.href='github.com/526avijitgupta';" class="pointer-onhover gi"></div>
		</div>
		<div class="developer-profile" id="profile2">
		    <a href="Styles/Images/yash.jpg"><img src="Styles/Images/yash.jpg" class="profile-image" id="profile-image2" alt="img2"></a>
		    <p>Yash Mehrotra
			<br><br>
			Backend Developer
		    </p>
		    <div onclick="location.href='www.facebook.com/yashm95';" class="pointer-onhover fb"></div>
		    <div onclick="location.href='www.twitter.com/yashm95';" class="pointer-onhover tw"></div>
		    <div onclick="location.href='in.linkedin.com/in/yashmehrotra';" class="pointer-onhover li"></div>
		    <div onclick="location.href='github.com/yashmehrotra/';" class="pointer-onhover gi"></div>
		</div>
		<h2 class="head-text">About BookAway</h2>
		<div class="bookaway-desc-wrap">
		    <p class="bookaway-desc">
			Tired of searching book stores for cheap, used books or books that pile up every semester? The regular trips to library to save the big sum?<br>Here is a solution.<br>
			BookAway provides you with a platform where you can buy books from a large list of sellers or you can sell your book and become the seller. Not only you can buy or sell books but it also allows you to give/take a book on rent on a weekly or a monthly basis.<br><br>
			Why BookAway?<br>
			<ol class="bookaway-desc-ol">
			    <li>We do not ask you to sign up. Thus, relieving you from the irritating logging process.</li>
			    <li>Buyer directly deals with the seller. We ask the seller's contact information, thus making it easier for the buyer to arrange a deal with the seller.</li>
			    <li>Filter your search college wise, so that you see only relevant content.</li>
			</ol>
		    </p>
		</div>
	    </div>
	    <?php
	        require_once('footer.php');
	    ?>
	</div>
    </body>
</html>
