<!-- <select name="clg-select" class="sell-input" id="search-filters-college-search"  autofocus="autofocus" autocorrect="off" autocomplete="off" placeholder="Select College">
	<option value="">Select College</option>
	<option value="JIIT Sector-62, Noida" data-alternative-spellings="Jaypee Institute of Information Technology" data-relevancy-booster="1.5">JIIT Sector-62, Noida</option>
	<option value="JIIT Sector-128, Noida" data-alternative-spellings="Jaypee Institute of Information Technology">JIIT Sector-128, Noida</option>
	<option value="IIIT Delhi" data-alternative-spellings="Indian Institute of Information Technology">IIIT Delhi</option>
	<option value="IIIT Hyderabad" data-alternative-spellings="Indian Institute of Information Technology">IIIT Hyderabad</option>
	<option value="DTU Delhi" data-alternative-spellings="Delhi Technical University">DTU Delhi</option>
</select> -->

<?php
	require_once('settings.php');

	$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);
	
	//Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$SELECT_FIXED_BEGIN = '<select name="clg-select" class="sell-input" id="search-filters-college-search"  autofocus="autofocus" autocorrect="off" autocomplete="off" placeholder="Select College"><option value="">Select College</option>';
	$SELECT_FIXED_END = '</select>';

	$query = "SELECT * FROM `tbl_colleges`";
	$colleges_data = mysqli_query($database_connection,$query);

		echo $SELECT_FIXED_BEGIN;
		while($row = mysqli_fetch_array($colleges_data)) {
			// $sql_result_id = $row['id'];
			$sql_result_college = $row['college'];
			$sql_result_data_alternative_spellings = $row['data-alternative-spellings'];
			$sql_result_data_relevancy_booster = $row['data-relevancy-booster'];
			$options_result = "<option value='".$sql_result_college."' data-alternative-spellings='".$sql_result_data_alternative_spellings."' data-relevancy-booster='".$sql_result_data_relevancy_booster."'>".$sql_result_college."</option>";
			echo $options_result;
	}
	echo $SELECT_FIXED_END;

	mysqli_close($database_connection);
?>