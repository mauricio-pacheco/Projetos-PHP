<?php


	include("include/common.php");

	
	include("$config[template_path]/user_top.html");
	?>
	<table border="<? echo $style[admin_listing_border] ?>" cellspacing="<? echo $style[admin_listing_cellspacing] ?>" cellpadding="<? echo $style[admin_listing_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">
		
		<tr>
			<td valign="top">
				<? renderFeaturedListingsVertical(4); ?>
			</td>
			<td valign="top">
				<h3>Search Listings</h3>
				
				<p><? browse_all_listings() ?></p>
				<h4>Find the perfect property:</h4>
				<p>
				<form name="listingsearch" action="./listingsearch.php" method="get">
				<table>
				<? searchbox_select ("Cities", "city") ?>
				
				<? searchbox_select ("States", "state") ?>
				
				<? searchbox_select ("Zipcodes", "zip") ?>
				
				<? searchbox_select ("Types", "type") ?>
				
				<? searchbox_option ("Status", "status") ?>
				
				<tr>
					<td align="center" colspan="2">
						<input type="checkbox" name="imagesOnly" value="yes"> <b>Show only listings with images</b>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input type="submit">
					</td>
				</tr>
				</table>
				</form>
				
				
				</p>
			</td>
		</tr>
	</table>
	
	<?
	
	
	
	include("$config[template_path]/user_bottom.html");
?>