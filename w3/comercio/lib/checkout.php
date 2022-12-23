<?php
// If we're calling this directly, exit
if(!defined('ISC_BASE_PATH')) {
	exit;
}

require_once ISC_BASE_PATH.'/includes/classes/class.checkoutprovider.php';

/**
 * Get a list of checkout providers that are enabled but are not necessarily configured.
 *
 * @return array An array of checkout providers.
 */
function GetEnabledCheckoutModules()
{
	$modules = GetAvailableModules('checkout', true);
	return $modules;
}

/**
 * Get a list of checkout modules that are enabled, configured and that the customer has access to.
 *
 * @param boolean Set to true if we're on the 'confirm order' page.
 * @return array An array of available modules.
 */
function GetCheckoutModulesThatCustomerHasAccessTo($confirmPage=false)
{
	$modules = GetAvailableModules('checkout', true, true);
	$availableModules = array();

	foreach($modules as $module) {
		if($module['object']->IsAccessible() && $module['object']->IsSupported()) {
			if (!$confirmPage || $module['object']->ShowOnConfirmPage) {
				$availableModules[] = $module;
			}
		}
		$module['object']->ResetErrors();
	}
	return $availableModules;
}
?>