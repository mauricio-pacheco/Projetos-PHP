<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Administra&ccedil;&atilde;o - Angratel</title>
</head>

<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

include "acesso.php";
if ( $contagem == 1 ) {
echo "<font face='Verdana' size='1'>Já Logado. Espere</font>";
include "button.php";
echo "<META HTTP-EQUIV=\"Refresh\" content=\"2;URL=xalbumcontrol.php\">";
} else {
?>
<body bgcolor="#FFFFFF">
<p align="center">&nbsp;</p>
<p align="center"><font size=1 face=verdana> Atenção, se apareçer algum erro acima é porque você ainda não tem o cookie da senha e login do seu computador.</font></p>

<form method="POST" action="confirmaloginprincipal.php"><center><table border="2" cellpadding="0" width="300" bordercolor="#FFFFFF">
  <tr>
    <td width="292" colspan="3"><font size="2" face="Verdana">&nbsp;&#9643;
      Digite o nome do usuário e a senha</font></td>
  </tr>
  <tr>
    <td width="32">
      <p align="center">&nbsp;</p>
    </td>
    <td width="65"><font face="Verdana" size="1">Login:</font></td>
    <td width="187">
      <p align="center"><input type="text" name="campologin" size="20"></p>
    </td>
  </tr>
  <tr>
    <td width="32">
      <p align="center">&nbsp;</p>
    </td>
    <td width="65"><font face="Verdana" size="1">Senha</font></td>
    <td width="187">
      <p align="center"><input type="password" name="camposenha" size="20"></p>
    </td>
  </tr>
  <tr>
    <td width="284" colspan="3">
      <p align="center"><input type="submit" value="Login" name="botao" style="background-color: #F5F5F5; border: 1 solid #A6E900"></p>
    </td>
  </tr>
</table></center>
</form>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p>
</body>

</html>
<?
}

// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>


