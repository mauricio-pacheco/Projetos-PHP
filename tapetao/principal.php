<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
<title>Tapetão</title>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','180'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/barra.png" /></td>
  </tr>
</table>
<table background="imagens/bggeral.gif" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="imagens/faixahorario.png" /></td>
      </tr>
    </table>
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="20%" align="left" valign="top"><?php
	include('databaseConnection.php');
	
	$action = $_POST['action'];
	
	switch($action) {
		case 'login':
			// Login.
			$username = stripslashes(trim($_POST['username']));
			$password = sha1(stripslashes(trim($_POST['password'])));
			
			if(empty($username) || empty($password)) {
				// Stop, someone tried entering nothing into here.
				// Show an error.
				$loginMsg = 'You must enter a username and password';
			} else {
				// The input seems to be ok, check it against the database.
				$checkDetails = mysql_query("SELECT id FROM user WHERE username='$username' AND password='$password' LIMIT 1", $conn);
				if($checkDetails) {
					if(mysql_num_rows($checkDetails) > 0) {
						setcookie('nodstrumCalendarV2', '1', time()+3600);	// Cookie will expire in 1 hour.
						// $loginMsg = '<span style="color: green">You are logged in<i>!</i></span>';
					} else {
						$loginMsg = '<br><br>O seu Usuário ou a Senha estão incorretos';
					}
				} else {
					$loginMsg = '<br><br>Ouve um erro';
				}
			}
			break;
		case 'logout':
			setcookie('nodstrumCalendarV2', '0', time()-3600000);
			header('location: principal.php');
			break;
		case 'updatePassword':
			$pass1 = sha1($_POST['password1']);
			$pass2 = sha1($_POST['password2']);
			
			if($pass1 == $pass2) {
				$updatePassword = mysql_query("UPDATE user SET password='$pass1' WHERE username='admin' LIMIT 1", $conn);
				if($updatePassword) {
					$loginMsg = '<span style="color: green">Your password has been changed :)</span>';
				} else {
					$loginMsg = 'There was an error updating your password.';
				}
			} else {
				$loginMsg = 'Your passwords did not match, please try again.';
			}
			
			break;
		case 'updateColours':
			$dc = $_POST['dayColor'];
			$wc = $_POST['weekendColor'];
			$tc = $_POST['todayColor'];
			$ec = $_POST['eventColor'];
			$ic1 = $_POST['iteratorColor1'];
			$ic2 = $_POST['iteratorColor2'];
			
			$updateColours = mysql_query("UPDATE settings SET dayColor='$dc', weekendColor='$wc', todayColor='$tc', eventColor='$ec', iteratorColor1='$ic1', iteratorColor2='$ic2' WHERE id='1' LIMIT 1", $conn);
			
			if($updateColours) {
				$loginMsg = '<span style="color: green">Your colours have been updated :)</span>';
			} else {
				$loginMsg = 'There was a problem updating the colours';
			}
			
			break;
	}
	
	include('settings.php');
?>

<script src="js/lib/prototype.js" type="text/javascript"></script>
<script src="js/src/scriptaculous.js" type="text/javascript"></script>

<style>
	body {
		font-family: Tahoma;
		font-size: 12px;
	}
	
	.calendarBox {
		position: relative;
		top: 16px;
		margin: 0 auto;
		padding: 5px;
		width: 254px;
		border: 0px solid #000;
	}

	.calendarFloat {
		float: left;
		width: 31px;
		height: 25px;
		margin: 1px 0px 0px 1px;
		padding: 1px;
		border: 1px solid #000;
	}
</style>

<script type="text/javascript">
	function highlightCalendarCell(element) {
		$(element).style.border = '1px solid #999999';
	}

	function resetCalendarCell(element) {
		$(element).style.border = '1px solid #000000';
	}
	
	function startCalendar(month, year) {
		new Ajax.Updater('calendarInternal', 'rpc.php', {method: 'post', postBody: 'action=startCalendar&month='+month+'&year='+year+''});
	}
	
	function showEventForm(day) {
		$('evtDay').value = day;
		$('evtMonth').value = $F('ccMonth');
		$('evtYear').value = $F('ccYear');
		
		displayEvents(day, $F('ccMonth'), $F('ccYear'));
		
		if(Element.visible('addEventForm')) {
			// do nothing.
		} else {
			Element.show('addEventForm');
		}
	}
	
	function displayEvents(day, month, year) {
		new Ajax.Updater('eventList', 'rpc.php', {method: 'post', postBody: 'action=listEvents&&d='+day+'&m='+month+'&y='+year+''});
		if(Element.visible('eventList')) {
			// do nothing, its already visble.
		} else {
			setTimeout("Element.show('eventList')", 300);
		}
	}
	
	function addEvent(day, month, year, body) {
		if(day && month && year && body) {
			// alert('Add Event\nDay: '+day+'\nMonth: '+month+'\nYear: '+year+'\nBody: '+body);
			new Ajax.Request('rpc.php', {method: 'post', postBody: 'action=addEvent&d='+day+'&m='+month+'&y='+year+'&body='+body+'', onSuccess: highlightEvent(day)});
			$('evtBody').value = '';
		} else {
			alert('There was an unexpected script error.\nPlease ensure that you have not altered parts of it.');
		}
		
		// highlightEvent(day);
	} // addEvent.
	
	function highlightEvent(day) {
		Element.hide('addEventForm');
		$('calendarDay_'+day+'').style.background = '#<?= $eventColor ?>';
	}
	
	function showLoginBox() {
		Element.show('loginBox');
	}
	
	function showCP() {
		Element.show('cpBox');
	}
	
	function deleteEvent(eid) {
		confirmation = confirm('Você tem certeza que deseja apagar este evento ?\n');
		if(confirmation == true) {
			new Ajax.Request('rpc.php', {method: 'post', postBody: 'action=deleteEvent&eid='+eid+'', onSuccess: Element.hide('event_'+eid+'')});
		} else {
			// Do not delete it!.
		}
	}
</script>
	<div id="calendar" class="calendarBox">
		<div id="calendarInternal">
			&nbsp;
		</div>
			<script type="text/javascript">
		startCalendar(0,0);
	</script></td>
              <td width="6%" valign="top">&nbsp;</td>
              <td width="74%" valign="top" style="background-image:url(imagens/fundoagenda.png); background-repeat:repeat-x">
		<br style="clear: both;">
		<span id="LoginMessageBox" style="color: red; margin-top: 0px;"><?= $loginMsg; ?></span>
		<div id="eventList" style="display: none;"></div>
		<div style="display: none; margin-top: 10px;" id="addEventForm">
			<b>Adicionar Evento</b>
			<br><BR />
			Data: <input type="text" size="2" id="evtDay" disabled class="manchete_texto9"> <input type="text" size="2" id="evtMonth" disabled class="manchete_texto9"> <input type="text" size="4" id="evtYear" disabled class="manchete_texto9">
			<br>
			<textarea id="evtBody" cols="110" rows="5" class="manchete_texto9">00:00 ás 00:00 - </textarea>
			<br>
			<input type="button" value="Adicionar Evento" onClick="addEvent($F('evtDay'), $F('evtMonth'), $F('evtYear'), $F('evtBody'));" class="manchete_texto9">
			<a href="#" onClick="Element.hide('addEventForm');" class="manchete_texto9">FECHAR FORMULÁRIO</a>
		</div>	
		<div style="display: none; margin-top: 10px;" id="loginBox">
			<br><br><b>ADMINISTRADOR</b>
			<br>
			<form action="principal.php" method="post">
				Usuário: <input type="text" name="username" size="20" class="manchete_texto9">
				<br>
				Senha: <input type="password" name="password" size="20" class="manchete_texto9">
				<br>
				<input type="hidden" name="action" value="login" class="manchete_texto9">
				<input type="submit" value="Entrar" class="manchete_texto9">
				<a href="#" onClick="Element.hide('loginBox');" class="manchete_texto9">FECHAR FORMULÁRIO</a>
			</form>
		</div>
		
		<div style="display: none; margin-top: 10px;" id="cpBox">
			 <a href="#" onClick="Element.hide('cpBox');">Fechar</a>
			<br><br>
			<b>Change the colours</b>
			<br>
			<form action="principal.php" method="post">
				Day Colour: <input type="text" name="dayColor" size="6" maxlength="6" value="<?= $dayColor; ?>">
				<br>
				Weekend Colour: <input type="text" name="weekendColor" size="6" maxlength="6" value="<?= $weekendColor; ?>">
				<br>
				Today Colour: <input type="text" name="todayColor" size="6" maxlength="6" value="<?= $todayColor; ?>">
				<br>
				Event Colour: <input type="text" name="eventColor" size="6" maxlength="6" value="<?= $eventColor; ?>">
				<br>
				Iterator 1 Colour: <input type="text" name="iteratorColor1" size="6" maxlength="6" value="<?= $iteratorColor2; ?>">
				<br>
				Iterator 2 Colour: <input type="text" name="iteratorColor2" size="6" maxlength="6" value="<?= $iteratorColor1; ?>">
				<br>
				<input type="hidden" name="action" value="updateColours">
				<input type="submit" value="Update Colours">
			</form>
			
			<br>
			<form action="principal.php" method="post">
				<input type="hidden" name="action" value="updatePassword">
				<b>Change your password</b>
				<br>
				New Password: <input type="password" name="password1" size="20">
				<br>
				Confirm it: <input type="password" name="password2" size="20">
				<br>
				<input type="submit" value="Update Password">
			</form>
				
			<br><br>
			<b>Logout</b>
			<form action="principal.php" method="post">
				<input type="hidden" name="action" value="logout">
				<input type="submit" value="logout">
			</form>
		</div>		<!-- FINAL DIV DO NOT REMOVE --></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="34" /></td>
        </tr>
    </table>
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="38%" valign="top"><table class="boxSombra" width="98%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/faixanot.png" width="358" height="31" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                          </tr>
                        </table>                          <strong>23<BR />
                        <span class="manchete_textocasab3">MAI</span></strong></td>
                        <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                          </tr>
                        </table>
                          <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><BR />
                              <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                            </tr>
                          </table>
                            <strong>24<br />
                              <span class="manchete_textocasab3">MAI</span></strong></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><br />
                                  <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                            </tr>
                          </table>
                            <strong>25<br />
                              <span class="manchete_textocasab3">MAI</span></strong></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><br />
                                  <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      
                      
                      
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                            </tr>
                          </table>
                            <strong>26<br />
                              <span class="manchete_textocasab3">MAI</span></strong></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><br />
                                  <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      
                      
                      
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                            </tr>
                          </table>
                            <strong>27<br />
                              <span class="manchete_textocasab3">MAI</span></strong></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><br />
                                  <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      
                      
                      
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                            </tr>
                          </table>
                            <strong>28<br />
                              <span class="manchete_textocasab3">MAI</span></strong></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><br />
                                  <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" valign="top" background="imagens/verde.png" class="manchete_textocasab2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                            </tr>
                          </table>
                            <strong>29<br />
                              <span class="manchete_textocasab3">MAI</span></strong></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>PREÇOS PROMOCIONAIS</strong><br />
                                  <span class="manchete_textocasab4">Novos preços dos horários na semana...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            </td>
                        </tr>
                      </table>
                      <a href="index.php"><img src="imagens/todasnov.png" width="358" height="31" border="0" /></a>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                        </tr>
                </table>
                </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
          <td width="38%" valign="top"><table class="boxSombra" width="98%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/faixagaleria.png" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="17%" align="center" background="imagens/bg.gif" class="manchete_textocasab2"><table width="120" height="93" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><img src="imagens/futebol.jpg" width="110" height="83" /></td>
                          </tr>
                        </table></td>
                        <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                          </tr>
                        </table>
                          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="top" class="manchete_texto"><strong>INAUGURAÇÃO</strong><br />
                                <span class="manchete_textocasab4">Fotos da Inauguração da nova quadra...</span></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="top" class="manchete_texto"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="7%"><img src="imagens/camera.png" width="29" height="24" /></td>
                                  <td width="93%" class="manchete_texto9">&nbsp;&nbsp;43 Fotos</td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" background="imagens/bg.gif" class="manchete_textocasab2"><table width="120" height="93" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center"><img src="imagens/futebol.jpg" width="110" height="83" /></td>
                            </tr>
                          </table></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>INAUGURAÇÃO</strong><br />
                                  <span class="manchete_textocasab4">Fotos da Inauguração da nova quadra...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="7%"><img src="imagens/camera.png" width="29" height="24" /></td>
                                    <td width="93%" class="manchete_texto9">&nbsp;&nbsp;43 Fotos</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" background="imagens/bg.gif" class="manchete_textocasab2"><table width="120" height="93" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center"><img src="imagens/futebol.jpg" width="110" height="83" /></td>
                            </tr>
                          </table></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>INAUGURAÇÃO</strong><br />
                                  <span class="manchete_textocasab4">Fotos da Inauguração da nova quadra...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="7%"><img src="imagens/camera.png" width="29" height="24" /></td>
                                    <td width="93%" class="manchete_texto9">&nbsp;&nbsp;43 Fotos</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" background="imagens/bg.gif" class="manchete_textocasab2"><table width="120" height="93" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center"><img src="imagens/futebol.jpg" width="110" height="83" /></td>
                            </tr>
                          </table></td>
                          <td width="83%" valign="top" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><strong>INAUGURAÇÃO</strong><br />
                                  <span class="manchete_textocasab4">Fotos da Inauguração da nova quadra...</span></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="manchete_texto"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="7%"><img src="imagens/camera.png" width="29" height="24" /></td>
                                    <td width="93%" class="manchete_texto9">&nbsp;&nbsp;43 Fotos</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <a href="index.php"><img src="imagens/nottodas.png" width="358" height="31" border="0" /></a>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        <td><img src="imagens/branco.gif" width="2" height="6" /></td>
                      </tr>
        </table></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
          <td width="24%" valign="top"><table class="boxSombra" height="110" width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/faixa.png" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="manchete_textocasa">Cadatre-se e receba novidades.</td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="81%"><span class="manchete_texto9">Nome:</span>                      <input name="nome" size="28" type="text" class="manchete_textocasa" /></td>
                  </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                     <td width="82%"><span class="manchete_texto9">E-mail:</span>                       <input name="textfield2" type="text" class="manchete_textocasa" id="textfield2" />
                      <input name="button" type="submit" class="manchete_textocasa" id="button" value="ok" /></td>
                  </tr>
                </table></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="10" /></td>
              </tr>
          </table>
            <table width="100%" class="boxSombra" height="60" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/faixahora.png" width="230" height="31" /></td>
                  </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center"><SCRIPT src="classes/relogio.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/relogio.swf','230','56'); 
    </SCRIPT></td>
                    </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                </td>
              </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="10" /></td>
              </tr>
          </table>
            <table width="100%" class="boxSombra" height="60" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/faixaapoia.png" width="230" height="31" /></td>
                  </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="8" /></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center"><img src="imagens/mercado.png" width="155" height="119" /></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="2" height="8" /></td>
                    </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
    </table>
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="6" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/barrabaixo.png" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="358" class="manchete_textocasab">Avenida São Paulo ,1079<br />
      Frederico Westphalen– RS<br />
    CEP: 98400-000</td>
    <td width="417"><p class="manchete_textocasab">Horário de Funcionamento:<br /><span class="manchete_textocasab">2ª à 6ª das 8:00h às 12:00h e das 14:00h à 1:00h <br />
        Sábado das 10:00 h às 18:00 h </span><br />
    </p></td>
    <td width="203"><span class="manchete_textocasab">&copy; Tapetão. Todos os direitos reservados.<br />Desenvolvimento: <a href="http://www.casadaweb.net" target="_blank" class="manchete_textocasab">Casa da Web<span class="manchete_texto989">
      <br /><?php

class visita
{
    /*
     * variaveis
     **/
     
    //Dados necessarios para verificacao  de visitantes
    var $ip; //armazena o ip do usuario
    var $data; //armazena a data atual

    //Dados necessarios para conexao com db    
    var $hostdb = "localhost";
    var $userdb = "tapete";
    var $passdb = "ta2012";
    var $namedb = "tapetao";

    //Nome da tabela
    var $tabVisitas = "cw_visitas";
    
    /*
     * construtor
     **/
    function visita($ip)
    {
        //armazena na variavel 'ip' o ip do visitante atual
        $this->ip=$ip;
        //Pega a data atual
        $this->data=date("d/m/Y");
    }
        
    /*
     * conexao com banco
     **/
    function conectar()
    {
        $link= mysql_connect($this->hostdb,$this->userdb,$this->passdb)or die(mysql_error());
        mysql_select_db($this->namedb,$link)or die(mysql_error());
    }    

    
    /*
     * verifica se o usuario ja visitou
     **/

    /*
     * imprime numero de visitas
     **/
    function imprime()
    {
        //Chama conexao;
        $this->conectar();
        //Seleciona todos
        $sql = mysql_query("SELECT * FROM ".$this->tabVisitas);
        //Conta quantos foram selecionados
        $total= mysql_num_rows($sql);
        //Imprime numero de visitas (registros na tabela)
        print("Você é nosso visitante Nº: <font color='#FDF700'>".$total);
		echo ("</font>");
    }
}
//'Chama' a classe visita e ja pega o ip do visitante
$visita = new visita($_SERVER['REMOTE_ADDR']);
//Chama a funcao verificaVisitante(); 
//Ela verifica se por ip e data se o usuario ja visitou
//Imprime o total de visitas (total de registros na tabela)
$visita->imprime();
?>
    </span></a></span></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
</body>
</html>