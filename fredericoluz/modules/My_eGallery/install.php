<?php
//################################################################/
//#                          MyGallery                           #/
//#                             By:                              #/
//#                          MarsIsHere                          #/
//#                     Credits to John COX                      #/
//#                     for the install file                     #/
//################################################################/


/* 
 *  My_eGallery Install Script.
 *  This script will set the database up, and do the basic configurations of the script.  Once this script has run, please delete this file from your root directory.  There is a security risk if you keep this file around.
 */

$ModName = $name;

include("modules/$name/include-public.inc");

function connect_db($dbhost, $dbuname, $dbpass, $dbname)
{
        @mysql_close();
        mysql_connect($dbhost, $dbuname, $dbpass) or die ("Unable connect to database");
        mysql_select_db($dbname) or die ("Unable to select database");
}

// Let's set up a header and a footer for a consistant appearance
function make_header()
{                          
	global $font; 

        include("header.php"); 
        OpenTable();
 	?>
            <center><font class="<?php echo $font['title']; ?>">My_eGallery Installation</font></center><br><br>
            <font class="<?php echo $font['normal']; ?>">This script will install the My_eGallery database and help you set up the variables that you need to start.  You will be taken through a variety of pages.  Each page sets a different portion of the script.  We estimate that this entire process will take about two minutes.  At any time that you get stuck, please visit our support forums for help.</font><br><br>
      <?php

}

//We need a footer as well.
function make_footer()
{
        global $font;
	?>
        <center>
        <font class="<?php echo $font['tiny']; ?>">Thank you for trying My_eGallery.</font>
        </center>
    <?php
          CloseTable();
          include("footer.php");
}


// Get Started and show the General Public License.
function show_license()
{
    global $ModName, $basepath, $font;
    make_header();
    ?>
        <font class="<?php echo $font['title']; ?>">Our License</font><font class="<?php echo $font['normal']; ?>"> -- Please read through the GNU General Public License.  My_eGallery is developed as free software, but there are certain requirements for distributing and editing.</font><br><br>
        <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <center>
        <textarea name="license" cols=50 rows=8><?php include("$basepath/docs/licence.txt"); ?></textarea><br><br>
        <INPUT type="submit" name="do" value="Next">
        </center>
        </form>
        <br><br>
        <?php
    make_footer();
}   

function get_dbinfo()
{
    global $dbname, $ModName, $font;
    make_header();
    ?>
    <font class="<?php echo $font['title']; ?>">Preliminary Info</font><font class="<?php echo $font['normal']; ?>"> -- Please enter your DB info.  If you do not have root access to your DB (virtual hosting, etc), you will need to make your database before your proceed on.  A good rule of thumb, if you cannot create databases through phpMyAdmin because of virtual hosting, or security on mySQL, then this script will not be able to create the db for you.  This script will still be able to fill the database, and will still need to be ran. </font><br><br>
    <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <center>
        <table>
            <tr><td align="left"><font class="<?php echo $font['normal']; ?>">DB Host</font></td>
            <td><input type="text" NAME="meg_dbhost" SIZE=30 maxlength=80 value="localhost"></td></tr>
            <tr><td align="left"><font class="<?php echo $font['normal']; ?>">DB User Name</font></td>
            <td><input type="text" NAME="meg_dbuname" SIZE=30 maxlength=80 value=""></td></tr>
            <tr><td align="left"><font class="<?php echo $font['normal']; ?>">DB Password</font></td>
            <td><input type="text" NAME="meg_dbpass" SIZE=30 maxlength=80 value=""></td></tr>
            <tr><td align="left"><font class="<?php echo $font['normal']; ?>">DB Name<br></font></td>
            <td><input type="text" NAME="meg_dbname" SIZE=30 maxlength=80 value="<? echo $dbname; ?>"></td></tr>
            <tr><td align="left"><font class="<?php echo $font['normal']; ?>">Table Prefix</font></td>
            <td><input type="text" NAME="meg_prefix" SIZE=30 maxlength=80 value="nuke"></td></tr>
        </table>
        <INPUT type="hidden" name="do" value="Check">
        <INPUT type="Submit" name="ok" value="Next">
        </center>
    </form>
    <?php
    make_footer();
}

function confirm_db($dbhost, $dbuname, $dbpass, $dbname, $prefix)
{
    global $ModName, $font;
    make_header();
    ?>
       
    <center><font class="<?php echo $font['title']; ?>"><strong>Fresh install?</strong></font> </center><b><br>
    <br><br>
    <center>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_categories; ?></font><br>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_comments; ?></font><br>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_pictures; ?></font><br> 
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_pictures_newpicture; ?></font><br>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_rate_check; ?></font><br>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_template_types; ?></font><br>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_media_class; ?></font><br>
    <font class="<?php echo $font['tiny']; ?>"><?php echo "$prefix"._gallery_media_types; ?></font><br>
    <br><br>
        <font class="<?php echo $font['normal']; ?>">Now, the install script will make the tables for you after hitting the 'New Install' button.</font>
        <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <INPUT type="hidden" NAME="meg_dbhost" value="<?php echo $dbhost;?>">
        <INPUT type="hidden" NAME="meg_dbuname" value="<?php echo $dbuname;?>">
        <INPUT type="hidden" NAME="meg_dbpass" value="<?php echo $dbpass;?>">
        <INPUT type="hidden" NAME="meg_dbname" value="<?php echo $dbname;?>">
        <INPUT type="hidden" NAME="meg_prefix" value="<?php echo $prefix;?>">
        <INPUT type="hidden" NAME="do" value="New_Install">
        <INPUT type="submit" name="ok" value="New Install">
        </form>
        </center>

        <center><font class="<?php echo $font['title']; ?>"><strong>Upgrading from previous version?</trong></font> </center>
        <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <center>
        <table width="50%" align=center>
        <tr>
        <td align="center">
        <INPUT type="hidden" NAME="meg_dbhost" value="<?php echo $dbhost;?>">
        <INPUT type="hidden" NAME="meg_dbuname" value="<?php echo $dbuname;?>">
        <INPUT type="hidden" NAME="meg_dbpass" value="<?php echo $dbpass;?>">
        <INPUT type="hidden" NAME="meg_dbname" value="<?php echo $dbname;?>">
        <INPUT type="hidden" NAME="meg_prefix" value="<?php echo $prefix;?>">
	<INPUT type="radio" NAME="version" value="2_0">From 2.0<br>
        <INPUT type="radio" NAME="version" value="2_1">From 2.1<br>
        <INPUT type="radio" NAME="version" value="2_2">From 2.2<br>
        <INPUT type="radio" NAME="version" value="2_3">From 2.3<br>
        <INPUT type="radio" NAME="version" value="2_4">From 2.4.x<br>
	<INPUT type="radio" NAME="version" value="2_5_7">From 2.5.x<br>
	<INPUT type="radio" NAME="version" value="2_6_6">From 2.6.x<br>
	<INPUT type="radio" NAME="version" value="2_7_5">From 2.7.5<br>
        <br><INPUT type="submit" name="do" value="Upgrade">
        </td>
        </tr>
        </table>
        </center>
        </form>
        
    <?php
    make_footer();
}

function make_db($dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbmake)
{
        global $ModName, $font;
    
        make_header();
        echo "<center>";
    	$result = mysql_query("CREATE TABLE $prefix"._gallery_categories." (gallid int(3) NOT NULL auto_increment,  gallname varchar(30) NOT NULL, gallimg varchar(50) NOT NULL, galloc longtext, description text NOT NULL, parent int(3) DEFAULT '-1' NOT NULL, visible tinyint(3) unsigned DEFAULT '0' NOT NULL, template int(10) unsigned DEFAULT '2' NOT NULL, thumbwidth INT (2) UNSIGNED DEFAULT '70' not null, numcol tinyint(3) unsigned DEFAULT '3' NOT NULL, total int(10) unsigned DEFAULT '0' NOT NULL, lastadd date DEFAULT '0000-00-00' NOT NULL, PRIMARY KEY (gallid), KEY gallid (gallid))") or die ("<b>Unable to make $prefix"._gallery_categories." </b>");
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_categories." Made.</font>";

    	$result = mysql_query("CREATE TABLE $prefix"._gallery_comments." ( cid int(10) unsigned NOT NULL auto_increment, pid int(10) unsigned DEFAULT '0' NOT NULL, comment text NOT NULL, date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL, name varchar(255), member tinyint(3) unsigned DEFAULT '0' NOT NULL, PRIMARY KEY (cid))") or die ("<b>Unable to make $prefix"._gallery_comments."</b>");
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_comments." Made.</font>";
    
	$result = mysql_query("CREATE TABLE $prefix"._gallery_pictures." ( pid int(10) unsigned NOT NULL auto_increment, gid int(3) DEFAULT '0' NOT NULL, img varchar(255) NOT NULL, counter int(10) unsigned DEFAULT '0' NOT NULL, submitter varchar(24) DEFAULT 'Webmaster' NOT NULL, date datetime, name varchar(255) NOT NULL, description text NOT NULL, votes int(10) unsigned DEFAULT '0' NOT NULL, rate float DEFAULT '0' NOT NULL, extension varchar(10) DEFAULT 'image' NOT NULL, width smallint(5) unsigned DEFAULT '0' NOT NULL, height smallint(5) unsigned DEFAULT '0' NOT NULL, PRIMARY KEY (pid), KEY pid (pid))") or die ("<b>Unable to make $prefix"._gallery_pictures." </b>"); 
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_pictures." Made.</font>";

	$result = mysql_query("CREATE TABLE $prefix"._gallery_pictures_newpicture." ( pid int(10) unsigned NOT NULL auto_increment, gid int(3) DEFAULT '0' NOT NULL, img varchar(255) NOT NULL, counter int(10) unsigned DEFAULT '0' NOT NULL, submitter varchar(24) DEFAULT 'Webmaster' NOT NULL, date datetime, name varchar(255) NOT NULL, description text NOT NULL, votes int(10) unsigned DEFAULT '0' NOT NULL, rate float DEFAULT '0' NOT NULL, extension varchar(10) DEFAULT 'image' NOT NULL, width smallint(5) unsigned DEFAULT '0' NOT NULL, height smallint(5) unsigned DEFAULT '0' NOT NULL, PRIMARY KEY (pid), KEY pid (pid))") or die ("<b>Unable to make $prefix"._gallery_pictures_newpicture." </b>"); 
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_pictures_newpicture." Made.</font>";
	
	$result = mysql_query("CREATE TABLE $prefix"._gallery_rate_check." ( ip varchar(20) NOT NULL, time varchar(14) NOT NULL, pid int(10) unsigned DEFAULT '0' NOT NULL)") or die ("<b>Unable to make $prefix"._gallery_rate_check." </b>"); 
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_rate_check." Made.</font>";

	$result = mysql_query("CREATE TABLE $prefix"._gallery_template_types." ( id int(10) unsigned NOT NULL auto_increment, title varchar(255) NOT NULL, type tinyint(3) unsigned DEFAULT '2' NOT NULL, templateCategory longtext NOT NULL, templatePictures longtext NOT NULL, templateCSS longtext, PRIMARY KEY (id))") or die ("<b>Unable to $prefix"._gallery_template_types." </b>"); 
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_template_types." Made.</font>";

	$result = mysql_query("CREATE TABLE $prefix"._gallery_media_class." ( id int(2) DEFAULT '0' NOT NULL, class varchar(10) NOT NULL, PRIMARY KEY (id), UNIQUE id (id))") or die ("<b>Unable to make $prefix"._gallery_media_class." </b>"); 
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_media_class." Made.</font>";

	$result = mysql_query("CREATE TABLE $prefix"._gallery_media_types." ( extension varchar(10) NOT NULL, description text NOT NULL, filetype varchar(20) NOT NULL, displaytag text NOT NULL, thumbnail varchar(255) NOT NULL, PRIMARY KEY (extension))") or die ("<b>Unable to make gallery_media_types </b>"); 
    	echo "<br><br><font class=\"".$font['tiny']."\"> $prefix"._gallery_media_types." Made.</font>";
    	
    	echo "<br></center><br>";
    ?>
    <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <center>
        <table width="50%" align=center>
        <tr>
        <td align=center>
        <INPUT type="hidden" NAME="meg_dbhost" value="<?php echo $dbhost;?>">
        <INPUT type="hidden" NAME="meg_dbuname" value="<?php echo $dbuname;?>">
        <INPUT type="hidden" NAME="meg_dbpass" value="<?php echo $dbpass;?>">
        <INPUT type="hidden" NAME="meg_dbname" value="<?php echo $dbname;?>">
        <INPUT type="hidden" NAME="meg_prefix" value="<?php echo $prefix;?>">
        <INPUT type="submit" name="do" value="Continue">
        </td>
        </tr>
        </table>
        </center>
        </form>
        
    <?php

    make_footer();
}


function input_data($dbhost, $dbuname, $dbpass, $dbname, $prefix, $aid, $name, $pwd, $email, $url)
{
    global $ModName, $font;
    
    make_header();
    echo "<center>";

	$result = mysql_query("INSERT INTO $prefix"._gallery_categories." (gallid, gallname, gallimg, galloc, description, parent, visible, template, numcol, total, lastadd) VALUES ( '1', 'Art', 'gallery.gif', 'Art', 'Art Pictures', -1, 2, 2, 2, 6, '')") or die ("<b>Unable to update $prefix"._gallery_categories."</b>");
    	echo "<br><font class=\"".$font['tiny']."\" $prefix"._gallery_categories." Updated.</font>";

	$result = mysql_query("INSERT INTO $prefix"._gallery_comments." (cid, pid, comment, date, name, member) VALUES ( '1', '1', 'cool art', '2000-12-19 12:18:53', 'dgrabows', '0')") or die ("<b>Unable to update $prefix"._gallery_comments."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_comments." (cid, pid, comment, date, name, member) VALUES ( '2', '1', 'Good job but could be better', '2001-05-18 17:50:04', 'MarsIsHere', '0')") or die ("<b>Unable to update $prefix"._gallery_comments."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_comments." (cid, pid, comment, date, name, member) VALUES ( '3', '1', 'Et voilà!!!', '2001-05-18 17:58:51', 'Webmaster', '1')") or die ("<b>Unable to update $prefix"._gallery_comments."</b>");
	echo "<br><font class=\"".$font['tiny']."\" $prefix"._gallery_comments." Updated.</font>";
	
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '1', '1', '1.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '1.jpg', '1.jpg', '0', '0', 'jpg', '413', '271')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '2', '1', '2.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '2.jpg', '', '0', '0', 'jpg', '490', '370')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '3', '1', '3.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '3.jpg', '', '0', '0', 'jpg', '216', '216')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '4', '1', '4.jpg', '0', 'Webmaster', '2001-06-22 15:05:25', '4.jpg', '', '0', '0', 'jpg', '230', '290')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '5', '1', '5.jpg', '2', 'Webmaster', '2001-06-22 15:05:25', '5.jpg', '', '0', '0', 'jpg', '232', '296')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '6', '1', '6.jpg', '1', 'Webmaster', '2001-06-22 15:05:25', '6.jpg', '', '0', '0', 'jpg', '479', '370')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_pictures." VALUES ( '7', '1', 'kodred1.swf', '1', 'Webmaster', '2001-06-22 15:05:25', 'kodred1.swf', '', '0', '0', 'swf', '320', '240')") or die ("<b>Unable to update $prefix"._gallery_pictures."</b>");
	echo "<br><font class=\"".$font['tiny']."\" $prefix"._gallery_pictures." Updated.</font>";

	$result = mysql_query("INSERT INTO $prefix"._gallery_template_types." (id, title, type, templateCategory, templatePictures, templateCSS) VALUES ('1', 'Default Main Page Template', '1', '<table align=\"center\">\n<tr>\n\t<td colspan=\"2\">\n\t\t<:GALLNAME:>\n\t</td>\n</tr>\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\" align=\"left\">\n\t\t<:DESCRIPTION:>\n\t</td>\n</tr>\n</table>', '2', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}')") or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_template_types." (id, title, type, templateCategory, templatePictures, templateCSS) VALUES ('2', 'Default', '2', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\">\n\t\t<p>\n\t\t\t\t<table>\n\t\t\t\t<tr>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:DATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:RATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:HITS:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:NEW:>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t\t</table>\n\t\t</p>\n\t\t<p>\n\t\t\t\t<:DESCRIPTION:>\n\t\t</p>\n\t\t<p>\n\t\t\t\t<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\n\t\t</p>\n\t</td>\n</tr>\n</table>', '<table>\n<tr>\n\t<td valign=\"top\" align=\"center\">\n\t\t<:NAMESIZE:>\n\t\t<br><br>\n\t\t<TABLE CellPadding=\"0\" CellSpacing=\"0\">\n\t\t<TR>\n\t\t\t<TD valign=\"top\">\n\t\t\t\t<:SUBMITTER:>\n\t\t\t\t<:DATE:>\n\t\t\t\t<:HITS:>\n\t\t\t\t<:RATE:>\n\t\t\t</TD>\n\t\t</TR>\n\t\t</table><br>\n\t\t<:RATINGBAR:><br>\n\t\t<:POSTCARD:><br>\n\t\t<:DOWNLOAD:><br>\n\t\t<:PRINT:>\n\t</td>\n\t<td width=\"80%\" align=\"center\">\n\t\t<:IMAGE:>\n\t</td>\n</tr>\n<tr>\n\t<td colspan=\"2\"><:DESCRIPTION:></td>\n</tr>\n<tr>\n\t<td colspan=\"2\">\n\t\t<:COMMENTS:>\n\t</td>\n</tr>\n</table>', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}')") or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
	echo "<br><font class=\"".$font['tiny']."\" $prefix"._gallery_template_types." Updated.</font>";

	$result = mysql_query("INSERT INTO $prefix"._gallery_media_class." VALUES ( '1', 'Image')") or die ("<b>Unable to update $prefix"._gallery_media_class."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_class." VALUES ( '2', 'Audio')") or die ("<b>Unable to update $prefix"._gallery_media_class."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_class." VALUES ( '3', 'Video')") or die ("<b>Unable to update $prefix"._gallery_media_class."</b>");
	echo "<br><font class=\"".$font['tiny']."\" $prefix"._gallery_media_class." Updated.</font>";

	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'bmp', 'Image/BMP', '1', '<img src=\"<:FILENAME:>\" border=\"0\" alt=\"<:DESCRIPTION:>\">', 'image_gif.gif')") or die ("<b>Unable to $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'gif', 'Image/GIF', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_gif.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'jpg', 'Image/JPG', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_jpg.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'png', 'Image/PNG', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_png.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'mov', 'Video/Quicktime', '3', '<embed controller=\"true\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>', 'video_mov.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'avi', 'Video/AVI', '3', '<embed src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" type=\"application/x-mplayer2\"></embed>', 'video_avi.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'mpg', 'Video/MPEG', '3', '<embed src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" type=\"application/x-mplayer2\"></embed>', 'video_mpg.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'mp3', 'Audio/MP3', '2', '<embed controller=\"true\" width=\"200\" height=\"20\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>', 'audio_mp3.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'mid', 'Audio/MIDI', '2', '<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"true\" height=\"20\" width=\"200\"></embed>', 'audio_mid.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'swf', 'Video/Flash', '3', '<embed src=\"<:FILENAME:>\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" play=\"true\" loop=\"true\" quality=\"high\" scale=\"showall\" menu=\"true\"></embed>', 'video_swf.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	$result = mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ( 'rm', 'Video/RealMedia', '3', '<OBJECT>\" height=\"<:HEIGHT:>\">\n<PARAM NAME=\"CONTROLS\" VALUE=\"ImageWindow\">\n<PARAM NAME=\"AUTOSTART\" Value=\"true\">\n<PARAM NAME=\"SRC\" VALUE=\"<:FILENAME:>\">\n<embed height=\"<:HEIGHT:>\" width=\"<:WIDTH:>\" controls=\"ImageWindow\" src=\"<:FILENAME:>?embed\" type=\"audio/x-pn-realaudio-plugin\" autostart=\"true\" nolabels=\"0\" autogotourl=\"-1\"></OBJECT>', 'video_realmedia.gif')") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
	echo "<br><font class=\"".$font['tiny']."\" $prefix"._gallery_media_types." Updated.</font>";
	echo "<br>";
	
        echo "<br></center><br><br>";
    ?>
    <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <INPUT type="hidden" NAME="meg_dbhost" value="<?php echo $dbhost;?>">
        <INPUT type="hidden" NAME="meg_dbuname" value="<?php echo $dbuname;?>">
        <INPUT type="hidden" NAME="meg_dbpass" value="<?php echo $dbpass;?>">
        <INPUT type="hidden" NAME="meg_dbname" value="<?php echo $dbname;?>">
        <INPUT type="hidden" NAME="meg_prefix" value="<?php echo $prefix;?>">
        <center>
        <table width="50%">
        <tr>
        <td align=center>
	<INPUT type="submit" name="do" value="Finish">
        </td>
        </tr>
        </table>
        </center>
        </form>
    <?php

    make_footer();
}

function set_configuration()
{
    global $ModName, $basepath, $baseurl, $font;
    make_header();
  
    
    
    ?>
    <center><br><hr><br><font class="<?php echo $font['title']; ?>">The Credits</font><font class="<?php echo $font['normal']; ?>"> -- These are the scripts and people that make My_egallery go.  Take some time and let these people know how much you appreciate their work.  If you would like to be listed here, contact us about being a part of the developement team.  We are always looking for some help.</font></center><br><br>
    <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
    <center>
    <textarea name="license" cols=50 rows=20><?php include("$basepath/docs/credits.txt"); ?></textarea><br><br>
    <font class="<?php echo $font['normal']; ?>">You are now done with the My_eGallery installation. If you run into any problems, let us know.</font>
    <br><br>
    <font class="<?php echo $font['normal']; ?>"><a href="<?php echo $baseurl; ?>">Run My_eGallery Now</a></font>
    </center>
    </form>
    <br><br>
    <?php
    
    make_footer();
}

/******************************************
 * Functions
 ******************************************/

function do_upgrade ($dbhost, $dbuname, $dbpass, $dbname, $prefix, $version)
{

        global $ModName, $font;
# File to upgrade My_eGallery
# After use this file, you can safely delete it
# Change the parameters to fit your info:
//************************************************************

    	make_header();
    	echo "<center>";
	switch ($version) {
		case "2_0":
			mysql_query("CREATE TABLE gallery_pictures_newpicture (pid int(4) NOT NULL auto_increment, gid int(3) DEFAULT '0' NOT NULL,img varchar(40) NOT NULL,counter int(4) DEFAULT '0' NOT NULL,submitter varchar(24) DEFAULT 'Webmaster' NOT NULL,date datetime,name varchar(25) NOT NULL,description text NOT NULL,votes int(5) DEFAULT '0' NOT NULL,rate float DEFAULT '0' NOT NULL,PRIMARY KEY (pid),KEY pid (pid))");
		case "2_1":
		case "2_2":
		case "2_3":
			mysql_query("ALTER TABLE gallery_categories CHANGE galloc galloc LONGTEXT, CHANGE visible visible TINYINT UNSIGNED NOT NULL DEFAULT 0, ADD template INT UNSIGNED NOT NULL DEFAULT 2 AFTER visible, ADD numcol TINYINT UNSIGNED NOT NULL DEFAULT 3 AFTER template, ADD total INT UNSIGNED NOT NULL DEFAULT 0 AFTER numcol, ADD lastadd DATE AFTER total");
			mysql_query("ALTER TABLE gallery_comments CHANGE cid cid INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE pid pid INT UNSIGNED NOT NULL DEFAULT 0, CHANGE member member TINYINT UNSIGNED NOT NULL DEFAULT 0");
			mysql_query("ALTER TABLE gallery_pictures CHANGE pid pid INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE img img VARCHAR(255) NOT NULL,	CHANGE counter counter INT UNSIGNED NOT NULL DEFAULT 0,	CHANGE name name VARCHAR(255) NOT NULL,	CHANGE votes votes INT UNSIGNED NOT NULL DEFAULT 0");
			mysql_query("ALTER TABLE gallery_pictures_newpicture CHANGE pid pid INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE img img VARCHAR(255) NOT NULL, CHANGE counter counter INT UNSIGNED NOT NULL DEFAULT 0, CHANGE name name VARCHAR(255) NOT NULL, CHANGE votes votes INT UNSIGNED NOT NULL DEFAULT 0");
			mysql_query("CREATE TABLE gallery_template_types ( id int(10) unsigned NOT NULL auto_increment, title varchar(255) NOT NULL, type tinyint(3) unsigned DEFAULT '2' NOT NULL, templateCategory longtext NOT NULL, templatePictures longtext NOT NULL, templateCSS longtext, PRIMARY KEY (id))");
			mysql_query("INSERT INTO gallery_template_types (id, title, type, templateCategory, templatePictures, templateCSS) VALUES ('1', 'Default Main Page Template', '1', '<table align=\"center\">\n<tr>\n\t<td colspan=\"2\">\n\t\t<:GALLNAME:>\n\t</td>\n</tr>\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\" align=\"left\">\n\t\t<:DESCRIPTION:>\n\t</td>\n</tr>\n</table>', '2', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}')") or die ("<b>Unable to update gallery_template_types</b>");
			mysql_query("INSERT INTO gallery_template_types (id, title, type, templateCategory, templatePictures, templateCSS) VALUES ('2', 'Default', '2', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\">\n\t\t<table>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<table>\n\t\t\t\t<tr>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:DATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:RATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:HITS:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:NEW:>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t\t</table>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<:DESCRIPTION:>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\n\t\t\t</td>\n\t\t</tr>\n\t\t</table>\n\t</td>\n</tr>\n</table>', '<table>\n<tr>\n\t<td valign=\"top\" align=\"center\">\n\t\t<:NAMESIZE:>\n\t\t<br><br>\n\t\t<TABLE CellPadding=\"0\" CellSpacing=\"0\">\n\t\t<TR>\n\t\t\t<TD valign=\"top\">\n\t\t\t\t<:SUBMITTER:>\n\t\t\t\t<:DATE:>\n\t\t\t\t<:HITS:>\n\t\t\t\t<:RATE:>\n\t\t\t</TD>\n\t\t</TR>\n\t\t</table><br>\n\t\t<:RATINGBAR:>\n\t</td>\n\t<td width=\"80%\" align=\"center\">\n\t\t<:IMAGE:>\n\t</td>\n</tr>\n<tr>\n\t<td colspan=\"2\"><:DESCRIPTION:></td>\n</tr>\n<tr>\n\t<td colspan=\"2\">\n\t\t<:COMMENTS:>\n\t</td>\n</tr>\n</table>', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}')") or die ("<b>Unable to update gallery_template_types</b>");
			// Convert old Templates
			if($result = mysql_query("select g1.gid, g1. templateCategory, g1.templatePictures, g1.numcol from $prefix"._gallery_template." g1, $prefix"._gallery_template." g2 where g1.id>1 and ((g1.templateCategory <>g2.templateCategory and g2.gid=0) or (g1.templatePictures <>g2.templatePictures and g2.gid=0))")) {
			$i = 1;
			while(list($cid, $cat, $pic, $col) = mysql_fetch_array($result)) {
				mysql_query("INSERT INTO gallery_template_types (id, title, type, templateCategory, templatePictures, templateCSS) VALUES (NULL, 'User Template $i', 2, '$cat', '$pic', '.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}')");
				mysql_query("UPDATE gallery_categories set template=LAST_INSERT_ID(), numcol=$col where gallid=$cid");
				$i++;
			}
			mysql_query("DROP TABLE gallery_template");
	}

		case "2.4":
			mysql_query("ALTER TABLE gallery_pictures ADD extension varchar(10) NOT NULL, ADD width smallint(5) unsigned DEFAULT '0' NOT NULL, ADD height smallint(5) unsigned DEFAULT '0' NOT NULL");
			mysql_query("ALTER TABLE gallery_pictures_newpicture ADD extension varchar(10) NOT NULL, ADD width smallint(5) unsigned DEFAULT '0' NOT NULL, ADD height smallint(5) unsigned DEFAULT '0' NOT NULL");
			mysql_query("CREATE TABLE gallery_media_class ( id int(2) DEFAULT '0' NOT NULL, class varchar(10) NOT NULL, PRIMARY KEY (id), UNIQUE id (id))");
			mysql_query("CREATE TABLE gallery_media_types ( extension varchar(10) NOT NULL, description text NOT NULL, filetype varchar(20) NOT NULL, displaytag text NOT NULL, thumbnail varchar(255) NOT NULL, PRIMARY KEY (extension))");
			mysql_query("INSERT INTO gallery_media_class VALUES ( '1', 'Image')") or die ("<b>Unable to update gallery_media_class</b>");
			mysql_query("INSERT INTO gallery_media_class VALUES ( '2', 'Audio')") or die ("<b>Unable to update gallery_media_class</b>");
			mysql_query("INSERT INTO gallery_media_class VALUES ( '3', 'Video')") or die ("<b>Unable to update gallery_media_class</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'gif', 'Image/GIF', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_gif.gif')") or die ("<b>Unable to update gallery_media_types/b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'jpg', 'Image/JPG', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_jpg.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'png', 'Image/PNG', '1', '<img src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" alt=\"<:DESCRIPTION:>\">', 'image_png.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'mov', 'Video/Quicktime', '3', '<embed controller=\"true\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>', 'video_mov.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'avi', 'Video/AVI', '3', '<embed src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" type=\"application/x-mplayer2\"></embed>', 'video_avi.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'mpg', 'Video/MPEG', '3', '<embed src=\"<:FILENAME:>\" border=\"0\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" type=\"application/x-mplayer2\"></embed>', 'video_mpg.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'mp3', 'Audio/MP3', '2', '<embed controller=\"true\" width=\"200\" height=\"20\" src=\"<:FILENAME:>\" border=\"0\" pluginspage=\"http://www.apple.com/quicktime/download/indext.html\"></embed>', 'audio_mp3.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'mid', 'Audio/MIDI', '2', '<embed src=\"<:FILENAME:>\" type=\"audio/midi\" hidden=\"false\" autostart=\"true\" loop=\"true\" height=\"20\" width=\"200\"></embed>', 'audio_mid.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'swf', 'Video/Flash', '3', '<embed src=\"<:FILENAME:>\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" width=\"<:WIDTH:>\" height=\"<:HEIGHT:>\" play=\"true\" loop=\"true\" quality=\"high\" scale=\"showall\" menu=\"true\"></embed>', 'video_swf.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("INSERT INTO gallery_media_types VALUES ( 'rm', 'Video/RealMedia', '3', '<OBJECT                                                                                 >\" height=\"<:HEIGHT:>\">\n<PARAM NAME=\"CONTROLS\" VALUE=\"ImageWindow\">\n<PARAM NAME=\"AUTOSTART\" Value=\"true\">\n<PARAM NAME=\"SRC\" VALUE=\"<:FILENAME:>\">\n<embed height=\"<:HEIGHT:>\" width=\"<:WIDTH:>\" controls=\"ImageWindow\" src=\"<:FILENAME:>?embed\" type=\"audio/x-pn-realaudio-plugin\" autostart=\"true\" nolabels=\"0\" autogotourl=\"-1\"></OBJECT>', 'video_realmedia.gif')") or die ("<b>Unable to update gallery_media_types</b>");
			mysql_query("UPDATE gallery_pictures SET extension='jpg' where img like '%.jpg'");
			mysql_query("UPDATE gallery_pictures SET extension='gif' where img like '%.gif'");
			mysql_query("UPDATE gallery_pictures SET extension='png' where img like '%.png'");
		case "2_5_7":
			mysql_query("ALTER TABLE gallery_categories RENAME $prefix"._gallery_categories."");
			mysql_query("ALTER TABLE gallery_comments RENAME $prefix"._gallery_comments."");
			mysql_query("ALTER TABLE gallery_pictures RENAME $prefix"._gallery_pictures."");
			mysql_query("ALTER TABLE gallery_pictures_newpicture RENAME $prefix"._gallery_pictures_newpicture."");
			mysql_query("ALTER TABLE gallery_template_types RENAME $prefix"._gallery_template_types."");
			mysql_query("ALTER TABLE gallery_rate_check RENAME $prefix"._gallery_rate_check."");
			mysql_query("ALTER TABLE gallery_media_class RENAME $prefix"._gallery_media_class."");
			mysql_query("ALTER TABLE gallery_media_types RENAME $prefix"._gallery_media_types."");
			$result = mysql_query("SELECT * FROM $prefix"._gallery_template_types." WHERE id=1");
			$row = mysql_fetch_array($result);
			mysql_query("INSERT INTO $prefix"._gallery_template_types." (id, title, type, templateCategory, templatePictures, templateCSS) VALUES (NULL, 'Default Main Page Template 2.5.7', '1', '$row[templateCategory]', '$row[templatePictures]', '$row[templateCSS]')") or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
			$result = mysql_query("SELECT * FROM $prefix"._gallery_template_types." WHERE id=2");
			$row = mysql_fetch_array($result);
			mysql_query("INSERT INTO $prefix"._gallery_template_types." (id, title, type, templateCategory, templatePictures, templateCSS) VALUES (NULL, 'Default 2.5.7', '2', '$row[templateCategory]', '$row[templatePictures]', '$row[templateCSS]')") 
				or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
			mysql_query("UPDATE $prefix"._gallery_template_types." SET title='Default Main Page Template', type='1', templateCategory='<table align=\"center\">\n<tr>\n\t<td colspan=\"2\">\n\t\t<:GALLNAME:>\n\t</td>\n</tr>\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\" align=\"left\">\n\t\t<:DESCRIPTION:>\n\t</td>\n</tr>\n</table>', templatePictures='2', templateCSS='.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}' WHERE id=1") or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
			mysql_query("UPDATE $prefix"._gallery_template_types." SET title='Default', type='2', templateCategory='<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\">\n\t\t<table>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<table>\n\t\t\t\t<tr>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:DATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:RATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:HITS:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:NEW:>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t\t</table>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<:DESCRIPTION:>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\n\t\t\t</td>\n\t\t</tr>\n\t\t</table>\n\t</td>\n</tr>\n</table>', templatePictures='<table>\n<tr>\n\t<td valign=\"top\" align=\"center\">\n\t\t<:NAMESIZE:>\n\t\t<br><br>\n\t\t<TABLE CellPadding=\"0\" CellSpacing=\"0\">\n\t\t<TR>\n\t\t\t<TD valign=\"top\">\n\t\t\t\t<:SUBMITTER:>\n\t\t\t\t<:DATE:>\n\t\t\t\t<:HITS:>\n\t\t\t\t<:RATE:>\n\t\t\t</TD>\n\t\t</TR>\n\t\t</table><br>\n\t\t<:RATINGBAR:><br>\n\t\t<:POSTCARD:><br>\n\t\t<:DOWNLOAD:><br>\n\t\t<:PRINT:>\n\t</td>\n\t<td width=\"80%\" align=\"center\">\n\t\t<:IMAGE:>\n\t</td>\n</tr>\n<tr>\n\t<td colspan=\"2\"><:DESCRIPTION:></td>\n</tr>\n<tr>\n\t<td colspan=\"2\">\n\t\t<:COMMENTS:>\n\t</td>\n</tr>\n</table>', templateCSS='.common_text_black {text-color:#000000}\n.common_text_white {text-color:#ffffff}' WHERE id=2") or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
		case "2_6_6":
			$result = mysql_query("SELECT * FROM $prefix"._gallery_media_types." WHERE extension='bmp'");
			if (mysql_num_rows($result)>0)
				$result = mysql_query("UPDATE $prefix"._gallery_media_types." SET displaytag='<img src=\"<:FILENAME:>\" border=\"0\" alt=\"<:DESCRIPTION:>\">' WHERE extension='bmp'") or die ("<b>Unable to update $prefix"._gallery_media_types."</b>");
			else
				mysql_query("INSERT INTO $prefix"._gallery_media_types." VALUES ('bmp', 'Image/BMP', '1', '<img src=\"<:FILENAME:>\" border=\"0\" alt=\"<:DESCRIPTION:>\">', 'image_gif.gif')") or die ("<b>Unable to $prefix"._gallery_media_types."</b>");
			mysql_query("UPDATE $prefix"._gallery_template_types." set templateCategory='<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\">\n\t\t<p>\n\t\t\t\t<table>\n\t\t\t\t<tr>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:DATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:RATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:HITS:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:NEW:>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t\t</table>\n\t\t</p>\n\t\t<p>\n\t\t\t\t<:DESCRIPTION:>\n\t\t</p>\n\t\t<p>\n\t\t\t\t<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\n\t\t</p>\n\t</td>\n</tr>\n</table>' where templateCategory='<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n\n\t<td>\n\t\t<:IMAGE:>\n\t</td>\n\t<td valign=\"top\">\n\t\t<table>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<table>\n\t\t\t\t<tr>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:DATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:RATE:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:HITS:>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td align=\"center\">\n\t\t\t\t\t\t<:NEW:>\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t\t</table>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<:DESCRIPTION:>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<td>\n\t\t\t\t<:NBCOMMENTS:> | <:FORMAT:> | <:SIZE:>\n\t\t\t</td>\n\t\t</tr>\n\t\t</table>\n\t</td>\n</tr>\n</table>'") or die ("<b>Unable to update $prefix"._gallery_template_types."</b>");
			mysql_query("ALTER TABLE $prefix"._gallery_categories." ADD thumbwidth INT (2) UNSIGNED DEFAULT '70' not null AFTER template") or die ("<b>Unable to update $prefix"._gallery_categories."</b>");
		case "2_7_5":
			mysql_query("ALTER TABLE $prefix"._gallery_comments." CHANGE `comment` `comment` TEXT NOT NULL") or die ("<b>Unable to update $prefix"._gallery_comments."</b>");
		default: 
			echo "Update finished <br><br>";
			break;

	}	
	
	echo "You can now delete this script and enjoy My_eGallery. <br><br>";
    	echo "</center>";
    ?>
    <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=install"; ?>" method="post">
        <INPUT type="hidden" NAME="meg_dbhost" value="<?php echo $dbhost;?>">
        <INPUT type="hidden" NAME="meg_dbuname" value="<?php echo $dbuname;?>">
        <INPUT type="hidden" NAME="meg_dbpass" value="<?php echo $dbpass;?>">
        <INPUT type="hidden" NAME="meg_dbname" value="<?php echo $dbname;?>">
        <INPUT type="hidden" NAME="meg_prefix" value="<?php echo $prefix;?>">
        <center>
        <table width="50%">
        <tr>
        <td align=center>
	<INPUT type="submit" name="do" value="Finish">
        </td>
        </tr>
        </table>
        </center>
        </form>
    <?php

    make_footer();

}


switch($do)
{
        case "Next":
        get_dbinfo();
        break;

        case "Check":
                $out = "";
                if ($dbuname!=$meg_dbuname || $dbpass!=$meg_dbpass) {
                        $out = "<center>Bad Login or Password<br><br><a href='javascript:history.go(-1)'>Go Back</a></center>";
                }
                if ($dbname!=$meg_dbname) {
                        $out = "<center>Bad database Name<br><br><a href='javascript:history.go(-1)'>Go Back</a></center>";
                }
                if ($out!="") {
                        include("header.php");
                        OpenTable();
                        echo $out;
                        CloseTable();
                        include("footer.php");
                        exit();
                }

        case "Perm":
                include("header.php");
                OpenTable();

                $file = $adminpath.'/config.php';
                $mode = fileperms($file);
                $mode &= 0x1ff; # Remove the bits we don't need

                $chmod = sprintf("%o", $mode);
                echo "<font class=\"".$font['title']."\">CHMOD Check</font><BR><BR>";

                echo "<font class=\"".$font['title']."\">We will first check to see that your CHMOD settings are correct in order for the script to write to the file.  If your settings are not correct, this script will not be able to encrypt your data in your config file.  Encrypting the SQL data is added security, and is set by this script.  You will also not be able to update your preferences from your admin once your site is up and running.</font>"; 
                if ($chmod == '666'){
                echo "<P><font class=\"".$font['title']."\">CHMOD setting for config.php is 666 -- correct, this script can write to the file</font></P>"
                             ."<P><form action=\"modules.php?op=modload&amp;name=$ModName&amp;file=install\" method=\"post\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbhost\" value=\"$meg_dbhost\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbuname\" value=\"$meg_dbuname\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbpass\" value=\"$meg_dbpass\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbname\" value=\"$meg_dbname\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_prefix\" value=\"$meg_prefix\">"
                                ."<center>";
                                    echo "<INPUT type=\"hidden\" name=\"do\" value=\"Submit\">"    
                                    ."<INPUT type=\"submit\" value=\"Continue\">"
                                ."</center>"
                            ."</form></P>";
                } else {
                            echo "<font class=\"".$font['title']."\"><br><br>Please set your CHMOD on <b>config.php</b> located in <b>$adminpath</b> to <b>666</b> so this script can write and encrypt the DB data</font>"
                                ."<P><form action=\"modules.php?op=modload&amp;name=$ModName&amp;file=install\" method=\"post\">"
                                ."<center>"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbhost\" value=\"$meg_dbhost\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbuname\" value=\"$meg_dbuname\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbpass\" value=\"$meg_dbpass\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbname\" value=\"$meg_dbname\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_prefix\" value=\"$meg_prefix\">"
                                    ."<INPUT type=\"hidden\" name=\"do\" value=\"Perm\">"    
                                    ."<INPUT type=\"submit\" value=\"ReCheck\">"
                                ."</center>"
                            ."</form></P>";
                }
                CloseTable();
                include("footer.php");
                break;

        
        case "Submit":
        connect_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname);
        confirm_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname, $meg_prefix);
        break;
        
        case "Upgrade":
        connect_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname);
        do_upgrade ($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname, $meg_prefix, $version);
        break;

        case "New_Install":
        connect_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname);
        make_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname, $meg_prefix, $dbmake);
        break;

        case "Continue":
        connect_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname);
        input_data($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname, $meg_prefix, $aid, $name, $pwd, $email, $url);
        break;

        case "Finish":
        set_configuration();
        break;

        default:
          show_license();
        break;
}

?>
