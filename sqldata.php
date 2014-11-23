<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Note to prospective Recruiters - 
    // All of this code was written a long time back, as an attempt to learn php.
    // I know it is not as good as one would expect but it is not a true representation of my abilities.(Yes,I am more skilled than this)
    // I am an awesome php and python programmer with a superb foundation and a thirst for learning.
    // Do visit my github profile - www.github.com/yashmehrotra
    //
    // Thank You
    //
    // URGENT CONVERT EVERY BULLSHIT STUFF TO FUNCTIONS 

	$source = $_POST['source'];

	$allowed_domains = array('http://bookaway.in/sell', 'http://bookaway.in/sell.php', 'http://localhost/Books-for-bucks/sell.php', 'http://localhost/github/sell.php', 'http://localhost/github/sell');
	$reference_url = $_SERVER['HTTP_REFERER']; 
	
	if ($source == 'add_book' && in_array($reference_url, $allowed_domains) && $_POST['captcha_gen'] == $_POST['captcha_user'] ) {

		$name             = addslashes($_POST['name']);
		$email            = $_POST['email'];
		$phone            = $_POST['phone'];
		$password         = md5($_POST['password']);
		$category         = $_POST['subject'];
		$book             = addslashes($_POST['book']);
		$author           = addslashes($_POST['author']);
		$sell_rent        = $_POST['sellrent'];
		$sell_price       = $_POST['sellprice'];
		$rent_price       = $_POST['rentprice'];
		$rent_time        = $_POST['rentpricetime'];
		$image_source     = $_POST['cover-url'];
		$college          = addslashes($_POST['clg']);
		$book_description = addslashes($_POST['book-desc']);
		$date_added       = date("Y-m-d H:i:s", time());

		// Convert it all into functions
		//
		// Check Book Deletion

		//$query = "INSERT INTO books (name,email,phone,password,subject,book,author,sell_rent,sell_price,rent_price,rent_time,date_added) VALUES ('$name','$email','$phone','$password','$subject','$book','$author','$sell_rent','$sell_price','$rent_price','$rent_time','$date_added')";
		$query = "INSERT INTO tbl_books (category,book,author,sell_rent,sell_price,rent_price,rent_time,college,date_added,image_source,`book_description`) VALUES ('$category','$book','$author','$sell_rent','$sell_price','$rent_price','$rent_time','$college','$date_added','$image_source','$book_description')";
		mysqli_query($database_connection,$query);
		$book_id = mysqli_insert_id($database_connection);

		$query = "INSERT INTO tbl_seller (name,email,phone,password,college,book_id) VALUES ('$name','$email','$phone','$password','$college','$book_id')";
		mysqli_query($database_connection,$query);

		mysqli_close($database_connection);

		$response = array();
		
		$response['status']        = 'success';
		$response['seller_name']   = $name;
		$response['book_id']       = $book_id;
		$response['reference_url'] = $reference_url;

        $response = json_encode($response);
        echo $response;
        exit();

	} elseif ($source == 'add_book' && $_POST['captcha_gen'] != $_POST['captcha_user']) {

		$response = array();

		$response['status'] = 'wrong_auth';
        $response = json_encode($response);
        echo $response;
        exit();

	} elseif ($source == 'edit_user' ) {

		$edit_seller_email    = $_POST['user_email'];
		$edit_book_id         = $_POST['user_id'];
		$edit_seller_password = md5($_POST['user_password']);

		$query = "SELECT * FROM tbl_seller WHERE book_id='$edit_book_id'";
		$user_data = mysqli_query($database_connection,$query);

		$sql_user_data = mysqli_fetch_array($user_data);

		if ($edit_seller_password == $sql_user_data['password']) {
			
			$response = array();
			$query_nested = "SELECT * FROM tbl_books WHERE id='$edit_book_id'";

			$books_data = mysqli_query($database_connection,$query_nested);
			$row = mysqli_fetch_array($books_data);

			$response['status']           = 'success';
			$response['seller_name']      = $sql_user_data['name'];
			$response['seller_email']     = $sql_user_data['email'];
			$response['seller_phone']     = $sql_user_data['phone'];
			$response['category']         = $row['category'];
			$response['book_name']        = $row['book'];
			$response['author']           = $row['author'];
			$response['sell_rent']        = $row['sell_rent'];
			$response['sell_price']       = $row['sell_price'];
			$response['rent_price']       = $row['rent_price'];
			$response['rent_time']        = $row['rent_price'];
			$response['image_source']     = $row['image_source'];
			$response['book_description'] = $row['book_description'];

		} else {
			//Wrong id or password or email
			$response['status'] = 'failed';
			$response['error'] = 'wrong password , email or id';
		}
		
		mysqli_close($database_connection);
        $response = json_encode($response);
        echo $response;
        exit();

	} elseif ($source == 'edit_book') {

		$book_id        = $_POST['book_id_hid'];
		$new_phone      = $_POST['phone'];
		$new_subject    = addslashes($_POST['subject']);
		$new_book       = addslashes($_POST['book']);
		$new_author     = addslashes($_POST['author']);
		$new_sellrent   = $_POST['sellrent'];
		$new_sellprice  = $_POST['sellprice'];
		$new_rentprice  = $_POST['rentprice'];
		$new_renttime   = $_POST['rentpricetime'];

		if($new_sellrent == 1) {
			$new_rentprice = "";
		} else if ($new_sellrent == 2) {
			$new_sellprice = "";
		}

		$query = "UPDATE tbl_books SET category = '$new_subject', book = '$new_book', author = '$new_author', sell_rent = '$new_sellrent', sell_price = '$new_sellprice', rent_price = '$new_rentprice', rent_time = '$new_renttime' WHERE id = '$book_id'";
		mysqli_query($database_connection,$query);
		mysqli_close($database_connection);

		$response = array();
		$response['status'] = 'success';

        $response = json_encode($response);
        echo $response;
        exit();

	} elseif ($source == 'delete') {

		$delete_seller_id = $_POST['user_id'];
		$delete_seller_password = md5($_POST['user_password']);

		//$query = "DELETE FROM tbl_books WHERE id = '$delete_seller_id';\n"."DELETE FROM tbl_seller WHERE book_id = '$delete_seller_id' AND password = '$delete_seller_password'";
		$query = "DELETE FROM tbl_books WHERE id = '$delete_seller_id'";
		mysqli_query($database_connection,$query);

		$query = "DELETE FROM tbl_seller WHERE book_id = '$delete_seller_id' AND password = '$delete_seller_password'";
		mysqli_query($database_connection,$query);
		
		mysqli_close($database_connection);
		
		$response = array();
		$response['status'] = 'success';

        $response = json_encode($response);
        echo $response;
        exit();

	} elseif ($source == 'view') {

        $college_id = $_POST['college_id'];
		
        $query = "SELECT * FROM tbl_colleges,tbl_books WHERE `tbl_colleges`.college = `tbl_books`.college AND `tbl_colleges`.id = '$college_id'";
		$book_data = mysqli_query($database_connection,$query);

		$response = array();
		$i=0;

		while($row = mysqli_fetch_array($book_data)) {

			$response[$i]['book_id']          = $row['id'];
			$response[$i]['book_name']        = $row['book'];
			$response[$i]['author_name']      = $row['author'];
			$response[$i]['category']         = $row['category'];
			$response[$i]['sell_rent']        = $row['sell_rent'];
			$response[$i]['sell_price']       = $row['sell_price'];
			$response[$i]['rent_price']       = $row['rent_price'];
			$response[$i]['rent_time']        = $row['rent_time'];
			$response[$i]['college']          = $row['college'];
			$response[$i]['image_source']     = $row['image_source'];
			$response[$i]['date_added']       = $row['date_added'];
			$response[$i]['book_description'] = $row['book_description'];

			$i+=1;

		}

		mysqli_close($database_connection);

        $response = json_encode($response);
        echo $response;
        exit();

    } elseif ($source == 'search') {
		
        $category = $_POST['search_category'];
        $search_value = addslashes($_POST['search_value']);

        if ($category == "Books") {

            $query = "SELECT *  FROM `tbl_books` WHERE `book` LIKE '".$search_value."'";
        } elseif ($category == "Author") {

            $query = "SELECT *  FROM `tbl_books` WHERE `author` LIKE '".$search_value."'";
        }

        $response = array();
        $i=0;

        $search_data = mysqli_query($database_connection,$query);

        while($row = mysqli_fetch_array($search_data)) {

            $response[$i]['book_id']           = $row['id'];
            $response[$i]['book_name']         = $row['book'];
            $response[$i]['author_name']       = $row['author'];
            $response[$i]['category']          = $row['category'];
            $response[$i]['sell_rent']         = $row['sell_rent'];
            $response[$i]['sell_price']        = $row['sell_price'];
            $response[$i]['rent_price']        = $row['rent_price'];
            $response[$i]['rent_time']         = $row['rent_time'];
            $response[$i]['date_added']        = $row['date_added'];
            $response[$i]['image_source']      = $row['image_source'];
            $response[$i]['book_description']  = $row['book_description'];

            $i=$i+1;
        }

        mysqli_close($database_connection);

        $response = json_encode($response);
        echo $response;
        exit();

    } elseif ($source == 'seller_data') {

        $book_id = $_POST['book_id'];

        $query = "SELECT * FROM tbl_seller WHERE book_id = '$book_id'";

        $response = array();

        $search_data = mysqli_query($database_connection,$query);
        $row = mysqli_fetch_array($search_data);

        $response['seller_name']     = $row['name']; 
        $response['seller_email']    = $row['email'];
        $response['seller_phone']    = $row['phone'];
        $response['seller_college']  = $row['college'];

        mysqli_close($database_connection);

        $response = json_encode($response);
        echo $response;
        exit();

    } elseif ($source == 'college_list') {

        $query = "SELECT * FROM tbl_colleges";
        $college_list = mysqli_query($database_connection,$query);

        $response = array();
        $i=0;

        while($row = mysqli_fetch_array($college_list)) {

            $response[$i] = $row['college'];
            $response['reference_url'] = $reference_url;

            $i=$i+1;
        }

		mysqli_close($database_connection);
        
        $response = json_encode($response);
        echo $response;
        exit();

	} else {
		
        $response = "hi".$source;
        mysqli_close($database_connection);
        $response = json_encode($response);
        echo $response;
        exit();
	}

    // Functions here
    // Do test them before deployment
    

    function add_book($name, $email, $phone, $password, $category, $book, $author, $sell_rent, $sell_price, $rent_price, $rent_time, $image_source, $college,$book_description, $date_added) {

        $query = "INSERT INTO tbl_books (category,book,author,sell_rent,sell_price,rent_price,rent_time,college,date_added,image_source,`book_description`) VALUES ('$category','$book','$author','$sell_rent','$sell_price','$rent_price','$rent_time','$college','$date_added','$image_source','$book_description')";
        mysqli_query($database_connection,$query);
        $book_id = mysqli_insert_id($database_connection);
        
        $query = "INSERT INTO tbl_seller (name,email,phone,password,college,book_id) VALUES ('$name','$email','$phone','$password','$college','$book_id')";
        mysqli_query($database_connection,$query);

        mysqli_close($database_connection);

        $response = array();
        
        $response['status']        = 'success';
        $response['seller_name']   = $name;
        $response['book_id']       = $book_id;
        $response['reference_url'] = $reference_url;

        $response = json_encode($response);
        echo $response;
        exit();

    }

    function college_list() {

        $query = "SELECT * FROM tbl_colleges";
        $college_list = mysqli_query($database_connection,$query);

        $response = array();
        $i=0;

        while($row = mysqli_fetch_array($college_list)) {

            $response[$i] = $row['college'];
            $response['reference_url'] = $reference_url;

            $i+=1;
        }

        mysqli_close($database_connection);
        
        $response = json_encode($response);
        echo $response;
        exit();

    }

    function seller_data($book_id) {

        $query = "SELECT * FROM tbl_seller WHERE book_id = '$book_id'";

        $response = array();

        $search_data = mysqli_query($database_connection,$query);
        $row = mysqli_fetch_array($search_data);

        $response['seller_name']     = $row['name']; 
        $response['seller_email']    = $row['email'];
        $response['seller_phone']    = $row['phone'];
        $response['seller_college']  = $row['college'];

        mysqli_close($database_connection);

        $response = json_encode($response);
        echo $response;
        exit();

    }

?>



