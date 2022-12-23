<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Edit Static Html Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
    <body>
	<form name="theForm" action="Edithtml.php?postback=true" method="post">
					<h1>Edit Static Html</h1>
					<div>
						This example demonstrates you can use Cute Editor to edit static html page. 
						<br />
						<br />
					</div>
					<br />
          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
            //  $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
                $editor->EditCompleteDocument=true;
                if (@$_GET["postback"]!="true")
	              {
		              $editor->LoadHTML("document.html");
                  $editor->Draw();
	              } 
                else
                {
		              $editor->SaveFile("document.html");
                  $editor->Draw();
                }
                $editor=null;
                
                //use $_POST["Editor1"]to retrieve the data
            ?>
                <textarea name="textbox1" rows="2" cols="20" id="textbox1" style="font-family:Arial;height:250px;width:730px;">
<?php echo @stripslashes($_POST["Editor1"]) ;?>
            </textarea>	
		</form>
	</body>
</html>