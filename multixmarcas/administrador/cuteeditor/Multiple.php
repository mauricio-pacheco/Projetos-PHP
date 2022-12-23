<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>
  <head>
    <title>Multiple Editors Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
    <link rel="stylesheet" href="php.css"  type="text/css" />
  </head>
  <body>
    <form name="theForm" action="Get_HtmlContent.php" method="post">
      <h1>Multiple Editors Example</h1>
      <div class="infoBox">
        Need to handle mutliple rich-text fields on one page? It's easy with CuteEditor! Check out the sample below to see how 2 instances placed on a single page.
      </div>
      <br />
      <?php
              $editor=new CuteEditor();
              $editor->ID="Editor1";
              $editor->Text="<p><span style='color:#cc0000;'><b>This paragraph will be edited by the first instance...</b> </span></p>";
              $editor->EditorBodyStyle="font:normal 12px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->ThemeType="Office2003";
              $editor->Height=250;
              $editor->Draw();
              $editor=null;
              
              echo "<br /><br />";                
              
              $editor=new CuteEditor();
              $editor->ID="Editor2";
              $editor->subsequent=true;
              $editor->Text="<p><span style='color:#008000;'><b>This paragraph will be edited by the second instance...</b> </span></p>";
              $editor->EditorBodyStyle="font:normal 12px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->AutoConfigure="Simple";
              $editor->Height=150;
              $editor->Draw();
              $editor=null;
              
              //use $_POST["Editor1"]to retrieve the data
          ?>

      <input type="submit" value="Update" ID="Submit1" NAME="Submit1">
      </form>
  </body>
</html>