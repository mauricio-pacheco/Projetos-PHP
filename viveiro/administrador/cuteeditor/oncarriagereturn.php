<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
	 <title>Carriage Return Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
      <link rel="stylesheet" href="php.css"  type="text/css" />

      <script type="text/javascript">

        function jumpTo(strMenu) {
        if (strMenu.value != "")
				window.location.href = window.location.pathname + "?BreakElement=" + strMenu.value ;

        return true;
        }
      </script>

      <?php
          $BreakElement = "div";
          if (@$_GET["BreakElement"]!="")
	        {
		        $BreakElement=$_GET["BreakElement"];
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
					<h1>&lt;div&gt;,&lt;p&gt; or &lt;br&gt;, which do you prefer?</h1>
					<p>
					    With Cute Editor, you can defines what happens when the "enter" key is pressed in the editor in the <b>BreakElement</b> property.<br/><br/>
					</p>		
					<table id="RadioList" border="0">
						<tr>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("p", $BreakElement) ;?> value="p" onclick="jumpTo(this)" />P </td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("br", $BreakElement) ;?> value="br" onclick="jumpTo(this)" />BR</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("div", $BreakElement) ;?> value="oncarriagereturn.php" onclick="jumpTo(this)" />DIV</td>
						</tr>
					</table>
          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text=$BreakElement;
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
			    $editor->AutoConfigure = "Simple";
				$editor->BreakElement = $BreakElement;
                $editor->Draw();
                $editor=null;
                
                //use $_POST["Editor1"]to retrieve the data
            ?>
	</form>
	</body>
</html>