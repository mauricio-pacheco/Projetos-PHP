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
                        <?php

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
                            <td align="left"><table width="100%" border="0" align="center">
                              <tr>
                                <td class="titulo" align="left"><table width="100%" border="0" align="center">
                                  <tr>
                                    <td width="2%"><img src="galerias/<?php echo $n["foto"]; ?>" width="140" height="106"/></td>
                                    <td align="left" width="98%" valign="top" class="titulo3"><table width="100%" border="0">
                                      <tr>
                                        <td class="titulo"><?php echo $n["nomegaleria"]; ?></td>
                                      </tr>
                                    </table>
                                      <table width="100%" border="0">
                                        <tr>
                                          <td class="titulo"><font size="2px"><b>Data do Evento:</b> <?php echo $n["dataevento"]; ?><br />                                            <b>Data de Postagem:</b> <?php echo $n["data"]; ?> / <?php echo $n["hora"]; ?><br />
                                            <?php echo $n["comentario"]; ?></font></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td class="titulo" align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              <tr>
                                <td class="titulo" align="center"><!-- dynamic assets -->
                                  <style type="text/css">
#status
{
	padding:				10px 15px;
	width:					100%;
}
 
#status .progress
{
	background:				white url(funcoesupload/assets/progress.gif) no-repeat;
	background-position:	+50% 0;
	margin-right:			0.5em;
}
 
#status .progress-text
{
	font-size:				0.9em;
	font-weight:			bold;
}
 
#images-list
{
	list-style:				none;
	width:					100%;
	margin:					0;
}
 
#images-list li.file
{
	border-bottom:			1px solid #E1E1E1;
	background-image: url(funcoesupload/assets/file.png);
	background-repeat: no-repeat;
	background-position: 4px 4px;
}
#images-list li.file.file-uploading
{
	background-image:		url(funcoesupload/assets/uploading.gif);
	background-color:		#ffffff;
}
#images-list li.file.file-success
{
	background-image:		url(funcoesupload/assets/sss.jpg);
}
#images-list li.file.file-failed
{
	background-image:		url(funcoesupload/assets/failed.png);
}
 
#images-list li.file .file-name
{
	font-size:				1.2em;
	margin-left:			60px;
	display:				block;
	clear:					left;
	line-height:			40px;
	height:					56px;
	font-weight:			bold;
}
#images-list li.file .file-size
{
	font-size:				0.9em;
	line-height:			18px;
	float:					right;
	margin-top:				2px;
	margin-right:			6px;
}
#images-list li.file .file-info
{
	display:				block;
	margin-left:			44px;
	font-size:				0.9em;
	line-height:			20px;
	clear
}
#images-list li.file .file-remove
{
	clear:					right;
	float:					right;
	line-height:			18px;
	margin-right:			6px;
}

.hide {
	display: none;
}

#loading {
	padding:				30px;
	width:					100%;
	text-align: 			center;
	font-weight: bold;
}

#loading img {
	vertical-align: middle;
}
img {
	border: 0px;
}


                              </style>
                                  <script type="text/javascript" src="funcoesupload/mootools-trunk.js"></script>
                                  <script type="text/javascript" src="funcoesupload/Swiff.Uploader.js"></script>
                                  <script type="text/javascript" src="funcoesupload/Fx.ProgressBar.js"></script>
                                  <script type="text/javascript" src="funcoesupload/FancyUpload2.js"></script>
                                  <script type="text/javascript">
window.addEvent('load', function() {
 
	var swiffy = new FancyUpload2($('status'), $('images-list'), {
		url: $('form_imagens').action,
		fieldName: 'photoupload',
		path: 'funcoesupload/Swiff.Uploader.swf',
		onLoad: function() {
			$('loading').destroy();
			$('status').removeClass('hide');
			
			this.options.typeFilter = {'Imagens (*.jpg, *.jpeg, *.gif, *.png)': '*.jpg; *.jpeg; *.gif; *.png'};
		},
		limitFiles: 5000,
		debug: true,
		target: 'add-image'
	});
 
	/**
	 * Various interactions
	 */
 
	$('add-image').addEvent('click', function() {
		swiffy.browse();
		return false;
	});
 
	$('clear-list').addEvent('click', function() {
		swiffy.removeFile();
		return false;
	});
 
	$('upload-images').addEvent('click', function() {
		swiffy.upload();
		return false;
	});
 
});
                              </script>
                                  <div>
                                    <form action="funcoesupload/script2.php?id=<?php echo $n["id"]; ?>" method="post" enctype="multipart/form-data" id="form_imagens">
                                      <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                                      <div id="loading"> <img src="funcoesupload/assets/uploading.gif" alt="" /><br />
                                        Carregando... </div>
                                      <div id="status" class="hide">
                                        <p><a href="#" id="add-image"><img src="funcoesupload/assets/e1.jpg" border="0" /></a>&nbsp;&nbsp; <a href="#" id="clear-list"><img src="funcoesupload/assets/e2.jpg" border="0" /></a> &nbsp;&nbsp; <a href="#" id="upload-images"><img src="funcoesupload/assets/e3.jpg" border="0" /></a></p>
                                        <div class="fontetabela"> <strong class="overall-title">Progresso Total</strong><br />
                                          <img src="funcoesupload/assets/bar.gif" class="progress overall-progress" /></div>
                                        <div class="fontetabela"> <strong class="current-title">Arquivo atual</strong><br />
                                          <img src="funcoesupload/assets/bar.gif" class="progress current-progress" /></div>
                                        <div class="current-text"></div>
                                      </div>
                                      <div id="images-list" align="left" class="fontetabela"></div>
                                    </form>
                                  </div></td>
                              </tr>
                              <tr>
                                <td class="titulo" align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              <tr>
                                <td class="rodape" align="left"><span style="MARGIN: 0px">
                                  <?php
  }
  }
 ?>
                                </span></td>
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
