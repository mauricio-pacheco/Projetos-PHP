<?
// these are the shared functions for OpenListings

session_start();
session_register("session");



// HANDLE SECURITY
function loginCheck($priv_level_needed)	
//login authorization code
//handles everything to do with users logging in
	{
	global $conn, $config, $lang;
	global $username, $userpassword, $userID;
	global $user_name, $user_pass, $admin_privs, $editForms, $viewLogs, $featureListings, $moderator;
	
	if ($user_name == "" AND $username == "")
		{
		include("$config[template_path]/admin_top.html");
		echo "<p><form action=\"$PHP_SELF\" method=\"post\">$lang[admin_challenge_phrase]</P>";
		echo "<p>$lang[admin_login_name]: <input type=\"text\" name=\"user_name\"></p> ";
		echo "<p>$lang[admin_password]: <input type=\"password\" name=\"user_pass\"></p><p><input type=\"submit\" value=\"Log In\"></form></p>";
		echo "<form action=\"emailpass.php\"><p>$lang[enter_your_email_address_for_pass]<BR><input type=text name=email></p><p><input type=submit></form></p>";
		include("$config[template_path]/admin_bottom.html");
		exit;
	
 		} 
 	elseif ($user_name != "" OR $username != "")
		{
		$sql_user_name = make_db_safe($user_name);
		$md5_pass = md5($user_pass);
		$md5_pass = make_db_safe($md5_pass);
		global $username, $userpassword, $userID, $user_name, $user_pass, $editForms, $moderator;
		$sql = "SELECT * FROM UserDB WHERE user_name=$sql_user_name and user_password=$md5_pass";
		
		$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
		$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
		$num = $recordSet->RecordCount();

		if ($num == 1)
			{
			session_register("username");
			session_register("user_name");
			session_register("userpassword");
			session_register("user_pass");
			session_register("userID");
			session_register("featureListings");
			session_register("viewLogs");
			session_register("admin_privs");
			session_register("editForms");
			session_register("moderator");
			

			while (!$recordSet->EOF)
				{
				$userID = $recordSet->fields[ID];
				$username = $recordSet->fields[user_name];
				$userpassword = $recordSet->fields[user_password];
				$admin_privs = $recordSet->fields[isAdmin];
				$editForms = $recordSet->fields[canEditForms];
				$featureListings = $recordSet->fields[canFeatureListings];
				$viewLogs = $recordSet->fields[canViewLogs];
				$moderator = $recordSet->fields[canModerate];
				$recordSet->MoveNext();
				} // end while
			
			global $userID, $username, $userpassword, $admin_privs, $editForms, $viewLogs, $canModerate;
			echo "<!-- USER : $username -->\r\n";
			echo "<!-- Your session ID is ".session_id()."-->\r\n";
			echo "<!-- You are user #$userID -->\r\n\r\n";
			echo "<!-- Admin: $admin_privs -->\r\n\r\n";
			echo "<!-- Edit forms: $editForms -->\r\n\r\n";
			echo "<!-- Feature Listings: $featureListings -->\r\n\r\n";
			echo "<!-- View Logs: $viewLogs -->\r\n\r\n";
			echo "<!-- Can Moderate: $moderator -->\r\n\r\n";
			
			echo "<!-- access level: $priv_level_needed -->\r\n\r\n";
			
			// now make sure that person can access the page
			if ($priv_level_needed == "canEditForms")
				{ // does the person have access to edit the master forms?
				
				if ($editForms != "yes")
					{
					
					include("$config[template_path]/admin_top.html");
					echo "<p>$lang[priv_failure]</p>";
					include("$config[template_path]/admin_bottom.html");
					die('<!-- login failed -->');
					} // end if
				} // end if
			
			if ($priv_level_needed == "Admin")
				{ // does the person have access to do basic user/listings edits?
				
				if ($admin_privs != "yes")
					{
					include("$config[template_path]/admin_top.html");
					echo "<p>$lang[priv_failure]</p>";
					include("$config[template_path]/admin_bottom.html");
					die('<!-- login failed -->');
					} // end if
				} // end if
			
			
			if ($priv_level_needed == "canViewLogs")
				{ // does the person have access to do basic user/listings edits?
				
				if ($viewLogs != "yes")
					{
					include("$config[template_path]/admin_top.html");
					echo "<p>$lang[priv_failure]</p>";
					include("$config[template_path]/admin_bottom.html");
					die('<!-- login failed -->');
					} // end if
				} // end if
			} // end if ($num == 1)
			
		elseif ($num == 0)
			{
			include("$config[template_path]/admin_top.html");
			echo "<h3>$lang[login_failed]</h3>";
			echo "<p><form action=\"$PHP_SELF\" method=\"post\">$lang[admin_challenge_phrase]</P>";
			echo "<p>$lang[admin_login_name]: <input type=\"text\" name=\"user_name\"></p> ";
			echo "<p>$lang[admin_password]: <input type=\"password\" name=\"user_pass\"></p><p><input type=\"submit\" value=\"$lang[login]\"></form></p>";
			echo "<form action=\"emailpass.php\"><p>$lang[enter_your_email_address_for_pass]<BR><input type=text name=email></p><p><input type=submit></form></p>";
			include("$config[template_path]/admin_bottom.html");
			exit;
			} // end elseif

		} // end elseif
	}// end function loginCheck

	

	
// DISPLAY FORM ELEMENTS

function renderFormElement($field_type, $field_name, $field_caption, $default_text, $field_elements, $required)
	{
	
	global $lang;
	// handles the rendering of forms...
	echo "<TR>";
	switch ($field_type)
		{
		case "text": // handler for regular text boxes
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$default_text\" width=\"100\"></td>";
			break;
		case "textarea": // handler for textarea boxes
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><textarea name=\"$field_name\" cols=40 rows=6>$default_text</textarea></td>";
			break;
		case "select": // handler for select boxes
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><select name=\"$field_name\" size=\"1\">";
			
			$index_list = explode("||", $field_elements);
			while (list($indexValue, $list_item) = each ($index_list))
				{
				echo "<option value=\"$list_item\">$list_item";
				}
			echo "</select></TD>";
			break;
		case "select-multiple": // handler for select boxes where you can choose multiple items
			echo "<td align=\"right\" class=\"row_main\" valign=\"top\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><select name=\"$field_name"."[]\" multiple>";
			
			$index_list = explode("||", $field_elements);
			while (list($indexValue, $list_item) = each ($index_list))
				{
				echo "<option value=\"$list_item\">$list_item";
				}
			echo "</select></TD>";
			break;
		case "divider": // dividers between items
			echo "<td align=\"left\" class=\"row_main\" colspan=2><B>$field_caption</b></td>";
			break;
		case "price": //handles price
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\">$money_sign<input type=\"text\" name=\"$field_name\" value=\"$default_text\" width=\"100\"> .00 </td>";
			break;
		case "url": // handles url input fields
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b><BR>($lang[dont_forget_http])</td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$default_text\" width=\"100\"></td>";
			break;
		case "email": // handles email input fields
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b><BR>($lang[email_example])</td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$default_text\" width=\"100\"></td>";
			break;
		case "checkbox": // handles check boxes
			echo "<td align=\"right\" class=\"row_main\" valign=\"top\"><B>$field_caption</b></td>";
			echo "<td align=\"left\" class=\"row_main\">";
			$index_list = explode("||", $field_elements);
			while (list($indexValue, $list_item) = each ($index_list))
				{
				echo "<input type=\"checkbox\" value=\"$list_item\" name=\"$field_name"."[$indexValue]\">$list_item<BR>";
				}
			echo "</TD>";
			break;
		case "option": // handles radio buttons
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption</b></td>";
			echo "<td align=\"left\" class=\"row_main\">";
			$index_list = explode("||", $field_elements);
			while (list($indexValue, $list_item) = each ($index_list))
				{
				echo "<input type=\"radio\" value=\"$list_item\" name=\"$field_name\">$list_item<BR>";
				}
			echo "</TD>";
			break;
		case "number": // handles the input of numbers
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$default_text\" width=\"100\"></td>";
			break;
		case "submit": // handles submit buttons
			echo "<td align=\"center\" class=\"row_main\" colspan=\"2\"><input type=\"submit\" value=\"$field_caption\"></td>";
			break;
		
		default: // the default handler -- for errors, mostly
			echo "<td align=\"right\" class=\"row_main\">no handler yet</a>";
			
		} // end switch statement
	echo "</TR>";
	} // end renderFormElement function
	

	
function updateUserData ($user_id)
	{
	// UPDATES THE USER INFORMATION
	global $conn, $edit, $admin_privs, $lang;
	
	if ($admin_privs == "yes" && $edit != "")
		{
		$sql_edit = make_db_extra_safe($edit);
		$sql = "DELETE FROM UserDBElements WHERE user_id = $sql_edit";
		}
	else
		{
		$sql_user_id = make_db_extra_safe($user_id);
		$sql = "DELETE FROM UserDBElements WHERE user_id = $sql_user_id";
		}
	$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);	
	global $HTTP_POST_VARS;
	reset ($HTTP_POST_VARS);
	while (list($ElementIndexValue, $ElementContents) = each($HTTP_POST_VARS))
		{
		// first, ignore all the stuff that's been taken care of above
		if ($ElementIndexValue == "user_name")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_pass")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_pass2")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_user_pass")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_user_pass2")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_email")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "PHPSESSID")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "action")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit")
			{
			// do nothing
			}
		// this is currently set up to handle two feature lists
		// it could easily handle more...
		// just write handlers for 'em
		elseif (is_array($ElementContents))
			{
			
			// deal with checkboxes & multiple selects elements
			$feature_insert = "";
			while (list($featureValue, $feature_item) = each ($ElementContents))
			 	{		
				$feature_insert = "$feature_insert||$feature_item";
				} // end while
						
			// now remove the first two characters
			$feature_insert_length = strlen($feature_insert);
			$feature_insert_length = $feature_insert_length - 2;
			$feature_insert = substr($feature_insert, 2, $feature_insert_length);
			$sql_ElementIndexValue = make_db_safe($ElementIndexValue);
			$sql_feature_insert = make_db_safe($feature_insert);
			if ($admin_privs == "yes" && $edit != "")
				{
				$sql_edit = make_db_safe($edit);
				$sql = "INSERT INTO UserDBElements (field_name, field_value, user_id) VALUES ($sql_ElementIndexValue, $sql_feature_insert, $sql_edit)";
				}
			else
				{
				$user_id = make_db_safe($user_id);
				$sql = "INSERT INTO UserDBElements (field_name, field_value, user_id) VALUES ($sql_ElementIndexValue, $sql_feature_insert, $user_id)";
				}
			$recordSet = $conn->Execute($sql);
			if ($recordSet === false) log_error($sql);
			} // end elseif
		else
			{						
			// it's time to actually insert the form data into the db
			$sql_ElementIndexValue = make_db_safe($ElementIndexValue);
			$sql_ElementContents = make_db_safe($ElementContents);
			if ($admin_privs == "yes" && $edit != "")
				{
				$sql_edit = make_db_safe($edit);
				$sql = "INSERT INTO UserDBElements (field_name, field_value, user_id) VALUES ($sql_ElementIndexValue, $sql_ElementContents, $sql_edit)";
				}
			else
				{
				$sql_user_id = make_db_safe($user_id);
				$sql = "INSERT INTO UserDBElements (field_name, field_value, user_id) VALUES ($sql_ElementIndexValue, $sql_ElementContents, $sql_user_id)";
				}
			$recordSet = $conn->Execute($sql);
			} // end else
				
		} // end while
	return "success";
	} // end function updateUserData
	
	

	
function updateListingsData ($listing_id, $owner)
	{
	// UPDATES THE LISTINGS INFORMATION
	global $conn, $lang;
	$sql_listing_id = make_db_safe($listing_id);
	$sql = "DELETE FROM listingsDBElements WHERE listing_id = $sql_listing_id";
	$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);	
	global $HTTP_POST_VARS;
	reset ($HTTP_POST_VARS);
	while (list($ElementIndexValue, $ElementContents) = each($HTTP_POST_VARS))
		{
		// first, ignore all the stuff that's been taken care of above
		if ($ElementIndexValue == "title")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "notes")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "action")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "PHPSESSID")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_active")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_expiration")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "featured")
			{
			// do nothing
			}
			
		// this is currently set up to handle two feature lists
		// it could easily handle more...
		// just write handlers for 'em
		elseif (is_array($ElementContents))
			{
			// deal with checkboxes & multiple selects elements
			$feature_insert = "";
			
			while (list($featureValue, $feature_item) = each ($ElementContents))
			 	{		
				$feature_insert = "$feature_insert||$feature_item";
				} // end while
						
			// now remove the first two characters
			$feature_insert_length = strlen($feature_insert);
			$feature_insert_length = $feature_insert_length - 2;
			$feature_insert = substr($feature_insert, 2, $feature_insert_length);
			$sql_ElementIndexValue = make_db_safe($ElementIndexValue);
			$sql_feature_insert = make_db_safe($feature_insert);
			$sql_owner = make_db_safe($owner);
			$sql = "INSERT INTO listingsDBElements (field_name, field_value, listing_id, user_id) VALUES ($sql_ElementIndexValue, $sql_feature_insert, $sql_listing_id, $sql_owner)";
			$recordSet = $conn->Execute($sql);
				if ($recordSet == false) log_error($sql);
			} // end elseif
		else
			{
			// process the form
			$sql_ElementIndexValue = make_db_safe($ElementIndexValue);
			$sql_ElementContents = make_db_safe($ElementContents);
			$sql_listing_id = make_db_safe($listing_id);
			$sql_owner = make_db_safe($owner);
			$sql = "INSERT INTO listingsDBElements (field_name, field_value, listing_id, user_id) VALUES ($sql_ElementIndexValue, $sql_ElementContents, $sql_listing_id, $sql_owner)";
			$recordSet = $conn->Execute($sql);
				if ($recordSet == false) log_error($sql);
			} // end else	
		} // end while
	return "success";
	} // end function updateListingsData	
	

	
function validateForm ($db_to_validate)
	{
	// Validates the info being put into the system
	global $conn, $HTTP_POST_VARS, $pass_the_form, $lang;
	$pass_the_form ="Yes";
	reset ($HTTP_POST_VARS);
	// check to if the form should be passed
	while (list($ElementIndexValue, $ElementContents) = each($HTTP_POST_VARS))
		{
		
		// this stuff is input that's already been dealt with
		if ($ElementIndexValue == "title")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "notes")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "action")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "PHPSESSID")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_name")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_user_name")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_pass")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_pass2")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "user_email")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "action")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_user_pass")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_user_pass2")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "featured")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_isAdmin")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_canEditForms")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_canViewLogs")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_canModerate")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_canFeatureListings")
			{
			// do nothing
			}
		elseif ($ElementIndexValue == "edit_active")
			{
			// do nothing
			}
		
				
		else
			{
			$sql_ElementIndexValue= make_db_safe($ElementIndexValue);
			$sql_ElementContents= make_db_safe($ElementContents);
			
			$sql = "SELECT required, field_type from $db_to_validate WHERE field_name = $sql_ElementIndexValue";
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$recordSet = $conn->Execute($sql);
			if ($recordSet == false) log_error($sql);
			while (!$recordSet->EOF)
				{
				$required = $recordSet->fields[required];
				$field_type = $recordSet->fields[field_type];
				
				if ($required == "Yes" && $ElementContents == "")
					{
					$pass_the_form = "No";
					
					} // end if
				$recordSet->MoveNext();
				} // end while
			
			} // end else
		} // end while
		return $pass_the_form;
	} // end function validateForm	


function renderExistingFormElement($field_type, $field_name, $field_value, $field_caption, $default_text, $required, $field_elements)
	{
	// handles the rendering of already filled in user forms
	global $lang;
	echo "<TR>";
	switch ($field_type)
		{
		case "text": // handles text input boxes
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$field_value\" width=\"100\"></td>";
			break;
		case "textarea": // handles textarea input
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><textarea name=\"$field_name\" cols=40 rows=6>$field_value</textarea></td>";
			break;
		case "select": // handles single item select boxes
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><select name=\"$field_name\" size=\"1\">";
			echo "<option value=\"$field_value\">$field_value";
			echo "<option value=\"\">------";
			$index_list = explode("||", $field_elements);
			while (list($indexValue, $list_item) = each ($index_list))
				{
				echo "<option value=\"$list_item\">$list_item";
				}
			echo "</select></TD>";
			break;
		case "select-multiple": // handles multiple item select boxes
			echo "<td align=\"right\" class=\"row_main\" valign=\"top\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\" ><select name=\"$field_name"."[]\" multiple>";
			$feature_index_list = explode("||", $field_elements);
			while (list($feature_list_Value, $feature_list_item) = each ($feature_index_list))
				{
				echo "<option value=\"$feature_list_item\" ";
				// now, compare it against the list of currently selected feature items
				$field_value_list = explode("||", $field_value);
				while (list($field_value_list_Value, $field_value_list_item) = each ($field_value_list))
					{
					if ($field_value_list_item == $feature_list_item)
						{
						echo "SELECTED";
						} // end if
					} // end while
				
				echo " >$feature_list_item<BR>";
				} // end while
			echo "</select></TD>";
			break;
		case "divider": // handles dividers in forms
			echo "<td align=\"left\" class=\"row_main\" colspan=2><B>$field_caption</b></td>";
			break;
		case "price": // handles price input
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\">$money_sign<input type=\"text\" name=\"$field_name\" value=\"$field_value\" width=\"100\"> .00 </td>";
			break;
		case "url": // handles url input fields
			echo "<td align=\"right\" class=\"row_main\" ><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b><BR>($lang[dont_forget_http])</td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$field_value\" width=\"100\"></td>";
			break;
		case "email": // handles email input
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b><BR>($lang[email_example])</td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$field_value\" width=\"100\"></td>";
			break;
		case "checkbox": // handles checkboxes
			echo "<td align=\"right\" class=\"row_main\" valign=\"top\"><B>$field_caption</b></td>";
			echo "<td align=\"left\" class=\"row_main\">";
			$feature_index_list = explode("||", $field_elements);
			while (list($feature_list_Value, $feature_list_item) = each ($feature_index_list))
				{
				echo "<input type=\"checkbox\" value=\"$feature_list_item\" name=\"$field_name"."[$indexValue]\"";
				// now, compare it against the list of currently selected feature items
				$field_value_list = explode("||", $field_value);
				while (list($field_value_list_Value, $field_value_list_item) = each ($field_value_list))
					{
					if ($field_value_list_item == $feature_list_item)
						{
						echo "CHECKED";
						} // end if
					} // end while
				
				echo " >$feature_list_item<BR>";
				} // end while
			echo "</TD>";
			break;
		case "option": // handles options
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption</b></td>";
			echo "<td align=\"left\" class=\"row_main\">";
			$feature_index_list = explode("||", $field_elements);
			while (list($feature_list_Value, $feature_list_item) = each ($feature_index_list))
				{
				echo "<input type=\"radio\" value=\"$feature_list_item\" name=\"$field_name\" ";
				// now, compare it against the list of currently selected feature items
				
				if ($feature_list_item == $field_value)
					{
					echo "CHECKED ";
					} // end if
				
				echo " >$feature_list_item<BR>";
				} // end while
			echo "</TD>";
			break;
		case "number": // deals with numbers
			echo "<td align=\"right\" class=\"row_main\"><B>$field_caption ";
			if ($required == "Yes")
				{
				echo"<span class=\"required\">*</span>";
				}
			echo "</b></td>";
			echo "<td align=\"left\" class=\"row_main\"><input type=\"text\" name=\"$field_name\" value=\"$field_value\" width=\"100\"></td>";
			break;
		case "submit": // handles submit buttons
			echo "<td align=\"center\" class=\"row_main\"><input type=\"submit\" value=\"$field_value\"></td>";
			break;
		default: // the catch all... mostly for errors and whatnot
			echo "<td align=\"right\" class=\"row_main\">no handler yet</a>";
			
		} // end switch statement
	echo "</TR>";
	} // end renderExistingUserFormElement function	

	
	
function next_prev($num_rows, $cur_page, $guidestring)
	{ // handles multiple page listings
	global $lang, $config;
	
	if ($cur_page == "") {$cur_page = 0;}
	$page_num = $cur_page + 1;
	$total_num_page = ceil($num_rows/$config[listings_per_page]);
	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"580\"><TR><TD align=left>";
	if ($num_rows == 1){echo "$lang[there_is_currently] <B>$num_rows</b> $lang[listing].<BR>";}
	else {echo "$lang[there_are_currently] <B>$num_rows</b> $lang[listings] $lang[that_match_search].<BR>";}
	echo "<Center>";

	if ($total_num_page != 0)
		{
		echo "$lang[this_is_page] $page_num $lang[of] $total_num_page<BR>";
		$prevpage = $cur_page-1;
		$nextpage = $cur_page+1;
		if ($page_num != 1) // previous page
			{
			echo "<a href=\"$PHP_SELF?cur_page=$prevpage&$guidestring\">$lang[prev_page]</a>     ";
			} // end if
		if ($total_num_page > 2)
			{
			if ($page_num != 1) { echo " | "; }
			echo "Page: ";
			if( $total_num_page > 8 )
				{
				// list first three
				for($i = 1; $i < 4; $i++)
					{
					if ($i == $cur_page + 1) {echo "<b><a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a></b>";}
					else {echo "<a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a>";}
					if( $i <  3) {echo ", ";}
					else {echo "... ";}
					} // end for($i = 1; $i < $init_page_max + 1; $i++)
				
				// list current +/- 1 OR the middle ones, depending
				if ($cur_page < 3 OR $cur_page > ($total_num_page - 4))
					{
					// list the middle ones
					$middle_page = ($num_rows/$config[listings_per_page]);
					$middle_page = ceil($middle_page/2);
					for($i = $middle_page - 1; $i <$middle_page + 2; $i++)
						{
						if ($i == $cur_page + 1) {echo "<b><a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a></b>";}
						else {echo "<a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a>";}
						if($i <  $middle_page + 1) {echo ", ";}
						else {echo "... ";}
					
						} // end for($i = 1; $i < $init_page_max + 1; $i++)
					} // end if ($cur_page < 4 OR $cur_page > $total_num_page - 2)
				
				else
					{
					// list the immediately surrounding numbers
					
					// gotta make sure you have the numbers correct
					if ($cur_page == 3){$start_page = 4;}
					elseif ($cur_page == $total_num_page - 4){$start_page = $total_num_page - 5;}
					else {$start_page = $cur_page;}
					for($i = $start_page; $i < $start_page + 3; $i++)
						{
						
						if ($i == $cur_page + 1) {echo "<b><a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a></b>";}
						else {echo "<a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a>";}
						if($i <  $start_page + 2) {echo ", ";}
						else {echo "... ";}
						} // end for($i = $cur_page - 1; $i < $cur_page + 2; $i++)
					} // end else
				
				// list last three
				for($i = $total_num_page - 2; $i < $total_num_page + 1; $i++)
					{
					if ($i == $cur_page + 1) {echo "<b><a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a></b>";}
					else {echo "<a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a>";}
					if($i <  $total_num_page) {echo ", ";}
					} // end for($i = 1; $i < $init_page_max + 1; $i++)
					
					
					
				} // end if( $total_pages > 8 )
			else
				{
				for($i = 1; $i < $total_num_page + 1; $i++)
					{
					if ($i == $cur_page + 1) {echo "<b><a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a></b>";}
					else {echo "<a href=\"$PHP_SELF?cur_page=".($i-1)."&$guidestring\">$i</a>";}
					if( $i <  $total_num_page) {echo ", ";}
					} // end for($i = 1; $i < $init_page_max + 1; $i++)
				} // end else
			
			if ($page_num != $total_num_page) {echo " | "; }
			}
		if ($page_num != $total_num_page) // next page
			{
			echo "  <a href=\"$PHP_SELF?cur_page=$nextpage&$guidestring\">$lang[next_page]</a>     ";
			} // end if
		echo "</td></tr></table>";
		} // end if
	} // end function next_prev

	
function make_db_safe ($input)
	{ // handles data going into the db
	global $config, $conn;
	if ($config[strip_html] == "yes")
		{
		$output = strip_tags($input, $config[allowed_html_tags]); // strips out disallowed tags
		}
	$output = $conn->qstr($output, get_magic_quotes_gpc());
	
	return $output;
	} // end make_db_safe

function make_db_extra_safe ($input)
	{ // handles data going into the db
	global $conn;
	$output = strip_tags($input); // strips out all tags
	$output = ereg_replace (";","",$output);
	$output = $conn->qstr($output, get_magic_quotes_gpc());
	return $output;
	} // end make_db_extra_safe
	
function make_db_unsafe ($input)
	{ // handles data coming out of the db
	$output = stripslashes($input); // strips out slashes
	$output = ereg_replace ("''","'",$output); // strips out double quotes from m$ db's
	return $output;
	} // end make_db_unsafe
	
function handleUpload($type,$edit,$owner)
	{
	// deals with incoming uploads
	global $HTTP_POST_FILES, $config, $conn, $lang, $userID;
	if (is_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name']))
		{
		$realname = strtolower($HTTP_POST_FILES['userfile']['name']);
		$filename = $HTTP_POST_FILES['userfile']['tmp_name'];
		
		print "<!-- $filename was uploaded successfully -->";
		$filetype = $HTTP_POST_FILES['userfile']['type'];
		print "<!-- type is $filetype -->";
		// checking the filetype to make sure it's what we had in mind
		$pass_the_upload = "true";
		if (!in_array($HTTP_POST_FILES['userfile']['type'],$config[allowed_upload_types]))
			{ 
			$pass_the_upload = "$realname $lang[upload_is_an_invalid_file_type]: $filetype";
			}
			
		// check size
		$filesize=$HTTP_POST_FILES['userfile']['size']; 
		if ($max_upload!=0 && $filesize>$config[max_upload])
			{
			$pass_the_upload = "$lang[upload_too_large].";
			}
		
		
		
		// check file extensions
		$extension = substr(strrchr($realname,"."),1); 
		// invalid extension 
		if (!in_array($extension,$config[allowed_upload_extensions]))
			{ 
			$pass_the_upload = "$lang[upload_invalid_extension] ($extension).";
			} 
		

		//security error 
		if (strstr($HTTP_POST_FILES['userfile']['name'],"..")!="")
			{ 
			$pass_the_upload = "$lang[upload_security_violation]!";
			} 
			
		
		//make sure the file hasn't already been uploaded...
		if ($type == "listings")
			{
			$save_name = "$edit"."_"."$realname";
			$sql = "SELECT file_name FROM listingsImages WHERE file_name = '$save_name'";
			}
		elseif ($type == "user")
			{
			
			$save_name = "$owner"."_"."$realname";
			
			$sql = "SELECT file_name FROM userImages WHERE file_name = '$save_name'";
			}
		$recordSet = $conn->Execute($sql);
			if ($recordSet === false) log_error($sql);
		$num = $recordSet->RecordCount();
		if ($num > 0)
			{
			$pass_the_upload = "$lang[file_exists]!";
			}
		
		if ($pass_the_upload == "true")
			{
			// the upload has passed the tests!
			if ($type == "listings")
				{
				// if it's a listing pic we're dealing with...
				move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'],"$config[listings_upload_path]/$save_name");
				
				// check width
				$check_width="";
				$imagedata = GetImageSize("$config[listings_upload_path]/$save_name");
				$imagewidth = $imagedata[0];
				$imageheight = $imagedata[1];
				if ($imagewidth == "" || $imagewidth < 2 || $imagewidth > $config[max_listings_upload_width])
					{
					$check_width = "$lang[upload_too_wide].";
					if(!unlink("$config[listings_upload_path]/$save_name")) DIE ("Can't delete the file!");
					}
				if ($check_width == "")
					{
					// assuming the image passes the width check...
					$thumb_name = $save_name; // by default -- no difference... unless...
					if ($config[make_thumbnail] == "yes")
						{
						// if the option to make a thumbnail is activated...
						include ("$config[path_to_thumbnailer]");
						$thumb_name = make_thumb ($save_name, $config[listings_upload_path]);
						} // end if $config[make_thumbnail] == "yes"
					$caption = make_db_safe($caption);
					$sql = "INSERT INTO listingsImages (listing_id, user_id, file_name, thumb_file_name) VALUES ('$edit', '$owner', '$save_name', '$thumb_name')";
					$recordSet = $conn->Execute($sql);
						if ($recordSet === false) log_error($sql);
					log_action ("$lang[log_uploaded_listing_image] $save_name");
					} // end if ($check_width != "")
				} // end if $type == "listings"
				
			if ($type == "user")
				{
				// if it's a user pic we're dealing with...
				$check_width="";
				// move the file so we can check the width
				move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'],"$config[user_upload_path]/$save_name");
				$imagedata = GetImageSize("$config[user_upload_path]/$save_name");
				$imagewidth = $imagedata[0];
				$imageheight = $imagedata[1];
				if ($imagewidth == "" || $imagewidth < 2 || $imagewidth > $config[max_listings_upload_width])
					{
					$check_width = "$lang[upload_too_wide].";
					if(!unlink("$config[user_upload_path]/$save_name")) DIE ("Can't delete the file!");
					}
				if ($check_width == "")
					{
					$thumb_name = $save_name; // by default -- no difference... unless...
					if ($config[make_thumbnail] == "yes")
						{
						// if the option to make a thumbnail is activated...
						include ("$config[path_to_thumbnailer]");
						$thumb_name = make_thumb ($save_name, $config[user_upload_path]);
						} // end if $config[make_thumbnail] == "yes"
					$caption = make_db_safe($caption);
					$sql = "INSERT INTO userImages (user_id, file_name, thumb_file_name) VALUES ('$owner', '$save_name', '$thumb_name')";
					$recordSet = $conn->Execute($sql);
						if ($recordSet === false) log_error($sql);
					log_action ("$lang[log_uploaded_user_image] $save_name");
					} // end if ($check_width == "")
				} // end if $type == "user"
			
			if ($check_width == "") {echo "<p>$realname $lang[upload_success].</p>";}
			else { echo "<p>$check_width</p>";}
			} // end if $pass_the_upload == "true"
		else
			{
			// the upload has failed... here's why...
			echo "<p><b>$lang[upload_failed]</b> $pass_the_upload</p>";
			}
		} // end if
	else
		{
		echo "$lang[upload_attack]: filename" .
		$HTTP_POST_FILES['userfile']['name'] . ".";
		}
	
	} // end function handleUpload


// Deleting the comment below is violation of the GPL
// You get this for free... all we ask for is a little hidden credit
echo "<!-- powered by OpenListings by jon roig/smersh light industries. -->";
echo "<!-- Copyright 2002. This tool is Open Source and released under the GPL -->";
echo "<!-- Learn more @ http://jonroig.com or email jon@jonroig.com for details -->";
// Thanks! Versions under different licenses and without this code ARE available -- contact jon if you'd like to know more

	
	
function log_action($log_action)
	{
	// logs user actions
	global $conn, $userID;
	$sql = "INSERT INTO activityLog (log_date, user, action, ip_address) VALUES (".$conn->DBTimeStamp(time()).", '$userID', '$log_action', '$_SERVER[REMOTE_ADDR]')";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	
	} // end function log_action

	
	
function log_error($sql)
	{
	// logs SQL errrors for later inspection
	global $config, $lang;
	$message = $_SERVER[REMOTE_ADDR]. " -- ".date("F j, Y, g:i:s a")." -- ".$sql."\r\n";
	mail("$config[admin_email]", "SQL Error", $message,"From: $config[admin_email]", "-f$config[admin_email]");
	die("$lang[alert_site_admin]");
	} // end function log_action	

	
function checkActive($listingID)
	{
	// checks whether a given listing is active
	global $conn, $lang, $userID, $admin_privs, $config;
	$show_listing = "yes";
	$sql_listingID = make_db_safe($listingID);
	$sql = "SELECT active, user_ID FROM listingsDB WHERE ID = $sql_listingID";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	while (!$recordSet->EOF)
		{
		$is_active = $recordSet->fields[active];
		$user_ID = $recordSet->fields[user_ID];
		$recordSet->MoveNext();
		} // end while
	if ($is_active != "yes")
		{
		// if the listing isn't active
		if ($userID != $user_ID || $admin_privs != "yes")
			{
			// if this isn't a specific user's listing or the user
			// isn't an admin
			echo "$lang[this_listing_is_not_yet_active]";
			$show_listing = "no";
			} // end if ($userID != $user_ID || $admin_privs != "yes")
		} // end if ($is_active != "yes")
	if ($config[use_expiration] == "yes")
		{
		$sql = "SELECT expiration FROM listingsDB WHERE ((ID = $sql_listingID) AND (listingsDB.expiration > ".$conn->DBDate(time())."))";
		$recordSet = $conn->Execute($sql);
			if ($recordSet === false) log_error($sql);
		$num = $recordSet->RecordCount();
		if ($num == 0)
			{
			if ($userID != $user_ID || $admin_privs != "yes")
				{
				// if this isn't a specific user's listing or the user
				// isn't an admin
				echo "$lang[this_listing_is_not_yet_active]";
				$show_listing = "no";
				} // end if ($userID != $user_ID || $admin_privs != "yes")
			} // end if($num == 0)
		} // end if ($config[use_expiration] == "yes")
		
	return $show_listing;
	} // end function checkActive

function international_num_format($input)
	{
	// internationalizes numbers on the site
	global $config;
	switch ($config[number_format_style])
		{
		case 1: // usa, england
			$output = number_format($input, 2, '.', ',');
			break;
		case 2: // spain, germany
			$output = number_format($input, 2, ',', '.');
			break;
		case 3: // estonia
			$output = number_format($input, 2, '.', ' ');
			break;
		case 4: // france, norway
			$output = number_format($input, 2, ',', ' ');
			break;
		case 5: // switzerland
			$output = number_format($input, 2, ",", "'");
			break;
		case 6: // kazahistan
			$output = number_format($input, 2, "-", " ");
			break;
		default:
			$output = number_format($input, 2, '.', ',');
			break;
		} // end switch
	return $output;
	} // end international_num_format($input)
	

?>