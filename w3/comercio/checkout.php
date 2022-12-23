<?php

	include(dirname(__FILE__)."/init.php");
	include(dirname(__FILE__) . "/includes/classes/class.checkout.php");
	$GLOBALS['ISC_CLASS_CHECKOUT'] = GetClass('ISC_CHECKOUT');
	$GLOBALS['ISC_CLASS_CHECKOUT']->HandlePage();

?>
