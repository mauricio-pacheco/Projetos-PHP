<?php
//require_once('database/db.php');
?>
<p><img src="images/icons/nettools.gif" width="32" height="32"> <b><font size="5" face="Times New Roman, Times, serif"><?php echo $lang_networktools; ?></font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
ini_set('display_errors','0');
?>
  <strong><?php echo $lang_domainlookup; ?></strong></font></p>
<p align="center"><?

#Until I rewrite my scripts, this will suffice for compatibility
if(phpversion() >= "4.2.0"){
   extract($_POST);
   extract($_GET);
   extract($_SERVER);
   extract($_ENV);
}

?><script>
function m(el) {
  if (el.defaultValue==el.value) el.value = ""
}
</script><div align="center">
  <form method="post" action="?page=nettools">
    <table width="90%" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr> 
              <td width="50%" bgcolor="#B4B4B4"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><b>Host 
                Information</b></font></td>
              <td bgcolor="#B4B4B4"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><b>Host 
                Connectivity</b></font></td>
            </tr>
            <tr valign="top"> 
              <td> 
                <p><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                  <input type="radio" name="queryType" value="lookup">
                  Resolve/Reverse Lookup<br>
                  <input type="radio" name="queryType" value="dig">
                  Get DNS Records<br>
                  <input type="radio" name="queryType" value="wwwhois">
                  Whois (Web)<br>
                  <input type="radio" name="queryType" value="arin">
                  Whois (IP owner)</font></p></td>
              <td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                <input type="radio" name="queryType" value="checkp">
                Check port: 
                <input class="inputbox" type="text" name="portNum" size="5" maxlength="5" value="80">
                <br>
                <input type="radio" name="queryType" value="p">
                Ping host<br>
                <input type="radio" name="queryType" value="tr">
                Traceroute to host<br>
                <input type="radio" name="queryType" value="all" checked>
                Do it all</font></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr> 
              <td colspan="2"> 
                <div align="center"> 
                  <input class="inputbox" type="text" name="target" value="Enter host or IP" onFocus="m(this)">
                  <input class="inputbox" type="submit" name="Submit" value="Do It">
                </div></td>
            </tr>
          </table></td>
      </tr>
    </table>
    </form>
</div>
<hr>
<div align="center"> 
  <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ <a href="?page=main"><?php echo $lang_back; ?></a> 
    ]</font></p>
  <p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <?

#Global kludge for new gethostbyaddr() behavior in PHP 4.1x
$ntarget = "";

#Some functions

function message($msg){
echo "<font face=\"verdana,arial\" size=2>$msg</font>";
flush();
}

function lookup($target){
global $ntarget;
$msg = "$target resolved to ";
if( eregi("[a-zA-Z]", $target) )
  $ntarget = gethostbyname($target);
else
  $ntarget = gethostbyaddr($target);
$msg .= $ntarget;
message($msg);
}

function getip($target){
global $ntarget;
if( eregi("[a-zA-Z]", $target) )
  $ntarget = gethostbyname($target);
else
  $ntarget = $target;
$msg .= $ntarget;
return($msg);
}

function dig($target){
global $ntarget;
message("<p><b>DNS Query Results:</b><blockquote>");
#$target = gethostbyaddr($target);
#if (! eregi("[a-zA-Z]", ($target = gethostbyaddr($target))) )
if( (!eregi("[a-zA-Z]", $target) && (!eregi("[a-zA-Z]", $ntarget))))
  $msg .= "Can't do a DNS query without a hostname.";
else{
  if(!eregi("[a-zA-Z]", $target)) $target = $ntarget;
  if (!$msg .= trim(nl2br(`dig any '$target'`))) #bugfix
    $msg .= "The <i>dig</i> command is not working at this time.";
  }
#TODO: Clean up output, remove ;;'s and DiG headers
$msg .= "</blockquote></p>";
message($msg);
}

function wwwhois($target){
global $ntarget;
$server = "whois.crsnic.net";
message("<p><b>WWWhois Results:</b><blockquote>");
#Determine which WHOIS server to use for the supplied TLD
if((eregi("\.com\$|\.net\$|\.edu\$", $target)) || (eregi("\.com\$|\.net\$|\.edu\$", $ntarget)))
  $server = "whois.crsnic.net";
else if((eregi("\.info\$", $target)) || (eregi("\.info\$", $ntarget)))
  $server = "whois.afilias.net";
else if((eregi("\.org\$", $target)) || (eregi("\.org\$", $ntarget)))
  $server = "whois.corenic.net";
else if((eregi("\.name\$", $target)) || (eregi("\.name\$", $ntarget)))
  $server = "whois.nic.name";
else if((eregi("\.biz\$", $target)) || (eregi("\.biz\$", $ntarget)))
  $server = "whois.nic.biz";
else if((eregi("\.us\$", $target)) || (eregi("\.us\$", $ntarget)))
  $server = "whois.nic.us";
else if((eregi("\.cc\$", $target)) || (eregi("\.cc\$", $ntarget)))
  $server = "whois.enicregistrar.com";
else if((eregi("\.ws\$", $target)) || (eregi("\.ws\$", $ntarget)))
  $server = "whois.nic.ws";
else{
  $msg .= "I only support .com, .net, .org, .edu, .info, .name, .us, .cc, .ws, and .biz.</blockquote>";
  message($msg);
  return;
}

message("Connecting to $server...<br><br>");
if (! $sock = fsockopen($server, 43, $num, $error, 10)){
  unset($sock);
  $msg .= "Timed-out connecting to $server (port 43)";
}
else{
  fputs($sock, "$target\n");
  while (!feof($sock))
    $buffer .= fgets($sock, 10240); 
}
 fclose($sock);
 if(! eregi("Whois Server:", $buffer)){
   if(eregi("no match", $buffer))
     message("NOT FOUND: No match for $target<br>");
   else
     message("Ambiguous query, multiple matches for $target:<br>");
 }
 else{
   $buffer = split("\n", $buffer);
   for ($i=0; $i<sizeof($buffer); $i++){
     if (eregi("Whois Server:", $buffer[$i]))
       $buffer = $buffer[$i];
   }
   $nextServer = substr($buffer, 17, (strlen($buffer)-17));
   $nextServer = str_replace("1:Whois Server:", "", trim(rtrim($nextServer)));
   $buffer = "";
   message("Deferred to specific whois server: $nextServer...<br><br>");
   if(! $sock = fsockopen($nextServer, 43, $num, $error, 10)){
     unset($sock);
     $msg .= "Timed-out connecting to $nextServer (port 43)";
   }
   else{
     fputs($sock, "$target\n");
     while (!feof($sock))
       $buffer .= fgets($sock, 10240);
     fclose($sock);
   }
}
$msg .= nl2br($buffer);
$msg .= "</blockquote></p>";
message($msg);
}

function arin($target){
$server = "whois.arin.net";
message("<p><b>IP Whois Results:</b><blockquote>");
if (!$target = gethostbyname($target))
  $msg .= "Can't IP Whois without an IP address.";
else{
  message("Connecting to $server...<br><br>");
  if (! $sock = fsockopen($server, 43, $num, $error, 20)){
    unset($sock);
    $msg .= "Timed-out connecting to $server (port 43)";
    }
  else{
    fputs($sock, "$target\n");
    while (!feof($sock))
      $buffer .= fgets($sock, 10240); 
    fclose($sock);
    }
   if (eregi("RIPE.NET", $buffer))
     $nextServer = "whois.ripe.net";
   else if (eregi("whois.apnic.net", $buffer))
     $nextServer = "whois.apnic.net";
   else if (eregi("nic.ad.jp", $buffer)){
     $nextServer = "whois.nic.ad.jp";
     #/e suppresses Japanese character output from JPNIC
     $extra = "/e";
     }
   else if (eregi("whois.registro.br", $buffer))
     $nextServer = "whois.registro.br";
   if($nextServer){
     $buffer = "";
     message("Deferred to specific whois server: $nextServer...<br><br>");
     if(! $sock = fsockopen($nextServer, 43, $num, $error, 10)){
       unset($sock);
       $msg .= "Timed-out connecting to $nextServer (port 43)";
       }
     else{
       fputs($sock, "$target$extra\n");
       while (!feof($sock))
         $buffer .= fgets($sock, 10240);
       fclose($sock);
       }
     }
  $buffer = str_replace(" ", "&nbsp;", $buffer);
  $msg .= nl2br($buffer);
  }
$msg .= "</blockquote></p>";
message($msg);
}

function checkp($target,$portNum){
message("<p><b>Checking Port $portNum</b>...<blockquote>");
if (! $sock = fsockopen($target, $portNum, $num, $error, 5))
  $msg .= "Port $portNum does not appear to be open.";
else{
  $msg .= "Port $portNum is open and accepting connections.";
  fclose($sock);
  }
$msg .= "</blockquote></p>";
message($msg);
}

function p($target){
message("<p><b>Ping Results:</b><blockquote>");
if (! $msg .= trim(nl2br(`ping '$target'`))) #bugfix
  $msg .= "Ping failed. Host may not be active.";
$msg .= "</blockquote></p>";
message($msg);
}

function tr($target){
message("<p><b>Traceroute Results:</b><blockquote>");
$totrace = getip($target);
if (! $msg .= trim(nl2br(`tracert $totrace`))) #bugfix
  $msg .= "Traceroute failed. Host may not be active.";
$msg .= "</blockquote></p>";
message($msg);
}


#If the form has been posted, process the query, otherwise there's 
#nothing to do yet

if(!isset($queryType)) {
  exit;
}

#Make sure the target appears valid

if( (!$target) || (!preg_match("/^[\w\d\.\-]+\.[\w\d]{1,4}$/i",$target)) ){ #bugfix
  message("Error: You did not specify a valid target host or IP.");
  exit;
  }

#Figure out which tasks to perform, and do them

if( ($queryType=="all") || ($queryType=="lookup") )
  lookup($target);
if( ($queryType=="all") || ($queryType=="dig") )
  dig($target);
if( ($queryType=="all") || ($queryType=="wwwhois") )
  wwwhois($target);
if( ($queryType=="all") || ($queryType=="arin") )
  arin($target);
if( ($queryType=="all") || ($queryType=="checkp") )
  checkp($target,$portNum);
if( ($queryType=="all") || ($queryType=="p") )
  p($target);
if( ($queryType=="all") || ($queryType=="tr") )
  tr($target);

?>
    </font></p>
</div>