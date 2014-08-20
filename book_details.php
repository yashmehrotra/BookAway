<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		<!--Title Here-->
	</title>
	<link rel="stylesheet" type="text/css" href="Styles/ribbons.css">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
</head>
<body>
	<?php
		require_once('topbar.php');
	?>
	<div class="main-heads">
	<h2>
		<!--Heading Here-->
	</h2>
	</div>
	<!--Mention id of the container-->
	<div id="-container">	
		<div id="book-details">
			<!--Book Details will be displayed here-->
		</div>
		<div id="seller-details">
			<!--Seller Details will be displayed here-->
		</div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>