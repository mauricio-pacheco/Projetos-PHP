<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
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
  <table width="100%" border="0">
    <tr>
      <td width="41%" valign="top"><img src="home_arquivos/logotipo.png"></td>
      <td width="23%">&nbsp;</td>
      <td width="36%"><img src="adm.png" width="300" height="80"></td>
    </tr>
  </table>
</DIV>
<table width="98%" border="0">
  <tr>
    <td><img src="home_arquivos/branco.gif" width="2" height="20"></td>
  </tr>
</table>

<table width="950" align="left" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</DIV></DIV>
</DIV>
</DIV>
<DIV id=rodape>

<table width="976" background="home_arquivos/fundo.jpg" border="0" align="center">
  <tr>
    <td valign="top"><table width="99%" border="0" align="center">
      <tr>
        <td width="21%" valign="top">
        <?php include("menu.php"); ?>
       </td>
        <td width="79%" valign="top"><table width="100%" border="0">
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="1%"><img src="barra1.jpg" width="30" height="38"></td>
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Administrar Fotos</b></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770">
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr></tr>
                              <tr>
                                <td><?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM gestao_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>Não existe galerias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                  <table width="100%" border="0" align="center">
                                    <tr>
                                      <td><table width="100%" border="0" align="center">
                                        <tr>
                                          <td class="manchete_texto" align="left"><table width="100%" border="0" align="center">
                                            <tr>
                                              <td width="2%"><img src="galerias/<?php echo $n["foto"]; ?>" /></td>
                                              <td align="left" width="98%" valign="top" class="manchete_texto3"><table width="100%" border="0">
                                                <tr>
                                                  <td class="manchete_texto"><?php echo $n["nomegaleria"]; ?></td>
                                                </tr>
                                              </table>
                                                <table width="100%" border="0">
                                                  <tr>
                                                    <td class="manchete_texto"><b>Data da Galeria:</b> <?php echo $n["dataevento"]; ?><br />
                                                      <b>Data da Postagem:</b> <?php echo $n["data"]; ?> / <?php echo $n["hora"]; ?><br />
                                                      <?php echo $n["comentario"]; ?></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0">
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                                        </tr>
                                        <tr>
                                          <td class="manchete_texto" align="left"><?php

$sql = mysql_query("SELECT * FROM gestao_fotos WHERE idgaleria='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>Não existe imagens anexadas!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                                            <table width="100%" border="0">
                                              <tr>
                                                <td width="6%"><img src="ups/fotosgaleria/p/<?php echo $y["fotomenor"]; ?>" /></td>
                                                <td width="94%"><form action="cadcomenfotos.php" method="post" name="form1" id="form1" onsubmit="return validar(this)">
                                                  <table width="100%" border="0">
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>Legenda: <span class="style15">
                                                        <input name="comentario" type="text" class="texto" size="74" value="<?php echo $y["comentario"]; ?>" />
                                                        <span style="MARGIN: 0px">
                                                          <input name="submit" class="texto" type="submit" style="FONT-SIZE: 10px" value="POSTAR LEGENDA" />
                                                          <input type="hidden" name="idanexo" value="<?php echo $y["id"]; ?>" />
                                                          <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                                                        </span></span></td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td><a href="delimagemfotos.php?id=<?php echo $n["id"]; ?>&amp;idanexo=<?php echo $y["id"]; ?>&amp;fotomenor=<?php echo $y["fotomenor"]; ?>&amp;foto=<?php echo $y["foto"]; ?>" class="manchete_texto6" onclick="return confirm('Tem certeza que deseja apagar a Imagem ?')"><font color="#FF0000"><b>APAGAR IMAGEM</b></font></a></td>
                                                    </tr>
                                                  </table>
                                                </form></td>
                                              </tr>
                                            </table>
                                            <?php
  }
  }
 ?></td>
                                        </tr>
                                        <tr>
                                          <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                                        </tr>
                                        <tr>
                                          <td class="rodape" align="left"><span style="MARGIN: 0px">
                                            <?php
  }
  }
 ?>
                                          </span></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table>
                                                              </td>
                          </tr>
                        </table>
                       </td>
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
