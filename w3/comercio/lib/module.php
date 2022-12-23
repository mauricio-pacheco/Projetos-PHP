<?php
/**
 * Get a list of the specified type of modules available. Can filter so only enabled, or only configured modules
 * are returned.
 *
 * @param string The type of module (analytics, notifications, checkout or shipping).
 * @param boolean Filter out disabled modules.
 * @param boolean Filter out modules that aren't configured.
 * @param boolean Should we also sort the modules into mutex groups.
 * @return array The array of modules.
 */
function GetAvailableModules($type, $OnlyEnabledModules = false, $OnlyConfiguredModules = false, $SortMutuallyExclusive = false)
{
	$valid_types = array (
		'accounting',
		'analytics',
		'checkout',
		'notification',
		'shipping',
		'currency',
		'livechat',
		'addon'
	);

	if (!in_array($type, $valid_types)) {
		return array();
	}

	if($type == 'addon') {
		$dir = ISC_BASE_PATH."/addons/";
	}
	else {
		$dir = ISC_BASE_PATH."/modules/".$type;
	}
	$modules = array();
	$matches = array();

	$directories = scandir($dir);
	foreach ($directories as $directory) {
		// Skip over anything we don't want
		if($directory == "." || $directory == ".." || $directory == ".svn" || !is_dir($dir."/".$directory)) {
			continue;
		}

		if($type == 'addon') {
			$file = "addon.".$directory.".php";
		}
		else {
			$file = "module.".$directory.".php";
		}
		if(!file_exists($dir."/".$directory."/".$file)) {
			continue;
		}

		$module_name = $directory;

		// If we only want configured modules and this module hasn't been configured, well then skip over it
		$moduleId = $type.'_'.$module_name;
		if($OnlyConfiguredModules && !ModuleIsConfigured($moduleId)) {
			continue;
		}

		$class_name = isc_strtoupper($type.'_'.$module_name);
		include_once($dir."/".$directory."/".$file);
		if (!class_exists($class_name)) {
			continue;
		}

		$module = new $class_name();

		if (is_object($module)) {
			$errors = array();
			if(method_exists($module, "LECheck") && $module->LECheck() === false) {
				continue;
			}
			if (method_exists($module, "GetId") && method_exists($module, "GetName")) {
				$mod_details = array (
					"id" => $module->GetId(),
					"name" => $module->GetName(),
					"enabled" => $module->IsEnabled(),
					"object" => $module,
				);
				if ($OnlyEnabledModules) {
					if ($module->IsEnabled()) {
						// Nope, just as long as it's enabled
						$modules[] = $mod_details;
					}
				} else {
					$modules[] = $mod_details;
				}
			}
		}
	}

	usort($modules, "sort_modules");
	if ($SortMutuallyExclusive) {
		usort($modules, "sort_modules_by_type");
	}

	$GLOBALS[$type.'_modules'] =& $modules;
	return $modules;
}

/**
 * Sort an array of modules based on the name key
 *
 * @param array The first item to compare
 * @param array The second item to compare
 * @return boolean True if $a > $b else false
 */
function sort_modules($a, $b)
{
	return strcasecmp($a['name'], $b['name']);
}

/**
 * Sort an array of modules based on the the mutext var of the object
 *
 * @param array The first item to compare
 * @param array The second item to compare
 * @return boolean True if $a > $b else false
 */
function sort_modules_by_type($a, $b)
{
	return strcasecmp($a['object']->_flatrate, $b['object']->_flatrate);
}

/**
 * Get a variable for a specific module.
 *
 * @param string The name of the module to fetch the variable for.
 * @param string The name of the variable to fetch the value of.
 */
function GetModuleVariable($moduleId, $variableName)
{
	$moduleBits = explode('_', $moduleId, 2);
	$cachedModuleVars = $GLOBALS['ISC_CLASS_DATA_STORE']->Read(ucfirst($moduleBits[0]).'ModuleVars');

	// First try to see if we can load a cached version for this type of module
	if($cachedModuleVars !== false) {
		if(isset($cachedModuleVars[$moduleId][$variableName])) {
			return $cachedModuleVars[$moduleId][$variableName];
		}
		else {
			return false;
		}
	}
	// Otherwise, fall back to loading it from the database
	else {
		$query = sprintf("select variableval from [|PREFIX|]module_vars where modulename='%s' and variablename='%s'", $GLOBALS['ISC_CLASS_DB']->Quote($moduleId), $GLOBALS['ISC_CLASS_DB']->Quote($variableName));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		// Is there a single value, or multiple?
		if($GLOBALS['ISC_CLASS_DB']->CountResult($result) <= 1) {
			$row = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
			return $row['variableval'];
		}
		else {
			$ret = array();
			while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				array_push($ret, $row['variableval']);
			}
			return $ret;
		}
	}
}

/**
 * Check if a module is configured.
 *
 * @param string The name of the module to check if it's enabled.
 * @return boolean True if the module is configured, false if not.
 */
function ModuleIsConfigured($ModuleId)
{
	$moduleBits = explode('_', $ModuleId, 2);
	$cachedModuleVars = $GLOBALS['ISC_CLASS_DATA_STORE']->Read(ucfirst($moduleBits[0]).'ModuleVars');

	switch($moduleBits[0]) {
		case 'accounting':
		case 'shipping':
		case 'checkout':
		case 'analytics':
		case 'notification':
		case 'livechat':
			// Check that the method is actually enabled in the first place
			if(!in_array($ModuleId, explode(',', GetConfig(ucfirst($moduleBits[0]).'Methods')))) {
				return false;
			}
			break;
		case 'addon':
			// Check that the method is actually enabled in the first place
			if(!in_array($ModuleId, explode(',', GetConfig(ucfirst($moduleBits[0]).'Modules')))) {
				return false;
			}
	}

	// First try to see if we can load a cached version for this type of module
	if($cachedModuleVars !== false) {
		if(isset($cachedModuleVars[$ModuleId]) && !empty($cachedModuleVars[$ModuleId])) {
			return true;
		}
		else {
			return false;
		}
	}
	// Otherwise, fall back to loading it from the database
	else {
		if (!isset($GLOBALS['ConfiguredModules']) || !is_array($GLOBALS['ConfiguredModules'])) {
			$GLOBALS['ConfiguredModules'] = GetConfiguredModules();
		}
		return in_array($ModuleId, $GLOBALS['ConfiguredModules']);
	}
}

/**
 * Return an array of configured modules.
 *
 * @return array An array of modules that have been configured.
 */
function GetConfiguredModules()
{
	$modules = array();

	$query = "
		SELECT modulename
		FROM [|PREFIX|]module_vars
		WHERE variablename='is_setup'
		AND variableval='1'
	";

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	while ($module = $GLOBALS['ISC_CLASS_DB']->FetchOne($result)) {
		$modules[] = $module;
	}

	return $modules;
}

/**
 * Return the object of a module based on the passed ID.
 *
 * @param string The type of module that needs to be loaded.
 * @param object The object of the module, returned by reference.
 * @param string The ID of the module to load.
 * @return boolean True if successful, false if not.
 */
function GetModuleById($type, &$returned_module, $id)
{
	$valid_types = array (
		'accounting',
		'analytics',
		'checkout',
		'notification',
		'shipping',
		'currency',
		'livechat',
		'addon'
	);

	if (!in_array($type, $valid_types)) {
		return false;
	}

	// Try and load the module
	$idPieces = explode('_', $id, 2);
	if(isset($idPieces[1])) {
		$id = $idPieces[1];
	}
	if($type == 'addon') {
		$moduleFile = ISC_BASE_PATH.'/addons/'.$id.'/addon.'.$id.'.php';
	}
	else {
		$moduleFile = ISC_BASE_PATH.'/modules/'.$type.'/'.$id.'/module.'.$id.'.php';
	}

	$className = isc_strtoupper($type.'_'.$id);
	if(!file_exists($moduleFile)) {
		return false;
	}

	include_once $moduleFile;
	if (!class_exists($className)) {
		return false;
	}


	$returned_module = new $className();
	return true;
}

