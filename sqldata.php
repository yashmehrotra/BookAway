<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$source = $_POST['source'];
	
	if($source == 'add_book') {

		$name        = $_POST['name'];
		$email       = $_POST['email'];
		$phone       = $_POST['phone'];
		$password    = md5($_POST['password']);
		$subject     = $_POST['subject'];
		$book        = $_POST['book'];
		$author      = $_POST['author'];
		$sell_rent   = $_POST['sellrent'];
		$sell_price  = $_POST['sellprice'];
		$rent_price  = $_POST['rentprice'];
		$rent_time   = $_POST['rentpricetime'];

		$query = "INSERT INTO books (name,email,phone,password,subject,book,author,sell_rent,sell_price,rent_price,rent_time) VALUES ('$name','$email','$phone','$password','$subject','$book','$author','$sell_rent','$sell_price','$rent_price','$rent_time')";
		mysqli_query($database_connection,$query);

		$book_id = mysqli_insert_id($database_connection);
		mysqli_close($database_connection);

		$response = array();
		
		$response['status'] = 'success';
		$response['seller_name'] = $name;
		$response['book_id'] = $book_id;

		$response = json_encode($response);
		echo $response;
		exit();
	}

	elseif($source == 'edit_user' ) {

		$edit_seller_email = $_POST['user_email'];
		$edit_book_id = $_POST['user_id'];
		$edit_seller_password = md5($_POST['user_password']);

		$query = "SELECT * FROM books WHERE id='$edit_book_id'";
		$edit_user_data = mysqli_query($database_connection,$query);

		$row = mysqli_fetch_array($edit_user_data);
		$response = array();
		if($edit_seller_password == $row['password'] && $edit_seller_email == $row['email']) {

			$response['status'] = 'success';
			$response['seller_name']   = $row['name'];
			$response['seller_email']  = $row['email'];
			$response['seller_phone']  = $row['phone'];
			$response['subject']       = $row['subject'];
			$response['book_name']     = $row['book'];
			$response['author']        = $row['author'];
			$response['sell_rent']     = $row['sell_rent'];
			$response['sell_price']    = $row['sell_price'];
			$response['rent_price']    = $row['rent_price'];
			$response['rent_time']     = $row['rent_price'];

		}
		else {
			//Wrong id or password or email
			$response['status'] = 'failed';
			$response['error'] = 'wrong password , email or id';
		}
		mysqli_close($database_connection);

		$response = json_encode($response);
		echo $response;
		exit();
	}

	elseif ($source == 'edit_book') {

		$book_id        = $_POST['book_id_hid'];
		$new_phone      = $_POST['phone'];
		$new_subject    = $_POST['subject'];
		$new_book       = $_POST['book'];
		$new_author     = $_POST['author'];
		$new_sellrent   = $_POST['sellrent'];
		$new_sellprice  = $_POST['sellprice'];
		$new_rentprice  = $_POST['rentprice'];
		$new_renttime   = $_POST['rentpricetime'];

		$query = "UPDATE books SET phone = '$new_phone', subject = '$new_subject', book = '$new_book', author = '$new_author', sell_rent = '$new_sellrent', sell_price = '$new_sellprice', rent_price = '$new_rentprice', rent_time = '$new_renttime' WHERE id = '$book_id'"; //Set it for update
		mysqli_query($database_connection,$query);
		mysqli_close($database_connection);

		$response = array();
		$response['status'] = 'success';
		$response = json_encode($response);

		echo $response;
		exit();
	}
	elseif ($source == 'delete') {

		$delete_seller_id = $_POST['user_id'];
		$delete_seller_password = md5($_POST['user_password']);

		$query = "DELETE FROM books WHERE id = '$delete_seller_id' AND password = '$delete_seller_password'";
		mysqli_query($database_connection,$query);
		mysqli_close($database_connection);
		
		$response = array();
		$response['status'] = 'success';
		$response = json_encode($response);

		echo $response;
		exit();
	}
	
	elseif ($source == 'view') {

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
		exit();
	}
	

?>



