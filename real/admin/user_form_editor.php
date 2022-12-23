<?php

global $action, $id, $conn, $lang, $config;
include("../include/common.php");
loginCheck('canEditForms');


include("$config[template_path]/admin_top.html");

if ($action == "updateUserFormElement")
	{
	$sql_field_type = make_db_safe($field_type);
	$sql_field_name = make_db_safe($field_name);
	$sql_field_caption = make_db_safe($field_caption);
	$sql_default_text = make_db_safe($default_text);
	$sql_field_elements = make_db_safe($field_elements);
	$sql_required = make_db_safe($required);
	$sql_rank = make_db_safe($rank);
	$sql_id = make_db_safe($id);

	$sql = "UPDATE userFormElements SET field_type = $sql_field_type, ";
	$sql .= "field_name = $sql_field_name, ";
	$sql .= "field_caption = $sql_field_caption, ";
	$sql .= "default_text = $sql_default_text, ";
	$sql .= "field_elements = $sql_field_elements, ";
	$sql .= "rank = $sql_rank, ";
	$sql .= "required = $sql_required ";
	$sql .= "WHERE id = $sql_id";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	log_action ("$lang[log_updated_user_form_element]: $id");
	echo "<p>$lang[admin_template_editor_user_form_element] '$id' $lang[has_been_updated]</p>";
	
	
	} // $action == "updateUserFormElement"
	
if ($action == "DeleteUserFormElement")
	{
	$sql_id = make_db_safe($id);
	$sql = "DELETE FROM userFormElements where id = $id";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	log_action ("$lang[log_deleted_user_form_element]: $id");
	echo "<p>$lang[admin_template_editor_user_form_element] '$id' $lang[has_been_deleted].</p>";
	} // $action == "DeleteUserFormElement"

if ($action == "makeNewElement")
	{
	// create new template element
	
	$sql_field_type = make_db_safe($field_type);
	$sql_field_name = make_db_safe($field_name);
	$sql_field_caption = make_db_safe($field_caption);
	$sql_default_text = make_db_safe($default_text);
	$sql_field_elements = make_db_safe($field_elements);
	$sql_required = make_db_safe($required);
	$sql_rank = make_db_safe($rank);
	
	$sql = "INSERT INTO userFormElements ";
	$sql .= "(field_type, field_name, field_caption, default_text, field_elements, rank, required) VALUES ";
	$sql .= "($sql_field_type, $sql_field_name, $sql_field_caption, $sql_default_text, $sql_field_elements, $sql_rank, $sql_required)";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	log_action ("$lang[log_made_new_user_form_element]: $field_name");
	echo "<p>$lang[admin_template_editor_new_element_created]</p>";
	} // end $action == "makeNewElement"
	

?>

	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">


	<tr><td class="row_main">
	
	<h3><? echo $lang[admin_template_editor_user_form_editor_name] ?></h3>
	</td></tr>
	<form action="<? $php_self ?>" method="post">
	<input type="hidden" name="action" value="makeNewElement">
	<tr>
		<td colspan="2" class="templateEditorHead"><? echo $lang[admin_template_editor_add_a_new_form_item] ?>:</td>
	</tr>
	<tr> 	
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_name] ?>:</b></td>
  		<td class="templateEditorNew" ><input type=text name="field_name" value =""></td>
  	</tr>
  	<tr> 
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_type] ?>:</b></td>
  		<td class="templateEditorNew" >
  			<select name="field_type" size="1">
  				<OPTION VALUE="text" SELECTED="SELECTED">Text</OPTION>
 				<OPTION VALUE="textarea" >Textarea</OPTION>
				<OPTION VALUE="select" >Select List</OPTION>
				<OPTION VALUE="select-multiple">Select Multiple</OPTION>
				<OPTION VALUE="option" >Option Box</OPTION>
				<OPTION VALUE="checkbox" >Check Box</OPTION>
				<OPTION VALUE="divider">Divider</option>
				<OPTION VALUE="">-----</OPTION>
				<OPTION VALUE="price">Price</option>
				<OPTION VALUE="url">URL</option>
				<OPTION VALUE="email">Email</option>
				<OPTION VALUE="number">Number</option>
  			</select>
  		</td>
  	</tr>
	<tr> 
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_required] ?>:</b></td>
  		<td class="templateEditorNew" >
  			 <select name="required" size="1">
  				<OPTION VALUE="No" SELECTED="SELECTED">No</OPTION>
 				<OPTION VALUE="Yes" >Yes</OPTION>
 			</select>
  		</td>
  	</tr>
  	<tr> 
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_caption] ?>:</b></td>
  		<td class="templateEditorNew" ><input type="index" name="field_caption" value = ""></td>
  	</tr>
  	<tr> 
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_elements] ?>:</b><BR><font size=1>(<? echo $lang[admin_template_editor_choices_separated] ?>)</font></td>
  		<td class="templateEditorNew" ><input type=text name="field_elements" value = ""></td>
  	</tr>
  	<tr> 
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_default_text] ?>:</b></td>
  		<td class="templateEditorNew" ><input type=text name="default_text" value = ""></td>
  	</tr> 	
  	<tr> 
  		<td align="right" class="templateEditorNew"  valign="top"><b><? echo $lang[admin_template_editor_field_rank] ?>:</b></td>
  		<td class="templateEditorNew" ><input type=text name="rank" value = "5"></td>
  	</tr>
  	
	<tr>
		<td align="left" class="templateEditorNew"  valign="top">&nbsp;<input type="submit" name="Submit" value="<? echo $lang[admin_template_editor_add_a_new_form_item] ?>"></td>
		<td class="templateEditorNew" >&nbsp;</td>
	</tr>
	</form>
	
	<tr height="15">
		<td colspan="2" height="15">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" class="templateEditorHead"><? echo $lang[admin_template_editor_form_builder] ?>:</td>
	</tr>
	
	<?
	// output the existing template items
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	$sql = "SELECT id, field_type, field_name, field_caption, default_text, field_elements, rank, required FROM userFormElements ORDER BY rank, field_name";
	$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);
	$count = 0;
		
	while (!$recordSet->EOF)
		{
		$count++;
		$id = $recordSet->fields[id];
		$field_type = make_db_unsafe($recordSet->fields[field_type]);
		$field_name = make_db_unsafe($recordSet->fields[field_name]);
		$field_caption = make_db_unsafe($recordSet->fields[field_caption]);
		$default_text = make_db_unsafe($recordSet->fields[default_text]);
		$field_elements = make_db_unsafe($recordSet->fields[field_elements]);
		$rank = $recordSet->fields[rank];
		$required = $recordSet->fields[required];
		
		
		?>
		
		<form action="<? echo $PHP_SELF ?>" method="post">
		<input type="hidden" name="action" value="updateUserFormElement">
		<input type="hidden" name="id" value="<? print $id ?>">
		
		
		<tr><td colspan=2 class="row_main" align="left"><? echo $lang[admin_template_editor_field] ?>: <? print $count ?></td></tr>
		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_name] ?>:</b></td>
  			<td class="row_main" align="left"><input type=text name="field_name" value="<? print $field_name ?>"></td>
  		</tr>
  	
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_type] ?>:</b></td>
  			<td class="row_main" align="left">
  			 <select name="field_type" size="1">
  			 	<OPTION VALUE="<? print $field_type ?>" SELECTED><? print $field_type ?></OPTION>
  			 	<OPTION VALUE="">-----</OPTION>
  				<OPTION VALUE="text">Text</OPTION>
 				<OPTION VALUE="textarea" >Textarea</OPTION>
				<OPTION VALUE="select" >Select List</OPTION>
				<OPTION VALUE="select-multiple">Select Multiple</OPTION>
				<OPTION VALUE="option" >Option Box</OPTION>
				<OPTION VALUE="checkbox" >Check Box</OPTION>
				<OPTION VALUE="divider">Divider</option>
				<OPTION VALUE="">-----</OPTION>
				<OPTION VALUE="price">Price</option>
				<OPTION VALUE="url">URL</option>
				<OPTION VALUE="email">Email</option>
				<OPTION VALUE="number">Number</option>
  			</select>
  			</td>
  		</tr>
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_required] ?>:</b></td>
  			<td class="row_main" align="left">
  			 <select name="required" size="1">
  			 	<OPTION VALUE="<? print $required ?>" SELECTED><? print $required ?></OPTION>
  			 	<OPTION VALUE="">-----</OPTION>
  				<OPTION VALUE="No">No</OPTION>
 				<OPTION VALUE="Yes" >Yes</OPTION>
 			</select>
  			
  			
  			</td>
  		</tr>
  		
  		
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_caption] ?>:</b></td>
  			<td class="row_main" align="left"><input type=text name="field_caption" value = "<? print $field_caption ?>"></td>
  		</tr>
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_elements] ?>:<BR><div class="small">(<? echo $lang[admin_template_editor_choices_separated] ?>)</div></b></td>
  			<td class="row_main" align="left"><input type=text name="field_elements" value = "<? print $field_elements ?>"></td>
  		</tr>
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_default_text] ?>:</b></td>
  			<td class="row_main" align="left"><input type=text name="default_text" value = "<? print $default_text ?>"></td>
  		</tr>
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_rank] ?>:</b></td>
  			<td class="row_main" align="left" ><input type=text name="rank" value = "<? print $rank ?>"></td>
  		</tr>
  	
		<tr>
			<td align="right" class="row_main" valign="top">&nbsp;</td>
			<td class="row_main" align="left"><input type="submit" name="Submit" value="<? echo $lang[update_button] ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<? echo $PHP_SELF ?>?action=DeleteUserFormElement&id=<? print $id ?>" onClick="return confirmDelete()"><? echo $lang[delete] ?></a></td>
		</tr></form>
		<tr height="5"><td colspan="2" height="5">&nbsp;</td></tr>
		<?
		$recordSet->MoveNext();
		} // end while
	
	
	
	echo "</table>";
	


	
	
include("$config[template_path]/admin_bottom.html");
$conn->Close(); // close the db connection
?>