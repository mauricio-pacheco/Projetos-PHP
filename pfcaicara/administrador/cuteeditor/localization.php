<?php 
include_once("cuteeditor_files/include_CuteEditor.php") ; 
?>
<html>	
    <head>
		<title>Built-in support for Dutch, Spanish, German ...: PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor, PHP Editor</title>
		<link rel="stylesheet" href="php.css" type="text/css" />		
		
    <style type="text/css">
			.swatch{ height:14px; width:80px; margin:2px; border:1px solid black; FONT-SIZE: 0.1em;}
		</style>
		<script type="text/javascript">

		function jumpTo(strMenu) {
			if (strMenu.value != "")
				window.location.href = window.location.pathname + "?CustomCulture=" + strMenu.value ;

			return true;
		}
		</script>
      <?php
          $CustomCulture = "en-en";
          if (@$_GET["CustomCulture"]!="")
	        {
		        $CustomCulture=$_GET["CustomCulture"];
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
					<h1>Built-in support for Dutch, Spanish, German ... </h1>
					<div class="infobox">
						This example shows you CuteEditor for PHP has built in support for multiple languages.  
					</div>

					<table id="RadioList" border="0" width="760">
						<tr>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("en-en", $CustomCulture) ;?> value="en-en" onclick="jumpTo(this)"/>
                  English(en)
                </td>
              <td>
                <input type="radio" name="RadioList" 
                  <?php echo Checked("fr-fr", $CustomCulture) ;?> value="fr-fr" onclick="jumpTo(this)" language="javascript" ID="Radio2"/>
                  French(fr)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("de-de", $CustomCulture) ;?> value="de-de" onclick="jumpTo(this)"/>
                German(de)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("es-es", $CustomCulture) ;?> value="es-es" onclick="jumpTo(this)"/>
                Spanish(es)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("it-it", $CustomCulture) ;?> value="it-it" onclick="jumpTo(this)"/>Italian 
								(it)
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("ja-jp", $CustomCulture) ;?> value="ja-jp" onclick="jumpTo(this)"/>Japanese 
								(jp)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("nl-nl", $CustomCulture) ;?> value="nl-nl" onclick="jumpTo(this)"/>Dutch 
								(nl)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("nb-no", $CustomCulture) ;?> value="nb-no" onclick="jumpTo(this)"/>Norwegian 
								(no)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("ru-ru", $CustomCulture) ;?> value="ru-RUru onclick="jumpTo(this)"/>Russian 
								(ru)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("zh-cn", $CustomCulture) ;?> value="zh-cn" onclick="jumpTo(this)"/>Chinese 
								(zh-cn)
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("sv-se", $CustomCulture) ;?> value="sv-se" onclick="jumpTo(this)"/>Swedish 
								(sv)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("pt-br", $CustomCulture) ;?> value="pt-br" onclick="jumpTo(this)"/>Portuguese 
								(pt)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("da-dk", $CustomCulture) ;?> value="da-dk" onclick="jumpTo(this)"/>Danish 
								(dk)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("tr-tr", $CustomCulture) ;?> value="tr-tr" onclick="jumpTo(this)"/>Turkish 
								(tr-TR)
							</td>
							<td>
								<input type="radio" name="RadioList" <?php echo Checked("he-il", $CustomCulture) ;?> value="he-il" onclick="jumpTo(this)"/>Hebrew 
								(he)
							</td>
							</tr>
						</table>
						<br />
          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text=$CustomCulture;
                $editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
				$editor->CustomCulture = $CustomCulture;
                $editor->Draw();
                $editor=null;
                
                //use $_POST["Editor1"]to retrieve the data
            ?>
						<br />
						<input type="submit" value="Submit"  ID="Submit1" NAME="Submit1" />
		</form>
	</body>
</html>>