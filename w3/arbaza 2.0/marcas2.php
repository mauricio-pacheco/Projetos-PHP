<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Arbaza</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<SCRIPT src="home_arquivos/j.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/scripts.js" type=text/javascript></SCRIPT>
<LINK href="home_arquivos/estilo.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/menu.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/estilo_int.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
.style3 {font-family: Tahoma, Arial}
.style5 {
	font-family: Tahoma, Arial;
	font-size: 11px;
	color: #FFFFFF;
}
.style7 {font-family: Tahoma, Arial; font-size: 11px; color: #333333; }
.style10 {color: #333333}
#apDiv1 {
	position:absolute;
	width:146px;
	height:56px;
	z-index:3;
	left: 114px;
	top: 816px;
}
.style13 {font-size: 11px; font-family: Tahoma; }
.style15 {font-size: 12px}
.style19 {font-size: 12px; font-family: Tahoma, Arial;}
.style20 {font-family: Tahoma, Arial; font-size: 12px; color: #333333; }
.style21 {font-family: Tahoma; color: #333333; }
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style23 {
	color: #333333;
	font-size: 11px;
	font-family: Tahoma;
}
.style27 {font-family: Tahoma; color: #D81E05; font-size: 11px; }
.style24 {color: #FEDC01}
.style35 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.style28 {	font-size: 10px;
	color: #FFFFFF;
}
.style29 {font-size: 10px}
.style30 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style31 {color: #FFCC33}
.style33 {color: #0099FF}
</style>
</HEAD>
<BODY>
<?php include("cima.php"); ?>
<script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome n�o est� preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail n�o est� preenchido!")
cadastro.email2.focus();
return false
}

if (document.cadastro.assunto.value=="") {
alert("O Campo Assunto n�o est� preenchido!")
cadastro.assunto.focus();
return false
}

		return true;

}


</SCRIPT>
<TABLE id=conteudo cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD id=col_esquerda>
      <?php include("menu.php"); ?></TD>
    <TD id=meio><table width="100%" border="0" align="center">
      <tr>
        <td><img src="blank.gif" width="1" height="4"></td>
      </tr>
      <tr>
        <td><table width="98%" border="0" align="center">
          <tr>
            <td width="2%"><img src="share.gif" width="16" height="16"></td>
            <td width="98%"><font size="3">Marcas Pr&oacute;prias</font></td>
          </tr>
        </table>
          <table width="98%" border="0" align="center">
            <tr>
              <td width="98%">&nbsp;</td>
            </tr>
          </table>
          </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center">
          <tr>
            <td><table width="98%" border="0" align="center">
              <tr>
                <td width="50%"><p><a href="javascript:abrir('marcas.php');"><img alt="Clique na imagem para visualizar os produtos." src="marcas23.jpg" border="0"></a><br><br>
                  </p></td>
                </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
          </tr>
        </table></td>
      </tr>
    </table></TD>
  </TR></TBODY></TABLE>
<?php include("baixo.php"); ?>
</BODY></HTML>
