<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BooksforBucks | FAQs</title>
	<link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
	<script src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/top-panel.js"></script>
	<script src="Scripts/scroll.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			$('#faq-main-container .ques').click(function(){
				$(this).next().slideToggle(400);
			});
		});
	</script>
</head>
<body>
	<img src="Styles/Images/favicon1.png" id="favicon">
	<?php
	require_once('topbar.php');
	?>
	<div class="main-heads">
		<h2>FAQs</h2>
	</div>
	<div id="faq-main-container">
		<h2 class="ques">How to buy books?</h2>
		<div class="ans"><i>Click on the Buy tab. Search the book you want to buy and click on the book’s name. Book’s owner name and mobile number will be displayed above. Call the seller and make the deal.</i></div>
		<h2 class="ques">How to sell books?</h2>
		<div class="ans"><i>Click on the Sell tab. Fill out the form and click on submit. Note the Book Id that appears after you successfully submit your book.</i></div>
		<h2 class="ques">How to rent books?</h2>
		<div class="ans"><i>Click on the Rent tab. Fill out the form. Fill the renting price and the renting period. Click on submit.</i></div>
		<h2 class="ques">Can the book be added for both Sell and Rent?</h2>
		<div class="ans"><i>Yes. While filling the form, choose the option “Both Sale and Rent” in the ‘The book is For’ tab.</i></div>
		<h2 class="ques">Is the book id important?</h2>
		<div class="ans"><i>Yes. This id will be used in case you want to edit the details about the book you have added.</i></div>
		<h2 class="ques">Can we remove or change the details about the book added?</h2>
		<div class="ans"><i>Yes. Click on edit tab and fill up your e-mail address, book id and password. To remove the book click on the "Delete" tab. To submit the edited details, click on "Submit" tab.</i></div>
		<h2 class="ques">I have added my book for rent first. Is it possible to keep it for both sale and rent?</h2>
		<div class="ans"><i>Yes it can be done. Click on the edit tab and change it.</i></div>
	</div>
		
	<div class="bottom-panel">
		<ul class="bottom-panel-list">
			<li class="home-about-contact"><a href="index.php" class="bottom-links">Home</a></li>
			<li class="home-about-contact"><a href="about.php" class="bottom-links">About</a></li>
			<li class="home-about-contact"><a href="contact.php" class="bottom-links">Contact</a></li>
		</ul>
	</div>
		<div id="co-developed">
			<code>Copyright</code><code>2014 .All Rights Reserved. Booksforbucks.com</code>
		</div>
	</div>
</body>
</html>