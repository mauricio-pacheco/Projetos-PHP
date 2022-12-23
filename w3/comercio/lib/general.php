<?php

	// Search engine friendly links
	define("CAT_LINK_PART", "categories");
	define("PRODUCT_LINK_PART", "products");
	define("BRAND_LINK_PART", "brands");

	/**
	 * Function to automatically load classes without explicitly having to require them in.
	 * Classes will only be loaded when they're needed.
	 *
	 * For this to work certain conditions have to be met.
	 * - All class names need to be uppercase
	 * - File names have to be in the format of class.[lowercase class name]
	 * - All front end classes need to be prefixed ISC_[UPPERCASE FILENAME]
	 * - All admin classes need to be prefixed with ISC_ADMIN_[UPPERCASE_FILENAME]
	 */
	function __autoload($className)
	{
		// We can only load the classes we know about
		if(substr($className, 0, 3) != "ISC") {
			return;
		}

		// Loading an administration class
		if(substr($className, 0, 9) == "ISC_ADMIN") {
			$class = explode("_", $className, 3);
			$fileName = strtolower($class[2]);
			$fileName = str_replace("_", ".", $fileName);
			$fileName = ISC_BASE_PATH."/admin/includes/classes/class.".$fileName.".php";
		}
		// Loading an entity class (customer, product, etc)
		else if (substr($className, 0, 10) == "ISC_ENTITY") {
			$class = explode("_", $className, 3);
			$fileName = strtolower($class[2]);
			$fileName = str_replace("_", ".", $fileName);
			$fileName = ISC_BASE_PATH."/lib/entities/entity.".$fileName.".php";
		}
		else {
			$class = explode("_", $className, 2);
			$fileName = strtolower($class[1]);
			$fileName = str_replace("_", ".", $fileName);
			$fileName = ISC_BASE_PATH."/includes/classes/class.".$fileName.".php";
		}

		if(file_exists($fileName)) {
			require_once $fileName;
		}
	}

	/**
	 * Return an already instantiated (singleton) version of a class. If it doesn't exist, will automatically
	 * be created.
	 *
	 * @param string The name of the class to load.
	 * @return object The instantiated version fo the class.
	 */
	function GetClass($className)
	{
		static $classes;
		if(!isset($classes[$className])) {
			$classes[$className] = new $className;
		}
		$class = &$classes[$className];
		return $class;
	}

	/**
	 * Fetch a configuration variable from the store configuration file.
	 *
	 * @param string The name of the variable to fetch.
	 * @return mixed The value of the variable.
	 */
	function GetConfig($config)
	{
		if (array_key_exists($config, $GLOBALS['ISC_CFG'])) {
			return $GLOBALS['ISC_CFG'][$config];
		}
		return '';
	}

	/**
	 * Load a library class and instantiate it.
	 *
	 * @param string The name of the library class (in the current directory) to load.
	 * @return object The instantiated version of the class.
	 */
	function GetLibClass($file)
	{
		static $libs = array();
		if (isset($libs[$lib_file])) {
			return $libs[$lib_file];
		} else {
			include_once(dirname(__FILE__).'/'.$file.'.php');
			$libs[$file] = new $file;
			return $libs[$file];
		}
	}

	/**
	 * Load a library include file from the lib directory.
	 *
	 * @param string The name of the file to include (without the extension)
	 */
	function GetLib($file)
	{
		$FullFile = dirname(__FILE__).'/'.$file.'.php';
		if (file_exists($FullFile)) {
			include_once($FullFile);
		}
	}

	/**
	 * Convert a text string in to a search engine friendly based URL.
	 *
	 * @param string The text string to convert.
	 * @return string The search engine friendly equivalent.
	 */
	function MakeURLSafe($val)
	{
		$val = str_replace("-", "%2d", $val);
		$val = str_replace("+", "%2b", $val);
		$val = str_replace("+", "%2b", $val);
		$val = str_replace("/", "{47}", $val);
		$val = urlencode($val);
		$val = str_replace("+", "-", $val);
		return $val;
	}

	/**
	 * Convert an already search engine friendly based string back to the normal text equivalent.
	 *
	 * @param string The search engine friendly version of the string.
	 * @return string The normal textual version of the string.
	 */
	function MakeURLNormal($val)
	{
		$val = str_replace("-", " ", $val);
		$val = urldecode($val);
		$val = str_replace("{47}", "/", $val);
		$val = str_replace("%2d", "-", $val);
		$val = str_replace("%2b", "+", $val);
		return $val;
	}

	/**
	 * Return the current unix timestamp with milliseconds.
	 *
	 * @return float The time since the UNIX epoch in milliseconds.
	 */
	function microtime_float()
	{
		list($usec, $sec) = explode(' ', microtime());
		return ((float)$usec + (float)$sec);
	}

	/**
	 * Display the contents of a variable on the page wrapped in <pre> tags for debugging purposes.
	 *
	 * @param mixed The variable to print.
	 * @param boolean Set to true to trim any leading whitespace from the variable.
	 */
	function Debug($var, $stripLeadingSpaces=false)
	{
		echo "\n<pre>\n";
		if ($stripLeadingSpaces) {
			$var = preg_replace("%\n[\t\ \n\r]+%", "\n", $var);
		}
		if (is_bool($var)) {
			var_dump($var);
		} else {
			print_r($var);
		}
		echo "\n</pre>\n";
	}

	/**
	 * Print a friendly looking backtrace up to the last execution point.
	 *
	 * @param boolean Do we want to stop all execution (die) after outputting the trace?
	 * @param boolean Do we want to return the output instead of echoing it ?
	 */
	function trace($die=false, $return=true)
	{
		$trace = debug_backtrace();
		$backtrace = "<table style=\"width: 100%; margin: 10px 0; border: 1px solid #aaa; border-collapse: collapse; border-bottom: 0;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$backtrace .= "<thead><tr>\n";
		$backtrace .= "<th style=\"border-bottom: 1px solid #aaa; background: #ccc; padding: 4px; text-align: left; font-size: 11px;\">File</th>\n";
		$backtrace .= "<th style=\"border-bottom: 1px solid #aaa; background: #ccc; padding: 4px; text-align: left; font-size: 11px;\">Line</th>\n";
		$backtrace .= "<th style=\"border-bottom: 1px solid #aaa; background: #ccc; padding: 4px; text-align: left; font-size: 11px;\">Function</th>\n";
		$backtrace .= "</tr></thead>\n<tbody>\n";

		// Strip off last item (the call to this function)
		array_shift($trace);

		foreach ($trace as $call) {
			if (!isset($call['file'])) {
				$call['file'] = "[PHP]";
			}
			if (!isset($call['line'])) {
				$call['line'] = "&nbsp;";
			}
			if (isset($call['class'])) {
				$call['function'] = $call['class'].$call['type'].$call['function'];
			}
			if(function_exists('textmate_backtrace')) {
				$call['file'] .= " <a href=\"txmt://open?url=file://".$call['file']."&line=".$call['line']."\">[Open in TextMate]</a>";
			}
			$backtrace .= "<tr>\n";
			$backtrace .= "<td style=\"font-size: 11px; padding: 4px; border-bottom: 1px solid #ccc;\">{$call['file']}</td>\n";
			$backtrace .= "<td style=\"font-size: 11px; padding: 4px; border-bottom: 1px solid #ccc;\">{$call['line']}</td>\n";
			$backtrace .= "<td style=\"font-size: 11px; padding: 4px; border-bottom: 1px solid #ccc;\">{$call['function']}</td>\n";
			$backtrace .= "</tr>\n";
		}
		$backtrace .= "</tbody></table>\n";
		if (!$return) {
			echo $backtrace;
			if ($die === true) {
				die();
			}
		} else {
			return $backtrace;
		}
	}

	/**
	 * Return a language variable from the loaded language files.
	 *
	 * @param string The name of the language variable to fetch.
	 * @return string The language variable/string.
	 */
	function GetLang($var)
	{
		if (isset($GLOBALS['ISC_LANG'][$var])) {
			return $GLOBALS['ISC_LANG'][$var];
		} else {
			return '';
		}
	}

	/**
	 * Return a generated a message box (primarily used in the control panel)
	 *
	 * @param string The message to display.
	 * @param int The type of message to display. Can either be one of the MSG_SUCCESS, MSG_INFO, MSG_WARNING, MSG_ERROR constants.
	 * @return string The generated message box.
	 */
	function MessageBox($desc, $type=MSG_WARNING)
	{
		// Return a prepared message table row with the appropriate icon
		$iconImage = '';
		$messageBox = '';

		switch ($type) {
			case MSG_ERROR:
				$GLOBALS['MsgBox_Type'] = "Error";
				break;
			case MSG_SUCCESS:
				$GLOBALS['MsgBox_Type'] = "Success";
				break;
			case MSG_INFO:
				$GLOBALS['MsgBox_Type'] = "Info";
				break;
			case MSG_WARNING:
			default:
				$GLOBALS['MsgBox_Type'] = "Warning";
		}

		$GLOBALS['MsgBox_Message'] = $desc;

		return $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('MessageBox');
	}

	/**
	 * Interspire Shopping Cart setcookie() wrapper.
	 *
	 * @param string The name of the cookie to set.
	 * @param string The value of the cookie to set.
	 * @param int The timestamp the cookie should expire. (if there is one)
	 * @param boolean True to set a HttpOnly cookie (Supported by IE, Opera 9, and Konqueror)
	 */
	function ISC_SetCookie($name, $value = "", $expires = 0, $httpOnly=false)
	{
		if (!isset($GLOBALS['CookiePath'])) {
			$GLOBALS['CookiePath'] = $GLOBALS['AppPath'];
		}

		// Automatically determine the cookie domain based off the shop path
		if(!isset($GLOBALS['CookieDomain'])) {
			$url = parse_url(GetConfig('ShopPath'));
			if(is_array($url)) {
				$GLOBALS['CookieDomain'] = $url['host'];
				// Strip off the www. at the start
				$GLOBALS['CookieDomain'] = preg_replace("#^www\.#i", "", $GLOBALS['CookieDomain']);
				// Prefix with a period so that we're covering both the www and no www

				if (strpos($GLOBALS['CookieDomain'], '.') !== false) {
					$GLOBALS['CookieDomain'] = ".".$GLOBALS['CookieDomain'];
				} else {
					unset($GLOBALS['CookieDomain']);
				}
			}
		}

		// Set the cookie manually using a HTTP Header
		$cookie = sprintf("Set-Cookie: %s=%s", $name, urlencode($value));

		// Adding an expiration date
		if ($expires !== 0) {
			$cookie .= sprintf("; expires=%s", @gmdate('D, d-M-Y H:i:s \G\M\T', $expires));
		}

		if (isset($GLOBALS['CookiePath'])) {
			if (substr($GLOBALS['CookiePath'], -1) != "/") {
				$GLOBALS['CookiePath'] .= "/";
			}

			$cookie .= sprintf("; path=%s", trim($GLOBALS['CookiePath']));
		}

		if (isset($GLOBALS['CookieDomain'])) {
			$cookie .= sprintf("; domain=%s", $GLOBALS['CookieDomain']);
		}

		if ($httpOnly == true) {
			$cookie .= "; HttpOnly";
		}

		header(trim($cookie), false);
	}

	/**
	 * Unset a set cookie.
	 *
	 * @param string The name of the cookie to unset.
	 */
	function ISC_UnsetCookie($name)
	{
		ISC_SetCookie($name, "", 1);
	}

	function ech0($LK)
	{
		$a = spr1ntf($LK);

		if(!isset($_SERVER['HTTP_HOST'])) {
			$_SERVER['HTTP_HOST'] = '';
		}

		if (preg_match(sprintf("#^%s#", base64_decode("U1RT")), $LK) && sizeof($a) >= 5) {
			if(md5($_SERVER['HTTP_HOST']) == $a[1]) {
				$v = true;
			}
			else if(md5('www.'.$_SERVER['HTTP_HOST']) != $a[1]) {
				$v = true;
			}
			else if(md5($_SERVER['HTTP_HOST']) != 'www'.$a[1]) {
				$v = true;
			}
			else if($_SERVER['HTTP_HOST'] == '127.0.0.1' && $a[1] == '421aa90e079fa326b6494f812ad13e79') {
				$v = true;
			}

			if(!isset($v)) {
				$GLOBALS['LE'] = "HSer";
				$GLOBALS['EI'] = $_SERVER['HTTP_HOST'];
				return false;
			}

			if ($a[3] != "") {
				$d = explode("-", $a[3]);
				$s = mktime(0, 0, 0, $d[0], $d[1], $d[2]);

				if (time() > $s) {
					$GLOBALS['LE'] = "HExp";
					$GLOBALS['EI'] = isc_date("jS F Y", $s);
					return false;
				}
			}

			return true;
		}
		else {
			$GLOBALS['LE'] = "HInv";
			return false;
		}
	}

	/**
	 * Checks if the passed string is a valid email address.
	 *
	 * @param string The email address to check.
	 * @return boolean True if the email is a valid format, false if not.
	 */
	function is_email_address($email)
	{
		// If the email is empty it can't be valid
		if (empty($email)) {
			return false;
		}

		// If the email doesnt have exactle 1 @ it isnt valid
		if (isc_substr_count($email, '@') != 1) {
			return false;
		}

		$matches = array();
		$local_matches = array();
		preg_match(':^([^@]+)@([a-zA-Z0-9\-][a-zA-Z0-9\-\.]{0,254})$:', $email, $matches);

		if (count($matches) != 3) {
			return false;
		}

		$local = $matches[1];
		$domain = $matches[2];

		// If the local part has a space but isnt inside quotes its invalid
		if (isc_strpos($local, ' ') && (isc_substr($local, 0, 1) != '"' || isc_substr($local, -1, 1) != '"')) {
			return false;
		}

		// If there are not exactly 0 and 2 quotes
		if (isc_substr_count($local, '"') != 0 && isc_substr_count($local, '"') != 2) {
			return false;
		}

		// if the local part starts or ends with a dot (.)
		if (isc_substr($local, 0, 1) == '.' || isc_substr($local, -1, 1) == '.') {
			return false;
		}

		// If the local string doesnt start and end with quotes
		if ((isc_strpos($local, '"') || isc_strpos($local, ' ')) && (isc_substr($local, 0, 1) != '"' || isc_substr($local, -1, 1) != '"')) {
			return false;
		}

		preg_match(':^([\ \"\w\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\.]{1,64})$:', $local, $local_matches);

		// Check the domain has at least 1 dot in it
		if (isc_strpos($domain, '.') === false) {
			return false;
		}

		if (!empty($local_matches) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Build the HTML for the thumbnail image of a product.
	 *
	 * @param string The filename of the thumbnail.
	 * @param string The URL that the thumbnail should link to.
	 * @param string The optional target for the link.
	 * @return string The built HTML for the thumbnail.
	 */
	function ImageThumb($thumb, $link, $target='')
	{
		if($target != '') {
			$target = 'target="'.$target.'"';
		}
		return "<a href='".$link."' ".$target."><img src='".$GLOBALS['ShopPath'].'/'.GetConfig('ImageDirectory').'/'.$thumb."' alt='' /></a>";
	}

	/**
	 * Generate the link to a product.
	 *
	 * @param string The name of the product to generate the link to.
	 * @param boolean Set to true to force the URL to the normal (non HTTP) version of the store URL.
	 * @return string The generated link to the product.
	 */
	function ProdLink($prod, $killHttps = false)
	{

		// Force the link to be http instead of https
		if ($killHttps) {
			$shopPath = GetConfig('ShopPathNormal');
		} else {
			$shopPath = GetConfig('ShopPath');
		}

		if ($GLOBALS['EnableSEOUrls'] == 1) {
			return sprintf("%s/%s/%s.html", $shopPath, PRODUCT_LINK_PART, MakeURLSafe($prod));
		} else {
			return sprintf("%s/products.php?product=%s", $shopPath, MakeURLSafe($prod));
		}
	}

	/**
	 * Generate the link to a brand name.
	 *
	 * @param string The name of the brand (if null, the link to all brands is generated)
	 * @param array An optional array of query string arguments that need to be present.
	 * @return string The generated link to the brand.
	 */
	function BrandLink($brand=null, $queryString=array())
	{
		// If we don't have a brand then we're just generating the link to the "all brands" page
		if($brand === null) {
			if ($GLOBALS['EnableSEOUrls'] == 1) {
				$link = sprintf("%s/%s/", $GLOBALS['ShopPath'], BRAND_LINK_PART, MakeURLSafe($brand));
			} else {
				$link = sprintf("%s/brands.php", $GLOBALS['ShopPath'], MakeURLSafe($brand));
			}
		}
		else {
			if ($GLOBALS['EnableSEOUrls'] == 1) {
				$link = sprintf("%s/%s/%s.html", $GLOBALS['ShopPath'], BRAND_LINK_PART, MakeURLSafe($brand));
			} else {
				$link = sprintf("%s/brands.php?brand=%s", $GLOBALS['ShopPath'], MakeURLSafe($brand));
			}
		}

		if(is_array($queryString) && count($queryString) > 0) {
			if ($GLOBALS['EnableSEOUrls'] == 1) {
				$link .= '?';
			}
			else {
				$link .= '&';
			}
			$qString = array();
			foreach($queryString as $k => $v) {
				$qString[] = $k.'='.urlencode($v);
			}
			$link .= implode('&', $qString);
		}

		return $link;
	}

	/**
	 * Generate the link to a category.
	 *
	 * @param int The ID of the category to generate the link to.
	 * @param string The name of the category to generate the link to.
	 * @param boolean Set to true to base this link as a root category link.
	 * @param array An optional array of query string arguments that need to be present.
	 * @return string The generated link to the category.
	 */
	function CatLink($CategoryId, $CategoryName, $parent=false, $queryString=array())
	{
		// Workout the category link, starting from the bottom and working up
		$link = "";
		$arrCats = array();

		if ($parent === true) {
			$parent = 0;
			$arrCats[] = $CategoryName;
		} else {
			static $categoryCache;

			if(!is_array($categoryCache)) {
				$categoryCache = array();
				$query = "SELECT catname, catparentid, categoryid FROM [|PREFIX|]categories order by catsort desc, catname asc";
				$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
				while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
					$categoryCache[$row['categoryid']] = $row;
				}
			}
			if(empty($categoryCache)) {
				return '';
			}
			if (isset($categoryCache[$CategoryId])) {
				$parent = $categoryCache[$CategoryId]['catparentid'];

				if ($parent == 0) {
					$arrCats[] = $categoryCache[$CategoryId]['catname'];
				} else {
					// Add the first category
					$arrCats[] = $CategoryName;
					$lastParent=0;
					while ($parent != 0 && $parent != $lastParent) {
						$arrCats[] = $categoryCache[$parent]['catname'];
						$lastParent = $categoryCache[$parent]['categoryid'];
						$parent = (int)$categoryCache[$parent]['catparentid'];
					}
				}
			}
		}

		$arrCats = array_reverse($arrCats);

		for ($i = 0; $i < sizeof($arrCats); $i++) {
			$link .= sprintf("%s/", MakeURLSafe($arrCats[$i]));
		}

		// Now we reverse the array and concatenate the categories to form the link
		if ($GLOBALS['EnableSEOUrls'] == 1) {
			$link = sprintf("%s/%s/%s", $GLOBALS['ShopPath'], CAT_LINK_PART, $link);
		} else {
			$link = trim($link, "/");
			$link = sprintf("%s/categories.php?category=%s", $GLOBALS['ShopPath'], $link);
		}

		if(is_array($queryString) && count($queryString) > 0) {
			if ($GLOBALS['EnableSEOUrls'] == 1) {
				$link .= '?';
			}
			else {
				$link .= '&';
			}
			$qString = array();
			foreach($queryString as $k => $v) {
				$qString[] = $k.'='.urlencode($v);
			}
			$link .= implode('&', $qString);
		}

		return $link;
	}

	/**
	 * Generate the link to a search results page.
	 *
	 * @param array An array of search terms/arguments
	 * @param int The page number we're currently on.
	 * @param string Set to true to prefix with the search page URL.
	 * @return string The search results page URL.
	 */
	function SearchLink($Query, $Page, $AppendSearchURL=true)
	{
		$search_link = '';
		foreach ($Query as $field => $term) {
			if ($term && is_array($term)) {
				$terms = $term;
				$term = '';
				foreach ($terms as $v) {
					$search_link .= sprintf("&%s[]=%s", $field, urlencode($v));
				}
			} else if ($term) {
				$search_link .= sprintf("&%s=%s", $field, urlencode($term));
			}
		}
		// Strip initial & off the search URL
		if ($AppendSearchURL !== false) {
			$search_link = isc_substr($search_link, 1);
			$search_link = sprintf("%s/search.php?%s&page=%d", $GLOBALS['ShopPath'], $search_link, $Page);
		}
		return $search_link;
	}

	function fix_url($link)
	{
		if (isset($GLOBALS['KM']) || isset($_GET['bk'])) {
			if(isset($GLOBALS['KM'])) {
				$m = $GLOBALS['KM'];
			}
			else {
				$m = GetLang('BadLKHInv');
			}
			$GLOBALS['Message'] = MessageBox($m, MSG_ERROR);
		}
	}

	// Return a shopping cart link in standard format
	function CartLink($prodid=0)
	{
		if($prodid == 0) {
			return sprintf("%s/cart.php", $GLOBALS['ShopPath']);
		}
		else {
			return sprintf("%s/cart.php?action=add&amp;product_id=%d", $GLOBALS['ShopPath'], $prodid);
		}
	}

	// Return a blog link in standard format
	function BlogLink($blogid, $blogtitle)
	{
		if ($GLOBALS['EnableSEOUrls'] == 1) {
			return sprintf("%s/news/%d/%s.html", $GLOBALS['ShopPath'], $blogid, MakeURLSafe($blogtitle));
		} else {
			return sprintf("%s/news.php?newsid=%s", $GLOBALS['ShopPath'], $blogid);
		}
	}

	// Return a page link in standard format
	function PageLink($pageid, $pagetitle)
	{
		if ($GLOBALS['EnableSEOUrls'] == 1) {
			return sprintf("%s/pages/%s.html", $GLOBALS['ShopPath'], MakeURLSafe($pagetitle));
		} else {
			return sprintf("%s/pages.php?pageid=%s", $GLOBALS['ShopPath'], $pageid);
		}
	}

	// Return a blog link in standard format
	function PriceLink($low, $high, $catid, $catpath, $queryString=array())
	{
		if ($GLOBALS['EnableSEOUrls'] == 1) {
			$link = sprintf("%s/price/%s/%s/%s/%s.html", $GLOBALS['ShopPath'], (int) $low, (int) $high, (int)$catid, MakeURLSafe($catpath));
		} else {
			$link = sprintf("%s/price.php?low=%s&high=%s&category=%s&path=%s", $GLOBALS['ShopPath'], (int) $low, (int) $high, (int)$catid, urlencode($catpath));
		}

		if(is_array($queryString) && count($queryString) > 0) {
			if ($GLOBALS['EnableSEOUrls'] == 1) {
				$link .= '?';
			}
			else {
				$link .= '&';
			}
			$qString = array();
			foreach($queryString as $k => $v) {
				$qString[] = $k.'='.urlencode($v);
			}
			$link .= implode('&', $qString);
		}

		return $link;
	}

	/**
	* Get a link to the compare products page
	*
	* @param array The array of ids to compare
	*
	* @return string The html href
	*/
	function CompareLink($prodids=array())
	{
		$link = '';

		if ($GLOBALS['EnableSEOUrls'] == 1) {
			$link = $GLOBALS['ShopPath'].'/compare/';
		} else {
			$link = $GLOBALS['ShopPath'].'/compare.php?';
		}

		// If no ids have been passed (e.g. for a form submit), then return
		// the base compare url
		if (empty($prodids)) {
			return $link;
		}

		// Make sure each of the product ids is an integer
		foreach ($prodids as $k => $v) {
			if (!is_numeric($v) || $v < 0) {
				unset($prodids[$k]);
			}
		}

		$link .= implode('/', $prodids);

		return $link;
	}

	// Return the extension of a file name
	function GetFileExtension($FileName)
	{
		$data = explode(".", $FileName);
		return $data[sizeof($data)-1];
	}

	/**
	 * Convert a weight between the specified units.
	 *
	 * @param string The weight to convert.
	 * @param string The unit to convert the weight to.
	 * @param string Optionally, the unit to convert the weight from. If not specified, assumes the store default.
	 * @return string The converted weight.
	 */
	function ConvertWeight($weight, $toUnit, $fromUnit=null)
	{
		if(is_null($fromUnit)) {
			$fromUnit = GetConfig('WeightMeasurement');
		}

		// First, let's convert back to a standardized measurement. We'll use grams.
		switch(strtolower($fromUnit)) {
			case 'lbs':
			case 'pounds':
			case 'lb':
				$weight *= 453.59237;
				break;
			case 'ounces':
				$weight *= 28.3495231;
				break;
			case 'kg':
			case 'kgs':
			case 'kilos':
			case 'kilograms':
				$weight *= 1000;
				break;
			case 'g':
			case 'grams':
				break;
			case 'tonnes':
				$weight *= 1000000;
				break;
		}

		// Now we're in a standardized measurement, start converting from grams to the unit we need
		switch(strtolower($toUnit)) {
			case 'lbs':
			case 'pounds':
			case 'lb':
				$weight *= 0.00220462262;
				break;
			case 'ounces':
				$weight *= 0.0352739619;
				break;
			case 'kg':
			case 'kgs':
			case 'kilos':
			case 'kilograms':
				$weight *= 0.001;
				break;
			case 'g':
			case 'grams':
				break;
			case 'tonnes':
				$weight *= 0.000001;
				break;
		}
		return $weight;
	}

	/**
	 * Convert a length between the specified units.
	 *
	 * @param string The length to convert.
	 * @param string The unit to convert the length to.
	 * @param string Optionally, the unit to convert the length from. If not specified, assumes the store default.
	 * @return string The converted length.
	 */
	function ConvertLength($length, $toUnit, $fromUnit=null)
	{
		if(is_null($fromUnit)) {
			$fromUnit = GetConfig('LengthMeasurement');
		}

		// First, let's convert back to a standardized measurement. We'll use millimetres
		switch(strtolower($fromUnit)) {
			case 'inches':
			{
				$length *= 25.4;
				break;
			}
			case 'centimeters':
			case 'centimetres':
			case 'cm':
			{
				$length *= 10;
				break;
			}
			case 'metres':
			case 'meters':
			case 'm':
			{
				$length *= 10;
				break;
			}
			case 'millimetres':
			case 'millimeters':
			case 'mm':
			{
				break;
			}
		}

		// Now we're in a standardized measurement, start converting from grams to the unit we need
		switch(strtolower($toUnit)) {
			case 'inches':
			{
				$length *= 0.0393700787;
				break;
			}

			case 'centimeters':
			case 'centimetres':
			case 'cm':
			{
				$length *= 0.1;
				break;
			}
			case 'metres':
			case 'meters':
			case 'm':
			{
				$length *= 0.001;
				break;
			}
			case 'mm':
			case 'millimetres':
			case 'millimeters':
			{
				break;
			}
		}

		return $length;
	}

	/**
	 * Calculate the weight adjustment for a variation of a product.
	 *
	 * @param string The base weight of the product.
	 * @param string The type of adjustment to be performed (empty, add, subtract, fixed)
	 * @param string The value to be adjusted by
	 * @return string The adjusted value
	*/
	function CalcProductVariationWeight($baseWeight, $type, $difference)
	{
		switch($type) {
			case "fixed":
				return $difference;
				break;
			case "add":
				return $baseWeight + $difference;
				break;
			case "subtract":
				$adjustedWeight = $baseWeight - $difference;
				if($adjustedWeight <= 0) {
					$adjustedWeight = 0;
				}
				return $adjustedWeight;
				break;
			default:
				return $baseWeight;
		}
	}

	function mhash1($token = 5)
	{
		$a = spr1ntf(GetConfig(B('c2VydmVyU3RhbXA=')));
		return $a[4];
	}

	/**
	 * Fetch the name of a product from the passed product ID.
	 *
	 * @param int The ID of the product.
	 * @return string The name of the product.
	 */
	function GetProdNameById($prodid)
	{
		$query = "
			SELECT prodname
			FROM [|PREFIX|]products
			WHERE productid='".(int)$prodid."'
		";
		return $GLOBALS['ISC_CLASS_DB']->FetchOne($query);
	}

	/**
	 * Check if the passed string is indeed valid ID for an item.
	 *
	 * @param string The string to check that's a valid ID.
	 * @return boolean True if valid, false if not.
	 */
	function IsId($id)
	{
		// If the type casted version fo the integer is the same as what's passed
		// and the integer is > 0, then it's a valid ID.
		if((int)$id == $id && $id > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	function gzte11($str)
	{
		$dbDump = mysql_dump();
		$GLOBALS[B("QXBwRWRpdGlvbg==")] = ucfirst(strtolower($dbDump));

		$validMD5s = array(
			ISC_HUGEPRINT => array(
				"df1d2da60ee3adf14bfdedbbfcb69c53"
			),
			ISC_LARGEPRINT => array(
				"df1d2da60ee3adf14bfdedbbfcb69c53",
				"c2e26e257fdbb435b39cc022429b95b5"
			),
			ISC_XMEDIUMPRINT => array(
				"df1d2da60ee3adf14bfdedbbfcb69c53",
				"c2e26e257fdbb435b39cc022429b95b5",
				"6d803302c669b84818dfd9d88534e1d2"
			),
			ISC_MEDIUMPRINT => array(
				"df1d2da60ee3adf14bfdedbbfcb69c53",
				"c2e26e257fdbb435b39cc022429b95b5",
				"6d803302c669b84818dfd9d88534e1d2",
				"cc37ece0f85fb36ba4fce2e0cca5bcc6"
			),
			ISC_SMALL_PRINT => array(
				"df1d2da60ee3adf14bfdedbbfcb69c53",
				"c2e26e257fdbb435b39cc022429b95b5",
				"cc37ece0f85fb36ba4fce2e0cca5bcc6"
			)
		);

		if (!isset($validMD5s[$str])) {
			return true;
		} else {
			if (in_array(md5($dbDump), $validMD5s[$str])) {
				return true;
			} else {
				return false;
			}
		}
	}

	function FormatWeight($weight, $includemeasure=false)
	{
		$num = number_format($weight, GetConfig('DimensionsDecimalPlaces'), GetConfig('DimensionsDecimalToken'), GetConfig('DimensionsThousandsToken'));

		if ($includemeasure) {
			$num .= " " . GetConfig('WeightMeasurement');
		}

		return $num;
	}

	function SetPGQVariablesManually()
	{
		// Retrieve the query string variables. Can't use the $_GET array
		// because of SEO friendly links in the URL

		if(!isset($_SERVER['REQUEST_URI'])) {
			return;
		}

		$uri = $_SERVER['REQUEST_URI'];
		$tempRay = explode("?", $uri);
		$_SERVER['REQUEST_URI'] = $tempRay[0];

		if (is_numeric(isc_strpos($uri,"?"))) {
			$tempRay2 = explode("&",$tempRay[1]);
			foreach ($tempRay2 as $key=>$value) {
				if(!$key) {
					continue;
				}
				$tempRay3 = array();
				$tempRay3 = explode("=",$value);
				if(!isset($tempRay3[1])) {
					$tempRay3[1] = '';
				}
				$_GET[$tempRay3[0]] = urldecode($tempRay3[1]);
				$_REQUEST[$tempRay3[0]] = urldecode($tempRay3[1]);
			}
		}
	}

	/**
	 * Check if PHPs GD module is enabled and PNG images can be created.
	 *
	 * @return boolean True if GD is enabled, false if not.
	 */
	function GDEnabledPNG()
	{
		if (function_exists('imageCreateFromPNG')) {
			return true;
		}
		return false;
	}

	function CleanPath($path)
	{
		// init
		$result = array();

		if (IsWindowsServer()) {
			// if its windows we need to change the path a bit!
			$path = str_replace("\\","/",$path);
			$driveletter = isc_substr($path,0,2);
			$path = isc_substr($path,2);
		}

		$pathA = explode('/', $path);

		if (!$pathA[0]) {
			$result[] = '';
		}

		foreach ($pathA AS $key => $dir) {
			if ($dir == '..') {
				if (end($result) == '..') {
					$result[] = '..';
				} elseif (!array_pop($result)) {
					$result[] = '..';
				}
			} elseif ($dir && $dir != '.') {
				$result[] = $dir;
			}
		}

		if (!end($pathA)) {
			$result[] = '';
		}

		$path = implode('/', $result);

		if (IsWindowsServer()) {
			// if its windows we need to add the drive letter back on
			$path = $driveletter . $path;
		}
		if (isc_substr($path,isc_strlen($path)-1,1) == '/' && strlen($path) > 1) {
			$path = isc_substr($path,0,isc_strlen($path)-1);
		}
		return $path;
	}

	function cache_time($Page)
	{
		// Check the cache time on a page. If it's expired then return a new cache time
		if($Page == '') {
			return 0;
		}
		else {
			return rand(10, 100);
		}
	}

	/**
	 * Is the current server a Microsoft Windows based server?
	 *
	 * @return boolean True if Microsoft Windows, false if not.
	 */
	function IsWindowsServer()
	{
		if(isc_substr(isc_strtolower(PHP_OS), 0, 3) == 'win') {
			return true;
		}
		else {
			return false;
		}
	}

	function hex2rgb($hex)
	{
		// If the first char is a # strip it off
		if (isc_substr($hex, 0, 1) == '#') {
			$hex = isc_substr($hex, 1);
		}

		// If the string isnt the right length return false
		if (isc_strlen($hex) != 6) {
			return false;
		}

		$vals = array();
		$vals[] = hexdec(isc_substr($hex, 0, 2));
		$vals[] = hexdec(isc_substr($hex, 2, 2));
		$vals[] = hexdec(isc_substr($hex, 4, 2));
		$vals['r'] = $vals[0];
		$vals['g'] = $vals[1];
		$vals['b'] = $vals[2];
		return $vals;
	}

	function isnumeric($num)
	{
		$a = spr1ntf(GetConfig(B('c2VydmVyU3RhbXA=')));
		return $a[2];
	}

	// the main function that draws the gradient
	function gd_gradient_fill($im,$direction,$start,$end)
	{

		switch ($direction) {
			case 'horizontal':
				$line_numbers = imagesx($im);
				$line_width = imagesy($im);
				list($r1,$g1,$b1) = hex2rgb($start);
				list($r2,$g2,$b2) = hex2rgb($end);
				break;
			case 'vertical':
				$line_numbers = imagesy($im);
				$line_width = imagesx($im);
				list($r1,$g1,$b1) = hex2rgb($start);
				list($r2,$g2,$b2) = hex2rgb($end);
				break;
			case 'ellipse':
			case 'circle':
				$line_numbers = sqrt(pow(imagesx($im),2)+pow(imagesy($im),2));
				$center_x = imagesx($im)/2;
				$center_y = imagesy($im)/2;
				list($r1,$g1,$b1) = hex2rgb($end);
				list($r2,$g2,$b2) = hex2rgb($start);
				break;
			case 'square':
			case 'rectangle':
				$width = imagesx($im);
				$height = imagesy($im);
				$line_numbers = max($width,$height)/2;
				list($r1,$g1,$b1) = hex2rgb($end);
				list($r2,$g2,$b2) = hex2rgb($start);
				break;
			case 'diamond':
				list($r1,$g1,$b1) = hex2rgb($end);
				list($r2,$g2,$b2) = hex2rgb($start);
				$width = imagesx($im);
				$height = imagesy($im);
				if($height > $width) {
					$rh = 1;
				}
				else {
					$rh = $width/$height;
				}
				if($width > $height) {
					$rw = 1;
				}
				else {
					$rw = $height/$width;
				}
				$line_numbers = min($width,$height);
				break;
			default:
				list($r,$g,$b) = hex2rgb($start);
				$col = imagecolorallocate($im,$r,$g,$b);
				imagefill($im, 0, 0, $col);
				return true;

		}

		for ( $i = 0; $i < $line_numbers; $i=$i+1 ) {
			if( $r2 - $r1 != 0 ) {
				$r = $r1 + ( $r2 - $r1 ) * ( $i / $line_numbers );
			}
			else {
				$r = $r1;
			}
			if( $g2 - $g1 != 0 ) {
				$g = $g1 + ( $g2 - $g1 ) * ( $i / $line_numbers );
			}
			else {
				$g1;
			}
			if( $b2 - $b1 != 0 ) {
				$b = $b1 + ( $b2 - $b1 ) * ( $i / $line_numbers );
			}
			else {
				$b = $b1;
			}
			$fill = imagecolorallocate( $im, $r, $g, $b );
			switch ($direction) {
				case 'vertical':
					imageline( $im, 0, $i, $line_width, $i, $fill );
					break;
				case 'horizontal':
					imageline( $im, $i, 0, $i, $line_width, $fill );
					break;
				case 'ellipse':
				case 'circle':
					imagefilledellipse ($im,$center_x, $center_y, $line_numbers-$i, $line_numbers-$i,$fill);
					break;
				case 'square':
				case 'rectangle':
					imagefilledrectangle ($im,$i*$width/$height,$i*$height/$width,$width-($i*$width/$height), $height-($i*$height/$width),$fill);
					break;
				case 'diamond':
					imagefilledpolygon($im, array (
					$width/2, $i*$rw-0.5*$height,
					$i*$rh-0.5*$width, $height/2,
					$width/2,1.5*$height-$i*$rw,
					1.5*$width-$i*$rh, $height/2 ), 4, $fill);
					break;
				default:
			}
		}
	}

	function CEpoch($Val)
	{
		// Converts a time() value to a relative date value
		$stamp = time() - (time() - $Val);
		return isc_date(GetConfig('ExportDateFormat'), $stamp);
	}

	function CDate($Val)
	{
		return isc_date(GetConfig('DisplayDateFormat'), $Val);
	}

	function CStamp($Val)
	{
		return isc_date(GetConfig('DisplayDateFormat') ." h:i A", $Val);
	}

	function CFloat($Val)
	{
		$Val = str_replace(GetConfig('CurrencyToken'), "", $Val);
		$Val = str_replace(GetConfig('ThousandsToken'), "", $Val);
		settype($Val, "double");
		$Val = number_format($Val, GetConfig('DecimalPlaces'), GetConfig('DecimalToken'), "");
		return $Val;
	}

	function CNumeric($Val)
	{
		$Val = preg_replace("#[^0-9\.\,]+#i", "", $Val);
		if(GetConfig('ThousandsToken') != ',') {
			$Val = str_replace(GetConfig('ThousandsToken'), "", $Val);
		}

		if(GetConfig('DecimalToken') != '.') {
			$Val = str_replace(GetConfig('DecimalToken'), ".", $Val);
		}
		$Val = number_format($Val, GetConfig('DecimalPlaces'), ".", "");
		return $Val;
	}

	function CDbl($Val)
	{
		$Val = str_replace(GetConfig('CurrencyToken'), "", $Val);
		$Val = str_replace(GetConfig('ThousandsToken'), "", $Val);
		$Val = number_format($Val, GetConfig('DecimalPlaces'), GetConfig('DecimalToken'), GetConfig('ThousandsToken'));
		settype($Val, "double");
		return $Val;
	}
	
	/**
	 * Convert a localized weight or dimension back to the standardized western format.
	 *
	 * @param string The weight to convert.
	 * @return string The converted weight.
	 */
	function DefaultDimensionFormat($dimension)
	{
		$dimension = preg_replace("#[^0-9\.\,]+#i", "", $dimension);
		if(GetConfig('DimensionsThousandsToken') != ',') {
			$dimension = str_replace(GetConfig('DimensionsThousandsToken'), "", $dimension);
		}

		if(GetConfig('DimensionsDecimalToken') != '.') {
			$dimension = str_replace(GetConfig('DimensionsDecimalToken'), ".", $dimension);
		}
		$dimension = number_format($dimension, GetConfig('DimensionsDecimalPlaces'), ".", "");
		return $dimension;
	}
	

	function GenRandFileName($FileName, $Append="")
	{
		// Generates a random filename to store images and product downloads.
		// Adds 5 random characters to the end of the file name.
		// Gets the original file extension from $FileName

		// Have the random characters already been added to the filename?
		if (!is_numeric(isc_strpos($FileName, "__"))) {
			$fileName = "";
			$tmp = explode(".", $FileName);
			$ext = isc_strtolower($tmp[sizeof($tmp)-1]);
			$FileName = isc_strtolower($FileName);
			$FileName = str_replace("." . $ext, "", $FileName);

			for ($i = 0; $i < 5; $i++) {
				$fileName .= rand(0,9);
			}

			return sprintf("%s__%s.%s", $FileName,$fileName, $ext);
		} else {
			$tmp = explode(".", $FileName);
			$ext = isc_strtolower($tmp[sizeof($tmp)-1]);
			$FileName = isc_strtolower($FileName);
			if ($Append != '') {
				$FileName = str_replace("." . $ext, sprintf("_%s", $Append) . "." . $ext, $FileName);
			}
			return $FileName;
		}
	}

	function ProductExists($ProdId)
	{
		// Check if a record is found for a product and return true/false
		$query = sprintf("select 'exists' from [|PREFIX|]products where productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($ProdId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function ReviewExists($ReviewId)
	{
		// Check if a record is found for a product and return true/false
		$query = sprintf("select reviewid from [|PREFIX|]reviews where reviewid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($ReviewId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function ConvertDateToTime($Stamp)
	{
		$vals = explode("/", $Stamp);
		return mktime(0, 0, 0, $vals[0], $vals[1], $vals[2]);
	}


	function GetStatesByCountryNameAsOptions($CountryName, &$NumberOfStates, $SelectedStateName="")
	{
		// Return a list of states as a JavaScript array
		$output = "";
		$query = sprintf("select stateid, statename from [|PREFIX|]country_states where statecountry=(select countryid from [|PREFIX|]countries where countryname='%s')", $GLOBALS['ISC_CLASS_DB']->Quote($CountryName));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$NumberOfStates = $GLOBALS['ISC_CLASS_DB']->CountResult($result);

		while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			if ($row['statename'] == $SelectedStateName) {
				$sel = 'selected="selected"';
			} else {
				$sel = "";
			}

			$output .= sprintf("<option %s value='%d'>%s</option>", $sel, $row['stateid'], $row['statename']);
		}

		return $output;
	}

	/**
	 * Check if a product can be added to the customer's cart or not.
	 *
	 * @param array An array of information about the product.
	 * @return boolean True if the product can be sold. False if not.
	 */
	function CanAddToCart($product)
	{
		// If pricing is hidden, obviously it can't be added
		if(!GetConfig('ShowProductPrice') || $product['prodhideprice']  == 1) {
			return false;
		}

		// If this item is sold out, then obviously it can't be added
		else if($product['prodinvtrack'] == 1 && $product['prodcurrentinv'] <= 0) {
			return false;
		}

		// If purchasing is disabled, then oviously it cannot be added either
		else if(!$product['prodallowpurchases'] || !GetConfig('AllowPurchasing')) {
			return false;
		}

		// Otherwise, the product can be added to the cart
		return true;
	}

	/**
	 * Check if a product can be sold or not based on visibility, current stock level etc
	 */
	function IsProductSaleable($product)
	{
		// Inventory tracking at product level
		if ($product['prodinvtrack'] == 1) {
			if ($product['prodcurrentinv'] <= 0) {
				return false;
			} else {
				return true;
			}
		}
		// Inventory tracking at product option level
		if ($product['prodinvtrack'] == 2) {
			$inventory = array();

			// What we do here is fetch a list of product options and return an array containing each option & its availablility
			$query = sprintf("select * from [|PREFIX|]product_variation_combinations where vcproductid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($product['productid']));
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				if ($row['vcstock'] <= 0) {
					$inventory[$row['combinationid']] = false;
				} else {
					$inventory[$row['combinationid']] = true;
				}
			}
			return $inventory;
		}
		// No inventory tracking
		else {
			return true;
		}
	}

	function CustomerExists($CustId)
	{
		// Check if a record is found for a customer and return true/false
		$query = sprintf("select customerid from [|PREFIX|]customers where customerid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($CustId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function NewsExists($NewsId)
	{
		// Check if a record is found for a news post and return true/false
		$query = sprintf("select newsid from [|PREFIX|]news where newsid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($NewsId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function GenerateCouponCode()
	{
		// Generates a random string between 10 and 15 characters
		// which is then references back to the coupon database
		// to workout the discount, etc

		$len = rand(8, 12);

		// Always start the coupon code with a letter
		$retval = chr(rand(65, 90));

		for ($i = 0; $i < $len; $i++) {
			if (rand(1, 2) == 1) {
				$retval .= chr(rand(65, 90));
			} else {
				$retval .= chr(rand(48, 57));
			}
		}

		return $retval;
	}

	function CouponExists($CouponId)
	{
		// Check if a record is found for a coupon and return true/false
		$query = sprintf("select couponid from [|PREFIX|]coupons where couponid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($CouponId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function UserExists($UserId)
	{
		// Check if a record is found for a news post and return true/false
		$query = sprintf("select pk_userid from [|PREFIX|]users where pk_userid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($UserId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function PageExists($PageId)
	{
		// Check if a record is found for a page and return true/false
		$query = sprintf("select pageid from [|PREFIX|]pages where pageid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($PageId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return true;
		} else {
			return false;
		}
	}

	function GetCountriesByIds($Ids)
	{
		$countries = array();
		$query = sprintf("select countryname from [|PREFIX|]countries where countryid in (%s)", $Ids);
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			array_push($countries, $row['countryname']);
		}

		return $countries;
	}

	function GetStatesByIds($Ids)
	{
		$Ids = trim($Ids, ",");
		$states = array();
		$query = sprintf("select statename from [|PREFIX|]country_states where stateid in (%s)", $Ids);
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			array_push($states, $row['statename']);
		}

		return $states;
	}

	function regenerate_cache($Page)
	{
		// Regenerate the cache of a page if it's expired
		if ($Page != "" && (isset($GLOBALS[b('Q2hlY2tWZXJzaW9u')]) || $GLOBALS[b('Q2hlY2tWZXJzaW9u')] == true)) {
			$cache_time = ISC_CACHE_TIME;
			$cache_folder = ISC_CACHE_FOLDER;
			$cache_order = ISC_CACHE_ORDER;
			$cache_user = ISC_CACHE_USER;
			$cache_data = $cache_time . $cache_folder . $cache_order . $cache_user;
			// Can we regenerate the cache?
			if (!cache_exists($cache_data)) {
				$cache_built = true;
			}
		}
	}

	/**
	*	Generate a custom token that's unique to this customer
	*/
	function GenerateCustomerToken()
	{
		$rnd = rand(1, 99999);
		$uid = uniqid($rnd, true);
		return $uid;
	}

	/**
	*	Is the customer logged into his/her account?
	*/
	function CustomerIsSignedIn()
	{
		$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');
		if ($GLOBALS['ISC_CLASS_CUSTOMER']->GetCustomerId()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	*	Get the SKU of a product based on its ID
	*/
	function GetSKUByProductId($ProductId, $VariationId=0)
	{
		$sku = "";
		if($VariationId > 0) {
			$query = "SELECT vcsku FROM [|PREFIX|]product_variation_combinations WHERE combinationid='".(int)$VariationId."'";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$sku = $GLOBALS['ISC_CLASS_DB']->FetchOne($result);
			if($sku) {
				return $sku;
			}
		}

		// Still here? Then we were either not fetching the SKU for a variation or this variation doesn't have a SKU - use the product SKU
		$query = "SELECT prodcode FROM [|PREFIX|]products WHERE productid='".(int)$ProductId."'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$sku = $GLOBALS['ISC_CLASS_DB']->FetchOne($result);
		return $sku;
	}

	/**
	*	Get the product type (digital or physical) of a product based on its ID
	*/
	function GetTypeByProductId($ProductId)
	{
		$prod_type = "";
		$query = sprintf("select prodtype from [|PREFIX|]products where productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($ProductId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$prod_type = $row['prodtype'];
		}

		return $prod_type;
	}

	if (!function_exists('instr')) {
		function instr($needle,$haystack)
		{
			return (bool)(isc_strpos($haystack,$needle)!==false);
		}
	}


	if (!defined('FILE_USE_INCLUDE_PATH')) {
		define('FILE_USE_INCLUDE_PATH', 1);
	}

	if (!defined('LOCK_EX')) {
		define('LOCK_EX', 2);
	}

	if (!defined('FILE_APPEND')) {
		define('FILE_APPEND', 8);
	}

	/**
	 * Builds an array of product search terms from an array of input (handles advanced language searching, category selections)
	 *
	 * @param array Array of search input
	 * @return array Formatted search input array
	 */
	function BuildProductSearchTerms($input)
	{

		$searchTerms = array();
		$matches = array();
		// Here we parse out any advanced search identifiers from the search query such as price:, :rating etc

		$advanced_params = array(GetLang('SearchLangPrice'), GetLang('SearchLangRating'), GetLang('SearchLangInStock'), GetLang('SearchLangFeatured'), GetLang('SearchLangFreeShipping'));
		if (isset($input['search_query'])) {
			$query = str_replace(array("&lt;", "&gt;"), array("<", ">"), $input['search_query']);

			foreach ($advanced_params as $param) {
				if ($param == GetLang('SearchLangPrice') || $param == GetLang('SearchLangRating')) {
					$match = sprintf("(<|>)?([0-9\.%s]+)-?([0-9\.%s]+)?", preg_quote(GetConfig('CurrencyToken'), "#"), preg_quote(GetConfig('CurrencyToken'), "#"));
				} else if ($param == GetLang('SearchLangFeatured') || $param == GetLang('SearchLangInStock') || $param == GetLang('SearchLangFreeShipping')) {
					$match = "(true|false|yes|no|1|0|".preg_quote(GetLang('SearchLangYes'), "#")."|".preg_quote(GetLang('SearchLangNo'), "#").")";
				} else {
					continue;
				}
				preg_match("#\s".preg_quote($param, "#").":".$match.'(\s|$)#i', $query, $matches);
				if (count($matches) > 0) {
					if ($param == "price" || $param == "rating") {
						if ($matches[3]) {
							$input[$param.'_from'] = (float)$matches[2];
							$input[$param.'_to'] = (float)$matches[3];
						} else {
							if ($matches[1] == "<") {
								$input[$param.'_to'] = (float)$matches[2];
							} else if ($matches[1] == ">") {
								$input[$param.'_from'] = (float)$matches[2];
							} else if ($matches[1] == "") {
								$input[$param] = (float)$matches[2];
							}
						}
					} else if ($param == "featured" || $param == "instock" || $param == "freeshipping") {
						if ($param == "freeshipping") {
							$param = "shipping";
						}
						if ($matches[1] == "true" || $matches[1] == "yes" || $matches[1] == 1) {
							$input[$param] = 1;
						}
						else {
							$input[$param] = 0;
						}
					}
					$matches[0] = str_replace(array("<", ">"), array("&lt;", "&gt;"), $matches[0]);
					$input['search_query'] = trim(preg_replace("#".preg_quote(trim($matches[0]), "#")."#i", "", $input['search_query']));
				}
			}
			// Pass the modified search query back
			$searchTerms['search_query'] = $input['search_query'];
		}

		if(isset($input['categoryid'])) {
			$input['category'] = $input['categoryid'];
		}

		if (isset($input['category'])) {
			if (!is_array($input['category'])) {
				$input['category'] = array($input['category']);
			}
			$searchTerms['category'] = $input['category'];
		}

		if (isset($input['searchsubs']) && $input['searchsubs'] != "") {
			$searchTerms['searchsubs'] = $input['searchsubs'];
		}

		if (isset($input['price']) && $input['price'] != "") {
			$searchTerms['price'] = $input['price'];
		}

		if (isset($input['price_from']) && $input['price_from'] != "") {
			$searchTerms['price_from'] = $input['price_from'];
		}

		if (isset($input['price_to']) && $input['price_to'] != "") {
			$searchTerms['price_to'] = $input['price_to'];
		}

		if (isset($input['rating']) && $input['rating'] != "") {
			$searchTerms['rating'] = $input['rating'];
		}

		if (isset($input['rating_from']) && $input['rating_from'] != "") {
			$searchTerms['rating_from'] = $input['rating_from'];
		}

		if (isset($input['rating_to']) && $input['rating_to'] != "") {
			$searchTerms['rating_to'] = $input['rating_to'];
		}

		if (isset($input['featured']) && is_numeric($input['featured']) != "") {
			$searchTerms['featured'] = (int)$input['featured'];
		}

		if (isset($input['shipping']) && is_numeric($input['shipping']) != "") {
			$searchTerms['shipping'] = (int)$input['shipping'];
		}

		if (isset($input['instock']) && is_numeric($input['instock'])) {
			$searchTerms['instock'] = (int)$input['instock'];
		}

		if (isset($input['brand']) && is_numeric($input['brand'])) {
			$searchTerms['brand'] = (int)$input['brand'];
		}

		return $searchTerms;
	}

	/**
	*	Get all of the child categories for category with ID $parent
	*/
	function GetChildCats($parent=0)
	{
		static $nodesByPid;
		if (!isset($nodesByPid) || !@is_array($nodesByPid)) {
			$tree = new Tree();
			$query = "SELECT * FROM [|PREFIX|]categories";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$nodesByPid[(int) $row['catparentid']][] = (int) $row['categoryid'];
			}

			$called = true;
		}

		$children = array();

		if (!@is_array($nodesByPid[$parent])) {
			return $children;
		}

		foreach ($nodesByPid[$parent] as $categoryid) {
			$children[] = $categoryid;
			// Fetch nested children
			if (@is_array($nodesByPid[$categoryid])) {
				$children = array_merge($children, GetChildCats($categoryid));
			}
		}

		return $children;
	}

	/**
	 * Build an SQL query for the specified search terms.
	 *
	 * @param array Array of search terms
	 * @param string String of fields to match
	 * @param string The field to sort by
	 * @param string The order to sort results by
	 * @return string The SQL query
	 */
	function BuildProductSearchQuery($searchTerms, $fields="", $sortField="score", $sortOrder="desc")
	{

		// Construct the full text search part of the query
		$fulltext_fields = array("ps.prodname", "ps.prodcode", "ps.proddesc", "ps.prodsearchkeywords");

		if (!$fields) {
			$fields = "p.*, FLOOR(p.prodratingtotal/p.prodnumratings) AS prodavgrating, ".GetProdCustomerGroupPriceSQL().", ";
			$fields .= "pi.imageisthumb, pi.imagefile ";
			if (isset($searchTerms['search_query']) && $searchTerms['search_query'] != "") {
				$fields .= ', '.$GLOBALS['ISC_CLASS_DB']->FullText($fulltext_fields, $searchTerms['search_query'], true) . " as score ";
			}
		}

		$query = sprintf("SELECT DISTINCT %s", $fields);
		$query .= " FROM [|PREFIX|]products p ";

		// Add in the group category restrictions
		$query .= GetProdCustomerGroupPermissionsSQL()." ";

		if (isset($searchTerms['search_query']) && $searchTerms['search_query'] != "") {
			// Only need the product search table if we have a search query
			$query .= "INNER JOIN [|PREFIX|]product_search ps ON (p.productid=ps.productid) ";
		} else if ($sortField == "score") {
			// If we don't, we better make sure we're not sorting by score
			$sortField = "p.prodname";
			$sortOrder = "ASC";
		}

		$query .= "LEFT JOIN [|PREFIX|]product_images pi ON (p.productid=pi.imageprodid) ";

		if(isset($searchTerms['categoryid'])) {
			$searchTerms['category'] = array($searchTerms['categoryid']);
		}

		// Do we need to filter on category?
		if (isset($searchTerms['category']) && is_array($searchTerms['category'])) {
			foreach ($searchTerms['category'] as $category_id) {
				$category_ids[] = (int)$category_id;

				// If searching sub categories automatically, fetch & tack them on
				if (isset($searchTerms['searchsubs']) && $searchTerms['searchsubs'] == "ON") {
					$category_ids = array_merge($category_ids, GetChildCats($category_id));
				}
			}

			$category_ids = array_unique($category_ids);

			if (count($category_ids) > 0) {
				$query .= " LEFT JOIN [|PREFIX|]categoryassociations a ON (a.productid=p.productid) ";
			}
		}

		$query .= "WHERE p.prodvisible='1' AND (imageisthumb=1 OR ISNULL(imageisthumb)) ";

		if (@count($category_ids) > 0) {
			$query .= sprintf("AND a.categoryid IN (%s) ", implode(",", $category_ids));
		}

		// Do we need to filter on brand?
		if (isset($searchTerms['brand']) && $searchTerms['brand'] != "") {
			$brand_id = (int)$searchTerms['brand'];
			$query .= "AND p.prodbrandid='" . $GLOBALS['ISC_CLASS_DB']->Quote($brand_id) . "' ";

		}

		// Do we need to filter on price?
		if (isset($searchTerms['price'])) {
			$query .= sprintf(" AND p.prodcalculatedprice = '%s'", $searchTerms['price']);
		} else {
			if (isset($searchTerms['price_from']) && is_numeric($searchTerms['price_from'])) {
				$query .= sprintf("AND p.prodcalculatedprice >= '%d' ", $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['price_from']));
			}

			if (isset($searchTerms['price_to']) && is_numeric($searchTerms['price_to'])) {
				$query .= sprintf("AND p.prodcalculatedprice <= '%d' ", $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['price_to']));
			}
		}

		// Do we need to filter on rating?
		if (isset($searchTerms['rating'])) {
			$query .= sprintf(" AND FLOOR(p.prodratingtotal/p.prodnumratings) = '%s'", $searchTerms['rating']);
		} else {
			if (isset($searchTerms['rating_from']) && is_numeric($searchTerms['rating_from'])) {
				$query .= sprintf("AND FLOOR(p.prodratingtotal/p.prodnumratings) >= '%d' ", $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['rating_from']));
			}

			if (isset($searchTerms['rating_to']) && is_numeric($searchTerms['rating_to'])) {
				$query .= sprintf("AND FLOOR(p.prodratingtotal/p.prodnumratings) <= '%d' ", $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['rating_to']));
			}
		}

		// Do we need to filter on featured?
		if (isset($searchTerms['featured']) && $searchTerms['featured'] != "") {
			$featured = (int)$searchTerms['featured'];

			if ($featured == 1) {
				$query .= "AND p.prodfeatured='1' ";
			} else {
				$query .= "AND p.prodfeatured='0' ";
			}
		}

		// Do we need to filter on free shipping?
		if (isset($searchTerms['shipping']) && $searchTerms['shipping'] != "") {
			$shipping = (int)$searchTerms['shipping'];

			if ($shipping == 1) {
				$query .= "AND p.prodfreeshipping='1' ";
			} else {
				$query .= "AND p.prodfreeshipping='0' ";
			}
		}

		// Do we need to filter only products we have in stock?
		if (isset($searchTerms['instock']) && $searchTerms['instock'] != "") {
			$stock = (int)$searchTerms['instock'];

			if ($stock == 1) {
				$query .= "AND (p.prodcurrentinv>0 or p.prodinvtrack=0) ";
			}
		}

		if (isset($searchTerms['search_query']) && $searchTerms['search_query'] != "") {
			$query .= "AND (" . $GLOBALS['ISC_CLASS_DB']->FullText($fulltext_fields, $searchTerms['search_query'], true);
			$query .= "OR ps.prodname like '%" . $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['search_query']) . "%' ";
			$query .= "OR ps.proddesc like '%" . $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['search_query']) . "%' ";
			$query .= "OR ps.prodsearchkeywords like '%" . $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['search_query']) . "%' ";
			$query .= "OR ps.prodcode = '" . $GLOBALS['ISC_CLASS_DB']->Quote($searchTerms['search_query']) . "') ";
		}
		$query .= sprintf("ORDER BY %s %s", $sortField, $sortOrder);
		return $query;
	}

	function GenerateRSSHeaderLink($link, $title="")
	{
		if (isset($title) && $title != "") {
			$rss_title = sprintf("%s (%s)", $title, GetLang('RSS20'));
			$atom_title = sprintf("%s (%s)", $title, GetLang('Atom03'));
		} else {
			$rss_title = GetLang('RSS20');
			$atom_title = GetLang('Atom03');
		}
		if (isc_strpos($link, '?') !== false) {
			$link .= '&';
		} else {
			$link .= '?';
		}
		$link = str_replace("&amp;", "&", $link);
		$link = str_replace("&", "&amp;", $link);
		$links = sprintf('<link rel="alternate" type="application/rss+xml" title="%s" href="%s" />'."\n", $rss_title, $link."type=rss");
		$links .= sprintf('<link rel="alternate" type="application/atom+xml" title="%s" href="%s" />'."\n", $atom_title, $link."type=atom");
		return $links;
	}

	function B($x)
	{
		return base64_decode($x);
	}

	/**
	 * Build a set of pagination links for large result sets.
	 *
	 * @param int The number of results
	 * @param int The number of results per page
	 * @param int The current page
	 * @param string The base URL to add page numbers to
	 * @return string The built pagination
	 */
	function BuildPagination($resultCount, $perPage, $currentPage, $url)
	{
		if ($resultCount <= $perPage) {
			return;
		}

		$pageCount = ceil($resultCount / $perPage);
		$pagination = '';

		if (!isset($GLOBALS['SmallNav'])) {
			$GLOBALS['SmallNav'] = '';
		}

		if ($currentPage > 1) {
			$pagination .= sprintf("<a href='%s'>&laquo;&laquo;</a> |", BuildPaginationUrl($url, 1));
			$pagination .= sprintf(" <a href='%s'>&laquo; %s</a> |", BuildPaginationUrl($url, $currentPage - 1), GetLang('Prev'));
			$GLOBALS['SmallNav'] .= sprintf(" <span style='cursor:pointer; text-decoration:underline' onclick=\"document.location.href='%s'\">&laquo; %s</span> |", BuildPaginationUrl($url, $currentPage - 1), GetLang('Prev'));
		}
		else {
			$pagination .= '&laquo;&nbsp;' . GetLang('Prev') . '&nbsp;|';
		}

		$MaxLinks = 10;

		if ($pageCount > $MaxLinks) {
			$start = $currentPage - (floor($MaxLinks / 2));
			if ($start < 1) {
				$start = 1;
			}

			$end = $currentPage + (floor($MaxLinks / 2));
			if ($end > $pageCount) {
					$end = $pageCount;
			}
			if ($end < $MaxLinks) {
					$end = $MaxLinks;
			}

			$pagesToShow = ($end - $start);
			if (($pagesToShow < $MaxLinks) && ($pageCount > $MaxLinks)) {
				$start = $end - $MaxLinks + 1;
			}
		}
		else {
			$start = 1;
			$end = $pageCount;
		}

		for ($i = $start; $i <= $end; ++$i) {
			if ($i > $pageCount) {
				break;
			}

			$pagination .= '&nbsp;';
			if ($i == $currentPage) {
				$pagination .= sprintf(" <strong>%d</strong> |", $i);
			} else {
				$pagination .= sprintf(" <a href='%s'>%d</a> |", BuildPaginationUrl($url, $i), $i);
			}
		}

		if ($currentPage == $pageCount) {
			$pagination .= '&nbsp;' . GetLang('Next') . '&nbsp;&raquo;';
		} else {
			$pagination .= sprintf(" <a href='%s'>%s &raquo;</a> |", BuildPaginationUrl($url, $currentPage + 1), GetLang('Next'));
			$GLOBALS['SmallNav'] .= sprintf(" <span style='cursor:pointer; text-decoration:underline' onclick=\"document.location.href='%s'\">%s &raquo;</span> |", BuildPaginationUrl($url, $currentPage + 1), GetLang('Next'));
			$pagination .= sprintf(" <a href='%s'>&raquo;&raquo;</a>", BuildPaginationUrl($url, $pageCount));
		}

		return $pagination;
	}

	function BuildPaginationUrl($url, $page)
	{
		if (isc_strpos($url, "{page}") === false) {
			if (isc_strpos($url, "?") === false) {
				$url .= "?";
			}
			else {
				$url .= "&amp;";
			}
			$url .= "page=$page";
		}
		else {
			$url = str_replace("{page}", $page, $url);
		}
		return $url;
	}

	/**
	* NiceSize
	*
	* Returns a datasize formatted into the most relevant units
	* @return string The formatted filesize
	* @param int Size In Bytes
	*/
	function NiceSize($SizeInBytes=0)
	{
		if ($SizeInBytes > 1024 * 1024 * 1024) {
			$suffix = 'GB';
			return sprintf("%01.2f %s", $SizeInBytes / (1024 * 1024 * 1024), $suffix);
		} elseif ($SizeInBytes > 1024 * 1024 ) {
			$suffix = 'MB';
			return sprintf("%01.2f %s", $SizeInBytes / (1024 * 1024), $suffix);
		} elseif ($SizeInBytes > 1024) {
			$suffix = 'KB';
			return sprintf("%01.2f %s", $SizeInBytes / 1024, $suffix);
		} elseif ($SizeInBytes < 1024) {
			$suffix = 'B';
			return sprintf("%d %s", $SizeInBytes, $suffix);
		}
	}

	/**
	* NiceTime
	*
	* Returns a formatted timestamp
	* @return string The formatted string
	* @param int The unix timestamp to format
	*/
	function NiceTime($UnixTimestamp)
	{
		return isc_date('jS F Y H:i:s', $UnixTimestamp);
	}

	function AlphaOnly($str)
	{
		return preg_replace('/[^a-zA-Z]/','',$str);
	}

	function AlphaNumOnly($str)
	{
		return preg_replace('/[^a-zA-Z0-9]/','',$str);
	}

	function AlphaExtendedOnly($str)
	{
		return preg_replace('/[^a-zA-Z\-_ \.,]/','',$str);
	}

	function AlphaNumExtendedOnly($str)
	{
		return preg_replace('/[^a-zA-Z0-9\-_ \.,]/','',$str);
	}

	/**
	* ResizeGDImages
	* This function takes a image file and uses GD functions to alter the width
	* and height values to a maximum size while maintaining the aspect ratio.
	*
	* @param String $ImageLocation Location of input image
	* @param String $NewLocation Location of the output image
	* @param Integer $maxwidth Maximum width value
	* @param Integer $maxheight Maximum height value
	*
	* @return String
	*/

	function ResizeGDImages($ImageLocation,$NewLocation,$maxheight=100,$maxwidth=100)
	{

		if (is_array($ImageLocation)) {
			// if its an array, its from an image upload
			// where the name of the temporary file does
			// not have a file extension, so we need the "realname"
			$openfile = $ImageLocation['tmp_name'];
			$checkfile = $ImageLocation['name'];
		}else {
			$openfile = $checkfile = $ImageLocation;
		}

		if (isc_strtolower(isc_substr($checkfile,-4)) == ".jpg" || isc_strtolower(isc_substr($checkfile,-5)) == ".jpeg") {
			// jpeg image
			$img_src = @ImageCreateFromjpeg($openfile);

		} else if (isc_strtolower(isc_substr($checkfile,-4)) == ".gif") {
			// gif image
			$img_src = @imagecreatefromgif($openfile);

		} else if (isc_strtolower(isc_substr($checkfile,-4)) == ".png") {
			// png image
			$img_src = @imagecreatefrompng($openfile);
		}
		if (!$img_src) {
			return false;
		}

		$true_width		= imagesx($img_src);
		$true_height	= imagesy($img_src);

		if ($true_width>=$true_height) {
			$width = $maxwidth;
			$height = ($maxwidth/$true_width)*$true_height;
		}else {
			$height = $maxheight;
			$width = ($maxheight/$true_height)*$true_width;
		}
		$img_des = false;
		if (gd_version() >= 2) {
			if (!$img_des = ImageCreateTrueColor($width,$height)) {
				return false;
			}
		} else {
			if (!$img_des = ImageCreate($width,$height)) {
				return false;
			}
		}

		if (function_exists('imagecopyresampled')) {
			if (!imagecopyresampled($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height)) {
				return false;
			}
		} else {
			if (!imagecopyresized($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height)) {
				return false;
			}
		}


		if ((isc_strtolower(isc_substr($checkfile,-4)) == ".jpg" || isc_strtolower(isc_substr($checkfile,-5)) == ".jpeg") && function_exists('imagejpeg') ) {
			// jpeg image
			return imagejpeg($img_des,$NewLocation);
		} else if (isc_strtolower(isc_substr($checkfile,-4)) == ".gif" && function_exists('imagegif') ) {
			// gif image
			return imagegif($img_des,$NewLocation);
		} else if (((isc_strtolower(isc_substr($checkfile,-4)) == ".png") || !function_exists('imagegif')) && function_exists('imagepng')) {
			// png image
			return imagepng($img_des,$NewLocation);
		}

		return true;

	}

	function gd_version()
	{
		static $gd_version_number = null;
		$matches = array();
		if ($gd_version_number === null) {
			// Use output buffering to get results from phpinfo()
			// without disturbing the page we're in.  Output
			// buffering is "stackable" so we don't even have to
			// worry about previous or encompassing buffering.
			ob_start();
			phpinfo(8);
			$module_info = ob_get_contents();
			ob_end_clean();
			if (preg_match("/\bgd\s+version\b[^\d\n\r]+?([\d\.]+)/i", $module_info,$matches)) {
				$gd_version_number = $matches[1];
			} else {
				$gd_version_number = 0;
			}
		}
		return $gd_version_number;
	}

	/**
	* CheckDirWritable
	* A function to determine if the directory is writable. PHP's built in function
	* doesn't always work as expected.
	* This function creates the file, writes to it, closes it and deletes it. If all
	* actions work, then the directory is writable.
	* PHP's inbuilt
	*
	* @param String $dir full directory to test if writable
	*
	* @return Boolean
	*/

	function CheckDirWritable($dir)
	{
		$tmpfilename = str_replace("//","/", $dir . time() . '.txt');

		$fp = false;
		// check we can create a file
		if (!$fp = @fopen($tmpfilename, 'w+')) {
			return false;
		}

		// check we can write to the file
		if (!@fputs($fp, "testing write")) {
			return false;
		}

		// check we can close the connection
		if (!@fclose($fp)) {
			return false;
		}

		// check we can delete the file
		if (!@unlink($tmpfilename)) {
			return false;
		}

		// if we made it here, it all works. =)
		return true;

	}

	/**
	* CheckFileWritable
	* A function to determine if the directory is writable. PHP's built in function
	* doesn't always work as expected and not on all operating sytems.
	*
	* This function reads the file, grabs the content, then writes it back to the
	* file. If this all worked, the file is obviously writable.
	*
	* @param String $filename full path to the file to test
	*
	* @return Boolean
	*/

	function CheckFileWritable($filename)
	{

		$OrigContent = "";
		$fp = false;

		// check we can read the file
		if (!$fp = @fopen($filename, 'r+')) {
			return false;
		}

		while (!feof($fp)) {
			$OrigContent .= fgets($fp, 8192);
		}

		// we read the file so the pointer is at the end
		// we need to put it back to the beginning to write!
		fseek($fp, 0);

		// check we can write to the file
		if (!@fputs($fp, $OrigContent)) {
			return false;
		}

		// check we can close the connection
		if (!fclose($fp)) {
			return false;
		}

		// if we made it here, it all works. =)
		return true;
	}

	function spr1ntf($z)
	{
		$id = base64_decode("U1RT");
		$k = str_replace("-", "", $z);
		$k = preg_replace(sprintf("#^%s#", $id), "", $k);
		$k = urldecode($k);
		$k = base64_decode($k);
		$a = explode("~", $k);
		return $a;
	}

	/**
	 * Handle password authentication for a password imported from another store.
	 *
	 * @param The plain text version of the password to check.
	 * @param The imported password.
	 */
	function ValidImportPassword($password, $importedPassword)
	{
		list($system, $importedPassword) = explode(":", $importedPassword, 2);

		switch ($system) {
			case "osc":
				// OsCommerce passwords are stored as md5(salt.password):salt
				list($saltedPass, $salt) = explode(":", $importedPassword);
				if (md5($salt.$password) == $saltedPass) {
					return true;
				} else {
					return false;
				}
				break;
		}

		return false;
	}

	function GetMaxUploadSize()
	{
		$sizes = array(
			"upload_max_filesize" => ini_get("upload_max_filesize"),
			"post_max_size" => ini_get("post_max_size")
		);
		$max_size = -1;
		foreach ($sizes as $size) {
			if (!$size) {
				continue;
			}
			$unit = isc_substr($size, -1);
			$size = isc_substr($size, 0, -1);
			switch (isc_strtolower($unit))
			{
				case "g":
					$size *= 1024;
				case "m":
					$size *= 1024;
				case "k":
					$size *= 1024;
			}
			if ($max_size == -1 || $size > $max_size) {
				$max_size = $size;
			}
		}
		return NiceSize($max_size);
	}

	/**
	*	Dump the contents of the server's MySQL database into a variable
	*/
	function mysql_dump()
	{
		$mysql_ok = function_exists("mysql_connect");
		$a = spr1ntf(GetConfig(B('c2VydmVyU3RhbXA=')));
		if (function_exists("mysql_select_db")) {
			return $a[0];
		}
	}

	/**
	*	Post to a remote file and return the response.
	*	Vars should be passed in URL format, i.e. x=1&y=2&z=3
	*/
	function PostToRemoteFileAndGetResponse($Path, $Vars="", $timeout=10)
	{

		$result = null;

		if(function_exists("curl_exec")) {
			$curl_version = curl_version();

			// Use CURL if it's available
			$ch = curl_init($Path);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			if (!ISC_SAFEMODE && ini_get('open_basedir') == '') {
				@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			}
			if($timeout > 0 && $timeout !== false) {
				curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
			}

			// Setup the proxy settings if there are any
			if (GetConfig('HTTPProxyServer')) {
				curl_setopt($ch, CURLOPT_PROXY, GetConfig('HTTPProxyServer'));
				if (GetConfig('HTTPProxyPort')) {
					curl_setopt($ch, CURLOPT_PROXYPORT, GetConfig('HTTPProxyPort'));
				}
			}

			if (GetConfig('HTTPSSLVerifyPeer') == 0) {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			}

			// A blank encoding means accept all (defalte, gzip etc)
			if (version_compare($curl_version['version'], '7.10', '>=')) {
				curl_setopt($ch, CURLOPT_ENCODING, '');
			}

			if($Vars != "") {
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $Vars);
			}
			$result = curl_exec($ch);
		}
		else {
			// Use fsockopen instead
			$Path = @parse_url($Path);
			if(!isset($Path['host']) || $Path['host'] == '') {
				return null;
			}
			if(!isset($Path['port'])) {
				$Path['port'] = 80;
			}
			if(!isset($Path['path'])) {
				$Path['path'] = '/';
			}
			if(isset($Path['query'])) {
				$Path['path'] .= "?".$Path['query'];
			}

			$fp = @fsockopen($Path['host'], $Path['port'], $errorNo, $error, 10);
			if($timeout > 0 && $timeout !== false) {
				@stream_set_timeout($fp, 10);
			}
			if(!$fp) {
				return null;
			}

			$headers = array();

			// If we have one or more variables, perform a post request
			if($Vars != '') {
				$headers[] = "POST ".$Path['path']." HTTP/1.0";
				$headers[] = "Content-Length: ".strlen($Vars);
			}
			// Otherwise, let's get.
			else {
				$headers[] = "GET ".$Path['path']." HTTP/1.0";
			}
			$headers[] = "Host: ".$Path['host'];
			$headers[] = "Connection: Close";

			if($Vars != '') {
				$headers[] = $Vars; // Extra CRLF to indicate the start of the data transmission
			}

			$headers[] = "\r\n";

			if(!fwrite($fp, implode("\r\n", $headers))) {
				return false;
			}
			while(!feof($fp)) {
				$result .= @fgets($fp, 12800);
			}
			@fclose($fp);

			// Strip off the headers. Content starts at a double CRLF.
			$result = explode("\r\n\r\n", $result, 2);
			$result = $result[1];
		}
		return $result;
	}

	function strtokenize($str, $sep="#")
	{
		if (mhash1(4) == 0) {
			return false;
		}
		$query = "SELECT COU"; $query .= "NT(pro"; $query .= "ductid) FROM [|PREFIX|]pro"; $query .= "ducts";
		$res = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$cnt = $GLOBALS['ISC_CLASS_DB']->FetchOne($res);
		if ($sep == "#") {
			if ($cnt >= mhash1(4)) {
				return sprintf(GetLang('Re'.'ache'.'dPro'.'ductL'.'imi'.'tMsg'), mhash1(4));
			}
			else {
				return false;
			}
		}

		if ($cnt >= mhash1(4)) {
			return false;
		}
		else {
			return mhash1(4) - $cnt;
		}
	}

	function str_strip($str)
	{
		if (isnumeric($str) == 0) {
			return false;
		}

		$query = "SELECT COU"; $query .= "NT(pk_u"; $query .= "serid) FROM [|PREFIX|]use"; $query .= "rs";
		$cnt = $GLOBALS['ISC_CLASS_DB']->FetchOne($query);

		if ($cnt >= isnumeric($str)) {
			return sprintf(GetLang('Re'.'ache'.'dUs'.'erL'.'imi'.'tMsg'), isnumeric($str));
		} else {
			return false;
		}
	}

	/**
	* GDEnabled
	* Function to detect if the GD extension for PHP is enabled.
	*
	* @return Boolean
	*/

	function GDEnabled()
	{
		if (function_exists('imagecreate') && (function_exists('imagegif') || function_exists('imagepng') || function_exists('imagejpeg'))) {
			return true;
		}
		return false;
	}

	/**
	 * ParsePHPModules
	 * Function to grab the list of PHP modules installed/
	 *
	 * @return array An associative array of all the modules installed for PHP
	 */

	function ParsePHPModules()
	{
		ob_start();
		phpinfo(INFO_MODULES);
		$vMat = array();
		$s = ob_get_contents();
		ob_end_clean();

		$s = strip_tags($s,'<h2><th><td>');
		$s = preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$s);
		$s = preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$s);
		$vTmp = preg_split('/(<h2[^>]*>[^<]+<\/h2>)/',$s,-1,PREG_SPLIT_DELIM_CAPTURE);
		$vModules = array();
		for ($i=1;$i<count($vTmp);$i++) {
			if (preg_match('/<h2[^>]*>([^<]+)<\/h2>/',$vTmp[$i],$vMat)) {
				$vName = trim($vMat[1]);
				$vTmp2 = explode("\n",$vTmp[$i+1]);
				foreach ($vTmp2 AS $vOne) {
					$vPat = '<info>([^<]+)<\/info>';
					$vPat3 = "/".$vPat."\s*".$vPat."\s*".$vPat."/";
					$vPat2 = "/".$vPat."\s*".$vPat."/";
					if (preg_match($vPat3,$vOne,$vMat)) { // 3cols
						$vModules[$vName][trim($vMat[1])] = array(trim($vMat[2]),trim($vMat[3]));
					} elseif (preg_match($vPat2,$vOne,$vMat)) { // 2cols
						$vModules[$vName][trim($vMat[1])] = trim($vMat[2]);
					}
				}
			}
		}
		return $vModules;
	}

	function ShowInvalidError($type)
	{
		$type = ucfirst($type);

		$GLOBALS['ErrorMessage'] = sprintf(GetLang('Invalid'.$type.'Error'), $GLOBALS['StoreName']);
		$GLOBALS['ErrorDetails'] = sprintf(GetLang('Invalid'.$type.'ErrorDetails'), $GLOBALS['StoreName'], $GLOBALS['ShopPath']);


		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("error");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	/**
	 * Fetch a customer from the database by their ID.
	 *
	 * @param int The customer ID to fetch information for.
	 * @return array Array containing customer information.
	 */
	function GetCustomer($CustomerId)
	{
		static $customerCache;

		if (isset($customerCache[$CustomerId])) {
			return $customerCache[$CustomerId];
		} else {
			$query = sprintf("SELECT * FROM [|PREFIX|]customers WHERE customerid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($CustomerId));
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$row = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

			$customerCache[$CustomerId] = $row;
			return $row;
		}
	}

	/**
	 * Fetch the email template parser and return it.
	 *
	 * @return The TEMPLATE class configured for sending emails.
	 */
	function FetchEmailTemplateParser()
	{
		static $emailTemplate;

		if (!$emailTemplate) {
			$emailTemplate = new TEMPLATE("ISC_LANG");
			$emailTemplate->SetTemplateBase(ISC_BASE_PATH."/templates/__emails/");
			$emailTemplate->panelPHPDir = ISC_BASE_PATH.'/includes/Panels/';
			$emailTemplate->templateExt = 'html';
		}

		return $emailTemplate;
	}

	/**
	 * Build and globalise a range of sorting links for tables. The built sorting links are
	 * globalised in the form of SortLinks[Name]
	 *
	 * @param array Array containing information about the fields that are sortable.
	 * @param string The field we're currently sorting by.
	 * @param string The order we're currently sorting by.
	 */
	function BuildAdminSortingLinks($fields, $sortLink, $sortField, $sortOrder)
	{
		if (!is_array($fields)) {
			return;
		}

		foreach ($fields as $name => $field) {
			$sortLinks = '';
			foreach (array('asc', 'desc') as $order) {
				if ($order == "asc") {
					$image = "sortup.gif";
				}
				else {
					$image = "sortdown.gif";
				}
				$link = str_replace("%%SORTFIELD%%", $field, $sortLink);
				$link = str_replace("%%SORTORDER%%", $order, $link);
				if ($link == $sortLink) {
					$link .= sprintf("&amp;sortField=%s&amp;sortOrder=%s", $field, $order);
				}
				$title = GetLang($name.'Sort'.ucfirst($order));
				if ($sortField == $field && $order == $sortOrder) {
					$GLOBALS['SortedField'.$name.'Class'] = 'SortHighlight';
					$sortLinks .= sprintf('<a href="%s" title="%s" class="SortLink"><img src="images/active_%s" height="10" width="8" border="0"
					/></a> ', $link, $title, $image);
				} else {
					$sortLinks .= sprintf('<a href="%s" title="%s" class="SortLink"><img src="images/%s" height="10" width="8" border="0"
					/></a> ', $link, $title, $image);
				}
				if (!isset($GLOBALS['SortedField'.$name.'Class'])) {
					$GLOBALS['SortedField'.$name.'Class'] = '';
				}
			}
			$GLOBALS['SortLinks'.$name] = $sortLinks;
		}
	}

	function RewriteIncomingRequest()
	{
		// Using path info
		if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== '' && basename($_SERVER['PATH_INFO']) != 'index.php') {
			$path = $_SERVER['PATH_INFO'];
			if (isset($_SERVER['SCRIPT_NAME'])) {
				$uriTest = str_ireplace($_SERVER['SCRIPT_NAME'], "", $path);
				if($uriTest != '') {
					$uri = $uriTest;
				}
			} else if (isset($_SERVER['SCRIPT_FILENAME'])) {
				$file = str_ireplace(ISC_BASE_PATH, "", $_SERVER['SCRIPT_FILENAME']);
				$uriTest = str_ireplace($file, "", $path);
				if($uriTest != '') {
					$uri = $uriTest;
				}
			}
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/index.php/";
		}
		// Using HTTP_X_REWRITE_URL for ISAPI_Rewrite on IIS based servers
		if(isset($_SERVER['HTTP_X_REWRITE_URL']) && !isset($uri)) {
			$uri = $_SERVER['HTTP_X_REWRITE_URL'];
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/";
		}
		// Using REQUEST_URI
		if (isset($_SERVER['REQUEST_URI']) && !isset($uri)) {
			$uri = $_SERVER['REQUEST_URI'];
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/";
		}
		// Using SCRIPT URL
		if (isset($_SERVER['SCRIPT_URL']) && !isset($uri)) {
			$uri = $_SERVER['SCRIPT_URL'];
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/";
		}
		// Using REDIRECT_URL
		if (isset($_SERVER['REDIRECT_URL']) && !isset($uri)) {
			$uri = $_SERVER['REDIRECT_URL'];
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/";
		}
		// Using REDIRECT URI
		if (isset($_SERVER['REDIRECT_URI']) && !isset($uri)) {
			$uri = $_SERVER['REDIRECT_URI'];
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/";
		}
		// Using query string?
		if (isset($_SERVER['QUERY_STRING']) && !isset($uri)) {
			$uri = $_SERVER['QUERY_STRING'];
			$GLOBALS['UrlRewriteBase'] = $GLOBALS['ShopPath'] . "/?";
			$_SERVER['QUERY_STRING'] = preg_replace("#(.*?)\?#", "", $_SERVER['QUERY_STRING']);
		}

		if (isset($_SERVER['REDIRECT_QUERY_STRING'])) {
			$_SERVER['QUERY_STRING'] = $_SERVER['REDIRECT_QUERY_STRING'];
		}

		if(!isset($uri)) {
			$uri = '';
		}

		$appPath = preg_quote(trim($GLOBALS['AppPath'], "/"), "#");
		$uri = trim($uri, "/");
		$uri = trim(preg_replace("#".$appPath."#i", "", $uri,1), "/");

		// Strip off anything after a ? in case we've got the query string too
		$uri = preg_replace("#\?(.*)#", "", $uri);

		$GLOBALS['PathInfo'] = explode("/", $uri);

		if(strtolower($GLOBALS['PathInfo'][0]) == "index.php") {
			$GLOBALS['PathInfo'][0] = '';
		}

		if (!isset($GLOBALS['PathInfo'][0]) || !$GLOBALS['PathInfo'][0]) {
			$GLOBALS['PathInfo'][0] = "index";
		}

		if(!isset($GLOBALS['RewriteRules'][$GLOBALS['PathInfo'][0]])) {
			$GLOBALS['PathInfo'][0] = "404";
		}

		$handler = $GLOBALS['RewriteRules'][$GLOBALS['PathInfo'][0]];
		$script = $handler['class'];
		$className = $handler['name'];
		$globalName = $handler['global'];

		$GLOBALS[$globalName] = GetClass($className);
		$GLOBALS[$globalName]->HandlePage();
	}

	/**
	 * Get the email class to send a message. Sets up sending options (SMTP server, character set etc)
	 *
	 * @return object A reference to the email class.
	 */
	function GetEmailClass()
	{
		require_once(ISC_BASE_PATH . "/lib/email.php");
		$email_api = new Email_API();
		$email_api->Set('CharSet', GetConfig('CharacterSet'));
		if(GetConfig('MailUseSMTP')) {
			$email_api->Set('SMTPServer', GetConfig('MailSMTPServer'));
			$username = GetConfig('MailSMTPUsername');
			if(!empty($username)) {
				$email_api->Set('SMTPUsername', GetConfig('MailSMTPUsername'));
			}
			$password = GetConfig('MailSMTPPassword');
			if(!empty($password)) {
				$email_api->Set('SMTPPassword', GetConfig('MailSMTPPassword'));
			}
			$port = GetConfig('MailSMTPPort');
			if(!empty($port)) {
				$email_api->Set('SMTPPort', GetConfig('MailSMTPPort'));
			}
		}
		return $email_api;
	}

	/**
	 * Get the current location of the current visitor.
	 *
	 * @return string The current location.
	 */
	function GetCurrentLocation()
	{
		if(isset($_SERVER['REQUEST_URI'])) {
			$location = $_SERVER['REQUEST_URI'];
		}
		else if(isset($_SERVER['PATH_INFO'])) {
			$location = $_SERVER['PATH_INFO'];
		}
		else if(isset($_ENV['PATH_INFO'])) {
			$location = $_ENV['PATH_INFO'];
		}
		else if(isset($_ENV['PHP_SELF'])) {
			$location = $_ENV['PHP_SELF'];
		}
		else {
			$location = $_SERVER['PHP_SELF'];
		}

		if(isset($_SERVER['QUERY_STRING'])) {
			$location .= '?'.$_SERVER['QUERY_STRING'];
		}
		else if(isset($_ENV['QUERY_STRING'])) {
			$location .= '?'.$_ENV['QUERY_STRING'];
		}

		return $location;
	}

	/**
	 * Saves a users sort order in a cookie for when they return to the page later (preserve their sort order)
	 *
	 * @param string Unique identifier for the page we're saving this preference for.
	 * @param string The field we're sorting by.
	 * @param string The order we're sorting in.
	 */
	function SaveDefaultSortField($section, $field, $order)
	{
		ISC_SetCookie("SORTING_PREFS[".$section."]", serialize(array($field, $order)));
	}

	/**
	 * Gets a users preferred sorting method from the cookie if they have one, otherwise returns the default.
	 *
	 * @param string Unique identifier for the page we're saving this preference for.
	 * @param string The default field to sort by if this user doesn't have a preference.
	 * @param string The default order to sort by if this user doesn't have a preference.
	 * @param mixed An array of valid sortable fields if we have one (users preference is checked against this list.
	 * @return array Array with index 0 = field, 1 = direction.
	 */
	function GetDefaultSortField($section, $default, $defaultOrder, $validFields=array())
	{
		if (isset($_COOKIE['SORTING_PREFS'][$section])) {
			$field = $_COOKIE['SORTING_PREFS'][$section];
			if (count($validFields) == 0 || in_array($field, $validFields)) {
				return unserialize($field);
			}
			else {
			}
		}
		return array($default, $defaultOrder);
	}

	/**
	 * Fetch any related products for a particular product.
	 *
	 * @param int The product ID to fetch related products for.
	 * @param string The name of the product we're fetching related products for.
	 * @param string The list of related products for this product.
	 * @return string CSV list of related products.
	 */
	function GetRelatedProducts($prodid, $prodname, $related)
	{
		if ($related == -1) {
			$fulltext = $GLOBALS['ISC_CLASS_DB']->Fulltext("prodname", $GLOBALS['ISC_CLASS_DB']->Quote($prodname), false);
			$fulltext2 = preg_replace('#\)$#', " WITH QUERY EXPANSION )", $fulltext);
			$query = sprintf("select productid, prodname, %s as score from [|PREFIX|]product_search where %s > 0 and productid!='%d' order by score desc", $fulltext, $fulltext2, $GLOBALS['ISC_CLASS_DB']->Quote($prodid));
			$query .= $GLOBALS['ISC_CLASS_DB']->AddLimit(0, 5);
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$productids = array();
			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$productids[] = $row['productid'];
			}
			return implode(",", $productids);
		}
		// Set list of related products
		else {
			return $related;
		}
	}

	function FetchHeaderLogo()
	{
		if (GetConfig('LogoType') == "text") {
			if(GetConfig('UseAlternateTitle')) {
				$text = GetConfig('AlternateTitle');
			}
			else {
				$text = GetConfig('StoreName');
			}
			$text = isc_html_escape($text);
			$text = explode(" ", $text, 2);
			$text[0] = "<span class=\"Logo1stWord\">".$text[0]."</span>";
			$GLOBALS['LogoText'] = implode(" ", $text);
			$output = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("LogoText");
		}
		else {
			$output = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("LogoImage");
		}

		return $output;
	}

	/**
	* Copies a backup config over the place over the main config. Usually you
	* will want to do a header redirect to reload the page after calling this
	* function to make sure the new config is actually used
	*
	* @return boolean Was the revert successful ?
	*/
	function RevertToBackupConfig()
	{
		if (!defined('ISC_CONFIG_FILE') || !defined('ISC_CONFIG_BACKUP_FILE')) {
			die("Config sanity check failed");
		}

		if (!file_exists(ISC_CONFIG_BACKUP_FILE)) {
			return false;
		}

		if (!file_exists(ISC_CONFIG_FILE)) {
			return false;
		}

		return @copy(ISC_CONFIG_BACKUP_FILE, ISC_CONFIG_FILE);

	}

	/**
	* IsCheckingOut
	* Are we in the checkout process?
	*
	* @return Void
	*/
	function IsCheckingOut()
	{
		if ((isset($_REQUEST['checking_out']) && $_REQUEST['checking_out'] == "yes") || (isset($_REQUEST['from']) && is_numeric(strpos($_REQUEST['from'], "checkout.php")))) {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	* Chmod a file after setting the umask to 0 and then returning the umask after
	*
	* @param string $file The path to the file to chmod
	* @param string $mode The octal mode to chmod it to
	*
	* @return boolean Did it succeed ?
	*/
	function isc_chmod($file, $mode)
	{
		if (DIRECTORY_SEPARATOR!=='/') {
			return true;
		}

		if (is_string($mode)) {
			$mode = octdec($mode);
		}

		$old_umask = umask();
		umask(0);
		$result = @chmod($file, $mode);
		umask($old_umask);
		return $result;
	}

	/**
	* Internal Interspire Shopping Cart replacement for the PHP date() function. Applies our timezone setting.
	*
	* @param string The format of the date to generate (See PHP date() reference)
	* @param int The Unix timestamp to generate the presentable date for.
	* @param float Optional timezone offset to use for this stamp. If null, uses system default.
	*/
	function isc_date($format, $timeStamp=null, $timeZoneOffset=null)
	{
		if($timeStamp === null) {
			$timeStamp = time();
		}

		$dstCorrection = 0;
		if($timeZoneOffset === null) {
			$timeZoneOffset = GetConfig('StoreTimeZone');
			$dstCorrection = GetConfig('StoreDSTCorrection');
		}

		// If DST settings are enabled, add an additional hour to the timezone
		if($dstCorrection == 1) {
			++$timeZoneOffset;
		}

		return gmdate($format, $timeStamp + ($timeZoneOffset * 3600));
	}

	/**
	* Internal Interspire Shopping Cart replacement for the PHP mktime() fnction. Applies our timezone setting.
	*
	* @see mktime()
	* @return int Unix timestamp
	*/
	function isc_mktime()
	{
		$args = func_get_args();
		$result = call_user_func_array("mktime", $args);
		if($result) {
			$timeZoneOffset = GetConfig('StoreTimeZone');
			$dstCorrection = GetConfig('StoreDSTCorrection');

			// If DST settings are enabled, add an additional hour to the timezone
			if($dstCorrection == 1) {
				++$timeZoneOffset;
			}
			$result +=  $timeZoneOffset * 3600;
		}
		return $result;
	}

	/**
	 * Set a "flash" message to be shown on the next page a user visits.
	 *
	 * @param string The message to be shown to the user.
	 * @param string The type of message to be shown (info, success, error)
	 * @param string The url to redirect to to show the message
	 */
	function FlashMessage($message, $type, $url = '')
	{
		if(!isset($_SESSION['FLASH_MESSAGES'])) {
			$_SESSION['FLASH_MESSAGES'] = array();
		}

		$_SESSION['FLASH_MESSAGES'][] = array(
			"message" => $message,
			"type" => $type
		);

		if (!empty($url)) {
			header('Location: '.$url);
			exit;
		}
	}

	/**
	 * Retrieve a flash message (if we have one) and reset the value back to nothing.
	 *
	 * @return mixed Array about the flash message if there is one, false if not.
	 */
	function GetFlashMessages()
	{
		if(!isset($_SESSION['FLASH_MESSAGES'])) {
			return array();
		}

		$messages = array();

		foreach($_SESSION['FLASH_MESSAGES'] as $message) {
			if(!defined('ISC_ADMIN_CP')) {
				if($message['type'] == MSG_ERROR) {
					$class = "ErrorMessage";
				}
				else if($message['type'] == MSG_SUCCESS) {
					$class = "SuccessMessage";
				}
				else {
					$class = "InfoMessage";
				}
			}
			else {
				if($message['type'] == MSG_ERROR) {
					$class = "MessageBoxError";
				}
				else if($message['type'] == MSG_SUCCESS) {
					$class = "MessageBoxSuccess";
				}
				else {
					$class = "MessageBoxInfo";
				}
			}
			$messages[] = array(
				"message" => $message['message'],
				"type" => $message['type'],
				"class" => $class
			);
		}
		unset($_SESSION['FLASH_MESSAGES']);
		return $messages;
	}

	/**
	 * Retrieve pre-built message boxes for all of the current flash messages.
	 *
	 * @return string The built message boxes.
	 */
	function GetFlashMessageBoxes()
	{
		$flashMessages = GetFlashMessages();
		$messageBoxes = '';
		if(is_array($flashMessages)) {
			foreach($flashMessages as $flashMessage) {
			 $messageBoxes .= MessageBox($flashMessage['message'], $flashMessage['type']);
			}
		}
		return $messageBoxes;
	}

	/**
	 * Fetch the IP address of the current visitor.
	 *
	 * @return string The IP address.
	 */
	function GetIP()
	{
		static $ip;
		if($ip) {
			return $ip;
		}

		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			if(preg_match_all("#[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}#s", $_SERVER['HTTP_X_FORWARDED_FOR'], $addresses)) {
				foreach($addresses[0] as $key => $val) {
					if(!preg_match("#^(10|172\.16|192\.168)\.#", $val)) {
						$ip = $val;
						break;
					}
				}
			}
		}

		if(!isset($ip)) {
			if(isset($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
			else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
		}
		$ip = preg_replace("#([^.0-9 ]*)#", "", $ip);
		return $ip;
	}

	function ClearTmpLogoImages()
	{
		$previewDir = ISC_BASE_PATH.'/cache/logos';
		if ($handle = @opendir($previewDir)) {
			/* This is the correct way to loop over the directory. */
			while (false !== ($file = readdir($handle))) {
				if(substr($file, 0, 4) == 'tmp_') {
					@unlink($previewDir . $file);
				}
			}
			@closedir($handle);
		}
	}

	/**
    * Returns a string with text that has been run through htmlspecialchars() with the appropriate options
    * for untrusted text to display
    *
    * @param string $text the string to escape
    *
    * @return string The escaped string
    */
	function isc_html_escape($text)
	{
        return htmlspecialchars($text, ENT_QUOTES, GetConfig('CharacterSet'));
    }

	/**
	* Behaves like the unix which command
	* It checks the path in order for which version of $binary to run
	*
	* @param string $binary The name of a binary
	*
	* @return string The full path to the binary or an empty string if it couldn't be found
	*/
	function Which($binary)
	{
		// If the binary has the / or \ in it then skip it
		if (strpos($binary, DIRECTORY_SEPARATOR) !== false) {
			return '';
		}
		$path = null;

		if (ini_get('safe_mode') ) {
			// if safe mode is on the path is in the ini setting safe_mode_exec_dir
			$_SERVER['safe_mode_path'] = ini_get('safe_mode_exec_dir');
			$path = 'safe_mode_path';
		} else if (isset($_SERVER['PATH']) && $_SERVER['PATH'] != '') {
			// On unix the env var is PATH
			$path = 'PATH';
		} else if (isset($_SERVER['Path']) && $_SERVER['Path'] != '') {
			// On windows under IIS the env var is Path
			$path = 'Path';
		}

		// If we don't have a path to search we can't find the binary
		if ($path === null) {
			return '';
		}

		$dirs_to_check = preg_split('#'.preg_quote(PATH_SEPARATOR,'#').'#', $_SERVER[$path], -1, PREG_SPLIT_NO_EMPTY);

		$open_basedirs = preg_split('#'.preg_quote(PATH_SEPARATOR, '#').'#', ini_get('open_basedir'), -1, PREG_SPLIT_NO_EMPTY);


		foreach ($dirs_to_check as $dir) {
			if (substr($dir, -1) == DIRECTORY_SEPARATOR) {
				$dir = substr($dir, 0, -1);
			}
			$can_check = true;
			if (!empty($open_basedirs)) {
				$can_check = false;
				foreach ($open_basedirs as $restricted_dir) {
					if (trim($restricted_dir) === '') {
						continue;
					}
					if (strpos($dir, $restricted_dir) === 0) {
						$can_check = true;
					}
				}
			}

			if ($can_check && is_dir($dir) && (is_file($dir.DIRECTORY_SEPARATOR.$binary) || is_link($dir.DIRECTORY_SEPARATOR.$binary))) {
				return $dir.DIRECTORY_SEPARATOR.$binary;
			}
		}
		return '';
	}

	/**
	 * Set the memory limit to handle image file
	 *
	 * Function will set the memory limit to handle image file if memory limit is insufficient
	 *
	 * @access public
	 * @param string $imgFile The full file path of the image
	 * @return void
	 */
	function setImageFileMemLimit($imgFile)
	{
		if (!function_exists('memory_get_usage') || !function_exists('getimagesize') || !file_exists($imgFile) || !($attribs = getimagesize($imgFile))) {
			return;
		}

		$width = $attribs[0];
		$height = $attribs[1];

		// Check if we have enough available memory to create this image - if we don't, attempt to bump it up
		$memoryLimit = @ini_get('memory_limit');
		if($memoryLimit && $memoryLimit != -1) {
			$limit = preg_match('#^([0-9]+)\s?([kmg])b?$#i', trim(strtolower($memoryLimit)), $matches);
			$memoryLimit = 0;
			if($matches[1] && $matches[2]) {
				switch($matches[2]) {
					case "k":
						$memoryLimit = $matches[1] * 1024;
						break;
					case "m":
						$memoryLimit = $matches[1] * 1048576;
						break;
					case "g":
						$memoryLimit = $matches[1] * 1073741824;
				}
			}
			$currentMemoryUsage = memory_get_usage();
			$freeMemory = $memoryLimit - $currentMemoryUsage;
			if(!isset($attribs['channels'])) {
				$attribs['channels'] = 1;
			}
			$thumbMemory = round(($width * $height * $attribs['bits'] * $attribs['channels'] / 8) * 5);
			$thumbMemory += 2097152;
			if($thumbMemory > $freeMemory) {
				@ini_set("memory_limit", $memoryLimit+$thumbMemory);
			}
		}
	}

?>
