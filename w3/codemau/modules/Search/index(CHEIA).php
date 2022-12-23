<?php    

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Modified Search Module                                               */
/* Copyright (c) 2002 by Shawn Archer                                   */
/* http://www.NukeStyles.com                                            */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/


/************************************************************************/
/* Este Arquivo Foi Distribuido por: NukeBrasil.org                     */
/* http://www.nukebrasil.org - Antonio Andrade - nuke@nukebrasil.org    */
/************************************************************************/

/************************************************************************/
/* Tradução para Português do Brasil - Antonio Andrade                  */
/* http://www.nukebrasil.org - Antonio Andrade - nuke@nukebrasil.org    */
/* ICQ: 212091895 - MSN: msn@nukebrasil.org                             */
/************************************************************************/





if (!eregi("modules.php", $PHP_SELF)) {
    die ("You can't access this file directly...");
}

require_once("mainfile.php");

$module_name = basename(dirname(__FILE__));
get_lang($module_name);

$pagetitle = "- $module_name";
$index = 1;


	global $type, $module_name;

if ($multilingual == 1) {
    $queryalang = "AND (s.alanguage='$currentlang' OR s.alanguage='')"; /* stories */
    $queryrlang = "AND rlanguage='$currentlang' "; /* reviews */
    $queryslang = "AND slanguage='$currentlang' "; /* sections */
} else {
    $queryalang = "";
    $queryrlang = "";
    $queryslang = "";
}

switch($op) {

        case "comments":
                break;

        default:
                $offset=8;
                if (!isset($min)) $min=0;
                if (!isset($max)) $max=$min+$offset;
                $query = stripslashes($query);
                include("header.php");
		if ($topic>0) {
		    $result = sql_query("select topicimage, topictext from ".$prefix."_topics where topicid=$topic", $dbi);
		    list($topicimage, $topictext) = sql_fetch_row($result, $dbi);
		    if (file_exists("images/search/topics/$topicimage")) {
			$topicimage = "images/search/topics/$topicimage";
		    } else {
			$topicimage = "$tipath/$topicimage";
		    }
		} else {
		    $topictext = ""._ALLTOPICS."";
		    if (file_exists("images/search/topics/AllTopics.gif")) {
			$topicimage = "images/search/topics/AllTopics.gif";
		    } else {
			$topicimage = "$tipath/AllTopics.gif";
		    }
		}
		if (file_exists("images/search/topics/AllTopics.gif")) {
		    $alltop = "images/search/topics/AllTopics.gif";
		} else {
		    $alltop = "$tipath/AllTopics.gif";
		}
                OpenTable();
    		echo "<center><font class=\"title\">$module_name</font></center>";
    		CloseTable();
		OpenTable();
	echo "<table width=\"100%\" border=\"0\" align=\"center\"><tr><td align=\"center\">";
		echo "<form action=\"modules.php?name=$module_name#results\" method=\"POST\">";
        
	echo "<table width=\"100%\" border=\"0\" align=\"center\"><tr><td align=\"center\">";
			if (($type == "users") OR ($type == "sections") OR ($type == "reviews")) {
		    echo "<img src=\"$alltop\" align=\"center\" border=\"0\" alt=\"\">";
                } else {
		    echo "<img src=\"$topicimage\" align=\"center\" border=\"0\" alt=\"$topictext\">";
		}
		echo "<br><br>";
		if ($type == "users") {
		    echo "<font class=\"title\"><b>"._SEARCHUSERS."</b></font><br>";
		} elseif ($type == "sections") {
		    echo "<font class=\"title\"><b>"._SEARCHSECTIONS."</b></font><br>";
		} elseif ($type == "reviews") {
		    echo "<font class=\"title\"><b>"._SEARCHREVIEWS."</b></font><br>";
		} elseif ($type == "comments" AND isset($sid)) {
		    $res = sql_query("select title from ".$prefix."_stories where sid='$sid'", $dbi);
		    list($st_title) = sql_fetch_row($res, $dbi);
	    	    $instory = "AND sid='$sid'";
		    echo "<font class=\"title\"><b>"._SEARCHINSTORY." $st_title</b></font><br>";
		} else {
		    echo "<font class=\"title\"><b>"._SEARCHIN." $topictext</b></font><br>";
		}
	        echo "</td></tr></table>";		
		echo "<table width=\"100%\" border=\"0\" align=\"left\"><tr><td align=\"center\">";

		echo "<input size=\"25\" type=\"text\" name=\"query\" value=\"$query\">&nbsp;&nbsp;";
    	echo "<input type=\"submit\" name=\"submit\" value=\""._SEARCH."\">";
	echo "</td></tr></table>";
	echo "<br><br><br><br>";	
	echo "<table width=\"100%\" border=\"0\" align=\"center\"><tr><td>";
	echo "<center><b><u>"._ADVANCED."</u></b></center></td></tr></table>";
	echo "<br>";
	echo "<table width=\"50%\" border=\"0\" align=\"left\"><tr>";
	echo "<td width=\"30%\" align=\"right\"><b>"._FTOPICS."</b></td>";
	echo "<td width=\"70%\" align=\"left\" valign=\"middle\">";
		if (isset($sid)) {
		    echo "<input type='hidden' name='sid' value='$sid'>";
		}
            	echo "<!-- Topic Selection -->";
		$toplist = sql_query("select topicid, topictext from ".$prefix."_topics order by topictext", $dbi);
		echo "<select name=\"topic\">";
                echo "<option value=\"\">"._ALLTOPICS."</option>";
                while(list($topicid, $topics) = sql_fetch_row($toplist, $dbi)) {
                        if ($topicid==$topic) { $sel = "selected "; }
                        echo "<option $sel value=\"$topicid\">$topics</option>";
			$sel = "";
                }
		echo "</select></td></tr>";
		echo "<tr><td colspan=\"2\">&nbsp;</td></tr><tr>";
	echo "<td width=\"30%\" align=\"right\"><b>"._FCATEGORIES."</b></td>";
	echo "<td width=\"70%\" align=\"left\" valign=\"middle\">";
		/* Category Selection */
		echo "<select name=\"category\">";
                echo "<option value=\"0\">"._ARTICLES."</option>";
		$catlist = sql_query("select catid, title from ".$prefix."_stories_cat order by title", $dbi);
                while(list($catid, $title) = sql_fetch_row($catlist, $dbi)) {
                        if ($catid==$category) { $sel = "selected "; }
                        echo "<option $sel value=\"$catid\">$title</option>";
			$sel = "";
                }
		echo "</select></td></tr>";
		echo "<tr><td colspan=\"2\">&nbsp;</td></tr><tr>";
	echo "<td width=\"30%\" align=\"right\"><b>"._FAUTHORS."</b></td>";
	echo "<td width=\"70%\" align=\"left\" valign=\"middle\">";
		/* Authors Selection */
                $thing = sql_query("select aid from ".$prefix."_authors order by aid", $dbi);
		echo "<select name=\"author\">";
                echo "<option value=\"\">"._ALLAUTHORS."</option>";
                while(list($authors) = sql_fetch_row($thing, $dbi)) {
                        if ($authors==$author) { $sel = "selected "; }
			echo "<option value=\"$authors\">$authors</option>";
			$sel = "";
                }
		echo "</select></td></tr>";
		echo "<tr><td colspan=\"2\">&nbsp;</td></tr><tr>";
	echo "<td width=\"30%\" align=\"right\"><b>"._FDATE."</b></td>";
	echo "<td width=\"70%\" align=\"left\" valign=\"middle\">";
                /* Date Selection */
                ?>
		<select name="days">
                        <option <?php echo $days == 0 ? "selected " : ""; ?> value="0"><?php echo _ALL ?></option>
                        <option <?php echo $days == 7 ? "selected " : ""; ?> value="7">1 <?php echo _WEEK ?></option>
                        <option <?php echo $days == 14 ? "selected " : ""; ?> value="14">2 <?php echo _WEEKS ?></option>
                        <option <?php echo $days == 30 ? "selected " : ""; ?> value="30">1 <?php echo _MONTH ?></option>
			<option <?php echo $days == 60 ? "selected " : ""; ?> value="60">2 <?php echo _MONTHS ?></option>
                        <option <?php echo $days == 90 ? "selected " : ""; ?> value="90">3 <?php echo _MONTHS ?></option>
                </select><br>
		<?php
		if (($type == "stories") OR ($type == "")) {
		    $sel1 = "checked";
		} elseif ($type == "comments") {
		    $sel2 = "checked";
		} elseif ($type == "sections") {
		    $sel3 = "checked";
		} elseif ($type == "users") {
		    $sel4 = "checked";
		} elseif ($type == "reviews") {
		    $sel5 = "checked";
		// These are for later use //
		} elseif ($type == "links") {
		    $sel6 = "checked";
		} elseif ($type == "downloads") {
		    $sel7 = "checked";
		}
		$num_sec = sql_num_rows(sql_query("select * from ".$prefix."_sections", $dbi), $dbi);
		$num_rev = sql_num_rows(sql_query("select * from ".$prefix."_reviews", $dbi), $dbi);
		echo "</td></tr></table><table width=\"50%\" border=\"0\"></tr><tr><td width=\"50%\" align=\"right\">"._SSTORIES." <img src=\"images/search/stories.gif\" border=\"0\" title=\""._SSTORIES."\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"stories\" $sel1></td></tr>";
		echo "<tr><td width=\"50%\" align=\"right\">"._SCOMMENTS." <img src=\"images/search/comments.gif\" border=\"0\" title=\""._SCOMMENTS."\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"comments\" $sel2></td></tr>";
		if (is_active("Downloads")) {
		    echo "<tr><td width=\"50%\" align=\"right\">"._DOWNLOADS." <img src=\"images/search/downloads.gif\" border=\"0\" title=\""._DOWNLOADS."\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"downloads\" $sel7></td></tr>";
		}
		if ($num_rev > 0) {
		    echo "<tr><td width=\"50%\" align=\"right\">"._REVIEWS." <img src=\"images/search/reviews.gif\" border=\"0\" title=\""._REVIEWS."\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"reviews\" $sel5></td></tr>";
                }
		if ((is_active("Sections")) AND ($num_sec > 0)) {
		    echo "<tr><td width=\"50%\" align=\"right\">"._SSECTIONS." <img src=\"images/search/sections.gif\" border=\"0\" title=\""._SSECTIONS."\" height=\"13\" width=\"13\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"sections\" $sel3></td></tr>";
		}
		echo "<tr><td width=\"50%\" align=\"right\">"._SUSERS." <img src=\"images/search/users.gif\" border=\"0\" title=\""._SUSERS."\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"users\" $sel4></td></tr>";
		if (is_active("Web_links")) {
		    echo "<tr><td width=\"50%\" align=\"right\">"._WEBLINKS." <img src=\"images/search/links.gif\" border=\"0\" title=\""._WEBLINKS."\"></td><td width=\"50%\" align=\"left\"><input type=\"radio\" name=\"type\" value=\"links\" $sel6></td></tr>";
		}
		echo "</td></tr></table></form>";
	
		echo "</td></tr></table>";
		echo "<br>";
	CloseTable();
	$query = addslashes($query);
	if ($type=="stories" OR !$type) {
		if ($category > 0) {
		    $categ = "AND catid=$category ";
		} elseif ($category == 0) {
		    $categ = "";
		}
                $q = "select s.sid, s.aid, s.informant, s.title, s.time, s.hometext, s.bodytext, a.url, s.comments, s.topic from ".$prefix."_stories s, ".$prefix."_authors a where s.aid=a.aid $queryalang $categ";
                if (isset($query)) $q .= "AND (s.title LIKE '%$query%' OR s.hometext LIKE '%$query%' OR s.bodytext LIKE '%$query%' OR s.notes LIKE '%$query%') ";
                if ($author != "") $q .= "AND s.aid='$author' ";
                if ($topic != "") $q .= "AND s.topic='$topic' ";
                if ($days != "" && $days!=0) $q .= "AND TO_DAYS(NOW()) - TO_DAYS(time) <= $days ";
                $q .= " ORDER BY s.time DESC LIMIT $min,$offset";
		$t = $topic;
                $result = sql_query($q, $dbi);
                $nrows  = sql_num_rows($result, $dbi);
                $x=0;
	    if ($query != "") {
	echo "<a name=\"results\">";
                OpenTable();
    		echo "<center><font class=\"title\">"._SEARCHRESULTS."</font></center>";
    		CloseTable();
		OpenTable();
                echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">";
		if ($nrows>0) {
                        while(list($sid, $aid, $informant, $title, $time, $hometext, $bodytext, $url, $comments, $topic) = sql_fetch_row($result, $dbi)) {
			$result2 = sql_query("select topictext from ".$prefix."_topics where topicid=$topic", $dbi);
			list($topictext) = sql_fetch_row($result2, $dbi);
			        $furl = "modules.php?name=News&file=article&sid=$sid";
                                $datetime = formatTimestamp($time);
				$query = stripslashes($query);
				if ($informant == "") {
				    $informant = $anonymous;
				} else {
				    $informant = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;uname=$informant\">$informant</a>";
				}
				if ($query != "") {
				    if (eregi("$query",$title)) {
					$a = 1;
				    }
				    $text = "$hometext$bodytext";
				    if (eregi("$query",$text)) {
					$a = 2;
				    }
				    if (eregi("$query",$text) AND eregi("$query",$title)) {
					$a = 3;
				    }
				    if ($a == 1) {
					$match = _MATCHTITLE;
				    } elseif ($a == 2) {
					$match = _MATCHTEXT;
				    } elseif ($a == 3) {
					$match = _MATCHBOTH;
				    }
				    if (!isset($a)) {
					$match = "";
				    } else {
					$match = "$match<br>";
				    }
				}
                            echo "<tr><td>";
                            echo "<br>";
			
                                echo "<span style=\"vertical-align=-20%\"><img src=\"images/search/stories.gif\" border=\"0\" title=\""._SSTORIES."\"></span>";
                                printf("&nbsp;<font class=\"option\"><a href=\"%s\"><b>%s</b></a></font><br><font class=\"content\"><b>"._CONTRIBUTEDBY.":</b> $informant<br><b>"._POSTEDBY.":</b> <a href=\"%s\">%s</a>",$furl,$title,$url,$aid,$informant);
                                echo " "._ON." $datetime<br>"
				    ."$match"
				    ."<b>"._TOPIC.":</b> <a href=\"modules.php?name=$module_name&amp;query=&amp;topic=$topic\">$topictext</a> ";
                                echo "<br>";
				if ($comments == 0) {
				    echo "<b>"._UCOMMENTS.":</b> 0 ";
				} elseif ($comments == 1) {
printf("<b>"._UCOMMENTS.":</b> <a href=\"%s#commentstart\">$comments</a>",$furl,$title,$url);
                                } elseif ($comments >1) {
printf("<b>"._UCOMMENTS.":</b> <a href=\"%s#commentstart\">$comments</a>",$furl,$title,$url);
				}
				if (is_admin($admin)) {
				    echo "<br><b>"._ADMINOPTIONS.":</b> <a href=\"admin.php?ditStory&amp;sid=$sid\">"._EDIT."</a> - <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a>";
				}
				echo "</font></td></tr>";				
			
				$x++;
                    }
		if ($x >= 4 AND $x < 8) {
                
		}
		echo "</table>";
		} else {
                        echo "</td></tr></table>";
		echo "<br>";
		
			echo "<center><font class=\"option\"><b>"._NOMATCHES."</b></font></center>";
		
                }
		echo "<br>";
			echo "<center>";
                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$prev&amp;query=$query&amp;type=$type&amp;category=$category#results\">";
                        print "<img src=\"images/buttons/previous.gif\" border=\"0\" title=\""._PREV." "._RESULTS."\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $next=$min+$offset;
		if ($x>=8) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$max&amp;query=$query&amp;type=$type&amp;category=$category#results\">";
                        print "<img src=\"images/buttons/next.gif\" border=\"0\" title=\""._NEXT." "._RESULTS."\"></a>";
                }
			echo "</center>";
		CloseTable();
	    }
	} elseif ($type=="comments") {
/*
	    if (isset($sid)) {
		$res = sql_query("select title from ".$prefix."_stories where sid='$sid'", $dbi);
		list($st_title) = sql_fetch_row($res, $dbi);
		$instory = "AND sid='$sid'";
	    } else {
		$instory = "";
	    }
*/
            $result = sql_query("select tid, sid, subject, date, name from ".$prefix."_comments where (subject like '%$query%' OR comment like '%$query%') $instory order by date DESC limit $min,$offset", $dbi);
            $nrows  = sql_num_rows($result, $dbi);
            $x=0;
	    if ($query != "") {
	    echo "<a name=\"results\">";
                OpenTable();
    		echo "<center><font class=\"title\">"._SEARCHRESULTS."</font></center>";
    		CloseTable();
		OpenTable();
		echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">";
		if ($nrows>0) {
                        while(list($tid, $sid, $subject, $date, $name) = sql_fetch_row($result, $dbi)) {
			    $res = sql_query("select title from ".$prefix."_stories where sid='$sid'", $dbi);
			    list($title) = sql_fetch_row($res, $dbi);
			    $reply = sql_num_rows(sql_query("select * from ".$prefix."_comments where pid='$tid'", $dbi), $dbi);
			    $furl = "modules.php?name=News&amp;file=article&amp;thold=-1&amp;mode=flat&amp;order=1&amp;sid=$sid#$tid";
                            if(!$name) {
				$name = "$anonymous";
			    } else {
				$name = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;uname=$name\">$name</a>";
			    }
			    $datetime = formatTimestamp($date);
                            echo "<tr><td>";
                            echo "<br>";
			
                            echo "<span style=\"vertical-align=-15%\"><img src=\"images/search/comments.gif\" border=\"0\" title=\""._SCOMMENTS."\"></span>&nbsp;<font class=\"option\"><a href=\"$furl\"><b>$subject</b></a></font><font class=\"content\"><br><b>"._POSTEDBY.":</b> $name"
                        	." "._ON." $datetime<br>"
				."<b>"._ATTACHART.":</b> $title<br>";
			    if ($reply == 1) {
				echo "<b>"._SREPLIES.":</b> $reply";
				if (is_admin($admin)) {
				 echo "<br><b>"._ADMINOPTIONS.":</b> <a href=\"admin.php?op=RemoveComment&amp;tid=$tid&amp;sid=$sid\">"._DELETE."</a>";
			
				}
				echo "</td></tr>";
			    } else {
				echo "<b>"._SREPLIES.":</b> $reply";
				if (is_admin($admin)) {
				echo "<br><b>"._ADMINOPTIONS.":</b> <a href=\"admin.php?op=RemoveComment&amp;tid=$tid&amp;sid=$sid\">"._DELETE."</a>";
				}
				echo "</td></tr>";
			
                            $x++;		
			    }
                        }
		if ($x > 4 AND $x < 8) {
                
		}
		echo "</table>";
                            echo "<br>";
		} else {
                        echo "</td></tr></table>";
		echo "<br>";
		
			echo "<center><font class=\"option\"><b>"._NOMATCHES."</b></font></center>";
		
			echo "<br>";
                }
	echo "<center>";
                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$topic&amp;min=$prev&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/previous.gif\" border=\"0\" title=\""._PREV." "._RESULTS."\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $next=$min+$offset;
		if ($x>=8) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$topic&amp;min=$max&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/next.gif\" border=\"0\" title=\""._NEXT." "._RESULTS."\"></a>";
                }
	echo "</center>";
		CloseTable();
	    }
	} elseif ($type=="reviews") {
            $result = sql_query("select id, title, text, reviewer, score, date from ".$prefix."_reviews where (title like '%$query%' OR text like '%$query%') $queryrlang order by date DESC limit $min,$offset", $dbi);
            $nrows  = sql_num_rows($result, $dbi);
            $x=0;
	    if ($query != "") {
	    echo "<a name=\"results\">";
                OpenTable();
    		echo "<center><font class=\"title\">"._SEARCHRESULTS."</font></center>";
    		CloseTable();
		OpenTable();
		echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">";
		if ($nrows>0) {
                    while(list($id, $title, $text, $reviewer, $score, $date) = sql_fetch_row($result, $dbi)) {
			$furl = "modules.php?name=Reviews&amp;rop=showcontent&amp;id=$id";
			$pages = count(explode( "<!--pagebreak-->", $text ));
	    $date = date("m-d-Y", time());
                            echo "<tr><td>";
                            echo "<br>";
		
                        echo "<span style=\"vertical-align=-15%\"><img src=\"images/search/reviews.gif\" border=\"0\" title=\""._REVIEWS."\"></span>&nbsp;<font class=\"option\"><a href=\"$furl\"><b>$title</b></a></font><br>"
			    ."<font class=\"content\">"._REVIEWEDBY." $reviewer "._ON." $date<br>"
			    ."<b>"._REVIEWSCORE.":</b> $score/10<br>";
			if ($pages == 1) {
			    echo "<b>"._REVIEWLENGTH.":</b> $pages "._PAGE."";
                        } else {
			    echo "<b>"._REVIEWLENGTH.":</b> $pages "._PAGES."";
			}
			if (is_admin($admin)) {
			    echo "<br><b>"._ADMINOPTIONS.":</b> <a href=\"modules.php?name=Reviews&amp;op=mod_review&amp;id=$id\">"._EDIT."</a> - <a href=\"modules.php?name=Reviews.php&amp;op=del_review&amp;id_del=$id\">"._DELETE."</a> ";
			}
                        print "</font></td></tr>";
		
                        $x++;
                    }
		if ($x > 4 AND $x < 8) {
                
		}
		    echo "</table><br>";
		} else {
                        echo "</td></tr></table>";
		echo "<br>";
		
			echo "<center><font class=\"option\"><b>"._NOMATCHES."</b></font></center>";
		
			echo "<br>";
                }
			echo "<center>";
                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$prev&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/previous.gif\" border=\"0\" title=\""._PREV." "._RESULTS."\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $next=$min+$offset;
		if ($x>=8) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$max&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/next.gif\" border=\"0\" title=\""._NEXT." "._RESULTS."\"></a>";
                }
			echo "</center>";
		CloseTable();
	    }
	} elseif ($type=="sections") {
            $result = sql_query("select artid, secid, title, content from ".$prefix."_seccont where (title like '%$query%' OR content like '%$query%') $queryslang order by artid DESC limit $min,$offset", $dbi);
            $nrows  = sql_num_rows($result, $dbi);
            $x=0;
	    if ($query != "") {
	    echo "<a name=\"results\">";
                OpenTable();
    		echo "<center><font class=\"title\">"._SEARCHRESULTS."</font></center>";
    		CloseTable();
		OpenTable();
		echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">";
		if ($nrows>0) {
                        while(list($artid, $secid, $title, $content) = sql_fetch_row($result, $dbi)) {
			    $pages = count(explode( "<!--pagebreak-->", $content ));
			    $result2 = sql_query("select secname from ".$prefix."_sections where secid='$secid'", $dbi);
			    list($sectitle) = sql_fetch_row($result2, $dbi);
			    $surl = "modules.php?name=Sections&amp;op=listarticles&amp;secid=$secid";
			    $furl = "modules.php?name=Sections&amp;op=viewarticle&amp;artid=$artid";
                            echo "<tr><td>";
                            echo "<br>";
			
                            echo "<span style=\"vertical-align=-15%\"><img src=\"images/search/sections.gif\" border=\"0\" title=\""._SSECTIONS."\" height=\"13\" width=\"13\"></span>&nbsp;<font class=\"option\"><a href=\"$furl\"><b>$title</b></a></font><font class=\"content\"><br><b>"._INSECTION.":</b> <a href=\"$surl\">$sectitle</a><br>";
			    if ($pages == 1) {
				echo "<b>"._ARTICLELENGTH.":</b> $pages "._PAGE."";
                            } else {
				echo "<b>"._ARTICLELENGTH.":</b> $pages "._PAGES."";
			    }
			    if (is_admin($admin)) {
				echo "<br><b>"._ADMINOPTIONS.":</b> <a href=\"admin.php?op=secartedit&amp;artid=$artid\">"._EDIT."</a> - <a href=\"admin.php?op=secartdelete&amp;artid=$artid&amp;ok=0\">"._DELETE."</a>";
			    }
			    echo "</font></td></tr>";
						
			    $x++;
                        }
		if ($x > 4 AND $x < 8) {
                
		}
		echo "</table>";
		} else {
                        echo "</td></tr></table>";
		echo "<br>";
		
			echo "<center><font class=\"option\"><b>"._NOMATCHES."</b></font></center>";
		
			echo "<br>";
                }
			echo "<center>";
                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$prev&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/previous.gif\" border=\"0\" title=\""._PREV." "._RESULTS."\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $next=$min+$offset;
		if ($x>=8) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$max&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/next.gif\" border=\"0\" title=\""._NEXT." "._RESULTS."\"></a>";
                }
			echo "</center>";
		CloseTable();
	    }
	} elseif ($type=="users") {
            $result = sql_query("select uid, uname, name from ".$user_prefix."_users where (uname like '%$query%' OR name like '%$query%' OR bio like '%$query%') order by uname ASC limit $min,$offset", $dbi);
            $nrows  = sql_num_rows($result, $dbi);
            $x=0;
	    if ($query != "") {
	    echo "<a name=\"results\">";
                OpenTable();
    		echo "<center><font class=\"title\">"._SEARCHRESULTS."</font></center>";
    		CloseTable();
		OpenTable();
		echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">";
		if ($nrows>0) {
                        while(list($uid, $uname, $name) = sql_fetch_row($result, $dbi)) {
			    $furl = "modules.php?name=Your_Account&amp;op=userinfo&amp;uname=$uname";
			    if ($name=="") {
				$name = ""._NONAME."";
			    }
                            echo "<tr><td>";
                            echo "<br>";
		
                            echo "<span style=\"vertical-align=-15%\"><img src=\"images/search/users.gif\" border=\"0\" title=\""._SUSERS."\"></span>&nbsp;<font class=\"option\"><a href=\"$furl\"><b>$uname</b></a></font><br><font class=\"content\"><b>"._REALNAME.":</b> $name";
			    if (is_admin($admin)) {
				echo "<br><b>"._ADMINOPTIONS.":</b> <a href=\"admin.php?chng_uid=$uid&amp;op=modifyUser\">"._EDIT."</a> - <a href=\"admin.php?op=delUser&amp;chng_uid=$uid\">"._DELETE."</a>";
			    }
			    echo "</font></td></tr>";
		
                            $x++;
                        }
		if ($x > 4 AND $x < 8) {
                
		}
		echo "</table><br>";
		} else {
                        echo "</td></tr></table>";
		echo "<br>";
		
			echo "<center><font class=\"option\"><b>"._NOMATCHES."</b></font></center>";
		
			echo "<br>";
                }
			echo "<center>";
                $prev=$min-$offset;
                if ($prev>=0) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$prev&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/previous.gif\" border=\"0\" title=\""._PREV." "._RESULTS."\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $next=$min+$offset;
		if ($x>=8) {
                        print "<a href=\"modules.php?name=$module_name&amp;author=$author&amp;topic=$t&amp;min=$max&amp;query=$query&amp;type=$type#results\">";
                        print "<img src=\"images/buttons/next.gif\" border=\"0\" title=\""._NEXT." "._RESULTS."\"></a>";
                }
			echo "</center>";
		CloseTable();
	    }
	// New types - Shawn Archer - http://www.NukeStyles.com //
	} elseif ($type=="links") {
    Header("Location: modules.php?name=Web_Links&l_op=search&query=$query#searchresults");
	} elseif ($type=="downloads") {
    Header("Location: modules.php?name=Downloads&d_op=search&query=$query#searchresults");
	}
    if (isset($query) AND $query != "") {
	if (is_active("Downloads")) { 
	    $dcnt = sql_num_rows(sql_query("select * from ".$prefix."_downloads_downloads WHERE title LIKE '%$query%' OR description LIKE '%$query%'", $dbi), $dbi);
	    $mod1 = "<li> <a href=\"modules.php?name=Downloads&amp;d_op=search&amp;query=$query#searchresults\">"._DOWNLOADS."</a><br>"._SEARCHRESULTS2.": <b>$dcnt</b><br><br>";
	}
	if (is_active("Web_Links")) {
	    $lcnt = sql_num_rows(sql_query("select * from ".$prefix."_links_links WHERE title LIKE '%$query%' OR description LIKE '%$query%'", $dbi), $dbi);
	    $mod2 = "<li> <a href=\"modules.php?name=Web_Links&amp;l_op=search&amp;query=$query#searchresults\">"._WEBLINKS."</a><br>"._SEARCHRESULTS2.": <b>$lcnt</b><br><br>";
	}
	if (is_active("Encyclopedia")) {
	    $ecnt1 = sql_query("select eid from ".$prefix."_encyclopedia WHERE active='1'", $dbi);
	    $ecnt = 0;
	    while(list($eid) = sql_fetch_row($ecnt1, $dbi)) {
		$ecnt2 = sql_num_rows(sql_query("select * from ".$prefix."_encyclopedia WHERE title LIKE '%$query%' OR description LIKE '%$query%' AND eid='$eid'", $dbi), $dbi);
		$ecnt3 = sql_num_rows(sql_query("select * from ".$prefix."_encyclopedia_text WHERE title LIKE '%$query%' OR text LIKE '%$query%' AND eid='$eid'", $dbi), $dbi);
		$ecnt = $ecnt+$ecnt2+$ecnt3;
	    }
	    $mod3 = "<li> <a href=\"modules.php?name=Encyclopedia&amp;file=search&amp;query=$query\">"._ENCYCLOPEDIA."</a><br>"._SEARCHRESULTS2.": <b>$ecnt</b><br><br>";
	}
	OpenTable();
	echo "<br>";
	
	echo "<center><font class=\"title\">"._DIDNOTFIND."</font></center>";
	
	echo "<br>"
	    ."&nbsp;&nbsp;"._SEARCH." "._FOR." \"<b>$query</b>\" "._ON.":<br><br>"
	    ."<ul>"
	    ."$mod1"
	    ."$mod2"
	    ."$mod3";

	    echo "<li> <a href=\"http://www.google.com/search?q=$query\" target=\"new\">Google</a>"
	    ."<li> <a href=\"http://groups.google.com/groups?q=$query\" target=\"new\">Google Groups</a>"
	    ."</ul>";

	CloseTable();
    }
    include("footer.php");
    break;
}

?>