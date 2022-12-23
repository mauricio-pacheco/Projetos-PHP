var QuickSearch = {
	minimum_length: 3,
	search_delay: 125,
	cache: new Object(),
	init: function()
	{
		$('#search_query').bind("keydown", QuickSearch.on_keydown);
		$('#search_query').bind("keyup", QuickSearch.on_keyup);
		$('#search_query').blur(QuickSearch.on_blur);
		$('#search_query').attr('autocomplete', 'off');

		var scripts = document.getElementsByTagName('SCRIPT');
		for(var i = 0; i < scripts.length; i++)
		{
			s = scripts[i];
			if(s.src && s.src.indexOf('quicksearch.js') > -1)
			{
				QuickSearch.path = s.src.replace(/quicksearch\.js$/, '../');
				break;
			}
		}

	},

	on_blur: function(event)
	{
		if(!QuickSearch.item_selected && !QuickSearch.over_all)
		{
			QuickSearch.hide_popup();
		}
	},

	on_keydown: function(event)
	{
		if(event.keyCode == 13 && !event.altKey)
		{
			if(QuickSearch.selected)
			{
				try {
					event.preventDefault();
					event.stopPropagation();
				} catch(e) { }
				window.location = QuickSearch.selected.url;
				return false;
			}
			else
			{
				QuickSearch.hide_popup();
			}
		}
		else if(event.keyCode == 27)
		{
			if(document.getElementById('QuickSearch'))
			{
				try {
					event.preventDefault();
					event.stopPropagation();
				} catch(e) { }
			}
			QuickSearch.hide_popup();
		}
	},

	on_keyup: function(event)
	{
		if(QuickSearch.timeout)
		{
			clearTimeout(QuickSearch.timeout);
		}

		// Down key was pressed
		if(event.keyCode == 40 && QuickSearch.results)
		{
			if(QuickSearch.selected && QuickSearch.results.length >= QuickSearch.selected.index+1)
			{
				QuickSearch.highlight_item(QuickSearch.selected.index+1, true);
			}
			if(!QuickSearch.selected && QuickSearch.results.length > 0)
			{
				QuickSearch.highlight_item(0, true);
			}
			try {
				event.preventDefault();
				event.stopPropagation();
			} catch(e) { }
			return false;
		}
		else if(event.keyCode == 38 && QuickSearch.results)
		{
			if(QuickSearch.selected && QuickSearch.selected.index > 0)
			{
				QuickSearch.highlight_item(QuickSearch.selected.index-1, true);
			}
			try {
				event.preventDefault();
				event.stopPropagation();
			} catch(e) { }
		}
		else if(event.keyCode == 27)
		{
			QuickSearch.hide_popup();
		}
		else
		{
			if($('#search_query').val() == QuickSearch.last_query)
			{
				return false;
			}
			QuickSearch.selected = false;
			if($('#search_query').val().replace(/^\s+|\s+$/g, '').length >= QuickSearch.minimum_length)
			{
				QuickSearch.last_query = $('#search_query').val().replace(/^\s+|\s+$/g, '');
				if(QuickSearch.timeout)
				{
					window.clearTimeout(QuickSearch.timeout);
				}
				QuickSearch.timeout = window.setTimeout(QuickSearch.do_search, QuickSearch.search_delay);
			}
			else {
				if(document.getElementById('QuickSearch'))
				{
					$('#QuickSearch').remove();
				}
			}
		}
	},

	do_search: function()
	{
		var cache_name = $('#search_query').val().length+$('#search_query').val();
		if(QuickSearch.cache[cache_name])
		{
			QuickSearch.search_done(QuickSearch.cache[cache_name]);
		}
		else
		{
			$.ajax({
				type: 'GET',
				url: QuickSearch.path+'search.php?action=AjaxSearch&search_query='+encodeURIComponent($('#search_query').val()),
				success: function(response) { QuickSearch.search_done(response); }
			});
		}
	},

	search_done: function(response)
	{
		// Cache results
		var cache_name = $('#search_query').val().length+$('#search_query').val();
		QuickSearch.cache[cache_name] = response;

		if(window.ActiveXObject)
		{
			var results_xml = new ActiveXObject("Microsoft.XMLDOM");
			results_xml.async = false;
			results_xml.loadXML(response);
		}
		else
		{
			var _parser = new DOMParser();
			var results_xml = _parser.parseFromString(response, "text/xml");
		}
		// Parse in results
		var results = results_xml.getElementsByTagName('result');
		if(results && results.length > 0)
		{
			QuickSearch.results = new Array();
			for(var i = 0; i < results.length; i++)
			{
				QuickSearch.results.push({
					title: results[i].getAttribute('title'),
					url: results[i].getAttribute('url'),
					price: results[i].getAttribute('price'),
					ratingimg: results[i].getAttribute('ratingimg'),
					image: results[i].getAttribute('image')
				});
			}


			// Results are now stored, build the menu

			if(document.getElementById('QuickSearch'))
			{
				$('#QuickSearch').remove();
			}

			var popup_container = document.createElement('TABLE');
			popup_container.className = 'QuickSearch';
			popup_container.id = 'QuickSearch';
			popup_container.cellPadding = "0";
			popup_container.cellSpacing = "0";
			popup_container.border = "0";

			var popup = document.createElement('TBODY');
			popup_container.appendChild(popup);

			// Initial node is our "Products" node
			var tr = document.createElement('TR');
			var td = document.createElement('TD');
			tr.className = "QuickSearchTitle";
			td.colSpan = "2";
			td.innerHTML = results_xml.getElementsByTagName('results')[0].getAttribute('type');
			tr.appendChild(td);
			popup.appendChild(tr);

			for(var i = 0; i < QuickSearch.results.length; i++)
			{
				var result = QuickSearch.results[i];
				var tr = document.createElement('TR');
				tr.id = "QuickSearchResult"+i;
				tr.className = "QuickSearchResult";

				var image_container = document.createElement('TD');
				image_container.className = 'QuickSearchResultImage';

				result.image = unescape(result.image);
				if(result.image.indexOf('http://') == 0 || result.image.indexOf('https://') == 0)
				{
					var image = document.createElement('IMG');
					image.src = result.image;
					image.alt = '';
					image.title = unescape(result.title);
					image_container.appendChild(image);
				}
				else
				{
					image_container.className += " QuickSearchResultNoImage";
					image_container.innerHTML = result.image.replace('+', ' ');
				}
				tr.appendChild(image_container);

				var meta = document.createElement('TD');
				meta.className = "QuickSearchResultMeta";

				var link = document.createElement('A');
				link.className = "QuickSearchResultName";
				link.title = unescape(result.title);
				link.href = result.url;
				link.innerHTML = unescape(result.title);
				meta.appendChild(link);

				var price = document.createElement('span');
				price.className = "Price";
				price.innerHTML = unescape(result.price);
				meta.appendChild(price);

				if(result.ratingimg)
				{
					var rating = document.createElement('IMG');
					rating.className = "RatingIMG";
					rating.src = unescape(result.ratingimg);
					meta.appendChild(rating);
				}

				tr.url = result.url;
				tr.index = i;
				tr.appendChild(meta);
				popup.appendChild(tr);

				tr.onmouseover = function() { QuickSearch.item_selected = true; QuickSearch.highlight_item(this.index, false); };
				tr.onmouseup = function() { window.location = this.url; };
				tr.onmouseout = function() { QuickSearch.item_selected = false; QuickSearch.unhighlight_item(this.index) };
			}

			// More results than we're showing?
			var all_results = results_xml.getElementsByTagName('results')[0].getAttribute('view_all');
			if(all_results)
			{
				var tr = document.createElement('TR');
				var td = document.createElement('TD');
				tr.className = "QuickSearchAllResults";
				tr.onmouseover = function() { QuickSearch.over_all = true; };
				tr.onmouseout = function() { QuickSearch.over_all = false; };
				td.colSpan = 2;
				td.innerHTML = all_results;
				tr.appendChild(td);
				popup.appendChild(tr);
			}

			var clone = popup.cloneNode(true);
			document.body.appendChild(clone);
			clone.style.top = "10px";
			clone.style.left = "10px";
			offset_height = clone.offsetHeight;
			offset_width = clone.offsetWidth;
			clone.parentNode.removeChild(clone);

			var offset_top = offset_left = 0;
			var element = document.getElementById('search_query');
			if(typeof(QuickSearchAlignment) != 'undefined' && QuickSearchAlignment == 'left') {
				offset_left = 0;
			}
			else {
				offset_left += element.offsetWidth - $('#SearchForm').width();
			}

			offset_top = -3;
			do
			{
				offset_top += element.offsetTop || 0;
				offset_left += element.offsetLeft || 0;
				element = element.offsetParent;
			} while(element);

			popup_container.style.position = "absolute";
			popup_container.style.left = offset_left + 1 + "px";
			popup_container.style.top = offset_top + document.getElementById('search_query').offsetHeight + "px";
			if(typeof(QuickSearchWidth) != 'undefined') {
				popup_container.style.width = QuickSearchWidth;
			}
			else {
				popup_container.style.width = document.getElementById('SearchForm').offsetWidth - 2 + "px";
			}
			if($('#QuickSearch'))
			{
				$('#QuickSearch').remove();
			}
			document.body.appendChild(popup_container);
			popup_container.style.display = '';
		}
		else
		{
			if(document.getElementById('QuickSearch'))
			{
				$('#QuickSearch').remove();
			}
		}
	},


	hide_popup: function()
	{
		$('#QuickSearch').remove();
		QuickSearch.selected = null;
	},

	highlight_item: function(index, keystroke)
	{
		element = $('#QuickSearchResult'+index);
		if(keystroke == true)
		{
			if(QuickSearch.selected) QuickSearch.selected.className = 'QuickSearchResult';
			QuickSearch.selected = document.getElementById('QuickSearchResult'+index);
		}
		element.addClass("QuickSearchHover");
	},

	unhighlight_item: function(index)
	{
		element = $('#QuickSearchResult'+index);
		element.removeClass('QuickSearchHover');
	}
};

$(document).ready(function()
{
	QuickSearch.init();
});
