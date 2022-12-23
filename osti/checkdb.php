<?
/* ********************************************************************
 * $GLOBALS[TBL_PREFIX] 
 * Copyright (c) 2001-2003 hidde@it-combine.com
 * Licensed under the GNU GPL. For full terms see http://www.gnu.org/
 *
 * This script checks the repository currently logged onto for errors and
 * inconsistencies, and optimizes all tables.
 *
 * Check http://www.crm-ctt.com/ for more information
 **********************************************************************
 */

extract($_REQUEST);

// Set error reporting level
error_reporting(E_ERROR);

if ($_SERVER['HTTP_HOST']) {
	$web = 1;
//	print "WEB IS AAN";
//	print_r($_SERVER);
//	exit;
}

if ($web) {
	$EnableRepositorySwitcherOverrule="n";
	include("header.inc.php");
	print "</td></tr></table>";
	AdminTabs();
	MainAdminTabs("datman");
} else {
	require("config.inc.php");
	require("functions.php");

	$GLOBALS['logqueries']    = false;   // logs all queries (10% slower)
	$GLOBALS['logtext']       = false;   // logs all comments - alternative: user-num. Logs only that user. (25% slower)
	$GLOBALS['query_timer']   = false;   // logs slowest SQL query
	$GLOBALS['qlog_onscreen'] = false;   // displays pop-up containing log
	$GLOBALS['ShowTraceLink'] = false;   // displays qlog trace link at end of page (same 25% slower as 'logtext')


	print "Database integrity check\n\n";
	if ($argv[1]=="-help" || $argv[1]=="--help" || $argv[1]=="help" || $argv[1]=="-h") {
		print "\nUsado:\n";
		print "\t[no arguments]\t:Interativo\n";
		print "or:\n";
		print "\t[reposnr] [user] [pass] [y|n] - (y = auto repair, n = prompt)\n";
		print "\nExample: php -q checkdb.php 0 admin admin_pwd y\n\n";
		exit;
	}
	if ($argv[1]) {
		$repository = $argv[1];
	} 

	if ($argv[2]) {
		$username = $argv[2];
	} 
	if ($argv[3]) {
		$password = $argv[3];
	} 
	if ($argv[4] == "y") {
		$auto = $argv[4];
		$auto=1;
		print "! Auto-fix ativado.\n";
	} 
	if (!CommandlineLogin($username,$password,$repository)) {
		print "Saindo...";
		exit;
	}

	$include="1";
	include("sumpdf.php");
	include("language.php");
	
}

$tables = array("$GLOBALS[TBL_PREFIX]accesscache", "$GLOBALS[TBL_PREFIX]binfiles", "$GLOBALS[TBL_PREFIX]blobs", "$GLOBALS[TBL_PREFIX]cache", "$GLOBALS[TBL_PREFIX]calendar", "$GLOBALS[TBL_PREFIX]contactmoments", "$GLOBALS[TBL_PREFIX]customaddons", "$GLOBALS[TBL_PREFIX]customer", "$GLOBALS[TBL_PREFIX]ejournal", "$GLOBALS[TBL_PREFIX]entity", "$GLOBALS[TBL_PREFIX]entitylocks", "$GLOBALS[TBL_PREFIX]extrafields", "$GLOBALS[TBL_PREFIX]help", "$GLOBALS[TBL_PREFIX]internalmessages", "$GLOBALS[TBL_PREFIX]journal", "$GLOBALS[TBL_PREFIX]languages", "$GLOBALS[TBL_PREFIX]loginusers", "$GLOBALS[TBL_PREFIX]phonebook", "$GLOBALS[TBL_PREFIX]priorityvars", "$GLOBALS[TBL_PREFIX]sessions", "$GLOBALS[TBL_PREFIX]settings", "$GLOBALS[TBL_PREFIX]statusvars", "$GLOBALS[TBL_PREFIX]triggers", "$GLOBALS[TBL_PREFIX]uselog", "$GLOBALS[TBL_PREFIX]userprofiles", "$GLOBALS[TBL_PREFIX]webdav_locks", "$GLOBALS[TBL_PREFIX]webdav_properties");

if ($web) {
	print "</table><table border=0 width='65%'><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;<font size=+1>$lang[adm]</font>&nbsp;</legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=+2>" . $title . "</font><table border=0 width='100%'>";
}

MustBeAdmin();


// Some language table management: (completely safe, so don't bother the user)

$sql = "DELETE FROM $GLOBALS[TBL_PREFIX]languages WHERE TEXTID='' AND TEXT=''";
mcq($sql,$db);


if (!$go && $web) {
	$legend = "Check database&nbsp;";
	printbox("Este script confere seu repositório atual ($title) para erros, e aperfeiçoará todas suas tabelas. Em repositórios grandes, pode ocupar algum tempo totalmente. Este Script também pode ser corrigido da linha de comando.<BR><BR>Você deseja continuar?<BR><BR><img src='arrow.gif'>&nbsp;<a href='checkdb.php?go=1&web=1' class='bigsort'>Sim</a><BR><BR><img src='arrow.gif'>&nbsp;<a href='javascript:history.back(-1);' class='bigsort'>Não, quero voltar</a>");
} elseif ($input) {
	// OK two arrays of to-delete data were submitted.
	// Namely: 
	// file_td	:	files to delete
	// cf_td 	:	custom fields to delete

	$file_td =		unserialize(base64_decode($file_td));
	$cf_td =		unserialize(base64_decode($cf_td));
	$cf_td_cust =	unserialize(base64_decode($cf_td_cust));
	$journal_td =	unserialize(base64_decode($journal_td));
	$ejournal_td =	unserialize(base64_decode($ejournal_td));
	$calendar_td =	unserialize(base64_decode($calendar_td));

	$queries = array();

	foreach ($file_td as $file) {
		array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $file . "'");
		array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]blobs WHERE fileid='" . $file . "'");
	}
	// Custom field table can get very large - consolidate the query

	$base_q = "DELETE FROM $GLOBALS[TBL_PREFIX]customaddons WHERE (";
	foreach ($cf_td as $cf) {
		$base_q .= " eid='" . $cf . "' OR";
	}
	$base_q .= " eid = '122219873875983659824645whatever') AND (type='entity' OR type='')";
	array_push($queries,$base_q);

	$base_q2 = "DELETE FROM $GLOBALS[TBL_PREFIX]customaddons WHERE (";
	foreach ($cf_td_cust as $cf) {
		$base_q2 .= " eid='" . $cf . "' OR";
	}
	$base_q2 .= " eid = '122219873875983659824645whatever') AND type='cust'";
	array_push($queries,$base_q2);

	foreach ($journal_td as $jtd) {
		array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='" . $jtd . "' AND type='entity'");
	}
	foreach ($ejournal_td as $ejtd) {
		array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]ejournal WHERE eid='" . $ejtd . "'");
	}
	foreach ($calendar_td as $ctd) {
		array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]calendar WHERE eid='" . $ctd . "'");
	}
	if (!$given_query) { $given_query = array(); }

	if (sizeof($given_query>0)) {
		foreach ($given_query as $row) {
			array_push($queries,$row);
		}
	}
	//print_r($queries);

	for ($x=0;$x<sizeof($tables);$x++) {
		array_push($queries, "OPTIMIZE TABLE " . $tables[$x]);
	}		

	foreach($queries as $sql) {
		mcq($sql,$db);
	}

	

	print "<pre>" . sizeof($queries) . " database queries executed.\n</pre>";
	print "<img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password' style='cursor:pointer'>Back to main administration page</a>";

} else {
	
	
	if ($web) {
		print "<pre>";
	}

	/*
	print "\nRepair table...\n";


	for ($x=0;$xsizeof($tables);$x++) {
		$sql = "REPAIR TABLE " . $tables[$x];
		mcq($sql,$db);
		//print "Pro-active fixing ... " . $tables[$x] . "\n";

		
		ob_

	}

	print "\nAll tables optimized. Starting extended reference check.\n\n";

	*/
	$sql = "SELECT COUNT(eid) FROM $GLOBALS[TBL_PREFIX]entity";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	$maxid = $result[0];
	$op=1;
	print "\nStarting recursive reference check.\n\n";

	print "Checking user references...\n";

	$eids = array();

	$sql = "SELECT eid,CRMcustomer,owner,assignee FROM $GLOBALS[TBL_PREFIX]entity";
	$ret = mcq($sql,$db);
	while ($row = mysql_fetch_array($ret)) {
		if (GetUserName($row['owner']) == "n/a" && $row['owner']>"2147483647") {
			print "\nUser     reference error (non-existing user): " . $row['owner'] . "\n";

			$err = 1;
		}
		if (GetUserName($row['assignee']) == "n/a" && $row['assignee']<>"2147483647") {
			print "\nUser     reference error (non-existing user): " . $row['assignee'] . "\n";

			$err = 1;
		}
		array_push($eids,$row['eid']);
		if (!$web) {
			print "\015" . $op . "/" . $maxid;
			$op++;
		}
		
	}
	if (!$err) {
		print "\nReferências do Usuário: OK\n\n";

	}
	unset($err);
	print "Checando jornal...\n";

	
	$sql = "SELECT count(distinct eid) FROM $GLOBALS[TBL_PREFIX]journal WHERE type='entity'";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	$top = $result[0];
	//print "\n";

	$op=1;
	$journaltd = array();
	$sql = "SELECT DISTINCT(eid) FROM $GLOBALS[TBL_PREFIX]journal where type='entity'";
	//$sql = "SELECT $GLOBALS[TBL_PREFIX]journal.eid FROM $GLOBALS[TBL_PREFIX]journal,$GLOBALS[TBL_PREFIX]entity WHERE $GLOBALS[TBL_PREFIX]entity.eid <> $GLOBALS[TBL_PREFIX]journal.eid";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (!$web) {
			print "\015" . $op . "/" . $top;
			$op++;
		}
		if (!in_array($row['eid'],$eids)) {
			$hops++;
			$err=1;
			$serr=1;
			array_push($journaltd,$row['eid']);
		}
	}
	print "\n";

	if (!$err) {
		print "Referências do Jornal: OK\n\n";

		print "Checando Jornais das Entidades...\n";

	} else {
		print "Foram achados " . $hops . " erros de referência no Jornal\n\n";

		print "Checando Jornais das Entidades...\n";

	}
	$sql = "SELECT COUNT(DISTINCT eid) FROM $GLOBALS[TBL_PREFIX]ejournal";
	$result = mcq($sql,$db);
	$result = mysql_fetch_array($result);
	$top = $result[0];

	unset($err);
	$hops=0;
	$op=1;
	if (!$web) {
		print "\015" . $op . "/" . $top;
	}
	$ejournaltd = array();
	$sql = "SELECT DISTINCT(eid) FROM $GLOBALS[TBL_PREFIX]ejournal";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {

		if (!$web) {
			print "\015" . $op . "/" . $top;
			$op++;
		}

		if (!in_array($row['eid'],$eids)) {
			$hops++;
			$err=1;
			$serr=1;
			array_push($ejournaltd,$row['eid']);
		}
	}
	print "\n";


	if (!$err) {
		print "Referências do Jornal: OK\n";

	} else {
		print "Foram achados " . $hops . " erros de referência nos jornais da entidade\n";

	}
	unset($err);
	
	print "\n";

	$ftd = array();
	
	$op=1;
	$oldpc=0;

	$sql = "SELECT count(*) FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid<>'0' AND type='entity'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	$top = $row[0];
	print "Checando arquivos de referência (entidade)...\n";

	
	
	
	$sql = "SELECT koppelid,fileid FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid<>'0' AND type='entity'";
	$result = mcq($sql,$db);
	$pc1 = $top/100; // 1% van totaal

	while ($row = mysql_fetch_array($result)) {
		if (!$web) {
			print "\015" . $op . "/" . $top;
			$op++;
		}

		$sql = "SELECT eid from $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $row['koppelid'] . "'";
		$result1 = mcq($sql,$db);
		$result1 = mysql_fetch_array($result1);
		if (!$result1[0]) {
			//print "File  reference error for fileid " . fillout($row['fileid'],6) . "! Entity " . fillout($row['koppelid'],6) . " doesn't exist..\n";

			$err=1;
			$serr = 1;
			array_push($ftd,$row['fileid']);
		}
	}

	print "\n";
	$sql = "SELECT count(*) FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid<>'0' AND type='cust'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	$top = $row[0];
	print "Checando fref (customer)...\n";
	$sql = "SELECT koppelid,fileid FROM $GLOBALS[TBL_PREFIX]binfiles WHERE koppelid<>'0' AND type='cust'";
	$result = mcq($sql,$db);
	$pc1 = $top/100; // 1% van totaal
	$op = 0;

	while ($row = mysql_fetch_array($result)) {
		if (!$web) {
			print "\015" . $op . "/" . $top;
			$op++;
		}

		$sql = "SELECT id from $GLOBALS[TBL_PREFIX]customer WHERE id='" . $row['koppelid'] . "'";
		$result1 = mcq($sql,$db);
		$result1 = mysql_fetch_array($result1);
		if (!$result1[0]) {
			//print "File  reference error for customer fileid " . fillout($row['fileid'],6) . "! Entity " . fillout($row['koppelid'],6) . " doesn't exist..\n";

			$err=1;
			$serr = 1;
			array_push($ftd,$row['fileid']);
		}
	}
		print "\n";

	if (!$err) {
		print "Referências do arquivo: OK\n\n";

		print "Checando referências do calendário...\n";

	} else {
		print "Procurando erros nas referências do arquivo\n\n";

		print "Checando referências do calendário...\n";

	}
	unset($err);
	$op=1;
	$sql = "SELECT count(distinct eID) FROM $GLOBALS[TBL_PREFIX]calendar";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	$top = $row[0];

	$calendartd = array();
	$sql = "SELECT DISTINCT(eID) FROM $GLOBALS[TBL_PREFIX]calendar";
	$result = mcq($sql,$db);
	if (!$web) {
		print "\015" . "0" . "/" . $top;
	}
	while ($row = mysql_fetch_array($result)) {
		if (!$web) {
			print "\015" . $op . "/" . $top;
			$op++;
		}
		$sql = "SELECT * from $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $row['eID'] . "'";
		$result1 = mcq($sql,$db);
		$result1 = mysql_fetch_array($result1);
		if (!$result1[0]) {
			//print "File  reference error for fileid " . fillout($row['fileid'],6) . "! Entity " . fillout($row['koppelid'],6) . " doesn't exist..\n";

			$err=1;
			$serr = 1;
			array_push($calendartd,$row['eID']);
		}
	}
	print "\n";

	if (!$err) {
		print "Referências do calendário: OK\n\n";

		print "Checando campos de referência...\n";


	} else {
		print "Procurando erros nas referências do calendário\n\n";

		print "Checando campos de referência...\n";

	}
	unset($err);
	$op=1;
	$cftd = array();
	$sql = "SELECT count(id) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='' OR type='entity'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	$top = $row[0];
	if (!$web) {
		print "\015" . "0" . "/" . $top;
	}

	$sql = "SELECT DISTINCT(eid) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='' OR type='entity'";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (!$web) {
			print "\015" . "$op/" . $top;
			$op++;
		}
		$sql = "SELECT eid from $GLOBALS[TBL_PREFIX]entity WHERE eid='" . $row['eid'] . "'";
		$result1 = mcq($sql,$db);
		$result1 = mysql_fetch_array($result1);
		if (!$result1[0]) {
			$err=1;
			$serr = 1;
			array_push($cftd,$row['eid']);
		}
	}
	print "\n";

	if (!$err) {
		print "Campos de referência: OK (" . $lang['entity'] . ")\n\n";

		print "Checando campos de referência...\n";

	} else {
		print "Procurando erros nos campos de referência (" . $lang['entity'] . ")\n\n";

		print "Checando campos de referência...\n";

	}
	unset($err);
	$op=1;
	$sql = "SELECT count(id) FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust'";
	$result = mcq($sql,$db);
	$row = mysql_fetch_array($result);
	$top = $row[0];
	if (!$web) {
		print "\015" . "0" . "/" . $top;
	}
	$cftdcust = array();
	$sql = "SELECT id,eid,name FROM $GLOBALS[TBL_PREFIX]customaddons WHERE type='cust'";
	$result = mcq($sql,$db);
	while ($row = mysql_fetch_array($result)) {
		if (!$web) {
			print "\015" . "$op/" . $top;
			$op++;
		}
		$sql = "SELECT id from $GLOBALS[TBL_PREFIX]customer WHERE id='" . $row['eid'] . "'";
		$result1 = mcq($sql,$db);
		$result1 = mysql_fetch_array($result1);
		if (!$result1[0]) {
			//print "Field reference error for customer entity field! " . $lang['customer'] . " " . fillout($row['eid'],6) . " doesn't exist.. (" . $row['name'] . "(" . $row['id'] . "))\n";

			$err=1;
			$serr=1;
			array_push($cftdcust,$row['eid']);
		}
	}
	print "\n";

	if (!$err) {
		print "Campos de referência OK (" . $lang['customer'] . ")\n";

	} else {
		print "Procurando erros nos campos de referência (" . $lang['customer'] . ")\n";

	}
	unset($err);

	$blobids = array();
	$binids = array();

	print "\nReferências de objeto grandes binárias (blobs table)...\n";
	$res = mcq("SELECT fileid FROM $GLOBALS[TBL_PREFIX]binfiles",$db);
	while ($row = mysql_fetch_array($res)) {
		array_push($binids,$row['fileid']);
	}
	$res = mcq("SELECT fileid FROM $GLOBALS[TBL_PREFIX]blobs",$db);
	while ($row = mysql_fetch_array($res)) {
		array_push($blobids,$row['fileid']);
	}

	foreach ($blobids AS $id) {
		$xc++;
		if (!$web) {
			print "\015" . $xc . "/" . sizeof($blobids);
		}
		if (!in_array($id,$binids)) {
			print "\nFile ID $id existente em BLOB table, mas não existem tabelas binárias\n";
			array_push($ftd,$id);
			$err=1;
			$serr=1;
		}
	}
	print "\nChecando grandes objetos binários de referência...\n";
	foreach ($binids AS $id) {
		$xxc++;
		if (!$web) {
			print "\015" . $xxc . "/" . sizeof($blobids);
		}
		if (!in_array($id,$blobids)) {
			print "\nFile ID $id exite tabelas binárias, mas não existem tabelas BLOB\n";
		}
	}

	/*print "Checking parent/childs references...\n";

	$res = mcq("SELECT eid, parent FROM $GLOBALS[TBL_PREFIX]entity", $db);
	while ($row=mysql_fetch_array($res)) {
		$a = true;
		if ($row['parent'] <> 0) {
			$a = ValidateParentalRights($row['parent'],$row['eid']);

			if ($a == false) {
				//print "WRONG REF: " . $row['eid'] . " to daddy " . $row['parent'] . "\n";
			} else {
				//print "GOOD REF: " . $row['eid'] . " to daddy " . $row['parent'] . "\n";
			}
		} else {
//			print "SKIP REF: " . $row['eid'] . "\n";
		}

	}
	
*/
	print "\n";


	qlog("Checando banco de dados");


		print "\n\nArquivos que podem ser apagados: " . sizeof($ftd) . "\n";
		print "Campo de enitity de costume fixa que pode ser apagado: " . sizeof($cftd) . "\n";
		print "Campos de costume do cliente que podem ser apagados: " . sizeof($cftdcust) . "\n";
		print "Campos do Jornal que podem ser apagados: " . sizeof($journaltd) . "\n";
		print "Campos do EJournal que podem ser apagados: " . sizeof($ejournaltd) . "\n";
		print "Entradas do calendário que podem ser apagados: " . sizeof($calendartd) . "\n";

	if (!$web && !$serr) {
		print "\nNada para fazer. Bye!\n\n";

		exit;
	}
	
	if ($web) {
		print "</pre>";
		
		if ($serr) {
			print "<form name='cont' method='post'>";
			print "<input name='file_td' type='hidden' value='" . base64_encode(serialize($ftd)) . "'>"; 
			print "<input name='cf_td' type='hidden' value='" . base64_encode(serialize($cftd)) . "'>"; 
			print "<input name='cf_td_cust' type='hidden' value='" . base64_encode(serialize($cftdcust)) . "'>"; 
			print "<input name='journal_td' type='hidden' value='" . base64_encode(serialize($journaltd)) . "'>"; 
			print "<input name='ejournal_td' type='hidden' value='" . base64_encode(serialize($ejournaltd)) . "'>"; 
			print "<input name='calendar_td' type='hidden' value='" . base64_encode(serialize($calendartd)) . "'>"; 
			print "<input name='input' type='hidden' value='1'>";
			print "<input type='submit' value='Deletar dados em excesso'></form>";
		} else {
			print "Nenhum erro achou que pode ser fixado.<br><br>";
			print "<img src='arrow.gif'>&nbsp;<a class='bigsort' href='admin.php?password=$password' style='cursor:pointer'>Atrás para página de administração principal</a>";
		}
		print "</td></tr></table>";
		EndHTML();
	} else {
		if (!$auto) {
			print "\nVocê deseja apagar ? [y|n]\n CRM> ";
			$a = readln();
			if (strtoupper($a)<>'Y') {
				print "\nOK, bye!\n\n";

				exit;
			}
		}
		

		$queries = array();

	
		foreach ($ftd as $file) {
			array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]binfiles WHERE fileid='" . $file . "'");
			array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]blobs WHERE fileid='" . $file . "'");
		}
		// Custom field table can get very large - consolidate the query
		$base_q = "DELETE FROM $GLOBALS[TBL_PREFIX]customaddons WHERE (";
		foreach ($cftd as $cf) {
			$base_q .= " eid='" . $cf . "' OR";
		}
		$base_q .= " eid = '122219873875983659824645whatever') AND (type='' OR type='entity')";
		array_push($queries,$base_q);
		
		$base_q = "DELETE FROM $GLOBALS[TBL_PREFIX]customaddons WHERE ";
		foreach ($cftdcust as $cf) {
			$base_q .= " eid='" . $cf . "' OR";
		}
		$base_q .= " eid = '122219873875983659824645whatever' AND type='cust'";
		
		array_push($queries,$base_q);
		foreach ($journaltd as $jtd) {
			array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]journal WHERE eid='" . $jtd . "'");
		}
		foreach ($ejournaltd as $ejtd) {
			array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]ejournal WHERE eid='" . $ejtd . "'");
		}
		foreach ($calendartd as $ctd) {
			array_push($queries,"DELETE FROM $GLOBALS[TBL_PREFIX]calendar WHERE eID='" . $ctd . "'");
		}

		//foreach ($given_query as $row) {
		//	array_push($queries,$row);
		//}
		//print_r($queries);

		foreach($queries as $sql) {
			mcq($sql,$db);
			//print $sql . "\n\n";
			$sqlc++;
			if (!$web) print "Executando queryes, isso deve demorar alguns instantes. (" . $sqlc . "/" . sizeof($queries) . ")\015";
		}

		print "\n" . sizeof($queries) . " queryes executadas.\n";
	
		
	
		for ($x=0;$x<sizeof($tables);$x++) {
			if (!$web) print "\015Optimizing tables..(" . $x . "/" . sizeof($tables) . ")";
			$sql = "OPTIMIZE TABLE " . $tables[$x];
			mcq($sql,$db);
			//print "Optimizing table  ... " . $tables[$x] . "\n";
		}		
		print " ... done\n\n";

		uselogger_local("Database checked. " . sizeof($queries) . " delete statements executed","");
		qlog("Database checked. " . sizeof($queries) . " delete statements executed");
		
	}

} // end if !$go


function printbox($msg)
{
		global $printbox_size,$legend;
		
		if (!$printbox_size) {
			$printbox_size = "70%";
		}
		
		print "<table border='0' width='$printbox_size'><tr><td colspan=2><fieldset>";
		if ($legend) {
			print "<legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp;$legend</legend>";
		}
		print $msg . "</fieldset></td></tr></table><br>";
	
		unset($printbox_size);
		$legend = "";

} // end func


function uselogger_local($comment,$dummy_extra_not_used){
	global $REMOTE_ADDR, $HTTP_SERVER_VARS, $actuser, $username, $user, $HTTP_USER_AGENT,$name,$logqueries;
		
		// here comes the mail trigger
	


	 if (getenv(HTTP_X_FORWARDED_FOR)){ 
	   $ip=getenv(HTTP_X_FORWARDED_FOR); 
	 } 
	 else { 
	   $ip=getenv(REMOTE_ADDR); 
	 } 
	
	
	if (!$comment) {
		$qs  = getenv("QUERY_STRING");
		$qs .= getenv("HTTP_POST_VARS");
		$qs .= $comment;
	} else {
		$qs = addslashes($comment);
	}

	$url = $HTTP_SERVER_VARS["PHP_SELF"];
	
	$query ="INSERT into $GLOBALS[TBL_PREFIX]uselog (ip, url, useragent, qs, user) VALUES ('$ip', '$url', '$HTTP_USER_AGENT' , '$qs','$name')";
	mcq($query,$db);

	if ($logqueries) {
		qlog("'$ip', '$url', '$HTTP_USER_AGENT' , '$qs','$name'");
	}
}