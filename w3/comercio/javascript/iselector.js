/*
	ISSelectReplacement
*/
if(typeof(ISSelectReplacement) == 'undefined') {
	var ISSelectReplacement = {
		init: function()
		{
			if(window.addEventListener)
				window.addEventListener('load', ISSelectReplacement.on_load, false);
			else
				window.attachEvent('onload', ISSelectReplacement.on_load);
		},

		on_load: function()
		{
			var selects = document.getElementsByTagName('SELECT');
			if(!selects) return false;

			for(var i = 0; i < selects.length; i++)
			{
				var select = selects[i];
				if(!select.multiple || select.className.indexOf('ISSelectReplacement') == -1 || select.className.indexOf('ISSelectAlreadyReplaced') != -1) continue; // Only multiple selects are supported

				ISSelectReplacement.replace_select(selects[i]);
			}
		},
		replace_select: function(element)
		{
			var name = element.name;

			element.style.visibility = 'hidden';

			// Start whipping up our replacement
			var replacement = document.createElement('DIV');
			replacement.className = "ISSelect "+element.className;
			replacement.className += " ISSelectAlreadyReplaced";
			var hideSelectReplacement = false;
			// If the offsetHeight is 0, this select is hidden
			if(element.offsetHeight == 0)
			{
				var clone = element.cloneNode(true);
				clone.style.position = 'absolute';
				clone.style.left = '-10000px';
				clone.style.top = '-10000px';
				clone.style.display = 'block';
				document.body.appendChild(clone);
				offset_height = clone.offsetHeight+"px";
				offset_width = clone.offsetWidth+"px";
				clone.parentNode.removeChild(clone);
				if(element.style.display && element.style.display == 'none') {
					var hideSelectReplacement = true;
				}
			}
			else
			{
				offset_height = element.offsetHeight+"px";
				offset_width = element.offsetWidth+"px";
			}
			var style_offset_width = ISSelectReplacement.get_prop(element, 'width');
			if(style_offset_width && style_offset_width != "auto") offset_width = style_offset_width;
			var style_offset_height = ISSelectReplacement.get_prop(element, 'height');
			if(style_offset_height && style_offset_height != "auto") offset_height = style_offset_height;
			replacement.style.height = offset_height;

			if(parseInt(offset_width) < 200) {
				offset_width = '200px';
			}
			replacement.style.width = offset_width;
			if(element.id)
			{
				replacement.id = element.id;
				element.id += "_old";
			}
			if(hideSelectReplacement) {
				replacement.style.display = 'none';
			}
			replacement.select = element;
			replacement.options = element.options;
			replacement.selectedIndex = element.selectedIndex;
			this.select = element;
			this.replacement = replacement;

			if(element.onchange)
			{
				replacement.onclick = function()
				{
					$(this.select).trigger('change');
				}
			}

			if(element.ondblclick)
			{
				replacement.ondblclick = function()
				{
					$(this.select).trigger('dblclick');
				}
			}

			var innerhtml = '<ul>';

			// Loop de loop
			for(var i = 0; i < element.childNodes.length; i++)
			{
				if(!element.childNodes[i].tagName || element.nodeType == 3) continue;
				if(element.childNodes[i].tagName == "OPTGROUP")
				{
					innerhtml += ISSelectReplacement.add_group(element, element.childNodes[i], i);
				}
				else if(element.childNodes[i].tagName == "OPTION")
				{
					innerhtml += ISSelectReplacement.add_option(element, element.childNodes[i], i);
				}
			}

			innerhtml += '</ul>';
			replacement.innerHTML = innerhtml;

			element.parentNode.insertBefore(replacement, element);
			element.style.display = 'none';
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
		},

		add_group: function(select, group, group_id)
		{
			var extraClass = '';
			if(group.className) {
				extraClass = group.className;
			}
			group_html = '<li class="ISSelectGroup '+extraClass+'">' +
				'<div>'+group.label+'</div>';

			if(group.childNodes)
			{
				group_html += '<ul>';
				for(var i = 0; i < group.childNodes.length; i++)
				{
					if(!group.childNodes[i].tagName || group.childNodes[i].nodeType == 3) continue;
					group_html += ISSelectReplacement.add_option(select, group.childNodes[i], [group_id, i]);
				}
				group_html += '</ul>';
			}

			group_html += '</li>';
			return group_html;
		},

		add_option: function(select, option, id)
		{
			var value, element_class, checked = '';
			if(option.selected)
			{
				element_class = "SelectedRow";
				checked = 'checked="checked"'
			}
			else {
				element_class = '';
			}

			var label = option.innerHTML;
			var whitespace = label.match(/^\s*(&nbsp;)*/);
			if(whitespace[0])
			{
				label = label.replace(/^\s*(&nbsp;)*/, '');
			}
			var disabled = '';
			if(this.select.disabled) {
				var disabled = ' disabled="disabled"';
			}

			var extraKey = '';
			var extra = '';
			if(option.className && option.className.indexOf('forceKey') != -1) {
				var start = option.className.indexOf('forceKey');
				var end = option.className.indexOf(' ', start+1);
				if(end == -1) {
					var end = option.className.length;
				}
				var extraKey = option.className.substring(start+8, end);
				var extra = '[]';
			}
			html = '<li id="ISSelect'+select.name.replace('[]', '')+'_'+option.value+'" class="'+element_class+'" onselectstart="return false;" style="-moz-user-select: none;" onmouseover="ISSelectReplacement.on_hover(this, \''+id+'\', \'over\');"' +
				'onmouseout=\"ISSelectReplacement.on_hover(this, \''+id+'\', \'out\');" onclick="ISSelectReplacement.on_click(this, \''+id+'\');">' + whitespace[0];
			if($(option).hasClass('freeform')) {
				html +=	'<input type="textbox" name="ISSelectReplacement_'+select.name+'['+extraKey+']'+extra+'" value="' + option.value + '" onclick="ISSelectReplacement.on_click(this, \''+id+'\');" />';
			}
			else {
				html += '<input type="checkbox" name="ISSelectReplacement_'+select.name+'['+extraKey+']'+extra+'" value="'+option.value+'" '+checked+disabled+'" onclick="ISSelectReplacement.on_click(this, \''+id+'\');" />' + label;
			}
			html += '</li>';
			return html;
		},

		on_hover: function(element, id, action)
		{
			var id = id.split(',');

			// Selected an option group child
			if(id.length == 2)
			{
				var replacement = element.parentNode.parentNode.parentNode.parentNode;
				var option = replacement.select.childNodes[id[0]].childNodes[id[1]];
			}
			else
			{
				var replacement = element.parentNode.parentNode;
				var option = replacement.select.childNodes[id[0]];
			}

			if(action == 'out') {
				if(element.className != "SelectedRow") {
					element.className = "";
				}
				$(option).trigger('mouseout');
			}
			else {
				if(element.className != "SelectedRow") {
					element.className = "ISSelectOptionHover";
				}
				$(option).trigger('mouseover');
			}
		},

		scrollToItem: function(select_name, value, group)
		{
			var item = 'ISSelect'+select_name.replace('[]', '')+'_'+value;
			if(!document.getElementById(item))
				return;

			var obj = document.getElementById(item);
			var top = obj.offsetTop-4;
			if(typeof(group) != 'undefined') {
				top -= 20;
			}

			while(obj && obj.tagName != 'DIV')
			{
				obj = obj.parentNode;
				if(obj && obj.tagName == 'DIV') {
					obj.scrollTop = top;
					break;
				}
			}
		},

		on_click: function(element, id)
		{
			if(element.dblclicktimeout)
			{
				return false;
			}
			if(element.tagName == "INPUT")
			{
				var checkbox = element;
				if(checkbox.disabled) {
					return false;
				}
				var element = element.parentNode;
			}
			else
			{
				var checkbox = element.getElementsByTagName('input')[0];
				if(checkbox.disabled) {
					return false;
				}
				checkbox.checked = !checkbox.checked;
			}

			element.dblclicktimeout = setTimeout(function() { element.dblclicktimeout = ''; }, 250);

			var id = id.split(',');

			// Selected an option group child
			if(id.length == 2)
			{
				var replacement = element.parentNode.parentNode.parentNode.parentNode;
				var option = replacement.select.childNodes[id[0]].childNodes[id[1]];
			}
			else
			{
				var replacement = element.parentNode.parentNode;
				var option = replacement.select.childNodes[id[0]];
			}

			option.selected = checkbox.checked;
			replacement.selectedIndex = replacement.select.selectedIndex;
			if(option.onclick)
			{
				$(option).trigger('click');
			}

			if(checkbox.checked)
			{
				element.className = "SelectedRow";
			}
			else
			{
				element.className = '';
			}
		}
	};

	ISSelectReplacement.init();
}