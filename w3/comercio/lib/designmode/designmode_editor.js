var editorBox;

var DesignModeEditor = {
	admin_dir: 'admin',

	init: function()
	{
		Event.observe(window, 'load', DesignModeEditor.begin);
		Event.observe(window, 'unload', DesignModeEditor.close);
		DesignModeEditor.setURLs();
	},

	setURLs: function(){
		var scripts = document.getElementsByTagName('SCRIPT');
		for(var i = 0; i < scripts.length; i++)
		{
			s = scripts[i];
			if(s.src && s.src.indexOf('designmode_editor.js') > -1)
			{
				DesignModeEditor.path = s.src.replace(/designmode\.js$/, '')+"../designmode";
				DesignModeEditor.url = s.src.replace(/designmode\.js$/, '')+"../../../../" + DesignModeEditor.admin_dir + "/designmode.php";
				break;
			}
		}
	},

	begin: function()
	{
		// Draw the interface
		DesignModeEditor.resize(true);
		Event.observe(window, 'resize', DesignModeEditor.resize);
		Event.observe(document.getElementById('Sep'), 'mousedown', DesignModeEditor.enable_pane_resize);

		Event.observe(document.getElementById('RecentFilesButton').getElementsByTagName('IMG')[0], 'click', DesignModeEditor.toggle_recent_files);

		var editor_disabled = Cookie.get('cp_editor_disabled');
		if(editor_disabled != 1)
		{
			DesignModeEditor.toggle_editor(true);
		}
		
		// Draw recent files menu
		DesignModeEditor.build_recent_files();

		// Now we're all done, hide the loading symbol
		var loading = document.getElementById('EditorLoading');
		loading.style.display ='none';
	},

	resize: function(initial)
	{
		screen_dimensions = DesignModeEditor.get_viewport_size();
		toolbar_height = document.getElementById("DesignModeMenu").offsetHeight;
		editor_height = screen_dimensions[1]-toolbar_height;

		document.getElementById('Left').style.width = document.getElementById('Left').offsetWidth;

		document.getElementById('FileEditor').style.height = editor_height + "px";
		document.getElementById('FileEditor').style.width = screen_dimensions[0] - document.getElementById('Left').offsetWidth - 
		document.getElementById('Sep').offsetWidth + "px";

		var textarea = DesignModeEditor.get_editor();
		var adjustment = 0;
		if(document.getElementById('EditorStatus').style.display != "none")
		{
			adjustment = document.getElementById('EditorStatus').offsetHeight + 2;
		}
		textarea.style.width = parseInt(document.getElementById('FileEditor').style.width) - 10 + "px";
		textarea.style.height = editor_height - document.getElementById('FileEditorHeader').offsetHeight - adjustment - 8 + "px";
		
		if(typeof(editorBox) != "undefined")
		{
			editorBox.style.margin = "1px";
			editorBox.style.width = parseInt(textarea.style.width) + 6 + "px";
			editorBox.style.height = parseInt(textarea.style.height) + 6 + "px";
		}
		document.getElementById('Sep').style.height = editor_height + "px";
		document.getElementById('Sep').style.top = toolbar_height + "px";

		used_height = parseInt((editor_height)*.25);
		if(used_height < 150)
		{
			used_height = 150;
		}
		template_height = parseInt(editor_height-used_height);
		document.getElementById('TemplateList').style.height = template_height - document.getElementById('TemplateListHeader').offsetHeight + "px";
		document.getElementById('FilesUsed').style.height = used_height - document.getElementById('FilesUsedHeader').offsetHeight + "px";


		if(document.getElementById('NoUsedFiles'))
		{
			DesignModeEditor.show_no_used();
		}
	},

	close: function(event)
	{
		if(window.opener && typeof(window.opener.DesignMode) != 'undefined')
		{
			DesignModeEditor.save_popup_dimensions(DesignModeEditor.get_viewport_size());
		}
	},

	save_popup_dimensions: function(dimensions)
	{
		Cookie.set("design_mode_wh", dimensions[0]+"x"+dimensions[1]);
	},

	get_coordinates: function(event)
	{
		var x_pos, y_pos;

		if(document.all)
		{
			x_pos = window.event.x;
			y_pos = window.event.y;
		}
		else {
			x_pos = event.pageX;
			y_pos = event.pageY;
		}

		// Factor in page scrolling for IE
		if(document.documentElement.scrollTop && document.all)
		{
			if(document.documentElement.scrollLeft)
				x_pos = x_pos + document.documentElement.scrolLeft;
			y_pos = y_pos + document.documentElement.scrollTop;
		}

		if (x_pos < 0){ x_pos = 0; }
		if (y_pos < 0){ Dy_pos = 0; }

		return [x_pos, y_pos];
	},

	enable_pane_resize: function(event)
	{
		Event.stop(event);
		DesignModeEditor.last_pos = DesignModeEditor.get_coordinates(event);

		// Transparent layer prevents any sort of interactions with other items on the page while resizng
		transparent_layer = document.createElement('DIV');
		transparent_layer.style.position = 'absolute';
		transparent_layer.style.left = transparent_layer.style.top = 0;
		transparent_layer.style.zindex = "9999";
		transparent_layer.style.width = transparent_layer.style.height = "100%";
		transparent_layer.style.cursor = "e-resize";
		transparent_layer.style.background = "transparent";
		document.body.appendChild(transparent_layer);
		DesignModeEditor.transparent_layer = transparent_layer;

		move_layer = document.createElement('DIV');
		move_layer.style.width = document.getElementById('Sep').offsetWidth + "px";
		move_layer.style.height = document.getElementById('Sep').style.height;
		move_layer.style.background = "red";
		move_layer.style.position = "absolute";
		move_layer.style.left = document.getElementById('Left').offsetWidth + "px";
		move_layer.style.top = document.getElementById('Sep').style.top;
		move_layer.style.cursor = "e-resize";
		document.body.appendChild(move_layer);
		DesignModeEditor.move_layer = move_layer;

		Event.observe(document, 'mousemove', DesignModeEditor.resize_panes);
		Event.observe(document, 'mouseup', DesignModeEditor.disable_pane_resize);
		Event.observe(document, 'selectstart', DesignModeEditor.kill_select);
	},

	kill_select: function(event)
	{
		Event.stop(event);
	},

	resize_panes: function(event)
	{
		Event.stop(event);
		if(window.height)
		{
			screen_dimensions[0] = window.innerWidth;
		}
		else
		{
			screen_dimensions[0] = document.body.clientWidth;
		}

		var coordinates = DesignModeEditor.get_coordinates(event);
		new_left = parseInt(DesignModeEditor.move_layer.style.left) + coordinates[0] - DesignModeEditor.last_pos[0];
		if(new_left > 250 && new_left < screen_dimensions[0] - 300)
		{
			DesignModeEditor.move_layer.style.left = new_left + "px";
			DesignModeEditor.last_pos = coordinates;
		}
	},

	disable_pane_resize: function()
	{
		DesignModeEditor.move_layer.parentNode.removeChild(DesignModeEditor.move_layer);
		DesignModeEditor.transparent_layer.parentNode.removeChild(DesignModeEditor.transparent_layer);
		document.getElementById('Left').style.width = DesignModeEditor.move_layer.style.left;
		DesignModeEditor.resize();
		Event.stopObserving(document, 'mousemove', DesignModeEditor.resize_panes);
		Event.stopObserving(document, 'mouseup', DesignModeEditor.disable_pane_resize);
		Event.stopObserving(document, 'selectstart', DesignModeEditor.kill_select);

	},

	get_viewport_size: function()
	{
		var window_width, window_height;
		if(self.innerHeight) // all except Explorer
		{
			window_width = self.innerWidth;
			window_height = self.innerHeight;
		}
		else if(document.documentElement && document.documentElement.clientHeight)  // Explorer 6 Strict Mode
		{
			window_width = document.documentElement.clientWidth;
			window_height = document.documentElement.clientHeight;
		}
		else if (document.body) // other Explorers
		{
			window_width = document.body.clientWidth;
			window_height = document.body.clientHeight;
		}
		return [window_width, window_height];
	},

	codepress_set_language: function(language)
	{
		var code = editorBox.getCode();
		if(!editorBox.textarea.disabled) return;
		editorBox.language = language;
		editorBox.src = CodePress.path+'codepress.html?language='+editorBox.language+'&ts='+(new Date).getTime(); 
		if(editorBox.attachEvent) editorBox.attachEvent('onload',editorBox.initialize); 
		else editorBox.addEventListener('load',editorBox.initialize,false); 
	},

	toggle_editor: function(initial)
	{
		if(DesignModeEditor.get_editor().disabled == true)
		{
			if(!initial)
			{
				Cookie.set('cp_editor_disabled', 1);
			}
			document.getElementById('ToggleButton').className = 'DesignModeButton';
			if(editorBox)
			{
				editorBox.toggleEditor();
			}
		}
		else
		{
			if(!initial)
			{
				Cookie.set('cp_editor_disabled', 0);
			}
			document.getElementById('ToggleButton').className = 'DesignModeButtonEnabled';
			if(!editorBox)
			{
				setTimeout(function()
				{
					try
					{
						textbox = document.getElementById('editorBox');
						editorBox = new CodePress(textbox);
						textbox.id += "_cp";
						textbox.parentNode.insertBefore(editorBox, textbox);
					}
					catch(e)
					{
					}
				}, 150);

			}
			else
			{
				editorBox.toggleEditor();
			}
		}

	},

	load_file: function(file)
	{
		if(DesignModeEditor.is_modified() && !confirm(Lang.DesignModeLoadUnsaved))
		{
		return;
		}
		
		DesignModeEditor.show_loading_indicator();

		// Load a file in to the editor via an AJAX request
		new AjaxRequest(DesignModeEditor.url+'?Ajax=1', {
				method: 'post',
				data: 'ToDo=editFile&File='+encodeURIComponent(file).replace(/\+/g, "%2B")
		});
	},

	// Loads a file contents in to the editor
	load_file_contents: function(id, file, contents, used_list, backup)
	{
		var templates = document.getElementById('Left').getElementsByTagName('A');
		for(var i = 0; i < templates.length; i++)
		{
			if(DesignModeEditor.active_template == templates[i].className)
			{
				templates[i].parentNode.className = "";
			}
			if(templates[i].className && templates[i].className == id)
			{
				templates[i].parentNode.className = "active";
			}
		}
		DesignModeEditor.active_file = file;
		DesignModeEditor.original_contents = contents;
		DesignModeEditor.active_template = id;
		DesignModeEditor.unsaved_changes = false;

		document.getElementById('CurrentFile').innerHTML = file;

		DesignModeEditor.get_editor().value = contents;

		// Set language
		if(DesignModeEditor.get_editor().disabled == true)
		{
			var ext = file.split('.');
			DesignModeEditor.codepress_set_language(ext[ext.length-1]);
		}

		if(used_list != '')
		{
			document.getElementById('FilesUsed').innerHTML = used_list;
		}
		else
		{
			DesignModeEditor.show_no_used();
		}

		if(backup == true)
		{
			document.getElementById('RevertBackup').style.display = '';
		}
		else
		{
			document.getElementById('RevertBackup').style.display = 'none';
		}

		// Add file to recent files
		DesignModeEditor.add_to_recent(file);

		DesignModeEditor.hide_loading_indicator();
	},

	save: function()
	{
		DesignModeEditor.show_loading_indicator();

		if(DesignModeEditor.get_editor().disabled == true)
		{
			// In editor mode
			var code = editorBox.getCode();
		}
		else
		{
			// In textarea mode
			var code = DesignModeEditor.get_editor().value;
		}

		// Execute our save request using ajax
		new AjaxRequest(DesignModeEditor.url+'?Ajax=1', {
				method: 'post',
				data: 'ToDo=saveUpdatedFile&File='+encodeURIComponent(DesignModeEditor.active_file).replace(/\+/g, "%2B")+'&FileContent='+encodeURIComponent(code).replace(/\+/g, "%2B")
		});
	},

	update: function()
	{
		update = false;

		if(DesignModeEditor.is_modified())
		{
			if(confirm(Lang.DesignModeChangeFile))
				update = true;
		}
		else
		{
			update = true;
		}

		if(update)
		{
			if(opener)
			{
				open_loc = opener.document.location.href;
				open_loc = open_loc.replace("#design_mode_done", "");
				opener.document.location.href = open_loc;
			}
			window.close();
		}
	},

	cancel: function()
	{
		if(confirm(Lang.DesignModeConfirmCancel))
			window.close();
	},

	show_no_used: function()
	{
		document.getElementById('FilesUsed').innerHTML = '<div id="NoUsedFiles"><div>'+Lang.ContainsNoSnippetsPanels+'</div></div>';
		var no_used = document.getElementById('NoUsedFiles');
		no_used.style.height = no_used.parentNode.offsetHeight + "px";
		no_used.getElementsByTagName('DIV')[0].style.paddingTop = parseInt(no_used.offsetHeight/2)-parseInt(no_used.getElementsByTagName('DIV')[0].offsetHeight/2)+"px";
	},

	is_modified: function()
	{
		if(DesignModeEditor.get_editor().disabled == true)
		{
			new_contents = editorBox.getCode();
		}
		else
		{
			new_contents = DesignModeEditor.get_editor().value;
		}

		if(DesignModeEditor.original_contents != new_contents)
			return true;
		else
			return false;
	},

	toggle_recent_files: function(event)
	{
		var recent_files = document.getElementById('RecentFiles');
		var button = document.getElementById('RecentFilesButton').getElementsByTagName("IMG")[0];
		if(!recent_files) return false;
		
		if(event)
		{
			Event.stop(event);
		}

		if(recent_files.style.display != "none")
		{
			DesignModeEditor.hide_recent_files();
		}
		else
		{
			element = button;
			offset_left = offset_top = 0;
			do
			{
				offset_top += element.offsetTop || 0;
				offset_left += element.offsetLeft || 0;
				element = element.offsetParent;
				if(element)
				{
					if(element.tagName == "BODY") break;
				}
			} while(element);

			// Position menu
			recent_files.style.position = "absolute";
			recent_files.style.top = offset_top + button.offsetHeight -1 + "px";
			recent_files.style.left = offset_left + "px";
			recent_files.style.display = "";
			Event.observe(document, 'click', DesignModeEditor.hide_recent_files);
			button.className = "RecentFilesButtonOpen";
		}
	},

	hide_recent_files: function()
	{
		var recent_files = document.getElementById('RecentFiles');
		var button = document.getElementById('RecentFilesButton').getElementsByTagName("IMG")[0];
		recent_files.style.display = "none";
		button.className = "DesignModeButton";
		Event.stopObserving(document, 'click', DesignModeEditor.hide_recent_files);
	},

	build_recent_files: function()
	{
		// Remove the old list if we have one
		if(document.getElementById('RecentFiles'))
		{
			document.getElementById('RecentFiles').parentNode.removeChild(document.getElementById('RecentFiles'));
		}

		var recents = Cookie.get('recent_files');
		if(!recents) return;

		recents = recents.split('|');

		// Create the list
		var recent_files = document.createElement('UL');
		recent_files.id = "RecentFiles";
		recent_files.style.display = "none";

		for(var i = 0; i < recents.length; i++)
		{
			if(recents[i] == "") continue;
			template = recents[i];

			var item = document.createElement('LI');
			var link = document.createElement('A');
			link.href = "javascript:DesignModeEditor.load_file('"+template+"');";
			link.innerHTML = template;
			item.appendChild(link);
			recent_files.appendChild(item);
		}

		document.body.appendChild(recent_files);

		document.getElementById('RecentFilesButton').style.display = '';
	},

	add_to_recent: function(filename)
	{
		// Adds a file to our recent files list. Most recent files belong at the start of the list
		
		// Rebuild the list
		var existing_recent = Cookie.get('recent_files');
		if(typeof(existing_recent) == "undefined") var existing_recent = '';
		existing_recent = existing_recent.split('|');

		// Add in our new item
		var new_recent = new Array();
		new_recent.push(filename);
		for(i = 0; i < existing_recent.length; i++)
		{
			if(!existing_recent[i] || existing_recent[i] == filename)
			{
				continue;
	
			}
			if(i == 8) break; // Only maintain 8 active recent files so trim off the last
			new_recent.push(existing_recent[i]);
		}
		Cookie.set('recent_files', new_recent.join('|'));

		// Rebuild the recents menu
		DesignModeEditor.build_recent_files();
	},

	get_editor: function()
	{
		if(document.getElementById('editorBox_cp'))
			return document.getElementById('editorBox_cp');
		else
			return document.getElementById('editorBox');
	},

	revert_to_original: function()
	{
		if(confirm(Lang.DesignModeRevert))
		{
			DesignModeEditor.show_loading_indicator();
			new AjaxRequest(DesignModeEditor.url+'?Ajax=1', {
					method: 'post',
					data: 'ToDo=revertFile&File='+encodeURIComponent(DesignModeEditor.active_file).replace(/\+/g, "%2B")
			});
		}
	},

	show_status: function(message, type)
	{
		if(!type)
		{
			type = "success";
		}

		var status_bar = document.getElementById('EditorStatus');
		status_bar.innerHTML = message;
		status_bar.style.display = '';
		status_bar.className = "EditorStatus_"+type;
		setTimeout(function() { DesignModeEditor.hide_status(); }, 5000);
		DesignModeEditor.resize();
	},

	hide_status: function()
	{
		var status_bar = document.getElementById('EditorStatus');
		status_bar.style.display = 'none';
		DesignModeEditor.resize();
	},

	show_loading_indicator: function()
	{
		// Don't show both main loading indicator & child indicator at the same time
		var page_indicator = document.getElementById('EditorLoading');
		if(page_indicator.style.display != "none") return;

		var indicator = document.getElementById('EditorInlineLoading');
		if(DesignModeEditor.get_editor().disabled == true)
		{
			editor = editorBox;
		}
		else
		{
			editor = DesignModeEditor.get_editor();
		}

		element = editor;
		offset_left = offset_top = 0;
		do
		{
			offset_top += element.offsetTop || 0;
			offset_left += element.offsetLeft || 0;
			element = element.offsetParent;
			if(element)
			{
				if(element.tagName == "BODY") break;
			}
		} while(element);
		
		indicator.style.position = "absolute";
		indicator.style.top = offset_top + "px";
		indicator.style.left = offset_left + "px";
		indicator.style.width = editor.offsetWidth + "px";
		indicator.style.height = editor.offsetHeight + "px";
		indicator.style.opacity = ".8";
		indicator.style.filter = "alpha(opacity=80)";
		indicator.style.display = '';
	},

	hide_loading_indicator: function()
	{
		var indicator = document.getElementById('EditorInlineLoading');
		indicator.style.display = "none";
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

DesignModeEditor.init();