<!DOCTYPE html>
<html>
<head>
	<title>BookAway.in | Buy | Sell | Rent | Books</title>
	<meta name="Description" content="BookAway.in - Online portal for buying, selling and renting books. With a user-friendly interface, books can be bought, sold and rented under various categories such as IT, computers, electronics, mathematics, novels, physics, and more.">
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

			$('.header').css({'opacity':'0.7'});
			$('footer').css({'background-color':'transparent', 'position':'fixed', 'bottom':'0px'});
			$('#copyright').css('background-color','#282828');
		});

	</script>

</head>
<body id="index-body">
    <div class="outer-page-wrap">
        <?php
            require_once('header_index.php');
        ?>
        <div class="main-containers" id="index-container">
            <div id="content-slider">
                <h2>BookAway.in</h2>
                <p>Online Portal<br>to<br>BUY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SELL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RENT<br>books</p>
            </div>
        </div>
        <?php
            require_once('footer.php');
        ?>
    </div>
</body>
</html>
