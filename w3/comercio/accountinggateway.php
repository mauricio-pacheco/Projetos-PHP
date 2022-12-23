<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_ACCOUNTING_GATEWAY'] = GetClass('ISC_ACCOUNTING_GATEWAY');
	$GLOBALS['ISC_CLASS_ACCOUNTING_GATEWAY']->HandlePage();
?>
