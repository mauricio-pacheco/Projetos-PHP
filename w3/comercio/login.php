<?php

	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');
	$GLOBALS["ISC_CLASS_CUSTOMER"]->HandlePage();

?>
