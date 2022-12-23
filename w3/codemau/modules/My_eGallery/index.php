<?php

######################################################################
# For PHP-NUKE: Web Portal System
# ===========================
# My_eGallery 2.7.0
# Copyright (c) 2001 by ~ MarsIsHere ~ (marsishere@yahoo.fr)
# http://www.marsishere.net
#
# This modules is for image galleries
#
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################


/*if (!eregi("modules.php", $PHP_SELF)) {
    die ("You can't access this file directly...");
}
*/
$ModName = $name;

if(!isset($mainfile)){
include("mainfile.php");
}

include("modules/$ModName/include-public.inc");

function underscoreTospace($name) {
	$name = str_replace("_"," ",$name);
	return $name;
}

function galleryHeader() {
	global $basepath;

	include('header.php');
}

function galleryFooter() {
	global $font;
	print 	'<p align="right">'
		.'<font class="'.$font['tiny'].'">'
		.sprintf(_GALCOPYRIGHT, _GALVERSION)
		.'</font>'
		.'</p>'
	;
	include("footer.php");
}


function navigationGall() {
	global
		$baseurl,
		$galleryvar,
                $font,
		$user,
		$admin,
		$prefix, $db
	;

	if (is_admin($admin)) {
		$row = $db->sql_fetchrow($db->sql_query("SELECT COUNT(p.pid) AS total FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE c.visible>=0 AND (TO_DAYS(NOW()) - TO_DAYS(p.date))<7"));
	}
	else {
		$row = $db->sql_fetchrow($db->sql_query("SELECT COUNT(p.pid) AS total FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE c.visible>0 AND (TO_DAYS(NOW()) - TO_DAYS(p.date))<7"));
	}
	if (is_admin($admin))
		$row2 = $db->sql_fetchrow($db->sql_query("SELECT SUM(total) AS total FROM $prefix"._gallery_categories." WHERE visible>=0 AND parent=-1"));
	else
		$row2 = $db->sql_fetchrow($db->sql_query("SELECT SUM(total) AS total FROM $prefix"._gallery_categories." WHERE visible>0 AND parent=-1"));

	$out = '<p align="center">'
		.'<font class="'.$font['title'].'">[&lt;</font> '
		.'<a class="'.$font['title'].'" href="'.$baseurl.'">'._GALHOME.'</a>'
	;
	if($galleryvar['displaytop']) {
                $out .= ' <font class="'.$font['title'].'">|</font> <a class="'.$font['title'].'" href="'.$baseurl.'&amp;do=top">'._GALTOP10.'</a>';
	}
	if($galleryvar['allowpostpics']) {
		$out .= ' <font class="'.$font['title'].'">|</font> <a class="'.$font['title'].'" href="'.$baseurl.'&amp;do=upload">'._GALPOSTMEDIA.'</a>';
	}
	$out .= ' <font class="'.$font['title'].'">&gt;]</font>';
	$out .= '<br><font class="'.$font['tiny'].'">'.$row2[total].' '._GALIMAGES.'</font>';
	if($row[total] && !$do)
		$out .= ' <font class="'.$font['tiny'].'">('.$row[total].' '._GALNEWIMAGES.')</font>';
	$out .= '</p>';
	return $out;
}

function recursiveBuild($gid) {
	global
		$baseurl,
                $font,
		$prefix, $db
	;

	if ($gid>0) {
		$sql = "select gallname, parent from $prefix"._gallery_categories." WHERE gallid=$gid";
		//echo $sql;
		list($gname, $parent) = $db->sql_fetchrow($db->sql_query($sql));
	}
	else
		return "";
	if ($parent>0) 	{
		$out .= recursiveBuild($parent);
		$out .= '<font class="'.$font['title'].'"> &gt;&gt; </font><a class="'.$font['title'].'" href="'.$baseurl.'&amp;do=showgall&amp;gid='.$gid.'">'.underscoreTospace($gname).'</a>';
		return $out;
	}
	else
		return '<font class="'.$font['title'].'"> &gt;&gt; </font><a class="'.$font['title'].'" href="'.$baseurl.'&amp;do=showgall&amp;gid='.$gid.'">'.underscoreTospace($gname).'</a>';
}

function navigationTree($gid, $pid) {
	global
		$baseurl,
		$bgcolor2,
                $font,
		$prefix, $db
	;

	$sql = "select gallname, parent from $prefix"._gallery_categories." WHERE gallid=$gid";
        list($gallname, $parent) = $db->sql_fetchrow($db->sql_query($sql));

	$out  = '<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000"><tr><td>';
    	$out .= '<table width="100%" border="0" cellspacing="1" cellpadding="8" bgcolor="'.$bgcolor2.'"><tr><td>';

	$out .= '<a class="'.$font['title'].'" href="'.$baseurl.'">'._GALHOME.'</a>';

	$out .= recursiveBuild($parent);

	if (isset($pid) && $pid!="") {
		list($name) = $db->sql_fetchrow($db->sql_query("select name from $prefix"._gallery_pictures." WHERE pid=$pid"));
		$out .= '<font class="'.$font['title'].'"> &gt;&gt; </font><a class="'.$font['title'].'" href="'.$baseurl.'&amp;do=showgall&amp;gid='.$gid.'">'.underscoreTospace($gallname).'</a>';
		$out .=  '<font class="'.$font['title'].'"> &gt;&gt; '.underscoreTospace($name).'</font>';
	}
	else
		$out .= '<font class="'.$font['title'].'"> &gt;&gt; '.underscoreTospace($gallname).'</font>';

	$out .= '
	</td></tr>
	</table>
	</td></tr>
	</table>';
	return $out;
}

function postcomment($pid, $comment, $gname, $member) {
	global $prefix, $db;

        $comment = FixQuotes($comment);
        $gname = FixQuotes($gname);
	$db->sql_query("insert into $prefix"._gallery_comments." values (NULL, '$pid', '$comment', now(), '$gname', $member)");
}

function indent($gid) {
	global $prefix, $db;

	$tab = 0;
	list($parent) = $db->sql_fetchrow($db->sql_query("SELECT parent FROM $prefix"._gallery_categories." WHERE gallid=$gid"));
	while ($parent != -1) {
		list($parent) = $db->sql_fetchrow($db->sql_query("SELECT parent FROM $prefix"._gallery_categories." WHERE gallid=$parent"));
		$tab ++;
	}
	return $tab;
}


function convertorderbyin($orderby) {
    if ($orderby == "titleA")	$orderby = "name ASC";
    if ($orderby == "dateA")	$orderby = "date ASC";
    if ($orderby == "hitsA")	$orderby = "counter ASC";
    if ($orderby == "ratingA")	$orderby = "rate ASC";
    if ($orderby == "titleD")	$orderby = "name DESC";
    if ($orderby == "dateD")	$orderby = "date DESC";
    if ($orderby == "hitsD")	$orderby = "counter DESC";
    if ($orderby == "ratingD")	$orderby = "rate DESC";
    return $orderby;
}

function convertorderbyout($orderby) {
    if ($orderby == "name ASC")		$orderby = "titleA";
    if ($orderby == "date ASC")		$orderby = "dateA";
    if ($orderby == "counter ASC")	$orderby = "hitsA";
    if ($orderby == "rate ASC")		$orderby = "ratingA";
    if ($orderby == "name DESC")	$orderby = "titleD";
    if ($orderby == "date DESC")	$orderby = "dateD";
    if ($orderby == "counter DESC")	$orderby = "hitsD";
    if ($orderby == "rate DESC")	$orderby = "ratingD";
    return $orderby;
}


switch($do) {

        case "showgall":
                 include("$basepath/public/displayCategory.php");
                showgall($gid, $offset, $orderby);
                break;

        case "showpic":
        	include("$basepath/public/displayMedia.php");
                $db->sql_query("update $prefix"._gallery_pictures." set counter=counter+1 where pid=$pid");
		showpic($pid, $orderby);
        	break;

        case "top":
        	include("$basepath/public/displayTop.php");
		top();
        	break;

	case "New":
        	newpics();
        	break;

        case "Post":
        	postcomment($pid, $comment, $gname, $member);
		header("Location: modules.php?op=modload&name=$name&file=index&do=showpic&pid=$pid");
		//print ' ';
		exit;
		break;

	case "Vote":
		include("$basepath/public/displayMedia.php");
		rateCollector($pid, $rate);
		showpic($pid, $orderby);
		break;

	case "upload":
		include("$basepath/public/uploadFile.php");
		include("$adminpath/fileFunctions.php");
		if (isset($add) && $add=="Upload") {
			$ext = substr($userfile_name, (strrpos($userfile_name,'.') +  1));
			$result = $db->sql_query("select filetype from $prefix"._gallery_media_types." where extension='$ext'");
			if (mysql_num_rows($result)==0) {
				galleryHeader();
				OpenTable();
				echo navigationGall();
				echo '<br>';
				echo '<center>'._GALTYPENOTSUPPORTED.'<br><br>'._GOBACK.'</center>';
				CloseTable();
				galleryFooter();
			}
			$upload_return = Add($Category, $userfile_name, $Submitter, $MediaName, $Description, $userfile, $userfile_name, $userfile_size);
			//echo "public index : $upload_return<br>";
			if ($upload_return!="OK") {
				galleryHeader();
				OpenTable();
				echo navigationGall();
				echo '<br>';
				echo '<center>'.$upload_return.'<br><br>'._GOBACK.'</center>';
				CloseTable();
				galleryFooter();
			}
			else {
			    	galleryHeader();
			    	OpenTable();
			    	echo navigationGall();
				echo '<p align="center"><b>'._GALMEDIARECEIVED."</b><br>";
				echo _GALCHECKFORIT.'</p>';
				CloseTable();
				galleryFooter();
			}
		}
		else
			upload_file();
		break;

	case 'search':
		include("$basepath/public/displayCategory.php");
		include "$basepath/public/search.php";
		search_go($HTTP_POST_VARS);
		break;

	case 'deletecomment':
		include("$basepath/public/displayMedia.php");
                $sql = "DELETE from $prefix"._gallery_comments." where cid=$cid";
		$db->sql_query($sql);
                showpic($pid, $orderby);
		break;
	case "getit":
		$url = "$basepath/gallery/".$url;
		if (!strstr($url, "..") && file_exists($url)) {
			header("Content-type: application/octet-stream");
			Header("Location: $url");
		}
		else {
			galleryHeader();
			OpenTable();
			echo navigationGall();
			echo '<p align="center"><b>'._GALFILENOTFOUND.'</b><br><br>'._GOBACK.'</p>';
			CloseTable();
			galleryFooter();
		}
		break;
        default:
	        include("$basepath/public/mainGallery.php");
		viewcats();
       	 	break;
}
?>
