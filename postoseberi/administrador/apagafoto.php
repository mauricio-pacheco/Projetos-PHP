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
                            <td align="left"><table width="98%" border="0" align="center">
                              <tr>
                                <td><table width="100%" border="0" align="center">
                                  <tr>
                                    <td class="rodape"><?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM gestao_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font color='#000000' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>NÃO EXISTE FOTOS CADASTRADAS!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                      <table width="100%" border="0" align="center">
                                        <tr>
                                          <td align="center"><img src="galerias/<?php echo $n["foto"]; ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td align="center" width="98%"><font color="#000000"><?php echo $n["nomegaleria"]; ?> -- <?php echo $n["data"]; ?> <?php echo $n["hora"]; ?></td>
                                        </tr>
                                      </table>
                                      <br />
                                      <?php
  }
  }
 ?></td>
                                  </tr>
                                  <tr>
                                    <td class="rodape">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="rodape">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="rodape"><?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM gestao_fotos WHERE idgaleria='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>NÃO EXISTE FOTOS CADASTRADAS!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                      <?php
									
								$causa = $n["fotomenor"];
									$teste = '1';
									
									if ($causa == $teste) {
										
										   }
									else {
									?>
                                      <table width="100%" border="0" align="center">
                                        <tr>
                                          <td width="2%"><img src="fotosmenor/<?php echo $n["fotomenor"]; ?>" /></td>
                                          <td align="left" width="98%"><a href="delfoto.php?id=<?php echo $n["id"]; ?>&amp;idgaleria=<?php echo $n["idgaleria"]; ?>&amp;fotomenor=<?php echo $n["fotomenor"]; ?>&amp;foto=<?php echo $n["foto"]; ?>" class="linkmenu" onClick="return confirm('Tem certeza que deseja apagar a foto ?')"><font color="#0000ff"><b>APAGAR FOTO</b></font></a></td>
                                        </tr>
                                      </table>
                                      <?php } ?>
                                      <?php
  }
  }
 ?></td>
                                  </tr>
                                  <tr>
                                    <td class="rodape">&nbsp;</td>
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
