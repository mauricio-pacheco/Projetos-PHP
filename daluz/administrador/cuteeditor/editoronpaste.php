<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>
  <head>
    <title>Carriage Return Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
    <link rel="stylesheet" href="php.css" type="text/css" />

    <script type="text/javascript">

      function jumpTo(strMenu) {
      if (strMenu.value != "")
				window.location.href = window.location.pathname + "?EditorOnPaste=" + strMenu.value ;

      return true;
      }
    </script>

    <?php
          $EditorOnPaste = "Disabled";
          if (@$_GET["EditorOnPaste"]!="")
	        {
		        $EditorOnPaste=$_GET["EditorOnPaste"];
	        } 
          function Checked($value,$Checking_String)
          {
            if(strcasecmp($Checking_String,$value)==0)
            {
              return "checked";
            }
            else
            {
              return "";
            }
          }           
        ?>
  </head>
  <body>
    <form name="theForm" action="Get_HtmlContent.php" method="post">
      <h1>Handle pasted text</h1>
      <div>
        With Cute Editor, you can specify if formatting is stripped when text is pasted into the editor. <br/><br/>
      </div>
      <table border="0">
        <tr>
          <td>
            <input type="radio" name="RadioList" 
              <?php echo Checked("Disabled", $EditorOnPaste);?> value="Disabled" onclick="jumpTo(this)" />Disabled
            </td>
          <td>
            <input type="radio" name="RadioList" 
              <?php echo Checked("PasteText", $EditorOnPaste);?> value="PasteText" onclick="jumpTo(this)" />PasteText
            </td>
          <td>
            <input type="radio" name="RadioList" 
              <?php echo Checked("PastePureText", $EditorOnPaste);?> value="PastePureText" onclick="jumpTo(this)" />PastePureText
            </td>
          <td>
            <input type="radio" name="RadioList" 
              <?php echo Checked("PasteWord", $EditorOnPaste);?> value="PasteWord" onclick="jumpTo(this)" />PasteWord
            </td>
          <td>
            <input type="radio" name="RadioList" 
              <?php echo Checked("ConfirmWord", $EditorOnPaste);?> value="ConfirmWord" onclick="jumpTo(this)" />ConfirmWord
            </td>
          <td>
            <input type="radio" name="RadioList" 
              <?php echo Checked("PasteCleanHTML", $EditorOnPaste);?> value="PasteCleanHTML" onclick="jumpTo(this)" />PasteCleanHTML
            </td>
        </tr>
      </table>
      <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text="Type here";
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
				$editor->EditorOnPaste = $EditorOnPaste;
                $editor->Draw();
                $editor=null;
                
                //use $_POST["Editor1"]to retrieve the data
            ?>
    </form>
  </body>
</html>