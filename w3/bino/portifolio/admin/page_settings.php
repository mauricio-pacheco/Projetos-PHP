<?php
require dirname(__FILE__).'/includes/functions.php';

require dirname(__FILE__).'/includes/header.php';

// get menu.xml file
$p =& new xmlParser();
$p->parse('../settings.xml');
$settings = $p->output[0]['child'];

$popups = $settings[8]['content'];

?>
		<h1>Settings</h1>
	  	<hr />
        <form action="save_settings.php" method="post">
          <p>All colors are in Hex format. Do not include # sign before color.</p>
          <p>border color around gallery (bordercolor):<br>
            <input name="border" type="text" id="border"  value="<?php echo $settings[0]['content']; ?>">
          </p>
          <p>text color in gallery (textcolor):<br>
            <input name="text" type="text" id="text" value="<?php echo $settings[1]['content']; ?>">
          </p>
          <p>text color of menu items (navtextcolor):<br>
            <input name="navtext" type="text" id="navtext" value="<?php echo $settings[2]['content']; ?>">
          </p>
          <p>background color of menu items (navbgcolor):<br>
            <input name="navbg" type="text" id="navbg" value="<?php echo $settings[3]['content']; ?>">
          </p>
          <p>background gradient color when menu item is rolled over (navgradcolor):<br>
            <input name="navgrad" type="text" id="navgrad" value="<?php echo $settings[4]['content']; ?>">
          </p>
          <p> border color of thumbnails (thumbbordercolor):<br>
            <input name="thumbborder" type="text" id="thumbborder" value="<?php echo $settings[5]['content']; ?>">
          </p>
          <p>background color of thumbnails (thumbbgcolor):<br>
            <input name="thumbbg" type="text" id="thumbbg" value="<?php echo $settings[6]['content']; ?>">
          </p>
          <p>background color of gallery where thumbnails are shown (mainbgcolor):<br>
            <input name="mainbg" type="text" id="mainbg" value="<?php echo $settings[7]['content']; ?>">
          </p>
          <p>Enable images to be opened in new window? (popups)<br>
            <input type="radio" name="popups" value="true" <?php if($popups == "true") echo 'checked'; ?>>
            Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="popups" value="false" <?php if($popups == "false") echo 'checked'; ?>>
            No </p>
          <p>Name of jpeg or swf file to be loaded as a splash screen. It must 
            be uploaded to the gallery folder and should be 609px wide by 368px 
            high.<br>
            <input name="splash" type="text" id="splash" value="<?php echo $settings[9]['content']; ?>">
          </p>
          <p>
            <input type="submit" value="Save Settings"/>
          </p>
		</form>
		<img src="common/help_settings.jpg" width="463" height="450">
<?php
require dirname(__FILE__).'/includes/footer.php';
?>