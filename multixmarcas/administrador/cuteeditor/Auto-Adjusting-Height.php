<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		  <title>Relative or Absolute URLs, which do you prefer? -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
      <link rel="stylesheet" href="php.css"  type="text/css" />
      <script type="text/javascript">
	      function jumpTo(strMenu) {
		      if (strMenu.value != "")
				window.location.href = window.location.pathname + "?ResizeMode=" + strMenu.value ;
		      return true;
	      }
		  </script>
      <?php
          $ResizeMode = "AutoAdjust";
          if (@$_GET["ResizeMode"]!="")
	        {
		        $ResizeMode=$_GET["ResizeMode"];
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
		<h1>Editor Auto Adjusting Height</h1>
		This example shows how to use Editor.ResizeMode to make the Editor change it's height based on the content. 
		The Editor will now grow and shrink in height to match the content inside.
		<br><br>
      <table border="0">
        <tr>
          <td><input type="radio" name="RadioList" <?php echo Checked("AutoAdjust", $ResizeMode) ;?> value="AutoAdjust" onclick="jumpTo(this)"/>AutoAdjust</td>
          <td><input type="radio" name="RadioList" <?php echo Checked("ResizeCorner", $ResizeMode) ;?> value="ResizeCorner" onclick="jumpTo(this)"/>ResizeCorner</td>
          <td><input type="radio" name="RadioList" <?php echo Checked("PlusMinus", $ResizeMode) ;?> value="PlusMinus" onclick="jumpTo(this)" />PlusMinus</td>
          <td><input type="radio" name="RadioList" <?php echo Checked("None", $ResizeMode) ;?> value="Absolute" onclick="jumpTo(this)" />None</td>
        </tr>
      </table>
      <br />
      <?php
            $editor=new CuteEditor();
            $editor->ID="Editor1";
            $editor->Text="This is some more test text.<br>This is some more test text.<br>This is some more test text.<br>This is some more test text.<br>This is some more test text.<br>This is some more test text.<br>This is some more test text.<br>";
            $editor->EditorBodyStyle="font:normal 12px arial;";
            $editor->EditorWysiwygModeCss="php.css";
		    $editor->ResizeMode = $ResizeMode;
			$editor->AutoConfigure = "Simple";
            $editor->Draw();
            $editor=null;
            
            //use $_POST["Editor1"]to retrieve the data
        ?>
		</form>
	</body>
</html>