<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        <!--Title Here-->
    </title>
    <link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
    <script src="Scripts/jquery-2.1.1.min.js"></script>
    <script src="Scripts/google_analytics.js"></script>
    <script src="Scripts/top-panel.js"></script>
</head>
<body>
    <?php
        require_once('header.php');
    ?>
    <div class="page-header">
    <h2>
        <!--Heading Here-->
        404, Looks like you took a wrong turn
    </h2>
    </div>
    <!--Mention id of the container-->
    <div class="main-containers" id="-container">   
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