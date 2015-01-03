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
                    <div onclick="location.href='https://www.facebook.com/526avijitgupta';" class="pointer-onhover fb"></div>
                    <div onclick="location.href='http://www.twitter.com/526avijit';" class="pointer-onhover tw"></div>
                    <div onclick="location.href='https://www.linkedin.com/pub/avijit-gupta/9a/22/6';" class="pointer-onhover li"></div>
                    <div onclick="location.href='https://github.com/526avijitgupta';" class="pointer-onhover gi"></div>
                <p class="about-me">Write some random description about me!</p>
		</div>

                <div class="developer-profile" id="profile2">
                    <a href="Styles/Images/yash.jpg"><img src="Styles/Images/yash.jpg" class="profile-image" id="profile-image2" alt="img2"></a>
                    <p>Yash Mehrotra
                        <br><br>
                        Backend Developer
                    </p>
                    <div onclick="location.href='https://www.facebook.com/yashm95';" class="pointer-onhover fb"></div>
                    <div onclick="location.href='http://www.twitter.com/yashm95';" class="pointer-onhover tw"></div>
                    <div onclick="location.href='in.linkedin.com/in/yashmehrotra';" class="pointer-onhover li"></div>
                    <div onclick="location.href='https://github.com/yashmehrotra/';" class="pointer-onhover gi"></div>
		<p class="about-me">Write some random description about me!</p>
                </div>

                <div class="developer-profile" id="profile3">
                    <a href="Styles/Images/sidhant.jpg"><img src="Styles/Images/sidhant.jpg" class="profile-image" id="profile-image3" alt="img3"></a>
                    <p>Sidhant Sharma
                        <br><br>
                        Graphics Designer
                    </p>
                    <div onclick="location.href='https://www.facebook.com/sid.sharma15';" class="pointer-onhover fb"></div>
                    <div onclick="location.href='http://www.twitter.com/SidMail15';" class="pointer-onhover tw"></div>
                    <div onclick="location.href='http://in.linkedin.com/pub/sidhant-sharma/91/960/230';" class="pointer-onhover li"></div>
                    <div onclick="location.href='https://github.com/sid15sharma';" class="pointer-onhover gi"></div>
		<p class="about-me">Write some random description about me!</p>
                </div>
            </div>
            <?php
                require_once('footer.php');
            ?>
        </div>
	</body>
</html>
