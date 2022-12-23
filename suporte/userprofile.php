<?
/* ********************************************************************
 * CRM 
 * Copyright (c) 2001-2003 hidde@it-combine.com
 * Licensed under the GNU GPL. For full terms see http//www.gnu.org/
 *
 * Handles new entity forms (e=_new_) and the edit of existing entities (e=[entity_nr])
 *
 * Check http//www.crm-ctt.com/ for more information
 **********************************************************************
 */
extract($_REQUEST);

include("header.inc.php");
print "</td></tr></table>";
AdminTabs('users');
print "<table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>";
MustBeAdminUser();
print "<fieldset><legend>&nbsp;<img src='crmlogosmall.gif'>&nbsp;&nbsp; Perfil dos Usuários</legend>";
print "<br><table><tr><td>Podem ser usados perfis para criar grupos de usuários que têm os mesmos direitos básicos. Um perfil<br>predomina todos os usuário-colocação debaixo dos que você vê na tabela. Não serão predominadas contas de Administradores.</td></tr></table><br>";

if ($_REQUEST['submitted']) {
	ProcessProfileForm($_REQUEST['profnum'], $_REQUEST['prof_name'], $_REQUEST['CLLEVEL'], $_REQUEST['n_HIDEADDTAB'], $_REQUEST['n_HIDECUSTOMERTAB'], $_REQUEST['n_HIDECSVTAB'], $_REQUEST['n_HIDEPBTAB'], $_REQUEST['n_HIDESUMMARYTAB'], $_REQUEST['n_HIDEENTITYTAB'], $_REQUEST['n_SHOWDELETEDVIEWOPTION'], $_REQUEST['dailymail'], $_REQUEST['ENTITYADDFORM'], $_REQUEST['ENTITYEDITFORM'],$_REQUEST['n_LIMITTOCUSTOMERS']);
}

if ($_REQUEST['dprof']) {

	DeleteProfile($_REQUEST['dprof']);

} elseif (is_numeric($_REQUEST['profnum'])) {

	$_REQUEST['EditProfile'] = $_REQUEST['profnum'];

	ProfileForm($_REQUEST['EditProfile']);

} else {

	ProfileForm($_REQUEST['EditProfile']);
}


print "</fieldset>";
print "</td></tr></table>";
EndHTML();

