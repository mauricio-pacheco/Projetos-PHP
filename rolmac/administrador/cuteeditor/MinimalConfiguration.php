<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Minimal Configuration: PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor, PHP Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	 <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
		<h1>Minimal Configuration</h1>
		<div class="infobox">
			This example shows you the Minimal Configuration of editor.
		</div>
		<br />
          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text="<b><em><u>Easy to Install, Easy to Use</u></em></b><br />";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
		        $editor->AutoConfigure="Minimal";
                $editor->Draw();
                $editor=null;                
                //use $_POST["Editor1"]to retrieve the data
            ?>
		</form>
	</body>
</html>

