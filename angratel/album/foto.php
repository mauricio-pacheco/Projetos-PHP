<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<LINK href="../angratel_arquivos/style.css" type=text/css rel=StyleSheet>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Foto</title>
<script src="js/viewpics.js" language="JavaScript"></script>
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "config.php";
$sql3 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo3 = mysql_fetch_array($sql3)) {
$corcomentariopub = $campo3[13];
?>
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" link="#000000" vlink="#000000" alink="#000000">
<?
$fotonumero = $_GET["foto"];
$id = $fotonumero;
if (!$fotonumero) {
die("Parâmetros da foto não foram passados");
exit;
} else {

$sql = mysql_query("SELECT * FROM `$tabela3` WHERE id = '$fotonumero'", $db3);
while($campo2 = mysql_fetch_array($sql)) {
$data = date("d/m/Y");
$comentario = nl2br($campo2[4]);
$link = "fotos/$campo2[3]";
$tamanhoImagem = getImageSize($link);
$tamanholargura = $tamanhoImagem[0] + 4;
$tamanhoaltura = $tamanhoImagem[1] + 4;
echo "<p align='center'><br><br><font face='Verdana' size='1' color='$campo3[8]'>$campo2[1]</font></p><p align='center' style='word-spacing: 0; margin-top: 0; margin-bottom: 0'><img border='0' src='fotos/$campo2[3]'></p><p align='left' style='word-spacing: 1; margin-top: 1; margin-bottom: 1'>";
if($campo3[15] == 'Ativo') {
echo "<a href=\"javascript:showPic('fotos/".$campo2[3]."',':: ".$campo2[1]." ::',".$tamanholargura .','. $tamanhoaltura.",'#cccccc','#cccccc');\"><img src='img/icon_ampliar.jpg' border='0'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
echo "<br><p align='left' style='word-spacing: 1; margin-top: 1; margin-bottom: 1'><font face='Verdana' size='1' color='$campo3[10]'>$comentario</font></p><br>";
$sql3 = mysql_query("SELECT * FROM `$tabelacoments` WHERE idcoments = '$fotonumero'", $db3);
$n4 = mysql_num_rows($sql3);
echo "<center><table border='0' cellpadding='0' width='200'>    <tr>      <td width='292' colspan='2'></td>    </tr>  </table></center>";
while($campo = mysql_fetch_array($sql3)) {
$n4 = mysql_num_rows($sql3);
$data = $campo[2];
$nome = $campo[3];
$email = $campo[4];
$site = $campo[5];
$comentario = $campo[6];
$idcomentspublic = $campo[0];
?>
<font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>">(<? echo $data; ?>) 
<a href=mailto:<? echo $email; ?>><b><? echo $nome; ?></a></b> (<a href="<? echo $site; ?>" taget=_parent><b>www</b></a>): 
<? echo $comentario; ?>&nbsp;&nbsp; 
<? include "admin/acesso.php"; if ( $contagem == 1 ) { echo "<a href='admin/comentarios.php?acao=apagar&id=$idcomentspublic'><b>Apagar</b></a> - <a href='admin/comentarios.php?acao=editar&id=$idcomentspublic'><b>Editar</b></a>"; } ?>
</font><br>
<br>

<?
}
}
if($campo3[14] == 'Ativo') {
?>
<br><br><form method="POST" action="adicionarcomentario.php?id=<? echo $id; ?>">
<center><table border="0" cellpadding="0" width="270">
        <tr>
      <td width="365" colspan="2">
        <p align="center"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>"><b>Adicionar Comentário</b></p>
        </font></td>
    </tr>
    <tr>
      <td width="150"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome:</td>
      <td width="137"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>"><input type="text" name="camponome" size="10"></font></td>
    </tr>
        <tr>
      <td width="150"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:</td>
      <td width="137"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>"><input type="text" name="campoemail" size="10"></font></td>
    </tr>
        <tr>
      <td width="150"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Site/Blog/Fotolog:</td>
      <td width="137"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>"><input type="text" value"http://" name="camposite" size="10"></font></td>
    </tr>
    <tr>
      <td width="150"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comentario:</font></td>
      <td width="137"><font face="Verdana" size="1" color="#<? echo $corcomentariopub; ?>"><textarea rows="2" cols="20" name="campocomentario"></textarea></font></td>
    </tr>
    <tr>
      <td width="365" colspan="2">
        <p align="center"><font face="Verdana" size="1" color="#000000"><input type="submit" value="Mandar!" name="butao" style="background-color: #F5F5F5; border: 1 solid #A6E900"></p>
        </font></td>
    </tr>
  </table></center><Br><br>
</form>
<?
}
echo "<br>";
}
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>

</body>

</html>
