<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "SELECT * FROM books";

	$book_data = mysqli_query($database_connection,$query);

	$Book_JSON = array();
	$i=0;

	while($row = mysqli_fetch_array($book_data)) {

		$Book_JSON[$i]['book_id']       = $row['id'];
		$Book_JSON[$i]['book_name']     = $row['book'];
		$Book_JSON[$i]['author_name']   = $row['author'];
		$Book_JSON[$i]['seller_name']   = $row['name'];
		$Book_JSON[$i]['seller_phone']  = $row['phone'];

		$i=$i+1;

	}
	
	$response = json_encode($Book_JSON);
	echo $response;

?>



