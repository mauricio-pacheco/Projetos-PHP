<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Full screen mode Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	 <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
		<h1>Full screen mode</h1>
		<div class="infoBox">
			Full screen mode button (<img class="CuteEditorButton" title="Fit to Window" src="cuteeditor_files/Themes/Office2007/Images/fit.gif" align="absMiddle" /> ) allows you to stretch the Cute Editor control to the width and height of your browser window. <br />
		</div>
		<br />
       <?php
            $editor=new CuteEditor();
            $editor->ID="Editor1";
            $editor->Text="Type Here"; 	
            $editor->EditorBodyStyle="font:normal 12px arial;";
            $editor->EditorWysiwygModeCss="php.css";
	        $editor->FullPage=true;
            $editor->Draw();
            $editor=null;
            
            //use $_POST["Editor1"]to retrieve the data
        ?>
		</form>
	</body>
</html>