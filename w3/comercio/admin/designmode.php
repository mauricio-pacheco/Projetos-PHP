<?php

	include(dirname(__FILE__)."/init.php");

	// Include the Admin authorisation class
	$GLOBALS['ISC_CLASS_ADMIN_AUTH'] = GetClass('ISC_ADMIN_AUTH');
	if(!$GLOBALS['ISC_CLASS_ADMIN_AUTH']->IsLoggedIn() || !$GLOBALS['ISC_CLASS_ADMIN_AUTH']->HasPermission(AUTH_Design_Mode)) {
		exit;
	}

	$GLOBALS['ISC_CLASS_ADMIN_DESIGNMODE'] = GetClass('ISC_ADMIN_DESIGNMODE');
	$GLOBALS['ISC_CLASS_ADMIN_DESIGNMODE']->HandleToDo();

?>
