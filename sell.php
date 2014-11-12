<?php
    // Implementation of captcha
    // select a random no., ask user to input the same no. , put that no. in a hidden div , check in sqldata.php to see if the user is a human or
    // bot by matching the no.
    // Also see in backend whether all fields are empty or not
    $captcha_gen = rand(100000,999999);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sell Books | Bookaway.in</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
	<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.core.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.position.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.menu.js"></script>
	<script type="text/javascript" src="Scripts/jquery.ui.autocomplete.js"></script>
	<script type="text/javascript" src="Scripts/sellpage.js"></script>
	<script src="Scripts/google_analytics.js"></script>
	<script src="Scripts/top-panel.js"></script>
</head>
<body>
    <div class="outer-page-wrap">
        <?php
            require_once('header.php');
        ?>
        <div class="page-header" id="sell-main-head">
            <h2 id="sell-books-text">Sell Books</h2>
        </div>
        <article class="instructions" id="sell-instructions">
                <h2>Instructions:</h2>
                <ol class="instructions-list">
                    <li class="instructions-list-item">The form given below is divided into 2 steps:<br>
                        a) Personal info - name, email, phone no, password, college name (cannot be edited later).<br>
                        b) Book info - book name, author, sell/rent price (can be edited later through edit option)
                    </li>
                    <li class="instructions-list-item">On successfull submission, a book id will be displayed which will be useful for you to later edit the details about the book you added.</li>
                    <li class="instructions-list-item"><u>Note:</U> Fields marked with * are compulsary.</li>
                </ol>
        </article>
        <div class="main-containers container-style" id="sell-container">
            <div id="sell-form-wrap">
                <form class="pure-form pure-form-stacked" id="sell-form" novalidate>
                    <div class="pure-g">

                        <fieldset>
                            <legend>Personal Information</legend>
                            <input type="text" name="name" id="name" class="sell-input" placeholder="Full Name" autocomplete="on"><p class="compulsary-label">*</p>  <div id="error_name"></div>
                            <br>
                            <input type="email" name="email" id="email" class="sell-input" autocomplete="on" placeholder="Email"><p class="compulsary-label">*</p>  <div id="error_email"></div>
                            <br>
                            <input placeholder="+91" disabled class="sell-input" id="before-phone"> <input type="tel" name="phone" id="phone" class="sell-input" autocomplete="on" placeholder="Mobile Number"><p class="compulsary-label">*</p>  <div id="error_phone"></div>
                            <br>
                            <input type="password" name="password" class="sell-input" placeholder="Password(at least 4 characters)" id="password"><p class="compulsary-label">*</p> <span class="ion-eye" title="Show Password" id="show-password"></span><img src="Styles/Images/help.jpg" id="help"> <span id="help-popup">Password can be used to later edit the submitted details or to delete the book when it is sold!</span> <div id="error_pass"></div>
                            <br>
                            <input type="text" name="clg" id="sell-clg" class="sell-input" autocomplete="on" placeholder="Select College/Institute"><br>
                        </fieldset>

                        <fieldset style="margin-top:10px;">
                            <legend>Book Details</legend>
                            <input id="select-subject" class="sell-input" placeholder="Select Category" disabled>
                            <select name="subject" id="subject" class="sell-input">
                                <?php
                                    require_once ('categories.php');
                                ?>
                            </select><p class="compulsary-label">*</p>
                            <div id="error_category"></div>
                            <br>
                            <input type="text" name="book" id="book" class="sell-input" autocomplete="on" placeholder="Book Title"><p class="compulsary-label">*</p>  <div id="error_book_name"></div>
                            <br>
                            <input type="text" name="author" id="author" class="sell-input" autocomplete="on" placeholder="Author"><p class="compulsary-label">*</p>  <div id="error_author"></div>
                            <br>
                            <textarea name="book-desc" id="book-desc" class="sell-input" autocomplete="on" maxlength="280" placeholder="Description(max 280 characters)"></textarea>
                            <br>
                            <div id='cover-image'></div>
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
                                <option value="sem">per Sem</option>
                            </select>
                            <div id="error_rent_price"></div>
                            <span id="captcha"><?php echo $captcha_gen; ?></span>
                            <input type="number" min="99999" name="captcha_user" class="sell-input" id="captcha-input" placeholder="Enter captcha">
                            <br>
                            <div id="error_captcha"></div>
                            <br><br>
                        </fieldset>

                        <div hidden>
                            <input type="text" id="source" name="source" value="add_book">
                            <!-- its better to take this directly into javascript rather than a hidden div -->
                            <input type="number" name="captcha_gen" value="<?php echo $captcha_gen;?>">
                        </div>
                    </div>
                    <button class="btn-success pure-btn" id="new-btn">Submit</button>
                </form>
            </div>
            <div id="entry">
                <div id="success-submit-wrap">
                    <br>
                    <p id="successful-text">Form Successfully Submitted.<br>
                    Hey, <span id="seller_name_span"></span><br>
                    Your book id is <span id="book_id_span" style="color: red;"></span> .<br>
                    Your response will be processed and implemented within a few hours.</p>
                </div>
                <div class="links-list">
                    <div class="links-box">
                        <a href="index" class="links">Return to homepage</a>
                    </div>
                    <div class="links-box">
                        <a href="sell" class="links">Sell another Book</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require_once('footer.php');
        ?>
    </div>
</body>
</html>
