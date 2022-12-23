<!-- dynamic assets -->
<style type="text/css">
#status
{
	padding:				10px 15px;
	width:					420px;
}
 
#status .progress
{
	background:				white url(progress.gif) no-repeat;
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
	width:					450px;
	margin:					0;
}
 
#images-list li.file
{
	border-bottom:			1px solid #E1E1E1;
	background-image: url(assets/file.png);
	background-repeat: no-repeat;
	background-position: 4px 4px;
}
#images-list li.file.file-uploading
{
	background-image:		url(uploading.gif);
	background-color:		#EFEFEF;
}
#images-list li.file.file-success
{
	background-image:		url(success.png);
}
#images-list li.file.file-failed
{
	background-image:		url(failed.png);
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
	width:					420px;
	text-align: 			center;
	font-weight: bold;
}

#loading img {
	vertical-align: middle;
}
img {
	border: 0px;
}
a {
	font-size: 11px;
	color: #333333;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #333333;
}
a:hover {
	text-decoration: none;
	color: #666666;
}
a:active {
	text-decoration: none;
	color: #333333;
}
body,td,th {
	font-family: Tahoma, Arial, Trebuchet MS;
	font-size: 11px;
}
</style>
	<script type="text/javascript" src="mootools-trunk.js"></script>
	<script type="text/javascript" src="Swiff.Uploader.js"></script>
	<script type="text/javascript" src="Fx.ProgressBar.js"></script>
	<script type="text/javascript" src="FancyUpload2.js"></script>

<script type="text/javascript">
window.addEvent('load', function() {
 
	var swiffy = new FancyUpload2($('status'), $('images-list'), {
		url: $('form_imagens').action,
		fieldName: 'photoupload',
		path: 'Swiff.Uploader.swf',
		onLoad: function() {
			$('loading').destroy();
			$('status').removeClass('hide');
			
			this.options.typeFilter = {'Imagens (*.jpg, *.jpeg, *.gif, *.png)': '*.jpg; *.jpeg; *.gif; *.png'};
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
<form action="script.php" method="post" enctype="multipart/form-data" id="form_imagens">

<div id="loading">
<img src="uploading.gif" alt="" /><br />Carregando...
</div>
	
<div id="status" class="hide">
<p>
<a href="#" id="add-image"><input name="Button" type="button" value="Procurar arquivos" /></a> |
<a href="#" id="clear-list"><input name="Button" type="button" value="Limpar a Lista" /></a> |
<a href="#" id="upload-images"><input type="submit" value="Enviar" /></a></p>
<p>


<div>

<strong class="overall-title">Progresso Total</strong><br />
<img src="bar.gif" class="progress overall-progress" />
</div>

<div>
<strong class="current-title">Arquivo atual</strong><br />
<img src="bar.gif" class="progress current-progress" />
</div>

<div class="current-text"></div>
</div>
 
<div id="images-list"></div>
</form>
</div>
<br /><br />
<a href=upload/download.php?file=teste.txt>Arquivo</a>
