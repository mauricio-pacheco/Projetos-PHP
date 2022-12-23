<?php
	define('ISC_AJAX', 1);
	include(dirname(__FILE__)."/init.php");
	if ($GLOBALS['ISC_CLASS_ADMIN_AUTH']->IsLoggedIn()) {

		$className = 'ISC_ADMIN_REMOTE';
		if (array_key_exists('remoteSection', $_REQUEST) && trim($_REQUEST['remoteSection']) !== '') {
			$className .= '_' . isc_strtoupper(trim($_REQUEST['remoteSection']));
		}

		$GLOBALS['ISC_CLASS_ADMIN_REMOTE'] = GetClass($className);
		$GLOBALS['ISC_CLASS_ADMIN_REMOTE']->HandleToDo();
	}
?>
