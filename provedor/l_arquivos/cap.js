<!--

// BEGIN CAPTION

var left_offset = '24%';
var top_offset = 20;
var makecapvisible = false;
var title = "";
var msg = "";
var no = 0;
		
function ShowCap(thetitle, themsg)
{
	if(document.layers)
		document.captureEvents(Event.MOUSEMOVE);

	document.onmousemove = MouseMove;

	title = thetitle;
	msg = themsg;

	switch(thetitle)
	{
		case 'Plano Medium':
		case 'Plano Advanced':
			left_offset='32%';
			no=1;
			break;
		case 'Aproveite nossa promoção':
			left_offset='14%';
			no=1;
			break;
		default:
			left_offset='24%';
			no=0;
			break;
	}
	makecapvisible = true;
}

function CapVisible()
{
	var content = '<table border="0" cellpadding="0" cellspacing="0" width="236"><tr><td width="176" colspan="5" bgcolor="#2D9500"><img src="images/spacer.gif" width="236" height="1"></td></tr><tr><td width="1" bgcolor="#2D9500"><img src="images/spacer.gif" width="1" height="1"></td><td width="1" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="10" height="1"></td><td width="214" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="214" height="10"><br><b>' + title + ':</b><br><br><div align="justify">' + msg + '</div><img src="images/spacer.gif" width="214" height="10"></td><td width="1" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="10" height="1"></td><td width="1" bgcolor="#2D9500"><img src="images/spacer.gif" width="1" height="1"></td></tr><tr><td width="216" colspan="5" bgcolor="#2D9500"><img src="images/spacer.gif" width="216" height="1"></td></tr></table>';

	if(document.getElementById)
	{
		var theDiv = document.getElementById("capdiv");
		if(theDiv)
		{
			theDiv.innerHTML = content;
			theDiv.style.visibility = "visible";
		}
	}
	else if(document.layers && document.capdiv)
	{
		document.capdiv.document.write(content); 
		document.capdiv.document.close();
		document.capdiv.visibility = "visible";
	}
	else if(document.all && document.all.capdiv)
	{
		document.all.capdiv.innerHTML = content;
		document.all.capdiv.style.visibility = "visible";
	}
}

function HideCap()
{
	if(document.layers)
		document.releaseEvents(Event.MOUSEMOVE);

	document.onmousemove = null;

	if(document.getElementById)
	{
		var theDiv = document.getElementById("capdiv");
		if(theDiv)
			theDiv.style.visibility = "hidden";
	}
	else if(document.layers && document.capdiv)
		document.capdiv.visibility = "hidden";
	else if(document.all && document.all.capdiv)
		document.all.capdiv.style.visibility = "hidden";
}

function MouseMove(e)
{
	if(document.all && document.all.capdiv)
	{
		//var x = event.clientX;
		//var x = left_offset;
		if(no)
		{
			var x = left_offset;
		}
		else
		{
			var x = event.clientX - 13;
		}
		//x += document.body.scrollTop;
		document.all.capdiv.style.left = x;
		var y = top_offset;
		y += event.clientY - 13;
		y += document.body.scrollTop;
		document.all.capdiv.style.top = y;
	}
	else if(document.getElementById)
	{
		var theDiv = document.getElementById("capdiv");
		if(theDiv)
		{
			var x = left_offset;
			theDiv.style.left = x;

			var y = top_offset;
			y += e.clientY - 8;
			y += pageYOffset;
			theDiv.style.top = y;
		}
	}
	else if(document.layers && document.capdiv)
	{
		// var x = e.pageX;
		var x = left_offset;
		document.capdiv.left = x;

		var y = top_offset;
		y += e.pageY - 11;
		// y += pageYOffset;
		// y -= pageYOffset;
		document.capdiv.top = y;
	}

	if(makecapvisible == true)
	{
		makecapvisible = false;
		CapVisible();
	}
}

// END CAPTION

//-->
