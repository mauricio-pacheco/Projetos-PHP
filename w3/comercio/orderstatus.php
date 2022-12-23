<?php

	include(dirname(__FILE__)."/init.php");
	header(sprintf("Location: %s/account.php?action=order_status", $GLOBALS["ShopPathSSL"]));

?>
