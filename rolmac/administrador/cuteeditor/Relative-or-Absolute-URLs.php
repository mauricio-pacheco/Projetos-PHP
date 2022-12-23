<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
	  <title>Relative or Absolute URLs, which do you prefer? -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
      <link rel="stylesheet" href="php.css"  type="text/css" />
      <script type="text/javascript">
	      function jumpTo(strMenu) {
		      if (strMenu.value != "")
				window.location.href = window.location.pathname + "?URLType=" + strMenu.value ;
		      return true;
	      }
		  </script>
      <?php
          $URLType = "Default";
          if (@$_GET["URLType"]!="")
	        {
		        $URLType=$_GET["URLType"];
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
      <h1>Relative or Absolute URLs, which do you prefer?</h1>
      <p>With Cute Editor, you have the choice of using either relative or absolute URL.</p>
      <br />
      <table border="0">
        <tr>
          <td><input type="radio" name="RadioList" <?php echo Checked("Default", $URLType) ;?> value="Default" onclick="jumpTo(this)" />Default</td>
          <td><input type="radio" name="RadioList" <?php echo Checked("SiteRelative", $URLType) ;?> value="SiteRelative" onclick="jumpTo(this)" />SiteRelative Urls</td>
          <td><input type="radio" name="RadioList" <?php echo Checked("Absolute", $URLType) ;?> value="Absolute" onclick="jumpTo(this)" />Absolute Urls</td>
        </tr>
      </table>
      <br />
		 <?php
            $editor=new CuteEditor();
            $editor->ID="Editor1";
            $editor->Text="<div><a href=\"some.htm\">This is a relative path</a><br><br><a href=\"/some.htm\">This is a Site Root Relative path</a> <br><br><a href=\"Http://somesite/some.htm\">This is a absolute path.</a><br><br><a href=\"#tips\">This is a link to anchor.</a><br><br></div>";
            $editor->EditorBodyStyle="font:normal 12px arial;";
            $editor->EditorWysiwygModeCss="php.css";
			$editor->AutoConfigure = "Simple";
			$editor->ThemeType = "OfficeXp";
			$editor->URLType = $URLType;
            $editor->Draw();
            $editor=null;
            
            //use $_POST["Editor1"]to retrieve the data
        ?>
				
		</form>
	</body>
</html>