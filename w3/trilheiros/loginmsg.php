<?php include("cabecalho.php"); ?>
<style type="text/css">
<!--
.style20 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style9 {color: #FFFFFF}
.style17 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style24 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style25 {font-size: 10px; color: #FFFFFF;}
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
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="756" 
                  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#282828">
                        <tbody>
                          <tr>
                            <td valign="top" align="left"><div align="center">
                                <p><br />
                                    <script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.email.value=="") {
alert("O Campo E-mail não está preenchido!")
form1.email.focus();
return false
}

if (document.form1.senha.value=="") {
alert("O Campo Senha não está preenchido!")
form1.senha.focus();
return false
}

}

                        </script>
                                    <span class="style20"><img src="home_arquivos/logotrilha.jpg" width="121" height="120" /></span></p>
                              <form action="autentica.php" method="post" name="form1" id="form1" onsubmit="return validar(this)">
                                  <p><span class="style17"><font color="#ffffff">Para o envio de mensagens e visualiza&ccedil;&atilde;o das mesmas &eacute; necess&aacute;rio ser integrante da associa&ccedil;&atilde;o.</font></span></p>
                                  <p class="style24"><span class="style25">Digite abaixo seus dados de identifica&ccedil;&atilde;o para acesso ao sistema.</span></p>
                                  <p><span class="style17"><font color="#ffffff">* Campos Obrigat&oacute;rios</font></span></p>
                                  <table width="242" border="0">
                                    <tr>
                                      <td width="47"><span class="style20"><span class="style9">E-mail: </span></span></td>
                                      <td width="243"><span class="style20">
                                        <input name="email" type="text" class="caixacontato" size="30" />
                                        <span class="style9"> *</span></span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="style20"><span class="style9">Senha:</span></span></td>
                                      <td><span class="style20">
                                        <input name="senha" type="password" class="caixacontato" size="16" />
                                      </span> <span class="style20"> <span class="style9"> *
                                    <?php

include "conexao.php";

$dataservidor = date('d/m') ;

$sql = mysql_query("SELECT * FROM integrantes WHERE nascimento = '$dataservidor' ORDER BY id DESC LIMIT 1");
$contar = mysql_num_rows($sql); 

if ($contar >= 1) 
   {
   while($a = mysql_fetch_array($sql))
   {
       ?> <input type="hidden" name="idrecebedor" value="<?php echo $a["id"]; ?>" /><?php } } ?>
                                      </span></span></td>
                                    </tr>
                                  </table>
                                <p align="center" class="style20">
                                    <input type="submit" class="texto" value="Entrar" />
                                  &nbsp;&nbsp;
                                    <input class="texto" type="reset" value="Limpar" />
                                  </p>
                              </form>
                            </div></td>
                          </tr>
                        </tbody>
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
