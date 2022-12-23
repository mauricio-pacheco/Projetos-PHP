<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<title>%%LNG_DesignMode%%</title>
<style type="text/css">
body {
	margin: 0;
	padding: 0;
	overflow: hidden;
	font-family:Arial; font-size:12px;
}

.EditorHeader {
	background-color:#BFDBFF;
	color:#15428B;
	font-weight:bold;
	padding:5px;
}


#Left {
	width: 250px;
	float: left;
}

#Sep {
	background: #BFDBFF;
	float: left;
	width: 3px;
	cursor: e-resize;
	height: 100%;
}

#FileEditor {
	float: left;
}

.ScrollableList {
	overflow: auto;
	height: 200px;
}

#EditorLoading {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 200;
	background: #fff;
}

#FileEditor textarea{
	margin-left: 1px;
	padding: 4px;
}

#DesignModeMenu { background-image: url('../lib/designmode/images/DesignModeEditBg.gif'); background-repeat:repeat-x; border-bottom: solid 1px #6F9DD9; width:100%; font-family:Courier New;font-size:9pt;}
#DesignModeMenu div { float: left; }
.DesignModeButton { margin:3px; cursor:pointer; border:solid 1px transparent; }
.DesignModeButtonEnabled { cursor:pointer; margin:3px; background-image: url('../lib/designmode/images/DesignModeButtonBg.gif'); background-repeat:repeat-x; border: 1px solid #FFBD69; }
.DesignModeButtonOver { margin:3px; cursor:pointer; background-image: url('../lib/designmode/images/DesignModeButtonBg.gif'); background-repeat:repeat-x; border: 1px solid #FFBD69; }

.ScrollableList div.title {
	padding: 5px;
	font-weight: bold;
	padding-left: 10px;
	background: #FFF;
}

.ScrollableList ul, .ScrollableList li {
	list-style: none;
	margin: 0;
	padding: 0;
}

.ScrollableList a {
	display: block;
	text-decoration: none;
	color: #000;
	padding: 3px 0px 3px 20px;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #fff;
}

.ScrollableList a:hover {
	background: #FFF0BE;
}

.ScrollableList .active a, .ScrollableList .active a:hover {
	background: #EFEFEF;
	font-weight: bold;
}

.ScrollableList .ActiveStylesheet {
	background: #E3EFFF;
}

#NoUsedFiles {
	font-weight: bold;
	background: #efefef;
	color: #bbb;
	line-height: 1.5;
	font-size: 18px;
	text-align: center;
}

#RecentFilesButton {
	position: relative;
	z-index: 9999;
}

.RecentFilesButtonOpen {
	cursor:pointer;
	position: absolute;
	background: #FFF;
	margin:3px;
	border: 1px solid #5296f7;
	border-bottom: 1px solid #fff;
	z-index: 20;
}

#RecentFiles, #RecentFiles li {
	list-style: none;
	padding: 0;
	margin: 0;
	z-index: 1;
} 

#RecentFiles { 
	border: 1px solid #5296f7;
	background: #fff;
	padding-top: 3px;
}

#RecentFiles li a {
	font-family: Verdana;
	text-decoration: none;
	padding: 3px;
	display: block;
	margin: 0 3px;
	border: 1px solid #fff;
	color: #000;
	font-size: 11px;
	margin-bottom: 3px;
}

#RecentFiles li a:hover {
	background: #c1d2ee; 
	border: 1px solid #316ac5;
}

#EditorStatus {
	font-weight:bold;
	color: green;
	background: #ECFEE0;
	border: 1px solid green;
	padding: 4px;
	margin: 1px;
}

#EditorLoading {
	background: #fff url('../lib/designmode/images/LoadingBig.gif') no-repeat center;
	z-index: 1000000;
}

#EditorInlineLoading {
	background: #fff url('../lib/designmode/images/LoadingBig.gif') no-repeat center;
	border: 1px solid #000;
}

#FileEditorHeader {
	position: relative;
}

#RevertBackup, #RevertBackupOver {
	position: absolute;
	right: 0;
	top: -1px;
	border: 1px solid transparent;
}

#RevertBackupOver {
	border:solid 1px #316AC5;
}
</style>
<script type="text/javascript">
// Need to strip off in to design mode common file?
var Event = {
	observe: function(element, name, observer, useCapture)
	{
		if(!useCapture) useCapture = false;
		if(element.addEventListener)
			element.addEventListener(name, observer, useCapture);
		else
			element.attachEvent('on'+name, observer);
	},

	stopObserving: function(element, name, observer, useCapture)
	{
		if(!useCapture) useCapture = false;
		if(element.removeEventListener)
		{
			element.removeEventListener(name, observer, useCapture);
		}
		else
			element.detachEvent('on'+name, observer);
	},

	button: function(e)
	{

		if(!e && window.event) e = window.event;
		if(e.which) return e.which;
		else if(e.button) return e.button;
		else return false;
	},
	
	stop: function(e)
	{
		if(!e && window.event) e = window.event;
		if(e.preventDefault)
		{
		  e.preventDefault();
		  e.stopPropagation();
		}
		else
		{
		  e.returnValue = false;
		  e.cancelBubble = true;
		}
	},

	element: function(e)
	{
		if(e.target) return e.target;
		else if(e.srcElement) return e.srcElement;
		else return false;
	}
};

var Cookie = {
	get: function(name)
	{
		name = name += "=";
		var cookie_start = document.cookie.indexOf(name);
		if(cookie_start > -1) {
			cookie_start = cookie_start+name.length;
			cookie_end = document.cookie.indexOf(';', cookie_start);
			if(cookie_end == -1) {
				cookie_end = document.cookie.length;
			}
			return unescape(document.cookie.substring(cookie_start, cookie_end));
		}
	},

	set: function(name, value, expires)
	{
		if(!expires) {
			expires = "; expires=Wed, 1 Jan 2020 00:00:00 GMT;"
		} else {
			expire = new Date();
			expire.setTime(expire.getTime()+(expires*1000));
			expires = "; expires="+expire.toGMTString();
		}
		document.cookie = name+"="+escape(value)+expires;
	},

	unset: function(name)
	{
		Cookie.set(name, '', -1);
	}
};

function AjaxRequest(url, options)
{
	var request = null;
	var complete = false;
	this.url = url;

	if(!options)
		options = new Object();

	this.options = options;

	if(!this.options.method)
		this.options.method = "GET";
	if(!this.options.data)
		this.options.data = '';

	if(window.XMLHttpRequest)
		request = new XMLHttpRequest();
	else if(window.ActiveXObject)
		request = new ActiveXObject('Microsoft.XMLHTTP');

	if(!request)
		return false;		


	request.open(this.options.method, url, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(options.data);

	request.onreadystatechange = function() {
		if(request.readyState == 4)
		{
			complete = true;

			try
			{
				var content_type = request.getResponseHeader('Content-type');
				if(content_type && content_type.match(/^(text|application)\/(x-)?(java|ecma)script(;.*)?$/i))
				{
					eval(request.responseText);
				}
				
			}
			catch(e)
			{
			}

			// HTTP 200 OK
			if(request.status == 200)
			{
				if(options.onComplete)
				{
					options.onComplete(request);
				}
			}
			else if(options.onError)
			{
				options.onError(request);
			}
		}
	};
}

</script>

<script src="../lib/codepress/codepress.js" type="text/javascript"></script>
<script src="../lib/designmode/designmode_editor.js" type="text/javascript"></script>
</head>
<body>
<div id="Editor">
	<div id="DesignModeMenu">
			<div><img title="%%LNG_SaveDesignMode%%" src="../lib/designmode/images/IcoDesignModeSave.gif" class="DesignModeButton" onmouseover="this.className='DesignModeButtonOver'" onmouseout="this.className='DesignModeButton'" onclick="DesignModeEditor.save();" /></div>
			<div><img title="%%LNG_CancelDesignMode%%" src="../lib/designmode/images/IcoDesignModeCancel.gif" class="DesignModeButton" onmouseover="this.className='DesignModeButtonOver'" onmouseout="this.className='DesignModeButton'" onclick="DesignModeEditor.cancel()" /></div>
			<div><img title="%%LNG_UpdateDesignMode%%" src="../lib/designmode/images/IcoDesignModeUpdate.gif" class="DesignModeButton" onmouseover="this.className='DesignModeButtonOver'" onmouseout="this.className='DesignModeButton'" onclick="DesignModeEditor.update()" /></div>
			<div><img title="%%LNG_UpdateDesignMode%%" src="../lib/designmode/images/IcoDesignModeToggle.gif" class="DesignModeButton" onmouseover="if(this.className == 'DesignModeButton') { this.className='DesignModeButtonOver'; }" onmouseout="if(this.className == 'DesignModeButtonOver') { this.className='DesignModeButton'; }" onclick="DesignModeEditor.toggle_editor()" id="ToggleButton" /></div>
			<div id="RecentFilesButton" style="display: none;"><img title="%%LNG_UpdateDesignMode%%" src="../lib/designmode/images/IcoDesignModeRecentFiles.gif" class="DesignModeButton" onmouseover="if(this.className != 'RecentFilesButtonOpen') { this.className='DesignModeButtonOver' }" onmouseout="if(this.className == 'DesignModeButtonOver') { this.className='DesignModeButton' }"/></div>
			<br style="clear: left;" />
	</div>

	<div id="Left">
		<div class="EditorHeader" id="FilesUsedHeader">%%LNG_FilesUsedByTemplate%%:</div>
		<div class="ScrollableList" id="FilesUsed">
			%%GLOBAL_PanelList%%

			%%GLOBAL_SnippetsList%%
		</div>

		<div class="EditorHeader" id="TemplateListHeader">%%LNG_OtherTemplateFiles%%</div>
		<div class="ScrollableList" id="TemplateList">
			<div class="title">%%LNG_Stylesheets%%</div>
			<ul>
				%%GLOBAL_StyleSheetFileList%%
			</ul>

			<div class="title">%%LNG_Layouts%%</div>
			<ul>
				%%GLOBAL_LayoutFileList%%
			</ul>

			<div class="title">%%LNG_Panels%%</div>
			<ul>
				%%GLOBAL_PanelFileList%%
			</ul>

			<div class="title">%%LNG_Snippets%%</div>
			<ul>
				%%GLOBAL_SnippetFileList%%
			</ul>

		</div>
	</div>

	<div id="Sep">&nbsp;</div>

	<div id="FileEditor">
		<div class="EditorHeader" id="FileEditorHeader">
			<img id="RevertBackup" title="Revert to original" src="../lib/designmode/images/IcoDesignModeRevert.gif" class="DesignModeButton" onmouseover="this.className='DesignModeButtonOver'; this.id='RevertBackupOver'; this.src='../lib/designmode/images/IcoDesignModeRevertOver.gif';" onmouseout="this.className='DesignModeButton'; this.id='RevertBackup'; this.src='../lib/designmode/images/IcoDesignModeRevert.gif';"  onclick="DesignModeEditor.revert_to_original();" />
			<div>%%LNG_ContentsOfFile%% <span id="CurrentFile"></span></div>
		</div>
		<div id="EditorStatus" class="success" style="display: none;">&nbsp;</div>
		<textarea id="editorBox" name="editorBox" class="html autocomplete-off"></textarea>
	</div>
<br style="clear: both;" />
</div>

<div id="EditorLoading">
</div>

<div id="EditorInlineLoading" style="display: none;">
&nbsp;
</div>

<script type="text/javascript">
var Lang = {
	DesignModeConfirmCancel: "%%LNG_DesignModeConfirmCancel%%",
	DesignModeChangeFile: "%%LNG_DesignModeChangeFile%%",
	DesignModeLoadUnsaved: "You have unsaved changes in this file.\n\nLoad new file without saving changes?",
	ContainsNoSnippetsPanels: "This file does not contain any panels or snippets.",
	DesignModeRevert: "Revert this file to its original content?\n\nYou will lose any customisations or unsaved changes."
};

%%GLOBAL_LoadFileJS%%
%%GLOBAL_SavedOKAlert%%
</script>
</body>
</html>