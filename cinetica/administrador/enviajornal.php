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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR JORNAL DIGITAL</b></font></td>
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
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="fontetabela"><?php 
				$id = $_GET['id'];
				$pasta = $_GET['pasta'];
				
				include "conexao.php";
				
				$sql = mysql_query("SELECT * FROM cw_edicoes WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe edições cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
				?>
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" valign="top"><img src="ups/capasedicoes/<?php echo $n["foto"]; ?>" /></td>
        <td width="95%" valign="top"><table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td><font color="#000000"><b><?php echo $n["edicao"]; ?></b></font></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="3" /></td>
          </tr>
          <tr>
            <td><font color="#000000">Data da Edição: <?php echo $n["diaed"]; ?></font></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

                <!-- dynamic assets -->
<style type="text/css">
#status
{
	padding:				10px 15px;
	width:					100%;
}
 
#status .progress
{
	background:				white url(funcoesjornal/progress.gif) no-repeat;
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
	border-bottom:			1px solid #FFFFFF;
	background-image: url(funcoesjornal/file.png);
	background-repeat: no-repeat;
	background-position: 4px 4px;
}
#images-list li.file.file-uploading
{
	background-image:		url(funcoesjornal/uploading.gif);
	background-color:		#FFFFFF;
}
#images-list li.file.file-success
{
	background-image:		url(funcoesjornal/success.png);
}
#images-list li.file.file-failed
{
	background-image:		url(funcoesjornal/failed.png);
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
</style>
	<script type="text/javascript" src="funcoesjornal/mootools-trunk.js"></script>
	<script type="text/javascript" src="funcoesjornal/Swiff.Uploader.js"></script>
	<script type="text/javascript" src="funcoesjornal/Fx.ProgressBar.js"></script>
	<script type="text/javascript" src="funcoesjornal/FancyUpload2.js"></script>

<script type="text/javascript">
window.addEvent('load', function() {
 
	var swiffy = new FancyUpload2($('status'), $('images-list'), {
		url: $('form_imagens').action,
		fieldName: 'photoupload',
		path: 'funcoesjornal/Swiff.Uploader.swf',
		onLoad: function() {
			$('loading').destroy();
			$('status').removeClass('hide');
			
			this.options.typeFilter = {'Imagens (*.zip)': '*.zip'};
		},
		limitFiles: 50,
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
<form action="funcoesjornal/script.php?pasta=<?php echo $n["pasta"]; ?>" method="post" enctype="multipart/form-data" id="form_imagens">
<input type="hidden" name="pasta" value="<?php echo $n["pasta"]; ?>" />
<div id="loading">
<img src="funcoesjornal/uploading.gif" alt="" /><br />Carregando...
</div>
	
<div id="status" class="hide">
<p>
<a href="#" id="add-image"><input name="Button" class="fontetabela" type="button" value="PROCURAR ARQUIVO" /></a>&nbsp;&nbsp;
<a href="#" id="clear-list"><input name="Button" class="fontetabela" type="button" value="LIMPAR" /></a>&nbsp;&nbsp;
<a href="#" id="upload-images"><input type="submit" class="fontetabela" value="ENVIAR" /></a></p><br />
<p>


<div>

<strong class="overall-title">Progresso Total</strong><br />
<img src="funcoesjornal/bar.gif" class="progress overall-progress" />
</div>

<div>
<strong class="current-title">Arquivo atual</strong><br />
<img src="funcoesjornal/bar.gif" class="progress current-progress" />
</div>

<div class="current-text"></div>
</div>
 
<div id="images-list"></div>
</form>
</div><?php
  }
  }
 ?>

				</td>
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