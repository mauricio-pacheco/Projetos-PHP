<?php
	include(dirname(__FILE__) . "/init.php");
	include(dirname(__FILE__) . "/includes/classes/class.captcha.php");
	include(dirname(__FILE__) . "/includes/classes/class.product.php");
	include(dirname(__FILE__) . "/includes/classes/class.review.php");

	$GLOBALS['ISC_CLASS_CAPTCHA'] = GetClass('ISC_CAPTCHA');
	$GLOBALS['ISC_CLASS_REVIEW'] = GetClass('ISC_REVIEW');
	$GLOBALS['ISC_CLASS_REVIEW']->HandlePage();
?>
