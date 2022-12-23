<?php
	// CLI only
	if(PHP_SAPI != "cli") {
		exit;
	}

	define('NO_SESSION', true);

	require_once(dirname(__FILE__).'/init.php');

	// Now run the cron function to update the currencies
	UpdateCurrenciesFromCron();
?>