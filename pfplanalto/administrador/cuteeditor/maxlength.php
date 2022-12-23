<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    <head>
		<title>Use MaxHTMLLength to Protect Your Database Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
	</head>
	<body>
	
	<form name="theForm" action="Get_HtmlContent.php" method="post">
					<h1>Use MaxHTMLLength to Protect Your Database</h1>
					<div class="infoBox">Developers can use <b>MaxHTMLLength</b> or or <b>MaxTextLength</b> in the Cute Editor to limit the length of the 
user's input. <br /><br />Try click the <b>submit</b> button. <br /></div>
						<br />

          <?php
                $editor=new CuteEditor();
                $editor->ID="Editor1";
                $editor->Text="<table cellspacing=\"4\" cellpadding=\"4\" bgcolor=\"#ffffff\" border=\"0\"> <tbody> <tr> <td> <p> <img src=\"http://phphtmledit.com/Uploads/j0262681.jpg\" width=\"80\" alt=\"\"/></p></td> <td> <p>When your algorithmic and programming skills have reached a level which you cannot improve any further, refining your team strategy will give you that extra edge you need to reach the top. We practiced programming contests with different team members and strategies for many years, and saw a lot of other teams do so too.  </p></td></tr> <tr> <td> <p>  <img src=\"http://phphtmledit.com/Uploads/ph02366j.jpg\" width=\"80\" alt=\"\" /></p></td> <td> <p>From this we developed a theory about how an optimal team should behave during a contest. However, a refined strategy is not a must: The World Champions of 1995, Freiburg University, were a rookie team, and the winners of the 1994 Northwestern European Contest, Warsaw University, met only two weeks before that contest.  </p></td></tr></tbody></table> <br /> <br />"; 	
				$editor->EditorBodyStyle="font:normal 12px arial;";
                $editor->EditorWysiwygModeCss="php.css";
				$editor->MaxHTMLLength = 10;
                $editor->Draw();
                $editor=null;
                
                //use $_POST["Editor1"]to retrieve the data
            ?>
          
						<br />
						<input type="submit" value="Update" ID="Submit1" NAME="Submit1">
		</form>
	</body>
</html>