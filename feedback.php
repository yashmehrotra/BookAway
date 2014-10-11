<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Feedback | Bookaway.in</title>
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery-2.1.1.min.js"></script>
	<script src="Scripts/google_analytics.js"></script>
	<script src="Scripts/top-panel.js"></script>
	<script src="Scripts/feedbackpage.js"></script>
	<script type="text/javascript">
	$(function () {
		$('#feedback').attr('id','focus');
	});
	</script>
</head>
<body>
	<?php
		require_once('header.php');
	?>
	<div class="page-header">
		<h2>Feedback</h2>
	</div>
	<div class="main-containers" id="feedback-container">
		<iframe src="https://docs.google.com/forms/d/1FwnsMqoAITY6kA6r_srcASOnhbffkdXj1K0KWa6MOKg/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
	</div>
	<?php
		require_once('footer.php');
	?>	
</body>
</html>