<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Idefix                                         */
/* http://www.Nukedownload.com                                          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/************************************************************************/
/* Filename: Block randompic                                            */
/* Original  Author:Idefix                                              */
/* Tested With PHP NUKE 5.2 and MEG 2.7.4                               */
/************************************************************************/


if (eregi("block-randompic.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}

$blocks_modules[randompic] = array(
    'title' => "randompic",
    'func_display' => 'randompic',
    'func_add' => '',
    'func_update' => '',
    'text_type' => 'randompic',
    'text_type_long' => '',
    'text_content' => "randompic",
    'support_nukecode' => false,
    'allow_create' => false,
    'allow_delete' => false,
    'form_url' => false,
    'form_content' => false,
    'form_refresh' => false
);

	global $user, $prefix;
	
	include 'admin/modules/gallery/config.php';
	mt_srand((double)microtime()*1000000);
	if (is_user($user))
		$total = mysql_fetch_array(mysql_query("SELECT COUNT(p.pid) AS total FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE c.visible>=1"));
	else 
		$total = mysql_fetch_array(mysql_query("SELECT COUNT(p.pid) AS total FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE c.visible>=2"));
	
	$p = mt_rand(0,($total[total] - 1));

	$pic = mysql_fetch_array(mysql_query("SELECT p.pid, p.img, p.name, p.description, c.galloc FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid LIMIT $p,1"));
	
	$pic[description] = htmlentities($pic[description]);
	
	if (file_exists("$gallerypath/$pic[galloc]/thumb/$pic[img]")) 
		$content = "<center><a href=\"$baseurl&amp;do=showpic&amp;pid=$pic[pid]\"><img src=\"$gallerypath/$pic[galloc]/thumb/$pic[img]\" width=\"120\" border=\"0\" alt=\"$pic[description]\"><br><font size=\"1\">$pic[name]</font></a></center>";
	else 
		$content = "<center><a href=\"$baseurl&amp;do=showpic&amp;pid=$pic[pid]\"><img src=\"$gallerypath/$pic[galloc]/$pic[img]\" width=\"120\" border=\"0\" alt=\"$pic[description]\"><br><font size=\"1\">$pic[name]</font></a></center>";
 
?>