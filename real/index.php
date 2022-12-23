<?php


	include("include/common.php");

	
	include("$config[template_path]/user_top.html");
	?>
	<table border="<? echo $style[admin_listing_border] ?>" cellspacing="<? echo $style[admin_listing_cellspacing] ?>" cellpadding="<? echo $style[admin_listing_cellpadding] ?>" width="<? echo $style[admin_table_width] ?>" class="form_main">
		<tr>
			<td valign="top">
				<? renderFeaturedListingsVertical(4); ?>
			</td>
			<td>
				<h3>OpenRealty 3.01</h3>
				<center>
				<? browse_all_listings() ?> | <a href="listing_browse.php">Search Listings</a>
				<br> <a href="http://jonroig.com/freecode/phpBB/">Support Forum</a> | <a href="http://jonroig.com/freecode/openrealty/openrealty.zip">Download OpenRealty 3.01</a>
				</center>
				
				<p><B>So easy, even a real estate agent can do it!</b> OpenRealty is a free, open source real estate listing manager. Intended to be both easy to install and easy to administer, OpenRealty uses PHP to drive a mySQL backend, thus creating a tool which is fast and flexible.</p>
		<p>While the basic version of OpenRealty can be downloaded for free, I'm always available to customize it for your specific needs. Feel free to <a href="mailto:jon@jonroig.com">contact me</a>.</font></p>
		<BR>
		<form action="http://jonroig.com/update_signup.php" method="POST">
		
		<h3>Receive Updates On OpenRealty via Email!</h3>
		<p>
		<table BORDER="0" CELLSPACING="0"><tr><td align="center"><b></td></tr><tr><td align="center"><table border="0" cellspacing="2" align="center"><tr><td align="center">Email Address: <input type="text" name="email"></td><td align="center"><input type="submit" value="Subscribe"></td></tr></table></td></tr></table></form>
		</p>
		
		<center>
		
		<form action="http://www.hotscripts.com/cgi-bin/rate.cgi" method="POST"><input type="hidden" name="ID" value="8655"><table BORDER="0" CELLSPACING="0"><tr><td align="center"><b>If you like our script, please rate it at <b><a href="http://www.hotscripts.com"><i>HotScripts.com</i></a></td></tr><tr><td align="center"><table border="0" cellspacing="2" align="center"><tr><td align="center"><select name="ex_rate" size="1"><option value="5" selected>Excellent!</option><option value="4">Very Good</option><option value="3">Good</option><option value="2">Fair</option><option value="1">Poor</option></select></td><td align="center"><input type="submit" value="Cast My Vote!"></td></tr></table></td></tr></table></form>
		</center>
		<h3>Features:</h3>
		<ul>
			<li>Allows visitors to look through your real estate listings 24 hours a day, 7 days a week, 365.25 days a year.
			<li>Easily keep your property listings updated -- no HTML coding required to add, delete, or modify listings.
			<li>Built-in image manager -- upload photos via your web browser, either when creating new listings or modifying an existing one. If photos are not uploaded for a property, a &quot;photo not available&quot; image will be automatically displayed for the listing.
			<li>Automatically thumbnails -- smaller versions of your images are automatically created through the GD library.
			<li>Automagically interfaces with Yahoo Maps -- potential customers will always know exactly where to find your property.
			<li>Flexible database backend -- compatible with mysql, oracle, microsoft SQL, etc... through the ADODB abstraction layer.
			<li>Secure -- no one but you can change your listings.
			<li>Viral Marketing -- visitors can email listings to their friends right from OpenRealty.
			<li>Easy to install -- just edit a single configuration file.
			<li>Showcase specific properties -- built-in featured listing manager allows you to place special offerings right on your front page.
			<li>Flexible search -- browse properties according to whatever criteria you like.
			<li>Easy setup -- configurator tool makes OpenRealty 3.0 easy to install.
			<li>Configurable forms -- Don't like the form choices included in OpenRealty? Change them to meet your needs!
			<li>Template system -- produce a sophisticated site without any knowledge of PHP
			<li>Supports CSS stylesheets.
			<li>Multilanguage capable
			
		</ul>
		<p>Of course, OpenRealty is written entirely in PHP, which makes it easy to customize and revise to match the look of your website.</p>
		<p><br>
		<center><B><a href="readme.html">Installation Instructions</a>  |  <a href="http://jonroig.com/freecode/phpBB/">Support Forum</a>
		<BR><a href="http://jonroig.com/freecode/openrealty/openlinks.php">See the Code in Use</a>
		</b></center>
		
		<h3>Version 3.01 update (07-07-2002) </h3>
<ul>
<li> Fixed problem with allowed HTML in text fields.
<li> Occasionally the PHPSESSID would throw off the search results. NO MORE!
<li> Cleaned up the search results code a tiny bit.
<li> Fixed problem with image uploads on machines that use safe_mode.
<li> On the listingsearch.php page, and textarea item marked "Show on Browse" will display on its own line.
<li> When you delete a listing now, it deletes all the images associated with it.
<li> When a user is deleted, the user's listings are all deleted, along with any images associated with them.
<li> Added support a default image if no image is available.
<li> You can now allow users to edit their own listing's expiration dates, if you like.
<li> Speaking of expiration dates, listings expire properly now.
<li> Upgraded to ADODB 2.12 (details @ <a href="http://php.weblogs.com/ADODB" target="_adodb">http://php.weblogs.com/ADODB</a>.
<li> We now support international numbering and money amounts.
<li> Added new functions: renderSingleListingItemRaw, latestListings.
<li> New translations: German, Spanish, French, Italian, Finnish, Swedish.
<li> Completed support for Access databases (I think).
</ul>
		
		
	
		<h3>Version 3.0 update (7-1-02):</h3>
		<ul>
		<li> Completely rewritten from scratch, OpenRealty nows runs on the OpenListings platform, a flexible form-based system for creating listings sites.
		<li> Thumbnails automatically through the GD library.
		<li> New template system.
		<li> ... and lots of other new stuff... (see above)
		
		</UL>


			</td>
		</tr>
	</table>
	
	<?
	
	
	
	include("$config[template_path]/user_bottom.html");
?>