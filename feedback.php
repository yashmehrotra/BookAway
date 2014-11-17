<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Feedback | BookAway.in</title>
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery-2.1.1.min.js"></script>
	<script src="Scripts/google_analytics.js"></script>
	<script src="Scripts/top-panel.js"></script>
	<script type="text/javascript">
	$(function () {
		$('#feedback').attr('id','focus');
	});
	</script>
</head>
<body>
    <div class="outer-page-wrap">
        <?php
            require_once('header.php');
        ?>
        <div class="page-header">
            <h2>Feedback</h2>
        </div>
        <div class="main-containers" id="feedback-container">
            <iframe src="https://docs.google.com/forms/d/1FwnsMqoAITY6kA6r_srcASOnhbffkdXj1K0KWa6MOKg/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
            <img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:20px; left:48%; z-index:-1;">
        </div>
        <?php
            require_once('footer.php');
        ?>
    </div>
</body>
</html>