# phpMyAdmin MySQL-Dump
# version 2.2.1-rc1
# http://phpwizard.net/phpMyAdmin/
# http://phpmyadmin.sourceforge.net/ (download page)
#
# Serveur: localhost
# Généré le : Mercredi 17 Octobre 2001 à 08:12
# Version du serveur: 3.23.38
# Version de PHP: 4.0.4pl1
# Base de données: `kayapo`
# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_categories`
#

CREATE TABLE kayapo_gallery_categories (
  gallid int(3) NOT NULL auto_increment,
  gallname varchar(30) NOT NULL default '',
  gallimg varchar(50) NOT NULL default '',
  galloc longtext,
  description text NOT NULL,
  parent int(3) NOT NULL default '-1',
  visible tinyint(3) unsigned NOT NULL default '0',
  template int(10) unsigned NOT NULL default '2',
  thumbwidth int(2) unsigned NOT NULL default '70',
  numcol tinyint(3) unsigned NOT NULL default '3',
  total int(10) unsigned NOT NULL default '0',
  lastadd date NOT NULL default '0000-00-00',
  PRIMARY KEY  (gallid),
  KEY gallid (gallid)
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_categories`
#

INSERT INTO kayapo_gallery_categories VALUES ( '1', 'Art', 'gallery.gif', 'Art', 'Art Pictures', '-1', '2', '2', '70', '2', '7', '2001-06-22');
# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_comments`
#

CREATE TABLE kayapo_gallery_comments (
  cid int(11) NOT NULL auto_increment,
  pid int(4) NOT NULL default '0',
  comment text NOT NULL,
  date datetime NOT NULL default '0000-00-00 00:00:00',
  name varchar(255) default NULL,
  member int(1) NOT NULL default '0',
  PRIMARY KEY  (cid)
) TYPE=MyISAM;



#
# Contenu de la table `kayapo_gallery_comments`
#

INSERT INTO kayapo_gallery_comments VALUES ( '1', '1', 'cool art', '2000-12-19 12:18:53', 'dgrabows', '0');
INSERT INTO kayapo_gallery_comments VALUES ( '2', '1', 'Good job but could be better', '2001-05-18 17:50:04', 'MarsIsHere', '0');
INSERT INTO kayapo_gallery_comments VALUES ( '3', '1', 'Et voilà!!!', '2001-05-18 17:58:51', 'Webmaster', '1');
INSERT INTO kayapo_gallery_comments VALUES ( '4', '1', 'rororo', '2001-09-24 21:18:10', 'tororo', '0');
INSERT INTO kayapo_gallery_comments VALUES ( '5', '5', 'tititititititit', '2001-09-25 19:25:17', 'titi', '0');
# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_media_class`
#

CREATE TABLE kayapo_gallery_media_class (
  id int(2) NOT NULL default '0',
  class varchar(10) NOT NULL default '',
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_media_class`
#

INSERT INTO kayapo_gallery_media_class VALUES ( '1', 'Image');
INSERT INTO kayapo_gallery_media_class VALUES ( '2', 'Audio');
INSERT INTO kayapo_gallery_media_class VALUES ( '3', 'Video');
# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_media_types`
#

CREATE TABLE kayapo_gallery_media_types (
  extension varchar(10) NOT NULL default '',
  description text NOT NULL,
  filetype varchar(20) NOT NULL default '',
  displaytag text NOT NULL,
  thumbnail varchar(255) NOT NULL default '',
  PRIMARY KEY  (extension)
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_media_types`
#

INSERT INTO kayapo_gallery_media_types VALUES ( 'bmp', 'Image/BMP', '1', '<img src=\"<:FILENAME:>\" border=\"0\" alt=\"<:DESCRIPTION:>\">', 'image_gif.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'gif', 'Image/GIF', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_gif.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'jpg', 'Image/JPG', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_jpg.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'png', 'Image/PNG', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_png.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'mov', 'Video/Quicktime', '3', '<embed controller=\"true\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>', 'video_mov.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'avi', 'Video/AVI', '3', '<embed src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" type=\"application/x-mplayer2\"></embed>', 'video_avi.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'mpg', 'Video/MPEG', '3', '<embed src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" type=\"application/x-mplayer2\"></embed>', 'video_mpg.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'mp3', 'Audio/MP3', '2', '<embed controller=\"true\" width=\"200\" height=\"20\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>', 'audio_mp3.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'mid', 'Audio/MIDI', '2', '<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"true\" height=\"20\" width=\"200\"></embed>', 'audio_mid.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'swf', 'Video/Flash', '3', '<embed src=\"<:FILENAME:>\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" play=\"true\" loop=\"true\" quality=\"high\" scale=\"showall\" menu=\"true\"></embed>', 'video_swf.gif');
INSERT INTO kayapo_gallery_media_types VALUES ( 'rm', 'Video/RealMedia', '3', '<OBJECT>\" height=\"<:HEIGHT:>\">\n<PARAM NAME=\"CONTROLS\" VALUE=\"ImageWindow\">\n<PARAM NAME=\"AUTOSTART\" Value=\"true\">\n<PARAM NAME=\"SRC\" VALUE=\"<:FILENAME:>\">\n<embed height=\"<:HEIGHT:>\" width=\"<:WIDTH:>\" controls=\"ImageWindow\" src=\"<:FILENAME:>?embed\" type=\"audio/x-pn-realaudio-plugin\" autostart=\"true\" nolabels=\"0\" autogotourl=\"-1\"></OBJECT>', 'video_realmedia.gif');
# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_pictures`
#

CREATE TABLE kayapo_gallery_pictures (
  pid int(10) unsigned NOT NULL auto_increment,
  gid int(3) NOT NULL default '0',
  img varchar(255) NOT NULL default '',
  counter int(10) unsigned NOT NULL default '0',
  submitter varchar(24) NOT NULL default 'Webmaster',
  date datetime default NULL,
  name varchar(255) NOT NULL default '',
  description text NOT NULL,
  votes int(10) unsigned NOT NULL default '0',
  rate float NOT NULL default '0',
  extension varchar(10) NOT NULL default 'image',
  width smallint(5) unsigned NOT NULL default '0',
  height smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (pid),
  KEY pid (pid)
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_pictures`
#

INSERT INTO kayapo_gallery_pictures VALUES ( '1', '1', '1.jpg', '2', 'Webmaster', '2001-06-22 15:05:25', '1.jpg', '1.jpg', '0', '0', 'jpg', '413', '271');
INSERT INTO kayapo_gallery_pictures VALUES ( '2', '1', '2.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '2.jpg', '', '0', '0', 'jpg', '490', '370');
INSERT INTO kayapo_gallery_pictures VALUES ( '3', '1', '3.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '3.jpg', '', '0', '0', 'jpg', '216', '216');
INSERT INTO kayapo_gallery_pictures VALUES ( '4', '1', '4.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '4.jpg', '', '0', '0', 'jpg', '230', '290');
INSERT INTO kayapo_gallery_pictures VALUES ( '5', '1', '5.jpg', '6', 'Webmaster', '2001-06-22 15:05:25', '5.jpg', '', '0', '0', 'jpg', '232', '296');
INSERT INTO kayapo_gallery_pictures VALUES ( '6', '1', '6.jpg', '1', 'Webmaster', '2001-06-22 15:05:25', '6.jpg', '', '0', '0', 'jpg', '479', '370');
INSERT INTO kayapo_gallery_pictures VALUES ( '7', '1', 'kodred1.swf', '1', 'Webmaster', '2001-06-22 15:05:25', 'kodred1.swf', '', '0', '0', 'swf', '320', '240');
# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_pictures_newpicture`
#

CREATE TABLE kayapo_gallery_pictures_newpicture (
  pid int(10) unsigned NOT NULL auto_increment,
  gid int(3) NOT NULL default '0',
  img varchar(255) NOT NULL default '',
  counter int(10) unsigned NOT NULL default '0',
  submitter varchar(24) NOT NULL default 'Webmaster',
  date datetime default NULL,
  name varchar(255) NOT NULL default '',
  description text NOT NULL,
  votes int(10) unsigned NOT NULL default '0',
  rate float NOT NULL default '0',
  extension varchar(10) NOT NULL default 'image',
  width smallint(5) unsigned NOT NULL default '0',
  height smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (pid),
  KEY pid (pid)
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_pictures_newpicture`
#

# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_rate_check`
#

CREATE TABLE kayapo_gallery_rate_check (
  ip varchar(20) NOT NULL default '',
  time varchar(14) NOT NULL default '',
  pid int(10) unsigned NOT NULL default '0'
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_rate_check`
#

# --------------------------------------------------------

#
# Structure de la table `kayapo_gallery_template_types`
#

CREATE TABLE kayapo_gallery_template_types (
  id int(10) unsigned NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  type tinyint(3) unsigned NOT NULL default '2',
  templateCategory longtext NOT NULL,
  templatePictures longtext NOT NULL,
  templateCSS longtext,
  PRIMARY KEY  (id)
) TYPE=MyISAM;

#
# Contenu de la table `kayapo_gallery_template_types`
#

INSERT INTO kayapo_gallery_template_types VALUES ( '1', 'Default Main Page Template', '1', '<table align=\"center\">\n<tr>\n\t<td colspan=\"2\">\n\t\t<:GALLNAME:>\n\t</td>\n</tr>\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\" align=\"left\">\n\t\t<:DESCRIPTION:>\n\t</td>\n</tr>\n</table>', '2', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}');
INSERT INTO kayapo_gallery_template_types VALUES ( '2', 'Default', '2', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\">\n\t\t<p>\n\t\t\t\t<table>\n\t\t\t\t<tr>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:DATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:RATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:HITS:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:NEW:>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t\t</table>\n\t\t</p>\n\t\t<p>\n\t\t\t\t<:DESCRIPTION:>\n\t\t</p>\n\t\t<p>\n\t\t\t\t<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\n\t\t</p>\n\t</td>\n</tr>\n</table>', '<table>\n<tr>\n\t<td valign=\"top\" align=\"center\">\n\t\t<:NAMESIZE:>\n\t\t<br><br>\n\t\t<TABLE CellPadding=\"0\" CellSpacing=\"0\">\n\t\t<TR>\n\t\t\t<TD valign=\"top\">\n\t\t\t\t<:SUBMITTER:>\n\t\t\t\t<:DATE:>\n\t\t\t\t<:HITS:>\n\t\t\t\t<:RATE:>\n\t\t\t</TD>\n\t\t</TR>\n\t\t</table><br>\n\t\t<:RATINGBAR:><br>\n\t\t<:POSTCARD:><br>\n\t\t<:DOWNLOAD:><br>\n\t\t<:PRINT:>\n\t</td>\n\t<td width=\"80%\" align=\"center\">\n\t\t<:IMAGE:>\n\t</td>\n</tr>\n<tr>\n\t<td colspan=\"2\"><:DESCRIPTION:></td>\n</tr>\n<tr>\n\t<td colspan=\"2\">\n\t\t<:COMMENTS:>\n\t</td>\n</tr>\n</table>', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}');

