<?php


include("../include/common.php");


loginCheck('User');



include("$config[template_path]/admin_top.html");
?>
<P>
This is the administrative area of the site!</p>
<P>
</P>

<?
include("$config[template_path]/admin_bottom.html");

$conn->Close(); // close the db connection
?>
