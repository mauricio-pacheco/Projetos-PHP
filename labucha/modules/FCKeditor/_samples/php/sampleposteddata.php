<?php /*
 * FCKeditor - The text editor for internet
 * Copyright (C) 2003-2004 Frederico Caldeira Knabben
 * 
 * Licensed under the terms of the GNU Lesser General Public License:
 * 		http://www.opensource.org/licenses/lgpl-license.php
 * 
 * For further information visit:
 * 		http://www.fckeditor.net/
 * 
 * File Name: sampleposteddata.php
 * 	This page lists the data posted by a form.
 * 
 * Version:  2.0 RC1
 * Modified: 2004-11-29 17:59:37
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 * 		Jim Michaels (jmichae3@yahoo.com)
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>FCKeditor - Samples - Posted Data</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex, nofollow">
		<link href="../sample.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>FCKeditor - Samples - Posted Data</h1>
		This page lists all data posted by the form.
		<hr>
		<table width="100%" border="1" cellspacing="0" bordercolor="#999999">
			<tr style="FONT-WEIGHT: bold; COLOR: #dddddd; BACKGROUND-COLOR: #999999">
				<td nowrap>Field Name&nbsp;&nbsp;</td>
				<td>Value</td>
			</tr>
<?php

if ( version_compare( phpversion(), '4.1.0' ) == -1 )
    // prior to 4.1.0, use HTTP_POST_VARS
    $postArray = &$HTTP_POST_VARS ;
else
    // 4.1.0 or later, use $_POST
    $postArray = &$_POST ;

foreach ( $postArray as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ) ) ;

?>
			<tr>
				<td valign="top" nowrap><b><?=$sForm?></b></td>
				<td width="100%"><?=$postedValue?></td>
			</tr>
<?php
}
?>
		</table>
	</body>
</html>
