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
              <td>&nbsp;<font face="Verdana">Cadastrar Filme</font></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td>
               <script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nomefilme.value=="") {
alert("O Campo Nome do Filme não está preenchido!")
cadastro.nomefilme.focus();
return false
}

if (document.cadastro.preco.value=="") {
alert("O Campo Preço da Locação não está preenchido!")
cadastro.preco.focus();
return false
}

		return true;

}


</SCRIPT><form method="post" ENCTYPE="multipart/form-data" action="cadfilme.php" name="cadastro" onSubmit="return validar(this)"><table align=center width="90%">
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><span class="style2"><font size="1" face="Verdana">*</FONT> Campos Obrigat&oacute;rios&nbsp;&nbsp;&nbsp;&nbsp;</div></span></td>
  </tr>
  <tr>
                <td width="23%"><FONT face=tahoma  style=font-size:11px><b>Nome do filme:</b></td>
                <td width="77%"><input name="nomefilme" type="text" value="" size=75  style=font-size:11px;font-family:tahoma>
<font size="1" face="Verdana">*</FONT></td>
              </tr><tr>
                  <td><FONT face=tahoma  style=font-size:11px><b>G&ecirc;nero:</b></td><td><select name="genero" style=font-size:11px;font-family:tahoma>
                  <option value="A&ccedil;&atilde;o">A&ccedil;&atilde;o</option>
                  <option value="Aventura">Aventura</option>
                  <option value="Com&eacute;dia">Com&eacute;dia</option>
                  <option value="Document&aacute;rio">Document&aacute;rio</option>
                  <option value="Drama">Drama</option>
                  <option value="Faroeste">Faroeste</option>
                  <option value="Fic&ccedil;&atilde;o">Fic&ccedil;&atilde;o</option>
                  <option value="Guerra">Guerra</option>
                  <option value="Infantil">Infantil</option>
                  <option value="Musical">Musical</option>
                  <option value="Nacional">Nacional</option>
                  <option value="Policial">Policial</option>
                  <option value="Romance">Romance</option>
                  <option value="Suspense">Suspense</option>
                  <option value="Terror">Terror</option>
                </select></td></tr><tr>
                  <td><FONT face=tahoma  style=font-size:11px><b>Diretor:</b></td><td><FONT face=tahoma  style=font-size:11px><input name="diretor" type="text" size=40 value="" style=font-size:11px;font-family:tahoma>&nbsp;</td>
                </tr><tr>
                    <td><FONT face=tahoma  style=font-size:11px><b>Elenco:</b></td><td><input name="elenco" type="text" size=50 value="" style=font-size:11px;font-family:tahoma></td></tr><tr><tr>
                  <td><FONT face=tahoma  style=font-size:11px><b>Preço da Loca&ccedil;&atilde;o:</b></td><td><FONT face=tahoma  style=font-size:11px>&nbsp;R$ <input name="preco" type="text" size=15 value="" style=font-size:11px;font-family:tahoma>
                  *</td>
                    </tr><tr><td><FONT face=tahoma  style=font-size:11px><b>Imagem:</b></td><td><FONT face=tahoma  style=font-size:11px><input name="foto" type="file" size=15 style=font-size:11px;font-family:tahoma>
                  <font color="#003366" style=font-size:10px>&nbsp;(tamanho ideal: largura 185px, altura indiferente)</font></td>
                  </tr>
                      <td><FONT face=tahoma  style=font-size:11px><b>Sinopse:</b></td><td><textarea name="sinopse" rows=15 cols=75 style=font-size:11px;font-family:tahoma></textarea></td></tr><tr><td><FONT face=tahoma  style=font-size:11px><b>Estoque:</b></td><td><select name="estoque" style=font-size:11px;font-family:tahoma><option value="Disponível" >Disponível<option value="Não disponível" >Não disponível</select></td></tr><tr><td colspan=2 align=center height=15></td></tr><tr><td align=center></td><td align=center>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" NAME="Enter" style=font-size:11px;font-family:tahoma value=" Cadastrar Filme "> <input type="reset" value="Limpar formulario" style=font-size:11px;font-family:tahoma></td></table>
              </form></td>
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
