<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$SELECT_FIXED_BEGIN = '<select name="clg" class="sell-input" id="search-filters-college-search"  autofocus="autofocus" autocorrect="off" autocomplete="off" placeholder="Select College"><option value="">Select College</option>';
	$SELECT_FIXED_END = '</select>';

	$query = "SELECT * FROM `tbl_colleges`";
	$colleges_data = mysqli_query($database_connection,$query);

		echo $SELECT_FIXED_BEGIN;
		while($row = mysqli_fetch_array($colleges_data)) {
			$sql_result_id = $row['id'];
			$sql_result_college = $row['college'];
			$sql_result_data_alternative_spellings = $row['data-alternative-spellings'];
			$sql_result_data_relevancy_booster = $row['data-relevancy-booster'];
			$options_result = "<option value='".$sql_result_college."' data-college-id='".$sql_result_id."'data-alternative-spellings='".$sql_result_data_alternative_spellings."' data-relevancy-booster='".$sql_result_data_relevancy_booster."'>".$sql_result_college."</option>";
			echo $options_result;
	}
	echo $SELECT_FIXED_END;

	mysqli_close($database_connection);
?>