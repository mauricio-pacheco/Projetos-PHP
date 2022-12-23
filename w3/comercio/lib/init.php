<?php
	/**
	 * Run stripslashes on every value of a multidimension array
	 *
	 * @param mixed $value The variable to run stripslashes on
	 * @return mixed
	 **/
	function stripslashes_deep($value)
	{
		if (is_array($value)) {
			$value = array_map('stripslashes_deep', $value);
		} else {
			$value = stripslashes($value);
		}

		return $value;
	}

	// Development environment checks
	if(!defined('ISC_AJAX')) {
		// If the textmate integration environment variable exists, integrate
		if(isset($_SERVER['TEXTMATE_INTEGRATION']) && $_SERVER['HTTP_HOST'] == 'localhost') {
			define('TEXTMATE_ERRORS', 1);
			@include_once '/Applications/TextMate.app/Contents/SharedSupport/Bundles/PHP.tmbundle/Support/textmate.php';
		}
	}

	error_reporting(E_ALL);
	ini_set("track_errors","1");
	@set_time_limit(0);
	@ob_start();
	ini_set("magic_quotes_runtime", "off");
	
	// If the PHP timezone function exists, set the default to GMT so calls to date()
	// will return the GMT time. Our date functions then apply the store timezone on top
	// of this
	if(function_exists('date_default_timezone_set')) {
		date_default_timezone_set('GMT');
	}

	// If magic_quotes_gpc is on, strip all the slashes it added. By doing
	// this we can be sure that all the gpc vars never have slashes and so
	// we will always need to treat them the same way
	if (get_magic_quotes_gpc()) {
		$_POST		= stripslashes_deep($_POST);
		$_GET		= stripslashes_deep($_GET);
		$_COOKIE	= stripslashes_deep($_COOKIE);
		$_REQUEST	= stripslashes_deep($_REQUEST);
	}
	// The absolute filesystem root to Interspire Shopping Cart
	
	// We fetch the real path to index.php in the main directory and then dirname() it
	// due to a strange bug on some Windows based servers where simply resolving up a directory
	// returns false for realpath().
	define('ISC_BASE_PATH', dirname(realpath(dirname(__FILE__).'/../index.php')));

	define('ISC_CONFIG_FILE', ISC_BASE_PATH.'/config/config.php');
	define('ISC_CONFIG_BACKUP_FILE', ISC_BASE_PATH.'/config/config.backup.php');
	define('ISC_CONFIG_DEFAULT_FILE', ISC_BASE_PATH.'/config/config.default.php');

	// The minimum version of PHP required to run Interspire Shopping Cart
	define("PHP_VERSION_REQUIRED", "5.0.0");

	// The minimum version of MySQL required to run Interspire Shopping Cart
	define("MYSQL_VERSION_REQUIRED", "4.1.0");

	// What version are we running?
	define('PRODUCT_ID', 'ISC');
	define('PRODUCT_VERSION', '3.6.3');
	define('PRODUCT_VERSION_CODE', 3603);

	define("ISC_SMALL_PRINT", 1);
	define("ISC_MEDIUMPRINT", 2);
	define("ISC_XMEDIUMPRINT", 4);
	define("ISC_LARGEPRINT", 8);
	define("ISC_HUGEPRINT", 16);

	define('ORDER_STATUS_INCOMPLETE', 0);
	define('ORDER_STATUS_PENDING', 1);
	define('ORDER_STATUS_SHIPPED', 2);
	define('ORDER_STATUS_PARTIALLY_SHIPPED', 3);
	define('ORDER_STATUS_REFUNDED', 4);
	define('ORDER_STATUS_CANCELLED', 5);
	define('ORDER_STATUS_DECLINED', 6);
	define('ORDER_STATUS_AWAITING_PAYMENT', 7);
	define('ORDER_STATUS_AWAITING_PICKUP', 8);
	define('ORDER_STATUS_AWAITING_SHIPMENT', 9);
	define('ORDER_STATUS_COMPLETED', 10);
	define('ORDER_STATUS_AWAITING_FULFILLMENT', 11);

	// These permissions should be used to chmod a file or directory as writeable in all cases EXCEPT for
	// displaying permission errors at the start of an install or upgrade
	define('ISC_WRITEABLE_FILE_PERM', fileperms(ISC_CONFIG_FILE));
	define('ISC_WRITEABLE_DIR_PERM', fileperms(dirname(ISC_CONFIG_FILE)));

	define('ISC_SAFEMODE', (bool) ini_get('safe_mode'));

	if (version_compare(PHP_VERSION, PHP_VERSION_REQUIRED, '<')) {
		die("<h1>PHP ".PHP_VERSION_REQUIRED." or higher is required to run Interspire Shopping Cart.</h1>");
	}

	require(ISC_BASE_PATH.'/lib/general.php');
	require(ISC_BASE_PATH.'/lib/pricing.php');
	require(ISC_BASE_PATH.'/lib/multibyte.php');

	require(ISC_CONFIG_DEFAULT_FILE);
	require(ISC_CONFIG_FILE);

	// Temporary measure to allow people to upgrade from 1.3 -> 1.4 without having to
	// manually move their config file. Scheduled to be removed in 2.0.
	if (file_exists(ISC_BASE_PATH.'/admin/includes/config.php')) {
		require(ISC_BASE_PATH.'/admin/includes/config.php');
	}

	// Temporary measure to allow people to upgrade from 2.0 -> 2.5 without having to
	// manually edit their config file.
	if (isset($GLOBALS['isSetup']) && $GLOBALS['isSetup']) {
		$GLOBALS['ISC_CFG']['serverStamp'] = $GLOBALS['serverStamp'];

		$GLOBALS['ISC_CLASS_ADMIN_SETTINGS'] = GetClass('ISC_ADMIN_SETTINGS');

		include_once(ISC_BASE_PATH.'/lib/templates/template.php');
		$GLOBALS['ISC_CLASS_TEMPLATE'] = new TEMPLATE("ISC_LANG");
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplateBase(ISC_BASE_PATH . "/admin/templates");
		$GLOBALS['ISC_CLASS_TEMPLATE']->templateExt = "tpl";

		foreach ($GLOBALS['ISC_CLASS_ADMIN_SETTINGS']->all_vars as $var) {
			if (isset($GLOBALS[$var])) {
				if(is_array($GLOBALS[$var])) {
					foreach($GLOBALS[$var] as $k => $v) {
						$GLOALS[$var][$k] = html_entity_decode($v, ENT_QUOTES);
					}
				}
				else {
					$GLOBALS['ISC_NEW_CFG'][$var] = html_entity_decode($GLOBALS[$var], ENT_QUOTES);
				}
			}
		}
		if ($GLOBALS['ISC_CLASS_ADMIN_SETTINGS']->CommitSettings()) {
			header('Location: '.GetConfig('ShopPath'));
		} else {
			die("Please ensure your config/config.php file is writeable.");
		}
	}

	require(ISC_BASE_PATH . '/lib/database/mysql.php');
	// Set the character encoding to use
	STSSetEncoding(GetConfig('CharacterSet'));

	// Connect to the database - MySQL or PostgreSQL
	if (GetConfig('isSetup')) {
		$db_type = 'MySQLDb';
		$db = new $db_type();
		
		if(isset($GLOBALS['Debug']) && $GLOBALS['Debug'] == 1) {
			if(defined('ISC_ADMIN_CP')) {
				$logFile = 'admin-';
			}
			else {
				$logFile = 'front-';
			}
			$logFile .= gmdate('Y-m-d-H');
			
			$db->QueryLog = ISC_BASE_PATH.'/logs/'.$logFile.'.queries.txt';
			$db->TimeLog = ISC_BASE_PATH.'/logs/'.$logFile.'.query-time.txt';
			$db->ErrorLog = ISC_BASE_PATH.'/logs/'.$logFile.'.errors.txt';
		}

		$connection = $db->Connect(GetConfig("dbServer"), GetConfig("dbUser"), GetConfig("dbPass"), GetConfig("dbDatabase"));

		$db->TablePrefix = GetConfig("tablePrefix");

		if (!$connection) {
			list($error, $level) = $db->GetError();
			// If we're in the control panel, we can show the actual message
			if(defined("ISC_ADMIN_CP")) {
				$error = str_replace(GetConfig('dbServer'), "[database server]", $error);
				$error = str_replace(GetConfig('dbUser'), "[database user]", $error);
				$error = str_replace(GetConfig('dbPass'), "[database pass]", $error);
				$error = str_replace(GetConfig('dbDatabase'), "[database]", $error);

				echo "<strong>Unable to connect to database: </strong>".$error;
				exit;
			}
			else {
				$GLOBALS['ShowStoreUnavailable'] = 1;
			}
		}

		$GLOBALS['StoreName'] = isc_html_escape(GetConfig('StoreName'));

		$public_config_vars = array (
			'AppPath',
			'SiteColor',
			'template',
			'StoreLogo',
			'DownloadDirectory',
			'ImageDirectory',
		);

		foreach ($public_config_vars as $var) {
			$GLOBALS[$var] = GetConfig($var);
		}

		$GLOBALS['ThousandsToken'] = str_replace("'", '&apos;', GetConfig('ThousandsToken'));
		$GLOBALS['DecimalToken'] = str_replace("'", '&apos;', GetConfig('DecimalToken'));
		$GLOBALS['DimensionsThousandsToken'] = str_replace("'", '&apos;', GetConfig('DimensionsThousandsToken'));
		$GLOBALS['DimensionsDecimalToken'] = str_replace("'", '&apos;', GetConfig('DimensionsDecimalToken'));

		// Create a reference to the database object
		$GLOBALS['ISC_CLASS_DB'] = &$db;

		if(GetConfig('dbEncoding') != '') {
			$GLOBALS['ISC_CLASS_DB']->Query("SET NAMES ".GetConfig('dbEncoding'));
		}

		// If debug mode (control panel enabled) is set up, tell the DB class to spit
		// out any queries at the bottom of the page
		if(GetConfig('DebugMode') && isset($_REQUEST['debug'])) {
			$GLOBALS['ISC_CLASS_DB']->StoreQueryList = true;
		}

		//Initialize the data store system
		require_once ISC_BASE_PATH."/lib/class.datastore.php";
		$GLOBALS['ISC_CLASS_DATA_STORE'] = new ISC_DATA_STORE();
	}