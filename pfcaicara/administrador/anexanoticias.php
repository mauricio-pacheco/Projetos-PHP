<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ANEXAR IMAGENS A NOTÍCIA</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="100%" border="0" align="center">
              <tr>
                <td><table width="100%" border="0" align="center">
                  <tr>
                    <td class="manchete_texto" align="left"><span class="rodape">
                      <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe noticias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                      </span>
                      <table width="100%" border="0">
                        <tr>
                          <td width="4%"><img src="ups/capasnoticia/<?php echo $n["foto"]; ?>" width="150" height="112" /></td>
                          <td width="96%" class="manchete_texto5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><font color="#000000"><b><?php echo $n["titulo"]; ?></b></font></td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                            </tr>
                            <tr>
                              <td><div align="justify"><font color="#000000"><?php echo $n["legenda"]; ?></font></div></td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                            </tr>
                            <tr>
                              <td><font color="#000000"><em>Data de Publicação: <?php echo $n["data"]; ?> <?php echo $n["hora"]; ?></em></font></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto" align="left">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center">
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
                        <form action="funcoesupload/script.php?id=<?php echo $n["id"]; ?>" method="post" enctype="multipart/form-data" class="manchete_texto5" id="form_imagens">
                          <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                          <div id="loading" class="fontetabela"> <img src="funcoesupload/assets/uploading.gif" alt="" /><br />
                            Carregando... </div>
                          <div id="status" class="hide">
                            <p> <a href="#" id="add-image"><img src="funcoesupload/assets/e1.jpg" border="0" /></a> &nbsp;&nbsp; <a href="#" id="clear-list"><img src="funcoesupload/assets/e2.jpg" border="0" /></a> &nbsp;&nbsp; <a href="#" id="upload-images"><img src="funcoesupload/assets/e3.jpg" border="0" /></a></p>
                            <div class="fontetabela"> <strong class="overall-title">Progresso Total</strong><br />
                              <img src="funcoesupload/assets/bar.gif" class="progress overall-progress" /> </div>
                            <div class="fontetabela"> <strong class="current-title">Arquivo atual</strong><br />
                              <img src="funcoesupload/assets/bar.gif" class="progress current-progress" /> </div>
                            <div class="current-text"></div>
                          </div>
                          <div id="images-list" align="left" class="fontetabela"></div>
                        </form>
                      </div></td>
                  </tr>
                </table>
                  <span style="MARGIN: 0px">
                    <?php
  }
  }
 ?>
                  </span></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>