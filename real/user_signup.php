<?php

global $action, $id, $lang, $config;
include("include/common.php");


include("$config[template_path]/user_top.html");

if ($config[allow_user_signup] == "yes")
	{
?>

	<form action="user_form_submit.php" method="post">
	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">

	<tr><td colspan="2" class="row_main"><h3><? echo $lang[user_signup] ?></h3></td></tr>
	<tr>
		<td align="right" class="row_main"><b><? echo $lang[user_name] ?> <span class="required">*</span></b></td>
		<td align="left" class="row_main"> <input type="text" name="edit_user_name"></td>
	</tr>
	<tr>
		<td align="right" class="row_main"><b><? echo $lang[user_password] ?> <span class="required">*</span></b></b></td>
		<td align="left" class="row_main"> <input type="password" name="edit_user_pass"></td>
	</tr>
	
	<tr>
		<td align="right" class="row_main"><b><? echo $lang[user_password] ?></b> (<? echo $lang[again] ?>)<b><span class="required">*</span></b> </td>
		<td align="left" class="row_main"> <input type="password" name="edit_user_pass2"></td>
	</tr>
	
	<tr>
		<td align="right" class="row_main"><b><? echo $lang[user_email] ?></b> <b><span class="required">*</span></b></td>
		<td align="left" class="row_main"> <input type="text" name="user_email"></td>
	</tr>
<?

	global $conn;
	$sql = "SELECT field_type, field_name, field_caption, default_text, field_elements, rank, required from userFormElements ORDER BY rank, field_caption";
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);
	while (!$recordSet->EOF)
		{
		$field_type = $recordSet->fields[field_type];
		$field_name =  $recordSet->fields[field_name];
		$field_caption =  $recordSet->fields[field_caption];
		$default_text =  $recordSet->fields[default_text];
		$field_elements =  $recordSet->fields[field_elements];
		$required =  $recordSet->fields[required];
		
		$field_type = make_db_unsafe($field_type);
		$field_name = make_db_unsafe($field_name);
		$field_caption = make_db_unsafe($field_caption);
		$default_text = make_db_unsafe($default_text);
		$field_elements = make_db_unsafe($field_elements);
		$required = make_db_unsafe($required);
		renderFormElement($field_type, $field_name, $field_caption, $default_text, $field_elements, $required);
		
		$recordSet->MoveNext();
		} // end while
	renderFormElement("submit","","Submit", "", "", "", "");

	
?>
</form>
<tr><td colspan="2" align="center" class="row_main"><? echo $lang[required_form_text] ?></td></tr>
</table>


	
<?
	} // end if ($config[allow_user_signup] == "yes")
	else
	{
	// if users can't sign up...
	echo "<h3>$lang[no_user_signup]</h3>";
	}
include("$config[template_path]/user_bottom.html");
$conn->Close(); // close the db connection
?>