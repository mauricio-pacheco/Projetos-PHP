<?php

global $conn, $lang, $config, $cur_page;
include("../include/common.php");
loginCheck('canViewLogs');

include("$config[template_path]/admin_top.html");


echo "<h3>$lang[log_viewer]</h3>";
// find the number of log items
$sql="SELECT * FROM activityLog ORDER BY id DESC";
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);
$num_rows = $recordSet->RecordCount();
	
next_prev($num_rows, $cur_page, ""); // put in the next/previous stuff
	
// build the string to select a certain number of users per page
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$limit_str = $cur_page * $config[listings_per_page];
$recordSet = $conn->SelectLimit($sql, $config[listings_per_page], $limit_str );
	if ($recordSet === false) log_error($sql);
	
$count = 0;
echo "<br><br>";
?>
<table border="<? echo $style[admin_listing_border] ?>" cellspacing="<? echo $style[admin_listing_cellspacing] ?>" cellpadding="<? echo $style[admin_listing_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">
<tr>
	<td class="row_main"><b>ID</b></td>
	<td class="row_main"><b>Date</b></td>
	<td class="row_main"><b>User (IP)</b></td>
	<td class="row_main"><b>Action</b></td>
</tr>
<?
$count = 0;
while (!$recordSet->EOF)
	{
		
	// alternate the colors
	if ($count == 0)
		{
		$count = $count +1;
		}
	else
		{
		$count = 0;
		}
	$log_id = $recordSet->fields[id];
	$log_date = $recordSet->UserTimeStamp($recordSet->fields[log_date],'D M j G:i:s T Y');
	$log_user =  $recordSet->fields[user]; 
	$log_action =  $recordSet->fields[action];
	$log_ip =  $recordSet->fields[ip_address];
	?>
	
	<tr>
		<td class="row3_<? echo $count ?>"><span class="small"><? echo $log_id ?></span></td>
		<td class="row3_<? echo $count ?>"><span class="small"><? echo $log_date ?></span></td>
		<td class="row3_<? echo $count ?>"><span class="small"><? echo $log_user ?> (<? echo $log_ip ?>)</span></td>
		<td class="row3_<? echo $count ?>"><span class="small"><? echo $log_action ?></span></td>
	</tr>
	
	<?
	$recordSet->MoveNext();
	} // end while
	?>	
</table>
<?
include("$config[template_path]/admin_bottom.html");
$conn->Close(); // close the db connection
?>



