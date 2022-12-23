<html>
<head>
<title>ZPanel v2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="default.css" rel="stylesheet" type="text/css">
<META name="robots" content="NOINDEX,NOFOLLOW">
</head>

<body bgcolor="#CCCCCC">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800"><img src="images/templates/ZPanelV2/header.jpg" width="800" height="189"></td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="26%" align="left" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="196">
              <!-- fwtable fwsrc="infobox.png" fwbase="infobox.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
              <tr> 
                <td width="10"><img src="images/templates/ZPanelV2/spacer.gif" width="9" height="1" border="0" alt=""></td>
                <td width="135"><img src="images/templates/ZPanelV2/spacer.gif" width="132" height="1" border="0" alt=""></td>
                <td width="40"><img src="images/templates/ZPanelV2/spacer.gif" width="11" height="1" border="0" alt=""></td>
                <td width="11"><img src="images/templates/ZPanelV2/spacer.gif" width="11" height="1" border="0" alt=""></td>
              </tr>
              <tr> 
                <td colspan="2" valign="top" background="images/templates/ZPanelV2/infobox_r1_c3.gif"><img name="infobox_r1_c1" src="images/templates/ZPanelV2/infobox_r1_c1.gif" width="141" height="27" border="0" alt=""></td>
                <td valign="top" background="images/templates/ZPanelV2/infobox_r1_c3.gif"><img name="infobox_r1_c3" src="images/templates/ZPanelV2/infobox_r1_c3.gif" width="11" height="27" border="0" alt=""></td>
                <td width="11" align="right" valign="top" background="images/templates/ZPanelV2/infobox_r1_c3.gif"><img name="infobox_r1_c4" src="images/templates/ZPanelV2/infobox_r1_c4.gif" width="11" height="27" border="0" alt=""></td>
              </tr>
              <tr bgcolor="#E6E6E6"> 
                <td width="10" valign="top" background="images/templates/ZPanelV2/infobox_r2_c1.gif">&nbsp;</td>
                <td colspan="2" valign="top"> <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $lang_panelfor; ?>: 
                    <?php echo $row_Recordset1['servicename']; ?></font></p>
                  <?php echo $template_homelink ?></a><br><?php echo $template_admlink; ?><?php echo $template_logoutlink; ?></a><br><br>
                  <?php
include ('includes/block-userinfo.php');
?>
                </td>
                <td align="right" valign="top" width="11" background="images/templates/ZPanelV2/infobox_r2_c4.gif">&nbsp;</td>
              </tr>
              <tr> 
                <td width="10" background="images/templates/ZPanelV2/infobox_r3_c2.gif"><img name="infobox_r3_c1" src="images/templates/ZPanelV2/infobox_r3_c1.gif" width="9" height="7" border="0" alt=""></td>
                <td colspan="2" background="images/templates/ZPanelV2/infobox_r3_c2.gif"><img name="infobox_r3_c2" src="images/templates/ZPanelV2/infobox_r3_c2.gif" width="143" height="7" border="0" alt=""></td>
                <td align="right" valign="top" background="images/templates/ZPanelV2/infobox_r3_c2.gif"><img name="infobox_r3_c4" src="images/templates/ZPanelV2/infobox_r3_c4.gif" width="11" height="7" border="0" alt=""></td>
              </tr>
            </table></td>
          <td width="74%" align="left" valign="top"> 
            <table width="554" border="0" align="center" cellpadding="0" cellspacing="0">
              <!-- fwtable fwsrc="bodybox.png" fwbase="bodybox.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
              <tr> 
                <td><img src="images/templates/ZPanelV2/spacer.gif" alt="" name="undefined_2" width="554" height="1" border="0"></td>
                <td><img src="images/templates/ZPanelV2/spacer.gif" alt="" name="undefined_2" width="1" height="1" border="0"></td>
              </tr>
              <tr> 
                <td valign="bottom"><img name="bodybox_r1_c1" src="images/templates/ZPanelV2/bodybox_r1_c1.gif" width="554" height="27" border="0" alt=""></td>
                <td><img src="images/templates/ZPanelV2/spacer.gif" alt="" name="undefined_2" width="1" height="27" border="0"></td>
              </tr>
              <tr> 
                <td rowspan="2" align="left" valign="top" background="images/templates/ZPanelV2/bodybox_r2_c1.gif"> 
                  <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <?php include ($body); ?>
                      </td>
                    </tr>
                  </table>
                  
                </td>
                <td><img src="images/templates/ZPanelV2/spacer.gif" alt="" name="undefined_2" width="1" height="11" border="0"></td>
              </tr>
              <tr> 
                <td><img src="images/templates/ZPanelV2/spacer.gif" alt="" name="undefined_2" width="1" height="269" border="0"></td>
              </tr>
              <tr> 
                <td valign="top"><img name="bodybox_r4_c1" src="images/templates/ZPanelV2/bodybox_r4_c1.gif" width="554" height="13" border="0" alt=""></td>
                <td><img src="images/templates/ZPanelV2/spacer.gif" alt="" name="undefined_2" width="1" height="13" border="0"></td>
              </tr>
            </table><br><center><?php echo $template_zcopy; ?></center>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
