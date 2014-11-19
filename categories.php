<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$current_url = $_SERVER["REQUEST_URI"];
	$sell_url = "sell";
	$buy_url = "buy";
	$edit_url = "del";
	
	$sql_result = "";
	
	$sell_fixed = "<option value=''>Select category</option>";

	$buy_fixed = '<div class="sub-cbox"><label><input type="checkbox" class="sub-cbox-input" id="checkbox-all" value="All" checked>All</label><br></div>';

	$query = "SELECT * FROM `tbl_categories` ORDER BY `category` ASC ";
	$category_data = mysqli_query($database_connection,$query);

	if (strstr($current_url,$sell_url) || strstr($current_url,$edit_url)) {
		echo $sell_fixed;
		while($row = mysqli_fetch_array($category_data)) {
			$sql_result = $row['category'];
			$sell_result = "<option value='".$sql_result."'>".$sql_result."</option>";
			echo $sell_result;
		}

	} elseif (strstr($current_url,$buy_url)) {
		echo $buy_fixed;
		while($row = mysqli_fetch_array($category_data)) {
			$sql_result = $row['category'];
			$buy_result = '<div class="sub-cbox"><label><input type="checkbox" class="sub-cbox-input" value="'.$sql_result.'"">'.$sql_result.'</label><br></div>';
			echo $buy_result;
		}
	} else {
		echo "abcd";
		echo $current_url;
		if (strstr($current_url,'categories')) {
			echo "yash";
		}
	}

	mysqli_close($database_connection);
?>