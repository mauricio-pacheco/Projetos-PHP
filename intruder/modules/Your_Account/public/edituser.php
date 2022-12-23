<?php

/*********************************************************************************/
/* CNB Your Account: An Advanced User Management System for phpnuke     		*/
/* ============================================                         		*/
/*                                                                      		*/
/* Copyright (c) 2004 by Comunidade PHP Nuke Brasil                     		*/
/* http://dev.phpnuke.org.br & http://www.phpnuke.org.br                		*/
/*                                                                      		*/
/* Contact author: escudero@phpnuke.org.br                              		*/
/* International Support Forum: http://ravenphpscripts.com/forum76.html 		*/
/*                                                                      		*/
/* This program is free software. You can redistribute it and/or modify 		*/
/* it under the terms of the GNU General Public License as published by 		*/
/* the Free Software Foundation; either version 2 of the License.       		*/
/*                                                                      		*/
/*********************************************************************************/
/* CNB Your Account it the official successor of NSN Your Account by Bob Marion	*/
/*********************************************************************************/

if (!eregi("modules.php", $_SERVER['PHP_SELF'])) {
    header("Location: ../../../index.php");
    die ();
}
if (!defined('CNBYA')) { echo "CNBYA protection"; exit; }

	cookiedecode($user); 
	getusrinfo($user); 
	if ((is_user($user)) AND (strtolower($userinfo[username]) == strtolower($cookie[1])) AND ($userinfo[user_password] == $cookie[2])) {
        include("header.php");
        title(_PERSONALINFO);
        OpenTable();
        nav();
        CloseTable();

//recup info user ----------------------------------
	$result = $db->sql_query("SELECT * FROM ".$user_prefix."_cnbya_field");
	while ($sqlvalue = $db->sql_fetchrow($result)) {
	  list($value) = $db->sql_fetchrow( $db->sql_query("SELECT value FROM ".$user_prefix."_cnbya_value WHERE fid ='$sqlvalue[fid]' AND uid = '$userinfo[user_id]'"));
    
	  $userinfo[$sqlvalue[name]] = $value;
      }
//--------------------------------------------

        echo "<br>";
        if (!eregi("http://", $userinfo['user_website']) && $userinfo['user_website'] != "http://") {
            $userinfo['user_website'] = "http://".$userinfo['user_website'];
        }
        OpenTable();
        echo "<table class='forumline' cellpadding='3' cellspacing='3' border='0' width='100%'>";
        echo "<form name='Register' action='modules.php?name=$module_name' method='post'>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._USRNICKNAME."</b>:</td><td bgcolor='$bgcolor3'><b>$userinfo[username]</b></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._UREALNAME."</b>:<br>"._REQUIRED."</td><td bgcolor='$bgcolor3'>";
        echo "<input type='text' name='realname' value=\"$userinfo[name]\" size='50' maxlength='60'></td></tr>";
        if ($ya_config['allowmailchange'] < 1) {
            echo "<tr><td bgcolor='$bgcolor2'><b>"._UREALEMAIL.":</b><br>"._REQUIRED."</td>";
            echo "<td bgcolor='$bgcolor3'><input type='text' name='user_email' value=\"$userinfo[user_email]\" size='50' maxlength='255'><br>"._EMAILNOTPUBLIC."</td></tr>";
        } else {
            echo "<input type='hidden' name='user_email' value=\"$userinfo[user_email]\">\n";
        }
        echo "<tr><td bgcolor='$bgcolor2'><b>"._UFAKEMAIL.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='femail' value=\"$userinfo[femail]\" size='50' maxlength='255'><br>"._EMAILPUBLIC."</td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._YOURHOMEPAGE.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_website' value=\"$userinfo[user_website]\" size='50' maxlength='255'></td></tr>";
        
		$result = $db->sql_query("SELECT * FROM ".$user_prefix."_cnbya_field WHERE need <> '0' ORDER BY pos");
	    while ($sqlvalue = $db->sql_fetchrow($result)) {
	      $t = $sqlvalue[fid];
		  $value2 = explode("::", $sqlvalue[value]);
		  if (substr($sqlvalue[name],0,1)=='_') eval( "\$name_exit = $sqlvalue[name];"); else $name_exit = $sqlvalue[name];
		  if (count($value2) == 1) { 
		    echo "<tr><td bgcolor='$bgcolor2'><b>$name_exit</b></td><td bgcolor='$bgcolor3'><input type='text' name='nfield[$t]' value='".$userinfo[$sqlvalue[name]]."' size='20' maxlength='$sqlvalue[size]'></td></tr>\n";			
		    $sqlvalueMax = $sqlvalueMax - 1;  
	      } else {
		    echo "<tr><td bgcolor='$bgcolor2'><b>$name_exit</b></td><td bgcolor='$bgcolor3'>";
			echo "<select name='nfield[$t]'>\n";
     	    for ($i = 0; $i<count($value2); $i++) {
			  if (trim($userinfo[$sqlvalue[name]]) == trim($value2[$i])) $sel = "selected"; else $sel = "";
              echo "<option value=\"".trim($value2[$i])."\" $sel>$value2[$i]</option>\n";
		    }
			echo "</select>";
			echo "</td></tr>\n";
		  }
		}
		
		echo "<tr><td bgcolor='$bgcolor2'><b>"._YICQ.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_icq' value=\"$userinfo[user_icq]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._YAIM.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_aim' value=\"$userinfo[user_aim]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._YYIM.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_yim' value=\"$userinfo[user_yim]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._YMSNM.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_msnm' value=\"$userinfo[user_msnm]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>Cidade/Estado/Pais</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_from' value=\"$userinfo[user_from]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._YOCCUPATION.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_occ' value=\"$userinfo[user_occ]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._YINTERESTS.":</b><br>"._OPTIONAL."</td>";
        echo "<td bgcolor='$bgcolor3'><input type='text' name='user_interests' value=\"$userinfo[user_interests]\" size='30' maxlength='100'></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._RECEIVENEWSLETTER."</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[newsletter] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='newsletter'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._ALWAYSSHOWEMAIL.":</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_viewemail] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_viewemail'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._HIDEONLINE.":</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_allow_viewonline] == 0) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_allow_viewonline'><option value='0'$ck1>"._YES."</option>";
        echo "<option value='1'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._REPLYNOTIFY.":</b><br>"._REPLYNOTIFYMSG."</td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_notify] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_notify'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._PMNOTIFY.":</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_notify_pm] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_notify_pm'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._POPPM.":</b><br>"._POPPMMSG."</td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_popup_pm] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_popup_pm'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._ATTACHSIG.":</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_attachsig] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_attachsig'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._ALLOWBBCODE."</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_allowbbcode] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_allowbbcode'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._ALLOWHTMLCODE."</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_allowhtml] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_allowhtml'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._ALLOWSMILIES."</b></td><td bgcolor='$bgcolor3'>";
        if ($userinfo[user_allowsmile] == 1) { $ck1 = " selected"; $ck2 = ""; } else { $ck1 = ""; $ck2 = " selected"; }
        echo "<select name='user_allowsmile'><option value='1'$ck1>"._YES."</option>";
        echo "<option value='0'$ck2>"._NO."</option></select></td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._FORUMSTIME."</b></td><td bgcolor='$bgcolor3'>";
        echo "<select name='user_timezone'>";
        for ($i=-12; $i<13; $i++) {
            if ($i == 0) {
                $dummy = "GMT";
            } else {
                if (!ereg("-", $i)) { $i = "+$i"; }
                $dummy = "GMT $i "._HOURS."";
            }
            if ($userinfo[user_timezone] == $i) {
                echo "<option name='user_timezone' value=\"$i\" selected>$dummy</option>";
            } else {
                echo "<option name='user_timezone' value=\"$i\">$dummy</option>";
            }
        }
        echo "</select>";
        echo "</td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._FORUMSDATE.":</b><br>"._FORUMSDATEMSG."</b></td><td bgcolor='$bgcolor3'>";
        echo "<input size='15' maxlength='14' type='text' name='user_dateformat' value=\"$userinfo[user_dateformat]\">";
        echo "</td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._SIGNATURE.":</b><br>"._OPTIONAL."<br>"._NOHTML."</td>";
        echo "<td bgcolor='$bgcolor3'><textarea wrap='virtual' cols='50' rows='5' name='user_sig'>$userinfo[user_sig]</textarea><br>"._255CHARMAX."</td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._EXTRAINFO.":</b><br>"._OPTIONAL."<br>"._NOHTML."</td>";
        echo "<td bgcolor='$bgcolor3'><textarea wrap='virtual' cols='50' rows='5' name='bio'>$userinfo[bio]</textarea><br>"._CANKNOWABOUT."</td></tr>";
        echo "<tr><td bgcolor='$bgcolor2'><b>"._PASSWORD."</b>:</td><br>";
        echo "<td bgcolor='$bgcolor3'><input type='password' name='user_password' size='22' maxlength='".$ya_config['pass_max']."'>&nbsp;&nbsp;&nbsp;<input type='password' name='vpass' size='22' maxlength='".$ya_config['pass_max']."'><br>"._TYPENEWPASSWORD."</td></tr>";
        echo "<tr><td bgcolor='$bgcolor3' colspan='2' align='center'>";
        echo "<input type='hidden' name='username' value=\"$userinfo[username]\">";
        echo "<input type='hidden' name='user_id' value=\"$userinfo[user_id]\">";
        echo "<input type='hidden' name='op' value='saveuser'>";
        echo "<input type='submit' value='"._SAVECHANGES."'>";
        echo "</form></td></tr>";
        $avatar_category = ( !empty($HTTP_POST_VARS['avatarcategory']) ) ? $HTTP_POST_VARS['avatarcategory'] : '';
        
		//menelaos@hetnet.nl
		$resultbc = $db->sql_query("SELECT * FROM ".$prefix."_bbconfig"); 
		while($rowbc = $db->sql_fetchrow($resultbc)) {
		$board_config[$rowbc[config_name]] = $rowbc[config_value];
		}
		$direktori = $board_config['avatar_gallery_path']; 
		
        $dir = @opendir($direktori);
        $avatar_images = array();
        while( $file = @readdir($dir) ) {
            if( $file != '.' && $file != '..' && !is_file($direktori . '/' . $file) && !is_link($direktori . '/' . $file) ) {
                $sub_dir = @opendir($direktori . '/' . $file);
                $avatar_row_count = 0;
                $avatar_col_count = 0;
                while( $sub_file = @readdir($sub_dir) ) {
                    if( preg_match('/(\.gif$|\.png$|\.jpg|\.jpeg)$/is', $sub_file) ) {
                        $avatar_images[$file][$avatar_row_count][$avatar_col_count] = $file . '/' . $sub_file;
                        $avatar_name[$file][$avatar_row_count][$avatar_col_count] = ucfirst(str_replace("_", " ", preg_replace('/^(.*)\..*$/', '\1', $sub_file)));
                        $avatar_col_count++;
                        if( $avatar_col_count == 5 ) {
                            $avatar_row_count++;
                            $avatar_col_count = 0;
                        }
                    }
                }
            }
        }
        @closedir($dir);
        @ksort($avatar_images);
        @reset($avatar_images);
        if( empty($category) ) {
            list($category, ) = each($avatar_images);
        }
        @reset($avatar_images);
        $s_categories = '<select name="avatarcategory">';
        while( list($key) = each($avatar_images) ) {
            $selected = ( $key == $category ) ? ' selected="selected"' : '';
            if( count($avatar_images[$key]) ) {
                $s_categories .= '<option value="' . $key . '"' . $selected . '>' . ucfirst($key) . '</option>';
            }
        }
        $s_categories .= '</select>';

        if ($userinfo[user_avatar_type] == 1) { 
            $user_avatar = $board_config[avatar_path]."/".$userinfo[user_avatar]; 
        } elseif ($userinfo[user_avatar_type] == 2) { 
            $user_avatar = $userinfo[user_avatar]; 
        } else { 
            $user_avatar = $board_config[avatar_gallery_path]."/".$userinfo[user_avatar]; 
        }
        echo "<tr><td bgcolor='$bgcolor3' colspan='2' align='center'>";
        echo "<font class='title'>"._YA_AVCP."</font></b><br>";
        echo "<tr><td bgcolor='$bgcolor2'>"._YA_AVINF1." ".$board_config['avatar_max_width']." "._YA_AVINF2." ".$board_config['avatar_max_height']." "._YA_AVINF3." ".YA_CoolSize($board_config['avatar_filesize']).".</td>";
        if (ereg("http", $userinfo['user_avatar'])) {
			//avatarfix by menelaos dot hetnet dot nl
			echo "<td bgcolor='$bgcolor3' align=center>"._YA_CURRAV."<BR><IMG alt=\"\" src=\"$direktori/$userinfo[user_avatar]\" width=\"40\" height=\"50\"></td></tr>";
        		} elseif ($userinfo[user_avatar]) {
            		echo "<td bgcolor='$bgcolor3' align=center>"._YA_CURRAV."<BR><IMG alt=\"\" src=\"$direktori/$userinfo[user_avatar]\" width=\"40\" height=\"50\"></td></tr>";
        }
        echo "<BR>";
        if ($board_config['allow_avatar_local']) {
            echo "<form action=\"modules.php?name=Your_Account&op=avatarlist\" method=\"post\">";
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_SELAVGALL.":</b></td>";
            echo "<td bgcolor='$bgcolor3'>".$s_categories."&nbsp;<img src=\"images/right.gif\" align=middle>&nbsp;<INPUT class=button type=submit value=\""._YA_SHOWGALL."\"></td></tr>";
            echo "</form>";
        } else {
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_SELAVGALL.":</b></td>";
            echo "<td bgcolor='$bgcolor3'><b>"._YA_DISABLED."</b></td></tr>";
        }
        if ($board_config['allow_avatar_upload']) {
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_UPLOADAV.":</b></td>";
            echo "<td bgcolor='$bgcolor3'><a href=\"modules.php?name=Forums&file=profile&mode=editprofile\"><b>"._YA_UPLOADFORUM."</b></a></td></tr>";
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_UPLOADURL.":</b><br><SPAN class=gensmall>"._YA_AVCOPIED."</SPAN></td>";
            echo "<td bgcolor='$bgcolor3'><a href=\"modules.php?name=Forums&file=profile&mode=editprofile\"><b>"._YA_UPLOADFORUM."</b></a></td></tr>";
        } else {
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_UPLOADURL.":</b></td>";
            echo "<td bgcolor='$bgcolor3'><b>"._YA_DISABLED."</b></td></tr>";
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_UPLOADAV.":</b></td>";
            echo "<td bgcolor='$bgcolor3'><b>"._YA_DISABLED."</b></td></tr>";
        }
        
        if ($board_config['allow_avatar_remote']) {
            echo "<form action=\"modules.php?name=Your_Account&op=avatarlinksave\" method=\"post\">";
			echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_OFFSITE.":</b><br><SPAN class=gensmall>"._YA_SUBMITBUTTON."</SPAN></td>";
if ($userinfo[user_avatar_type] == 2) { 
            echo "<td bgcolor='$bgcolor3'><INPUT class=post style=\"WIDTH: 150px\" size='25' name='avatar' value=\"".$userinfo[user_avatar]."\"> &nbsp;&nbsp;<INPUT class=mainoption type=submit value=Submit></td></tr>";
} else {
echo "<td bgcolor='$bgcolor3'><INPUT class=post style=\"WIDTH: 150px\" size='25' name='avatar' value=\"http://\"> &nbsp;&nbsp;<INPUT class=mainoption type=submit value=Submit></td></tr>";
}
            echo "<tr><td bgcolor='$bgcolor3' colspan='2' align='center'>";
			echo "</form>";
		} else {
            echo "<tr><td bgcolor='$bgcolor2'><b>"._YA_OFFSITE.":</b></td>";
            echo "<td bgcolor='$bgcolor3'><b>"._YA_DISABLED."</b></td></tr>";
            echo "<tr><td bgcolor='$bgcolor3' colspan='2' align='center'>";
		}
        echo "</TD></TR></TABLE>";
        CloseTable();
        include("footer.php");
	} else {
        mmain($user);
	}

?>