<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Use CuteEditor as an image selector -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
    <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
					<h1>Use CuteEditor as an image selector</h1>
					<hr />
					<div class="infoBox">This example demonstrates how to use CuteEditor as an image selector.</div>
					<br />
		            <input name="imageFld" type="text" id="imageFld" style="width:300px;" /> 
		            <input name="Change" id="Change" type="button" value="Change Image" onclick="callInsertImage()" />   
						<br />
          <?php
              $editor=new CuteEditor();
              $editor->ID="Editor1";
              $editor->Text="";
              $editor->ShowBottomBar=false;
              $editor->AutoConfigure="None";
              $editor->ThemeType="OfficeXP";
              $editor->Width=400;
              $editor->Height=300;
              $editor->Draw();
              $ClientID=$editor->ClientID();
              $editor=null;
              
              //use $_POST["Editor1"]to retrieve the data
          ?>
						<br/><br/>					
			
           <Script Language="javascript"> 
                function callInsertImage()  
                {  
                    var editor1 = document.getElementById('<?php echo $ClientID;?>');
                    editor1.FocusDocument();  
                    var editdoc = editor1.GetDocument();  
                    editor1.ExecCommand('new');
                    editor1.ExecCommand('ImageGalleryByBrowsing');
                    InputURL();
                    document.getElementById("imageFld").focus(); 
                }    
                
                function InputURL()
                { 
                  var editor1 = document.getElementById('<?php echo $ClientID;?>');
                    var editdoc = editor1.GetDocument();  
                    var imgs = editdoc.getElementsByTagName("img");
                    if(imgs.length>0)  
                    {	
                      document.getElementById("imageFld").value = imgs[imgs.length-1].src;
                    }  
                    else
                    {
                      setTimeout(InputURL,500); 
                    }  
                }       
            </script> 	
		</form>
	</body>
</html>