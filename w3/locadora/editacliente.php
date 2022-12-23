<?php include("acima.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>MV Video Locadora</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<STYLE type=text/css>
A:link {
	COLOR: #000000; TEXT-DECORATION: none
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #003366;
	TEXT-DECORATION: underline
}
#divDrag0 {
	LEFT: 0px; WIDTH: 40px; CLIP: rect(0px 120px 120px 0px); CURSOR: hand; POSITION: absolute; TOP: 0px; HEIGHT: 120px
}
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style24 {color: #FEDC01}
</STYLE>

<META content="MSHTML 6.00.5730.13" name=GENERATOR></HEAD>
<BODY bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>
<TABLE style="BORDER-RIGHT: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid" 
cellSpacing="0" cellPadding="0" width="760" bgColor=#ffffff 
align=center>
  <TBODY>
  <TR>
    <TD><div align="center">
        <table width="100%" border="0">
          <tr>
            <td width="64%"><img src="mv.jpg"></td>
            <td width="36%"><div align="center"><a href="sair.php"><img src="sair.jpg" width="240" height="48" border="0"></a></div></td>
          </tr>
        </table>
    </div>
      <HR align=center width="99%" color=#cccccc SIZE=1>
      <table width="100%" border="0">
        <tr>
          <td width="19%" valign=top><?php include("menu.php"); ?></td>
          <td width="81%" valign=top><table width="100%" border="0">
            <tr>
              <td>&nbsp;<font face="Verdana">Editar Cliente</font></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td>
              <script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nomecliente.value=="") {
alert("O Campo Nome do Cliente não está preenchido!")
cadastro.nomecliente.focus();
return false
}

if (document.cadastro.email.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email.focus();
return false
}

if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.telefone.focus();
return false
}

		return true;

}


</SCRIPT><form method="post" ENCTYPE="multipart/form-data" action="updatecliente.php" name="cadastro" onSubmit="return validar(this)">
<?php

include "conexao.php";

$codigo = $_GET['codigo'];

$sql = mysql_query("SELECT * FROM clientes WHERE codigo='$codigo' ORDER BY codigo");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe clientes cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
      <input name="codigo" type="hidden" value="<?php echo $n["codigo"]; ?>" />
      <table align=center width="90%">
        <tr>
          <td>&nbsp;</td>
          <td><div align="right"><span class="style2"><font size="1" face="Verdana">*</FONT> Campos Obrigat&oacute;rios&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </span></td>
        </tr>
        <tr>
          <td width="23%"><FONT face=tahoma  style=font-size:11px><b>Nome do cliente:</b></td>
          <td width="77%"><input name="nomecliente" type="text" value="<?php echo $n["nomecliente"]; ?>" size=75  style=font-size:11px;font-family:tahoma>
              <font size="1" face="Verdana">*</FONT></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>E-mail:</b></td>
          <td><FONT face=tahoma  style=font-size:11px>
              <input name="email" type="text" size=40 value="<?php echo $n["email"]; ?>" style=font-size:11px;font-family:tahoma>
            &nbsp; <font size="1" face="Verdana">*</FONT></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Cidade:</b></td>
          <td><input name="cidade" type="text" size=46 value="<?php echo $n["cidade"]; ?>" style=font-size:11px;font-family:tahoma></td>
        </tr>
        <tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Estado:</b></td>
          <td><span class="style24">
            <select name=estado style=font-size:11px;font-family:tahoma>
              <option value='RS - Rio Grande do Sul' selected=selected>RS - Rio Grande do Sul</option>
              <option 
                                value='AC - Acre'>AC - Acre</option>
              <option value='AL - Alagoas'>AL - Alagoas</option>
              <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
              <option value='AP - Amap&aacute;'>AP - Amap&aacute;</option>
              <option 
                                value='BA - Bahia'>BA - Bahia</option>
              <option value='CE - Cear&aacute;'>CE - Cear&aacute;</option>
              <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
              <option value='ES - Esp&iacute;rito Santo'>ES - Esp&iacute;rito Santo</option>
              <option 
                                value='GO - Goi&aacute;s'>GO - Goi&aacute;s</option>
              <option value='MA - Maranh&atilde;o'>MA - Maranh&atilde;o</option>
              <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
              <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
              <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
              <option value='PA - Par&aacute;'>PA - Par&aacute;</option>
              <option 
                                value='PB - Para&iacute;ba'>PB - Para&iacute;ba</option>
              <option value='PE - Pernambuco'>PE - Pernambuco</option>
              <option 
                                value='PI - Piau&iacute;'>PI - Piau&iacute;</option>
              <option value='PR - Paran&aacute;'>PR - Paran&aacute;</option>
              <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
              <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
              <option 
                                value='RO - Roraima'>RO - Roraima</option>
              <option value='RR - Roraima'>RR - Roraima</option>
              <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
              <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
              <option value='SP - S&atilde;o Paulo'>SP - S&atilde;o Paulo</option>
              <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
            </select>
          </span></td>
        </tr>
        <tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Endere&ccedil;o:</b></td>
          <td><input name="endereco" type="text" size=50 value="<?php echo $n["endereco"]; ?>" style=font-size:11px;font-family:tahoma></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>N&uacute;mero:</b></td>
          <td><input name="numero" type="text" size=15 value="<?php echo $n["numero"]; ?>" style=font-size:11px;font-family:tahoma></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Bairro:</b></td>
          <td><input name="bairro" type="text" size=24 value="<?php echo $n["bairro"]; ?>" style=font-size:11px;font-family:tahoma></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Telefone:</b></td>
          <td><input name="telefone" type="text" size=30 value="<?php echo $n["telefone"]; ?>" style=font-size:11px;font-family:tahoma>
              <font size="1" face="Verdana">*</FONT></td>
        </tr>
        <tr>
          <td colspan=2 align=center height=15></td>
        </tr>
        <tr>
          <td align=center></td>
          <td align=center>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" NAME="Enter" style=font-size:11px;font-family:tahoma value=" Editar Cliente ">
              <input type="reset" value="Limpar formulario" style=font-size:11px;font-family:tahoma></td>
        </table>
      <?
  }
  }
 ?></form></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </TD>
  </TR>
  <TR>
    <TD>&nbsp;</TD>
  </TR>
  <TR>
    <TD vAlign=bottom>
      <TABLE cellSpacing=2 cellPadding=2 width="100%" align=center 
      bgColor=#eeeeee border=0 valign="bottom">
        <TBODY>
        <TR>
          <TD vAlign=bottom align=right width="100%"><B><FONT style="FONT-SIZE: 11px" face=tahoma>© Sistema desenvolvido por 
        <A 
            style="TEXT-DECORATION: none" href="mailto:mandry@casadaweb.net" 
            target=_new>Maurício Pacheco</A> e  <A 
            style="TEXT-DECORATION: none" href="mailto:rossivr@hotmail.com" 
            target=_new>Vinicius Rossi</A></FONT></B></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TABLE></BODY></HTML>
