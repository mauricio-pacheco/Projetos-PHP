# MySQL-Front 3.1  (Build 4.38)


# Host: 72.29.89.11    Database: gvang_comeco
# ------------------------------------------------------
# Server version 4.1.21-standard

#
# Table structure for table judasaccesscache
#

CREATE TABLE `judasaccesscache` (
  `cacheid` bigint(20) NOT NULL auto_increment,
  `user` bigint(20) NOT NULL default '0',
  `type` enum('e','c') NOT NULL default 'e',
  `eidcid` bigint(20) NOT NULL default '0',
  `result` enum('nok','readonly','ok') NOT NULL default 'nok',
  PRIMARY KEY  (`cacheid`),
  KEY `user` (`user`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=52327 DEFAULT CHARSET=latin1 COMMENT='CRM Access cache table';

#
# Table structure for table judasbinfiles
#

CREATE TABLE `judasbinfiles` (
  `fileid` bigint(20) NOT NULL auto_increment,
  `koppelid` bigint(20) NOT NULL default '0',
  `filename` varchar(200) NOT NULL default '',
  `creation_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `filesize` mediumint(9) NOT NULL default '0',
  `filetype` varchar(150) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `checked` enum('in','out') NOT NULL default 'in',
  `checked_out_by` int(11) NOT NULL default '0',
  `type` enum('entity','cust') NOT NULL default 'entity',
  `file_subject` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`fileid`),
  KEY `koppelid` (`koppelid`),
  KEY `checked` (`checked`),
  KEY `filetype` (`filetype`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='CRM Binairy files';

#
# Table structure for table judasblobs
#

CREATE TABLE `judasblobs` (
  `fileid` bigint(20) NOT NULL default '0',
  `content` mediumblob NOT NULL,
  PRIMARY KEY  (`fileid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Blob stand-alone table';

#
# Table structure for table judascache
#

CREATE TABLE `judascache` (
  `stashid` bigint(20) NOT NULL auto_increment,
  `epoch` varchar(20) default NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`stashid`),
  FULLTEXT KEY `value` (`value`)
) ENGINE=MyISAM AUTO_INCREMENT=312 DEFAULT CHARSET=latin1 COMMENT='CRM Query cache table';

#
# Table structure for table judascalendar
#

CREATE TABLE `judascalendar` (
  `user` varchar(20) NOT NULL default '',
  `Tijdpostzegel` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `datum` date NOT NULL default '0000-00-00',
  `basicdate` varchar(8) NOT NULL default '',
  `calendarid` mediumint(5) NOT NULL auto_increment,
  `type` varchar(10) NOT NULL default '',
  `customnum` varchar(12) NOT NULL default '',
  `emailadress` varchar(150) NOT NULL default '',
  `eID` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`calendarid`),
  KEY `Tijdpostzegel` (`Tijdpostzegel`),
  KEY `basicdate` (`basicdate`),
  KEY `datum` (`datum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Calendar entries';

#
# Table structure for table judascontactmoments
#

CREATE TABLE `judascontactmoments` (
  `id` int(11) NOT NULL auto_increment,
  `eidcid` int(11) NOT NULL default '0',
  `type` enum('entity','customer') NOT NULL default 'entity',
  `user` int(11) NOT NULL default '0',
  `meta` text NOT NULL,
  `body` longtext NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `to` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='CRM Contact moments journal';

#
# Table structure for table judascustomaddons
#

CREATE TABLE `judascustomaddons` (
  `id` bigint(20) NOT NULL auto_increment,
  `eid` bigint(20) NOT NULL default '0',
  `type` varchar(50) NOT NULL default '',
  `name` bigint(20) NOT NULL default '0',
  `value` longtext NOT NULL,
  `deleted` enum('y','n') NOT NULL default 'n',
  `usr` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `deleted` (`deleted`),
  KEY `name` (`name`),
  KEY `eid` (`eid`),
  FULLTEXT KEY `value` (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Extra fields sequential table';

#
# Table structure for table judascustomer
#

CREATE TABLE `judascustomer` (
  `id` int(11) NOT NULL auto_increment,
  `readonly` enum('no','yes') NOT NULL default 'no',
  `custname` varchar(200) NOT NULL default '',
  `contact` varchar(240) NOT NULL default '',
  `contact_title` varchar(240) NOT NULL default '',
  `contact_phone` varchar(50) NOT NULL default '',
  `contact_email` varchar(240) NOT NULL default '',
  `cust_address` longtext NOT NULL,
  `cust_remarks` longtext NOT NULL,
  `cust_homepage` varchar(240) NOT NULL default '',
  `active` enum('yes','no') NOT NULL default 'yes',
  `customer_owner` int(11) NOT NULL default '0',
  `email_owner_upon_adds` enum('no','yes') NOT NULL default 'no',
  PRIMARY KEY  (`id`),
  KEY `custname` (`custname`),
  KEY `active` (`active`),
  FULLTEXT KEY `cust_address` (`cust_address`,`cust_remarks`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='CRM Main customer table';

#
# Table structure for table judasejournal
#

CREATE TABLE `judasejournal` (
  `id` int(11) NOT NULL auto_increment,
  `eid` int(11) NOT NULL default '0',
  `category` varchar(150) NOT NULL default '',
  `content` longtext NOT NULL,
  `status` varchar(50) NOT NULL default 'open',
  `priority` varchar(50) NOT NULL default 'low',
  `owner` int(11) NOT NULL default '0',
  `assignee` int(11) NOT NULL default '0',
  `CRMcustomer` int(11) NOT NULL default '0',
  `tp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `deleted` enum('n','y') NOT NULL default 'n',
  `duedate` varchar(15) NOT NULL default '',
  `sqldate` date NOT NULL default '0000-00-00',
  `obsolete` enum('y','n') NOT NULL default 'n',
  `cdate` date NOT NULL default '0000-00-00',
  `waiting` enum('n','y') NOT NULL default 'n',
  `readonly` enum('n','y') NOT NULL default 'n',
  `closedate` date NOT NULL default '0000-00-00',
  `lasteditby` bigint(20) NOT NULL default '0',
  `createdby` bigint(20) NOT NULL default '0',
  `notify_assignee` enum('n','y') NOT NULL default 'n',
  `notify_owner` enum('n','y') NOT NULL default 'n',
  `private` enum('n','y') NOT NULL default 'n',
  `duetime` varchar(4) NOT NULL default '',
  `formid` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=413 DEFAULT CHARSET=latin1 COMMENT='CRM Entity contents journal';

#
# Table structure for table judasentity
#

CREATE TABLE `judasentity` (
  `eid` int(11) NOT NULL auto_increment,
  `category` varchar(150) NOT NULL default '',
  `content` longtext NOT NULL,
  `status` varchar(50) NOT NULL default 'open',
  `priority` varchar(50) NOT NULL default 'low',
  `owner` int(11) NOT NULL default '0',
  `assignee` int(11) NOT NULL default '0',
  `CRMcustomer` int(11) NOT NULL default '0',
  `tp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `deleted` enum('n','y') NOT NULL default 'n',
  `duedate` varchar(15) NOT NULL default '',
  `sqldate` date NOT NULL default '0000-00-00',
  `obsolete` enum('y','n') NOT NULL default 'n',
  `cdate` date NOT NULL default '0000-00-00',
  `waiting` enum('n','y') NOT NULL default 'n',
  `readonly` enum('n','y') NOT NULL default 'n',
  `closedate` date NOT NULL default '0000-00-00',
  `lasteditby` bigint(20) NOT NULL default '0',
  `createdby` bigint(20) NOT NULL default '0',
  `notify_assignee` enum('n','y') NOT NULL default 'n',
  `notify_owner` enum('n','y') NOT NULL default 'n',
  `openepoch` varchar(30) NOT NULL default '',
  `closeepoch` varchar(30) NOT NULL default '',
  `private` enum('n','y') NOT NULL default 'n',
  `duetime` varchar(4) NOT NULL default '',
  `parent` bigint(20) NOT NULL default '0',
  `formid` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `duedate` (`duedate`),
  KEY `assignee` (`assignee`),
  KEY `owner` (`owner`),
  KEY `sqldate` (`sqldate`),
  KEY `CRMcustomer` (`CRMcustomer`),
  KEY `deleted` (`deleted`),
  KEY `openepoch` (`openepoch`),
  KEY `closeepoch` (`closeepoch`),
  KEY `formid` (`formid`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=latin1 COMMENT='CRM Main entity table';

#
# Table structure for table judasentitylocks
#

CREATE TABLE `judasentitylocks` (
  `lockid` bigint(20) NOT NULL auto_increment,
  `lockon` bigint(20) NOT NULL default '0',
  `lockby` bigint(20) NOT NULL default '0',
  `lockepoch` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`lockid`),
  KEY `lockon` (`lockon`),
  KEY `lockepoch` (`lockepoch`)
) ENGINE=MyISAM AUTO_INCREMENT=687 DEFAULT CHARSET=latin1 COMMENT='CRM Entity record locks';

#
# Table structure for table judasextrafields
#

CREATE TABLE `judasextrafields` (
  `id` bigint(20) NOT NULL auto_increment,
  `ordering` mediumint(9) NOT NULL default '0',
  `tabletype` enum('entity','customer') NOT NULL default 'entity',
  `hidden` enum('n','y','a') NOT NULL default 'n',
  `location` varchar(40) NOT NULL default '',
  `deleted` enum('n','y') NOT NULL default 'n',
  `fieldtype` varchar(50) NOT NULL default '',
  `name` varchar(250) NOT NULL default '',
  `options` longtext NOT NULL,
  `forcing` enum('n','y') NOT NULL default 'n',
  `defaultval` varchar(250) default NULL,
  `sort` enum('n','y') NOT NULL default 'n',
  `storetype` enum('default','3rd_table','3d_table_popup') NOT NULL default 'default',
  `accessarray` longtext NOT NULL,
  `size` int(11) NOT NULL default '0',
  UNIQUE KEY `id` (`id`),
  KEY `location` (`location`),
  KEY `tabletype` (`tabletype`),
  FULLTEXT KEY `name` (`name`,`options`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Extra field definitions';

#
# Table structure for table judashelp
#

CREATE TABLE `judashelp` (
  `helpid` bigint(20) NOT NULL auto_increment,
  `title` varchar(240) NOT NULL default '',
  `content` longtext NOT NULL,
  PRIMARY KEY  (`helpid`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='CRM Help contents table';

#
# Table structure for table judasinternalmessages
#

CREATE TABLE `judasinternalmessages` (
  `id` bigint(20) NOT NULL auto_increment,
  `to` bigint(20) NOT NULL default '0',
  `from` bigint(20) NOT NULL default '0',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `read` enum('n','y') NOT NULL default 'n',
  `body` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `to` (`to`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM-CTT Internal messages (user-to-user)';

#
# Table structure for table judasjournal
#

CREATE TABLE `judasjournal` (
  `id` bigint(20) NOT NULL auto_increment,
  `eid` bigint(20) NOT NULL default '0',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `user` bigint(20) NOT NULL default '0',
  `message` longtext NOT NULL,
  `type` varchar(20) NOT NULL default 'entity',
  PRIMARY KEY  (`id`),
  KEY `eid` (`eid`,`user`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=603 DEFAULT CHARSET=latin1 COMMENT='CRM Entity/customer journal';

#
# Table structure for table judaslanguages
#

CREATE TABLE `judaslanguages` (
  `id` bigint(20) NOT NULL auto_increment,
  `LANGID` varchar(15) NOT NULL default '',
  `TEXTID` varchar(30) NOT NULL default '',
  `TEXT` varchar(255) NOT NULL default '',
  UNIQUE KEY `id` (`id`),
  KEY `LANGID` (`LANGID`)
) ENGINE=MyISAM AUTO_INCREMENT=575 DEFAULT CHARSET=latin1 COMMENT='CRM language table';

#
# Table structure for table judaslanguages2
#

CREATE TABLE `judaslanguages2` (
  `id` bigint(20) NOT NULL auto_increment,
  `LANGID` varchar(15) NOT NULL default '',
  `TEXTID` varchar(30) NOT NULL default '',
  `TEXT` varchar(255) NOT NULL default '',
  UNIQUE KEY `id` (`id`),
  KEY `LANGID` (`LANGID`)
) ENGINE=MyISAM AUTO_INCREMENT=571 DEFAULT CHARSET=latin1 COMMENT='CRM language table';

#
# Table structure for table judasloginusers
#

CREATE TABLE `judasloginusers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `password` varchar(50) default NULL,
  `PROFILE` varchar(10) NOT NULL default '',
  `type` enum('normal','limited') NOT NULL default 'normal',
  `active` enum('yes','no') NOT NULL default 'yes',
  `exptime` varchar(40) NOT NULL default '',
  `noexp` enum('n','y') NOT NULL default 'n',
  `FULLNAME` varchar(150) NOT NULL default '',
  `EMAIL` varchar(150) NOT NULL default '',
  `CLLEVEL` varchar(50) NOT NULL default 'ro',
  `administrator` enum('yes','no') NOT NULL default 'no',
  `LASTFILTER` longtext NOT NULL,
  `LASTSORT` varchar(50) NOT NULL default '',
  `RECEIVEDAILYMAIL` enum('No','Yes') NOT NULL default 'No',
  `RECEIVEALLOWNERUPDATES` enum('n','y') NOT NULL default 'n',
  `RECEIVEALLASSIGNEEUPDATES` enum('n','y') NOT NULL default 'n',
  `HIDEADDTAB` char(1) NOT NULL default '',
  `HIDECSVTAB` char(1) NOT NULL default '',
  `HIDESUMMARYTAB` char(1) NOT NULL default '',
  `HIDEENTITYTAB` char(1) NOT NULL default '',
  `HIDEPBTAB` char(1) NOT NULL default '',
  `SHOWDELETEDVIEWOPTION` char(1) NOT NULL default '',
  `HIDECUSTOMERTAB` char(1) NOT NULL default '',
  `SAVEDSEARCHES` longtext NOT NULL,
  `EMAILCREDENTIALS` longtext NOT NULL,
  `ENTITYADDFORM` varchar(10) NOT NULL default '',
  `ENTITYEDITFORM` varchar(10) NOT NULL default '',
  `LIMITTOCUSTOMERS` longtext NOT NULL,
  `ADDFORMS` longtext NOT NULL,
  `ELISTLAYOUT` text NOT NULL,
  `CLISTLAYOUT` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  FULLTEXT KEY `SAVEDSEARCHES` (`SAVEDSEARCHES`),
  FULLTEXT KEY `EMAILCREDENTIALS` (`EMAILCREDENTIALS`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1 COMMENT='CRM User definition table';

#
# Table structure for table judasphonebook
#

CREATE TABLE `judasphonebook` (
  `id` mediumint(5) NOT NULL auto_increment,
  `Firstname` varchar(50) NOT NULL default '',
  `Lastname` varchar(50) NOT NULL default '',
  `Telephone` varchar(15) NOT NULL default '',
  `Company` varchar(50) NOT NULL default '',
  `Department` varchar(50) NOT NULL default '',
  `Title` varchar(100) NOT NULL default '',
  `Room` varchar(60) NOT NULL default '',
  `Email` varchar(60) NOT NULL default '',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Phone book table';

#
# Table structure for table judaspriorityvars
#

CREATE TABLE `judaspriorityvars` (
  `id` int(11) NOT NULL auto_increment,
  `varname` varchar(50) NOT NULL default '',
  `color` varchar(7) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `varname` (`varname`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='CRM Priority definitions table';

#
# Table structure for table judassessions
#

CREATE TABLE `judassessions` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `temp` varchar(100) NOT NULL default '',
  `active` enum('yes','no') NOT NULL default 'yes',
  `exptime` varchar(40) NOT NULL default '',
  `noexp` enum('n','y') NOT NULL default 'n',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=645 DEFAULT CHARSET=latin1 COMMENT='CRM Session table';

#
# Table structure for table judassettings
#

CREATE TABLE `judassettings` (
  `settingid` bigint(20) NOT NULL auto_increment,
  `setting` varchar(150) NOT NULL default '',
  `value` longtext NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `discription` varchar(250) NOT NULL default '',
  UNIQUE KEY `settingid` (`settingid`),
  KEY `setting` (`setting`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1 COMMENT='CRM Main settings table';

#
# Table structure for table judasstatusvars
#

CREATE TABLE `judasstatusvars` (
  `id` int(11) NOT NULL auto_increment,
  `varname` varchar(50) NOT NULL default '',
  `color` varchar(7) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `varname` (`varname`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='CRM Status definitions table';

#
# Table structure for table judastriggers
#

CREATE TABLE `judastriggers` (
  `tid` bigint(20) NOT NULL auto_increment,
  `onchange` varchar(200) NOT NULL default '',
  `action` varchar(50) NOT NULL default '',
  `to_value` varchar(100) NOT NULL default '',
  `template_fileid` bigint(20) NOT NULL default '0',
  `attach` enum('n','y') NOT NULL default 'n',
  `report_fileid` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `to_value` (`to_value`),
  KEY `onchange` (`onchange`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Entity value change trigger table';

#
# Table structure for table judasuselog
#

CREATE TABLE `judasuselog` (
  `id` bigint(20) NOT NULL auto_increment,
  `ip` varchar(15) NOT NULL default '',
  `url` varchar(50) NOT NULL default '',
  `useragent` varchar(255) NOT NULL default '',
  `tijd` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `qs` longtext NOT NULL,
  `user` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `tijd` (`tijd`),
  KEY `url` (`url`),
  KEY `ip` (`ip`),
  KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=4146 DEFAULT CHARSET=latin1 COMMENT='CRM Main activity log table';

#
# Table structure for table judasuserprofiles
#

CREATE TABLE `judasuserprofiles` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `ENTITYADDFORM` varchar(50) NOT NULL default '',
  `ENTITYEDITFORM` varchar(50) NOT NULL default '',
  `active` enum('yes','no') NOT NULL default 'yes',
  `CLLEVEL` varchar(50) NOT NULL default 'ro',
  `RECEIVEDAILYMAIL` enum('No','Yes') NOT NULL default 'No',
  `RECEIVEALLOWNERUPDATES` enum('n','y') NOT NULL default 'n',
  `RECEIVEALLASSIGNEEUPDATES` enum('n','y') NOT NULL default 'n',
  `HIDEADDTAB` char(1) NOT NULL default '',
  `HIDECSVTAB` char(1) NOT NULL default '',
  `HIDESUMMARYTAB` char(1) NOT NULL default '',
  `HIDEENTITYTAB` char(1) NOT NULL default '',
  `HIDEPBTAB` char(1) NOT NULL default '',
  `SHOWDELETEDVIEWOPTION` char(1) NOT NULL default '',
  `HIDECUSTOMERTAB` char(1) NOT NULL default '',
  `SAVEDSEARCHES` longtext NOT NULL,
  `EMAILCREDENTIALS` longtext NOT NULL,
  `LIMITTOCUSTOMERS` longtext NOT NULL,
  `ADDFORMS` longtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  FULLTEXT KEY `SAVEDSEARCHES` (`SAVEDSEARCHES`),
  FULLTEXT KEY `EMAILCREDENTIALS` (`EMAILCREDENTIALS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM User profile definition table';

#
# Table structure for table judaswebdav_locks
#

CREATE TABLE `judaswebdav_locks` (
  `token` varchar(255) NOT NULL default '',
  `path` varchar(200) NOT NULL default '',
  `expires` int(11) NOT NULL default '0',
  `owner` varchar(200) default NULL,
  `recursive` int(11) default '0',
  `writelock` int(11) default '0',
  `exclusivelock` int(11) NOT NULL default '0',
  PRIMARY KEY  (`token`),
  KEY `path` (`path`),
  KEY `expires` (`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Webdav file locks table';

#
# Table structure for table judaswebdav_properties
#

CREATE TABLE `judaswebdav_properties` (
  `path` varchar(255) NOT NULL default '',
  `name` varchar(120) NOT NULL default '',
  `ns` varchar(120) NOT NULL default 'DAV:',
  `value` text,
  PRIMARY KEY  (`path`,`name`,`ns`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Webdav properties';

