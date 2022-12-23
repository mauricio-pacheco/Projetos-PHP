<?php
	include(dirname(__FILE__)."/init.php");
	require(dirname(__FILE__).'/includes/classes/class.giftcertificates.php');
	$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES'] = GetClass('ISC_GIFTCERTIFICATES');
	$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES']->HandlePage();
?>
