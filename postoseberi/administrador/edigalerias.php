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

<STYLE type=text/css>
@import url( home_arquivos/default.css );
@import url( home_arquivos/pais.css );
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
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
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Editar Galeria</b></td>
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
                                <td><?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM gestao_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>NÃO EXISTE GALERIA CADASTRADA!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                  <script language=javascript>
function validar(form1) { 

if (document.form1.nomegaleria.value=="") {
alert("O Campo Título da Galeria não está preenchido!")
form1.nomegaleria.focus();
return false
}

if (document.form1.dataevento.value=="") {
alert("O Campo Data do Evento da Galeria não está preenchido!")
form1.dataevento.focus();
return false
}

}

                              </SCRIPT>
                                  <form name="form1" action="updategaleria.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
                                    <table width="100%" border="0" align="center">
                                      <tr>
                                        <td class="rodape">Título do Evento: <span class="style15">
                                          <input name="nomegaleria" type="text" class="texto" size="60" value="<?php echo $n["nomegaleria"]; ?>" />
                                          </span> *
                                          <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" /></td>
                                      </tr>
                                      <tr>
                                        <td class="rodape">Data do Evento: <span class="style15">
                                          <input name="dataevento" type="text" class="texto" size="20" value="<?php echo $n["dataevento"]; ?>" />
                                        </span> *</td>
                                      </tr>
                                      <tr>
                                        <td class="rodape"><img src="galerias/<?php echo $n["foto"]; ?>" /></td>
                                      </tr>
                                      <tr>
                                        <td class="rodape">Capa da Galeria:
                                          <input type="file" name="foto" id="foto" class="texto" />
                                          (caso não deseje editar a foto deixe   em branco)
                                          <input type="hidden" name="foto" id="foto" value="<?php echo $n["foto"]; ?>" /></td>
                                      </tr>
                                      <tr>
                                        <td class="rodape">Descrição da Agenda:</td>
                                      </tr>
                                      <tr>
                                        <td class="rodape"><label>
                                          <textarea name="comentario" id="comentario" cols="60" rows="10" class="texto"><?php echo $n["comentario"]; ?></textarea>
                                          (opcional)</label></td>
                                      </tr>
                                      <tr>
                                        <td class="rodape"><span style="MARGIN: 0px">
                                          <input name="submit" class="texto" type="submit" style="FONT-SIZE: 10px" value="EDITAR GALERIA" />
                                        </span></td>
                                      </tr>
                                    </table>
                                  </form>
                                  <?php
  }
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
