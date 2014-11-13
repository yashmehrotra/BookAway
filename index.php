<!DOCTYPE html>
<html>
<head>
	<title>Bookaway.in | Buy | Sell | Rent | Books</title>
	<meta name="Description" content="Bookaway.in - Online portal for buying, selling and renting books. With a user-friendly interface, books can be bought, sold and rented under various categories such as IT, computers, electronics, mathematics, novels, physics, and more.">
	<meta name="Keywords" content="book,books,jiit,used,buy,sell,rent,textbook,india,IT,computers,electronics,mathematics,literature,novels,physics,music,medical">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="shortcut icon" href="favicon.ico">
	<script src="Scripts/jquery-2.1.1.min.js"></script>
	<script src="Scripts/google_analytics.js"></script>
	<script src="Scripts/top-panel.js"></script>
	<script type="text/javascript" src="Scripts/hide_overflow_ribbon.js"></script>
	<script type="text/javascript">

		$(function(){

			$('#home').css({'border-bottom':'2px solid white', 'background-color':'gray'});
			$('.header').css({'opacity':'0.7'});
			$('footer').css({'background-color':'transparent', 'position':'fixed', 'bottom':'0px'});
			$('#copyright').css('background-color','#282828');
			$('#header-list').css('marginLeft','210px');
		});

	</script>

</head>
<body>
    <div class="outer-page-wrap">
        <?php
            require_once('header_index.php');
        ?>
        <img id="back-img" src="Styles/Images/index-wallpaper.jpg">
        <div class="main-containers" id="index-container">
            <div id="content-slider">
                <h2 style="color:white; font-size:80px; font-family:Ubuntu; line-height:130%; margin:0;">Bookaway.in</h2>
                <p style="color:white; font-size:40px; font-family:Ubuntu; line-height:150%; text-align:center; margin:25px; ">Online Portal<br>to<br>BUY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SELL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RENT<br>books</p>
            </div>
        </div>
        <?php
            require_once('footer.php');
        ?>
    </div>
</body>
</html>
