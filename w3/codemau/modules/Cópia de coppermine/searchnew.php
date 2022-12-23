<?php 
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
// http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                  //
// http://coppermine.findhere.org/                                          //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
define('SEARCHNEW_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

if (!GALLERY_ADMIN_MODE) cpg_die(ERROR, $lang_errors['access_denied'], __FILE__, __LINE__);

/**
 * Local functions definition
 */

/**
 * albumselect()
 * 
 * return the HTML code for a listbox with name $id that contains the list
 * of all albums
 * 
 * @param string $id the name of the listbox
 * @return the HTML code
 */
function albumselect($id = "album")
{
    global $CONFIG, $field_user_name, $field_user_id;
    static $select = "";

    if ($select == "") {
        $rowset = get_albumlist();
        $select = '<option value="0">' . SELECT_ALBUM . '</option>\n';

        foreach ($rowset as $row) {
            $select .= "<option value=\"" . $row["aid"] . "\">" . $row["title"] . "</option>\n";
        } 
    } 

    return "\n<select name=\"$id\" class=\"listbox\">\n$select</select>\n";
}

/**
 * dirheader()
 * 
 * return the HTML code for the row to be displayed when we start a new
 * directory
 * 
 * @param  $dir the directory
 * @param  $dirid the name of the listbox that will list the albums
 * @return the HTML code
 */
function dirheader($dir, $dirid)
{
    global $CONFIG;
    $warning = '';

    if (!is_writable($CONFIG['fullpath'] . $dir))
        $warning = "<tr><td class=\"tableh2\" valign=\"middle\" colspan=\"3\">\n<b>" .
                   WARNING."</b>: ".CHANGE_PERM."</td></tr>\n";
    return "<tr><td class=\"tableh2\" valign=\"middle\" colspan=\"3\">\n" .
    sprintf(TARGET_ALBUM, $dir, albumselect($dirid)) . "</td></tr>\n" . $warning;
} 

/**
 * picrow()
 * 
 * return the HTML code for a row to be displayed for an image
 * the row contains a checkbox, the image name, a thumbnail
 * 
 * @param  $picfile the full path of the file that contains the picture
 * @param  $picid the name of the check box
 * @return the HTML code
 */
function picrow($picfile, $picid, $albid)
{
    global $CONFIG, $expic_array, $CPG_URL;

    $encoded_picfile = base64_encode($picfile);
    $picname = $CONFIG['fullpath'] . $picfile;
    $pic_url = urlencode($picfile);
    $pic_fname = basename($picfile);
    $sql = "SELECT * FROM " . $CONFIG['TABLE_PREFIX'] . "pictures WHERE filename ='$pic_fname'";
    $result = db_query($sql);

    $exists = mysql_num_rows($result);

    while ($exists <= 0) {
	  if ($CONFIG['thumb_method']=='none'){
		  $thumb_file=dirname($picname).'/'.$pic_fname;
		  $thumb_info=getimagesize($picname);
		  $thumb_size=compute_img_size($thumb_info[0], $thumb_info[1], 48);
		  $img='<img src="'.path2url($picname). '" '. $thumb_size['geom'].' class="thumbnail" border="0">';
	  }else{
        $thumb_file = dirname($picname) . '/' . $CONFIG['thumb_pfx'] . $pic_fname;
        if (file_exists($thumb_file)) {
            $thumb_info = getimagesize($picname);
            $thumb_size = compute_img_size($thumb_info[0], $thumb_info[1], 48);
            $img = '<img src="' . path2url($picname) . '" ' . $thumb_size['geom'] . ' class="thumbnail" border="0">';
        } else {
            $img = '<img src="' . $CPG_URL . '&file=showthumbbatch&picfile=' . $pic_url . '&size=48" class="thumbnail" border="0">';
        } 
      } 

        if (filesize($picname) && is_readable($picname)) {
            $fullimagesize = getimagesize($picname);
            $winsizeX = ($fullimagesize[0] + 16);
            $winsizeY = ($fullimagesize[1] + 16);

            $checked = isset($expic_array[$picfile]) || !$fullimagesize ? '' : 'checked';

            return <<<EOT
        <tr>
                <td class="tableb" valign="middle">
                        <input name="pics[]" type="checkbox" value="$picid" $checked>
                        <input name="album_lb_id_$picid" type="hidden" value="$albid">
                        <input name="picfile_$picid" type="hidden" value="$encoded_picfile">
                </td>
                <td class="tableb" valign="middle" width="100%">
                        <a href="javascript:;" onClick= "MM_openBrWindow('$CPG_URL&file=displayimagepopup&fullsize=1&picfile=$pic_url', 'ImageViewer', 'toolbar=yes, status=yes, resizable=yes, scrollbars=yes, width=$winsizeX, height=$winsizeY')">$pic_fname</a>
                </td>
                <td class="tableb" valign="middle" align="center">
                        <a href="javascript:;" onClick= "MM_openBrWindow('$CPG_URL&file=displayimagepopup&fullsize=1&picfile=$pic_url', 'ImageViewer', 'toolbar=yes, status=yes, resizable=yes, scrollbars=yes, width=$winsizeX, height=$winsizeY')">$img<br /></a>
                </td>
        </tr>
EOT;
        } else {
            $winsizeX = (300);
            $winsizeY = (300);
            return <<<EOT
        <tr>
                <td class="tableb" valign="middle">
                        &nbsp;
                </td>
                <td class="tableb" valign="middle" width="100%">
                        <i>$pic_fname</i>
                </td>
                <td class="tableb" valign="middle" align="center">
                        <a href="javascript:;" onClick= "MM_openBrWindow('$CPG_URL&file=displayimagepopup&fullsize=1&picfile=$pic_url', 'ImageViewer', 'toolbar=yes, status=yes, resizable=yes, scrollbars=yes, width=$winsizeX, height=$winsizeY')"><img src="$CPG_URL&file=showthumbbatch&picfile=$pic_url&size=48" class="thumbnail" border="0"><br /></a>
                </td>
        </tr>
EOT;
        } 
    } 
} 

/**
 * getfoldercontent()
 * 
 * return the files and directories of a folder in two arrays
 * 
 * @param  $folder the folder to read
 * @param  $dir_array the array that will contain name of sub-dir
 * @param  $pic_array the array that will contain name of picture
 * @param  $expic_array an array that contains pictures already in db
 * @return 
 */
function getfoldercontent($folder, &$dir_array, &$pic_array, &$expic_array)
{
    global $CONFIG;

    $dir = opendir($CONFIG['fullpath'] . $folder);
    while ($file = readdir($dir)) {
        if (is_dir($CONFIG['fullpath'] . $folder . $file)) {
            if ($file != "." && $file != "..")
                $dir_array[] = $file;
        } 
        if (is_file($CONFIG['fullpath'] . $folder . $file)) {
            if (strncmp($file, $CONFIG['thumb_pfx'], strlen($CONFIG['thumb_pfx'])) != 0 && strncmp($file, $CONFIG['normal_pfx'], strlen($CONFIG['normal_pfx'])) != 0 && $file != 'index.html')
                $pic_array[] = $file;
        } 
    } 
    closedir($dir);

    natcasesort($dir_array);
    natcasesort($pic_array);
} 

function display_dir_tree($folder, $ident)
{
    global $CONFIG, $PHP_SELF, $CPG_M_DIR, $CPG_URL;

    $dir_path = $CONFIG['fullpath'] . $folder;

    if (!is_readable($dir_path)) return;

    $dir = opendir($dir_path);
    while ($file = readdir($dir)) {
        if (is_dir($CONFIG['fullpath'] . $folder . $file) && $file != "." && $file != "..") {
            $start_target = $folder . $file;
            $dir_path = $CONFIG['fullpath'] . $folder . $file;

            $warnings = '';
            if (!is_writable($dir_path)) $warnings .= DIR_RO;
            if (!is_readable($dir_path)) $warnings .= DIR_CANT_READ;

            if ($warnings) $warnings = '&nbsp;&nbsp;&nbsp;<b>' . $warnings . '<b>';

            echo <<<EOT
                        <tr>
                                <td class="tableb">
                                        $ident<img src="$CPG_M_DIR/images/folder.gif" alt="">&nbsp;<a href= "$CPG_URL&file=searchnew&startdir=$start_target">$file</a>$warnings
                                </td>
                        </tr>
EOT;
            display_dir_tree($folder . $file . '/', $ident . '&nbsp;&nbsp;&nbsp;&nbsp;');
        } 
    } 
    closedir($dir);
} 

/**
 * getallpicindb()
 * 
 * Fill an array where keys are the full path of all images in the picture table
 * 
 * @param  $pic_array the array to be filled
 * @return 
 */
function getallpicindb(&$pic_array, $startdir)
{
    global $CONFIG;

    $sql = "SELECT filepath, filename " . "FROM {$CONFIG['TABLE_PICTURES']} " . "WHERE filepath LIKE '$startdir%'";
    $result = db_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $pic_file = $row['filepath'] . $row['filename'];
        $pic_array[$pic_file] = 1;
    } 
    mysql_free_result($result);
} 

/**
 * getallalbumsindb()
 * 
 * Fill an array with all albums where keys are aid of albums and values are
 * album title
 * 
 * @param  $album_array the array to be filled
 * @return 
 */
function getallalbumsindb(&$album_array)
{
    global $CONFIG;

    $sql = "SELECT aid, title " . "FROM {$CONFIG['TABLE_ALBUMS']} " . "WHERE 1";
    $result = mysql_query($sql);

    while ($row = mysql_fetch_array($result)) {
        $album_array[$row['aid']] = $row['title'];
    } 
    mysql_free_result($result);
} 

/**
 * CPGscandir() //renamed because php5 has scandir()func
 * 
 * recursive function that scan a directory, create the HTML code for each
 * picture and add new pictures in an array
 * 
 * @param  $dir the directory to be scanned
 * @param  $expic_array the array that contains pictures already in DB
 * @param  $newpic_array the array that contains new pictures found
 * @return 
 */
function CPGscandir($dir, &$expic_array)
{ 
    // ##    $dir = str_replace(".","" ,$dir);
    static $dir_id = 0;
    static $count = 0;
    static $pic_id = 0;
    $pic_array = array();
    $dir_array = array();

    getfoldercontent($dir, $dir_array, $pic_array, $expic_array);

    if (count($pic_array) > 0) {
        $dir_id_str = sprintf("d%04d", $dir_id++);
        echo dirheader($dir, $dir_id_str);
        foreach ($pic_array as $picture) {
            $count++;
            $pic_id_str = sprintf("i%04d", $pic_id++);
            echo picrow($dir . $picture, $pic_id_str, $dir_id_str);
        } 
    } 
    if (count($dir_array) > 0) {
        foreach ($dir_array as $directory) {
            CPGscandir($dir . $directory . '/', $expic_array);
        } 
    } 
    return $count;
} 

/**
 * Main code
 */

$album_array = array();
getallalbumsindb($album_array);
// We need at least one album
if (!count($album_array)) cpg_die(ERROR, NEED_ONE_ALBUM, __FILE__, __LINE__);

if (isset($HTTP_POST_VARS['insert'])) {
    if (!isset($HTTP_POST_VARS['pics'])) {
        cpg_die(ERROR, NO_PIC_TO_ADD, __FILE__, __LINE__);
    } 
    foreach ($HTTP_POST_VARS['pics'] as $pic_id) {
        // check to see if select has changed
        if ($HTTP_POST_VARS[$HTTP_POST_VARS['album_lb_id_' . $pic_id]] == 0) {
            cpg_die(ERROR, NO_ALBUM, "searchnew.php id: " . $HTTP_POST_VARS['album_lb_id_' . $pic_id] . " pic_id: $pic_id", __LINE__); //return;
        } 
    } // end of die if album not selected
    pageheader(PAGE_TITLE);
    starttable("100%");
    echo '
    <tr>
        <td colspan="4" class="tableh1"><h2>'.INSERT.'</h2></td>
    </tr>
    <tr>
        <td class="tableh2" colspan="4">
            <b>'.BE_PATIENT.'</b>
        </td>
    </tr>
    <tr>
        <td class="tableb" colspan="4">
            '.NOTES.'
        </td>
    </tr>
    <tr>
        <td class="tableh2" valign="middle" align="center"><b>'.FOLDER.'</b></td>
        <td class="tableh2" valign="middle" align="center"><b>'.IMAGE.'</b></td>
        <td class="tableh2" valign="middle" align="center"><b>'.ALBUM.'</b></td>
        <td class="tableh2" valign="middle" align="center"><b>'.RESULT.'</b></td>
    </tr>';

    $count = 0;
    require($CPG_M_DIR . '/include/picmgmtbatch.inc.php');
    define('ADDPIC_PHP', true);
	define('NO_HEADER', true);
	require("modules/" . $name . "/include/load.inc.php");


    foreach ($HTTP_POST_VARS['pics'] as $pic_id) {
        // check to see if select has changed
        $album_lb_id = $HTTP_POST_VARS['album_lb_id_' . $pic_id];
        $album_id = $HTTP_POST_VARS[$album_lb_id];
        $album_name = $album_array[$album_id];
        $pic_file = $CONFIG['fullpath'] . base64_decode($HTTP_POST_VARS['picfile_' . $pic_id]);
        $dir_name = dirname($pic_file) . "/";
        $file_name = basename($pic_file); 
        //para o modo none
        if ($CONFIG['thumb_method']=='none'){
	        $aid = (int)$album_id;
			$sql = "SELECT pid " . "FROM {$CONFIG['TABLE_PICTURES']} " . "WHERE filepath='" . addslashes($dir_name) . "' AND filename='" . addslashes($file_name) . "' " . "LIMIT 1";
			$result = db_query($sql);
			if (mysql_num_rows($result)) {
			    $file_name = $CPG_M_DIR . "/images/up_dup.gif";
			} elseif (add_picture($aid, $dir_name, $file_name)) {
    			$file_name = $CPG_M_DIR . "/images/up_ok.gif";
			} else {
    			$file_name = $CPG_M_DIR . "/images/up_pb.gif";
    			echo $ERROR;
			} 
	        $status = "<a href=\"$CPG_URL&file=addpic&aid=$album_id&pic_file=" . ($HTTP_POST_VARS['picfile_' . $pic_id]) . "&reload=" . uniqid('') . "\">" . "<img src=\"$file_name\" " . "&reload=" . uniqid('') . "\" class=\"thumbnail\" border=\"0\" width=\"24\" height=\"24\" /><br /></a>";
		}else{
        	$status = "<a href=\"$CPG_URL&file=addpic&aid=$album_id&pic_file=" . ($HTTP_POST_VARS['picfile_' . $pic_id]) . "&reload=" . uniqid('') . "\"><img src=\"$CPG_URL&file=addpic&aid=$album_id&pic_file=" . ($HTTP_POST_VARS['picfile_' . $pic_id]) . "&reload=" . uniqid('') . "\" class=\"thumbnail\" border=\"0\" width=\"24\" height=\"24\" /><br /></a>";
		}
        $pic_file = base64_decode($HTTP_POST_VARS['picfile_' . $pic_id]);
        $dir_name = dirname($pic_file) . "/";
        $file_name = basename($pic_file); 
        
        // To avoid problems with PHP scripts max execution time limit, each picture is
        // added individually using a separate script that returns an image
        $album_name = $album_array[$album_id];

        echo "<tr>\n";
        echo "<td class=\"tableb\" valign=\"middle\" align=\"left\">$dir_name</td>\n";
        echo "<td class=\"tableb\" valign=\"middle\" align=\"left\">$file_name</td>\n";
        echo "<td class=\"tableb\" valign=\"middle\" align=\"left\">$album_name</td>\n";
        echo "<td class=\"tableb\" valign=\"middle\" align=\"center\">$status</td>\n";
        echo "</tr>\n";
        $count++;
    } 
    endtable();
    pagefooter();
}
elseif (isset($_GET['startdir'])) {
    pageheader(PAGE_TITLE);
    starttable("100%");
    echo '
        <form method="post" action="'.$CPG_URL.'&file=searchnew&insert=1">
        <tr>
                <td colspan="3" class="tableh1"><h2>'.LIST_NEW_PIC.'</h2></td>
        </tr>';
    $expic_array = array();

    getallpicindb($expic_array, $_GET['startdir']);
    if (CPGscandir($_GET['startdir'] . '/', $expic_array)) {
        echo '
        <tr>
                <td colspan="3" align="center" class="tablef">
                        <input type="submit" class="button" name="insert" value="'.INSERT_SELECTED.'">
                </td>
        </tr>
        </form>';
    }
    else {
        echo '
        <tr>
                <td colspan="3" align="center" class="tableb">
                        <br /><br />
                        <b>'.NO_PIC_FOUND.'</b>
                        <br /><br /><br />
                </td>
        </tr>
        </form>';
    }
    endtable();
    pagefooter();
}
else {
    pageheader(PAGE_TITLE);
    starttable(-1, SELECT_DIR);
    display_dir_tree('', '');
    echo '
        <tr>
                <td class="tablef">
                        <b>'.SELECT_DIR_MSG.'</b>
                </td>
        </tr>';
    endtable();
    pagefooter();
}
include("footer.php");
?>
