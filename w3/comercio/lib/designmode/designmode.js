function g(element)
{
	return document.getElementById(element);
}

function multi_array(iRows,iCols)
{
	var i;
	var j;
	var a = new Array(iRows);

		for (i=0; i < iRows; i++)
		{
			a[i] = new Array(iCols);
			for (j=0; j < iCols; j++)
			{
				a[i][j] = "";
			}
		}

	return a;
}

function find_pos(obj) {
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
}

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


/* start designmode.js */

var DesignMode = {
	enabled: false,
	is_dragging: false,
	context_menu_visible: false,
	drop_targets: new Array(),

	selected_panel: '',

	button: 0,
	panel_width: 0,
	panel_height: 0,
	x_pos: 0,
	y_pos: 0,
	x_diff: 0,
	y_diff: 0,
	constraints: new Array,

	template_page: '',
	from_panel: '',
	to_panel: '',
	hover_div_id: '',

	path: '',
	url: '',
	admin_dir: 'admin',

	init: function()
	{
		DesignMode.setURLs();

		// Have we just made a layout change? If so the URL will contain #design_mode_done
		if(document.location.href.indexOf("#design_mode_done") > -1 )
		{
			alert("Your design mode changes have been saved successfully.");
		}

		// Only turn design mode on once the entire page is loaded
		Event.observe(window, 'load', DesignMode.begin);
	},

	setURLs: function(){
		var scripts = document.getElementsByTagName('SCRIPT');
		for(var i = 0; i < scripts.length; i++)
		{
			s = scripts[i];
			if(s.src && s.src.indexOf('designmode.js') > -1)
			{
				DesignMode.path = s.src.replace(/designmode\.js$/, '')+"../designmode";
				DesignMode.url = s.src.replace(/designmode\.js$/, '')+"../../" + DesignMode.admin_dir + "/designmode.php";
				DesignMode.remoteUrl = s.src.replace(/designmode\.js$/, '')+"../../admin/remote.php";
				break;
			}
		}
	},

	begin: function()
	{

			if(document.getElementById('move_layer')) {
				DesignMode.move_layer.parentNode.removeChild(DesignMode.move_layer);
			}
			var move_layer = document.createElement("DIV");
			DesignMode.move_layer = move_layer;
			DesignMode.move_layer.id = 'move_layer';
			DesignMode.move_layer.className = "MoveLayer";
			DesignMode.move_layer.onmouseup = DesignMode.check_drop_target;
			DesignMode.move_layer.innerHTML = '&nbsp;';
			document.body.appendChild(DesignMode.move_layer);

		// Add events
		Event.observe(document, 'mouseup', DesignMode.mouse_up);
		Event.observe(document, 'mousemove', DesignMode.mouse_move);
		Event.observe(document, 'mousedown', DesignMode.mouse_down);
		Event.observe(document, 'selectstart', function() { if(DesignMode.enabled == true) { return false; } });

		// Create toolbar
		DesignModeToolbar.init();

		// Initialise all dragable elements
		var disabled = Cookie.get('design_mode_disabled');
		if(!disabled)
		{
			DesignMode.enable();
		}

		// Initiailise language editing features
		DesignModeLangEdit.init();

		// Create context menu
		DesignModeMenu.init();
	},

	is_ctrl: function(event) {
		if(window.event) {
			return window.event.ctrlKey;
		}
		else {
			return event.ctrlKey;
		}
	},

	set_dragable: function()
	{
		// Add a tooltip and set the hover_div_id variable
		var divs = document.getElementsByTagName("div");

		for(i = 0; i < divs.length; i++)
		{
			if(divs[i].className.indexOf("Moveable") > -1 && divs[i].className.indexOf("Locked") == -1)
			{
				divs[i].style.cursor = 'move';
				divs[i].title = "This is the '" + divs[i].id + "' panel";
				divs[i].onmouseover = function()
				{
					if(typeof(DesignMode) == "undefined") return false;
					if(this.id != "")
						DesignMode.hover_div_id = this.id;
					else
						DesignMode.hover_div_id = "";
				}
				divs[i].onmousedown = function(event)
				{
					DesignMode.button = Event.button(event);

					if(this.id != "" && DesignMode.button != 1)
					{
						Event.stop(event);
						DesignModeMenu.show(true);
					}

					else if(this.id != "" && DesignMode.button == 1)
					{
						var siblingCount = 0;
						$(this).parent().find('.Moveable').each(function() {
							if(this.offsetHeight > 0) {
								++siblingCount;
							}
						});
						if(siblingCount > 1) {
							DesignMode.selected_panel = this.id;
						}
						else {
							alert('This is the last panel in this column.\n\nIf you wish to move this panel please move another panel in to this column first.');
						}
					}
				}
			}
		}
	},

	highlight_targets: function()
	{
		// Find a list of targets and highlight them
		if(DesignMode.constraints.length > 0)
		{
			divs = new Array();
			for(i in DesignMode.constraints)
			{
				var container = g(DesignMode.constraints[i]);
				if(container)
				{
					elems = container.getElementsByTagName("div");
					for(i = 0; i < elems.length; i++)
					{
						divs.push(elems[i]);
					}
				}
			}
		}
		else
		{
			var divs = document.getElementsByTagName("div");
		}
		DesignMode.drop_targets = new Array();

		var drop_container = document.createElement('div');
		drop_container.id = 'DropContainer';

		for(i = 0; i < divs.length; i++)
		{
			if(divs[i].className.indexOf("Moveable") > -1 && divs[i].id != DesignMode.selected_panel)
			{
				// Overlay a drop target area
				pos = find_pos(divs[i]);
				x = pos[0];
				y = pos[1];
				w = divs[i].offsetWidth;
				h = divs[i].offsetHeight;

				var drop_div = document.createElement("div");
				drop_div.setAttribute("id", "drop_target_" + divs[i].id);
				drop_div.className = "DropTarget";
				drop_div.style.left = x + "px";
				drop_div.style.top = y + "px";
				drop_div.style.width = w + "px";
				drop_div.style.height = h + "px";

				// Append the drop target to the document
				drop_container.appendChild(drop_div);

				var drop_div2 = document.createElement("div");
				drop_div2.setAttribute("id", "droptargetinner_" + divs[i].id);
				drop_div2.className = "DropTarget_inner";
				drop_div2.style.left = x + "px";
				drop_div2.style.top = y + "px";
				drop_div2.style.width = w + "px";
				drop_div2.style.height = h + "px";

				// Append the drop target to the document
				drop_container.appendChild(drop_div2);

				// Append the drop target's dimensions to the drop_targets array
				DesignMode.drop_targets.push(new Array(x, y, w, h, divs[i].id));
			}
		}

		// Append our drop target layers to the document
		document.body.appendChild(drop_container);
	},

	mouse_down: function(event)
	{
		if(!DesignMode.enabled) return false;

		Event.stop(event);
		DesignMode.button = Event.button(event);

		// Left click
		if(DesignMode.button == 1)
		{
			DesignMode.initial_coordinates = DesignMode.get_coordinates(event);
			DesignMode.is_dragging = true;
		}
		else
		{
			DesignMode.is_dragging = false;
		}

		return false;
	},

	select_panel: function(id)
	{
		if(DesignMode.enabled && DesignMode.button == 1)
		{
			DesignMode.selected_panel = id;
			var panel = document.getElementById(DesignMode.selected_panel);
			// Pabel is floated, clone it to get actual height
			if(panel.offsetHeight == 0)
			{
				var clone = panel.cloneNode(true);
				clone.style.position = "absolute";
				clone.style.left = "-10000px";
				clone.style.top = "-10000px";
				clone.style.cssFloat = '';
				panel.parentNode.insertBefore(clone, panel); // Append to same position to get actual style
				DesignMode.panel_height = clone.offsetHeight;
				DesignMode.panel_width = clone.offsetWidth;
				clone.parentNode.removeChild(clone);
			}
			else
			{
				DesignMode.panel_height = panel.offsetHeight;
				DesignMode.panel_width = panel.offsetWidth;
			}

			DesignMode.move_layer.style.display = "inline";
			DesignMode.move_layer.style.width = DesignMode.panel_width + "px";
			DesignMode.move_layer.style.height = DesignMode.panel_height + "px";

			selected_pos = find_pos(panel);

			DesignMode.move_layer.style.left = selected_pos[0] + "px";
			DesignMode.move_layer.style.top = selected_pos[1] + "px";
			DesignMode.x_diff = (DesignMode.x_pos - selected_pos[0]);
			DesignMode.y_diff = (DesignMode.y_pos - selected_pos[1]);

			DesignMode.constraints = new Array();

			// Check if this panel is being locked in to a certain container
			start = 0;
			while(true)
			{
				var start = panel.className.indexOf('Constrain', start);
				if(start == -1) // Nothing else
				{
					break;
				}
				start += 9;
				var end = panel.className.indexOf(' ', start);
				if(end == -1) end = panel.className.length;
				DesignMode.constraints.push(panel.className.substring(start, end));
			}
			DesignMode.highlight_targets();
		}
	},

	mouse_up: function()
	{
		if(DesignMode.enabled == true) {
			if(DesignMode.move_layer) {
				DesignMode.move_layer.style.display = 'none';
			}
			DesignMode.is_dragging = false;
			DesignMode.selected_panel = "";
			DesignMode.kill_drop_targets();
		}
	},

	kill_drop_targets: function()
	{
		// Hide the drop targets when the mouse is released
		var drop_container = document.getElementById('DropContainer');
		if(drop_container)
		{
			drop_container.parentNode.removeChild(drop_container);
		}
	},

	mouse_move: function(event)
	{
		var coordinates = DesignMode.get_coordinates(event);
		DesignMode.x_pos = coordinates[0];
		DesignMode.y_pos = coordinates[1];

		if(DesignMode.is_dragging && DesignMode.selected_panel != "")
		{
			// Only allow movement if we've dragged for > 3px.
			if(DesignMode.x_pos > DesignMode.initial_coordinates[0]+3 || DesignMode.x_pos < DesignMode.initial_coordinates[0]-3 || DesignMode.y_pos > DesignMode.initial_coordinates[1]+3 || DesignMode.y_pos < DesignMode.initial_coordinates[1]-3)
			{
				// Just moved > 3px, select our panel
				if(!DesignMode.move_layer || DesignMode.move_layer.style.display != "inline")
				{
					DesignMode.select_panel(DesignMode.selected_panel);
				}

				// Disallow horizontal movement if constrained to ONLY ONE container
				if(DesignMode.constraints.length != 1)
				{
					DesignMode.move_layer.style.left = (coordinates[0] - DesignMode.x_diff) + "px";
				}
				DesignMode.move_layer.style.top = (coordinates[1] - DesignMode.y_diff) + "px";
			}
		}
	},

	get_coordinates: function(event)
	{
		var x_pos, y_pos;

		if(event.pageX) {
			x_pos = event.pageX;
			y_pos = event.pageY;
		}
		else {
			x_pos = event.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft);
			y_pos = event.clientY + (document.documentElement.scrollTop || document.body.scrollTop);
		}

		if (x_pos < 0){ x_pos = 0; }
		if (y_pos < 0){ Dy_pos = 0; }

		return [x_pos, y_pos];
	},

	check_drop_target: function()
	{
		/**
		 *	Are we over a drop target? If so, make the switch. Drop targets
		 *  have the format of x, y, w, h, id so we need to check the boundaries
		 *  and see if we've dropped inside a target.
		*/

		var attr_list = "";

		for(i = 0; i < DesignMode.drop_targets.length; i++)
		{
			var did = DesignMode.drop_targets[i][4];
			var dx1 = DesignMode.drop_targets[i][0];
			var dy1 = DesignMode.drop_targets[i][1];
			var dx2 = dx1 + DesignMode.drop_targets[i][2];
			var dy2 = dy1 + DesignMode.drop_targets[i][3];

			if(DesignMode.x_pos >= dx1 && DesignMode.x_pos <= dx2 && DesignMode.y_pos >= (dy1-50) && DesignMode.y_pos <= (dy2+50))
			{
				// We have a match, but was it dropped in the top half or bottom half?
				// If top, we'll position it above. If bottom, we'll position it below

				var y_mid = dy2 - ((dy2 - dy1) / 2);

				// Get the entire tag to drop
				//var source_target_html = DesignMode.get_panel_html(DesignMode.selected_panel);

				var drop_target = document.getElementById(did);
				var clone = document.getElementById(DesignMode.selected_panel).cloneNode(true);

				// Destroy the original source
				document.getElementById(DesignMode.selected_panel).parentNode.removeChild(document.getElementById(DesignMode.selected_panel));

				if(DesignMode.y_pos <= y_mid)
				{
					// Drop it before the target
					drop_target.parentNode.insertBefore(clone, drop_target);
				}
				else
				{
					// Drop it after the target
					var drop_on = null;
					var node = drop_target.nextSibling;
					if(node)
					{
						while(node)
						{
							if(node.nodeType != 3 )
							{
								drop_on = node;
								break;
							}
							else
							{
							}
							node = node.nextSibling;
						}
					}
					drop_target.parentNode.insertBefore(clone, drop_on);
				}

				// Now we've dropped it, we need to reattach the language editing events
				DesignModeLangEdit.init(clone);


				// Show the design mode changes pending box
				document.getElementById("design_mode_menu").style.display = "inline";

				// Redo the tooltips and onmousedown triggers
				DesignMode.set_dragable();
			}
		}
	},

	save: function()
	{
		var send_panels = new Array();
		var column_panels = new Array();
		var panel_count = 0;
		var divs = '';
		var subdivs = '';
		var returnStr = '';

		if(DesignMode.template_page != "")
		{
			var divs = document.getElementsByTagName("div");

			for(i = 0; i < divs.length; i++)
			{
				if(divs[i].id.indexOf("LayoutColumn") > -1)
				{
					send_panels[divs[i].id] = new Array();
					subdivs = document.getElementById(divs[i].id).getElementsByTagName("div");
					for(x = 0; x < subdivs.length; x++)
					{
						if(subdivs[x].className && subdivs[x].className.indexOf('Moveable') != -1)
						{
							send_panels[divs[i].id].push(subdivs[x].attributes["id"].value);
						}
					}
				}
			}

			// we're using an associative array, which javascrip actually doesn't support,
			// it turns it into an object so .length doesn't exist. so we do this type of
			// loop instead:
			for (j in send_panels)
			{
				returnStr += j + ':' + send_panels[j] + '|';
			}

			// Now that we have all of the divs let's post them back.
			// Set the hidden variables and submit the form in the DesignMode.html snippet.
			var dm_form = document.createElement('FORM');
			dm_form.method = "POST";
			dm_form.action = DesignMode.url;

			var dm_url = document.createElement('INPUT');
			dm_url.name = 'dm_url';
			dm_url.type = 'hidden';
			dm_url.value = document.location.href;

			var dm_template = document.createElement('INPUT');
			dm_template.name = 'dm_template';
			dm_template.type = 'hidden';
			dm_template.value = DesignMode.template_page;

			var dm_panels = document.createElement('INPUT');
			dm_panels.name = 'dm_panels';
			dm_panels.type = 'hidden';
			dm_panels.value = returnStr;

			document.body.appendChild(dm_form);
			dm_form.appendChild(dm_url);
			dm_form.appendChild(dm_template);
			dm_form.appendChild(dm_panels);
			dm_form.submit();
		}
	},

	cancel: function()
	{
		if(confirm("Are you sure? Any changes you've made wont be saved. Click OK to confirm."))
		{
			var doc_url = document.location.href;
			doc_url = doc_url.replace("#design_mode_done", "");
			document.location.href = doc_url;
		}
	},

	confirm_remove_panel: function()
	{
		var remove_panel = DesignMode.hover_div_id;
		if(confirm("Are you sure you want to remove the panel '" + remove_panel + "' from the page? It may still appear on other pages. Click OK to confirm."))
		{
			document.getElementById(remove_panel).parentNode.removeChild(document.getElementById(remove_panel));
		}
	},

	edit_panel: function()
	{
		var l = (screen.availWidth/2) - 400;
		var t = (screen.availHeight/2) - 200;

		var panel_id = DesignMode.hover_div_id;
		DesignMode.design_mode_popup(DesignMode.url+"?ToDo=editFile&File=Panels/" + panel_id + ".html");
	},

	enable: function()
	{
		DesignMode.enabled = true;
		// Save our preference
		Cookie.unset('design_mode_disabled');

		// Change the button to enabled
		var disable_button = g("DisableButton");
		disable_button.title = "Disable design mode so that links are clickable an you can navigate to other pages";
		disable_button.className += " DesignModeButtonEnabled";

		// Make 'em moveable
		DesignMode.set_dragable();
	},

	disable: function()
	{
		// Already disabled?
		if(DesignMode.enabled == false) return false;

		DesignMode.enabled = false;

		Cookie.set('design_mode_disabled', 1);

		// Change the button to disabled
		var disable_button = g("DisableButton");
		disable_button.title = "Enable design mode so that you can customize the appearance of this page";
		disable_button.className = disable_button.className.replace("DesignModeButtonEnabled", "");

		var divs = document.getElementsByTagName("div");
		for(i = 0; i < divs.length; i++) {
			if(divs[i].className.indexOf("Moveable") > -1) {
				divs[i].title = "";
				divs[i].style.cursor = '';
				divs[i].onmouseover = function() { };
			}
		}
	},

	toggle: function()
	{
		if(DesignMode.enabled)
			DesignMode.disable();
		else
			DesignMode.enable();
	},

	edit_layout_file: function()
	{
		if(DesignMode.template_page != "")
		{
			var l = (screen.availWidth/2) - 400;
			var t = (screen.availHeight/2) - 200;
			DesignMode.design_mode_popup(DesignMode.url+"?ToDo=editFile&File=" + DesignMode.template_page);
		}
		else {
			alert("The layout of this page is not editable.");
		}
	},

	edit_stylesheet_file: function()
	{
		DesignMode.design_mode_popup(DesignMode.url+"?ToDo=editFile&File=Styles/styles.css");
	},

	design_mode_popup: function(url)
	{
		var dimensions = Cookie.get("design_mode_wh");
		if(dimensions)
		{
			dimensions = dimensions.split("x");
		}
		else
		{
			dimensions = [800, 400];
		}

		var l = (screen.availWidth/2) - dimensions[0]/2;
		var t = (screen.availHeight/2) - dimensions[1]/2;
		window.open(url, "", "width="+dimensions[0]+",height="+dimensions[1]+",top="+t+",left="+l+",resizable=yes");
	},

	get_prop: function(element, prop)
	{
		if(element.currentStyle)
		{
			return element.currentStyle[prop];
		}
		else if(document.defaultView && document.defaultView.getComputedStyle)
		{
			prop = prop.replace(/([A-Z])/g,"-$1");
			prop = prop.toLowerCase();
			return document.defaultView.getComputedStyle(element, "").getPropertyValue(prop);
		}
	}
};

var DesignModeToolbar = {

	is_dragging: false,

	init: function()
	{
		// Generate toolbar
		DesignModeToolbar.toolbar = document.createElement("DIV");
		DesignModeToolbar.toolbar.id = "design_mode_menu";
		DesignModeToolbar.toolbar.className = "DesignModeMenu";

		DesignModeToolbar.toolbar.innerHTML = '<div class="DesignModeMenuHeader" id="DesignModeHeader">' +
			'<img class="DesignModeCloseButton" src="'+DesignMode.path+'/images/IcoDesignModeDelete.gif" onmouseover="this.className=\'DesignModeCloseButtonOver\'" onmouseout="this.className=\'DesignModeCloseButton\'" onclick="document.getElementById(\'design_mode_menu\').style.display=\'none\'" />' +
			'Design Mode' +
			'</div>';

		DesignModeToolbar.toolbar.innerHTML += '<div class="DesignModeControls">' +
			'<div><img title="Save Changes" src="'+DesignMode.path+'/images/IcoDesignModeSave.gif" class="DesignModeButton" onmouseover="this.className=\'DesignModeButtonOver\'" onmouseout="this.className=\'DesignModeButton\'" onclick="DesignMode.save()" /></div>' +
			'<div><img title="Cancel Design Mode" src="'+DesignMode.path+'/images/IcoDesignModeCancel.gif" class="DesignModeButton" onmouseover="this.className=\'DesignModeButtonOver\'" onmouseout="this.className=\'DesignModeButton\'" onclick="DesignMode.cancel()" /></div>' +
			'<div><img id="DisableButton" title="Disable Design Mode" src="'+DesignMode.path+'/images/IcoDesignModeEnabled.gif" class="DesignModeButton" onmouseover="this.className=\'DesignModeButtonOver\'" onmouseout="this.className=\'DesignModeButton\'; if(DesignMode.enabled == true) { this.className += \' DesignModeButtonEnabled\'; }" onclick="DesignMode.toggle()" /></div>' +
			'</div>';

		// Do we have a custom set permission for the toolbar?
		var coordinates = Cookie.get('design_mode_toolbar');
		if(coordinates)
		{
			coordinates = coordinates.split('x');
			if(!isNaN(parseInt(coordinates[0]))) {
				DesignModeToolbar.toolbar.style.left = coordinates[0] + 'px';
			}
			if(!isNaN(parseInt(coordinates[1]))) {
				DesignModeToolbar.toolbar.style.top = coordinates[1] + 'px';
			}
		}

		// Append the toolbar to the document
		document.body.appendChild(DesignModeToolbar.toolbar);

		DesignModeToolbar.on_resize();

		// Add drag events
		var header = document.getElementById('DesignModeHeader');
		Event.observe(header, 'mousedown', DesignModeToolbar.drag_start);

		Event.observe(window, 'scroll', DesignModeToolbar.on_scroll);
		Event.observe(window, 'resize', DesignModeToolbar.on_resize);
		toolbar_pos = find_pos(DesignModeToolbar.toolbar);
		DesignModeToolbar.scroll_top = toolbar_pos[1] - DesignModeToolbar.get_scroll()[1];

	},

	drag_start: function(event)
	{
		DesignModeToolbar.is_dragging = true;
		var coordinates = DesignMode.get_coordinates(event);
		Event.observe(document, 'mousemove', DesignModeToolbar.drag_move);
		Event.observe(document, 'mouseup', DesignModeToolbar.drag_end);
		toolbar_pos = find_pos(DesignModeToolbar.toolbar);
		DesignModeToolbar.x_diff = (coordinates[0] - toolbar_pos[0]);
		DesignModeToolbar.y_diff = (coordinates[1] - toolbar_pos[1]);
	},

	drag_move: function(event)
	{
		var coordinates = DesignMode.get_coordinates(event);
		if(self.innerWidth)
		{
			var adjustment = 20;
		}
		else
		{
			var adjustment = 5;
		}
		if(DesignModeToolbar.is_dragging) {
			DesignModeToolbar.toolbar.style.left = (coordinates[0] - DesignModeToolbar.x_diff) + "px";

			// Make sure we're not outside the browser view ports (left & right)
			if(parseInt(DesignModeToolbar.toolbar.style.left)+DesignModeToolbar.toolbar.offsetWidth+adjustment > DesignModeToolbar.viewport_width)
			{
				DesignModeToolbar.toolbar.style.left = (DesignModeToolbar.viewport_width - DesignModeToolbar.toolbar.offsetWidth-adjustment) + 'px';
			}
			if(parseInt(DesignModeToolbar.toolbar.style.left) < 1)
			{
				DesignModeToolbar.toolbar.style.left = "1px";
			}
			DesignModeToolbar.toolbar.style.top = (coordinates[1] - DesignModeToolbar.y_diff) + "px";
		}
	},

	drag_end: function()
	{
		DesignModeToolbar.is_dragging = false;
		Event.stopObserving(document, 'mousemove', DesignModeToolbar.drag_move);
		Event.stopObserving(document, 'mouseup', DesignModeToolbar.drag_end);
		toolbar_pos = find_pos(DesignModeToolbar.toolbar);
		DesignModeToolbar.scroll_top = toolbar_pos[1] - DesignModeToolbar.get_scroll()[1];

		// Store saved position
		Cookie.set('design_mode_toolbar', parseInt(DesignModeToolbar.toolbar.style.left)+"x"+parseInt(DesignModeToolbar.toolbar.style.top));
	},

	on_scroll: function()
	{
		DesignModeToolbar.toolbar.style.top = (DesignModeToolbar.get_scroll()[1] + DesignModeToolbar.scroll_top) + "px";

		// Outside the view port?
	},

	on_resize: function(event)
	{
		if(self.innerWidth)
		{
			DesignModeToolbar.viewport_width = self.innerWidth;
		}
		else
		{
			DesignModeToolbar.viewport_width = document.body.clientWidth;
		}
		if(parseInt(DesignModeToolbar.toolbar.style.left)+DesignModeToolbar.toolbar.offsetWidth > DesignModeToolbar.viewport_width)
		{
			// Nudge nudge
			DesignModeToolbar.toolbar.style.left = (DesignModeToolbar.viewport_width - DesignModeToolbar.toolbar.offsetWidth- 50) + 'px';
		}
	},

	get_scroll: function()
	{
		if(window.pageYOffset)
		{
			return [window.pageXOffset, window.pageYOffset];
		}
		else
		{
			return [document.body.scrollLeft, document.body.scrollTop];
		}
	}
};

var DesignModeMenu = {

	visible: false,
	is_ctrl: false,
	over: false,

	init: function()
	{
		// Generate the design mode context menu
		var menu = '<div id="design_mode_context_menu" class="DesignModeContextMenu" style="display: block; top: -9000px; left: -9000px;">';
		menu += '<ul style="text-align: left;">' +
			'<li id="menu_edit_panel" onclick="DesignMode.edit_panel(); DesignModeMenu.hide();">Edit Panel...</li>' +
			'<li id="menu_remove_panel" onclick="DesignMode.confirm_remove_panel(); DesignModeMenu.hide();">Remove Panel</li>' +
			'<li id="menu_sep" style="margin:0px; padding:0px"><hr style="color:#ACA899; margin:6px 6px 3px 6px; width:90%" align="center" /></li>' +
			'<li onclick="DesignMode.edit_layout_file();  DesignModeMenu.hide();">Edit Layout...</li>' +
			'<li onclick="DesignMode.edit_stylesheet_file(); DesignModeMenu.hide();">Edit Stylesheet...</li>' +
			'</ul>';
		menu += '</div';

		$('body').append(menu);

		$('.DesignModeContextMenu li').hover(function() {
			$(this).addClass('DesignModeContextMenuHover');
			DesignModeMenu.over = true;
		}, function() {
			$(this).removeClass('DesignModeContextMenuHover');
			DesignModeMenu.over = false;
		})

		$(document).mousedown(DesignModeMenu.toggle);
		$(document).keydown(function(e) {
			if(e.ctrlKey) {
				DesignModeMenu.is_ctrl = true;
			}
		});
		$(document).keyup(function(e) {
			if(e.ctrlKey) {
				DesignModeMenu.is_ctrl = false;
			}
		});
		$(document).bind('contextmenu', DesignModeMenu.kill_right_click_menu);
	},

	toggle: function(event)
	{
		if(Event.button(event) == 1)
		{
			if(DesignModeMenu.visible && !DesignModeMenu.over)
				DesignModeMenu.hide();
		}
		else if(!DesignMode.selected_panel && !DesignModeMenu.is_ctrl)
		{
			DesignModeMenu.show(false);
		}
		return false;
	},

	show: function(over_panel)
	{
		if(!DesignMode.enabled) return false;
		$('.DesignModeContextMenu').show();

		// Fetches coordinates for menu
		$('.DesignModeContextMenu').css('left', DesignMode.x_pos + "px");
		$('.DesignModeContextMenu').css('top', DesignMode.y_pos + "px");

		DesignModeMenu.visible = true;

		if(over_panel)
		{
			document.getElementById("menu_edit_panel").style.display = "block";
			document.getElementById("menu_remove_panel").style.display = "block";
			document.getElementById("menu_sep").style.display = "block";
		}
		else
		{
			document.getElementById("menu_edit_panel").style.display = "none";
			document.getElementById("menu_remove_panel").style.display = "none";
			document.getElementById("menu_sep").style.display = "none";
		}
	},

	hide: function()
	{
		$('.DesignModeContextMenu').hide();
		//window.setTimeout('document.getElementById("design_mode_context_menu").style.display = "none";', 100);
	},

	kill_right_click_menu: function(e)
	{

		// Only kill browsers right click menu if design mode is enabled
		if(DesignMode.enabled == true && !DesignModeMenu.is_ctrl)
		{
			Event.stop(e);
			return false;
		}
	}
}

var DesignModeLangEdit = {
	current_item: '',

	init: function(parent)
	{
		if(!parent) parent = document;
		var spans = parent.getElementsByTagName('SPAN');
		if(spans)
		{
			for(var i = 0; i < spans.length; i++)
			{
				if(spans[i].className && spans[i].className.indexOf('LNGString') != -1)
				{
					spans[i].title = "Click to Edit";
					$(spans[i]).mouseover(function(event) {
						if(DesignMode.enabled == true) {
							DesignModeLangEdit.toggle_class(this, event);
						}
					});
					$(spans[i]).mouseout(function(event) {
						if(DesignMode.enabled == true) {
							DesignModeLangEdit.toggle_class(this, event);
						}
					});
					$(spans[i]).click(function(event) {
						DesignModeLangEdit.edit(this, event);
					});
				}
			}
		}
	},

	edit: function(element, event)
	{
		if(element == event.target) {
			if(DesignMode.enabled == false) { return true; }
			DesignMode.enabled = false;
			if(!element || (element.className && element.className.indexOf('LNGString'))) return false;
			Event.stop(event);
			if(element.currently_editing) return false;
			element.currently_editing = true;
			element.className = element.className.replace('DesignModeLangOver', '');
			element.old_value = element.innerHTML;
			value = element.innerHTML.replace("'", '&#39;');
			value = value.replace('>', '&gt;');
			value = value.replace('<', '&lt;');
			var textBoxWidth = element.offsetWidth + 25;
			var replacement = "<span class=\"DesignModeEditFields\" onclick=\"return false;\" style=\"text-decoration: none; cursor: default;\"><input type=\"text\" class=\"DesignModeLangField\" onkeypress=\"if(event.keyCode == 13) { DesignModeLangEdit.save(this); } else if(event.keyCode == 27) { DesignModeLangEdit.cancel(this); }\" value=\""+value+"\" style=\"font-size: "+DesignModeLangEdit.get_prop(element, 'font-size')+"; width: "+textBoxWidth+"px\" /><br /><input type=\"button\" onclick=\"DesignModeLangEdit.save(this)\" value=\"Save\" class=\"DesignModeLangSave\" /> OR <input type=\"button\" onclick=\"DesignModeLangEdit.cancel(this)\" value=\"Cancel\" class=\"DesignModeLangCancel\" />";
			element.innerHTML = replacement;
			element.getElementsByTagName('INPUT')[0].focus();
			element.getElementsByTagName('INPUT')[0].select();
		}
	},

	save: function(element)
	{
		var element = element.parentNode.parentNode;
		var input = element.getElementsByTagName('INPUT')[0];
		DesignMode.enabled = true;
		if(!input.value) return false;
		element.className += ' DesignModeLangSaving';
		element.innerHTML = 'Saving..';
		element.new_value = input.value;

		jQuery.ajax({ url: DesignMode.remoteUrl, type: 'POST', dataType: 'xml',
			data: {'w': 'UpdateLanguage', "LangName": element.id, "NewValue": input.value },
			success: function(xml) {
				DesignModeLangEdit.saved(xml, element);
			}
		});

		element.currently_editing = false;
	},

	saved: function(xml, element)
	{
		if($('status', xml).text() == 1){
			element.innerHTML = $('newvalue', xml).text();
		}else{
			alert($('message', xml).text());
			var current_url = document.location.href;
			document.location.href = current_url;
		}
		//element.innerHTML = element.new_value;
		element.currently_editing = false;
		element.className = element.className.replace(' DesignModeLangSaving', '');
	},

	cancel: function(element)
	{
		var element = element.parentNode.parentNode;
		element.currently_editing = false;
		element.innerHTML = element.old_value;
		DesignMode.enabled = true;
	},

	toggle_class: function(element, event)
	{
		if(element == event.target) {
			if(!element || element.currently_editing || (element.className && element.className.indexOf('LNGString'))) return false;

			if(element.className.indexOf('DesignModeLangOver') != -1)
			{
				element.className = element.className.replace('DesignModeLangOver', '');
			}
			else
				element.className += " DesignModeLangOver";
		}
	},

	get_prop: function(element, prop)
	{
		if(element.currentStyle)
		{
			return element.currentStyle[prop];
		}
		else if(document.defaultView && document.defaultView.getComputedStyle)
		{
			prop = prop.replace(/([A-Z])/g,"-$1");
			prop = prop.toLowerCase();
			return document.defaultView.getComputedStyle(element, "").getPropertyValue(prop);
		}
	}
};

$(document).ready(function() {
	$("input[value*='LNGString']").each(function() {
		this.value = this.value.replace(/<span id='(.+)' class='LNGString'>(.+)<\/span>/, '$2');
	});

	$("submit").each(function() {
		this.value = this.value.replace(/<span id='(.+)' class='LNGString'>(.+)<\/span>/, '$2');
	});
});

// Initialize
DesignMode.init();

function g(element)
{
	return document.getElementById(element);
}

function multi_array(iRows,iCols)
{
	var i;
	var j;
	var a = new Array(iRows);

		for (i=0; i < iRows; i++)
		{
			a[i] = new Array(iCols);
			for (j=0; j < iCols; j++)
			{
				a[i][j] = "";
			}
		}

	return a;
}

function find_pos(obj) {
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
}

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