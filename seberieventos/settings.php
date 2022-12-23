<?php
	include('databaseConnection.php');
	
	// Grab the settings here for use in the script.
	$getSettings = mysql_query("SELECT * FROM settings WHERE id='1' LIMIT 1", $conn);
	if($getSettings) {
		extract(mysql_fetch_array($getSettings), EXTR_PREFIX_ALL, 's');
		$dayColor = $s_dayColor;
		$weekendColor = $s_weekendColor;
		$todayColor = $s_todayColor;
		$eventColor = $s_eventColor;
		$iteratorColor1 = $s_iteratorColor1;
		$iteratorColor2 = $s_iteratorColor2;
	} else {
		die("Could not get settings.");
	}
?>