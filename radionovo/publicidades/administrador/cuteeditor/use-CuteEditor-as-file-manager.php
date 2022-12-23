<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Use CuteEditor as File Picker -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
    <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
					<h1>Use CuteEditor as a File Picker</h1>
					<hr />
					<div class="infoBox">This example demonstrates how to use CuteEditor as an image selector.</div>
					<br />
		      <input name="docFld" type="text" id="docFld" style="width:300px;" /> 
		      <input name="Change" id="Change" type="button" value="File Picker" onclick="callInsertImage()" />   
				  <br />
          
          <?php
              $editor=new CuteEditor();
              $editor->ID="Editor1";
              $editor->Text="";
              $editor->ShowBottomBar=false;
              $editor->AutoConfigure="None";
              $editor->ThemeType="OfficeXp";
              $editor->Width=1;
              $editor->Height=1;
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
                    editor1.ExecCommand('insertdocument');
                    InputURL();
                    document.getElementById("docFld").focus(); 
                }    
                
                function InputURL()
                { 
                    var editor1 = document.getElementById('CE_Editor1_ID');
                    var editdoc = editor1.GetDocument();  
                    var links = editdoc.getElementsByTagName("a");
                  if(links.length>0&&links[links.length-1].href!="")  
                    {	
                      document.getElementById("docFld").value = links[links.length-1].href;
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