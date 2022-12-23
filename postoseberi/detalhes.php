<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=pt-BR xml:lang="pt-BR" 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Posto Seberi</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=pt-BR http-equiv=Content-language>
<META name=description 
content="Descrição">
<META name=keywords 
content="palavras, chave"><LINK rel="Shortcut icon" type=image/x-icon 
href="home_arquivos/favicon.ico">

<STYLE type=text/css>@import url( home_arquivos/default.css );
@import url( home_arquivos/pais.css );
</STYLE>

<META name=GENERATOR content="MSHTML 8.00.6001.18702"></HEAD>
<BODY>
<DIV id=layout>
<DIV id=topo>
<DIV id=topo-mg>
  <?php include("cabecalho.php"); ?>
</DIV>
<table width="98%" border="0">
  <tr>
    <td><img src="home_arquivos/branco.gif" width="2" height="20"></td>
  </tr>
</table>

<table width="950" align="left" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("menucima.php"); ?></td>
  </tr>
</table>
</DIV></DIV>
<DIV id=conceitual-home>
<SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('index.swf','972','329'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT><br>
</DIV>

</DIV></DIV>
<DIV id=rodape>
<DIV id=rodape-topo>
</DIV>
<table width="976" background="home_arquivos/fundo.jpg" border="0" align="center">
  <tr>
    <td valign="top"><table width="99%" border="0" align="center">
      <tr>
        <td width="21%" valign="top"><?php include("menu.php"); ?></td>
        <td width="79%" valign="top"><table width="100%" border="0">
          <tr>
            <td><img src="home_arquivos/bb.gif" width="20" height="250"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="1%"><img src="barra1.jpg" width="30" height="38"></td>
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;
                  <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM gestao_noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe conteúdo cadastrado!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>                  &nbsp;<b><?php echo $n["titulo"]; ?></b></td>
              </tr>
            </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td background="traco.jpg">&nbsp;</td>
                      <td><div align="right">Conteúdo Publicado Terça-feira, <?php echo $n["data"]; ?> (<?php echo $n["hora"]; ?>)</div></td>
                    </tr>
                    <tr>
                      <td background="traco.jpg">&nbsp;</td>
                      <td><div align="left"></div></td>
                    </tr>
                    <tr>
                      <td background="traco.jpg">&nbsp;</td>
                      <td><div align="left">
                        <table width="96%" border="0" align="center">
                          <tr>
                            <td border="0"><?php echo $n["legenda"]; ?></td>
                            </tr>
                          <tr>
                            <td border="0">&nbsp;</td>
                            </tr>
                          <tr>
                            <td border="0"><?php echo $n["texto"]; ?></td>
                            </tr>
                                          </table>
                      </div></td>
                    </tr>
                    <tr>
                      <td background="traco.jpg">&nbsp;</td>
                      <td><div align="left"></div></td>
                    </tr>
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770"><div align="left"><a href="javascript:history.go(-1)"><img src="voltar.jpg" border="0">
                        <?php
  }
  }
 ?>
                      </a></div></td>
                    </tr>
                  </table>                   </td>
                  </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<DIV id=rodape-baixo>
  <DIV class=conteudo>
  <DIV id=direitos>
  <?php include("baixo.php"); ?><BR class=clr></DIV></DIV></DIV></DIV></BODY></HTML>
