 <?php

if (!eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {

    case "themecpanel":
    case "themecpanelsave":
	case "savesecurity":
    include("admin/modules/themecpanel.php");
    break;
		
}

?>