<html>
  <head>
    <link rel="stylesheet" href="php.css"  type="text/css" />
  </head>
  <body>
    <h1>Get the Html Result</h1>
    <hr />
    This example shows how to extract the html content created by the CuteEditor.
    <br />
    <?php
        if(@$_POST["Editor1"]!="")
        {
				  print stripslashes($_POST["Editor1"]);								
        }
		?>
  </body>
</html>