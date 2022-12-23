<?
/* ********************************************************************
 * CRM 
 * Copyright (c) 2001-2004 Hidde Fennema (hidde@it-combine.com)
 * Licensed under the GNU GPL. For full terms see http://www.gnu.org/
 *
 * This file does several things :)
 *
 * Check http://www.crm-ctt.com/ for more information
 **********************************************************************
 */
extract($_REQUEST);

if ($NoMenu) {
	$nonavbar=1;
	}

if ($active=="") {
	$active = "no";
}

//print "<pre>";
//print_r($_REQUEST);
//print "</pre>";

if ($_REQUEST['CheckCustomer']) {
			$nonavbar = 1;
			include("header.inc.php");
			print "<table cellspacing='0' cellpadding='4' border=1 bordercolor='#F0F0F0' width=90%>";
			$sql = "select id,custname from $GLOBALS[TBL_PREFIX]customer WHERE SOUNDEX('" . $_REQUEST['CheckCustomer'] . "') = SOUNDEX(custname)";
			//qlog($sql);
			$result = mcq($sql,$db);
			while ($row= mysql_fetch_array($result)) {
				$ins .= "<tr><td>" . $row['id'] . "</td><td>" . $row['custname'] . "</td></tr>";
			}
			$a = mysql_affected_rows();
			if ($a>0) {
				print "<tr><td colspan=2>CRM-CTT Thinks this customer already exists in your database.<br><br>The following similar customers were 	found:</td></tr>";
				print $ins;
			} else {
				print "<tr><td colspan=2>CRM-CTT doesn't think this customer already exists in your database.";
			}
			print "</table>";
			EndHTML();
			exit;
	}

if ($pdf) {
	include("pdf_inc2.php");
	include("config.inc.php");
	include("getset.php");
	include("language.php");

	// Security

	if (strtoupper($HideCustomerTab)=="YES" && GetClearanceLevel($GLOBALS[USERID])<>"administrator") {
		print "<img src='error.gif'>&nbsp;Access denied";
		exit;
	} elseif (GetClearanceLevel($GLOBALS['USERID'])<>"rw" && GetClearanceLevel($GLOBALS['USERID'])<>"administrator") {
		print "<img src='error.gif'>&nbsp;Access denied";
		exit;
	}

	

	$date = date("F j, Y, H:i") . "h";
	$pdftitle2 = $pdftitle;
	$pdftitle = "$title $CRM_VERSION. Report created $date";
	
	$park = $CTG;

	if ($_GET['print']) {
		$NoImageInclude=1;
		StartPrintPDF();
	} else {
		StartPDF();	
	}

	qlog("SID: " . $_REQUEST['stashid']);

	$pdf->Cell(0,0,$pdftitle2,0,1);
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(0,10,$lang[customers],0,1);

	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]customer ORDER BY custname";
	$result= mcq($sql,$db);
	$maxU1 = mysql_fetch_array($result);
	$maxcust = $maxU1[0];

	if ($maxcust==0) {
		print "<html><body><table><tr><td><img src='crm.gif'><br><img src='error.gif'>&nbsp;<b><font size='+1' face='Trebuchet MS'>You cannot export an empty database!</font></b><br>&nbsp;&nbsp;&nbsp;<font size='+1' face='Trebuchet MS'>This error is fatal.</font><br><br>";
		print "<font face='Trebuchet MS'>Click <a href='javascript:history.back(-1);'>here</a> to go back...</font></td></tr>\n</table>";
	EndHTML();
		exit;
	}
	$a = array();

	$cdate = date('Y-m-d');
	
	if ($_REQUEST['stashid']) {
				$sql = PopStashValue($_REQUEST['stashid']);
				qlog("Query fetched from database: " . $sql);

	} else {
				qlog("ERROR. NO STASHID FOUND. Exporting ALL.");
				$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer ORDER BY custname";
	}
	
	qlog("Executing: " . $sql);

	$result_customer= mcq($sql,$db);
	while ($pb= mysql_fetch_array($result_customer)) {

			$auth = CheckCustomerAccess($pb['id']);
			if ($auth == "ok" || $auth == "readonly") {

				if ($fst) {
						$pdf->AddPage();
				} else {
						$fst = 1;
				}
				
				$pb[custname]		= fillout($pb[custname],30);
				$pb[contact]		= fillout($pb[contact],15);
				$pb[contact_phone]	= fillout($pb[contact_phone],11);
				$pb[cust_homepage]	= fillout($pb[cust_homepage],20);
				$pb[cust_address]	= fillout($pb[cust_address],20);
				$pb[cust_remarks]	= fillout($pb[cust_remarks],7);
				$pb[contact_email]	= fillout($pb[contact_email],20);
				
				$pdf->Bookmark($pb[custname]);
				$pdf->SetFont('Arial','',10);
				$pdf->SetFillColor(0,0,128);
				$pdf->SetTextColor(255);
				$pdf->Cell(0,4,$lang[customer] . " : " .          $pb[custname],1,1,'L',1);
	//			$pdf->Cell(0,6,($list[$po]),1,1,'L',1);
				$pdf->SetFont('Arial','',8);
				$pdf->SetFillColor(0,0,0);
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[contact] . " : ",0,1);
				$pdf->SetTextColor(0);
				$pdf->Cell(0,4,$pb[contact],0,1);
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[contacttitle]. " : ",0,1);
				$pdf->SetTextColor(0);
				$pdf->Cell(0,4,$pb[contact_title],0,1);
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[contactphone] . " : ",0,1);
				$pdf->SetTextColor(0);
				$pdf->Cell(0,4,$pb[contact_phone],0,1);
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[contactemail] . " : ",0,1);
				$pdf->SetTextColor(0);
				$pdf->Cell(0,4,$pb[contact_email],0,1);
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[customeraddress] . " : ",0,1);
				$pdf->SetTextColor(0);
				$n = explode("\n",$pb[cust_address]);
				for ($n1=0;$n1<sizeof($n);$n1++) {
					$nt = wordwrap($n[$n1], 120, "HOPS!", 1);
					$nta = explode("HOPS!",$nt);
					for ($i=0;$i<sizeof($nta);$i++) {
						$pdf->Cell(0,4,trim($nta[$i]),0,1);
					}
				}
				//line();
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[custremarks] . " : ",0,1);
				$pdf->SetTextColor(0);
				$n = explode("\n",$pb[cust_remarks]);
				for ($n1=0;$n1<sizeof($n);$n1++) {
					$nt = wordwrap($n[$n1], 120, "HOPS!", 1);
					$nta = explode("HOPS!",$nt);
					for ($i=0;$i<sizeof($nta);$i++) {
						$pdf->Cell(0,4,trim($nta[$i]),0,1);
					}
				}
				//line();
				$pdf->SetTextColor(128,0,0);
				$pdf->Cell(0,4,$lang[custhomepage] . " : ",0,1);
				$pdf->SetTextColor(0);
				$pdf->Cell(0,4,$pb[cust_homepage],0,1);

				// Extra fields list		

			$list = GetExtraCustomerFields();

			$sql110 = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$pb[id]' AND type='cust'";
			$result1 = mcq($sql110,$db);
			$num = mysql_fetch_array($result1);

			if (sizeof($list)>1) {
				$pdf->Ln(6);
	//			line();	
				$pdf->SetFont('Arial','',8);
				$data = array();
				//$header=array("Field","Value");

				foreach ($list AS $field) {
						

						$sql0 = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$pb[id]' AND deleted<>'y' AND name='" . $field['id'] . "' AND type='cust' ORDER BY name";
	//					print $sql;

						$result8 = mcq($sql0,$db);
						$cust= mysql_fetch_array($result8);
						$val = $cust[value];
						
						//$list[$po] = CleanExtraFieldName($list[$po]);
						
						$val = $cust[value];
						$val = FunkifyLOV($val);

						if ($val=="xfdfg") {
							// do nothing
						} else {
							line();	
							$pdf->SetFont('Arial','',8);
							$pdf->SetFillColor(255,255,255);
							$pdf->SetTextColor(128,0,0);
							$pdf->Cell(0,6,($field['name']),0,1,'L',1);

							$pdf->SetFont('Arial','',8);
							$pdf->SetFillColor(0,0,0);
							$pdf->SetTextColor(0);
							//Have to convert custom fields to multiline

							$n = explode("\n",$val);

							

							for ($n1=0;$n1<sizeof($n);$n1++) {
								$nt = wordwrap($n[$n1], 120, "HOPS!", 1);
								$nta = explode("HOPS!",$nt);
								for ($i=0;$i<sizeof($nta);$i++) {
									$pdf->Cell(0,4,trim($nta[$i]),0,1);
								}
							}
						}

				}
				//$pdf->FancyTable2col($header,$data);
				unset($header);
				unset($data);
				unset($num);
				unset($list);
			}
		}
			
		
		$pdf->Ln(8);
	
			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$pb[id]' AND $GLOBALS[TBL_PREFIX]binfiles.type='cust'";
			$result = mcq($sql,$db);
			$num = mysql_fetch_array($result);
//			qlog("Number of files attached to this customer: " . $num[0]);
			if ($num[0]>0) {
				line();
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(0,10,$lang['customer'] . " files:",0,1);
				$pdf->SetFont('Arial','',8);
				$data = array();
				$header=array("Creation date",'Size','User','Filename');

				if ($DateFormat=="mm-dd-yyyy") {
					$sql= "SELECT filename,creation_date,filesize,fileid,username,date_format(creation_date, '%m-%d-%Y %H:%i') AS dt FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$pb[id]' AND type='cust' ORDER BY filename";
				} else {
					$sql= "SELECT filename,creation_date,filesize,fileid,username,date_format(creation_date, '%d-%m-%Y %H:%i') AS dt FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$pb[id]' AND type='cust' ORDER BY filename";
				}
				$result7= mcq($sql,$db);
				while ($files= mysql_fetch_array($result7)) {

					$ownert = $files[username];

					$url = "http://" . $_SERVER['SERVER_NAME'] . $subdir . "csv.php?fileid=" . $files['fileid'];
					array_push($data,array($files['dt'],round(($files[filesize]/1024)). "K",$ownert,$url,$files['filename']));
					$ftel++;
					$tel++;
				}
					$pdf->FancyTable4colSinglePDF($header,$data);
			
				
			}
	}
	//$pdf->Cell(0,4,$lang[endofpbexport],0,1);
	if ($_REQUEST['to_file']) {
		$pdf->Output($_REQUEST['to_file']);
	} else {
		$pdf->Output();
	}

	log_msg("Customer PDF export downloaded","");
	exit;
} elseif ($ActivityCustomerGraph) {
	include("config.inc.php");
	include("getset.php");	

	DisplayCustomerActivityGraph($ActivityCustomerGraph);
	exit;
} elseif ($_REQUEST['mm'] && $_REQUEST['stashid']) {
	$nonavbar = 1;
	include("header.inc.php");
	print "<table><tr><td><form name='SingleReport' method='POST' target='document.window.opener'>";
	print "<table>";
	print "<tr><td><b>E-mail merge</b><br><br></td></tr>\n";
	print "<tr><td>" . $lang['rtftemplate'] . ":</td><td><select style='width:250' name='template'>";
	$sql = "SELECT fileid,filename,creation_date,username FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='0' AND filetype='TEMPLATE_HTML'";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if ($_REQUEST['template']==$row['fileid']) {
			$ins = "SELECTED";
		} else {
			unset($ins);
		}
		print "<option $ins value = '" . $row['fileid'] ."'>" . $row['filename'] . "</option>";
	}
	print "</select></td></tr>\n";

	$list = GetExtraCustomerFields();

	$opt =  "<tr><td>Field:</td><td>";
	$opt .=  "<select name='mm_field'>";
	$opt .=  "<option value='std'>" . $lang['contactemail'] . "</option>";
	foreach ($list AS $field) {
		if ($field['fieldtype']=="mail") {
				$opt .=  "<option value='EFID" . $field['id'] . "'>" . $field['name'] . "</option>";
				$a++;
		}
	}
	$opt .=  "</select></td></tr>\n";
	
	if ($a) {
		print $opt;
	}

	print "<tr><td>" . $lang['attachindividualtocustomer'] . ":</td><td><select style='width:250' name='attach_to_dossier'><option value='Yes'>$lang[yes]</option><option SELECTED value='No'>$lang[no]</option></select></td></tr>\n";

	print "<tr><td><input type='hidden' name='mm_field'><input type='button' name='submitknop' value='$lang[go]' OnClick='doso();'></form></td></tr>\n</table>";

		?>
		<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
		<!--
		function doso() {
			
			window.opener.document.location="customers.php?mm2=1&template=" + document.SingleReport.template.value + "&attach_to_dossier=" + document.SingleReport.attach_to_dossier.value + "&mm_field=" + document.SingleReport.mm_field.value + "&stashid=<? echo $_REQUEST['stashid'];?>";

			window.close();

		}
		//-->
		</SCRIPT>
		<?
		EndHTML();
		exit;
} elseif ($_REQUEST['mm3'] && $_REQUEST['stashid'] && $_REQUEST['template'] && $_REQUEST['subject'] && $_REQUEST['data']) {
	include("header.inc.php");
	$sql = PopStashValue($_REQUEST['stashid']);
	$result = mcq($sql,$db);
	if ($_REQUEST['attach_to_dossier']=="np") {
		$atd = false;
	} else {
		$atd = true;
	}
	$filename = "CRM-CTT-E-mailmerge-" . date("Fj-Y-Hi") . "h.HTML";
	while ($row = mysql_fetch_array($result)) {
		
		if ($_REQUEST['mm_field']<>"std" && $_REQUEST['mm_field']<>"") {
			$query = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE name='" . str_replace("EFID","", $_REQUEST['mm_field']) . "' AND type='cust' AND eid='" . $row['id'] . "'";
			$result2 = mcq($query,$db);
			$rowtje = mysql_fetch_array($result2);
			$email_to = $rowtje['value'];
		} else {
			$email_to = $row['contact_email'];
		}
		if ($email_to) {
			$msg .= RealMail($_REQUEST['data'],"",$row['id'],"","",$email_to,0,$_REQUEST['subject'],$atd,$filename);
		}
	}
	print "<pre>";
	print $msg;
	print "</pre>";

	EndHTML();
	exit;
} elseif ($_REQUEST['mm2'] && $_REQUEST['stashid'] && $_REQUEST['template']) {
	include("header.inc.php");

	$sql = "SELECT content,file_subject FROM $GLOBALS[TBL_PREFIX]binfiles,$GLOBALS[TBL_PREFIX]blobs WHERE $GLOBALS[TBL_PREFIX]binfiles.fileid=$GLOBALS[TBL_PREFIX]blobs.fileid AND $GLOBALS[TBL_PREFIX]binfiles.fileid='" . $_REQUEST['template']  . "' AND LEFT(filetype,8)='TEMPLATE'";
	//print $sql;
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;E-mail merge </legend><table><tr><td>";
	print "<b>To:</b> ";
	$sql = PopStashValue($_REQUEST['stashid']);
	$result = mcq($sql,$db);
	while ($row2 = mysql_fetch_array($result)) {
		$to .= $row2['contact'] . ",";
	}
	print $to . "<br>";
	print "<form name='editHTMLtemplateform' METHOD='POST'>";
	print "<input type='hidden' name='mm_field' value='" . $_REQUEST['mm_field'] . "'>";
	print "<input type='hidden' name='mm3' value='1'>";
	print "<input type='hidden' name='stashid' value='" . $_REQUEST['stashid'] . "'>";
	print "<input type='hidden' name='attach_to_dossier' value='" . $_REQUEST['attach_to_dosier'] . "'>";
	print "<b> Subject: </b><input type='text' size=70 name='subject' value='" . $row['file_subject'] . "'><br><br>";

	//print "<input type='hidden' name='data' value='" .  $row['content'] . "'>";
	include("fckeditor/fckeditor.php");

	$oFCKeditor = new FCKeditor('data') ;
	$oFCKeditor->BasePath	= "fckeditor/" ;
	//$oFCKeditor->Config['SkinPath'] = 'fckeditor/editor/skins/silver/' ;
	$oFCKeditor->Width = "100%";
	$oFCKeditor->Height = "400";
	$oFCKeditor->ToolbarSet = 'CRMUSER';

	$oFCKeditor->Value		= $row['content'];
	$oFCKeditor->Create() ;

	
	print "<br><input type='submit' value='$lang[go]'>";
	print "</form>";
	print "</table></fieldset>";
	EndHTML();
	exit;

} else {
	include("header.inc.php");

	$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]customer";
	$result= mcq($sql,$db);
	$maxcust= mysql_fetch_array($result);
	$maxcust=$maxcust[0];

	$list = GetExtraCustomerFields();

	foreach ($list as $field) {
	$element = "EFID" . $field['id'];
	if ($_GET[$element]) {
		// OK an extra field named $item was found in the search query

		$cust_insert = " ($GLOBALS[TBL_PREFIX]customaddons.name='" . $element . "' AND $GLOBALS[TBL_PREFIX]customaddons.value='" . $_GET[$element] . "' AND $GLOBALS[TBL_PREFIX]customaddons.type='cust')";
		$efi = 1;
	} else {
		//print "$b64_item not found ($item)<br>";
	}
	}
//	trigger_error("Cannot divide by zero", E_USER_ERROR);
//	print_r(debug_backtrace());
//debug_print_backtrace();
	

	if (strtoupper($HideCustomerTab)=="YES" && GetClearanceLevel($GLOBALS[USERID])<>"administrator") {
		print "<img src='error.gif'>&nbsp;Access denied";
		exit;
	}
	?>
	<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
	<!--
	function poppb()	{
				newWindow = window.open('customers.php?nonavbar=$nonavbar&nonavbar=1', 'myWindow2','width=800,height=200,directories=0,status=1,menuBar=0,scrollBars=1,resizable=1');
				newWindow.focus();
		}

		
			function gobla(i) {
				document.location="customers.php?det=1&c_id=" + i + "&<? echo $epoch;?>";
			}
		//-->
		</SCRIPT>
		<?

	if ($export) {
			if (strtoupper($BlockAllCSVDownloads)=="YES") {
					MustBeAdminUser();
					qlog("Access denied");
			} else {
					qlog("Access granted");
			}


			$store = "$file";
				if ($query) {
					$ins = "<br>" . $lang['alreadyselected'];
				}
			print "<table><tr><td>";
			print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;Exportar " . strtolower($lang['customers']) . "&nbsp;</legend><table>";
			print "<tr><td colspan=12>";
		//	print $query;
			print "<img src='arrow.gif'>&nbsp;<a href=\"javascript:window.opener.location='csv.php?password=$password&exportcust=1&sep=RealExcel&close=1&stashid=" . $stashid . "';window.close();\" class='bigsort'> Exportar " . strtolower($lang[customers]) . " in Microsoft&reg; Excel&reg; format <img src='excel.gif' border='0'></a></td></tr>\n";
			print "<tr><td colspan=12><img src='arrow.gif'>&nbsp;<a href=\"javascript:window.opener.location='csv.php?password=$password&exportcust=1&nle=1&sep=;&close=1&stashid=" . $stashid . "';window.close();\"'' class='bigsort'> Exportar " . strtolower($lang[customers]) . " " . strtolower($lang[scqp]) . "</a></td></tr>\n";
			print "<tr><td colspan=12><img src='arrow.gif'>&nbsp;<a href=\"javascript:window.opener.location='csv.php?password=$password&exportcust=1&nle=1&sep=:&close=1&stashid=" . $stashid . "';window.close();\"'' class='bigsort'> Exportar " . strtolower($lang[customers]) . " " . strtolower($lang[cqp]) . "</a></td></tr>\n";
			print "<tr><td colspan=12><img src='arrow.gif'>&nbsp;<a href=\"javascript:window.opener.location='csv.php?password=$password&exportcust=1&nle=1&sep=,&close=1&stashid=" . $stashid . "';window.close();\"'' class='bigsort'> Exportar " . strtolower($lang[customers]) . " " . strtolower($lang[kqp]) . "</a></td></tr>\n";
			print "<tr><td colspan=12><img src='arrow.gif'>&nbsp;<a href=\"javascript:popPDFwindow('customers.php?pdf=1&close=1&stashid=" . $stashid . "');window.close();\"' class='bigsort'> Exportar " . strtolower($lang[customers]) . " in PDF format</a><img src='pdf.gif' height='12' width='12'><br>" . $ins . "</td></tr>\n";
			print "</table></fieldset></td></tr>\n</table>";
			
			EndHTML();
			exit;
	}

		if (array_key_exists('activenew',$_REQUEST)) {
				if ($_REQUEST['activenew'] == "no") {
					$_REQUEST['activenew'] = "no";
				} else {
					$_REQUEST['activenew'] = "yes";
				}
			}
			if (array_key_exists('readonlycust',$_REQUEST)) {
				if ($_REQUEST['readonlycust'] == "y") {
					$_REQUEST['readonlycust'] = "yes";
				} else {
					$_REQUEST['readonlycust'] = "";
				}
			}
	if ($_REQUEST['addfilled'] || $_REQUEST['editfilled']) {
		
		if ($_REQUEST['addfilled']) {
	
			$a = GetClearanceLevel($GLOBALS[USERID]);
			if ($a<>"rw" && $a<>"administrator") {
						print "<img src='error.gif'>&nbsp;Access denied";
						exit;
			}
			


			extract($_REQUEST);
			
			$sql="INSERT INTO $GLOBALS[TBL_PREFIX]customer(contact,custname,contact_title,contact_phone,cust_homepage,cust_address,cust_remarks,contact_email,active,email_owner_upon_adds,customer_owner,readonly) VALUES('$contactnew','$custnamenew','$contact_titlenew','$contact_phonenew','$cust_homepagenew','$cust_addressnew','$cust_remarksnew','$contact_emailnew','yes','$email_owner_upon_adds','$customer_ownernew','$readonlycust')";
			
			mcq($sql,$db);
			$eid = mysql_insert_id ();

			journal($eid,"Customer added\n\n$contactnew - $custnamenew - $contact_titlenew - $contact_phonenew - $cust_homepagenew - $cust_addressnew - $cust_remarksnew - $contact_emailnew", "customer");
			
			$add=1;
			log_msg("Customer $customernew added","");
				// First, collect extra fields list

			$list = GetExtraCustomerFields();
			
			// Then, check the existence of variables named $$list[$x]

			foreach ($list AS $extrafield) {
				$varname = "EFID" . $extrafield['id'];
				if ($$varname) {
					//print "FOUND $$varname $varname";
						
						$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$eid' AND name='" . $extrafield['id'] ."' AND type='cust'";
						$result = mcq($sql,$db);
						$gh = mysql_fetch_array($result);
						$value = $gh[0];
						if (is_array($_REQUEST[$varname])) {
							qlog("WARNING - THIS IS AN EXTRA ARRAY FIELD!");
							$tmp = array();
							foreach($_REQUEST[$varname] AS $row) {
								if ($row <> "") {
									array_push($tmp, base64_encode($row));
								}
							}
							$$varname = serialize($tmp);
						}

						if (mysql_affected_rows()>0) {
								if ($value <> $$varname) { 
									$sql = "UPDATE $GLOBALS[TBL_PREFIX]customaddons SET value = '" . $$varname . "',usr='" . $name . "'" . $sqlins . " WHERE eid='" . $eid . "' AND name='" . $extrafield['id'] . "' AND type='cust'";
									ProcessTriggers("EFID" . $extrafield['id'],$eid,$$tmp);
									$add_to_journal .= "\n" . CleanExtraFieldName($extrafield['name']) . " updated from $value to " . $$tmp . "";
								}
						} else {

								if ($extrafield['storetype'] <> "default") {
									$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]customaddons(eid, name, value, usr, type, storeid) VALUES('" . $eid . "','" . $extrafield['id'] . "','" . $$varname . "','" . $name . "','cust','" . $extrafield['id'] . "')";
								} else {
									$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]customaddons(eid, name, value, usr, type) VALUES('" . $eid . "','" . $extrafield['id'] . "','" . $$varname . "','" . $name . "','cust')";
								}
						
								ProcessTriggers("EFID" . $extrafield['id'],$eid,$$tmp);
								$add_to_journal .= "\n" . CleanExtraFieldName($normal) . " updated from <nothing> to " . $$tmp . "";
						}

						// And finally, execute the statement.
						//print $sql . "<br><br>";

						mcq($sql,$db);
				}
			
			}
			journal($eid, $add_to_journal,"customer");
			?>
			<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
			<!--
				document.location='customers.php';
			//-->
			</SCRIPT>
			<?
		} elseif ($editfilled && !$fconfirmed) {
			// First, collect extra fields list
				
				if (CheckCustomerAccess($_REQUEST['editfilled']) <> "ok") {
					print "<img src='error.gif'>&nbsp;Access denied";
					EndHTML();
					exit;
				}

			$gh = db_GetRow("SELECT readonly,customer_owner FROM $GLOBALS[TBL_PREFIX]customer WHERE id=" . $editfilled);

			if (($gh['customer_owner'] <> $GLOBALS['USERID']) && (!is_administrator()) && ($gh['readonly']=='yes')) {
				print "<img src='error.gif'> Access denied";
				log_msg("WARNING - DOUBLE RISK. Somebody tried a direct post to adjust customer dossier " . $editfilled,"");
				EndHTML();
				exit;
			}
			$eid = $editfilled;

			$list = GetExtraCustomerFields();

		
			foreach ($list AS $extrafield) {
				$varname = "EFID" . $extrafield['id'];
				if ($$varname) {
					//print "FOUND $$varname $varname";
						
						$sql = "SELECT value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$eid' AND name='" . $extrafield['id'] ."' AND type='cust'";
						$result = mcq($sql,$db);
						$gh = mysql_fetch_array($result);
						$value = $gh[0];

						if (is_array($_REQUEST[$varname])) {
							qlog("WARNING - THIS IS AN EXTRA ARRAY FIELD!");
							$tmp = array();
							foreach($_REQUEST[$varname] AS $row) {
								if ($row <> "") {
									array_push($tmp, base64_encode($row));
								}
							}
							$$varname = serialize($tmp);
						}
						if (mysql_affected_rows()>0) {
								if ($value <> $$varname) { 
									$sql = "UPDATE $GLOBALS[TBL_PREFIX]customaddons SET value = '" . $$varname . "',usr='" . $name . "' WHERE eid='" . $eid . "' AND name='" . $extrafield['id'] . "' AND type='cust'";
									//ProcessTriggers("EFID" . $extrafield['id'],$eid,$$tmp);
									$add_to_journal .= "\n" . CleanExtraFieldName($extrafield['name']) . " updated from $value to " . $$varname . "";
								}
						} else {
								$sql = "INSERT INTO $GLOBALS[TBL_PREFIX]customaddons(eid, name, value, usr, type) VALUES('" . $eid . "','" . $extrafield['id'] . "','" . $$varname . "','" . $name . "','cust')";
								//ProcessTriggers("EFID" . $extrafield['id'],$eid,$$tmp);
								$add_to_journal .= "\n" . CleanExtraFieldName($normal) . " updated from <nothing> to " . $$varname . "";
						}

						// And finally, execute the statement.
						//print $sql . "<br><br>";
						mcq($sql,$db);

						

					}
			}
			$add_to_journal = "Customer " . $eid . " edited\n" . $add_to_journal;
			
			if (array_key_exists('activenew',$_REQUEST)) {
				if ($_REQUEST['activenew'] == "no") {
					$_REQUEST['activenew'] = "no";
				} else {
					$_REQUEST['activenew'] = "yes";
				}
			}
			if (array_key_exists('readonlycust',$_REQUEST)) {
				if ($_REQUEST['readonlycust'] == "y") {
					$_REQUEST['readonlycust'] = "yes";
				} else {
					$_REQUEST['readonlycust'] = "";
				}
			}
			$fields = array("custnamenew","contactnew","contact_titlenew","contact_phonenew","cust_homepagenew","cust_addressnew","cust_remarksnew","contact_emailnew","activenew","email_owner_upon_adds","customer_ownernew","readonlycust");
			

			foreach ($fields AS $field) {
				if ($_REQUEST[$field]) {
					qlog("$field is submitted!");
					$sql_ins .= ", " . ereg_replace("new","",ereg_replace("readonlycust","readonly",$field)) . "='" . $_REQUEST[$field] . "'";
					$add_to_journal .= "\n" . $field . " to " . $_REQUEST[$field];
				}
			
			}
			
			journal($eid, $add_to_journal,"customer"); 			
			$sql = "UPDATE $GLOBALS[TBL_PREFIX]customer SET custname=custname " . $sql_ins . " WHERE id='" . $eid . "'";
			mcq($sql,$db);
			log_msg("Customer $editfilled edited","");
			// Clear the access cache tables
			ClearAccessCache($eid,'c');
//			print $sql;
		
		$det = 1;
		$c_id = $editfilled;
	}
	if ($closeonnextload1) {
	?>
	<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
	<!--
	window.close();
	//-->
	</SCRIPT>
	<?
	}
	}

	if ($_REQUEST['det'] && $_REQUEST['c_id']) {
			if ($_REQUEST['fconfirmed']) {

					if (CheckCustomerAccess($_REQUEST['c_id']) == "ok") {
						

						for ($c=0;$c<sizeof($deletefile);$c++) {
							$sql = "SELECT filename FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='$deletefile[$c]'";
							$result = mcq($sql,$db);
							$filename = mysql_fetch_array($result);
							$filename = $filename[filename];
							$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='$deletefile[$c]'";
							mcq($sql,$db);
							$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]blobs WHERE fileid='$deletefile[$c]'";
							mcq($sql,$db);

							log_msg("File deleted: $deletefile[$c] - $filename","");
							journal($c_id,"File $filename (#" . $deletefile[$c] . ") deleted","customer");

						}
							unset($deletefile);
						if ($NoMenu) {
							?>
									<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
									<!--
										window.close();
									//-->
									</SCRIPT>
									<?
						}
						?>
						
									<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
									<!--
										document.location='customers.php?det=1&c_id=<? echo $c_id;?>';
									//-->
									</SCRIPT>
									<?
					}
						
			} 
			if ($_REQUEST['somedelete'] || is_array($_REQUEST['deletefile'])) {
				$a = GetClearanceLevel($GLOBALS[USERID]);

				if (CheckCustomerAccess($_REQUEST['c_id']) <> "ok") {
					printAD("");
					EndHTML();
					exit;
				}
				print "<table><tr><td>";
				print "$lang[deleting1] " . sizeof($deletefile) . " $lang[deleting2]<br>";
				print "<form name='confirm' method='POST'>";
					for ($c=0;$c<sizeof($deletefile);$c++) {
						print "<input type='hidden' name='deletefile[]' value='$deletefile[$c]'>";
					}
				print "<br><input type='hidden' name='fconfirmed' value='1'><input type='hidden' name='c_id' value='$c_id'><input type='hidden' name='editfilled' value='$c_id'><input type='hidden' name='det' value='1'>";
				print "<input type='submit' name='knopje' value='$lang[confdel]'>";
				print "<pre>";
				for ($r=0;$r<sizeof($deletefile);$r++) {
					print $lang[delete] . " " . $deletefile[$r] . " - " . GetFileName($deletefile[$r]) . "\n";
				}
				print "</pre>";
				print "</form></td></tr>\n</table>";
				EndHTML();
				exit;
		}
			
		if (!$_FILES['userfile']['tmp_name'] =="" && !$_FILES['userfile']['name']=="" && !$_FILES['userfile']['size']=="" && !$_FILES['userfile']['type']=="") {
			
			//  A file was attached

				
			// Read contents of uploaded file into variable
				
				$fp=fopen($_FILES['userfile']['tmp_name'] ,"rb");
				$filecontent=fread($fp,filesize($_FILES['userfile']['tmp_name'] ));
				fclose($fp);
//				$filecontent = addslashes($filecontent);

			// insert identifier & content into $GLOBALS[TBL_PREFIX]binfiles:

				//$sql="INSERT INTO $GLOBALS[TBL_PREFIX]binfiles(koppelid,content,filename,filesize,filetype,username,type) VALUES('$c_id','$filecontent','" . $_FILES['userfile']['name'] . "','" . $_FILES['userfile']['size'] . "','" . $_FILES['userfile']['type'] . "','" . $name . "','cust')";

				//mcq($sql,$db);
				//$attachment = mysql_insert_id();

				$attachment = AttachFile($c_id,$_FILES['userfile']['name'],$filecontent,"cust",$_FILES['userfile']['type']);

				log_msg("File  " . $_FILES['userfile']['name'] . " added to customer $e","");

				unset($filecontent);

				journal($c_id,"File " . $_FILES['userfile']['name'] . " added", "customer");
			}

			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$c_id'";
			$stashid = PushStashValue($sql);
			$result= mcq($sql,$db);
			$cust= mysql_fetch_array($result);

			print "</table>";
			
			if (is_numeric($GLOBALS['CUSTOMCUSTOMERFORM'])) {
				?>
					<SCRIPT LANGUAGE="JavaScript">
					<!--
						document.location='customers.php?editcust=1&custid=<? echo $c_id;?>';
					//-->
					</SCRIPT>
				<?
			}
			
			if (CheckCustomerAccess($_REQUEST['c_id']) <> "ok" && CheckCustomerAccess($_REQUEST['c_id']) <> "readonly") {
				printAD("");
				EndHTML();
				exit;
			}

			print "<table width='80%'><tr><td>&nbsp;</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size='+1'>$lang[customer] $c_id: $cust[custname]</font>&nbsp;";

			print "</legend>";
			print "<table class='crm' width='100%'>";
			print "<tr><td><img src='arrow.gif'>&nbsp;<a href='customers.php?$epoch' class='bigsort'>$lang[customers]</a>";
			if ($cust['readonly'] == "yes") {
				$ro = "yes";
				if ($cust['customer_owner'] <> $GLOBALS['USERID']) {
					$readonly = true;
				}
			} else {
				$ro = "no";
			}

			print " | <img src='arrow.gif'><img src='arrow.gif'>&nbsp;<a href='customers.php?editcust=1&custid=$c_id&$epoch' class='bigsort'>$lang[edit]</a>";
		

			print "</td><td align='right' colspan=4>&nbsp;<a href='javascript:popActivityCustomerGraph(" . $c_id .");' title='Mostrar Gráfico de Atividades'><img src='graph.gif' border=1></a>&nbsp;&nbsp;<a href='javascript:popcustomerjournal(" . $cust['id'] . ")' class='bigsort'><img src='journal.gif' style='border:0' title='Mostrar Jornal'></a>&nbsp;<a href=\"javascript:popPDFwindow('customers.php?pdf=1&stashid=" . $stashid . "')\" class='bigsort'><img src='pdf.gif' style='border:0' title='Mostrar PDF'></a>";
			if ($GLOBALS['EnableMailMergeAndInvoicing']) {
				print "&nbsp;<a title='Mostrar resultados por e-mail' href=\"javascript:poplittlewindow('invoice.php?little=1&stashid=" . $stashid . "&mm=1')\"><img style='border:0' src='word.gif'></a>";
			}
			print "&nbsp;<a class='bigsort' style='cursor:pointer' title='Imprimir Resultados' href=\"javascript:popPDFprintwindow('customers.php?pdf=1&stashid=" . $stashid . "&print=1')\"><img src='print.gif' style='border:0'></a>";
			print "</td></tr>\n";

			print "<tr><td>$lang[contact]</td><td>$cust[contact]&nbsp;</td></tr>\n";
			print "<tr><td>$lang[contacttitle]</td><td>$cust[contact_title]&nbsp;</td></tr>\n";
			print "<tr><td>$lang[contactphone]</td><td>$cust[contact_phone]&nbsp;</td></tr>\n";
			print "<tr><td>$lang[contactemail]</td><td><a href='javascript:popEmailToCustomerScreenCust(" . $cust[id] . ")' class='bigsort'>$cust[contact_email]</a>&nbsp;</td></tr>\n";
			print "<tr><td>$lang[customeraddress]</td><td>" . ereg_replace("\n","<BR>",$cust[cust_address]) . "&nbsp;</td></tr>\n";
			print "<tr><td>$lang[custremarks]</td><td>" . ereg_replace("\n","<BR>",$cust[cust_remarks]) . "&nbsp;</td></tr>\n";
			print "<tr><td>$lang[custhomepage]</td><td>";
			if (!stristr($cust[cust_homepage],"http://")) {
						$cust[cust_homepage] = "http://" . $cust[cust_homepage];
					}
			print "<a href='$cust[cust_homepage]' target='_new' class='bigsort'>$cust[cust_homepage]</a>&nbsp;</td></tr>\n";

			$list = GetExtraCustomerFields();

			foreach($list AS $field) {

				$sql = "SELECT id,value FROM $GLOBALS[TBL_PREFIX]customaddons WHERE eid='$c_id' AND deleted<>'y' AND name='" . $field['id'] . "' AND type='cust' ORDER BY name";
				$result = mcq($sql,$db);
				$cust1= mysql_fetch_array($result);

				print "<tr><td>" . $field['name'] . "</td>";
				if ($field['fieldtype'] == "text area") {
					$cust1[value] = ereg_replace("\n","<BR>",$cust1[value]);
				}
				if ($field['fieldtype'] == "mail") {
					print "<td><a href='javascript:popEmailToEFScreen(" . $cust1['id'] . ")' class='bigsort'>" .$cust1[value] . "</a>&nbsp;</td></tr>\n";
				} elseif ($field['fieldtype'] == "hyperlink"){
					print "<td>";
					if (strlen($cust1[value])>4) {
						if (!strstr("http://",$cust1[value])) {
							$cust1[value] = "http://" . $cust1[value];
						}
						print $cust1[value] . "&nbsp;<a href='" . $cust1[value] . "' target='new'><img src='fullscreen_maximize.gif' style='border:0' height=16 width='16'></a>";
					}
					print "</td></tr>\n";
				} elseif ($field['fieldtype'] == "date") {
					print "<td>" . Transformdate($cust1[value]) . "&nbsp;</td></tr>\n";
				} elseif (strstr($field['fieldtype'],"User-list")) {
					print "<td>" . GetUserName($cust1['value']) . "&nbsp;</td></tr>\n";
				} elseif ($field['fieldtype'] == "List of values") {
					print "<td>" . FunkifyLOV($cust1['value']) . "&nbsp;</td></tr>\n";
				} else {
					print "<td>" . $cust1[value] . "&nbsp;</td></tr>\n";
				}
			}

			
			
			print "<tr><td colspan=2><hr></td></tr>\n";
			print "<tr><td>" . $lang[customer] . " " . strtolower($lang[owner]) . ":</td><td>" . GetUserName($cust['customer_owner']) . "</td></tr>\n";
			

			print "<tr><td>$lang[readonly]:</td><td>" . $ro . "&nbsp;</td></tr>\n";
			print "<tr><td>E-mail $lang[owner]:</td><td>" . $cust['email_owner_upon_adds'] . "</td></tr>\n";
			print "<tr><td colspan=2><hr></td></tr>\n";
			print "</table>";

			print "<table border=0 width='100%'><tr><td><fieldset><table border=0>";
			

			$sql= "SELECT filename,creation_date,date_format(creation_date, '%a %M %e, %Y %H:%i') AS dt,filesize,fileid,username FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid='$c_id' AND type='cust' ORDER BY filename,creation_date";
			$result= mcq($sql,$db);
			
			

			$toprint .= "<tr><td>$lang[filename]</td>";

			$toprint.= "<td>$lang[filesize]</td><td>$lang[creationdate]</td><td>$lang[owner]</td><td>$lang[deletefile]</td></tr>\n";
			print "<form name='AddFileToCust' method='POST' ENCTYPE='multipart/form-data' id='dashed'>";
			while ($files= mysql_fetch_array($result)) {
				$ownert = ($files['username']);
				unset($ins_rec1);				

				
				
				unset($filename);


				if (stristr("@@@:",$ownert[FULLNAME])) {
					$ownert = "&nbsp;&nbsp;&nbsp;n/a";
				}

				$toprint .= "<tr><td>";
				
		
				$toprint .= "<img src='arrow.gif'>&nbsp;<a href=csv.php?fileid=$files[fileid] class='bigsort'>$files[filename]</a> $ins_rec1";
			
				
				$toprint .="</td>";
		

						
					
				$toprint .= "<td>";
				$toprint .= ceil(($files[filesize]/1024)). "K";
				$toprint .= "</td><td>$files[dt]</td><td>$ownert</td><td>";
				if (!$readonly) {
					$toprint .= "<input type='checkbox' class='radio' name=deletefile[] OnChange='document.AddFileToCust.somedelete.value=1' value='$files[fileid]' $roins></td></tr>\n";
				}
				$ftel++;
			}
			if ($ftel) { 
				print $toprint . "</td></tr>\n"; 
			}
			
			if (!$readonly) {
				print "<tr><td colspan=6><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$lang[attachfile]&nbsp;</legend>";
				print "<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='52428800'><input type='hidden' name='somedelete' value=''><input type='hidden' 	name='det' value='1'><input type='hidden' name='c_id' value='$c_id'><INPUT NAME='userfile' TYPE='file' $roins>&nbsp;<input type='submit' 	value='" . $lang['save'] . "'></form>&nbsp;&nbsp;&nbsp;&nbsp;<a OnClick='javascript:pophelp(9)' class='bigsort' cursor='click' style='cursor: help'><img src='info.gif'></a></td></tr>\n</table></fieldset>";
			} else {
				print "<tr><td>";
			}

			print "<br>";
			//print "</fieldset>";

			print "<br><img src='arrow.gif'>&nbsp;<a href='customers.php?$epoch' class='bigsort'>$lang[customers]</a>";
			
			if ($readonly) {
				// niks
			} else {
				print " | <img src='arrow.gif'><img src='arrow.gif'>&nbsp;<a href='customers.php?editcust=1&custid=$c_id&$epoch' class='bigsort'>$lang[edit]</a>";
			}
			EndHTML();
			exit();
	}
	if ($deleteconfirm) {
			$a = GetClearanceLevel($GLOBALS[USERID]);
			if ($a<>"rw" && $a<>"administrator") {
					print "<img src='error.gif'>&nbsp;Access denied";
					EndHTML();
					exit;
			}
				$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$deleteconfirm'";
				$result= mcq($sql,$db);
				$cust= mysql_fetch_array($result);

			if (($cust['customer_owner'] <> $GLOBALS['USERID']) && (!is_administrator()) && ($cust['readonly']=='yes')) {
				print "<img src='error.gif'> Access denied";
				log_msg("WARNING - DOUBLE RISK. Somebody tried a direct post to delete customer dossier " . $deleteconfirm,"");
				EndHTML();
				exit;
			}

			$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$deleteconfirm'";
			mcq($sql,$db);

	//			$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]journal WHETE eid='$deleteconfirm' AND type='customer'";
	//			mcq($sql,$db);

			print "<table><tr><td>Record $deleteconfirm (+journal) $lang[wasdeleted] .</td></tr>\n</table>";
			unset($search);
			unset($delete);
			unset($deleleconfirmed);
			unset($add);
			log_msg("Entry $deleteconfirm deleted from customer table","");
	}

	if ($delete) {

			$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer='$delid'";
			$resbla = mcq($sql,$db);
			$count = mysql_fetch_array($resbla);
			$count = $count[0];
			$a = GetClearanceLevel($GLOBALS[USERID]);
			if ($a<>"rw" && $a<>"administrator") {
					print "<img src='error.gif'>&nbsp;Access denied";
					exit;
					
			}
			
			if ($count>0) {
				print "Illegal move. This incident has been logged.";
				log_msg("Someone tried to delete a customer with entities by adjusting HTML code","");
				exit;
			} 
			$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$delid'";
			$result= mcq($sql,$db);
			$cust= mysql_fetch_array($result);
			
			if (($cust['customer_owner'] <> $GLOBALS['USERID']) && (!is_administrator()) && ($gh['readonly']=='yes')) {
				print "<img src='error.gif'> Access denied";
				log_msg("WARNING - DOUBLE RISK. Somebody tried a direct post to adjust customer dossier " . $editfilled,"");
				EndHTML();
				exit;
			}
			if (!stristr($cust[cust_homepage],"http://")) {
						$cust[cust_homepage] = "http://" . $cust[cust_homepage];
			}
			
			print "<form name='delconf' method='POST'><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size='+1'>$lang[customer]: $cust[custname]</font>&nbsp;</legend>";
			print "<table width=100%><tr>";
			print "<td colspan=2><b>$lang[pbdelconf]</b></td></tr>\n<tr>";
			print "<tr><td>$lang[contact]</td><td><input  DISABLED type='text' name='contactnew' value='$cust[contact]' size=40></td></tr>\n";
			print "<tr><td>$lang[contacttitle]</td><td><input type='text' name='contact_titlenew' value='$cust[contact_title]' size=40 DISABLED></td></tr>\n";
			print "<tr><td>$lang[contactphone]</td><td><input type='text' name='contact_phonenew' value='$cust[contact_phone]' size=15 DISABLED></td></tr>\n";
			print "<tr><td>$lang[contactemail]</td><td><input type='text' name='contact_emailnew' value='$cust[contact_email]' size=40 DISABLED></td></tr>\n";
			print "<tr><td>$lang[customeraddress]</td><td><textarea rows=8 cols=60 wrap='virtual' class='txt' name='cust_addressnew'  DISABLED>$cust[cust_address]</textarea></td></tr>\n";
			print "<tr><td>$lang[custremarks]</td><td><textarea rows=12 cols=60 wrap='virtual' class='txt' name='content' DISABLED>$cust[cust_remarks]</textarea></td></tr>\n";
			print "<tr><td>$lang[custhomepage]</td><td><input type='text' name='cust_homepagenew' value='$cust[cust_homepage]' size=40 DISABLED></td></tr>\n</table></fieldset>";
			print "<br><input type='hidden' name='deleteconfirm' value='$delid'><input type='submit' name='knoppie' value='$lang[deletepb]'></form></td></tr>\n</table>";
	EndHTML();
			exit;
	}


	if ($add || $editcust) {
//		print "............" . CheckCustomerAccess($custid);
		if (CheckCustomerAccess($custid)=="readonly") {
			$readonly = true;
			$roins = "DISABLED";
			$formaction = "index.php?logout=1";
		} elseif (CheckCustomerAccess($custid)<>"ok") {
			print "<img src='error.gif'> Access denied (11243)";
			EndHTML();
			exit;
		} else {
			$formaction = "customers.php";
			$readonly = false;
		}

			if (is_numeric($GLOBALS['CUSTOMCUSTOMERFORM'])) {
				if ($_REQUEST['add']) {
					$c_add = "YES";
				}

				print CustomCustomerForm($GLOBALS['CUSTOMCUSTOMERFORM'], $custid, $c_add);

				EndHTML();
				exit;
			} else {

			print "<form name='EditEntity' method='POST' action='" . $formaction . "'><input type='hidden' name='changed'>";
			print PrintExtraFieldForceJavascript("EditEntity",$type="customer");
			if ($editcust) {
				$sql = "SELECT * FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$custid'";
				$result= mcq($sql,$db);
				$cust= mysql_fetch_array($result);
				if ($nonavbar) {
					print "<table width='100%'><tr><td>";				
				} else {
					print "</td></tr>\n</table><table width='80%'><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>";				
				}
				

				print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size='+1'>$lang[customer] $custid: $cust[custname]</font>&nbsp;</legend>";
				print "<table cellspacing='0' cellpadding='4'  border='0'>";
				if ($nonavbar) {
					$wt = "100%";
				} else {
					$wt = "80%";
				}

				print "<input type='hidden' name='editfilled' value='$custid'>";
				$sql = "SELECT active FROM $GLOBALS[TBL_PREFIX]customer WHERE id='$custid'";
				$result= mcq($sql,$db);
				$bla = mysql_fetch_array($result);
				$bla = $bla[0];

				if ($bla == "yes") $cyn = "CHECKED";

				print "<tr><td><b>Active</b>&nbsp;&nbsp;<input type='checkbox' class='radio' name='activenew' value='yes'  $cyn $roins></td></tr>\n";
				$sql = "SELECT COUNT(*) FROM $GLOBALS[TBL_PREFIX]entity WHERE CRMcustomer='$cust[id]'";
				$resbla = mcq($sql,$db);
				$count = mysql_fetch_array($resbla);
				$count = $count[0];

				if ($count>0) {
					$ins = "DISABLED";
					$ins2 = "($lang[custdelexplain])";
				} 

				$ins3 = "&nbsp;&nbsp;<input type='button' OnClick='javascript:document.location=\"customers.php?delete=1&delid=$cust[id]\"' name='do' value='$lang[delete]' $ins $roins> <br><table><tr><td>$ins2</td></tr>\n</table>";
				} else {
					print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size='+1'>$lang[addcust]</font>&nbsp;</legend>";
					print "<table border=0 cellspacing='0' cellpadding='4' width='100%'>";
					print "<input type='hidden' name='addfilled' value='1' $roins>";				
					
				}
			print "<tr><td><fieldset><legend>&nbsp;$lang[customer]</legend><input type='text' $roins name='custnamenew' value='$cust[custname]' size=40> <a OnClick=\"poplittlewindowWithBars('customers.php?CheckCustomer=' + document.EditEntity.custnamenew.value);\" style='cursor: pointer'>[check]</a></fieldset></td></tr>\n";
			print "<tr><td><fieldset><legend>&nbsp;$lang[contact]</legend><input $roins type='text' name='contactnew' value='$cust[contact]' size=40></td>\n";
			print "<td><fieldset><legend>&nbsp;$lang[contacttitle]</legend><input $roins type='text' name='contact_titlenew' value='$cust[contact_title]' size=40></fieldset></td></tr>\n";
			
			print "<tr><td><fieldset><legend>&nbsp;$lang[contactphone]</legend><input $roins type='text' name='contact_phonenew' value='$cust[contact_phone]' size=15></fieldset></td>\n";
			print "<td><fieldset><legend>&nbsp;$lang[contactemail]</legend><input $roins type='text' name='contact_emailnew' value='$cust[contact_email]' size=40></fieldset></td></tr>\n";
			print "<tr><td colspan=2><fieldset><legend>&nbsp;$lang[customeraddress]</legend><textarea $roins rows=8 cols=80 wrap='virtual' class='txt' name='cust_addressnew'>$cust[cust_address]</textarea>&nbsp;</fieldset></td></tr>\n";

			print "<tr><td colspan=2><fieldset><legend>&nbsp;$lang[custremarks]</legend><textarea $roins rows=12 cols=80 wrap='virtual' class='txt' name='cust_remarksnew'>$cust[cust_remarks]</textarea>&nbsp;</fieldset></td></tr>\n";
			print "<tr><td><fieldset><legend>&nbsp;$lang[custhomepage]</legend><input type='text' $roins name='cust_homepagenew' value='$cust[cust_homepage]' size=40></fieldset></td></tr>\n";
			//print "<tr><td colspan=2><hr></td></tr>\n";
			print "<tr><td colspan=4>";

			print str_replace("</tr>","<tr>\n",ExtraFieldsBox($custid,$readonly,"%","customer"));
			print "</td></tr>\n";
			
			
			//print "<tr><td colspan=2><hr></td></tr>\n";
			print "<tr><td>" . $lang[customer] . " " . strtolower($lang[owner]) . ":</td><td><select name='customer_ownernew'>";
			
			$sql= "SELECT * FROM $GLOBALS[TBL_PREFIX]loginusers WHERE active='yes' AND FULLNAME NOT LIKE '@@@%' ORDER BY name";
			$result= mcq($sql,$db);
			
			while ($CRMloginusertje= mysql_fetch_array($result)) {
				if ($CRMloginusertje[id]==$cust['customer_owner']) {
						$a = "SELECTED";
						$owner = $cust['customer_owner'];
				} else {
						$a = "";
				}
				 print "<option value='" . $CRMloginusertje[id] . "' " . $a . " size='1'>" . $CRMloginusertje['FULLNAME'] . "</option>";
			}

			print "</select>";
			
			print "</td></tr>\n";
			print "<tr><td>$lang[readonly]:</td><td>";

			if ($cust['readonly']=="yes") {
				$ins = "CHECKED";
			} else {
				$ins = "";
			}

			print "<input class='radio' type='checkbox' value='y' name='readonlycust' $ins>";
			print "</td></tr>\n";
			print "<tr><td>E-mail $lang[owner]:</td><td>";
			if ($cust['email_owner_upon_adds']=="yes") {
				$ins = "CHECKED";
			} else {
				$ins = "";
			}

			print "<input class='radio' type='checkbox' value='yes' name='email_owner_upon_adds' $ins>";
			print "</td></tr>\n";
			print "</table>";
			if ($nonavbar) {
				print "<br><input type='hidden' name='closeonnextload' value='1'><input $roins type='button' OnClick='CheckForm();' name='submitknop' value='$lang[saveclose]'>&nbsp;&nbsp;<input type='button' name='do' value='$lang[cancel]' Onclick='window.close();'>";
			} else {
				print "<br><input type='button' OnClick='CheckForm();' name='do' $roins value='$lang[save]'>&nbsp;&nbsp;<input type='button' name='submitknop' value='$lang[cancel]' Onclick='javascript:history.back(1);'>";
			}
			print "$ins3";
			print "</form>";
			if ($nonavbar) {
				print "</td></tr>\n</table>";				
			}
			print "";
	EndHTML();
			exit;
	} // end if GLOBALS CUSTOMCUSTFORM
} // end if editcust


	log_msg("Customer overview accessed","");

	if (!$search && !$zoek) {
	//	prtsrc("0");
		if ($maxcust<$GLOBALS['CUSTOMER_LIST_TRESHOLD'] || $_REQUEST['stashid']) {
					DspSearchResults("%","");
		} else {
					prtsrc2("0");
		}

		if ($nonavbar) {
			print "<hr>";
		}
	} else {
		DspSearchResults($search,$cust_insert);
	}
}
EndHTML();

?>