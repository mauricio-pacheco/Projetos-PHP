<?php require("verificacao.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<?php include("cabecalho.php"); ?>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<style type="text/css">
<!--
.style20 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style9 {color: #FFFFFF}
.style24 {color: #F0D200}
.style27 {color: #00FF00}
.style19 {color: #FFFFFF; font-size: 14px; }
-->
</style>
<?php include("aniversario.php"); ?>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
                  <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"><div align="center"><img src="home_arquivos/aniver.jpg" width="280" height="30" /></div></TD>
              </TR>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="98%" border="0" align="right">
                        <tr>
                          <td><div align="center">
                            <p>
                              <script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.assunto.value=="") {
alert("O Campo Título da Mensagem não está preenchido!")
form1.assunto.focus();
return false
}


}

                            </script>
                              </p>
                            <p>&nbsp;</p>
                            <p><img src="home_arquivos/logotrilha.jpg" width="121" height="120" /></p>
                            <p><span class="style19">
                              <?
include "conexao.php";

$autor = $_POST["autor"];
$idusuario = $_POST["idusuario"];
$nomeusuario = $_POST["nomeusuario"];
$uemail = $_POST["uemail"];
$fotousuario = $_POST["fotousuario"];
$idrecebedor = $_POST["idrecebedor"];
$titulo = $_POST["titulo"];
$texto = $_POST["texto"];
$data = date ("j/m/Y");
$ano = date ("Y");
$hora = date ("H:i:s");


$sql = "INSERT INTO mensagens (autor, idusuario, nomeusuario, uemail, fotousuario, idrecebedor, titulo, texto, data, hora, ano) VALUES ('$autor', '$idusuario', '$nomeusuario', '$uemail', '$fotousuario', '$idrecebedor', '$titulo', '$texto', '$data', '$hora', '$ano')";
if(mysql_query($sql)) {
echo "<div align=center><br><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">A sua Mensagem foi enviada com sucesso!!</font></div>";
}else{
echo "<div align=center><br><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel enviar o sua mensagem!</font></div>";
}
 
?>
                            </span></p>
                            </div></td>
                        </tr>
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
