<html>	
    <head>
		<title>Full screen mode Example -- PHP Content Management, PHP WYSIWYG, PHP HTML Editor, PHP Text Editor</title>
		 <link rel="stylesheet" href="php.css" type="text/css" />
		<script language="JavaScript" type="text/javascript">
			//Gets the browser specific XmlHttpRequest Object
			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest(); //Not IE
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP"); //IE
				} else {
					//Display your error message here. 
					//and inform the user they might want to upgrade
					//their browser.
					alert("Your browser doesn't support the XmlHttpRequest object.  Better upgrade to Firefox.");
				}
			}			
			//Get our browser specific XmlHttpRequest object.
			var receiveReq = getXmlHttpRequestObject();		
			//Initiate the asyncronous request.
			var flag=false;
			function ShowEditor() {
				if(flag)
					return;
				//If our XmlHttpRequest object is not in the middle of a request, start the new asyncronous call.
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					//Setup the connection as a GET call to SayHello.html.
					//True explicity sets the request to asyncronous (default).
					receiveReq.open("GET", 'ShowEditor.php', true);
					//Set the function that will be called when the XmlHttpRequest objects state changes.
					receiveReq.onreadystatechange = handleShowEditor; 
					//Make the actual request.
					receiveReq.send(null);
					flag=true;
				}			
			}
			//Called every time our XmlHttpRequest objects state changes.
			function handleShowEditor() {
				//Check to see if the XmlHttpRequests state is finished.
				if (receiveReq.readyState == 4) {
					//Set the contents of our span element to the result of the asyncronous call.
					document.getElementById('span_result').innerHTML = receiveReq.responseText;
				}
			}
			</script>
			
       <?php
			$Loader = "IE_Loader";
			global $HTTP_USER_AGENT ;
			if ( isset( $HTTP_USER_AGENT ) )
				$sAgent = $HTTP_USER_AGENT ;
			else
				$sAgent = $_SERVER['HTTP_USER_AGENT'] ;
				
			if ( strpos($sAgent, 'MSIE') !== false && strpos($sAgent, 'mac') == false && strpos($sAgent, 'Opera') == false )
			{
				$iVersion = (float)substr($sAgent, strpos($sAgent, 'MSIE') + 5, 3) ;
				if ($iVersion >= 5.5) 
					$Loader="IE_Loader";
			}
			else if ( strpos($sAgent, 'Gecko/') !== false )
			{
				$iVersion = (int)substr($sAgent, strpos($sAgent, 'Gecko/') + 6, 8) ;
				if ($iVersion >= 20030210) 
					$Loader="Gecko_Loader";
			}
			else if ( strpos($sAgent, 'Opera') !== false )
			{
				$iVersion = (int)substr($sAgent, strpos($sAgent, 'Opera') + 6, 1) ;
				if ($iVersion >= 9) 
				$Loader="Opera_Loader";
			}
			else if ( strpos($sAgent, 'Safari') !== false )
			{
				$iVersion = (int)substr($sAgent, strpos($sAgent, 'AppleWebKit/') + 12, 3) ;
				if ($iVersion >= 312) 
				$Loader="Safari12_Loader";
				if ($iVersion >= 522) 
				$Loader="Safari_Loader";
			}
        
        ?>
			<script language="JavaScript" src="cuteeditor_files/Scripts/<?php echo $Loader; ?>/Loader.js"></script>
			<script language="JavaScript" src="cuteeditor_files/Scripts/Constant.js"></script>
			<script language="JavaScript">var CE_Editor1_IDSettingClass_Strings=""; </script>
	</head>
	 <body>
	  <h1>Ajax Rich Text Editor</h1>
					<p>This example shows you how to use Cute Editor in Ajax.</p>	
		<!-- Clicking this link initiates the asyncronous request -->
		<a href="javascript:ShowEditor();">Show Rich Text Editor</a><br />
		<!-- used to display the results of the asyncronous request -->
		<span id="span_result"></span>
	</body>
</html>