<?php
ob_start();
?>
<?php include("meta.php"); ?>

<body>
<?php include("cima.php"); ?>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td width="604"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="18%"><img src="imagens/agenda.png" width="160" height="30" /></td>
            <td width="82%"><img src="imagens/marcav.png" /></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td valign="top">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
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
			header('location: agenda.php');
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
		top: 2px;
		margin: 0 auto;
		padding: 5px;
		width: 554px;
		border: 0px solid #000;
	}

	.calendarFloat {
		float: left;
		width: 71px;
		height: 65px;
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
                    <div id="calendarInternal"> &nbsp; </div>
                    <script type="text/javascript">
		startCalendar(0,0);
	            </script></td>
                  <td width="6%" valign="top">&nbsp;</td>
                  <td width="74%" class="fonterodape" valign="top" style="background-image:url(imagens/fundoagenda.png); background-repeat:repeat-x"><br style="clear: both;" />
                    <span id="LoginMessageBox" style="color: red; margin-top: 0px;">
                      <?= $loginMsg; ?>
                      </span>
                    <div id="eventList" style="display: none;"></div>
                    <div style="display: none; margin-top: 10px;" id="addEventForm"> <b>Adicionar Evento</b> <br />
                      <br />
                      Data:
                      <input type="text" size="2" id="evtDay" disabled="disabled" class="manchete_texto9" />
                      <input type="text" size="2" id="evtMonth" disabled="disabled" class="manchete_texto9" />
                      <input type="text" size="4" id="evtYear" disabled="disabled" class="manchete_texto9" />
                      <br />
                      <textarea name="evtBody" cols="70" rows="5" class="manchete_texto9" id="evtBody">00:00 ás 00:00 - </textarea>
                      <br />
                      <input type="button" value="Adicionar Evento" onClick="addEvent($F('evtDay'), $F('evtMonth'), $F('evtYear'), $F('evtBody'));" class="manchete_texto9" />
                      <a href="#" onClick="Element.hide('addEventForm');" class="fontetabela">FECHAR FORMULÁRIO</a> - <a href="sair.php" class="fontetabela">SAIR DO SISTEMA</a> </div>
                    <div style="display: none; margin-top: 10px;" id="loginBox"> <br />
                      <br />
                      <b>ADMINISTRADOR</b> <br />
                      <form action="agenda.php" method="post">
                        Usuário:
                        <input type="text" name="username" size="20" class="manchete_texto9" />
                        <br />
                        Senha:
                        <input type="password" name="password" size="20" class="manchete_texto9" />
                        <br />
                        <input type="hidden" name="action" value="login" class="manchete_texto9" />
                        <input type="submit" value="Entrar" class="manchete_texto9" />
                        <a href="#" onClick="Element.hide('loginBox');" class="fontetabela">FECHAR FORMULÁRIO</a>
                      </form>
                    </div>
                    <div style="display: none; margin-top: 10px;" id="cpBox"> <a href="#" onClick="Element.hide('cpBox');">Fechar</a> <br />
                      <br />
                      <b>Change the colours</b> <br />
                      <form action="agenda.php" method="post">
                        Day Colour:
                        <input type="text" name="dayColor" size="6" maxlength="6" value="<?= $dayColor; ?>" />
                        <br />
                        Weekend Colour:
                        <input type="text" name="weekendColor" size="6" maxlength="6" value="<?= $weekendColor; ?>" />
                        <br />
                        Today Colour:
                        <input type="text" name="todayColor" size="6" maxlength="6" value="<?= $todayColor; ?>" />
                        <br />
                        Event Colour:
                        <input type="text" name="eventColor" size="6" maxlength="6" value="<?= $eventColor; ?>" />
                        <br />
                        Iterator 1 Colour:
                        <input type="text" name="iteratorColor1" size="6" maxlength="6" value="<?= $iteratorColor2; ?>" />
                        <br />
                        Iterator 2 Colour:
                        <input type="text" name="iteratorColor2" size="6" maxlength="6" value="<?= $iteratorColor1; ?>" />
                        <br />
                        <input type="hidden" name="action" value="updateColours" />
                        <input type="submit" value="Update Colours" />
                      </form>
                      <br />
                      <form action="agenda.php" method="post">
                        <input type="hidden" name="action" value="updatePassword" />
                        <b>Change your password</b> <br />
                        New Password:
                        <input type="password" name="password1" size="20" />
                        <br />
                        Confirm it:
                        <input type="password" name="password2" size="20" />
                        <br />
                        <input type="submit" value="Update Password" />
                      </form>
                      <br />
                      <br />
                      <b>Logout</b>
                      <form action="principal.php" method="post">
                        <input type="hidden" name="action" value="logout" />
                        <input type="submit" value="logout" />
                      </form>
                    </div>
                    <!-- FINAL DIV DO NOT REMOVE --></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td class="fontemenu3">&nbsp;</td>
            </tr>
        </table></td>
        </tr>
  </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="6" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>