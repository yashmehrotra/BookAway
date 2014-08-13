<?php

	$host_name = "localhost";
	$user_name = "root";
	$mysql_password = "im2gud";
	$database_name = "bfb";

	$database_con = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
  		$mysql_password = "44rrff";
	}

	$database_con = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	mysqli_close($database_con);
?>
