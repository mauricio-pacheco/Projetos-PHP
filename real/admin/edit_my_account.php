<?php


include("../include/common.php");

loginCheck('user');

global $action, $id, $cur_page, $lang, $config;
global $conn, $userID;

include("$config[template_path]/admin_top.html");



if ($action == "update_user")
	{
	if ($edit_user_pass != $edit_user_pass2)
		{
		echo "<p>$lang[user_creation_password_identical]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end if
	elseif ($edit_user_pass == "")
		{
		echo "<p>$lang[user_creation_password_blank]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end elseif
	elseif ($user_email == "")
		{
		echo "<p>$lang[user_editor_need_email_address]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end elseif
	else
		{
		global $pass_the_form;
		$pass_the_form = validateForm(userFormElements);
		
		if ($pass_the_form == "No")
			{
			// if we're not going to pass it, tell that they forgot to fill in one of the fields
			echo "<p>$lang[required_fields_not_filled]</p>";
			}
	
		if ($pass_the_form == "Yes")
			{
			$user_email = make_db_safe($user_email);
			
			$md5_user_pass = md5($edit_user_pass);
			$md5_user_pass = make_db_safe($md5_user_pass);
			$sql = "UPDATE UserDB SET emailAddress = $user_email, user_password = $md5_user_pass, last_modified = ".$conn->DBTimeStamp(time())." WHERE ID = '$userID'";
			$recordSet = $conn->Execute($sql);
			if ($recordSet === false) log_error($sql);
			$message = updateUserData($userID);
			if ($message == "success")
				{
				// one has to ensure that the cookie containing the pass is reset
				// otherwise, one would have to log out and in again everytime
				// an account was updated
				$user_pass = $edit_user_pass;
				session_register("user_pass");
				echo "<p>$lang[user_editor_account_updated], $user_name</p>";
				} // end if
			else
				{
				echo "<p>$lang[alert_site_admin]</p>";
				} // end else
			} // end if $pass_the_form == "Yes"
		} // end else
	} // end if $action == "update_user"
else
	{
	?>
	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">

	<?
 	echo "<tr><td colspan=\"2\" class=\"row_main\"><h3>$lang[user_editor_modify_user]</h3>";
 	?>
	<tr>
		<td width="<? echo $style[image_column_width] ?>" valign="top" align="center" class="row_main">
			<b><? echo $lang[images] ?></b>
			<br>
			<hr width="75%">
			<a href="edit_user_images.php?edit=<? echo $userID ?>"><? echo $lang[edit_images] ?></a><br><br>
			<?

			$sql = "SELECT caption, file_name, thumb_file_name FROM userImages WHERE user_id = '$userID'";
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);
				
			$num_images = $recordSet->RecordCount();
				
			while (!$recordSet->EOF)
				{
				$caption = make_db_unsafe ($recordSet->fields[caption]);
				$thumb_file_name = make_db_unsafe ($recordSet->fields[thumb_file_name]);
				$file_name = make_db_unsafe ($recordSet->fields[file_name]);
				
				// gotta grab the image size
				$imagedata = GetImageSize("$config[user_upload_path]/$thumb_file_name");
				$imagewidth = $imagedata[0];
				$imageheight = $imagedata[1];
				$shrinkage = $config[thumbnail_width]/$imagewidth;
				$displaywidth = $imagewidth * $shrinkage;
				$displayheight = $imageheight * $shrinkage;
					
				echo "<a href=\"$config[user_view_images_path]/$file_name\" target=\"_thumb\"> ";
					
				echo "<img src=\"$config[user_view_images_path]/$thumb_file_name\" height=\"$displayheight\" width=\"$displaywidth\"></a><br> ";
				echo "<b>$caption</b><br><br>";
				$recordSet->MoveNext();
				} // end while
			?>
			</td>
			<td valign="top" class="row_main">
				
	<?
	// first, grab the user's main info
	
	$sql = "SELECT * FROM UserDB WHERE ID = $userID";
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);
	while (!$recordSet->EOF)
		{
		// collect up the main DB's various fields
		$edit_user_name = make_db_unsafe ($recordSet->fields[user_name]);
		$edit_emailAddress = make_db_unsafe ($recordSet->fields[emailAddress]);
		$edit_comments = make_db_unsafe ($recordSet->fields[Comments]);
		$edit_isAdmin = $recordSet->fields[isAdmin];
		$edit_canEditForms = $recordSet->fields[canEditForms];
		$last_modified = $recordSet->UserTimeStamp($recordSet->fields[last_modified],'D M j G:i:s T Y');
		$recordSet->MoveNext();
		} // end while
	// now, display all that stuff
	

	
	echo "<table border=\"0\" cellspacing=\"$style[form_cellspacing]\" cellpadding=\"$style[form_cellpadding]\">";
	echo "<form name=\"updateUser\" action=\"$PHP_SELF\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"action\" value=\"update_user\">";
	echo "<tr><td align=\"right\" class=\"row_main\"><b>$lang[user_name]:</b></td><td align=\"left\" class=\"row_main\">$edit_user_name</td></tr>";
	echo "<tr><td align=\"right\" class=\"row_main\"><b>$lang[last_modifed]:</b></td><td align=\"left\">$last_modified</td></tr>";
	echo "<tr><td align=\"right\" class=\"row_main\"><b>$lang[user_password]: <span class=\"required\">*</span></b></td><td align=\"left\" class=\"row_main\"> <input type=\"password\" name=\"edit_user_pass\" value=\"\"></td></tr>";
	echo "<tr><td align=\"right\" class=\"row_main\"><b>$lang[user_password] ($lang[again]) <span class=\"required\">*</span></b> </td><td align=\"left\" class=\"row_main\"> <input type=\"password\" name=\"edit_user_pass2\"></td></tr>";
	echo "<tr><td align=\"right\" class=\"row_main\"><b>$lang[user_email]: <span class=\"required\">*</span></b></td><td align=\"left\" class=\"row_main\"> <input type=\"text\" name=\"user_email\" value=\"$edit_emailAddress\"> ";
	
	
	
	// now grab miscellenous debris
	$sql = "SELECT UserDBElements.field_name, UserDBElements.field_value, userFormElements.field_type, userFormElements.rank, userFormElements.field_caption, userFormElements.default_text, userFormElements.required, userFormElements.field_elements FROM UserDBElements, userFormElements WHERE ((UserDBElements.user_id = '$userID') AND (UserDBElements.field_name = userFormElements.field_name)) ORDER BY userFormElements.rank";
	$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);
	while (!$recordSet->EOF)
		{
		$field_name = make_db_unsafe ($recordSet->fields[field_name]);
		$field_value = make_db_unsafe ($recordSet->fields[field_value]);
		$field_type = make_db_unsafe ($recordSet->fields[field_type]);
		$field_caption = make_db_unsafe($recordSet->fields[field_caption]);
		$default_text = make_db_unsafe($recordSet->fields[default_text]);
		$field_elements = make_db_unsafe($recordSet->fields[field_elements]);
		$required = make_db_unsafe($recordSet->fields[required]);
		
		// pass the data to the function
		renderExistingFormElement($field_type, $field_name, $field_value, $field_caption, $default_text, $required, $field_elements);
		$recordSet->MoveNext();
		} // end while
	
	echo "<tr><td colspan=\"2\" align=\"center\" class=\"row_main\">$lang[required_form_text]</td></tr>";

	echo "<tr><td colspan=\"2\" align=\"center\" class=\"row_main\"><input type=\"submit\" value=\"$lang[update_button]\"></td></tr></table></form>";
	
	} // end if
?>
</td></tr></table>

<P>
</P>

<?
include("$config[template_path]/admin_bottom.html");
$conn->Close(); // close the db connection
?>
