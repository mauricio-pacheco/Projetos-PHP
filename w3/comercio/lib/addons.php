<?php
// If we're calling this directly, exit
if(!defined('ISC_BASE_PATH')) {
	exit;
}

/**
 * Get a list of the available addon modules.
 *
 * @param boolean True if we only want to fetch addons that are enabled.
 * @param boolean True if we only want to fetch addons that are also configured.
 * @return array An array of the addon modules available.
 */
function GetAvailableAddonModules($onlyEnabled=false, $onlyConfigured=false)
{
	return GetAvailableModules('addon', $onlyEnabled, $onlyConfigured);
}

/**
 * Check if a particular addon has been set up.
 *
 * @param string The ID of the addon.
 * @return boolean True if the addon has been set up (configured) false if not.
 */
function AddonsModuleIsConfigured($id)
{
	return ModuleIsConfigured($id);
}

/**
 * Return a list of the addons that are enabled but are not necessarily configured.
 *
 * @return array An array of addon modules that are enabled.
 */
function GetEnabledAddonModules()
{
	$modules = GetAvailableAddonModules(true);
	return $modules;
}

/**
 * Return a list of the addons that are enabled and configured.
 *
 * @return array An array of addon modules that are enabled and configured.
 */
function GetSetupAddonsModules()
{
	$modules = GetAvailableAddonModules(true, true);
	return $modules;
}

/**
 * Return an instantiated version of an addon module based on the passed ID.
 *
 * @param object The addon module, returned by reference.
 * @param string The ID of the addon we want to fetch.
 * @return boolean True if successful, false if not.
 */
function GetAddonsModule(&$object, $module)
{
	return GetModuleById('addon', $object, $module);
}

/**
 * Check if a particular addon module is enabled.
 *
 * @param string The ID of the addon module.
 * @return boolean True if the addon is enabled, false if not.
 */
function AddonsModuleIsEnabled($id)
{
	if (is_numeric(isc_strpos(GetConfig('AddonModules'), $id))) {
		return true;
	}
	else {
		return false;
	}
}

?>