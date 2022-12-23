<?php
	require_once(dirname(__FILE__).'/module.php');
	require_once(dirname(__FILE__) . "/../includes/classes/class.shipping.php");

	/**
	*	Get a list of regions as an array
	*/
	function GetRegionListAsNameValuePairs()
	{
		static $regions = null;

		if (is_array($regions)) {
			return $regions;
		}

		$query = "SELECT couregid, couregname
			FROM [|PREFIX|]region_regions
			ORDER BY couregname ASC";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$regions = array();

		$regions["-- All Countries --"] = "all";

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$regions[$row['couregname']] = $row['couregid'];
		}

		return $regions;
	}

	/**
	*	Get a list of regions as <option> tags
	*/
	function GetRegionList($SelectedRegion = 0, $IncludeFirst = true, $FirstText = "ChooseARegion", $FirstValue = "0", $FirstSelected = false)
	{

		$list = "";

		// Should we add a blank option?
		if($IncludeFirst) {
			if($FirstSelected) {
				$sel = 'selected="selected"';
			} else {
				$sel = "";
			}

			$list = sprintf("<option %s value='%s'>-- %s --</option>", $sel, $FirstValue, GetLang($FirstText));
		}

		$result = $GLOBALS['ISC_CLASS_DB']->Query("select couregid, couregname from [|PREFIX|]country_regions order by couregname asc");

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			if(is_numeric($SelectedRegion)) {
				// Match $SelectedRegion by region id
				if($row['couregid'] == $SelectedRegion) {
					$sel = 'selected="selected"';
				} else {
					$sel = "";
				}
			}
			else {
				// Match selected region by name
				if(is_array($SelectedRegion)) {
					// A list has been passed in
					if(in_array($row['couregname'], $SelectedRegion)) {
						$sel = 'selected="selected"';
					} else {
						$sel = "";
					}
				}
				else {
					// Just one region has been passed in
					if($row['couregname'] == $SelectedRegion) {
						$sel = 'selected="selected"';
					} else {
						$sel = "";
					}
				}
			}

			$list .= sprintf("<option value='%d' %s>%s</option>", $row['couregid'], $sel, $row['couregname']);
		}

		return $list;
	}

	/**
	*	Get a list of countries as an array
	*/
	function GetCountryListAsNameValuePairs()
	{
		static $countries = null;

		if (is_array($countries)) {
			return $countries;
		}

		$query = "
			SELECT countryid, countryname
			FROM [|PREFIX|]countries
			ORDER BY countryname ASC
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$countries = array();

		$countries["-- All Countries --"] = "all";

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$countries[$row['countryname']] = $row['countryid'];
		}

		return $countries;
	}

	/**
	*	Get a list of countries as an array
	*/
	function GetCountryListAsIdValuePairs()
	{
		static $countries = null;

		if (is_array($countries)) {
			return $countries;
		}

		$query = "
			SELECT countryid, countryname
			FROM [|PREFIX|]countries
			ORDER BY countryname ASC
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$countries = array();

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$countries[$row['countryid']] = $row['countryname'];
		}

		return $countries;
	}

	/**
	*	Get a list of countries as <option> tags
	*/
	function GetCountryList($SelectedCountry = 0, $IncludeFirst = true, $FirstText = "ChooseACountry", $FirstValue = "0", $FirstSelected = false, $useDatabase = true)
	{

		$list = "";

		// Should we add a blank option?
		if($IncludeFirst) {
			if($FirstSelected) {
				$sel = 'selected="selected"';
			} else {
				$sel = "";
			}

			$list = sprintf("<option %s value='%s'>-- %s --</option>", $sel, $FirstValue, GetLang($FirstText));
		}

		/**
		 * Decide if we are using the database or the CSV file. Normally we use the database BUT for instances where we need to select a country in the installer BEFORE the
		 * database is created, we need to use the CSV method
		 */
		if ($useDatabase) {
			$func = "_GetCountryListViaDB";
		} else {
			$func = "_GetCountryListViaCSV";
		}

		while($row = call_user_func($func)) {
			$sel = '';
			if(is_array($SelectedCountry)) {
				if(in_array($row['countryname'], $SelectedCountry) || in_array($row['countryid'], $SelectedCountry)) {
					$sel = 'selected="selected"';
				}
			}
			else {
				if($SelectedCountry != '' && ($row['countryname'] == $SelectedCountry || $row['countryid'] == $SelectedCountry)) {
					$sel = 'selected="selected"';
				}
			}

			$list .= sprintf("<option value='%d' %s>%s</option>", $row['countryid'], $sel, $row['countryname']);
		}

		return $list;
	}

	function _GetCountryListViaDB()
	{
		static $_cacheResult = null;

		if (is_null($_cacheResult)) {
			$_cacheResult = $GLOBALS['ISC_CLASS_DB']->Query("select countryid, countryname from [|PREFIX|]countries order by countryname asc");
		}

		if (!($row = $GLOBALS['ISC_CLASS_DB']->Fetch($_cacheResult))) {
			$_cacheResult = null;
		}

		return $row;
	}

	function _GetCountryListViaCSV()
	{
		static $_cacheResult = null;

		if (is_null($_cacheResult)) {
			$template		= realpath($GLOBALS['ISC_CLASS_TEMPLATE']->baseDir . DIRECTORY_SEPARATOR . "install.countries.csv.tpl");
			$_cacheResult	= fopen($template, "rb");
		}

		if (is_array($row = fgetcsv($_cacheResult, 8192))) {
			$row = array(
				"countryid"		=> $row[0],
				"countryname"	=> $row[1],
				"countryiso2"	=> $row[2],
				"countryiso3"	=> $row[3]
			);
		} else {
			$_cacheResult = null;
		}

		return $row;
	}

	/**
	 * Build a list of options for a multi-country state picker.
	 *
	 * @param array Array of selected countries and states. Key of the array is the country ID, value is an array of selected states (0 for all)
	 * @return string The option list.
	 */
	function GetMultiCountryStateOptions($selectedValues=array(), $showAllOption=true)
	{
		$countryIds = array_keys($selectedValues);
		$countryIds = implode(',', $countryIds);

		$query = "SELECT * FROM [|PREFIX|]countries WHERE countryid IN (".$countryIds.") ORDER BY countryname";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($country = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$countries[$country['countryid']] = $country['countryname'];
		}

		$states = array();

		// Load the states for the selected countries
		$query = "SELECT * FROM [|PREFIX|]country_states WHERE statecountry IN (".$countryIds.") ORDER BY statename";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($state = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$states[$state['statecountry']][$state['stateid']] = $state['statename'];
		}

		// Now build the select options
		$options = '';
		foreach($countries as $countryId => $countryName) {
			$options .= "<optgroup class=\"country".$countryId."\" label=\"".$countryName."\">\n";
			$stateIds = $selectedValues[$countryId];
			if(!is_array($stateIds)) {
				$stateIds = array();
			}
			if($showAllOption == true) {
				$allSelected = '';
				if(in_array('0', $stateIds)) {
					$allSelected = 'selected="selected"';
				}
				$options .= "<option value=\"".$countryId."-0\" ".$allSelected.">".GetLang('AllStates')."</option>\n";
			}
			if(isset($states[$countryId])) {
				foreach($states[$countryId] as $stateId => $stateName) {
					$selected = '';
					if(in_array($stateId, $stateIds)) {
						$selected = 'selected="selected"';
					}
					$options .= "<option value=\"".$countryId."-".$stateId." \" ".$selected.">".isc_html_escape($stateName)."</option>\n";
				}
			}
			$options .= "</optgroup>\n";
		}
		return $options;
	}

	/**
	*	Get a list of states for use in JavaScript
	*/
	function GetStateList($Country)
	{
		$output = "";
		$query = sprintf("select stateid, statename from [|PREFIX|]country_states where statecountry='%d' order by statename asc", $GLOBALS['ISC_CLASS_DB']->Quote($Country));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$output .= sprintf("%s|%s~", $row['statename'], $row['stateid']);
		}

		return $output;
	}

	/**
	*	Get a list of states as an array
	*/
	function GetStatesArray($Country)
	{
		$output = "";
		$query = sprintf("SELECT stateid, statename FROM [|PREFIX|]country_states WHERE statecountry='%d' ORDER BY statename ASC", $GLOBALS['ISC_CLASS_DB']->Quote($Country));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$states = array();

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$states[$row['stateid']] = $row['statename'];
		}

		return $states;
	}

	/**
	*	Return a state's name based on its id
	*/
	function GetStateById($StateId)
	{
		$query = sprintf("select statename from [|PREFIX|]country_states where stateid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($StateId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['statename'];
		} else {
			return "";
		}
	}

	/**
	*	Return a state's id based on its name and country id
	*/
	function GetStateByName($StateName, $CountryId)
	{
		$query = sprintf("select stateid from [|PREFIX|]country_states where lower(statename)='%s' and statecountry='%d'", $GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($StateName)), $GLOBALS['ISC_CLASS_DB']->Quote($CountryId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['stateid'];
		} else {
			return "";
		}
	}

	/**
	*	Return a state's id based on its abbreviation and country id
	*/
	function GetStateByAbbrev($StateAbbrev, $CountryId)
	{
		$query = sprintf("select stateid from [|PREFIX|]country_states where lower(stateabbrv)='%s' and statecountry='%d'", $GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($StateAbbrev)), $GLOBALS['ISC_CLASS_DB']->Quote($CountryId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['stateid'];
		} else {
			return "";
		}
	}

	/**
	*	Return a state's name based on its abbreviation and country id
	*/
	function GetStateNameByAbbrev($StateAbbrev, $CountryId)
	{
		$query = sprintf("select statename from [|PREFIX|]country_states where lower(stateabbrv)='%s' and statecountry='%d'", $GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($StateAbbrev)), $GLOBALS['ISC_CLASS_DB']->Quote($CountryId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['statename'];
		} else {
			return "";
		}
	}

	/**
	*	Return a state's ISO code based on its id
	*/
	function GetStateISO2ById($StateId)
	{
		static $cache = array();

		if (isset($cache[$StateId])) {
			return $cache[$StateId];
		}

		$query = sprintf("select stateabbrv from [|PREFIX|]country_states where stateid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($StateId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$cache[$StateId] = $row['stateabbrv'];
			return $cache[$StateId];
		} else {
			return "";
		}
	}

	/**
	*	Return a state's ISO code based on its name
	*/
	function GetStateISO2ByName($StateName)
	{
		$query = sprintf("select stateabbrv from [|PREFIX|]country_states where statename='%s'", $GLOBALS['ISC_CLASS_DB']->Quote($StateName));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['stateabbrv'];
		} else {
			return "";
		}
	}

	/**
	*	Return a country's name based on its id
	*/
	function GetCountryById($CountryId)
	{
		$query = sprintf("select countryname from [|PREFIX|]countries where countryid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($CountryId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['countryname'];
		} else {
			return "";
		}
	}

	/**
	*	Return a country's id based on its name
	*/
	function GetCountryByName($CountryName)
	{
		$query = sprintf("select countryid from [|PREFIX|]countries where lower(countryname='%s')", $GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($CountryName)));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['countryid'];
		} else {
			return "";
		}
	}

	/**
	*	Return a country's 2 digit ISO code based on its name
	*/
	function GetCountryISO2ByName($CountryName)
	{
		$query = sprintf("select countryiso2 from [|PREFIX|]countries where countryname='%s'", $GLOBALS['ISC_CLASS_DB']->Quote($CountryName));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['countryiso2'];
		}
	}

	/**
	*	Return a country's 2 digit ISO code based on its id
	*/
	function GetCountryISO2ById($CountryId)
	{
		static $cache = array();

		if (isset($cache[$CountryId])) {
			return $cache[$CountryId];
		}

		$query = sprintf("select countryiso2 from [|PREFIX|]countries where countryid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($CountryId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$cache[$CountryId] = $row['countryiso2'];
			return $cache[$CountryId];
		}
	}

	/**
	*	Get a list of countries and only output countries that are part of the $CountriesToInclude array
	*/
	function GetFilteredCountryList($CountriesToInclude, $SelectedCountry = "")
	{

		$list = "";
		$countries = implode("','", $GLOBALS['ISC_CLASS_DB']->Quote($CountriesToInclude));
		$query = sprintf("select countryid, countryname from [|PREFIX|]countries where countryname in ('%s') order by countryname asc", $countries);
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {

			// Match selected country by name
			if($row['countryname'] == $SelectedCountry) {
				$sel = 'selected="selected"';
			} else {
				$sel = "";
			}

			$list .= sprintf("<option value='%d' %s>%s</option>", $row['countryid'], $sel, $row['countryname']);
		}

		return $list;
	}

	/**
	*	Return a country's id based on its 2-digit ISO
	*/
	function GetCountryIdByISO2($CountryISO2)
	{
		$query = sprintf("select countryid from [|PREFIX|]countries where countryiso2='%s'", $GLOBALS['ISC_CLASS_DB']->Quote($CountryISO2));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			return $row['countryid'];
		} else {
			return "";
		}
	}

	/**
	*	Get a list of states as <option> tags
	*/
	function GetStateListAsOptions($Country, $SelectedState = 0, $IncludeFirst = true, $FirstText = "ChooseAState", $FirstValue = "0", $FirstSelected = false)
	{

		$list = "";
		$query = sprintf("select stateid, statename from [|PREFIX|]country_states where statecountry='%d' order by statename asc", $GLOBALS['ISC_CLASS_DB']->Quote($Country));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		// Should we add a blank option?
		if($IncludeFirst) {
			if($FirstSelected) {
				$sel = 'selected="selected"';
			} else {
				$sel = "";
			}

			$list = sprintf("<option %s value='%s'>%s</option>", $sel, $FirstValue, GetLang($FirstText));
		}

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			if(is_numeric($SelectedState)) {
				// Match $SelectedState by country id
				if($row['stateid'] == $SelectedState) {
					$sel = 'selected="selected"';
				} else {
					$sel = "";
				}
			}
			else {
				// Match selected state by id
				if(is_array($SelectedState)) {
					// A list has been passed in
					if(in_array($row['stateid'], $SelectedState)) {
						$sel = 'selected="selected"';
					} else {
						$sel = "";
					}
				}
				else {
					// Just one state has been passed in
					if($row['stateid'] == $SelectedState) {
						$sel = 'selected="selected"';
					} else {
						$sel = "";
					}
				}
			}

			$list .= sprintf("<option value='%d' %s>%s</option>", $row['stateid'], $sel, $row['statename']);
		}

		return $list;
	}

	function GetNumStatesInCountry($CountryId)
	{
		$query = sprintf("select count(stateid) as num from [|PREFIX|]country_states where statecountry='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($CountryId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$row = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
		return $row['num'];
	}

	/**
	*	Return the name of a country from its ID
	*/
	function GetCountryIdByName($Country)
	{
		$country_id = 0;
		$query = sprintf("select countryid from [|PREFIX|]countries where lower(countryname)='%s'", $GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($Country)));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$country_id = $row['countryid'];
		}

		return $country_id;
	}

	/**
	 * Get a list of the available shipping methods for a particular shipping zone.
	 *
	 * @param int The zone id to fetch available shipping methods for.
	 * @return array Array of shipping methods available in this zone.
	 */
	function GetShippingMethodsByZone($zoneId)
	{
		$methods = array();

		$query = "
			SELECT *
			FROM [|PREFIX|]shipping_methods
			WHERE zoneid='".(int)$zoneId."'
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($method = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$methods[] = $method;
		}

		return $methods;
	}
	/**
	 * Determine the shipping zone id from a given address array. Will search the database to match first by post code, then by state, then by country.
	 *
	 * @param array Array of information regarding the address (shipzip, shipstateid, shipcountryid)
	 * @return int The matched shipping zone if any, 0 if not (0 explicitly means the default zone for "any other unmatched location")
	 */
	function GetShippingZoneIdByAddress($address)
	{
		$zoneId = 1;

		// Check if we have a shipping zone that matches based on the post code first
		if($address['shipzip']) {
			$query = "
				SELECT z.zoneid, locationvalueid, locationvalue
				FROM [|PREFIX|]shipping_zone_locations l
				INNER JOIN [|PREFIX|]shipping_zones z ON (z.zoneid=l.zoneid)
				WHERE z.zoneenabled='1' AND locationtype='zip' AND locationcountryid='".$address['shipcountryid']."' AND '".$GLOBALS['ISC_CLASS_DB']->Quote($address['shipzip'])."' REGEXP REPLACE(REPLACE(CONCAT('^', locationvalue), '*', '.{1,}'), '?',  '.')
			";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			while($zone = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				if($zone['zoneid'] == $address['shipzip']) {
					$zoneId = $zone['zoneId'];
					continue;
				}
				else {
					// Score the characters in the string
					$score = (substr_count($zone['locationvalue'], '*')*10)+(substr_count($zone['locationvalue'], '?'));

					// A lower score means a stronger match, so we use that zone ID
					if(!isset($lastScore) || $score < $lastScore) {
						$zoneId = $zone['zoneid'];
						$lastScore = $score;
					}
				}
			}

			if($zoneId > 1) {
				return $zoneId;
			}
		}

		// Try based on the shipping state and country for a zone
		$query = "
			SELECT z.zoneid
			FROM [|PREFIX|]shipping_zone_locations l
			INNER JOIN [|PREFIX|]shipping_zones z ON (z.zoneid=l.zoneid)
			WHERE z.zoneenabled='1' AND locationtype='state' AND locationcountryid='".(int)$address['shipcountryid']."' AND (locationvalueid='".(int)$address['shipstateid']."' OR locationvalueid='0')
			ORDER BY locationvalueid DESC
			LIMIT 1
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$zone = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

		if(isset($zone['zoneid'])) {
			return $zone['zoneid'];
		}

		// Otherwise, do we have a country level zone we can fall back on?
		$query = "
			SELECT z.zoneid
			FROM [|PREFIX|]shipping_zone_locations l
			INNER JOIN [|PREFIX|]shipping_zones z ON (z.zoneid=l.zoneid)
			WHERE z.zoneenabled='1' AND locationtype='country' AND locationvalueid='".(int)$address['shipcountryid']."'
			LIMIT 1
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$zone = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

		if(isset($zone['zoneid'])) {
			return $zone['zoneid'];
		}

		// If we're still here, we just return $zoneId which will be 1 - this means "every other location"
		return $zoneId;
	}

	/**
	 * Retrieve a shipping zone from the database based on the passed ID.
	 *
	 * @param int The ID of the shipping zone.
	 * @return array Array containing the shipping zone data.
	 */
	function GetShippingZoneById($zoneId)
	{
		static $zoneCache;

		if(isset($zoneCache[$zoneId])) {
			return $zoneCache[$zoneId];
		}

		// Otherwise, we need to query for it
		$query = "SELECT * FROM [|PREFIX|]shipping_zones WHERE zoneid='".(int)$zoneId."'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$zoneCache[$zoneId] = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
		return $zoneCache[$zoneId];
	}

	/**
	 * Retrieve a shipping method from the database based on the passed ID.
	 *
	 * @param int The ID of the shipping method.
	 * @return array Array containing the shipping method data.
	 */
	function GetShippingMethodById($methodId)
	{
		static $methodCache;

		if(isset($methodCache[$methodId])) {
			return $methodCache[$methodId];
		}

		// Otherwise, we need to query for it
		$query = "SELECT * FROM [|PREFIX|]shipping_methods WHERE methodid='".(int)$methodId."'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$methodCache[$methodId] = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
		return $methodCache[$methodId];
	}

	function GetShippingInfoByZoneId($zoneid, $enabledonly=true)
	{
		$query = "SELECT *
		FROM [|PREFIX|]shipping_zones z
		INNER JOIN [|PREFIX|]shipping_zone_locations l
		ON z.zoneid=l.zoneid
		WHERE z.zoneid = '".$GLOBALS['ISC_CLASS_DB']->Quote($zoneid)."'";

		if ($enabledonly) {
			$query .= " AND z.zoneenabled = 1 ";
		}

		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$zone = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

		if ($zone === false) {
			return false;
		}

		$query = "SELECT *
		FROM [|PREFIX|]shipping_methods m, [|PREFIX|]shipping_vars v
		WHERE m.zoneid = v.zoneid
		AND m.methodid= v.methodid
		AND m.zoneid = '".$GLOBALS['ISC_CLASS_DB']->Quote($zoneid)."'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$zone['methods'][] = $row;
		}

		return $zone;
	}

	function GetShippingZoneInfo()
	{
		$query = "SELECT *
		FROM [|PREFIX|]shipping_zones z
		WHERE z.zoneenabled
		";

		static $zones = null;

		if (is_array($zones)) {
			return $zones;
		}

		$zones = array();

		$zoneresult = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while ($zone = $GLOBALS['ISC_CLASS_DB']->Fetch($zoneresult)) {
			$query = "SELECT *
			FROM [|PREFIX|]shipping_zone_locations l
			WHERE l.zoneid = '".$GLOBALS['ISC_CLASS_DB']->Quote($zone['zoneid'])."'";
			$locationresult = $GLOBALS['ISC_CLASS_DB']->Query($query);

			while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($locationresult)) {
				$zone['locations'][] = $row;
				if (!isset($zone['locationtype'])) {
					$zone['locationtype'] = $row['locationtype'];
				}
			}

			$query = "SELECT *
			FROM [|PREFIX|]shipping_methods m
			WHERE m.methodenabled = 1
			AND m.zoneid = '".$GLOBALS['ISC_CLASS_DB']->Quote($zone['zoneid'])."'";
			$methodresult = $GLOBALS['ISC_CLASS_DB']->Query($query);

			while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($methodresult)) {
				$query = "SELECT variablename as name, variableval as val
				FROM [|PREFIX|]shipping_vars v
				WHERE v.zoneid = '".$GLOBALS['ISC_CLASS_DB']->Quote($row['zoneid'])."'
				AND v.methodid = '".$GLOBALS['ISC_CLASS_DB']->Quote($row['methodid'])."'";

				$var_result = $GLOBALS['ISC_CLASS_DB']->Query($query);

				while ($var_row = $GLOBALS['ISC_CLASS_DB']->Fetch($var_result)) {
					$row['vars'][$var_row['name']] = $var_row['val'];
				}

				$zone['methods'][] = $row;
			}

			$zones[] = $zone;
		}

		return $zones;
	}
?>
