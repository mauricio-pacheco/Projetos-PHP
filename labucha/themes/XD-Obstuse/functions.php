<?php

require_once("mainfile.php");
 global $admin, $db, $prefix, $user_prefix, $user;

$result = $db->sql_query("SELECT rightclick, rightclick1, disableall, disableall1, sourcecode, clickms FROM ".$prefix."_themecpanel");
list($rightclick, $rightclick1, $disableall, $disableall1, $sourcecode, $clickms) = $db->sql_fetchrow($result);


if ($rightclick == 1) {
if (is_admin($admin)) {
     } 
else{
     echo "<SCRIPT type=\"text/javascript\">\n";
     echo "<!--\n";
     echo "//Disable right mouse click Script\n";
     echo "//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive\n";
     echo "//For full source code, visit http://www.dynamicdrive.com\n";
     echo "\n";
     echo "var message=\"$clickms\";\n";
     echo "\n";
     echo "///////////////////////////////////\n";
     echo "function clickIE4(){\n";
     echo "if (event.button==2){\n";
     echo "alert(message);\n";
     echo "return false;\n";
     echo "}\n";
     echo "}\n";
     echo "\n";
     echo "function clickNS4(e){\n";
     echo "if (document.layers||document.getElementById&&!document.all){\n";
     echo "if (e.which==2||e.which==3){\n";
     echo "alert(message);\n";
     echo "return false;\n";
     echo "}\n";
     echo "}\n";
     echo "}\n";
     echo "\n";
     echo "if (document.layers){\n";
     echo "document.captureEvents(Event.MOUSEDOWN);\n";
     echo "document.onmousedown=clickNS4;\n";
     echo "}\n";
     echo "else if (document.all&&!document.getElementById){\n";
     echo "document.onmousedown=clickIE4;\n";
     echo "}\n";
     echo "\n";
     echo "document.oncontextmenu=new Function(\"alert(message);return false\")\n";
     echo "\n";
     echo "//-->\n";
     echo "</SCRIPT>\n\n";
       } 
}

if ($rightclick1 == 1) {
    if (is_admin($admin)) {
     echo "<SCRIPT type=\"text/javascript\">\n";
     echo "<!--\n";
     echo "//Disable right mouse click Script\n";
     echo "//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive\n";
     echo "//For full source code, visit http://www.dynamicdrive.com\n";
     echo "\n";
     echo "var message=\"$clickms\";\n";
     echo "\n";
     echo "///////////////////////////////////\n";
     echo "function clickIE4(){\n";
     echo "if (event.button==2){\n";
     echo "alert(message);\n";
     echo "return false;\n";
     echo "}\n";
     echo "}\n";
     echo "\n";
     echo "function clickNS4(e){\n";
     echo "if (document.layers||document.getElementById&&!document.all){\n";
     echo "if (e.which==2||e.which==3){\n";
     echo "alert(message);\n";
     echo "return false;\n";
     echo "}\n";
     echo "}\n";
     echo "}\n";
     echo "\n";
     echo "if (document.layers){\n";
     echo "document.captureEvents(Event.MOUSEDOWN);\n";
     echo "document.onmousedown=clickNS4;\n";
     echo "}\n";
     echo "else if (document.all&&!document.getElementById){\n";
     echo "document.onmousedown=clickIE4;\n";
     echo "}\n";
     echo "\n";
     echo "document.oncontextmenu=new Function(\"alert(message);return false\")\n";
     echo "\n";
     echo "//-->\n";
     echo "</SCRIPT>\n\n";
     } 
else { }
}


/*Disable select text part*/
if ($disableall == 1) {
     if (is_admin($admin)) {
}
else {
     echo "<SCRIPT type=\"text/javascript\">\n";
     echo "<!--\n";
     echo "//Disable select-text script (IE4+, NS6+)- By Andy Scott\n";
     echo "//Exclusive permission granted to Dynamic Drive to feature script\n";
     echo "//Visit http://www.dynamicdrive.com for this script\n";
     echo "\n";
     echo "function disableselect(e){\n";
     echo "return false\n";
     echo "}\n";
     echo "\n";
     echo "function reEnable(){\n";
     echo "return true\n";
     echo "}\n";
     echo "\n";
     echo "//if IE4+\n";
     echo "document.onselectstart=new Function (\"return false\")\n";
     echo "\n";
     echo "//if NS6\n";
     echo "if (window.sidebar){\n";
     echo "document.onmousedown=disableselect\n";
     echo "document.onclick=reEnable\n";
     echo "}\n";
     echo "//-->\n";
     echo "</SCRIPT>\n\n";
}
}

/*Disable select text part*/
if ($disableall1 == 1) {
     if (is_admin($admin)) {

     echo "<SCRIPT type=\"text/javascript\">\n";
     echo "<!--\n";
     echo "//Disable select-text script (IE4+, NS6+)- By Andy Scott\n";
     echo "//Exclusive permission granted to Dynamic Drive to feature script\n";
     echo "//Visit http://www.dynamicdrive.com for this script\n";
     echo "\n";
     echo "function disableselect(e){\n";
     echo "return false\n";
     echo "}\n";
     echo "\n";
     echo "function reEnable(){\n";
     echo "return true\n";
     echo "}\n";
     echo "\n";
     echo "//if IE4+\n";
     echo "document.onselectstart=new Function (\"return false\")\n";
     echo "\n";
     echo "//if NS6\n";
     echo "if (window.sidebar){\n";
     echo "document.onmousedown=disableselect\n";
     echo "document.onclick=reEnable\n";
     echo "}\n";
     echo "//-->\n";
     echo "</SCRIPT>\n\n";
     }
 else {
 }
}

function _fwk_filter_encrypt($content)
{
  $table = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_@";
  $xor = 165;

  // Prepare encoding table
  $table = array_keys(count_chars($table, 1));
  $i_min = min($table);
  $i_max = max($table);
  for ($c = count($table); $c > 0; $r = mt_rand(0, $c--))
    array_splice($table, $r, $c - $r, array_reverse(array_slice($table, $r, $c - $r)));

  // Encode sequence
  $len = strlen($content);
  $word = $shift = 0;
  for ($i = 0; $i < $len; $i++)
  {
    $ch = $xor ^ ord($content[$i]);
    $word |= ($ch << $shift);
    $shift = ($shift + 2) % 6;
    $enc .= chr($table[$word & 0x3F]);
    $word >>= 6;
    if (!$shift)
    {
      $enc .= chr($table[$word]);
      $word >>= 6;
    }
  }
  if ($shift)
    $enc .= chr($table[$word]);

  // Decode sequence
  $tbl = array_fill($i_min, $i_max - $i_min + 1, 0);
  while (list($k,$v) = each($table))
    $tbl[$v] = $k;
  $tbl = implode(",", $tbl);

  $fi = ",p=0,s=0,w=0,t=Array({$tbl})";
  $f  = "w|=(t[x.charCodeAt(p++)-{$i_min}])<<s;";
  $f .= "if(s){r+=String.fromCharCode({$xor}^w&255);w>>=8;s-=2}else{s=6}";

  // Generate page
  $r = "<script language=JavaScript>";
  $r.= "function decrypt_p(x){";
  $r.= "var l=x.length,b=1024,i,j,r{$fi};";
  $r.= "for(j=Math.ceil(l/b);j>0;j--){r='';for(i=Math.min(l,b);i>0;i--,l--){{$f}}document.write(r)}";
  $r.= "}decrypt_p(\"{$enc}\")";
  $r.= "</script>";
  return $r;
}

if ($sourcecode==1) {
   ob_start("_fwk_filter_encrypt");
   //include("csource.php");
 } else 
{
}
?>