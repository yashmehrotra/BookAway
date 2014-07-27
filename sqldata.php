<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$source = $_POST['source'];
	
	if($source == 'edit') {

		$edit_seller_email = $_POST[''];
		$edit_book_id = $_POST[''];
		$edit_seller_password = md5($_POST['']);

		$query = "SELECT * FROM books WHERE id='$edit_book_id'";
		$edit_user_data = mysqli_query($database_connection,$query);

		$row = mysqli_fetch_array($edit_user_data);
		if($edit_seller_password == $row['password'] && $edit_seller_email == $row['email']) {

	// 		//Give all the data back
	// 		//Then through ajax , head it towards different file
	// 		//Where user can edit all of them
		}
		else {
	// 		//Wrong id or password or email
		}
	}
	
	else {

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
			$Book_JSON[$i]['seller_email']  = $row['email'];
			$Book_JSON[$i]['sell_rent']     = $row['sell_rent'];
			$Book_JSON[$i]['sell_price']    = $row['sell_price'];
			$Book_JSON[$i]['rent_price']    = $row['rent_price'];
			$Book_JSON[$i]['rent_time']     = $row['rent_time'];

			$i=$i+1;

		}
		
		$response = json_encode($Book_JSON);
		echo $response;
	}
	

?>



