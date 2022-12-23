<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Add custom buttons Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />		
		 <script type="text/javascript" >
			function ShowMyDialog(button)
			{
				//use CuteEditor_GetEditor(elementinsidetheEditor) to get the cute editor instance
				var editor=CuteEditor_GetEditor(button);
				//show the dialog page , and pass the editor as newwin.dialogArguments
				//(handler,url,args,feature)
				var newwin=editor.ShowDialog(null,"My_Custom_Text.html?_rand="+new Date().getTime()
					,editor,"dialogWidth:400px;dialogHeight:240px");
			}
		</script>	   
	</head>
	 <body>
		<form name="theForm" action="Get_HtmlContent.php" method="post">
					<h1>Add custom buttons</h1>
					<div>This example shows you how easy it can be to add your own functions to the CuteEditor with the help of CuteEditor extended functionalities. </div>
					<br />

          <?php
              $editor=new CuteEditor();
              $editor->ID="Editor1";
              $editor->Text="Type here..";
              $editor->EditorBodyStyle="font:normal 12px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->ShowBottomBar=false;
              $editor->TemplateItemList="G_start,Bold,Italic,Underline,Separator,Holder,JustifyLeft,JustifyCenter,JustifyRight,Holder,G_end";
              $editor->Width=600;
              $editor->CustomAddons = "<img title=\"Using oncommand\" class=\"CuteEditorButton\" onmouseover=\"CuteEditor_ButtonCommandOver(this)\" onmouseout=\"CuteEditor_ButtonCommandOut(this)\" onmousedown=\"CuteEditor_ButtonCommandDown(this)\" onmouseup=\"CuteEditor_ButtonCommandUp(this)\" ondragstart=\"CuteEditor_CancelEvent()\" Command=\"MyCmd\" src=\"cuteeditor_files/Images/contact.gif\" />";
              $editor->Draw();
              $ClientID=$editor->ClientID();
              $editor=null;
              
              //use $_POST["Editor1"]to retrieve the data
          ?>
					<br />
					<input type="submit" value="Submit"  ID="Submit1" NAME="Submit1" /><br />
					
					<script language="JavaScript" type="text/javascript" >
		        var editor1=document.getElementById("<?php echo $ClientID;?>");

            function CuteEditor_OnCommand(editor,command,ui,value)
            {
              //handle the command by yourself
              if(command=="MyCmd")
              {
                //   editor.ExecCommand("InsertTable");
                editor1.PasteHTML("Hello World");
                return true;
              }
            }
        </script>
		</form>
	</body>
</html>