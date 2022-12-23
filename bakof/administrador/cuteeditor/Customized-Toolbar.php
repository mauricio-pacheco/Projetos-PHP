<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Cute Editor for PHP: PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor, PHP Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	 <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
			<h1>Customized Toolbar Example</h1>	
			<hr />						
			<div class="infobox">Developers can personalize the toolbar by playing with Template property. </div>
			<br />
          <?php
              $editor=new CuteEditor();
              $editor->ID="Editor1";
              $editor->Text="Type here..";
              $editor->EditorBodyStyle="font:normal 12px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->ShowBottomBar=false;
              $editor->TemplateItemList="G_start,Bold,Italic,Underline,Separator,JustifyLeft,JustifyCenter,JustifyRight,Holder,G_end";
              $editor->Width=600;
              $editor->Draw();
              $editor=null;
              
              //use $_POST["Editor1"]to retrieve the data
          ?>
		</form>
	</body>
</html>