# MySQL-Front 3.2  (Build 13.52)


# Host: localhost    Database: nativa
# ------------------------------------------------------
# Server version 4.0.22-nt

#
# Table structure for table kayapo_authors
#

DROP TABLE IF EXISTS `kayapo_authors`;
CREATE TABLE `kayapo_authors` (
  `aid` varchar(25) NOT NULL default '',
  `name` varchar(50) default NULL,
  `url` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `pwd` varchar(40) default NULL,
  `counter` int(11) NOT NULL default '0',
  `radminsuper` tinyint(1) NOT NULL default '1',
  `admlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`aid`),
  KEY `aid` (`aid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_authors
#

INSERT INTO `kayapo_authors` VALUES ('Irai','Folha Nativa','','desenvolvimento@speedrs.com.br','e10adc3949ba59abbe56e057f20f883e',0,0,'');
INSERT INTO `kayapo_authors` VALUES ('Mandry','God','http://localhost/nativa','desenvolvimento@speedrs.com.br','e10adc3949ba59abbe56e057f20f883e',0,1,'');

#
# Table structure for table kayapo_autonews
#

DROP TABLE IF EXISTS `kayapo_autonews`;
CREATE TABLE `kayapo_autonews` (
  `anid` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(80) NOT NULL default '',
  `time` varchar(19) NOT NULL default '',
  `hometext` text NOT NULL,
  `bodytext` text NOT NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(20) NOT NULL default '',
  `notes` text NOT NULL,
  `ihome` int(1) NOT NULL default '0',
  `alanguage` varchar(30) NOT NULL default '',
  `acomm` int(1) NOT NULL default '0',
  `associated` text NOT NULL,
  PRIMARY KEY  (`anid`),
  KEY `anid` (`anid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_autonews
#


#
# Table structure for table kayapo_banned_ip
#

DROP TABLE IF EXISTS `kayapo_banned_ip`;
CREATE TABLE `kayapo_banned_ip` (
  `id` int(11) NOT NULL auto_increment,
  `ip_address` varchar(15) NOT NULL default '',
  `reason` varchar(255) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_banned_ip
#


#
# Table structure for table kayapo_banner
#

DROP TABLE IF EXISTS `kayapo_banner`;
CREATE TABLE `kayapo_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `alttext` varchar(255) NOT NULL default '',
  `date` datetime default NULL,
  `dateend` datetime default NULL,
  `type` tinyint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_banner
#

INSERT INTO `kayapo_banner` VALUES (1,1,0,53,0,'http://kayapo.phpnuke.org.br/images/banner01.gif','kayapo.phpnuke.org.br','Kayapó! Toda a força do PHP-Nuke...','2005-01-13 16:27:39','0000-00-00 00:00:00',0,1);

#
# Table structure for table kayapo_bannerclient
#

DROP TABLE IF EXISTS `kayapo_bannerclient`;
CREATE TABLE `kayapo_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `contact` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(10) NOT NULL default '',
  `passwd` varchar(10) NOT NULL default '',
  `extrainfo` text NOT NULL,
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bannerclient
#

INSERT INTO `kayapo_bannerclient` VALUES (1,'Kayapó','Kayapó','kayapo@phpnuke.org.br','kayapo','kanyanpob','@;D');

#
# Table structure for table kayapo_bbauth_access
#

DROP TABLE IF EXISTS `kayapo_bbauth_access`;
CREATE TABLE `kayapo_bbauth_access` (
  `group_id` mediumint(8) NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `auth_view` tinyint(1) NOT NULL default '0',
  `auth_read` tinyint(1) NOT NULL default '0',
  `auth_post` tinyint(1) NOT NULL default '0',
  `auth_reply` tinyint(1) NOT NULL default '0',
  `auth_edit` tinyint(1) NOT NULL default '0',
  `auth_delete` tinyint(1) NOT NULL default '0',
  `auth_sticky` tinyint(1) NOT NULL default '0',
  `auth_announce` tinyint(1) NOT NULL default '0',
  `auth_vote` tinyint(1) NOT NULL default '0',
  `auth_pollcreate` tinyint(1) NOT NULL default '0',
  `auth_attachments` tinyint(1) NOT NULL default '0',
  `auth_mod` tinyint(1) NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `forum_id` (`forum_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbauth_access
#


#
# Table structure for table kayapo_bbbanlist
#

DROP TABLE IF EXISTS `kayapo_bbbanlist`;
CREATE TABLE `kayapo_bbbanlist` (
  `ban_id` mediumint(8) unsigned NOT NULL auto_increment,
  `ban_userid` mediumint(8) NOT NULL default '0',
  `ban_ip` varchar(8) NOT NULL default '',
  `ban_email` varchar(255) default NULL,
  `ban_time` int(11) default NULL,
  `ban_expire_time` int(11) default NULL,
  `ban_by_userid` mediumint(8) default NULL,
  `ban_priv_reason` text,
  `ban_pub_reason_mode` tinyint(1) default NULL,
  `ban_pub_reason` text,
  PRIMARY KEY  (`ban_id`),
  KEY `ban_ip_user_id` (`ban_ip`,`ban_userid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbbanlist
#


#
# Table structure for table kayapo_bbcategories
#

DROP TABLE IF EXISTS `kayapo_bbcategories`;
CREATE TABLE `kayapo_bbcategories` (
  `cat_id` mediumint(8) unsigned NOT NULL auto_increment,
  `cat_title` varchar(100) default NULL,
  `cat_order` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_order` (`cat_order`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbcategories
#


#
# Table structure for table kayapo_bbconfig
#

DROP TABLE IF EXISTS `kayapo_bbconfig`;
CREATE TABLE `kayapo_bbconfig` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbconfig
#

INSERT INTO `kayapo_bbconfig` VALUES ('allow_avatar_local','1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_avatar_remote','0');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_avatar_upload','0');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_bbcode','1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_html','1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_html_tags','b,i,u,pre');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_namechange','0');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_sig','1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_smilies','1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_theme_create','0');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_filesize','6144');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_gallery_path','modules/Forums/images/avatars');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_max_height','80');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_max_width','80');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_path','modules/Forums/images/avatars');
INSERT INTO `kayapo_bbconfig` VALUES ('board_disable','0');
INSERT INTO `kayapo_bbconfig` VALUES ('board_email','Webmaster@MySite.com');
INSERT INTO `kayapo_bbconfig` VALUES ('board_email_form','0');
INSERT INTO `kayapo_bbconfig` VALUES ('board_email_sig','Thanks, Webmaster@MySite.com');
INSERT INTO `kayapo_bbconfig` VALUES ('board_startdate','1013908210');
INSERT INTO `kayapo_bbconfig` VALUES ('board_timezone','-3');
INSERT INTO `kayapo_bbconfig` VALUES ('config_id','1');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_domain','meysite.com.br');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_name','phpbb2mysql');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_path','/');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_secure','0');
INSERT INTO `kayapo_bbconfig` VALUES ('coppa_fax','');
INSERT INTO `kayapo_bbconfig` VALUES ('coppa_mail','');
INSERT INTO `kayapo_bbconfig` VALUES ('default_dateformat','D M d, Y g:i a');
INSERT INTO `kayapo_bbconfig` VALUES ('default_lang','brazilian');
INSERT INTO `kayapo_bbconfig` VALUES ('default_style','2');
INSERT INTO `kayapo_bbconfig` VALUES ('enable_confirm','0');
INSERT INTO `kayapo_bbconfig` VALUES ('flood_interval','15');
INSERT INTO `kayapo_bbconfig` VALUES ('gzip_compress','0');
INSERT INTO `kayapo_bbconfig` VALUES ('hot_threshold','25');
INSERT INTO `kayapo_bbconfig` VALUES ('max_inbox_privmsgs','100');
INSERT INTO `kayapo_bbconfig` VALUES ('max_poll_options','10');
INSERT INTO `kayapo_bbconfig` VALUES ('max_savebox_privmsgs','100');
INSERT INTO `kayapo_bbconfig` VALUES ('max_sentbox_privmsgs','100');
INSERT INTO `kayapo_bbconfig` VALUES ('max_sig_chars','255');
INSERT INTO `kayapo_bbconfig` VALUES ('override_user_style','1');
INSERT INTO `kayapo_bbconfig` VALUES ('posts_per_page','15');
INSERT INTO `kayapo_bbconfig` VALUES ('privmsg_disable','0');
INSERT INTO `kayapo_bbconfig` VALUES ('prune_enable','0');
INSERT INTO `kayapo_bbconfig` VALUES ('record_online_date','');
INSERT INTO `kayapo_bbconfig` VALUES ('record_online_users','');
INSERT INTO `kayapo_bbconfig` VALUES ('require_activation','0');
INSERT INTO `kayapo_bbconfig` VALUES ('script_path','/modules/Forums/');
INSERT INTO `kayapo_bbconfig` VALUES ('sendmail_fix','0');
INSERT INTO `kayapo_bbconfig` VALUES ('server_name','Kayapó WebSite');
INSERT INTO `kayapo_bbconfig` VALUES ('server_port','80');
INSERT INTO `kayapo_bbconfig` VALUES ('session_length','3600');
INSERT INTO `kayapo_bbconfig` VALUES ('sitename','meusite.com.br');
INSERT INTO `kayapo_bbconfig` VALUES ('site_desc','Site feito com PHP-Nuke 7.5 CNB - Kayapó');
INSERT INTO `kayapo_bbconfig` VALUES ('smilies_path','modules/Forums/images/smiles');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_delivery','0');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_host','');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_password','');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_username','');
INSERT INTO `kayapo_bbconfig` VALUES ('topics_per_page','50');
INSERT INTO `kayapo_bbconfig` VALUES ('version','.0.10');

#
# Table structure for table kayapo_bbdisallow
#

DROP TABLE IF EXISTS `kayapo_bbdisallow`;
CREATE TABLE `kayapo_bbdisallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL auto_increment,
  `disallow_username` varchar(25) default NULL,
  PRIMARY KEY  (`disallow_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbdisallow
#


#
# Table structure for table kayapo_bbforum_prune
#

DROP TABLE IF EXISTS `kayapo_bbforum_prune`;
CREATE TABLE `kayapo_bbforum_prune` (
  `prune_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `prune_days` tinyint(4) unsigned NOT NULL default '0',
  `prune_freq` tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`prune_id`),
  KEY `forum_id` (`forum_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbforum_prune
#


#
# Table structure for table kayapo_bbforums
#

DROP TABLE IF EXISTS `kayapo_bbforums`;
CREATE TABLE `kayapo_bbforums` (
  `forum_id` smallint(5) unsigned NOT NULL auto_increment,
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_name` varchar(150) default NULL,
  `forum_desc` text,
  `forum_status` tinyint(4) NOT NULL default '0',
  `forum_order` mediumint(8) unsigned NOT NULL default '1',
  `forum_posts` mediumint(8) unsigned NOT NULL default '0',
  `forum_topics` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `prune_next` int(11) default NULL,
  `prune_enable` tinyint(1) NOT NULL default '1',
  `auth_view` tinyint(2) NOT NULL default '0',
  `auth_read` tinyint(2) NOT NULL default '0',
  `auth_post` tinyint(2) NOT NULL default '0',
  `auth_reply` tinyint(2) NOT NULL default '0',
  `auth_edit` tinyint(2) NOT NULL default '0',
  `auth_delete` tinyint(2) NOT NULL default '0',
  `auth_sticky` tinyint(2) NOT NULL default '0',
  `auth_announce` tinyint(2) NOT NULL default '0',
  `auth_vote` tinyint(2) NOT NULL default '0',
  `auth_pollcreate` tinyint(2) NOT NULL default '0',
  `auth_attachments` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`forum_id`),
  KEY `forums_order` (`forum_order`),
  KEY `cat_id` (`cat_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbforums
#


#
# Table structure for table kayapo_bbgroups
#

DROP TABLE IF EXISTS `kayapo_bbgroups`;
CREATE TABLE `kayapo_bbgroups` (
  `group_id` mediumint(8) NOT NULL auto_increment,
  `group_type` tinyint(4) NOT NULL default '1',
  `group_name` varchar(40) NOT NULL default '',
  `group_description` varchar(255) NOT NULL default '',
  `group_moderator` mediumint(8) NOT NULL default '0',
  `group_single_user` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`group_id`),
  KEY `group_single_user` (`group_single_user`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbgroups
#

INSERT INTO `kayapo_bbgroups` VALUES (1,1,'Anonymous','Personal User',0,1);

#
# Table structure for table kayapo_bbposts
#

DROP TABLE IF EXISTS `kayapo_bbposts`;
CREATE TABLE `kayapo_bbposts` (
  `post_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `poster_id` mediumint(8) NOT NULL default '0',
  `post_time` int(11) NOT NULL default '0',
  `poster_ip` varchar(8) NOT NULL default '',
  `post_username` varchar(25) default NULL,
  `enable_bbcode` tinyint(1) NOT NULL default '1',
  `enable_html` tinyint(1) NOT NULL default '0',
  `enable_smilies` tinyint(1) NOT NULL default '1',
  `enable_sig` tinyint(1) NOT NULL default '1',
  `post_edit_time` int(11) default NULL,
  `post_edit_count` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `post_time` (`post_time`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbposts
#


#
# Table structure for table kayapo_bbposts_text
#

DROP TABLE IF EXISTS `kayapo_bbposts_text`;
CREATE TABLE `kayapo_bbposts_text` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `bbcode_uid` varchar(10) NOT NULL default '',
  `post_subject` varchar(60) default NULL,
  `post_text` text,
  PRIMARY KEY  (`post_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbposts_text
#


#
# Table structure for table kayapo_bbprivmsgs
#

DROP TABLE IF EXISTS `kayapo_bbprivmsgs`;
CREATE TABLE `kayapo_bbprivmsgs` (
  `privmsgs_id` mediumint(8) unsigned NOT NULL auto_increment,
  `privmsgs_type` tinyint(4) NOT NULL default '0',
  `privmsgs_subject` varchar(255) NOT NULL default '0',
  `privmsgs_from_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_to_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_date` int(11) NOT NULL default '0',
  `privmsgs_ip` varchar(8) NOT NULL default '',
  `privmsgs_enable_bbcode` tinyint(1) NOT NULL default '1',
  `privmsgs_enable_html` tinyint(1) NOT NULL default '0',
  `privmsgs_enable_smilies` tinyint(1) NOT NULL default '1',
  `privmsgs_attach_sig` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`privmsgs_id`),
  KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  KEY `privmsgs_to_userid` (`privmsgs_to_userid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbprivmsgs
#


#
# Table structure for table kayapo_bbprivmsgs_text
#

DROP TABLE IF EXISTS `kayapo_bbprivmsgs_text`;
CREATE TABLE `kayapo_bbprivmsgs_text` (
  `privmsgs_text_id` mediumint(8) unsigned NOT NULL default '0',
  `privmsgs_bbcode_uid` varchar(10) NOT NULL default '0',
  `privmsgs_text` text,
  PRIMARY KEY  (`privmsgs_text_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbprivmsgs_text
#


#
# Table structure for table kayapo_bbranks
#

DROP TABLE IF EXISTS `kayapo_bbranks`;
CREATE TABLE `kayapo_bbranks` (
  `rank_id` smallint(5) unsigned NOT NULL auto_increment,
  `rank_title` varchar(50) NOT NULL default '',
  `rank_min` mediumint(8) NOT NULL default '0',
  `rank_max` mediumint(8) NOT NULL default '0',
  `rank_special` tinyint(1) default '0',
  `rank_image` varchar(255) default NULL,
  PRIMARY KEY  (`rank_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbranks
#

INSERT INTO `kayapo_bbranks` VALUES (1,'Site Admin',-1,-1,1,'modules/Forums/images/ranks/6stars.gif');
INSERT INTO `kayapo_bbranks` VALUES (2,'Newbie',1,0,0,'modules/Forums/images/ranks/1star.gif');

#
# Table structure for table kayapo_bbsearch_results
#

DROP TABLE IF EXISTS `kayapo_bbsearch_results`;
CREATE TABLE `kayapo_bbsearch_results` (
  `search_id` int(11) unsigned NOT NULL default '0',
  `session_id` varchar(32) NOT NULL default '',
  `search_array` text NOT NULL,
  PRIMARY KEY  (`search_id`),
  KEY `session_id` (`session_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbsearch_results
#


#
# Table structure for table kayapo_bbsearch_wordlist
#

DROP TABLE IF EXISTS `kayapo_bbsearch_wordlist`;
CREATE TABLE `kayapo_bbsearch_wordlist` (
  `word_text` varchar(50) binary NOT NULL default '',
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word_common` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`word_text`),
  KEY `word_id` (`word_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbsearch_wordlist
#


#
# Table structure for table kayapo_bbsearch_wordmatch
#

DROP TABLE IF EXISTS `kayapo_bbsearch_wordmatch`;
CREATE TABLE `kayapo_bbsearch_wordmatch` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `word_id` mediumint(8) unsigned NOT NULL default '0',
  `title_match` tinyint(1) NOT NULL default '0',
  KEY `word_id` (`word_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbsearch_wordmatch
#


#
# Table structure for table kayapo_bbsessions
#

DROP TABLE IF EXISTS `kayapo_bbsessions`;
CREATE TABLE `kayapo_bbsessions` (
  `session_id` char(32) NOT NULL default '',
  `session_user_id` mediumint(8) NOT NULL default '0',
  `session_start` int(11) NOT NULL default '0',
  `session_time` int(11) NOT NULL default '0',
  `session_ip` char(8) NOT NULL default '0',
  `session_page` int(11) NOT NULL default '0',
  `session_logged_in` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`session_id`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_id_ip_user_id` (`session_id`,`session_ip`,`session_user_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbsessions
#

INSERT INTO `kayapo_bbsessions` VALUES ('0fcfcb7c59c38248c6e38467545c50d2',2,1152801823,1152801823,'7f000001',0,1);
INSERT INTO `kayapo_bbsessions` VALUES ('3bf91b5d5e383a7bed78a16b408e2755',2,1152614640,1152614640,'7f000001',0,1);

#
# Table structure for table kayapo_bbsmilies
#

DROP TABLE IF EXISTS `kayapo_bbsmilies`;
CREATE TABLE `kayapo_bbsmilies` (
  `smilies_id` smallint(5) unsigned NOT NULL auto_increment,
  `code` varchar(50) default NULL,
  `smile_url` varchar(100) default NULL,
  `emoticon` varchar(75) default NULL,
  PRIMARY KEY  (`smilies_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbsmilies
#

INSERT INTO `kayapo_bbsmilies` VALUES (1,':D','icon_biggrin.gif','Very Happy');
INSERT INTO `kayapo_bbsmilies` VALUES (2,':-D','icon_biggrin.gif','Very Happy');
INSERT INTO `kayapo_bbsmilies` VALUES (3,':grin:','icon_biggrin.gif','Very Happy');
INSERT INTO `kayapo_bbsmilies` VALUES (4,':)','icon_smile.gif','Smile');
INSERT INTO `kayapo_bbsmilies` VALUES (5,':-)','icon_smile.gif','Smile');
INSERT INTO `kayapo_bbsmilies` VALUES (6,':smile:','icon_smile.gif','Smile');
INSERT INTO `kayapo_bbsmilies` VALUES (7,':(','icon_sad.gif','Sad');
INSERT INTO `kayapo_bbsmilies` VALUES (8,':-(','icon_sad.gif','Sad');
INSERT INTO `kayapo_bbsmilies` VALUES (9,':sad:','icon_sad.gif','Sad');
INSERT INTO `kayapo_bbsmilies` VALUES (10,':o','icon_surprised.gif','Surprised');
INSERT INTO `kayapo_bbsmilies` VALUES (11,':-o','icon_surprised.gif','Surprised');
INSERT INTO `kayapo_bbsmilies` VALUES (12,':eek:','icon_surprised.gif','Surprised');
INSERT INTO `kayapo_bbsmilies` VALUES (13,'8O','icon_eek.gif','Shocked');
INSERT INTO `kayapo_bbsmilies` VALUES (14,'8-O','icon_eek.gif','Shocked');
INSERT INTO `kayapo_bbsmilies` VALUES (15,':shock:','icon_eek.gif','Shocked');
INSERT INTO `kayapo_bbsmilies` VALUES (16,':?','icon_confused.gif','Confused');
INSERT INTO `kayapo_bbsmilies` VALUES (17,':-?','icon_confused.gif','Confused');
INSERT INTO `kayapo_bbsmilies` VALUES (18,':???:','icon_confused.gif','Confused');
INSERT INTO `kayapo_bbsmilies` VALUES (19,'8)','icon_cool.gif','Cool');
INSERT INTO `kayapo_bbsmilies` VALUES (20,'8-)','icon_cool.gif','Cool');
INSERT INTO `kayapo_bbsmilies` VALUES (21,':cool:','icon_cool.gif','Cool');
INSERT INTO `kayapo_bbsmilies` VALUES (22,':lol:','icon_lol.gif','Laughing');
INSERT INTO `kayapo_bbsmilies` VALUES (23,':x','icon_mad.gif','Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (24,':-x','icon_mad.gif','Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (25,':mad:','icon_mad.gif','Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (26,':P','icon_razz.gif','Razz');
INSERT INTO `kayapo_bbsmilies` VALUES (27,':-P','icon_razz.gif','Razz');
INSERT INTO `kayapo_bbsmilies` VALUES (28,':razz:','icon_razz.gif','Razz');
INSERT INTO `kayapo_bbsmilies` VALUES (29,':oops:','icon_redface.gif','Embarassed');
INSERT INTO `kayapo_bbsmilies` VALUES (30,':cry:','icon_cry.gif','Crying or Very sad');
INSERT INTO `kayapo_bbsmilies` VALUES (31,':evil:','icon_evil.gif','Evil or Very Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (32,':twisted:','icon_twisted.gif','Twisted Evil');
INSERT INTO `kayapo_bbsmilies` VALUES (33,':roll:','icon_rolleyes.gif','Rolling Eyes');
INSERT INTO `kayapo_bbsmilies` VALUES (34,':wink:','icon_wink.gif','Wink');
INSERT INTO `kayapo_bbsmilies` VALUES (35,';)','icon_wink.gif','Wink');
INSERT INTO `kayapo_bbsmilies` VALUES (36,';-)','icon_wink.gif','Wink');
INSERT INTO `kayapo_bbsmilies` VALUES (37,':!:','icon_exclaim.gif','Exclamation');
INSERT INTO `kayapo_bbsmilies` VALUES (38,':?:','icon_question.gif','Question');
INSERT INTO `kayapo_bbsmilies` VALUES (39,':idea:','icon_idea.gif','Idea');
INSERT INTO `kayapo_bbsmilies` VALUES (40,':arrow:','icon_arrow.gif','Arrow');
INSERT INTO `kayapo_bbsmilies` VALUES (41,':|','icon_neutral.gif','Neutral');
INSERT INTO `kayapo_bbsmilies` VALUES (42,':-|','icon_neutral.gif','Neutral');
INSERT INTO `kayapo_bbsmilies` VALUES (43,':neutral:','icon_neutral.gif','Neutral');
INSERT INTO `kayapo_bbsmilies` VALUES (44,':mrgreen:','icon_mrgreen.gif','Mr. Green');

#
# Table structure for table kayapo_bbthemes
#

DROP TABLE IF EXISTS `kayapo_bbthemes`;
CREATE TABLE `kayapo_bbthemes` (
  `themes_id` mediumint(8) unsigned NOT NULL auto_increment,
  `template_name` varchar(30) NOT NULL default '',
  `style_name` varchar(30) NOT NULL default '',
  `head_stylesheet` varchar(100) default NULL,
  `body_background` varchar(100) default NULL,
  `body_bgcolor` varchar(6) default NULL,
  `body_text` varchar(6) default NULL,
  `body_link` varchar(6) default NULL,
  `body_vlink` varchar(6) default NULL,
  `body_alink` varchar(6) default NULL,
  `body_hlink` varchar(6) default NULL,
  `tr_color1` varchar(6) default NULL,
  `tr_color2` varchar(6) default NULL,
  `tr_color3` varchar(6) default NULL,
  `tr_class1` varchar(25) default NULL,
  `tr_class2` varchar(25) default NULL,
  `tr_class3` varchar(25) default NULL,
  `th_color1` varchar(6) default NULL,
  `th_color2` varchar(6) default NULL,
  `th_color3` varchar(6) default NULL,
  `th_class1` varchar(25) default NULL,
  `th_class2` varchar(25) default NULL,
  `th_class3` varchar(25) default NULL,
  `td_color1` varchar(6) default NULL,
  `td_color2` varchar(6) default NULL,
  `td_color3` varchar(6) default NULL,
  `td_class1` varchar(25) default NULL,
  `td_class2` varchar(25) default NULL,
  `td_class3` varchar(25) default NULL,
  `fontface1` varchar(50) default NULL,
  `fontface2` varchar(50) default NULL,
  `fontface3` varchar(50) default NULL,
  `fontsize1` tinyint(4) default NULL,
  `fontsize2` tinyint(4) default NULL,
  `fontsize3` tinyint(4) default NULL,
  `fontcolor1` varchar(6) default NULL,
  `fontcolor2` varchar(6) default NULL,
  `fontcolor3` varchar(6) default NULL,
  `span_class1` varchar(25) default NULL,
  `span_class2` varchar(25) default NULL,
  `span_class3` varchar(25) default NULL,
  `img_size_poll` smallint(5) unsigned default NULL,
  `img_size_privmsg` smallint(5) unsigned default NULL,
  PRIMARY KEY  (`themes_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbthemes
#

INSERT INTO `kayapo_bbthemes` VALUES (2,'subSilver','CNB','forums','','FFFFFF','000000','000000','000000','FF0000','F44903','ECECEC','CACCCB','CACCCB','','','','ECECEC','CACCCB','ECECEC','','','','A3A2A2','ECECEC','ECECEC','','','','Verdana','Arial','Sans-Serif',10,11,10,'000000','000000','F44903','','','',NULL,NULL);

#
# Table structure for table kayapo_bbthemes_name
#

DROP TABLE IF EXISTS `kayapo_bbthemes_name`;
CREATE TABLE `kayapo_bbthemes_name` (
  `themes_id` smallint(5) unsigned NOT NULL default '0',
  `tr_color1_name` char(50) default NULL,
  `tr_color2_name` char(50) default NULL,
  `tr_color3_name` char(50) default NULL,
  `tr_class1_name` char(50) default NULL,
  `tr_class2_name` char(50) default NULL,
  `tr_class3_name` char(50) default NULL,
  `th_color1_name` char(50) default NULL,
  `th_color2_name` char(50) default NULL,
  `th_color3_name` char(50) default NULL,
  `th_class1_name` char(50) default NULL,
  `th_class2_name` char(50) default NULL,
  `th_class3_name` char(50) default NULL,
  `td_color1_name` char(50) default NULL,
  `td_color2_name` char(50) default NULL,
  `td_color3_name` char(50) default NULL,
  `td_class1_name` char(50) default NULL,
  `td_class2_name` char(50) default NULL,
  `td_class3_name` char(50) default NULL,
  `fontface1_name` char(50) default NULL,
  `fontface2_name` char(50) default NULL,
  `fontface3_name` char(50) default NULL,
  `fontsize1_name` char(50) default NULL,
  `fontsize2_name` char(50) default NULL,
  `fontsize3_name` char(50) default NULL,
  `fontcolor1_name` char(50) default NULL,
  `fontcolor2_name` char(50) default NULL,
  `fontcolor3_name` char(50) default NULL,
  `span_class1_name` char(50) default NULL,
  `span_class2_name` char(50) default NULL,
  `span_class3_name` char(50) default NULL,
  PRIMARY KEY  (`themes_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbthemes_name
#

INSERT INTO `kayapo_bbthemes_name` VALUES (2,'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');

#
# Table structure for table kayapo_bbtopics
#

DROP TABLE IF EXISTS `kayapo_bbtopics`;
CREATE TABLE `kayapo_bbtopics` (
  `topic_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(8) unsigned NOT NULL default '0',
  `topic_title` char(60) NOT NULL default '',
  `topic_poster` mediumint(8) NOT NULL default '0',
  `topic_time` int(11) NOT NULL default '0',
  `topic_views` mediumint(8) unsigned NOT NULL default '0',
  `topic_replies` mediumint(8) unsigned NOT NULL default '0',
  `topic_status` tinyint(3) NOT NULL default '0',
  `topic_vote` tinyint(1) NOT NULL default '0',
  `topic_type` tinyint(3) NOT NULL default '0',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_moved_id` (`topic_moved_id`),
  KEY `topic_status` (`topic_status`),
  KEY `topic_type` (`topic_type`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbtopics
#


#
# Table structure for table kayapo_bbtopics_watch
#

DROP TABLE IF EXISTS `kayapo_bbtopics_watch`;
CREATE TABLE `kayapo_bbtopics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `notify_status` tinyint(1) NOT NULL default '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_status` (`notify_status`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbtopics_watch
#


#
# Table structure for table kayapo_bbuser_group
#

DROP TABLE IF EXISTS `kayapo_bbuser_group`;
CREATE TABLE `kayapo_bbuser_group` (
  `group_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `user_pending` tinyint(1) default NULL,
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbuser_group
#

INSERT INTO `kayapo_bbuser_group` VALUES (1,-1,0);

#
# Table structure for table kayapo_bbvote_desc
#

DROP TABLE IF EXISTS `kayapo_bbvote_desc`;
CREATE TABLE `kayapo_bbvote_desc` (
  `vote_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_text` text NOT NULL,
  `vote_start` int(11) NOT NULL default '0',
  `vote_length` int(11) NOT NULL default '0',
  PRIMARY KEY  (`vote_id`),
  KEY `topic_id` (`topic_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbvote_desc
#


#
# Table structure for table kayapo_bbvote_results
#

DROP TABLE IF EXISTS `kayapo_bbvote_results`;
CREATE TABLE `kayapo_bbvote_results` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_option_id` tinyint(4) unsigned NOT NULL default '0',
  `vote_option_text` varchar(255) NOT NULL default '',
  `vote_result` int(11) NOT NULL default '0',
  KEY `vote_option_id` (`vote_option_id`),
  KEY `vote_id` (`vote_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbvote_results
#


#
# Table structure for table kayapo_bbvote_voters
#

DROP TABLE IF EXISTS `kayapo_bbvote_voters`;
CREATE TABLE `kayapo_bbvote_voters` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_user_id` mediumint(8) NOT NULL default '0',
  `vote_user_ip` char(8) NOT NULL default '',
  KEY `vote_id` (`vote_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbvote_voters
#


#
# Table structure for table kayapo_bbwords
#

DROP TABLE IF EXISTS `kayapo_bbwords`;
CREATE TABLE `kayapo_bbwords` (
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word` char(100) NOT NULL default '',
  `replacement` char(100) NOT NULL default '',
  PRIMARY KEY  (`word_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_bbwords
#


#
# Table structure for table kayapo_blocks
#

DROP TABLE IF EXISTS `kayapo_blocks`;
CREATE TABLE `kayapo_blocks` (
  `bid` int(10) NOT NULL auto_increment,
  `bkey` varchar(15) NOT NULL default '',
  `title` varchar(60) NOT NULL default '',
  `content` text NOT NULL,
  `url` varchar(200) NOT NULL default '',
  `bposition` char(1) NOT NULL default '',
  `weight` int(10) NOT NULL default '1',
  `active` int(1) NOT NULL default '1',
  `refresh` int(10) NOT NULL default '0',
  `time` varchar(14) NOT NULL default '0',
  `blanguage` varchar(30) NOT NULL default '',
  `blockfile` varchar(255) NOT NULL default '',
  `view` int(1) NOT NULL default '0',
  `groups` text NOT NULL,
  `expire` varchar(14) NOT NULL default '0',
  `action` char(1) NOT NULL default '',
  `subscription` int(1) NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`),
  KEY `title` (`title`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_blocks
#

INSERT INTO `kayapo_blocks` VALUES (2,'admin','Administração','<strong><big>·</big></strong> <a href=\"admin.php\">Menu de Administração</a><br>\r\n<strong><big>·</big></strong> <a href=\"admin.php?op=FCKadminStory\">Nova Notícia</a><br>\r\n<strong><big>·</big></strong> <a href=\"admin.php?op=create\">Alterar Enquete</a><br>\r\n<strong><big>·</big></strong> <a href=\"admin.php?op=content\">Inserir Conteúdo</a><br>\r\n<strong><big>·</big></strong> <a href=\"admin.php?op=logout\">Logout</a><center>','','l',1,0,0,'985591188','','',2,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (5,'userbox','Bloco do Usuário','','','r',1,1,0,'','','',1,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (6,'','Enquete','','','r',5,1,0,'','','block-Survey.php',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (9,'','Login','','','l',2,1,0,'','','block-User_Info2.php',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (10,'','Eventos','','','l',4,1,0,'','','block-Calendar3.php',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (11,'','Menu','<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\r\n<html>\r\n<head>\r\n<title>Documento sem título</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">\r\n</head>\r\n\r\n<body>\r\n<LINK href=\"default.css\" type=text/css rel=stylesheet>\r\n<body bgcolor=\"#F2F1ED\">\r\n<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr>\r\n    <td width=\"160\" height=\"20\" bgcolor=\"#FFFFFF\">\r\n      <img src=\"gues.gif\" width=\"16\" height=\"16\"> <B> Home</B><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"index.php\" target=_top>Home</a></strong><BR>\r\n      <BR>\r\n      <img src=\"gues.gif\" width=\"16\" height=\"16\"> <B> Município</B><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"index.php\">Simbolos</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"index.php\">Informações</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"index.php\">Localização</a><BR> \r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"index.php\">Prefeitura</a> \r\n      <BR>\r\n      <BR>\r\n      <img src=\"gues.gif\" width=\"16\" height=\"16\"> <B> Notícias</B><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"modules.php?name=Stories_Archive\">Notícias</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"modules.php?name=FCKeditor\">Enviar \r\n      Notícia</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"modules.php?name=Surveys\">Enquetes</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"modules.php?name=Calendar\">Eventos</a><BR>\r\n      <BR>\r\n      <img src=\"gues.gif\" width=\"16\" height=\"16\"> <B> Outros</B><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"modules.php?name=Statistics\">Estatísticas</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"modules.php?name=Top\">Top \r\n      10</a><BR>\r\n      <img src=\"setaco.gif\" width=\"9\" height=\"9\"> <a href=\"index.php\">Contatos</a><BR><BR>\r\n	   </td>\r\n  </tr></table>\r\n</body>\r\n</html>\r\n','','l',3,1,0,'','','',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (12,'','Acesse sua Conta','<p align=\"center\"><a href=\"modules.php?name=Your_Account\"><img src=\"xp74.jpg\"></a></p>','','r',3,1,0,'','','',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (13,'','Notícias Online','<p align=\"left\"><MARQUEE behavior= \"scroll\"  direction= \"up\" height=\"213\" width=\"174\" scrollamount= \"2\" scrolldelay= \"80\" onmouseover=\'this.stop()\' onmouseout=\'this.start()\'><iframe align=\"left\"  src=\"news2.php\" width=\"174\" height=\"280\" frameborder=\"0\" scrolling=\"no\"></iframe></marquee></p>','','r',6,1,0,'','','',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (14,'','Cadastros','','','r',2,1,0,'','','block-User_Info22.php',0,'','0','d',0);
INSERT INTO `kayapo_blocks` VALUES (15,'','Online','','','r',4,1,3600,'','','block-User_Info24.php',0,'','0','d',0);

#
# Table structure for table kayapo_cnbya_config
#

DROP TABLE IF EXISTS `kayapo_cnbya_config`;
CREATE TABLE `kayapo_cnbya_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext,
  UNIQUE KEY `config_name` (`config_name`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_cnbya_config
#

INSERT INTO `kayapo_cnbya_config` VALUES ('sendaddmail','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('senddeletemail','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowuserdelete','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowusertheme','1');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowuserreg','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowmailchange','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('emailvalidate','1');
INSERT INTO `kayapo_cnbya_config` VALUES ('requireadmin','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('servermail','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('useactivate','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('usegfxcheck','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('autosuspend','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('perpage','100');
INSERT INTO `kayapo_cnbya_config` VALUES ('expiring','86400');
INSERT INTO `kayapo_cnbya_config` VALUES ('nick_min','4');
INSERT INTO `kayapo_cnbya_config` VALUES ('nick_max','20');
INSERT INTO `kayapo_cnbya_config` VALUES ('pass_min','4');
INSERT INTO `kayapo_cnbya_config` VALUES ('pass_max','20');
INSERT INTO `kayapo_cnbya_config` VALUES ('bad_mail','mysite.com\r\nyoursite.com');
INSERT INTO `kayapo_cnbya_config` VALUES ('bad_nick','adm\r\nadmin\r\nanonimo\r\nanonymous\r\nanónimo\r\ngod\r\nlinux\r\nnobody\r\noperator\r\nroot\r\nstaff\r\nwebmaster');
INSERT INTO `kayapo_cnbya_config` VALUES ('coppa','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('tos','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('tosall','1');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookiecheck','1');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookiecleaner','1');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookietimelife','-');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookiepath','');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookieinactivity','-');
INSERT INTO `kayapo_cnbya_config` VALUES ('autosuspendmain','0');
INSERT INTO `kayapo_cnbya_config` VALUES ('codesize','6');
INSERT INTO `kayapo_cnbya_config` VALUES ('version','4.4.0 b2');

#
# Table structure for table kayapo_cnbya_field
#

DROP TABLE IF EXISTS `kayapo_cnbya_field`;
CREATE TABLE `kayapo_cnbya_field` (
  `fid` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default 'field',
  `value` varchar(255) default NULL,
  `size` int(3) default NULL,
  `need` int(1) NOT NULL default '1',
  `pos` int(3) default NULL,
  `public` int(1) NOT NULL default '1',
  PRIMARY KEY  (`fid`),
  KEY `fid` (`fid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_cnbya_field
#


#
# Table structure for table kayapo_cnbya_value
#

DROP TABLE IF EXISTS `kayapo_cnbya_value`;
CREATE TABLE `kayapo_cnbya_value` (
  `vid` int(10) NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `fid` int(10) NOT NULL default '0',
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`vid`),
  KEY `vid` (`vid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_cnbya_value
#


#
# Table structure for table kayapo_cnbya_value_temp
#

DROP TABLE IF EXISTS `kayapo_cnbya_value_temp`;
CREATE TABLE `kayapo_cnbya_value_temp` (
  `vid` int(10) NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `fid` int(10) NOT NULL default '0',
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`vid`),
  KEY `vid` (`vid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_cnbya_value_temp
#


#
# Table structure for table kayapo_comments
#

DROP TABLE IF EXISTS `kayapo_comments`;
CREATE TABLE `kayapo_comments` (
  `tid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) default NULL,
  `url` varchar(60) default NULL,
  `host_name` varchar(60) default NULL,
  `subject` varchar(85) NOT NULL default '',
  `comment` text NOT NULL,
  `score` tinyint(4) NOT NULL default '0',
  `reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`),
  KEY `sid` (`sid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_comments
#


#
# Table structure for table kayapo_config
#

DROP TABLE IF EXISTS `kayapo_config`;
CREATE TABLE `kayapo_config` (
  `sitename` varchar(255) NOT NULL default '',
  `nukeurl` varchar(255) NOT NULL default '',
  `site_logo` varchar(255) NOT NULL default '',
  `slogan` varchar(255) NOT NULL default '',
  `startdate` varchar(50) NOT NULL default '',
  `adminmail` varchar(255) NOT NULL default '',
  `anonpost` tinyint(1) NOT NULL default '0',
  `Default_Theme` varchar(255) NOT NULL default '',
  `foot1` text NOT NULL,
  `foot2` text NOT NULL,
  `foot3` text NOT NULL,
  `commentlimit` int(9) NOT NULL default '4096',
  `anonymous` varchar(255) NOT NULL default '',
  `minpass` tinyint(1) NOT NULL default '5',
  `pollcomm` tinyint(1) NOT NULL default '1',
  `articlecomm` tinyint(1) NOT NULL default '1',
  `broadcast_msg` tinyint(1) NOT NULL default '1',
  `my_headlines` tinyint(1) NOT NULL default '1',
  `top` int(3) NOT NULL default '10',
  `storyhome` int(2) NOT NULL default '10',
  `user_news` tinyint(1) NOT NULL default '1',
  `oldnum` int(2) NOT NULL default '30',
  `ultramode` tinyint(1) NOT NULL default '0',
  `banners` tinyint(1) NOT NULL default '1',
  `backend_title` varchar(255) NOT NULL default '',
  `backend_language` varchar(10) NOT NULL default '',
  `language` varchar(100) NOT NULL default '',
  `locale` varchar(10) NOT NULL default '',
  `multilingual` tinyint(1) NOT NULL default '0',
  `useflags` tinyint(1) NOT NULL default '0',
  `notify` tinyint(1) NOT NULL default '0',
  `notify_email` varchar(255) NOT NULL default '',
  `notify_subject` varchar(255) NOT NULL default '',
  `notify_message` varchar(255) NOT NULL default '',
  `notify_from` varchar(255) NOT NULL default '',
  `moderate` tinyint(1) NOT NULL default '0',
  `admingraphic` tinyint(1) NOT NULL default '1',
  `httpref` tinyint(1) NOT NULL default '1',
  `httprefmax` int(5) NOT NULL default '1000',
  `CensorMode` tinyint(1) NOT NULL default '3',
  `CensorReplace` varchar(10) NOT NULL default '',
  `copyright` text NOT NULL,
  `Version_Num` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`sitename`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_config
#

INSERT INTO `kayapo_config` VALUES ('Ira&iacute; - RS','http://www.folhanativa.com.br/nativa','','Ira&iacute; - RS','Julho de 2006','desenvolvimento@speedrs.com.br',0,'PH2RED','','','',4096,'Visitante',5,1,1,0,0,10,10,0,30,0,1,'Ira&iacute; - RS','pt-br','brazilian','pt_BR',0,0,0,'desenvolvimento@speedrs.com.br','Algu&eacute;m enviou uma not&iacute;cia!!!','Olá\r\n\\n\\n\r\nAlguém enviou uma notícia para tal!','webmaster',0,1,1,2000,3,'*****','PHP-Nuke Copyright &copy; 2004 by Francisco Burzi. This is free software, and you may redistribute it under the <a href=\"http://phpnuke.org/files/gpl.txt\"><font class=\"footmsg_l\">GPL</font></a>. PHP-Nuke comes with absolutely no warranty, for details, see the <a href=\"http://phpnuke.org/files/gpl.txt\"><font class=\"footmsg_l\">license</font></a>.','7.5 Kayapó');

#
# Table structure for table kayapo_confirm
#

DROP TABLE IF EXISTS `kayapo_confirm`;
CREATE TABLE `kayapo_confirm` (
  `confirm_id` char(32) NOT NULL default '',
  `session_id` char(32) NOT NULL default '',
  `code` char(6) NOT NULL default '',
  PRIMARY KEY  (`session_id`,`confirm_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_confirm
#


#
# Table structure for table kayapo_counter
#

DROP TABLE IF EXISTS `kayapo_counter`;
CREATE TABLE `kayapo_counter` (
  `type` varchar(80) NOT NULL default '',
  `var` varchar(80) NOT NULL default '',
  `count` int(10) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_counter
#

INSERT INTO `kayapo_counter` VALUES ('total','hits',732);
INSERT INTO `kayapo_counter` VALUES ('browser','WebTV',0);
INSERT INTO `kayapo_counter` VALUES ('browser','Lynx',0);
INSERT INTO `kayapo_counter` VALUES ('browser','MSIE',732);
INSERT INTO `kayapo_counter` VALUES ('browser','Opera',0);
INSERT INTO `kayapo_counter` VALUES ('browser','Konqueror',0);
INSERT INTO `kayapo_counter` VALUES ('browser','Netscape',0);
INSERT INTO `kayapo_counter` VALUES ('browser','Bot',0);
INSERT INTO `kayapo_counter` VALUES ('browser','Other',0);
INSERT INTO `kayapo_counter` VALUES ('os','Windows',732);
INSERT INTO `kayapo_counter` VALUES ('os','Linux',0);
INSERT INTO `kayapo_counter` VALUES ('os','Mac',0);
INSERT INTO `kayapo_counter` VALUES ('os','FreeBSD',0);
INSERT INTO `kayapo_counter` VALUES ('os','SunOS',0);
INSERT INTO `kayapo_counter` VALUES ('os','IRIX',0);
INSERT INTO `kayapo_counter` VALUES ('os','BeOS',0);
INSERT INTO `kayapo_counter` VALUES ('os','OS/2',0);
INSERT INTO `kayapo_counter` VALUES ('os','AIX',0);
INSERT INTO `kayapo_counter` VALUES ('os','Other',0);

#
# Table structure for table kayapo_encyclopedia
#

DROP TABLE IF EXISTS `kayapo_encyclopedia`;
CREATE TABLE `kayapo_encyclopedia` (
  `eid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `elanguage` varchar(30) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `eid` (`eid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_encyclopedia
#


#
# Table structure for table kayapo_encyclopedia_text
#

DROP TABLE IF EXISTS `kayapo_encyclopedia_text`;
CREATE TABLE `kayapo_encyclopedia_text` (
  `tid` int(10) NOT NULL auto_increment,
  `eid` int(10) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `counter` int(10) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `eid` (`eid`),
  KEY `title` (`title`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_encyclopedia_text
#


#
# Table structure for table kayapo_events
#

DROP TABLE IF EXISTS `kayapo_events`;
CREATE TABLE `kayapo_events` (
  `eid` bigint(20) NOT NULL auto_increment,
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(150) default NULL,
  `time` datetime default NULL,
  `hometext` blob,
  `comments` int(11) default '0',
  `counter` mediumint(8) unsigned default NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(20) NOT NULL default '',
  `eventDate` date NOT NULL default '0000-00-00',
  `endDate` date NOT NULL default '0000-00-00',
  `startTime` time default NULL,
  `endTime` time default NULL,
  `alldayevent` int(1) NOT NULL default '0',
  `barcolor` char(1) default NULL,
  PRIMARY KEY  (`eid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_events
#


#
# Table structure for table kayapo_events_comments
#

DROP TABLE IF EXISTS `kayapo_events_comments`;
CREATE TABLE `kayapo_events_comments` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `eid` int(10) unsigned NOT NULL default '0',
  `comment` varchar(255) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(255) default NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `cid` (`cid`),
  KEY `cid_2` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_events_comments
#


#
# Table structure for table kayapo_events_queue
#

DROP TABLE IF EXISTS `kayapo_events_queue`;
CREATE TABLE `kayapo_events_queue` (
  `qid` bigint(20) NOT NULL auto_increment,
  `uid` mediumint(9) NOT NULL default '0',
  `uname` varchar(40) NOT NULL default '',
  `title` varchar(150) NOT NULL default '',
  `story` blob,
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `topic` varchar(20) NOT NULL default '',
  `eventDate` date NOT NULL default '0000-00-00',
  `endDate` date NOT NULL default '0000-00-00',
  `startTime` time default NULL,
  `endTime` time default NULL,
  `alldayevent` int(1) NOT NULL default '0',
  `barcolor` char(1) default NULL,
  PRIMARY KEY  (`qid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_events_queue
#


#
# Table structure for table kayapo_faqanswer
#

DROP TABLE IF EXISTS `kayapo_faqanswer`;
CREATE TABLE `kayapo_faqanswer` (
  `id` tinyint(4) NOT NULL auto_increment,
  `id_cat` tinyint(4) NOT NULL default '0',
  `question` varchar(255) default '',
  `answer` text,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  KEY `id_cat` (`id_cat`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_faqanswer
#


#
# Table structure for table kayapo_faqcategories
#

DROP TABLE IF EXISTS `kayapo_faqcategories`;
CREATE TABLE `kayapo_faqcategories` (
  `id_cat` tinyint(3) NOT NULL auto_increment,
  `categories` varchar(255) default NULL,
  `flanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id_cat`),
  KEY `id_cat` (`id_cat`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_faqcategories
#


#
# Table structure for table kayapo_gallery_categories
#

DROP TABLE IF EXISTS `kayapo_gallery_categories`;
CREATE TABLE `kayapo_gallery_categories` (
  `gallid` int(11) NOT NULL auto_increment,
  `gallname` varchar(30) default NULL,
  `gallimg` varchar(50) default NULL,
  `galloc` blob,
  `description` blob,
  `parent` int(11) default NULL,
  `visible` int(11) default NULL,
  `template` int(11) default NULL,
  `thumbwidth` int(11) default NULL,
  `numcol` int(11) default NULL,
  `total` int(11) default NULL,
  `lastadd` date default NULL,
  PRIMARY KEY  (`gallid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_categories
#

INSERT INTO `kayapo_gallery_categories` VALUES (2,'Kayapo','logo.gif','kayapo','Imagens de Índios Kayapós.',-1,2,0,135,3,1,'2004-12-21');

#
# Table structure for table kayapo_gallery_comments
#

DROP TABLE IF EXISTS `kayapo_gallery_comments`;
CREATE TABLE `kayapo_gallery_comments` (
  `cid` int(11) NOT NULL auto_increment,
  `pid` int(11) default NULL,
  `comment` blob,
  `date` datetime default NULL,
  `name` varchar(255) default NULL,
  `member` int(11) default NULL,
  PRIMARY KEY  (`cid`),
  KEY `pid` (`pid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_comments
#

INSERT INTO `kayapo_gallery_comments` VALUES (1,1,'cool art','2000-12-19 12:18:53','dgrabows',0);
INSERT INTO `kayapo_gallery_comments` VALUES (2,1,'Good job but could be better','2001-05-18 17:50:04','MarsIsHere',0);
INSERT INTO `kayapo_gallery_comments` VALUES (3,1,'Et voilà!!!','2001-05-18 17:58:51','Webmaster',1);
INSERT INTO `kayapo_gallery_comments` VALUES (4,1,'rororo','2001-09-24 21:18:10','tororo',0);

#
# Table structure for table kayapo_gallery_media_class
#

DROP TABLE IF EXISTS `kayapo_gallery_media_class`;
CREATE TABLE `kayapo_gallery_media_class` (
  `id` int(11) NOT NULL auto_increment,
  `class` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_media_class
#

INSERT INTO `kayapo_gallery_media_class` VALUES (1,'Image');
INSERT INTO `kayapo_gallery_media_class` VALUES (2,'Audio');
INSERT INTO `kayapo_gallery_media_class` VALUES (3,'Video');

#
# Table structure for table kayapo_gallery_media_types
#

DROP TABLE IF EXISTS `kayapo_gallery_media_types`;
CREATE TABLE `kayapo_gallery_media_types` (
  `extension` varchar(10) NOT NULL default '',
  `description` blob,
  `filetype` varchar(20) default NULL,
  `displaytag` blob,
  `thumbnail` varchar(255) default NULL,
  PRIMARY KEY  (`extension`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_media_types
#

INSERT INTO `kayapo_gallery_media_types` VALUES ('avi','Video/AVI','3','<embed src=\"<:FILENAME:>\" width =\"640\" height=\"480\" zoom=\"100%\" controller=\"true\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" type=\"application/x-mplayer2\"></embed>','video_avi.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('bmp','Image/BMP','1','<img src=\"<:FILENAME:>\" border=\"0\" alt=\"<:DESCRIPTION:>\">','image_gif.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('gif','Image/GIF','1','<img src=\"<:FILENAME:>\" border=\"1\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">','image_gif.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('jpg','Image/JPEG','1','<img src=\"<:FILENAME:>\" border=\"1\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">','image_jpg.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mid','Audio/MIDI','2','<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"false\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" </embed>','audio_mid.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mov','Video/Quicktime','3','<embed controller=\"true\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>','video_mov.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mp3','Audio/MP3','2','<embed src=\"<:FILENAME:>\" type=\"application/x-mplayer2\" hidden=\"false\" autostart=\"true\" loop=\"false\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" </embed>','audio_mp3.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mpg','Video/MPEG','3','<embed src=\"<:FILENAME:>\" width =\"640\" height=\"480\" zoom=\"100%\" controller=\"true\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" type=\"application/x-mplayer2\"></embed>','video_mpg.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('png','Image/PNG','1','<img src=\"<:FILENAME:>\" border=\"1\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">','image_png.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('swf','Video/Flash','3','<embed src=\"<:FILENAME:>\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" play=\"true\" loop=\"true\" quality=\"high\" scale=\"showall\" menu=\"true\"></embed>','video_swf.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('wma','Audio/WMA','2','<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"false\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" </embed>','audio_mid.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('wmv','Video/Movie','3','<embed src=\"<:FILENAME:>\"  width =\"640\" height=\"480\" controller=\"true\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" type=\"application/x-mplayer2\"></embed>','video_mpg.gif');

#
# Table structure for table kayapo_gallery_pictures
#

DROP TABLE IF EXISTS `kayapo_gallery_pictures`;
CREATE TABLE `kayapo_gallery_pictures` (
  `pid` int(11) NOT NULL auto_increment,
  `gid` int(11) default NULL,
  `img` varchar(255) default NULL,
  `counter` int(11) default NULL,
  `submitter` varchar(24) default NULL,
  `date` datetime default NULL,
  `name` varchar(255) default NULL,
  `description` blob,
  `votes` int(11) default NULL,
  `rate` double default NULL,
  `extension` varchar(10) default NULL,
  `width` int(11) default NULL,
  `height` int(11) default NULL,
  PRIMARY KEY  (`pid`),
  KEY `gid` (`gid`),
  KEY `counter` (`counter`),
  KEY `date` (`date`),
  KEY `votes` (`votes`),
  KEY `rate` (`rate`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_pictures
#

INSERT INTO `kayapo_gallery_pictures` VALUES (7,2,'kayapo-card01.jpg',16,'Kayapó','2004-12-21 10:52:05','Kayapo01','Imagem de um jovem índio Kayapó.\r\n\r\nEsta imagem é cortesia de Gerhard Prokop.',0,0,'jpg',430,600);

#
# Table structure for table kayapo_gallery_pictures_newpicture
#

DROP TABLE IF EXISTS `kayapo_gallery_pictures_newpicture`;
CREATE TABLE `kayapo_gallery_pictures_newpicture` (
  `pid` int(11) NOT NULL auto_increment,
  `gid` int(11) default NULL,
  `img` varchar(255) default NULL,
  `counter` int(11) default NULL,
  `submitter` varchar(24) default NULL,
  `date` datetime default NULL,
  `name` varchar(255) default NULL,
  `description` blob,
  `votes` int(11) default NULL,
  `rate` double default NULL,
  `extension` varchar(10) default NULL,
  `width` int(11) default NULL,
  `height` int(11) default NULL,
  PRIMARY KEY  (`pid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_pictures_newpicture
#


#
# Table structure for table kayapo_gallery_rate_check
#

DROP TABLE IF EXISTS `kayapo_gallery_rate_check`;
CREATE TABLE `kayapo_gallery_rate_check` (
  `ip` varchar(20) default NULL,
  `time` varchar(14) default NULL,
  `pid` int(11) default NULL,
  KEY `ip` (`ip`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_rate_check
#


#
# Table structure for table kayapo_gallery_template_types
#

DROP TABLE IF EXISTS `kayapo_gallery_template_types`;
CREATE TABLE `kayapo_gallery_template_types` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `type` int(11) default NULL,
  `templateCategory` blob,
  `templatePictures` blob,
  `templateCSS` blob,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_gallery_template_types
#

INSERT INTO `kayapo_gallery_template_types` VALUES (1,'Default Main Page Template',1,'<table align=\"center\">\r\n<tr>\r\n	<td colspan=\"2\">\r\n		<:GALLNAME:>\r\n	</td>\r\n</tr>\r\n<tr>\r\n	<td>\r\n		<:IMAGE:>\r\n	</td>\r\n	<td valign=\"top\" align=\"left\">\r\n		<:DESCRIPTION:>\r\n	</td>\r\n</tr>\r\n</table>','2','.common_text_black {text-color:#000000}\r\n.common_text_white {text-color:#ffffff}');
INSERT INTO `kayapo_gallery_template_types` VALUES (2,'Default',2,'<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n	<td>\r\n		<:IMAGE:>\r\n	</td>\r\n	<td valign=\"top\">\r\n		<p>\r\n				<table>\r\n				<tr>\r\n					<td align=\"center\">\r\n						<:DATE:>\r\n					</td>\r\n					<td align=\"center\">\r\n						<:RATE:>\r\n					</td>\r\n					<td align=\"center\">\r\n						<:HITS:>\r\n					</td>\r\n					<td align=\"center\">\r\n						<:NEW:>\r\n					</td>\r\n				</tr>\r\n				</table>\r\n		</p>\r\n		<p>\r\n				<:DESCRIPTION:>\r\n		</p>\r\n		<p>\r\n				<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\r\n		</p>\r\n	</td>\r\n</tr>\r\n</table>','<table>\r\n<tr>\r\n	<td valign=\"top\" align=\"center\">\r\n		<:NAMESIZE:>\r\n		<br><br>\r\n		<TABLE CellPadding=\"0\" CellSpacing=\"0\">\r\n		<TR>\r\n			<TD valign=\"top\">\r\n				<:SUBMITTER:>\r\n				<:DATE:>\r\n				<:HITS:>\r\n				<:RATE:>\r\n			</TD>\r\n		</TR>\r\n		</table><br>\r\n		<:RATINGBAR:><br>\r\n		<:POSTCARD:><br>\r\n		<:DOWNLOAD:><br>\r\n		<:PRINT:>\r\n	</td>\r\n	<td width=\"80%\" align=\"center\">\r\n		<:IMAGE:>\r\n	</td>\r\n</tr>\r\n<tr>\r\n	<td colspan=\"2\"><:DESCRIPTION:></td>\r\n</tr>\r\n<tr>\r\n	<td colspan=\"2\">\r\n		<:COMMENTS:>\r\n	</td>\r\n</tr>\r\n</table>','.common_text_black {text-color:#000000}\r\n.common_text_white {text-color:#ffffff}');

#
# Table structure for table kayapo_groups
#

DROP TABLE IF EXISTS `kayapo_groups`;
CREATE TABLE `kayapo_groups` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `points` int(10) NOT NULL default '0',
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_groups
#


#
# Table structure for table kayapo_groups_points
#

DROP TABLE IF EXISTS `kayapo_groups_points`;
CREATE TABLE `kayapo_groups_points` (
  `id` int(10) NOT NULL auto_increment,
  `points` int(10) NOT NULL default '0',
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_groups_points
#

INSERT INTO `kayapo_groups_points` VALUES (1,0);
INSERT INTO `kayapo_groups_points` VALUES (2,0);
INSERT INTO `kayapo_groups_points` VALUES (3,0);
INSERT INTO `kayapo_groups_points` VALUES (4,0);
INSERT INTO `kayapo_groups_points` VALUES (5,0);
INSERT INTO `kayapo_groups_points` VALUES (6,0);
INSERT INTO `kayapo_groups_points` VALUES (7,0);
INSERT INTO `kayapo_groups_points` VALUES (8,0);
INSERT INTO `kayapo_groups_points` VALUES (9,0);
INSERT INTO `kayapo_groups_points` VALUES (10,0);
INSERT INTO `kayapo_groups_points` VALUES (11,0);
INSERT INTO `kayapo_groups_points` VALUES (12,0);
INSERT INTO `kayapo_groups_points` VALUES (13,0);
INSERT INTO `kayapo_groups_points` VALUES (14,0);
INSERT INTO `kayapo_groups_points` VALUES (15,0);
INSERT INTO `kayapo_groups_points` VALUES (16,0);
INSERT INTO `kayapo_groups_points` VALUES (17,0);
INSERT INTO `kayapo_groups_points` VALUES (18,0);
INSERT INTO `kayapo_groups_points` VALUES (19,0);
INSERT INTO `kayapo_groups_points` VALUES (20,0);
INSERT INTO `kayapo_groups_points` VALUES (21,0);

#
# Table structure for table kayapo_headlines
#

DROP TABLE IF EXISTS `kayapo_headlines`;
CREATE TABLE `kayapo_headlines` (
  `hid` int(11) NOT NULL auto_increment,
  `sitename` varchar(30) NOT NULL default '',
  `headlinesurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`hid`),
  KEY `hid` (`hid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_headlines
#

INSERT INTO `kayapo_headlines` VALUES (1,'AbsoluteGames','http://files.gameaholic.com/agfa.rdf');
INSERT INTO `kayapo_headlines` VALUES (2,'BSDToday','http://www.bsdtoday.com/backend/bt.rdf');
INSERT INTO `kayapo_headlines` VALUES (3,'BrunchingShuttlecocks','http://www.brunching.com/brunching.rdf');
INSERT INTO `kayapo_headlines` VALUES (4,'DailyDaemonNews','http://daily.daemonnews.org/ddn.rdf.php3');
INSERT INTO `kayapo_headlines` VALUES (5,'DigitalTheatre','http://www.dtheatre.com/backend.php3?xml=yes');
INSERT INTO `kayapo_headlines` VALUES (6,'DotKDE','http://dot.kde.org/rdf');
INSERT INTO `kayapo_headlines` VALUES (7,'FreeDOS','http://www.freedos.org/channels/rss.cgi');
INSERT INTO `kayapo_headlines` VALUES (8,'Freshmeat','http://freshmeat.net/backend/fm.rdf');
INSERT INTO `kayapo_headlines` VALUES (9,'Gnome Desktop','http://www.gnomedesktop.org/backend.php');
INSERT INTO `kayapo_headlines` VALUES (10,'HappyPenguin','http://happypenguin.org/html/news.rdf');
INSERT INTO `kayapo_headlines` VALUES (11,'HollywoodBitchslap','http://hollywoodbitchslap.com/hbs.rdf');
INSERT INTO `kayapo_headlines` VALUES (12,'Learning Linux','http://www.learninglinux.com/backend.php');
INSERT INTO `kayapo_headlines` VALUES (13,'LinuxCentral','http://linuxcentral.com/backend/lcnew.rdf');
INSERT INTO `kayapo_headlines` VALUES (14,'LinuxJournal','http://www.linuxjournal.com/news.rss');
INSERT INTO `kayapo_headlines` VALUES (15,'LinuxWeelyNews','http://lwn.net/headlines/rss');
INSERT INTO `kayapo_headlines` VALUES (16,'Listology','http://listology.com/recent.rdf');
INSERT INTO `kayapo_headlines` VALUES (17,'MozillaNewsBot','http://www.mozilla.org/newsbot/newsbot.rdf');
INSERT INTO `kayapo_headlines` VALUES (18,'NewsForge','http://www.newsforge.com/newsforge.rdf');
INSERT INTO `kayapo_headlines` VALUES (19,'NukeResources','http://www.nukeresources.com/backend.php');
INSERT INTO `kayapo_headlines` VALUES (20,'NukeScripts','http://www.nukescripts.net/backend.php');
INSERT INTO `kayapo_headlines` VALUES (21,'PDABuzz','http://www.pdabuzz.com/netscape.txt');
INSERT INTO `kayapo_headlines` VALUES (22,'PHP-Nuke','http://phpnuke.org/backend.php');
INSERT INTO `kayapo_headlines` VALUES (23,'PHP.net','http://www.php.net/news.rss');
INSERT INTO `kayapo_headlines` VALUES (24,'PHPBuilder','http://phpbuilder.com/rss_feed.php');
INSERT INTO `kayapo_headlines` VALUES (25,'PerlMonks','http://www.perlmonks.org/headlines.rdf');
INSERT INTO `kayapo_headlines` VALUES (26,'TheNextLevel','http://www.the-nextlevel.com/rdf/tnl.rdf');
INSERT INTO `kayapo_headlines` VALUES (27,'WebReference','http://webreference.com/webreference.rdf');

#
# Table structure for table kayapo_journal
#

DROP TABLE IF EXISTS `kayapo_journal`;
CREATE TABLE `kayapo_journal` (
  `jid` int(11) NOT NULL auto_increment,
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(80) default NULL,
  `bodytext` text NOT NULL,
  `mood` varchar(48) NOT NULL default '',
  `pdate` varchar(48) NOT NULL default '',
  `ptime` varchar(48) NOT NULL default '',
  `status` varchar(48) NOT NULL default '',
  `mtime` varchar(48) NOT NULL default '',
  `mdate` varchar(48) NOT NULL default '',
  PRIMARY KEY  (`jid`),
  KEY `jid` (`jid`),
  KEY `aid` (`aid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_journal
#


#
# Table structure for table kayapo_journal_comments
#

DROP TABLE IF EXISTS `kayapo_journal_comments`;
CREATE TABLE `kayapo_journal_comments` (
  `cid` int(11) NOT NULL auto_increment,
  `rid` varchar(48) NOT NULL default '',
  `aid` varchar(30) NOT NULL default '',
  `comment` text NOT NULL,
  `pdate` varchar(48) NOT NULL default '',
  `ptime` varchar(48) NOT NULL default '',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`),
  KEY `rid` (`rid`),
  KEY `aid` (`aid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_journal_comments
#


#
# Table structure for table kayapo_journal_stats
#

DROP TABLE IF EXISTS `kayapo_journal_stats`;
CREATE TABLE `kayapo_journal_stats` (
  `id` int(11) NOT NULL auto_increment,
  `joid` varchar(48) NOT NULL default '',
  `nop` varchar(48) NOT NULL default '',
  `ldp` varchar(24) NOT NULL default '',
  `ltp` varchar(24) NOT NULL default '',
  `micro` varchar(128) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_journal_stats
#


#
# Table structure for table kayapo_links_categories
#

DROP TABLE IF EXISTS `kayapo_links_categories`;
CREATE TABLE `kayapo_links_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_links_categories
#


#
# Table structure for table kayapo_links_editorials
#

DROP TABLE IF EXISTS `kayapo_links_editorials`;
CREATE TABLE `kayapo_links_editorials` (
  `linkid` int(11) NOT NULL default '0',
  `adminid` varchar(60) NOT NULL default '',
  `editorialtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `editorialtext` text NOT NULL,
  `editorialtitle` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`linkid`),
  KEY `linkid` (`linkid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_links_editorials
#


#
# Table structure for table kayapo_links_links
#

DROP TABLE IF EXISTS `kayapo_links_links`;
CREATE TABLE `kayapo_links_links` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime default NULL,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `hits` int(11) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `linkratingsummary` double(6,4) NOT NULL default '0.0000',
  `totalvotes` int(11) NOT NULL default '0',
  `totalcomments` int(11) NOT NULL default '0',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_links_links
#


#
# Table structure for table kayapo_links_modrequest
#

DROP TABLE IF EXISTS `kayapo_links_modrequest`;
CREATE TABLE `kayapo_links_modrequest` (
  `requestid` int(11) NOT NULL auto_increment,
  `lid` int(11) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `modifysubmitter` varchar(60) NOT NULL default '',
  `brokenlink` int(3) NOT NULL default '0',
  PRIMARY KEY  (`requestid`),
  UNIQUE KEY `requestid` (`requestid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_links_modrequest
#


#
# Table structure for table kayapo_links_newlink
#

DROP TABLE IF EXISTS `kayapo_links_newlink`;
CREATE TABLE `kayapo_links_newlink` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `submitter` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_links_newlink
#


#
# Table structure for table kayapo_links_votedata
#

DROP TABLE IF EXISTS `kayapo_links_votedata`;
CREATE TABLE `kayapo_links_votedata` (
  `ratingdbid` int(11) NOT NULL auto_increment,
  `ratinglid` int(11) NOT NULL default '0',
  `ratinguser` varchar(60) NOT NULL default '',
  `rating` int(11) NOT NULL default '0',
  `ratinghostname` varchar(60) NOT NULL default '',
  `ratingcomments` text NOT NULL,
  `ratingtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ratingdbid`),
  KEY `ratingdbid` (`ratingdbid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_links_votedata
#


#
# Table structure for table kayapo_main
#

DROP TABLE IF EXISTS `kayapo_main`;
CREATE TABLE `kayapo_main` (
  `main_module` varchar(255) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table kayapo_main
#

INSERT INTO `kayapo_main` VALUES ('News');

#
# Table structure for table kayapo_message
#

DROP TABLE IF EXISTS `kayapo_message`;
CREATE TABLE `kayapo_message` (
  `mid` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `content` text NOT NULL,
  `date` varchar(14) NOT NULL default '',
  `expire` int(7) NOT NULL default '0',
  `active` int(1) NOT NULL default '1',
  `view` int(1) NOT NULL default '1',
  `groups` text NOT NULL,
  `mlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  UNIQUE KEY `mid` (`mid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_message
#


#
# Table structure for table kayapo_modules
#

DROP TABLE IF EXISTS `kayapo_modules`;
CREATE TABLE `kayapo_modules` (
  `mid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `custom_title` varchar(255) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  `view` int(1) NOT NULL default '0',
  `groups` text NOT NULL,
  `inmenu` tinyint(1) NOT NULL default '1',
  `mod_group` int(10) default '0',
  `admins` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  KEY `mid` (`mid`),
  KEY `title` (`title`),
  KEY `custom_title` (`custom_title`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_modules
#

INSERT INTO `kayapo_modules` VALUES (1,'AvantGo','AvantGo',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (2,'Content','Conteúdo',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (3,'Downloads','Downloads',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (4,'Encyclopedia','Enciclopédia',0,0,'',1,0,'Folha Nativa,');
INSERT INTO `kayapo_modules` VALUES (5,'FAQ','Perguntas Frequentes',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (6,'Feedback','Contate-nos',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (7,'Forums','Foros',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (8,'Journal','Diário de Usuário',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (9,'Members_List','Lista de Usuários',1,1,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (10,'News','Notícias',1,0,'',1,0,'Folha Nativa,');
INSERT INTO `kayapo_modules` VALUES (11,'Private_Messages','Mensagens Privadas',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (12,'Recommend_Us','Recomende-nos',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (13,'Reviews','Revisões',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (15,'Statistics','Estatísticas',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (16,'Stories_Archive','Arquivo de Notícias',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (18,'Surveys','Enquetes',1,0,'',1,0,'Folha Nativa,');
INSERT INTO `kayapo_modules` VALUES (19,'Top','Top 10',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (20,'Topics','Tópicos',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (21,'Web_Links','Web Links',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (22,'Your_Account','Sua Conta',1,0,'',1,0,'Folha Nativa,');
INSERT INTO `kayapo_modules` VALUES (23,'My_eGallery','Galeria de Fotos',0,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (24,'Blocked_IPs','IPs Bloqueados',0,2,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (25,'Blocked_Ranges','Faixas de IPs Bloqueados',0,2,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (26,'Blocked_Referers','Referenciadores Bloqueados',0,2,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (27,'Groups','Grupos de Usuários',1,0,'',1,0,'');
INSERT INTO `kayapo_modules` VALUES (29,'Recherches','Busca Avançada',1,0,'1',1,0,'');
INSERT INTO `kayapo_modules` VALUES (30,'FCKeditor','Enviar Notícia',1,0,'1',1,0,'Folha Nativa,');
INSERT INTO `kayapo_modules` VALUES (31,'Calendar','Calendário',1,0,'1',1,0,'Folha Nativa,');
INSERT INTO `kayapo_modules` VALUES (32,'Submit_Downloads','Enviar um Arquivo',0,1,'1',1,0,'');
INSERT INTO `kayapo_modules` VALUES (33,'Banner_Ads','Publicidade',1,0,'',1,0,'');

#
# Table structure for table kayapo_nsnba_banners
#

DROP TABLE IF EXISTS `kayapo_nsnba_banners`;
CREATE TABLE `kayapo_nsnba_banners` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `pid` tinyint(1) NOT NULL default '0',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(200) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `alttext` varchar(255) NOT NULL default '',
  `code` tinyint(1) NOT NULL default '0',
  `flash` tinyint(1) NOT NULL default '0',
  `height` int(4) NOT NULL default '60',
  `width` int(4) NOT NULL default '468',
  `datestr` date NOT NULL default '0000-00-00',
  `dateend` date NOT NULL default '0000-00-00',
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnba_banners
#

INSERT INTO `kayapo_nsnba_banners` VALUES (1,1,1,12000,9,0,'http://kayapo.phpnuke.org.br/images/banners/banner01.gif','http://kayapo.phpnuke.org.br/images/banners','CNB Kayapó - A Força do PHP-Nuke no Brasil!',0,0,60,468,'2005-01-25','2006-01-25',0);

#
# Table structure for table kayapo_nsnba_clients
#

DROP TABLE IF EXISTS `kayapo_nsnba_clients`;
CREATE TABLE `kayapo_nsnba_clients` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(25) NOT NULL default '',
  `passwd` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnba_clients
#

INSERT INTO `kayapo_nsnba_clients` VALUES (1,'CNB','webmaster@phpnuke.org.br','CNB','b15edd567fcbdbb1991dd9c39c21c86b');

#
# Table structure for table kayapo_nsnba_config
#

DROP TABLE IF EXISTS `kayapo_nsnba_config`;
CREATE TABLE `kayapo_nsnba_config` (
  `id` tinyint(1) NOT NULL auto_increment,
  `ipp` tinyint(4) NOT NULL default '20',
  `impamnt` int(6) NOT NULL default '1000',
  `usegfxcheck` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnba_config
#

INSERT INTO `kayapo_nsnba_config` VALUES (1,20,1000,0);

#
# Table structure for table kayapo_nsngd_accesses
#

DROP TABLE IF EXISTS `kayapo_nsngd_accesses`;
CREATE TABLE `kayapo_nsngd_accesses` (
  `username` varchar(60) NOT NULL default '',
  `downloads` int(11) NOT NULL default '0',
  `uploads` int(11) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_accesses
#


#
# Table structure for table kayapo_nsngd_categories
#

DROP TABLE IF EXISTS `kayapo_nsngd_categories`;
CREATE TABLE `kayapo_nsngd_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  `whoadd` tinyint(2) NOT NULL default '0',
  `uploaddir` varchar(255) NOT NULL default '',
  `canupload` tinyint(2) NOT NULL default '0',
  `active` tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`),
  KEY `title` (`title`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_categories
#


#
# Table structure for table kayapo_nsngd_config
#

DROP TABLE IF EXISTS `kayapo_nsngd_config`;
CREATE TABLE `kayapo_nsngd_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_config
#

INSERT INTO `kayapo_nsngd_config` VALUES ('admperpage','50');
INSERT INTO `kayapo_nsngd_config` VALUES ('blockunregmodify','0');
INSERT INTO `kayapo_nsngd_config` VALUES ('dateformat','D M j G:i:s T Y');
INSERT INTO `kayapo_nsngd_config` VALUES ('mostpopular','25');
INSERT INTO `kayapo_nsngd_config` VALUES ('mostpopulartrig','0');
INSERT INTO `kayapo_nsngd_config` VALUES ('perpage','10');
INSERT INTO `kayapo_nsngd_config` VALUES ('popular','500');
INSERT INTO `kayapo_nsngd_config` VALUES ('results','10');
INSERT INTO `kayapo_nsngd_config` VALUES ('show_download','0');
INSERT INTO `kayapo_nsngd_config` VALUES ('show_links_num','0');
INSERT INTO `kayapo_nsngd_config` VALUES ('usegfxcheck','0');
INSERT INTO `kayapo_nsngd_config` VALUES ('version_number','1.0.0');

#
# Table structure for table kayapo_nsngd_downloads
#

DROP TABLE IF EXISTS `kayapo_nsngd_downloads`;
CREATE TABLE `kayapo_nsngd_downloads` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `hits` int(11) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  `active` tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `title` (`title`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_downloads
#


#
# Table structure for table kayapo_nsngd_extensions
#

DROP TABLE IF EXISTS `kayapo_nsngd_extensions`;
CREATE TABLE `kayapo_nsngd_extensions` (
  `eid` int(11) NOT NULL auto_increment,
  `ext` varchar(6) NOT NULL default '',
  `file` tinyint(1) NOT NULL default '0',
  `image` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `ext` (`eid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_extensions
#

INSERT INTO `kayapo_nsngd_extensions` VALUES (1,'.ace',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (2,'.arj',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (3,'.bz',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (4,'.bz2',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (5,'.cab',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (6,'.exe',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (7,'.gif',0,1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (8,'.gz',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (9,'.iso',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (10,'.jpeg',0,1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (11,'.jpg',0,1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (12,'.lha',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (13,'.lzh',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (14,'.png',0,1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (15,'.rar',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (16,'.tar',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (17,'.tgz',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (18,'.uue',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (19,'.zip',1,0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (20,'.zoo',1,0);

#
# Table structure for table kayapo_nsngd_mods
#

DROP TABLE IF EXISTS `kayapo_nsngd_mods`;
CREATE TABLE `kayapo_nsngd_mods` (
  `rid` int(11) NOT NULL auto_increment,
  `lid` int(11) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `modifier` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `brokendownload` int(3) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  UNIQUE KEY `rid` (`rid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_mods
#


#
# Table structure for table kayapo_nsngd_new
#

DROP TABLE IF EXISTS `kayapo_nsngd_new`;
CREATE TABLE `kayapo_nsngd_new` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `submitter` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `title` (`title`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngd_new
#


#
# Table structure for table kayapo_nsngr_config
#

DROP TABLE IF EXISTS `kayapo_nsngr_config`;
CREATE TABLE `kayapo_nsngr_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngr_config
#

INSERT INTO `kayapo_nsngr_config` VALUES ('date_format','Y-m-d');
INSERT INTO `kayapo_nsngr_config` VALUES ('perpage','50');
INSERT INTO `kayapo_nsngr_config` VALUES ('script_version','1.5.0');
INSERT INTO `kayapo_nsngr_config` VALUES ('send_notice','1');

#
# Table structure for table kayapo_nsngr_groups
#

DROP TABLE IF EXISTS `kayapo_nsngr_groups`;
CREATE TABLE `kayapo_nsngr_groups` (
  `gid` int(11) NOT NULL auto_increment,
  `gname` varchar(32) NOT NULL default '',
  `gdesc` text NOT NULL,
  `gpublic` tinyint(1) NOT NULL default '0',
  `glimit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`gid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngr_groups
#

INSERT INTO `kayapo_nsngr_groups` VALUES (1,'General','',0,0);

#
# Table structure for table kayapo_nsngr_users
#

DROP TABLE IF EXISTS `kayapo_nsngr_users`;
CREATE TABLE `kayapo_nsngr_users` (
  `gid` int(11) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(25) NOT NULL default '',
  `trial` tinyint(1) NOT NULL default '0',
  `notice` tinyint(1) NOT NULL default '0',
  `sdate` int(14) NOT NULL default '0',
  `edate` int(14) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsngr_users
#


#
# Table structure for table kayapo_nsnst_admins
#

DROP TABLE IF EXISTS `kayapo_nsnst_admins`;
CREATE TABLE `kayapo_nsnst_admins` (
  `aid` varchar(25) NOT NULL default '',
  `login` varchar(25) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `password_md5` varchar(60) NOT NULL default '',
  `password_crypt` varchar(60) NOT NULL default '',
  `protected` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`aid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_admins
#

INSERT INTO `kayapo_nsnst_admins` VALUES ('admin','admin','','','',1);

#
# Table structure for table kayapo_nsnst_blocked_ips
#

DROP TABLE IF EXISTS `kayapo_nsnst_blocked_ips`;
CREATE TABLE `kayapo_nsnst_blocked_ips` (
  `ip_addr` varchar(15) NOT NULL default '',
  `user_id` int(11) NOT NULL default '1',
  `username` varchar(60) NOT NULL default 'Anonymous',
  `user_agent` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `reason` tinyint(1) NOT NULL default '0',
  `query_string` text NOT NULL,
  `x_forward_for` varchar(32) NOT NULL default 'None',
  `client_ip` varchar(32) NOT NULL default 'None',
  `remote_addr` varchar(32) NOT NULL default '',
  `remote_port` varchar(11) NOT NULL default 'Unknown',
  `request_method` varchar(10) NOT NULL default '',
  `expires` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  PRIMARY KEY  (`ip_addr`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_blocked_ips
#


#
# Table structure for table kayapo_nsnst_blocked_ranges
#

DROP TABLE IF EXISTS `kayapo_nsnst_blocked_ranges`;
CREATE TABLE `kayapo_nsnst_blocked_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `reason` tinyint(1) NOT NULL default '0',
  `expires` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_blocked_ranges
#


#
# Table structure for table kayapo_nsnst_blockers
#

DROP TABLE IF EXISTS `kayapo_nsnst_blockers`;
CREATE TABLE `kayapo_nsnst_blockers` (
  `blocker` int(4) NOT NULL default '0',
  `block_name` varchar(20) NOT NULL default '',
  `activate` int(4) NOT NULL default '0',
  `block_type` int(4) NOT NULL default '0',
  `email_lookup` int(4) NOT NULL default '0',
  `forward` varchar(255) NOT NULL default '',
  `reason` varchar(20) NOT NULL default '',
  `template` varchar(255) NOT NULL default '',
  `duration` int(20) NOT NULL default '0',
  `htaccess` int(4) NOT NULL default '0',
  `list` longtext NOT NULL,
  PRIMARY KEY  (`blocker`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_blockers
#

INSERT INTO `kayapo_nsnst_blockers` VALUES (0,'other',0,0,0,'','Abuse-Other','abuse_default.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (1,'union',0,0,0,'','Abuse-Union','abuse_union.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (2,'clike',0,0,0,'','Abuse-CLike','abuse_clike.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (3,'harvester',0,0,0,'','Abuse-Harvest','abuse_harvester.tpl',0,0,'@yahoo.com\r\nalexibot\r\nalligator\r\nanonymiz\r\nasterias\r\nbackdoorbot\r\nblack hole\r\nblackwidow\r\nblowfish\r\nbotalot\r\nbuiltbottough\r\nbullseye\r\nbunnyslippers\r\ncatch\r\ncegbfeieh\r\ncharon\r\ncheesebot\r\ncherrypicker\r\nchinaclaw\r\ncombine\r\ncopyrightcheck\r\ncosmos\r\ncrescent\r\ncurl\r\ndbrowse\r\ndisco\r\ndittospyder\r\ndlman\r\ndnloadmage\r\ndownload\r\ndreampassport\r\ndts agent\r\necatch\r\neirgrabber\r\nerocrawler\r\nexpress webpictures\r\nextractorpro\r\neyenetie\r\nfantombrowser\r\nfantomcrew browser\r\nfileheap\r\nfilehound\r\nflashget\r\nfoobot\r\nfranklin locator\r\nfreshdownload\r\nfscrawler\r\ngamespy_arcade\r\ngetbot\r\ngetright\r\ngetweb\r\ngo!zilla\r\ngo-ahead-got-it\r\ngrab\r\ngrafula\r\ngsa-crawler\r\nharvest\r\nhloader\r\nhmview\r\nhttplib\r\nhttpresume\r\nhttrack\r\nhumanlinks\r\nigetter\r\nimage stripper\r\nimage sucker\r\nindustry program\r\nindy library\r\ninfonavirobot\r\ninstallshield digitalwizard\r\ninterget\r\niria\r\nirvine\r\niupui research bot\r\njbh agent\r\njennybot\r\njetcar\r\njobo\r\njoc\r\nkapere\r\nkenjin spider\r\nkeyword density\r\nlarbin\r\nleechftp\r\nleechget\r\nlexibot\r\nlibweb/clshttp\r\nlibwww-perl\r\nlightningdownload\r\nlincoln state web browser\r\nlinkextractorpro\r\nlinkscan/8.1a.unix\r\nlinkwalker\r\nlwp-trivial\r\nlwp::simple\r\nmac finder\r\nmata hari\r\nmediasearch\r\nmetaproducts\r\nmicrosoft url control\r\nmidown tool\r\nmiixpc\r\nmissauga locate\r\nmissouri college browse\r\nmister pix\r\nmoget\r\nmozilla.*newt\r\nmozilla/3.0 (compatible)\r\nmozilla/3.mozilla/2.01\r\nmsie 4.0 (win95)\r\nmultiblocker browser\r\nmydaemon\r\nmygetright\r\nnabot\r\nnavroad\r\nnearsite\r\nnet vampire\r\nnetants\r\nnetmechanic\r\nnetpumper\r\nnetspider\r\nnewsearchengine\r\nnicerspro\r\nninja\r\nnitro downloader\r\nnpbot\r\noctopus\r\noffline explorer\r\noffline navigator\r\nopenfind\r\npagegrabber\r\npapa foto\r\npavuk\r\npbrowse\r\npcbrowser\r\npeval\r\npompos/\r\nprogram shareware\r\npropowerbot\r\nprowebwalker\r\npsurf\r\npuf\r\npuxarapido\r\nqueryn metasearch\r\nrealdownload\r\nreget\r\nrepomonkey\r\nrsurf\r\nrumours-agent\r\nsakura\r\nscan4mail\r\nsemanticdiscovery\r\nsitesnagger\r\nslysearch\r\nspankbot\r\nspanner \r\nspiderzilla\r\nsq webscanner\r\nstamina\r\nstar downloader\r\nsteeler\r\nsteeler\r\nstrip\r\nsuperbot\r\nsuperhttp\r\nsurfbot\r\nsuzuran\r\nswbot\r\nszukacz\r\ntakeout\r\nteleport\r\ntelesoft\r\ntest spider\r\nthe intraformant\r\nthenomad\r\ntighttwatbot\r\ntitan\r\ntocrawl/urldispatcher\r\ntrue_robot\r\ntsurf\r\nturing machine\r\nturingos\r\nurlblaze\r\nurlgetfile\r\nurly warning\r\nutilmind\r\nvci\r\nvoideye\r\nweb image collector\r\nweb sucker\r\nwebauto\r\nwebbandit\r\nwebcapture\r\nwebcollage\r\nwebcopier\r\nwebenhancer\r\nwebfetch\r\nwebgo\r\nwebleacher\r\nwebmasterworldforumbot\r\nwebql\r\nwebreaper\r\nwebsite extractor\r\nwebsite quester\r\nwebster\r\nwebstripper\r\nwebwhacker\r\nwep search\r\nwget\r\nwhizbang\r\nwidow\r\nwildsoft surfer\r\nwww-collector-e\r\nwww.netwu.com\r\nwwwoffle\r\nxaldon\r\nxenu\r\nzeus\r\nziggy\r\nzippy');
INSERT INTO `kayapo_nsnst_blockers` VALUES (4,'script',0,0,0,'','Abuse-Script','abuse_script.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (5,'author',0,0,0,'','Abuse-Author','abuse_author.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (6,'referer',0,0,0,'','Abuse-Referer','abuse_referer.tpl',0,0,'121hr.com\r\n1st-call.net\r\n1stcool.com\r\n5000n.com\r\n69-xxx.com\r\n9irl.com\r\n9uy.com\r\na-day-at-the-party.com\r\naccessthepeace.com\r\nadult-model-nude-pictures.com\r\nadult-sex-toys-free-porn.com\r\nagnitum.com\r\nalfonssackpfeiffe.com\r\nalongwayfrommars.com\r\nanime-sex-1.com\r\nanorex-sf-stimulant-free.com\r\nantibot.net\r\nantique-tokiwa.com\r\napotheke-heute.com\r\narmada31.com\r\nartark.com\r\nartlilei.com\r\nascendbtg.com\r\naschalaecheck.com\r\nasian-sex-free-sex.com\r\naslowspeeker.com\r\nassasinatedfrogs.com\r\nathirst-for-tranquillity.net\r\naubonpanier.com\r\navalonumc.com\r\nayingba.com\r\nbayofnoreturn.com\r\nbbw4phonesex.com\r\nbeersarenotfree.com\r\nbierikiuetsch.com\r\nbilingualannouncements.com\r\nblack-pussy-toon-clip-anal-lover-single.com\r\nblownapart.com\r\nblueroutes.com\r\nboasex.com\r\nbooksandpages.com\r\nbootyquake.com\r\nbossyhunter.com\r\nboyz-sex.com\r\nbrokersaandpokers.com\r\nbrowserwindowcleaner.com\r\nbudobytes.com\r\nbusiness2fun.com\r\nbuymyshitz.com\r\nbyuntaesex.com\r\ncaniputsomeloveintoyou.com\r\ncartoons.net.ru\r\ncaverunsailing.com\r\ncertainhealth.com\r\nclantea.com\r\nclose-protection-services.com\r\nclubcanino.com\r\nclubstic.com\r\ncobrakai-skf.com\r\ncollegefucktour.co.uk\r\ncommanderspank.com\r\ncoolenabled.com\r\ncrusecountryart.com\r\ncrusingforsex.co.uk\r\ncunt-twat-pussy-juice-clit-licking.com\r\ncustomerhandshaker.com\r\ncyborgrama.com\r\ndarkprofits.co.uk\r\ndatingforme.co.uk\r\ndatingmind.com\r\ndegree.org.ru\r\ndelorentos.com\r\ndiggydigger.com\r\ndinkydonkyaussie.com\r\ndjpritchard.com\r\ndjtop.com\r\ndraufgeschissen.com\r\ndreamerteens.co.uk\r\nebonyarchives.co.uk\r\nebonyplaya.co.uk\r\necobuilder2000.com\r\nemailandemail.com\r\nemedici.net\r\nengine-on-fire.com\r\nerocity.co.uk\r\nesport3.com\r\neteenbabes.com\r\neurofreepages.com\r\neurotexans.com\r\nevolucionweb.com\r\nfakoli.com\r\nfe4ba.com\r\nferienschweden.com\r\nfindly.com\r\nfirsttimeteadrinker.com\r\nfishing.net.ru\r\nflatwonkers.com\r\nflowershopentertainment.com\r\nflymario.com\r\nfree-xxx-pictures-porno-gallery.com\r\nfreebestporn.com\r\nfreefuckingmovies.co.uk\r\nfreexxxstuff.co.uk\r\nfruitologist.net\r\nfruitsandbolts.com\r\nfuck-cumshots-free-midget-movie-clips.com\r\nfuck-michaelmoore.com\r\nfundacep.com\r\ngadless.com\r\ngallapagosrangers.com\r\ngalleries4free.co.uk\r\ngalofu.com\r\ngaypixpost.co.uk\r\ngeomasti.com\r\ngirltime.co.uk\r\nglassrope.com\r\ngodjustblessyouall.com\r\ngoldenageresort.com\r\ngonnabedaddies.com\r\ngranadasexi.com\r\ngranadasexi.com\r\nguardingtheangels.com\r\nguyprofiles.co.uk\r\nhappy1225.com\r\nhappychappywacky.com\r\nhealth.org.ru\r\nhexplas.com\r\nhighheelsmodels4fun.com\r\nhillsweb.com\r\nhiptuner.com\r\nhistoryintospace.com\r\nhoa-tuoi.com\r\nhomebuyinginatlanta.com\r\nhorizonultra.com\r\nhorseminiature.net\r\nhotkiss.co.uk\r\nhotlivegirls.co.uk\r\nhotmatchup.co.uk\r\nhusler.co.uk\r\niaentertainment.com\r\niamnotsomeone.com\r\niconsofcorruption.com\r\nihavenotrustinyou.com\r\ninformat-systems.com\r\ninteriorproshop.com\r\nintersoftnetworks.com\r\ninthecrib.com\r\ninvestment4cashiers.com\r\niti-trailers.com\r\njackpot-hacker.com\r\njacks-world.com\r\njamesthesailorbasher.com\r\njesuislemonds.com\r\njustanotherdomainname.com\r\nkampelicka.com\r\nkanalrattenarsch.com\r\nkatzasher.com\r\nkerosinjunkie.com\r\nkillasvideo.com\r\nkoenigspisser.com\r\nkontorpara.com\r\nl8t.com\r\nlaestacion101.com\r\nlambuschlamppen.com\r\nlankasex.co.uk\r\nlaser-creations.com\r\nle-tour-du-monde.com\r\nlecraft.com\r\nledo-design.com\r\nleftregistration.com\r\nlekkikoomastas.com\r\nlepommeau.com\r\nlibr-animal.com\r\nlibraries.org.ru\r\nlikewaterlikewind.com\r\nlimbojumpers.com\r\nlink.ru\r\nlockportlinks.com\r\nloiproject.com\r\nlongtermalternatives.com\r\nlottoeco.com\r\nlucalozzi.com\r\nmaki-e-pens.com\r\nmalepayperview.co.uk\r\nmangaxoxo.com\r\nmaps.org.ru\r\nmarcofields.com\r\nmasterofcheese.com\r\nmasteroftheblasterhill.com\r\nmastheadwankers.com\r\nmegafrontier.com\r\nmeinschuppen.com\r\nmercurybar.com\r\nmetapannas.com\r\nmicelebre.com\r\nmidnightlaundries.com\r\nmikeapartment.co.uk\r\nmillenniumchorus.com\r\nmimundial2002.com\r\nminiaturegallerymm.com\r\nmixtaperadio.com\r\nmondialcoral.com\r\nmonja-wakamatsu.com\r\nmonstermonkey.net\r\nmouthfreshners.com\r\nmullensholiday.com\r\nmusilo.com\r\nmyhollowlog.com\r\nmyhomephonenumber.com\r\nmykeyboardisbroken.com\r\nmysofia.net\r\nnaked-cheaters.com\r\nnaked-old-women.com\r\nnastygirls.co.uk\r\nnationclan.net\r\nnatterratter.com\r\nnaughtyadam.com\r\nnestbeschmutzer.com\r\nnetwu.com\r\nnewrealeaseonline.com\r\nnewrealeasesonline.com\r\nnextfrontiersonline.com\r\nnikostaxi.com\r\nnotorious7.com\r\nnrecruiter.com\r\nnursingdepot.com\r\nnustramosse.com\r\nnuturalhicks.com\r\noccaz-auto49.com\r\nocean-db.net\r\noilburnerservice.net\r\nomburo.com\r\noneoz.com\r\nonepageahead.net\r\nonlinewithaline.com\r\norganizate.net\r\nourownweddingsong.com\r\nowen-music.com\r\np-partners.com\r\npaginadeautor.com\r\npakistandutyfree.com\r\npamanderson.co.uk\r\nparentsense.net\r\nparticlewave.net\r\npay-clic.com\r\npay4link.net\r\npcisp.com\r\npersist-pharma.com\r\npeteband.com\r\npetplusindia.com\r\npickabbw.co.uk\r\npicture-oral-position-lesbian.com\r\npl8again.com\r\nplaneting.net\r\npopusky.com\r\nporn-expert.com\r\npromoblitza.com\r\nproproducts-usa.com\r\nptcgzone.com\r\nptporn.com\r\npublishmybong.com\r\nputtingtogether.com\r\nqualifiedcancelations.com\r\nrahost.com\r\nrainbow21.com\r\nrakkashakka.com\r\nrandomfeeding.com\r\nrape-art.com\r\nrd-brains.com\r\nrealestateonthehill.net\r\nrebuscadobot\r\nrequested-stuff.com\r\nretrotrasher.com\r\nricopositive.com\r\nrisorseinrete.com\r\nrotatingcunts.com\r\nrunawayclicks.com\r\nrutalibre.com\r\ns-marche.com\r\nsabrosojazz.com\r\nsamuraidojo.com\r\nsanaldarbe.com\r\nsasseminars.com\r\nschlampenbruzzler.com\r\nsearchmybong.com\r\nseckur.com\r\nsex-asian-porn-interracial-photo.com\r\nsex-porn-fuck-hardcore-movie.com\r\nsexa3.net\r\nsexer.com\r\nsexintention.com\r\nsexnet24.tv\r\nsexomundo.com\r\nsharks.com.ru\r\nshells.com.ru\r\nshop-ecosafe.com\r\nshop-toon-hardcore-fuck-cum-pics.com\r\nsilverfussions.com\r\nsin-city-sex.net\r\nsluisvan.com\r\nsmutshots.com\r\nsnagglersmaggler.com\r\nsomethingtoforgetit.com\r\nsophiesplace.net\r\nsoursushi.com\r\nsouthernxstables.com\r\nspeed467.com\r\nspeedpal4you.com\r\nsporty.org.ru\r\nstopdriving.net\r\nstw.org.ru\r\nsufficientlife.com\r\nsussexboats.net\r\nswinger-party-free-dating-porn-sluts.com\r\nsydneyhay.com\r\nszmjht.com\r\nteninchtrout.com\r\nthebalancedfruits.com\r\ntheendofthesummit.com\r\nthiswillbeit.com\r\nthosethosethose.com\r\nticyclesofindia.com\r\ntits-gay-fagot-black-tits-bigtits-amateur.com\r\ntonius.com\r\ntoohsoft.com\r\ntoolvalley.com\r\ntooporno.net\r\ntoosexual.com\r\ntorngat.com\r\ntour.org.ru\r\ntowneluxury.com\r\ntrafficmogger.com\r\ntriacoach.net\r\ntrottinbob.com\r\ntttframes.com\r\ntvjukebox.net\r\nundercvr.com\r\nunfinished-desires.com\r\nunicornonero.com\r\nunionvillefire.com\r\nupsandowns.com\r\nupthehillanddown.com\r\nvallartavideo.com\r\nvietnamdatingservices.com\r\nvinegarlemonshots.com\r\nvizy.net.ru\r\nvnladiesdatingservices.com\r\nvomitandbusted.com\r\nwalkingthewalking.com\r\nwell-I-am-the-type-of-boy.com\r\nwhales.com.ru\r\nwhincer.net\r\nwhitpagesrippers.com\r\nwhois.sc\r\nwipperrippers.com\r\nwordfilebooklets.com\r\nworld-sexs.com\r\nxsay.com\r\nxxxchyangel.com\r\nxxxx:\r\nxxxzips.com\r\nyouarelostintransit.com\r\nyuppieslovestocks.com\r\nyuzhouhuagong.com\r\nzhaori-food.com\r\nzwiebelbacke.com');
INSERT INTO `kayapo_nsnst_blockers` VALUES (7,'filter',0,0,0,'','Abuse-Filter','abuse_filter.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (8,'request',0,0,0,'','Abuse-Request','abuse_request.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (9,'string',0,0,0,'','Abuse-String','abuse_string.tpl',0,0,'');
INSERT INTO `kayapo_nsnst_blockers` VALUES (10,'admin',0,0,0,'','Abuse-Admin','abuse_admin.tpl',0,0,'');

#
# Table structure for table kayapo_nsnst_config
#

DROP TABLE IF EXISTS `kayapo_nsnst_config`;
CREATE TABLE `kayapo_nsnst_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext NOT NULL,
  PRIMARY KEY  (`config_name`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_config
#

INSERT INTO `kayapo_nsnst_config` VALUES ('admin_contact','webmaster@yoursite.com');
INSERT INTO `kayapo_nsnst_config` VALUES ('block_perpage','50');
INSERT INTO `kayapo_nsnst_config` VALUES ('block_sort_column','date');
INSERT INTO `kayapo_nsnst_config` VALUES ('block_sort_direction','desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('crypt_salt','N$');
INSERT INTO `kayapo_nsnst_config` VALUES ('display_link','3');
INSERT INTO `kayapo_nsnst_config` VALUES ('display_reason','3');
INSERT INTO `kayapo_nsnst_config` VALUES ('force_nukeurl','0');
INSERT INTO `kayapo_nsnst_config` VALUES ('help_switch','1');
INSERT INTO `kayapo_nsnst_config` VALUES ('htaccess_path','');
INSERT INTO `kayapo_nsnst_config` VALUES ('http_auth','0');
INSERT INTO `kayapo_nsnst_config` VALUES ('lookup_link','http://dnsstuff.com/tools/whois.ch?cache=off&ip=');
INSERT INTO `kayapo_nsnst_config` VALUES ('prevent_dos','0');
INSERT INTO `kayapo_nsnst_config` VALUES ('proxy_reason','admin_proxy_reason.tpl');
INSERT INTO `kayapo_nsnst_config` VALUES ('proxy_switch','0');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_block_perpage','50');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_block_sort_column','date');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_block_sort_direction','desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_track_perpage','50');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_track_sort_column','6');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_track_sort_direction','desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_user_perpage','50');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_user_sort_column','username');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_user_sort_direction','asc');
INSERT INTO `kayapo_nsnst_config` VALUES ('self_expire','0');
INSERT INTO `kayapo_nsnst_config` VALUES ('site_reason','admin_site_reason.tpl');
INSERT INTO `kayapo_nsnst_config` VALUES ('site_switch','0');
INSERT INTO `kayapo_nsnst_config` VALUES ('staccess_path','');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_active','1');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_del','1000');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_max','10000');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_perpage','50');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_sort_column','6');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_sort_direction','desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('version_number','2.1.2');

#
# Table structure for table kayapo_nsnst_countries
#

DROP TABLE IF EXISTS `kayapo_nsnst_countries`;
CREATE TABLE `kayapo_nsnst_countries` (
  `c2c` char(2) NOT NULL default '',
  `country` varchar(60) NOT NULL default '',
  KEY `c2c` (`c2c`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_countries
#

INSERT INTO `kayapo_nsnst_countries` VALUES ('00','Unknown');
INSERT INTO `kayapo_nsnst_countries` VALUES ('01','IANA Reserved');

#
# Table structure for table kayapo_nsnst_excluded_ranges
#

DROP TABLE IF EXISTS `kayapo_nsnst_excluded_ranges`;
CREATE TABLE `kayapo_nsnst_excluded_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_excluded_ranges
#


#
# Table structure for table kayapo_nsnst_protected_ranges
#

DROP TABLE IF EXISTS `kayapo_nsnst_protected_ranges`;
CREATE TABLE `kayapo_nsnst_protected_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_protected_ranges
#


#
# Table structure for table kayapo_nsnst_reserved_ranges
#

DROP TABLE IF EXISTS `kayapo_nsnst_reserved_ranges`;
CREATE TABLE `kayapo_nsnst_reserved_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_reserved_ranges
#

INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (0,16777215,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (16777216,33554431,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (33554432,50331647,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (83886080,100663295,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (117440512,134217727,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (167772160,184549375,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (234881024,251658239,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (385875968,402653183,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (452984832,469762047,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (520093696,536870911,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (603979776,620756991,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (620756992,637534207,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (687865856,704643071,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (704643072,721420287,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1224736768,1241513983,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1241513984,1258291199,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1258291200,1275068415,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1275068416,1291845631,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1291845632,1308622847,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1308622848,1325400063,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1325400064,1342177279,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1493172224,1509949439,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1509949440,1526726655,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1526726656,1543503871,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1543503872,1560281087,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1560281088,1577058303,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1577058304,1593835519,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1593835520,1610612735,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1610612736,1627389951,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1627389952,1644167167,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1644167168,1660944383,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1660944384,1677721599,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1677721600,1694498815,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1694498816,1711276031,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1711276032,1728053247,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1728053248,1744830463,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1744830464,1761607679,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1761607680,1778384895,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1778384896,1795162111,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1795162112,1811939327,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1811939328,1828716543,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1828716544,1845493759,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1845493760,1862270975,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1862270976,1879048191,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1879048192,1895825407,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1895825408,1912602623,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1912602624,1929379839,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1929379840,1946157055,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1946157056,1962934271,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1962934272,1979711487,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1979711488,1996488703,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1996488704,2013265919,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2013265920,2030043135,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2030043136,2046820351,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2046820352,2063597567,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2063597568,2080374783,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2080374784,2097151999,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2097152000,2113929215,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2113929216,2130706431,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2130706432,2147483647,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2851995648,2852061183,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2886729728,2887778303,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2902458368,2919235583,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2919235584,2936012799,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2936012800,2952790015,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2952790016,2969567231,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2969567232,2986344447,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2986344448,3003121663,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3003121664,3019898879,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3019898880,3036676095,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3036676096,3053453311,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3053453312,3070230527,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3070230528,3087007743,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3087007744,3103784959,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3103784960,3120562175,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3120562176,3137339391,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3137339392,3154116607,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3170893824,3187671039,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3187671040,3204448255,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3221225472,3221258239,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3232235520,3232301055,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3305111552,3321888767,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3741319168,3758096383,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3758096384,3774873599,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3774873600,3791650815,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3791650816,3808428031,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3808428032,3825205247,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3825205248,3841982463,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3841982464,3858759679,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3858759680,3875536895,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3875536896,3892314111,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3892314112,3909091327,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3909091328,3925868543,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3925868544,3942645759,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3942645760,3959422975,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3959422976,3976200191,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3976200192,3992977407,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3992977408,4009754623,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4009754624,4026531839,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4026531840,4043309055,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4043309056,4060086271,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4060086272,4076863487,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4076863488,4093640703,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4093640704,4110417919,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4110417920,4127195135,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4127195136,4143972351,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4143972352,4160749567,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4160749568,4177526783,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4177526784,4194303999,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4194304000,4211081215,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4211081216,4227858431,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4227858432,4244635647,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4244635648,4261412863,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4261412864,4278190079,1098424776,'01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4278190080,4294967295,1098424776,'01');

#
# Table structure for table kayapo_nsnst_tracked_ips
#

DROP TABLE IF EXISTS `kayapo_nsnst_tracked_ips`;
CREATE TABLE `kayapo_nsnst_tracked_ips` (
  `tid` int(10) NOT NULL auto_increment,
  `ip_addr` varchar(15) NOT NULL default '',
  `hostname` varchar(100) NOT NULL default '',
  `user_id` int(11) NOT NULL default '1',
  `username` varchar(60) NOT NULL default '',
  `user_agent` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `page` text NOT NULL,
  `x_forward_for` varchar(32) NOT NULL default '',
  `client_ip` varchar(32) NOT NULL default '',
  `remote_addr` varchar(32) NOT NULL default '',
  `remote_port` varchar(11) NOT NULL default '',
  `request_method` varchar(10) NOT NULL default '',
  `c2c` char(2) NOT NULL default '00',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `maintracking` (`ip_addr`,`hostname`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_nsnst_tracked_ips
#

INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527412,'/nativa/admin.php','none','none','127.0.0.1','1602','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (2,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527919,'/nativa/admin.php','none','none','127.0.0.1','1787','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (3,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527922,'/nativa/admin.php','none','none','127.0.0.1','1787','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (4,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527922,'/nativa/admin.php','none','none','127.0.0.1','1789','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (5,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527941,'/nativa/admin.php','none','none','127.0.0.1','1797','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (6,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527941,'/nativa/admin.php','none','none','127.0.0.1','1797','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (7,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527954,'/nativa/admin.php','none','none','127.0.0.1','1797','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (8,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152527971,'/nativa/admin.php?op=Configure','none','none','127.0.0.1','1809','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (9,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528120,'/nativa/admin.php','none','none','127.0.0.1','1835','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (10,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528121,'/nativa/admin.php?op=Configure','none','none','127.0.0.1','1835','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (11,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528536,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2137','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (12,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528813,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (13,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528821,'/nativa/admin.php?op=module_status&mid=1&active=0','none','none','127.0.0.1','2637','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (14,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528821,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (15,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528826,'/nativa/admin.php?op=module_edit&mid=33','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (16,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528839,'/nativa/admin.php','none','none','127.0.0.1','2637','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (17,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528839,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (18,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528848,'/nativa/admin.php?op=module_edit&mid=33','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (19,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528851,'/nativa/admin.php','none','none','127.0.0.1','2637','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (20,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528851,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (21,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528857,'/nativa/admin.php?op=module_status&mid=33&active=1','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (22,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528857,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2637','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (23,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528863,'/nativa/admin.php?op=module_status&mid=31&active=1','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (24,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528864,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2637','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (25,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528870,'/nativa/admin.php?op=module_status&mid=2&active=1','none','none','127.0.0.1','2637','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (26,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528870,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (27,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528887,'/nativa/admin.php?op=module_status&mid=8&active=0','none','none','127.0.0.1','2662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (28,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528887,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (29,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528894,'/nativa/admin.php?op=module_status&mid=9&active=1','none','none','127.0.0.1','2662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (30,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528894,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2665','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (31,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528899,'/nativa/admin.php?op=module_status&mid=23&active=0','none','none','127.0.0.1','2662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (32,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528899,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2665','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (33,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528908,'/nativa/admin.php?op=module_status&mid=12&active=0','none','none','127.0.0.1','2662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (34,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528908,'/nativa/admin.php?op=modules','none','none','127.0.0.1','2665','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (35,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152528968,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2683','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (36,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529100,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (37,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529108,'/nativa/admin.php?op=BlocksDelete&bid=8','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (38,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529111,'/nativa/admin.php?op=BlocksDelete&bid=8&ok=1','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (39,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529112,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (40,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529116,'/nativa/admin.php?op=BlocksDelete&bid=7','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (41,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529119,'/nativa/admin.php?op=BlocksDelete&bid=7&ok=1','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (42,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529119,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (43,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529123,'/nativa/admin.php?op=BlocksDelete&bid=4','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (44,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529126,'/nativa/admin.php?op=BlocksDelete&bid=4&ok=1','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (45,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529126,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (46,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529133,'/nativa/admin.php?op=BlocksDelete&bid=3','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (47,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529135,'/nativa/admin.php?op=BlocksDelete&bid=3&ok=1','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (48,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529135,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (49,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529139,'/nativa/admin.php?op=BlocksDelete&bid=1','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (50,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529141,'/nativa/admin.php?op=BlocksDelete&bid=1&ok=1','none','none','127.0.0.1','2714','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (51,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529141,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2712','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (52,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529167,'/nativa/admin.php','none','none','127.0.0.1','2739','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (53,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529167,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2739','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (54,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529236,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2747','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (55,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529269,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2752','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (56,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529578,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2773','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (57,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529587,'/nativa/index.php','none','none','127.0.0.1','2775','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (58,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152529635,'/nativa/index.php','none','none','127.0.0.1','2782','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (59,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530008,'/nativa/index.php','none','none','127.0.0.1','2820','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (60,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530096,'/nativa/index.php','none','none','127.0.0.1','2830','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (61,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530131,'/nativa/index.php','none','none','127.0.0.1','2839','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (62,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530240,'/nativa/index.php','none','none','127.0.0.1','2850','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (63,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530360,'/nativa/index.php','none','none','127.0.0.1','2858','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (64,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530608,'/nativa/index.php','none','none','127.0.0.1','2937','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (65,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530634,'/nativa/index.php','none','none','127.0.0.1','2942','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (66,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530694,'/nativa/index.php','none','none','127.0.0.1','2949','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (67,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530774,'/nativa/index.php','none','none','127.0.0.1','2953','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (68,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530882,'/nativa/index.php','none','none','127.0.0.1','2959','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (69,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530948,'/nativa/index.php','none','none','127.0.0.1','2968','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (70,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152530993,'/nativa/index.php','none','none','127.0.0.1','2973','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (71,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531309,'/nativa/index.php','none','none','127.0.0.1','2990','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (72,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531362,'/nativa/index.php','none','none','127.0.0.1','2997','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (73,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531372,'/nativa/index.php','none','none','127.0.0.1','2997','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (74,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531424,'/nativa/index.php','none','none','127.0.0.1','3005','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (75,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531437,'/nativa/index.php','none','none','127.0.0.1','3005','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (76,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531692,'/nativa/index.php','none','none','127.0.0.1','3144','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (77,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531736,'/nativa/index.php','none','none','127.0.0.1','3152','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (78,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531842,'/nativa/index.php','none','none','127.0.0.1','3158','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (79,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531861,'/nativa/index.php','none','none','127.0.0.1','3163','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (80,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531893,'/nativa/index.php','none','none','127.0.0.1','3168','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (81,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152531917,'/nativa/index.php','none','none','127.0.0.1','3175','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (82,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532053,'/nativa/index.php','none','none','127.0.0.1','3187','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (83,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532079,'/nativa/index.php','none','none','127.0.0.1','3192','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (84,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532117,'/nativa/index.php','none','none','127.0.0.1','3195','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (85,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532130,'/nativa/index.php','none','none','127.0.0.1','3195','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (86,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532162,'/nativa/index.php','none','none','127.0.0.1','3205','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (87,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532172,'/nativa/index.php','none','none','127.0.0.1','3205','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (88,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532185,'/nativa/index.php','none','none','127.0.0.1','3207','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (89,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532279,'/nativa/index.php','none','none','127.0.0.1','3212','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (90,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532291,'/nativa/index.php','none','none','127.0.0.1','3214','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (91,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532312,'/nativa/index.php','none','none','127.0.0.1','3220','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (92,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532323,'/nativa/index.php','none','none','127.0.0.1','3220','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (93,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532431,'/nativa/index.php','none','none','127.0.0.1','3240','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (94,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532512,'/nativa/index.php','none','none','127.0.0.1','3247','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (95,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532551,'/nativa/index.php','none','none','127.0.0.1','3255','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (96,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532564,'/nativa/index.php','none','none','127.0.0.1','3257','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (97,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532591,'/nativa/index.php','none','none','127.0.0.1','3263','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (98,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532624,'/nativa/index.php','none','none','127.0.0.1','3267','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (99,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532641,'/nativa/index.php','none','none','127.0.0.1','3272','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (100,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532656,'/nativa/index.php','none','none','127.0.0.1','3274','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (101,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532678,'/nativa/index.php','none','none','127.0.0.1','3280','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (102,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532738,'/nativa/index.php','none','none','127.0.0.1','3298','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (103,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532758,'/nativa/index.php','none','none','127.0.0.1','3303','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (104,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532779,'/nativa/index.php','none','none','127.0.0.1','3310','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (105,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532888,'/nativa/index.php','none','none','127.0.0.1','3325','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (106,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152532976,'/nativa/index.php','none','none','127.0.0.1','3335','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (107,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533004,'/nativa/index.php','none','none','127.0.0.1','3343','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (108,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533013,'/nativa/admin.php?op=editmsg&mid=1','none','none','127.0.0.1','3343','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (109,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533019,'/nativa/admin.php','none','none','127.0.0.1','3343','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (110,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533019,'/nativa/admin.php?op=messages','none','none','127.0.0.1','3345','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (111,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533023,'/nativa/admin.php?op=deletemsg&mid=1','none','none','127.0.0.1','3345','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (112,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533025,'/nativa/admin.php?op=deletemsg&mid=1&ok=1','none','none','127.0.0.1','3345','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (113,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533025,'/nativa/admin.php?op=messages','none','none','127.0.0.1','3343','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (114,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533028,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3345','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (115,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533032,'/nativa/admin.php?op=ChangeStatus&bid=2','none','none','127.0.0.1','3345','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (116,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533032,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3343','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (117,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533044,'/nativa/admin.php','none','none','127.0.0.1','3345','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (118,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533045,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3343','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (119,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533109,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3375','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (120,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533320,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (121,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533364,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3446','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (122,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533388,'/nativa/admin.php','none','none','127.0.0.1','3453','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (123,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533398,'/nativa/admin.php','none','none','127.0.0.1','3453','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (124,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533398,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (125,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533402,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (126,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533409,'/nativa/admin.php?op=BlockOrder&weight=4&bidori=11&weightrep=3&bidrep=10','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (127,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533409,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3453','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (128,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533413,'/nativa/admin.php?op=BlockOrder&weight=3&bidori=11&weightrep=2&bidrep=9','none','none','127.0.0.1','3453','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (129,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533413,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (130,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533421,'/nativa/index.php','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (131,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533424,'/nativa/modules.php?name=News&file=article&sid=1','none','none','127.0.0.1','3453','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (132,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533428,'/nativa/index.php','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (133,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533431,'/nativa/modules.php?name=News&file=article&sid=1','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (134,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533434,'/nativa/admin.php?op=RemoveStory&sid=1','none','none','127.0.0.1','3453','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (135,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533436,'/nativa/admin.php?op=RemoveStory&sid=1&ok=1','none','none','127.0.0.1','3453','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (136,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533437,'/nativa/admin.php','none','none','127.0.0.1','3455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (137,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533471,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3483','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (138,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533521,'/nativa/admin.php','none','none','127.0.0.1','3493','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (139,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533521,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3493','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (140,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533523,'/nativa/admin.php?op=topicedit&topicid=1','none','none','127.0.0.1','3496','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (141,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533526,'/nativa/admin.php?op=topicdelete&topicid=1','none','none','127.0.0.1','3496','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (142,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533529,'/nativa/admin.php?op=topicdelete&topicid=1&ok=1','none','none','127.0.0.1','3496','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (143,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533529,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3493','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (144,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533568,'/nativa/admin.php','none','none','127.0.0.1','3512','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (145,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533568,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3512','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (146,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533608,'/nativa/admin.php','none','none','127.0.0.1','3523','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (147,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533608,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3523','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (148,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533635,'/nativa/admin.php','none','none','127.0.0.1','3533','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (149,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533635,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3533','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (150,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533661,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3541','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (151,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533670,'/nativa/index.php','none','none','127.0.0.1','3546','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (152,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533676,'/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=','none','none','127.0.0.1','3546','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (153,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533812,'/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=','none','none','127.0.0.1','3578','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (154,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533828,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3584','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (155,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152533850,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3587','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (156,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152534064,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','3625','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (157,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152534068,'/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=','none','none','127.0.0.1','3628','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (158,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152534818,'/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=','none','none','127.0.0.1','3761','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (159,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152534826,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','3761','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (160,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535272,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3920','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (161,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535278,'/nativa/admin.php?op=BlocksEdit&bid=11','none','none','127.0.0.1','3920','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (162,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535284,'/nativa/admin.php','none','none','127.0.0.1','3920','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (163,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535284,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3922','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (164,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535315,'/nativa/admin.php?op=BlocksEdit&bid=11','none','none','127.0.0.1','3932','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (165,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535327,'/nativa/admin.php','none','none','127.0.0.1','3934','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (166,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535328,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','3932','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (167,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535336,'/nativa/modules.php?name=Statistics','none','none','127.0.0.1','3932','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (168,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535340,'/nativa/modules.php?name=Statistics&op=Stats','none','none','127.0.0.1','3932','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (169,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535343,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','3932','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (170,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535506,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','3971','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (171,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535522,'/nativa/modules.php?name=Top','none','none','127.0.0.1','3976','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (172,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535527,'/nativa/index.php','none','none','127.0.0.1','3976','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (173,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535567,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','3988','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (174,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535569,'/nativa/modules.php?name=Top','none','none','127.0.0.1','3988','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (175,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535574,'/nativa/modules.php?name=FCKeditor','none','none','127.0.0.1','3990','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (176,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535589,'/nativa/index.php','none','none','127.0.0.1','3994','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (177,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535624,'/nativa/index.php','none','none','127.0.0.1','4018','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (178,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535680,'/nativa/index.php','none','none','127.0.0.1','4045','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (179,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535732,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4056','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (180,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535846,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4078','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (181,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152535994,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4105','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (182,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536362,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4222','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (183,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536366,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4224','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (184,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536373,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4224','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (185,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536478,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4271','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (186,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536515,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4277','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (187,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536585,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4300','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (188,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536604,'/nativa/modules.php?name=Calendar&file=index&Date=08/01/2006&type=month','none','none','127.0.0.1','4307','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (189,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536637,'/nativa/index.php','none','none','127.0.0.1','4314','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (190,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536644,'/nativa/index.php','none','none','127.0.0.1','4314','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (191,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536696,'/nativa/index.php','none','none','127.0.0.1','4329','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (192,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536714,'/nativa/admin.php','none','none','127.0.0.1','4336','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (193,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536718,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','4338','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (194,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536760,'/nativa/admin.php','none','none','127.0.0.1','4348','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (195,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536761,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','4348','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (196,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536770,'/nativa/admin.php?op=modifyadmin&chng_aid=Nativa','none','none','127.0.0.1','4348','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (197,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536780,'/nativa/admin.php','none','none','127.0.0.1','4351','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (198,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536780,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','4348','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (199,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536802,'/nativa/modules.php?name=Calendar&file=index&type=day','none','none','127.0.0.1','4361','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (200,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536806,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4361','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (201,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536844,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4372','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (202,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536846,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4372','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (203,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536917,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4385','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (204,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536936,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','4391','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (205,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152536976,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','4401','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (206,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537034,'/nativa/index.php','none','none','127.0.0.1','4411','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (207,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537147,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','4432','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (208,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537279,'/nativa/index.php','none','none','127.0.0.1','4553','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (209,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537283,'/nativa/index.php','none','none','127.0.0.1','4555','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (210,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537285,'/nativa/modules.php?name=Stories_Archive','none','none','127.0.0.1','4553','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (211,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537294,'/nativa/index.php','none','none','127.0.0.1','4555','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (212,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537423,'/nativa/index.php','none','none','127.0.0.1','4594','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (213,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537430,'/nativa/admin.php','none','none','127.0.0.1','4597','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (214,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537433,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4599','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (215,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537452,'/nativa/admin.php?op=BlocksEdit&bid=11','none','none','127.0.0.1','4602','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (216,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537480,'/nativa/admin.php','none','none','127.0.0.1','4609','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (217,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537480,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4609','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (218,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537485,'/nativa/index.php','none','none','127.0.0.1','4615','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (219,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537488,'/nativa/modules.php?name=Surveys','none','none','127.0.0.1','4615','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (220,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537688,'/nativa/modules.php?name=Surveys','none','none','127.0.0.1','4649','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (221,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537694,'/nativa/index.php','none','none','127.0.0.1','4649','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (222,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537707,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4651','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (223,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537710,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4649','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (224,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537826,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4678','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (225,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537835,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4678','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (226,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152537917,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4693','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (227,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538008,'/nativa/admin.php?op=CalendarDisplayStory&qid=1','none','none','127.0.0.1','4707','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (228,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538066,'/nativa/admin.php?op=CalendarDisplayStory&qid=1','none','none','127.0.0.1','4719','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (229,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538105,'/nativa/admin.php?op=CalendarDisplayStory&qid=1','none','none','127.0.0.1','4729','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (230,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538126,'/nativa/admin.php?op=CalendarDisplayStory&qid=1','none','none','127.0.0.1','4735','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (231,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538509,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4796','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (232,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538535,'/nativa/index.php','none','none','127.0.0.1','4804','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (233,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538543,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4806','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (234,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538546,'/nativa/admin.php?op=CalendarDisplayStory&qid=1','none','none','127.0.0.1','4806','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (235,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538551,'/nativa/admin.php','none','none','127.0.0.1','4804','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (236,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538551,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4806','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (237,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538558,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4815','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (238,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538566,'/nativa/index.php','none','none','127.0.0.1','4817','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (239,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538580,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4823','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (240,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538587,'/nativa/admin.php?op=CalendarDisplayStory&qid=2','none','none','127.0.0.1','4823','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (241,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538594,'/nativa/admin.php','none','none','127.0.0.1','4823','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (242,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538594,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4825','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (243,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538599,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4823','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (244,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538604,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4825','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (245,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538624,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','4837','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (246,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538628,'/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=1','none','none','127.0.0.1','4839','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (247,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538634,'/nativa/admin.php?op=CalendarRemoveStory&eid=1','none','none','127.0.0.1','4839','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (248,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538637,'/nativa/admin.php?op=CalendarRemoveStory&eid=1&ok=1','none','none','127.0.0.1','4839','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (249,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538637,'/nativa/modules.php?op=modload&name=Calendar&file=index','none','none','127.0.0.1','4837','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (250,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538645,'/nativa/index.php','none','none','127.0.0.1','4837','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (251,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538719,'/nativa/index.php','none','none','127.0.0.1','4873','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (252,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538736,'/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=2','none','none','127.0.0.1','4879','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (253,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152538747,'/nativa/index.php','none','none','127.0.0.1','4881','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (254,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539077,'/nativa/admin.php','none','none','127.0.0.1','4945','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (255,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539081,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4945','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (256,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539103,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4953','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (257,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539182,'/nativa/admin.php','none','none','127.0.0.1','4992','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (258,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539183,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (259,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539197,'/nativa/index.php','none','none','127.0.0.1','4995','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (260,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539199,'/nativa/index.php','none','none','127.0.0.1','4995','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (261,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539205,'/nativa/admin.php','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (262,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539208,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (263,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539213,'/nativa/admin.php?op=BlockOrder&weight=3&bidori=12&weightrep=2&bidrep=6','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (264,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539214,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4995','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (265,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539216,'/nativa/index.php','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (266,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539231,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (267,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539233,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (268,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539257,'/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=2','none','none','127.0.0.1','1047','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (269,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539267,'/nativa/index.php','none','none','127.0.0.1','1047','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (270,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539313,'/nativa/modules.php?name=Statistics','none','none','127.0.0.1','1062','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (271,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539316,'/nativa/modules.php?name=Top','none','none','127.0.0.1','1064','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (272,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539324,'/nativa/index.php','none','none','127.0.0.1','1062','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (273,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539400,'/nativa/admin.php','none','none','127.0.0.1','1077','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (274,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539402,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1079','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (275,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539406,'/nativa/admin.php?op=BlocksEdit&bid=12','none','none','127.0.0.1','1079','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (276,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539416,'/nativa/admin.php','none','none','127.0.0.1','1079','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (277,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539416,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1077','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (278,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539420,'/nativa/index.php','none','none','127.0.0.1','1087','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (279,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539423,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1087','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (280,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539425,'/nativa/index.php','none','none','127.0.0.1','1087','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (281,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539582,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1119','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (282,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539960,'/nativa/admin.php','none','none','127.0.0.1','1291','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (283,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539960,'/nativa/admin.php?op=adminMain','none','none','127.0.0.1','1291','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (284,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539965,'/nativa/index.php','none','none','127.0.0.1','1297','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (285,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152539984,'/nativa/modules.php?name=News&file=article&sid=2','none','none','127.0.0.1','1306','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (286,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540003,'/nativa/index.php','none','none','127.0.0.1','1312','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (287,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540007,'/nativa/index.php','none','none','127.0.0.1','1312','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (288,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540020,'/nativa/index.php','none','none','127.0.0.1','1312','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (289,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540106,'/nativa/modules.php?name=News&file=article&sid=2','none','none','127.0.0.1','1336','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (290,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540108,'/nativa/admin.php?op=EditStory&sid=2','none','none','127.0.0.1','1338','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (291,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540132,'/nativa/index.php','none','none','127.0.0.1','1347','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (292,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540244,'/nativa/index.php','none','none','127.0.0.1','1370','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (293,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540432,'/nativa/index.php','none','none','127.0.0.1','1405','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (294,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540435,'/nativa/index.php','none','none','127.0.0.1','1405','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (295,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540602,'/nativa/index.php','none','none','127.0.0.1','1434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (296,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540678,'/nativa/index.php','none','none','127.0.0.1','1452','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (297,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540700,'/nativa/index.php','none','none','127.0.0.1','1462','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (298,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540705,'/nativa/modules.php?name=News&file=article&sid=2','none','none','127.0.0.1','1464','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (299,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540712,'/nativa/admin.php?op=EditStory&sid=2','none','none','127.0.0.1','1462','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (300,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540741,'/nativa/admin.php','none','none','127.0.0.1','1471','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (301,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540741,'/nativa/admin.php?op=adminMain','none','none','127.0.0.1','1471','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (302,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540756,'/nativa/index.php','none','none','127.0.0.1','1474','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (303,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152540758,'/nativa/index.php','none','none','127.0.0.1','1471','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (304,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542213,'/nativa/index.php','none','none','127.0.0.1','1096','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (305,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542238,'/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=2','none','none','127.0.0.1','1105','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (306,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542242,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1105','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (307,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542251,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1105','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (308,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542274,'/nativa/admin.php','none','none','127.0.0.1','1115','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (309,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542305,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1124','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (310,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542341,'/nativa/index.php','none','none','127.0.0.1','1139','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (311,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542603,'/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=','none','none','127.0.0.1','1263','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (312,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542610,'/nativa/modules.php?name=Surveys','none','none','127.0.0.1','1263','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (313,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542651,'/nativa/index.php','none','none','127.0.0.1','1277','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (314,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542776,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1326','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (315,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542882,'/nativa/index.php','none','none','127.0.0.1','1345','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (316,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542908,'/nativa/index.php','none','none','127.0.0.1','1352','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (317,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542938,'/nativa/index.php','none','none','127.0.0.1','1357','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (318,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152542995,'/nativa/index.php','none','none','127.0.0.1','1367','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (319,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152543013,'/nativa/index.php','none','none','127.0.0.1','1374','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (320,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152549108,'/nativa/index.php','none','none','127.0.0.1','2547','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (321,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152549495,'/nativa/index.php','none','none','127.0.0.1','2638','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (322,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152549724,'/nativa/index.php','none','none','127.0.0.1','2716','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (323,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152550029,'/nativa/index.php','none','none','127.0.0.1','2975','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (324,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552622,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4568','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (325,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552751,'/nativa/admin.php','none','none','127.0.0.1','4588','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (326,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552752,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4588','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (327,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552756,'/nativa/index.php','none','none','127.0.0.1','4592','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (328,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552772,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4599','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (329,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552818,'/nativa/admin.php','none','none','127.0.0.1','4613','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (330,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552818,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4613','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (331,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552823,'/nativa/index.php','none','none','127.0.0.1','4619','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (332,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552836,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4624','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (333,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552854,'/nativa/admin.php','none','none','127.0.0.1','4631','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (334,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552854,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4631','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (335,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552860,'/nativa/index.php','none','none','127.0.0.1','4635','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (336,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552954,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4669','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (337,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552972,'/nativa/admin.php','none','none','127.0.0.1','4673','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (338,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552972,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4673','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (339,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152552975,'/nativa/index.php','none','none','127.0.0.1','4677','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (340,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553116,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4729','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (341,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553121,'/nativa/admin.php','none','none','127.0.0.1','4729','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (342,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553121,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4731','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (343,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553125,'/nativa/index.php','none','none','127.0.0.1','4736','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (344,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553143,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4742','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (345,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553218,'/nativa/admin.php','none','none','127.0.0.1','4754','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (346,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553218,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4754','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (347,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553222,'/nativa/index.php','none','none','127.0.0.1','4758','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (348,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553264,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4769','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (349,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553282,'/nativa/admin.php','none','none','127.0.0.1','4773','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (350,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553283,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4773','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (351,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553285,'/nativa/index.php','none','none','127.0.0.1','4777','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (352,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553299,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4783','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (353,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553323,'/nativa/admin.php','none','none','127.0.0.1','4787','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (354,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553323,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4787','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (355,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553327,'/nativa/index.php','none','none','127.0.0.1','4791','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (356,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553368,'/nativa/index.php','none','none','127.0.0.1','4801','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (357,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553433,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4813','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (358,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553490,'/nativa/admin.php','none','none','127.0.0.1','4821','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (359,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553490,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4821','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (360,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553494,'/nativa/index.php','none','none','127.0.0.1','4827','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (361,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553576,'/nativa/index.php','none','none','127.0.0.1','4844','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (362,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553814,'/nativa/index.php','none','none','127.0.0.1','4908','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (363,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553871,'/nativa/index.php','none','none','127.0.0.1','4921','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (364,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553895,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4927','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (365,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553918,'/nativa/admin.php','none','none','127.0.0.1','4935','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (366,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553919,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4935','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (367,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553921,'/nativa/index.php','none','none','127.0.0.1','4939','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (368,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553939,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4947','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (369,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553951,'/nativa/admin.php','none','none','127.0.0.1','4949','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (370,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553951,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4947','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (371,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553955,'/nativa/index.php','none','none','127.0.0.1','4954','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (372,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553976,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4961','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (373,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553986,'/nativa/admin.php','none','none','127.0.0.1','4963','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (374,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553986,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4961','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (375,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152553989,'/nativa/index.php','none','none','127.0.0.1','4968','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (376,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554013,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','4977','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (377,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554023,'/nativa/admin.php','none','none','127.0.0.1','4977','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (378,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554023,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','4979','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (379,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554027,'/nativa/index.php','none','none','127.0.0.1','4983','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (380,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554051,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','4992','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (381,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554051,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (382,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554062,'/nativa/admin.php','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (383,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554067,'/nativa/modules.php?name=Your_Account&file=admin','none','none','127.0.0.1','4995','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (384,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554070,'/nativa/modules.php?name=Your_Account&file=admin&op=UsersConfig','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (385,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554081,'/nativa/modules.php?name=Your_Account&file=admin','none','none','127.0.0.1','4995','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (386,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554084,'/nativa/index.php','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (387,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554098,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (388,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554104,'/nativa/modules.php?name=Your_Account&op=logout','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (389,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554108,'/nativa/index.php','none','none','127.0.0.1','4992','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (390,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554123,'/nativa/modules.php?name=News&file=article&sid=2','none','none','127.0.0.1','4995','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (391,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152554575,'/nativa/index.php','none','none','127.0.0.1','1137','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (392,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152555695,'/nativa/index.php','none','none','127.0.0.1','1342','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (393,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152555944,'/nativa/index.php','none','none','127.0.0.1','1434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (394,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152556013,'/nativa/index.php','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (395,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152556100,'/nativa/index.php','none','none','127.0.0.1','1499','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (396,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152556394,'/nativa/index.php','none','none','127.0.0.1','1564','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (397,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152556622,'/nativa/index.php','none','none','127.0.0.1','1602','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (398,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152557343,'/nativa/index.php','none','none','127.0.0.1','1797','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (399,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152559221,'/nativa/index.php','none','none','127.0.0.1','2310','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (400,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152559900,'/nativa/index.php','none','none','127.0.0.1','2461','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (401,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152560377,'/nativa/index.php','none','none','127.0.0.1','2545','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (402,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152560728,'/nativa/index.php','none','none','127.0.0.1','2609','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (403,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152560967,'/nativa/index.php','none','none','127.0.0.1','2649','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (404,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152561720,'/nativa/index.php','none','none','127.0.0.1','2818','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (405,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562572,'/nativa/index.php','none','none','127.0.0.1','1207','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (406,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562589,'/nativa/admin.php','none','none','127.0.0.1','1212','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (407,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562594,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1214','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (408,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562598,'/nativa/admin.php','none','none','127.0.0.1','1214','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (409,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562607,'/nativa/admin.php','none','none','127.0.0.1','1212','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (410,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562755,'/nativa/admin.php?op=create','none','none','127.0.0.1','1219','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (411,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562761,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1219','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (412,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562768,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1226','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (413,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562788,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1230','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (414,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562795,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1232','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (415,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562805,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1230','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (416,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562812,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1230','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (417,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562813,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1232','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (418,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562830,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1232','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (419,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562832,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1230','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (420,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562882,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1241','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (421,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562891,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1243','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (422,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562906,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1241','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (423,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562912,'/nativa/admin.php?op=CalendarDisplayStory&qid=3','none','none','127.0.0.1','1241','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (424,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562921,'/nativa/admin.php','none','none','127.0.0.1','1241','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (425,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562921,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1246','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (426,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562932,'/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=3','none','none','127.0.0.1','1241','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (427,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152562973,'/nativa/modules.php?name=Calendar&file=calprint','none','none','127.0.0.1','1251','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (428,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563038,'/nativa/index.php','none','none','127.0.0.1','1253','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (429,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563041,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1255','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (430,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563041,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1253','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (431,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563062,'/nativa/index.php','none','none','127.0.0.1','1260','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (432,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563065,'/nativa/index.php','none','none','127.0.0.1','1260','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (433,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563113,'/nativa/index.php','none','none','127.0.0.1','1278','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (434,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563587,'/nativa/admin.php','none','none','127.0.0.1','1417','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (435,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563605,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1422','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (436,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152563706,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1447','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (437,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613455,'/nativa/index.php','none','none','127.0.0.1','1081','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (438,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613478,'/nativa/admin.php','none','none','127.0.0.1','1086','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (439,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613592,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1158','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (440,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613596,'/nativa/admin.php','none','none','127.0.0.1','1160','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (441,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613608,'/nativa/admin.php','none','none','127.0.0.1','1158','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (442,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613612,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1158','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (443,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613616,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1160','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (444,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613622,'/nativa/admin.php','none','none','127.0.0.1','1160','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (445,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613623,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1158','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (446,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613625,'/nativa/index.php','none','none','127.0.0.1','1170','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (447,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613641,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1170','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (448,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613641,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1172','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (449,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613880,'/nativa/modules.php?name=Your_Account&op=edithome','none','none','127.0.0.1','1258','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (450,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613927,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1262','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (451,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152613927,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1262','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (452,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614492,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1276','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (453,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614607,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1279','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (454,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614631,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1283','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (455,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614640,'/nativa/modules.php?name=Private_Messages','none','none','127.0.0.1','1285','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (456,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614692,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1288','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (457,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614721,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1292','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (458,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152614834,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1296','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (459,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615122,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1300','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (460,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615136,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1302','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (461,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615164,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1306','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (462,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615172,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1308','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (463,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615217,'/nativa/modules.php?name=News&file=article&sid=2','none','none','127.0.0.1','1314','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (464,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615525,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1330','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (465,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615542,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1334','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (466,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152615559,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1338','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (467,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616542,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1775','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (468,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616603,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1779','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (469,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616639,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1783','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (470,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616852,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1786','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (471,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616874,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1789','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (472,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616886,'/nativa/modules.php?name=Calendar&file=calprint','none','none','127.0.0.1','1791','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (473,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616894,'/nativa/modules.php?name=Calendar&file=calprint&type=view&eid=3','none','none','127.0.0.1','1789','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (474,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616911,'/nativa/index.php','none','none','127.0.0.1','1794','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (475,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616917,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1796','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (476,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616917,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1794','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (477,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616924,'/nativa/modules.php?name=Your_Account&op=logout','none','none','127.0.0.1','1796','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (478,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616930,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1803','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (479,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616933,'/nativa/admin.php','none','none','127.0.0.1','1805','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (480,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616946,'/nativa/admin.php','none','none','127.0.0.1','1805','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (481,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616946,'/nativa/admin.php','none','none','127.0.0.1','1803','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (482,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616954,'/nativa/admin.php','none','none','127.0.0.1','1805','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (483,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616965,'/nativa/admin.php','none','none','127.0.0.1','1805','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (484,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616991,'/nativa/admin.php','none','none','127.0.0.1','1814','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (485,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152616997,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1814','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (486,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617002,'/nativa/admin.php?op=modifyadmin&chng_aid=Nativa','none','none','127.0.0.1','1815','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (487,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617013,'/nativa/admin.php','none','none','127.0.0.1','1815','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (488,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617014,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1814','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (489,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617279,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1823','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (490,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617288,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1823','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (491,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617293,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1823','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (492,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617417,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1828','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (493,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617596,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1831','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (494,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617600,'/nativa/admin.php?op=modifyadmin&chng_aid=Nativa','none','none','127.0.0.1','1831','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (495,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617614,'/nativa/admin.php','none','none','127.0.0.1','1831','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (496,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617614,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1833','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (497,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617616,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1831','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (498,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617619,'/nativa/admin.php','none','none','127.0.0.1','1833','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (499,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617647,'/nativa/admin.php','none','none','127.0.0.1','1840','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (500,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617655,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1842','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (501,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617688,'/nativa/admin.php?op=modifyadmin&chng_aid=Nativa','none','none','127.0.0.1','1844','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (502,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617699,'/nativa/admin.php','none','none','127.0.0.1','1846','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (503,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617699,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1844','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (504,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617701,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1844','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (505,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617705,'/nativa/admin.php','none','none','127.0.0.1','1844','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (506,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617726,'/nativa/admin.php','none','none','127.0.0.1','1852','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (507,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617782,'/nativa/admin.php','none','none','127.0.0.1','1855','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (508,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617787,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1855','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (509,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617800,'/nativa/index.php','none','none','127.0.0.1','1855','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (510,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152617890,'/nativa/index.php','none','none','127.0.0.1','1864','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (511,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618074,'/nativa/admin.php','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (512,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618077,'/nativa/admin.php?op=logout','none','none','127.0.0.1','2036','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (513,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618080,'/nativa/admin.php','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (514,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618087,'/nativa/admin.php','none','none','127.0.0.1','2034','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (515,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618087,'/nativa/admin.php','none','none','127.0.0.1','2036','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (516,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618099,'/nativa/admin.php','none','none','127.0.0.1','2034','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (517,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618099,'/nativa/admin.php','none','none','127.0.0.1','2036','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (518,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618111,'/nativa/admin.php','none','none','127.0.0.1','2036','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (519,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618112,'/nativa/admin.php','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (520,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618125,'/nativa/admin.php','none','none','127.0.0.1','2034','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (521,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618129,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (522,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618131,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (523,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618146,'/nativa/admin.php','none','none','127.0.0.1','2036','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (524,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618146,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (525,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618149,'/nativa/index.php','none','none','127.0.0.1','2034','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (526,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152618897,'/nativa/index.php','none','none','127.0.0.1','2062','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (527,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619143,'/nativa/index.php','none','none','127.0.0.1','2079','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (528,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619154,'/nativa/index.php','none','none','127.0.0.1','2087','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (529,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619191,'/nativa/index.php','none','none','127.0.0.1','2097','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (530,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619247,'/nativa/index.php','none','none','127.0.0.1','2105','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (531,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619265,'/nativa/index.php','none','none','127.0.0.1','2108','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (532,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619293,'/nativa/index.php','none','none','127.0.0.1','2114','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (533,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619297,'/nativa/index.php','none','none','127.0.0.1','2115','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (534,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619304,'/nativa/index.php','none','none','127.0.0.1','2124','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (535,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619323,'/nativa/index.php','none','none','127.0.0.1','2130','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (536,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619334,'/nativa/index.php','none','none','127.0.0.1','2132','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (537,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619348,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','2132','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (538,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619358,'/nativa/admin.php?op=logout','none','none','127.0.0.1','2130','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (539,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619361,'/nativa/admin.php','none','none','127.0.0.1','2130','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (540,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619365,'/nativa/index.php','none','none','127.0.0.1','2130','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (541,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619398,'/nativa/modules.php?name=Your_Account&op=new_user','none','none','127.0.0.1','2151','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (542,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619455,'/nativa/admin.php','none','none','127.0.0.1','2155','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (543,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619465,'/nativa/admin.php','none','none','127.0.0.1','2155','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (544,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619471,'/nativa/admin.php?op=Configure','none','none','127.0.0.1','2155','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (545,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619502,'/nativa/admin.php','none','none','127.0.0.1','2161','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (546,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619502,'/nativa/admin.php?op=Configure','none','none','127.0.0.1','2161','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (547,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152619818,'/nativa/index.php','none','none','127.0.0.1','2188','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (548,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152620943,'/nativa/index.php','none','none','127.0.0.1','2370','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (549,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152621042,'/nativa/index.php','none','none','127.0.0.1','2380','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (550,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630074,'/nativa/index.php','none','none','127.0.0.1','2457','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (551,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630081,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','2459','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (552,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630081,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','2457','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (553,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630088,'/nativa/modules.php?name=Stories_Archive','none','none','127.0.0.1','2457','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (554,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630090,'/nativa/index.php','none','none','127.0.0.1','2459','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (555,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630094,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','2459','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (556,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630094,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','2457','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (557,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630120,'/nativa/modules.php?name=Your_Account&op=logout','none','none','127.0.0.1','2470','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (558,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630123,'/nativa/index.php','none','none','127.0.0.1','2472','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (559,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630139,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','2476','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (560,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630145,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','2478','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (561,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630154,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','2476','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (562,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630154,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','2478','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (563,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630172,'/nativa/modules.php?name=Your_Account&op=edituser','none','none','127.0.0.1','2485','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (564,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630179,'/nativa/index.php','none','none','127.0.0.1','2487','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (565,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630195,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','2487','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (566,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152630195,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','2485','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (567,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639859,'/nativa/index.php','none','none','127.0.0.1','1410','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (568,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639928,'/nativa/admin.php','none','none','127.0.0.1','1416','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (569,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639938,'/nativa/admin.php','none','none','127.0.0.1','1419','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (570,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639944,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1416','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (571,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639951,'/nativa/admin.php?op=BlocksEdit&bid=9','none','none','127.0.0.1','1416','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (572,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639958,'/nativa/admin.php','none','none','127.0.0.1','1416','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (573,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639958,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1419','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (574,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639966,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1419','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (575,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639966,'/nativa/modules.php?name=Your_Account&stop=1','none','none','127.0.0.1','1416','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (576,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639974,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1416','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (577,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639974,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1419','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (578,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639988,'/nativa/index.php','none','none','127.0.0.1','1432','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (579,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639993,'/nativa/admin.php','none','none','127.0.0.1','1434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (580,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152639999,'/nativa/modules.php?name=Your_Account&file=admin','none','none','127.0.0.1','1434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (581,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640001,'/nativa/modules.php?name=Your_Account&file=admin&op=CookieConfig','none','none','127.0.0.1','1434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (582,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640006,'/nativa/modules.php?name=Your_Account&file=admin','none','none','127.0.0.1','1432','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (583,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640009,'/nativa/index.php','none','none','127.0.0.1','1434','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (584,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640016,'/nativa/index.php','none','none','127.0.0.1','1443','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (585,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640020,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1443','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (586,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640020,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1445','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (587,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640021,'/nativa/modules.php?name=Your_Account&op=logout','none','none','127.0.0.1','1443','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (588,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640024,'/nativa/index.php','none','none','127.0.0.1','1445','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (589,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640029,'/nativa/index.php','none','none','127.0.0.1','1455','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (590,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640035,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1455','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (591,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640035,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1457','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (592,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640044,'/nativa/index.php','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (593,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640049,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (594,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640053,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (595,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640057,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (596,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640064,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (597,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640065,'/nativa/modules.php?name=Your_Account&op=ShowCookiesRedirect','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (598,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640066,'/nativa/modules.php?name=Your_Account&op=ShowCookies','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (599,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640069,'/nativa/modules.php?name=Your_Account&op=DeleteCookies','none','none','127.0.0.1','1465','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (600,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640071,'/nativa/modules.php?name=Your_Account&op=ShowCookies','none','none','127.0.0.1','1463','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (601,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640074,'/nativa/index.php','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (602,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640076,'/nativa/index.php','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (603,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640088,'/nativa/admin.php','none','none','127.0.0.1','1463','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (604,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640099,'/nativa/admin.php','none','none','127.0.0.1','1463','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (605,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152640103,'/nativa/modules.php?name=Your_Account&file=admin','none','none','127.0.0.1','1490','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (606,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152710406,'/nativa/index.php','none','none','127.0.0.1','1456','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (607,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152710438,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1460','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (608,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795012,'/nativa/index.php','none','none','127.0.0.1','1108','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (609,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795017,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1108','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (610,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795019,'/nativa/index.php','none','none','127.0.0.1','1108','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (611,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795139,'/nativa/index.php','none','none','127.0.0.1','1122','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (612,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795184,'/nativa/index.php','none','none','127.0.0.1','1130','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (613,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795202,'/nativa/admin.php','none','none','127.0.0.1','1134','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (614,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795215,'/nativa/admin.php','none','none','127.0.0.1','1136','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (615,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795222,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1134','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (616,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795225,'/nativa/admin.php','none','none','127.0.0.1','1134','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (617,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795236,'/nativa/admin.php','none','none','127.0.0.1','1134','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (618,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795247,'/nativa/admin.php','none','none','127.0.0.1','1136','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (619,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795247,'/nativa/admin.php','none','none','127.0.0.1','1134','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (620,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795254,'/nativa/admin.php','none','none','127.0.0.1','1136','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (621,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795258,'/nativa/admin.php?op=Configure','none','none','127.0.0.1','1136','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (622,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795295,'/nativa/admin.php','none','none','127.0.0.1','1149','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (623,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795295,'/nativa/admin.php?op=Configure','none','none','127.0.0.1','1149','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (624,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795484,'/nativa/index.php','none','none','127.0.0.1','1159','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (625,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795699,'/nativa/index.php','none','none','127.0.0.1','1235','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (626,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795732,'/nativa/index.php','none','none','127.0.0.1','1239','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (627,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795778,'/nativa/index.php','none','none','127.0.0.1','1243','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (628,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795869,'/nativa/index.php','none','none','127.0.0.1','1247','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (629,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152795958,'/nativa/index.php','none','none','127.0.0.1','1251','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (630,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796009,'/nativa/index.php','none','none','127.0.0.1','1255','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (631,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796029,'/nativa/index.php','none','none','127.0.0.1','1257','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (632,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796042,'/nativa/index.php','none','none','127.0.0.1','1257','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (633,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796125,'/nativa/index.php','none','none','127.0.0.1','1264','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (634,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796171,'/nativa/index.php','none','none','127.0.0.1','1268','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (635,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796415,'/nativa/index.php','none','none','127.0.0.1','1272','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (636,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796627,'/nativa/index.php','none','none','127.0.0.1','1276','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (637,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796775,'/nativa/index.php','none','none','127.0.0.1','1282','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (638,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796854,'/nativa/index.php','none','none','127.0.0.1','1286','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (639,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796884,'/nativa/index.php','none','none','127.0.0.1','1291','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (640,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152796918,'/nativa/index.php','none','none','127.0.0.1','1295','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (641,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797009,'/nativa/index.php','none','none','127.0.0.1','1330','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (642,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797731,'/nativa/index.php','none','none','127.0.0.1','1381','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (643,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797739,'/nativa/admin.php','none','none','127.0.0.1','1381','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (644,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797753,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1387','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (645,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797757,'/nativa/admin.php?op=BlocksEdit&bid=10','none','none','127.0.0.1','1389','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (646,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797762,'/nativa/admin.php','none','none','127.0.0.1','1387','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (647,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797763,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1389','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (648,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797768,'/nativa/index.php','none','none','127.0.0.1','1393','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (649,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797847,'/nativa/index.php','none','none','127.0.0.1','1398','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (650,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797900,'/nativa/index.php','none','none','127.0.0.1','1402','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (651,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152797920,'/nativa/index.php','none','none','127.0.0.1','1402','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (652,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798013,'/nativa/index.php','none','none','127.0.0.1','1408','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (653,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798162,'/nativa/index.php','none','none','127.0.0.1','1418','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (654,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798335,'/nativa/index.php','none','none','127.0.0.1','1432','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (655,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798383,'/nativa/index.php','none','none','127.0.0.1','1436','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (656,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798442,'/nativa/index.php','none','none','127.0.0.1','1443','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (657,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798532,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1452','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (658,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798538,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1454','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (659,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798608,'/nativa/index.php','none','none','127.0.0.1','1456','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (660,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798768,'/nativa/index.php','none','none','127.0.0.1','1460','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (661,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798792,'/nativa/admin.php','none','none','127.0.0.1','1465','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (662,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798792,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (663,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798797,'/nativa/index.php','none','none','127.0.0.1','1469','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (664,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798804,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (665,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798807,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (666,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798817,'/nativa/admin.php','none','none','127.0.0.1','1465','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (667,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798817,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1468','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (668,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798819,'/nativa/index.php','none','none','127.0.0.1','1477','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (669,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798826,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1465','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (670,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798828,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1468','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (671,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798837,'/nativa/admin.php','none','none','127.0.0.1','1465','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (672,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798837,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1468','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (673,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798841,'/nativa/index.php','none','none','127.0.0.1','1485','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (674,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798857,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1489','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (675,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798865,'/nativa/admin.php','none','none','127.0.0.1','1491','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (676,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798865,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1489','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (677,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798868,'/nativa/index.php','none','none','127.0.0.1','1494','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (678,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798874,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1489','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (679,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798881,'/nativa/admin.php','none','none','127.0.0.1','1489','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (680,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798881,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1491','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (681,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798884,'/nativa/index.php','none','none','127.0.0.1','1501','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (682,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798913,'/nativa/admin.php','none','none','127.0.0.1','1505','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (683,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798921,'/nativa/admin.php?op=RemoveStory&sid=2','none','none','127.0.0.1','1507','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (684,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798923,'/nativa/admin.php?op=RemoveStory&sid=2&ok=1','none','none','127.0.0.1','1505','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (685,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798924,'/nativa/admin.php','none','none','127.0.0.1','1507','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (686,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152798927,'/nativa/index.php','none','none','127.0.0.1','1511','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (687,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799197,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1541','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (688,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799214,'/nativa/admin.php?op=BlocksEdit&bid=11','none','none','127.0.0.1','1544','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (689,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799454,'/nativa/admin.php','none','none','127.0.0.1','1552','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (690,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799454,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1552','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (691,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799489,'/nativa/admin.php?op=BlocksEdit&bid=11','none','none','127.0.0.1','1556','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (692,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799493,'/nativa/admin.php','none','none','127.0.0.1','1556','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (693,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799494,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1558','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (694,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799512,'/nativa/index.php','none','none','127.0.0.1','1561','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (695,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799521,'/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=','none','none','127.0.0.1','1563','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (696,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799525,'/nativa/index.php','none','none','127.0.0.1','1563','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (697,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799598,'/nativa/admin.php?op=BlocksEdit&bid=12','none','none','127.0.0.1','1582','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (698,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799613,'/nativa/admin.php','none','none','127.0.0.1','1584','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (699,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799613,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1584','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (700,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799616,'/nativa/index.php','none','none','127.0.0.1','1588','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (701,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799765,'/nativa/index.php','none','none','127.0.0.1','1594','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (702,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799788,'/nativa/index.php','none','none','127.0.0.1','1598','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (703,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799902,'/nativa/index.php','none','none','127.0.0.1','1602','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (704,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799921,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1606','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (705,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799932,'/nativa/admin.php','none','none','127.0.0.1','1606','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (706,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799932,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1608','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (707,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799935,'/nativa/index.php','none','none','127.0.0.1','1611','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (708,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799954,'/nativa/admin.php?op=BlocksEdit&bid=13','none','none','127.0.0.1','1615','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (709,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799961,'/nativa/admin.php','none','none','127.0.0.1','1617','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (710,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799961,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1615','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (711,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152799964,'/nativa/index.php','none','none','127.0.0.1','1620','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (712,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800179,'/nativa/index.php','none','none','127.0.0.1','1624','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (713,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800197,'/nativa/index.php','none','none','127.0.0.1','1628','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (714,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800272,'/nativa/index.php','none','none','127.0.0.1','1632','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (715,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800290,'/nativa/index.php','none','none','127.0.0.1','1638','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (716,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800340,'/nativa/index.php','none','none','127.0.0.1','1642','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (717,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800359,'/nativa/admin.php?op=BlockOrder&weight=3&bidori=9&weightrep=2&bidrep=11','none','none','127.0.0.1','1646','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (718,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800359,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1646','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (719,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800362,'/nativa/index.php','none','none','127.0.0.1','1650','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (720,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800415,'/nativa/admin.php','none','none','127.0.0.1','1654','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (721,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800415,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1654','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (722,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800473,'/nativa/index.php','none','none','127.0.0.1','1658','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (723,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800501,'/nativa/admin.php?op=BlockOrder&weight=5&bidori=14&weightrep=4&bidrep=13','none','none','127.0.0.1','1662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (724,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800501,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (725,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800504,'/nativa/admin.php?op=BlockOrder&weight=4&bidori=14&weightrep=3&bidrep=6','none','none','127.0.0.1','1662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (726,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800504,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1665','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (727,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800508,'/nativa/admin.php?op=BlockOrder&weight=3&bidori=14&weightrep=2&bidrep=12','none','none','127.0.0.1','1665','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (728,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800508,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1662','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (729,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800511,'/nativa/index.php','none','none','127.0.0.1','1670','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (730,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800565,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1674','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (731,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800580,'/nativa/admin.php','none','none','127.0.0.1','1674','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (732,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800580,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1676','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (733,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800584,'/nativa/admin.php?op=BlockOrder&weight=6&bidori=15&weightrep=5&bidrep=13','none','none','127.0.0.1','1676','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (734,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800584,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1674','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (735,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800587,'/nativa/admin.php?op=BlockOrder&weight=5&bidori=15&weightrep=4&bidrep=6','none','none','127.0.0.1','1676','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (736,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800587,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1674','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (737,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800592,'/nativa/admin.php?op=BlocksEdit&bid=14','none','none','127.0.0.1','1674','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (738,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800598,'/nativa/admin.php','none','none','127.0.0.1','1676','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (739,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800598,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1674','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (740,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800601,'/nativa/index.php','none','none','127.0.0.1','1686','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (741,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800644,'/nativa/index.php','none','none','127.0.0.1','1690','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (742,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800661,'/nativa/index.php','none','none','127.0.0.1','1694','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (743,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800674,'/nativa/index.php','none','none','127.0.0.1','1694','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (744,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800685,'/nativa/index.php','none','none','127.0.0.1','1696','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (745,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800702,'/nativa/index.php','none','none','127.0.0.1','1702','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (746,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800849,'/nativa/index.php','none','none','127.0.0.1','1724','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (747,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800883,'/nativa/index.php','none','none','127.0.0.1','1728','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (748,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152800934,'/nativa/index.php','none','none','127.0.0.1','1732','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (749,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801030,'/nativa/index.php','none','none','127.0.0.1','1736','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (750,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801051,'/nativa/index.php','none','none','127.0.0.1','1740','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (751,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801057,'/nativa/index.php','none','none','127.0.0.1','1740','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (752,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801068,'/nativa/index.php','none','none','127.0.0.1','1742','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (753,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801136,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1748','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (754,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801136,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1748','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (755,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801192,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1756','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (756,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801252,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1760','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (757,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801267,'/nativa/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry','none','none','127.0.0.1','1762','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (758,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801287,'/nativa/modules.php?name=Your_Account','none','none','127.0.0.1','1766','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (759,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801287,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1766','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (760,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801558,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1778','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (761,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801715,'/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry','none','none','127.0.0.1','1785','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (762,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801785,'/nativa/modules.php?name=Your_Account&op=edithome','none','none','127.0.0.1','1795','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (763,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801787,'/nativa/modules.php?name=Your_Account&op=edituser','none','none','127.0.0.1','1797','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (764,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801797,'/nativa/modules.php?name=Your_Account&op=avatarlist','none','none','127.0.0.1','1795','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (765,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801812,'/nativa/modules.php?name=Your_Account&op=editcomm','none','none','127.0.0.1','1797','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (766,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801816,'/nativa/modules.php?name=Your_Account&op=edituser','none','none','127.0.0.1','1797','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (767,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801822,'/nativa/modules.php?name=Private_Messages','none','none','127.0.0.1','1797','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (768,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801897,'/nativa/index.php','none','none','127.0.0.1','1810','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (769,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801911,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1814','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (770,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801914,'/nativa/admin.php','none','none','127.0.0.1','1816','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (771,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801936,'/nativa/admin.php','none','none','127.0.0.1','1819','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (772,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801959,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1822','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (773,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801981,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1825','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (774,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801984,'/nativa/admin.php','none','none','127.0.0.1','1827','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (775,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152801993,'/nativa/admin.php','none','none','127.0.0.1','1825','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (776,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802005,'/nativa/admin.php?op=BlocksAdmin','none','none','127.0.0.1','1827','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (777,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802022,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1833','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (778,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802032,'/nativa/admin.php?op=modifyadmin&chng_aid=Nativa','none','none','127.0.0.1','1833','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (779,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802046,'/nativa/admin.php','none','none','127.0.0.1','1833','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (780,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802047,'/nativa/admin.php?op=mod_authors','none','none','127.0.0.1','1835','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (781,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802053,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1835','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (782,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802172,'/nativa/admin.php','none','none','127.0.0.1','1855','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (783,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802174,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1857','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (784,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802177,'/nativa/admin.php','none','none','127.0.0.1','1855','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (785,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802185,'/nativa/admin.php','none','none','127.0.0.1','1855','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (786,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802189,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1857','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (787,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802297,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1874','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (788,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802522,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1929','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (789,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802531,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1929','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (790,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802572,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1933','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (791,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802573,'/nativa/modules.php?name=Calendar&file=submit','none','none','127.0.0.1','1935','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (792,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802578,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1935','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (793,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802587,'/nativa/admin.php?op=CalendarAdmin','none','none','127.0.0.1','1938','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (794,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802592,'/nativa/admin.php?op=create','none','none','127.0.0.1','1938','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (795,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802595,'/nativa/modules.php?name=Your_Account&file=admin','none','none','127.0.0.1','1948','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (796,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802600,'/nativa/modules.php?name=Your_Account&file=admin&op=listnormal&query=1','none','none','127.0.0.1','1938','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (797,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802648,'/nativa/admin.php','none','none','127.0.0.1','1953','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (798,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802650,'/nativa/modules.php?name=Your_Account&file=admin&op=listnormal&query=1','none','none','127.0.0.1','1955','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (799,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152802654,'/nativa/admin.php','none','none','127.0.0.1','1953','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (800,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152809756,'/nativa/index.php','none','none','127.0.0.1','2042','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (801,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152810144,'/nativa/index.php','none','none','127.0.0.1','1127','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (802,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152813666,'/nativa/index.php','none','none','127.0.0.1','1232','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (803,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152813779,'/nativa/index.php','none','none','127.0.0.1','1255','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (804,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814095,'/nativa/index.php','none','none','127.0.0.1','1261','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (805,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814121,'/nativa/index.php','none','none','127.0.0.1','1265','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (806,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814127,'/nativa/index.php','none','none','127.0.0.1','1265','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (807,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814531,'/nativa/admin.php','none','none','127.0.0.1','1318','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (808,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814536,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1320','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (809,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814566,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1327','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (810,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814569,'/nativa/admin.php','none','none','127.0.0.1','1329','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (811,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814581,'/nativa/admin.php','none','none','127.0.0.1','1329','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (812,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814587,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','1329','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (813,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814610,'/nativa/admin.php?op=topicedit&topicid=3','none','none','127.0.0.1','1334','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (814,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814630,'/nativa/admin.php','none','none','127.0.0.1','1337','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (815,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814630,'/nativa/admin.php?op=topicedit&topicid=3','none','none','127.0.0.1','1337','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (816,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814634,'/nativa/admin.php?op=topicsmanager','none','none','127.0.0.1','1340','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (817,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814643,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1337','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (818,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814647,'/nativa/admin.php','none','none','127.0.0.1','1337','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (819,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814654,'/nativa/admin.php','none','none','127.0.0.1','1337','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (820,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814657,'/nativa/admin.php?op=logout','none','none','127.0.0.1','1340','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (821,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814660,'/nativa/admin.php','none','none','127.0.0.1','1337','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (822,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814673,'/nativa/admin.php','none','none','127.0.0.1','1340','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (823,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152814675,'/nativa/admin.php?op=FCKadminStory','none','none','127.0.0.1','1340','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (824,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815079,'/nativa/admin.php','none','none','127.0.0.1','1384','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (825,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815103,'/nativa/admin.php','none','none','127.0.0.1','1387','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (826,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815141,'/nativa/admin.php','none','none','127.0.0.1','1390','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (827,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815141,'/nativa/admin.php?op=adminMain','none','none','127.0.0.1','1390','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (828,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815144,'/nativa/index.php','none','none','127.0.0.1','1393','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (829,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815148,'/nativa/modules.php?name=News&file=article&sid=3','none','none','127.0.0.1','1390','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (830,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815164,'/nativa/admin.php?op=EditStory&sid=3','none','none','127.0.0.1','1393','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (831,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815175,'/nativa/admin.php','none','none','127.0.0.1','1390','POST','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (832,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815175,'/nativa/admin.php?op=adminMain','none','none','127.0.0.1','1393','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (833,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815180,'/nativa/index.php','none','none','127.0.0.1','1390','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (834,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815182,'/nativa/modules.php?name=News&file=article&sid=3','none','none','127.0.0.1','1393','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (835,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815194,'/nativa/index.php','none','none','127.0.0.1','1393','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (836,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815257,'/nativa/modules.php?name=Stories_Archive','none','none','127.0.0.1','1411','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (837,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815260,'/nativa/modules.php?name=FCKeditor','none','none','127.0.0.1','1413','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (838,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815265,'/nativa/modules.php?name=Surveys','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (839,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815270,'/nativa/modules.php?name=Calendar','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (840,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815276,'/nativa/modules.php?name=Calendar&file=index&type=view&eid=3','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (841,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815279,'/nativa/admin.php?op=CalendarRemoveStory&eid=3','none','none','127.0.0.1','1423','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (842,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815281,'/nativa/admin.php?op=CalendarRemoveStory&eid=3&ok=1','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (843,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815281,'/nativa/modules.php?op=modload&name=Calendar&file=index','none','none','127.0.0.1','1423','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (844,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815286,'/nativa/modules.php?name=Calendar&file=index&type=view&eid=2','none','none','127.0.0.1','1423','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (845,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815288,'/nativa/admin.php?op=CalendarRemoveStory&eid=2','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (846,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815290,'/nativa/admin.php?op=CalendarRemoveStory&eid=2&ok=1','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (847,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815290,'/nativa/modules.php?op=modload&name=Calendar&file=index','none','none','127.0.0.1','1423','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (848,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815296,'/nativa/modules.php?name=Calendar&file=index&Date=08/01/2006&type=month','none','none','127.0.0.1','1423','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (849,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815299,'/nativa/modules.php?name=Calendar&file=index&Date=07/01/2006&type=month','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (850,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815302,'/nativa/modules.php?name=Statistics','none','none','127.0.0.1','1425','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (851,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815307,'/nativa/modules.php?name=Top','none','none','127.0.0.1','1423','GET','00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (852,'none','',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FDM)',1152815312,'/nativa/index.php','none','none','127.0.0.1','1425','GET','00');

#
# Table structure for table kayapo_pages
#

DROP TABLE IF EXISTS `kayapo_pages`;
CREATE TABLE `kayapo_pages` (
  `pid` int(10) NOT NULL auto_increment,
  `cid` int(10) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `subtitle` varchar(255) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  `page_header` text NOT NULL,
  `text` text NOT NULL,
  `page_footer` text NOT NULL,
  `signature` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `counter` int(10) NOT NULL default '0',
  `clanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pid`),
  KEY `pid` (`pid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_pages
#


#
# Table structure for table kayapo_pages_categories
#

DROP TABLE IF EXISTS `kayapo_pages_categories`;
CREATE TABLE `kayapo_pages_categories` (
  `cid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_pages_categories
#


#
# Table structure for table kayapo_poll_check
#

DROP TABLE IF EXISTS `kayapo_poll_check`;
CREATE TABLE `kayapo_poll_check` (
  `ip` varchar(20) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `pollID` int(10) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_poll_check
#


#
# Table structure for table kayapo_poll_data
#

DROP TABLE IF EXISTS `kayapo_poll_data`;
CREATE TABLE `kayapo_poll_data` (
  `pollID` int(11) NOT NULL default '0',
  `optionText` char(50) NOT NULL default '',
  `optionCount` int(11) NOT NULL default '0',
  `voteID` int(11) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_poll_data
#

INSERT INTO `kayapo_poll_data` VALUES (1,'Hum... Nada mal!',0,1);
INSERT INTO `kayapo_poll_data` VALUES (1,'Show!!!',0,2);
INSERT INTO `kayapo_poll_data` VALUES (1,'Maravilhoso!!!',0,3);
INSERT INTO `kayapo_poll_data` VALUES (1,'O melhor de todos!!!',1,4);
INSERT INTO `kayapo_poll_data` VALUES (1,'Hum...',0,5);
INSERT INTO `kayapo_poll_data` VALUES (1,'Não gostei!',0,6);
INSERT INTO `kayapo_poll_data` VALUES (1,'Odiei!!!',0,7);
INSERT INTO `kayapo_poll_data` VALUES (1,'',0,8);
INSERT INTO `kayapo_poll_data` VALUES (1,'',0,9);
INSERT INTO `kayapo_poll_data` VALUES (1,'',0,10);
INSERT INTO `kayapo_poll_data` VALUES (1,'',0,11);
INSERT INTO `kayapo_poll_data` VALUES (1,'',0,12);

#
# Table structure for table kayapo_poll_desc
#

DROP TABLE IF EXISTS `kayapo_poll_desc`;
CREATE TABLE `kayapo_poll_desc` (
  `pollID` int(11) NOT NULL auto_increment,
  `pollTitle` varchar(100) NOT NULL default '',
  `timeStamp` int(11) NOT NULL default '0',
  `voters` mediumint(9) NOT NULL default '0',
  `planguage` varchar(30) NOT NULL default '',
  `artid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`pollID`),
  KEY `pollID` (`pollID`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_poll_desc
#

INSERT INTO `kayapo_poll_desc` VALUES (1,'O que você achou deste site?',961405160,1,'brazilian',0);

#
# Table structure for table kayapo_pollcomments
#

DROP TABLE IF EXISTS `kayapo_pollcomments`;
CREATE TABLE `kayapo_pollcomments` (
  `tid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `pollID` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) default NULL,
  `url` varchar(60) default NULL,
  `host_name` varchar(60) default NULL,
  `subject` varchar(60) NOT NULL default '',
  `comment` text NOT NULL,
  `score` tinyint(4) NOT NULL default '0',
  `reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`),
  KEY `pollID` (`pollID`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_pollcomments
#


#
# Table structure for table kayapo_public_messages
#

DROP TABLE IF EXISTS `kayapo_public_messages`;
CREATE TABLE `kayapo_public_messages` (
  `mid` int(10) NOT NULL auto_increment,
  `content` varchar(255) NOT NULL default '',
  `date` varchar(14) default NULL,
  `who` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  KEY `mid` (`mid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_public_messages
#


#
# Table structure for table kayapo_queue
#

DROP TABLE IF EXISTS `kayapo_queue`;
CREATE TABLE `kayapo_queue` (
  `qid` smallint(5) unsigned NOT NULL auto_increment,
  `uid` mediumint(9) NOT NULL default '0',
  `uname` varchar(40) NOT NULL default '',
  `subject` varchar(100) NOT NULL default '',
  `story` text,
  `storyext` text NOT NULL,
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `topic` varchar(20) NOT NULL default '',
  `alanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`qid`),
  KEY `qid` (`qid`),
  KEY `uid` (`uid`),
  KEY `uname` (`uname`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_queue
#


#
# Table structure for table kayapo_quotes
#

DROP TABLE IF EXISTS `kayapo_quotes`;
CREATE TABLE `kayapo_quotes` (
  `qid` int(10) unsigned NOT NULL auto_increment,
  `quote` text,
  PRIMARY KEY  (`qid`),
  KEY `qid` (`qid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_quotes
#

INSERT INTO `kayapo_quotes` VALUES (1,'Nos morituri te salutamus - CBHS');

#
# Table structure for table kayapo_recherches
#

DROP TABLE IF EXISTS `kayapo_recherches`;
CREATE TABLE `kayapo_recherches` (
  `primkey` smallint(6) NOT NULL auto_increment,
  `ip` varchar(15) default NULL,
  `query` varchar(50) default NULL,
  `date` varchar(18) default NULL,
  `userid` varchar(20) default NULL,
  `total` varchar(10) default NULL,
  PRIMARY KEY  (`primkey`),
  UNIQUE KEY `primkey` (`primkey`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_recherches
#


#
# Table structure for table kayapo_referer
#

DROP TABLE IF EXISTS `kayapo_referer`;
CREATE TABLE `kayapo_referer` (
  `rid` int(11) NOT NULL auto_increment,
  `url` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `rid` (`rid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_referer
#

INSERT INTO `kayapo_referer` VALUES (1,'http://localhost/nativa/modules.php?name=Top');
INSERT INTO `kayapo_referer` VALUES (2,'http://localhost/nativa/modules.php?name=FCKeditor');
INSERT INTO `kayapo_referer` VALUES (3,'http://localhost/nativa/modules.php?name=Top');
INSERT INTO `kayapo_referer` VALUES (4,'http://localhost/nativa/modules.php?name=FCKeditor');
INSERT INTO `kayapo_referer` VALUES (5,'http://localhost/nativa/modules.php?name=Calendar');
INSERT INTO `kayapo_referer` VALUES (6,'http://localhost/nativa/modules.php?name=Calendar');
INSERT INTO `kayapo_referer` VALUES (7,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (8,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (9,'http://localhost/nativa/admin.php?op=mod_authors');
INSERT INTO `kayapo_referer` VALUES (10,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (11,'http://localhost/nativa/modules.php?name=Stories_Archive');
INSERT INTO `kayapo_referer` VALUES (12,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (13,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (14,'http://localhost/nativa/modules.php?name=Surveys');
INSERT INTO `kayapo_referer` VALUES (15,'http://localhost/nativa/admin.php?op=CalendarAdmin');
INSERT INTO `kayapo_referer` VALUES (16,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (17,'http://localhost/nativa/modules.php?op=modload&name=Calendar&file=index');
INSERT INTO `kayapo_referer` VALUES (18,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (19,'http://localhost/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=2');
INSERT INTO `kayapo_referer` VALUES (20,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (21,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (22,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (23,'http://localhost/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=2');
INSERT INTO `kayapo_referer` VALUES (24,'http://localhost/nativa/modules.php?name=Top');
INSERT INTO `kayapo_referer` VALUES (25,'http://localhost/nativa/modules.php?name=Top');
INSERT INTO `kayapo_referer` VALUES (26,'http://localhost/nativa/modules.php?name=Your_Account');
INSERT INTO `kayapo_referer` VALUES (27,'http://localhost/nativa/modules.php?name=Your_Account');
INSERT INTO `kayapo_referer` VALUES (28,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (29,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (30,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (31,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (32,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (33,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (34,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (35,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (36,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (37,'http://localhost/nativa/admin.php?op=EditStory&sid=2');
INSERT INTO `kayapo_referer` VALUES (38,'http://localhost/nativa/admin.php?op=adminMain');
INSERT INTO `kayapo_referer` VALUES (39,'http://localhost/nativa/admin.php?op=adminMain');
INSERT INTO `kayapo_referer` VALUES (40,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (41,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (42,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (43,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (44,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (45,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (46,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (47,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (48,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (49,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (50,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (51,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (52,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (53,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (54,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (55,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (56,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (57,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (58,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (59,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (60,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (61,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (62,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (63,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (64,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (65,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (66,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (67,'http://localhost/nativa/modules.php?name=Calendar&file=submit');
INSERT INTO `kayapo_referer` VALUES (68,'http://localhost/nativa/modules.php?name=Your_Account&file=admin');
INSERT INTO `kayapo_referer` VALUES (69,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (70,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (71,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (72,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (73,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (74,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (75,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (76,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (77,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (78,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (79,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (80,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (81,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (82,'http://localhost/nativa/modules.php?name=News&file=article&sid=2');
INSERT INTO `kayapo_referer` VALUES (83,'http://localhost/nativa/modules.php?op=modload&name=Calendar&file=index&type=view&eid=3');
INSERT INTO `kayapo_referer` VALUES (84,'http://localhost/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry');
INSERT INTO `kayapo_referer` VALUES (85,'http://localhost/nativa/modules.php?name=Your_Account&op=userinfo&username=Mandry');
INSERT INTO `kayapo_referer` VALUES (86,'http://localhost/nativa/modules.php?name=Calendar');
INSERT INTO `kayapo_referer` VALUES (87,'http://localhost/nativa/admin.php?op=CalendarAdmin');
INSERT INTO `kayapo_referer` VALUES (88,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (89,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (90,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (91,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (92,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (93,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (94,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (95,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (96,'http://localhost/nativa/admin.php?op=BlocksAdmin');
INSERT INTO `kayapo_referer` VALUES (97,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (98,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (99,'http://localhost/nativa/index.php');
INSERT INTO `kayapo_referer` VALUES (100,'http://localhost/nativa/admin.php');
INSERT INTO `kayapo_referer` VALUES (101,'http://localhost/nativa/admin.php?op=Configure');
INSERT INTO `kayapo_referer` VALUES (102,'http://localhost/nativa/modules.php?name=Stories_Archive');
INSERT INTO `kayapo_referer` VALUES (103,'http://localhost/nativa/modules.php?name=Your_Account&op=edituser');
INSERT INTO `kayapo_referer` VALUES (104,'http://localhost/nativa/modules.php?name=Your_Account&file=admin');
INSERT INTO `kayapo_referer` VALUES (105,'http://localhost/nativa/modules.php?name=Your_Account&op=ShowCookies');
INSERT INTO `kayapo_referer` VALUES (106,'http://localhost/nativa/modules.php?name=Your_Account&op=ShowCookies');
INSERT INTO `kayapo_referer` VALUES (107,'http://localhost/nativa/modules.php?name=Your_Account');
INSERT INTO `kayapo_referer` VALUES (108,'http://localhost/nativa/modules.php?name=Your_Account');
INSERT INTO `kayapo_referer` VALUES (109,'http://localhost/nativa/modules.php?name=Your_Account');
INSERT INTO `kayapo_referer` VALUES (110,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (111,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (112,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (113,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (114,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (115,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (116,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (117,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (118,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (119,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (120,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (121,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (122,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (123,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (124,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (125,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (126,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (127,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (128,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (129,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (130,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (131,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (132,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (133,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (134,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (135,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (136,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (137,'http://localhost/nativa/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=');
INSERT INTO `kayapo_referer` VALUES (138,'http://localhost/nativa/modules.php?name=Private_Messages');
INSERT INTO `kayapo_referer` VALUES (139,'http://localhost/nativa/modules.php?name=Private_Messages');
INSERT INTO `kayapo_referer` VALUES (140,'http://localhost/nativa/admin.php?op=adminMain');
INSERT INTO `kayapo_referer` VALUES (141,'http://localhost/nativa/admin.php?op=adminMain');
INSERT INTO `kayapo_referer` VALUES (142,'http://localhost/nativa/modules.php?name=News&file=article&sid=3');
INSERT INTO `kayapo_referer` VALUES (143,'http://localhost/nativa/modules.php?name=Top');

#
# Table structure for table kayapo_related
#

DROP TABLE IF EXISTS `kayapo_related`;
CREATE TABLE `kayapo_related` (
  `rid` int(11) NOT NULL auto_increment,
  `tid` int(11) NOT NULL default '0',
  `name` varchar(30) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `rid` (`rid`),
  KEY `tid` (`tid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_related
#


#
# Table structure for table kayapo_reviews
#

DROP TABLE IF EXISTS `kayapo_reviews`;
CREATE TABLE `kayapo_reviews` (
  `id` int(10) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `title` varchar(150) NOT NULL default '',
  `text` text NOT NULL,
  `reviewer` varchar(20) default NULL,
  `email` varchar(60) default NULL,
  `score` int(10) NOT NULL default '0',
  `cover` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `url_title` varchar(50) NOT NULL default '',
  `hits` int(10) NOT NULL default '0',
  `rlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_reviews
#


#
# Table structure for table kayapo_reviews_add
#

DROP TABLE IF EXISTS `kayapo_reviews_add`;
CREATE TABLE `kayapo_reviews_add` (
  `id` int(10) NOT NULL auto_increment,
  `date` date default NULL,
  `title` varchar(150) NOT NULL default '',
  `text` text NOT NULL,
  `reviewer` varchar(20) NOT NULL default '',
  `email` varchar(60) default NULL,
  `score` int(10) NOT NULL default '0',
  `url` varchar(100) NOT NULL default '',
  `url_title` varchar(50) NOT NULL default '',
  `rlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_reviews_add
#


#
# Table structure for table kayapo_reviews_comments
#

DROP TABLE IF EXISTS `kayapo_reviews_comments`;
CREATE TABLE `kayapo_reviews_comments` (
  `cid` int(10) NOT NULL auto_increment,
  `rid` int(10) NOT NULL default '0',
  `userid` varchar(25) NOT NULL default '',
  `date` datetime default NULL,
  `comments` text,
  `score` int(10) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`),
  KEY `rid` (`rid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_reviews_comments
#


#
# Table structure for table kayapo_reviews_main
#

DROP TABLE IF EXISTS `kayapo_reviews_main`;
CREATE TABLE `kayapo_reviews_main` (
  `title` varchar(100) default NULL,
  `description` text
) TYPE=MyISAM;

#
# Dumping data for table kayapo_reviews_main
#

INSERT INTO `kayapo_reviews_main` VALUES ('Reviews Section Title','Reviews Section Long Description');

#
# Table structure for table kayapo_session
#

DROP TABLE IF EXISTS `kayapo_session`;
CREATE TABLE `kayapo_session` (
  `uname` varchar(25) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `host_addr` varchar(48) NOT NULL default '',
  `guest` int(1) NOT NULL default '0',
  KEY `time` (`time`),
  KEY `guest` (`guest`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_session
#

INSERT INTO `kayapo_session` VALUES ('127.0.0.1','1152815312','127.0.0.1',1);

#
# Table structure for table kayapo_stats_date
#

DROP TABLE IF EXISTS `kayapo_stats_date`;
CREATE TABLE `kayapo_stats_date` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `date` tinyint(4) NOT NULL default '0',
  `hits` bigint(20) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_stats_date
#

INSERT INTO `kayapo_stats_date` VALUES (2006,1,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,1,31,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,2,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,3,31,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,4,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,5,31,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,6,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,10,372);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,11,144);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,12,2);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,13,214);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,7,31,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,8,31,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,9,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,10,31,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,11,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,1,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,2,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,3,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,4,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,5,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,6,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,7,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,8,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,9,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,10,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,11,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,12,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,13,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,14,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,15,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,16,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,17,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,18,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,19,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,20,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,21,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,22,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,23,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,24,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,25,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,26,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,27,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,28,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,29,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,30,0);
INSERT INTO `kayapo_stats_date` VALUES (2006,12,31,0);

#
# Table structure for table kayapo_stats_hour
#

DROP TABLE IF EXISTS `kayapo_stats_hour`;
CREATE TABLE `kayapo_stats_hour` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `date` tinyint(4) NOT NULL default '0',
  `hour` tinyint(4) NOT NULL default '0',
  `hits` int(11) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_stats_hour
#

INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,0,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,1,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,2,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,3,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,4,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,5,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,6,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,7,33);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,8,51);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,9,65);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,10,91);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,11,33);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,12,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,13,4);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,14,53);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,15,8);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,16,5);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,17,29);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,18,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,19,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,20,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,21,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,22,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,10,23,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,0,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,1,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,2,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,3,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,4,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,5,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,6,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,7,27);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,8,52);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,9,19);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,10,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,11,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,12,13);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,13,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,14,33);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,15,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,16,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,17,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,18,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,19,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,20,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,21,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,22,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,11,23,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,0,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,1,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,2,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,3,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,4,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,5,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,6,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,7,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,8,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,9,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,10,2);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,11,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,12,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,13,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,14,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,15,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,16,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,17,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,18,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,19,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,20,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,21,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,22,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,12,23,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,0,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,1,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,2,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,3,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,4,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,5,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,6,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,7,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,8,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,9,15);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,10,56);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,11,95);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,12,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,13,1);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,14,1);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,15,46);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,16,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,17,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,18,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,19,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,20,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,21,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,22,0);
INSERT INTO `kayapo_stats_hour` VALUES (2006,7,13,23,0);

#
# Table structure for table kayapo_stats_month
#

DROP TABLE IF EXISTS `kayapo_stats_month`;
CREATE TABLE `kayapo_stats_month` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `hits` bigint(20) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_stats_month
#

INSERT INTO `kayapo_stats_month` VALUES (2006,1,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,2,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,3,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,4,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,5,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,6,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,7,732);
INSERT INTO `kayapo_stats_month` VALUES (2006,8,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,9,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,10,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,11,0);
INSERT INTO `kayapo_stats_month` VALUES (2006,12,0);

#
# Table structure for table kayapo_stats_year
#

DROP TABLE IF EXISTS `kayapo_stats_year`;
CREATE TABLE `kayapo_stats_year` (
  `year` smallint(6) NOT NULL default '0',
  `hits` bigint(20) NOT NULL default '0'
) TYPE=MyISAM;

#
# Dumping data for table kayapo_stats_year
#

INSERT INTO `kayapo_stats_year` VALUES (2006,732);

#
# Table structure for table kayapo_stories
#

DROP TABLE IF EXISTS `kayapo_stories`;
CREATE TABLE `kayapo_stories` (
  `sid` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(80) default NULL,
  `time` datetime default NULL,
  `hometext` text,
  `bodytext` text NOT NULL,
  `comments` int(11) default '0',
  `counter` mediumint(8) unsigned default NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(20) NOT NULL default '',
  `notes` text NOT NULL,
  `ihome` int(1) NOT NULL default '0',
  `alanguage` varchar(30) NOT NULL default '',
  `acomm` int(1) NOT NULL default '0',
  `haspoll` int(1) NOT NULL default '0',
  `pollID` int(10) NOT NULL default '0',
  `score` int(10) NOT NULL default '0',
  `ratings` int(10) NOT NULL default '0',
  `associated` text NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `sid` (`sid`),
  KEY `catid` (`catid`),
  KEY `counter` (`counter`),
  KEY `topic` (`topic`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_stories
#

INSERT INTO `kayapo_stories` VALUES (3,0,'Irai','Iraí possue a melhro água mineral do Brasil','2006-07-13 15:25:41','<font face=\"Verdana\" size=\"1\"><img height=\"92\" alt=\"\" src=\"/modules/FCKeditor/upload/Image/caixa.jpg\" width=\"140\" align=\"left\" border=\"1\"/> Iraí possue a melhor água mineral e a segunda melhor do mundo. No norte do estado gaúcho, fazendo há muito a história da integração com os demais estados brasileiros, você encontra, em meio à mata nativa, uma das mais belas e importantes estâncias hidrominerais que existem neste Brasil de mil cores: <b>Iraí</b>.</font>','<br><br><br><div align=\"justify\"><table border=\"0\"><tbody><tr><td><p><font face=\"Verdana\" size=\"1\">Fonte de águas termais, Iraí oferece um cenário incomparável em beleza natural. O Balneário Osvaldo Cruz foi construído sobre uma fonte de onde, através de uma fenda rochosa, jorra água mineral termal, alcalina, clorosulfatada e bicarbonatada, com temperatura de 36 oC, direto da fonte. Neste local, você pode curtir as piscinas e desfrutar o luxo de um banho de imersão de água mineral, a própria fonte da juventude a sua disposição. <br/></font></p><dd><font face=\"Verdana\" size=\"1\">Para quem deseja caminhar, pedalar, correr, cavalgar, nada melhor do que seguir as trilhas do Parque que circundam o Balneário. Nele, você pode ouvir o canto dos pássaros que alegra a natureza exuberante desta cidade. <br/></font></dd><dd><font face=\"Verdana\" size=\"1\">Também a inquietação dos jovens de todas as idades pode encontrar nas quadras de esportes motivos para, além do culto à saúde e à beleza, o encontro casual, a amizade, a convivência entre pessoas de várias regiões do Brasil e exterior. </font></dd><dd><font face=\"Verdana\" size=\"1\"></font></dd></td></tr><tr><td><font face=\"Verdana\" size=\"1\"><img height=\"180\" alt=\"\" src=\"http://www.uri.br/~preuss/camping.jpg\" width=\"240\" align=\"left\" border=\"1\"/> </font><dd><font face=\"Verdana\" size=\"1\"> Se a sua intenção é ouvir o canto das águas, esquecer a rotina e misturar-se ao perfume da mata, Iraí tem área de camping na medida do seu sonho. <br/></font></dd><dd><font face=\"Verdana\" size=\"1\">Já se você pretende testar a sorte na pescaria, o Rio Uruguai, orgulho de todo o Estado, oferece tranqüilidade e condições para tal. Ou se você gosta de aventura e velocidade, leve seu jet-ski e prove a sensação que a brisa oferece. </font></dd></td></tr></tbody></table></div><p align=\"justify\"><font face=\"Verdana\" size=\"1\"></font></p>',0,2,3,'Irai','',0,'',0,0,0,0,0,'3-');

#
# Table structure for table kayapo_stories_cat
#

DROP TABLE IF EXISTS `kayapo_stories_cat`;
CREATE TABLE `kayapo_stories_cat` (
  `catid` int(11) NOT NULL auto_increment,
  `title` varchar(20) NOT NULL default '',
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`catid`),
  KEY `catid` (`catid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_stories_cat
#


#
# Table structure for table kayapo_subscriptions
#

DROP TABLE IF EXISTS `kayapo_subscriptions`;
CREATE TABLE `kayapo_subscriptions` (
  `id` int(10) NOT NULL auto_increment,
  `userid` int(10) default '0',
  `subscription_expire` varchar(50) NOT NULL default '',
  KEY `id` (`id`,`userid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_subscriptions
#


#
# Table structure for table kayapo_topics
#

DROP TABLE IF EXISTS `kayapo_topics`;
CREATE TABLE `kayapo_topics` (
  `topicid` int(3) NOT NULL auto_increment,
  `topicname` varchar(20) default NULL,
  `topicimage` varchar(20) default NULL,
  `topictext` varchar(40) default NULL,
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`),
  KEY `topicid` (`topicid`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_topics
#

INSERT INTO `kayapo_topics` VALUES (2,'Geral','foruns.gif','Notícias Gerais',0);
INSERT INTO `kayapo_topics` VALUES (3,'Turismo','notregional.gif','Turismo',0);
INSERT INTO `kayapo_topics` VALUES (4,'Variedades','eventos.gif','Variedades',0);
INSERT INTO `kayapo_topics` VALUES (5,'Informativo','notbrasil.gif','Informativo',0);

#
# Table structure for table kayapo_users
#

DROP TABLE IF EXISTS `kayapo_users`;
CREATE TABLE `kayapo_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `username` varchar(25) NOT NULL default '',
  `user_email` varchar(255) NOT NULL default '',
  `femail` varchar(255) NOT NULL default '',
  `user_website` varchar(255) NOT NULL default '',
  `user_avatar` varchar(255) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `user_icq` varchar(15) default NULL,
  `user_occ` varchar(100) default NULL,
  `user_from` varchar(100) default NULL,
  `user_interests` varchar(150) NOT NULL default '',
  `user_sig` varchar(255) default NULL,
  `user_viewemail` tinyint(2) default NULL,
  `user_theme` int(3) default NULL,
  `user_aim` varchar(18) default NULL,
  `user_yim` varchar(25) default NULL,
  `user_msnm` varchar(25) default NULL,
  `user_password` varchar(40) NOT NULL default '',
  `storynum` tinyint(4) NOT NULL default '10',
  `umode` varchar(10) NOT NULL default '',
  `uorder` tinyint(1) NOT NULL default '0',
  `thold` tinyint(1) NOT NULL default '0',
  `noscore` tinyint(1) NOT NULL default '0',
  `bio` tinytext NOT NULL,
  `ublockon` tinyint(1) NOT NULL default '0',
  `ublock` tinytext NOT NULL,
  `theme` varchar(255) NOT NULL default '',
  `commentmax` int(11) NOT NULL default '4096',
  `counter` int(11) NOT NULL default '0',
  `newsletter` int(1) NOT NULL default '0',
  `user_posts` int(10) NOT NULL default '0',
  `user_attachsig` int(2) NOT NULL default '0',
  `user_rank` int(10) NOT NULL default '0',
  `user_level` int(10) NOT NULL default '1',
  `broadcast` tinyint(1) NOT NULL default '1',
  `popmeson` tinyint(1) NOT NULL default '0',
  `user_active` tinyint(1) default '1',
  `user_session_time` int(11) NOT NULL default '0',
  `user_session_page` smallint(5) NOT NULL default '0',
  `user_lastvisit` int(11) NOT NULL default '0',
  `user_timezone` tinyint(4) NOT NULL default '10',
  `user_style` tinyint(4) default NULL,
  `user_lang` varchar(255) NOT NULL default 'brazilian',
  `user_dateformat` varchar(14) NOT NULL default 'D M d, Y g:i a',
  `user_new_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_unread_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_last_privmsg` int(11) NOT NULL default '0',
  `user_emailtime` int(11) default NULL,
  `user_allowhtml` tinyint(1) default '1',
  `user_allowbbcode` tinyint(1) default '1',
  `user_allowsmile` tinyint(1) default '1',
  `user_allowavatar` tinyint(1) NOT NULL default '1',
  `user_allow_pm` tinyint(1) NOT NULL default '1',
  `user_allow_viewonline` tinyint(1) NOT NULL default '1',
  `user_notify` tinyint(1) NOT NULL default '0',
  `user_notify_pm` tinyint(1) NOT NULL default '0',
  `user_popup_pm` tinyint(1) NOT NULL default '0',
  `user_avatar_type` tinyint(4) NOT NULL default '3',
  `user_sig_bbcode_uid` varchar(10) default NULL,
  `user_actkey` varchar(32) default NULL,
  `user_newpasswd` varchar(32) default NULL,
  `points` int(10) default '0',
  `last_ip` varchar(15) NOT NULL default '0',
  `agreedtos` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  KEY `uid` (`user_id`),
  KEY `uname` (`username`),
  KEY `user_session_time` (`user_session_time`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_users
#

INSERT INTO `kayapo_users` VALUES (1,'','Anonymous','','','','blank.gif','Nov 10, 2000','','','','','',0,0,'','','','',10,'',0,0,0,'',0,'','',4096,0,0,0,0,0,1,0,0,1,0,0,0,10,NULL,'brazilian','D M d, Y g:i a',0,0,0,NULL,1,1,1,1,1,1,1,1,0,3,NULL,NULL,NULL,0,'0',0);
INSERT INTO `kayapo_users` VALUES (2,'','Mandry','desenvolvimento@speedrs.com.br','','http://localhost/nativa','gallery/blank.gif','Jul 10, 2006',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'e10adc3949ba59abbe56e057f20f883e',10,'',0,0,0,'',0,'','',4096,0,0,0,0,0,2,1,0,1,1152801823,0,1152614640,10,NULL,'brazilian','D M d, Y g:i a',0,0,1152801823,NULL,1,1,1,1,1,1,0,0,0,3,NULL,NULL,NULL,0,'127.0.0.1',0);

#
# Table structure for table kayapo_users_temp
#

DROP TABLE IF EXISTS `kayapo_users_temp`;
CREATE TABLE `kayapo_users_temp` (
  `user_id` int(10) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL default '',
  `realname` varchar(255) NOT NULL default '',
  `user_email` varchar(255) NOT NULL default '',
  `user_password` varchar(40) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `check_num` varchar(50) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) TYPE=MyISAM;

#
# Dumping data for table kayapo_users_temp
#

