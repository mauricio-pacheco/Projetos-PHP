<?php
require dirname(__FILE__).'/includes/functions.php';
require dirname(__FILE__).'/includes/header.php';
?>
		<h1>Help</h1>
	  	<hr />
        <p><strong>1. TWO NO NO's</strong></p>
        <p><strong>Don't use quotation marks </strong>in the descriptions of your 
          pictures or in the gallery names. It will cause the xml file to be malformed 
          and then you will have to download the right xml file off the server, 
          correct it, and upload it.</p>
        <p><strong>Just avoid weird characters in general</strong>. Like &lt;, 
          &gt;, single quotes, quotation marks and backslashes. They can cause 
          problems. Eventually I will probably have PHP check for these characters 
          and throw an error back to the user.</p>
        <p>&nbsp;</p>
        <p><strong>2. SORTING</strong></p>
        <p>You can change the order of your galleries or pictures by clicking 
          on them and dragging them up or down. The dimpled handles at the left 
          are used to signify that they can be dragged, but it works from anywhere.</p>
<?php
require dirname(__FILE__).'/includes/footer.php';
?>