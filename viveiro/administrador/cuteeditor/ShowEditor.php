<?php

	include('cuteeditor_files/include_CuteEditor.php');
	$editor = new CuteEditor();
	$editor->ID = 'description';
	$editor->Text = '<strong>Text from MySQL database</strong>';
	$editor->FilesPath = 'cuteeditor_files';
	
?>
<form id="formid">
  <div>
    <p>
      <?php
        $editor->Draw(); 
        $editor = null; /* Inserts and initializes the textarea */ 
      ?>		
    </p>
  </div>
</form>