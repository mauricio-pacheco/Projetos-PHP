# phpMyAdmin MySQL-Dump
# version 2.2.5
# http://phpwizard.net/phpMyAdmin/
# http://phpmyadmin.sourceforge.net/ (download page)
#
# Host: localhost
# Generation Time: May 05, 2002 at 07:50 PM
# Server version: 3.23.47
# PHP Version: 4.1.2
# Database : `openlistings`
# --------------------------------------------------------

#
# Table structure for table `UserDB`
#

CREATE TABLE UserDB (
  ID int(11) NOT NULL auto_increment,
  user_name varchar(80) NOT NULL default '',
  emailAddress varchar(80) NOT NULL default '',
  Comments text NOT NULL,
  user_password varchar(50) NOT NULL default '',
  isAdmin char(3) NOT NULL default 'No',
  canEditForms char(3) NOT NULL default 'No',
  creation_date date NOT NULL default '0000-00-00',
  canFeatureListings char(3) NOT NULL default 'No',
  canViewLogs char(3) NOT NULL default 'No',
  last_modified timestamp(14) NOT NULL,
  PRIMARY KEY  (ID),
  UNIQUE KEY ID (ID,user_name),
  KEY ID_2 (ID)
) TYPE=MyISAM;

#
# Dumping data for table `UserDB`
#

INSERT INTO UserDB VALUES (1, 'jon', 'jon@jonroig.com', 'this is an example', '19c927ba251a63dea68a434a2b0b2849', 'yes', 'yes', '0000-00-00', 'yes', 'yes', 20020505005053);
# --------------------------------------------------------

#
# Table structure for table `UserDBElements`
#

CREATE TABLE UserDBElements (
  ID int(11) NOT NULL auto_increment,
  field_name varchar(80) NOT NULL default '',
  field_value text NOT NULL,
  field_type varchar(80) NOT NULL default '',
  user_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ID),
  UNIQUE KEY ID (ID)
) TYPE=MyISAM;



#
# Table structure for table `activityLog`
#

CREATE TABLE activityLog (
  id int(11) NOT NULL auto_increment,
  log_date datetime NOT NULL default '0000-00-00 00:00:00',
  user int(11) NOT NULL default '0',
  action varchar(50) NOT NULL default '',
  ip_address varchar(15) NOT NULL default '',
  KEY id (id)
) TYPE=MyISAM;



#
# Table structure for table `listingsDB`
#

CREATE TABLE listingsDB (
  ID int(11) NOT NULL auto_increment,
  user_ID int(11) NOT NULL default '0',
  Title varchar(80) NOT NULL default '',
  expiration date NOT NULL default '0000-00-00',
  notes text NOT NULL,
  creation_date date NOT NULL default '0000-00-00',
  last_modified timestamp(14) NOT NULL,
  PRIMARY KEY  (ID),
  UNIQUE KEY ID (ID),
  KEY ID_2 (ID)
) TYPE=MyISAM;

#
# Dumping data for table `listingsDB`
#

INSERT INTO listingsDB VALUES (9, 1, 'test listing', '0000-00-00', 'This is a test listing', '0000-00-00', 20020505020249);
INSERT INTO listingsDB VALUES (12, 1, 'this old test house', '0000-00-00', 'bob villa, eat your heart out', '2002-05-05', 20020505120751);
# --------------------------------------------------------

#
# Table structure for table `listingsDBElements`
#

CREATE TABLE listingsDBElements (
  ID int(11) NOT NULL auto_increment,
  field_name varchar(20) NOT NULL default '',
  field_value text NOT NULL,
  field_type varchar(20) NOT NULL default '',
  listing_id int(11) NOT NULL default '0',
  user_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ID),
  UNIQUE KEY ID (ID)
) TYPE=MyISAM;

#
# Dumping data for table `listingsDBElements`
#

INSERT INTO listingsDBElements VALUES (373, 'prop_tax', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (372, 'lot_size', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (371, 'sq_feet', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (370, 'year_built', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (369, 'floors', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (368, 'baths', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (367, 'beds', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (366, 'type', 'Single Family', '', 1, 0);
INSERT INTO listingsDBElements VALUES (365, 'full_desc', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (364, 'preview_desc', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (363, 'price', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (362, 'neighborhood', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (361, 'zip', '19119', '', 1, 0);
INSERT INTO listingsDBElements VALUES (360, 'state', 'Pennsylvania', '', 1, 0);
INSERT INTO listingsDBElements VALUES (359, 'city', 'philadelphia', '', 1, 0);
INSERT INTO listingsDBElements VALUES (358, 'address', '123 test street', '', 1, 0);
INSERT INTO listingsDBElements VALUES (357, 'owner', '1', '', 1, 0);
INSERT INTO listingsDBElements VALUES (889, 'mls', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (737, 'test2', 'blah 1||blah 3', '', 9, 1);
INSERT INTO listingsDBElements VALUES (138, 'mls', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (137, 'status', 'Active', '', 3, 0);
INSERT INTO listingsDBElements VALUES (136, 'garage_size', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (135, 'prop_tax', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (134, 'lot_size', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (133, 'sq_feet', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (132, 'year_built', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (131, 'floors', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (130, 'baths', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (129, 'beds', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (128, 'type', 'Single Family', '', 3, 0);
INSERT INTO listingsDBElements VALUES (127, 'full_desc', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (126, 'preview_desc', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (125, 'price', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (124, 'neighborhood', '', '', 3, 0);
INSERT INTO listingsDBElements VALUES (121, 'city', '-089-098', '', 3, 0);
INSERT INTO listingsDBElements VALUES (122, 'state', 'Alabama', '', 3, 0);
INSERT INTO listingsDBElements VALUES (123, 'zip', '90210', '', 3, 0);
INSERT INTO listingsDBElements VALUES (887, 'garage_size', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (888, 'status', 'Active', '', 12, 1);
INSERT INTO listingsDBElements VALUES (120, 'address', '3089408', '', 3, 0);
INSERT INTO listingsDBElements VALUES (119, 'owner', '666', '', 3, 0);
INSERT INTO listingsDBElements VALUES (374, 'garage_size', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (375, 'status', 'Active', '', 1, 0);
INSERT INTO listingsDBElements VALUES (376, 'mls', '', '', 1, 0);
INSERT INTO listingsDBElements VALUES (736, 'mls', '13013', '', 9, 1);
INSERT INTO listingsDBElements VALUES (735, 'status', 'Sold', '', 9, 1);
INSERT INTO listingsDBElements VALUES (734, 'garage_size', 'HUGE!', '', 9, 1);
INSERT INTO listingsDBElements VALUES (733, 'prop_tax', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (732, 'lot_size', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (731, 'sq_feet', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (730, 'year_built', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (729, 'floors', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (728, 'baths', '500', '', 9, 1);
INSERT INTO listingsDBElements VALUES (727, 'beds', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (726, 'type', 'Co-op', '', 9, 1);
INSERT INTO listingsDBElements VALUES (725, 'full_desc', 'I like this place!', '', 9, 1);
INSERT INTO listingsDBElements VALUES (724, 'preview_desc', 'This is a nice house', '', 9, 1);
INSERT INTO listingsDBElements VALUES (723, 'price', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (722, 'neighborhood', '', '', 9, 1);
INSERT INTO listingsDBElements VALUES (721, 'zip', '90210', '', 9, 1);
INSERT INTO listingsDBElements VALUES (720, 'state', 'Maine', '', 9, 1);
INSERT INTO listingsDBElements VALUES (719, 'city', 'test', '', 9, 1);
INSERT INTO listingsDBElements VALUES (718, 'address', '3894 test street', '', 9, 1);
INSERT INTO listingsDBElements VALUES (886, 'prop_tax', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (885, 'lot_size', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (884, 'sq_feet', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (883, 'year_built', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (882, 'floors', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (881, 'baths', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (880, 'beds', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (879, 'type', 'Single Family', '', 12, 1);
INSERT INTO listingsDBElements VALUES (878, 'full_desc', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (877, 'preview_desc', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (876, 'price', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (875, 'neighborhood', '', '', 12, 1);
INSERT INTO listingsDBElements VALUES (874, 'zip', '90210', '', 12, 1);
INSERT INTO listingsDBElements VALUES (873, 'state', 'California', '', 12, 1);
INSERT INTO listingsDBElements VALUES (872, 'city', 'smallsville', '', 12, 1);
INSERT INTO listingsDBElements VALUES (871, 'address', 'p.o. box 13013', '', 12, 1);
# --------------------------------------------------------

#
# Table structure for table `listingsFormElements`
#

CREATE TABLE listingsFormElements (
  ID int(11) NOT NULL auto_increment,
  field_type varchar(20) NOT NULL default '',
  field_name varchar(20) NOT NULL default '',
  field_caption varchar(80) NOT NULL default '',
  default_text text NOT NULL,
  field_elements text NOT NULL,
  rank int(11) NOT NULL default '0',
  required char(3) NOT NULL default '',
  location varchar(15) NOT NULL default '',
  display_on_browse char(3) NOT NULL default 'No',
  PRIMARY KEY  (ID)
) TYPE=MyISAM;

#
# Dumping data for table `listingsFormElements`
#

INSERT INTO listingsFormElements VALUES (1, 'text', 'city', 'City', '', '', 2, 'Yes', 'headline', '');
INSERT INTO listingsFormElements VALUES (2, 'text', 'address', 'Address', '', '', 0, 'Yes', 'headline', '');
INSERT INTO listingsFormElements VALUES (3, 'text', 'mls', 'mls', '', '', 33, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (21, 'select-multiple', 'test2', 'test 2', '', 'blah 1||blah 2||blah 3', 80, 'No', 'top_right', 'No');
INSERT INTO listingsFormElements VALUES (5, 'number', 'prop_tax', 'Annual Property Tax', '', '', 29, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (6, 'select', 'status', 'Status', '', 'Active||Pending||Sold', 31, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (7, 'text', 'lot_size', 'Lot Size', '', '', 27, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (8, 'text', 'garage_size', 'Garage Size', '', '', 29, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (9, 'text', 'year_built', 'Year Built', '', '', 23, 'No', 'top_left', '');
INSERT INTO listingsFormElements VALUES (10, 'number', 'sq_feet', 'Square Feet', '', '', 25, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (11, 'text', 'baths', 'Baths', '', '', 19, 'No', 'top_left', '');
INSERT INTO listingsFormElements VALUES (12, 'number', 'floors', 'Floors', '', '', 21, 'No', 'top_left', '');
INSERT INTO listingsFormElements VALUES (13, 'text', 'beds', 'Beds', '', '', 17, 'No', 'top_left', '');
INSERT INTO listingsFormElements VALUES (14, 'select', 'type', 'Type', '', 'Single Family||Condo/Townhouse||Duplex/Triplex||Mobile Home||Vacant Land||Farm Ranch||Rental Only||Time Share||Co-op||Other', 15, 'No', 'top_right', '');
INSERT INTO listingsFormElements VALUES (15, 'textarea', 'preview_desc', 'Preview Description', '', '', 11, 'No', 'center', '');
INSERT INTO listingsFormElements VALUES (16, 'textarea', 'full_desc', 'Full Description', '', '', 13, 'No', 'center', '');
INSERT INTO listingsFormElements VALUES (17, 'text', 'neighborhood', 'Neighborhood', '', '', 7, 'No', 'top_left', '');
INSERT INTO listingsFormElements VALUES (18, 'price', 'price', 'Price', '', '', 9, 'No', 'top_left', '');
INSERT INTO listingsFormElements VALUES (19, 'text', 'zip', 'Zip', '', '', 5, 'Yes', 'headline', '');
INSERT INTO listingsFormElements VALUES (20, 'select', 'state', 'State', '', 'Alabama||Alaska||Arizona||Arkansas||California||Colorado||Connecticut||Delaware||District of Columbia||Florida||Georgia||Hawaii||Idaho||Illinois||Indiana||Iowa||Kansas||Kentucky||Louisiana||Maine||Maryland||Massachusetts||Alabama||Alaska||Arizona||Arkansas||California||Colorado||Connecticut||Delaware||District of Columbia||Florida||Georgia||Hawaii||Idaho||Illinois||Indiana||Iowa||Kansas||Kentucky||Louisiana||Maine||Maryland||Massachusetts||Michigan||Minnesota||Mississippi||Missouri||Montana||Nebraska||Nevada||New Hampshire||New Jersey||New Mexico||New York||North Carolina||North Dakota||Ohio||Oklahoma||Oregon||Pennsylvania||Rhode Island||South Carolina||South Dakota||Tennessee||Texas||Utah||Vermont||Virginia||Washington||West Virginia||Wisconsin||Wyoming', 4, 'Yes', 'headline', '');
# --------------------------------------------------------

#
# Table structure for table `listingsImages`
#

CREATE TABLE listingsImages (
  ID int(11) NOT NULL auto_increment,
  user_id int(11) NOT NULL default '0',
  caption varchar(255) NOT NULL default '',
  file_name varchar(80) NOT NULL default '',
  thumb_file_name varchar(80) NOT NULL default '',
  description text NOT NULL,
  listing_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ID)
) TYPE=MyISAM;



#
# Table structure for table `userFormElements`
#

CREATE TABLE userFormElements (
  ID int(11) NOT NULL auto_increment,
  field_type varchar(20) NOT NULL default '',
  field_name varchar(20) NOT NULL default '',
  field_caption varchar(80) NOT NULL default '',
  default_text text NOT NULL,
  field_elements text NOT NULL,
  rank int(11) NOT NULL default '0',
  required char(3) NOT NULL default '',
  PRIMARY KEY  (ID)
) TYPE=MyISAM;

#
# Dumping data for table `userFormElements`
#

INSERT INTO userFormElements VALUES (3, 'textarea', 'info', 'About You', '', '', 5, 'Yes');
INSERT INTO userFormElements VALUES (4, 'select', 'testing', 'testing', '', 'option 1||option 2||option 3', 5, 'No');
# --------------------------------------------------------

#
# Table structure for table `userImages`
#

CREATE TABLE userImages (
  ID int(11) NOT NULL auto_increment,
  user_id int(11) NOT NULL default '0',
  caption varchar(255) NOT NULL default '',
  file_name varchar(80) NOT NULL default '',
  thumb_file_name varchar(80) NOT NULL default '',
  description text NOT NULL,
  PRIMARY KEY  (ID)
) TYPE=MyISAM;

