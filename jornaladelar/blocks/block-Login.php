<?php
if (eregi("block-Login.php", $_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
}

global $admin, $user, $sitekey, $gfx_chk;

mt_srand ((double)microtime()*1000000);
$maxran = 1000000;
$random_num = mt_rand(0, $maxran);
$content = "<form action=\"modules.php?name=Your_Account\" method=\"post\">";
$content .= "<center><font class=\"content\"> .:: "._NICKNAME." ::: ";
$content .= "<input type=\"text\" name=\"username\" size=\"10\" maxlength=\"25\"> ::: ";
$content .= ""._PASSWORD." ::: ";
$content .= "<input type=\"password\" name=\"user_password\" size=\"10\" maxlength=\"20\"> ::. <br><br> .:: ";
if (extension_loaded("gd") AND ($gfx_chk == 2 OR $gfx_chk == 4 OR $gfx_chk == 5 OR $gfx_chk == 7)) {
    $content .= ""._SECURITYCODE.": ::: <img src='modules.php?name=Your_Account&amp;op=gfx&amp;random_num=$random_num' border='0' alt='"._SECURITYCODE."' title='"._SECURITYCODE."'> ::: \n";
    $content .= ""._TYPESECCODE." ::: <input type=\"text\" NAME=\"gfx_check\" SIZE=\"7\" MAXLENGTH=\"6\">\n";
    $content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\"> ::: \n";
} else {
    $content .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\">";
    $content .= "<input type=\"hidden\" name=\"gfx_check\" value=\"$code\">";
}
$content .= "<input type=\"hidden\" name=\"op\" value=\"login\">";
$content .= "<input type=\"submit\" value=\""._LOGIN."\"> ::. </font></form> ";
$content .= ""._ASREGISTERED."";

if (is_admin($admin) AND is_user($user)) {
    $content = "<b>"._ADMIN."</b> [ <a href=\"admin.php?op=logout\"><font class=\"link1\">"._LOGOUT."</font></a> ]";
}

?>
