<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Configura��es</title>
</head>
<?php
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodu��o ou manipula��o.
// [-http://www.brunoalencar.com-]
include "acesso.php";
if ( $contagem == 1 ) {
include "../config.php";
$sql = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo = mysql_fetch_array($sql)) {
?>
<body bgcolor="#f5f5f5" topmargin="0" leftmargin="0">
<p align="center"><font face="Verdana" size="3"><b>Controle de Palavr�es</b></font><BR>
<font face="Verdana" size="1">Essa op��o serve para pessoas n�o usarem palavr�es nos coment�rio publico. Se encontrada,<Br>os palavr�es s�o automaticamente substituidos por [***].<Br><br>
O ativamento e o desativamento de qualquer op��o � feita na se��o "Configura��es" do menu.<br>
<u>Aten��o para essa op��o funcionar o fun��o de comentarios publicos dever� est� ativa.</u><Br>
A op��o de Coment�rios Publicos est�: <? if($campo[14] == 'Ativo') { echo "<b>Ativado</b>."; } else { echo "<B>Desativado</b>."; } ?> e do Controle de Palavr�o est�: <? if($campo[12] == 'Ativo') { echo "<b>Ativado</b>."; } else { echo "<B>Desativado</b>."; } ?><Br>
</p></font>
<center><font face='Verdana' size='2'><B>Listagem de Palavr�es Cadastrados:</b><Br></font></center>
<?


$x = implode('',file('../palavrao.txt'));
   echo "<center><font face='Verdana' size='2'>$x<Br></font></center>";

}
?>
<form method="POST" action="acao.php?acao=adicionarpalavrao">
  <font face='Verdana' size='2'><center><p>Adicionar Palavr�o: <input type="text" name="campopalavrao" size="10">&nbsp;&nbsp;<input type="submit" value="Adicionar" name="B1" style="background-color: #F5F5F5; border: 1 solid #A6E900"></p></center></font>
</form>

<?
include "button.php";
  } else {
echo "Voc� n�o est� logado.<a href=index.php>Logar</a>";
  include "button.php";
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodu��o ou manipula��o.
// [-http://www.brunoalencar.com-]
?>
</body>
</html>
