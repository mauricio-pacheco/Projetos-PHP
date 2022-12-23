<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>JavaScript API -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	 <body>
	<form name="theForm" action="Get_HtmlContent.php" method="post">
	   <table cellspacing="0" cellpadding="3" width="900" border="0" class="tbmain">
			<tr>			
				<td style="width:10px">&nbsp;</td>
				<td>	
					<h1>JavaScript API</h1>
					<div class="infoBox">This example shows you how to use CuteEditor JavaScript API to customize the application.</div>
					<br />
          <?php
              $editor=new CuteEditor();
              $editor->ID="Editor1";
              $editor->Text="Type here..";
              $editor->EditorBodyStyle="font:normal 12px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->ShowBottomBar=false;
              $editor->TemplateItemList="Save,Bold,Italic,Underline,InsertChars,InsertEmotion";
              $editor->Width=560;
              $editor->Height=250;
              $editor->Draw();
              $ClientID=$editor->ClientID();
              $editor=null;
              
              //use $_POST["Editor1"]to retrieve the data
          ?>
          
					<br/><br/>
					<textarea cols=60 rows=5 id=myTextArea style="width:550px" NAME="myTextArea">Try click the "get HTML" button</textarea>
					<br/><br/>									
					<p style="width:600">			
					<input type="button" value="get HTML" onclick="getHTML()" ID="Button1" /> 
					<input type="button" value="set HTML" onclick="setHTML()" ID="Button2" />
					<input type="button" value="insert HTML" onclick="PasteHTML('This is a test!')" />	
					<input type="button" value="set ActiveTab to Code" onclick="SetActiveTab('Code')" />	
					<input type="button" value="set Focus" onclick="setFocus()" />
					<input type="button" value="attach Event (onkeypress)" onclick="CE_attachEvent()" />  
					<input type="button" value="detach Event (onkeypress)" onclick="CE_detachEvent()" />
					</P>
					<br>			
					<select id="Commands">
						<option value="Cut">Cut</option>
						<option value="Copy">Copy</option>
						<option value="Delete">Delete</option>
						<option value="InsertParagraph">InsertParagraph</option>
						<option value="Bold">Bold</option>
						<option value="Italic">Italic</option>
						<option value="Underline">Underline</option>
						<option value="InsertOrderedList">InsertOrderedList</option>
						<option value="InsertUnorderedList">InsertUnorderedList</option>
						<option value="Indent">Indent</option>
						<option value="Outdent">Outdent</option>
						<option value="Superscript">Superscript</option>
						<option value="Subscript">Subscript</option>
						<option value="StrikeThrough">StrikeThrough</option>
						<option value="Unlink">Unlink</option>
						<option value="SelectAll">SelectAll</option>
						<option value="tabedit">tabedit</option>
						<option value="tabcode">tabcode</option>
						<option value="tabview">tabview</option>
						<option value="ucase">ucase</option>
						<option value="lcase">lcase</option>
						<option value="break">break</option>
						<option value="undo">undo</option>
						<option value="redo">redo</option>
						<option value="This is a test">pastehtml</option>
						<option value="This is a test">pastetext</option>
						<option value="This is a test">paste</option>
						<option value="This is a test">pasteword</option>
						<option value="cleancode">cleancode</option>
						<option value="inserttext">inserttext</option>
						<option value="insertfieldset">insertfieldset</option>
						<option value="toggleborder">toggleborder</option>
						<option value="imagegallerybybrowsing">imagegallerybybrowsing</option>
						<option value="insertimage">insertimage</option>
						<option value="insertmedia">insertmedia</option>
						<option value="insertflash">insertflash</option>
						<option value="insertdocument">insertdocument</option>
						<option value="inserttemplate">inserttemplate</option>
						<option value="tabledropdown">tabledropdown</option>
						<option value="inserttable">inserttable</option>
						<option value="insertleftcolumn">insertleftcolumn</option>
						<option value="insertcolumnleft">insertcolumnleft</option>
						<option value="insertcolumn">insertcolumn</option>
						<option value="insertrightcolumn">insertrightcolumn</option>
						<option value="insertcolumnright">insertcolumnright</option>
						<option value="inserttoprow">inserttoprow</option>
						<option value="insertrowtop">insertrowtop</option>
						<option value="insertrow">insertrow</option>
						<option value="insertbottomrow">insertbottomrow</option>
						<option value="insertrowbottom">insertrowbottom</option>
						<option value="deleterow">deleterow</option>
						<option value="deletecolumn">deletecolumn</option>
						<option value="insertcell">insertcell</option>
						<option value="deletecell">deletecell</option>
						<option value="editrow">editrow</option>
						<option value="editcell">editcell</option>
						<option value="mergeright">mergeright</option>
						<option value="mergebottom">mergebottom</option>
						<option value="horsplitcell">horsplitcell</option>
						<option value="versplitcell">versplitcell</option>
						<option value="insertform">insertform</option>
						<option value="inserttextbox">inserttextbox</option>
						<option value="insertlistbox">insertlistbox</option>
						<option value="insertdropdown">insertdropdown</option>
						<option value="insertradiobox">insertradiobox</option>
						<option value="insertcheckbox">insertcheckbox</option>
						<option value="insertinputtext">insertinputtext</option>
						<option value="insertinputimage">insertinputimage</option>
						<option value="insertinputsubmit">insertinputsubmit</option>
						<option value="insertinputreset">insertinputreset</option>
						<option value="insertinputbutton">insertinputbutton</option>
						<option value="insertinputpassword">insertinputpassword</option>
						<option value="insertinputhidden">insertinputhidden</option>
						<option value="help">help</option>
						<option value="red">forecolor</option>
						<option value="yellow">backcolor</option>
						<option value="150">zoom</option>
						<option value="normal">cssclass</option>
						<option value="color:red">cssstyle</option>
						<option value="Arial">fontname</option>
						<option value="3">fontsize</option>
						<option value="removeformat">removeformat</option>
						<option value="justifyleft">justifyleft</option>
						<option value="justifycenter">justifycenter</option>
						<option value="justifyright">justifyright</option>
						<option value="justifyfull">justifyfull</option>
						<option value="justifynone">justifynone</option>
						<option value="inserttime">inserttime</option>
						<option value="insertdate">insertdate</option>
						<option value="bringforward">bringforward</option>
						<option value="bringbackward">bringbackward</option>
						<option value="sizeplus">sizeplus</option>
						<option value="sizeminus">sizeminus</option>
						<option value="documentpropertypage">documentpropertypage</option>
						<option value="netspell">netspell</option>
						<option value="Http://CuteSoft.net">insertlink</option>
						<option value="find">find</option>
						<option value="insertchars">insertchars</option>
						<option value="insertemotion">insertemotion</option>
						<option value="fullpage">fullpage</option>
						<option value="tofullpage">tofullpage</option>
						<option value="fromfullpage">fromfullpage</option>
					</select>						
					<input type="button" value="ExecCommand" onclick="ExecCommand()" />
					
					
			<script type="text/javascript" >
			function getHTML()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				// Get the editor HTML
				document.getElementById("myTextArea").value = editor1.getHTML();
			}		
			
			function setHTML()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				// Set the editor 
				editor1.setHTML(document.getElementById("myTextArea").value);
			}
			
			
			function PasteHTML(html)
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				editor1.PasteHTML(html);
			}
			
			function SetActiveTab(tab)
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				editor1.SetActiveTab(tab);
			}
			
			
			function setFocus()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				editor1.FocusDocument();
			}
			
			
			function ExecCommand()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				var CommandObj = document.getElementById('Commands');
				var cmd = CommandObj.options[CommandObj.selectedIndex].text;
				var val = CommandObj.options[CommandObj.selectedIndex].value;
				editor1.ExecCommand(cmd,false,val);
			}
			
			function CE_attachEvent()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				//Get the editor content  
				var editdoc=editor1.GetDocument(); 

				// attach Event
				if(editdoc.attachEvent)
					editdoc.attachEvent('onkeypress',HandleChange);
				else if(editdoc.addEventListener)
					editdoc.addEventListener('keypress',HandleChange,true);
			}			
			
			function CE_detachEvent()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				
				//Get the editor content  
				var editdoc=editor1.GetDocument(); 

				// detach Event
				if(editdoc.detachEvent)
					editdoc.detachEvent('onkeypress',HandleChange);
				else if(editdoc.removeEventListener)
					editdoc.removeEventListener('keypress',HandleChange,true);
			}
			
			function HandleChange()
			{
				// get the cute editor instance
				var editor1 = document.getElementById('<?php echo $ClientID;?>');
				//Get the editor content  
				var editdoc=editor1.GetDocument(); 
				alert(editdoc.body.innerHTML);
			}	
			
			
		var editor1=document.getElementById("<?php echo $ClientID;?>");
		if(editor1.IsReady)CuteEditor_OnInitialized(editor);

		function CuteEditor_OnChange(editor)
		{	
			//when the content be changed..
			document.getElementById("ctl_onchange").innerHTML=editor.id+" changed at "+ new Date().toLocaleTimeString();
		}
		function CuteEditor_OnCommand(editor,command,ui,value)
		{
			//handle the command by yourself
			if(command=="InsertEmotion")
			{
				var answer = confirm("Click OK to stop this command.")
				if (answer){
					return true;
				}
				else{
					return false;
				}
			}
		}
				
		function CuteEditor_OnInitialized(editor)
		{
			var oldexec=editor1.ExecCommand;
			editor1.ExecCommand=function(cmd,ui,val)
			{
				if(cmd=="InsertChars")
				{
					alert("Run some code here ....");
					//return;
				}
				return oldexec.apply(this,arguments);
			}
		}	
				
		</script>
				</td>
				<td  valign="top" style="padding-top:50px" align="left">
					<div style="padding: 5px;border: solid 1px #cccccc;width:180px; Height:300px; BACKGROUND-COLOR: #ffffcc">
						<b>Test CuteEditor_OnChange</b>
						<P>Start typing...</p>
						<p id="ctl_onchange">
							The content is changed at: 
						</p>						
						<br><br>
						<b>Test CuteEditor_OnCommand</b>
						<p id="P1">
							Click the <font color="red"><b>InsertEmotion</b></font> button.
						</p>				
						<br><br>
						<b>Test CuteEditor_OnInitialized</b>
						<p id="P2">
							Click the <font color="red"><b>InsertChars</b></font> button.
						</p>
					</div>
				</td>
			</tr>
		</table>
		<div id="footer">
			<p><a href="http://phphtmledit.com">Copyright 2005 PHP Online HTML Editor. All rights reserved.</a></p>
		</div>
	</form>
	</body>
</html>