<?php
	
	$database_connection=mysqli_connect("localhost","root","44rrff","bfb");

	//Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else {
		//echo "epic";
	}

	$query = "SELECT * FROM books";

	$book_data = mysqli_query($database_connection,$query);

	//$bookname = array();

	class Bookdata {
		public $book_name;
		public $book_author;
		public $seller_name;
		public $seller_phone;
	}

	$x = new Bookdata();
	$y = array();
	$i=0;

	while($row = mysqli_fetch_array($book_data)) {

		// array_push($bookname,$row['book']);
		$x->book_id = $row['id'];
		$x->book_name = $row['book'];
		$x->book_author = $row['author'];
		$x->seller_name = $row['name'];
		$x->seller_phone = $row['phone'];
		//array_push($y,$x);
		//echo $x->book_name;
		
		$y[$i]['book_id']       = $x->book_id;
		$y[$i]['book_name']     = $x->book_name;
		$y[$i]['author_name']   = $x->book_author;
		$y[$i]['seller_name']   = $x->seller_name;
		$y[$i]['seller_phone']  = $x->seller_phone;
		//echo $y;
		//print_r($y);
		$i=$i+1;

	}
	$response = json_encode($y);
	echo $response;

?>



