<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>
  <head>
    <title>Read Only Support Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
    <link rel="stylesheet" href="php.css"  type="text/css" />
  </head>
  <body>
    <form name="theForm" action="Get_HtmlContent.php" method="post">
      <h1>Read Only Support</h1>
      <div class="infoBox">
        This example show you you can set <span style="color:#cc0000">
          <b>ReadOnly</b>
        </span>
        property to true if you would like to display read-only content in the Cute
        Editor in some situations.
      </div>
      <br />
      <?php
          $editor=new CuteEditor();
          $editor->ID="Editor1";
          $editor->Text="Type Here";
          $editor->EditorBodyStyle="font:normal 12px arial;";
          $editor->EditorWysiwygModeCss="php.css";
		  $editor->AutoConfigure = "Simple";
		  $editor->ReadOnly = true;
          $editor->Draw();
          $editor=null;
          
          //use $_POST["Editor1"]to retrieve the data
      ?>
    </form>
  </body>
</html>