<?php require("verificacao.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<?php include("cabecalho.php"); ?>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<style type="text/css">
<!--
.style28 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style29 {color: #F0D200}
.style30 {color: #00FF00}
-->
</style>
<?php include("aniversario.php"); ?>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"><div align="center"><img src="home_arquivos/enviadas.jpg" width="280" height="30" /></div></TD>
              </TR>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"><div align="center"></div></TD>
              </TR>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left>
                        <table width="100%" border="0">
                          <?php

include "conexao.php";

$id = $_GET['id'];
$anoatual = date ("Y");

$sql = mysql_query("SELECT * FROM mensagens WHERE ano = '$anoatual' ORDER BY id");
$contar = mysql_num_rows($sql); 


while($s = mysql_fetch_array($sql))
   {
   ?>
                          <tr>
                            <td><table width="100%" border="0">
                              <tr>
                                <td width="5%"><span class="style30"><img src="integrantes/<?php echo $s["fotousuario"]; ?>" /></span></td>
                                <td width="95%"><table width="100%" border="0">
                                  <?php

$logado = $_COOKIE['email'];
$logado2 = $_COOKIE['senha'];
$logado3 = $_COOKIE['idrecebedor'];
$logado4 = $s["uemail"];


if ($logado == $logado4) {
 
       ?>
								 <tr>
                                    <td><a href="apagarmsg.php?id=<?php echo $s["id"]; ?>" onClick="return confirm('Tem certeza que deseja apagar a mensagem <?php echo $s["titulo"]; ?> ?')"><span class="style28"><img src="home_arquivos/apagar.gif" width="15" height="15" border="0" /> APAGAR MENSAGEM</span></a></td>
                                  </tr><?php  } else { }?>
                                  <tr>
                                    <td><span class="style28"><span class="style29">Autor:</span> <span class="style30"><?php echo $s["nomeusuario"]; ?></span></span></td>
                                  </tr>
                                  <tr>
                                    <td><span class="style28"><span class="style29">Titulo da Mensagem:</span> <span class="style30"><?php echo $s["titulo"]; ?></span></span></td>
                                  </tr>
                                  <tr>
                                    <td><div align="justify"><span class="style28"><?php echo $s["texto"]; ?></span></div></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr> <?php  } ?>
                        </table>                        </TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
