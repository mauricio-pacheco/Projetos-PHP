# MySQL-Front Dump 2.5
#
# Host: localhost   Database: str
# --------------------------------------------------------
# Server version 4.0.22-nt


#
# Table structure for table 'kayapo_authors'
#

CREATE TABLE kayapo_authors (
  aid varchar(25) NOT NULL default '',
  name varchar(50) default NULL,
  url varchar(255) NOT NULL default '',
  email varchar(255) NOT NULL default '',
  pwd varchar(40) default NULL,
  counter int(11) NOT NULL default '0',
  radminsuper tinyint(1) NOT NULL default '1',
  admlanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (aid),
  KEY aid (aid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_authors'
#

INSERT INTO kayapo_authors VALUES("Mandry", "God", "http://localhost/str", "mandry@casadaweb.net", "e2f4b11ba4591d2a84e8462623b45d60", "-1", "1", "");
INSERT INTO kayapo_authors VALUES("str", "STR - Sindicato dos Traba", "", "mandrymaster@bol.com.br", "e10adc3949ba59abbe56e057f20f883e", "3", "0", "");


#
# Table structure for table 'kayapo_autonews'
#

CREATE TABLE kayapo_autonews (
  anid int(11) NOT NULL auto_increment,
  catid int(11) NOT NULL default '0',
  aid varchar(30) NOT NULL default '',
  title varchar(80) NOT NULL default '',
  time varchar(19) NOT NULL default '',
  hometext text NOT NULL,
  bodytext text NOT NULL,
  topic int(3) NOT NULL default '1',
  informant varchar(20) NOT NULL default '',
  notes text NOT NULL,
  ihome int(1) NOT NULL default '0',
  alanguage varchar(30) NOT NULL default '',
  acomm int(1) NOT NULL default '0',
  associated text NOT NULL,
  PRIMARY KEY  (anid),
  KEY anid (anid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_autonews'
#



#
# Table structure for table 'kayapo_banned_ip'
#

CREATE TABLE kayapo_banned_ip (
  id int(11) NOT NULL auto_increment,
  ip_address varchar(15) NOT NULL default '',
  reason varchar(255) NOT NULL default '',
  date date NOT NULL default '0000-00-00',
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_banned_ip'
#



#
# Table structure for table 'kayapo_banner'
#

CREATE TABLE kayapo_banner (
  bid int(11) NOT NULL auto_increment,
  cid int(11) NOT NULL default '0',
  imptotal int(11) NOT NULL default '0',
  impmade int(11) NOT NULL default '0',
  clicks int(11) NOT NULL default '0',
  imageurl varchar(100) NOT NULL default '',
  clickurl varchar(200) NOT NULL default '',
  alttext varchar(255) NOT NULL default '',
  date datetime default NULL,
  dateend datetime default NULL,
  type tinyint(1) NOT NULL default '0',
  active tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (bid),
  KEY bid (bid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_banner'
#

INSERT INTO kayapo_banner VALUES("1", "1", "0", "63", "0", "http://kayapo.phpnuke.org.br/images/banner01.gif", "kayapo.phpnuke.org.br", "Kayap?! Toda a for?a do PHP-Nuke...", "2005-01-13 16:27:39", "0000-00-00 00:00:00", "0", "1");


#
# Table structure for table 'kayapo_bannerclient'
#

CREATE TABLE kayapo_bannerclient (
  cid int(11) NOT NULL auto_increment,
  name varchar(60) NOT NULL default '',
  contact varchar(60) NOT NULL default '',
  email varchar(60) NOT NULL default '',
  login varchar(10) NOT NULL default '',
  passwd varchar(10) NOT NULL default '',
  extrainfo text NOT NULL,
  PRIMARY KEY  (cid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bannerclient'
#

INSERT INTO kayapo_bannerclient VALUES("1", "Kayap?", "Kayap?", "kayapo@phpnuke.org.br", "kayapo", "kanyanpob", "@;D");


#
# Table structure for table 'kayapo_bbauth_access'
#

CREATE TABLE kayapo_bbauth_access (
  group_id mediumint(8) NOT NULL default '0',
  forum_id smallint(5) unsigned NOT NULL default '0',
  auth_view tinyint(1) NOT NULL default '0',
  auth_read tinyint(1) NOT NULL default '0',
  auth_post tinyint(1) NOT NULL default '0',
  auth_reply tinyint(1) NOT NULL default '0',
  auth_edit tinyint(1) NOT NULL default '0',
  auth_delete tinyint(1) NOT NULL default '0',
  auth_sticky tinyint(1) NOT NULL default '0',
  auth_announce tinyint(1) NOT NULL default '0',
  auth_vote tinyint(1) NOT NULL default '0',
  auth_pollcreate tinyint(1) NOT NULL default '0',
  auth_attachments tinyint(1) NOT NULL default '0',
  auth_mod tinyint(1) NOT NULL default '0',
  KEY group_id (group_id),
  KEY forum_id (forum_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbauth_access'
#



#
# Table structure for table 'kayapo_bbbanlist'
#

CREATE TABLE kayapo_bbbanlist (
  ban_id mediumint(8) unsigned NOT NULL auto_increment,
  ban_userid mediumint(8) NOT NULL default '0',
  ban_ip varchar(8) NOT NULL default '',
  ban_email varchar(255) default NULL,
  ban_time int(11) default NULL,
  ban_expire_time int(11) default NULL,
  ban_by_userid mediumint(8) default NULL,
  ban_priv_reason text,
  ban_pub_reason_mode tinyint(1) default NULL,
  ban_pub_reason text,
  PRIMARY KEY  (ban_id),
  KEY ban_ip_user_id (ban_ip,ban_userid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbbanlist'
#



#
# Table structure for table 'kayapo_bbcategories'
#

CREATE TABLE kayapo_bbcategories (
  cat_id mediumint(8) unsigned NOT NULL auto_increment,
  cat_title varchar(100) default NULL,
  cat_order mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (cat_id),
  KEY cat_order (cat_order)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbcategories'
#



#
# Table structure for table 'kayapo_bbconfig'
#

CREATE TABLE kayapo_bbconfig (
  config_name varchar(255) NOT NULL default '',
  config_value varchar(255) NOT NULL default '',
  PRIMARY KEY  (config_name)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbconfig'
#

INSERT INTO kayapo_bbconfig VALUES("config_id", "1");
INSERT INTO kayapo_bbconfig VALUES("board_disable", "0");
INSERT INTO kayapo_bbconfig VALUES("sitename", "meusite.com.br");
INSERT INTO kayapo_bbconfig VALUES("site_desc", "Site feito com PHP-Nuke 7.5 CNB - Kayap?");
INSERT INTO kayapo_bbconfig VALUES("cookie_name", "phpbb2mysql");
INSERT INTO kayapo_bbconfig VALUES("cookie_path", "/");
INSERT INTO kayapo_bbconfig VALUES("cookie_domain", "meysite.com.br");
INSERT INTO kayapo_bbconfig VALUES("cookie_secure", "0");
INSERT INTO kayapo_bbconfig VALUES("session_length", "3600");
INSERT INTO kayapo_bbconfig VALUES("allow_html", "1");
INSERT INTO kayapo_bbconfig VALUES("allow_html_tags", "b,i,u,pre");
INSERT INTO kayapo_bbconfig VALUES("allow_bbcode", "1");
INSERT INTO kayapo_bbconfig VALUES("allow_smilies", "1");
INSERT INTO kayapo_bbconfig VALUES("allow_sig", "1");
INSERT INTO kayapo_bbconfig VALUES("allow_namechange", "0");
INSERT INTO kayapo_bbconfig VALUES("allow_theme_create", "0");
INSERT INTO kayapo_bbconfig VALUES("allow_avatar_local", "1");
INSERT INTO kayapo_bbconfig VALUES("allow_avatar_remote", "0");
INSERT INTO kayapo_bbconfig VALUES("allow_avatar_upload", "0");
INSERT INTO kayapo_bbconfig VALUES("override_user_style", "1");
INSERT INTO kayapo_bbconfig VALUES("posts_per_page", "15");
INSERT INTO kayapo_bbconfig VALUES("topics_per_page", "50");
INSERT INTO kayapo_bbconfig VALUES("hot_threshold", "25");
INSERT INTO kayapo_bbconfig VALUES("max_poll_options", "10");
INSERT INTO kayapo_bbconfig VALUES("max_sig_chars", "255");
INSERT INTO kayapo_bbconfig VALUES("max_inbox_privmsgs", "100");
INSERT INTO kayapo_bbconfig VALUES("max_sentbox_privmsgs", "100");
INSERT INTO kayapo_bbconfig VALUES("max_savebox_privmsgs", "100");
INSERT INTO kayapo_bbconfig VALUES("board_email_sig", "Thanks, Webmaster@MySite.com");
INSERT INTO kayapo_bbconfig VALUES("board_email", "Webmaster@MySite.com");
INSERT INTO kayapo_bbconfig VALUES("smtp_delivery", "0");
INSERT INTO kayapo_bbconfig VALUES("smtp_host", "");
INSERT INTO kayapo_bbconfig VALUES("require_activation", "0");
INSERT INTO kayapo_bbconfig VALUES("flood_interval", "15");
INSERT INTO kayapo_bbconfig VALUES("board_email_form", "0");
INSERT INTO kayapo_bbconfig VALUES("avatar_filesize", "6144");
INSERT INTO kayapo_bbconfig VALUES("avatar_max_width", "80");
INSERT INTO kayapo_bbconfig VALUES("avatar_max_height", "80");
INSERT INTO kayapo_bbconfig VALUES("avatar_path", "modules/Forums/images/avatars");
INSERT INTO kayapo_bbconfig VALUES("avatar_gallery_path", "modules/Forums/images/avatars");
INSERT INTO kayapo_bbconfig VALUES("smilies_path", "modules/Forums/images/smiles");
INSERT INTO kayapo_bbconfig VALUES("default_style", "2");
INSERT INTO kayapo_bbconfig VALUES("default_dateformat", "D M d, Y g:i a");
INSERT INTO kayapo_bbconfig VALUES("board_timezone", "-3");
INSERT INTO kayapo_bbconfig VALUES("prune_enable", "0");
INSERT INTO kayapo_bbconfig VALUES("privmsg_disable", "0");
INSERT INTO kayapo_bbconfig VALUES("gzip_compress", "0");
INSERT INTO kayapo_bbconfig VALUES("coppa_fax", "");
INSERT INTO kayapo_bbconfig VALUES("coppa_mail", "");
INSERT INTO kayapo_bbconfig VALUES("board_startdate", "1013908210");
INSERT INTO kayapo_bbconfig VALUES("default_lang", "brazilian");
INSERT INTO kayapo_bbconfig VALUES("smtp_username", "");
INSERT INTO kayapo_bbconfig VALUES("smtp_password", "");
INSERT INTO kayapo_bbconfig VALUES("record_online_users", "");
INSERT INTO kayapo_bbconfig VALUES("record_online_date", "");
INSERT INTO kayapo_bbconfig VALUES("server_name", "Kayap? WebSite");
INSERT INTO kayapo_bbconfig VALUES("server_port", "80");
INSERT INTO kayapo_bbconfig VALUES("script_path", "/modules/Forums/");
INSERT INTO kayapo_bbconfig VALUES("version", ".0.10");
INSERT INTO kayapo_bbconfig VALUES("enable_confirm", "0");
INSERT INTO kayapo_bbconfig VALUES("sendmail_fix", "0");


#
# Table structure for table 'kayapo_bbdisallow'
#

CREATE TABLE kayapo_bbdisallow (
  disallow_id mediumint(8) unsigned NOT NULL auto_increment,
  disallow_username varchar(25) default NULL,
  PRIMARY KEY  (disallow_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbdisallow'
#



#
# Table structure for table 'kayapo_bbforum_prune'
#

CREATE TABLE kayapo_bbforum_prune (
  prune_id mediumint(8) unsigned NOT NULL auto_increment,
  forum_id smallint(5) unsigned NOT NULL default '0',
  prune_days tinyint(4) unsigned NOT NULL default '0',
  prune_freq tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (prune_id),
  KEY forum_id (forum_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbforum_prune'
#



#
# Table structure for table 'kayapo_bbforums'
#

CREATE TABLE kayapo_bbforums (
  forum_id smallint(5) unsigned NOT NULL auto_increment,
  cat_id mediumint(8) unsigned NOT NULL default '0',
  forum_name varchar(150) default NULL,
  forum_desc text,
  forum_status tinyint(4) NOT NULL default '0',
  forum_order mediumint(8) unsigned NOT NULL default '1',
  forum_posts mediumint(8) unsigned NOT NULL default '0',
  forum_topics mediumint(8) unsigned NOT NULL default '0',
  forum_last_post_id mediumint(8) unsigned NOT NULL default '0',
  prune_next int(11) default NULL,
  prune_enable tinyint(1) NOT NULL default '1',
  auth_view tinyint(2) NOT NULL default '0',
  auth_read tinyint(2) NOT NULL default '0',
  auth_post tinyint(2) NOT NULL default '0',
  auth_reply tinyint(2) NOT NULL default '0',
  auth_edit tinyint(2) NOT NULL default '0',
  auth_delete tinyint(2) NOT NULL default '0',
  auth_sticky tinyint(2) NOT NULL default '0',
  auth_announce tinyint(2) NOT NULL default '0',
  auth_vote tinyint(2) NOT NULL default '0',
  auth_pollcreate tinyint(2) NOT NULL default '0',
  auth_attachments tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (forum_id),
  KEY forums_order (forum_order),
  KEY cat_id (cat_id),
  KEY forum_last_post_id (forum_last_post_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbforums'
#



#
# Table structure for table 'kayapo_bbgroups'
#

CREATE TABLE kayapo_bbgroups (
  group_id mediumint(8) NOT NULL auto_increment,
  group_type tinyint(4) NOT NULL default '1',
  group_name varchar(40) NOT NULL default '',
  group_description varchar(255) NOT NULL default '',
  group_moderator mediumint(8) NOT NULL default '0',
  group_single_user tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (group_id),
  KEY group_single_user (group_single_user)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbgroups'
#

INSERT INTO kayapo_bbgroups VALUES("1", "1", "Anonymous", "Personal User", "0", "1");


#
# Table structure for table 'kayapo_bbposts'
#

CREATE TABLE kayapo_bbposts (
  post_id mediumint(8) unsigned NOT NULL auto_increment,
  topic_id mediumint(8) unsigned NOT NULL default '0',
  forum_id smallint(5) unsigned NOT NULL default '0',
  poster_id mediumint(8) NOT NULL default '0',
  post_time int(11) NOT NULL default '0',
  poster_ip varchar(8) NOT NULL default '',
  post_username varchar(25) default NULL,
  enable_bbcode tinyint(1) NOT NULL default '1',
  enable_html tinyint(1) NOT NULL default '0',
  enable_smilies tinyint(1) NOT NULL default '1',
  enable_sig tinyint(1) NOT NULL default '1',
  post_edit_time int(11) default NULL,
  post_edit_count smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (post_id),
  KEY forum_id (forum_id),
  KEY topic_id (topic_id),
  KEY poster_id (poster_id),
  KEY post_time (post_time)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbposts'
#



#
# Table structure for table 'kayapo_bbposts_text'
#

CREATE TABLE kayapo_bbposts_text (
  post_id mediumint(8) unsigned NOT NULL default '0',
  bbcode_uid varchar(10) NOT NULL default '',
  post_subject varchar(60) default NULL,
  post_text text,
  PRIMARY KEY  (post_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbposts_text'
#



#
# Table structure for table 'kayapo_bbprivmsgs'
#

CREATE TABLE kayapo_bbprivmsgs (
  privmsgs_id mediumint(8) unsigned NOT NULL auto_increment,
  privmsgs_type tinyint(4) NOT NULL default '0',
  privmsgs_subject varchar(255) NOT NULL default '0',
  privmsgs_from_userid mediumint(8) NOT NULL default '0',
  privmsgs_to_userid mediumint(8) NOT NULL default '0',
  privmsgs_date int(11) NOT NULL default '0',
  privmsgs_ip varchar(8) NOT NULL default '',
  privmsgs_enable_bbcode tinyint(1) NOT NULL default '1',
  privmsgs_enable_html tinyint(1) NOT NULL default '0',
  privmsgs_enable_smilies tinyint(1) NOT NULL default '1',
  privmsgs_attach_sig tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (privmsgs_id),
  KEY privmsgs_from_userid (privmsgs_from_userid),
  KEY privmsgs_to_userid (privmsgs_to_userid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbprivmsgs'
#



#
# Table structure for table 'kayapo_bbprivmsgs_text'
#

CREATE TABLE kayapo_bbprivmsgs_text (
  privmsgs_text_id mediumint(8) unsigned NOT NULL default '0',
  privmsgs_bbcode_uid varchar(10) NOT NULL default '0',
  privmsgs_text text,
  PRIMARY KEY  (privmsgs_text_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbprivmsgs_text'
#



#
# Table structure for table 'kayapo_bbranks'
#

CREATE TABLE kayapo_bbranks (
  rank_id smallint(5) unsigned NOT NULL auto_increment,
  rank_title varchar(50) NOT NULL default '',
  rank_min mediumint(8) NOT NULL default '0',
  rank_max mediumint(8) NOT NULL default '0',
  rank_special tinyint(1) default '0',
  rank_image varchar(255) default NULL,
  PRIMARY KEY  (rank_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbranks'
#

INSERT INTO kayapo_bbranks VALUES("1", "Site Admin", "-1", "-1", "1", "modules/Forums/images/ranks/6stars.gif");
INSERT INTO kayapo_bbranks VALUES("2", "Newbie", "1", "0", "0", "modules/Forums/images/ranks/1star.gif");


#
# Table structure for table 'kayapo_bbsearch_results'
#

CREATE TABLE kayapo_bbsearch_results (
  search_id int(11) unsigned NOT NULL default '0',
  session_id varchar(32) NOT NULL default '',
  search_array text NOT NULL,
  PRIMARY KEY  (search_id),
  KEY session_id (session_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbsearch_results'
#



#
# Table structure for table 'kayapo_bbsearch_wordlist'
#

CREATE TABLE kayapo_bbsearch_wordlist (
  word_text varchar(50) binary NOT NULL default '',
  word_id mediumint(8) unsigned NOT NULL auto_increment,
  word_common tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (word_text),
  KEY word_id (word_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbsearch_wordlist'
#



#
# Table structure for table 'kayapo_bbsearch_wordmatch'
#

CREATE TABLE kayapo_bbsearch_wordmatch (
  post_id mediumint(8) unsigned NOT NULL default '0',
  word_id mediumint(8) unsigned NOT NULL default '0',
  title_match tinyint(1) NOT NULL default '0',
  KEY word_id (word_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbsearch_wordmatch'
#



#
# Table structure for table 'kayapo_bbsessions'
#

CREATE TABLE kayapo_bbsessions (
  session_id char(32) NOT NULL default '',
  session_user_id mediumint(8) NOT NULL default '0',
  session_start int(11) NOT NULL default '0',
  session_time int(11) NOT NULL default '0',
  session_ip char(8) NOT NULL default '0',
  session_page int(11) NOT NULL default '0',
  session_logged_in tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (session_id),
  KEY session_user_id (session_user_id),
  KEY session_id_ip_user_id (session_id,session_ip,session_user_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbsessions'
#

INSERT INTO kayapo_bbsessions VALUES("37a07fecb37bae3f2f5493de14147503", "1", "1201716194", "1201716194", "7f000001", "-10", "0");
INSERT INTO kayapo_bbsessions VALUES("03dccf3c46f3fcb23482d1badfbbc182", "2", "1201716803", "1201716803", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("f911acb6b035a7e41e74c3a9f42ba040", "2", "1201717134", "1201717134", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("e4abe6e5e5c4d5fdc5c2e08ea8c2434e", "2", "1201717146", "1201717146", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("0a31b0714e25f4f1225b89df93fe6d96", "2", "1201717177", "1201717177", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("92e3550a4b02f0104a656d1eb87a5057", "2", "1201717200", "1201717200", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("8e2055bd3f6f4833ca7558f19d3db056", "2", "1201717218", "1201717218", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("dfbd082689387802995490d6000bd0e5", "2", "1201717240", "1201717240", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("a93997894a0cbf010a5e4b1b53c497e6", "2", "1201717326", "1201717326", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("de52465dc021cff482c3959a3a0e94cf", "2", "1201717423", "1201717423", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("1e815d5b1b462d911659e5543ebfd07f", "2", "1201717474", "1201717474", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("c44ccc55727de99f030bdee35a5cf054", "2", "1201717534", "1201717534", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("13358d92e9b58642bc45c72e43107802", "2", "1201717802", "1201717802", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("2905ae54f54537feb11f07dd510f4da9", "2", "1201717819", "1201717819", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("6c712990b56bb4c1be1adb250faf67d4", "2", "1201717843", "1201717843", "7f000001", "0", "1");
INSERT INTO kayapo_bbsessions VALUES("9ad43f0cd118a1805ed7c7999bf5d95e", "2", "1201717865", "1201717943", "7f000001", "-10", "1");


#
# Table structure for table 'kayapo_bbsmilies'
#

CREATE TABLE kayapo_bbsmilies (
  smilies_id smallint(5) unsigned NOT NULL auto_increment,
  code varchar(50) default NULL,
  smile_url varchar(100) default NULL,
  emoticon varchar(75) default NULL,
  PRIMARY KEY  (smilies_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbsmilies'
#

INSERT INTO kayapo_bbsmilies VALUES("1", ":D", "icon_biggrin.gif", "Very Happy");
INSERT INTO kayapo_bbsmilies VALUES("2", ":-D", "icon_biggrin.gif", "Very Happy");
INSERT INTO kayapo_bbsmilies VALUES("3", ":grin:", "icon_biggrin.gif", "Very Happy");
INSERT INTO kayapo_bbsmilies VALUES("4", ":)", "icon_smile.gif", "Smile");
INSERT INTO kayapo_bbsmilies VALUES("5", ":-)", "icon_smile.gif", "Smile");
INSERT INTO kayapo_bbsmilies VALUES("6", ":smile:", "icon_smile.gif", "Smile");
INSERT INTO kayapo_bbsmilies VALUES("7", ":(", "icon_sad.gif", "Sad");
INSERT INTO kayapo_bbsmilies VALUES("8", ":-(", "icon_sad.gif", "Sad");
INSERT INTO kayapo_bbsmilies VALUES("9", ":sad:", "icon_sad.gif", "Sad");
INSERT INTO kayapo_bbsmilies VALUES("10", ":o", "icon_surprised.gif", "Surprised");
INSERT INTO kayapo_bbsmilies VALUES("11", ":-o", "icon_surprised.gif", "Surprised");
INSERT INTO kayapo_bbsmilies VALUES("12", ":eek:", "icon_surprised.gif", "Surprised");
INSERT INTO kayapo_bbsmilies VALUES("13", "8O", "icon_eek.gif", "Shocked");
INSERT INTO kayapo_bbsmilies VALUES("14", "8-O", "icon_eek.gif", "Shocked");
INSERT INTO kayapo_bbsmilies VALUES("15", ":shock:", "icon_eek.gif", "Shocked");
INSERT INTO kayapo_bbsmilies VALUES("16", ":?", "icon_confused.gif", "Confused");
INSERT INTO kayapo_bbsmilies VALUES("17", ":-?", "icon_confused.gif", "Confused");
INSERT INTO kayapo_bbsmilies VALUES("18", ":???:", "icon_confused.gif", "Confused");
INSERT INTO kayapo_bbsmilies VALUES("19", "8)", "icon_cool.gif", "Cool");
INSERT INTO kayapo_bbsmilies VALUES("20", "8-)", "icon_cool.gif", "Cool");
INSERT INTO kayapo_bbsmilies VALUES("21", ":cool:", "icon_cool.gif", "Cool");
INSERT INTO kayapo_bbsmilies VALUES("22", ":lol:", "icon_lol.gif", "Laughing");
INSERT INTO kayapo_bbsmilies VALUES("23", ":x", "icon_mad.gif", "Mad");
INSERT INTO kayapo_bbsmilies VALUES("24", ":-x", "icon_mad.gif", "Mad");
INSERT INTO kayapo_bbsmilies VALUES("25", ":mad:", "icon_mad.gif", "Mad");
INSERT INTO kayapo_bbsmilies VALUES("26", ":P", "icon_razz.gif", "Razz");
INSERT INTO kayapo_bbsmilies VALUES("27", ":-P", "icon_razz.gif", "Razz");
INSERT INTO kayapo_bbsmilies VALUES("28", ":razz:", "icon_razz.gif", "Razz");
INSERT INTO kayapo_bbsmilies VALUES("29", ":oops:", "icon_redface.gif", "Embarassed");
INSERT INTO kayapo_bbsmilies VALUES("30", ":cry:", "icon_cry.gif", "Crying or Very sad");
INSERT INTO kayapo_bbsmilies VALUES("31", ":evil:", "icon_evil.gif", "Evil or Very Mad");
INSERT INTO kayapo_bbsmilies VALUES("32", ":twisted:", "icon_twisted.gif", "Twisted Evil");
INSERT INTO kayapo_bbsmilies VALUES("33", ":roll:", "icon_rolleyes.gif", "Rolling Eyes");
INSERT INTO kayapo_bbsmilies VALUES("34", ":wink:", "icon_wink.gif", "Wink");
INSERT INTO kayapo_bbsmilies VALUES("35", ";)", "icon_wink.gif", "Wink");
INSERT INTO kayapo_bbsmilies VALUES("36", ";-)", "icon_wink.gif", "Wink");
INSERT INTO kayapo_bbsmilies VALUES("37", ":!:", "icon_exclaim.gif", "Exclamation");
INSERT INTO kayapo_bbsmilies VALUES("38", ":?:", "icon_question.gif", "Question");
INSERT INTO kayapo_bbsmilies VALUES("39", ":idea:", "icon_idea.gif", "Idea");
INSERT INTO kayapo_bbsmilies VALUES("40", ":arrow:", "icon_arrow.gif", "Arrow");
INSERT INTO kayapo_bbsmilies VALUES("41", ":|", "icon_neutral.gif", "Neutral");
INSERT INTO kayapo_bbsmilies VALUES("42", ":-|", "icon_neutral.gif", "Neutral");
INSERT INTO kayapo_bbsmilies VALUES("43", ":neutral:", "icon_neutral.gif", "Neutral");
INSERT INTO kayapo_bbsmilies VALUES("44", ":mrgreen:", "icon_mrgreen.gif", "Mr. Green");


#
# Table structure for table 'kayapo_bbthemes'
#

CREATE TABLE kayapo_bbthemes (
  themes_id mediumint(8) unsigned NOT NULL auto_increment,
  template_name varchar(30) NOT NULL default '',
  style_name varchar(30) NOT NULL default '',
  head_stylesheet varchar(100) default NULL,
  body_background varchar(100) default NULL,
  body_bgcolor varchar(6) default NULL,
  body_text varchar(6) default NULL,
  body_link varchar(6) default NULL,
  body_vlink varchar(6) default NULL,
  body_alink varchar(6) default NULL,
  body_hlink varchar(6) default NULL,
  tr_color1 varchar(6) default NULL,
  tr_color2 varchar(6) default NULL,
  tr_color3 varchar(6) default NULL,
  tr_class1 varchar(25) default NULL,
  tr_class2 varchar(25) default NULL,
  tr_class3 varchar(25) default NULL,
  th_color1 varchar(6) default NULL,
  th_color2 varchar(6) default NULL,
  th_color3 varchar(6) default NULL,
  th_class1 varchar(25) default NULL,
  th_class2 varchar(25) default NULL,
  th_class3 varchar(25) default NULL,
  td_color1 varchar(6) default NULL,
  td_color2 varchar(6) default NULL,
  td_color3 varchar(6) default NULL,
  td_class1 varchar(25) default NULL,
  td_class2 varchar(25) default NULL,
  td_class3 varchar(25) default NULL,
  fontface1 varchar(50) default NULL,
  fontface2 varchar(50) default NULL,
  fontface3 varchar(50) default NULL,
  fontsize1 tinyint(4) default NULL,
  fontsize2 tinyint(4) default NULL,
  fontsize3 tinyint(4) default NULL,
  fontcolor1 varchar(6) default NULL,
  fontcolor2 varchar(6) default NULL,
  fontcolor3 varchar(6) default NULL,
  span_class1 varchar(25) default NULL,
  span_class2 varchar(25) default NULL,
  span_class3 varchar(25) default NULL,
  img_size_poll smallint(5) unsigned default NULL,
  img_size_privmsg smallint(5) unsigned default NULL,
  PRIMARY KEY  (themes_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbthemes'
#

INSERT INTO kayapo_bbthemes VALUES("2", "subSilver", "CNB", "forums", "", "FFFFFF", "000000", "000000", "000000", "FF0000", "F44903", "ECECEC", "CACCCB", "CACCCB", "", "", "", "ECECEC", "CACCCB", "ECECEC", "", "", "", "A3A2A2", "ECECEC", "ECECEC", "", "", "", "Verdana", "Arial", "Sans-Serif", "10", "11", "10", "000000", "000000", "F44903", "", "", "", NULL, NULL);


#
# Table structure for table 'kayapo_bbthemes_name'
#

CREATE TABLE kayapo_bbthemes_name (
  themes_id smallint(5) unsigned NOT NULL default '0',
  tr_color1_name char(50) default NULL,
  tr_color2_name char(50) default NULL,
  tr_color3_name char(50) default NULL,
  tr_class1_name char(50) default NULL,
  tr_class2_name char(50) default NULL,
  tr_class3_name char(50) default NULL,
  th_color1_name char(50) default NULL,
  th_color2_name char(50) default NULL,
  th_color3_name char(50) default NULL,
  th_class1_name char(50) default NULL,
  th_class2_name char(50) default NULL,
  th_class3_name char(50) default NULL,
  td_color1_name char(50) default NULL,
  td_color2_name char(50) default NULL,
  td_color3_name char(50) default NULL,
  td_class1_name char(50) default NULL,
  td_class2_name char(50) default NULL,
  td_class3_name char(50) default NULL,
  fontface1_name char(50) default NULL,
  fontface2_name char(50) default NULL,
  fontface3_name char(50) default NULL,
  fontsize1_name char(50) default NULL,
  fontsize2_name char(50) default NULL,
  fontsize3_name char(50) default NULL,
  fontcolor1_name char(50) default NULL,
  fontcolor2_name char(50) default NULL,
  fontcolor3_name char(50) default NULL,
  span_class1_name char(50) default NULL,
  span_class2_name char(50) default NULL,
  span_class3_name char(50) default NULL,
  PRIMARY KEY  (themes_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbthemes_name'
#

INSERT INTO kayapo_bbthemes_name VALUES("2", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");


#
# Table structure for table 'kayapo_bbtopics'
#

CREATE TABLE kayapo_bbtopics (
  topic_id mediumint(8) unsigned NOT NULL auto_increment,
  forum_id smallint(8) unsigned NOT NULL default '0',
  topic_title char(60) NOT NULL default '',
  topic_poster mediumint(8) NOT NULL default '0',
  topic_time int(11) NOT NULL default '0',
  topic_views mediumint(8) unsigned NOT NULL default '0',
  topic_replies mediumint(8) unsigned NOT NULL default '0',
  topic_status tinyint(3) NOT NULL default '0',
  topic_vote tinyint(1) NOT NULL default '0',
  topic_type tinyint(3) NOT NULL default '0',
  topic_last_post_id mediumint(8) unsigned NOT NULL default '0',
  topic_first_post_id mediumint(8) unsigned NOT NULL default '0',
  topic_moved_id mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (topic_id),
  KEY forum_id (forum_id),
  KEY topic_moved_id (topic_moved_id),
  KEY topic_status (topic_status),
  KEY topic_type (topic_type)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbtopics'
#



#
# Table structure for table 'kayapo_bbtopics_watch'
#

CREATE TABLE kayapo_bbtopics_watch (
  topic_id mediumint(8) unsigned NOT NULL default '0',
  user_id mediumint(8) NOT NULL default '0',
  notify_status tinyint(1) NOT NULL default '0',
  KEY topic_id (topic_id),
  KEY user_id (user_id),
  KEY notify_status (notify_status)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbtopics_watch'
#



#
# Table structure for table 'kayapo_bbuser_group'
#

CREATE TABLE kayapo_bbuser_group (
  group_id mediumint(8) NOT NULL default '0',
  user_id mediumint(8) NOT NULL default '0',
  user_pending tinyint(1) default NULL,
  KEY group_id (group_id),
  KEY user_id (user_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbuser_group'
#

INSERT INTO kayapo_bbuser_group VALUES("1", "-1", "0");


#
# Table structure for table 'kayapo_bbvote_desc'
#

CREATE TABLE kayapo_bbvote_desc (
  vote_id mediumint(8) unsigned NOT NULL auto_increment,
  topic_id mediumint(8) unsigned NOT NULL default '0',
  vote_text text NOT NULL,
  vote_start int(11) NOT NULL default '0',
  vote_length int(11) NOT NULL default '0',
  PRIMARY KEY  (vote_id),
  KEY topic_id (topic_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbvote_desc'
#



#
# Table structure for table 'kayapo_bbvote_results'
#

CREATE TABLE kayapo_bbvote_results (
  vote_id mediumint(8) unsigned NOT NULL default '0',
  vote_option_id tinyint(4) unsigned NOT NULL default '0',
  vote_option_text varchar(255) NOT NULL default '',
  vote_result int(11) NOT NULL default '0',
  KEY vote_option_id (vote_option_id),
  KEY vote_id (vote_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbvote_results'
#



#
# Table structure for table 'kayapo_bbvote_voters'
#

CREATE TABLE kayapo_bbvote_voters (
  vote_id mediumint(8) unsigned NOT NULL default '0',
  vote_user_id mediumint(8) NOT NULL default '0',
  vote_user_ip char(8) NOT NULL default '',
  KEY vote_id (vote_id),
  KEY vote_user_id (vote_user_id),
  KEY vote_user_ip (vote_user_ip)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbvote_voters'
#



#
# Table structure for table 'kayapo_bbwords'
#

CREATE TABLE kayapo_bbwords (
  word_id mediumint(8) unsigned NOT NULL auto_increment,
  word char(100) NOT NULL default '',
  replacement char(100) NOT NULL default '',
  PRIMARY KEY  (word_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_bbwords'
#



#
# Table structure for table 'kayapo_blocks'
#

CREATE TABLE kayapo_blocks (
  bid int(10) NOT NULL auto_increment,
  bkey varchar(15) NOT NULL default '',
  title varchar(60) NOT NULL default '',
  content text NOT NULL,
  url varchar(200) NOT NULL default '',
  bposition char(1) NOT NULL default '',
  weight int(10) NOT NULL default '1',
  active int(1) NOT NULL default '1',
  refresh int(10) NOT NULL default '0',
  time varchar(14) NOT NULL default '0',
  blanguage varchar(30) NOT NULL default '',
  blockfile varchar(255) NOT NULL default '',
  view int(1) NOT NULL default '0',
  groups text NOT NULL,
  expire varchar(14) NOT NULL default '0',
  action char(1) NOT NULL default '',
  subscription int(1) NOT NULL default '0',
  PRIMARY KEY  (bid),
  KEY bid (bid),
  KEY title (title)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_blocks'
#

INSERT INTO kayapo_blocks VALUES("1", "", "M?dulos", "", "", "l", "4", "0", "0", "", "", "block-Modules.php", "0", "", "0", "d", "0");
INSERT INTO kayapo_blocks VALUES("2", "admin", "Administra??o", "<strong><big>?</big></strong> <a href=\"admin.php\">Menu de Administra??o</a><br>\r\n<strong><big>?</big></strong> <a href=\"admin.php?op=FCKadminStory\">Nova Not?cia</a><br>\r\n<strong><big>?</big></strong> <a href=\"admin.php?op=create\">Alterar Enquete</a><br>\r\n<strong><big>?</big></strong> <a href=\"admin.php?op=content\">Inserir Conte?do</a><br>\r\n<strong><big>?</big></strong> <a href=\"admin.php?op=logout\">Logout</a><center>", "", "l", "1", "0", "0", "985591188", "", "", "2", "", "0", "d", "0");
INSERT INTO kayapo_blocks VALUES("5", "userbox", "Bloco do Usu?rio", "", "", "r", "1", "0", "0", "", "", "", "1", "", "0", "d", "0");
INSERT INTO kayapo_blocks VALUES("6", "", "Enquete", "", "", "l", "3", "1", "0", "", "", "block-Survey.php", "0", "", "0", "d", "0");
INSERT INTO kayapo_blocks VALUES("9", "", "Usu?rios", "", "", "r", "2", "1", "3600", "", "", "block-User_Info.php", "0", "", "0", "d", "0");
INSERT INTO kayapo_blocks VALUES("10", "", "Eventos", "", "", "r", "3", "1", "0", "", "", "block-Calendar6.php", "0", "", "0", "d", "0");
INSERT INTO kayapo_blocks VALUES("11", "", "Menu", "<table width=\"175\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bordercolor=\"#FFFFFF\" class=\"cinza_esc11\" style=\"margin-bottom:4px\">\r\n      <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'index.php\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Home</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'index.php\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Diretoria</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'index.php\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Conv?nios</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Stories_Archive\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Arquivo de Not?cias</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Recherches\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Busca Avan?ada</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Calendar\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Eventos</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Surveys\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Enquetes</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Your_Account&op=new_user\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Cadastre-se</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Your_Account\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Sua Conta</td>\r\n      </tr>\r\n     <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Private_Messages\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Caixa de Mensagens</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=My_eGallery\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Galeria de Fotos</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Statistics\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Estat?sticas</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Downloads\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Downloads</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Topics\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> T?picos</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Web_Links\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Web Links</td>\r\n      </tr>\r\n    <tr>\r\n        <td height=\"24\" bordercolor=\"#A7D2EF\" bgcolor=\"#F8F8F8\" onClick=\"window.location=\'modules.php?name=Feedback\';\" onMouseOver=\"this.style.backgroundColor=\'#ffffff\'; this.style.color=\'#252525\'; this.style.cursor=\'pointer\'\" onMouseOut=\"this.style.backgroundColor=\'#F8F8F8\'; this.style.color=\'#252525\';\">&nbsp;<STRONG>?</STRONG> Fale Conosco</td>\r\n      </tr>\r\n    </table>", "", "l", "2", "1", "0", "", "", "", "0", "", "0", "d", "0");


#
# Table structure for table 'kayapo_cnbya_config'
#

CREATE TABLE kayapo_cnbya_config (
  config_name varchar(255) NOT NULL default '',
  config_value longtext,
  UNIQUE KEY config_name (config_name)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_cnbya_config'
#

INSERT INTO kayapo_cnbya_config VALUES("sendaddmail", "0");
INSERT INTO kayapo_cnbya_config VALUES("senddeletemail", "1");
INSERT INTO kayapo_cnbya_config VALUES("allowuserdelete", "0");
INSERT INTO kayapo_cnbya_config VALUES("allowusertheme", "1");
INSERT INTO kayapo_cnbya_config VALUES("allowuserreg", "0");
INSERT INTO kayapo_cnbya_config VALUES("allowmailchange", "0");
INSERT INTO kayapo_cnbya_config VALUES("emailvalidate", "1");
INSERT INTO kayapo_cnbya_config VALUES("requireadmin", "0");
INSERT INTO kayapo_cnbya_config VALUES("servermail", "1");
INSERT INTO kayapo_cnbya_config VALUES("useactivate", "1");
INSERT INTO kayapo_cnbya_config VALUES("usegfxcheck", "0");
INSERT INTO kayapo_cnbya_config VALUES("autosuspend", "0");
INSERT INTO kayapo_cnbya_config VALUES("perpage", "100");
INSERT INTO kayapo_cnbya_config VALUES("expiring", "86400");
INSERT INTO kayapo_cnbya_config VALUES("nick_min", "4");
INSERT INTO kayapo_cnbya_config VALUES("nick_max", "20");
INSERT INTO kayapo_cnbya_config VALUES("pass_min", "4");
INSERT INTO kayapo_cnbya_config VALUES("pass_max", "20");
INSERT INTO kayapo_cnbya_config VALUES("bad_mail", "mysite.com\r\nyoursite.com");
INSERT INTO kayapo_cnbya_config VALUES("bad_nick", "adm\r\nadmin\r\nanonimo\r\nanonymous\r\nan?nimo\r\ngod\r\nlinux\r\nnobody\r\noperator\r\nroot\r\nstaff\r\nwebmaster");
INSERT INTO kayapo_cnbya_config VALUES("coppa", "0");
INSERT INTO kayapo_cnbya_config VALUES("tos", "0");
INSERT INTO kayapo_cnbya_config VALUES("tosall", "1");
INSERT INTO kayapo_cnbya_config VALUES("cookiecheck", "1");
INSERT INTO kayapo_cnbya_config VALUES("cookiecleaner", "1");
INSERT INTO kayapo_cnbya_config VALUES("cookietimelife", "2592000");
INSERT INTO kayapo_cnbya_config VALUES("cookiepath", "");
INSERT INTO kayapo_cnbya_config VALUES("cookieinactivity", "-");
INSERT INTO kayapo_cnbya_config VALUES("autosuspendmain", "0");
INSERT INTO kayapo_cnbya_config VALUES("codesize", "6");
INSERT INTO kayapo_cnbya_config VALUES("version", "4.4.0 b2");


#
# Table structure for table 'kayapo_cnbya_field'
#

CREATE TABLE kayapo_cnbya_field (
  fid int(10) NOT NULL auto_increment,
  name varchar(255) NOT NULL default 'field',
  value varchar(255) default NULL,
  size int(3) default NULL,
  need int(1) NOT NULL default '1',
  pos int(3) default NULL,
  public int(1) NOT NULL default '1',
  PRIMARY KEY  (fid),
  KEY fid (fid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_cnbya_field'
#



#
# Table structure for table 'kayapo_cnbya_value'
#

CREATE TABLE kayapo_cnbya_value (
  vid int(10) NOT NULL auto_increment,
  uid int(10) NOT NULL default '0',
  fid int(10) NOT NULL default '0',
  value varchar(255) default NULL,
  PRIMARY KEY  (vid),
  KEY vid (vid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_cnbya_value'
#



#
# Table structure for table 'kayapo_cnbya_value_temp'
#

CREATE TABLE kayapo_cnbya_value_temp (
  vid int(10) NOT NULL auto_increment,
  uid int(10) NOT NULL default '0',
  fid int(10) NOT NULL default '0',
  value varchar(255) default NULL,
  PRIMARY KEY  (vid),
  KEY vid (vid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_cnbya_value_temp'
#



#
# Table structure for table 'kayapo_comments'
#

CREATE TABLE kayapo_comments (
  tid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  date datetime default NULL,
  name varchar(60) NOT NULL default '',
  email varchar(60) default NULL,
  url varchar(60) default NULL,
  host_name varchar(60) default NULL,
  subject varchar(85) NOT NULL default '',
  comment text NOT NULL,
  score tinyint(4) NOT NULL default '0',
  reason tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (tid),
  KEY tid (tid),
  KEY pid (pid),
  KEY sid (sid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_comments'
#



#
# Table structure for table 'kayapo_config'
#

CREATE TABLE kayapo_config (
  sitename varchar(255) NOT NULL default '',
  nukeurl varchar(255) NOT NULL default '',
  site_logo varchar(255) NOT NULL default '',
  slogan varchar(255) NOT NULL default '',
  startdate varchar(50) NOT NULL default '',
  adminmail varchar(255) NOT NULL default '',
  anonpost tinyint(1) NOT NULL default '0',
  Default_Theme varchar(255) NOT NULL default '',
  foot1 text NOT NULL,
  foot2 text NOT NULL,
  foot3 text NOT NULL,
  commentlimit int(9) NOT NULL default '4096',
  anonymous varchar(255) NOT NULL default '',
  minpass tinyint(1) NOT NULL default '5',
  pollcomm tinyint(1) NOT NULL default '1',
  articlecomm tinyint(1) NOT NULL default '1',
  broadcast_msg tinyint(1) NOT NULL default '1',
  my_headlines tinyint(1) NOT NULL default '1',
  top int(3) NOT NULL default '10',
  storyhome int(2) NOT NULL default '10',
  user_news tinyint(1) NOT NULL default '1',
  oldnum int(2) NOT NULL default '30',
  ultramode tinyint(1) NOT NULL default '0',
  banners tinyint(1) NOT NULL default '1',
  backend_title varchar(255) NOT NULL default '',
  backend_language varchar(10) NOT NULL default '',
  language varchar(100) NOT NULL default '',
  locale varchar(10) NOT NULL default '',
  multilingual tinyint(1) NOT NULL default '0',
  useflags tinyint(1) NOT NULL default '0',
  notify tinyint(1) NOT NULL default '0',
  notify_email varchar(255) NOT NULL default '',
  notify_subject varchar(255) NOT NULL default '',
  notify_message varchar(255) NOT NULL default '',
  notify_from varchar(255) NOT NULL default '',
  moderate tinyint(1) NOT NULL default '0',
  admingraphic tinyint(1) NOT NULL default '1',
  httpref tinyint(1) NOT NULL default '1',
  httprefmax int(5) NOT NULL default '1000',
  CensorMode tinyint(1) NOT NULL default '3',
  CensorReplace varchar(10) NOT NULL default '',
  copyright text NOT NULL,
  Version_Num varchar(10) NOT NULL default '',
  PRIMARY KEY  (sitename)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_config'
#

INSERT INTO kayapo_config VALUES("STR - Sindicato dos Trabalhadores Rurais de Palmitinho", "http://localhost/str", "", "STR", "Mar?o de 2008", "mandry@casadaweb.net", "0", "Helius", "", "", "", "4096", "Visitante", "5", "1", "1", "0", "0", "10", "10", "0", "30", "0", "1", "", "pt-br", "brazilian", "pt_BR", "0", "0", "0", "e-mail@phpnuke.org.br", "Algu&eacute;m enviou uma not&iacute;cia!!!", "Ol?\r\n\\n\\n\r\nAlgu?m enviou uma not?cia para seu portal!", "webmaster", "0", "1", "0", "2000", "3", "*****", "PHP-Nuke Copyright &copy; 2004 by Francisco Burzi. This is free software, and you may redistribute it under the <a href=\"http://phpnuke.org/files/gpl.txt\"><font class=\"footmsg_l\">GPL</font></a>. PHP-Nuke comes with absolutely no warranty, for details, see the <a href=\"http://phpnuke.org/files/gpl.txt\"><font class=\"footmsg_l\">license</font></a>.", "7.5 Kayap?");


#
# Table structure for table 'kayapo_confirm'
#

CREATE TABLE kayapo_confirm (
  confirm_id char(32) NOT NULL default '',
  session_id char(32) NOT NULL default '',
  code char(6) NOT NULL default '',
  PRIMARY KEY  (session_id,confirm_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_confirm'
#



#
# Table structure for table 'kayapo_counter'
#

CREATE TABLE kayapo_counter (
  type varchar(80) NOT NULL default '',
  var varchar(80) NOT NULL default '',
  count int(10) unsigned NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_counter'
#

INSERT INTO kayapo_counter VALUES("total", "hits", "1187");
INSERT INTO kayapo_counter VALUES("browser", "WebTV", "0");
INSERT INTO kayapo_counter VALUES("browser", "Lynx", "0");
INSERT INTO kayapo_counter VALUES("browser", "MSIE", "1187");
INSERT INTO kayapo_counter VALUES("browser", "Opera", "0");
INSERT INTO kayapo_counter VALUES("browser", "Konqueror", "0");
INSERT INTO kayapo_counter VALUES("browser", "Netscape", "0");
INSERT INTO kayapo_counter VALUES("browser", "Bot", "0");
INSERT INTO kayapo_counter VALUES("browser", "Other", "0");
INSERT INTO kayapo_counter VALUES("os", "Windows", "1187");
INSERT INTO kayapo_counter VALUES("os", "Linux", "0");
INSERT INTO kayapo_counter VALUES("os", "Mac", "0");
INSERT INTO kayapo_counter VALUES("os", "FreeBSD", "0");
INSERT INTO kayapo_counter VALUES("os", "SunOS", "0");
INSERT INTO kayapo_counter VALUES("os", "IRIX", "0");
INSERT INTO kayapo_counter VALUES("os", "BeOS", "0");
INSERT INTO kayapo_counter VALUES("os", "OS/2", "0");
INSERT INTO kayapo_counter VALUES("os", "AIX", "0");
INSERT INTO kayapo_counter VALUES("os", "Other", "0");


#
# Table structure for table 'kayapo_encyclopedia'
#

CREATE TABLE kayapo_encyclopedia (
  eid int(10) NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  description text NOT NULL,
  elanguage varchar(30) NOT NULL default '',
  active int(1) NOT NULL default '0',
  PRIMARY KEY  (eid),
  KEY eid (eid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_encyclopedia'
#



#
# Table structure for table 'kayapo_encyclopedia_text'
#

CREATE TABLE kayapo_encyclopedia_text (
  tid int(10) NOT NULL auto_increment,
  eid int(10) NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  text text NOT NULL,
  counter int(10) NOT NULL default '0',
  PRIMARY KEY  (tid),
  KEY tid (tid),
  KEY eid (eid),
  KEY title (title)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_encyclopedia_text'
#



#
# Table structure for table 'kayapo_events'
#

CREATE TABLE kayapo_events (
  eid bigint(20) NOT NULL auto_increment,
  aid varchar(30) NOT NULL default '',
  title varchar(150) default NULL,
  time datetime default NULL,
  hometext blob,
  comments int(11) default '0',
  counter mediumint(8) unsigned default NULL,
  topic int(3) NOT NULL default '1',
  informant varchar(20) NOT NULL default '',
  eventDate date NOT NULL default '0000-00-00',
  endDate date NOT NULL default '0000-00-00',
  startTime time default NULL,
  endTime time default NULL,
  alldayevent int(1) NOT NULL default '0',
  barcolor char(1) default NULL,
  PRIMARY KEY  (eid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_events'
#

INSERT INTO kayapo_events VALUES("1", "str", "Festa da Laranja", "2008-01-30 17:08:54", "Festa da Laranja<br />\r\n<br />\r\nATRA??ES<br />\r\n<br />\r\n<br />\r\n20h30 - Banda Moleques Atrevidos<br />\r\n22h - Banda ?gua Dourada<br />\r\n0h - Encerramento <br />\r\nIngresso: entrada franca.<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa<br />\r\n           <br />\r\n <br />\r\n <br />\r\nS?bado - 2/6 <br />\r\n<br />\r\n20h - Banda D?gitro 3<br />\r\n22h - Banda Status<br />\r\n0h - Encerramento <br />\r\nIngresso: entrada franca.<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa<br />\r\n          <br />\r\n <br />\r\n <br />\r\nDomingo - 3/6 <br />\r\n<br />\r\n15h - Apresenta??o da Casa da Crian?a - MP<br />\r\n16h - Coral do Clube 6 de Janeiro<br />\r\n17h - Centro Cultural Kirinus <br />\r\n20h - Grupo Vivendo em Harmonia<br />\r\n22h - Grupo Ch?o Batido (Noite Gauchesca) <br />\r\n0h - Encerramento <br />\r\nIngresso: entrada franca.<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa <br />\r\n     <br />\r\n <br />\r\n <br />\r\nSegunda - 4/6 <br />\r\n<br />\r\n20h Som mec?nico<br />\r\n0h - Encerramento<br />\r\nIngresso: entrada franca.<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa<br />\r\n          <br />\r\n <br />\r\n <br />\r\nTer?a - 5/6 <br />\r\n<br />\r\n20h Som mec?nico<br />\r\n0h - Encerramento<br />\r\nIngresso: entrada franca.<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa<br />\r\n     <br />\r\n <br />\r\n <br />\r\nQuarta - 6/6 <br />\r\n<br />\r\n20h30 Marquinhos e Guilherme Botelho<br />\r\n22h Victors Banda Show<br />\r\n0h Encerramento<br />\r\nIngresso: entrada franca<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa <br />\r\n    <br />\r\n <br />\r\n <br />\r\nQuinta - 7/6 <br />\r\n<br />\r\n15h Recrea??o Infantil<br />\r\n16h Boi-de-mam?o dos Ingleses<br />\r\n17h Centro de Dan?a Laura Flores<br />\r\n20h Ninho e Renato<br />\r\n22h Jeovanny de Luch<br />\r\n0h Encerramento<br />\r\nIngresso: entrada franca<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa <br />\r\n     <br />\r\n <br />\r\n <br />\r\nSexta - 8/6 <br />\r\n<br />\r\n20h30 Henrique (viol?o e voz)<br />\r\n22h Banda Us Maneh<br />\r\n0h Encerramento<br />\r\nIngresso: entrada franca<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa <br />\r\n     <br />\r\n <br />\r\n <br />\r\nS?bado - 9/6 <br />\r\n<br />\r\n20h Banda Sunrize<br />\r\n22h Show Nacional com Roni e Robson<br />\r\n0h Encerramento<br />\r\nIngresso: entrada franca<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\nPara mais informa??o, visite o site da festa <br />\r\n     <br />\r\n <br />\r\n <br />\r\nDomingo - 10/6 <br />\r\n<br />\r\n15h Apresenta??o Crian?a - Casa S?o Jos? - MS<br />\r\n16h Centro de Dan?as Passo a Passo<br />\r\n17h - Coral do Col?gio Catarinense<br />\r\n20h - Banda Fonte Sonora<br />\r\n0h Encerramento<br />\r\nIngresso: entrada franca<br />\r\nLocal: Pra?a Santos Dumont (Trindade).<br />\r\n", "0", "0", "2", "Anonymous", "2008-01-30", "2008-02-28", "09:00:00", "11:00:00", "0", "b");


#
# Table structure for table 'kayapo_events_comments'
#

CREATE TABLE kayapo_events_comments (
  cid int(10) unsigned NOT NULL auto_increment,
  eid int(10) unsigned NOT NULL default '0',
  comment varchar(255) NOT NULL default '',
  date datetime NOT NULL default '0000-00-00 00:00:00',
  name varchar(255) default NULL,
  PRIMARY KEY  (cid),
  UNIQUE KEY cid (cid),
  KEY cid_2 (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_events_comments'
#



#
# Table structure for table 'kayapo_events_queue'
#

CREATE TABLE kayapo_events_queue (
  qid bigint(20) NOT NULL auto_increment,
  uid mediumint(9) NOT NULL default '0',
  uname varchar(40) NOT NULL default '',
  title varchar(150) NOT NULL default '',
  story blob,
  timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  topic varchar(20) NOT NULL default '',
  eventDate date NOT NULL default '0000-00-00',
  endDate date NOT NULL default '0000-00-00',
  startTime time default NULL,
  endTime time default NULL,
  alldayevent int(1) NOT NULL default '0',
  barcolor char(1) default NULL,
  PRIMARY KEY  (qid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_events_queue'
#

INSERT INTO kayapo_events_queue VALUES("2", "1", "Visitante", "Fest Mar?o", "Fest Mar?o em Palmitinho<br />\r\n", "2008-02-26 09:10:51", "3", "2008-03-06", "2008-03-09", "09:00:00", "11:00:00", "0", "y");


#
# Table structure for table 'kayapo_faqanswer'
#

CREATE TABLE kayapo_faqanswer (
  id tinyint(4) NOT NULL auto_increment,
  id_cat tinyint(4) NOT NULL default '0',
  question varchar(255) default '',
  answer text,
  PRIMARY KEY  (id),
  KEY id (id),
  KEY id_cat (id_cat)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_faqanswer'
#



#
# Table structure for table 'kayapo_faqcategories'
#

CREATE TABLE kayapo_faqcategories (
  id_cat tinyint(3) NOT NULL auto_increment,
  categories varchar(255) default NULL,
  flanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (id_cat),
  KEY id_cat (id_cat)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_faqcategories'
#



#
# Table structure for table 'kayapo_gallery_categories'
#

CREATE TABLE kayapo_gallery_categories (
  gallid int(11) NOT NULL auto_increment,
  gallname varchar(30) default NULL,
  gallimg varchar(50) default NULL,
  galloc blob,
  description blob,
  parent int(11) default NULL,
  visible int(11) default NULL,
  template int(11) default NULL,
  thumbwidth int(11) default NULL,
  numcol int(11) default NULL,
  total int(11) default NULL,
  lastadd date default NULL,
  PRIMARY KEY  (gallid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_categories'
#



#
# Table structure for table 'kayapo_gallery_comments'
#

CREATE TABLE kayapo_gallery_comments (
  cid int(11) NOT NULL auto_increment,
  pid int(11) default NULL,
  comment blob,
  date datetime default NULL,
  name varchar(255) default NULL,
  member int(11) default NULL,
  PRIMARY KEY  (cid),
  KEY pid (pid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_comments'
#

INSERT INTO kayapo_gallery_comments VALUES("1", "1", "cool art", "2000-12-19 12:18:53", "dgrabows", "0");
INSERT INTO kayapo_gallery_comments VALUES("2", "1", "Good job but could be better", "2001-05-18 17:50:04", "MarsIsHere", "0");
INSERT INTO kayapo_gallery_comments VALUES("3", "1", "Et voil?!!!", "2001-05-18 17:58:51", "Webmaster", "1");
INSERT INTO kayapo_gallery_comments VALUES("4", "1", "rororo", "2001-09-24 21:18:10", "tororo", "0");


#
# Table structure for table 'kayapo_gallery_media_class'
#

CREATE TABLE kayapo_gallery_media_class (
  id int(11) NOT NULL auto_increment,
  class varchar(10) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_media_class'
#

INSERT INTO kayapo_gallery_media_class VALUES("1", "Image");
INSERT INTO kayapo_gallery_media_class VALUES("2", "Audio");
INSERT INTO kayapo_gallery_media_class VALUES("3", "Video");


#
# Table structure for table 'kayapo_gallery_media_types'
#

CREATE TABLE kayapo_gallery_media_types (
  extension varchar(10) NOT NULL default '',
  description blob,
  filetype varchar(20) default NULL,
  displaytag blob,
  thumbnail varchar(255) default NULL,
  PRIMARY KEY  (extension)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_media_types'
#

INSERT INTO kayapo_gallery_media_types VALUES("bmp", "Image/BMP", "1", "<img src=\"<:FILENAME:>\" border=\"0\" alt=\"<:DESCRIPTION:>\">", "image_gif.gif");
INSERT INTO kayapo_gallery_media_types VALUES("gif", "Image/GIF", "1", "<img src=\"<:FILENAME:>\" border=\"1\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">", "image_gif.gif");
INSERT INTO kayapo_gallery_media_types VALUES("jpg", "Image/JPEG", "1", "<img src=\"<:FILENAME:>\" border=\"1\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">", "image_jpg.gif");
INSERT INTO kayapo_gallery_media_types VALUES("png", "Image/PNG", "1", "<img src=\"<:FILENAME:>\" border=\"1\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">", "image_png.gif");
INSERT INTO kayapo_gallery_media_types VALUES("mov", "Video/Quicktime", "3", "<embed controller=\"true\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>", "video_mov.gif");
INSERT INTO kayapo_gallery_media_types VALUES("avi", "Video/AVI", "3", "<embed src=\"<:FILENAME:>\" width =\"640\" height=\"480\" zoom=\"100%\" controller=\"true\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" type=\"application/x-mplayer2\"></embed>", "video_avi.gif");
INSERT INTO kayapo_gallery_media_types VALUES("mpg", "Video/MPEG", "3", "<embed src=\"<:FILENAME:>\" width =\"640\" height=\"480\" zoom=\"100%\" controller=\"true\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" type=\"application/x-mplayer2\"></embed>", "video_mpg.gif");
INSERT INTO kayapo_gallery_media_types VALUES("mp3", "Audio/MP3", "2", "<embed src=\"<:FILENAME:>\" type=\"application/x-mplayer2\" hidden=\"false\" autostart=\"true\" loop=\"false\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" </embed>", "audio_mp3.gif");
INSERT INTO kayapo_gallery_media_types VALUES("mid", "Audio/MIDI", "2", "<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"false\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" </embed>", "audio_mid.gif");
INSERT INTO kayapo_gallery_media_types VALUES("swf", "Video/Flash", "3", "<embed src=\"<:FILENAME:>\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" play=\"true\" loop=\"true\" quality=\"high\" scale=\"showall\" menu=\"true\"></embed>", "video_swf.gif");
INSERT INTO kayapo_gallery_media_types VALUES("wma", "Audio/WMA", "2", "<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"false\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" </embed>", "audio_mid.gif");
INSERT INTO kayapo_gallery_media_types VALUES("wmv", "Video/Movie", "3", "<embed src=\"<:FILENAME:>\"  width =\"640\" height=\"480\" controller=\"true\" showdisplay=\"0\" showcontrol=\"1\" autosize=\"0\" showstatusbar=\"1\" border=\"0\" type=\"application/x-mplayer2\"></embed>", "video_mpg.gif");


#
# Table structure for table 'kayapo_gallery_pictures'
#

CREATE TABLE kayapo_gallery_pictures (
  pid int(11) NOT NULL auto_increment,
  gid int(11) default NULL,
  img varchar(255) default NULL,
  counter int(11) default NULL,
  submitter varchar(24) default NULL,
  date datetime default NULL,
  name varchar(255) default NULL,
  description blob,
  votes int(11) default NULL,
  rate double default NULL,
  extension varchar(10) default NULL,
  width int(11) default NULL,
  height int(11) default NULL,
  PRIMARY KEY  (pid),
  KEY gid (gid),
  KEY counter (counter),
  KEY date (date),
  KEY votes (votes),
  KEY rate (rate)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_pictures'
#

INSERT INTO kayapo_gallery_pictures VALUES("7", "2", "kayapo-card01.jpg", "16", "Kayap?", "2004-12-21 10:52:05", "Kayapo01", "Imagem de um jovem ?ndio Kayap?.\r\n\r\nEsta imagem ? cortesia de Gerhard Prokop.", "0", "0", "jpg", "430", "600");


#
# Table structure for table 'kayapo_gallery_pictures_newpicture'
#

CREATE TABLE kayapo_gallery_pictures_newpicture (
  pid int(11) NOT NULL auto_increment,
  gid int(11) default NULL,
  img varchar(255) default NULL,
  counter int(11) default NULL,
  submitter varchar(24) default NULL,
  date datetime default NULL,
  name varchar(255) default NULL,
  description blob,
  votes int(11) default NULL,
  rate double default NULL,
  extension varchar(10) default NULL,
  width int(11) default NULL,
  height int(11) default NULL,
  PRIMARY KEY  (pid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_pictures_newpicture'
#



#
# Table structure for table 'kayapo_gallery_rate_check'
#

CREATE TABLE kayapo_gallery_rate_check (
  ip varchar(20) default NULL,
  time varchar(14) default NULL,
  pid int(11) default NULL,
  KEY ip (ip)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_rate_check'
#



#
# Table structure for table 'kayapo_gallery_template_types'
#

CREATE TABLE kayapo_gallery_template_types (
  id int(11) NOT NULL auto_increment,
  title varchar(255) default NULL,
  type int(11) default NULL,
  templateCategory blob,
  templatePictures blob,
  templateCSS blob,
  PRIMARY KEY  (id),
  KEY type (type)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_gallery_template_types'
#

INSERT INTO kayapo_gallery_template_types VALUES("1", "Default Main Page Template", "1", "<table align=\"center\">\r\n<tr>\r\n	<td colspan=\"2\">\r\n		<:GALLNAME:>\r\n	</td>\r\n</tr>\r\n<tr>\r\n	<td>\r\n		<:IMAGE:>\r\n	</td>\r\n	<td valign=\"top\" align=\"left\">\r\n		<:DESCRIPTION:>\r\n	</td>\r\n</tr>\r\n</table>", "2", ".common_text_black {text-color:#000000}\r\n.common_text_white {text-color:#ffffff}");
INSERT INTO kayapo_gallery_template_types VALUES("2", "Default", "2", "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n	<td>\r\n		<:IMAGE:>\r\n	</td>\r\n	<td valign=\"top\">\r\n		<p>\r\n				<table>\r\n				<tr>\r\n					<td align=\"center\">\r\n						<:DATE:>\r\n					</td>\r\n					<td align=\"center\">\r\n						<:RATE:>\r\n					</td>\r\n					<td align=\"center\">\r\n						<:HITS:>\r\n					</td>\r\n					<td align=\"center\">\r\n						<:NEW:>\r\n					</td>\r\n				</tr>\r\n				</table>\r\n		</p>\r\n		<p>\r\n				<:DESCRIPTION:>\r\n		</p>\r\n		<p>\r\n				<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\r\n		</p>\r\n	</td>\r\n</tr>\r\n</table>", "<table>\r\n<tr>\r\n	<td valign=\"top\" align=\"center\">\r\n		<:NAMESIZE:>\r\n		<br><br>\r\n		<TABLE CellPadding=\"0\" CellSpacing=\"0\">\r\n		<TR>\r\n			<TD valign=\"top\">\r\n				<:SUBMITTER:>\r\n				<:DATE:>\r\n				<:HITS:>\r\n				<:RATE:>\r\n			</TD>\r\n		</TR>\r\n		</table><br>\r\n		<:RATINGBAR:><br>\r\n		<:POSTCARD:><br>\r\n		<:DOWNLOAD:><br>\r\n		<:PRINT:>\r\n	</td>\r\n	<td width=\"80%\" align=\"center\">\r\n		<:IMAGE:>\r\n	</td>\r\n</tr>\r\n<tr>\r\n	<td colspan=\"2\"><:DESCRIPTION:></td>\r\n</tr>\r\n<tr>\r\n	<td colspan=\"2\">\r\n		<:COMMENTS:>\r\n	</td>\r\n</tr>\r\n</table>", ".common_text_black {text-color:#000000}\r\n.common_text_white {text-color:#ffffff}");


#
# Table structure for table 'kayapo_groups'
#

CREATE TABLE kayapo_groups (
  id int(10) NOT NULL auto_increment,
  name varchar(255) NOT NULL default '',
  description text NOT NULL,
  points int(10) NOT NULL default '0',
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_groups'
#



#
# Table structure for table 'kayapo_groups_points'
#

CREATE TABLE kayapo_groups_points (
  id int(10) NOT NULL auto_increment,
  points int(10) NOT NULL default '0',
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_groups_points'
#

INSERT INTO kayapo_groups_points VALUES("1", "0");
INSERT INTO kayapo_groups_points VALUES("2", "0");
INSERT INTO kayapo_groups_points VALUES("3", "0");
INSERT INTO kayapo_groups_points VALUES("4", "0");
INSERT INTO kayapo_groups_points VALUES("5", "0");
INSERT INTO kayapo_groups_points VALUES("6", "0");
INSERT INTO kayapo_groups_points VALUES("7", "0");
INSERT INTO kayapo_groups_points VALUES("8", "0");
INSERT INTO kayapo_groups_points VALUES("9", "0");
INSERT INTO kayapo_groups_points VALUES("10", "0");
INSERT INTO kayapo_groups_points VALUES("11", "0");
INSERT INTO kayapo_groups_points VALUES("12", "0");
INSERT INTO kayapo_groups_points VALUES("13", "0");
INSERT INTO kayapo_groups_points VALUES("14", "0");
INSERT INTO kayapo_groups_points VALUES("15", "0");
INSERT INTO kayapo_groups_points VALUES("16", "0");
INSERT INTO kayapo_groups_points VALUES("17", "0");
INSERT INTO kayapo_groups_points VALUES("18", "0");
INSERT INTO kayapo_groups_points VALUES("19", "0");
INSERT INTO kayapo_groups_points VALUES("20", "0");
INSERT INTO kayapo_groups_points VALUES("21", "0");


#
# Table structure for table 'kayapo_headlines'
#

CREATE TABLE kayapo_headlines (
  hid int(11) NOT NULL auto_increment,
  sitename varchar(30) NOT NULL default '',
  headlinesurl varchar(200) NOT NULL default '',
  PRIMARY KEY  (hid),
  KEY hid (hid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_headlines'
#

INSERT INTO kayapo_headlines VALUES("1", "AbsoluteGames", "http://files.gameaholic.com/agfa.rdf");
INSERT INTO kayapo_headlines VALUES("2", "BSDToday", "http://www.bsdtoday.com/backend/bt.rdf");
INSERT INTO kayapo_headlines VALUES("3", "BrunchingShuttlecocks", "http://www.brunching.com/brunching.rdf");
INSERT INTO kayapo_headlines VALUES("4", "DailyDaemonNews", "http://daily.daemonnews.org/ddn.rdf.php3");
INSERT INTO kayapo_headlines VALUES("5", "DigitalTheatre", "http://www.dtheatre.com/backend.php3?xml=yes");
INSERT INTO kayapo_headlines VALUES("6", "DotKDE", "http://dot.kde.org/rdf");
INSERT INTO kayapo_headlines VALUES("7", "FreeDOS", "http://www.freedos.org/channels/rss.cgi");
INSERT INTO kayapo_headlines VALUES("8", "Freshmeat", "http://freshmeat.net/backend/fm.rdf");
INSERT INTO kayapo_headlines VALUES("9", "Gnome Desktop", "http://www.gnomedesktop.org/backend.php");
INSERT INTO kayapo_headlines VALUES("10", "HappyPenguin", "http://happypenguin.org/html/news.rdf");
INSERT INTO kayapo_headlines VALUES("11", "HollywoodBitchslap", "http://hollywoodbitchslap.com/hbs.rdf");
INSERT INTO kayapo_headlines VALUES("12", "Learning Linux", "http://www.learninglinux.com/backend.php");
INSERT INTO kayapo_headlines VALUES("13", "LinuxCentral", "http://linuxcentral.com/backend/lcnew.rdf");
INSERT INTO kayapo_headlines VALUES("14", "LinuxJournal", "http://www.linuxjournal.com/news.rss");
INSERT INTO kayapo_headlines VALUES("15", "LinuxWeelyNews", "http://lwn.net/headlines/rss");
INSERT INTO kayapo_headlines VALUES("16", "Listology", "http://listology.com/recent.rdf");
INSERT INTO kayapo_headlines VALUES("17", "MozillaNewsBot", "http://www.mozilla.org/newsbot/newsbot.rdf");
INSERT INTO kayapo_headlines VALUES("18", "NewsForge", "http://www.newsforge.com/newsforge.rdf");
INSERT INTO kayapo_headlines VALUES("19", "NukeResources", "http://www.nukeresources.com/backend.php");
INSERT INTO kayapo_headlines VALUES("20", "NukeScripts", "http://www.nukescripts.net/backend.php");
INSERT INTO kayapo_headlines VALUES("21", "PDABuzz", "http://www.pdabuzz.com/netscape.txt");
INSERT INTO kayapo_headlines VALUES("22", "PHP-Nuke", "http://phpnuke.org/backend.php");
INSERT INTO kayapo_headlines VALUES("23", "PHP.net", "http://www.php.net/news.rss");
INSERT INTO kayapo_headlines VALUES("24", "PHPBuilder", "http://phpbuilder.com/rss_feed.php");
INSERT INTO kayapo_headlines VALUES("25", "PerlMonks", "http://www.perlmonks.org/headlines.rdf");
INSERT INTO kayapo_headlines VALUES("26", "TheNextLevel", "http://www.the-nextlevel.com/rdf/tnl.rdf");
INSERT INTO kayapo_headlines VALUES("27", "WebReference", "http://webreference.com/webreference.rdf");


#
# Table structure for table 'kayapo_journal'
#

CREATE TABLE kayapo_journal (
  jid int(11) NOT NULL auto_increment,
  aid varchar(30) NOT NULL default '',
  title varchar(80) default NULL,
  bodytext text NOT NULL,
  mood varchar(48) NOT NULL default '',
  pdate varchar(48) NOT NULL default '',
  ptime varchar(48) NOT NULL default '',
  status varchar(48) NOT NULL default '',
  mtime varchar(48) NOT NULL default '',
  mdate varchar(48) NOT NULL default '',
  PRIMARY KEY  (jid),
  KEY jid (jid),
  KEY aid (aid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_journal'
#



#
# Table structure for table 'kayapo_journal_comments'
#

CREATE TABLE kayapo_journal_comments (
  cid int(11) NOT NULL auto_increment,
  rid varchar(48) NOT NULL default '',
  aid varchar(30) NOT NULL default '',
  comment text NOT NULL,
  pdate varchar(48) NOT NULL default '',
  ptime varchar(48) NOT NULL default '',
  PRIMARY KEY  (cid),
  KEY cid (cid),
  KEY rid (rid),
  KEY aid (aid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_journal_comments'
#



#
# Table structure for table 'kayapo_journal_stats'
#

CREATE TABLE kayapo_journal_stats (
  id int(11) NOT NULL auto_increment,
  joid varchar(48) NOT NULL default '',
  nop varchar(48) NOT NULL default '',
  ldp varchar(24) NOT NULL default '',
  ltp varchar(24) NOT NULL default '',
  micro varchar(128) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_journal_stats'
#



#
# Table structure for table 'kayapo_links_categories'
#

CREATE TABLE kayapo_links_categories (
  cid int(11) NOT NULL auto_increment,
  title varchar(50) NOT NULL default '',
  cdescription text NOT NULL,
  parentid int(11) NOT NULL default '0',
  PRIMARY KEY  (cid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_links_categories'
#



#
# Table structure for table 'kayapo_links_editorials'
#

CREATE TABLE kayapo_links_editorials (
  linkid int(11) NOT NULL default '0',
  adminid varchar(60) NOT NULL default '',
  editorialtimestamp datetime NOT NULL default '0000-00-00 00:00:00',
  editorialtext text NOT NULL,
  editorialtitle varchar(100) NOT NULL default '',
  PRIMARY KEY  (linkid),
  KEY linkid (linkid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_links_editorials'
#



#
# Table structure for table 'kayapo_links_links'
#

CREATE TABLE kayapo_links_links (
  lid int(11) NOT NULL auto_increment,
  cid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  url varchar(100) NOT NULL default '',
  description text NOT NULL,
  date datetime default NULL,
  name varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  hits int(11) NOT NULL default '0',
  submitter varchar(60) NOT NULL default '',
  linkratingsummary double(6,4) NOT NULL default '0.0000',
  totalvotes int(11) NOT NULL default '0',
  totalcomments int(11) NOT NULL default '0',
  PRIMARY KEY  (lid),
  KEY lid (lid),
  KEY cid (cid),
  KEY sid (sid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_links_links'
#



#
# Table structure for table 'kayapo_links_modrequest'
#

CREATE TABLE kayapo_links_modrequest (
  requestid int(11) NOT NULL auto_increment,
  lid int(11) NOT NULL default '0',
  cid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  url varchar(100) NOT NULL default '',
  description text NOT NULL,
  modifysubmitter varchar(60) NOT NULL default '',
  brokenlink int(3) NOT NULL default '0',
  PRIMARY KEY  (requestid),
  UNIQUE KEY requestid (requestid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_links_modrequest'
#



#
# Table structure for table 'kayapo_links_newlink'
#

CREATE TABLE kayapo_links_newlink (
  lid int(11) NOT NULL auto_increment,
  cid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  url varchar(100) NOT NULL default '',
  description text NOT NULL,
  name varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  submitter varchar(60) NOT NULL default '',
  PRIMARY KEY  (lid),
  KEY lid (lid),
  KEY cid (cid),
  KEY sid (sid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_links_newlink'
#



#
# Table structure for table 'kayapo_links_votedata'
#

CREATE TABLE kayapo_links_votedata (
  ratingdbid int(11) NOT NULL auto_increment,
  ratinglid int(11) NOT NULL default '0',
  ratinguser varchar(60) NOT NULL default '',
  rating int(11) NOT NULL default '0',
  ratinghostname varchar(60) NOT NULL default '',
  ratingcomments text NOT NULL,
  ratingtimestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (ratingdbid),
  KEY ratingdbid (ratingdbid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_links_votedata'
#



#
# Table structure for table 'kayapo_main'
#

CREATE TABLE kayapo_main (
  main_module varchar(255) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_main'
#

INSERT INTO kayapo_main VALUES("News");


#
# Table structure for table 'kayapo_message'
#

CREATE TABLE kayapo_message (
  mid int(11) NOT NULL auto_increment,
  title varchar(100) NOT NULL default '',
  content text NOT NULL,
  date varchar(14) NOT NULL default '',
  expire int(7) NOT NULL default '0',
  active int(1) NOT NULL default '1',
  view int(1) NOT NULL default '1',
  groups text NOT NULL,
  mlanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (mid),
  UNIQUE KEY mid (mid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_message'
#



#
# Table structure for table 'kayapo_modules'
#

CREATE TABLE kayapo_modules (
  mid int(10) NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  custom_title varchar(255) NOT NULL default '',
  active int(1) NOT NULL default '0',
  view int(1) NOT NULL default '0',
  groups text NOT NULL,
  inmenu tinyint(1) NOT NULL default '1',
  mod_group int(10) default '0',
  admins varchar(255) NOT NULL default '',
  PRIMARY KEY  (mid),
  KEY mid (mid),
  KEY title (title),
  KEY custom_title (custom_title)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_modules'
#

INSERT INTO kayapo_modules VALUES("1", "AvantGo", "AvantGo", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("2", "Content", "Conte?do", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("3", "Downloads", "Downloads", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("4", "Encyclopedia", "Enciclop?dia", "0", "0", "", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("5", "FAQ", "Perguntas Frequentes", "0", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("6", "Feedback", "Contate-nos", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("7", "Forums", "Foros", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("8", "Journal", "Di?rio de Usu?rio", "0", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("9", "Members_List", "Lista de Usu?rios", "1", "1", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("10", "News", "Not?cias", "1", "0", "", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("11", "Private_Messages", "Mensagens Privadas", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("36", "biblia", "biblia", "0", "0", "1", "0", "0", "");
INSERT INTO kayapo_modules VALUES("35", "Search", "Search", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("15", "Statistics", "Estat?sticas", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("16", "Stories_Archive", "Arquivo de Not?cias", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("18", "Surveys", "Enquetes", "1", "0", "", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("19", "Top", "Top 10", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("20", "Topics", "T?picos", "1", "0", "", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("21", "Web_Links", "Web Links", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("22", "Your_Account", "Sua Conta", "1", "0", "", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("23", "My_eGallery", "Galeria de Fotos", "1", "0", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("24", "Blocked_IPs", "IPs Bloqueados", "0", "2", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("25", "Blocked_Ranges", "Faixas de IPs Bloqueados", "0", "2", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("26", "Blocked_Referers", "Referenciadores Bloqueados", "0", "2", "", "1", "0", "");
INSERT INTO kayapo_modules VALUES("29", "Recherches", "Busca Avan?ada", "1", "0", "1", "1", "0", "");
INSERT INTO kayapo_modules VALUES("30", "FCKeditor", "Enviar Not?cia", "1", "0", "1", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("31", "Calendar", "Calend?rio", "1", "0", "1", "1", "0", "STR - Sindicato dos Traba,");
INSERT INTO kayapo_modules VALUES("33", "Banner_Ads", "Banner Ads", "1", "0", "", "1", "0", "STR - Sindicato dos Traba,");


#
# Table structure for table 'kayapo_nsnba_banners'
#

CREATE TABLE kayapo_nsnba_banners (
  bid int(11) NOT NULL auto_increment,
  cid int(11) NOT NULL default '0',
  pid tinyint(1) NOT NULL default '0',
  imptotal int(11) NOT NULL default '0',
  impmade int(11) NOT NULL default '0',
  clicks int(11) NOT NULL default '0',
  imageurl varchar(200) NOT NULL default '',
  clickurl varchar(200) NOT NULL default '',
  alttext varchar(255) NOT NULL default '',
  code tinyint(1) NOT NULL default '0',
  flash tinyint(1) NOT NULL default '0',
  height int(4) NOT NULL default '60',
  width int(4) NOT NULL default '468',
  datestr date NOT NULL default '0000-00-00',
  dateend date NOT NULL default '0000-00-00',
  active tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (bid),
  KEY bid (bid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnba_banners'
#

INSERT INTO kayapo_nsnba_banners VALUES("1", "1", "1", "12000", "9", "0", "http://kayapo.phpnuke.org.br/images/banners/banner01.gif", "http://kayapo.phpnuke.org.br/images/banners", "CNB Kayap? - A For?a do PHP-Nuke no Brasil!", "0", "0", "60", "468", "2005-01-25", "2006-01-25", "0");


#
# Table structure for table 'kayapo_nsnba_clients'
#

CREATE TABLE kayapo_nsnba_clients (
  cid int(11) NOT NULL auto_increment,
  name varchar(60) NOT NULL default '',
  email varchar(60) NOT NULL default '',
  login varchar(25) NOT NULL default '',
  passwd varchar(40) NOT NULL default '',
  PRIMARY KEY  (cid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnba_clients'
#

INSERT INTO kayapo_nsnba_clients VALUES("1", "CNB", "webmaster@phpnuke.org.br", "CNB", "b15edd567fcbdbb1991dd9c39c21c86b");


#
# Table structure for table 'kayapo_nsnba_config'
#

CREATE TABLE kayapo_nsnba_config (
  id tinyint(1) NOT NULL auto_increment,
  ipp tinyint(4) NOT NULL default '20',
  impamnt int(6) NOT NULL default '1000',
  usegfxcheck tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnba_config'
#

INSERT INTO kayapo_nsnba_config VALUES("1", "20", "1000", "0");


#
# Table structure for table 'kayapo_nsngd_accesses'
#

CREATE TABLE kayapo_nsngd_accesses (
  username varchar(60) NOT NULL default '',
  downloads int(11) NOT NULL default '0',
  uploads int(11) NOT NULL default '0',
  PRIMARY KEY  (username)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_accesses'
#



#
# Table structure for table 'kayapo_nsngd_categories'
#

CREATE TABLE kayapo_nsngd_categories (
  cid int(11) NOT NULL auto_increment,
  title varchar(50) NOT NULL default '',
  cdescription text NOT NULL,
  parentid int(11) NOT NULL default '0',
  whoadd tinyint(2) NOT NULL default '0',
  uploaddir varchar(255) NOT NULL default '',
  canupload tinyint(2) NOT NULL default '0',
  active tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (cid),
  KEY cid (cid),
  KEY title (title)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_categories'
#



#
# Table structure for table 'kayapo_nsngd_config'
#

CREATE TABLE kayapo_nsngd_config (
  config_name varchar(255) NOT NULL default '',
  config_value text NOT NULL,
  PRIMARY KEY  (config_name)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_config'
#

INSERT INTO kayapo_nsngd_config VALUES("admperpage", "50");
INSERT INTO kayapo_nsngd_config VALUES("blockunregmodify", "0");
INSERT INTO kayapo_nsngd_config VALUES("dateformat", "D M j G:i:s T Y");
INSERT INTO kayapo_nsngd_config VALUES("mostpopular", "25");
INSERT INTO kayapo_nsngd_config VALUES("mostpopulartrig", "0");
INSERT INTO kayapo_nsngd_config VALUES("perpage", "10");
INSERT INTO kayapo_nsngd_config VALUES("popular", "500");
INSERT INTO kayapo_nsngd_config VALUES("results", "10");
INSERT INTO kayapo_nsngd_config VALUES("show_links_num", "0");
INSERT INTO kayapo_nsngd_config VALUES("usegfxcheck", "0");
INSERT INTO kayapo_nsngd_config VALUES("show_download", "0");
INSERT INTO kayapo_nsngd_config VALUES("version_number", "1.0.0");


#
# Table structure for table 'kayapo_nsngd_downloads'
#

CREATE TABLE kayapo_nsngd_downloads (
  lid int(11) NOT NULL auto_increment,
  cid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  url varchar(255) NOT NULL default '',
  description text NOT NULL,
  date datetime NOT NULL default '0000-00-00 00:00:00',
  name varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  hits int(11) NOT NULL default '0',
  submitter varchar(60) NOT NULL default '',
  sub_ip varchar(16) NOT NULL default '0.0.0.0',
  filesize bigint(20) NOT NULL default '0',
  version varchar(20) NOT NULL default '',
  homepage varchar(255) NOT NULL default '',
  active tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (lid),
  KEY lid (lid),
  KEY cid (cid),
  KEY sid (sid),
  KEY title (title)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_downloads'
#



#
# Table structure for table 'kayapo_nsngd_extensions'
#

CREATE TABLE kayapo_nsngd_extensions (
  eid int(11) NOT NULL auto_increment,
  ext varchar(6) NOT NULL default '',
  file tinyint(1) NOT NULL default '0',
  image tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (eid),
  KEY ext (eid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_extensions'
#

INSERT INTO kayapo_nsngd_extensions VALUES("1", ".ace", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("2", ".arj", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("3", ".bz", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("4", ".bz2", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("5", ".cab", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("6", ".exe", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("7", ".gif", "0", "1");
INSERT INTO kayapo_nsngd_extensions VALUES("8", ".gz", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("9", ".iso", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("10", ".jpeg", "0", "1");
INSERT INTO kayapo_nsngd_extensions VALUES("11", ".jpg", "0", "1");
INSERT INTO kayapo_nsngd_extensions VALUES("12", ".lha", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("13", ".lzh", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("14", ".png", "0", "1");
INSERT INTO kayapo_nsngd_extensions VALUES("15", ".rar", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("16", ".tar", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("17", ".tgz", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("18", ".uue", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("19", ".zip", "1", "0");
INSERT INTO kayapo_nsngd_extensions VALUES("20", ".zoo", "1", "0");


#
# Table structure for table 'kayapo_nsngd_mods'
#

CREATE TABLE kayapo_nsngd_mods (
  rid int(11) NOT NULL auto_increment,
  lid int(11) NOT NULL default '0',
  cid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  url varchar(255) NOT NULL default '',
  description text NOT NULL,
  modifier varchar(60) NOT NULL default '',
  sub_ip varchar(16) NOT NULL default '0.0.0.0',
  brokendownload int(3) NOT NULL default '0',
  name varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  filesize bigint(20) NOT NULL default '0',
  version varchar(20) NOT NULL default '',
  homepage varchar(255) NOT NULL default '',
  PRIMARY KEY  (rid),
  UNIQUE KEY rid (rid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_mods'
#



#
# Table structure for table 'kayapo_nsngd_new'
#

CREATE TABLE kayapo_nsngd_new (
  lid int(11) NOT NULL auto_increment,
  cid int(11) NOT NULL default '0',
  sid int(11) NOT NULL default '0',
  title varchar(100) NOT NULL default '',
  url varchar(255) NOT NULL default '',
  description text NOT NULL,
  date datetime NOT NULL default '0000-00-00 00:00:00',
  name varchar(100) NOT NULL default '',
  email varchar(100) NOT NULL default '',
  submitter varchar(60) NOT NULL default '',
  sub_ip varchar(16) NOT NULL default '0.0.0.0',
  filesize bigint(20) NOT NULL default '0',
  version varchar(20) NOT NULL default '',
  homepage varchar(255) NOT NULL default '',
  PRIMARY KEY  (lid),
  KEY lid (lid),
  KEY cid (cid),
  KEY sid (sid),
  KEY title (title)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngd_new'
#



#
# Table structure for table 'kayapo_nsngr_config'
#

CREATE TABLE kayapo_nsngr_config (
  config_name varchar(255) NOT NULL default '',
  config_value text NOT NULL,
  PRIMARY KEY  (config_name)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngr_config'
#

INSERT INTO kayapo_nsngr_config VALUES("perpage", "50");
INSERT INTO kayapo_nsngr_config VALUES("date_format", "Y-m-d");
INSERT INTO kayapo_nsngr_config VALUES("send_notice", "1");
INSERT INTO kayapo_nsngr_config VALUES("script_version", "1.5.0");


#
# Table structure for table 'kayapo_nsngr_groups'
#

CREATE TABLE kayapo_nsngr_groups (
  gid int(11) NOT NULL auto_increment,
  gname varchar(32) NOT NULL default '',
  gdesc text NOT NULL,
  gpublic tinyint(1) NOT NULL default '0',
  glimit int(11) NOT NULL default '0',
  PRIMARY KEY  (gid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngr_groups'
#

INSERT INTO kayapo_nsngr_groups VALUES("1", "General", "", "0", "0");


#
# Table structure for table 'kayapo_nsngr_users'
#

CREATE TABLE kayapo_nsngr_users (
  gid int(11) NOT NULL default '0',
  uid int(11) NOT NULL default '0',
  uname varchar(25) NOT NULL default '',
  trial tinyint(1) NOT NULL default '0',
  notice tinyint(1) NOT NULL default '0',
  sdate int(14) NOT NULL default '0',
  edate int(14) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsngr_users'
#



#
# Table structure for table 'kayapo_nsnst_admins'
#

CREATE TABLE kayapo_nsnst_admins (
  aid varchar(25) NOT NULL default '',
  login varchar(25) NOT NULL default '',
  password varchar(20) NOT NULL default '',
  password_md5 varchar(60) NOT NULL default '',
  password_crypt varchar(60) NOT NULL default '',
  protected tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (aid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_admins'
#

INSERT INTO kayapo_nsnst_admins VALUES("admin", "admin", "", "", "", "1");


#
# Table structure for table 'kayapo_nsnst_blocked_ips'
#

CREATE TABLE kayapo_nsnst_blocked_ips (
  ip_addr varchar(15) NOT NULL default '',
  user_id int(11) NOT NULL default '1',
  username varchar(60) NOT NULL default 'Anonymous',
  user_agent text NOT NULL,
  date int(20) NOT NULL default '0',
  notes text NOT NULL,
  reason tinyint(1) NOT NULL default '0',
  query_string text NOT NULL,
  x_forward_for varchar(32) NOT NULL default 'None',
  client_ip varchar(32) NOT NULL default 'None',
  remote_addr varchar(32) NOT NULL default '',
  remote_port varchar(11) NOT NULL default 'Unknown',
  request_method varchar(10) NOT NULL default '',
  expires int(20) NOT NULL default '0',
  c2c char(2) NOT NULL default '00',
  PRIMARY KEY  (ip_addr)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_blocked_ips'
#



#
# Table structure for table 'kayapo_nsnst_blocked_ranges'
#

CREATE TABLE kayapo_nsnst_blocked_ranges (
  ip_lo int(10) unsigned NOT NULL default '0',
  ip_hi int(10) unsigned NOT NULL default '0',
  date int(20) NOT NULL default '0',
  notes text NOT NULL,
  reason tinyint(1) NOT NULL default '0',
  expires int(20) NOT NULL default '0',
  c2c char(2) NOT NULL default '00',
  KEY code (ip_lo,ip_hi,c2c)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_blocked_ranges'
#



#
# Table structure for table 'kayapo_nsnst_blockers'
#

CREATE TABLE kayapo_nsnst_blockers (
  blocker int(4) NOT NULL default '0',
  block_name varchar(20) NOT NULL default '',
  activate int(4) NOT NULL default '0',
  block_type int(4) NOT NULL default '0',
  email_lookup int(4) NOT NULL default '0',
  forward varchar(255) NOT NULL default '',
  reason varchar(20) NOT NULL default '',
  template varchar(255) NOT NULL default '',
  duration int(20) NOT NULL default '0',
  htaccess int(4) NOT NULL default '0',
  list longtext NOT NULL,
  PRIMARY KEY  (blocker)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_blockers'
#

INSERT INTO kayapo_nsnst_blockers VALUES("0", "other", "0", "0", "0", "", "Abuse-Other", "abuse_default.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("1", "union", "0", "0", "0", "", "Abuse-Union", "abuse_union.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("2", "clike", "0", "0", "0", "", "Abuse-CLike", "abuse_clike.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("3", "harvester", "0", "0", "0", "", "Abuse-Harvest", "abuse_harvester.tpl", "0", "0", "@yahoo.com\r\nalexibot\r\nalligator\r\nanonymiz\r\nasterias\r\nbackdoorbot\r\nblack hole\r\nblackwidow\r\nblowfish\r\nbotalot\r\nbuiltbottough\r\nbullseye\r\nbunnyslippers\r\ncatch\r\ncegbfeieh\r\ncharon\r\ncheesebot\r\ncherrypicker\r\nchinaclaw\r\ncombine\r\ncopyrightcheck\r\ncosmos\r\ncrescent\r\ncurl\r\ndbrowse\r\ndisco\r\ndittospyder\r\ndlman\r\ndnloadmage\r\ndownload\r\ndreampassport\r\ndts agent\r\necatch\r\neirgrabber\r\nerocrawler\r\nexpress webpictures\r\nextractorpro\r\neyenetie\r\nfantombrowser\r\nfantomcrew browser\r\nfileheap\r\nfilehound\r\nflashget\r\nfoobot\r\nfranklin locator\r\nfreshdownload\r\nfscrawler\r\ngamespy_arcade\r\ngetbot\r\ngetright\r\ngetweb\r\ngo!zilla\r\ngo-ahead-got-it\r\ngrab\r\ngrafula\r\ngsa-crawler\r\nharvest\r\nhloader\r\nhmview\r\nhttplib\r\nhttpresume\r\nhttrack\r\nhumanlinks\r\nigetter\r\nimage stripper\r\nimage sucker\r\nindustry program\r\nindy library\r\ninfonavirobot\r\ninstallshield digitalwizard\r\ninterget\r\niria\r\nirvine\r\niupui research bot\r\njbh agent\r\njennybot\r\njetcar\r\njobo\r\njoc\r\nkapere\r\nkenjin spider\r\nkeyword density\r\nlarbin\r\nleechftp\r\nleechget\r\nlexibot\r\nlibweb/clshttp\r\nlibwww-perl\r\nlightningdownload\r\nlincoln state web browser\r\nlinkextractorpro\r\nlinkscan/8.1a.unix\r\nlinkwalker\r\nlwp-trivial\r\nlwp::simple\r\nmac finder\r\nmata hari\r\nmediasearch\r\nmetaproducts\r\nmicrosoft url control\r\nmidown tool\r\nmiixpc\r\nmissauga locate\r\nmissouri college browse\r\nmister pix\r\nmoget\r\nmozilla.*newt\r\nmozilla/3.0 (compatible)\r\nmozilla/3.mozilla/2.01\r\nmsie 4.0 (win95)\r\nmultiblocker browser\r\nmydaemon\r\nmygetright\r\nnabot\r\nnavroad\r\nnearsite\r\nnet vampire\r\nnetants\r\nnetmechanic\r\nnetpumper\r\nnetspider\r\nnewsearchengine\r\nnicerspro\r\nninja\r\nnitro downloader\r\nnpbot\r\noctopus\r\noffline explorer\r\noffline navigator\r\nopenfind\r\npagegrabber\r\npapa foto\r\npavuk\r\npbrowse\r\npcbrowser\r\npeval\r\npompos/\r\nprogram shareware\r\npropowerbot\r\nprowebwalker\r\npsurf\r\npuf\r\npuxarapido\r\nqueryn metasearch\r\nrealdownload\r\nreget\r\nrepomonkey\r\nrsurf\r\nrumours-agent\r\nsakura\r\nscan4mail\r\nsemanticdiscovery\r\nsitesnagger\r\nslysearch\r\nspankbot\r\nspanner \r\nspiderzilla\r\nsq webscanner\r\nstamina\r\nstar downloader\r\nsteeler\r\nsteeler\r\nstrip\r\nsuperbot\r\nsuperhttp\r\nsurfbot\r\nsuzuran\r\nswbot\r\nszukacz\r\ntakeout\r\nteleport\r\ntelesoft\r\ntest spider\r\nthe intraformant\r\nthenomad\r\ntighttwatbot\r\ntitan\r\ntocrawl/urldispatcher\r\ntrue_robot\r\ntsurf\r\nturing machine\r\nturingos\r\nurlblaze\r\nurlgetfile\r\nurly warning\r\nutilmind\r\nvci\r\nvoideye\r\nweb image collector\r\nweb sucker\r\nwebauto\r\nwebbandit\r\nwebcapture\r\nwebcollage\r\nwebcopier\r\nwebenhancer\r\nwebfetch\r\nwebgo\r\nwebleacher\r\nwebmasterworldforumbot\r\nwebql\r\nwebreaper\r\nwebsite extractor\r\nwebsite quester\r\nwebster\r\nwebstripper\r\nwebwhacker\r\nwep search\r\nwget\r\nwhizbang\r\nwidow\r\nwildsoft surfer\r\nwww-collector-e\r\nwww.netwu.com\r\nwwwoffle\r\nxaldon\r\nxenu\r\nzeus\r\nziggy\r\nzippy");
INSERT INTO kayapo_nsnst_blockers VALUES("4", "script", "0", "0", "0", "", "Abuse-Script", "abuse_script.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("5", "author", "0", "0", "0", "", "Abuse-Author", "abuse_author.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("6", "referer", "0", "0", "0", "", "Abuse-Referer", "abuse_referer.tpl", "0", "0", "121hr.com\r\n1st-call.net\r\n1stcool.com\r\n5000n.com\r\n69-xxx.com\r\n9irl.com\r\n9uy.com\r\na-day-at-the-party.com\r\naccessthepeace.com\r\nadult-model-nude-pictures.com\r\nadult-sex-toys-free-porn.com\r\nagnitum.com\r\nalfonssackpfeiffe.com\r\nalongwayfrommars.com\r\nanime-sex-1.com\r\nanorex-sf-stimulant-free.com\r\nantibot.net\r\nantique-tokiwa.com\r\napotheke-heute.com\r\narmada31.com\r\nartark.com\r\nartlilei.com\r\nascendbtg.com\r\naschalaecheck.com\r\nasian-sex-free-sex.com\r\naslowspeeker.com\r\nassasinatedfrogs.com\r\nathirst-for-tranquillity.net\r\naubonpanier.com\r\navalonumc.com\r\nayingba.com\r\nbayofnoreturn.com\r\nbbw4phonesex.com\r\nbeersarenotfree.com\r\nbierikiuetsch.com\r\nbilingualannouncements.com\r\nblack-pussy-toon-clip-anal-lover-single.com\r\nblownapart.com\r\nblueroutes.com\r\nboasex.com\r\nbooksandpages.com\r\nbootyquake.com\r\nbossyhunter.com\r\nboyz-sex.com\r\nbrokersaandpokers.com\r\nbrowserwindowcleaner.com\r\nbudobytes.com\r\nbusiness2fun.com\r\nbuymyshitz.com\r\nbyuntaesex.com\r\ncaniputsomeloveintoyou.com\r\ncartoons.net.ru\r\ncaverunsailing.com\r\ncertainhealth.com\r\nclantea.com\r\nclose-protection-services.com\r\nclubcanino.com\r\nclubstic.com\r\ncobrakai-skf.com\r\ncollegefucktour.co.uk\r\ncommanderspank.com\r\ncoolenabled.com\r\ncrusecountryart.com\r\ncrusingforsex.co.uk\r\ncunt-twat-pussy-juice-clit-licking.com\r\ncustomerhandshaker.com\r\ncyborgrama.com\r\ndarkprofits.co.uk\r\ndatingforme.co.uk\r\ndatingmind.com\r\ndegree.org.ru\r\ndelorentos.com\r\ndiggydigger.com\r\ndinkydonkyaussie.com\r\ndjpritchard.com\r\ndjtop.com\r\ndraufgeschissen.com\r\ndreamerteens.co.uk\r\nebonyarchives.co.uk\r\nebonyplaya.co.uk\r\necobuilder2000.com\r\nemailandemail.com\r\nemedici.net\r\nengine-on-fire.com\r\nerocity.co.uk\r\nesport3.com\r\neteenbabes.com\r\neurofreepages.com\r\neurotexans.com\r\nevolucionweb.com\r\nfakoli.com\r\nfe4ba.com\r\nferienschweden.com\r\nfindly.com\r\nfirsttimeteadrinker.com\r\nfishing.net.ru\r\nflatwonkers.com\r\nflowershopentertainment.com\r\nflymario.com\r\nfree-xxx-pictures-porno-gallery.com\r\nfreebestporn.com\r\nfreefuckingmovies.co.uk\r\nfreexxxstuff.co.uk\r\nfruitologist.net\r\nfruitsandbolts.com\r\nfuck-cumshots-free-midget-movie-clips.com\r\nfuck-michaelmoore.com\r\nfundacep.com\r\ngadless.com\r\ngallapagosrangers.com\r\ngalleries4free.co.uk\r\ngalofu.com\r\ngaypixpost.co.uk\r\ngeomasti.com\r\ngirltime.co.uk\r\nglassrope.com\r\ngodjustblessyouall.com\r\ngoldenageresort.com\r\ngonnabedaddies.com\r\ngranadasexi.com\r\ngranadasexi.com\r\nguardingtheangels.com\r\nguyprofiles.co.uk\r\nhappy1225.com\r\nhappychappywacky.com\r\nhealth.org.ru\r\nhexplas.com\r\nhighheelsmodels4fun.com\r\nhillsweb.com\r\nhiptuner.com\r\nhistoryintospace.com\r\nhoa-tuoi.com\r\nhomebuyinginatlanta.com\r\nhorizonultra.com\r\nhorseminiature.net\r\nhotkiss.co.uk\r\nhotlivegirls.co.uk\r\nhotmatchup.co.uk\r\nhusler.co.uk\r\niaentertainment.com\r\niamnotsomeone.com\r\niconsofcorruption.com\r\nihavenotrustinyou.com\r\ninformat-systems.com\r\ninteriorproshop.com\r\nintersoftnetworks.com\r\ninthecrib.com\r\ninvestment4cashiers.com\r\niti-trailers.com\r\njackpot-hacker.com\r\njacks-world.com\r\njamesthesailorbasher.com\r\njesuislemonds.com\r\njustanotherdomainname.com\r\nkampelicka.com\r\nkanalrattenarsch.com\r\nkatzasher.com\r\nkerosinjunkie.com\r\nkillasvideo.com\r\nkoenigspisser.com\r\nkontorpara.com\r\nl8t.com\r\nlaestacion101.com\r\nlambuschlamppen.com\r\nlankasex.co.uk\r\nlaser-creations.com\r\nle-tour-du-monde.com\r\nlecraft.com\r\nledo-design.com\r\nleftregistration.com\r\nlekkikoomastas.com\r\nlepommeau.com\r\nlibr-animal.com\r\nlibraries.org.ru\r\nlikewaterlikewind.com\r\nlimbojumpers.com\r\nlink.ru\r\nlockportlinks.com\r\nloiproject.com\r\nlongtermalternatives.com\r\nlottoeco.com\r\nlucalozzi.com\r\nmaki-e-pens.com\r\nmalepayperview.co.uk\r\nmangaxoxo.com\r\nmaps.org.ru\r\nmarcofields.com\r\nmasterofcheese.com\r\nmasteroftheblasterhill.com\r\nmastheadwankers.com\r\nmegafrontier.com\r\nmeinschuppen.com\r\nmercurybar.com\r\nmetapannas.com\r\nmicelebre.com\r\nmidnightlaundries.com\r\nmikeapartment.co.uk\r\nmillenniumchorus.com\r\nmimundial2002.com\r\nminiaturegallerymm.com\r\nmixtaperadio.com\r\nmondialcoral.com\r\nmonja-wakamatsu.com\r\nmonstermonkey.net\r\nmouthfreshners.com\r\nmullensholiday.com\r\nmusilo.com\r\nmyhollowlog.com\r\nmyhomephonenumber.com\r\nmykeyboardisbroken.com\r\nmysofia.net\r\nnaked-cheaters.com\r\nnaked-old-women.com\r\nnastygirls.co.uk\r\nnationclan.net\r\nnatterratter.com\r\nnaughtyadam.com\r\nnestbeschmutzer.com\r\nnetwu.com\r\nnewrealeaseonline.com\r\nnewrealeasesonline.com\r\nnextfrontiersonline.com\r\nnikostaxi.com\r\nnotorious7.com\r\nnrecruiter.com\r\nnursingdepot.com\r\nnustramosse.com\r\nnuturalhicks.com\r\noccaz-auto49.com\r\nocean-db.net\r\noilburnerservice.net\r\nomburo.com\r\noneoz.com\r\nonepageahead.net\r\nonlinewithaline.com\r\norganizate.net\r\nourownweddingsong.com\r\nowen-music.com\r\np-partners.com\r\npaginadeautor.com\r\npakistandutyfree.com\r\npamanderson.co.uk\r\nparentsense.net\r\nparticlewave.net\r\npay-clic.com\r\npay4link.net\r\npcisp.com\r\npersist-pharma.com\r\npeteband.com\r\npetplusindia.com\r\npickabbw.co.uk\r\npicture-oral-position-lesbian.com\r\npl8again.com\r\nplaneting.net\r\npopusky.com\r\nporn-expert.com\r\npromoblitza.com\r\nproproducts-usa.com\r\nptcgzone.com\r\nptporn.com\r\npublishmybong.com\r\nputtingtogether.com\r\nqualifiedcancelations.com\r\nrahost.com\r\nrainbow21.com\r\nrakkashakka.com\r\nrandomfeeding.com\r\nrape-art.com\r\nrd-brains.com\r\nrealestateonthehill.net\r\nrebuscadobot\r\nrequested-stuff.com\r\nretrotrasher.com\r\nricopositive.com\r\nrisorseinrete.com\r\nrotatingcunts.com\r\nrunawayclicks.com\r\nrutalibre.com\r\ns-marche.com\r\nsabrosojazz.com\r\nsamuraidojo.com\r\nsanaldarbe.com\r\nsasseminars.com\r\nschlampenbruzzler.com\r\nsearchmybong.com\r\nseckur.com\r\nsex-asian-porn-interracial-photo.com\r\nsex-porn-fuck-hardcore-movie.com\r\nsexa3.net\r\nsexer.com\r\nsexintention.com\r\nsexnet24.tv\r\nsexomundo.com\r\nsharks.com.ru\r\nshells.com.ru\r\nshop-ecosafe.com\r\nshop-toon-hardcore-fuck-cum-pics.com\r\nsilverfussions.com\r\nsin-city-sex.net\r\nsluisvan.com\r\nsmutshots.com\r\nsnagglersmaggler.com\r\nsomethingtoforgetit.com\r\nsophiesplace.net\r\nsoursushi.com\r\nsouthernxstables.com\r\nspeed467.com\r\nspeedpal4you.com\r\nsporty.org.ru\r\nstopdriving.net\r\nstw.org.ru\r\nsufficientlife.com\r\nsussexboats.net\r\nswinger-party-free-dating-porn-sluts.com\r\nsydneyhay.com\r\nszmjht.com\r\nteninchtrout.com\r\nthebalancedfruits.com\r\ntheendofthesummit.com\r\nthiswillbeit.com\r\nthosethosethose.com\r\nticyclesofindia.com\r\ntits-gay-fagot-black-tits-bigtits-amateur.com\r\ntonius.com\r\ntoohsoft.com\r\ntoolvalley.com\r\ntooporno.net\r\ntoosexual.com\r\ntorngat.com\r\ntour.org.ru\r\ntowneluxury.com\r\ntrafficmogger.com\r\ntriacoach.net\r\ntrottinbob.com\r\ntttframes.com\r\ntvjukebox.net\r\nundercvr.com\r\nunfinished-desires.com\r\nunicornonero.com\r\nunionvillefire.com\r\nupsandowns.com\r\nupthehillanddown.com\r\nvallartavideo.com\r\nvietnamdatingservices.com\r\nvinegarlemonshots.com\r\nvizy.net.ru\r\nvnladiesdatingservices.com\r\nvomitandbusted.com\r\nwalkingthewalking.com\r\nwell-I-am-the-type-of-boy.com\r\nwhales.com.ru\r\nwhincer.net\r\nwhitpagesrippers.com\r\nwhois.sc\r\nwipperrippers.com\r\nwordfilebooklets.com\r\nworld-sexs.com\r\nxsay.com\r\nxxxchyangel.com\r\nxxxx:\r\nxxxzips.com\r\nyouarelostintransit.com\r\nyuppieslovestocks.com\r\nyuzhouhuagong.com\r\nzhaori-food.com\r\nzwiebelbacke.com");
INSERT INTO kayapo_nsnst_blockers VALUES("7", "filter", "0", "0", "0", "", "Abuse-Filter", "abuse_filter.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("8", "request", "0", "0", "0", "", "Abuse-Request", "abuse_request.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("9", "string", "0", "0", "0", "", "Abuse-String", "abuse_string.tpl", "0", "0", "");
INSERT INTO kayapo_nsnst_blockers VALUES("10", "admin", "0", "0", "0", "", "Abuse-Admin", "abuse_admin.tpl", "0", "0", "");


#
# Table structure for table 'kayapo_nsnst_config'
#

CREATE TABLE kayapo_nsnst_config (
  config_name varchar(255) NOT NULL default '',
  config_value longtext NOT NULL,
  PRIMARY KEY  (config_name)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_config'
#

INSERT INTO kayapo_nsnst_config VALUES("admin_contact", "webmaster@yoursite.com");
INSERT INTO kayapo_nsnst_config VALUES("block_perpage", "50");
INSERT INTO kayapo_nsnst_config VALUES("block_sort_column", "date");
INSERT INTO kayapo_nsnst_config VALUES("block_sort_direction", "desc");
INSERT INTO kayapo_nsnst_config VALUES("crypt_salt", "N$");
INSERT INTO kayapo_nsnst_config VALUES("display_link", "3");
INSERT INTO kayapo_nsnst_config VALUES("display_reason", "3");
INSERT INTO kayapo_nsnst_config VALUES("force_nukeurl", "0");
INSERT INTO kayapo_nsnst_config VALUES("help_switch", "1");
INSERT INTO kayapo_nsnst_config VALUES("htaccess_path", "");
INSERT INTO kayapo_nsnst_config VALUES("http_auth", "0");
INSERT INTO kayapo_nsnst_config VALUES("lookup_link", "http://dnsstuff.com/tools/whois.ch?cache=off&ip=");
INSERT INTO kayapo_nsnst_config VALUES("prevent_dos", "0");
INSERT INTO kayapo_nsnst_config VALUES("proxy_reason", "admin_proxy_reason.tpl");
INSERT INTO kayapo_nsnst_config VALUES("proxy_switch", "0");
INSERT INTO kayapo_nsnst_config VALUES("search_block_perpage", "50");
INSERT INTO kayapo_nsnst_config VALUES("search_block_sort_column", "date");
INSERT INTO kayapo_nsnst_config VALUES("search_block_sort_direction", "desc");
INSERT INTO kayapo_nsnst_config VALUES("search_track_perpage", "50");
INSERT INTO kayapo_nsnst_config VALUES("search_track_sort_column", "6");
INSERT INTO kayapo_nsnst_config VALUES("search_track_sort_direction", "desc");
INSERT INTO kayapo_nsnst_config VALUES("search_user_perpage", "50");
INSERT INTO kayapo_nsnst_config VALUES("search_user_sort_column", "username");
INSERT INTO kayapo_nsnst_config VALUES("search_user_sort_direction", "asc");
INSERT INTO kayapo_nsnst_config VALUES("self_expire", "0");
INSERT INTO kayapo_nsnst_config VALUES("site_reason", "admin_site_reason.tpl");
INSERT INTO kayapo_nsnst_config VALUES("site_switch", "0");
INSERT INTO kayapo_nsnst_config VALUES("staccess_path", "");
INSERT INTO kayapo_nsnst_config VALUES("track_active", "1");
INSERT INTO kayapo_nsnst_config VALUES("track_del", "1000");
INSERT INTO kayapo_nsnst_config VALUES("track_max", "10000");
INSERT INTO kayapo_nsnst_config VALUES("track_perpage", "50");
INSERT INTO kayapo_nsnst_config VALUES("track_sort_column", "6");
INSERT INTO kayapo_nsnst_config VALUES("track_sort_direction", "desc");
INSERT INTO kayapo_nsnst_config VALUES("version_number", "2.1.2");


#
# Table structure for table 'kayapo_nsnst_countries'
#

CREATE TABLE kayapo_nsnst_countries (
  c2c char(2) NOT NULL default '',
  country varchar(60) NOT NULL default '',
  KEY c2c (c2c)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_countries'
#

INSERT INTO kayapo_nsnst_countries VALUES("00", "Unknown");
INSERT INTO kayapo_nsnst_countries VALUES("01", "IANA Reserved");


#
# Table structure for table 'kayapo_nsnst_excluded_ranges'
#

CREATE TABLE kayapo_nsnst_excluded_ranges (
  ip_lo int(10) unsigned NOT NULL default '0',
  ip_hi int(10) unsigned NOT NULL default '0',
  date int(20) NOT NULL default '0',
  notes text NOT NULL,
  c2c char(2) NOT NULL default '00',
  KEY code (ip_lo,ip_hi,c2c)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_excluded_ranges'
#



#
# Table structure for table 'kayapo_nsnst_protected_ranges'
#

CREATE TABLE kayapo_nsnst_protected_ranges (
  ip_lo int(10) unsigned NOT NULL default '0',
  ip_hi int(10) unsigned NOT NULL default '0',
  date int(20) NOT NULL default '0',
  notes text NOT NULL,
  c2c char(2) NOT NULL default '00',
  KEY code (ip_lo,ip_hi,c2c)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_protected_ranges'
#



#
# Table structure for table 'kayapo_nsnst_reserved_ranges'
#

CREATE TABLE kayapo_nsnst_reserved_ranges (
  ip_lo int(10) unsigned NOT NULL default '0',
  ip_hi int(10) unsigned NOT NULL default '0',
  date int(20) NOT NULL default '0',
  c2c char(2) NOT NULL default '00',
  KEY code (ip_lo,ip_hi,c2c)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_reserved_ranges'
#

INSERT INTO kayapo_nsnst_reserved_ranges VALUES("0", "16777215", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("16777216", "33554431", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("33554432", "50331647", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("83886080", "100663295", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("117440512", "134217727", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("167772160", "184549375", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("234881024", "251658239", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("385875968", "402653183", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("452984832", "469762047", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("520093696", "536870911", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("603979776", "620756991", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("620756992", "637534207", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("687865856", "704643071", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("704643072", "721420287", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1224736768", "1241513983", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1241513984", "1258291199", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1258291200", "1275068415", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1275068416", "1291845631", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1291845632", "1308622847", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1308622848", "1325400063", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1325400064", "1342177279", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1493172224", "1509949439", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1509949440", "1526726655", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1526726656", "1543503871", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1543503872", "1560281087", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1560281088", "1577058303", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1577058304", "1593835519", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1593835520", "1610612735", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1610612736", "1627389951", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1627389952", "1644167167", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1644167168", "1660944383", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1660944384", "1677721599", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1677721600", "1694498815", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1694498816", "1711276031", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1711276032", "1728053247", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1728053248", "1744830463", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1744830464", "1761607679", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1761607680", "1778384895", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1778384896", "1795162111", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1795162112", "1811939327", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1811939328", "1828716543", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1828716544", "1845493759", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1845493760", "1862270975", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1862270976", "1879048191", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1879048192", "1895825407", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1895825408", "1912602623", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1912602624", "1929379839", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1929379840", "1946157055", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1946157056", "1962934271", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1962934272", "1979711487", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1979711488", "1996488703", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("1996488704", "2013265919", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2013265920", "2030043135", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2030043136", "2046820351", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2046820352", "2063597567", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2063597568", "2080374783", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2080374784", "2097151999", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2097152000", "2113929215", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2113929216", "2130706431", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2130706432", "2147483647", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2851995648", "2852061183", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2886729728", "2887778303", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2902458368", "2919235583", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2919235584", "2936012799", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2936012800", "2952790015", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2952790016", "2969567231", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2969567232", "2986344447", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("2986344448", "3003121663", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3003121664", "3019898879", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3019898880", "3036676095", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3036676096", "3053453311", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3053453312", "3070230527", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3070230528", "3087007743", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3087007744", "3103784959", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3103784960", "3120562175", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3120562176", "3137339391", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3137339392", "3154116607", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3170893824", "3187671039", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3187671040", "3204448255", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3221225472", "3221258239", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3232235520", "3232301055", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3305111552", "3321888767", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3741319168", "3758096383", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3758096384", "3774873599", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3774873600", "3791650815", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3791650816", "3808428031", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3808428032", "3825205247", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3825205248", "3841982463", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3841982464", "3858759679", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3858759680", "3875536895", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3875536896", "3892314111", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3892314112", "3909091327", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3909091328", "3925868543", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3925868544", "3942645759", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3942645760", "3959422975", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3959422976", "3976200191", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3976200192", "3992977407", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("3992977408", "4009754623", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4009754624", "4026531839", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4026531840", "4043309055", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4043309056", "4060086271", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4060086272", "4076863487", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4076863488", "4093640703", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4093640704", "4110417919", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4110417920", "4127195135", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4127195136", "4143972351", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4143972352", "4160749567", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4160749568", "4177526783", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4177526784", "4194303999", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4194304000", "4211081215", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4211081216", "4227858431", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4227858432", "4244635647", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4244635648", "4261412863", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4261412864", "4278190079", "1098424776", "01");
INSERT INTO kayapo_nsnst_reserved_ranges VALUES("4278190080", "4294967295", "1098424776", "01");


#
# Table structure for table 'kayapo_nsnst_tracked_ips'
#

CREATE TABLE kayapo_nsnst_tracked_ips (
  tid int(10) NOT NULL auto_increment,
  ip_addr varchar(15) NOT NULL default '',
  hostname varchar(100) NOT NULL default '',
  user_id int(11) NOT NULL default '1',
  username varchar(60) NOT NULL default '',
  user_agent text NOT NULL,
  date int(20) NOT NULL default '0',
  page text NOT NULL,
  x_forward_for varchar(32) NOT NULL default '',
  client_ip varchar(32) NOT NULL default '',
  remote_addr varchar(32) NOT NULL default '',
  remote_port varchar(11) NOT NULL default '',
  request_method varchar(10) NOT NULL default '',
  c2c char(2) NOT NULL default '00',
  PRIMARY KEY  (tid),
  KEY tid (tid),
  KEY maintracking (ip_addr,hostname)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_nsnst_tracked_ips'
#

INSERT INTO kayapo_nsnst_tracked_ips VALUES("1", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201620832", "/str/admin.php", "none", "none", "127.0.0.1", "1471", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("2", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201620866", "/str/admin.php", "none", "none", "127.0.0.1", "1484", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("3", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201620872", "/str/admin.php", "none", "none", "127.0.0.1", "1484", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("4", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621054", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1639", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("5", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621210", "/str/admin.php", "none", "none", "127.0.0.1", "1667", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("6", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621210", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1667", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("7", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621308", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1689", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("8", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621679", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1788", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("9", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621831", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1832", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("10", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621850", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1838", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("11", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621880", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1846", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("12", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621925", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1856", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("13", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201621972", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1866", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("14", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622011", "/str/index.php", "none", "none", "127.0.0.1", "1875", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("15", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622022", "/str/index.php", "none", "none", "127.0.0.1", "1877", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("16", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622048", "/str/admin.php", "none", "none", "127.0.0.1", "1889", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("17", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622050", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1889", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("18", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622060", "/str/admin.php", "none", "none", "127.0.0.1", "1889", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("19", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622061", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "1889", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("20", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622076", "/str/index.php", "none", "none", "127.0.0.1", "1909", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("21", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622193", "/str/index.php", "none", "none", "127.0.0.1", "1961", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("22", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622234", "/str/index.php", "none", "none", "127.0.0.1", "1997", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("23", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622291", "/str/index.php", "none", "none", "127.0.0.1", "2024", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("24", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622333", "/str/admin.php?op=editmsg&mid=1", "none", "none", "127.0.0.1", "2033", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("25", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622338", "/str/admin.php", "none", "none", "127.0.0.1", "2033", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("26", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622338", "/str/admin.php?op=messages", "none", "none", "127.0.0.1", "2037", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("27", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622342", "/str/admin.php?op=deletemsg&mid=1", "none", "none", "127.0.0.1", "2033", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("28", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622344", "/str/admin.php?op=deletemsg&mid=1&ok=1", "none", "none", "127.0.0.1", "2037", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("29", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622344", "/str/admin.php?op=messages", "none", "none", "127.0.0.1", "2033", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("30", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622370", "/str/index.php", "none", "none", "127.0.0.1", "2048", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("31", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622373", "/str/modules.php?name=News&file=article&sid=1", "none", "none", "127.0.0.1", "2048", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("32", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622377", "/str/admin.php?op=RemoveStory&sid=1", "none", "none", "127.0.0.1", "2048", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("33", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622379", "/str/admin.php?op=RemoveStory&sid=1&ok=1", "none", "none", "127.0.0.1", "2051", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("34", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622380", "/str/admin.php", "none", "none", "127.0.0.1", "2048", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("35", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622383", "/str/index.php", "none", "none", "127.0.0.1", "2051", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("36", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622390", "/str/admin.php", "none", "none", "127.0.0.1", "2048", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("37", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622455", "/str/index.php", "none", "none", "127.0.0.1", "2070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("38", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622493", "/str/admin.php", "none", "none", "127.0.0.1", "2078", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("39", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622497", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2078", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("40", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622499", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2078", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("41", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622504", "/str/admin.php?op=ChangeStatus&bid=2", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("42", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622504", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2078", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("43", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622517", "/str/admin.php?op=BlocksDelete&bid=4", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("44", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622520", "/str/admin.php?op=BlocksDelete&bid=4&ok=1", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("45", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622520", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("46", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622523", "/str/admin.php?op=BlocksDelete&bid=8", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("47", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622525", "/str/admin.php?op=BlocksDelete&bid=8&ok=1", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("48", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622525", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("49", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622539", "/str/admin.php?op=BlocksDelete&bid=3", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("50", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622542", "/str/admin.php?op=BlocksDelete&bid=3&ok=1", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("51", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622542", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("52", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622548", "/str/admin.php?op=BlocksDelete&bid=7", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("53", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622549", "/str/admin.php?op=BlocksDelete&bid=7&ok=1", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("54", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622550", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("55", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622580", "/str/admin.php?op=ChangeStatus&bid=5", "none", "none", "127.0.0.1", "2115", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("56", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622580", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2115", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("57", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622608", "/str/admin.php", "none", "none", "127.0.0.1", "2122", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("58", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622608", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2122", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("59", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622610", "/str/index.php", "none", "none", "127.0.0.1", "2122", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("60", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622626", "/str/admin.php?op=BlockOrder&weight=3&bidori=9&weightrep=2&bidrep=6", "none", "none", "127.0.0.1", "2130", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("61", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622626", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2130", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("62", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622629", "/str/index.php", "none", "none", "127.0.0.1", "2133", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("63", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622681", "/str/admin.php", "none", "none", "127.0.0.1", "2144", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("64", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622681", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2144", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("65", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622705", "/str/index.php", "none", "none", "127.0.0.1", "2151", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("66", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622822", "/str/index.php", "none", "none", "127.0.0.1", "2171", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("67", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622927", "/str/index.php", "none", "none", "127.0.0.1", "2190", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("68", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622952", "/str/index.php", "none", "none", "127.0.0.1", "2197", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("69", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622957", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "2199", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("70", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622965", "/str/modules.php?op=modload&name=Recherches&file=stats", "none", "none", "127.0.0.1", "2199", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("71", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622967", "/str/index.php", "none", "none", "127.0.0.1", "2197", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("72", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201622992", "/str/index.php", "none", "none", "127.0.0.1", "2208", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("73", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623006", "/str/index.php", "none", "none", "127.0.0.1", "2210", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("74", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623089", "/str/index.php", "none", "none", "127.0.0.1", "2227", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("75", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623460", "/str/index.php", "none", "none", "127.0.0.1", "2288", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("76", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623605", "/str/index.php", "none", "none", "127.0.0.1", "2315", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("77", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623615", "/str/index.php", "none", "none", "127.0.0.1", "2315", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("78", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623633", "/str/index.php", "none", "none", "127.0.0.1", "2324", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("79", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623694", "/str/index.php", "none", "none", "127.0.0.1", "2343", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("80", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623710", "/str/index.php", "none", "none", "127.0.0.1", "2349", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("81", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623715", "/str/index.php", "none", "none", "127.0.0.1", "2351", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("82", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623903", "/str/index.php", "none", "none", "127.0.0.1", "2401", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("83", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623939", "/str/index.php", "none", "none", "127.0.0.1", "2411", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("84", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623969", "/str/index.php", "none", "none", "127.0.0.1", "2418", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("85", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201623985", "/str/index.php", "none", "none", "127.0.0.1", "2422", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("86", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624052", "/str/index.php", "none", "none", "127.0.0.1", "2436", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("87", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624086", "/str/index.php", "none", "none", "127.0.0.1", "2445", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("88", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624096", "/str/index.php", "none", "none", "127.0.0.1", "2447", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("89", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624106", "/str/index.php", "none", "none", "127.0.0.1", "2445", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("90", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624301", "/str/index.php", "none", "none", "127.0.0.1", "2482", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("91", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624312", "/str/index.php", "none", "none", "127.0.0.1", "2482", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("92", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624346", "/str/index.php", "none", "none", "127.0.0.1", "2494", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("93", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624370", "/str/index.php", "none", "none", "127.0.0.1", "2501", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("94", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624421", "/str/index.php", "none", "none", "127.0.0.1", "2512", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("95", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624430", "/str/index.php", "none", "none", "127.0.0.1", "2512", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("96", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624441", "/str/index.php", "none", "none", "127.0.0.1", "2512", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("97", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624447", "/str/index.php", "none", "none", "127.0.0.1", "2514", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("98", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624448", "/str/index.php", "none", "none", "127.0.0.1", "2514", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("99", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624540", "/str/index.php", "none", "none", "127.0.0.1", "2549", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("100", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624584", "/str/index.php", "none", "none", "127.0.0.1", "2559", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("101", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624593", "/str/index.php", "none", "none", "127.0.0.1", "2561", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("102", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201624943", "/str/index.php", "none", "none", "127.0.0.1", "2630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("103", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201625182", "/str/index.php", "none", "none", "127.0.0.1", "2670", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("104", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201625194", "/str/index.php", "none", "none", "127.0.0.1", "2672", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("105", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201625231", "/str/index.php", "none", "none", "127.0.0.1", "2681", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("106", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201626015", "/str/index.php", "none", "none", "127.0.0.1", "2870", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("107", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201626052", "/str/index.php", "none", "none", "127.0.0.1", "2878", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("108", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201626323", "/str/index.php", "none", "none", "127.0.0.1", "2942", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("109", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201626339", "/str/index.php", "none", "none", "127.0.0.1", "2950", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("110", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201626371", "/str/index.php", "none", "none", "127.0.0.1", "2958", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("111", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628099", "/str/index.php", "none", "none", "127.0.0.1", "1365", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("112", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628253", "/str/index.php", "none", "none", "127.0.0.1", "1421", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("113", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628640", "/str/index.php", "none", "none", "127.0.0.1", "1536", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("114", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628666", "/str/index.php", "none", "none", "127.0.0.1", "1553", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("115", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628690", "/str/index.php", "none", "none", "127.0.0.1", "1564", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("116", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628706", "/str/index.php", "none", "none", "127.0.0.1", "1569", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("117", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628726", "/str/index.php", "none", "none", "127.0.0.1", "1576", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("118", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201628852", "/str/index.php", "none", "none", "127.0.0.1", "1610", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("119", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201629147", "/str/index.php", "none", "none", "127.0.0.1", "1701", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("120", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201629176", "/str/index.php", "none", "none", "127.0.0.1", "1708", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("121", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201629560", "/str/index.php", "none", "none", "127.0.0.1", "1777", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("122", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201629668", "/str/index.php", "none", "none", "127.0.0.1", "1822", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("123", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201629693", "/str/index.php", "none", "none", "127.0.0.1", "1829", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("124", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201629809", "/str/index.php", "none", "none", "127.0.0.1", "1848", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("125", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630267", "/str/index.php", "none", "none", "127.0.0.1", "1946", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("126", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630281", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "1946", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("127", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630286", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1946", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("128", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630289", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "1953", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("129", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630292", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "1953", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("130", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630296", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1953", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("131", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630444", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1983", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("132", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630498", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1993", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("133", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630510", "/str/index.php", "none", "none", "127.0.0.1", "1995", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("134", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201630847", "/str/index.php", "none", "none", "127.0.0.1", "2073", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("135", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201631136", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2171", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("136", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201631573", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2307", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("137", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632219", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2430", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("138", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632221", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2430", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("139", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632245", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2438", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("140", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632251", "/str/modules.php?name=Submit_Downloads", "none", "none", "127.0.0.1", "2438", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("141", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632861", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2664", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("142", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632873", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2666", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("143", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632902", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2673", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("144", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201632933", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2683", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("145", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633065", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2751", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("146", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633149", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2766", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("147", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633178", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2773", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("148", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633292", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2918", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("149", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633294", "/str/modules.php?name=Surveys&pollID=1", "none", "none", "127.0.0.1", "2918", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("150", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633297", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "2920", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("151", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633405", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "2942", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("152", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633407", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "2942", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("153", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633533", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "2963", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("154", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633541", "/str/index.php", "none", "none", "127.0.0.1", "2965", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("155", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633543", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "2963", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("156", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633544", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "2963", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("157", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633546", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "2972", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("158", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633546", "/str/modules.php?name=Journal", "none", "none", "127.0.0.1", "2965", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("159", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633716", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3032", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("160", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201633757", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3056", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("161", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634469", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3269", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("162", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634482", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3269", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("163", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634547", "/str/index.php", "none", "none", "127.0.0.1", "3293", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("164", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634718", "/str/index.php", "none", "none", "127.0.0.1", "3343", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("165", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634787", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3357", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("166", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634848", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3368", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("167", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634867", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3374", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("168", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634873", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3374", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("169", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634893", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3382", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("170", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634902", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3382", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("171", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634905", "/str/modules.php?name=Statistics&op=Stats", "none", "none", "127.0.0.1", "3382", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("172", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634912", "/str/modules.php?name=Statistics&op=MonthlyStats&year=2008&month=2", "none", "none", "127.0.0.1", "3384", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("173", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634945", "/str/modules.php?name=Statistics&op=MonthlyStats&year=2008&month=2", "none", "none", "127.0.0.1", "3396", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("174", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634952", "/str/modules.php?name=Statistics&op=MonthlyStats&year=2008&month=2", "none", "none", "127.0.0.1", "3396", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("175", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634955", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3398", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("176", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634958", "/str/modules.php?name=Statistics&op=Stats", "none", "none", "127.0.0.1", "3396", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("177", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634964", "/str/modules.php?name=Statistics&op=MonthlyStats&year=2008&month=2", "none", "none", "127.0.0.1", "3398", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("178", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634972", "/str/modules.php?name=Statistics&op=MonthlyStats&year=2008&month=2", "none", "none", "127.0.0.1", "3396", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("179", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634991", "/str/modules.php?name=Statistics&op=MonthlyStats&year=2008&month=2", "none", "none", "127.0.0.1", "3411", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("180", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634993", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3413", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("181", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201634997", "/str/index.php", "none", "none", "127.0.0.1", "3411", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("182", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635008", "/str/modules.php?name=Members_List", "none", "none", "127.0.0.1", "3413", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("183", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635013", "/str/index.php", "none", "none", "127.0.0.1", "3413", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("184", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635083", "/str/index.php", "none", "none", "127.0.0.1", "3435", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("185", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635177", "/str/index.php", "none", "none", "127.0.0.1", "3463", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("186", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635204", "/str/index.php", "none", "none", "127.0.0.1", "3487", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("187", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635309", "/str/index.php", "none", "none", "127.0.0.1", "3512", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("188", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635317", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3514", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("189", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635324", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3512", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("190", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635371", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3534", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("191", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635424", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3550", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("192", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635510", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3573", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("193", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635564", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3584", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("194", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635603", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3592", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("195", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635635", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3599", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("196", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635661", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3689", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("197", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635671", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3693", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("198", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635682", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3693", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("199", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635749", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "4213", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("200", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635762", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "4217", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("201", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201635786", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "4366", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("202", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687062", "/str/index.php", "none", "none", "127.0.0.1", "1071", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("203", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687501", "/str/index.php", "none", "none", "127.0.0.1", "2481", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("204", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687511", "/str/index.php", "none", "none", "127.0.0.1", "2481", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("205", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687518", "/str/index.php", "none", "none", "127.0.0.1", "2481", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("206", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687526", "/str/index.php", "none", "none", "127.0.0.1", "2483", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("207", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687540", "/str/index.php", "none", "none", "127.0.0.1", "2481", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("208", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687565", "/str/index.php", "none", "none", "127.0.0.1", "2500", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("209", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687582", "/str/index.php", "none", "none", "127.0.0.1", "2504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("210", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687591", "/str/index.php", "none", "none", "127.0.0.1", "2504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("211", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687597", "/str/index.php", "none", "none", "127.0.0.1", "2506", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("212", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687642", "/str/index.php", "none", "none", "127.0.0.1", "2521", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("213", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687666", "/str/index.php", "none", "none", "127.0.0.1", "2528", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("214", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687722", "/str/index.php", "none", "none", "127.0.0.1", "2547", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("215", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687737", "/str/index.php", "none", "none", "127.0.0.1", "2549", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("216", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687787", "/str/index.php", "none", "none", "127.0.0.1", "2564", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("217", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201687800", "/str/index.php", "none", "none", "127.0.0.1", "2566", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("218", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688036", "/str/index.php", "none", "none", "127.0.0.1", "2625", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("219", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688048", "/str/index.php", "none", "none", "127.0.0.1", "2627", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("220", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688073", "/str/index.php", "none", "none", "127.0.0.1", "2634", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("221", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688088", "/str/index.php", "none", "none", "127.0.0.1", "2636", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("222", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688113", "/str/index.php", "none", "none", "127.0.0.1", "2645", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("223", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688121", "/str/index.php", "none", "none", "127.0.0.1", "2647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("224", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688260", "/str/index.php", "none", "none", "127.0.0.1", "2677", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("225", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688272", "/str/index.php", "none", "none", "127.0.0.1", "2679", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("226", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688286", "/str/index.php", "none", "none", "127.0.0.1", "2677", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("227", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688296", "/str/index.php", "none", "none", "127.0.0.1", "2677", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("228", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688305", "/str/index.php", "none", "none", "127.0.0.1", "2677", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("229", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688394", "/str/index.php", "none", "none", "127.0.0.1", "2705", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("230", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688435", "/str/index.php", "none", "none", "127.0.0.1", "2715", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("231", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688455", "/str/index.php", "none", "none", "127.0.0.1", "2721", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("232", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688472", "/str/index.php", "none", "none", "127.0.0.1", "2725", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("233", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688477", "/str/index.php", "none", "none", "127.0.0.1", "2725", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("234", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201688653", "/str/index.php", "none", "none", "127.0.0.1", "2761", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("235", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201689715", "/str/index.php", "none", "none", "127.0.0.1", "3053", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("236", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201690692", "/str/index.php", "none", "none", "127.0.0.1", "3332", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("237", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201691248", "/str/index.php", "none", "none", "127.0.0.1", "3422", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("238", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201691402", "/str/index.php", "none", "none", "127.0.0.1", "3450", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("239", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201691499", "/str/index.php", "none", "none", "127.0.0.1", "3467", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("240", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201691979", "/str/index.php", "none", "none", "127.0.0.1", "3547", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("241", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692747", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3712", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("242", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692753", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3712", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("243", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692814", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3726", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("244", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692817", "/str/index.php", "none", "none", "127.0.0.1", "3726", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("245", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692863", "/str/index.php", "none", "none", "127.0.0.1", "3735", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("246", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692876", "/str/index.php", "none", "none", "127.0.0.1", "3735", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("247", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692891", "/str/index.php", "none", "none", "127.0.0.1", "3737", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("248", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692932", "/str/index.php", "none", "none", "127.0.0.1", "3752", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("249", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201692983", "/str/index.php", "none", "none", "127.0.0.1", "3766", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("250", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693276", "/str/index.php", "none", "none", "127.0.0.1", "3844", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("251", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693316", "/str/index.php", "none", "none", "127.0.0.1", "3852", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("252", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693332", "/str/index.php", "none", "none", "127.0.0.1", "3858", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("253", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693344", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("254", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693357", "/str/index.php", "none", "none", "127.0.0.1", "3858", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("255", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693368", "/str/index.php", "none", "none", "127.0.0.1", "3858", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("256", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693380", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("257", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693391", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("258", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693399", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("259", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693408", "/str/index.php", "none", "none", "127.0.0.1", "3858", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("260", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693417", "/str/index.php", "none", "none", "127.0.0.1", "3858", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("261", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693435", "/str/index.php", "none", "none", "127.0.0.1", "3886", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("262", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693443", "/str/index.php", "none", "none", "127.0.0.1", "3888", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("263", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693454", "/str/index.php", "none", "none", "127.0.0.1", "3886", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("264", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693463", "/str/index.php", "none", "none", "127.0.0.1", "3886", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("265", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693486", "/str/index.php", "none", "none", "127.0.0.1", "3900", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("266", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693502", "/str/index.php", "none", "none", "127.0.0.1", "3906", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("267", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693516", "/str/index.php", "none", "none", "127.0.0.1", "3908", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("268", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693531", "/str/index.php", "none", "none", "127.0.0.1", "3908", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("269", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693541", "/str/index.php", "none", "none", "127.0.0.1", "3908", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("270", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693558", "/str/index.php", "none", "none", "127.0.0.1", "3922", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("271", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693574", "/str/index.php", "none", "none", "127.0.0.1", "3925", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("272", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693587", "/str/index.php", "none", "none", "127.0.0.1", "3927", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("273", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693598", "/str/index.php", "none", "none", "127.0.0.1", "3925", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("274", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693617", "/str/index.php", "none", "none", "127.0.0.1", "3938", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("275", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693629", "/str/index.php", "none", "none", "127.0.0.1", "3940", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("276", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693647", "/str/index.php", "none", "none", "127.0.0.1", "3946", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("277", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693666", "/str/index.php", "none", "none", "127.0.0.1", "3953", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("278", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693683", "/str/index.php", "none", "none", "127.0.0.1", "3957", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("279", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693699", "/str/index.php", "none", "none", "127.0.0.1", "3963", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("280", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693718", "/str/index.php", "none", "none", "127.0.0.1", "3970", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("281", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693746", "/str/index.php", "none", "none", "127.0.0.1", "3977", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("282", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693790", "/str/index.php", "none", "none", "127.0.0.1", "3987", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("283", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693826", "/str/index.php", "none", "none", "127.0.0.1", "3995", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("284", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693867", "/str/index.php", "none", "none", "127.0.0.1", "4005", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("285", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201693888", "/str/index.php", "none", "none", "127.0.0.1", "4009", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("286", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694155", "/str/index.php", "none", "none", "127.0.0.1", "4158", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("287", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694176", "/str/index.php", "none", "none", "127.0.0.1", "4170", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("288", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694203", "/str/index.php", "none", "none", "127.0.0.1", "4177", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("289", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694504", "/str/index.php", "none", "none", "127.0.0.1", "4326", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("290", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694550", "/str/index.php", "none", "none", "127.0.0.1", "4334", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("291", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694558", "/str/index.php", "none", "none", "127.0.0.1", "4334", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("292", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694621", "/str/index.php", "none", "none", "127.0.0.1", "4351", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("293", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694622", "/str/index.php", "none", "none", "127.0.0.1", "4353", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("294", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694631", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4351", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("295", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694644", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "4351", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("296", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694929", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "4408", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("297", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201694990", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "4419", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("298", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695149", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "4446", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("299", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695150", "/str/index.php", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("300", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695162", "/str/admin.php", "none", "none", "127.0.0.1", "4446", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("301", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695175", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("302", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695181", "/str/admin.php?op=module_edit&mid=33", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("303", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695184", "/str/admin.php", "none", "none", "127.0.0.1", "4448", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("304", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695184", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("305", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695188", "/str/admin.php?op=module_status&mid=33&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("306", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695188", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("307", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695193", "/str/admin.php?op=module_status&mid=31&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("308", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695193", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("309", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695199", "/str/admin.php?op=module_status&mid=2&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("310", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695199", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("311", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695207", "/str/admin.php?op=module_status&mid=6&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("312", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695207", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("313", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695214", "/str/admin.php?op=module_status&mid=7&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("314", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695214", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("315", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695219", "/str/admin.php?op=module_status&mid=9&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("316", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695219", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("317", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695227", "/str/admin.php?op=module_edit&mid=35", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("318", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695230", "/str/admin.php", "none", "none", "127.0.0.1", "4448", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("319", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695230", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("320", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695236", "/str/admin.php?op=module_status&mid=35&active=1", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("321", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695237", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("322", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695246", "/str/index.php", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("323", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695250", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "4448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("324", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695273", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "4495", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("325", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695314", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "4504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("326", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695321", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "4504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("327", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695326", "/str/modules.php?name=AvantGo", "none", "none", "127.0.0.1", "4504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("328", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695337", "/str/index.php", "none", "none", "127.0.0.1", "4504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("329", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695350", "/str/index.php", "none", "none", "127.0.0.1", "4504", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("330", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695399", "/str/index.php", "none", "none", "127.0.0.1", "4529", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("331", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695419", "/str/index.php", "none", "none", "127.0.0.1", "4533", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("332", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695528", "/str/index.php", "none", "none", "127.0.0.1", "4557", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("333", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695560", "/str/index.php", "none", "none", "127.0.0.1", "4565", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("334", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695573", "/str/index.php", "none", "none", "127.0.0.1", "4567", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("335", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695574", "/str/index.php", "none", "none", "127.0.0.1", "4567", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("336", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695580", "/str/index.php", "none", "none", "127.0.0.1", "4567", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("337", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695595", "/str/index.php", "none", "none", "127.0.0.1", "4575", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("338", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695625", "/str/admin.php", "none", "none", "127.0.0.1", "4582", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("339", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695627", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4582", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("340", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695659", "/str/admin.php", "none", "none", "127.0.0.1", "4593", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("341", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695660", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4593", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("342", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695754", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4609", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("343", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695760", "/str/admin.php", "none", "none", "127.0.0.1", "4609", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("344", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695760", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4611", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("345", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695797", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4622", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("346", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695804", "/str/admin.php", "none", "none", "127.0.0.1", "4622", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("347", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695804", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4622", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("348", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695837", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("349", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695872", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4641", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("350", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695879", "/str/admin.php", "none", "none", "127.0.0.1", "4641", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("351", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695879", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4641", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("352", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695910", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("353", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695915", "/str/admin.php", "none", "none", "127.0.0.1", "4649", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("354", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695915", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("355", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695926", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("356", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695937", "/str/admin.php", "none", "none", "127.0.0.1", "4649", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("357", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695937", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("358", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695941", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("359", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695947", "/str/admin.php", "none", "none", "127.0.0.1", "4649", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("360", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695948", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("361", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695952", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("362", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695957", "/str/admin.php", "none", "none", "127.0.0.1", "4649", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("363", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695957", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4649", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("364", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695973", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4671", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("365", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695978", "/str/admin.php", "none", "none", "127.0.0.1", "4671", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("366", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201695978", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4671", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("367", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696174", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4709", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("368", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696363", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4740", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("369", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696394", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4748", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("370", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696496", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4782", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("371", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696515", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4788", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("372", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696657", "/str/admin.php", "none", "none", "127.0.0.1", "4814", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("373", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696657", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4814", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("374", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696777", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4838", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("375", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696780", "/str/admin.php", "none", "none", "127.0.0.1", "4838", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("376", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201696781", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4838", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("377", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697139", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4905", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("378", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697143", "/str/admin.php", "none", "none", "127.0.0.1", "4905", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("379", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697143", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4905", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("380", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697249", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4930", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("381", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697623", "/str/admin.php", "none", "none", "127.0.0.1", "1072", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("382", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697624", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1072", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("383", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697714", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1091", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("384", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697718", "/str/admin.php", "none", "none", "127.0.0.1", "1091", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("385", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697718", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1091", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("386", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697852", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1116", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("387", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697855", "/str/admin.php", "none", "none", "127.0.0.1", "1116", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("388", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201697855", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1116", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("389", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698083", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1174", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("390", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698087", "/str/admin.php", "none", "none", "127.0.0.1", "1174", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("391", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698088", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1174", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("392", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698138", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1186", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("393", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698141", "/str/admin.php", "none", "none", "127.0.0.1", "1186", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("394", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698141", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1186", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("395", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698170", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("396", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698174", "/str/admin.php", "none", "none", "127.0.0.1", "1195", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("397", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698174", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("398", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698248", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1211", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("399", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698252", "/str/admin.php", "none", "none", "127.0.0.1", "1211", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("400", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698252", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1211", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("401", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698294", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1222", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("402", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698297", "/str/admin.php", "none", "none", "127.0.0.1", "1222", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("403", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698297", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1222", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("404", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698334", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1231", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("405", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698339", "/str/admin.php", "none", "none", "127.0.0.1", "1231", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("406", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698340", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1231", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("407", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698416", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1250", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("408", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698419", "/str/admin.php", "none", "none", "127.0.0.1", "1250", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("409", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698419", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1250", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("410", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698432", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1250", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("411", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698435", "/str/admin.php", "none", "none", "127.0.0.1", "1250", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("412", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698435", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1250", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("413", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698528", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1276", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("414", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698531", "/str/admin.php", "none", "none", "127.0.0.1", "1276", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("415", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698531", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1276", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("416", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698602", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1289", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("417", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698605", "/str/admin.php", "none", "none", "127.0.0.1", "1289", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("418", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698605", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1289", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("419", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698709", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1311", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("420", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698712", "/str/admin.php", "none", "none", "127.0.0.1", "1311", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("421", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698713", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1311", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("422", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698771", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1325", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("423", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698774", "/str/admin.php", "none", "none", "127.0.0.1", "1325", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("424", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698774", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1325", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("425", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698808", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1333", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("426", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698811", "/str/admin.php", "none", "none", "127.0.0.1", "1333", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("427", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698811", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1333", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("428", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698845", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1344", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("429", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698848", "/str/admin.php", "none", "none", "127.0.0.1", "1344", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("430", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698848", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1344", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("431", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698901", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1357", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("432", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698904", "/str/admin.php", "none", "none", "127.0.0.1", "1357", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("433", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698904", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1357", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("434", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698937", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1365", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("435", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698941", "/str/admin.php", "none", "none", "127.0.0.1", "1365", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("436", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698941", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1365", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("437", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698988", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1379", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("438", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698992", "/str/admin.php", "none", "none", "127.0.0.1", "1379", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("439", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201698992", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1379", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("440", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699037", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1391", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("441", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699041", "/str/admin.php", "none", "none", "127.0.0.1", "1391", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("442", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699041", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1391", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("443", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699077", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1402", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("444", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699080", "/str/admin.php", "none", "none", "127.0.0.1", "1402", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("445", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699080", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1402", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("446", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699140", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1415", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("447", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699143", "/str/admin.php", "none", "none", "127.0.0.1", "1415", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("448", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699143", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1415", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("449", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699150", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1415", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("450", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699209", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1432", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("451", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699213", "/str/admin.php", "none", "none", "127.0.0.1", "1432", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("452", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699213", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1432", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("453", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699269", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("454", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699273", "/str/admin.php", "none", "none", "127.0.0.1", "1448", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("455", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699273", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("456", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699286", "/str/admin.php?op=BlockOrder&weight=4&bidori=11&weightrep=3&bidrep=10", "none", "none", "127.0.0.1", "1448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("457", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699286", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("458", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699289", "/str/admin.php?op=BlockOrder&weight=3&bidori=11&weightrep=2&bidrep=1", "none", "none", "127.0.0.1", "1448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("459", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699289", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("460", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699338", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1465", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("461", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699342", "/str/admin.php", "none", "none", "127.0.0.1", "1465", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("462", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699342", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1465", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("463", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699684", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1524", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("464", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699688", "/str/admin.php", "none", "none", "127.0.0.1", "1524", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("465", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699688", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1524", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("466", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699750", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1537", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("467", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699753", "/str/admin.php", "none", "none", "127.0.0.1", "1537", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("468", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699754", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1537", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("469", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699774", "/str/index.php", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("470", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699788", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("471", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699792", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("472", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699795", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "1551", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("473", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699798", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("474", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699800", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "1551", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("475", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699806", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1551", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("476", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699811", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("477", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699815", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "1551", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("478", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699819", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("479", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699824", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1551", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("480", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699827", "/str/index.php", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("481", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699835", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1551", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("482", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699838", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "1545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("483", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201699944", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "1588", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("484", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700029", "/str/admin.php", "none", "none", "127.0.0.1", "1607", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("485", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700033", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1607", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("486", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700035", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1609", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("487", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700039", "/str/admin.php", "none", "none", "127.0.0.1", "1607", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("488", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700039", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1609", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("489", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700041", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "1607", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("490", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700084", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "1625", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("491", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700170", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1643", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("492", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700173", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1643", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("493", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700176", "/str/admin.php", "none", "none", "127.0.0.1", "1643", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("494", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700176", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1643", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("495", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700186", "/str/index.php", "none", "none", "127.0.0.1", "1643", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("496", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700188", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "1643", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("497", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700189", "/str/modules.php?name=Your_Account&redirect=privmsg&folder=inbox", "none", "none", "127.0.0.1", "1643", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("498", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700208", "/str/admin.php", "none", "none", "127.0.0.1", "1658", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("499", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700210", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1658", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("500", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700216", "/str/admin.php?op=ChangeStatus&bid=1", "none", "none", "127.0.0.1", "1658", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("501", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700216", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1658", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("502", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700219", "/str/index.php", "none", "none", "127.0.0.1", "1658", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("503", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700309", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "1681", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("504", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700316", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "1681", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("505", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700322", "/str/index.php", "none", "none", "127.0.0.1", "1681", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("506", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700462", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1709", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("507", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700465", "/str/admin.php?op=BlocksEdit&bid=10", "none", "none", "127.0.0.1", "1709", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("508", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700469", "/str/admin.php", "none", "none", "127.0.0.1", "1709", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("509", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700470", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1709", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("510", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201700474", "/str/index.php", "none", "none", "127.0.0.1", "1709", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("511", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201706795", "/str/index.php", "none", "none", "127.0.0.1", "1148", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("512", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201707082", "/str/index.php", "none", "none", "127.0.0.1", "2497", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("513", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201707421", "/str/index.php", "none", "none", "127.0.0.1", "2644", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("514", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201707435", "/str/index.php", "none", "none", "127.0.0.1", "2646", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("515", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201707609", "/str/index.php", "none", "none", "127.0.0.1", "2678", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("516", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201707655", "/str/index.php", "none", "none", "127.0.0.1", "2697", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("517", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708718", "/str/index.php", "none", "none", "127.0.0.1", "2954", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("518", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708762", "/str/index.php", "none", "none", "127.0.0.1", "2967", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("519", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708859", "/str/modules.php?name=Calendar&op=modload&file=index&Date=01/3/2008&type=day", "none", "none", "127.0.0.1", "2988", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("520", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708868", "/str/index.php", "none", "none", "127.0.0.1", "2988", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("521", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708871", "/str/modules.php?name=Calendar&op=modload&file=index&Date=01/16/2008&type=day", "none", "none", "127.0.0.1", "2990", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("522", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708873", "/str/index.php", "none", "none", "127.0.0.1", "2988", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("523", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201708974", "/str/index.php", "none", "none", "127.0.0.1", "3012", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("524", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709006", "/str/index.php", "none", "none", "127.0.0.1", "3021", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("525", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709035", "/str/index.php", "none", "none", "127.0.0.1", "3030", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("526", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709047", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3030", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("527", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709048", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "3032", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("528", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709081", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "3040", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("529", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709091", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "3040", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("530", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709098", "/str/modules.php?name=Your_Account&op=logout", "none", "none", "127.0.0.1", "3044", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("531", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709100", "/str/index.php", "none", "none", "127.0.0.1", "3040", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("532", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709150", "/str/index.php", "none", "none", "127.0.0.1", "3058", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("533", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709156", "/str/index.php", "none", "none", "127.0.0.1", "3058", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("534", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709171", "/str/index.php", "none", "none", "127.0.0.1", "3058", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("535", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709191", "/str/index.php", "none", "none", "127.0.0.1", "3070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("536", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709204", "/str/index.php", "none", "none", "127.0.0.1", "3070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("537", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709212", "/str/index.php", "none", "none", "127.0.0.1", "3072", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("538", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709220", "/str/index.php", "none", "none", "127.0.0.1", "3070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("539", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709238", "/str/index.php", "none", "none", "127.0.0.1", "3084", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("540", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709250", "/str/modules.php?name=Your_Account&op=new_user", "none", "none", "127.0.0.1", "3086", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("541", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709257", "/str/admin.php", "none", "none", "127.0.0.1", "3086", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("542", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709259", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "3091", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("543", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709289", "/str/admin.php?op=NSNGroups", "none", "none", "127.0.0.1", "3097", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("544", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709967", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "3513", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("545", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201709984", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "3520", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("546", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710015", "/str/modules.php?name=Your_Account&file=admin", "none", "none", "127.0.0.1", "3527", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("547", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710016", "/str/modules.php?name=Your_Account&file=admin&op=UsersConfig", "none", "none", "127.0.0.1", "3527", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("548", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710048", "/str/modules.php?name=Your_Account&file=admin", "none", "none", "127.0.0.1", "3534", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("549", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710076", "/str/index.php", "none", "none", "127.0.0.1", "3541", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("550", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710195", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3563", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("551", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710196", "/str/modules.php?name=Search", "none", "none", "127.0.0.1", "3563", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("552", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710199", "/str/index.php", "none", "none", "127.0.0.1", "3563", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("553", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710315", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "3587", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("554", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710332", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3592", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("555", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710505", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("556", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710600", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("557", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710614", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("558", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710633", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3657", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("559", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710704", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3676", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("560", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710729", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3683", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("561", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710740", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3685", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("562", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201710851", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3709", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("563", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711203", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3771", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("564", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711221", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3778", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("565", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711239", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3784", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("566", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711267", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3793", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("567", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711420", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "3829", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("568", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711502", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "3844", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("569", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711516", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "3844", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("570", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711518", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "3844", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("571", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711523", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "3844", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("572", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711597", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "3866", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("573", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711670", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "3888", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("574", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711672", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3890", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("575", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711673", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3888", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("576", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711779", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3909", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("577", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711831", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3920", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("578", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711883", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3932", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("579", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711888", "/str/modules.php?op=modload&name=Recherches&file=stats", "none", "none", "127.0.0.1", "3934", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("580", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711904", "/str/modules.php?op=modload&name=Recherches&file=stats", "none", "none", "127.0.0.1", "3940", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("581", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711906", "/str/modules.php?op=modload&name=Recherches&file=stats", "none", "none", "127.0.0.1", "3940", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("582", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711922", "/str/modules.php?op=modload&name=Recherches&file=stats", "none", "none", "127.0.0.1", "3948", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("583", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201711973", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3963", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("584", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712094", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3984", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("585", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712121", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3991", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("586", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712137", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3993", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("587", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712144", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3993", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("588", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712164", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4004", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("589", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712183", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4010", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("590", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712189", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4010", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("591", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712336", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4037", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("592", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712371", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4045", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("593", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712419", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4055", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("594", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712437", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4059", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("595", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712453", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4059", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("596", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712505", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4074", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("597", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712521", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4076", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("598", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712530", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4076", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("599", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712538", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4076", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("600", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712548", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4085", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("601", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712646", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4106", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("602", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712654", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4106", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("603", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712874", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4166", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("604", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712922", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4177", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("605", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712932", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4177", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("606", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712939", "/str/index.php", "none", "none", "127.0.0.1", "4179", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("607", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712941", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "4177", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("608", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712943", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4179", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("609", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201712980", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4192", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("610", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713005", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4199", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("611", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713007", "/str/modules.php?query=s", "none", "none", "127.0.0.1", "4199", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("612", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713011", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4201", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("613", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713012", "/str/modules.php?query=", "none", "none", "127.0.0.1", "4199", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("614", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713087", "/str/index.php", "none", "none", "127.0.0.1", "4217", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("615", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713088", "/str/index.php", "none", "none", "127.0.0.1", "4217", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("616", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713092", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4220", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("617", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713128", "/str/index.php", "none", "none", "127.0.0.1", "4229", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("618", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713130", "/str/index.php", "none", "none", "127.0.0.1", "4229", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("619", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713132", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4232", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("620", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713135", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4229", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("621", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713181", "/str/index.php", "none", "none", "127.0.0.1", "4243", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("622", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713183", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4243", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("623", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713194", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "4245", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("624", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713196", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4243", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("625", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713205", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "4245", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("626", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713257", "/str/index.php", "none", "none", "127.0.0.1", "4262", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("627", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713258", "/str/index.php", "none", "none", "127.0.0.1", "4262", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("628", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713260", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4262", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("629", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713263", "/str/modules.php?query=a", "none", "none", "127.0.0.1", "4265", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("630", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713327", "/str/index.php", "none", "none", "127.0.0.1", "4277", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("631", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713340", "/str/index.php", "none", "none", "127.0.0.1", "4277", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("632", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713383", "/str/admin.php", "none", "none", "127.0.0.1", "4294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("633", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713386", "/str/admin.php?op=BlocksDelete&bid=3", "none", "none", "127.0.0.1", "4294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("634", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713389", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("635", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713407", "/str/admin.php", "none", "none", "127.0.0.1", "4301", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("636", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713407", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("637", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713411", "/str/modules.php?name=Search", "none", "none", "127.0.0.1", "4301", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("638", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713419", "/str/admin.php", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("639", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713425", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("640", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713429", "/str/admin.php?op=BlocksDelete&bid=12", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("641", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713432", "/str/admin.php?op=BlocksDelete&bid=12&ok=1", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("642", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713432", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("643", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713435", "/str/index.php", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("644", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713439", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("645", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713441", "/str/modules.php?name=Search", "none", "none", "127.0.0.1", "4301", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("646", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713444", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("647", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713447", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("648", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713449", "/str/modules.php?name=Search", "none", "none", "127.0.0.1", "4301", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("649", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713451", "/str/modules.php?name=Search", "none", "none", "127.0.0.1", "4301", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("650", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713454", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "4301", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("651", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713503", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("652", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713509", "/str/index.php", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("653", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713511", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "4337", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("654", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713513", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("655", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713515", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "4337", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("656", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713516", "/str/modules.php?name=Your_Account&redirect=privmsg&folder=inbox", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("657", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713521", "/str/modules.php?name=Your_Account&op=pass_lost", "none", "none", "127.0.0.1", "4337", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("658", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713529", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("659", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713533", "/str/modules.php?op=modload&name=My_eGallery&file=index&do=showgall&gid=2", "none", "none", "127.0.0.1", "4337", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("660", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713541", "/str/admin.php", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("661", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713542", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "4337", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("662", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713547", "/str/admin.php?op=GallAdmin&do=editallcategories", "none", "none", "127.0.0.1", "4335", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("663", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713573", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "4360", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("664", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713575", "/str/admin.php?op=GallAdmin&do=editallcategories", "none", "none", "127.0.0.1", "4362", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("665", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713612", "/str/admin.php?op=GallAdmin&do=editallcategories", "none", "none", "127.0.0.1", "4368", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("666", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713627", "/str/admin.php?op=GallAdmin&do=editmedia", "none", "none", "127.0.0.1", "4370", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("667", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713892", "/str/index.php", "none", "none", "127.0.0.1", "1084", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("668", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713909", "/str/index.php", "none", "none", "127.0.0.1", "1090", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("669", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201713954", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1117", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("670", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714001", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("671", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714004", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("672", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714005", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "1129", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("673", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714009", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "1129", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("674", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714014", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("675", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714016", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("676", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714018", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("677", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714020", "/str/modules.php?name=Your_Account&redirect=privmsg&folder=inbox", "none", "none", "127.0.0.1", "1129", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("678", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714023", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("679", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714026", "/str/modules.php?op=modload&name=My_eGallery&file=index&do=showgall&gid=2", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("680", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714033", "/str/admin.php", "none", "none", "127.0.0.1", "1129", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("681", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714036", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("682", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714038", "/str/admin.php?op=GallAdmin&do=editmedia", "none", "none", "127.0.0.1", "1129", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("683", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714047", "/str/admin.php?op=GallAdmin&do=Configure", "none", "none", "127.0.0.1", "1127", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("684", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714047", "/str/modules.php?op=modload&name=My_eGallery&file=gd", "none", "none", "127.0.0.1", "1129", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("685", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714088", "/str/admin.php", "none", "none", "127.0.0.1", "1157", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("686", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714095", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1157", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("687", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714141", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "1172", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("688", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714145", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "1172", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("689", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714149", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "1172", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("690", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714151", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "1175", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("691", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714191", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1186", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("692", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714194", "/str/admin.php?op=Topics", "none", "none", "127.0.0.1", "1186", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("693", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714199", "/str/admin.php?op=AdminTopics", "none", "none", "127.0.0.1", "1188", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("694", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714225", "/str/admin.php", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("695", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714234", "/str/admin.php?op=CalendarAdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("696", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714240", "/str/admin.php?op=TopicAdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("697", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714243", "/str/admin.php?op=TopicAsdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("698", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714245", "/str/admin.php?op=Topicssdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("699", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714250", "/str/admin.php?op=TopicsAdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("700", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714253", "/str/admin.php?op=topicsAdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("701", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714256", "/str/admin.php?op=topicsadmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("702", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714259", "/str/admin.php", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("703", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714269", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1195", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("704", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714299", "/str/admin.php", "none", "none", "127.0.0.1", "1229", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("705", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714325", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "1236", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("706", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714327", "/str/modules.php?name=News&new_topic=1", "none", "none", "127.0.0.1", "1236", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("707", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714330", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "1236", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("708", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714332", "/str/modules.php?name=News&new_topic=1", "none", "none", "127.0.0.1", "1236", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("709", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714346", "/str/admin.php?op=topics", "none", "none", "127.0.0.1", "1236", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("710", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714408", "/str/admin.php?op=topicsmanager", "none", "none", "127.0.0.1", "1254", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("711", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714415", "/str/admin.php?op=topicedit&topicid=1", "none", "none", "127.0.0.1", "1254", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("712", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714417", "/str/admin.php?op=topicdelete&topicid=1", "none", "none", "127.0.0.1", "1254", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("713", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714420", "/str/admin.php?op=topicdelete&topicid=1&ok=1", "none", "none", "127.0.0.1", "1254", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("714", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714420", "/str/admin.php?op=topicsmanager", "none", "none", "127.0.0.1", "1254", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("715", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714881", "/str/admin.php?op=topicsmanager", "none", "none", "127.0.0.1", "1396", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("716", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714968", "/str/admin.php", "none", "none", "127.0.0.1", "1423", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("717", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714968", "/str/admin.php?op=topicsmanager", "none", "none", "127.0.0.1", "1423", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("718", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714981", "/str/admin.php", "none", "none", "127.0.0.1", "1423", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("719", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714981", "/str/admin.php?op=topicsmanager", "none", "none", "127.0.0.1", "1423", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("720", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201714992", "/str/index.php", "none", "none", "127.0.0.1", "1423", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("721", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715017", "/str/admin.php", "none", "none", "127.0.0.1", "1437", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("722", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715018", "/str/admin.php?op=mod_authors", "none", "none", "127.0.0.1", "1437", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("723", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715082", "/str/admin.php", "none", "none", "127.0.0.1", "1451", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("724", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715082", "/str/admin.php?op=mod_authors", "none", "none", "127.0.0.1", "1451", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("725", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715083", "/str/admin.php?op=logout", "none", "none", "127.0.0.1", "1451", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("726", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715087", "/str/admin.php", "none", "none", "127.0.0.1", "1451", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("727", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715092", "/str/admin.php", "none", "none", "127.0.0.1", "1456", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("728", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715113", "/str/admin.php?op=FCKadminStory", "none", "none", "127.0.0.1", "1462", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("729", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715883", "/str/admin.php", "none", "none", "127.0.0.1", "1783", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("730", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715883", "/str/admin.php?op=adminMain", "none", "none", "127.0.0.1", "1783", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("731", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715948", "/str/index.php", "none", "none", "127.0.0.1", "1798", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("732", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715980", "/str/modules.php?name=News&file=article&sid=2", "none", "none", "127.0.0.1", "1805", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("733", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201715988", "/str/index.php", "none", "none", "127.0.0.1", "1805", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("734", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716077", "/str/index.php", "none", "none", "127.0.0.1", "1827", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("735", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716127", "/str/modules.php?name=News&file=article&sid=2", "none", "none", "127.0.0.1", "1839", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("736", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716134", "/str/index.php", "none", "none", "127.0.0.1", "1839", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("737", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716177", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("738", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716179", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("739", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716181", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("740", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716185", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("741", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716189", "/str/modules.php?name=Statistics", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("742", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716192", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("743", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716194", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("744", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716194", "/str/modules.php?name=Your_Account&redirect=privmsg&folder=inbox", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("745", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716197", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("746", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716199", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("747", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716203", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("748", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716206", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("749", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716207", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("750", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716209", "/str/index.php", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("751", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716213", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1851", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("752", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716501", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1917", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("753", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716581", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1943", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("754", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716589", "/str/index.php", "none", "none", "127.0.0.1", "1943", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("755", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716794", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1995", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("756", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716794", "/str/modules.php?name=Your_Account&stop=1", "none", "none", "127.0.0.1", "1995", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("757", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716800", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1995", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("758", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716800", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "1995", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("759", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201716803", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2000", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("760", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717134", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2068", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("761", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717146", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2068", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("762", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717156", "/str/modules.php?name=Forums&file=profile&mode=editprofile&sid=e4abe6e5e5c4d5fdc5c2e08ea8c2434e", "none", "none", "127.0.0.1", "2070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("763", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717165", "/str/modules.php?name=Private_Messages&file=index&folder=inbox&sid=e4abe6e5e5c4d5fdc5c2e08ea8c2434e", "none", "none", "127.0.0.1", "2070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("764", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717177", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("765", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717181", "/str/modules.php?name=Forums&file=search&sid=0a31b0714e25f4f1225b89df93fe6d96", "none", "none", "127.0.0.1", "2070", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("766", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717200", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2089", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("767", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717218", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2092", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("768", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717240", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2099", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("769", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717325", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2118", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("770", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717423", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("771", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717474", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2147", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("772", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717534", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2166", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("773", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717801", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2255", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("774", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717819", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2259", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("775", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717843", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2266", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("776", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717864", "/str/modules.php?name=Private_Messages", "none", "none", "127.0.0.1", "2273", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("777", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717867", "/str/modules.php?name=Private_Messages&file=index&folder=inbox&sid=9ad43f0cd118a1805ed7c7999bf5d95e", "none", "none", "127.0.0.1", "2275", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("778", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717869", "/str/modules.php?name=Forums&file=profile&mode=editprofile&sid=9ad43f0cd118a1805ed7c7999bf5d95e", "none", "none", "127.0.0.1", "2273", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("779", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717871", "/str/modules.php?name=Private_Messages&file=index&folder=inbox&sid=9ad43f0cd118a1805ed7c7999bf5d95e", "none", "none", "127.0.0.1", "2273", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("780", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717906", "/str/modules.php?name=Private_Messages&file=index&folder=inbox&sid=9ad43f0cd118a1805ed7c7999bf5d95e", "none", "none", "127.0.0.1", "2286", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("781", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717943", "/str/modules.php?name=Private_Messages&file=index&mode=post&sid=9ad43f0cd118a1805ed7c7999bf5d95e", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("782", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717951", "/str/index.php", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("783", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717960", "/str/modules.php?name=Your_Account&op=userinfo&username=Mandry", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("784", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717975", "/str/modules.php?name=Journal&file=edit", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("785", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717984", "/str/admin.php", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("786", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717986", "/str/admin.php?op=logout", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("787", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717989", "/str/admin.php", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("788", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717994", "/str/admin.php", "none", "none", "127.0.0.1", "2294", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("789", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717996", "/str/admin.php?op=Configure", "none", "none", "127.0.0.1", "2312", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("790", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201717997", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("791", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718001", "/str/admin.php?op=module_status&mid=8&active=0", "none", "none", "127.0.0.1", "2312", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("792", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718001", "/str/admin.php?op=modules", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("793", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718004", "/str/index.php", "none", "none", "127.0.0.1", "2312", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("794", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718007", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "2294", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("795", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718008", "/str/modules.php?name=Your_Account&op=userinfo&username=Mandry", "none", "none", "127.0.0.1", "2312", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("796", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718074", "/str/modules.php?name=Your_Account&op=userinfo&username=Mandry", "none", "none", "127.0.0.1", "2333", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("797", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718123", "/str/modules.php?name=Your_Account&op=userinfo&username=Mandry", "none", "none", "127.0.0.1", "2344", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("798", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718127", "/str/index.php", "none", "none", "127.0.0.1", "2346", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("799", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718269", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "2384", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("800", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718269", "/str/modules.php?name=Your_Account&op=userinfo&username=Mandry", "none", "none", "127.0.0.1", "2384", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("801", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718270", "/str/modules.php?name=Your_Account&op=logout", "none", "none", "127.0.0.1", "2384", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("802", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718272", "/str/index.php", "none", "none", "127.0.0.1", "2384", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("803", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718377", "/str/index.php", "none", "none", "127.0.0.1", "2417", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("804", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718395", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "2423", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("805", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718395", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2423", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("806", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718486", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2445", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("807", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718502", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2448", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("808", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718518", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2459", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("809", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718532", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2459", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("810", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718546", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2461", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("811", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718731", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2510", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("812", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718778", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2521", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("813", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718821", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("814", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718867", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2539", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("815", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718902", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2548", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("816", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718937", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2557", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("817", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718964", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2564", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("818", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201718973", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2564", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("819", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719069", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2584", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("820", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719079", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "2586", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("821", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719087", "/str/modules.php?name=Your_Account&op=logout", "none", "none", "127.0.0.1", "2586", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("822", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719089", "/str/index.php", "none", "none", "127.0.0.1", "2584", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("823", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719117", "/str/index.php", "none", "none", "127.0.0.1", "2599", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("824", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719136", "/str/index.php", "none", "none", "127.0.0.1", "2603", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("825", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719152", "/str/index.php", "none", "none", "127.0.0.1", "2611", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("826", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719162", "/str/index.php", "none", "none", "127.0.0.1", "2611", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("827", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719173", "/str/index.php", "none", "none", "127.0.0.1", "2613", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("828", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719183", "/str/index.php", "none", "none", "127.0.0.1", "2613", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("829", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719194", "/str/index.php", "none", "none", "127.0.0.1", "2613", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("830", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719199", "/str/index.php", "none", "none", "127.0.0.1", "2613", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("831", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719207", "/str/index.php", "none", "none", "127.0.0.1", "2630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("832", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719213", "/str/index.php", "none", "none", "127.0.0.1", "2630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("833", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719219", "/str/index.php", "none", "none", "127.0.0.1", "2630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("834", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719242", "/str/index.php", "none", "none", "127.0.0.1", "2640", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("835", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719252", "/str/index.php", "none", "none", "127.0.0.1", "2642", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("836", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719287", "/str/index.php", "none", "none", "127.0.0.1", "2653", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("837", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719320", "/str/index.php", "none", "none", "127.0.0.1", "2680", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("838", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719514", "/str/modules.php?name=Your_Account&op=new_user", "none", "none", "127.0.0.1", "2728", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("839", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719584", "/str/index.php", "none", "none", "127.0.0.1", "2742", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("840", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719653", "/str/index.php", "none", "none", "127.0.0.1", "2768", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("841", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719658", "/str/admin.php", "none", "none", "127.0.0.1", "2768", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("842", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719660", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2768", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("843", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719664", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "2768", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("844", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719698", "/str/index.php", "none", "none", "127.0.0.1", "2787", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("845", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719727", "/str/index.php", "none", "none", "127.0.0.1", "2793", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("846", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719747", "/str/admin.php", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("847", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719751", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("848", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719761", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("849", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719764", "/str/admin.php", "none", "none", "127.0.0.1", "2801", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("850", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719764", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("851", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719766", "/str/index.php", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("852", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719774", "/str/admin.php", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("853", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719776", "/str/admin.php?op=logout", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("854", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719779", "/str/admin.php", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("855", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719783", "/str/admin.php", "none", "none", "127.0.0.1", "2815", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("856", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719785", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "2801", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("857", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719963", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "2866", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("858", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719968", "/str/index.php", "none", "none", "127.0.0.1", "2866", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("859", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201719997", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "2874", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("860", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720018", "/str/admin.php", "none", "none", "127.0.0.1", "2880", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("861", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720019", "/str/admin.php?op=CalendarAdmin", "none", "none", "127.0.0.1", "2880", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("862", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720025", "/str/admin.php?op=CalendarAdmin", "none", "none", "127.0.0.1", "2880", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("863", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720028", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "2880", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("864", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720116", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "2921", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("865", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720123", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "2921", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("866", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720123", "/str/admin.php?op=CalendarAdmin", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("867", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720126", "/str/admin.php?op=CalendarDisplayStory&qid=1", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("868", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720134", "/str/admin.php", "none", "none", "127.0.0.1", "2921", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("869", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720134", "/str/admin.php?op=CalendarAdmin", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("870", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720138", "/str/index.php", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("871", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720143", "/str/admin.php", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("872", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720145", "/str/admin.php?op=logout", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("873", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720148", "/str/admin.php", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("874", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720150", "/str/index.php", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("875", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720157", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2936", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("876", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720157", "/str/modules.php?name=Surveys&op=results&pollID=1", "none", "none", "127.0.0.1", "2921", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("877", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720286", "/str/modules.php?name=Surveys&op=results&pollID=1", "none", "none", "127.0.0.1", "2963", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("878", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720290", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2963", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("879", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720292", "/str/index.php", "none", "none", "127.0.0.1", "2965", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("880", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720342", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "2979", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("881", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720344", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=01&month_l=Janeiro", "none", "none", "127.0.0.1", "2979", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("882", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720442", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=01&month_l=Janeiro", "none", "none", "127.0.0.1", "3006", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("883", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720450", "/str/index.php", "none", "none", "127.0.0.1", "3008", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("884", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720497", "/str/modules.php?name=News&file=article&sid=2", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("885", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720506", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("886", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720509", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=01&month_l=Janeiro", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("887", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720514", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("888", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720516", "/str/modules.php?op=modload&name=Recherches&file=index", "none", "none", "127.0.0.1", "3020", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("889", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720521", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("890", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720531", "/str/modules.php?name=Calendar&file=index&type=view&eid=1", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("891", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720543", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("892", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720545", "/str/modules.php?name=Surveys&pollID=1", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("893", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720547", "/str/index.php", "none", "none", "127.0.0.1", "3020", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("894", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720572", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "3054", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("895", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201720576", "/str/index.php", "none", "none", "127.0.0.1", "3054", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("896", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773584", "/str/index.php", "none", "none", "127.0.0.1", "1101", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("897", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773646", "/str/index.php", "none", "none", "127.0.0.1", "1118", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("898", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773683", "/str/index.php", "none", "none", "127.0.0.1", "1130", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("899", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773698", "/str/index.php", "none", "none", "127.0.0.1", "1132", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("900", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773723", "/str/index.php", "none", "none", "127.0.0.1", "1140", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("901", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773813", "/str/index.php", "none", "none", "127.0.0.1", "1160", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("902", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773833", "/str/index.php", "none", "none", "127.0.0.1", "1164", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("903", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773864", "/str/index.php", "none", "none", "127.0.0.1", "1176", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("904", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773932", "/str/index.php", "none", "none", "127.0.0.1", "1188", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("905", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201773943", "/str/index.php", "none", "none", "127.0.0.1", "1190", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("906", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774121", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1269", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("907", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774121", "/str/modules.php?name=Your_Account&stop=1", "none", "none", "127.0.0.1", "1269", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("908", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774129", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1269", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("909", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774129", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "1269", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("910", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774136", "/str/modules.php?name=Your_Account&op=logout", "none", "none", "127.0.0.1", "1276", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("911", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774138", "/str/index.php", "none", "none", "127.0.0.1", "1269", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("912", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774171", "/str/index.php", "none", "none", "127.0.0.1", "1284", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("913", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774177", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "1284", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("914", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774177", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "1286", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("915", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774207", "/str/modules.php?name=Your_Account&op=logout", "none", "none", "127.0.0.1", "1298", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("916", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774210", "/str/index.php", "none", "none", "127.0.0.1", "1298", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("917", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774244", "/str/index.php", "none", "none", "127.0.0.1", "1307", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("918", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201774328", "/str/index.php", "none", "none", "127.0.0.1", "1327", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("919", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776499", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1831", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("920", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776504", "/str/admin.php", "none", "none", "127.0.0.1", "1833", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("921", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776507", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1833", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("922", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776513", "/str/admin.php?op=BlocksEdit&bid=10", "none", "none", "127.0.0.1", "1831", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("923", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776518", "/str/admin.php", "none", "none", "127.0.0.1", "1833", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("924", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776519", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1831", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("925", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776525", "/str/admin.php?op=BlocksEdit&bid=6", "none", "none", "127.0.0.1", "1833", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("926", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776528", "/str/admin.php", "none", "none", "127.0.0.1", "1831", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("927", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776528", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1833", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("928", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776531", "/str/index.php", "none", "none", "127.0.0.1", "1833", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("929", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776540", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "1831", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("930", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776630", "/str/admin.php", "none", "none", "127.0.0.1", "1871", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("931", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776630", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "1871", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("932", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201776633", "/str/index.php", "none", "none", "127.0.0.1", "1871", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("933", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201780174", "/str/index.php", "none", "none", "127.0.0.1", "3038", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("934", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201780551", "/str/index.php", "none", "none", "127.0.0.1", "3126", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("935", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201780967", "/str/index.php", "none", "none", "127.0.0.1", "3222", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("936", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201781032", "/str/index.php", "none", "none", "127.0.0.1", "3245", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("937", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201781195", "/str/index.php", "none", "none", "127.0.0.1", "3286", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("938", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782062", "/str/index.php", "none", "none", "127.0.0.1", "3508", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("939", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782526", "/str/index.php", "none", "none", "127.0.0.1", "3617", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("940", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782675", "/str/index.php", "none", "none", "127.0.0.1", "3666", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("941", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782750", "/str/index.php", "none", "none", "127.0.0.1", "3696", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("942", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782768", "/str/index.php", "none", "none", "127.0.0.1", "3709", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("943", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782808", "/str/index.php", "none", "none", "127.0.0.1", "3731", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("944", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201782869", "/str/index.php", "none", "none", "127.0.0.1", "3753", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("945", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783523", "/str/index.php", "none", "none", "127.0.0.1", "3902", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("946", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783628", "/str/index.php", "none", "none", "127.0.0.1", "3936", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("947", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783762", "/str/index.php", "none", "none", "127.0.0.1", "3978", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("948", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783798", "/str/index.php", "none", "none", "127.0.0.1", "3997", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("949", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783890", "/str/index.php", "none", "none", "127.0.0.1", "4014", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("950", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783914", "/str/index.php", "none", "none", "127.0.0.1", "4021", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("951", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201783983", "/str/index.php", "none", "none", "127.0.0.1", "4037", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("952", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784069", "/str/index.php", "none", "none", "127.0.0.1", "4057", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("953", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784342", "/str/index.php", "none", "none", "127.0.0.1", "4110", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("954", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784358", "/str/index.php", "none", "none", "127.0.0.1", "4125", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("955", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784388", "/str/index.php", "none", "none", "127.0.0.1", "4146", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("956", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784400", "/str/index.php", "none", "none", "127.0.0.1", "4158", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("957", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784415", "/str/index.php", "none", "none", "127.0.0.1", "4167", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("958", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201784426", "/str/index.php", "none", "none", "127.0.0.1", "4158", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("959", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201785193", "/str/index.php", "none", "none", "127.0.0.1", "4391", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("960", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201785263", "/str/index.php", "none", "none", "127.0.0.1", "4443", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("961", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786026", "/str/index.php", "none", "none", "127.0.0.1", "4657", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("962", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786048", "/str/index.php", "none", "none", "127.0.0.1", "4680", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("963", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786059", "/str/index.php", "none", "none", "127.0.0.1", "4679", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("964", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786086", "/str/index.php", "none", "none", "127.0.0.1", "4706", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("965", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786102", "/str/index.php", "none", "none", "127.0.0.1", "4721", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("966", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786197", "/str/index.php", "none", "none", "127.0.0.1", "4748", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("967", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786213", "/str/index.php", "none", "none", "127.0.0.1", "4758", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("968", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786336", "/str/index.php", "none", "none", "127.0.0.1", "4804", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("969", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786554", "/str/index.php", "none", "none", "127.0.0.1", "4862", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("970", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786581", "/str/index.php", "none", "none", "127.0.0.1", "4884", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("971", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786594", "/str/index.php", "none", "none", "127.0.0.1", "4884", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("972", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786652", "/str/index.php", "none", "none", "127.0.0.1", "4918", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("973", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201786812", "/str/index.php", "none", "none", "127.0.0.1", "4957", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("974", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793056", "/str/index.php", "none", "none", "127.0.0.1", "1081", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("975", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793497", "/str/index.php", "none", "none", "127.0.0.1", "1217", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("976", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793601", "/str/index.php", "none", "none", "127.0.0.1", "1246", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("977", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793797", "/str/index.php", "none", "none", "127.0.0.1", "1289", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("978", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793810", "/str/index.php", "none", "none", "127.0.0.1", "1304", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("979", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793831", "/str/admin.php", "none", "none", "127.0.0.1", "1319", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("980", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793835", "/str/admin.php?op=EditStory&sid=2", "none", "none", "127.0.0.1", "1321", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("981", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793862", "/str/index.php", "none", "none", "127.0.0.1", "1333", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("982", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793911", "/str/index.php", "none", "none", "127.0.0.1", "1343", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("983", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793920", "/str/index.php", "none", "none", "127.0.0.1", "1343", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("984", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201793933", "/str/index.php", "none", "none", "127.0.0.1", "1345", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("985", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794184", "/str/index.php", "none", "none", "127.0.0.1", "1413", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("986", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794207", "/str/index.php", "none", "none", "127.0.0.1", "1421", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("987", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794233", "/str/index.php", "none", "none", "127.0.0.1", "1431", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("988", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794253", "/str/index.php", "none", "none", "127.0.0.1", "1440", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("989", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794286", "/str/index.php", "none", "none", "127.0.0.1", "1449", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("990", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794293", "/str/index.php", "none", "none", "127.0.0.1", "1449", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("991", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794304", "/str/index.php", "none", "none", "127.0.0.1", "1451", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("992", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794329", "/str/index.php", "none", "none", "127.0.0.1", "1461", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("993", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794358", "/str/modules.php?query=", "none", "none", "127.0.0.1", "1471", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("994", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794359", "/str/modules.php?query=", "none", "none", "127.0.0.1", "1471", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("995", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794360", "/str/modules.php?query=", "none", "none", "127.0.0.1", "1471", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("996", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794360", "/str/modules.php?query=", "none", "none", "127.0.0.1", "1471", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("997", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794375", "/str/index.php", "none", "none", "127.0.0.1", "1471", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("998", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794392", "/str/index.php", "none", "none", "127.0.0.1", "1482", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("999", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201794762", "/str/index.php", "none", "none", "127.0.0.1", "1577", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1000", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795223", "/str/index.php", "none", "none", "127.0.0.1", "1682", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1001", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795244", "/str/index.php", "none", "none", "127.0.0.1", "1697", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1002", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795274", "/str/index.php", "none", "none", "127.0.0.1", "1722", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1003", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795297", "/str/index.php", "none", "none", "127.0.0.1", "1743", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1004", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795315", "/str/index.php", "none", "none", "127.0.0.1", "1764", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1005", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795349", "/str/index.php", "none", "none", "127.0.0.1", "1786", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1006", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795490", "/str/index.php", "none", "none", "127.0.0.1", "1823", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1007", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795513", "/str/index.php", "none", "none", "127.0.0.1", "1845", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1008", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201795585", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1878", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1009", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796089", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1981", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1010", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796202", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2010", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1011", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796291", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2040", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1012", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796342", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2059", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1013", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796365", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2084", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1014", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796383", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2101", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1015", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796593", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2149", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1016", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796654", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2169", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1017", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796805", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2206", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1018", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201796827", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2227", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1019", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797113", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2296", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1020", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797208", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2319", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1021", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797231", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2339", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1022", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797246", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2354", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1023", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797277", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2370", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1024", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797296", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2388", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1025", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797310", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2401", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1026", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797337", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2419", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1027", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797460", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2456", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1028", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797495", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2475", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1029", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797539", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2499", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1030", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797577", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2516", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1031", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797815", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2563", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1032", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797837", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2583", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1033", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797885", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2604", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1034", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797911", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2626", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1035", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201797921", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2628", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1036", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201798391", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2719", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1037", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201798682", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2778", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1038", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201798712", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2798", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1039", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201798755", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2816", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1040", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799257", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "2908", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1041", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799315", "/str/index.php", "none", "none", "127.0.0.1", "2924", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1042", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799491", "/str/index.php", "none", "none", "127.0.0.1", "2954", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1043", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799538", "/str/index.php", "none", "none", "127.0.0.1", "2966", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1044", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799553", "/str/index.php", "none", "none", "127.0.0.1", "2968", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1045", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799591", "/str/index.php", "none", "none", "127.0.0.1", "2980", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1046", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799629", "/str/index.php", "none", "none", "127.0.0.1", "2990", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1047", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799675", "/str/index.php", "none", "none", "127.0.0.1", "3000", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1048", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799694", "/str/index.php", "none", "none", "127.0.0.1", "3008", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1049", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799713", "/str/modules.php?name=Your_Account", "none", "none", "127.0.0.1", "3015", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1050", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799714", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "3015", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1051", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799741", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "3023", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1052", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799758", "/str/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry", "none", "none", "127.0.0.1", "3028", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1053", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799769", "/str/modules.php?name=Your_Account&op=logout", "none", "none", "127.0.0.1", "3028", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1054", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799771", "/str/index.php", "none", "none", "127.0.0.1", "3028", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1055", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201799926", "/str/index.php", "none", "none", "127.0.0.1", "3065", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1056", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800003", "/str/index.php", "none", "none", "127.0.0.1", "3097", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1057", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800022", "/str/index.php", "none", "none", "127.0.0.1", "3109", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1058", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800042", "/str/index.php", "none", "none", "127.0.0.1", "3130", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1059", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800059", "/str/index.php", "none", "none", "127.0.0.1", "3146", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1060", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800085", "/str/index.php", "none", "none", "127.0.0.1", "3174", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1061", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800104", "/str/index.php", "none", "none", "127.0.0.1", "3190", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1062", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800129", "/str/index.php", "none", "none", "127.0.0.1", "3209", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1063", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800194", "/str/index.php", "none", "none", "127.0.0.1", "3229", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1064", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800216", "/str/index.php", "none", "none", "127.0.0.1", "3249", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1065", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800235", "/str/index.php", "none", "none", "127.0.0.1", "3268", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1066", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800246", "/str/index.php", "none", "none", "127.0.0.1", "3282", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1067", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800258", "/str/index.php", "none", "none", "127.0.0.1", "3292", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1068", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800365", "/str/index.php", "none", "none", "127.0.0.1", "3326", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1069", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800397", "/str/index.php", "none", "none", "127.0.0.1", "3350", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1070", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800419", "/str/index.php", "none", "none", "127.0.0.1", "3366", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1071", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201800769", "/str/index.php", "none", "none", "127.0.0.1", "3463", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1072", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803007", "/str/index.php", "none", "none", "127.0.0.1", "3836", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1073", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803007", "/str/index.php", "none", "none", "127.0.0.1", "3837", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1074", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803037", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1075", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803039", "/str/index.php", "none", "none", "127.0.0.1", "3861", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1076", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803042", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1077", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803045", "/str/index.php", "none", "none", "127.0.0.1", "3860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1078", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803048", "/str/index.php", "none", "none", "127.0.0.1", "3861", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1079", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803051", "/str/index.php", "none", "none", "127.0.0.1", "3873", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1080", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803054", "/str/index.php", "none", "none", "127.0.0.1", "3873", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1081", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803059", "/str/index.php", "none", "none", "127.0.0.1", "3873", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1082", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803062", "/str/index.php", "none", "none", "127.0.0.1", "3874", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1083", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803067", "/str/index.php", "none", "none", "127.0.0.1", "3874", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1084", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803071", "/str/index.php", "none", "none", "127.0.0.1", "3882", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1085", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803073", "/str/index.php", "none", "none", "127.0.0.1", "3882", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1086", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803076", "/str/index.php", "none", "none", "127.0.0.1", "3882", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1087", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803078", "/str/index.php", "none", "none", "127.0.0.1", "3887", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1088", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803081", "/str/index.php", "none", "none", "127.0.0.1", "3882", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1089", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803084", "/str/index.php", "none", "none", "127.0.0.1", "3887", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1090", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803087", "/str/index.php", "none", "none", "127.0.0.1", "3894", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1091", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803091", "/str/index.php", "none", "none", "127.0.0.1", "3893", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1092", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803094", "/str/index.php", "none", "none", "127.0.0.1", "3894", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1093", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803247", "/str/index.php", "none", "none", "127.0.0.1", "3929", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1094", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803250", "/str/index.php", "none", "none", "127.0.0.1", "3929", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1095", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803253", "/str/index.php", "none", "none", "127.0.0.1", "3931", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1096", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803258", "/str/index.php", "none", "none", "127.0.0.1", "3929", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1097", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803261", "/str/index.php", "none", "none", "127.0.0.1", "3929", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1098", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803329", "/str/index.php", "none", "none", "127.0.0.1", "3959", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1099", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803336", "/str/index.php", "none", "none", "127.0.0.1", "3959", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1100", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803348", "/str/index.php", "none", "none", "127.0.0.1", "3959", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1101", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803351", "/str/index.php", "none", "none", "127.0.0.1", "3959", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1102", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803499", "/str/index.php", "none", "none", "127.0.0.1", "4013", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1103", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201803502", "/str/index.php", "none", "none", "127.0.0.1", "4012", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1104", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201804453", "/str/index.php", "none", "none", "127.0.0.1", "4241", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1105", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805208", "/str/index.php", "none", "none", "127.0.0.1", "4375", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1106", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805210", "/str/index.php", "none", "none", "127.0.0.1", "4379", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1107", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805212", "/str/index.php", "none", "none", "127.0.0.1", "4375", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1108", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805245", "/str/index.php", "none", "none", "127.0.0.1", "4402", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1109", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805248", "/str/index.php", "none", "none", "127.0.0.1", "4401", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1110", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805253", "/str/index.php", "none", "none", "127.0.0.1", "4402", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1111", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805254", "/str/index.php", "none", "none", "127.0.0.1", "4401", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1112", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805257", "/str/index.php", "none", "none", "127.0.0.1", "4402", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1113", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805259", "/str/index.php", "none", "none", "127.0.0.1", "4402", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1114", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805261", "/str/index.php", "none", "none", "127.0.0.1", "4415", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1115", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805266", "/str/index.php", "none", "none", "127.0.0.1", "4415", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1116", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805353", "/str/index.php", "none", "none", "127.0.0.1", "4444", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1117", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805355", "/str/index.php", "none", "none", "127.0.0.1", "4444", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1118", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805358", "/str/index.php", "none", "none", "127.0.0.1", "4444", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1119", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805360", "/str/index.php", "none", "none", "127.0.0.1", "4443", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1120", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805363", "/str/index.php", "none", "none", "127.0.0.1", "4443", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1121", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805369", "/str/index.php", "none", "none", "127.0.0.1", "4453", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1122", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805371", "/str/index.php", "none", "none", "127.0.0.1", "4453", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1123", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805376", "/str/index.php", "none", "none", "127.0.0.1", "4458", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1124", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805657", "/str/index.php", "none", "none", "127.0.0.1", "4519", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1125", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805663", "/str/index.php", "none", "none", "127.0.0.1", "4527", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1126", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805756", "/str/index.php", "none", "none", "127.0.0.1", "4559", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1127", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201805853", "/str/index.php", "none", "none", "127.0.0.1", "4590", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1128", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201806048", "/str/index.php", "none", "none", "127.0.0.1", "4641", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1129", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201806435", "/str/index.php", "none", "none", "127.0.0.1", "4732", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1130", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201806947", "/str/index.php", "none", "none", "127.0.0.1", "4858", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1131", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201807243", "/str/index.php", "none", "none", "127.0.0.1", "4912", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1132", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201807862", "/str/index.php", "none", "none", "127.0.0.1", "1058", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1133", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201807913", "/str/index.php", "none", "none", "127.0.0.1", "1083", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1134", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201859823", "/str/index.php", "none", "none", "127.0.0.1", "1092", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1135", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865569", "/str/index.php", "none", "none", "127.0.0.1", "2545", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1136", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865588", "/str/index.php", "none", "none", "127.0.0.1", "2554", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1137", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865590", "/str/index.php", "none", "none", "127.0.0.1", "2554", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1138", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865592", "/str/index.php", "none", "none", "127.0.0.1", "2555", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1139", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865595", "/str/index.php", "none", "none", "127.0.0.1", "2555", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1140", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865597", "/str/index.php", "none", "none", "127.0.0.1", "2555", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1141", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201865600", "/str/index.php", "none", "none", "127.0.0.1", "2566", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1142", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201867537", "/str/index.php", "none", "none", "127.0.0.1", "3064", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1143", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201867668", "/str/index.php", "none", "none", "127.0.0.1", "3098", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1144", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201867708", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3114", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1145", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201868184", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3211", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1146", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869097", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3370", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1147", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869158", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3391", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1148", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869496", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3451", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1149", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869502", "/str/index.php", "none", "none", "127.0.0.1", "3451", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1150", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869798", "/str/index.php", "none", "none", "127.0.0.1", "3501", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1151", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869883", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1152", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869884", "/str/modules.php?name=Surveys&pollID=1", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1153", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869886", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1154", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869889", "/str/index.php", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1155", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869891", "/str/index.php", "none", "none", "127.0.0.1", "3534", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1156", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869893", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1157", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869894", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1158", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201869900", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "3530", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1159", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870278", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "3613", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1160", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870293", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "3615", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1161", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870317", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "3621", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1162", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870351", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "3630", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1163", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870352", "/str/modules.php?name=Calendar&file=index&type=view&eid=1", "none", "none", "127.0.0.1", "3632", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1164", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870380", "/str/index.php", "none", "none", "127.0.0.1", "3640", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1165", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870382", "/str/modules.php?name=Calendar&op=modload&file=index&Date=02/3/2008&type=day", "none", "none", "127.0.0.1", "3640", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1166", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870410", "/str/modules.php?name=Calendar&op=modload&file=index&Date=02/3/2008&type=day", "none", "none", "127.0.0.1", "3647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1167", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870414", "/str/modules.php?name=Calendar&file=index&type=view&eid=1", "none", "none", "127.0.0.1", "3647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1168", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870443", "/str/index.php", "none", "none", "127.0.0.1", "3655", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1169", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870477", "/str/index.php", "none", "none", "127.0.0.1", "3662", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1170", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870510", "/str/admin.php", "none", "none", "127.0.0.1", "3673", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1171", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870512", "/str/admin.php?op=logout", "none", "none", "127.0.0.1", "3675", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1172", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870515", "/str/admin.php", "none", "none", "127.0.0.1", "3673", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1173", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870536", "/str/admin.php", "none", "none", "127.0.0.1", "3682", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1174", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870540", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "3682", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1175", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870555", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "3682", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1176", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870567", "/str/modules.php?name=Your_Account&file=admin", "none", "none", "127.0.0.1", "3682", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1177", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870573", "/str/modules.php?name=Your_Account&file=admin&op=searchUser", "none", "none", "127.0.0.1", "3682", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1178", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870618", "/str/admin.php", "none", "none", "127.0.0.1", "3703", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1179", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870623", "/str/modules.php?name=Your_Account&file=admin&op=searchUser", "none", "none", "127.0.0.1", "3705", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1180", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870635", "/str/index.php", "none", "none", "127.0.0.1", "3705", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1181", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870853", "/str/modules.php?name=Downloads", "none", "none", "127.0.0.1", "3745", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1182", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870920", "/str/modules.php?name=Topics", "none", "none", "127.0.0.1", "3779", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1183", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870935", "/str/index.php", "none", "none", "127.0.0.1", "3786", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1184", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870944", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "3786", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1185", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870949", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "3786", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1186", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201870954", "/str/index.php", "none", "none", "127.0.0.1", "3786", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1187", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201871390", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "3895", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1188", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201871400", "/str/index.php", "none", "none", "127.0.0.1", "3895", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1189", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1201871576", "/str/index.php", "none", "none", "127.0.0.1", "3934", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1190", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292184", "/str/index.php", "none", "none", "127.0.0.1", "1164", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1191", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292209", "/str/modules.php?name=Recherches", "none", "none", "127.0.0.1", "1172", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1192", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292214", "/str/modules.php?name=Feedback", "none", "none", "127.0.0.1", "1172", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1193", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292233", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1179", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1194", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292236", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=01&month_l=Janeiro", "none", "none", "127.0.0.1", "1179", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1195", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292239", "/str/index.php", "none", "none", "127.0.0.1", "1179", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1196", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292253", "/str/index.php", "none", "none", "127.0.0.1", "1179", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1197", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292397", "/str/modules.php?name=Your_Account&op=new_user", "none", "none", "127.0.0.1", "1233", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1198", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292456", "/str/index.php", "none", "none", "127.0.0.1", "1247", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1199", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292472", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "1255", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1200", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292483", "/str/index.php", "none", "none", "127.0.0.1", "1255", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1201", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292580", "/str/index.php", "none", "none", "127.0.0.1", "1275", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1202", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292601", "/str/index.php", "none", "none", "127.0.0.1", "1283", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1203", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292630", "/str/index.php", "none", "none", "127.0.0.1", "1291", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1204", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292645", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "1293", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1205", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292651", "/str/index.php", "none", "none", "127.0.0.1", "1291", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1206", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292656", "/str/modules.php?name=Calendar&op=modload&file=index&type=view&eid=1", "none", "none", "127.0.0.1", "1293", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1207", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292667", "/str/index.php", "none", "none", "127.0.0.1", "1293", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1208", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292706", "/str/admin.php", "none", "none", "127.0.0.1", "1311", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1209", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292713", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1313", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1210", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292718", "/str/admin.php?op=GallAdmin&do=editallcategories", "none", "none", "127.0.0.1", "1311", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1211", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292722", "/str/admin.php?op=GallAdmin&do=editcategory&parent=-1", "none", "none", "127.0.0.1", "1313", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1212", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292791", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1329", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1213", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202292803", "/str/index.php", "none", "none", "127.0.0.1", "1329", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1214", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293425", "/str/index.php", "none", "none", "127.0.0.1", "1855", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1215", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293441", "/str/modules.php?name=My_eGallery", "none", "none", "127.0.0.1", "1860", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1216", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293463", "/str/index.php", "none", "none", "127.0.0.1", "1866", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1217", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293502", "/str/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=", "none", "none", "127.0.0.1", "1873", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1218", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293504", "/str/index.php", "none", "none", "127.0.0.1", "1873", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1219", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293522", "/str/admin.php", "none", "none", "127.0.0.1", "1879", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1220", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293524", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1879", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1221", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293527", "/str/admin.php?op=GallAdmin&do=editallcategories", "none", "none", "127.0.0.1", "1879", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1222", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293529", "/str/admin.php?op=GallAdmin&do=editcategory&parent=-1", "none", "none", "127.0.0.1", "1879", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1223", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293561", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1892", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1224", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293578", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1894", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1225", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293688", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1916", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1226", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293692", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1916", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1227", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293708", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1920", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1228", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293720", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1920", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1229", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293721", "/str/admin.php?op=GallAdmin&do=editmedia", "none", "none", "127.0.0.1", "1920", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1230", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293727", "/str/admin.php?op=GallAdmin&do=Configure", "none", "none", "127.0.0.1", "1920", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1231", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293728", "/str/modules.php?op=modload&name=My_eGallery&file=gd", "none", "none", "127.0.0.1", "1920", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1232", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293774", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1938", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1233", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293785", "/str/admin.php?op=GallAdmin&do=editallcategories", "none", "none", "127.0.0.1", "1938", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1234", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293787", "/str/admin.php?op=GallAdmin&do=editcategory&parent=-1", "none", "none", "127.0.0.1", "1938", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1235", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293800", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1938", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1236", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293851", "/str/admin.php?op=GallAdmin", "none", "none", "127.0.0.1", "1955", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1237", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202293856", "/str/index.php", "none", "none", "127.0.0.1", "1955", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1238", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294724", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1239", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294730", "/str/modules.php?name=Web_Links&l_op=AddLink", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1240", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294735", "/str/index.php", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1241", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294742", "/str/admin.php", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1242", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294745", "/str/admin.php?op=logout", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1243", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294748", "/str/admin.php", "none", "none", "127.0.0.1", "2136", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1244", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294753", "/str/admin.php", "none", "none", "127.0.0.1", "2147", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1245", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294764", "/str/admin.php?op=Links", "none", "none", "127.0.0.1", "2147", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1246", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294774", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "2147", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1247", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294841", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "2171", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1248", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202294861", "/str/modules.php?name=Web_Links", "none", "none", "127.0.0.1", "2178", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1249", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202295728", "/str/index.php", "none", "none", "127.0.0.1", "1181", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1250", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202496447", "/str/index.php", "none", "none", "127.0.0.1", "1635", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1251", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202837064", "/str/admin.php", "none", "none", "127.0.0.1", "4849", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1252", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202837071", "/str/admin.php", "none", "none", "127.0.0.1", "4849", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1253", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202837073", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4852", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1254", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202837076", "/str/admin.php?op=BlocksAdmin", "none", "none", "127.0.0.1", "4852", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1255", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1202837079", "/str/admin.php?op=BlocksEdit&bid=11", "none", "none", "127.0.0.1", "4849", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1256", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1203074832", "/str/index.php", "none", "none", "127.0.0.1", "2617", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1257", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1203074853", "/str/admin.php", "none", "none", "127.0.0.1", "2626", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1258", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1203074857", "/str/admin.php", "none", "none", "127.0.0.1", "2626", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1259", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1203624581", "/str/index.php", "none", "none", "127.0.0.1", "2404", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1260", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027258", "/str/index.php", "none", "none", "127.0.0.1", "1590", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1261", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027304", "/str/admin.php", "none", "none", "127.0.0.1", "1595", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1262", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027308", "/str/admin.php", "none", "none", "127.0.0.1", "1597", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1263", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027325", "/str/admin.php?op=FCKadminStory", "none", "none", "127.0.0.1", "1599", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1264", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027339", "/str/modules.php?name=News&file=article&sid=2", "none", "none", "127.0.0.1", "1634", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1265", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027570", "/str/index.php", "none", "none", "127.0.0.1", "1642", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1266", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027610", "/str/admin.php", "none", "none", "127.0.0.1", "1644", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1267", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027610", "/str/admin.php?op=adminMain", "none", "none", "127.0.0.1", "1644", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1268", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027615", "/str/index.php", "none", "none", "127.0.0.1", "1647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1269", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027625", "/str/modules.php?name=News&file=article&sid=3", "none", "none", "127.0.0.1", "1647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1270", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027633", "/str/index.php", "none", "none", "127.0.0.1", "1647", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1271", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027646", "/str/admin.php?op=create", "none", "none", "127.0.0.1", "1651", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1272", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027684", "/str/admin.php", "none", "none", "127.0.0.1", "1653", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1273", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027684", "/str/admin.php?op=adminMain", "none", "none", "127.0.0.1", "1653", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1274", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027689", "/str/index.php", "none", "none", "127.0.0.1", "1656", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1275", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027695", "/str/modules.php?name=Surveys", "none", "none", "127.0.0.1", "1656", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1276", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027695", "/str/modules.php?name=Surveys&op=results&pollID=2", "none", "none", "127.0.0.1", "1656", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1277", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027710", "/str/index.php", "none", "none", "127.0.0.1", "1656", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1278", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027721", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "1662", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1279", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027773", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "1665", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1280", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027795", "/str/index.php", "none", "none", "127.0.0.1", "1667", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1281", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027822", "/str/index.php", "none", "none", "127.0.0.1", "1669", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1282", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027827", "/str/index.php", "none", "none", "127.0.0.1", "1669", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1283", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027829", "/str/index.php", "none", "none", "127.0.0.1", "1669", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1284", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027851", "/str/modules.php?name=Calendar&file=submit", "none", "none", "127.0.0.1", "1673", "POST", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1285", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027851", "/str/admin.php?op=CalendarAdmin", "none", "none", "127.0.0.1", "1673", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1286", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027854", "/str/admin.php?op=FCKadminStory", "none", "none", "127.0.0.1", "1673", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1287", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027885", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1677", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1288", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027895", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=02&month_l=Fevereiro", "none", "none", "127.0.0.1", "1677", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1289", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027923", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=01&month_l=Janeiro", "none", "none", "127.0.0.1", "1681", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1290", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027925", "/str/modules.php?name=Stories_Archive&sa=show_month&year=2008&month=02&month_l=Fevereiro", "none", "none", "127.0.0.1", "1681", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1291", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027939", "/str/admin.php", "none", "none", "127.0.0.1", "1686", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1292", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204027940", "/str/admin.php?op=FCKadminStory", "none", "none", "127.0.0.1", "1685", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1293", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204028012", "/str/modules.php?name=Calendar", "none", "none", "127.0.0.1", "1689", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1294", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204028027", "/str/modules.php?name=Calendar&file=index&Date=03/01/2008&type=month", "none", "none", "127.0.0.1", "1689", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1295", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204028038", "/str/index.php", "none", "none", "127.0.0.1", "1689", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1296", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204028087", "/str/modules.php?name=Stories_Archive", "none", "none", "127.0.0.1", "1694", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1297", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204028095", "/str/index.php", "none", "none", "127.0.0.1", "1694", "GET", "00");
INSERT INTO kayapo_nsnst_tracked_ips VALUES("1298", "none", "", "1", "", "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)", "1204310221", "/str/index.php", "none", "none", "127.0.0.1", "3229", "GET", "00");


#
# Table structure for table 'kayapo_pages'
#

CREATE TABLE kayapo_pages (
  pid int(10) NOT NULL auto_increment,
  cid int(10) NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  subtitle varchar(255) NOT NULL default '',
  active int(1) NOT NULL default '0',
  page_header text NOT NULL,
  text text NOT NULL,
  page_footer text NOT NULL,
  signature text NOT NULL,
  date datetime NOT NULL default '0000-00-00 00:00:00',
  counter int(10) NOT NULL default '0',
  clanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (pid),
  KEY pid (pid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_pages'
#



#
# Table structure for table 'kayapo_pages_categories'
#

CREATE TABLE kayapo_pages_categories (
  cid int(10) NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  description text NOT NULL,
  PRIMARY KEY  (cid),
  KEY cid (cid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_pages_categories'
#



#
# Table structure for table 'kayapo_poll_check'
#

CREATE TABLE kayapo_poll_check (
  ip varchar(20) NOT NULL default '',
  time varchar(14) NOT NULL default '',
  pollID int(10) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_poll_check'
#



#
# Table structure for table 'kayapo_poll_data'
#

CREATE TABLE kayapo_poll_data (
  pollID int(11) NOT NULL default '0',
  optionText char(50) NOT NULL default '',
  optionCount int(11) NOT NULL default '0',
  voteID int(11) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_poll_data'
#

INSERT INTO kayapo_poll_data VALUES("1", "Hum... Nada mal!", "1", "1");
INSERT INTO kayapo_poll_data VALUES("1", "Show!!!", "0", "2");
INSERT INTO kayapo_poll_data VALUES("1", "Maravilhoso!!!", "0", "3");
INSERT INTO kayapo_poll_data VALUES("1", "O melhor de todos!!!", "1", "4");
INSERT INTO kayapo_poll_data VALUES("1", "Hum...", "0", "5");
INSERT INTO kayapo_poll_data VALUES("1", "N?o gostei!", "0", "6");
INSERT INTO kayapo_poll_data VALUES("1", "Odiei!!!", "0", "7");
INSERT INTO kayapo_poll_data VALUES("1", "", "0", "8");
INSERT INTO kayapo_poll_data VALUES("1", "", "0", "9");
INSERT INTO kayapo_poll_data VALUES("1", "", "0", "10");
INSERT INTO kayapo_poll_data VALUES("1", "", "0", "11");
INSERT INTO kayapo_poll_data VALUES("1", "", "0", "12");
INSERT INTO kayapo_poll_data VALUES("2", "Inter", "1", "1");
INSERT INTO kayapo_poll_data VALUES("2", "Gr?mio", "0", "2");
INSERT INTO kayapo_poll_data VALUES("2", "Juventude", "0", "3");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "4");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "5");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "6");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "7");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "8");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "9");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "10");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "11");
INSERT INTO kayapo_poll_data VALUES("2", "", "0", "12");


#
# Table structure for table 'kayapo_poll_desc'
#

CREATE TABLE kayapo_poll_desc (
  pollID int(11) NOT NULL auto_increment,
  pollTitle varchar(100) NOT NULL default '',
  timeStamp int(11) NOT NULL default '0',
  voters mediumint(9) NOT NULL default '0',
  planguage varchar(30) NOT NULL default '',
  artid int(10) NOT NULL default '0',
  PRIMARY KEY  (pollID),
  KEY pollID (pollID)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_poll_desc'
#

INSERT INTO kayapo_poll_desc VALUES("1", "O que voc? achou deste site?", "961405160", "2", "brazilian", "0");
INSERT INTO kayapo_poll_desc VALUES("2", "Quem vai ser camp??o do gauch?o 2008 ?", "1204027684", "1", "brazilian", "0");


#
# Table structure for table 'kayapo_pollcomments'
#

CREATE TABLE kayapo_pollcomments (
  tid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  pollID int(11) NOT NULL default '0',
  date datetime default NULL,
  name varchar(60) NOT NULL default '',
  email varchar(60) default NULL,
  url varchar(60) default NULL,
  host_name varchar(60) default NULL,
  subject varchar(60) NOT NULL default '',
  comment text NOT NULL,
  score tinyint(4) NOT NULL default '0',
  reason tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (tid),
  KEY tid (tid),
  KEY pid (pid),
  KEY pollID (pollID)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_pollcomments'
#



#
# Table structure for table 'kayapo_public_messages'
#

CREATE TABLE kayapo_public_messages (
  mid int(10) NOT NULL auto_increment,
  content varchar(255) NOT NULL default '',
  date varchar(14) default NULL,
  who varchar(25) NOT NULL default '',
  PRIMARY KEY  (mid),
  KEY mid (mid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_public_messages'
#



#
# Table structure for table 'kayapo_queue'
#

CREATE TABLE kayapo_queue (
  qid smallint(5) unsigned NOT NULL auto_increment,
  uid mediumint(9) NOT NULL default '0',
  uname varchar(40) NOT NULL default '',
  subject varchar(100) NOT NULL default '',
  story text,
  storyext text NOT NULL,
  timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  topic varchar(20) NOT NULL default '',
  alanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (qid),
  KEY qid (qid),
  KEY uid (uid),
  KEY uname (uname)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_queue'
#



#
# Table structure for table 'kayapo_quotes'
#

CREATE TABLE kayapo_quotes (
  qid int(10) unsigned NOT NULL auto_increment,
  quote text,
  PRIMARY KEY  (qid),
  KEY qid (qid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_quotes'
#

INSERT INTO kayapo_quotes VALUES("1", "Nos morituri te salutamus - CBHS");


#
# Table structure for table 'kayapo_recherches'
#

CREATE TABLE kayapo_recherches (
  primkey smallint(6) NOT NULL auto_increment,
  ip varchar(15) default NULL,
  query varchar(50) default NULL,
  date varchar(18) default NULL,
  userid varchar(20) default NULL,
  total varchar(10) default NULL,
  PRIMARY KEY  (primkey),
  UNIQUE KEY primkey (primkey)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_recherches'
#

INSERT INTO kayapo_recherches VALUES("1", "127.0.0.1", "a", "30-01-2008 1o 09:3", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("2", "127.0.0.1", "a", "30-01-2008 1o 09:3", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("3", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("4", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("5", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("6", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("7", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("8", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("9", "127.0.0.1", "a", "30-01-2008 1o 14:5", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("10", "127.0.0.1", "a", "30-01-2008 1o 15:0", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("11", "127.0.0.1", "a", "30-01-2008 1o 15:0", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("12", "127.0.0.1", "a", "30-01-2008 1o 15:0", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("13", "127.0.0.1", "a", "30-01-2008 1o 15:0", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("14", "127.0.0.1", "a", "30-01-2008 1o 15:0", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("15", "127.0.0.1", "a", "30-01-2008 1o 15:0", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("16", "127.0.0.1", "a", "30-01-2008 1o 15:1", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("17", "127.0.0.1", "a", "30-01-2008 1o 15:1", "An?nimo", "1");
INSERT INTO kayapo_recherches VALUES("18", "127.0.0.1", "a", "30-01-2008 1o 17:1", "An?nimo", "2");


#
# Table structure for table 'kayapo_referer'
#

CREATE TABLE kayapo_referer (
  rid int(11) NOT NULL auto_increment,
  url varchar(100) NOT NULL default '',
  PRIMARY KEY  (rid),
  KEY rid (rid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_referer'
#



#
# Table structure for table 'kayapo_related'
#

CREATE TABLE kayapo_related (
  rid int(11) NOT NULL auto_increment,
  tid int(11) NOT NULL default '0',
  name varchar(30) NOT NULL default '',
  url varchar(200) NOT NULL default '',
  PRIMARY KEY  (rid),
  KEY rid (rid),
  KEY tid (tid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_related'
#



#
# Table structure for table 'kayapo_reviews'
#

CREATE TABLE kayapo_reviews (
  id int(10) NOT NULL auto_increment,
  date date NOT NULL default '0000-00-00',
  title varchar(150) NOT NULL default '',
  text text NOT NULL,
  reviewer varchar(20) default NULL,
  email varchar(60) default NULL,
  score int(10) NOT NULL default '0',
  cover varchar(100) NOT NULL default '',
  url varchar(100) NOT NULL default '',
  url_title varchar(50) NOT NULL default '',
  hits int(10) NOT NULL default '0',
  rlanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_reviews'
#



#
# Table structure for table 'kayapo_reviews_add'
#

CREATE TABLE kayapo_reviews_add (
  id int(10) NOT NULL auto_increment,
  date date default NULL,
  title varchar(150) NOT NULL default '',
  text text NOT NULL,
  reviewer varchar(20) NOT NULL default '',
  email varchar(60) default NULL,
  score int(10) NOT NULL default '0',
  url varchar(100) NOT NULL default '',
  url_title varchar(50) NOT NULL default '',
  rlanguage varchar(30) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_reviews_add'
#



#
# Table structure for table 'kayapo_reviews_comments'
#

CREATE TABLE kayapo_reviews_comments (
  cid int(10) NOT NULL auto_increment,
  rid int(10) NOT NULL default '0',
  userid varchar(25) NOT NULL default '',
  date datetime default NULL,
  comments text,
  score int(10) NOT NULL default '0',
  PRIMARY KEY  (cid),
  KEY cid (cid),
  KEY rid (rid),
  KEY userid (userid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_reviews_comments'
#



#
# Table structure for table 'kayapo_reviews_main'
#

CREATE TABLE kayapo_reviews_main (
  title varchar(100) default NULL,
  description text
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_reviews_main'
#

INSERT INTO kayapo_reviews_main VALUES("Reviews Section Title", "Reviews Section Long Description");


#
# Table structure for table 'kayapo_session'
#

CREATE TABLE kayapo_session (
  uname varchar(25) NOT NULL default '',
  time varchar(14) NOT NULL default '',
  host_addr varchar(48) NOT NULL default '',
  guest int(1) NOT NULL default '0',
  KEY time (time),
  KEY guest (guest)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_session'
#

INSERT INTO kayapo_session VALUES("127.0.0.1", "1204310222", "127.0.0.1", "1");


#
# Table structure for table 'kayapo_stats_date'
#

CREATE TABLE kayapo_stats_date (
  year smallint(6) NOT NULL default '0',
  month tinyint(4) NOT NULL default '0',
  date tinyint(4) NOT NULL default '0',
  hits bigint(20) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_stats_date'
#

INSERT INTO kayapo_stats_date VALUES("2008", "1", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "29", "187");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "30", "608");
INSERT INTO kayapo_stats_date VALUES("2008", "1", "31", "231");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "1", "56");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "6", "59");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "8", "1");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "12", "5");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "15", "3");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "21", "1");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "26", "35");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "2", "29", "1");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "3", "31", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "4", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "5", "31", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "6", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "7", "31", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "8", "31", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "9", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "10", "31", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "11", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "1", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "2", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "3", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "4", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "5", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "6", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "7", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "8", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "9", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "10", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "11", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "12", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "13", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "14", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "15", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "16", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "17", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "18", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "19", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "20", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "21", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "22", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "23", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "24", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "25", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "26", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "27", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "28", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "29", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "30", "0");
INSERT INTO kayapo_stats_date VALUES("2008", "12", "31", "0");


#
# Table structure for table 'kayapo_stats_hour'
#

CREATE TABLE kayapo_stats_hour (
  year smallint(6) NOT NULL default '0',
  month tinyint(4) NOT NULL default '0',
  date tinyint(4) NOT NULL default '0',
  hour tinyint(4) NOT NULL default '0',
  hits int(11) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_stats_hour'
#

INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "9", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "13", "31");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "14", "60");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "15", "16");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "16", "26");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "17", "54");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "29", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "7", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "8", "34");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "9", "52");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "10", "76");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "11", "91");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "13", "8");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "14", "70");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "15", "123");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "16", "100");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "17", "53");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "30", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "7", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "8", "30");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "9", "2");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "10", "21");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "11", "18");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "13", "26");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "14", "40");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "15", "31");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "16", "56");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "17", "6");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "1", "31", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "7", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "9", "7");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "10", "39");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "11", "9");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "15", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "1", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "8", "58");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "9", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "15", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "6", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "9", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "15", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "16", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "8", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "9", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "15", "5");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "12", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "9", "3");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "15", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "15", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "9", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "15", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "17", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "21", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "9", "35");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "15", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "26", "23", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "0", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "1", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "2", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "3", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "4", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "5", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "6", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "7", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "8", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "9", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "10", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "11", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "12", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "13", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "14", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "15", "1");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "16", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "17", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "18", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "19", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "20", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "21", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "22", "0");
INSERT INTO kayapo_stats_hour VALUES("2008", "2", "29", "23", "0");


#
# Table structure for table 'kayapo_stats_month'
#

CREATE TABLE kayapo_stats_month (
  year smallint(6) NOT NULL default '0',
  month tinyint(4) NOT NULL default '0',
  hits bigint(20) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_stats_month'
#

INSERT INTO kayapo_stats_month VALUES("2008", "1", "1026");
INSERT INTO kayapo_stats_month VALUES("2008", "2", "161");
INSERT INTO kayapo_stats_month VALUES("2008", "3", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "4", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "5", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "6", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "7", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "8", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "9", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "10", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "11", "0");
INSERT INTO kayapo_stats_month VALUES("2008", "12", "0");


#
# Table structure for table 'kayapo_stats_year'
#

CREATE TABLE kayapo_stats_year (
  year smallint(6) NOT NULL default '0',
  hits bigint(20) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_stats_year'
#

INSERT INTO kayapo_stats_year VALUES("2008", "1187");


#
# Table structure for table 'kayapo_stories'
#

CREATE TABLE kayapo_stories (
  sid int(11) NOT NULL auto_increment,
  catid int(11) NOT NULL default '0',
  aid varchar(30) NOT NULL default '',
  title varchar(80) default NULL,
  time datetime default NULL,
  hometext text,
  bodytext text NOT NULL,
  comments int(11) default '0',
  counter mediumint(8) unsigned default NULL,
  topic int(3) NOT NULL default '1',
  informant varchar(20) NOT NULL default '',
  notes text NOT NULL,
  ihome int(1) NOT NULL default '0',
  alanguage varchar(30) NOT NULL default '',
  acomm int(1) NOT NULL default '0',
  haspoll int(1) NOT NULL default '0',
  pollID int(10) NOT NULL default '0',
  score int(10) NOT NULL default '0',
  ratings int(10) NOT NULL default '0',
  associated text NOT NULL,
  PRIMARY KEY  (sid),
  KEY sid (sid),
  KEY catid (catid),
  KEY counter (counter),
  KEY topic (topic)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_stories'
#

INSERT INTO kayapo_stories VALUES("2", "0", "str", "Ser?o implantadas 30 novas unidades nos territ?rios agr?rios", "2008-01-30 15:58:03", "<p align=\"justify\"><font face=\"Verdana\" size=\"1\"><img height=\"86\" alt=\"A imagem ?http://www.cultura.gov.br/upload/web%2001_1175525047.jpg? cont?m erros e n?o pode ser exibida.\" src=\"http://www.cultura.gov.br/upload/web%2001_1175525047.jpg\" width=\"130\" align=\"left\" border=\"1\"/>&nbsp;Os minist&eacute;rios da Cultura (MinC) e do Desenvolvimento Agr&aacute;rio (MDA) pretendem lan&ccedil;ar um edital conjunto, ainda no primeiro semestre deste ano, para fomento de mais 30 Pontos de Cultura nos Territ&oacute;rios Rurais. A medida tem como objetivo ampliar o acesso da popula&ccedil;&atilde;o do campo &agrave; Cultura e vem ao encontro das reivindica&ccedil;&otilde;es feitas ao minist&eacute;rio, por jovens representantes do setor, reunidos em Bras&iacute;lia esta semana (de 26 a 29 de mar&ccedil;o), durante o <span style=\"FONT-STYLE: italic\">1&ordm; Festival Nacional da Juventude Rural</span>.</font></p>", "<p class=\"western\" style=\"MARGIN-BOTTOM: 0cm; FONT-FAMILY: verdana,arial,helvetica,sans-serif; TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\">A informa&ccedil;&atilde;o foi divulgada pelo gerente da Secretaria da Identidade e Diversidade Cultural do Minist&eacute;rio da Cultura (SID/MinC), Am&eacute;rico C&oacute;rdula, durante a audi&ecirc;ncia p&uacute;blica realizada nesta quinta-feira (dia 29), na C&acirc;mara dos Deputados, com a participa&ccedil;&atilde;o de representantes do Governo Federal e de parlamentares. Am&eacute;rico estava representando o secret&aacute;rio da SID, S&eacute;rgio Mamberti, que cumpria agenda de trabalho fora de Bras&iacute;lia. </font></p><div align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><p class=\"western\" style=\"MARGIN-BOTTOM: 0cm; FONT-FAMILY: verdana,arial,helvetica,sans-serif; TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\">Ainda dentro da estrat&eacute;gia de levar a arte ao campo e de fortalecer as express&otilde;es culturais da popula&ccedil;&atilde;o, o representante da SID/MinC comunicou a decis&atilde;o do minist&eacute;rio de destinar aos cineclubes dos Pontos de Cultura Rurais, por meio da </font><a href=\"http://www.cultura.gov.br/noticias/noticias_do_minc/index.php?p=24134&more=1&c=1&pb=1\"><span style=\"FONT-WEIGHT: bold\"><font size=\"1\">Programadora Brasil</font></span></a><font size=\"1\"> &ndash; projeto de difus&atilde;o do cinema brasileiro que promove a exibi&ccedil;&atilde;o de filmes em circuitos n&atilde;o-comerciais &ndash;, um cat&aacute;logo com 126 filmes nacionais.<br/></font></p><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><p class=\"western\" style=\"MARGIN-BOTTOM: 0cm; FONT-FAMILY: verdana,arial,helvetica,sans-serif; TEXT-ALIGN: justify\" align=\"justify\"><table style=\"WIDTH: 61px; HEIGHT: 254px\" align=\"right\" bgcolor=\"#e6e7e8\" border=\"0\" hspace=\"10\"><tbody><tr><td><font size=\"1\"><img alt=\"A imagem ?http://www.cultura.gov.br/upload/web%2002_1175525061.jpg? cont?m erros e n?o pode ser exibida.\" src=\"http://www.cultura.gov.br/upload/web%2002_1175525061.jpg\"/></font></td></tr><tr><td><font size=\"1\"><font style=\"COLOR: rgb(102,102,102); FONT-STYLE: italic\">Am&eacute;rico C&oacute;rdula, </font><font style=\"COLOR: rgb(102,102,102); FONT-STYLE: italic\">gerente da Secretaria da Identidade e Diversidade Cultural do Minist&eacute;rio da Cultura</font><br/></font></td></tr></tbody></table></p><p class=\"western\" style=\"MARGIN-BOTTOM: 0cm; FONT-FAMILY: verdana,arial,helvetica,sans-serif; TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\">Os Pontos de Cultura possuem computadores, com acesso &agrave; Internet banda larga, est&uacute;dio de grava&ccedil;&atilde;o de &aacute;udio e c&acirc;meras digitais, que possibilitam a produ&ccedil;&atilde;o de trabalhos audiovisuais. Atualmente, existem mais de 500 Pontos de Cultura em todo o pa&iacute;s, 18 deles nas &aacute;reas de assentamentos rurais.<br/></font></p><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><div style=\"TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\"></font></div><p class=\"western\" style=\"MARGIN-BOTTOM: 0cm; FONT-FAMILY: verdana,arial,helvetica,sans-serif; TEXT-ALIGN: justify\" align=\"justify\"><font size=\"1\">Durante a palestra que proferiu na audi&ecirc;ncia p&uacute;blica, o gerente da SID prestou um detalhado relato sobre as a&ccedil;&otilde;es do MinC destinadas a atender a juventude brasileira. Entre elas, citou a Rede Cultural dos Estudantes, uma parceria com a Uni&atilde;o Nacional dos Estudantes (UNE); a Caravana Universit&aacute;ria de Cultura e Arte Paschoal Carlos Magno; a cria&ccedil;&atilde;o de 13 Centros Universit&aacute;rios de Cultura e Arte (Cucas), em parceria com Pontos de Cultura; e os Semin&aacute;rios de Cultura Popular, que desde a &uacute;ltima edi&ccedil;&atilde;o (em 2006), contam com a participa&ccedil;&atilde;o de representantes de v&aacute;rios pa&iacute;ses latino-americanos.</font></p>", "0", "4", "2", "str", "", "0", "brazilian", "0", "0", "0", "0", "0", "2-");
INSERT INTO kayapo_stories VALUES("3", "0", "str", "Sindicato com novo site", "2008-02-26 09:06:50", "<font face=\"Verdana\" size=\"1\">Sindicato esta com novo site no ar.</font>", "<font face=\"Verdana\" size=\"1\">blablabalbalbalablabalbalbalkbalaba</font>", "0", "1", "3", "str", "", "0", "brazilian", "0", "0", "0", "0", "0", "3-");


#
# Table structure for table 'kayapo_stories_cat'
#

CREATE TABLE kayapo_stories_cat (
  catid int(11) NOT NULL auto_increment,
  title varchar(20) NOT NULL default '',
  counter int(11) NOT NULL default '0',
  PRIMARY KEY  (catid),
  KEY catid (catid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_stories_cat'
#



#
# Table structure for table 'kayapo_subscriptions'
#

CREATE TABLE kayapo_subscriptions (
  id int(10) NOT NULL auto_increment,
  userid int(10) default '0',
  subscription_expire varchar(50) NOT NULL default '',
  KEY id (id,userid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_subscriptions'
#



#
# Table structure for table 'kayapo_topics'
#

CREATE TABLE kayapo_topics (
  topicid int(3) NOT NULL auto_increment,
  topicname varchar(20) default NULL,
  topicimage varchar(20) default NULL,
  topictext varchar(40) default NULL,
  counter int(11) NOT NULL default '0',
  PRIMARY KEY  (topicid),
  KEY topicid (topicid)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_topics'
#

INSERT INTO kayapo_topics VALUES("2", "Not?cias Gerais", "folha.gif", "Not?cias Gerais", "0");
INSERT INTO kayapo_topics VALUES("3", "Not?cias da Regi?o", "folha.gif", "Not?cias da Regi?o", "0");


#
# Table structure for table 'kayapo_users'
#

CREATE TABLE kayapo_users (
  user_id int(11) NOT NULL auto_increment,
  name varchar(60) NOT NULL default '',
  username varchar(25) NOT NULL default '',
  user_email varchar(255) NOT NULL default '',
  femail varchar(255) NOT NULL default '',
  user_website varchar(255) NOT NULL default '',
  user_avatar varchar(255) NOT NULL default '',
  user_regdate varchar(20) NOT NULL default '',
  user_icq varchar(15) default NULL,
  user_occ varchar(100) default NULL,
  user_from varchar(100) default NULL,
  user_interests varchar(150) NOT NULL default '',
  user_sig varchar(255) default NULL,
  user_viewemail tinyint(2) default NULL,
  user_theme int(3) default NULL,
  user_aim varchar(18) default NULL,
  user_yim varchar(25) default NULL,
  user_msnm varchar(25) default NULL,
  user_password varchar(40) NOT NULL default '',
  storynum tinyint(4) NOT NULL default '10',
  umode varchar(10) NOT NULL default '',
  uorder tinyint(1) NOT NULL default '0',
  thold tinyint(1) NOT NULL default '0',
  noscore tinyint(1) NOT NULL default '0',
  bio tinytext NOT NULL,
  ublockon tinyint(1) NOT NULL default '0',
  ublock tinytext NOT NULL,
  theme varchar(255) NOT NULL default '',
  commentmax int(11) NOT NULL default '4096',
  counter int(11) NOT NULL default '0',
  newsletter int(1) NOT NULL default '0',
  user_posts int(10) NOT NULL default '0',
  user_attachsig int(2) NOT NULL default '0',
  user_rank int(10) NOT NULL default '0',
  user_level int(10) NOT NULL default '1',
  broadcast tinyint(1) NOT NULL default '1',
  popmeson tinyint(1) NOT NULL default '0',
  user_active tinyint(1) default '1',
  user_session_time int(11) NOT NULL default '0',
  user_session_page smallint(5) NOT NULL default '0',
  user_lastvisit int(11) NOT NULL default '0',
  user_timezone tinyint(4) NOT NULL default '10',
  user_style tinyint(4) default NULL,
  user_lang varchar(255) NOT NULL default 'brazilian',
  user_dateformat varchar(14) NOT NULL default 'D M d, Y g:i a',
  user_new_privmsg smallint(5) unsigned NOT NULL default '0',
  user_unread_privmsg smallint(5) unsigned NOT NULL default '0',
  user_last_privmsg int(11) NOT NULL default '0',
  user_emailtime int(11) default NULL,
  user_allowhtml tinyint(1) default '1',
  user_allowbbcode tinyint(1) default '1',
  user_allowsmile tinyint(1) default '1',
  user_allowavatar tinyint(1) NOT NULL default '1',
  user_allow_pm tinyint(1) NOT NULL default '1',
  user_allow_viewonline tinyint(1) NOT NULL default '1',
  user_notify tinyint(1) NOT NULL default '0',
  user_notify_pm tinyint(1) NOT NULL default '0',
  user_popup_pm tinyint(1) NOT NULL default '0',
  user_avatar_type tinyint(4) NOT NULL default '3',
  user_sig_bbcode_uid varchar(10) default NULL,
  user_actkey varchar(32) default NULL,
  user_newpasswd varchar(32) default NULL,
  points int(10) default '0',
  last_ip varchar(15) NOT NULL default '0',
  agreedtos tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (user_id),
  KEY uid (user_id),
  KEY uname (username),
  KEY user_session_time (user_session_time)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_users'
#

INSERT INTO kayapo_users VALUES("1", "", "Anonymous", "", "", "", "blank.gif", "Nov 10, 2000", "", "", "", "", "", "0", "0", "", "", "", "", "10", "", "0", "0", "0", "", "0", "", "", "4096", "0", "0", "0", "0", "0", "1", "0", "0", "1", "0", "0", "0", "10", NULL, "brazilian", "D M d, Y g:i a", "0", "0", "0", NULL, "1", "1", "1", "1", "1", "1", "1", "1", "0", "3", NULL, NULL, NULL, "0", "0", "0");
INSERT INTO kayapo_users VALUES("2", "", "Mandry", "mandry@casadaweb.net", "", "http://localhost/str", "gallery/blank.gif", "Jan 29, 2008", NULL, NULL, NULL, "", NULL, NULL, NULL, NULL, NULL, NULL, "e2f4b11ba4591d2a84e8462623b45d60", "10", "", "0", "0", "0", "", "0", "", "", "4096", "0", "0", "0", "0", "0", "2", "1", "0", "1", "1201717943", "-10", "1201717843", "10", NULL, "brazilian", "D M d, Y g:i a", "0", "0", "1201717865", NULL, "1", "1", "1", "1", "1", "1", "0", "0", "0", "3", NULL, NULL, NULL, "0", "127.0.0.1", "0");


#
# Table structure for table 'kayapo_users_temp'
#

CREATE TABLE kayapo_users_temp (
  user_id int(10) NOT NULL auto_increment,
  username varchar(25) NOT NULL default '',
  realname varchar(255) NOT NULL default '',
  user_email varchar(255) NOT NULL default '',
  user_password varchar(40) NOT NULL default '',
  user_regdate varchar(20) NOT NULL default '',
  check_num varchar(50) NOT NULL default '',
  time varchar(14) NOT NULL default '',
  PRIMARY KEY  (user_id)
) TYPE=MyISAM;



#
# Dumping data for table 'kayapo_users_temp'
#

