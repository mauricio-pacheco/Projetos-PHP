<?php


include("include/common.php");
include("$config[template_path]/user_top.html");
global $conn, $lang, $config, $HTTP_GET_VARS;

$guidestring = "";
$guidestring_with_sort = "";

// START BY SETTING UP THE TABLE OF ALL POSSIBLE LISTINGS
// while this may seem crazy at first, it actually is reasonably efficient, especially
// considering the limitations of mysql and the lack of subqueries.
// basically, it works by the process of elimination...

$sql = "drop table IF EXISTS temp";
$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);
$sql = "CREATE TEMPORARY TABLE temp SELECT listingsDB.ID, listingsDB.Title, listingsDBElements.field_name, listingsDBElements.field_value FROM listingsDB, listingsDBElements WHERE (listingsDBElements.listing_id = listingsDB.ID) AND ";
if ($config[use_expiration] == "yes")
	{
	$sql .= "(listingsDB.expiration > ".$conn->DBDate(time()).") AND ";
	}
$sql .= "(listingsDB.active = 'yes')";
$recordSet = $conn->Execute($sql);
	if ($recordSet === false) log_error($sql);

reset ($HTTP_GET_VARS);
while (list($ElementIndexValue, $ElementContents) = each($HTTP_GET_VARS))
	{
	if ($ElementIndexValue == "sortby")
		{
		$guidestring_with_sort = "$ElementIndexValue=$ElementContents";
		}
	elseif ($ElementIndexValue == "cur_page")
		{
		// do nothing
		}
	elseif ($ElementIndexValue == "PHPSESSID")
		{
		// do nothing
		}
	elseif ($ElementIndexValue == "imagesOnly")
		{
		$guidestring .= "$ElementIndexValue=$ElementContents&";
		if ($ElementContents == "yes")
			{
			$whilecount = 0;
			$delete_string = "DELETE FROM temp WHERE ('blah' = 'blah')";
			// the 'blah' = 'blah' is just a dumb sql trick to deal with the code below ... it works, but you can ignore it
			$sql = "SELECT temp.ID, COUNT(listingsImages.file_name) AS imageCount FROM listingsImages, temp WHERE (listingsImages.listing_id = temp.ID) GROUP BY listingsImages.listing_id";
			$recordSet = $conn->Execute($sql);
				if ($recordSet === false) log_error($sql);
			while (!$recordSet->EOF)
				{
				$whilecount = $whilecount + 1;
				$listingID = $recordSet->fields[ID];
				$imageCount = $recordSet->fields[imageCount];
				$delete_string .= " AND ";
				$delete_string .= "(ID <> $listingID)";
				$recordSet->MoveNext();
				} // end while
			$recordSet = $conn->Execute($delete_string);
				if ($recordSet === false) log_error($delete_string);
			}
		
		} // end elseif ($ElementIndexValue == "imagesOnly")
	elseif (is_array($ElementContents))
		{
		// what to do if you have the possibility of an area with multiple items
		$sql_ElementIndexValue = make_db_safe($ElementIndexValue);
		// first, we need to see if there's anything that'll meet the criteria
		$whilecountTwo = 0;
		$select_statement = "SELECT ID FROM temp WHERE ( (field_name=$sql_ElementIndexValue) AND ";
		while (list($featureValue, $feature_item) = each ($ElementContents))
			{
			$guidestring .= urlencode($ElementIndexValue)."%5B%5D=".urlencode($feature_item)."&";
			$whilecountTwo = $whilecountTwo + 1;
			if ($whilecountTwo > 1)
				{
				$select_statement .= " OR ";
				}
			$sql_feature_item = make_db_safe($feature_item);
			$select_statement .= "(field_value = $sql_feature_item)";
			}
		$select_statement .= ")";
		$recordSet = $conn->Execute($select_statement);
			if ($recordSet === false) log_error($select_statement);
		$save_array = array();
		while (!$recordSet->EOF)
			{
			$save_ID = $recordSet->fields[ID];
			$save_array[] = "$save_ID";
			$recordSet->MoveNext();
			} // end while
		$num_to_delete = $recordSet->RecordCount();
		
		// now, delete everything that we don't want...
		if ($num_to_delete > 0)
			{
			$delete_string = "DELETE FROM temp WHERE ";
			while (list($IndexValue,$ElementContents) = each($save_array))
				{
				if ($IndexValue > 0)
					{
					$delete_string .= " AND ";
					}
				$sql_ElementContents = make_db_safe($ElementContents);
				$delete_string .= "(ID <> $sql_ElementContents)";
				} // end while
			
			
			$recordSet = $conn->Execute($delete_string);
				if ($recordSet === false) log_error($delete_string);
			} // ($num_to_delete > 0)
		// if there's nothing that matches, delete all the other possibilities...
		elseif ($num_to_delete == 0)
			{
			$delete_string = "DELETE FROM temp";
			$recordSet = $conn->Execute($delete_string);
				if ($recordSet === false) log_error($delete_string);
			} // end elseif ($num_to_delete = 0)
			
		} // end elseif (is_array($ElementContents))
	else
		{
		$ElementIndexValue = make_db_safe($ElementIndexValue);
		$ElementContents = make_db_safe($ElementContents);
		$select_statement = "SELECT ID FROM temp WHERE ( (field_name = $ElementIndexValue) AND (field_value = $ElementContents) )";
		$recordSet = $conn->Execute($select_statement);
			if ($recordSet === false) log_error($select_statement);
		$save_array = array();
		while (!$recordSet->EOF)
			{
			$save_ID = $recordSet->fields[ID];
			$save_array[] = "$save_ID";
			$recordSet->MoveNext();
			} // end while
		$num_to_delete = $recordSet->RecordCount();
		if ($num_to_delete > 0)
			{	
			$delete_string = "DELETE FROM temp WHERE ";
			while (list($IndexValue,$ElementContents) = each($save_array))
				{
				if ($IndexValue > 0)
					{
					$delete_string .= " AND ";
					}
				$delete_string .= "(ID <> $ElementContents)";
				}
			$recordSet = $conn->Execute($delete_string);
				if ($recordSet === false) log_error($delete_string);
			} // end ($num_to_delete > 0)
		elseif ($num_to_delete == 0)
			{
			$delete_string = "DELETE FROM temp";
			$recordSet = $conn->Execute($delete_string);
				if ($recordSet === false) log_error($delete_string);
			} // end elseif ($num_to_delete = 0)
			
		} // end else
	} // end while

	
	// this is the main SQL that grabs the listings
	// basic sort by title..
	if ($sortby == "" OR $sortby == "listingname")
		{
		$sort_text = "";
		$order_text = "ORDER BY Title ASC";
		}
	else
		{
		$sortby = make_db_extra_safe($sortby);
		$sort_text = "WHERE (field_name = $sortby)";
		$order_text = "ORDER BY field_value ASC";
		}
	
	$guidestring_with_sort = $guidestring_with_sort.$guidestring;
	
	$sql = "SELECT * from temp $sort_text GROUP BY ID $order_text";
	$recordSet = $conn->Execute($sql);
		if ($recordSet === false) log_error($sql);
				
	$num_rows = $recordSet->RecordCount();
	if ($num_rows > 0)
		{
		next_prev($num_rows, $cur_page, $guidestring_with_sort); // put in the next/previous stuff
	
		// build the string to select a certain number of listings per page
		$limit_str = $cur_page * $config[listings_per_page];
		$resultRecordSet = $conn->SelectLimit($sql, $config[listings_per_page], $limit_str );
			if ($resultRecordSet === false) log_error($sql);
	
		?>

		<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main" align="center">
			<tr>
				<td><b><a href="<?echo $php_self ?>?sortby=listingname&<? echo $guidestring ?>"><? echo $lang[admin_listings_editor_title] ?></a></b></td>
				<?
				// grab browsable fields
				$sql = "SELECT field_caption, field_name FROM listingsFormElements WHERE (display_on_browse = 'Yes') AND (field_type <> 'textarea') ORDER BY rank";
				$recordSet = $conn->Execute($sql);
				$num_columns = $recordSet->RecordCount();
				while (!$recordSet->EOF)
					{
					$field_caption = make_db_unsafe ($recordSet->fields[field_caption]);
					$field_name = make_db_unsafe ($recordSet->fields[field_name]);
					echo "<td align=\"center\"><b><a href=\"$PHP_SELF?sortby=$field_name&$guidestring\">$field_caption</a></b></td>";
					$recordSet->MoveNext();
					} // end while
				$num_columns = $num_columns + 1; // add one for the image
				?>
			</tr>
			<tr>
				<td colspan="<? echo $num_columns ?>">
					<hr>
				</td>
			</tr>
		
			<?		
			$count = 0;
			while (!$resultRecordSet->EOF)
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
				
				$Title = make_db_unsafe ($resultRecordSet->fields[Title]);
				$current_ID = $resultRecordSet->fields[ID];
				echo "<tr><td align=\"left\" class=\"search_row_$count\" colspan=\"$num_columns\"><b><a href=\"listingview.php?listingID=$current_ID\">$Title</a></b></td></tr>";
				echo "<tr>";
				
				// grab the listing's image
				$sql2 = "SELECT thumb_file_name FROM listingsImages WHERE listing_id = $current_ID ORDER BY rank";
				$recordSet2 = $conn->SelectLimit($sql2, 1, 0);
					if ($recordSet2 === false) log_error($sql2);
				$num_images = $recordSet2->RecordCount();
				if ($num_images == 0)
					{
					if ($config[show_no_photo] == "yes")
						{
						echo "<td class=\"search_row_$count\" align=\"center\"><img src=\"images/nophoto.gif\" border=\"1\"></td>";
						}
					else
						{
						echo "<td class=\"search_row_$count\">&nbsp;</td>";
						}
					}
				while (!$recordSet2->EOF)
					{
					$thumb_file_name = make_db_unsafe ($recordSet2->fields[thumb_file_name]);
					if ($thumb_file_name != "")
						{
						// gotta grab the image size
						$imagedata = GetImageSize("$config[listings_upload_path]/$thumb_file_name");
						$imagewidth = $imagedata[0];
						$imageheight = $imagedata[1];
						$shrinkage = $config[thumbnail_width]/$imagewidth;
						$displaywidth = $imagewidth * $shrinkage;
						$displayheight = $imageheight * $shrinkage;
						echo "<td class=\"search_row_$count\" align=\"center\"><a href=\"listingview.php?listingID=$current_ID\">";
						echo "<img src=\"$config[listings_view_images_path]/$thumb_file_name\" height=\"$displayheight\" width=\"$displaywidth\"></a></td>";
						} // end if ($thumb_file_name != "")
					$recordSet2->MoveNext();
					} // end while
				
				// grab the rest of the listing's data
				$sql2 = "SELECT listingsDBElements.field_value, listingsFormElements.field_type FROM listingsDBElements, listingsFormElements WHERE ((listingsDBElements.listing_id = $current_ID) AND (listingsFormElements.display_on_browse = 'Yes') AND (listingsFormElements.field_type <> 'textarea') AND (listingsDBElements.field_name = listingsFormElements.field_name)) ORDER BY listingsFormElements.rank";
				$recordSet2 = $conn->Execute($sql2);
					if ($recordSet2 === false) log_error($sql2);
				while (!$recordSet2->EOF)
					{
					$field_value = make_db_unsafe ($recordSet2->fields[field_value]);
					$field_type = make_db_unsafe ($recordSet2->fields[field_type]);
					echo "<td align=\"center\" class=\"search_row_$count\">";
					
					if ($field_type == "select-multiple" OR $field_type == "option" OR $field_type == "checkbox")
						{
						// handle field types with multiple options
						
						$feature_index_list = explode("||", $field_value);
						while (list($feature_list_Value, $feature_list_item) = each ($feature_index_list))
							{			
							echo "$feature_list_item<br>";
							} // end while
						} // end if field type is a multiple type
			
					elseif ($field_type == "price")
						{
						//$field_value = ereg_replace('[^0-9]', '', $field_value);
						//echo "$config[money_sign]".number_format($field_value, 2, '.', ',');
						$money_amount = international_num_format($field_value);
						echo money_format($money_amount);
						} // end elseif
					elseif ($field_type == "number")
						{
						echo international_num_format($field_value);
						} // end elseif
					elseif ($field_type == "url")
						{
						echo "<a href=\"$field_value\" target=\"_new\">$field_value</a>";
						}
					elseif ($field_type == "email")
						{
						echo "<a href=\"mailto:$field_value\">$field_value</a>";
						}
					else
						{
						echo "$field_value";
						} // end else
					
					echo "</td>";
					$recordSet2->MoveNext();
					} // end while
				
				
				echo "</tr>";
				// deal with text areas, like descriptions
				$sql2 = "SELECT listingsDBElements.field_value, listingsFormElements.field_type FROM listingsDBElements, listingsFormElements WHERE ((listingsDBElements.listing_id = $current_ID) AND (listingsFormElements.display_on_browse = 'Yes') AND (listingsFormElements.field_type = 'textarea') AND (listingsDBElements.field_name = listingsFormElements.field_name)) ORDER BY listingsFormElements.rank";
				$recordSet2 = $conn->Execute($sql2);
					if ($recordSet2 === false) log_error($sql2);
				while (!$recordSet2->EOF)
					{
					$field_value = make_db_unsafe ($recordSet2->fields[field_value]);
					$field_caption = make_db_unsafe ($recordSet2->fields[field_caption]);
					echo "<tr><td colspan=\"$num_columns\" class=\"search_row_$count\">$field_value</td></tr>";
					$recordSet2->MoveNext();
					} // end while
				
				
				$resultRecordSet->MoveNext();
				} // end while
				
				
			?>
			
		
	</table>

	<?
	} // end if ($num_rows > 0)
else
	{
	echo "<p>$lang[search_no_results]</p>";
	}


include("$config[template_path]/user_bottom.html");
?>