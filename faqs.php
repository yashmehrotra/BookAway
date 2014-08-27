<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> FAQs | Bookaway.in</title>
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script>
		$(function(){
			$('#faqs').attr('id','focus');
		});
	</script>
</head>
<body>
	<?php
	require_once('header.php');
	?>
	<div class="page-header">
		<h2>FAQs</h2>
	</div>
	<div class="main-containers container-style" id="faqs-container">
		<h1 id="faqs-head">Frequently Asked Questions</h1>
		<h2 class="ques">How to buy books?</h2>
		<div class="ans"><i>Click on the Buy tab. Search the book you want to buy and click on the book’s name. Book’s owner name and mobile number will be displayed below. Call the seller and make the deal.</i></div>
		<h2 class="ques">How to sell books?</h2>
		<div class="ans"><i>Click on the Sell tab. Fill out the form and click on submit. Note the Book Id that appears after you successfully submit your book.</i></div>
		<h2 class="ques">How to rent books?</h2>
		<div class="ans"><i>Click on the Rent tab. Fill out the form. Fill the renting price and the renting period. Click on submit.</i></div>
		<h2 class="ques">Can the book be added for both Sale and Rent?</h2>
		<div class="ans"><i>Yes. While filling the form on sell page, by default the option “Both Sale and Rent” will be selected in the ‘The book is For’ tab.</i></div>
		<h2 class="ques">Is the book id important?</h2>
		<div class="ans"><i>Yes. This id will be used in case you want to edit the details about the book you have added or to remove the book after it has been sold.</i></div>
		<h2 class="ques">Can we remove or change the details about the book added?</h2>
		<div class="ans"><i>Yes. Click on edit tab and fill up your e-mail address, book id and password. To remove the book, click on the "Delete this Book" btn. To submit the edited details, click on "Edit" btn.</i></div>
		<h2 class="ques">I had added my book for rent first. Is it possible now to keep it for both sale and rent?</h2>
		<div class="ans"><i>Yes it can be done. Click on the edit tab and change it.</i></div>
	</div>
	<?php
		require_once('footer.php');
	?>
</body>
</html>
