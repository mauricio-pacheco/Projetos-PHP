<?php
	require_once(dirname(__FILE__).'/lib/init.php');
	require_once(ISC_BASE_PATH . "/admin/includes/whitelabel.php");

	define("ISC_START_TIME", microtime_float());
	require_once(ISC_BASE_PATH . "/lib/orders.php");
	require_once(ISC_BASE_PATH . "/lib/shipping.php");
	require_once(ISC_BASE_PATH . "/lib/notification.php");
	require_once(ISC_BASE_PATH . "/lib/analytics.php");
	require_once(ISC_BASE_PATH . "/lib/checkout.php");
	require_once(ISC_BASE_PATH . "/lib/currency.php");
	require_once(ISC_BASE_PATH . "/lib/ssl.php");
	require_once(ISC_BASE_PATH . "/lib/tree.php");
	require_once(ISC_BASE_PATH . "/lib/xml.php");
	require_once(ISC_BASE_PATH . "/lib/class.log.php");
	require_once(ISC_BASE_PATH . "/lib/templates/template.php");
	require_once(ISC_BASE_PATH . "/lib/templates/panel.php");

	require_once(ISC_BASE_PATH . "/includes/classes/class.session.php");

	if(isc_substr(GetConfig('ShopPath'), -1) == '/') {
		$GLOBALS['ShopPath'] = isc_substr(GetConfig('ShopPath'), 0, -1);
	}

	define("APP_ROOT", dirname(__FILE__));
	define("PT_PHYSICAL", 1);
	define("PT_DIGITAL", 2);
	define("PT_GIFTCERTIFICATE", 3);

	define("MSG_ERROR", 0);
	define("MSG_SUCCESS", 1);
	define("MSG_INFO", 2);

	define("SEARCH_SIMPLE", 0);
	define("SEARCH_ADVANCED", 1);

	define("GIFT_CERTIFICATE_LENGTH", 15);

	if (GetConfig('isSetup') === false) {
		if (file_exists(ISC_CONFIG_BACKUP_FILE)) {
			if(RevertToBackupConfig()) {
				header("Location: ".$_SERVER['PHP_SELF']);
			}
			else {
				echo "Your <strong>config/config.php</strong> file is not writeable and cannot be restored to a previously backed up version. Please change the file permissions of this file so that it is writeable (CHMOD 757, 777 etc)";
				exit;
			}
		} else {
			header("Location: admin/");
			die();
		}
	} else {
		header("Content-Type: text/html; charset=" . GetConfig('CharacterSet'));
	}

	$GLOBALS['PathInfo'] = array();
	$GLOBALS['RewriteRules'] = array(
		"index" => array(
			"class" => "class.index.php",
			"name" => "ISC_INDEX",
			"global" => "ISC_CLASS_INDEX"
		),
		"products" => array(
			"class" => "class.product.php",
			"name" => "ISC_PRODUCT",
			"global" => "ISC_CLASS_PRODUCT"
		),
		"pages" => array(
			"class" => "class.page.php",
			"name" => "ISC_PAGE",
			"global" => "ISC_CLASS_PAGE"
		),
		"categories" => array(
			"class" => "class.category.php",
			"name" => "ISC_CATEGORY",
			"global" => "ISC_CLASS_CATEGORY"
		),
		"brands" => array(
			"class" => "class.brands.php",
			"name" => "ISC_BRANDS",
			"global" => "ISC_CLASS_BRANDS"
		),
		"price" => array(
			"class" => "class.price.php",
			"name" => "ISC_PRICE",
			"global" => "ISC_CLASS_PRICE"
		),
		"news" => array(
			"class" => "class.news.php",
			"name" => "ISC_NEWS",
			"global" => "ISC_CLASS_NEWS"
		),
		"compare" => array(
			"class" => "class.compare.php",
			"name" => "ISC_COMPARE",
			"global" => "ISC_CLASS_COMPARE"
		),
		"404" => array(
			"class" => "class.404.php",
			"name" => "ISC_404",
			"global" => "ISC_CLASS_404"
		)
	);

	$GLOBALS['RewriteURLBase'] = '';

	// Define the year as a global variable
	$GLOBALS['Year'] = isc_date("Y");

	// Initialise our session
	$GLOBALS['ISC_CLASS_SESSION'] = new ISC_SESSION();

	// Are SEO urls automatically enabled?
	$GLOBALS['EnableSEOUrls'] = GetConfig('EnableSEOUrls');
	if(GetConfig('EnableSEOUrls') == 2) {
		if(isset($_SERVER['SEO_SUPPORT']) && $_SERVER['SEO_SUPPORT'] == 1) {
			$GLOBALS['EnableSEOUrls'] = 1;
		} elseif (isset($_SERVER["HTTP_X_REWRITE_URL"]) && !empty($_SERVER["HTTP_X_REWRITE_URL"])) {
			$GLOBALS['EnableSEOUrls'] = 1;
		} else {
			$GLOBALS['EnableSEOUrls'] = 0;
		}
	}

	// Is purchasing disabled in the store?
	if(!GetConfig("AllowPurchasing")) {
		$GLOBALS['HidePurchasingOptions'] = "none";
	}

	// Are prices disabled in the store?
	if(!GetConfig("ShowProductPrice")) {
		$GLOBALS['HideCartOptions'] = "none";
	}

	// Is the wishlist disabled in the store?
	if(!GetConfig("EnableWishlist")) {
		$GLOBALS['HideWishlist'] = "none";
	}

	// Is account creation disabled in the store?
	if(!GetConfig("EnableAccountCreation")) {
		$GLOBALS['HideAccountOptions'] = "none";
	}

	// Setup SSL options and links
	SetupSSLOptions();

	if(GetConfig('dbEncoding') != '') {
		$GLOBALS['ISC_CLASS_DB']->Query("SET NAMES ".GetConfig('dbEncoding'));
	}

	// Setup our currency. If we don't have one in our session then get/set our currency based on our geoIP location
	SetupCurrency();

	// Do we need to show the cart contents side box at all?
	if(!isset($_SESSION['CART']['ITEMS']) || count($_SESSION['CART']['ITEMS']) == 0) {
		$GLOBALS['HidePanels'][] = "SideCartContents";
	}

	// Initialise the logging system
	$GLOBALS['ISC_CLASS_LOG'] = new ISC_LOG();
	set_error_handler(array($GLOBALS['ISC_CLASS_LOG'], 'HandlePHPErrors'));

	// Include the template's config file
	if (GetConfig('isSetup')) {
		require_once(ISC_BASE_PATH . "/templates/" . GetConfig('template') . "/config.php");
	}

	$GLOBALS['TPL_PATH'] = GetConfig("ShopPath") . "/" . "templates" . "/" . GetConfig("template");
	$GLOBALS['ISC_CLASS_TEMPLATE'] = new TEMPLATE("ISC_LANG");
	$GLOBALS['ISC_CLASS_TEMPLATE']->FrontEnd();
	$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplateBase(ISC_BASE_PATH . "/templates");
	$GLOBALS['ISC_CLASS_TEMPLATE']->panelPHPDir = ISC_BASE_PATH . "/includes/display/";
	$GLOBALS['ISC_CLASS_TEMPLATE']->templateExt = "html";
	$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate(GetConfig("template"));

	$GLOBALS['ISC_CLASS_VISITOR'] = GetClass('ISC_VISITOR');

	if(isset($GLOBALS['ShowStoreUnavailable'])) {
		$GLOBALS['ErrorMessage'] = GetLang('StoreUnavailable');
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("error");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
		exit;
	}

	// Set the default page title
	$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle(GetConfig('StoreName'));

	// Get the number of items in the cart if any
	if(isset($_SESSION['CART']['NUM_ITEMS'])) {
		$num_items = $_SESSION['CART']['NUM_ITEMS'];
		foreach($_SESSION['CART']['ITEMS'] as $item) {
			$GLOBALS['CartQuantity'.$item['product_id']] = $item['quantity'];
		}
		if ($num_items == 1) {
			$GLOBALS['CartItems'] = GetLang('OneItem');
		} else if ($num_items > 1) {
			$GLOBALS['CartItems'] = sprintf(GetLang('XItems'), $num_items);
		} else {
			$GLOBALS['CartItems'] = '';
		}
	}
?>
