
var design_mode_on = true;
var is_dragging = false;
var context_menu_visible = false;
var drop_targets = new Array();

var selected_panel = "";
var move_layer = document.getElementById("move_layer");

var button = 0;
var panel_width = 0;
var panel_height = 0;
var x_pos = 0;
var y_pos = 0;
var x_diff = 0;
var y_diff = 0;

var template_page = "";
var from_panel = "";
var to_panel = "";
var direction = "";
var hover_div_id = "";

if(document.all) {
	document.onmousedown = mouse_down;
	document.onmouseup = mouse_up;
	document.onmousemove = mouse_move;
	document.onselectstart = function () { return false; };
	document.oncontextmenu = kill_right_click_menu;
}
else {
	window.onmousedown = mouse_down;
	window.onmouseup = mouse_up;
	window.onmousemove = mouse_move;
	document.oncontextmenu = kill_right_click_menu;
}

function kill_right_click_menu() {
	// Only kill browsers right click menu if design mode is enabled
	if(design_mode_on) {
		return false;
	}
}

function highlight_targets() {
	// Find a list of targets and highlight them
	var divs = document.getElementsByTagName("div");
	drop_targets.length = new Array();
	
	for(i = 0; i < divs.length; i++) {
		if(divs[i].className.indexOf("Moveable") > -1 && divs[i].id != selected_panel) {
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
			document.body.appendChild(drop_div);

			// Append the drop target's dimensions to the drop_targets array
			drop_targets.push(new Array(x, y, w, h, divs[i].id));
		}
	}
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

function mouse_down(event) {
	if(!design_mode_on) return false;
	if(!event) {
		if(window.event) {
			//Internet Explorer
			event = window.event;
		}
		else {
			return;
		}
	}

	if(event.which)
		button = event.which;
	else
		button = event.button;

	// Is it the left button?
	if(button == 1) {
		is_dragging = true;
		hide_context_menu();
	}
	else {
		// It must be the context menu
		is_dragging = false;

		if(!context_menu_visible)
			show_context_menu(false);
	}
	
	return false;
}

function hide_context_menu() {
	context_menu_visible = false;
	window.setTimeout('document.getElementById("design_mode_context_menu").style.display = "none";', 100);
}

function show_context_menu(is_over_panel) {
	var dm_context = document.getElementById("design_mode_context_menu");
	dm_context.style.display = "block";
	dm_context.style.left = x_pos + "px";
	dm_context.style.top = y_pos + "px";
	context_menu_visible = true;

	if(is_over_panel) {
		document.getElementById("menu_edit_panel").style.display = "block";
		document.getElementById("menu_remove_panel").style.display = "block";
		document.getElementById("menu_sep").style.display = "block";
	}
	else {
		document.getElementById("menu_edit_panel").style.display = "none";
		document.getElementById("menu_remove_panel").style.display = "none";
		document.getElementById("menu_sep").style.display = "none";
	}
}

function select_panel(id) {
	if(design_mode_on && button == 1) {
		selected_panel = id;
		panel_width = document.getElementById(selected_panel).offsetWidth;
		panel_height = document.getElementById(selected_panel).offsetHeight;
		move_layer.style.display = "inline";
		move_layer.style.width = panel_width + "px";
		move_layer.style.height = panel_height + "px";
		selected_pos = find_pos(document.getElementById(selected_panel));
		move_layer.style.left = selected_pos[0] + "px";
		move_layer.style.top = selected_pos[1] + "px";
		x_diff = (x_pos - selected_pos[0]);
		y_diff = (y_pos - selected_pos[1]);
		highlight_targets();
	}
}

function sel_panel(id) {
	window.setTimeout("select_panel('" + id + "')", 10);
}

function mouse_up() {
	move_layer.style.display = "none";
	is_dragging = false;
	selected_panel = "";
	kill_drop_targets();
}

function kill_drop_targets() {
	// Hide the drop targets when the mouse is released
	var divs = document.getElementsByTagName("div");
	
	for(i = 0; i < divs.length; i++) {
		if(divs[i].id.indexOf("drop_target_") > -1) {
			divs[i].style.display = "none";
		}
	}
}

function mouse_move(event) {
	get_coords(event);

	if(is_dragging && selected_panel != "") {
		move_layer.style.left = (x_pos - x_diff) + "px";
		move_layer.style.top = (y_pos - y_diff) + "px";
	}
}

function get_coords(event) {
	if(document.all) {
		x_pos = window.event.x;
		y_pos = window.event.y;
	}
	else {
		x_pos = event.pageX;
		y_pos = event.pageY;
	}

	// Factor in page scrolling for IE
	if(document.documentElement.scrollTop && document.all) {
		if(document.documentElement.scrollLeft)
			x_pos = x_pos + document.documentElement.scrolLeft;
		y_pos = y_pos + document.documentElement.scrollTop;
	}

	if (x_pos < 0){x_pos = 0;}
	if (y_pos < 0){y_pos = 0;}
}

function check_drop_target() {
	/**
	 *	Are we over a drop target? If so, make the switch. Drop targets
	 *  have the format of x, y, w, h, id so we need to check the boundaries
	 *  and see if we've dropped inside a target.
	*/

	var attr_list = "";

	for(i = 0; i < drop_targets.length; i++) {
		var did = drop_targets[i][4];
		var dx1 = drop_targets[i][0];
		var dy1 = drop_targets[i][1];
		var dx2 = dx1 + drop_targets[i][2];
		var dy2 = dy1 + drop_targets[i][3];

		//if(x_pos >= dx1 && x_pos <= dx2 && y_pos >= dy1 && y_pos <= dy2) {
		if(x_pos >= dx1 && x_pos <= dx2 && y_pos >= (dy1-50) && y_pos <= (dy2+50)) {
			
			// We have a match, but was it dropped in the top half or bottom half?
			// If top, we'll position it above. If bottom, we'll position it below

			var y_mid = dy2 - ((dy2 - dy1) / 2);

			// Get the entire tag to drop
			var source_target_html = getOuterHTML(selected_panel);

			var drop_target_parent = document.getElementById(did).parentNode;
			var drop_target_html = getOuterHTML(did);

			from_panel = selected_panel;
			to_panel = did;

			// Destroy the original source
			document.getElementById(selected_panel).parentNode.removeChild(document.getElementById(selected_panel));

			if(y_pos <= y_mid) {
				// Drop it before the target
				drop_target_parent.innerHTML = drop_target_parent.innerHTML.replace(drop_target_html, source_target_html + drop_target_html);
				direction = "above";
			}
			else {
				// Drop it after the target
				drop_target_parent.innerHTML = drop_target_parent.innerHTML.replace(drop_target_html, drop_target_html + source_target_html);
				direction = "below";
			}

			// Show the design mode changes pending box
			document.getElementById("design_mode_menu").style.display = "inline";

			// Redo the tooltips and onmousedown triggers
			add_panel_tooltips();
		}
	}
}

function getOuterHTML(obj) {
	temp=document.getElementById(obj).cloneNode(true);
	document.getElementById("design_mode_temp").appendChild(temp);
	outer=document.getElementById("design_mode_temp").innerHTML;
	document.getElementById("design_mode_temp").innerHTML="";
	return outer;
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

	return(a);
}

function design_mode_save() {

	// Which template file are we editing? This is stored as
	// the template_page attribute of the page's body tag

	var left_panels = new Array();
	var mid_panels = new Array();
	var right_panels = new Array();

	if(template_page != "") {
		var divs = document.getElementsByTagName("div");
		
		for(i = 0; i < divs.length; i++) {
			if(divs[i].className.indexOf("left") > -1) {
				//Get all of the panels in the left column
				var left_divs = divs[i].getElementsByTagName("div");

				for(j = 0; j < left_divs.length; j++) {
					if(left_divs[j].attributes["is_panel"]) {
						left_panels.push(left_divs[j].attributes["id"].value);
					}
				}
			}

			if(divs[i].className.indexOf("content") > -1) {
				//Get all of the panels in the middle column
				var mid_divs = divs[i].getElementsByTagName("div");

				for(j = 0; j < mid_divs.length; j++) {
					if(mid_divs[j].attributes["is_panel"]) {
						mid_panels.push(mid_divs[j].attributes["id"].value);
					}
				}
			}

			if(divs[i].className.indexOf("right") > -1) {
				//Get all of the panels in the right column
				var right_divs = divs[i].getElementsByTagName("div");

				for(j = 0; j < right_divs.length; j++) {
					if(right_divs[j].attributes["is_panel"]) {
						right_panels.push(right_divs[j].attributes["id"].value);
					}
				}
			}
		}

		// Now that we have all of the divs let's post them back.
		// Set the hidden variables and submit the form in the DesignMode.html snippet.

		document.getElementById("dm_url").value = document.location.href;
		document.getElementById("dm_template").value = template_page;
		document.getElementById("dm_left_panels").value = left_panels;
		document.getElementById("dm_mid_panels").value = mid_panels;
		document.getElementById("dm_right_panels").value = right_panels;
		document.getElementById("design_mode_form").submit();
	}
}

function design_mode_cancel() {
	if(confirm("Are you sure? Any changes you've made wont be saved. Click OK to confirm.")) {
		var doc_url = document.location.href;
		doc_url = doc_url.replace("#design_mode_done", "");
		document.location.href = doc_url;
	}
}

function confirm_remove_panel() {
	var remove_panel = hover_div_id;
	if(confirm("Are you sure you want to remove the panel '" + remove_panel + "' from the page? It will still appear on other pages. Click OK to confirm.")) {
		document.getElementById(remove_panel).parentNode.removeChild(document.getElementById(remove_panel));
	}
}

function edit_panel() {
	var l = (screen.availWidth/2) - 400;
	var t = (screen.availHeight/2) - 200;

	var panel_id = hover_div_id;
	window.open(shop_path + "/admin/designmode.php?ToDo=editFile&File=Panels/" + panel_id + ".html", "", "width=800,height=400,top="+t+",left="+l);
}

function add_panel_tooltips() {
	// Add a tooltip and set the hover_div_id variable
	var divs = document.getElementsByTagName("div");

	for(i = 0; i < divs.length; i++) {
		if(divs[i].className.indexOf("Moveable") > -1) {
			divs[i].title = "This is the '" + divs[i].id + "' panel";
			divs[i].onmouseover = function() {
				if(this.id != "")
					hover_div_id = this.id;
				else
					hover_div_id = "";
			}
			divs[i].onmousedown = function(event) {
				if(!event) {
					if(window.event) {
						//Internet Explorer
						event = window.event;
					}
					else {
						return;
					}
				}

				if(event.which)
					button = event.which;
				else
					button = event.button;

				if(this.id != "" && button != 1)
					show_context_menu(true);
				else if(this.id != "" && button == 1)
					select_panel(this.id);
			}
		}
	}
}


function toggle_design_mode()
{
	var disable_button = document.getElementById("DisableButton");

	var divs = document.getElementsByTagName("div");

	// Turn design mode on
	if(design_mode_on == false) {
		design_mode_on = true;
		
		set_cookie('design_mode_disabled', '', -1);

		// Change the button to enabled
		disable_button.title = "Disable design mode so that links are clickable an you can navigate to other pages";
		disable_button.onclick = toggle_design_mode;
		disable_button.className += " DesignModeButtonEnabled";
		for(i = 0; i < divs.length; i++) {
			if(divs[i].getAttribute('is_panel')) {
				divs[i].className += " Moveable";
			}
		}

		add_panel_tooltips();
	}
	// Turn design mode off
	else {
		design_mode_on = false;

		set_cookie('design_mode_disabled', 1);

		// Change the button to disabled
		disable_button.title = "Enable design mode so that you can customize the appearance of this page";
		disable_button.onclick = toggle_design_mode;
		disable_button.className = disable_button.className.replace("DesignModeButtonEnabled", "");
		for(i = 0; i < divs.length; i++) {
			if(divs[i].className.indexOf("Moveable") > -1) {
				divs[i].className = divs[i].className.replace("Moveable", "");
				divs[i].title = "";
			}
		}
	}
}

function edit_layout_file() {
	if(template_page != "") {
		var l = (screen.availWidth/2) - 400;
		var t = (screen.availHeight/2) - 200;
		window.open(shop_path + "/admin/designmode.php?ToDo=editFile&File=" + template_page, "", "width=800,height=400,top="+t+",left="+l);
	}
	else {
		alert("The layout of this page is not editable.");
	}
}

function edit_stylesheet_file() {
	var l = (screen.availWidth/2) - 400;
	var t = (screen.availHeight/2) - 200;
	window.open(shop_path + "/admin/designmode.php?ToDo=editFile&File=Styles/styles.css", "", "width=800,height=400,top="+t+",left="+l);
}

// Have we just made a layout change? If so the URL will contain #design_mode_done
if(document.location.href.indexOf("#design_mode_done") > -1 ) {
	alert("Your design mode changes have been saved successfully.");
}

// Add a tooltip to all panels that can be moved
add_panel_tooltips();

if(document.body.attributes["template_page"])
	template_page = document.body.attributes["template_page"].value;

// Initialize design mode
var disabled = get_cookie('design_mode_disabled');
if(disabled)
{
	toggle_design_mode();
}
