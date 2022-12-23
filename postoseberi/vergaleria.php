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

<META name=GENERATOR content="MSHTML 8.00.6001.18702">
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
</HEAD>
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
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;<b>
                  <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM gestao_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe notic&iacute;as cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                Galeria de Fotos </b> - <font color="#009136"><?php echo $y["nomegaleria"]; ?></font></td>
              </tr>
            </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770"><table width="100%" border="0" align="center">
                        <tr>
                          <td border="0"><table width="100%" border="0" align="center">
                            <tr>
                                <td align="center"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                                  <?php } else { ?>
                                  <img src="administrador/galerias/<?php echo $y["foto"]; ?>" />
                                  <?php } ?></td>
                              </tr>
                              <tr>
                                <td align="center"><b><font color="#008000"><?php echo $y["nomegaleria"]; ?></font><br>
                                  Data da Galeria: <?php echo $y["dataevento"]; ?></b></td>
                              </tr>
                              <tr>
                                <td align="center">Data de Publicação: <?php echo $y["data"]; ?> --- ( <?php echo $y["hora"]; ?> Hs )</td>
                              </tr>
                              <tr>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left"><div align="left"><?php echo $y["comentario"]; ?></div></td>
                              </tr>
                              <tr>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" width="14%"><div align="center">
                                  <?php }  ?>
                                  <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM gestao_fotos WHERE idgaleria='$id'"; 
$resultado=mysql_query($sql);

while($linha= mysql_fetch_array($resultado))
{

echo 
"<a href='administrador/ups/fotosgaleria/g/".$linha['foto']."' rel='lightbox['roadtrip']' title='".$linha["comentario"]."'><img  width=156 height=117 alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosgaleria/p/".$linha['fotomenor']."'></a>
";

}}
  
   ?>
                                  <br /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                        <table width="97%" border="0" align="center">
                          <tr>
                            <td border="0" align="left"><br>
                              <a href="javascript:history.go(-1)"><img src="voltar.jpg" border="0"></a></td>
                          </tr>
                        </table></td>
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
