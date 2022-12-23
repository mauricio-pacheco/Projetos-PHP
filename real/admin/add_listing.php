<?php

global $action, $id, $lang, $conn, $config;
include("../include/common.php");
loginCheck('registered_user');


include("$config[template_path]/admin_top.html");

if ($action == "create_new_listing")

	// creates a new listing
	{
	if ($title == "")
		{
		echo "<p>$lang[admin_new_listing_enter_a_title]</p>";
		echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
		} // end if
		
	else
		{
		
		global $HTTP_POST_VARS, $pass_the_form, $userID;
		
		$pass_the_form = validateForm(listingsFormElements);
		
		if ($pass_the_form == "No")
			{
			// if we're not going to pass it, tell that they forgot to fill in one of the fields
			echo "<p>$lang[required_fields_not_filled]</p>";
			echo "<FORM><INPUT TYPE=\"BUTTON\" VALUE=\"$lang[back_button_text]\" onClick=\"history.back()\"></FORM>";
			}
		
		if ($pass_the_form == "Yes")
			{
			$title = make_db_safe($title);
			$notes = make_db_safe($notes);
			// what the program should do if the form is valid
			
			// generate a random number to enter in as the password (initially)
			// we'll need to know the actual listing id to help with retrieving the listing.
			// We'll be putting in a random number that we know the value of, we can easily
			// retrieve the listing id in a few moments
			
			$random_number = rand(1,10000);
			// check to see if moderation is turned on...
			if ($config[moderate_listings] == "no")
				{
				$set_active = "yes";
				}
			else
				{
				$set_active = "no";
				}
			
			// create the account with the random number as the password
			
			$expiration_date  = mktime (0,0,0,date("m")  ,date("d")+$config[days_until_listings_expire],date("Y"));

			$sql = "INSERT INTO listingsDB (title, notes, user_ID, active, creation_date, last_modified, expiration) VALUES ($title, '$random_number',  '$userID', '$set_active', ".$conn->DBDate(time()).",".$conn->DBTimeStamp(time()).",".$conn->DBDate($expiration_date).")";
			
			$recordSet = $conn->Execute($sql);
			if ($recordSet === false) log_error($sql);
			// then we need to retrieve the new listing id
			$sql = "SELECT id FROM listingsDB WHERE notes = '$random_number'";
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);
			while (!$recordSet->EOF)
				{
				$new_listing_id = $recordSet->fields[id]; // this is the new listing's ID number
				$recordSet->MoveNext();
				} // end while
			
			// now it's time to replace the password
			$sql = "UPDATE listingsDB SET notes = $notes WHERE ID = '$new_listing_id'";
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);
			// now that that's taken care of, it's time to insert all the rest
			// of the variables into the database
			
			$message = updateListingsData($new_listing_id, $userID);
			if ($message == "success")
				{
				echo "<p>$lang[admin_new_listing_created], $user_name</p>";
				
				if ($config[moderate_listings] == "yes")
					{
					// if moderation is turned on...
					echo "<p>$lang[admin_new_listing_moderated]</p>";
					}
				echo "<p><a href=\"edit_my_listings.php?edit=$new_listing_id\">$lang[you_may_now_edit_your_listing]</p>";
				log_action ("$lang[log_created_listing] $new_listing_id");
				if ($config[email_notification_of_new_listings] == "yes")
					{
					// if the site admin should be notified when a new listing is added
					global $config, $lang;
					$message = $_SERVER[REMOTE_ADDR]. " -- ".date("F j, Y, g:i:s a")."\r\n\r\n$lang[admin_new_listing]:\r\n$config[baseurl]/admin/listings_edit.php?edit=$new_listing_id\r\n";
					mail("$config[admin_email]", "$lang[admin_new_listing]", $message,"From: $config[admin_email]", "-f$config[admin_email]");
					} // end if
				
				} // end if
			else
				{
				echo "<p>$lang[alert_site_admin]</p>";
				} // end else
			} // end $pass_the_form == "Yes"
			
		} // end else


	} // end if $action == "create_new_listing"
else
	{
?>
	
	<form action="<? echo $php_self ?>" method="post">
	<input type="hidden" name="action" value="create_new_listing">
	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">

	<tr><td colspan="2" class="row_main"><h3><? echo $lang[admin_menu_add_a_listing] ?></h3></td></tr>
	<tr>
		<td align="right" class="row_main"><b><? echo $lang[admin_listings_editor_title] ?> <span class="required">*</span></b></td>
		<td align="left" class="row_main"> <input type="text" name="title"></td>
	</tr>
	<tr>
		<td align="right" class="row_main"><b><? echo $lang[admin_listings_editor_notes] ?></b><br><div class="small">(<? echo $lang[admin_listings_editor_notes_note] ?>)</div></td>
		<td align="left" class="row_main"><textarea name="notes" cols="40" rows="6"></textarea></td>
	</tr>
	
<?
	global $conn;
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	$sql = "SELECT id, field_type, field_name, field_caption, default_text, field_elements, rank, required from listingsFormElements ORDER BY rank, field_name";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	while (!$recordSet->EOF)
		{
		$id = $recordSet->fields[ID];
		$field_type = $recordSet->fields[field_type];
		$field_name = $recordSet->fields[field_name];
		$field_caption = $recordSet->fields[field_caption];
		$default_text = $recordSet->fields[default_text];
		$field_elements = $recordSet->fields[field_elements];
		$rank = $recordSet->fields[rank];
		$required = $recordSet->fields[required];
		
		$field_type = make_db_unsafe($field_type);
		$field_name = make_db_unsafe($field_name);
		$field_caption = make_db_unsafe($field_caption);
		$default_text = make_db_unsafe($default_text);
		$field_elements = make_db_unsafe($field_elements);
		$required = make_db_unsafe($required);
		
		renderFormElement($field_type, $field_name, $field_caption, $default_text, $field_elements, $required);
		
		$recordSet->MoveNext();
		} // end while
	renderFormElement("submit","","Submit", "", "", "");

?>


</form>
<tr><td colspan="2" align="center" class="row_main"><? echo $lang[required_form_text] ?></td></tr>
</table>


	
<?
		}// end if
include("$config[template_path]/admin_bottom.html");
$conn->Close(); // close the db connection
?>