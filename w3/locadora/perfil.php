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
              <td>&nbsp;<font face="Verdana">Perfil Cliente</font></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td>
             
<?php

include "conexao.php";

$codigo = $_GET['codigo'];

$sql = mysql_query("SELECT * FROM clientes WHERE codigo='$codigo' ORDER BY codigo");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃ¡ algum registro na tabela, caso nÃ£o houver, ele mostrarÃ¡ a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N�o existe clientes cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃ¡ os registros. OBS: VocÃª pode mudar o modo de exibir os registros
     //mais nÃ£o mude nenhuma variÃ¡vel, a nÃ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
      
      <table align=center width="96%">
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>C&oacute;digo do cliente:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["codigo"]; ?></FONT></td>
        </tr>
        <tr>
          <td width="23%"><FONT face=tahoma  style=font-size:11px><b>Nome do cliente:</b></td>
          <td width="77%"><FONT face=Verdana size=2><?php echo $n["nomecliente"]; ?></FONT></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>E-mail:</b></td>
          <td><FONT face=tahoma  style=font-size:11px>
             <FONT face=Verdana size=2><a href="mailto:<?php echo $n["email"]; ?>"><?php echo $n["email"]; ?></a></FONT>
            &nbsp;</td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Cidade:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["cidade"]; ?></FONT></td>
        </tr>
        <tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Estado:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["estado"]; ?></FONT></td>
        </tr>
        <tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Endere&ccedil;o:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["endereco"]; ?></FONT></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>N&uacute;mero:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["numero"]; ?></FONT></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Bairro:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["bairro"]; ?></FONT></td>
        </tr>
        <tr>
          <td><FONT face=tahoma  style=font-size:11px><b>Telefone:</b></td>
          <td><FONT face=Verdana size=2><?php echo $n["telefone"]; ?></FONT></td>
        </tr>
        <tr>
          <td colspan=2 align=center height=15></td>
        </tr>
        <tr>
          <td align=center></td>
          <td align=center><table width="20%" border="0">
            <tr>
              <td><font face="Verdana" size="2"><a href="javascript:history.go(-2)"><img src="setavol.gif" border="0"></a></font></td>
              <td><font face="Verdana" size="2"><a href="javascript:history.go(-2)">VOLTAR</a></font></td>
            </tr>
          </table>            <a href="javascript:history.go(-2)"></a></td>
        </table>
      <?
  }
  }
 ?></td>
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
          <TD vAlign=bottom align=right width="100%"><B><FONT style="FONT-SIZE: 11px" face=tahoma>� Sistema desenvolvido por 
        <A 
            style="TEXT-DECORATION: none" href="mailto:mandry@casadaweb.net" 
            target=_new>Maur�cio Pacheco</A> e  <A 
            style="TEXT-DECORATION: none" href="mailto:rossivr@hotmail.com" 
            target=_new>Vinicius Rossi</A></FONT></B></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TABLE></BODY></HTML>
