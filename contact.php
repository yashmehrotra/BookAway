<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact Us | BookAway.in</title>
    <link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
    <link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
    <script src="Scripts/jquery-2.1.1.min.js"></script>
    <script src="Scripts/google_analytics.js"></script>
    <script src="Scripts/top-panel.js"></script>
  </head>
  <body>
    <?php
    require_once('header.php');
    ?>
    <div class="outer-page-wrap">
      <h2 class="head-text">get in touch.</h2>
      <div class="main-containers" id="contact-us-container">
        <span class="ion-android-location contact-icons"></span>
        <p id="address-text" class="contact-info">Jaypee Institute Of Information Technology,<br>A-10, Sector-62,<br>Noida, UP</p>
        <br>
        <span class="ion-email contact-icons"></span>
        <p id="email-text" class="contact-info">bookawayonline@gmail.com</p>
        <br><br>
        <span class="ion-android-call contact-icons"></span>
        <p id="mobile-number" class="contact-info">+91-9971958437, +91-9818936295</p>
        <iframe id="map-canvas" src="https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d1750.9958544472706!2d77.37144225832236!3d28.630010590408546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!1i0!3e0!4m0!4m3!3m2!1d28.630255599999998!2d77.3709573!5e0!3m2!1sen!2sin!4v1416563180503" width="500" height="450" frameborder="0" style="border:0"></iframe>
        <img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:200px; right:18%; z-index:-1;" alt="Loading-image">
      </div>
    </div>
    <?php
    require_once('footer.php');
    ?>
  </body>
</html>
