<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$source = $_POST['source'];
	
	if($source == 'edit' ) {

		$edit_seller_email = $_POST['user_email'];
		$edit_book_id = $_POST['user_id'];
		$edit_seller_password = md5($_POST['user_password']);

		$query = "SELECT * FROM books WHERE id='$edit_book_id'";
		$edit_user_data = mysqli_query($database_connection,$query);

		$row = mysqli_fetch_array($edit_user_data);
		$response = array();
		if($edit_seller_password == $row['password'] && $edit_seller_email == $row['email']) {

	// 		//Give all the data back
			$response['status'] = 'success';
			$response['name']   = $row['name'];
	// 		//Then through ajax , head it towards different file
	// 		//Where user can edit all of them
		}
		else {
			//Wrong id or password or email
			$response['status'] = 'failed';
			$response['error'] = 'wrong password , email or id';
		}
		mysqli_close($database_connection);

		$response = json_encode($response);
		echo $response;
	}

	elseif ($source == 'delete') {

		$delete_seller_id = $_POST[''];
		$delete_seller_password = $_POST[''];

		$query = "DELETE FROM books WHERE id = '$delete_seller_id' AND password = '$delete_seller_password'";
		mysqli_query($database_connection,$query);
		mysqli_close($database_connection);
		
		$response = array();
		$response['status'] = 'success';
		$response = json_encode($response);

		echo $response;
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

		mysqli_close($database_connection);
		
		$response = json_encode($Book_JSON);
		echo $response;
	}
	

?>



