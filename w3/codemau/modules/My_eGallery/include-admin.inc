<?php

if ($Version_ID=="PostNuke") {
        if ($Version_Num >= "0.7.0") {
                if (!authorised(0, 'My_eGallery::', '::', ACCESS_ADMIN)) { exit();}
        }
        $adminpath = "modules/$ModName/admin/modules";
        $font['title'] = "pn-title";
        $font['normal'] = "pn-normal";
        $font['tiny'] = "pn-sub";
}
else {
        include("modules/$ModName/functions.inc");
        $adminpath = "admin/modules/gallery";
        $font['title'] = "title";
        $font['normal'] = "content";
        $font['tiny'] = "tiny";
}

include("$adminpath/config.php");
include("modules/$ModName/Version.php");

modules_get_language("global");
modules_get_language("admin");

?>