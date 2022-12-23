<?php

global $action, $id, $lang, $config;
include("../include/common.php");


include("$config[template_path]/admin_top.html");

if ($action != "createNewUser")
	{
?>

	<form action="<? echo $PHP_SELF ?>" method="post">
	<input type="hidden" name="action" value="createNewUser">
	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">

	<tr><td colspan="2" class="row_main"><h3><? echo $lang[create_new_user] ?></h3></td></tr>
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
	// is the user an administrator?
	echo "<tr><td align=right><b>$lang[user_editor_isAdmin]: </b></td>";
	echo "<td align=left><select name=\"edit_isAdmin\" size=\"1\"><option value=\"no\">no<option value=\"yes\">yes</select></td></tr>";	
		
	// can they edit forms?
	echo "<tr><td align=right><b>$lang[user_editor_can_edit_forms]: </b></td>";
	echo "<td align=left><select name=\"edit_canEditForms\" size=\"1\"><option value=\"no\">no<option value=\"yes\">yes</select></td></tr>";	
		
	// can they view logs?
	echo "<tr><td align=right><b>$lang[user_editor_view_logs]: </b></td>";
	echo "<td align=left><select name=\"edit_canViewLogs\" size=\"1\"><option value=\"no\">no<option value=\"yes\">yes</select></td></tr>";	
		
	// can they moderate incoming listings?
	echo "<tr><td align=right><b>$lang[user_editor_moderator]: </b></td>";
	echo "<td align=left><select name=\"edit_canModerate\" size=\"1\"><option value=\"no\">no<option value=\"yes\">yes</select></td></tr>";	
		
	// can they feature listings?
	echo "<tr><td align=right><b>$lang[user_editor_feature_listings]: </b></td>";
	echo "<td align=left><select name=\"edit_canFeatureListings\" size=\"1\"><option value=\"no\">no<option value=\"yes\">yes</select></td></tr>";	
		
	
	
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
	} // end ($action != "createNewUser")
	else
	{
	// create the user
	
	if ($edit_user_pass != $edit_user_pass2)
		{
		echo "<p>$lang[user_creation_password_identical]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end else
	elseif ($edit_user_pass == "")
		{
		echo "<p>$lang[user_creation_password_blank]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end else
	elseif ($edit_user_name == "")
		{
		echo "<p>$lang[user_editor_need_username]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end else
	elseif ($user_email == "")
		{
		echo "<p>$lang[user_editor_need_email_address]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end else
	else
		{
		$sql_user_name = make_db_safe($edit_user_name);
		
	
		global $HTTP_POST_VARS, $pass_the_form;
		$pass_the_form = "No";
		
		// first, make sure the user name isn't in use
		$sql = "SELECT user_name from UserDB WHERE user_name = $sql_user_name";
		$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
		$recordSet = $conn->Execute($sql);
			if ($recordSet === false) log_error($sql);
		$num = $recordSet->RecordCount();
		
		if ($num >= 1)
			{
			$pass_the_form = "No";
			$fail_message = "$lang[user_creation_username_taken]";
			} // end if
		
	
		else
			{
			// validate the user form
			$pass_the_form = validateForm(userFormElements);
			}
	
		if ($pass_the_form == "No")
			{
			// if we're not going to pass it, tell that they forgot to fill in one of the fields
			echo "<p>$lang[required_fields_not_filled]</p>";
			}
	
		if ($pass_the_form == "Yes")
			{
			// what the program should do if the form is valid
			
			// generate a random number to enter in as the password (initially)
			// we'll need to know the actual account id to help with retrieving the user
			// We will be putting in a random number that we know the value of, we can easily
			// retrieve the account id in a few moments
			
			$random_number = rand(1,10000);
			$sql_user_name = make_db_safe($edit_user_name);
			$md5_user_pass = md5($edit_user_pass);
			$md5_user_pass = make_db_safe($md5_user_pass);
			$sql_user_email = make_db_safe($user_email);
	
			// create the account with the random number as the password
			$sql = "INSERT INTO UserDB (user_name, user_password, emailAddress, creation_date, last_modified) VALUES ($sql_user_name, $random_number, $sql_user_email,".$conn->DBDate(time()).",".$conn->DBTimeStamp(time()).")";
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);
			// then we need to retrieve the new user id
			$sql = "SELECT id FROM UserDB WHERE user_password = '$random_number'";
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);		
			while (!$recordSet->EOF)
				{
				$new_user_id =  $recordSet->fields[id]; // this is the new user's ID number
				$recordSet->MoveNext();
				} // end while
				
			// now it's time to replace the password
			$sql = "UPDATE UserDB SET user_password = $md5_user_pass WHERE ID = $new_user_id";
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);	
			
			// next, we'll give the user the default set of privledges
			// defined in the common.php file
			
			$sql_edit_isAdmin =  make_db_safe($edit_isAdmin);
			$sql_edit_canEditForms =  make_db_safe($edit_canEditForms);
			$sql_edit_canFeatureListings =  make_db_safe($edit_canFeatureListings);
			$sql_edit_canViewLogs =  make_db_safe($edit_canViewLogs);
			$sql_edit_canModerate = make_db_safe($edit_canModerate);
			$sql = "UPDATE UserDB SET isAdmin = $sql_edit_isAdmin,";
			$sql .= "canEditForms = $sql_edit_canEditForms,";
			$sql .= "canFeatureListings = $sql_edit_canFeatureListings,";
			$sql .= "canViewLogs = $sql_edit_canViewLogs,";
			$sql .= "canModerate = $sql_edit_canModerate";
			$sql .= "WHERE ID = $new_user_id";
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);
			
			// now that that's taken care of, it's time to insert all the rest
			// of the variables into the database
			
			$message = updateUserData($new_user_id);
			if ($message == "success")
				{
				$user_name = make_db_unsafe($user_name);
				echo "<p>$lang[user_editor_creation_success]: $edit_user_name</p>";
				echo "<p><a href=\"user_edit.php?edit=$new_user_id\">$lang[user_editor_now_edit_user]</a></p>";
				log_action ("$lang[log_created_user]: $edit_user_name");
				} // end if
			else
				{
				echo "<p>$lang[alert_site_admin]</p>";
				} // end else
			} // end if
		} // end else
	
	
	} // end else create the user
include("$config[template_path]/admin_bottom.html");
$conn->Close(); // close the db connection
?>