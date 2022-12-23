<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Spazio Club</TITLE>
<META content="Palavras, Chave" 
name=title>
<META content="Fotos, Shows, Festas, Raves e Baladas." name=subject>
<META content=general name=rating>
<META content="5 days" name=revisit-after>
<META content=pt-br name=language>
<META content="index, follow" name=robots>
<META content="index, follow" name=googlebot>
<META content=all name=audience>
<META content=magee name=DC.title>
<META content=Completed name=doc-class>
<META content="Mandry" name=author>
<META http-equiv=Pragma content=no-cache>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
rev=stylesheet media=screen href="index_arquivos/screen.css" type=text/css 
charset=utf-8 rel=stylesheet><LINK rev=stylesheet media=screen 
href="index_arquivos/home.css" type=text/css charset=utf-8 rel=stylesheet>
<SCRIPT src="index_arquivos/flash.js" type=text/javascript 
charset=utf-8></SCRIPT>
<SCRIPT language=JavaScript>
		<!--
		function popupRadio(url) {
			larg = 400;
			alt = 280;
			calcleft = (screen.width / 2) - (larg / 2);
			calctop = (screen.height / 2) - (alt / 2);
			janela = window.open(url,"radio","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width="+larg+", height="+alt+", left="+calcleft+", top="+calctop);
 			janela.focus();
		}
		-->
	</SCRIPT>
<META content="MSHTML 6.00.6000.16705" name=GENERATOR>
<style type="text/css">
<!--
.style1 {font-size: 11px}
.style22 {color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</HEAD>
<BODY><div align="center">
<DIV id=wrapper>
<DIV id=globalnav>
<DIV id=globalnav-content>
<DIV id=logo style="MARGIN: -7px 0px 0px 15px"><?php include("imagem.php"); ?></DIV>
<DIV id=dynamic-title>
<H1 align="center"><img src="logospazio.png"></H1>
</DIV>
<DIV id=options>
<?php include("menu1.php"); ?></DIV></DIV></DIV>
<DIV id=menu align="center">
<?php include("menu2.php"); ?></DIV>
<DIV id=content>
<DIV id=columns-AB-A>
  <DIV id=display style="MARGIN-TOP: -10px; PADDING-BOTTOM: 20px">
<DIV id=flashcontent></DIV>
<SCRIPT type=text/javascript>
							// <![CDATA[
			
							var so = new FlashObject("quadro/quadro.swf", "v1", "480", "245", "6", "#272523");
							so.addVariable("lang", "pt");
							so.addParam("scale", "noscale");
							so.addParam("menu", "false");
							so.write("flashcontent");
			
							// ]]>
						</SCRIPT>
</DIV>
<DIV id=home-section>
<DIV id=espaco-ie7></DIV>
<DIV id=proximas-festas-section>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000"><tr><td><img src="eventos.jpg"></td></tr></table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000"><tr><td><img src="barra1.jpg"></td></tr></table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <?php

include "../conexao.php";

$sql = mysql_query("SELECT * FROM agenda ORDER BY id DESC LIMIT 1");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
  <tr onMouseOver="this.style.backgroundColor='#EF2F72'; this.style.color='#1F1F1F'; this.style.cursor='pointer'" onClick="window.location='verevento.php?id=<?php echo $n["id"]; ?>';" onMouseOut="this.style.backgroundColor='#000000'; this.style.color='#ffffff';">
    <td width="22%" align="center"><img src="../folders/<?php echo $n["folder"]; ?>" border="1"/></td>
    <td width="78%" bgcolor="#000000"><table width="100%" border="0">
      <tr>
        <td><span class="style22"><img src="zoio.png"/> <?php echo $n["assunto"]; ?></span></td>
      </tr>
      <tr>
        <td><span class="style22"><font color="#FEDC00">Data: </font><?php echo $n["dataevento"]; ?></span></td>
      </tr>
    </table></td>
  </tr>
  <?
  }
  }
 ?>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000"><tr><td><img src="barra2.jpg"></td></tr></table>
<H4><A title="Ver todas as Festas e Eventos" 
href="eventos.php">Ver todas as Festas e 
Eventos</A></H4></DIV>
<DIV id=proximas-festas-section>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000"><tr><td><img src="tivideos.jpg"></td></tr></table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000"><tr><td><img src="barra1.jpg"></td></tr></table>
  <table width="100%" border="0" bgcolor="#000000">
    <tr>
      <td><div align="center">
        <?php

include "../conexao.php";

$sql = mysql_query("SELECT * FROM videos ORDER BY id DESC LIMIT 1");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
        <?php echo $n["link"]; ?>
        <?
  }
  }
 ?></div></td>
    </tr>
  </table>
<H4><A title="Ver todos os Videos" 
href="videos.php">Ver todos os Videos</A></H4></DIV>
<DIV style="MARGIN-TOP: 10px"></DIV>
<DIV id=last-news-section style="PADDING-BOTTOM: 10px">
<H2><IMG title="Últimas Notícias" alt="Últimas Notícias" 
src="noticias.jpg"></H2>
<div align="left">
  <?php

include "../conexao.php";

$sql = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 2");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
  <DL class="line-A first" 
style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 0px; PADDING-TOP: 2px">
    <Div class=date>
    &nbsp;
    <Div class=date>
    <img src="../imagens/lendario.png" border="0"/>&nbsp;<font color="#ffffff">Data da Postagem:</font>&nbsp;<font color="#ffffff"><?php echo $n["data"]; ?> - <?php echo $n["hora"]; ?></font>
    <Div class=spazio>
    <a href="vernoticia.php?id=<?php echo $n["id"]; ?>"><img src="../imagens/new.png" border="0"/></a>&nbsp;<a href="vernoticia.php?id=<?php echo $n["id"]; ?>"><?php echo $n["assunto"]; ?></a>
    </DD>
  </DL>
  <?
  }
  }
 ?>
</div>
</DIV>
<H4><A title="Ver todas as not&iacute;cias" 
href="noticias.php">Ver todas as Not&iacute;cias</A></H4>
</DIV></DIV>
<DIV id=columns-AB-B>

<TABLE style="MARGIN-TOP: 2px" cellSpacing=0 cellPadding=0 width=250 
  border=0><TBODY>
  <TR>
    <TD bgColor=#0d0b0b>
      <TABLE cellSpacing=0 cellPadding=0 width=250 border=0>
        <TBODY>
        <TR>
          <TD 
          style="BACKGROUND: url(images/master/bg_vip_top.jpg) #0d0b0b repeat-x; HEIGHT: 10px" 
          vAlign=top align=left><div align="center"><img src="new.jpg" width="250" height="30"></div></TD>
        </TR>
        <TR>
          <TD 
          style="PADDING-RIGHT: 2x; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; PADDING-TOP: 2px" 
          vAlign=top align=left>
            <?php include("cademail2.php"); ?></TD></TR>
        </TBODY></TABLE></TD></TR></TBODY></TABLE>
<DIV id=last-photos-section>
<H2><IMG title="Últimas Fotos" alt="Últimas Fotos" 
src="fotos.jpg"></H2>
 <?php

include "../conexao.php";

$sql = mysql_query("SELECT * FROM galeria ORDER BY id DESC LIMIT 10");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
<DL class=line-A><DD class=city><table width="98%" border="0" align="center" bgcolor="#000000">  
<tr onMouseOver="this.style.backgroundColor='#EF2F72'; this.style.color='#999999'; this.style.cursor='pointer'" onClick="window.location='vergalerias.php?id=<?php echo $n["id"]; ?>';" onMouseOut="this.style.backgroundColor='#000000'; this.style.color='#999999';">
                        <td width="22%" align="center"><img src="../capas/<?php echo $n["foto"]; ?>" border="1"/></td>
                        <td width="78%" bgcolor="#000000"><table width="100%" border="0">
                            <tr>
                              <td><span class="style22"><?php echo $n["nomegaleria"]; ?></span></td>
                            </tr>
                            <tr>
                              <td><span class="style22"><font color="#FEDC00">Data: </font><?php echo $n["dataevento"]; ?></span></td>
                            </tr>
                        </table></td>
        </tr> </table></DD></DL>
 <?
  }
  }
 ?>
<H4><A title="Ver todas as fotos dos Eventos" href="fotos.php">Ver todas as Fotos</A></H4></DIV>
</DIV>
</DIV>
<SCRIPT src="index_arquivos/0300.js" type=text/javascript> </SCRIPT>
<!-- globalfooter --><BR class=clear-both>
<?php include("patrocinadores.php"); ?>
<?php include("baixo.php"); ?></DIV></div>
</BODY></HTML>
