<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Built in theme support -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	 <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
					<h1>Built in theme support</h1>
					<div class="infoBox">
					Cute Editor provides several built in themes that are ready to use. You can 
choose from several predefined themes or create your own. 
					</div>
					<br />

          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text="Office2007";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
				$editor->AutoConfigure = "Simple";
				$editor->Height = 150;
                $editor->Draw();
                $editor=null;                
                //use $_POST["Editor1"]to retrieve the data
                echo "<br />";
                
                $editor=new CuteEditor();
                $editor->ID="Editor2";
                $editor->subsequent=true;
                $editor->Text="Office2003Blue";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
			    $editor->AutoConfigure = "Simple";
			    $editor->ThemeType = "Office2003Blue";
			    $editor->Height = 150;
                $editor->Draw();
                $editor=null;                
                //use $_POST["Editor2"]to retrieve the data
                echo "<br />";
                
                $editor=new CuteEditor();
                $editor->ID="Editor3";
                $editor->subsequent=true;
                $editor->Text="Office2003";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
			    $editor->AutoConfigure = "Simple";
			    $editor->ThemeType = "Office2003";
			    $editor->Height = 150;
                $editor->Draw();
                $editor=null;                
                //use $_POST["Editor3"]to retrieve the data
                echo "<br />";
                
                $editor=new CuteEditor();
                $editor->ID="Editor4";
                $editor->subsequent=true;
                $editor->Text="OfficeXp";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
				$editor->AutoConfigure = "Simple";
				$editor->ThemeType = "OfficeXp";
				$editor->Height = 150;
                $editor->Draw();
                $editor=null;                
                //use $_POST["Editor4"]to retrieve the data
            ?>						
			<br />
			<input type="submit" value="Update" ID="Submit1" NAME="Submit1">
		</form>
	</body>
</html>