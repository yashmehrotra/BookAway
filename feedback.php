<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Feedback | BookAway.in</title>
    <link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
    <script src="Scripts/jquery-2.1.1.min.js"></script>
    <script src="Scripts/google_analytics.js"></script>
    <script src="Scripts/top-panel.js"></script>
    <script src="Scripts/feedbackpage.js"></script>
  </head>
  <body>
    <?php
    require_once('header.php');
    ?>
    <div class="outer-page-wrap">
      <h2 class="head-text">feedback</h2>
      <div class="main-containers" id="feedback-container">
        <iframe src="https://docs.google.com/forms/d/1FwnsMqoAITY6kA6r_srcASOnhbffkdXj1K0KWa6MOKg/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0"></iframe>
        <img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:20px; left:48%; z-index:-1;" alt="Loading-image">
      </div>
    </div>
    <?php
    require_once('footer.php');
    ?>
  </body>
</html>
