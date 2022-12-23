<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<link rel="stylesheet" href="php.css"  type="text/css" />
	</head>
    <body>
		
		<form name="theForm" action="Get_HtmlContent.php" method="post" ID="Form1">
					
		<h1>Enable All Toolbars</h1>
		
		<p>This example shows you all the predefined buttons. </p>
		<br />
        <?php
            $editor=new CuteEditor();
            $editor->ID="Editor1";
            $editor->Text="Type here";
            $editor->EditorBodyStyle="font:normal 12px arial;";
            $editor->EditorWysiwygModeCss="php.css";
            $editor->Draw();
            $editor=null;
            
            //use $_POST["Editor1"]to retrieve the data
        ?>
						
		</form>
	</body>
</html>