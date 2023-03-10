<?php

/*********************************************************************************/
/* CNB Your Account: An Advanced User Management System for phpnuke     		*/
/* ============================================                         		*/
/*                                                                      		*/
/* Copyright (c) 2004 by Comunidade PHP Nuke Brasil                     		*/
/* http://dev.phpnuke.org.br & http://www.phpnuke.org.br                		*/
/*                                                                      		*/
/* Contact author: escudero@phpnuke.org.br                              		*/
/* International Support Forum: http://ravenphpscripts.com/forum76.html 		*/
/*                                                                      		*/
/* This program is free software. You can redistribute it and/or modify 		*/
/* it under the terms of the GNU General Public License as published by 		*/
/* the Free Software Foundation; either version 2 of the License.       		*/
/*                                                                      		*/
/*********************************************************************************/
/* CNB Your Account it the official successor of NSN Your Account by Bob Marion	*/
/*********************************************************************************/

if (!eregi("modules.php", $_SERVER['SCRIPT_NAME'])) {
    header("Location: ../../../index.php");
    die ();
}
if (!defined('CNBYA')) { echo "CNBYA protection"; exit; }

    include("header.php");
    $ya_user_email = strtolower($ya_user_email);
    ya_userCheck($ya_username);
    ya_mailCheck($ya_user_email);
    $user_regdate = date("M d, Y");
    if (!isset($stop)) {
        $datekey = date("F j");
        $rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
        $code = substr($rcode, 2, $ya_config['codesize']);
        if (extension_loaded("gd") AND $code != $gfx_check AND ($ya_config['usegfxcheck'] == 1 OR $ya_config['usegfxcheck'] == 3)) {
            Header("Location: modules.php?name=$module_name");
            die();
        }
        mt_srand ((double)microtime()*1000000);
        $maxran = 1000000;
        $check_num = mt_rand(0, $maxran);
        $check_num = md5($check_num);
        $time = time();
        $finishlink = "$nukeurl/modules.php?name=$module_name&op=activate&username=$ya_username&check_num=$check_num";
        $new_password = md5($user_password);
        $ya_username = check_html($ya_username, nohtml);
        $ya_user_email = check_html($ya_user_email, nohtml);
        list($newest_uid) = $db->sql_fetchrow($db->sql_query("SELECT max(user_id) AS newest_uid FROM ".$user_prefix."_users_temp"));
        if ($newest_uid == "-1") { $new_uid = 1; } else { $new_uid = $newest_uid+1; }
        $result = $db->sql_query("INSERT INTO ".$user_prefix."_users_temp (user_id, username, user_email, user_password, user_regdate, check_num, time) VALUES ($new_uid, '$ya_username', '$ya_user_email', '$new_password', '$user_regdate', '$check_num', '$time')");

		if ((count($nfield) > 0) AND ($result)) {
          foreach ($nfield as $key => $var) { 
  		    $db->sql_query("INSERT INTO ".$user_prefix."_cnbya_value_temp (uid, fid, value) VALUES ('$new_uid', '$key','$nfield[$key]')");				
		  }
		}
		
        if(!$result) {
            OpenTable();
            echo ""._ADDERROR."<br>";
            CloseTable();
        } else {
            if ($ya_config['servermail'] == 0) {
                $message = _WELCOMETO." $sitename ($nukeurl)!\r\n\r\n";
                $message .= _YOUUSEDEMAIL." $ya_user_email "._TOREGISTER." $sitename.\r\n\r\n";
                $message .= _TOFINISHUSER."\r\n\r\n$finishlink\r\n\r\n";
                $message .= _FOLLOWINGMEM."\r\n"._UNICKNAME." $ya_username\r\n"._UPASSWORD." $user_password";
                $subject = _ACTIVATIONSUB;
                $from  = "From: $adminmail\r\n";
                $from .= "Reply-To: $adminmail\r\n";
                $from .= "Return-Path: $adminmail\r\n";
                mail($ya_user_email, $subject, $message, $from);
            }
            title(_USERREGLOGIN);
            OpenTable();
            echo "<center><b>"._ACCOUNTCREATED."</b><br><br>";
            echo ""._YOUAREREGISTERED."<br><br>";
            echo ""._FINISHUSERCONF."<br><br>";
            echo ""._THANKSUSER." $sitename!</center>";
            CloseTable();
            if ($ya_config['sendaddmail'] == 1 AND $ya_config['servermail'] == 0) {
                $from  = "From: $ya_user_email\r\n";
                $from .= "Reply-To: $ya_user_email\r\n";
                $from .= "Return-Path: $ya_user_email\r\n";
                $subject = "$sitename - "._MEMACT;
                $from_ip = $_SERVER['REMOTE_ADDR'];
                $message  = "$ya_username "._YA_APLTO." $sitename "._YA_FROM." $from_ip\r\n";
                $message .= "-----------------------------------------------------------\r\n";
                $message .= _YA_NOREPLY;
                mail($adminmail, $subject, $message, $from);
            }
        }
    } else {
        echo "$stop";
    }
    include("footer.php");

?>