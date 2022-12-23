<?php
require dirname(__FILE__).'/includes/functions.php';

$folder = $_GET["folder"];
$name = $_GET["name"];

//this var is used in header.php
//used in the javascript for dragging the <li> tags
$list = "pic";

require dirname(__FILE__).'/includes/header.php';

// get menu.xml file
$p =& new xmlParser();
$p->parse('../' . $folder . '/pics.xml');
$pictures = isset($p->output[0]['child']) ? $p->output[0]['child'] : array();
?>
 		<h1>Imagens da galeria <?php echo $name; ?></h1>
	  	<hr />
		<br>
		<form name="form_save" action="save_pictures.php" method="post" onsubmit="return save_pics('pic_list');">
		<input type="hidden" name="folder" value="<?php echo $folder; ?>">
		<input type="hidden" name="gallery" value="<?php echo $name; ?>">
		<input type="hidden" name="pic_names" value="">
		<input type="hidden" name="pic_descs" value="">
		<input type="hidden" name="pic_deletes" value="">
		<p><input type="submit" value="CONFIRMAR COMANDOS"/></p>
		<ul id="pic_list" class="sortable boxy">
			<?php print_pictures($pictures, $folder); ?>
		</ul>
		<p><input type="submit" value="CONFIRMAR COMANDOS"/></p>
		</form>
		<script language="JavaScript" type="text/javascript"><!--
			<?php print_pic_vars($pictures); ?>
		//-->
		</script>
<?php

require dirname(__FILE__).'/includes/footer.php';

function print_pictures($pics, $folder){
	$pics_html = "";
	$count = 0;
	
	$template = '<li id="pic_%NUM%">
				<div class="handle2"></div>
				<table class="text">
					<tr>
						<td valign="middle" class="pic_box"><img src="../%FOLDER%/thumbs/%NAME%" border="0"></td>
						<td class="pic_content" valign="top">
							<span class="pic_name">%NAME%</span><input type="checkbox" name="delete_%NUM%">apagar<br>
							<textarea name="desc_%NUM%" class="pic_desc" onBlur="this.className=\'pic_desc\'" onFocus="this.className=\'pic_desc_on\'">%DESC%</textarea>
						</td>
					</tr>
				</table>
			</li>';
	//array of vars used in template
	$pic_vars = array("%NUM%", "%NAME%", "%FOLDER%", "%DESC%");
	
	foreach ($pics as $pic){
		//array of replacement values for template		
		$pic_values = array($count+1, $pics[$count]['attrs']['LOCATION'], $folder , $pics[$count]['attrs']['DESC']);
		$pics_html .= str_replace($pic_vars, $pic_values, $template);
		
		++$count;
	}
	echo $pics_html;
}

function print_pic_vars($pics){
	$count = 1;
	foreach ($pics as $pic){
		echo("var pic_$count = \"" . $pic['attrs']['LOCATION'] . "\";\r\n");
		//var folder_3 = "balh";
		++$count;
	}
}
?>