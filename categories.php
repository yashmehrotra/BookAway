<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	echo "<option value=''>Select your category</option>";

	$query = "SELECT * FROM tbl_categories";
	$category_data = mysqli_query($database_connection,$query);

	while($row = mysqli_fetch_array($category_data)) {

		echo "<option value='".$row['category']."'>".$row['category']."</option>";
	}
?>