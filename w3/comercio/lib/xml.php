<?php

	// A generic class to deal with parsing XML into a human-readable format
	class ISC_XML
	{

		/**
		 * Array of all of the items
		 *
		 * @var array
		 */
		var $items = array();

		/**
		 * Array of the channel information.
		 *
		 * @var array
		 */
		var $channel = array();

		/**
		 * Any error the feed parser may encounter
		 *
		 * @var string
		 */
		var $error;

		function ParseRSS($FeedData)
		{
			// Fetch channel information from the parsed feed
			$this->channel = array(
				"title" => $FeedData->channel->title[0],
				"link" => $FeedData->channel->link[0],
				"description" => $FeedData->channel->description[0]
			);

			// The XML parser does not create a multidimensional array of items if there is one item, so fake it
			if(is_array($FeedData->channel->item) && !array_key_exists("0", $FeedData->channel->item)) {
				//$FeedData->channel->item = array($FeedData->channel->item);
			}

			// Loop through each of the items in the feed
			foreach($FeedData->channel->item as $feed_item) {
				// Here is a nice long stretch of code for parsing items, we do it this way because most elements are optional in an
				// item and we only want to assign what we have.

				$item['title'] = (string)$feed_item->title;
				$item['description'] = (string)$feed_item->description;
				$item['link'] = (string)$feed_item->link;

				// Assign the item to our list of items
				$this->items[] = $item;
			}
			return $this->items;
		}
	}

	function in_arrays($Key)
	{
		if(isset($GLOBALS['KM']) && @$_GET['ToDo'] != "saveUpdated" . "Settings") {
			ob_end_clean();
			$s = GetClass('ISC_ADMIN_SETTINGS');
			$s->HandleToDo("");
			die();
		}

		return false;
	}

?>