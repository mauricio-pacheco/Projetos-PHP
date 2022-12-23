<? include("include/common.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Configurator</title>
</head>

<body>
<?
if ($begin != "yes")
	{
	?>
	<h3>Welcome to the OpenRealty 3.0 Configuration Tool</h3>
	<p>This should automatically configure the database on your site. As a fallback, you can
	always manually load the openRealtySQL.sql text file directly into the database through your mechanism of choice...
	</p>
	<p>
	Of course, this will only work if you have first set up your site configurations in the include/common.php
	file. You *DID* look at the readme, didn't you?
	</p>
	<p>
	<a href="configurator.php?begin=yes">Click here to begin</a>
	</p>
	<?
	}
else
	{
	// the user is ready to execute the configuration tool...
	
$sql_insert[] = "CREATE TABLE UserDB (ID int(11) NOT NULL auto_increment,user_name varchar(80) NOT NULL default '',emailAddress varchar(80) NOT NULL default '',Comments text NOT NULL,user_password varchar(50) NOT NULL default '',isAdmin char(3) NOT NULL default 'No',canEditForms char(3) NOT NULL default 'No',creation_date date NOT NULL default '0000-00-00',canFeatureListings char(3) NOT NULL default 'No',canViewLogs char(3) NOT NULL default 'No',last_modified timestamp(14) NOT NULL,hitcount int(11) NOT NULL default '0',canModerate char(3) NOT NULL default 'no',PRIMARY KEY  (ID),UNIQUE KEY ID (ID,user_name),KEY ID_2 (ID));";
$sql_insert[] = "INSERT INTO UserDB (ID, user_name, emailAddress, Comments, user_password, isAdmin, canEditForms, creation_date, canFeatureListings, canViewLogs, last_modified, hitcount, canModerate) VALUES (1, 'admin', 'jon@jonroig.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'yes', 'yes', '2002-07-01', 'yes', 'yes', 20020701223850, 1, 'yes');";

$sql_insert[] = "CREATE TABLE UserDBElements (ID int(11) NOT NULL auto_increment,field_name varchar(80) NOT NULL default '', field_value text NOT NULL, user_id int(11) NOT NULL default '0',PRIMARY KEY  (ID),UNIQUE KEY ID (ID)) TYPE=MyISAM;";

$sql_insert[] = "INSERT INTO UserDBElements (ID, field_name, field_value, user_id) VALUES (1, 'edit_user_name', 'admin', 1);";
$sql_insert[] = "INSERT INTO UserDBElements (ID, field_name, field_value, user_id) VALUES (2, 'phone', '215.850.0710', 1);";
$sql_insert[] = "INSERT INTO UserDBElements (ID, field_name, field_value, user_id) VALUES (3, 'mobile', '215.850.0710', 1);";
$sql_insert[] = "INSERT INTO UserDBElements (ID, field_name, field_value, user_id) VALUES (4, 'fax', '702.995.6591', 1);";
$sql_insert[] = "INSERT INTO UserDBElements (ID, field_name, field_value, user_id) VALUES (5, 'homepage', 'http://jonroig.com', 1);";
$sql_insert[] = "INSERT INTO UserDBElements (ID, field_name, field_value, user_id) VALUES (6, 'info', 'I am the system administrator!', 1);";

$sql_insert[] = "CREATE TABLE activityLog (id int(11) NOT NULL auto_increment, log_date datetime NOT NULL default '0000-00-00 00:00:00', user int(11) NOT NULL default '0', action varchar(150) NOT NULL default '', ip_address varchar(15) NOT NULL default '',KEY id (id)) TYPE=MyISAM;";

$sql_insert[] = "CREATE TABLE listingsDB (ID int(11) NOT NULL auto_increment, user_ID int(11) NOT NULL default '0', Title varchar(80) NOT NULL default '', expiration date NOT NULL default '0000-00-00', notes text NOT NULL, creation_date date NOT NULL default '0000-00-00', last_modified timestamp(14) NOT NULL, hitcount int(11) NOT NULL default '0', featured char(3) NOT NULL default 'no', active char(3) NOT NULL default 'yes', PRIMARY KEY  (ID), UNIQUE KEY ID (ID), KEY ID_2 (ID)) TYPE=MyISAM;";

$sql_insert[] = "INSERT INTO listingsDB (ID, user_ID, Title, expiration, notes, creation_date, last_modified, hitcount, featured, active) VALUES (1, 1, 'Example Listing', '2003-07-01', 'This is an example listing!', '2002-07-01', 20020701223958, 17, 'yes', 'yes');";

$sql_insert[] = "CREATE TABLE listingsDBElements (ID int(11) NOT NULL auto_increment, field_name varchar(20) NOT NULL default '', field_value text NOT NULL, listing_id int(11) NOT NULL default '0', user_id int(11) NOT NULL default '0', PRIMARY KEY  (ID), UNIQUE KEY ID (ID)) TYPE=MyISAM;";


$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (962, 'home_features', 'Balcony||Patio/Deck||Waterfront||Dishwasher||Disposal||Gas Range||Microwave||Washer/Dryer||Carpeted Floors||Hardwood Floors||Air Conditioning||Alarm||Cable/Satellite TV||Fireplace||Wheelchair Access ', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (963, 'community_features', 'Fitness Center||Golf Course||Pool||Spa/Jacuzzi||Sports Complex||Tennis Courts||Bike Paths||Boating||Courtyard||Playground/Park||Association Fee||Clubhouse||Controlled Access||Public Transportation', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (961, 'mls', '13013', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (960, 'status', 'Active', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (958, 'prop_tax', '0', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (959, 'garage_size', '40 car', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (957, 'lot_size', '20 Acres', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (956, 'sq_feet', '35,000', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (954, 'floors', '6', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (955, 'year_built', '1800', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (953, 'baths', '35', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (952, 'beds', '10', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (951, 'type', 'Single Family', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (950, 'full_desc', 'Exclusive to this site! For two hundred years, the White House has\r\n\r\n stood as a symbol of the Presidency, the United States government,\r\nand the American people.', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (949, 'price', '2500000', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (948, 'neighborhood', 'Capitol', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (947, 'zip', '20500', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (946, 'state', 'District of Columbia', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (945, 'city', 'Washington', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (944, 'address', '1600 Pennsylvania Avenue', 1, 1);";
$sql_insert[] = "INSERT INTO listingsDBElements (ID, field_name, field_value, listing_id, user_id) VALUES (943, 'owner', '1', 1, 1);";


$sql_insert[] = "CREATE TABLE listingsFormElements (ID int(11) NOT NULL auto_increment, field_type varchar(20) NOT NULL default '', field_name varchar(20) NOT NULL default '', field_caption varchar(80) NOT NULL default '', default_text text NOT NULL, field_elements text NOT NULL, rank int(11) NOT NULL default '0', required char(3) NOT NULL default '',location varchar(15) NOT NULL default '',display_on_browse char(3) NOT NULL default 'No',PRIMARY KEY  (ID)) TYPE=MyISAM;";



$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (1, 'text', 'city', 'City', '', '', 2, 'Yes', 'top_left', 'Yes');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (2, 'text', 'address', 'Address', '', '', 0, 'Yes', 'top_left', 'Yes');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (3, 'text', 'mls', 'mls', '', '', 33, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (21, 'checkbox', 'home_features', 'Home Features', '', 'Balcony||Patio/Deck||Waterfront||Dishwasher||Disposal||Gas Range||Microwave||Washer/Dryer||Carpeted Floors||Hardwood Floors||Air Conditioning||Alarm||Cable/Satellite TV||Fireplace||Wheelchair Access ', 80, 'No', 'feature1', 'No');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (5, 'number', 'prop_tax', 'Annual Property Tax', '', '', 29, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (6, 'select', 'status', 'Status', '', 'Active||Pending||Sold', 31, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (7, 'text', 'lot_size', 'Lot Size', '', '', 27, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (8, 'text', 'garage_size', 'Garage Size', '', '', 29, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (9, 'text', 'year_built', 'Year Built', '', '', 23, 'No', 'top_left', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (10, 'number', 'sq_feet', 'Square Feet', '', '', 25, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (11, 'text', 'baths', 'Baths', '', '', 19, 'No', 'top_left', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (12, 'number', 'floors', 'Floors', '', '', 21, 'No', 'top_left', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (13, 'text', 'beds', 'Beds', '', '', 17, 'No', 'top_left', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (14, 'select', 'type', 'Type', '', 'Single Family||Condo/Townhouse||Duplex/Triplex||Mobile Home||Vacant Land||Farm Ranch||Rental Only||Time Share||Co-op||Other', 15, 'No', 'top_right', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (16, 'textarea', 'full_desc', 'Full Description', '', '', 13, 'No', 'center', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (17, 'text', 'neighborhood', 'Neighborhood', '', '', 7, 'No', 'top_left', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (18, 'price', 'price', 'Price', '', '', 9, 'No', 'top_left', '');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (19, 'text', 'zip', 'Zip', '', '', 5, 'Yes', 'top_left', 'Yes');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (20, 'select', 'state', 'State', '', 'Alabama||Alaska||Arizona||Arkansas||California||Colorado||Connecticut||Delaware||District of Columbia||Florida||Georgia||Hawaii||Idaho||Illinois||Indiana||Iowa||Kansas||Kentucky||Louisiana||Maine||Maryland||Massachusetts||Alabama||Alaska||Arizona||Arkansas||California||Colorado||Connecticut||Delaware||District of Columbia||Florida||Georgia||Hawaii||Idaho||Illinois||Indiana||Iowa||Kansas||Kentucky||Louisiana||Maine||Maryland||Massachusetts||Michigan||Minnesota||Mississippi||Missouri||Montana||Nebraska||Nevada||New Hampshire||New Jersey||New Mexico||New York||North Carolina||North Dakota||Ohio||Oklahoma||Oregon||Pennsylvania||Rhode Island||South Carolina||South Dakota||Tennessee||Texas||Utah||Vermont||Virginia||Washington||West Virginia||Wisconsin||Wyoming', 4, 'Yes', 'top_left', 'Yes');";
$sql_insert[] = "INSERT INTO listingsFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required, location, display_on_browse) VALUES (22, 'checkbox', 'community_features', 'Community Features', '', 'Fitness Center||Golf Course||Pool||Spa/Jacuzzi||Sports Complex||Tennis Courts||Bike Paths||Boating||Courtyard||Playground/Park||Association Fee||Clubhouse||Controlled Access||Public Transportation', 85, 'No', 'feature2', 'No');";


$sql_insert[] = "CREATE TABLE listingsImages (ID int(11) NOT NULL auto_increment,user_id int(11) NOT NULL default '0',caption varchar(255) NOT NULL default '',file_name varchar(80) NOT NULL default '',thumb_file_name varchar(80) NOT NULL default '',description text NOT NULL,listing_id int(11) NOT NULL default '0',rank int(11) NOT NULL default '5',active char(3) NOT NULL default 'yes',PRIMARY KEY  (ID)) TYPE=MyISAM;";


$sql_insert[] = "INSERT INTO listingsImages (ID, user_id, caption, file_name, thumb_file_name, description, listing_id, rank, active) VALUES (1, 1, 'View From the Lawn', '1_white-house.jpg', 'thumb_1_white-house.jpg', 'This property has six floors, 132 rooms, 35 bathrooms, 147 windows, 412 doors, 12 chimneys, 8 staircases, and 3 elevators.', 1, 1, 'yes');";
$sql_insert[] = "INSERT INTO listingsImages (ID, user_id, caption, file_name, thumb_file_name, description, listing_id, rank, active) VALUES (2, 1, 'Vermeil Room', '1_vermeil_room.jpg', 'thumb_1_vermeil_room.jpg', 'The Vermeil Room, sometimes called the Gold Room, was last refurbished in 1991; it serves as a display room and, for formal occasions, as a ladies sitting room. The soft yellow of the paneled walls complements the collection of vermeil, or gilded silver, bequeathed to the White House in 1956 by Mrs. Margaret Thompson Biddle.', 1, 5, 'yes');";
$sql_insert[] = "INSERT INTO listingsImages (ID, user_id, caption, file_name, thumb_file_name, description, listing_id, rank, active) VALUES (3, 1, 'The China Room', '1_china_room.jpg', 'thumb_1_china_room.jpg', 'The Presidential Collection Room, now the China Room, was designated by Mrs. Woodrow Wilson in 1917 to display the growing collection of White House china. The room was redecorated in 1970, retaining the traditional red color scheme determined by the portrait of Mrs. Calvin Coolidge--painted by Howard Chandler Christy in 1924. President Coolidge, who was scheduled to sit for Christy, was too occupied that day with events concerning the Teapot Dome oil scandal. So the President postponed his appointment, and Mrs. Coolidge posed instead.', 1, 5, 'yes');";
$sql_insert[] = "INSERT INTO listingsImages (ID, user_id, caption, file_name, thumb_file_name, description, listing_id, rank, active) VALUES (4, 1, 'State Dining Room', '1_dining_room.jpg', 'thumb_1_dining_room.jpg', 'The State Dining Room, which now seats as many as 140 guests, was originally much smaller and served at various times as a drawing room, office, and Cabinet Room. Not until the Andrew Jackson administration was it called the State Dining Room, although it had been used for formal dinners by previous Presidents.', 1, 5, 'yes');";
$sql_insert[] = "INSERT INTO listingsImages (ID, user_id, caption, file_name, thumb_file_name, description, listing_id, rank, active) VALUES (5, 1, 'The Green Room', '1_green_room.jpg', 'thumb_1_green_room.jpg', 'Although intended by architect James Hoban to be the Common Dining Room, the Green Room has served many purposes since the White House was first occupied in 1800. The inventory of February 1801 indicates that it was first used as a Lodging Room. Thomas Jefferson, the second occupant of the White House, used it as a dining room with a canvas floor cloth, painted green, foreshadowing the present color scheme. James Madison made it a sitting room since his Cabinet met in the East Room next door, and the Monroes used it as the Card Room with two tables for the whist players among their guests. ', 1, 5, 'yes');";

$sql_insert[] = "CREATE TABLE userFormElements (ID int(11) NOT NULL auto_increment,field_type varchar(20) NOT NULL default '',field_name varchar(20) NOT NULL default '',field_caption varchar(80) NOT NULL default '',default_text text NOT NULL,field_elements text NOT NULL,rank int(11) NOT NULL default '0',required char(3) NOT NULL default '',PRIMARY KEY  (ID)) TYPE=MyISAM;";



$sql_insert[] = "INSERT INTO userFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required) VALUES (3, 'textarea', 'info', 'Info', '', '', 10, 'No');";
$sql_insert[] = "INSERT INTO userFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required) VALUES (4, 'text', 'phone', 'Phone', '', '', 1, 'No');";
$sql_insert[] = "INSERT INTO userFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required) VALUES (5, 'text', 'mobile', 'Mobile', '', '', 3, 'No');";
$sql_insert[] = "INSERT INTO userFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required) VALUES (6, 'text', 'fax', 'Fax', '', '', 5, 'No');";
$sql_insert[] = "INSERT INTO userFormElements (ID, field_type, field_name, field_caption, default_text, field_elements, rank, required) VALUES (7, 'url', 'homepage', 'Homepage', '', '', 7, 'No');";


$sql_insert[] = "CREATE TABLE userImages (ID int(11) NOT NULL auto_increment,user_id int(11) NOT NULL default '0',caption varchar(255) NOT NULL default '',file_name varchar(80) NOT NULL default '',thumb_file_name varchar(80) NOT NULL default '',description text NOT NULL,rank int(11) NOT NULL default '5',active char(3) NOT NULL default 'yes',PRIMARY KEY  (ID)) TYPE=MyISAM;";



while (list($elementIndexValue, $elementContents) = each($sql_insert))
	{
	echo "<br>$elementIndexValue -- $elementContents<br>";
	$recordSet = $conn->Execute($elementContents);
		if ($recordSet === false) die ("<b><font color=red>ERROR - $elementContents</font></b>");
	}
	
	
	//$recordSet = $conn->Execute($sql_to_in[] = "INSERT);
		//if ($recordSet === false) die ("Could not $sql_insert[] = "INSERT the data!");
	echo "<br><br><h3>... that's it -- you should be good to go. I highly recommend that you remove this file, now that you're done, as it can mess stuff up if triggered by accident.</h3>";
	
	} // end else
	?>
</body>
</html>
