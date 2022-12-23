<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Content management with templates -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
    <body>
	<form name="theForm" action="Edithtml.php?postback=true" method="post">
					<h1>Content management with templates </h1>
					<div>
						The basic idea behind a Content Management System (<b>CMS</b>) is to separate 
the management of content from design. Cute Editor allows the site designer to 
easily create and establish <b>templates</b> to give the site a uniform look. 
Templates may be modified when desired. 

						<br />
						<br />
					</div>
					<br />
		<?php
            $editor=new CuteEditor();
            $editor->ID="Editor1";
            $editor->EditorBodyStyle="font:normal 12px arial;";
            $editor->EditorWysiwygModeCss="php.css";
            $editor->LoadHTML("template.htm");
            $editor->Draw();
            $editor=null;
            
            //use $_POST["Editor1"]to catch the data 
        ?>
        
        </form>
	</body>
</html>