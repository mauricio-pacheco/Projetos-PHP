<?php

	require_once(dirname(__FILE__).'/module.php');

	/**
	*	Get a list of available notification modules and return them as an array.
	*	A notification module's filename and class name must match up. For example
	*	if a notification module is called module.email.php then the class name
	*	must be NOTIFICATION_EMAIL and is case sensitive.
	*/

	require_once(dirname(__FILE__) . "/../includes/classes/class.notification.php");

	/**
	*	Is the notification module setup? If so there will be an is_setup module variable in the database.
	*/
	function NotificationModuleIsConfigured($ModuleId)
	{
		$query = sprintf("select count(variableid) as num from [|PREFIX|]module_vars where modulename='%s' and variablename='is_setup' and variableval='1'", $GLOBALS['ISC_CLASS_DB']->Quote($ModuleId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$row = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

		if($row['num'] == 1) {
			return true;
		} else {
			return false;
		}
	}

	/**
	*	Return a list of notification providers that are enabled but not necessarily configured
	*/
	function GetEnabledNotificationModules()
	{
		$notification_modules = GetAvailableModules('notification', true);
		return $notification_modules;
	}


?>
