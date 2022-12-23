<?php

global $action, $id, $conn, $lang, $config;
include("../include/common.php");
loginCheck('canEditForms');


include("$config[template_path]/admin_top.html");

if ($action == "updateListingsFormElement")
	{
	
	$sql_field_type = make_db_safe($field_type);
	$sql_field_name = make_db_safe($field_name);
	$sql_field_caption = make_db_safe($field_caption);
	$sql_default_text = make_db_safe($default_text);
	$sql_field_elements = make_db_safe($field_elements);
	$sql_rank = make_db_safe($rank);
	$sql_required = make_db_safe($required);
	$sql_location = make_db_safe($location);
	$sql_display_on_browse = make_db_safe($display_on_browse);
	$sql_id = make_db_safe($id);
	
	$sql = "UPDATE listingsFormElements SET field_type = $sql_field_type, ";
	$sql .= "field_name = $sql_field_name, ";
	$sql .= "field_caption = $sql_field_caption, ";
	$sql .= "default_text = $sql_default_text, ";
	$sql .= "field_elements = $sql_field_elements, ";
	$sql .= "rank = $sql_rank, ";
	$sql .= "required = $sql_required, ";
	$sql .= "location = $sql_location, ";
	$sql .= "display_on_browse = $sql_display_on_browse ";
	$sql .= "WHERE id = $id";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	log_action ("$lang[log_updated_listings_form_element]: $id");
	echo "<p>$lang[admin_template_editor_listings_form_element] '$id' $lang[has_been_updated]</p>";
	
	
	} // end if $action == "updateListingsFormElement"
	
if ($action == "DeleteUserFormElement")
	{
	$sql_id = make_db_safe($id);
	$sql = "DELETE FROM listingsFormElements where id = $id";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	log_action ("$lang[log_deleted_listings_form_element]: $id");
	Print "$lang[admin_template_editor_listings_form_element] '$id' $lang[has_been_deleted]";
	} // $action == "DeleteUserFormElement"

if ($action == "makeNewElement")
	{
	$sql_field_type = make_db_safe($field_type);
	$sql_field_name = make_db_safe($field_name);
	$sql_field_caption = make_db_safe($field_caption);
	$sql_default_text = make_db_safe($default_text);
	$sql_field_elements = make_db_safe($field_elements);
	$sql_required = make_db_safe($required);
	$sql_location = make_db_safe($location);
	$sql_display_on_browse = make_db_safe($display_on_browse);
	$sql_rank = make_db_safe($rank);
	
	$sql = "INSERT INTO listingsFormElements ";
	$sql .= "(field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES ";
	$sql .= "($sql_field_type, $sql_field_name, $sql_field_caption, $sql_default_text, $sql_field_elements, $sql_rank, $sql_required, $sql_location, $sql_display_on_browse)";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
	log_action ("$lang[log_made_new_listings_form_element]: $field_name");
	echo "<P>$lang[admin_template_editor_new_element_created]";
	
	} // $action == "makeNewElement"

?>

	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">

	<tr><td colspan="2" class="row_main">
	
	<h3><? echo $lang[admin_template_editor_listings_name] ?></h3>
	</td></tr>
	<form action="<? $php_self ?>" method="post">
		<input type="hidden" name="action" value="makeNewElement">
		
	

		
		<tr><td colspan="2" class="templateEditorHead"><? echo $lang[admin_template_editor_add_a_new_form_item] ?>:</td></tr>
		<tr> 
		
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_name] ?>:</b></td>
  			<td class="templateEditorNew"><input type=text name="field_name" value =""></td>
  		</tr>
  	
  		<tr> 
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_type] ?>:</b></td>
  			<td class="templateEditorNew">
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
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_required] ?>:</b></td>
  			<td class="templateEditorNew">
  			 <select name="required" size="1">
  				<OPTION VALUE="No" SELECTED="SELECTED">No</OPTION>
 				<OPTION VALUE="Yes" >Yes</OPTION>
 			</select>
  			
  			
  			</td>
  		</tr>
  	
  		<tr> 
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_caption] ?>:</b></td>
  			<td class="templateEditorNew"><input type="index" name="field_caption" value = ""></td>
  		</tr>
  		
  		
  		<tr> 
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_elements] ?>:</b><BR><font size=1>(<? echo $lang[admin_template_editor_choices_separated] ?>)</font></td>
  			<td class="templateEditorNew"><input type=text name="field_elements" value = ""></td>
  		</tr>
  		
		
  		<tr> 
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_default_text] ?>:</b></td>
  			<td class="templateEditorNew"><input type=text name="default_text" value = ""></td>
  		</tr> 
  		
		<tr> 
  			<td align="right" bgcolor="EEEEFF"valign="top"><b><? echo $lang[admin_template_editor_field_display_location] ?>:</b></td>
  			<td class="templateEditorNew"align="left">
  			 <select name="location" size="1">
  			 	<OPTION VALUE="top_right">top_right</OPTION>
 				<OPTION VALUE="top_left" >top_left</OPTION>
				<OPTION VALUE="bottom_right" >bottom_right</OPTION>
				<OPTION VALUE="bottom_left">bottom_left</option>
				<OPTION VALUE="headline">headline</option>
				<OPTION VALUE="center">center</option>
				<OPTION VALUE="feature1">feature1</option>
				<OPTION VALUE="feature2">feature2</option>
  			</select>
  			</td>
  		</tr>
		
		<tr> 
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_display_browse] ?>:</b></td>
  			<td class="templateEditorNew">
  			 <select name="display_on_browse" size="1">
  				<OPTION VALUE="No" SELECTED="SELECTED">No</OPTION>
 				<OPTION VALUE="Yes" >Yes</OPTION>
 			</select>
  			
  			
  			</td>
  		</tr>
		
  		<tr> 
  			<td align="right" class="templateEditorNew" valign="top"><b><? echo $lang[admin_template_editor_field_rank] ?>:</b></td>
  			<td class="templateEditorNew"><input type=text name="rank" value = "5"></td>
  		</tr>
  	
	<tr>
		<td align="left" class="templateEditorNew" valign="top">&nbsp;<input type="submit" name="Submit" value="<? echo $lang[admin_template_editor_add_to_form_button] ?>"></td>
		<td class="templateEditorNew">&nbsp;</td>
	</tr>
	</form>
	
	
	
	<tr height="15"><td colspan="2" height="15">&nbsp;</td></tr>
	<tr><td colspan="2" class="templateEditorHead"><? echo $lang[admin_template_editor_form_builder] ?>:</td></tr>
	
	<?
	
	// output the rest of the elements
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	$sql = "SELECT id, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse FROM listingsFormElements ORDER BY rank, field_name";
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
		$location = make_db_unsafe($recordSet->fields[location]);
		$display_on_browse = $recordSet->fields[display_on_browse];
		
		
		?>
		
		<form action="<? echo $PHP_SELF ?>" method="post">
		<input type="hidden" name="action" value="updateListingsFormElement">
		<input type="hidden" name="id" value="<? echo $id ?>">
		
		<tr><td colspan=2 class="row_main" align="left"><? echo $lang[admin_template_editor_field] ?>: <? echo $count ?></td></tr>
		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_name] ?>:</b></td>
  			<td class="row_main" align="left"><input type=text name="field_name" value="<? echo $field_name ?>"></td>
  		</tr>
  	
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_type] ?>:</b></td>
  			<td class="row_main" align="left">
  			 <select name="field_type" size="1">
  			 	<OPTION VALUE="<? echo $field_type ?>" SELECTED><? echo $field_type ?></OPTION>
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
  			 	<OPTION VALUE="<? echo $required ?>" SELECTED><? echo $required ?></OPTION>
  			 	<OPTION VALUE="">-----</OPTION>
  				<OPTION VALUE="No">No</OPTION>
 				<OPTION VALUE="Yes" >Yes</OPTION>
 			</select>
  			
  			
  			</td>
  		</tr>
  		
  		
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_caption] ?>:</b></td>
  			<td class="row_main" align="left"><input type=text name="field_caption" value = "<? echo $field_caption ?>"></td>
  		</tr>
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_elements] ?>:</b><BR><div class="small">(<? echo $lang[admin_template_editor_choices_separated] ?>)</div></td>
  			<td class="row_main" align="left"><input type=text name="field_elements" value = "<? echo $field_elements ?>"></td>
  		</tr>
  		
  		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_default_text] ?>:</b></td>
  			<td class="row_main" align="left"><input type=text name="default_text" value = "<? echo $default_text ?>"></td>
  		</tr>
  		
		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_display_location] ?>:</b></td>
  			<td class="row_main" align="left">
  			 <select name="location" size="1">
  			 	<OPTION VALUE="<? echo $location ?>" SELECTED><? echo $location ?></OPTION>
  			 	<OPTION VALUE="">-----</OPTION>
  				<OPTION VALUE="top_right">top_right</OPTION>
 				<OPTION VALUE="top_left" >top_left</OPTION>
				<OPTION VALUE="bottom_right" >bottom_right</OPTION>
				<OPTION VALUE="bottom_left">bottom_left</option>
				<OPTION VALUE="headline">headline</option>
				<OPTION VALUE="center">center</option>
				<OPTION VALUE="feature1">feature1</option>
				<OPTION VALUE="feature2">feature2</option>
  			</select>
  			</td>
  		</tr>
		
		<tr> 
  			<td align="right" class="row_main" valign="top"><b><? echo $lang[admin_template_editor_field_display_browse] ?>:</b></td>
  			<td class="row_main" align="left">
  			 <select name="display_on_browse" size="1">
  			 	<OPTION VALUE="<? echo $display_on_browse ?>" SELECTED><? echo $display_on_browse ?></OPTION>
  			 	<OPTION VALUE="">-----</OPTION>
  				<OPTION VALUE="No">No</OPTION>
 				<OPTION VALUE="Yes" >Yes</OPTION>
 			</select>
  			
  			
  			</td>
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
	
	
	
	
	print "</table>";
	


	
	
include("$config[template_path]/admin_bottom.html");
$conn->Close(); // close the db connection
?>