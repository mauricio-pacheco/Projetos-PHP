<?php

	include(dirname(__FILE__)."/init.php");
	include(dirname(__FILE__) . "/includes/classes/class.compare.php");
	$GLOBALS['ISC_CLASS_COMPARE'] = GetClass('ISC_COMPARE');
	$GLOBALS['ISC_CLASS_COMPARE']->HandlePage();

?>
