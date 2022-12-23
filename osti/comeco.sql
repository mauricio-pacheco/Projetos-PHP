# MySQL-Front 3.2  (Build 14.8)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


# Host: grupovanguarda.com    Database: gvang_comeco
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Access cache table';

#
# Dumping data for table judasaccesscache
#


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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='CRM Binairy files';

#
# Dumping data for table judasbinfiles
#

INSERT INTO `judasbinfiles` VALUES (1,0,'SampleHTMLReport','2007-02-07 14:19:32',350,'TEMPLATE_HTML_REPORT','','in',0,'entity','Sample HTML Report (edit this in the template section)');
INSERT INTO `judasbinfiles` VALUES (2,0,'sample_invoice_template.rtf','2007-02-07 14:19:32',0,'TEMPLATE_INVOICE','','in',0,'entity','');
INSERT INTO `judasbinfiles` VALUES (3,0,'sample_mailmerge_template.rtf','2007-02-07 14:19:32',0,'TEMPLATE_INVOICE','','in',0,'entity','');
INSERT INTO `judasbinfiles` VALUES (4,0,'sample_invoice_template_multiple_VAT.rtf','2007-02-07 14:19:32',0,'TEMPLATE_INVOICE','','in',0,'entity','');
INSERT INTO `judasbinfiles` VALUES (5,0,'sample_invoice_template_single_VAT.rtf','2007-02-07 14:19:32',0,'TEMPLATE_INVOICE','','in',0,'entity','');
INSERT INTO `judasbinfiles` VALUES (6,0,'sample_entity_report_template.rtf','2007-02-07 14:19:32',0,'TEMPLATE_REPORT','','in',0,'entity','');
INSERT INTO `judasbinfiles` VALUES (7,0,'Joes helpdesk - edit entity form template (example)','2007-02-07 14:19:32',1603,'TEMPLATE_HTML_FORM','','in',0,'entity','Joes helpdesk');

#
# Table structure for table judasblobs
#

CREATE TABLE `judasblobs` (
  `fileid` bigint(20) NOT NULL default '0',
  `content` mediumblob NOT NULL,
  PRIMARY KEY  (`fileid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Blob stand-alone table';

#
# Dumping data for table judasblobs
#

INSERT INTO `judasblobs` VALUES (1,'<P><FONT color=#000000><IMG alt=\"\" hspace=0 src=\"crm_small.png\" align=baseline border=0>&nbsp;<FONT color=#000000>[<A href=\"edit.php?e=@EID@\">edit</A>] <FONT color=#ff0000><EM>@EID@: @CATEGORY@ </EM></FONT><BR></FONT>Attachments: @NUM_ATTM@<BR>Owned by @OWNER@, assigned to @ASSIGNEE@<BR>For customer @CUSTOMER@, contact is @CUSTOMER_CONTACT@</P><HR>');
INSERT INTO `judasblobs` VALUES (2,'');
INSERT INTO `judasblobs` VALUES (3,'');
INSERT INTO `judasblobs` VALUES (4,'');
INSERT INTO `judasblobs` VALUES (5,'');
INSERT INTO `judasblobs` VALUES (6,'');
INSERT INTO `judasblobs` VALUES (7,'<FIELDSET><LEGEND align=left><FONT size=+1>Joe\'s Own Helpdesk - ticket&nbsp;@EID@: @CATEGORY@ #LOCKICON#&nbsp;</FONT></LEGEND><TABLE width=\"90%\"><TBODY><TR><TD><TABLE><TBODY><TR><TD vAlign=top><FIELDSET><LEGEND align=left>User/customer</LEGEND>#CUSTOMER#</FIELDSET></TD><TD vAlign=top><FIELDSET><LEGEND align=left>Status&nbsp;</LEGEND>#STATUS#</FIELDSET> </TD><TD vAlign=top><FIELDSET><LEGEND align=left>Priority</LEGEND>#PRIORITY#</FIELDSET> </TD><TD vAlign=top><FIELDSET><LEGEND align=left>Short problem description&nbsp;</LEGEND>#CATEGORY# </FIELDSET> </TD><TD></TD></TR></TBODY></TABLE><TABLE cellSpacing=1 cellPadding=2 width=\"100%\" border=0><TBODY><TR><TD>#CONTENTS# </TD><TD><FIELDSET><LEGEND align=left>Owner</LEGEND>#OWNER# </FIELDSET> <BR><FIELDSET><LEGEND align=left>Assignee&nbsp;</LEGEND>#ASSIGNEE# </FIELDSET> <FIELDSET><LEGEND align=left>Due date&nbsp;</LEGEND>#DUEDATE# </FIELDSET> <FIELDSET><LEGEND align=left>Due time&nbsp;</LEGEND>#DUETIME# </FIELDSET><BR>#JOURNALICON# #REPORTICON# #PDFICON# #ACTICON# #LOCKICON# #ARROWS#</TD></TR></TBODY></TABLE><BR><TABLE width=\"30%\"><TBODY><TR><TD>Read-only to other users</TD><TD>#READONLYBOX#&nbsp;</TD></TR><TR><TD>Private</TD><TD>#PRIVATEBOX#</TD></TR><TR><TD>Deleted</TD><TD>#DELETEBOX#</TD></TR></TBODY></TABLE><TABLE><TBODY><TR><TD colSpan=6><FIELDSET><LEGEND align=left>Attach file&nbsp;</LEGEND>#FILEBOX# &nbsp;&nbsp;&nbsp;&nbsp; </FIELDSET> <FIELDSET><LEGEND align=left>Current files&nbsp;</LEGEND>#FILELIST# &nbsp;&nbsp;&nbsp;&nbsp; </FIELDSET></TD></TD></TR>#SAVEBUTTON# </TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></FIELDSET>');

#
# Table structure for table judascache
#

CREATE TABLE `judascache` (
  `stashid` bigint(20) NOT NULL auto_increment,
  `epoch` varchar(20) default NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`stashid`),
  FULLTEXT KEY `value` (`value`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='CRM Query cache table';

#
# Dumping data for table judascache
#

INSERT INTO `judascache` VALUES (1,'1170869389','U0VMRUNUICogRlJPTSBqdWRhc2N1c3RvbWVyIFdIRVJFIDE9MCAgT1JERVIgQlkganVkYXNjdXN0b21lci5jdXN0bmFtZQ==');
INSERT INTO `judascache` VALUES (2,'1170869389','U0VMRUNUICogRlJPTSBqdWRhc2N1c3RvbWVyIFdIRVJFIDE9MCA=');

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
# Dumping data for table judascalendar
#


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Contact moments journal';

#
# Dumping data for table judascontactmoments
#


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
# Dumping data for table judascustomaddons
#


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Main customer table';

#
# Dumping data for table judascustomer
#


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Entity contents journal';

#
# Dumping data for table judasejournal
#


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Main entity table';

#
# Dumping data for table judasentity
#


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Entity record locks';

#
# Dumping data for table judasentitylocks
#


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
# Dumping data for table judasextrafields
#


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
# Dumping data for table judashelp
#

INSERT INTO `judashelp` VALUES (1,'Download query result as CSV export file','When checked, the result of your search query will be \'pushed\' as an CSV-export file. \r\n<br><br>\r\nThis means that you will <b>not</b> see the result on screen, but  you\'ll jump to the CSV page. On that page you can select wich fields you want to export.<br><br>\r\nSee also help on <a href=\'help.php?id=4\' class=\'topnav\'>\'Exporting data to Excel\'</a>');
INSERT INTO `judashelp` VALUES (2,'Include entity contents','When checked, this function as a result will include the textual content of an entity in the summary. ');
INSERT INTO `judashelp` VALUES (3,'Include deleted entities','When checked, the query you created by using the pull-down boxes will also be ran over deleted entities in the database.\r\n<br><br>\r\nUse this function when searching for an enitity not knowing wheter or this entity is still available.\r\n<br><br>\r\nWhen found, you can easily undelete an entity by clicking \'Update in new window\' followed by unchecking the \'This is a deleted entity\' checkbox. Do not forget to click \'Save and close\' when you\'re done.');
INSERT INTO `judashelp` VALUES (4,'Exporting data to CSV (Excel)','CSV stands for Character Separated Values.\r\n<br><br>\r\nYou can select the fields in the database you want to export. If you are unsure, just check all the boxes. You will now export all data in the database but the binairy files (the attachments).\r\n<br><br>\r\nBy clicking \'Download exportfile\' you will immediately see a download dialog box. Click \'Open\', and, if it appears again, click \'Open\' again.\r\n<br><br>\r\nIf you are looking for an export of an particular part of the database you can use the summary page, and check the \'Download result as CSV file\' option. See also help on <a href=\'help.php?id=1\' class=\'topnav\'>\'Download query result as CSV export file\'</a>.\r\n');
INSERT INTO `judashelp` VALUES (5,'Adding and modifing owners/assignees','You can modify owners/assignees by just clicking the name and altering the text.\r\n<br><br>\r\nUsing the last field you can add owners/assignees, one at the time.\r\n<br>\r\nIf a owner or assignee logs in with a limited account (which have to be created seprately using the same name), the user will only have rights to view the entities assigned to him- or herself, with the only right to add comments to the textual content and the right to attach files.\r\n<br><br>\r\n<b>Important!</b>\r\n<br>\r\nDo not switch users! CRM-CTT works by the number, not the name!');
INSERT INTO `judashelp` VALUES (6,'Adding and modifing customers','You can modify customers by just clicking the name and altering the text.\r\n<br><br>\r\nUsing the last field you can add customers, one at the time.\r\n<br><br>\r\n<b>Important!</b>\r\n<br>\r\nDo not switch customers! CRM-CTT works by the number, not the name!');
INSERT INTO `judashelp` VALUES (7,'Fulltext search through all entities','When typing a word, or part of it, in the \'Enitity must contain text\'-field, CRM-CTT will search through the database for entities with that exact word in the \'Category\' or the content.\r\n<br><br>\r\nWhen you\'ve also checked \'Include enitity contents\', the content will be <font color=ff3300><u>red-highlighted</u></font> when your search matched.\r\n<br><br>\r\nWildcard searches or logical-operand searches are <b>not</b> supported.');
INSERT INTO `judashelp` VALUES (8,'Management Information','Management Information displays summaries of data gathered from the database. These summaries are mostly statistics.\r\n<br><br>\r\nCheck the summaries you want to see. If you check more boxes, the output will be longer. \r\n<br><br>\r\nIf you check all boxes, remember this slows down the server, so maybe you\'ll have to wait a little.');
INSERT INTO `judashelp` VALUES (9,'Attach a file','Using this function you can attach a file to an enitity.\r\n<br><br>\r\nBy clicking \'browse\' you\'ll see a file select box. Browse to the file you want to attach. Click \'open\' and the path to the file will appear in the field box.\r\n<br><br>\r\nAfter you\'ve saved the enitity, the file will be attached.\r\n<br><br>\r\nYou can only attach one file at the time!\r\n');
INSERT INTO `judashelp` VALUES (10,'This entity is waiting for somebody else\'s action','By checking this box you let CRM-CTT know that the entity you\'re working on is stalled because somebody else has to undertake action first.\r\n<br><br>\r\nThis is mainly for management information purposes. Though; you can also use this as a search option when using the summary page.');
INSERT INTO `judashelp` VALUES (11,'This entity really doesn\'t belong here.','By checking this box you let CRM-CTT know that the entity you\'re working on really should not be logged in this CRM.\r\n<br><br>\r\nThis is mainly for management information purposes.');
INSERT INTO `judashelp` VALUES (12,'This is a deleted entity','When you check this box, <b>you delete the entire entity although it might not yet be closed.</b>\r\n<br><br>\r\nWhen the checkbox was already checked an you uncheck it, you <b>undelete</b> the entity.\r\n');
INSERT INTO `judashelp` VALUES (13,'<center><b>Disclaimer</b></center>','<center>(logo?)</center><br><i><b>ALL INFORMATION CONTAINED IN THIS WEBSITE IS CONFIDENTIAL</b><br><br>\r\n Although, with respect to documents available from this server, neither the author nor any other involved supplier makes any warranty, express or implied, including the warranties of merchantability and fitness for a particular purpose, or assumes any legal liability or responsibility for the accuracy,  completeness, or usefulness of any information, apparatus, product, or process disclosed, or represents that its use would not infringe privately owned rights. This should be perfectly clear for anybody who uses this website. Don\'t agree? Too bad! Be warned!</i><br>\r\n');
INSERT INTO `judashelp` VALUES (14,'S.O.B.','S.O.B. stands for <i>Standard Operational B*llsh*t</i>');
INSERT INTO `judashelp` VALUES (16,'Quickmenu to entities','You can use the <i>little</i> fieldbox in the header of every page to quickly jump to an entity.<B>You can only enter entity-numbers in this box!</b>When you enter a valid number and press TAB or ENTER you will instantly jump to the edit window of that entity.\r\n<br><br>\r\nThe <i>large</i> fieldbox is the searchbox from the summary page. When you enter a text in this box, CRM-CTT will search all entities for matching records.');
INSERT INTO `judashelp` VALUES (17,'Logging into the CRM','You can only login to this application if a username and a password was provided to you.<br><br>\r\nIf you should be able to get in, but you cannot, use the e-mail adress as shown on the login page to send an email to the administrator of this site.\r\n<br><br>\r\nClicking Save Username will save your used username to your machine using a so-called cookie. By clicking Clear Username the cookie will be deleted. The same goes for the password.');
INSERT INTO `judashelp` VALUES (18,'Brief entity overview matching query','By checking the Brief Overview box the result of you search query will be displayed in the format of the Brief Entity Overview. This may come in handy working with queries with many matches.');
INSERT INTO `judashelp` VALUES (19,'Download PDF report or summary','Using this function you can download a file in Adobe Acrobat format which contains information about a certain entity. You can also download the management summary and an export of the phonebook in PDF-format.');

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
# Dumping data for table judasinternalmessages
#


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='CRM Entity/customer journal';

#
# Dumping data for table judasjournal
#


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
# Dumping data for table judaslanguages
#

INSERT INTO `judaslanguages` VALUES (1,'PORTUGUES','customer','Cliente\n');
INSERT INTO `judaslanguages` VALUES (2,'PORTUGUES','owner','Dono\n');
INSERT INTO `judaslanguages` VALUES (3,'PORTUGUES','entity','tarefa\n');
INSERT INTO `judaslanguages` VALUES (4,'PORTUGUES','priority','Prioridade\n');
INSERT INTO `judaslanguages` VALUES (5,'PORTUGUES','assignee','Responsável\n');
INSERT INTO `judaslanguages` VALUES (6,'PORTUGUES','duedate','Para dia\n');
INSERT INTO `judaslanguages` VALUES (7,'PORTUGUES','alarmdate','Data do Alarme\n');
INSERT INTO `judaslanguages` VALUES (8,'PORTUGUES','alarmdatev','Criar alarme para esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (9,'PORTUGUES','category','Categoria\n');
INSERT INTO `judaslanguages` VALUES (10,'PORTUGUES','status','Status\n');
INSERT INTO `judaslanguages` VALUES (11,'PORTUGUES','helpcontents','Tópicos de ajuda\n');
INSERT INTO `judaslanguages` VALUES (12,'PORTUGUES','tolimited','Devido a falta de privilégios você foi direcionado para uma tela limitada\n');
INSERT INTO `judaslanguages` VALUES (13,'PORTUGUES','briefover','Relatório sobre a tarefa\n');
INSERT INTO `judaslanguages` VALUES (14,'PORTUGUES','mightbebetter','Seria melhor você usar a opção de relatório\n');
INSERT INTO `judaslanguages` VALUES (15,'PORTUGUES','editthis','Edite esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (16,'PORTUGUES','alarmsettings','Opções do Alarme\n');
INSERT INTO `judaslanguages` VALUES (17,'PORTUGUES','closethisentity','Fechar esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (18,'PORTUGUES','deletethisentity','Deletar esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (19,'PORTUGUES','downloadpdf','Baixar relatório em PDF sobre esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (20,'PORTUGUES','downloadpdfs','Baixar relatório em PDF\n');
INSERT INTO `judaslanguages` VALUES (21,'PORTUGUES','close','Fechar\n');
INSERT INTO `judaslanguages` VALUES (22,'PORTUGUES','edit','Editar\n');
INSERT INTO `judaslanguages` VALUES (23,'PORTUGUES','delete','Deletar\n');
INSERT INTO `judaslanguages` VALUES (24,'PORTUGUES','pdfreport','Relatório em PDF\n');
INSERT INTO `judaslanguages` VALUES (25,'PORTUGUES','welcome1','Bem-vindo ao\n');
INSERT INTO `judaslanguages` VALUES (26,'PORTUGUES','intro1','Esta ferramenta é usada para grava as dúvidas dos clientes. Agora eles são\n');
INSERT INTO `judaslanguages` VALUES (27,'PORTUGUES','intro2','usuários registrados,<br>que no total são\n');
INSERT INTO `judaslanguages` VALUES (28,'PORTUGUES','intro3','tarefas logadas, para\n');
INSERT INTO `judaslanguages` VALUES (29,'PORTUGUES','intro4','clientes.\n');
INSERT INTO `judaslanguages` VALUES (30,'PORTUGUES','welcome','Bem-vindo\n');
INSERT INTO `judaslanguages` VALUES (31,'PORTUGUES','lastlogon','Última vez que logou\n');
INSERT INTO `judaslanguages` VALUES (32,'PORTUGUES','entitiestoday','tarefas para hoje\n');
INSERT INTO `judaslanguages` VALUES (33,'PORTUGUES','noentities','Não há nenhuma tarefa para hoje\n');
INSERT INTO `judaslanguages` VALUES (34,'PORTUGUES','gotomainpage','Ir para a página principal\n');
INSERT INTO `judaslanguages` VALUES (35,'PORTUGUES','main','Principal\n');
INSERT INTO `judaslanguages` VALUES (36,'PORTUGUES','addcusttodb','Adicionar o pedido do cliente na base de dados\n');
INSERT INTO `judaslanguages` VALUES (37,'PORTUGUES','add','Adicionar\n');
INSERT INTO `judaslanguages` VALUES (38,'PORTUGUES','viewbrief','Ver um relatório das tarefas gravadas na base de dados\n');
INSERT INTO `judaslanguages` VALUES (39,'PORTUGUES','entities','Tarefas\n');
INSERT INTO `judaslanguages` VALUES (40,'PORTUGUES','brieflistdel','Ver um relatório das tarefas apagadas da base de dados\n');
INSERT INTO `judaslanguages` VALUES (41,'PORTUGUES','delentities','Deletar tarefas\n');
INSERT INTO `judaslanguages` VALUES (42,'PORTUGUES','vacoa','Ver, adicionar ou mudar possíveis donos ou Responsávels\n');
INSERT INTO `judaslanguages` VALUES (43,'PORTUGUES','oa','Donos/Responsávels\n');
INSERT INTO `judaslanguages` VALUES (44,'PORTUGUES','vacc','Ver, adicionar ou modificar clientes\n');
INSERT INTO `judaslanguages` VALUES (45,'PORTUGUES','customers','Clientes\n');
INSERT INTO `judaslanguages` VALUES (46,'PORTUGUES','dumpi','Eliminar as vírgulas para exportar os dados da base de dados\n');
INSERT INTO `judaslanguages` VALUES (47,'PORTUGUES','phonebook1','Agenda de Telefones\n');
INSERT INTO `judaslanguages` VALUES (48,'PORTUGUES','phonebookshort','AT\n');
INSERT INTO `judaslanguages` VALUES (49,'PORTUGUES','sumverb','Ver e imprimir relatórios mais avançados\n');
INSERT INTO `judaslanguages` VALUES (50,'PORTUGUES','summary','Relatório\n');
INSERT INTO `judaslanguages` VALUES (51,'PORTUGUES','logout','Sair\n');
INSERT INTO `judaslanguages` VALUES (52,'PORTUGUES','maninfo','Informações de Administração\n');
INSERT INTO `judaslanguages` VALUES (53,'PORTUGUES','maninfoverb','Relatórios de estatísticas para Administração\n');
INSERT INTO `judaslanguages` VALUES (54,'PORTUGUES','sitestats','Estatísticas do site\n');
INSERT INTO `judaslanguages` VALUES (55,'PORTUGUES','sitestatsverb','As estatísticas deste site\n');
INSERT INTO `judaslanguages` VALUES (56,'PORTUGUES','administration','Administração\n');
INSERT INTO `judaslanguages` VALUES (57,'PORTUGUES','administrationverb','Funçoes de Administração\n');
INSERT INTO `judaslanguages` VALUES (58,'PORTUGUES','helpcontentsverb','Mostrar lista de conteúdo da ajuda\n');
INSERT INTO `judaslanguages` VALUES (59,'PORTUGUES','dateinvalid','A data que você escolhe é inválida.n A data não foi escolhida.\n');
INSERT INTO `judaslanguages` VALUES (60,'PORTUGUES','entrysaved','Digitar número do pedido\n');
INSERT INTO `judaslanguages` VALUES (61,'PORTUGUES','wasadded','foi adicionado.\n');
INSERT INTO `judaslanguages` VALUES (62,'PORTUGUES','deleting1','Deletando\n');
INSERT INTO `judaslanguages` VALUES (63,'PORTUGUES','deleting2','arquivo(s). Aperte o botão abaixo para confirmar.\n');
INSERT INTO `judaslanguages` VALUES (64,'PORTUGUES','confdel','Confirme deletagem\n');
INSERT INTO `judaslanguages` VALUES (65,'PORTUGUES','deletingentity','Deletando tarefa\n');
INSERT INTO `judaslanguages` VALUES (66,'PORTUGUES','ownedby','pertence à\n');
INSERT INTO `judaslanguages` VALUES (67,'PORTUGUES','assignedto','Responsável para\n');
INSERT INTO `judaslanguages` VALUES (68,'PORTUGUES','curstat','Status atual\n');
INSERT INTO `judaslanguages` VALUES (69,'PORTUGUES','created','criado\n');
INSERT INTO `judaslanguages` VALUES (70,'PORTUGUES','lastupdate','última atualização\n');
INSERT INTO `judaslanguages` VALUES (71,'PORTUGUES','deleteerror','Você não pode deletar esta tarefa pois ela não foi terminada\n');
INSERT INTO `judaslanguages` VALUES (72,'PORTUGUES','confirmdel','Clique aqui para deletar esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (73,'PORTUGUES','search','Procura\n');
INSERT INTO `judaslanguages` VALUES (74,'PORTUGUES','thereare','São\n');
INSERT INTO `judaslanguages` VALUES (75,'PORTUGUES','openentities','Abrir tarefas\n');
INSERT INTO `judaslanguages` VALUES (76,'PORTUGUES','noopen','Não há tarefas abertas.\n');
INSERT INTO `judaslanguages` VALUES (77,'PORTUGUES','nonexistent','Você digitou um número de tarefa que não existe!\n');
INSERT INTO `judaslanguages` VALUES (78,'PORTUGUES','editing','Editando\n');
INSERT INTO `judaslanguages` VALUES (79,'PORTUGUES','wasclosed','Esta tarefa foi fechada\n');
INSERT INTO `judaslanguages` VALUES (80,'PORTUGUES','newentity','Nova tarefa\n');
INSERT INTO `judaslanguages` VALUES (81,'PORTUGUES','isdeleted','Esta é uma tarefa deletada\n');
INSERT INTO `judaslanguages` VALUES (82,'PORTUGUES','iswaiting','Aguardando outra pessoa\n');
INSERT INTO `judaslanguages` VALUES (83,'PORTUGUES','doesntbelonghere','Esta tarefa não pertence a este local\n');
INSERT INTO `judaslanguages` VALUES (84,'PORTUGUES','listofatt','Listar arquivos anexados a esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (85,'PORTUGUES','filename','Nome do arquivo\n');
INSERT INTO `judaslanguages` VALUES (86,'PORTUGUES','filesize','Tamanho\n');
INSERT INTO `judaslanguages` VALUES (87,'PORTUGUES','creationdate','Data de criação\n');
INSERT INTO `judaslanguages` VALUES (88,'PORTUGUES','deletefile','Deletar\n');
INSERT INTO `judaslanguages` VALUES (89,'PORTUGUES','attachfile','Anexar arquivo\n');
INSERT INTO `judaslanguages` VALUES (90,'PORTUGUES','saveclose','Salvar e Fechar\n');
INSERT INTO `judaslanguages` VALUES (91,'PORTUGUES','cancel','Cancelar\n');
INSERT INTO `judaslanguages` VALUES (92,'PORTUGUES','save','Salvar para base de dados\n');
INSERT INTO `judaslanguages` VALUES (93,'PORTUGUES','noaction','Erro, nenhuma ação escolhida\n');
INSERT INTO `judaslanguages` VALUES (94,'PORTUGUES','zailo','falta zero consignados\n');
INSERT INTO `judaslanguages` VALUES (95,'PORTUGUES','name','Nome\n');
INSERT INTO `judaslanguages` VALUES (96,'PORTUGUES','usrwarning','Se uma caixa está desabilitada (cinza), significa que seu dono ou responsável possui uma conta limitada, e portanto o nome não pode ser mudado<br>ou os dados podem ser perdidos.\n');
INSERT INTO `judaslanguages` VALUES (97,'PORTUGUES','ownassindb','Donos os responsáveis na base de dados\n');
INSERT INTO `judaslanguages` VALUES (98,'PORTUGUES','addownass','Adicionar dono/responsável\n');
INSERT INTO `judaslanguages` VALUES (99,'PORTUGUES','apply','Aplicar alterações\n');
INSERT INTO `judaslanguages` VALUES (100,'PORTUGUES','custindb','Clientes na base de dados\n');
INSERT INTO `judaslanguages` VALUES (101,'PORTUGUES','addcust','Adicionar um cliente\n');
INSERT INTO `judaslanguages` VALUES (102,'PORTUGUES','selectfields','Por favor selecionar os campos que deseja exportar\n');
INSERT INTO `judaslanguages` VALUES (103,'PORTUGUES','lastupdatedate','Data da última atualização\n');
INSERT INTO `judaslanguages` VALUES (104,'PORTUGUES','lastupdatetime','Hora da última atualização\n');
INSERT INTO `judaslanguages` VALUES (105,'PORTUGUES','closedate','Data de fechamento\n');
INSERT INTO `judaslanguages` VALUES (106,'PORTUGUES','waitingcsv','Aguardando\n');
INSERT INTO `judaslanguages` VALUES (107,'PORTUGUES','doesntcsv','Não pertence a este local\n');
INSERT INTO `judaslanguages` VALUES (108,'PORTUGUES','contents','Conteúdo\n');
INSERT INTO `judaslanguages` VALUES (109,'PORTUGUES','alreadyselected','<b>Sua requisição foi gravada</b>\n');
INSERT INTO `judaslanguages` VALUES (110,'PORTUGUES','sep','Separação com caracteres\n');
INSERT INTO `judaslanguages` VALUES (111,'PORTUGUES','scqp','Separado por ponto-vírgula (;) (recomendado)\n');
INSERT INTO `judaslanguages` VALUES (112,'PORTUGUES','cqp','Separado com dois pontos (:)\n');
INSERT INTO `judaslanguages` VALUES (113,'PORTUGUES','kqp','Separado com vírgula (,)\n');
INSERT INTO `judaslanguages` VALUES (114,'PORTUGUES','csvwarning','Quando a caixa de download aparecer, seleciona \\\'Abrir o arquivo no local atual\\\'.<br> Talvez a mesma janela reapareça, se aparecer clique em \\\"Abrir\\\" novamente. Isto deve abrir seu Excel <br>com os dados exportados.\n');
INSERT INTO `judaslanguages` VALUES (115,'PORTUGUES','downloadexport','Baixar arquivo exportado\n');
INSERT INTO `judaslanguages` VALUES (116,'PORTUGUES','repdownloaded','Relotório foi baixado\n');
INSERT INTO `judaslanguages` VALUES (117,'PORTUGUES','endofreport','Fim do relatório. Tenha um ótimo dia :)\n');
INSERT INTO `judaslanguages` VALUES (118,'PORTUGUES','noresults','Seu pedido não obteve nenhum resultado.\n');
INSERT INTO `judaslanguages` VALUES (119,'PORTUGUES','entitiesfound','tarefas encontradas.\n');
INSERT INTO `judaslanguages` VALUES (120,'PORTUGUES','pbexport','exportar agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (121,'PORTUGUES','endofpbexport','<red> -- Fim do Relatório --\n');
INSERT INTO `judaslanguages` VALUES (122,'PORTUGUES','pbexpmade','Arquivo de exportação da agenda de telefones criado\n');
INSERT INTO `judaslanguages` VALUES (123,'PORTUGUES','wasdeleted','foi deletado\n');
INSERT INTO `judaslanguages` VALUES (124,'PORTUGUES','pbdelconf','a que deseja apagar esta gravação?\n');
INSERT INTO `judaslanguages` VALUES (125,'PORTUGUES','fname','Primeiro nome\n');
INSERT INTO `judaslanguages` VALUES (126,'PORTUGUES','lname','Sobrenome\n');
INSERT INTO `judaslanguages` VALUES (127,'PORTUGUES','tel','Telefone\n');
INSERT INTO `judaslanguages` VALUES (128,'PORTUGUES','company','Empresa\n');
INSERT INTO `judaslanguages` VALUES (129,'PORTUGUES','dep','Departamento\n');
INSERT INTO `judaslanguages` VALUES (130,'PORTUGUES','title','Título\n');
INSERT INTO `judaslanguages` VALUES (131,'PORTUGUES','room','Quarto\n');
INSERT INTO `judaslanguages` VALUES (132,'PORTUGUES','deletepb','Deletar\n');
INSERT INTO `judaslanguages` VALUES (133,'PORTUGUES','pbrecadded','Seu contato foi adicionado na agenda de telefones.\n');
INSERT INTO `judaslanguages` VALUES (134,'PORTUGUES','pbapp','Suas alterações foram aplicadas.\n');
INSERT INTO `judaslanguages` VALUES (135,'PORTUGUES','pbwarning','Por favor preencha pelo menos o sobrenome!\n');
INSERT INTO `judaslanguages` VALUES (136,'PORTUGUES','addtopb','Adicionar a agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (137,'PORTUGUES','pbresults','Resultados para sua pesquisa\n');
INSERT INTO `judaslanguages` VALUES (138,'PORTUGUES','options','Opções\n');
INSERT INTO `judaslanguages` VALUES (139,'PORTUGUES','resfound','resultados encontrados\n');
INSERT INTO `judaslanguages` VALUES (140,'PORTUGUES','pbcont1','Esta agenda de telefones contém\n');
INSERT INTO `judaslanguages` VALUES (141,'PORTUGUES','pbcont2','contatos\n');
INSERT INTO `judaslanguages` VALUES (142,'PORTUGUES','pbaddrec','adicionar contato\n');
INSERT INTO `judaslanguages` VALUES (143,'PORTUGUES','entsum','Relatório de tarefas\n');
INSERT INTO `judaslanguages` VALUES (144,'PORTUGUES','showonly','Mostra apenas\n');
INSERT INTO `judaslanguages` VALUES (145,'PORTUGUES','all','Tudo\n');
INSERT INTO `judaslanguages` VALUES (146,'PORTUGUES','inccont','Adicionar comentários a tarefa\n');
INSERT INTO `judaslanguages` VALUES (147,'PORTUGUES','incldel','Incluir tarefas excluidas\n');
INSERT INTO `judaslanguages` VALUES (148,'PORTUGUES','dlacsv','Baixar resultado como CSV\n');
INSERT INTO `judaslanguages` VALUES (149,'PORTUGUES','briefo','Dados resumidos\n');
INSERT INTO `judaslanguages` VALUES (150,'PORTUGUES','mustcontain','Tarefa deve conter texto\n');
INSERT INTO `judaslanguages` VALUES (151,'PORTUGUES','please','Por favor faça sua escolha...\n');
INSERT INTO `judaslanguages` VALUES (152,'PORTUGUES','remarks','Remarcar\n');
INSERT INTO `judaslanguages` VALUES (153,'PORTUGUES','hasfilessum','Esta tarefa possui arquivos anexados\n');
INSERT INTO `judaslanguages` VALUES (154,'PORTUGUES','expired','A data de realização desta tarefa expirou!\n');
INSERT INTO `judaslanguages` VALUES (155,'PORTUGUES','thisiswaiting','Esta tarefa está aguardando ação de outra pessoa.\n');
INSERT INTO `judaslanguages` VALUES (156,'PORTUGUES','thisdoesntbelong','Este tarefa realmente não pertence a este local\n');
INSERT INTO `judaslanguages` VALUES (157,'PORTUGUES','clear','limpar\n');
INSERT INTO `judaslanguages` VALUES (158,'PORTUGUES','wrongpwd','Senha incorreta. Por favor tente novamente ou se mande\n');
INSERT INTO `judaslanguages` VALUES (159,'PORTUGUES','havetoenterpwd','Visto que sua conta não possui privilégios de administrador, você terá que colocar a senha de administrador\n');
INSERT INTO `judaslanguages` VALUES (160,'PORTUGUES','adm','Administração\n');
INSERT INTO `judaslanguages` VALUES (161,'PORTUGUES','nopwd','Visto que sua conta tem privilégios de administrador, a senha para o mesmo não foi pedida.\n');
INSERT INTO `judaslanguages` VALUES (162,'PORTUGUES','imported','print \\\"Foram $imported gravaçoes importadas.\\\";\n');
INSERT INTO `judaslanguages` VALUES (163,'PORTUGUES','ignored','gravaçoes foram ignoradas por conter um campo vazio.\n');
INSERT INTO `judaslanguages` VALUES (164,'PORTUGUES','impwarning','Para impedir que uma gravação seja importada, esvazie o campo \\\"Nome\\\". Corrija os que estiverem errados.\n');
INSERT INTO `judaslanguages` VALUES (165,'PORTUGUES','commawarning','Visto que você escolheu importar um arquivo separado por vírgulas, fique atento com combinações do tipo sobrenome, nome (que são comuns no Outlook) que podem produzir efeitos indesejados.\n');
INSERT INTO `judaslanguages` VALUES (166,'PORTUGUES','importinpb','Importar dados da agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (167,'PORTUGUES','pbimpwarning','As informações CSV que você colou <i>devem</i> conter todos campos, contudo eles podem ser vazios:\n');
INSERT INTO `judaslanguages` VALUES (168,'PORTUGUES','paste','Cole seu texto aqui ...\n');
INSERT INTO `judaslanguages` VALUES (169,'PORTUGUES','pleasechoose','Por favor selecione uma das opções abaixo:\n');
INSERT INTO `judaslanguages` VALUES (170,'PORTUGUES','chgsys','Trocar valores do sistema\n');
INSERT INTO `judaslanguages` VALUES (171,'PORTUGUES','impphone','Importar dadso da agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (172,'PORTUGUES','viewfiles','Ver arquivos na base de dados\n');
INSERT INTO `judaslanguages` VALUES (173,'PORTUGUES','delallclosed','Deletar todas as tarefas concluídas\n');
INSERT INTO `judaslanguages` VALUES (174,'PORTUGUES','eahelp','Adicionar/Editar tópicos de ajuda\n');
INSERT INTO `judaslanguages` VALUES (175,'PORTUGUES','physdel','Deletar fisicamente uma tarefa deletada\n');
INSERT INTO `judaslanguages` VALUES (176,'PORTUGUES','viewlog','Ver logs e estatísticas\n');
INSERT INTO `judaslanguages` VALUES (177,'PORTUGUES','manacc','Administrar contas\n');
INSERT INTO `judaslanguages` VALUES (178,'PORTUGUES','isdel','foi deletado\n');
INSERT INTO `judaslanguages` VALUES (179,'PORTUGUES','delfile','Deletando arquivo fisicamente\n');
INSERT INTO `judaslanguages` VALUES (180,'PORTUGUES','physdelwarning','Por favor digite o ID da tarefa<b>fechada e deletada</b> que você quer <b>fisicamente</b> deletar:\n');
INSERT INTO `judaslanguages` VALUES (181,'PORTUGUES','confphysdel','Clique no botão abaixo para confirmar deletação física.\n');
INSERT INTO `judaslanguages` VALUES (182,'PORTUGUES','addhelp','Adicionar opção de ajuda:\n');
INSERT INTO `judaslanguages` VALUES (183,'PORTUGUES','editaccount','Editar uma conta\n');
INSERT INTO `judaslanguages` VALUES (184,'PORTUGUES','addaccount','Adicionar uma conta\n');
INSERT INTO `judaslanguages` VALUES (185,'PORTUGUES','password','Senha\n');
INSERT INTO `judaslanguages` VALUES (186,'PORTUGUES','addu','Adicionar Usuário\n');
INSERT INTO `judaslanguages` VALUES (187,'PORTUGUES','btmap','Voltar para a página principal do Administrador\n');
INSERT INTO `judaslanguages` VALUES (188,'PORTUGUES','passwarn','deixe os dois campos em branco para manter a senha atual\n');
INSERT INTO `judaslanguages` VALUES (189,'PORTUGUES','limited','Limitado\n');
INSERT INTO `judaslanguages` VALUES (190,'PORTUGUES','normal','Normal\n');
INSERT INTO `judaslanguages` VALUES (191,'PORTUGUES','adminrights','Administrador\n');
INSERT INTO `judaslanguages` VALUES (192,'PORTUGUES','yes','Sim\n');
INSERT INTO `judaslanguages` VALUES (193,'PORTUGUES','no','Não\n');
INSERT INTO `judaslanguages` VALUES (194,'PORTUGUES','ela','Editando conta de login\n');
INSERT INTO `judaslanguages` VALUES (195,'PORTUGUES','dta','Deletar esta conta\n');
INSERT INTO `judaslanguages` VALUES (196,'PORTUGUES','passmatcherror','Senha não confere. Pressione \\\'voltar\\\' no seu navegador e tente novamente.\n');
INSERT INTO `judaslanguages` VALUES (197,'PORTUGUES','nimut','Ocorreu um erro!<br><br>Esta conta existe, mas ela<br>não se refere a nenhum usuário na base de dados para o qual possam ser designadas tarefas.<br><br>Verifique o nome tente novamente.\n');
INSERT INTO `judaslanguages` VALUES (198,'PORTUGUES','uwchala','Usuários que podem ter conta limitada\n');
INSERT INTO `judaslanguages` VALUES (199,'PORTUGUES','tawu','A conta foi atualizada\n');
INSERT INTO `judaslanguages` VALUES (200,'PORTUGUES','setting','Configurações\n');
INSERT INTO `judaslanguages` VALUES (201,'PORTUGUES','value','Valores\n');
INSERT INTO `judaslanguages` VALUES (202,'PORTUGUES','discription','Descrição\n');
INSERT INTO `judaslanguages` VALUES (203,'PORTUGUES','ocsvifb','Ou troque os valores do sistema no formulário abaixo\n');
INSERT INTO `judaslanguages` VALUES (204,'PORTUGUES','csvnow','Troque os valores do sistema\n');
INSERT INTO `judaslanguages` VALUES (205,'PORTUGUES','plzenterpwd','Por favor digite a senha\n');
INSERT INTO `judaslanguages` VALUES (206,'PORTUGUES','eor','Fim do relatório\n');
INSERT INTO `judaslanguages` VALUES (207,'PORTUGUES','smtsm','Selecione mais para ver mais...\n');
INSERT INTO `judaslanguages` VALUES (208,'PORTUGUES','dlmspdf','ou clique aqui para baixar (mais compacto) um relatório em PDF\n');
INSERT INTO `judaslanguages` VALUES (209,'PORTUGUES','sts','Resumos a mostrar\n');
INSERT INTO `judaslanguages` VALUES (210,'PORTUGUES','oqs','Relatório Geral Resumido\n');
INSERT INTO `judaslanguages` VALUES (211,'PORTUGUES','eobu','Tarefas possuidas por usuários\n');
INSERT INTO `judaslanguages` VALUES (212,'PORTUGUES','eatu','Tarefas com usuários responsáveis\n');
INSERT INTO `judaslanguages` VALUES (213,'PORTUGUES','sae','Tarefas designadas para o mesmo usuário\n');
INSERT INTO `judaslanguages` VALUES (214,'PORTUGUES','etdbh','Tarefas que não pertencem a este local\n');
INSERT INTO `judaslanguages` VALUES (215,'PORTUGUES','ewfsea','Tarefas aguardando ação de outra pessoa\n');
INSERT INTO `judaslanguages` VALUES (216,'PORTUGUES','epc','Tarefas por Cliente\n');
INSERT INTO `judaslanguages` VALUES (217,'PORTUGUES','oepa','Tarefas expiradas, por usuário\n');
INSERT INTO `judaslanguages` VALUES (218,'PORTUGUES','deleted','Deletado\n');
INSERT INTO `judaslanguages` VALUES (219,'PORTUGUES','total','Total\n');
INSERT INTO `judaslanguages` VALUES (220,'PORTUGUES','ofwhich','das quais\n');
INSERT INTO `judaslanguages` VALUES (221,'PORTUGUES','allround','Todos valores sõa aproximados\n');
INSERT INTO `judaslanguages` VALUES (222,'PORTUGUES','atac','ou muito aproximados\n');
INSERT INTO `judaslanguages` VALUES (223,'PORTUGUES','edd','Datas de expiração\n');
INSERT INTO `judaslanguages` VALUES (224,'PORTUGUES','dontbelonghere','Tarefas que não pertencem a este local\n');
INSERT INTO `judaslanguages` VALUES (225,'PORTUGUES','eatw','Tarefas adicionadas esta semana\n');
INSERT INTO `judaslanguages` VALUES (226,'PORTUGUES','ectw','Tarefas concluídas esta semana\n');
INSERT INTO `judaslanguages` VALUES (227,'PORTUGUES','eatm','Tarefas adicionadas neste mês\n');
INSERT INTO `judaslanguages` VALUES (228,'PORTUGUES','ectm','Tarefas concluídas neste mês\n');
INSERT INTO `judaslanguages` VALUES (229,'PORTUGUES','of','De\n');
INSERT INTO `judaslanguages` VALUES (230,'PORTUGUES','tad','tarefas contadas, uma média total \\\'de realização\\\' desde a adição de uma tarefa até seu fechamento\n');
INSERT INTO `judaslanguages` VALUES (231,'PORTUGUES','cuaeoay','Contados usando <u>todas</u> tarefas concluídas da base de dados, ao longo de <u>todos</u> os anos\n');
INSERT INTO `judaslanguages` VALUES (232,'PORTUGUES','users','Usuários\n');
INSERT INTO `judaslanguages` VALUES (233,'PORTUGUES','customers','Clientes\n');
INSERT INTO `judaslanguages` VALUES (234,'PORTUGUES','zoilo','zero donos estão faltando\n');
INSERT INTO `judaslanguages` VALUES (235,'PORTUGUES','ombla','Ou : ou talvez tarefas que não tem responsáveis ou não foram designadas(...)\n');
INSERT INTO `judaslanguages` VALUES (236,'PORTUGUES','andassignee','e designadas\n');
INSERT INTO `judaslanguages` VALUES (237,'PORTUGUES','selfassig','Auto-Designadas\n');
INSERT INTO `judaslanguages` VALUES (238,'PORTUGUES','aohnsae','Outros donos não possuem tarefas auto-designadas.\n');
INSERT INTO `judaslanguages` VALUES (239,'PORTUGUES','onavarage','Em média\n');
INSERT INTO `judaslanguages` VALUES (240,'PORTUGUES','oaoedbh','de todas tarefas <b>abertas</b> não pertencem a este local\n');
INSERT INTO `judaslanguages` VALUES (241,'PORTUGUES','teaair','A tarefa e todas as sua anotações foram fisicamente deletadas\n');
INSERT INTO `judaslanguages` VALUES (242,'PORTUGUES','cookiewarning','Não use esta função em computadores públicos!\n');
INSERT INTO `judaslanguages` VALUES (243,'PORTUGUES','username','Usuário\n');
INSERT INTO `judaslanguages` VALUES (244,'PORTUGUES','saveusername','Lembrar usuário\n');
INSERT INTO `judaslanguages` VALUES (245,'PORTUGUES','clearusername','Esquecer usuário\n');
INSERT INTO `judaslanguages` VALUES (246,'PORTUGUES','savepassword','Lmebrar senha\n');
INSERT INTO `judaslanguages` VALUES (247,'PORTUGUES','clearpassword','Esquecer senha\n');
INSERT INTO `judaslanguages` VALUES (248,'PORTUGUES','signedoff','Você foi deslogado. Por favor digite seu usuário e senha para entrar novamente\n');
INSERT INTO `judaslanguages` VALUES (249,'PORTUGUES','signedoffdue1','Você foi deslogado devido a\n');
INSERT INTO `judaslanguages` VALUES (250,'PORTUGUES','signedoffdue2','minutos de inatividade\n');
INSERT INTO `judaslanguages` VALUES (251,'PORTUGUES','sysmsg','O Administrador do sistema deixou uma mensagem para você\n');
INSERT INTO `judaslanguages` VALUES (252,'PORTUGUES','pleaseenter','Por favor digite seu usuário e senha\n');
INSERT INTO `judaslanguages` VALUES (253,'PORTUGUES','language','Língua\n');
INSERT INTO `judaslanguages` VALUES (254,'PORTUGUES','pushpdf','Baixar resultados em arquivo PDF\n');
INSERT INTO `judaslanguages` VALUES (255,'PORTUGUES','managementheader','Bem-vindo a interface de usuário limitado. você está no sistema como\n');
INSERT INTO `judaslanguages` VALUES (256,'PORTUGUES','oefm','Tarefas abertas para\n');
INSERT INTO `judaslanguages` VALUES (257,'PORTUGUES','showresults','Método do Relatório\n');
INSERT INTO `judaslanguages` VALUES (258,'PORTUGUES','verbose','Verbose\n');
INSERT INTO `judaslanguages` VALUES (259,'PORTUGUES','verbosewithcontents','Verbose com tópicos\n');
INSERT INTO `judaslanguages` VALUES (260,'PORTUGUES','briefsum','Resumo rápido\n');
INSERT INTO `judaslanguages` VALUES (261,'PORTUGUES','downloadsumpdf','Baixar resumo como arquivo PDF\n');
INSERT INTO `judaslanguages` VALUES (262,'PORTUGUES','downloadsumcsv','Baixar resumo em arquivo Excel\n');
INSERT INTO `judaslanguages` VALUES (263,'PORTUGUES','packman','Administrar pacotes de linguagem\n');
INSERT INTO `judaslanguages` VALUES (264,'PORTUGUES','openinnewwindow','Abrir em uma nova janela\n');
INSERT INTO `judaslanguages` VALUES (265,'PORTUGUES','delcust','Deletar este usuário (<b>nenhuma</b> confirmação será pedida)\n');
INSERT INTO `judaslanguages` VALUES (266,'PORTUGUES','nousers1','Não há donos / responsáveis configurados. Antes de começar a usar o CRM, você precisa adicionar pelo menos um. Clique em \\\'Donos/Responsáveis\\\' para adicionar possíveis donos ou responsáveis!\n');
INSERT INTO `judaslanguages` VALUES (267,'PORTUGUES','custhomepage','Homepage\n');
INSERT INTO `judaslanguages` VALUES (268,'PORTUGUES','custremarks','Remarcação\n');
INSERT INTO `judaslanguages` VALUES (269,'PORTUGUES','customeraddress','Endereço do cliente\n');
INSERT INTO `judaslanguages` VALUES (270,'PORTUGUES','contactemail','E-mail para contato\n');
INSERT INTO `judaslanguages` VALUES (271,'PORTUGUES','contactphone','Telefone para contato\n');
INSERT INTO `judaslanguages` VALUES (272,'PORTUGUES','contact','Contato\n');
INSERT INTO `judaslanguages` VALUES (273,'PORTUGUES','contacttitle','Título de contato (ex. Sr.)\n');
INSERT INTO `judaslanguages` VALUES (274,'PORTUGUES','custdelexplain','Este cliente não pode ser deletado pois tem tarefas que pertencem a eles\n');
INSERT INTO `judaslanguages` VALUES (275,'PORTUGUES','editextras','Editar valores extras\n');
INSERT INTO `judaslanguages` VALUES (276,'PORTUGUES','fieldname','Nome\n');
INSERT INTO `judaslanguages` VALUES (277,'PORTUGUES','iftynmvhpcysa','Se você acha que precisa de mais nomes aqui, por favor contate o administrador do seu CRM.\n');
INSERT INTO `judaslanguages` VALUES (278,'PORTUGUES','extrafields','Campos extras\n');
INSERT INTO `judaslanguages` VALUES (279,'PORTUGUES','uinw','Atualizar em nova janela\n');
INSERT INTO `judaslanguages` VALUES (280,'PORTUGUES','nocustomers1','Não há clientes configurados. Antes de usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente!\n');
INSERT INTO `judaslanguages` VALUES (281,'PORTUGUES','nousersandnocustomers1','Não há clientes nem possíveis Donos/Designados configurados. Antes que você possa usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente, e depois no menu \\\'Donos/Designados\\\' para adicionar pelo menos um pos');
INSERT INTO `judaslanguages` VALUES (282,'PORTUGUES','managerepositories','Administrar repositores\n');
INSERT INTO `judaslanguages` VALUES (283,'PORTUGUES','viewdelentities','Ver tarefas deletadas\n');
INSERT INTO `judaslanguages` VALUES (284,'PORTUGUES','viewinsertedentities','Tarefas adicionadas\n');
INSERT INTO `judaslanguages` VALUES (285,'PORTUGUES','readonly','Read-only\n');
INSERT INTO `judaslanguages` VALUES (286,'PORTUGUES','customer','Cliente\n');
INSERT INTO `judaslanguages` VALUES (287,'PORTUGUES','owner','Dono\n');
INSERT INTO `judaslanguages` VALUES (288,'PORTUGUES','entity','tarefa\n');
INSERT INTO `judaslanguages` VALUES (289,'PORTUGUES','priority','Prioridade\n');
INSERT INTO `judaslanguages` VALUES (290,'PORTUGUES','assignee','Responsável\n');
INSERT INTO `judaslanguages` VALUES (291,'PORTUGUES','duedate','Para dia\n');
INSERT INTO `judaslanguages` VALUES (292,'PORTUGUES','alarmdate','Data do Alarme\n');
INSERT INTO `judaslanguages` VALUES (293,'PORTUGUES','alarmdatev','Criar alarme para esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (294,'PORTUGUES','category','Categoria\n');
INSERT INTO `judaslanguages` VALUES (295,'PORTUGUES','status','Status\n');
INSERT INTO `judaslanguages` VALUES (296,'PORTUGUES','helpcontents','Tópicos de ajuda\n');
INSERT INTO `judaslanguages` VALUES (297,'PORTUGUES','tolimited','Devido a falta de privilégios você foi direcionado para uma tela limitada\n');
INSERT INTO `judaslanguages` VALUES (298,'PORTUGUES','briefover','Relatório sobre a tarefa\n');
INSERT INTO `judaslanguages` VALUES (299,'PORTUGUES','mightbebetter','Seria melhor você usar a opção de relatório\n');
INSERT INTO `judaslanguages` VALUES (300,'PORTUGUES','editthis','Edite esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (301,'PORTUGUES','alarmsettings','Opções do Alarme\n');
INSERT INTO `judaslanguages` VALUES (302,'PORTUGUES','closethisentity','Fechar esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (303,'PORTUGUES','deletethisentity','Deletar esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (304,'PORTUGUES','downloadpdf','Baixar relatório em PDF sobre esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (305,'PORTUGUES','downloadpdfs','Baixar relatório em PDF\n');
INSERT INTO `judaslanguages` VALUES (306,'PORTUGUES','close','Fechar\n');
INSERT INTO `judaslanguages` VALUES (307,'PORTUGUES','edit','Editar\n');
INSERT INTO `judaslanguages` VALUES (308,'PORTUGUES','delete','Deletar\n');
INSERT INTO `judaslanguages` VALUES (309,'PORTUGUES','pdfreport','Relatório em PDF\n');
INSERT INTO `judaslanguages` VALUES (310,'PORTUGUES','welcome1','Bem-vindo ao\n');
INSERT INTO `judaslanguages` VALUES (311,'PORTUGUES','intro1','Esta ferramenta é usada para grava as dúvidas dos clientes. Agora eles são\n');
INSERT INTO `judaslanguages` VALUES (312,'PORTUGUES','intro2','usuários registrados,<br>que no total são\n');
INSERT INTO `judaslanguages` VALUES (313,'PORTUGUES','intro3','tarefas logadas, para\n');
INSERT INTO `judaslanguages` VALUES (314,'PORTUGUES','intro4','clientes.\n');
INSERT INTO `judaslanguages` VALUES (315,'PORTUGUES','welcome','Bem-vindo\n');
INSERT INTO `judaslanguages` VALUES (316,'PORTUGUES','lastlogon','Última vez que logou\n');
INSERT INTO `judaslanguages` VALUES (317,'PORTUGUES','entitiestoday','tarefas para hoje\n');
INSERT INTO `judaslanguages` VALUES (318,'PORTUGUES','noentities','Não há nenhuma tarefa para hoje\n');
INSERT INTO `judaslanguages` VALUES (319,'PORTUGUES','gotomainpage','Ir para a página principal\n');
INSERT INTO `judaslanguages` VALUES (320,'PORTUGUES','main','Principal\n');
INSERT INTO `judaslanguages` VALUES (321,'PORTUGUES','addcusttodb','Adicionar o pedido do cliente na base de dados\n');
INSERT INTO `judaslanguages` VALUES (322,'PORTUGUES','add','Adicionar\n');
INSERT INTO `judaslanguages` VALUES (323,'PORTUGUES','viewbrief','Ver um relatório das tarefas gravadas na base de dados\n');
INSERT INTO `judaslanguages` VALUES (324,'PORTUGUES','entities','Tarefas\n');
INSERT INTO `judaslanguages` VALUES (325,'PORTUGUES','brieflistdel','Ver um relatório das tarefas apagadas da base de dados\n');
INSERT INTO `judaslanguages` VALUES (326,'PORTUGUES','delentities','Deletar tarefas\n');
INSERT INTO `judaslanguages` VALUES (327,'PORTUGUES','vacoa','Ver, adicionar ou mudar possíveis donos ou Responsávels\n');
INSERT INTO `judaslanguages` VALUES (328,'PORTUGUES','oa','Donos/Responsávels\n');
INSERT INTO `judaslanguages` VALUES (329,'PORTUGUES','vacc','Ver, adicionar ou modificar clientes\n');
INSERT INTO `judaslanguages` VALUES (330,'PORTUGUES','customers','Clientes\n');
INSERT INTO `judaslanguages` VALUES (331,'PORTUGUES','dumpi','Eliminar as vírgulas para exportar os dados da base de dados\n');
INSERT INTO `judaslanguages` VALUES (332,'PORTUGUES','phonebook1','Agenda de Telefones\n');
INSERT INTO `judaslanguages` VALUES (333,'PORTUGUES','phonebookshort','AT\n');
INSERT INTO `judaslanguages` VALUES (334,'PORTUGUES','sumverb','Ver e imprimir relatórios mais avançados\n');
INSERT INTO `judaslanguages` VALUES (335,'PORTUGUES','summary','Relatório\n');
INSERT INTO `judaslanguages` VALUES (336,'PORTUGUES','logout','Sair\n');
INSERT INTO `judaslanguages` VALUES (337,'PORTUGUES','maninfo','Informações de Administração\n');
INSERT INTO `judaslanguages` VALUES (338,'PORTUGUES','maninfoverb','Relatórios de estatísticas para Administração\n');
INSERT INTO `judaslanguages` VALUES (339,'PORTUGUES','sitestats','Estatísticas do site\n');
INSERT INTO `judaslanguages` VALUES (340,'PORTUGUES','sitestatsverb','As estatísticas deste site\n');
INSERT INTO `judaslanguages` VALUES (341,'PORTUGUES','administration','Administração\n');
INSERT INTO `judaslanguages` VALUES (342,'PORTUGUES','administrationverb','Funçoes de Administração\n');
INSERT INTO `judaslanguages` VALUES (343,'PORTUGUES','helpcontentsverb','Mostrar lista de conteúdo da ajuda\n');
INSERT INTO `judaslanguages` VALUES (344,'PORTUGUES','dateinvalid','A data que você escolhe é inválida.n A data não foi escolhida.\n');
INSERT INTO `judaslanguages` VALUES (345,'PORTUGUES','entrysaved','Digitar número do pedido\n');
INSERT INTO `judaslanguages` VALUES (346,'PORTUGUES','wasadded','foi adicionado.\n');
INSERT INTO `judaslanguages` VALUES (347,'PORTUGUES','deleting1','Deletando\n');
INSERT INTO `judaslanguages` VALUES (348,'PORTUGUES','deleting2','arquivo(s). Aperte o botão abaixo para confirmar.\n');
INSERT INTO `judaslanguages` VALUES (349,'PORTUGUES','confdel','Confirme deletagem\n');
INSERT INTO `judaslanguages` VALUES (350,'PORTUGUES','deletingentity','Deletando tarefa\n');
INSERT INTO `judaslanguages` VALUES (351,'PORTUGUES','ownedby','pertence à\n');
INSERT INTO `judaslanguages` VALUES (352,'PORTUGUES','assignedto','Responsável para\n');
INSERT INTO `judaslanguages` VALUES (353,'PORTUGUES','curstat','Status atual\n');
INSERT INTO `judaslanguages` VALUES (354,'PORTUGUES','created','criado\n');
INSERT INTO `judaslanguages` VALUES (355,'PORTUGUES','lastupdate','última atualização\n');
INSERT INTO `judaslanguages` VALUES (356,'PORTUGUES','deleteerror','Você não pode deletar esta tarefa pois ela não foi terminada\n');
INSERT INTO `judaslanguages` VALUES (357,'PORTUGUES','confirmdel','Clique aqui para deletar esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (358,'PORTUGUES','search','Procura\n');
INSERT INTO `judaslanguages` VALUES (359,'PORTUGUES','thereare','São\n');
INSERT INTO `judaslanguages` VALUES (360,'PORTUGUES','openentities','Abrir tarefas\n');
INSERT INTO `judaslanguages` VALUES (361,'PORTUGUES','noopen','Não há tarefas abertas.\n');
INSERT INTO `judaslanguages` VALUES (362,'PORTUGUES','nonexistent','Você digitou um número de tarefa que não existe!\n');
INSERT INTO `judaslanguages` VALUES (363,'PORTUGUES','editing','Editando\n');
INSERT INTO `judaslanguages` VALUES (364,'PORTUGUES','wasclosed','Esta tarefa foi fechada\n');
INSERT INTO `judaslanguages` VALUES (365,'PORTUGUES','newentity','Nova tarefa\n');
INSERT INTO `judaslanguages` VALUES (366,'PORTUGUES','isdeleted','Esta é uma tarefa deletada\n');
INSERT INTO `judaslanguages` VALUES (367,'PORTUGUES','iswaiting','Aguardando outra pessoa\n');
INSERT INTO `judaslanguages` VALUES (368,'PORTUGUES','doesntbelonghere','Esta tarefa não pertence a este local\n');
INSERT INTO `judaslanguages` VALUES (369,'PORTUGUES','listofatt','Listar arquivos anexados a esta tarefa\n');
INSERT INTO `judaslanguages` VALUES (370,'PORTUGUES','filename','Nome do arquivo\n');
INSERT INTO `judaslanguages` VALUES (371,'PORTUGUES','filesize','Tamanho\n');
INSERT INTO `judaslanguages` VALUES (372,'PORTUGUES','creationdate','Data de criação\n');
INSERT INTO `judaslanguages` VALUES (373,'PORTUGUES','deletefile','Deletar\n');
INSERT INTO `judaslanguages` VALUES (374,'PORTUGUES','attachfile','Anexar arquivo\n');
INSERT INTO `judaslanguages` VALUES (375,'PORTUGUES','saveclose','Salvar e Fechar\n');
INSERT INTO `judaslanguages` VALUES (376,'PORTUGUES','cancel','Cancelar\n');
INSERT INTO `judaslanguages` VALUES (377,'PORTUGUES','save','Salvar para base de dados\n');
INSERT INTO `judaslanguages` VALUES (378,'PORTUGUES','noaction','Erro, nenhuma ação escolhida\n');
INSERT INTO `judaslanguages` VALUES (379,'PORTUGUES','zailo','falta zero consignados\n');
INSERT INTO `judaslanguages` VALUES (380,'PORTUGUES','name','Nome\n');
INSERT INTO `judaslanguages` VALUES (381,'PORTUGUES','usrwarning','Se uma caixa está desabilitada (cinza), significa que seu dono ou responsável possui uma conta limitada, e portanto o nome não pode ser mudado<br>ou os dados podem ser perdidos.\n');
INSERT INTO `judaslanguages` VALUES (382,'PORTUGUES','ownassindb','Donos os responsáveis na base de dados\n');
INSERT INTO `judaslanguages` VALUES (383,'PORTUGUES','addownass','Adicionar dono/responsável\n');
INSERT INTO `judaslanguages` VALUES (384,'PORTUGUES','apply','Aplicar alterações\n');
INSERT INTO `judaslanguages` VALUES (385,'PORTUGUES','custindb','Clientes na base de dados\n');
INSERT INTO `judaslanguages` VALUES (386,'PORTUGUES','addcust','Adicionar um cliente\n');
INSERT INTO `judaslanguages` VALUES (387,'PORTUGUES','selectfields','Por favor selecionar os campos que deseja exportar\n');
INSERT INTO `judaslanguages` VALUES (388,'PORTUGUES','lastupdatedate','Data da última atualização\n');
INSERT INTO `judaslanguages` VALUES (389,'PORTUGUES','lastupdatetime','Hora da última atualização\n');
INSERT INTO `judaslanguages` VALUES (390,'PORTUGUES','closedate','Data de fechamento\n');
INSERT INTO `judaslanguages` VALUES (391,'PORTUGUES','waitingcsv','Aguardando\n');
INSERT INTO `judaslanguages` VALUES (392,'PORTUGUES','doesntcsv','Não pertence a este local\n');
INSERT INTO `judaslanguages` VALUES (393,'PORTUGUES','contents','Conteúdo\n');
INSERT INTO `judaslanguages` VALUES (394,'PORTUGUES','alreadyselected','<b>Sua requisição foi gravada</b>\n');
INSERT INTO `judaslanguages` VALUES (395,'PORTUGUES','sep','Separação com caracteres\n');
INSERT INTO `judaslanguages` VALUES (396,'PORTUGUES','scqp','Separado por ponto-vírgula (;) (recomendado)\n');
INSERT INTO `judaslanguages` VALUES (397,'PORTUGUES','cqp','Separado com dois pontos (:)\n');
INSERT INTO `judaslanguages` VALUES (398,'PORTUGUES','kqp','Separado com vírgula (,)\n');
INSERT INTO `judaslanguages` VALUES (399,'PORTUGUES','csvwarning','Quando a caixa de download aparecer, seleciona \\\'Abrir o arquivo no local atual\\\'.<br> Talvez a mesma janela reapareça, se aparecer clique em \\\"Abrir\\\" novamente. Isto deve abrir seu Excel <br>com os dados exportados.\n');
INSERT INTO `judaslanguages` VALUES (400,'PORTUGUES','downloadexport','Baixar arquivo exportado\n');
INSERT INTO `judaslanguages` VALUES (401,'PORTUGUES','repdownloaded','Relotório foi baixado\n');
INSERT INTO `judaslanguages` VALUES (402,'PORTUGUES','endofreport','Fim do relatório. Tenha um ótimo dia :)\n');
INSERT INTO `judaslanguages` VALUES (403,'PORTUGUES','noresults','Seu pedido não obteve nenhum resultado.\n');
INSERT INTO `judaslanguages` VALUES (404,'PORTUGUES','entitiesfound','tarefas encontradas.\n');
INSERT INTO `judaslanguages` VALUES (405,'PORTUGUES','pbexport','exportar agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (406,'PORTUGUES','endofpbexport','<red> -- Fim do Relatório --\n');
INSERT INTO `judaslanguages` VALUES (407,'PORTUGUES','pbexpmade','Arquivo de exportação da agenda de telefones criado\n');
INSERT INTO `judaslanguages` VALUES (408,'PORTUGUES','wasdeleted','foi deletado\n');
INSERT INTO `judaslanguages` VALUES (409,'PORTUGUES','pbdelconf','a que deseja apagar esta gravação?\n');
INSERT INTO `judaslanguages` VALUES (410,'PORTUGUES','fname','Primeiro nome\n');
INSERT INTO `judaslanguages` VALUES (411,'PORTUGUES','lname','Sobrenome\n');
INSERT INTO `judaslanguages` VALUES (412,'PORTUGUES','tel','Telefone\n');
INSERT INTO `judaslanguages` VALUES (413,'PORTUGUES','company','Empresa\n');
INSERT INTO `judaslanguages` VALUES (414,'PORTUGUES','dep','Departamento\n');
INSERT INTO `judaslanguages` VALUES (415,'PORTUGUES','title','Título\n');
INSERT INTO `judaslanguages` VALUES (416,'PORTUGUES','room','Quarto\n');
INSERT INTO `judaslanguages` VALUES (417,'PORTUGUES','deletepb','Deletar\n');
INSERT INTO `judaslanguages` VALUES (418,'PORTUGUES','pbrecadded','Seu contato foi adicionado na agenda de telefones.\n');
INSERT INTO `judaslanguages` VALUES (419,'PORTUGUES','pbapp','Suas alterações foram aplicadas.\n');
INSERT INTO `judaslanguages` VALUES (420,'PORTUGUES','pbwarning','Por favor preencha pelo menos o sobrenome!\n');
INSERT INTO `judaslanguages` VALUES (421,'PORTUGUES','addtopb','Adicionar a agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (422,'PORTUGUES','pbresults','Resultados para sua pesquisa\n');
INSERT INTO `judaslanguages` VALUES (423,'PORTUGUES','options','Opções\n');
INSERT INTO `judaslanguages` VALUES (424,'PORTUGUES','resfound','resultados encontrados\n');
INSERT INTO `judaslanguages` VALUES (425,'PORTUGUES','pbcont1','Esta agenda de telefones contém\n');
INSERT INTO `judaslanguages` VALUES (426,'PORTUGUES','pbcont2','contatos\n');
INSERT INTO `judaslanguages` VALUES (427,'PORTUGUES','pbaddrec','adicionar contato\n');
INSERT INTO `judaslanguages` VALUES (428,'PORTUGUES','entsum','Relatório de tarefas\n');
INSERT INTO `judaslanguages` VALUES (429,'PORTUGUES','showonly','Mostra apenas\n');
INSERT INTO `judaslanguages` VALUES (430,'PORTUGUES','all','Tudo\n');
INSERT INTO `judaslanguages` VALUES (431,'PORTUGUES','inccont','Adicionar comentários a tarefa\n');
INSERT INTO `judaslanguages` VALUES (432,'PORTUGUES','incldel','Incluir tarefas excluidas\n');
INSERT INTO `judaslanguages` VALUES (433,'PORTUGUES','dlacsv','Baixar resultado como CSV\n');
INSERT INTO `judaslanguages` VALUES (434,'PORTUGUES','briefo','Dados resumidos\n');
INSERT INTO `judaslanguages` VALUES (435,'PORTUGUES','mustcontain','Tarefa deve conter texto\n');
INSERT INTO `judaslanguages` VALUES (436,'PORTUGUES','please','Por favor faça sua escolha...\n');
INSERT INTO `judaslanguages` VALUES (437,'PORTUGUES','remarks','Remarcar\n');
INSERT INTO `judaslanguages` VALUES (438,'PORTUGUES','hasfilessum','Esta tarefa possui arquivos anexados\n');
INSERT INTO `judaslanguages` VALUES (439,'PORTUGUES','expired','A data de realização desta tarefa expirou!\n');
INSERT INTO `judaslanguages` VALUES (440,'PORTUGUES','thisiswaiting','Esta tarefa está aguardando ação de outra pessoa.\n');
INSERT INTO `judaslanguages` VALUES (441,'PORTUGUES','thisdoesntbelong','Este tarefa realmente não pertence a este local\n');
INSERT INTO `judaslanguages` VALUES (442,'PORTUGUES','clear','limpar\n');
INSERT INTO `judaslanguages` VALUES (443,'PORTUGUES','wrongpwd','Senha incorreta. Por favor tente novamente ou se mande\n');
INSERT INTO `judaslanguages` VALUES (444,'PORTUGUES','havetoenterpwd','Visto que sua conta não possui privilégios de administrador, você terá que colocar a senha de administrador\n');
INSERT INTO `judaslanguages` VALUES (445,'PORTUGUES','adm','Administração\n');
INSERT INTO `judaslanguages` VALUES (446,'PORTUGUES','nopwd','Visto que sua conta tem privilégios de administrador, a senha para o mesmo não foi pedida.\n');
INSERT INTO `judaslanguages` VALUES (447,'PORTUGUES','imported','print \\\"Foram $imported gravaçoes importadas.\\\";\n');
INSERT INTO `judaslanguages` VALUES (448,'PORTUGUES','ignored','gravaçoes foram ignoradas por conter um campo vazio.\n');
INSERT INTO `judaslanguages` VALUES (449,'PORTUGUES','impwarning','Para impedir que uma gravação seja importada, esvazie o campo \\\"Nome\\\". Corrija os que estiverem errados.\n');
INSERT INTO `judaslanguages` VALUES (450,'PORTUGUES','commawarning','Visto que você escolheu importar um arquivo separado por vírgulas, fique atento com combinações do tipo sobrenome, nome (que são comuns no Outlook) que podem produzir efeitos indesejados.\n');
INSERT INTO `judaslanguages` VALUES (451,'PORTUGUES','importinpb','Importar dados da agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (452,'PORTUGUES','pbimpwarning','As informações CSV que você colou <i>devem</i> conter todos campos, contudo eles podem ser vazios:\n');
INSERT INTO `judaslanguages` VALUES (453,'PORTUGUES','paste','Cole seu texto aqui ...\n');
INSERT INTO `judaslanguages` VALUES (454,'PORTUGUES','pleasechoose','Por favor selecione uma das opções abaixo:\n');
INSERT INTO `judaslanguages` VALUES (455,'PORTUGUES','chgsys','Trocar valores do sistema\n');
INSERT INTO `judaslanguages` VALUES (456,'PORTUGUES','impphone','Importar dadso da agenda de telefones\n');
INSERT INTO `judaslanguages` VALUES (457,'PORTUGUES','viewfiles','Ver arquivos na base de dados\n');
INSERT INTO `judaslanguages` VALUES (458,'PORTUGUES','delallclosed','Deletar todas as tarefas concluídas\n');
INSERT INTO `judaslanguages` VALUES (459,'PORTUGUES','eahelp','Adicionar/Editar tópicos de ajuda\n');
INSERT INTO `judaslanguages` VALUES (460,'PORTUGUES','physdel','Deletar fisicamente uma tarefa deletada\n');
INSERT INTO `judaslanguages` VALUES (461,'PORTUGUES','viewlog','Ver logs e estatísticas\n');
INSERT INTO `judaslanguages` VALUES (462,'PORTUGUES','manacc','Administrar contas\n');
INSERT INTO `judaslanguages` VALUES (463,'PORTUGUES','isdel','foi deletado\n');
INSERT INTO `judaslanguages` VALUES (464,'PORTUGUES','delfile','Deletando arquivo fisicamente\n');
INSERT INTO `judaslanguages` VALUES (465,'PORTUGUES','physdelwarning','Por favor digite o ID da tarefa<b>fechada e deletada</b> que você quer <b>fisicamente</b> deletar:\n');
INSERT INTO `judaslanguages` VALUES (466,'PORTUGUES','confphysdel','Clique no botão abaixo para confirmar deletação física.\n');
INSERT INTO `judaslanguages` VALUES (467,'PORTUGUES','addhelp','Adicionar opção de ajuda:\n');
INSERT INTO `judaslanguages` VALUES (468,'PORTUGUES','editaccount','Editar uma conta\n');
INSERT INTO `judaslanguages` VALUES (469,'PORTUGUES','addaccount','Adicionar uma conta\n');
INSERT INTO `judaslanguages` VALUES (470,'PORTUGUES','password','Senha\n');
INSERT INTO `judaslanguages` VALUES (471,'PORTUGUES','addu','Adicionar Usuário\n');
INSERT INTO `judaslanguages` VALUES (472,'PORTUGUES','btmap','Voltar para a página principal do Administrador\n');
INSERT INTO `judaslanguages` VALUES (473,'PORTUGUES','passwarn','deixe os dois campos em branco para manter a senha atual\n');
INSERT INTO `judaslanguages` VALUES (474,'PORTUGUES','limited','Limitado\n');
INSERT INTO `judaslanguages` VALUES (475,'PORTUGUES','normal','Normal\n');
INSERT INTO `judaslanguages` VALUES (476,'PORTUGUES','adminrights','Administrador\n');
INSERT INTO `judaslanguages` VALUES (477,'PORTUGUES','yes','Sim\n');
INSERT INTO `judaslanguages` VALUES (478,'PORTUGUES','no','Não\n');
INSERT INTO `judaslanguages` VALUES (479,'PORTUGUES','ela','Editando conta de login\n');
INSERT INTO `judaslanguages` VALUES (480,'PORTUGUES','dta','Deletar esta conta\n');
INSERT INTO `judaslanguages` VALUES (481,'PORTUGUES','passmatcherror','Senha não confere. Pressione \\\'voltar\\\' no seu navegador e tente novamente.\n');
INSERT INTO `judaslanguages` VALUES (482,'PORTUGUES','nimut','Ocorreu um erro!<br><br>Esta conta existe, mas ela<br>não se refere a nenhum usuário na base de dados para o qual possam ser designadas tarefas.<br><br>Verifique o nome tente novamente.\n');
INSERT INTO `judaslanguages` VALUES (483,'PORTUGUES','uwchala','Usuários que podem ter conta limitada\n');
INSERT INTO `judaslanguages` VALUES (484,'PORTUGUES','tawu','A conta foi atualizada\n');
INSERT INTO `judaslanguages` VALUES (485,'PORTUGUES','setting','Configurações\n');
INSERT INTO `judaslanguages` VALUES (486,'PORTUGUES','value','Valores\n');
INSERT INTO `judaslanguages` VALUES (487,'PORTUGUES','discription','Descrição\n');
INSERT INTO `judaslanguages` VALUES (488,'PORTUGUES','ocsvifb','Ou troque os valores do sistema no formulário abaixo\n');
INSERT INTO `judaslanguages` VALUES (489,'PORTUGUES','csvnow','Troque os valores do sistema\n');
INSERT INTO `judaslanguages` VALUES (490,'PORTUGUES','plzenterpwd','Por favor digite a senha\n');
INSERT INTO `judaslanguages` VALUES (491,'PORTUGUES','eor','Fim do relatório\n');
INSERT INTO `judaslanguages` VALUES (492,'PORTUGUES','smtsm','Selecione mais para ver mais...\n');
INSERT INTO `judaslanguages` VALUES (493,'PORTUGUES','dlmspdf','ou clique aqui para baixar (mais compacto) um relatório em PDF\n');
INSERT INTO `judaslanguages` VALUES (494,'PORTUGUES','sts','Resumos a mostrar\n');
INSERT INTO `judaslanguages` VALUES (495,'PORTUGUES','oqs','Relatório Geral Resumido\n');
INSERT INTO `judaslanguages` VALUES (496,'PORTUGUES','eobu','Tarefas possuidas por usuários\n');
INSERT INTO `judaslanguages` VALUES (497,'PORTUGUES','eatu','Tarefas com usuários responsáveis\n');
INSERT INTO `judaslanguages` VALUES (498,'PORTUGUES','sae','Tarefas designadas para o mesmo usuário\n');
INSERT INTO `judaslanguages` VALUES (499,'PORTUGUES','etdbh','Tarefas que não pertencem a este local\n');
INSERT INTO `judaslanguages` VALUES (500,'PORTUGUES','ewfsea','Tarefas aguardando ação de outra pessoa\n');
INSERT INTO `judaslanguages` VALUES (501,'PORTUGUES','epc','Tarefas por Cliente\n');
INSERT INTO `judaslanguages` VALUES (502,'PORTUGUES','oepa','Tarefas expiradas, por usuário\n');
INSERT INTO `judaslanguages` VALUES (503,'PORTUGUES','deleted','Deletado\n');
INSERT INTO `judaslanguages` VALUES (504,'PORTUGUES','total','Total\n');
INSERT INTO `judaslanguages` VALUES (505,'PORTUGUES','ofwhich','das quais\n');
INSERT INTO `judaslanguages` VALUES (506,'PORTUGUES','allround','Todos valores sõa aproximados\n');
INSERT INTO `judaslanguages` VALUES (507,'PORTUGUES','atac','ou muito aproximados\n');
INSERT INTO `judaslanguages` VALUES (508,'PORTUGUES','edd','Datas de expiração\n');
INSERT INTO `judaslanguages` VALUES (509,'PORTUGUES','dontbelonghere','Tarefas que não pertencem a este local\n');
INSERT INTO `judaslanguages` VALUES (510,'PORTUGUES','eatw','Tarefas adicionadas esta semana\n');
INSERT INTO `judaslanguages` VALUES (511,'PORTUGUES','ectw','Tarefas concluídas esta semana\n');
INSERT INTO `judaslanguages` VALUES (512,'PORTUGUES','eatm','Tarefas adicionadas neste mês\n');
INSERT INTO `judaslanguages` VALUES (513,'PORTUGUES','ectm','Tarefas concluídas neste mês\n');
INSERT INTO `judaslanguages` VALUES (514,'PORTUGUES','of','De\n');
INSERT INTO `judaslanguages` VALUES (515,'PORTUGUES','tad','tarefas contadas, uma média total \\\'de realização\\\' desde a adição de uma tarefa até seu fechamento\n');
INSERT INTO `judaslanguages` VALUES (516,'PORTUGUES','cuaeoay','Contados usando <u>todas</u> tarefas concluídas da base de dados, ao longo de <u>todos</u> os anos\n');
INSERT INTO `judaslanguages` VALUES (517,'PORTUGUES','users','Usuários\n');
INSERT INTO `judaslanguages` VALUES (518,'PORTUGUES','customers','Clientes\n');
INSERT INTO `judaslanguages` VALUES (519,'PORTUGUES','zoilo','zero donos estão faltando\n');
INSERT INTO `judaslanguages` VALUES (520,'PORTUGUES','ombla','Ou : ou talvez tarefas que não tem responsáveis ou não foram designadas(...)\n');
INSERT INTO `judaslanguages` VALUES (521,'PORTUGUES','andassignee','e designadas\n');
INSERT INTO `judaslanguages` VALUES (522,'PORTUGUES','selfassig','Auto-Designadas\n');
INSERT INTO `judaslanguages` VALUES (523,'PORTUGUES','aohnsae','Outros donos não possuem tarefas auto-designadas.\n');
INSERT INTO `judaslanguages` VALUES (524,'PORTUGUES','onavarage','Em média\n');
INSERT INTO `judaslanguages` VALUES (525,'PORTUGUES','oaoedbh','de todas tarefas <b>abertas</b> não pertencem a este local\n');
INSERT INTO `judaslanguages` VALUES (526,'PORTUGUES','teaair','A tarefa e todas as sua anotações foram fisicamente deletadas\n');
INSERT INTO `judaslanguages` VALUES (527,'PORTUGUES','cookiewarning','Não use esta função em computadores públicos!\n');
INSERT INTO `judaslanguages` VALUES (528,'PORTUGUES','username','Usuário\n');
INSERT INTO `judaslanguages` VALUES (529,'PORTUGUES','saveusername','Lembrar usuário\n');
INSERT INTO `judaslanguages` VALUES (530,'PORTUGUES','clearusername','Esquecer usuário\n');
INSERT INTO `judaslanguages` VALUES (531,'PORTUGUES','savepassword','Lmebrar senha\n');
INSERT INTO `judaslanguages` VALUES (532,'PORTUGUES','clearpassword','Esquecer senha\n');
INSERT INTO `judaslanguages` VALUES (533,'PORTUGUES','signedoff','Você foi deslogado. Por favor digite seu usuário e senha para entrar novamente\n');
INSERT INTO `judaslanguages` VALUES (534,'PORTUGUES','signedoffdue1','Você foi deslogado devido a\n');
INSERT INTO `judaslanguages` VALUES (535,'PORTUGUES','signedoffdue2','minutos de inatividade\n');
INSERT INTO `judaslanguages` VALUES (536,'PORTUGUES','sysmsg','O Administrador do sistema deixou uma mensagem para você\n');
INSERT INTO `judaslanguages` VALUES (537,'PORTUGUES','pleaseenter','Por favor digite seu usuário e senha\n');
INSERT INTO `judaslanguages` VALUES (538,'PORTUGUES','language','Língua\n');
INSERT INTO `judaslanguages` VALUES (539,'PORTUGUES','pushpdf','Baixar resultados em arquivo PDF\n');
INSERT INTO `judaslanguages` VALUES (540,'PORTUGUES','managementheader','Bem-vindo a interface de usuário limitado. você está no sistema como\n');
INSERT INTO `judaslanguages` VALUES (541,'PORTUGUES','oefm','Tarefas abertas para\n');
INSERT INTO `judaslanguages` VALUES (542,'PORTUGUES','showresults','Método do Relatório\n');
INSERT INTO `judaslanguages` VALUES (543,'PORTUGUES','verbose','Verbose\n');
INSERT INTO `judaslanguages` VALUES (544,'PORTUGUES','verbosewithcontents','Verbose com tópicos\n');
INSERT INTO `judaslanguages` VALUES (545,'PORTUGUES','briefsum','Resumo rápido\n');
INSERT INTO `judaslanguages` VALUES (546,'PORTUGUES','downloadsumpdf','Baixar resumo como arquivo PDF\n');
INSERT INTO `judaslanguages` VALUES (547,'PORTUGUES','downloadsumcsv','Baixar resumo em arquivo Excel\n');
INSERT INTO `judaslanguages` VALUES (548,'PORTUGUES','packman','Administrar pacotes de linguagem\n');
INSERT INTO `judaslanguages` VALUES (549,'PORTUGUES','openinnewwindow','Abrir em uma nova janela\n');
INSERT INTO `judaslanguages` VALUES (550,'PORTUGUES','delcust','Deletar este usuário (<b>nenhuma</b> confirmação será pedida)\n');
INSERT INTO `judaslanguages` VALUES (551,'PORTUGUES','nousers1','Não há donos / responsáveis configurados. Antes de começar a usar o CRM, você precisa adicionar pelo menos um. Clique em \\\'Donos/Responsáveis\\\' para adicionar possíveis donos ou responsáveis!\n');
INSERT INTO `judaslanguages` VALUES (552,'PORTUGUES','custhomepage','Homepage\n');
INSERT INTO `judaslanguages` VALUES (553,'PORTUGUES','custremarks','Remarcação\n');
INSERT INTO `judaslanguages` VALUES (554,'PORTUGUES','customeraddress','Endereço do cliente\n');
INSERT INTO `judaslanguages` VALUES (555,'PORTUGUES','contactemail','E-mail para contato\n');
INSERT INTO `judaslanguages` VALUES (556,'PORTUGUES','contactphone','Telefone para contato\n');
INSERT INTO `judaslanguages` VALUES (557,'PORTUGUES','contact','Contato\n');
INSERT INTO `judaslanguages` VALUES (558,'PORTUGUES','contacttitle','Título de contato (ex. Sr.)\n');
INSERT INTO `judaslanguages` VALUES (559,'PORTUGUES','custdelexplain','Este cliente não pode ser deletado pois tem tarefas que pertencem a eles\n');
INSERT INTO `judaslanguages` VALUES (560,'PORTUGUES','editextras','Editar valores extras\n');
INSERT INTO `judaslanguages` VALUES (561,'PORTUGUES','fieldname','Nome\n');
INSERT INTO `judaslanguages` VALUES (562,'PORTUGUES','iftynmvhpcysa','Se você acha que precisa de mais nomes aqui, por favor contate o administrador do seu CRM.\n');
INSERT INTO `judaslanguages` VALUES (563,'PORTUGUES','extrafields','Campos extras\n');
INSERT INTO `judaslanguages` VALUES (564,'PORTUGUES','uinw','Atualizar em nova janela\n');
INSERT INTO `judaslanguages` VALUES (565,'PORTUGUES','nocustomers1','Não há clientes configurados. Antes de usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente!\n');
INSERT INTO `judaslanguages` VALUES (566,'PORTUGUES','nousersandnocustomers1','Não há clientes nem possíveis Donos/Designados configurados. Antes que você possa usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente, e depois no menu \\\'Donos/Designados\\\' para adicionar pelo menos um pos');
INSERT INTO `judaslanguages` VALUES (567,'PORTUGUES','managerepositories','Administrar repositores\n');
INSERT INTO `judaslanguages` VALUES (568,'ENGLISH','stillchecked1','This file is still locked for editing by');
INSERT INTO `judaslanguages` VALUES (569,'ENGLISH','stillchecked2','. Please stop editing this file before trying to check it in.');
INSERT INTO `judaslanguages` VALUES (570,'ENGLISH','saveasnewentity','Save as new entity');
INSERT INTO `judaslanguages` VALUES (573,'GLOBAL','current-language','PORTUGUES');
INSERT INTO `judaslanguages` VALUES (574,'GLOBAL','current-language-mask','PORTUGUES');

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
# Dumping data for table judaslanguages2
#

INSERT INTO `judaslanguages2` VALUES (1,'PORTUGUES','customer','Cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (2,'PORTUGUES','owner','Dono\r\n');
INSERT INTO `judaslanguages2` VALUES (3,'PORTUGUES','entity','tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (4,'PORTUGUES','priority','Prioridade\r\n');
INSERT INTO `judaslanguages2` VALUES (5,'PORTUGUES','assignee','Responsável\r\n');
INSERT INTO `judaslanguages2` VALUES (6,'PORTUGUES','duedate','Para dia\r\n');
INSERT INTO `judaslanguages2` VALUES (7,'PORTUGUES','alarmdate','Data do Alarme\r\n');
INSERT INTO `judaslanguages2` VALUES (8,'PORTUGUES','alarmdatev','Criar alarme para esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (9,'PORTUGUES','category','Categoria\r\n');
INSERT INTO `judaslanguages2` VALUES (10,'PORTUGUES','status','Status\r\n');
INSERT INTO `judaslanguages2` VALUES (11,'PORTUGUES','helpcontents','Tópicos de ajuda\r\n');
INSERT INTO `judaslanguages2` VALUES (12,'PORTUGUES','tolimited','Devido a falta de privilégios você foi direcionado para uma tela limitada\r\n');
INSERT INTO `judaslanguages2` VALUES (13,'PORTUGUES','briefover','Relatório sobre a tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (14,'PORTUGUES','mightbebetter','Seria melhor você usar a opção de relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (15,'PORTUGUES','editthis','Edite esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (16,'PORTUGUES','alarmsettings','Opções do Alarme\r\n');
INSERT INTO `judaslanguages2` VALUES (17,'PORTUGUES','closethisentity','Fechar esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (18,'PORTUGUES','deletethisentity','Deletar esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (19,'PORTUGUES','downloadpdf','Baixar relatório em PDF sobre esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (20,'PORTUGUES','downloadpdfs','Baixar relatório em PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (21,'PORTUGUES','close','Fechar\r\n');
INSERT INTO `judaslanguages2` VALUES (22,'PORTUGUES','edit','Editar\r\n');
INSERT INTO `judaslanguages2` VALUES (23,'PORTUGUES','delete','Deletar\r\n');
INSERT INTO `judaslanguages2` VALUES (24,'PORTUGUES','pdfreport','Relatório em PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (25,'PORTUGUES','welcome1','Bem-vindo ao\r\n');
INSERT INTO `judaslanguages2` VALUES (26,'PORTUGUES','intro1','Esta ferramenta é usada para grava as dúvidas dos clientes. Agora eles são\r\n');
INSERT INTO `judaslanguages2` VALUES (27,'PORTUGUES','intro2','usuários registrados,<br>que no total são\r\n');
INSERT INTO `judaslanguages2` VALUES (28,'PORTUGUES','intro3','tarefas logadas, para\r\n');
INSERT INTO `judaslanguages2` VALUES (29,'PORTUGUES','intro4','clientes.\r\n');
INSERT INTO `judaslanguages2` VALUES (30,'PORTUGUES','welcome','Bem-vindo\r\n');
INSERT INTO `judaslanguages2` VALUES (31,'PORTUGUES','lastlogon','Última vez que logou\r\n');
INSERT INTO `judaslanguages2` VALUES (32,'PORTUGUES','entitiestoday','tarefas para hoje\r\n');
INSERT INTO `judaslanguages2` VALUES (33,'PORTUGUES','noentities','Não há nenhuma tarefa para hoje\r\n');
INSERT INTO `judaslanguages2` VALUES (34,'PORTUGUES','gotomainpage','Ir para a página principal\r\n');
INSERT INTO `judaslanguages2` VALUES (35,'PORTUGUES','main','Principal\r\n');
INSERT INTO `judaslanguages2` VALUES (36,'PORTUGUES','addcusttodb','Adicionar o pedido do cliente na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (37,'PORTUGUES','add','Adicionar\r\n');
INSERT INTO `judaslanguages2` VALUES (38,'PORTUGUES','viewbrief','Ver um relatório das tarefas gravadas na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (39,'PORTUGUES','entities','Tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (40,'PORTUGUES','brieflistdel','Ver um relatório das tarefas apagadas da base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (41,'PORTUGUES','delentities','Deletar tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (42,'PORTUGUES','vacoa','Ver, adicionar ou mudar possíveis donos ou Responsávels\r\n');
INSERT INTO `judaslanguages2` VALUES (43,'PORTUGUES','oa','Donos/Responsávels\r\n');
INSERT INTO `judaslanguages2` VALUES (44,'PORTUGUES','vacc','Ver, adicionar ou modificar clientes\r\n');
INSERT INTO `judaslanguages2` VALUES (45,'PORTUGUES','customers','Clientes\r\n');
INSERT INTO `judaslanguages2` VALUES (46,'PORTUGUES','dumpi','Eliminar as vírgulas para exportar os dados da base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (47,'PORTUGUES','phonebook1','Agenda de Telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (48,'PORTUGUES','phonebookshort','AT\r\n');
INSERT INTO `judaslanguages2` VALUES (49,'PORTUGUES','sumverb','Ver e imprimir relatórios mais avançados\r\n');
INSERT INTO `judaslanguages2` VALUES (50,'PORTUGUES','summary','Relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (51,'PORTUGUES','logout','Sair\r\n');
INSERT INTO `judaslanguages2` VALUES (52,'PORTUGUES','maninfo','Informações de Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (53,'PORTUGUES','maninfoverb','Relatórios de estatísticas para Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (54,'PORTUGUES','sitestats','Estatísticas do site\r\n');
INSERT INTO `judaslanguages2` VALUES (55,'PORTUGUES','sitestatsverb','As estatísticas deste site\r\n');
INSERT INTO `judaslanguages2` VALUES (56,'PORTUGUES','administration','Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (57,'PORTUGUES','administrationverb','Funçoes de Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (58,'PORTUGUES','helpcontentsverb','Mostrar lista de conteúdo da ajuda\r\n');
INSERT INTO `judaslanguages2` VALUES (59,'PORTUGUES','dateinvalid','A data que você escolhe é inválida.n A data não foi escolhida.\r\n');
INSERT INTO `judaslanguages2` VALUES (60,'PORTUGUES','entrysaved','Digitar número do pedido\r\n');
INSERT INTO `judaslanguages2` VALUES (61,'PORTUGUES','wasadded','foi adicionado.\r\n');
INSERT INTO `judaslanguages2` VALUES (62,'PORTUGUES','deleting1','Deletando\r\n');
INSERT INTO `judaslanguages2` VALUES (63,'PORTUGUES','deleting2','arquivo(s). Aperte o botão abaixo para confirmar.\r\n');
INSERT INTO `judaslanguages2` VALUES (64,'PORTUGUES','confdel','Confirme deletagem\r\n');
INSERT INTO `judaslanguages2` VALUES (65,'PORTUGUES','deletingentity','Deletando tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (66,'PORTUGUES','ownedby','pertence à\r\n');
INSERT INTO `judaslanguages2` VALUES (67,'PORTUGUES','assignedto','Responsável para\r\n');
INSERT INTO `judaslanguages2` VALUES (68,'PORTUGUES','curstat','Status atual\r\n');
INSERT INTO `judaslanguages2` VALUES (69,'PORTUGUES','created','criado\r\n');
INSERT INTO `judaslanguages2` VALUES (70,'PORTUGUES','lastupdate','última atualização\r\n');
INSERT INTO `judaslanguages2` VALUES (71,'PORTUGUES','deleteerror','Você não pode deletar esta tarefa pois ela não foi terminada\r\n');
INSERT INTO `judaslanguages2` VALUES (72,'PORTUGUES','confirmdel','Clique aqui para deletar esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (73,'PORTUGUES','search','Procura\r\n');
INSERT INTO `judaslanguages2` VALUES (74,'PORTUGUES','thereare','São\r\n');
INSERT INTO `judaslanguages2` VALUES (75,'PORTUGUES','openentities','Abrir tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (76,'PORTUGUES','noopen','Não há tarefas abertas.\r\n');
INSERT INTO `judaslanguages2` VALUES (77,'PORTUGUES','nonexistent','Você digitou um número de tarefa que não existe!\r\n');
INSERT INTO `judaslanguages2` VALUES (78,'PORTUGUES','editing','Editando\r\n');
INSERT INTO `judaslanguages2` VALUES (79,'PORTUGUES','wasclosed','Esta tarefa foi fechada\r\n');
INSERT INTO `judaslanguages2` VALUES (80,'PORTUGUES','newentity','Nova tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (81,'PORTUGUES','isdeleted','Esta é uma tarefa deletada\r\n');
INSERT INTO `judaslanguages2` VALUES (82,'PORTUGUES','iswaiting','Aguardando outra pessoa\r\n');
INSERT INTO `judaslanguages2` VALUES (83,'PORTUGUES','doesntbelonghere','Esta tarefa não pertence a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (84,'PORTUGUES','listofatt','Listar arquivos anexados a esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (85,'PORTUGUES','filename','Nome do arquivo\r\n');
INSERT INTO `judaslanguages2` VALUES (86,'PORTUGUES','filesize','Tamanho\r\n');
INSERT INTO `judaslanguages2` VALUES (87,'PORTUGUES','creationdate','Data de criação\r\n');
INSERT INTO `judaslanguages2` VALUES (88,'PORTUGUES','deletefile','Deletar\r\n');
INSERT INTO `judaslanguages2` VALUES (89,'PORTUGUES','attachfile','Anexar arquivo\r\n');
INSERT INTO `judaslanguages2` VALUES (90,'PORTUGUES','saveclose','Salvar e Fechar\r\n');
INSERT INTO `judaslanguages2` VALUES (91,'PORTUGUES','cancel','Cancelar\r\n');
INSERT INTO `judaslanguages2` VALUES (92,'PORTUGUES','save','Salvar para base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (93,'PORTUGUES','noaction','Erro, nenhuma ação escolhida\r\n');
INSERT INTO `judaslanguages2` VALUES (94,'PORTUGUES','zailo','falta zero consignados\r\n');
INSERT INTO `judaslanguages2` VALUES (95,'PORTUGUES','name','Nome\r\n');
INSERT INTO `judaslanguages2` VALUES (96,'PORTUGUES','usrwarning','Se uma caixa está desabilitada (cinza), significa que seu dono ou responsável possui uma conta limitada, e portanto o nome não pode ser mudado<br>ou os dados podem ser perdidos.\r\n');
INSERT INTO `judaslanguages2` VALUES (97,'PORTUGUES','ownassindb','Donos os responsáveis na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (98,'PORTUGUES','addownass','Adicionar dono/responsável\r\n');
INSERT INTO `judaslanguages2` VALUES (99,'PORTUGUES','apply','Aplicar alterações\r\n');
INSERT INTO `judaslanguages2` VALUES (100,'PORTUGUES','custindb','Clientes na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (101,'PORTUGUES','addcust','Adicionar um cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (102,'PORTUGUES','selectfields','Por favor selecionar os campos que deseja exportar\r\n');
INSERT INTO `judaslanguages2` VALUES (103,'PORTUGUES','lastupdatedate','Data da última atualização\r\n');
INSERT INTO `judaslanguages2` VALUES (104,'PORTUGUES','lastupdatetime','Hora da última atualização\r\n');
INSERT INTO `judaslanguages2` VALUES (105,'PORTUGUES','closedate','Data de fechamento\r\n');
INSERT INTO `judaslanguages2` VALUES (106,'PORTUGUES','waitingcsv','Aguardando\r\n');
INSERT INTO `judaslanguages2` VALUES (107,'PORTUGUES','doesntcsv','Não pertence a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (108,'PORTUGUES','contents','Conteúdo\r\n');
INSERT INTO `judaslanguages2` VALUES (109,'PORTUGUES','alreadyselected','<b>Sua requisição foi gravada</b>\r\n');
INSERT INTO `judaslanguages2` VALUES (110,'PORTUGUES','sep','Separação com caracteres\r\n');
INSERT INTO `judaslanguages2` VALUES (111,'PORTUGUES','scqp','Separado por ponto-vírgula (;) (recomendado)\r\n');
INSERT INTO `judaslanguages2` VALUES (112,'PORTUGUES','cqp','Separado com dois pontos (:)\r\n');
INSERT INTO `judaslanguages2` VALUES (113,'PORTUGUES','kqp','Separado com vírgula (,)\r\n');
INSERT INTO `judaslanguages2` VALUES (114,'PORTUGUES','csvwarning','Quando a caixa de download aparecer, seleciona \\\'Abrir o arquivo no local atual\\\'.<br> Talvez a mesma janela reapareça, se aparecer clique em \\\"Abrir\\\" novamente. Isto deve abrir seu Excel <br>com os dados exportados.\r\n');
INSERT INTO `judaslanguages2` VALUES (115,'PORTUGUES','downloadexport','Baixar arquivo exportado\r\n');
INSERT INTO `judaslanguages2` VALUES (116,'PORTUGUES','repdownloaded','Relotório foi baixado\r\n');
INSERT INTO `judaslanguages2` VALUES (117,'PORTUGUES','endofreport','Fim do relatório. Tenha um ótimo dia :)\r\n');
INSERT INTO `judaslanguages2` VALUES (118,'PORTUGUES','noresults','Seu pedido não obteve nenhum resultado.\r\n');
INSERT INTO `judaslanguages2` VALUES (119,'PORTUGUES','entitiesfound','tarefas encontradas.\r\n');
INSERT INTO `judaslanguages2` VALUES (120,'PORTUGUES','pbexport','exportar agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (121,'PORTUGUES','endofpbexport','<red> -- Fim do Relatório --\r\n');
INSERT INTO `judaslanguages2` VALUES (122,'PORTUGUES','pbexpmade','Arquivo de exportação da agenda de telefones criado\r\n');
INSERT INTO `judaslanguages2` VALUES (123,'PORTUGUES','wasdeleted','foi deletado\r\n');
INSERT INTO `judaslanguages2` VALUES (124,'PORTUGUES','pbdelconf','a que deseja apagar esta gravação?\r\n');
INSERT INTO `judaslanguages2` VALUES (125,'PORTUGUES','fname','Primeiro nome\r\n');
INSERT INTO `judaslanguages2` VALUES (126,'PORTUGUES','lname','Sobrenome\r\n');
INSERT INTO `judaslanguages2` VALUES (127,'PORTUGUES','tel','Telefone\r\n');
INSERT INTO `judaslanguages2` VALUES (128,'PORTUGUES','company','Empresa\r\n');
INSERT INTO `judaslanguages2` VALUES (129,'PORTUGUES','dep','Departamento\r\n');
INSERT INTO `judaslanguages2` VALUES (130,'PORTUGUES','title','Título\r\n');
INSERT INTO `judaslanguages2` VALUES (131,'PORTUGUES','room','Quarto\r\n');
INSERT INTO `judaslanguages2` VALUES (132,'PORTUGUES','deletepb','Deletar\r\n');
INSERT INTO `judaslanguages2` VALUES (133,'PORTUGUES','pbrecadded','Seu contato foi adicionado na agenda de telefones.\r\n');
INSERT INTO `judaslanguages2` VALUES (134,'PORTUGUES','pbapp','Suas alterações foram aplicadas.\r\n');
INSERT INTO `judaslanguages2` VALUES (135,'PORTUGUES','pbwarning','Por favor preencha pelo menos o sobrenome!\r\n');
INSERT INTO `judaslanguages2` VALUES (136,'PORTUGUES','addtopb','Adicionar a agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (137,'PORTUGUES','pbresults','Resultados para sua pesquisa\r\n');
INSERT INTO `judaslanguages2` VALUES (138,'PORTUGUES','options','Opções\r\n');
INSERT INTO `judaslanguages2` VALUES (139,'PORTUGUES','resfound','resultados encontrados\r\n');
INSERT INTO `judaslanguages2` VALUES (140,'PORTUGUES','pbcont1','Esta agenda de telefones contém\r\n');
INSERT INTO `judaslanguages2` VALUES (141,'PORTUGUES','pbcont2','contatos\r\n');
INSERT INTO `judaslanguages2` VALUES (142,'PORTUGUES','pbaddrec','adicionar contato\r\n');
INSERT INTO `judaslanguages2` VALUES (143,'PORTUGUES','entsum','Relatório de tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (144,'PORTUGUES','showonly','Mostra apenas\r\n');
INSERT INTO `judaslanguages2` VALUES (145,'PORTUGUES','all','Tudo\r\n');
INSERT INTO `judaslanguages2` VALUES (146,'PORTUGUES','inccont','Adicionar comentários a tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (147,'PORTUGUES','incldel','Incluir tarefas excluidas\r\n');
INSERT INTO `judaslanguages2` VALUES (148,'PORTUGUES','dlacsv','Baixar resultado como CSV\r\n');
INSERT INTO `judaslanguages2` VALUES (149,'PORTUGUES','briefo','Dados resumidos\r\n');
INSERT INTO `judaslanguages2` VALUES (150,'PORTUGUES','mustcontain','Tarefa deve conter texto\r\n');
INSERT INTO `judaslanguages2` VALUES (151,'PORTUGUES','please','Por favor faça sua escolha...\r\n');
INSERT INTO `judaslanguages2` VALUES (152,'PORTUGUES','remarks','Remarcar\r\n');
INSERT INTO `judaslanguages2` VALUES (153,'PORTUGUES','hasfilessum','Esta tarefa possui arquivos anexados\r\n');
INSERT INTO `judaslanguages2` VALUES (154,'PORTUGUES','expired','A data de realização desta tarefa expirou!\r\n');
INSERT INTO `judaslanguages2` VALUES (155,'PORTUGUES','thisiswaiting','Esta tarefa está aguardando ação de outra pessoa.\r\n');
INSERT INTO `judaslanguages2` VALUES (156,'PORTUGUES','thisdoesntbelong','Este tarefa realmente não pertence a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (157,'PORTUGUES','clear','limpar\r\n');
INSERT INTO `judaslanguages2` VALUES (158,'PORTUGUES','wrongpwd','Senha incorreta. Por favor tente novamente ou se mande\r\n');
INSERT INTO `judaslanguages2` VALUES (159,'PORTUGUES','havetoenterpwd','Visto que sua conta não possui privilégios de administrador, você terá que colocar a senha de administrador\r\n');
INSERT INTO `judaslanguages2` VALUES (160,'PORTUGUES','adm','Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (161,'PORTUGUES','nopwd','Visto que sua conta tem privilégios de administrador, a senha para o mesmo não foi pedida.\r\n');
INSERT INTO `judaslanguages2` VALUES (162,'PORTUGUES','imported','print \\\"Foram $imported gravaçoes importadas.\\\";\r\n');
INSERT INTO `judaslanguages2` VALUES (163,'PORTUGUES','ignored','gravaçoes foram ignoradas por conter um campo vazio.\r\n');
INSERT INTO `judaslanguages2` VALUES (164,'PORTUGUES','impwarning','Para impedir que uma gravação seja importada, esvazie o campo \\\"Nome\\\". Corrija os que estiverem errados.\r\n');
INSERT INTO `judaslanguages2` VALUES (165,'PORTUGUES','commawarning','Visto que você escolheu importar um arquivo separado por vírgulas, fique atento com combinações do tipo sobrenome, nome (que são comuns no Outlook) que podem produzir efeitos indesejados.\r\n');
INSERT INTO `judaslanguages2` VALUES (166,'PORTUGUES','importinpb','Importar dados da agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (167,'PORTUGUES','pbimpwarning','As informações CSV que você colou <i>devem</i> conter todos campos, contudo eles podem ser vazios:\r\n');
INSERT INTO `judaslanguages2` VALUES (168,'PORTUGUES','paste','Cole seu texto aqui ...\r\n');
INSERT INTO `judaslanguages2` VALUES (169,'PORTUGUES','pleasechoose','Por favor selecione uma das opções abaixo:\r\n');
INSERT INTO `judaslanguages2` VALUES (170,'PORTUGUES','chgsys','Trocar valores do sistema\r\n');
INSERT INTO `judaslanguages2` VALUES (171,'PORTUGUES','impphone','Importar dadso da agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (172,'PORTUGUES','viewfiles','Ver arquivos na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (173,'PORTUGUES','delallclosed','Deletar todas as tarefas concluídas\r\n');
INSERT INTO `judaslanguages2` VALUES (174,'PORTUGUES','eahelp','Adicionar/Editar tópicos de ajuda\r\n');
INSERT INTO `judaslanguages2` VALUES (175,'PORTUGUES','physdel','Deletar fisicamente uma tarefa deletada\r\n');
INSERT INTO `judaslanguages2` VALUES (176,'PORTUGUES','viewlog','Ver logs e estatísticas\r\n');
INSERT INTO `judaslanguages2` VALUES (177,'PORTUGUES','manacc','Administrar contas\r\n');
INSERT INTO `judaslanguages2` VALUES (178,'PORTUGUES','isdel','foi deletado\r\n');
INSERT INTO `judaslanguages2` VALUES (179,'PORTUGUES','delfile','Deletando arquivo fisicamente\r\n');
INSERT INTO `judaslanguages2` VALUES (180,'PORTUGUES','physdelwarning','Por favor digite o ID da tarefa<b>fechada e deletada</b> que você quer <b>fisicamente</b> deletar:\r\n');
INSERT INTO `judaslanguages2` VALUES (181,'PORTUGUES','confphysdel','Clique no botão abaixo para confirmar deletação física.\r\n');
INSERT INTO `judaslanguages2` VALUES (182,'PORTUGUES','addhelp','Adicionar opção de ajuda:\r\n');
INSERT INTO `judaslanguages2` VALUES (183,'PORTUGUES','editaccount','Editar uma conta\r\n');
INSERT INTO `judaslanguages2` VALUES (184,'PORTUGUES','addaccount','Adicionar uma conta\r\n');
INSERT INTO `judaslanguages2` VALUES (185,'PORTUGUES','password','Senha\r\n');
INSERT INTO `judaslanguages2` VALUES (186,'PORTUGUES','addu','Adicionar Usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (187,'PORTUGUES','btmap','Voltar para a página principal do Administrador\r\n');
INSERT INTO `judaslanguages2` VALUES (188,'PORTUGUES','passwarn','deixe os dois campos em branco para manter a senha atual\r\n');
INSERT INTO `judaslanguages2` VALUES (189,'PORTUGUES','limited','Limitado\r\n');
INSERT INTO `judaslanguages2` VALUES (190,'PORTUGUES','normal','Normal\r\n');
INSERT INTO `judaslanguages2` VALUES (191,'PORTUGUES','adminrights','Administrador\r\n');
INSERT INTO `judaslanguages2` VALUES (192,'PORTUGUES','yes','Sim\r\n');
INSERT INTO `judaslanguages2` VALUES (193,'PORTUGUES','no','Não\r\n');
INSERT INTO `judaslanguages2` VALUES (194,'PORTUGUES','ela','Editando conta de login\r\n');
INSERT INTO `judaslanguages2` VALUES (195,'PORTUGUES','dta','Deletar esta conta\r\n');
INSERT INTO `judaslanguages2` VALUES (196,'PORTUGUES','passmatcherror','Senha não confere. Pressione \\\'voltar\\\' no seu navegador e tente novamente.\r\n');
INSERT INTO `judaslanguages2` VALUES (197,'PORTUGUES','nimut','Ocorreu um erro!<br><br>Esta conta existe, mas ela<br>não se refere a nenhum usuário na base de dados para o qual possam ser designadas tarefas.<br><br>Verifique o nome tente novamente.\r\n');
INSERT INTO `judaslanguages2` VALUES (198,'PORTUGUES','uwchala','Usuários que podem ter conta limitada\r\n');
INSERT INTO `judaslanguages2` VALUES (199,'PORTUGUES','tawu','A conta foi atualizada\r\n');
INSERT INTO `judaslanguages2` VALUES (200,'PORTUGUES','setting','Configurações\r\n');
INSERT INTO `judaslanguages2` VALUES (201,'PORTUGUES','value','Valores\r\n');
INSERT INTO `judaslanguages2` VALUES (202,'PORTUGUES','discription','Descrição\r\n');
INSERT INTO `judaslanguages2` VALUES (203,'PORTUGUES','ocsvifb','Ou troque os valores do sistema no formulário abaixo\r\n');
INSERT INTO `judaslanguages2` VALUES (204,'PORTUGUES','csvnow','Troque os valores do sistema\r\n');
INSERT INTO `judaslanguages2` VALUES (205,'PORTUGUES','plzenterpwd','Por favor digite a senha\r\n');
INSERT INTO `judaslanguages2` VALUES (206,'PORTUGUES','eor','Fim do relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (207,'PORTUGUES','smtsm','Selecione mais para ver mais...\r\n');
INSERT INTO `judaslanguages2` VALUES (208,'PORTUGUES','dlmspdf','ou clique aqui para baixar (mais compacto) um relatório em PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (209,'PORTUGUES','sts','Resumos a mostrar\r\n');
INSERT INTO `judaslanguages2` VALUES (210,'PORTUGUES','oqs','Relatório Geral Resumido\r\n');
INSERT INTO `judaslanguages2` VALUES (211,'PORTUGUES','eobu','Tarefas possuidas por usuários\r\n');
INSERT INTO `judaslanguages2` VALUES (212,'PORTUGUES','eatu','Tarefas com usuários responsáveis\r\n');
INSERT INTO `judaslanguages2` VALUES (213,'PORTUGUES','sae','Tarefas designadas para o mesmo usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (214,'PORTUGUES','etdbh','Tarefas que não pertencem a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (215,'PORTUGUES','ewfsea','Tarefas aguardando ação de outra pessoa\r\n');
INSERT INTO `judaslanguages2` VALUES (216,'PORTUGUES','epc','Tarefas por Cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (217,'PORTUGUES','oepa','Tarefas expiradas, por usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (218,'PORTUGUES','deleted','Deletado\r\n');
INSERT INTO `judaslanguages2` VALUES (219,'PORTUGUES','total','Total\r\n');
INSERT INTO `judaslanguages2` VALUES (220,'PORTUGUES','ofwhich','das quais\r\n');
INSERT INTO `judaslanguages2` VALUES (221,'PORTUGUES','allround','Todos valores sõa aproximados\r\n');
INSERT INTO `judaslanguages2` VALUES (222,'PORTUGUES','atac','ou muito aproximados\r\n');
INSERT INTO `judaslanguages2` VALUES (223,'PORTUGUES','edd','Datas de expiração\r\n');
INSERT INTO `judaslanguages2` VALUES (224,'PORTUGUES','dontbelonghere','Tarefas que não pertencem a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (225,'PORTUGUES','eatw','Tarefas adicionadas esta semana\r\n');
INSERT INTO `judaslanguages2` VALUES (226,'PORTUGUES','ectw','Tarefas concluídas esta semana\r\n');
INSERT INTO `judaslanguages2` VALUES (227,'PORTUGUES','eatm','Tarefas adicionadas neste mês\r\n');
INSERT INTO `judaslanguages2` VALUES (228,'PORTUGUES','ectm','Tarefas concluídas neste mês\r\n');
INSERT INTO `judaslanguages2` VALUES (229,'PORTUGUES','of','De\r\n');
INSERT INTO `judaslanguages2` VALUES (230,'PORTUGUES','tad','tarefas contadas, uma média total \\\'de realização\\\' desde a adição de uma tarefa até seu fechamento\r\n');
INSERT INTO `judaslanguages2` VALUES (231,'PORTUGUES','cuaeoay','Contados usando <u>todas</u> tarefas concluídas da base de dados, ao longo de <u>todos</u> os anos\r\n');
INSERT INTO `judaslanguages2` VALUES (232,'PORTUGUES','users','Usuários\r\n');
INSERT INTO `judaslanguages2` VALUES (233,'PORTUGUES','customers','Clientes\r\n');
INSERT INTO `judaslanguages2` VALUES (234,'PORTUGUES','zoilo','zero donos estão faltando\r\n');
INSERT INTO `judaslanguages2` VALUES (235,'PORTUGUES','ombla','Ou : ou talvez tarefas que não tem responsáveis ou não foram designadas(...)\r\n');
INSERT INTO `judaslanguages2` VALUES (236,'PORTUGUES','andassignee','e designadas\r\n');
INSERT INTO `judaslanguages2` VALUES (237,'PORTUGUES','selfassig','Auto-Designadas\r\n');
INSERT INTO `judaslanguages2` VALUES (238,'PORTUGUES','aohnsae','Outros donos não possuem tarefas auto-designadas.\r\n');
INSERT INTO `judaslanguages2` VALUES (239,'PORTUGUES','onavarage','Em média\r\n');
INSERT INTO `judaslanguages2` VALUES (240,'PORTUGUES','oaoedbh','de todas tarefas <b>abertas</b> não pertencem a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (241,'PORTUGUES','teaair','A tarefa e todas as sua anotações foram fisicamente deletadas\r\n');
INSERT INTO `judaslanguages2` VALUES (242,'PORTUGUES','cookiewarning','Não use esta função em computadores públicos!\r\n');
INSERT INTO `judaslanguages2` VALUES (243,'PORTUGUES','username','Usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (244,'PORTUGUES','saveusername','Lembrar usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (245,'PORTUGUES','clearusername','Esquecer usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (246,'PORTUGUES','savepassword','Lembrar senha\r\n');
INSERT INTO `judaslanguages2` VALUES (247,'PORTUGUES','clearpassword','Esquecer senha\r\n');
INSERT INTO `judaslanguages2` VALUES (248,'PORTUGUES','signedoff','Você foi deslogado. Por favor digite seu usuário e senha para entrar novamente\r\n');
INSERT INTO `judaslanguages2` VALUES (249,'PORTUGUES','signedoffdue1','Você foi deslogado devido a\r\n');
INSERT INTO `judaslanguages2` VALUES (250,'PORTUGUES','signedoffdue2','minutos de inatividade\r\n');
INSERT INTO `judaslanguages2` VALUES (251,'PORTUGUES','sysmsg','O Administrador do sistema deixou uma mensagem para você\r\n');
INSERT INTO `judaslanguages2` VALUES (252,'PORTUGUES','pleaseenter','Por favor digite seu usuário e senha\r\n');
INSERT INTO `judaslanguages2` VALUES (253,'PORTUGUES','language','Língua\r\n');
INSERT INTO `judaslanguages2` VALUES (254,'PORTUGUES','pushpdf','Baixar resultados em arquivo PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (255,'PORTUGUES','managementheader','Bem-vindo a interface de usuário limitado. você está no sistema como\r\n');
INSERT INTO `judaslanguages2` VALUES (256,'PORTUGUES','oefm','Tarefas abertas para\r\n');
INSERT INTO `judaslanguages2` VALUES (257,'PORTUGUES','showresults','Método do Relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (258,'PORTUGUES','verbose','Verbose\r\n');
INSERT INTO `judaslanguages2` VALUES (259,'PORTUGUES','verbosewithcontents','Verbose com tópicos\r\n');
INSERT INTO `judaslanguages2` VALUES (260,'PORTUGUES','briefsum','Resumo rápido\r\n');
INSERT INTO `judaslanguages2` VALUES (261,'PORTUGUES','downloadsumpdf','Baixar resumo como arquivo PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (262,'PORTUGUES','downloadsumcsv','Baixar resumo em arquivo Excel\r\n');
INSERT INTO `judaslanguages2` VALUES (263,'PORTUGUES','packman','Administrar pacotes de linguagem\r\n');
INSERT INTO `judaslanguages2` VALUES (264,'PORTUGUES','openinnewwindow','Abrir em uma nova janela\r\n');
INSERT INTO `judaslanguages2` VALUES (265,'PORTUGUES','delcust','Deletar este usuário (<b>nenhuma</b> confirmação será pedida)\r\n');
INSERT INTO `judaslanguages2` VALUES (266,'PORTUGUES','nousers1','Não há donos / responsáveis configurados. Antes de começar a usar o CRM, você precisa adicionar pelo menos um. Clique em \\\'Donos/Responsáveis\\\' para adicionar possíveis donos ou responsáveis!\r\n');
INSERT INTO `judaslanguages2` VALUES (267,'PORTUGUES','custhomepage','Homepage\r\n');
INSERT INTO `judaslanguages2` VALUES (268,'PORTUGUES','custremarks','Remarcação\r\n');
INSERT INTO `judaslanguages2` VALUES (269,'PORTUGUES','customeraddress','Endereço do cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (270,'PORTUGUES','contactemail','E-mail para contato\r\n');
INSERT INTO `judaslanguages2` VALUES (271,'PORTUGUES','contactphone','Telefone para contato\r\n');
INSERT INTO `judaslanguages2` VALUES (272,'PORTUGUES','contact','Contato\r\n');
INSERT INTO `judaslanguages2` VALUES (273,'PORTUGUES','contacttitle','Título de contato (ex. Sr.)\r\n');
INSERT INTO `judaslanguages2` VALUES (274,'PORTUGUES','custdelexplain','Este cliente não pode ser deletado pois tem tarefas que pertencem a eles\r\n');
INSERT INTO `judaslanguages2` VALUES (275,'PORTUGUES','editextras','Editar valores extras\r\n');
INSERT INTO `judaslanguages2` VALUES (276,'PORTUGUES','fieldname','Nome\r\n');
INSERT INTO `judaslanguages2` VALUES (277,'PORTUGUES','iftynmvhpcysa','Se você acha que precisa de mais nomes aqui, por favor contate o administrador do seu CRM.\r\n');
INSERT INTO `judaslanguages2` VALUES (278,'PORTUGUES','extrafields','Campos extras\r\n');
INSERT INTO `judaslanguages2` VALUES (279,'PORTUGUES','uinw','Atualizar em nova janela\r\n');
INSERT INTO `judaslanguages2` VALUES (280,'PORTUGUES','nocustomers1','Não há clientes configurados. Antes de usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente!\r\n');
INSERT INTO `judaslanguages2` VALUES (281,'PORTUGUES','nousersandnocustomers1','Não há clientes nem possíveis Donos/Designados configurados. Antes que você possa usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente, e depois no menu \\\'Donos/Designados\\\' para adicionar pelo menos um pos');
INSERT INTO `judaslanguages2` VALUES (282,'PORTUGUES','managerepositories','Administrar repositores\r\n');
INSERT INTO `judaslanguages2` VALUES (283,'PORTUGUES','viewdelentities','Ver tarefas deletadas\r\n');
INSERT INTO `judaslanguages2` VALUES (284,'PORTUGUES','viewinsertedentities','Tarefas adicionadas\r\n');
INSERT INTO `judaslanguages2` VALUES (285,'PORTUGUES','readonly','Read-only\r\n');
INSERT INTO `judaslanguages2` VALUES (286,'PORTUGUES','customer','Cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (287,'PORTUGUES','owner','Dono\r\n');
INSERT INTO `judaslanguages2` VALUES (288,'PORTUGUES','entity','tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (289,'PORTUGUES','priority','Prioridade\r\n');
INSERT INTO `judaslanguages2` VALUES (290,'PORTUGUES','assignee','Responsável\r\n');
INSERT INTO `judaslanguages2` VALUES (291,'PORTUGUES','duedate','Para dia\r\n');
INSERT INTO `judaslanguages2` VALUES (292,'PORTUGUES','alarmdate','Data do Alarme\r\n');
INSERT INTO `judaslanguages2` VALUES (293,'PORTUGUES','alarmdatev','Criar alarme para esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (294,'PORTUGUES','category','Categoria\r\n');
INSERT INTO `judaslanguages2` VALUES (295,'PORTUGUES','status','Status\r\n');
INSERT INTO `judaslanguages2` VALUES (296,'PORTUGUES','helpcontents','Tópicos de ajuda\r\n');
INSERT INTO `judaslanguages2` VALUES (297,'PORTUGUES','tolimited','Devido a falta de privilégios você foi direcionado para uma tela limitada\r\n');
INSERT INTO `judaslanguages2` VALUES (298,'PORTUGUES','briefover','Relatório sobre a tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (299,'PORTUGUES','mightbebetter','Seria melhor você usar a opção de relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (300,'PORTUGUES','editthis','Edite esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (301,'PORTUGUES','alarmsettings','Opções do Alarme\r\n');
INSERT INTO `judaslanguages2` VALUES (302,'PORTUGUES','closethisentity','Fechar esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (303,'PORTUGUES','deletethisentity','Deletar esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (304,'PORTUGUES','downloadpdf','Baixar relatório em PDF sobre esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (305,'PORTUGUES','downloadpdfs','Baixar relatório em PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (306,'PORTUGUES','close','Fechar\r\n');
INSERT INTO `judaslanguages2` VALUES (307,'PORTUGUES','edit','Editar\r\n');
INSERT INTO `judaslanguages2` VALUES (308,'PORTUGUES','delete','Deletar\r\n');
INSERT INTO `judaslanguages2` VALUES (309,'PORTUGUES','pdfreport','Relatório em PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (310,'PORTUGUES','welcome1','Bem-vindo ao\r\n');
INSERT INTO `judaslanguages2` VALUES (311,'PORTUGUES','intro1','Esta ferramenta é usada para grava as dúvidas dos clientes. Agora eles são\r\n');
INSERT INTO `judaslanguages2` VALUES (312,'PORTUGUES','intro2','usuários registrados,<br>que no total são\r\n');
INSERT INTO `judaslanguages2` VALUES (313,'PORTUGUES','intro3','tarefas logadas, para\r\n');
INSERT INTO `judaslanguages2` VALUES (314,'PORTUGUES','intro4','clientes.\r\n');
INSERT INTO `judaslanguages2` VALUES (315,'PORTUGUES','welcome','Bem-vindo\r\n');
INSERT INTO `judaslanguages2` VALUES (316,'PORTUGUES','lastlogon','Última vez que logou\r\n');
INSERT INTO `judaslanguages2` VALUES (317,'PORTUGUES','entitiestoday','tarefas para hoje\r\n');
INSERT INTO `judaslanguages2` VALUES (318,'PORTUGUES','noentities','Não há nenhuma tarefa para hoje\r\n');
INSERT INTO `judaslanguages2` VALUES (319,'PORTUGUES','gotomainpage','Ir para a página principal\r\n');
INSERT INTO `judaslanguages2` VALUES (320,'PORTUGUES','main','Principal\r\n');
INSERT INTO `judaslanguages2` VALUES (321,'PORTUGUES','addcusttodb','Adicionar o pedido do cliente na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (322,'PORTUGUES','add','Adicionar\r\n');
INSERT INTO `judaslanguages2` VALUES (323,'PORTUGUES','viewbrief','Ver um relatório das tarefas gravadas na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (324,'PORTUGUES','entities','Tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (325,'PORTUGUES','brieflistdel','Ver um relatório das tarefas apagadas da base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (326,'PORTUGUES','delentities','Deletar tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (327,'PORTUGUES','vacoa','Ver, adicionar ou mudar possíveis donos ou Responsávels\r\n');
INSERT INTO `judaslanguages2` VALUES (328,'PORTUGUES','oa','Donos/Responsávels\r\n');
INSERT INTO `judaslanguages2` VALUES (329,'PORTUGUES','vacc','Ver, adicionar ou modificar clientes\r\n');
INSERT INTO `judaslanguages2` VALUES (330,'PORTUGUES','customers','Clientes\r\n');
INSERT INTO `judaslanguages2` VALUES (331,'PORTUGUES','dumpi','Eliminar as vírgulas para exportar os dados da base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (332,'PORTUGUES','phonebook1','Agenda de Telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (333,'PORTUGUES','phonebookshort','AT\r\n');
INSERT INTO `judaslanguages2` VALUES (334,'PORTUGUES','sumverb','Ver e imprimir relatórios mais avançados\r\n');
INSERT INTO `judaslanguages2` VALUES (335,'PORTUGUES','summary','Relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (336,'PORTUGUES','logout','Sair\r\n');
INSERT INTO `judaslanguages2` VALUES (337,'PORTUGUES','maninfo','Informações de Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (338,'PORTUGUES','maninfoverb','Relatórios de estatísticas para Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (339,'PORTUGUES','sitestats','Estatísticas do site\r\n');
INSERT INTO `judaslanguages2` VALUES (340,'PORTUGUES','sitestatsverb','As estatísticas deste site\r\n');
INSERT INTO `judaslanguages2` VALUES (341,'PORTUGUES','administration','Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (342,'PORTUGUES','administrationverb','Funçoes de Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (343,'PORTUGUES','helpcontentsverb','Mostrar lista de conteúdo da ajuda\r\n');
INSERT INTO `judaslanguages2` VALUES (344,'PORTUGUES','dateinvalid','A data que você escolhe é inválida.n A data não foi escolhida.\r\n');
INSERT INTO `judaslanguages2` VALUES (345,'PORTUGUES','entrysaved','Digitar número do pedido\r\n');
INSERT INTO `judaslanguages2` VALUES (346,'PORTUGUES','wasadded','foi adicionado.\r\n');
INSERT INTO `judaslanguages2` VALUES (347,'PORTUGUES','deleting1','Deletando\r\n');
INSERT INTO `judaslanguages2` VALUES (348,'PORTUGUES','deleting2','arquivo(s). Aperte o botão abaixo para confirmar.\r\n');
INSERT INTO `judaslanguages2` VALUES (349,'PORTUGUES','confdel','Confirme deletagem\r\n');
INSERT INTO `judaslanguages2` VALUES (350,'PORTUGUES','deletingentity','Deletando tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (351,'PORTUGUES','ownedby','pertence à\r\n');
INSERT INTO `judaslanguages2` VALUES (352,'PORTUGUES','assignedto','Responsável para\r\n');
INSERT INTO `judaslanguages2` VALUES (353,'PORTUGUES','curstat','Status atual\r\n');
INSERT INTO `judaslanguages2` VALUES (354,'PORTUGUES','created','criado\r\n');
INSERT INTO `judaslanguages2` VALUES (355,'PORTUGUES','lastupdate','última atualização\r\n');
INSERT INTO `judaslanguages2` VALUES (356,'PORTUGUES','deleteerror','Você não pode deletar esta tarefa pois ela não foi terminada\r\n');
INSERT INTO `judaslanguages2` VALUES (357,'PORTUGUES','confirmdel','Clique aqui para deletar esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (358,'PORTUGUES','search','Procura\r\n');
INSERT INTO `judaslanguages2` VALUES (359,'PORTUGUES','thereare','São\r\n');
INSERT INTO `judaslanguages2` VALUES (360,'PORTUGUES','openentities','Abrir tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (361,'PORTUGUES','noopen','Não há tarefas abertas.\r\n');
INSERT INTO `judaslanguages2` VALUES (362,'PORTUGUES','nonexistent','Você digitou um número de tarefa que não existe!\r\n');
INSERT INTO `judaslanguages2` VALUES (363,'PORTUGUES','editing','Editando\r\n');
INSERT INTO `judaslanguages2` VALUES (364,'PORTUGUES','wasclosed','Esta tarefa foi fechada\r\n');
INSERT INTO `judaslanguages2` VALUES (365,'PORTUGUES','newentity','Nova tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (366,'PORTUGUES','isdeleted','Esta é uma tarefa deletada\r\n');
INSERT INTO `judaslanguages2` VALUES (367,'PORTUGUES','iswaiting','Aguardando outra pessoa\r\n');
INSERT INTO `judaslanguages2` VALUES (368,'PORTUGUES','doesntbelonghere','Esta tarefa não pertence a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (369,'PORTUGUES','listofatt','Listar arquivos anexados a esta tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (370,'PORTUGUES','filename','Nome do arquivo\r\n');
INSERT INTO `judaslanguages2` VALUES (371,'PORTUGUES','filesize','Tamanho\r\n');
INSERT INTO `judaslanguages2` VALUES (372,'PORTUGUES','creationdate','Data de criação\r\n');
INSERT INTO `judaslanguages2` VALUES (373,'PORTUGUES','deletefile','Deletar\r\n');
INSERT INTO `judaslanguages2` VALUES (374,'PORTUGUES','attachfile','Anexar arquivo\r\n');
INSERT INTO `judaslanguages2` VALUES (375,'PORTUGUES','saveclose','Salvar e Fechar\r\n');
INSERT INTO `judaslanguages2` VALUES (376,'PORTUGUES','cancel','Cancelar\r\n');
INSERT INTO `judaslanguages2` VALUES (377,'PORTUGUES','save','Salvar para base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (378,'PORTUGUES','noaction','Erro, nenhuma ação escolhida\r\n');
INSERT INTO `judaslanguages2` VALUES (379,'PORTUGUES','zailo','falta zero consignados\r\n');
INSERT INTO `judaslanguages2` VALUES (380,'PORTUGUES','name','Nome\r\n');
INSERT INTO `judaslanguages2` VALUES (381,'PORTUGUES','usrwarning','Se uma caixa está desabilitada (cinza), significa que seu dono ou responsável possui uma conta limitada, e portanto o nome não pode ser mudado<br>ou os dados podem ser perdidos.\r\n');
INSERT INTO `judaslanguages2` VALUES (382,'PORTUGUES','ownassindb','Donos os responsáveis na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (383,'PORTUGUES','addownass','Adicionar dono/responsável\r\n');
INSERT INTO `judaslanguages2` VALUES (384,'PORTUGUES','apply','Aplicar alterações\r\n');
INSERT INTO `judaslanguages2` VALUES (385,'PORTUGUES','custindb','Clientes na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (386,'PORTUGUES','addcust','Adicionar um cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (387,'PORTUGUES','selectfields','Por favor selecionar os campos que deseja exportar\r\n');
INSERT INTO `judaslanguages2` VALUES (388,'PORTUGUES','lastupdatedate','Data da última atualização\r\n');
INSERT INTO `judaslanguages2` VALUES (389,'PORTUGUES','lastupdatetime','Hora da última atualização\r\n');
INSERT INTO `judaslanguages2` VALUES (390,'PORTUGUES','closedate','Data de fechamento\r\n');
INSERT INTO `judaslanguages2` VALUES (391,'PORTUGUES','waitingcsv','Aguardando\r\n');
INSERT INTO `judaslanguages2` VALUES (392,'PORTUGUES','doesntcsv','Não pertence a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (393,'PORTUGUES','contents','Conteúdo\r\n');
INSERT INTO `judaslanguages2` VALUES (394,'PORTUGUES','alreadyselected','<b>Sua requisição foi gravada</b>\r\n');
INSERT INTO `judaslanguages2` VALUES (395,'PORTUGUES','sep','Separação com caracteres\r\n');
INSERT INTO `judaslanguages2` VALUES (396,'PORTUGUES','scqp','Separado por ponto-vírgula (;) (recomendado)\r\n');
INSERT INTO `judaslanguages2` VALUES (397,'PORTUGUES','cqp','Separado com dois pontos (:)\r\n');
INSERT INTO `judaslanguages2` VALUES (398,'PORTUGUES','kqp','Separado com vírgula (,)\r\n');
INSERT INTO `judaslanguages2` VALUES (399,'PORTUGUES','csvwarning','Quando a caixa de download aparecer, seleciona \\\'Abrir o arquivo no local atual\\\'.<br> Talvez a mesma janela reapareça, se aparecer clique em \\\"Abrir\\\" novamente. Isto deve abrir seu Excel <br>com os dados exportados.\r\n');
INSERT INTO `judaslanguages2` VALUES (400,'PORTUGUES','downloadexport','Baixar arquivo exportado\r\n');
INSERT INTO `judaslanguages2` VALUES (401,'PORTUGUES','repdownloaded','Relotório foi baixado\r\n');
INSERT INTO `judaslanguages2` VALUES (402,'PORTUGUES','endofreport','Fim do relatório. Tenha um ótimo dia :)\r\n');
INSERT INTO `judaslanguages2` VALUES (403,'PORTUGUES','noresults','Seu pedido não obteve nenhum resultado.\r\n');
INSERT INTO `judaslanguages2` VALUES (404,'PORTUGUES','entitiesfound','tarefas encontradas.\r\n');
INSERT INTO `judaslanguages2` VALUES (405,'PORTUGUES','pbexport','exportar agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (406,'PORTUGUES','endofpbexport','<red> -- Fim do Relatório --\r\n');
INSERT INTO `judaslanguages2` VALUES (407,'PORTUGUES','pbexpmade','Arquivo de exportação da agenda de telefones criado\r\n');
INSERT INTO `judaslanguages2` VALUES (408,'PORTUGUES','wasdeleted','foi deletado\r\n');
INSERT INTO `judaslanguages2` VALUES (409,'PORTUGUES','pbdelconf','a que deseja apagar esta gravação?\r\n');
INSERT INTO `judaslanguages2` VALUES (410,'PORTUGUES','fname','Primeiro nome\r\n');
INSERT INTO `judaslanguages2` VALUES (411,'PORTUGUES','lname','Sobrenome\r\n');
INSERT INTO `judaslanguages2` VALUES (412,'PORTUGUES','tel','Telefone\r\n');
INSERT INTO `judaslanguages2` VALUES (413,'PORTUGUES','company','Empresa\r\n');
INSERT INTO `judaslanguages2` VALUES (414,'PORTUGUES','dep','Departamento\r\n');
INSERT INTO `judaslanguages2` VALUES (415,'PORTUGUES','title','Título\r\n');
INSERT INTO `judaslanguages2` VALUES (416,'PORTUGUES','room','Quarto\r\n');
INSERT INTO `judaslanguages2` VALUES (417,'PORTUGUES','deletepb','Deletar\r\n');
INSERT INTO `judaslanguages2` VALUES (418,'PORTUGUES','pbrecadded','Seu contato foi adicionado na agenda de telefones.\r\n');
INSERT INTO `judaslanguages2` VALUES (419,'PORTUGUES','pbapp','Suas alterações foram aplicadas.\r\n');
INSERT INTO `judaslanguages2` VALUES (420,'PORTUGUES','pbwarning','Por favor preencha pelo menos o sobrenome!\r\n');
INSERT INTO `judaslanguages2` VALUES (421,'PORTUGUES','addtopb','Adicionar a agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (422,'PORTUGUES','pbresults','Resultados para sua pesquisa\r\n');
INSERT INTO `judaslanguages2` VALUES (423,'PORTUGUES','options','Opções\r\n');
INSERT INTO `judaslanguages2` VALUES (424,'PORTUGUES','resfound','resultados encontrados\r\n');
INSERT INTO `judaslanguages2` VALUES (425,'PORTUGUES','pbcont1','Esta agenda de telefones contém\r\n');
INSERT INTO `judaslanguages2` VALUES (426,'PORTUGUES','pbcont2','contatos\r\n');
INSERT INTO `judaslanguages2` VALUES (427,'PORTUGUES','pbaddrec','adicionar contato\r\n');
INSERT INTO `judaslanguages2` VALUES (428,'PORTUGUES','entsum','Relatório de tarefas\r\n');
INSERT INTO `judaslanguages2` VALUES (429,'PORTUGUES','showonly','Mostra apenas\r\n');
INSERT INTO `judaslanguages2` VALUES (430,'PORTUGUES','all','Tudo\r\n');
INSERT INTO `judaslanguages2` VALUES (431,'PORTUGUES','inccont','Adicionar comentários a tarefa\r\n');
INSERT INTO `judaslanguages2` VALUES (432,'PORTUGUES','incldel','Incluir tarefas excluidas\r\n');
INSERT INTO `judaslanguages2` VALUES (433,'PORTUGUES','dlacsv','Baixar resultado como CSV\r\n');
INSERT INTO `judaslanguages2` VALUES (434,'PORTUGUES','briefo','Dados resumidos\r\n');
INSERT INTO `judaslanguages2` VALUES (435,'PORTUGUES','mustcontain','Tarefa deve conter texto\r\n');
INSERT INTO `judaslanguages2` VALUES (436,'PORTUGUES','please','Por favor faça sua escolha...\r\n');
INSERT INTO `judaslanguages2` VALUES (437,'PORTUGUES','remarks','Remarcar\r\n');
INSERT INTO `judaslanguages2` VALUES (438,'PORTUGUES','hasfilessum','Esta tarefa possui arquivos anexados\r\n');
INSERT INTO `judaslanguages2` VALUES (439,'PORTUGUES','expired','A data de realização desta tarefa expirou!\r\n');
INSERT INTO `judaslanguages2` VALUES (440,'PORTUGUES','thisiswaiting','Esta tarefa está aguardando ação de outra pessoa.\r\n');
INSERT INTO `judaslanguages2` VALUES (441,'PORTUGUES','thisdoesntbelong','Este tarefa realmente não pertence a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (442,'PORTUGUES','clear','limpar\r\n');
INSERT INTO `judaslanguages2` VALUES (443,'PORTUGUES','wrongpwd','Senha incorreta. Por favor tente novamente ou se mande\r\n');
INSERT INTO `judaslanguages2` VALUES (444,'PORTUGUES','havetoenterpwd','Visto que sua conta não possui privilégios de administrador, você terá que colocar a senha de administrador\r\n');
INSERT INTO `judaslanguages2` VALUES (445,'PORTUGUES','adm','Administração\r\n');
INSERT INTO `judaslanguages2` VALUES (446,'PORTUGUES','nopwd','Visto que sua conta tem privilégios de administrador, a senha para o mesmo não foi pedida.\r\n');
INSERT INTO `judaslanguages2` VALUES (447,'PORTUGUES','imported','print \\\"Foram $imported gravaçoes importadas.\\\";\r\n');
INSERT INTO `judaslanguages2` VALUES (448,'PORTUGUES','ignored','gravaçoes foram ignoradas por conter um campo vazio.\r\n');
INSERT INTO `judaslanguages2` VALUES (449,'PORTUGUES','impwarning','Para impedir que uma gravação seja importada, esvazie o campo \\\"Nome\\\". Corrija os que estiverem errados.\r\n');
INSERT INTO `judaslanguages2` VALUES (450,'PORTUGUES','commawarning','Visto que você escolheu importar um arquivo separado por vírgulas, fique atento com combinações do tipo sobrenome, nome (que são comuns no Outlook) que podem produzir efeitos indesejados.\r\n');
INSERT INTO `judaslanguages2` VALUES (451,'PORTUGUES','importinpb','Importar dados da agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (452,'PORTUGUES','pbimpwarning','As informações CSV que você colou <i>devem</i> conter todos campos, contudo eles podem ser vazios:\r\n');
INSERT INTO `judaslanguages2` VALUES (453,'PORTUGUES','paste','Cole seu texto aqui ...\r\n');
INSERT INTO `judaslanguages2` VALUES (454,'PORTUGUES','pleasechoose','Por favor selecione uma das opções abaixo:\r\n');
INSERT INTO `judaslanguages2` VALUES (455,'PORTUGUES','chgsys','Trocar valores do sistema\r\n');
INSERT INTO `judaslanguages2` VALUES (456,'PORTUGUES','impphone','Importar dadso da agenda de telefones\r\n');
INSERT INTO `judaslanguages2` VALUES (457,'PORTUGUES','viewfiles','Ver arquivos na base de dados\r\n');
INSERT INTO `judaslanguages2` VALUES (458,'PORTUGUES','delallclosed','Deletar todas as tarefas concluídas\r\n');
INSERT INTO `judaslanguages2` VALUES (459,'PORTUGUES','eahelp','Adicionar/Editar tópicos de ajuda\r\n');
INSERT INTO `judaslanguages2` VALUES (460,'PORTUGUES','physdel','Deletar fisicamente uma tarefa deletada\r\n');
INSERT INTO `judaslanguages2` VALUES (461,'PORTUGUES','viewlog','Ver logs e estatísticas\r\n');
INSERT INTO `judaslanguages2` VALUES (462,'PORTUGUES','manacc','Administrar contas\r\n');
INSERT INTO `judaslanguages2` VALUES (463,'PORTUGUES','isdel','foi deletado\r\n');
INSERT INTO `judaslanguages2` VALUES (464,'PORTUGUES','delfile','Deletando arquivo fisicamente\r\n');
INSERT INTO `judaslanguages2` VALUES (465,'PORTUGUES','physdelwarning','Por favor digite o ID da tarefa<b>fechada e deletada</b> que você quer <b>fisicamente</b> deletar:\r\n');
INSERT INTO `judaslanguages2` VALUES (466,'PORTUGUES','confphysdel','Clique no botão abaixo para confirmar deletação física.\r\n');
INSERT INTO `judaslanguages2` VALUES (467,'PORTUGUES','addhelp','Adicionar opção de ajuda:\r\n');
INSERT INTO `judaslanguages2` VALUES (468,'PORTUGUES','editaccount','Editar uma conta\r\n');
INSERT INTO `judaslanguages2` VALUES (469,'PORTUGUES','addaccount','Adicionar uma conta\r\n');
INSERT INTO `judaslanguages2` VALUES (470,'PORTUGUES','password','Senha\r\n');
INSERT INTO `judaslanguages2` VALUES (471,'PORTUGUES','addu','Adicionar Usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (472,'PORTUGUES','btmap','Voltar para a página principal do Administrador\r\n');
INSERT INTO `judaslanguages2` VALUES (473,'PORTUGUES','passwarn','deixe os dois campos em branco para manter a senha atual\r\n');
INSERT INTO `judaslanguages2` VALUES (474,'PORTUGUES','limited','Limitado\r\n');
INSERT INTO `judaslanguages2` VALUES (475,'PORTUGUES','normal','Normal\r\n');
INSERT INTO `judaslanguages2` VALUES (476,'PORTUGUES','adminrights','Administrador\r\n');
INSERT INTO `judaslanguages2` VALUES (477,'PORTUGUES','yes','Sim\r\n');
INSERT INTO `judaslanguages2` VALUES (478,'PORTUGUES','no','Não\r\n');
INSERT INTO `judaslanguages2` VALUES (479,'PORTUGUES','ela','Editando conta de login\r\n');
INSERT INTO `judaslanguages2` VALUES (480,'PORTUGUES','dta','Deletar esta conta\r\n');
INSERT INTO `judaslanguages2` VALUES (481,'PORTUGUES','passmatcherror','Senha não confere. Pressione \\\'voltar\\\' no seu navegador e tente novamente.\r\n');
INSERT INTO `judaslanguages2` VALUES (482,'PORTUGUES','nimut','Ocorreu um erro!<br><br>Esta conta existe, mas ela<br>não se refere a nenhum usuário na base de dados para o qual possam ser designadas tarefas.<br><br>Verifique o nome tente novamente.\r\n');
INSERT INTO `judaslanguages2` VALUES (483,'PORTUGUES','uwchala','Usuários que podem ter conta limitada\r\n');
INSERT INTO `judaslanguages2` VALUES (484,'PORTUGUES','tawu','A conta foi atualizada\r\n');
INSERT INTO `judaslanguages2` VALUES (485,'PORTUGUES','setting','Configurações\r\n');
INSERT INTO `judaslanguages2` VALUES (486,'PORTUGUES','value','Valores\r\n');
INSERT INTO `judaslanguages2` VALUES (487,'PORTUGUES','discription','Descrição\r\n');
INSERT INTO `judaslanguages2` VALUES (488,'PORTUGUES','ocsvifb','Ou troque os valores do sistema no formulário abaixo\r\n');
INSERT INTO `judaslanguages2` VALUES (489,'PORTUGUES','csvnow','Troque os valores do sistema\r\n');
INSERT INTO `judaslanguages2` VALUES (490,'PORTUGUES','plzenterpwd','Por favor digite a senha\r\n');
INSERT INTO `judaslanguages2` VALUES (491,'PORTUGUES','eor','Fim do relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (492,'PORTUGUES','smtsm','Selecione mais para ver mais...\r\n');
INSERT INTO `judaslanguages2` VALUES (493,'PORTUGUES','dlmspdf','ou clique aqui para baixar (mais compacto) um relatório em PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (494,'PORTUGUES','sts','Resumos a mostrar\r\n');
INSERT INTO `judaslanguages2` VALUES (495,'PORTUGUES','oqs','Relatório Geral Resumido\r\n');
INSERT INTO `judaslanguages2` VALUES (496,'PORTUGUES','eobu','Tarefas possuidas por usuários\r\n');
INSERT INTO `judaslanguages2` VALUES (497,'PORTUGUES','eatu','Tarefas com usuários responsáveis\r\n');
INSERT INTO `judaslanguages2` VALUES (498,'PORTUGUES','sae','Tarefas designadas para o mesmo usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (499,'PORTUGUES','etdbh','Tarefas que não pertencem a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (500,'PORTUGUES','ewfsea','Tarefas aguardando ação de outra pessoa\r\n');
INSERT INTO `judaslanguages2` VALUES (501,'PORTUGUES','epc','Tarefas por Cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (502,'PORTUGUES','oepa','Tarefas expiradas, por usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (503,'PORTUGUES','deleted','Deletado\r\n');
INSERT INTO `judaslanguages2` VALUES (504,'PORTUGUES','total','Total\r\n');
INSERT INTO `judaslanguages2` VALUES (505,'PORTUGUES','ofwhich','das quais\r\n');
INSERT INTO `judaslanguages2` VALUES (506,'PORTUGUES','allround','Todos valores sõa aproximados\r\n');
INSERT INTO `judaslanguages2` VALUES (507,'PORTUGUES','atac','ou muito aproximados\r\n');
INSERT INTO `judaslanguages2` VALUES (508,'PORTUGUES','edd','Datas de expiração\r\n');
INSERT INTO `judaslanguages2` VALUES (509,'PORTUGUES','dontbelonghere','Tarefas que não pertencem a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (510,'PORTUGUES','eatw','Tarefas adicionadas esta semana\r\n');
INSERT INTO `judaslanguages2` VALUES (511,'PORTUGUES','ectw','Tarefas concluídas esta semana\r\n');
INSERT INTO `judaslanguages2` VALUES (512,'PORTUGUES','eatm','Tarefas adicionadas neste mês\r\n');
INSERT INTO `judaslanguages2` VALUES (513,'PORTUGUES','ectm','Tarefas concluídas neste mês\r\n');
INSERT INTO `judaslanguages2` VALUES (514,'PORTUGUES','of','De\r\n');
INSERT INTO `judaslanguages2` VALUES (515,'PORTUGUES','tad','tarefas contadas, uma média total \\\'de realização\\\' desde a adição de uma tarefa até seu fechamento\r\n');
INSERT INTO `judaslanguages2` VALUES (516,'PORTUGUES','cuaeoay','Contados usando <u>todas</u> tarefas concluídas da base de dados, ao longo de <u>todos</u> os anos\r\n');
INSERT INTO `judaslanguages2` VALUES (517,'PORTUGUES','users','Usuários\r\n');
INSERT INTO `judaslanguages2` VALUES (518,'PORTUGUES','customers','Clientes\r\n');
INSERT INTO `judaslanguages2` VALUES (519,'PORTUGUES','zoilo','zero donos estão faltando\r\n');
INSERT INTO `judaslanguages2` VALUES (520,'PORTUGUES','ombla','Ou : ou talvez tarefas que não tem responsáveis ou não foram designadas(...)\r\n');
INSERT INTO `judaslanguages2` VALUES (521,'PORTUGUES','andassignee','e designadas\r\n');
INSERT INTO `judaslanguages2` VALUES (522,'PORTUGUES','selfassig','Auto-Designadas\r\n');
INSERT INTO `judaslanguages2` VALUES (523,'PORTUGUES','aohnsae','Outros donos não possuem tarefas auto-designadas.\r\n');
INSERT INTO `judaslanguages2` VALUES (524,'PORTUGUES','onavarage','Em média\r\n');
INSERT INTO `judaslanguages2` VALUES (525,'PORTUGUES','oaoedbh','de todas tarefas <b>abertas</b> não pertencem a este local\r\n');
INSERT INTO `judaslanguages2` VALUES (526,'PORTUGUES','teaair','A tarefa e todas as sua anotações foram fisicamente deletadas\r\n');
INSERT INTO `judaslanguages2` VALUES (527,'PORTUGUES','cookiewarning','Não use esta função em computadores públicos!\r\n');
INSERT INTO `judaslanguages2` VALUES (528,'PORTUGUES','username','Usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (529,'PORTUGUES','saveusername','Lembrar usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (530,'PORTUGUES','clearusername','Esquecer usuário\r\n');
INSERT INTO `judaslanguages2` VALUES (531,'PORTUGUES','savepassword','Lembrar senha\r\n');
INSERT INTO `judaslanguages2` VALUES (532,'PORTUGUES','clearpassword','Esquecer senha\r\n');
INSERT INTO `judaslanguages2` VALUES (533,'PORTUGUES','signedoff','Você foi deslogado. Por favor digite seu usuário e senha para entrar novamente\r\n');
INSERT INTO `judaslanguages2` VALUES (534,'PORTUGUES','signedoffdue1','Você foi deslogado devido a\r\n');
INSERT INTO `judaslanguages2` VALUES (535,'PORTUGUES','signedoffdue2','minutos de inatividade\r\n');
INSERT INTO `judaslanguages2` VALUES (536,'PORTUGUES','sysmsg','O Administrador do sistema deixou uma mensagem para você\r\n');
INSERT INTO `judaslanguages2` VALUES (537,'PORTUGUES','pleaseenter','Por favor digite seu usuário e senha\r\n');
INSERT INTO `judaslanguages2` VALUES (538,'PORTUGUES','language','Língua\r\n');
INSERT INTO `judaslanguages2` VALUES (539,'PORTUGUES','pushpdf','Baixar resultados em arquivo PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (540,'PORTUGUES','managementheader','Bem-vindo a interface de usuário limitado. você está no sistema como\r\n');
INSERT INTO `judaslanguages2` VALUES (541,'PORTUGUES','oefm','Tarefas abertas para\r\n');
INSERT INTO `judaslanguages2` VALUES (542,'PORTUGUES','showresults','Método do Relatório\r\n');
INSERT INTO `judaslanguages2` VALUES (543,'PORTUGUES','verbose','Verbose\r\n');
INSERT INTO `judaslanguages2` VALUES (544,'PORTUGUES','verbosewithcontents','Verbose com tópicos\r\n');
INSERT INTO `judaslanguages2` VALUES (545,'PORTUGUES','briefsum','Resumo rápido\r\n');
INSERT INTO `judaslanguages2` VALUES (546,'PORTUGUES','downloadsumpdf','Baixar resumo como arquivo PDF\r\n');
INSERT INTO `judaslanguages2` VALUES (547,'PORTUGUES','downloadsumcsv','Baixar resumo em arquivo Excel\r\n');
INSERT INTO `judaslanguages2` VALUES (548,'PORTUGUES','packman','Administrar pacotes de linguagem\r\n');
INSERT INTO `judaslanguages2` VALUES (549,'PORTUGUES','openinnewwindow','Abrir em uma nova janela\r\n');
INSERT INTO `judaslanguages2` VALUES (550,'PORTUGUES','delcust','Deletar este usuário (<b>nenhuma</b> confirmação será pedida)\r\n');
INSERT INTO `judaslanguages2` VALUES (551,'PORTUGUES','nousers1','Não há donos / responsáveis configurados. Antes de começar a usar o CRM, você precisa adicionar pelo menos um. Clique em \\\'Donos/Responsáveis\\\' para adicionar possíveis donos ou responsáveis!\r\n');
INSERT INTO `judaslanguages2` VALUES (552,'PORTUGUES','custhomepage','Homepage\r\n');
INSERT INTO `judaslanguages2` VALUES (553,'PORTUGUES','custremarks','Remarcação\r\n');
INSERT INTO `judaslanguages2` VALUES (554,'PORTUGUES','customeraddress','Endereço do cliente\r\n');
INSERT INTO `judaslanguages2` VALUES (555,'PORTUGUES','contactemail','E-mail para contato\r\n');
INSERT INTO `judaslanguages2` VALUES (556,'PORTUGUES','contactphone','Telefone para contato\r\n');
INSERT INTO `judaslanguages2` VALUES (557,'PORTUGUES','contact','Contato\r\n');
INSERT INTO `judaslanguages2` VALUES (558,'PORTUGUES','contacttitle','Título de contato (ex. Sr.)\r\n');
INSERT INTO `judaslanguages2` VALUES (559,'PORTUGUES','custdelexplain','Este cliente não pode ser deletado pois tem tarefas que pertencem a eles\r\n');
INSERT INTO `judaslanguages2` VALUES (560,'PORTUGUES','editextras','Editar valores extras\r\n');
INSERT INTO `judaslanguages2` VALUES (561,'PORTUGUES','fieldname','Nome\r\n');
INSERT INTO `judaslanguages2` VALUES (562,'PORTUGUES','iftynmvhpcysa','Se você acha que precisa de mais nomes aqui, por favor contate o administrador do seu CRM.\r\n');
INSERT INTO `judaslanguages2` VALUES (563,'PORTUGUES','extrafields','Campos extras\r\n');
INSERT INTO `judaslanguages2` VALUES (564,'PORTUGUES','uinw','Atualizar em nova janela\r\n');
INSERT INTO `judaslanguages2` VALUES (565,'PORTUGUES','nocustomers1','Não há clientes configurados. Antes de usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente!\r\n');
INSERT INTO `judaslanguages2` VALUES (566,'PORTUGUES','nousersandnocustomers1','Não há clientes nem possíveis Donos/Designados configurados. Antes que você possa usar o CRM, você precisa fazer isto. Clique no menu \\\'Clientes\\\' para adicionar pelo menos um cliente, e depois no menu \\\'Donos/Designados\\\' para adicionar pelo menos um pos');
INSERT INTO `judaslanguages2` VALUES (567,'PORTUGUES','managerepositories','Administrar repositores\r\n');
INSERT INTO `judaslanguages2` VALUES (568,'ENGLISH','stillchecked1','This file is still locked for editing by');
INSERT INTO `judaslanguages2` VALUES (569,'ENGLISH','stillchecked2','. Please stop editing this file before trying to check it in.');
INSERT INTO `judaslanguages2` VALUES (570,'ENGLISH','saveasnewentity','Save as new entity');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='CRM User definition table';

#
# Dumping data for table judasloginusers
#

INSERT INTO `judasloginusers` VALUES (1,'Mandry','*DE27BD740D89619B37ACC7F7A5E298B6F6F7B90A','','normal','yes','','n','Administrator Mandry','','rw','yes','','','No','n','n','','','','','','','','','','','','','','','');

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
# Dumping data for table judasphonebook
#


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
# Dumping data for table judaspriorityvars
#

INSERT INTO `judaspriorityvars` VALUES (1,'Urgente','#FF6666');
INSERT INTO `judaspriorityvars` VALUES (2,'Prioridade Alta','#FFFF66');
INSERT INTO `judaspriorityvars` VALUES (3,'Prioridade Média','#FFFF99');
INSERT INTO `judaspriorityvars` VALUES (4,'Prioridade Baixa','#FFFFCC');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='CRM Session table';

#
# Dumping data for table judassessions
#

INSERT INTO `judassessions` VALUES (2,'Mandry','0fadfb5ff0c8c0b03d27dc3922c5fbc9','yes','1170869401','n');

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
# Dumping data for table judassettings
#

INSERT INTO `judassettings` VALUES (1,'title','Grupo Vanguarda - OSTI','2002-05-20 18:43:01','Will appear almost anywhere.');
INSERT INTO `judassettings` VALUES (4,'admpassword','*NONE*','2002-05-20 16:20:29','Administration password, *NONE* disables the authentication at all.');
INSERT INTO `judassettings` VALUES (5,'mipassword','*NONE*','2002-05-20 18:41:55','Management Information password, *NONE* disables the authentication at all.');
INSERT INTO `judassettings` VALUES (6,'managementinterface','Off','2002-05-20 21:03:25','When set to \'on\', users authenticated as a limited user will only see the restricted managementinterface with very limited priviledges. Opposite to \'on\' is \'off\'.');
INSERT INTO `judassettings` VALUES (7,'admemail','mandry@casadaweb.net','2002-05-20 14:00:33','The administrators email-addres.');
INSERT INTO `judassettings` VALUES (8,'cronpassword','','2002-05-20 18:06:54','The password used by the HTTP-GET crond job (duedate-notify-cron.php)');
INSERT INTO `judassettings` VALUES (9,'timeout','20','0000-00-00 00:00:00','Number of minutes before a user is automatically logged off when there is no activity');
INSERT INTO `judassettings` VALUES (10,'Logon message','','2007-02-07 14:19:31','This message will be displayed when a user logs in.');
INSERT INTO `judassettings` VALUES (11,'navtype','TABS','2007-02-07 14:19:31','Navigation bar type. Use NOTABS for normal navigation, anything else for tabs');
INSERT INTO `judassettings` VALUES (12,'langoverride','No','2007-02-07 14:19:31','Language override. No to let the user be able to choose his or her own language, yes to disable this feature and thereby force the use of the system-wide language choosen hereunder.');
INSERT INTO `judassettings` VALUES (13,'EmailNewEntities','','2007-02-07 14:19:31','The e-mail address to which notifications of added entities should be mailed. Leave empty for no notification.');
INSERT INTO `judassettings` VALUES (14,'MonthsToShow','7','2007-02-07 14:19:31','The number of months to show in the various calendar appearances.');
INSERT INTO `judassettings` VALUES (15,'ShowDeletedViewOption','No','2007-02-07 14:19:31','Wheter or not CRM-CTT should display a menu tab to view the deleted entities. Options are yes or no.');
INSERT INTO `judassettings` VALUES (16,'EnableCustInsert','No','2007-02-07 14:19:31','Set this to yes to enable the [customer] insert functionality, no to keep customers from logging in even if they have a customer account.');
INSERT INTO `judassettings` VALUES (17,'SMTPserver','localhost','2007-02-07 14:19:31','The hostname or IP-address of your SMTP (outgoing mail) server');
INSERT INTO `judassettings` VALUES (18,'BODY_DUEDATE','<BODY><FONT FACE=\"MS Shell Dlg\" SIZE=\"2\"><B>An alarm date of one of your entities has been reached.</B><BR><BR>This email is concerning entity @ENTITYID@, @CATEGORY@<BR><BR><BR>The history of this entity is printed below.<br>If this email was not intended for you, please contact owner @OWNER@ or assignee @ASSIGNEE@.<BR><BR>History:<BR><BR><TABLE BORDER=1><TR><TD>@CONTENTS@.</TD></TR></TABLE><BR><BR>If you do nothing, you will <I>not</I> be reminded about this entity again.<BR><BR>End of this e-mail.<BR><TABLE><TR><TD>Entity:</TD><TD>@ENTITYID@</TD></TR><TR><TD>Category:</TD><TD>@CATEGORY@</TD></TR><TR><TD>Owner:</TD><TD>@OWNER@</TD></TR><TR><TD>Assignee:</TD><TD>@ASSIGNEE@</TD></TR><TR><TD>Contents:</TD><TD>See attachment</TD></TR><TR><TD>Admin email:</TD><TD>@ADMINEMAIL@</TD></TR><TR><TD>Webhost:</TD><TD>@WEBHOST@</TD></TR><TR><TD>Title:</TD><TD>@TITLE@</TD></TR><TR><TD>Customer:</TD><TD>@CUSTOMER@</TD></TR><TR><TD>Due-date:</TD><TD>@DUEDATE@</TD></TR><TR><TD>Status:</TD><TD>@STATUS@</TD></TR><TR><TD>Priority:</TD><TD>@PRIORITY@</TD></TR></TABLE></FONT></BODY>','2007-02-07 14:19:31','The body of the email which will be sent to an assignee when an alarm date of a certain entity is met. Please read the manual before editing this setting.');
INSERT INTO `judassettings` VALUES (19,'BODY_ENTITY_ADD','<BODY><FONT FACE=\"MS Shell Dlg\" SIZE=\"2\"><B>A new entity was added to repository \"@TITLE@\"</B><BR><BR>This email is concerning a new entity with category \"@CATEGORY@\"<BR>This entity will be available in your CRM-CTT installation at @WEBHOST@ under EID number @ENTITYID@.<BR><BR>If this email was not intended for you, please contact @ADMINEMAIL@<BR><BR><TABLE><TR><TD>Entity:</TD><TD>@ENTITYID@</TD></TR><TR><TD>Category:</TD><TD>@CATEGORY@</TD></TR><TR><TD>Owner:</TD><TD>@OWNER@</TD></TR><TR><TD>Assignee:</TD><TD>@ASSIGNEE@</TD></TR><TR><TD>Contents:</TD><TD>See attachment</TD></TR><TR><TD>Admin email:</TD><TD>@ADMINEMAIL@</TD></TR><TR><TD>Webhost:</TD><TD>@WEBHOST@</TD></TR><TR><TD>Title:</TD><TD>@TITLE@</TD></TR><TR><TD>Customer:</TD><TD>@CUSTOMER@</TD></TR><TR><TD>Due-date:</TD><TD>@DUEDATE@</TD></TR><TR><TD>Status:</TD><TD>@STATUS@</TD></TR><TR><TD>Priority:</TD><TD>@PRIORITY@</TD></TR></TABLE></FONT></BODY>','2007-02-07 14:19:31','The body of the email which will be sent when a new entity is added. Please read the manual before editing this setting.');
INSERT INTO `judassettings` VALUES (20,'BODY_ENTITY_EDIT','<BODY><FONT FACE=\"MS Shell Dlg\" SIZE=\"2\"><B>One of your entities in repository \"@TITLE@\" was updated.</B><BR><BR>This email is concerning your entity with category \"@CATEGORY@\"<BR>This entity is available in your CRM-CTT installation at @WEBHOST@ under EID number @ENTITYID@. <BR><BR>If this email was not intended for you, please contact @ADMINEMAIL@<BR><BR><TABLE><TR><TD>Entity:</TD><TD>@ENTITYID@</TD></TR><TR><TD>Category:</TD><TD>@CATEGORY@</TD></TR><TR><TD>Owner:</TD><TD>@OWNER@</TD></TR><TR><TD>Assignee:</TD><TD>@ASSIGNEE@</TD></TR><TR><TD>Contents:</TD><TD>See attachment</TD></TR><TR><TD>Admin email:</TD><TD>@ADMINEMAIL@</TD></TR><TR><TD>Webhost:</TD><TD>@WEBHOST@</TD></TR><TR><TD>Title:</TD><TD>@TITLE@</TD></TR><TR><TD>Customer:</TD><TD>@CUSTOMER@</TD></TR><TR><TD>Due-date:</TD><TD>@DUEDATE@</TD></TR><TR><TD>Status:</TD><TD>@STATUS@</TD></TR><TR><TD>Priority:</TD><TD>@PRIORITY@</TD></TR></TABLE></FONT></BODY>','2007-02-07 14:19:31','The body of the email which will be sent when an entity is updated. Please read the manual before editing this setting.');
INSERT INTO `judassettings` VALUES (21,'ShowNumOfAttachments','No','2007-02-07 14:19:31','Wether or not to show the number of attached documents in the main entity lists');
INSERT INTO `judassettings` VALUES (22,'ShowEmailButton','Yes','2007-02-07 14:19:31','Yes to show an extra button to send an e-mail to the assignee when an entity is added or edited, no to disable this option.');
INSERT INTO `judassettings` VALUES (23,'ShowMainPageCalendar','Yes','2007-02-07 14:19:31','Yes to show the 3-month calendar on the main page, no to disable this option.');
INSERT INTO `judassettings` VALUES (24,'Category pulldown list','','2007-02-07 14:19:31','');
INSERT INTO `judassettings` VALUES (25,'ForceCategoryPulldown','','2007-02-07 14:19:31','Yes to show a pulldown list for the category, no to make it a text box.');
INSERT INTO `judassettings` VALUES (26,'ShowRecentEditedEntities','7','2007-02-07 14:19:31','0 for no recent list, any number under 20 to show the most recent edited entities on the main page.');
INSERT INTO `judassettings` VALUES (27,'EnableEntityJournaling','Yes','2007-02-07 14:19:31','Set this value to Yes if you want entity journaling enabled (a link will be added to the main edit entity page)');
INSERT INTO `judassettings` VALUES (28,'AutoCompleteCustomerNames','No','2007-02-07 14:19:31','Set this value to Yes if you want a text box wich auto-completes customer names instead of a pull-down menu with all customers.');
INSERT INTO `judassettings` VALUES (29,'EnableEntityContentsJournaling','Yes','2007-02-07 14:19:31','Set this value to Yes if you want a drop-down box in the main entity window to switch to history states of an entity');
INSERT INTO `judassettings` VALUES (30,'DontShowPopupWindow','Yes','2007-02-07 14:19:31','No to show the javascript popup window in the entity overview, yes to disable it and make editing the entity the default action when clicking on the row.');
INSERT INTO `judassettings` VALUES (31,'ShowFilterInMainList','Yes','2007-02-07 14:19:31','Wether or not to show the filter pulldowns on top of the main entity list');
INSERT INTO `judassettings` VALUES (32,'LetUserSelectOwnListLayout','Yes','2007-02-07 14:19:31','Wether or not to let the user select his/her own list layout');
INSERT INTO `judassettings` VALUES (33,'BODY_TEMPLATE_CUSTOMER','<FONT face=\"MS Shell Dlg\"><P><FONT size=2>&gt;&gt; This mail is regarding entity @ENTITYID@ , \"@CATEGORY@\" in CRM @TITLE@ at @WEBHOST@<BR>-----------------------<BR>Send from CRM-CTT<BR></FONT><A href=\"http://www.crm-ctt.com/\"><FONT size=2>http://www.crm-ctt.com</FONT></A><BR></P></FONT>','2007-02-07 14:19:31','The template wich is used when sending an e-mail to a customer (editable by user before sending)');
INSERT INTO `judassettings` VALUES (34,'ShowPDWASLink','No','2007-02-07 14:19:31','Yes to show the PDWAS link in the file list. PDWAS is a CRM-CTT addon which enables you to edit flies and directly save them to CRM-CTT without having to upload the file manually.');
INSERT INTO `judassettings` VALUES (35,'EnableWebDAVSubsystem','No','2007-02-07 14:19:31','Yes to enable the WebDAV subsystem, no to disable it');
INSERT INTO `judassettings` VALUES (36,'DateFormat','dd-mm-yyyy','2007-02-07 14:19:31','Enter \'mm-dd-yyyy\' here to display dates in US format, anything else to display dates in international format (which is dd-mm-yyyy).');
INSERT INTO `judassettings` VALUES (37,'HideCustomerTab','No','2007-02-07 14:19:31','Set this value to \'Yes\' if you want the customer tab only to be visible to administrators');
INSERT INTO `judassettings` VALUES (38,'CustomerListColumnsToShow','a:5:{s:2:\"id\";b:1;s:11:\"cb_custname\";b:1;s:10:\"cb_contact\";b:1;s:16:\"cb_contact_phone\";b:1;s:9:\"cb_active\";b:1;}','2007-02-07 14:19:31','The columns to show in the customer list');
INSERT INTO `judassettings` VALUES (39,'ShowSaveAsNewEntityButton','Yes','2007-02-07 14:19:31','Yes to show the Save As New Entity button, no to hide it.');
INSERT INTO `judassettings` VALUES (40,'AutoCompleteCategory','Yes','2007-02-07 14:19:31','Enter Yes of you would like type-ahead functionality in the category field on the main entity page');
INSERT INTO `judassettings` VALUES (41,'AutoInsertDateTime','No','2007-02-07 14:19:31','Enter Yes of you would like the date and time information inserted automatically when adding text to an entity.');
INSERT INTO `judassettings` VALUES (42,'LetUserEditOwnProfile','Yes','2007-02-07 14:19:31','Set this option to \'Yes\' to enable user to change their passwords, edit their full name, and select wether or not they want to receive the daily entity overwiew email.');
INSERT INTO `judassettings` VALUES (43,'EnableRepositorySwitcher','Yes','2007-02-07 14:19:31','Set this option to \'Yes\' to enable a user to dynamically switch between repositories in which the same users exist with the same password. \'No\' disables this, \'Admin\' enables it only for admins.');
INSERT INTO `judassettings` VALUES (44,'BODY_ENTITY_CUSTOMER_ADD','You are registerd to customer @CUSTOMER@. Entity @ENTITYID@ was just coupled to that customer, so you might have to do something.','2007-02-07 14:19:31','The body of the e-mail which is send to the customer_owner when an entity (new or existing) is coupled to that customer, and the email_customer_upon_action checkbox in the customer properties is checked.');
INSERT INTO `judassettings` VALUES (45,'BlockAllCSVDownloads','No','2007-02-07 14:19:31','Set this value to Yes if you want to block all CSV/Excel downloads for all users except for administrators.');
INSERT INTO `judassettings` VALUES (46,'STANDARD_TEXT','','2007-02-07 14:19:31','A list of standard comments which users can automatically insert as a reply in entities. Leave empty for no standard comments.');
INSERT INTO `judassettings` VALUES (47,'CUSTOMER_LIST_TRESHOLD','150','2007-02-07 14:19:31','The number of customers listed on the main customers page. If this number of customers is exceeded, the list will not appear for bandwith reasons.');
INSERT INTO `judassettings` VALUES (48,'ALSO_PROCESS_DELETED','No','2007-02-07 14:19:31','Set this option to Yes if you want the duedate notify script to also process entities on their duedate, even if the entity is deleted.');
INSERT INTO `judassettings` VALUES (49,'BODY_EMAILINSERT_REPLY','<P><FONT face=\"MS Shell Dlg\" size=2><B>Your e-mail was added to repository @TITLE@</B><BR></P> <P> The number is : @EID@ Number of attachments saved: @NUM_ATTM@ </P>','2007-02-07 14:19:31','The body of the e-mail which is send as a reply to people who use the email_in script to log an entity');
INSERT INTO `judassettings` VALUES (50,'SUBJECT_EMAILINSERT_REPLY','Your e-mail to CRM-CTT was saved under number @EID@ in repository @TITLE@','2007-02-07 14:19:31','The subject of the e-mail which is send as a reply to people who use the email_in script to log an entity');
INSERT INTO `judassettings` VALUES (51,'ForceSecureHTTP','No','2007-02-07 14:19:31','If set to yes, CRM-CTT will redirect the user to the HTTPS equivalent of the URL he/she is using, to force secure browsing. Your webserver must be configured to accept this.');
INSERT INTO `judassettings` VALUES (52,'BODY_MainPageMessage','','2007-02-07 14:19:31','When set, this message will be displayed on the main page.');
INSERT INTO `judassettings` VALUES (53,'InvoiceNumberPrefix','[unconfigured]','2007-02-07 14:19:31','Some text to prefix invoice numbers with');
INSERT INTO `judassettings` VALUES (54,'NextInvoiceNumberCounter','0','2007-02-07 14:19:31','The invoice number counter (not accessable)');
INSERT INTO `judassettings` VALUES (55,'EnableSingleEntityInvoicing','No','2007-02-07 14:19:31','Set this value to Yes to enable per-entity invoicing using the invoice icon on the main edit entity page.');
INSERT INTO `judassettings` VALUES (56,'PDF-ExtraFieldsInTable','No','2007-02-07 14:19:31','Set this value to Yes to have extra fields in PDF reports show up in a table instead of each value being printed on a new line.');
INSERT INTO `judassettings` VALUES (57,'EnableEntityReporting','Yes','2007-02-07 14:19:31','Set this value to Yes to be able to create per-entity or batch RTF reports (a word-icon will appear on the edit entity page and a link will be added to the main page)');
INSERT INTO `judassettings` VALUES (58,'DisplayNOToptioninfilters','No','2007-02-07 14:19:31','Set this value to Yes to have all filter drop-down boxes also contain logical NOT-operands, like status NOT open.');
INSERT INTO `judassettings` VALUES (59,'AUTOASSIGNINCOMINGENTITIES','No','2007-02-07 14:19:31','Set this option to Yes to automatically assign incoming entities to the owner of the customer.');
INSERT INTO `judassettings` VALUES (60,'FORCEDFIELDSTEXT','This message is not configured (see admin section). Probably you missed some fields in your form. ','2007-02-07 14:19:31','The message which is displayed when a user did not fill in all required form fields.');
INSERT INTO `judassettings` VALUES (61,'EnableEntityLocking','Yes','2007-02-07 14:19:31','Set this to Yes to enable entity locking to prevent two people from editing the same entity');
INSERT INTO `judassettings` VALUES (62,'DFT_FOREGROUND_COLOR','#c60','2007-02-07 14:19:31','The color of links');
INSERT INTO `judassettings` VALUES (63,'DFT_FORM_COLOR','#c60','2007-02-07 14:19:31','The color form elements and values');
INSERT INTO `judassettings` VALUES (64,'DFT_PLAIN_COLOR','#000','2007-02-07 14:19:31','The color of normal, non-linked, non-form text');
INSERT INTO `judassettings` VALUES (65,'DFT_LEGEND_COLOR','#3366FF','2007-02-07 14:19:31','The color of fieldset legends');
INSERT INTO `judassettings` VALUES (66,'DFT_FONT','MS Shell DLG','2007-02-07 14:19:31','The main font');
INSERT INTO `judassettings` VALUES (67,'DFT_FONT_SIZE','11','2007-02-07 14:19:32','The main font size');
INSERT INTO `judassettings` VALUES (68,'REQUIREDDEFAULTFIELDS','No','2007-02-07 14:19:32','SHOULD NOT BE VISIBLE');
INSERT INTO `judassettings` VALUES (69,'MailMethod','smtp','2007-02-07 14:19:32','The method to use for sending mail. Can be either sendmail, mail (=PHP mail) or smtp.');
INSERT INTO `judassettings` VALUES (70,'MailUser','','2007-02-07 14:19:32','The username of your authenticated SMTP-server (only when using authenticated SMTP)');
INSERT INTO `judassettings` VALUES (71,'MailPass','','2007-02-07 14:19:32','The password of your authenticated SMTP-server (only when using authenticated SMTP)');
INSERT INTO `judassettings` VALUES (72,'UseWaitingAndDoesntBelongHere','No','2007-02-07 14:19:32','Set this value to Yes to enable the (old) waiting and doesnt belong here fields');
INSERT INTO `judassettings` VALUES (73,'PersonalTabs','','2007-02-07 14:19:32','Set this to Yes to disable the main entity comment field');
INSERT INTO `judassettings` VALUES (74,'DisableCommentField','No','2007-02-07 14:19:32','Set this to Yes to disable the main entity comment field');
INSERT INTO `judassettings` VALUES (75,'EMAILINBOX','','2007-02-07 14:19:32','The credentials for the read-only access to an POP3 e-mail inbox');
INSERT INTO `judassettings` VALUES (76,'HIDEADDTAB','No','2007-02-07 14:19:32','Set this to Yes to hide the second tab used to add entities');
INSERT INTO `judassettings` VALUES (77,'HIDECSVTAB','No','2007-02-07 14:19:32','Set this to Yes to hide the CSV tab used to download CRM-CTT exports');
INSERT INTO `judassettings` VALUES (78,'HIDEPBTAB','No','2007-02-07 14:19:32','Set this to Yes to hide the phone book tab');
INSERT INTO `judassettings` VALUES (79,'HIDESUMMARYTAB','No','2007-02-07 14:19:32','Set this to Yes to hide the summary tab');
INSERT INTO `judassettings` VALUES (80,'HIDEENTITYTAB','No','2007-02-07 14:19:32','Set this to Yes to hide main entity list tab');
INSERT INTO `judassettings` VALUES (81,'CAL_MINHOUR','7','2007-02-07 14:19:32','Starting hour of day, used for scheduling enties');
INSERT INTO `judassettings` VALUES (82,'CAL_MAXHOUR','18','2007-02-07 14:19:32','Ending hour of day, used for scheduling enties (24h format: for 6pm use 18');
INSERT INTO `judassettings` VALUES (83,'CAL_USEWEEKEND','No','2007-02-07 14:19:32','Wheter or not to also show the weekend days in the week view of the calendar');
INSERT INTO `judassettings` VALUES (84,'ShowMainPageLinks','','2007-02-07 14:19:32','Some links to show on the main page. Leave empty for no links');
INSERT INTO `judassettings` VALUES (85,'EnableMailMergeAndInvoicing','No','2007-02-07 14:19:32','Set to Yes to enable mail merges and invoicing (even then, only for admins)');
INSERT INTO `judassettings` VALUES (86,'DefaultVAT','19','2007-02-07 14:19:32','Default VAT percentage (only for use with invoicing)');
INSERT INTO `judassettings` VALUES (87,'subject_new_entity','A new entity was added to repository @TITLE@ (@CATEGORY@)','2007-02-07 14:19:32','The subject of the mail which is send when a new entity is added');
INSERT INTO `judassettings` VALUES (88,'subject_customer_couple','Your customer got a new entity coupled in repository @TITLE@','2007-02-07 14:19:32','The subject of the mail which is send to a customer owner when a new entity is coupled to his/her customer');
INSERT INTO `judassettings` VALUES (89,'subject_update_entity','One of your entities was updated in repository @TITLE@','2007-02-07 14:19:32','The subject of the mail which is send to a user owner when his/her entity was updated');
INSERT INTO `judassettings` VALUES (90,'subject_alarm','Alarm notification for entity @ENTITYID@ (@CATEGORY@)','2007-02-07 14:19:32','The subject of the mail which is send to a user owner when his/her entity reaches an alarm date');
INSERT INTO `judassettings` VALUES (91,'MainListColumnsToShow','a:9:{s:2:\"id\";b:1;s:7:\"cb_cust\";b:1;s:8:\"cb_owner\";b:1;s:11:\"cb_assignee\";b:1;s:9:\"cb_status\";b:1;s:11:\"cb_priority\";b:1;s:11:\"cb_category\";b:1;s:10:\"cb_duedate\";b:1;s:12:\"cb_alarmdate\";b:1;}','2007-02-07 14:19:32','non-editable by admin');
INSERT INTO `judassettings` VALUES (92,'DBVERSION','3.4.2','2007-02-07 14:19:32','The current database version');
INSERT INTO `judassettings` VALUES (93,'TMP_FILE_PATH','/tmp','2007-02-07 14:19:32','The path to the directory where CRM-CTT (the user under which your webserver runs) can store temporary files.');
INSERT INTO `judassettings` VALUES (94,'ENTITY_ADD_FORM','Default','2007-02-07 14:19:32','The HTML form template to use when a normal user adds an entity');
INSERT INTO `judassettings` VALUES (95,'BODY_URGENTMESSAGE','','2007-02-07 14:19:32','When set, this message will be displayed above <b>all</b> pages. Only use this for very urgent matters.');
INSERT INTO `judassettings` VALUES (96,'AUTH_TYPE','CRM-CTT Only','2007-02-07 14:19:32','The method to use for authentication. ALWAYS: user must exist in CRM-CTT. HTTP REALM: already authenticated users can log in without a password (INTRANET). LDAP: authentications with an LDAP server (allso fill in LDAP_SERVER, LDAP_PORT, LDAP_PREFIX).');
INSERT INTO `judassettings` VALUES (97,'ENTITY_EDIT_FORM','Default','2007-02-07 14:19:32','The HTML form template to use when a normal user edits an entity');
INSERT INTO `judassettings` VALUES (98,'ENTITY_LIMITED_ADD_FORM','Default','2007-02-07 14:19:32','The HTML form template to use when a limited user adds an entity');
INSERT INTO `judassettings` VALUES (99,'ENTITY_LIMITED_EDIT_FORM','Default','2007-02-07 14:19:32','The HTML form template to use when a limited user edits an entity');
INSERT INTO `judassettings` VALUES (100,'BODY_LIMITEDHEADER','','2007-02-07 14:19:32','This HTML template will be shown at the top of the limited interface');
INSERT INTO `judassettings` VALUES (101,'SHOW_ADMIN_TOOLTIPS','Yes','2007-02-07 14:19:32','Wether or not to display tool-tips in the administrative section.');
INSERT INTO `judassettings` VALUES (102,'EnableEntityRelations','No','2007-02-07 14:19:32','Set this value to Yes to enable entity relations.');
INSERT INTO `judassettings` VALUES (103,'HideChildsFromMainList','No','2007-02-07 14:19:32','When enabled, child entities will no longer show up on the main list.');
INSERT INTO `judassettings` VALUES (104,'LDAP_SERVER','','2007-02-07 14:19:32','The name of the LDAP server');
INSERT INTO `judassettings` VALUES (105,'LDAP_PORT','389','2007-02-07 14:19:32','The port of the LDAP server; secure=636, non-secure=389 (Default)');
INSERT INTO `judassettings` VALUES (106,'LDAP_PREFIX','','2007-02-07 14:19:32','The prefix to use before a username on the LDAP server. End with 1 backslash, no two.');
INSERT INTO `judassettings` VALUES (107,'FormFinity','Yes','2007-02-07 14:19:32','When set to Yes, entities will \'remember\' what form was used to create them, and the entity will always show up in that form.');
INSERT INTO `judassettings` VALUES (108,'UNIFIED_FROMADDRESS','','2007-02-07 14:19:32','An address entered here, will *always* overwrite the from-address in mails. All mails will have this from-address.');
INSERT INTO `judassettings` VALUES (109,'CUSTOMCUSTOMERFORM','','2007-02-07 14:19:32','When you enter the (valid) number of a customer HTML-form here, all customer records will be shown in that form.');
INSERT INTO `judassettings` VALUES (110,'DISPLAYNUMSUMINMAINLIST','Yes','2007-02-07 14:19:32','When set to Yes, the total value of numeric fields will be displayed under the main entity list.');
INSERT INTO `judassettings` VALUES (111,'USE_EXTENDED_CACHE','Yes','2007-02-07 14:19:32','Use extensive access rights and extra fields caching. Improves performance.');
INSERT INTO `judassettings` VALUES (112,'CHECKFORDOUBLEADDS','Yes','2007-02-07 14:19:32','CRM-CTT checks if an entity is not added twice within an hour. If this bothers you, disable this check by setting this to No.');
INSERT INTO `judassettings` VALUES (113,'NOBARSWINDOW','No','2007-02-07 14:19:32','Set this option to Yes to force a no-bars window');

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
# Dumping data for table judasstatusvars
#

INSERT INTO `judasstatusvars` VALUES (1,'Aberto','#66CC66');
INSERT INTO `judasstatusvars` VALUES (2,'Fechado','#FF6633');
INSERT INTO `judasstatusvars` VALUES (3,'Aguardando fechamento','#3399CC');

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
# Dumping data for table judastriggers
#


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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='CRM Main activity log table';

#
# Dumping data for table judasuselog
#

INSERT INTO `judasuselog` VALUES (1,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:25:54','invalid','Mandry');
INSERT INTO `judasuselog` VALUES (2,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:25:54','WARNING: Invalid user/pass combination on login to repos Grupo Vanguarda - OSTI: user Mandry -> access denied','Mandry');
INSERT INTO `judasuselog` VALUES (3,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:25:59','Login Mandry','Mandry');
INSERT INTO `judasuselog` VALUES (4,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:25:59','Authenticate Mandry','Mandry');
INSERT INTO `judasuselog` VALUES (5,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:26:31','Logoff ','');
INSERT INTO `judasuselog` VALUES (6,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:28:02','invalid','isrel');
INSERT INTO `judasuselog` VALUES (7,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:28:02','WARNING: Invalid user/pass combination on login to repos Grupo Vanguarda - OSTI: user isrel -> access denied','isrel');
INSERT INTO `judasuselog` VALUES (8,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:28:08','invalid','isrel');
INSERT INTO `judasuselog` VALUES (9,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:28:08','WARNING: Invalid user/pass combination on login to repos Grupo Vanguarda - OSTI: user isrel -> access denied','isrel');
INSERT INTO `judasuselog` VALUES (10,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:28:34','invalid','Mandry');
INSERT INTO `judasuselog` VALUES (11,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:28:34','WARNING: Invalid user/pass combination on login to repos Grupo Vanguarda - OSTI: user Mandry -> access denied','Mandry');
INSERT INTO `judasuselog` VALUES (12,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:29:32','Login Mandry','Mandry');
INSERT INTO `judasuselog` VALUES (13,'200.180.184.173','/osti/index.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:29:32','Authenticate Mandry','Mandry');
INSERT INTO `judasuselog` VALUES (14,'200.180.184.173','/osti/customers.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:29:49','Customer overview accessed','Mandry');
INSERT INTO `judasuselog` VALUES (15,'200.180.184.173','/osti/admin.php','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)','2007-02-07 14:30:01','User manager started','Mandry');

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
# Dumping data for table judasuserprofiles
#


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
# Dumping data for table judaswebdav_locks
#


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

#
# Dumping data for table judaswebdav_properties
#


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
