<?php
require_once('settings.php');

$database_connection = mysqli_connect($host_name, $user_name, $mysql_password, $database_name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$SELECT_BEGIN = '<select name="clg" class="sell-input" id="search-filters-college-search" autofocus autocorrect="off" autocomplete="off" placeholder="Select College">
<option value="">Select College</option>';
$SELECT_END   = '</select>';

$query = "SELECT * FROM `tbl_colleges`";
$colleges_data = mysqli_query($database_connection,$query);

echo $SELECT_BEGIN;
while($row = mysqli_fetch_array($colleges_data)) {
    $college_id            = $row['college_id'];
    $college_name          = $row['college'];
    $college_alt_spellings = $row['alt_spellings'];
    $college_rel_booster   = $row['rel_booster'];
    
    $options_result = "<option value='".$college_name."' data-college-id='".$college_id."'data-alternative-spellings='".$college_alt_spellings."' data-relevancy-booster='".$college_rel_booster."'>".$college_name."</option>";
    echo $options_result;
}
echo $SELECT_END;

mysqli_close($database_connection);
?>
