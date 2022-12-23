<?php


include("include/common.php");
include("$config[template_path]/user_top.html");

	
if ($listingID == "")
	{
	echo "<a href=\"index.php\">$lang[perhaps_you_were_looking_something_else]</a>";
	}	
	
	
elseif ($listingID != "")
	{
	// first, check to see whether the listing is currently active
	$show_listing = checkActive($listingID);
	if ($show_listing == "yes")
		{
		?>
	
	<table border="<? echo $style[form_border] ?>" cellspacing="<? echo $style[form_cellspacing] ?>" cellpadding="<? echo $style[form_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main" align="center" >
		<tr>
			<td colspan="2" class="row_main">
				<? getMainListingData($listingID); ?>
			
				<h4>
				<? renderTemplateAreaNoCaption(headline,$listingID); ?>
				
				</h4>
			</td>
		</tr>
		<tr>
			
				<?
				renderListingsImages($listingID)
				?>
			
			<td class="row_main" valign="top" >
				<table width="<? echo $style[left_right_table_width] ?>" cellpadding="<? echo $style[left_right_table_cellpadding] ?>" cellspacing="<? echo $style[left_right_table_cellspacing] ?>" border="<? echo $style[left_right_table_border] ?>">
					<tr>
						<td align="left" class="row_main" width="50%" valign="top">
							<? renderTemplateArea(top_left,$listingID); ?>
							
							
						</td>
						<td align="right" class="row_main" width="50%" valign="top">
							<? renderTemplateArea(top_right,$listingID); ?>
							
							
						</td>
					</tr>
				</table>
				<br>
				<table width="98%" valign="top">
					<tr>
						<td>
						<? renderSingleListingItemNoCaption($listingID, "full_desc") ?>
						<br><br>
						</td>
					</tr>
				</table>
				
				
				
				<table width="<? echo $style[left_right_table_width] ?>" cellpadding="<? echo $style[left_right_table_cellpadding] ?>" cellspacing="<? echo $style[left_right_table_cellspacing] ?>" border="<? echo $style[left_right_table_border] ?>">
					<tr>
						<td align="left" class="row_main" width="50%" valign="top">
							<? renderTemplateArea(feature1,$listingID); ?>
						</td>
						<td align="right" class="row_main" width="50%" valign="top">
							<? renderTemplateArea(feature2,$listingID); ?>
						</td>
					</tr>
				</table>
			<br><br><a href="listingview.php?listingID=<? echo $listingID ?>&printer_friendly=yes">Printer Friendly Version of This Page</a></b>
			<br><a href="email_listing.php?listingID=<? echo $listingID ?>">Email This Listing to a Friend</a></b>
			<br><? makeYahooMap($listingID, "address", "city", "zip") ?>
			
			<br><br>
			<hr size="1" width="75%">
			<? renderUserInfoOnListingsPage($listingID) ?>
			<br>
			<? getListingEmail($listingID) ?>
			<br><br>
			<hr size="1" width="75%">
			<? hitcount($listingID) ?>
			
			</td>
		</tr>
 	</table>
	
	<?
		} // end if ($show_listing == "yes")
	} // end elseif ($listingID != "")

include("$config[template_path]/user_bottom.html");
?>