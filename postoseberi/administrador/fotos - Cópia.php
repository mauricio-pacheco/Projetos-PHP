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
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Enviar Fotos</b></td>
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
                            <td align="left">
                            <?php 
		  include "conexao.php";

$sql = mysql_query("SELECT * FROM gestao_galeria ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<br><div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe galerias cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
		  ?>
                            <table width="98%" border="0" align="center">
                              <tr>
                                <td><form action="cadfotos.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
                                  <table width="100%" border="0" align="center">
                                    <tr>
                                      <td class="rodape"><b>Selecione a Galeria / Evento para enviar as fotos:</b><strong>
                                        <select 
                              class="texto"   name="idgaleria">
                                          <?php

while($n = mysql_fetch_array($sql))
   {
   ?>
                                          <option 
                              value="<?php echo $n["id"]; ?>"><?php echo $n["nomegaleria"]; ?></option>
                                          <?php } ?>
                                        </select> *<br><br>
                                      </strong></td>
                                    </tr>
                                    <tr>
                                      <td class="rodape"><table width="100%" border="0">
                                        <tr>
                                          <td>Foto 1: <span class="style15">
                                            <input type="file" name="foto0" id="foto0" class="texto" />
                                          </span></td>
                                          <td>Foto 11: <span class="style15">
                                            <input type="file" name="foto10" id="foto1" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario0" type="text" id="comentario0" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario10" type="text" id="comentario10" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 2: <span class="style15">
                                            <input type="file" name="foto1" id="foto2" class="texto" />
                                          </span></td>
                                          <td>Foto 12: <span class="style15">
                                            <input type="file" name="foto11" id="foto11" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario1" type="text" id="comentario1" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario11" type="text" id="comentario11" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 3: <span class="style15">
                                            <input type="file" name="foto2" id="foto2" class="texto" />
                                          </span></td>
                                          <td>Foto 13: <span class="style15">
                                            <input type="file" name="foto12" id="foto12" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario2" type="text" id="comentario2" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario12" type="text" id="comentario12" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 4: <span class="style15">
                                            <input type="file" name="foto3" id="foto3" class="texto" />
                                          </span></td>
                                          <td>Foto 14: <span class="style15">
                                            <input type="file" name="foto13" id="foto13" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario3" type="text" id="comentario3" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario13" type="text" id="comentario13" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 5: <span class="style15">
                                            <input type="file" name="foto4" id="foto4" class="texto" />
                                          </span></td>
                                          <td>Foto 15: <span class="style15">
                                            <input type="file" name="foto14" id="foto14" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario4" type="text" id="comentario4" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario14" type="text" id="comentario14" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 6: <span class="style15">
                                            <input type="file" name="foto5" id="foto5" class="texto" />
                                          </span></td>
                                          <td>Foto 16: <span class="style15">
                                            <input type="file" name="foto15" id="foto15" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario5" type="text" id="comentario5" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario15" type="text" id="comentario15" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 7: <span class="style15">
                                            <input type="file" name="foto6" id="foto6" class="texto" />
                                          </span></td>
                                          <td>Foto 17: <span class="style15">
                                            <input type="file" name="foto16" id="foto16" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario6" type="text" id="comentario6" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario16" type="text" id="comentario16" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 8: <span class="style15">
                                            <input type="file" name="foto7" id="foto7" class="texto" />
                                          </span></td>
                                          <td>Foto 18: <span class="style15">
                                            <input type="file" name="foto17" id="foto17" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario7" type="text" id="comentario7" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario17" type="text" id="comentario17" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 9: <span class="style15">
                                            <input type="file" name="foto8" id="foto8" class="texto" />
                                          </span></td>
                                          <td>Foto 19: <span class="style15">
                                            <input type="file" name="foto18" id="foto18" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario8" type="text" id="comentario8" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario18" type="text" id="comentario18" size="40"></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>Foto 10: <span class="style15">
                                            <input type="file" name="foto9" id="foto9" class="texto" />
                                          </span></td>
                                          <td>Foto 20: <span class="style15">
                                            <input type="file" name="foto19" id="foto19" class="texto" />
                                          </span></td>
                                        </tr>
                                        <tr>
                                          <td>Legenda:
                                            <input name="comentario9" type="text" id="comentario9" size="40"></td>
                                          <td>Legenda:
                                            <input name="comentario19" type="text" id="comentario19" size="40"></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td class="rodape"><span style="MARGIN: 0px">
                                        <input name="submit" class="texto" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR FOTOS" />
                                      </span></td>
                                    </tr>
                                  </table>
                                </form>
                                  <?php
  }
 ?></td>
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
