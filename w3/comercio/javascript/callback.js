	// Client-Side XML Library API

	var req;

	function DoCallback(data)
	{
		// branch for native XMLHttpRequest object
		if (window.XMLHttpRequest) {
			req = new XMLHttpRequest();
			req.onreadystatechange = processReqChange;
			req.open('POST', url, true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send(data);
		// branch for IE/Windows ActiveX version
		} else if (window.ActiveXObject) {
			req = new ActiveXObject('Microsoft.XMLHTTP')
			if (req) {
				req.onreadystatechange = processReqChange;
				req.open('POST', url, true);
				req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				req.send(data);
			}
		}
	}

	function processReqChange() {
		// only if req shows 'loaded'
		if (req.readyState == 4) {
			// only if 'OK'
			if (req.status == 200) {
				ProcessData(req.responseText);
			} else {
				alert('There was a problem retrieving the XML data:\n' +
					req.responseText);
			}
		}
	}