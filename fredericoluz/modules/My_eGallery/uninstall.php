<?php

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
            <center><font class="<?php echo $font['title']; ?>">My_eGallery Un-Installation</font></center><br><br>
            <font class="<?php echo $font['normal']; ?>">This script will uninstall the My_eGallery database by droping all the tables created during the install process.  You will be taken through a variety of pages.  Each page sets a different portion of the script.  We estimate that this entire process will take about two minutes.  At any time that you get stuck, please visit our support forums for help.</font><br><br>
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
        <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=uninstall"; ?>" method="post">
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
    <form action="<?php echo "modules.php?op=modload&amp;name=$ModName&amp;file=uninstall"; ?>" method="post">
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
            <td><input type="text" NAME="prefix" SIZE=30 maxlength=80 value="nuke"></td></tr>
        </table>
        <INPUT type="hidden" name="do" value="Check">
        <INPUT type="Submit" name="ok" value="Next">
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

  		    include("header.php");
                OpenTable();
		    echo "<P><font class=\"".$font['title']."\">Click on <b>Continue</b> to DROP the following tables:</font></P>";

                echo "<font class=\"".$font['tiny']."\">
				$meg_prefix"._gallery_categories."<br>
                        $meg_prefix"._gallery_comments."<br>
                        $meg_prefix"._gallery_pictures."<br> 
                        $meg_prefix"._gallery_pictures_newpicture."<br>
                        $meg_prefix"._gallery_rate_check."<br>
                        $meg_prefix"._gallery_template_types."<br>
                        $meg_prefix"._gallery_media_class."<br>
                        $meg_prefix"._gallery_media_types."<br>
				</font>";
                
			echo  "<P><form action=\"modules.php?op=modload&amp;name=$ModName&amp;file=uninstall\" method=\"post\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbhost\" value=\"$meg_dbhost\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbuname\" value=\"$meg_dbuname\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbpass\" value=\"$meg_dbpass\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_dbname\" value=\"$meg_dbname\">"
                                ."<INPUT type=\"hidden\" NAME=\"meg_prefix\" value=\"$meg_prefix\">"
                                ."<center>"
                                    ."<INPUT type=\"hidden\" name=\"do\" value=\"Uninstall\">"    
                                    ."<INPUT type=\"submit\" value=\"Continue\">"
                                ."</center>"
                            ."</form></P>";
		      CloseTable();
                  include("footer.php");
			break;

        case "Uninstall":
        	connect_db($meg_dbhost, $meg_dbuname, $meg_dbpass, $meg_dbname);
            $sql = "DROP TABLE `$meg_prefix"._gallery_categories."`, `$meg_prefix"._gallery_comments."`, `$meg_prefix"._gallery_media_class."`, `$meg_prefix"._gallery_media_types."`, `$meg_prefix"._gallery_pictures."`, `$meg_prefix"._gallery_pictures_newpicture."`, `$meg_prefix"._gallery_rate_check."`";
            //echo $sql;
		mysql_query($sql);

       default:
          	show_license();
        	break;
}

?>
