<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Support output well-formed HTML and XHTML -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	<body>
		<form name="theForm" action="xmloutput.php?postback=true" method="post">
					<h1>Support output well-formed HTML and XHTML</h1>
					<div>This example shows you CuteEditor supports output well-formed XHTML. Your choice of XHTML 1.0 or HTML 4.01 output. </div>
						<br />
          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text="Type here";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
							  $editor->XHTMLOutput = true;
                $editor->Draw();
                $editor=null;
                
                //use $_POST["Editor1"]to retrieve the data
            ?>

          <textarea name="textbox1" rows="2" cols="20" id="textbox1" style="font-family:Arial;height:250px;width:730px;">
<?php echo stripslashes(@$_POST["Editor1"]) ;?>
          </textarea>
		</form>
	</body>
</html>