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
	}

	$x = new Bookdata();
	$y = array();
	$i=0;

	while($row = mysqli_fetch_array($book_data)) {

		// array_push($bookname,$row['book']);
		$x->book_name = $row['book'];
		$x->book_author = $row['author'];
		//array_push($y,$x);
		//echo $x->book_name;
		
		$y[$i]['bookname']=$x->book_name;
		$y[$i]['authorname']=$x->book_author;
		//echo $y;
		//print_r($y);
		$i=$i+1;

	}
	$response = json_encode($y);
	echo $response;

?>



