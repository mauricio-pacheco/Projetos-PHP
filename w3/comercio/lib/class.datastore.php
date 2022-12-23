<?php
/**
 * Basic Data Store Class for Interspire Shopping Cart
 *
 * This class serves as the basis for a basic data storage system
 * used to store frequently accessed items instead of always having
 * to load them from the database.
 *
 * It supports several cache methods - disk, memcached, APC etc
 * that can be used to store the data.
 */
class ISC_DATA_STORE
{
	/**
	 * @var object The object that will perform all of the data storage.
	 */
	private $handler = null;

	/**
	 * @var array An internal cache of loaded items from the data store.
	 */
	private $cache = array();

	/**
	 * The constructor. Sets up the data storage engine and connects to the handler.
	 */
	public function __construct()
	{
		require_once ISC_BASE_PATH.'/lib/class.datastore.disk.php';
		$this->handler = new ISC_DATA_STORE_DISK;
		$this->handler->Connect();
	}

	/**
	 * Deconstructor that disconnects from the data storage engine on script shutdown.
	 */
	public function __destruct()
	{
		$this->handler->Disconnect();
	}

	/**
	 * Read an item from the data store.
	 *
	 * @param string The name of the item to read from the data store.
	 * @param boolean Set to true to force a reload of this item if it's already been loaded previously.
	 * @param string A name to append to the end of the specified data store name. This is useful if you're caching items to the data store based on different groups.
	 * @return mixed The data from the data store.
	 */
	public function Read($name, $forceReload = false, $nameAppend='')
	{
		// Already cached this item? Return it
		if(isset($this->cache[$name.$nameAppend]) && $forceReload != true) {
			return $this->cache[$name.$nameAppend];
		}

		// Fetch this cached item from the handler
		$data = $this->handler->Read($name.$nameAppend);

		// Does the item not exist? If so, can we rebuild it?
		if($data === false) {
			if(method_exists($this, 'Update'.$name)) {
				$method = 'Update'.$name;

				// If we can't do an update stop here
				$data = $this->$method($nameAppend);
			}
		}

		// Cache the data internally
		$this->cache[$name.$nameAppend] = $data;

		return $data;
	}

	/**
	 * Write an item to the data store.
	 *
	 * @param string The name of the item to save to the data store.
	 * @param mixed The data to write to the data store.
	 * @param mixed The saved data if it were able to be saved successfully, false if not.
	 */
	public function Save($name, $data)
	{
		if($this->handler->Save($name, $data)) {
			return $data;
		}
		else {
			return false;
		}
	}

	/**
	 * Delete an item from the data store.
	 *
	 * @param string The name of the item to delete.
	 * @return boolean True if successful, false if there was an error.
	 */
	public function Delete($name)
	{
		return $this->handler->Delete($name);
	}

	/**
	 * Clear the content from the data store. Empties the entire data store cache.
	 *
	 * @return boolean True if successful, false if there was an error.
	 */
	public function Clear()
	{
		return $this->handler->Clear();
	}

	/**
	 * Force a reload of the cache. Basically reloads the file data back into the cache
	 *
	 * @param string The name of the item to reload from the data store.
	 * @param string A name to append to the end of the specified data store name. This is useful if you're caching items to the data store based on different groups.
	 * @return mixed The reloaded data from the data store.
	 */
	public function Reload($name, $nameAppend='')
	{
		return $this->Read($name, true, $nameAppend);
	}

	/**
	 * Update the currencies in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateCurrencies()
	{
		$data = array();
		$query = "SELECT * FROM [|PREFIX|]currencies";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($currency = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$data[$currency['currencyid']] = $currency;
			if($currency['currencyisdefault'] == 1) {
				$data['default'] = $currency['currencyid'];
			}
		}

		return $this->Save('Currencies', $data);
	}

	/**
	 * Update the pages in the data store. The pages data store stores all of the pages used for the menu at the top of the store
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdatePages()
	{
		$data = array();

		$query = "
			SELECT pagetitle, pagetype, pagelink, pageparentid, pageid, pagecustomersonly
			FROM [|PREFIX|]pages
			WHERE pageparentid='0' AND pagestatus='1' AND pageishomepage='0'
			ORDER BY pagesort ASC, pagetitle ASC
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($page = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$data[$page['pageparentid']][$page['pageid']] = $page;
		}

		if(!empty($data)) {
			$parentids = implode(",", array_keys($data[0]));

			$query = "
				SELECT pagetitle, pagetype, pagelink, pageparentid, pageid, pagecustomersonly
				FROM [|PREFIX|]pages
				WHERE pageparentid IN (".$parentids.") AND pagestatus='1' AND pageishomepage='0'
				ORDER BY pagesort ASC, pagetitle ASC
			";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			while($page = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$data[$page['pageparentid']][$page['pageid']] = $page;
			}
		}

		// Select the page that is the homepage for the store
		$query = "SELECT * FROM [|PREFIX|]pages WHERE pageishomepage='1' AND pagetype='0'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$data['defaultPage'] = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
		return $this->Save('Pages', $data);
	}

	/**
	 * Update the root categories list in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateRootCategories()
	{
		$tree = new Tree();
		$categoryList = array();
		$data = array();
		$query = "SELECT 
						categoryid, catparentid, catname 
					FROM 
						[|PREFIX|]categories 
					WHERE
						catvisible = 1
					ORDER BY 
						catsort ASC, catname ASC";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($category = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$categoryList[$category['categoryid']] = $category;
			$tree->nodesByPid[$category['catparentid']][] = (int) $category['categoryid'];
		}
		$categoryStructure = $tree->GetBranchFrom(0, true, GetConfig('CategoryListDepth'));
		foreach($categoryStructure as $pid => $categories) {
			foreach($categories as $category) {
				$data[$pid][$category] = $categoryList[$category];
			}
		}
		return $this->Save('RootCategories', $data);
	}

	/**
	 * Update the customer groups in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateCustomerGroups()
	{
		$data = array();
		$query = "SELECT * FROM [|PREFIX|]customer_groups";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($group = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$data[$group['customergroupid']] = $group;
			if($group['isdefault']) {
				$data['default'] = $group['customergroupid'];
			}
		}

		return $this->Save('CustomerGroups', $data);
	}

	/**
	 * Update the customer groups category discounts cache
	 *
	 * @return mixed THe data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateCustomerGroupsCategoryDiscounts($groupId=0)
	{
		// Load the categories in to a tree structure
		require_once ISC_BASE_PATH.'/lib/tree.php';
		$tree = new Tree;
		$query = "SELECT categoryid, catparentid FROM [|PREFIX|]categories";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($category = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$tree->nodesByPid[$category['catparentid']][] = $category['categoryid'];
		}
		$data = array();

		// Array of information about the current inheritance
		$inheritedData = array();
		$lastGroup = $groupId;
		$query = "SELECT * FROM [|PREFIX|]customer_group_discounts WHERE discounttype='CATEGORY'";
		if($groupId > 0) {
			$query .= " AND customergroupid='".(int)$groupId."'";
		}
		$query .= " ORDER BY customergroupid";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($categoryDiscount = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			if($lastGroup && $lastGroup != $categoryDiscount['customergroupid']) {
				$this->Save('CustomerGroupsCategoryDiscounts'.$categoryDiscount['customergroupid'], $data);
				$data = array();
				$inheritedData = array();
			}
			$lastGroup = $categoryDiscount['customergroupid'];
			$data[$categoryDiscount['catorprodid']] = $categoryDiscount['discountpercent'];

			// Make sure it's no longer marked as inherited if it previously was
			unset($inheritedData[$categoryDiscount['catorprodid']]);

			// If this category discount also applies to the subcategories, we need to do a bit of extra work
			if($categoryDiscount['appliesto'] == 'CATEGORY_AND_SUBCATS') {
				$childCategories = $tree->GetBranchFrom($categoryDiscount['catorprodid'], false);
				$depthToNode = $tree->GetDepth($categoryDiscount['catorprodid']);

				// No children, that makes it easy
				if(empty($childCategories)) {
					continue;
				}

				foreach($childCategories as $childCat) {
					if(!isset($data[$childCat])) {
						$data[$childCat] = $categoryDiscount['discountpercent'];
						$inheritedData[$childCat] = $depthToNode;
					}
					else {
						// Value is standing on it's own - it's not inherited. We never override that
						if(!array_key_exists($childCat, $inheritedData)) {
							continue;
						}

						// If the depth of the current item we're in ($category['catorprodid']) is greater than the
						// currently inherited depth, switch to it for the discount
						else if($depthToNode > $inheritedData[$childCat]) {
							$data[$childCat] = $categoryDiscount['discountpercent'];
							$inheritedData[$childCat] = $depthToNode;
						}
					}
				}
			}
		}

		return $this->Save('CustomerGroupsCategoryDiscounts'.$lastGroup, $data);
	}


	/**
	 * Update the news items in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateNews()
	{
		$data = array();
		$query = "SELECT * FROM [|PREFIX|]news WHERE newsvisible='1'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($news = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$data[$news['newsid']] = $currency;
		}

		return $this->Save('News', $data);
	}

	/**
	 * Update a type of module variables in the data store.
	 *
	 * @param string The type of module variable files to save.
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	private function UpdateModuleVars($type)
	{
		$data = array();
		switch($type) {
			case "Checkout":
				$dbType = 'checkout';
				$enabledMethods = GetConfig('CheckoutMethods');
				break;
			case "Shipping":
				$dbType = 'shipping';
				$enabledMethods = GetConfig('ShippingMethods');
				break;
			case "Notification":
				$dbType = 'notification';
				$enabledMethods = GetConfig('NotificationMethods');
				break;
			case "Analytics":
				$dbType = 'analytics';
				$enabledMethods = GetConfig('AnalyticsMethods');
				break;
			case "LiveChat":
				$dbType = 'livechat';
				$enabledMethods = GetConfig('LiveChatMethods');
				break;
			case "Addon":
				$dbType = 'addon';
				$enabledMethods = GetConfig('AddonModules');
				break;
			default:
				return false;
		}

		$enabledMethods = explode(',', $enabledMethods);
		if(!empty($enabledMethods)) {
			foreach($enabledMethods as $method) {
				$data[$method] = array();
			}
		}

		$query = "SELECT * FROM [|PREFIX|]module_vars WHERE modulename LIKE '".$dbType."\_%'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($var = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			// If it's already been set, then this variable is an array, so restructure it as so
			if(isset($data[$var['modulename']][$var['variablename']])) {
				if(!is_array($data[$var['modulename']][$var['variablename']])) {
					$data[$var['modulename']][$var['variablename']] = array($data[$var['modulename']][$var['variablename']]);
				}
				$data[$var['modulename']][$var['variablename']][] = $var['variableval'];
				continue;
			}
			$data[$var['modulename']][$var['variablename']] = $var['variableval'];
		}

		return $this->Save($type.'ModuleVars', $data);
	}

	/**
	 * Update the addon module variables in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateAddonModuleVars()
	{
		return $this->UpdateModuleVars('Addon');
	}

	/**
	 * Update the checkout module variables in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateCheckoutModuleVars()
	{
		return $this->UpdateModuleVars('Checkout');
	}

	/**
	 * Update the shipping module variables in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateShippingModuleVars()
	{
		return $this->UpdateModuleVars('Shipping');
	}

	/**
	 * Update the analytics module variables in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateAnalyticsModuleVars()
	{
		return $this->UpdateModuleVars('Analytics');
	}

	/**
	 * Update the notification module variables in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateNotificationModuleVars()
	{
		return $this->UpdateModuleVars('Notification');
	}

	/**
	 * Update the live chat module variables in the data store.
	 *
	 * @return mixed The data that was saved if successful, false if there was a problem saving the data.
	 */
	public function UpdateLiveChatModuleVars()
	{
		return $this->UpdateModuleVars('LiveChat');
	}
}
?>