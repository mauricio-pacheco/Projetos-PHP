<?php

if ($Version_ID=="PostNuke") {
        $adminpath = "modules/$ModName/admin/modules";
        $font['title'] = "pn-title";
        $font['normal'] = "pn-normal";
        $font['tiny'] = "pn-sub";
}
else {
        $adminpath = "admin/modules/gallery";
        include("modules/$ModName/functions.inc");
        $font['title'] = "title";
        $font['normal'] = "content";
        $font['tiny'] = "tiny";
}

include("$adminpath/config.php");
include("modules/$ModName/Version.php");

modules_get_language("global");
modules_get_language("public");





?>
