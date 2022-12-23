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
                          <td><script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.assunto.value=="") {
alert("O Campo Título da Mensagem não está preenchido!")
form1.assunto.focus();
return false
}


}

                      </script>
                      					  <?php $solicita = $_COOKIE['idrecebedor']; ?>
					  <?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM integrantes WHERE id='$solicita' ORDER BY id");
$contar = mysql_num_rows($sql); 


while($n = mysql_fetch_array($sql))
   {
   ?>
                              <form action="cadmensagem.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
                                <table width="100%" border="0">
                                                                     <tr>
                                                                       <td>&nbsp;</td>
                                                                       <td>&nbsp;</td>
                                                                     </tr>
                                                                     <tr>
                                    <td width="129"><span class="style20"><span class="style9">Mensagem: </span></span></td>
                                    <td width="596"><span class="style20 style9">
                                                                            <input type="hidden" name="idrecebedor" value="<?php echo $n["id"]; ?>" />
                                      <?php

include "conexao.php";

$mailid = $_COOKIE['email'];

$sql = mysql_query("SELECT * FROM integrantes WHERE email='$mailid' ORDER BY id");
$contar = mysql_num_rows($sql); 


while($y = mysql_fetch_array($sql))
   {
   ?>
                                      <span class="style27"><?php echo $y["nome"]; ?><input type="hidden" name="idusuario" value="<?php echo $y["id"]; ?>" /><input type="hidden" name="nomeusuario" value="<?php echo $y["nome"]; ?>" /><input type="hidden" name="uemail" value="<?php echo $y["email"]; ?>" /><input type="hidden" name="fotousuario" value="<?php echo $y["foto"]; ?>" /><input type="hidden" name="autor" value="<?php echo $y["nome"]; ?>" /></span>
                                      <?php } ?> 
                                      para o aniversariante <span class="style24"><?php echo $n["nome"]; ?></span></span></td>
                                  </tr>
                                  
                                          <tr>
                                    <td width="129"><span class="style20"><span class="style9">T&iacute;tulo da Mensagem: </span></span></td>
                                    <td width="596"><span class="style20">
                                      <input name="titulo" type="text" class="caixacontato" size="60" />
                                      <span class="style9">*</span> </span></td>
                                  </tr>
                                                                 </table>
                                <?php
									$editor = new FCKeditor("texto");
									$editor->BasePath = "fckeditor/";
									$editor->Value = "";
									$editor->Width = "700";
									$editor->Height = "360";
									$editor->Create();
									?>
                                <p align="center" class="style20">
                                  <input type="submit" class="texto" value="Enviar Mensagem" />
                                  &nbsp;&nbsp;
                                  <input class="texto" type="reset" value="Limpar" />
                                </p>
                              </form></td>
                        </tr><?
  }

 ?>
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
