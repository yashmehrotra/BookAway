<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit Details | BookAway.in</title>
    <link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.core.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.position.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.menu.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.autocomplete.js"></script>
    <script src="Scripts/jquery-ui.min.js"></script>
    <script src="Scripts/jquery.select-to-autocomplete.js"></script>
    <script type="text/javascript" src="Scripts/delpage.js"></script>
    <script src="Scripts/header.js"></script>
  </head>
  <body>
    <?php
    require_once('header.php');
    ?>
    <div class="outer-page-wrap">
      <h2 class="head-text">edit details</h2>
      <div class="main-containers container-style" id="del-main-container">
        <div id="del-main">
          <p id="del-desc">
            To edit the details of your book or to remove the book you added,
            <br><br>
            Enter the following details:
          </p>
          <form id="del-form" class="pure-form pure-form-stacked" novalidate>
            <div class="sub"><input type="text" id="bookid" placeholder="Book ID" required></div><div id="del-error_bookid"></div>
            <div class="sub"><input type="password" id="password" placeholder="Password" required></div><div id="del-error_pass"></div>
            <div id="del-error_incorrect"></div>
            <input type="submit" value="Submit" id="submit">
          </form>
        </div>
        <div id="edit-form">
          <button id="delete-btn">Delete this book</button>
          <div id="edit-head">
            <div id="or"><h3 id="or-text">OR</h3></div>
            <p id="edit-desc">Edit the details you want and click on "Edit" button when finished.</p>
          </div>
          <form name="eform" class="pure-form pure-form-stacked" id="eform" method="POST" action="sqldata.php" novalidate>
            <div class="del-pure-g" id="del-pure-g-del">
              <input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on" required disabled>
              <br>
              <input type="email" name="email" id="email-form" class="sell-input" autocomplete="on" placeholder="Email" required disabled>
              <br>
              <input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number" required>  <div id="error_phone"></div>
              <br>
              <?php
              require_once('colleges.php');
              ?>
              <input id="select-subject" class="sell-input" placeholder="Select Category" disabled>
              <select name="subject" id="subject" class="sell-input" required>
                <?php
                require_once('categories.php');
                ?>
              </select>
              <div id="error_category"></div>
              <br>
              <input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Books Title" required>  <div id="error_book_name"></div>
              <br>
              <input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author" required> <div id="error_author"></div>
              <br>
              <textarea name="book-desc" id="book-desc" class="sell-input" autocomplete="on" maxlength="280" placeholder="Description(max 280 characters)"></textarea>
              <br>
              <input type="url" name="cover-url" class="sell-input" placeholder="Image URL of Book (Example-'http://..../book_cover.png')" id="cover-url"><div id="error_url"></div>
              <br>
              <input type="text" name="book-for" id="book-for" class="sell-input" placeholder="The Book is For" disabled>
              <select name="sellrent" id="sell-rent" class="sell-input">
                <option value="3" selected>Both Sale and Rent</option>
                <option value="1">Sale</option>
                <option value="2">Rent</option>
              </select>
              <br>
              <input type="number" min="0" name="sellprice" class="sell-input" id="s-cost" placeholder="Sale Cost(INR)"> <div id="error_sale_price"></div>
              <br>
              <input type="number" min="0" name="rentprice" class="sell-input" id="r-cost" autocomplete="on" placeholder="Rent Cost(INR)">
              <select name="rentpricetime" id="rent-price" class="sell-input">
                <option value="week">per Week</option>
                <option value="month">per Month</option>
                <option value="month">per Semester</option>
              </select>
              <div id="error_rent_price"></div>
              <div hidden>
                <input type="text" id="source" name="source" value="edit_book">
                <input type="text" id="book_id_hid" name="book_id_hid">
              </div>
              <br><br>
            </div>
            <button class="btn-success pure-btn" id = "del-new-btn">Edit</button>
          </form>
        </div>
        <div id="edit-success">Congratulations!!<br>You have successfully edited your response.</div>
      </div>
    </div>
    <?php
    require_once('footer.php');
    ?>
    <script src="Scripts/google_analytics.js"></script>
  </body>
</html>
