<?php
// If we're calling this directly, exit
if(!defined('ISC_BASE_PATH')) {
	exit;
}

require_once(dirname(__FILE__).'/module.php');

/**
 * Return the tracking code for all of the enabled analytics modules.
 *
 * @return string The tracking code to be inserted on pages.
 */
function GetTrackingCodeForAllPackages()
{
	$packages = GetAvailableModules('analytics', true, true);
	$code = "";

	foreach ($packages as $package) {
		if (GetModuleById('analytics', $module, $package['id'])) {
			$trackingCode = $module->GetTrackingCode();
		}
		$code .= "<!-- Start Tracking Code for " . $package['id'] . " -->\n\n" . $trackingCode . "\n\n<!-- End Tracking Code for " . $package['id'] . " -->\n\n";
	}

	return $code;
}

/**
 * Return the order conversion tracking code for all of the enabled analytics modules.
 *
 * @param string The total dollar amount of the order.
 * @return string The tracking code to be inserted on the finish order pages.
 */
function GetConversionCodeForAllPackages($OrderTotal)
{
	$packages = GetAvailableModules('analytics', true, true);
	$code = "";
	$module = null;
	foreach ($packages as $package) {
		if (GetModuleById('analytics', $module, $package['id'])) {
			$trackingCode = $module->getconversioncode($OrderTotal);
			if ($trackingCode != "") {
				$code .= "<!-- Start Conversion Code for " . $package['id'] . " -->\n\n" . $trackingCode . "\n\n<!-- End Conversion Code for " . $package['id'] . " -->\n\n";
			}
		}
	}

	return $code;
}

?>