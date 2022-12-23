<?php

function displayIconCat($row) {
	global $baseurl, $gallerypath, $font, $admin, $user, $galleryvar, $bgcolor2, $imagepath ,$adminurl;

	switch ($row[visible]) {
		case 0:
			$vis = '';
			break;
		case 1:
			$vis = '';
			break;
		default:
			$vis = '';
			break; 
	}




	$imgsize = @getimagesize("$gallerypath/$row[galloc]/$row[gallimg]");

	$tab_h = '<table border="0" align="center"><tr><td height="'.(intval($galleryvar['SubCatIconwidth'])+2).'" width="'.$galleryvar['SubCatIconwidth'].'" align="center" valign="middle">';
	$tab_f = '</td></tr><tr><td align="center"> '.$vis.' </td></tr></table>';


	if ($row[visible]==1) {
		if (is_admin($admin) || is_user($user))
			return $tab_h.'<a class="'.$font['normal'].'" href="'.$baseurl.'&amp;do=showgall&amp;gid='.$row[gallid].'">'
				.'<img src="'.$gallerypath.'/'.$row[galloc].'/'.$row[gallimg].'" alt="'.$row[description].'" '.$imgsize[3].' border="0">'
				.'</a>'.$tab_f;
		else
			return $tab_h.'<img src="'.$gallerypath.'/'.$row[galloc].'/'.$row[gallimg].'" alt="'.$row[description].'" '.$imgsize[3].' border="0">'.$tab_f;
	}
	else
		return $tab_h.'<a class='.$font['normal'].' href="'.$baseurl.'&amp;do=showgall&amp;gid='.$row[gallid].'">'
			.'<img src="'.$gallerypath.'/'.$row[galloc].'/'.$row[gallimg].'" alt="'.$row[description].'" '.$imgsize[3].' border="0">'
			.'</a>'.$tab_f;

}

function displayDescriptionCat($row) {
	global $font;
	if ($row[description]) {
		return '<font class='.$font['normal'].'>'.nl2br($row[description]).'</font>';
	} else {
		return '';
	}
}

function displayCatName($row) {
	global $imagepath, $font, $baseurl, $admin, $user, $adminurl, $galleryvar;

	
	$desc = underscoreTospace($row[gallname]);
	$dLen = intval($galleryvar['DescriptLen']);
	
	if ($row[visible]==1 && !is_user($user) && !is_admin($admin)) 
		$out = '<font class="'.$font['normal'].'">'.$desc.'</font> <font class="content">('.$row[total].')</font>';
	else
		$out = '<a class="'.$font['normal'].'" href="'.$baseurl.'&amp;do=showgall&amp;gid='.$row[gallid].'">'.$desc.'</a>';


	if($row[new_day] == 0) {
		$out .= ' ';
	}
	elseif($row[new_day] < 3) {
		$out .= '';
	}
	elseif($row[new_day] < 7) {
		$out .= '';
	} else {
		$out .= ' <img src="'.$imagepath.'/blank.gif" border="0" height="14" alt="">';
	}


	$out .= $vis;
	return $out;
}

function navigationSubCat($row) {
	global $baseurl, $bgcolor1, $bgcolor2, $admin, $prefix, $db;

	//$userRank = getUserRank();
	//$result = $db->sql_query("SELECT gallid, gallname FROM gallery_categories WHERE parent=$row[gallid] AND visible>=$userRank");
	if (is_admin($admin))
		$result = $db->sql_query("SELECT gallid, gallname FROM $prefix"._gallery_categories." WHERE parent=$row[gallid] AND visible>=0 ORDER by gallname");
	else
		$result = $db->sql_query("SELECT gallid, gallname FROM $prefix"._gallery_categories." WHERE parent=$row[gallid] AND visible>0 ORDER by gallname");

	if(!$db->sql_numrows($result)) {
		return;
	}
	$c = false;
	$out = '<table border="0" cellpadding="0" cellspacing="0"><tr><td>';

	while($row = $db->sql_fetchrow($result)) {
		if($c) {
			$out.= ', ';
		}
		$out .= '<a class="'.$font['title'].'" href="'.$baseurl.'&amp;do=showgall&amp;gid='.$row[gallid].'">'.$row[gallname].'</a>';
		$c = true;;
	}
	$out .= '</td></tr></table>';
	return $out;
}

function viewcats() {
	global $galleryvar, $admin, $user, $prefix, $db, $bgcolor1, $bgcolor2, $textcolor1, $imagepath, $name;

	include "admin/modules/gallery/config.php";

	$sql = "SELECT templateCategory, templateCSS FROM $prefix"._gallery_template_types." WHERE id=".$galleryvar['maintemplate']."";
        $trow = $db->sql_fetchrow($db->sql_query($sql));

	if (is_admin($admin)){
		$result = $db->sql_query("SELECT *, (TO_DAYS(NOW()) - TO_DAYS(lastadd)) AS new_day FROM $prefix"._gallery_categories." WHERE parent=-1 AND visible>=0 ORDER BY gallname");
	} else {
		$result = $db->sql_query("SELECT *, (TO_DAYS(NOW()) - TO_DAYS(lastadd)) AS new_day FROM $prefix"._gallery_categories." WHERE parent=-1 AND visible>0 ORDER BY gallname");
	}
	$res = $db->sql_fetchrow($db->sql_query("SELECT count(*) as total FROM $prefix"._gallery_categories." WHERE parent=-1 AND visible=1"));

	$nb = $db->sql_numrows($result);
	if($nb >= $galleryvar['numColMain']) {
		$pc = 100/$galleryvar['numColMain'];
	}
	else {
		if($nb > 0) {
			$pc = 100/$nb;
			$galleryvar['numColMain'] = $nb;
		}
		else {
			$pc = 100;
			$galleryvar['numColMain'] = 1;
		}
	}
	// Start Of Output
	galleryHeader();

	//Security Warning//
	if (file_exists("modules/$name/install.php")) {
	    print '<br><br><center><h1><font color="red">!!!Please <u>REMOVE</u> install script file<br><br>[\'modules/'.$name.'/install.php\']<br><br>from your server AFTER you install this module completed!!!.</font></h1></center><br><br>';
	}

	
	galleryFooter();
}
?>
