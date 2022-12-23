<?php
require dirname(__FILE__).'/includes/functions.php';

//this var is used in header.php
//used in the javascript for dragging the <li> tags
$list = "gallery";

require dirname(__FILE__).'/includes/header.php';

// get menu.xml file
$p =& new xmlParser();
$p->parse('../menu.xml');
$galleries = isset($p->output[0]['child']) ? $p->output[0]['child'] : array();

//$valid_user = $config[0]['content'];
//$valid_pass = $config[1]['content'];

//echo "<br><br>" . $menu[0]['attrs'][NAME] . "<br>";
//echo $menu[0]['attrs'][FOLDER];
//print_r(array_values($p->output[0]['child'][0]['content']));
//print_r(array_values($p->output[0]['child']));


?>
		<h1>Galerias</h1>
	  	<hr />
		<form name="form_new" action="new_gallery.php" method="post">
			<input type="hidden" name="new_name" value="">
			<a href="javascript:new_gallery()">Adicionar nova galeria</a>
		</form>
		<form name="form_save" action="save_galleries.php" method="post" onsubmit="return save_gal('gallery_list');">
			<input type="hidden" name="gal_names" value="">
			<input type="hidden" name="gal_folders" value="">
			<input type="hidden" name="gal_deletes" value="">
			<ul id="gallery_list" class="sortable boxy">
				<?php print_galleries($galleries); ?>
			</ul>
			<p><input type="submit" value="CONFIRMAR COMANDOS"/></p>
		</form>
		<script language="JavaScript"><!--
			<?php print_folders($galleries); ?>
		//-->
		</script>
<?php
require dirname(__FILE__).'/includes/footer.php';

function print_galleries($gals){
	$gals_html = "";
	$count = 0;
	$template = '<li id="gal_%NUM%">
				<div class="handle"></div>
				<div class="text" id="gal_info">
					<input name="name_%NUM%" type="text" value="%NAME%" class="input_gal" />
					<span class="delete"><input type="checkbox" name="delete_%NUM%">apagar</span>
					<span class="pic_edit"><input type="button" value="Editar Fotos" onclick="location.href=\'page_pictures.php?name=%NAME%&folder=%FOLDER%\';"/></span>
					<input type="button" value="Enviar Fotos" onclick="showUpload(\'%NAME%\',\'%FOLDER%\'); return false;"/>
				</div>
			</li>';
			
	//array of vars used in template
	$gal_vars = array("%NUM%", "%NAME%", "%FOLDER%");
	
	foreach ($gals as $gal){
		//array of replacement values for template		
		$gal_values = array($count+1, $gals[$count]['attrs']['NAME'], $gals[$count]['attrs']['FOLDER']);
		$gals_html .= str_replace($gal_vars, $gal_values, $template);
		
		++$count;
	}
	echo $gals_html;
}

function print_folders($gals){
	$count = 1;
	foreach ($gals as $gal){
		echo("var folder_$count = \"" . $gals[$count-1]['attrs']['FOLDER'] . "\";\r\n");
		//var folder_3 = "balh";
		++$count;
	}
}

?>