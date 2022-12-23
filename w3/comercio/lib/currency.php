<?php

/**
 * Initialise the currency system. This function will set the default currency either from the request,
 * a session, based on the IP address location, or use the store default.
 *
 * @return int The ID of the currency currently being used on the store.
 */
function SetupCurrency()
{
	if(isset($GLOBALS['CurrentCurrency'])) {
		return $GLOBALS['CurrentCurrency'];
	}
	// Is there an incoming currency in the request? If so, we also save it in the session
	if(isset($_REQUEST['setCurrencyId']) && SaveCurrencyInSession($_REQUEST['setCurrencyId'])) {
		$GLOBALS['CurrentCurrency'] = (int)$_REQUEST['setCurrencyId'];
	}

	// Is there a currency ID stored in the users session?
	else if(isset($_SESSION['CURRENCY'])) {
		$GLOBALS['CurrentCurrency'] = (int)$_SESSION['CURRENCY'];
	}

	// Can we detect the currency from the visitors IP address?
	else {
		$ipCurrency = GetCurrencyByIp();
		if($ipCurrency) {
			SaveCurrencyInSession($ipCurrency);
		}
	}

	// If the currency in the session doesn't exist, remove it
	if(isset($GLOBALS['CurrentCurrency']) && $GLOBALS['CurrentCurrency'] > 0 && !GetCurrencyById($GLOBALS['CurrentCurrency'])) {
		SaveCurrencyInSession(0);
		unset($GLOBALS['CurrentCurrency']);
	}

	// Otherwise we fetch the default currency
	if(!isset($GLOBALS['CurrentCurrency'])) {
		$currency = GetDefaultCurrency();
		$GLOBALS['CurrentCurrency'] = $currency['currencyid'];
	}

	return $GLOBALS['CurrentCurrency'];
}


/**
 * Fetch the default currency information from the database.
 *
 * @return array Array of information regarding the currency.
 */
function GetDefaultCurrency()
{
	$currencyCache = $GLOBALS['ISC_CLASS_DATA_STORE']->Read('Currencies');

	// Double check that the cache is not empty. The currency cache will never be empty on a good install
	if(empty($currencyCache)) {
		$GLOBALS['ISC_CLASS_DATA_STORE']->UpdateCurrencies();
		$currencyCache = $GLOBALS['ISC_CLASS_DATA_STORE']->Read('Currencies');
	}

	if(!isset($currencyCache['default'])) {
		return false;
	}
	$defaultCurrency = $currencyCache[$currencyCache['default']];
	return $defaultCurrency;
}

/**
 * Fetch the currency code to use based on the current visitors IP address. This function will perform a
 * GeoIP based lookup of the current visitors IP address and if possible, find a matching currency.
 *
 * @return mixed False if a currency cannot be found, else the currency ID if a matching currency was found.
 */
function GetCurrencyByIP()
{
	require_once ISC_BASE_PATH."/lib/geoip/geoip.php";
	$geoIp = @geoip_open(ISC_BASE_PATH."/lib/geoip/GeoIP.dat", GEOIP_STANDARD);
	if(!$geoIp) {
		return false;
	}
	$code = geoip_country_code_by_addr($geoIp, GetIP());
	if(!$code) {
		return false;
	}

	$query = "
		SELECT currencyid
		FROM [|PREFIX|]currencies cu
		LEFT JOIN [|PREFIX|]countries co ON cu.currencycountryid = co.countryid
		LEFT JOIN (SELECT r.couregid, c.countryiso2 FROM [|PREFIX|]countries c JOIN [|PREFIX|]country_regions r ON c.countrycouregid = r.couregid) cr ON cu.currencycouregid = cr.couregid
		WHERE (UPPER(co.countryiso2) = '" . $GLOBALS['ISC_CLASS_DB']->Quote(strtoupper($code)) . "' OR UPPER(cr.countryiso2) = '" . $GLOBALS['ISC_CLASS_DB']->Quote(strtoupper($code)) . "') AND cu.currencystatus = 1
		LIMIT 1
	";
	return $GLOBALS['ISC_CLASS_DB']->FetchOne($query, 'currencyid');
}

/**
 * Convert a price to a specific currency, optionally using a forced exchange rate instead of the
 * current one for this currency, and optionally from a specific currency.
 *
 * @param float The price to convert.
 * @param mixed The currency to convert to. If not passed, the current currency is used, if an integer, the currency will be looked up.
 * @param mixed If null, the exchange rate for the convert to currency will be used, if a float/decimal, this exchange rate will be used in preference.
 * @param mixed If null, it will be assumed that the price is in the default/base currency and doesn't need normalising first. If an integer, the currency will be looed up.
 * @return float The currency converted price.
 */
function ConvertPriceToCurrency($price, $toCurrency=null, $forcedExchangeRate=null, $fromCurrency=null)
{
	if($fromCurrency != null) {
		if(!is_array($fromCurrency)) {
			$fromCurrency = GetCurrencyById($fromCurrency);
		}
	}

	if($toCurrency == null) {
		$toCurrency = GetCurrencyById($GLOBALS['CurrentCurrency']);
	}
	else if(!is_array($toCurrency)) {
		$toCurrency = GetCurrencyById($toCurrency);
	}


	if(!isset($toCurrency['currencyid'])) {
		return $price;
	}

	if(!is_null($forcedExchangeRate)) {
		$toCorrency['currencyexchangerate'] = $forcedExchangeRate;
	}

	$price *= $toCurrency['currencyexchangerate'];
	return $price;
}

/**
 * Convert a price to the default currency from an existing currency. If not passed, the from
 * currency is assumed to be the currently active currency.
 *
 * @param float The price to be converted back to the default currency.
 * @param mixed The currency that the price is currently in. If null, it is assumed the currently active currency. If an integer, currency is looked up.
 * @return float The price back in the default currency.
 */
function ConvertPriceToDefaultCurrency($price, $fromCurrency=null)
{
	if($fromCurrency == null) {
		$fromCurrency = GetCurrencyById($GLOBALS['CurrentCurrency']);
	}

	if(!is_array($fromCurrency)) {
		$fromCurrency = GetCurrencyById($fromCurrency);
	}

	$toCurrency = GetDefaultCurrency();

	if(!$fromCurrency['currencyid'] || $fromCurrency['currencyid'] == $toCurrency['currencyid']) {
		return $price;
	}

	$price = $price / $fromCurrency['currencyexchangerate'];
	return $price;
}

/**
 * Format a price in a particular currency. Will only localise the price, not convert the value using the exchange rate.
 *
 * @param float The price to be formatted to the currency.
 * @param mixed The currency to fromat the price in. If null, the current currency is used, if an integer, the currency is looked up.
 * @param mixed The currency the price is currently localised in. If null, assumed the price is not localised, if an integer the currency is looked up.
 * @param boolean Set to true to include the currency code (USD, AUD, etc) at the end of the formatted price.
 * @return string The price formatted to the specific currency.
 */
function FormatPriceInCurrency($price, $toCurrency=null, $fromCurrency=null, $includeCurrencyCode=false)
{
	if($fromCurrency != null) {
		if(!is_array($fromCurrency)) {
			$fromCurrency = GetCurrencyById($fromCurrency);
		}
		$price = NormaliseCurrencyFormattedPrice($price, $fromCurrency);
	}

	if($toCurrency == null) {
		$toCurrency = $GLOBALS['CurrentCurrency'];
	}

	if(!is_array($toCurrency)) {
		$toCurrency = GetCurrencyById($toCurrency);
		if(!is_array($toCurrency)) {
			$toCurrency = GetDefaultCurrency();
		}
	}
	$price = number_format($price, $toCurrency['currencydecimalplace'], $toCurrency['currencydecimalstring'], $toCurrency['currencythousandstring']);

	if (strtolower($toCurrency['currencystringposition']) == "left") {
		$price = $toCurrency['currencystring'] . $price;
	} else {
		$price .= $toCurrency['currencystring'];
	}

	if($includeCurrencyCode == true) {
		$price .= ' '.$toCurrency['currencycode'];
	}

	return $price;
}

/**
 * Convert a currency formatted price back to the localised/western format.
 *
 * @param string The price to be formatted back to the western format.
 * @param array Array of information regarding the current formatting of the price.
 * @return string The price back in the western format.
 */
function NormaliseCurrencyFormattedPrice($price, $currency)
{
	$price = str_replace($currency['currencystring'], '', (string)$price);
	$price = str_replace($currency['currencythousandstring'], '', $price);
	$price = str_replace($currency['currencydecimalstring'] , '.', $price);
	return $price;
}

/**
 * Save a particular currency in the current viewers session.
 *
 * @param int The currency ID to save in the session.
 * @return boolean True if successful,false if unsuccessful.
 */
function SaveCurrencyInSession($currencyId)
{
	$currency = GetCurrencyById($currencyId);
	if($currency['currencyid']) {
		$_SESSION['CURRENCY'] = $currencyId;
		return true;
	}

	return false;
}


/**
 * Get the currency record by Id
 *
 * @return array The currency array on success, false otherwise
 */
function GetCurrencyById($currencyId)
{
	if($currencyId == 0) {
		return false;
	}

	$currencyCache = $GLOBALS['ISC_CLASS_DATA_STORE']->Read('Currencies');

	// Double check that the cache is not empty. The currency cache will never be empty on a good install
	if(empty($currencyCache)) {
		$GLOBALS['ISC_CLASS_DATA_STORE']->UpdateCurrencies();
		$currencyCache = $GLOBALS['ISC_CLASS_DATA_STORE']->Read('Currencies');
	}

	if(isset($currencyCache[$currencyId])) {
		return $currencyCache[$currencyId];
	}
	return false;
}

/**
 * Check if a passed currency code is a valid currency code.
 *
 * @param string The currency code to validate.
 * @return bool True if the currency code is valid, false if not.
 */
function IsCurrencyCodeReal($code)
{
	/**
	 * Just get the first available converter for the time being
	 */
	$converters	= GetAvailableModules('currency');
	$converter	= $converters[0]['object'];

	return $converter->IsRealCode(strtoupper($code));
}

/**
 * Update the exchange rates for currencies automatically. (Called via a cron script)
 */
function UpdateCurrenciesFromCron()
{
	/**
	 * Just get the first available converter for the time being
	 */
	$converters = GetAvailableModules('currency');
	$converter	= $converters[0]['object'];
	$result 	= $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]currencies WHERE currencyisdefault='0'");

	while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		if (($rate = $converter->GetExchangeRateUsingBase($row['currencycode'])) !== false) {
			$data = array(
				'currencyexchangerate' => $rate,
				'currencylastupdated' => time()
			);

			// If for some reason the rate returned 0, then we don't do the update at all
			if($rate == 0) {
				continue;
			}
			$GLOBALS['ISC_CLASS_DB']->UpdateQuery("currencies", $data, "currencyid='".$GLOBALS['ISC_CLASS_DB']->Quote((int)$row['currencyid'])."'");
		}
	}

	// Update the currency cache
	$GLOBALS['ISC_CLASS_DATA_STORE']->UpdateCurrencies();
}

?>