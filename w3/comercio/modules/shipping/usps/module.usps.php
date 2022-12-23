<?php

	/*
		Include the XMLize xml class
	*/
	require_once(ISC_BASE_PATH."/includes/classes/class.xmlize.php");

	/**
	* This is the USPS shipping module for Interspire Shopping Cart. To enable
	* USPS in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Shipping Settings tab in the menu.
	*/
	class SHIPPING_USPS extends ISC_SHIPPING
	{

		/**
		* Variables for the USPS shipping module
		*/

		/*
			The users USPS account username
		*/
		var $_username = "";

		/*
			The UPS service to ship with
		*/
		var $_service = "";

		/*
			The UPS container type
		*/
		var $_container = "";

		/*
			The size of the package
		*/
		var $_size = "";

		/*
			The origin country ISO code for UPS shipments
		*/
		var $_origincountry = "";

		/*
			The origin country zip for UPS shipments
		*/
		var $_originzip = "";

		/*
			The destination country ISO code for UPS shipments
		*/
		var $_destcountry = "";

		/*
			The destination country zip for UPS shipments
		*/
		var $_destzip = "";

		/*
			Which USPS API do we use? Domestic or international?
		*/
		var $_api = "RateV3";

		/*
			Width of priority large packages
		*/
		var $_prioritywidth = 0;

		/*
			Length of priority large packages
		*/
		var $_prioritylength = 0;

		/*
			Height of priority large packages
		*/
		var $_priorityheight = 0;

		/*
			Girth of priority large packages
		*/
		var $_prioritygirth = 0;

		/*
			Various shipping settings that are USPS specific
		*/
		var $_expressmailcontainertype = "";
		var $_expressmailpackagesize = "";
		var $_firstclasscontainertype = "";
		var $_firstclasspackagesize = "";
		var $_prioritycontainertype = "";
		var $_prioritypackagesize = "";
		var $_parcelpostmachpackagesize = "";
		var $_bpmpackagesize = "";
		var $_librarypackagesize = "";
		var $_mediapackagesize = "";

		var	$_id = "shipping_usps";
		/**
		* Functions for the USPS shipping module
		*/

		/*
			Shipping class constructor
		*/
		function SHIPPING_USPS()
		{
			// Setup the required variables for the USPS shipping module
			parent::__construct();
			$this->_name = GetLang('USPSName');
			$this->_image = "usps_logo.gif";
			$this->_description = GetLang('USPSDesc');
			$this->_help = GetLang('USPSHelp');
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 390;

			// USPS is only available in USA
			$this->_countries = array("United States");
		}

		/*
		 * Check if this shipping module can be enabled or not.
		 *
		 * @return boolean True if this module is supported on this install, false if not.
		 */
		function IsSupported()
		{
			if(!function_exists("curl_exec")) {
				$this->SetError(GetLang('USPSNoCurl'));
			}

			if(!$this->HasErrors()) {
				return false;
			}
			else {
				return true;
			}
		}

		/**
		* Custom variables for the shipping module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{

			$this->_variables['username'] = array("name" => "USPS Username",
			   "type" => "textbox",
			   "help" => GetLang('USPSUsernameHelp'),
			   "default" => "",
			   "required" => true
			);

			$this->_variables['servertype'] = array("name" => "USPS Server",
			   "type" => "dropdown",
			   "help" => GetLang('USPSServerTypeHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('USPSServerType1') => "test",
							  GetLang('USPSServerType2') => "production"
							),
				"multiselect" => false
			);

			$this->_variables['expressmailsettings'] = array("name" => "<strong>Express Mail Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['expressmailstatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['expressmailpackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L"
							),
				"multiselect" => false
			);

			$this->_variables['expressmailcontainertype'] = array("name" => "Container Type",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSFlatRateEnvelope') => "F"
							),
				"multiselect" => false
			);

			$this->_variables['expressmailweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "70 lbs"
			);

			$this->_variables['firstclasssettings'] = array("name" => "<strong>First Class Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['firstclassstatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['firstclasspackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L"
							),
				"multiselect" => false
			);

			$this->_variables['firstclassweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "0.75 lbs"
			);

			$this->_variables['prioritymailsettings'] = array("name" => "<strong>Priority Mail Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['prioritymailstatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['prioritymailpackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L"
							),
				"multiselect" => false
			);

			$this->_variables['prioritymailcontainertype'] = array("name" => "Container Type",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSFlatRateEnvelope') => "F",
							  GetLang('USPSFlatRateBox') => "B"
							),
				"multiselect" => false
			);

			$this->_variables['prioritymailweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "70 lbs"
			);

			$this->_variables['parcelpostmachinablesettings'] = array("name" => "<strong>Parcel Post (Machinable) Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['parcelpostmachinablestatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['parcelpostmachinablepackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L",
							  GetLang('USPSOversize') => "O"
							),
				"multiselect" => false
			);


			$this->_variables['parcelpostmachinableweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "70 lbs"
			);

			$this->_variables['bpmsettings'] = array("name" => "<strong>BPM (Bound Printed Matter) Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['bpmstatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['bpmpackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L"
							),
				"multiselect" => false
			);


			$this->_variables['bpmweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "15 lbs"
			);

			$this->_variables['librarysettings'] = array("name" => "<strong>Library Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['librarystatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['librarypackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L"
							),
				"multiselect" => false
			);


			$this->_variables['libraryweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "70 lbs"
			);

			$this->_variables['mediasettings'] = array("name" => "<strong>Media Settings</strong>",
			   "type" => "blank",
			   "help" => ""
			);

			$this->_variables['mediastatus'] = array("name" => "Status",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "disabled",
			   "required" => false,
			   "options" => array(GetLang('Enabled') => "enabled",
							  GetLang('Disabled') => "disabled"
							),
				"multiselect" => false
			);

			$this->_variables['mediapackagesize'] = array("name" => "Package Size",
			   "type" => "dropdown",
			   "help" => "",
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('USPSRegular') => "R",
							  GetLang('USPSLarge') => "L"
							),
				"multiselect" => false
			);


			$this->_variables['mediaweightlimit'] = array("name" => "Weight Limit",
			   "type" => "label",
			   "help" => "",
			   "label" => "70 lbs"
			);
		}

		/**
		* Test the shipping method by displaying a simple HTML form
		*/
		function TestQuoteForm()
		{
			// Which countries has the user chosen to ship orders to?
			$GLOBALS['Countries'] = GetCountryList("United States");

			$GLOBALS['Image'] = $this->_image;

			$this->ParseTemplate("module.usps.test");
		}

		/**
		* Get the shipping quote and display it in a form
		*/
		function TestQuoteResult()
		{
			$api = "";
			$pounds = 0;
			$ounces = 0;

			// Add a single test item - no dimensions needed for UPS
			$this->additem($_POST['delivery_weight']);

			// Setup all of the shipping variables
			$this->_username = $this->GetValue("username");
			$this->_service = $_POST['delivery_type'];
			$this->_origincountry = GetConfig('CompanyCountry');
			$this->_originzip = GetConfig('CompanyZip');
			$this->_destcountry = GetCountryById($_POST['delivery_country']);
			$this->_destzip = $_POST['delivery_zip'];

			$this->_expressmailcontainertype = $_POST['shipping_usps_expressmailcontainertype'];
			$this->_expressmailpackagesize = $_POST['shipping_usps_expressmailpackagesize'];
			$this->_firstclasscontainertype = $_POST['shipping_usps_firstclasscontainertype'];
			$this->_firstclasspackagesize = $_POST['shipping_usps_firstclasspackagesize'];
			$this->_prioritycontainertype = $_POST['shipping_usps_prioritycontainertype'];
			$this->_prioritypackagesize = $_POST['shipping_usps_prioritypackagesize'];
			$this->_parcelpostmachpackagesize = $_POST['shipping_usps_parcelpostmachpackagesize'];
			$this->_bpmpackagesize = $_POST['shipping_usps_bpmpackagesize'];
			$this->_librarypackagesize = $_POST['shipping_usps_librarypackagesize'];
			$this->_mediapackagesize = $_POST['shipping_usps_mediapackagesize'];

			// Is this a priority large package?
			if(is_numeric($_POST['shipping_usps_prioritywidth']) && is_numeric($_POST['shipping_usps_prioritylength']) && is_numeric($_POST['shipping_usps_priorityheight'])) {
				$this->_prioritywidth = $_POST['shipping_usps_prioritywidth'];
				$this->_prioritylength = $_POST['shipping_usps_prioritylength'];
				$this->_priorityheight = $_POST['shipping_usps_priorityheight'];
				$this->_prioritygirth = $_POST['shipping_usps_prioritygirth'];
			}

			// Next actually retrieve the quote
			$err = "";
			$result = $this->GetQuote();

			if(!is_object($result) && !is_array($result)) {
				$GLOBALS['Color'] = "red";
				$GLOBALS['Status'] = GetLang('StatusFailed');
				$GLOBALS['Label'] = GetLang('ShipErrorMessage');
				$GLOBALS['Message'] = implode('<br />', $this->GetErrors());
			}
			else {
				$GLOBALS['Color'] = "green";
				$GLOBALS['Status'] = GetLang('StatusSuccess');
				$GLOBALS['Label'] = GetLang('ShipQuotePrice');

				// Get each available shipping option and display it
				$GLOBALS['Message'] = "";

				if(!is_array($result)) {
					$result = array($result);
				}

				foreach($result as $quote) {
					if(sizeof($result) > 1) {
						$GLOBALS['Message'] .= "<li>";
					}

					$GLOBALS['Message'] .= $quote->getdesc(false) . " - $" . number_format($quote->getprice(), GetConfig('DecimalPlaces')) . " USD";

					if(sizeof($result) > 1) {
						$GLOBALS['Message'] .= "</li>";
					}
				}
			}

			$GLOBALS['Image'] = $this->_image;
			$this->ParseTemplate("module.usps.testresult");
		}

		function GetQuote()
		{
			// The following array will be returned to the calling function.
			// It will contain at least one ISC_SHIPPING_QUOTE object if
			// the shipping quote was successful.

			$usps_quote = array();

			// Is this an international quote?
			if($this->_origincountry != $this->_destcountry) {
				$this->_api = "IntlRate";
			} else {
				$this->_api = "RateV3";
			}

			// Build the start of the USPS XML query - password can be anything but empty
			$usps_xml = sprintf("<%sRequest USERID=\"%s\">", $this->_api, $this->_username);
			$usps_xml .= "<Package ID=\"0\">";

			// Which server are we shipping with?
			if($this->_service == "PARCEL") {
				$usps_xml .= "<Service>PARCEL</Service>";
			}
			else {
				$usps_xml .= sprintf("<Service>%s</Service>", $this->_service);
			}

			if($this->_service == "FIRST CLASS" || $this->_service == "PARCEL") {
				$usps_xml .= "<FirstClassMailType>PARCEL</FirstClassMailType>";
			}

			// Is the weight in pounds or pounds and ounces?
			$ounces = (int)ConvertWeight($this->_weight, 'ounces');
			$pounds = (int)ConvertWeight($this->_weight, 'pounds');
			$weight_xml = sprintf("<Pounds>%s</Pounds>", $pounds);
			$weight_xml .= sprintf("<Ounces>%s</Ounces>", $ounces);

			// Must output weight before mailtype for international
			if($this->_api == "IntlRate") {
				$usps_xml .= $weight_xml;
			}

			if($this->_api == "IntlRate") {
				$usps_xml .= "<MailType>Package</MailType>";
				$usps_xml .= sprintf("<Country>%s</Country>", $this->_destcountry);
			}
			else {
				$usps_xml .= sprintf("<ZipOrigination>%s</ZipOrigination>", $this->_originzip);
				$usps_xml .= sprintf("<ZipDestination>%s</ZipDestination>", $this->_destzip);
			}

			// Must output weight after mailtype for domestic
			if($this->_api != "IntlRate") {
				$usps_xml .= $weight_xml;
			}

			// Which container to use depends on which method was chosen
			switch($this->_service) {
				case "EXPRESS": {
					$this->_container = $this->_expressmailcontainertype;
					$this->_size = $this->_expressmailpackagesize;
					break;
				}
				case "FIRST CLASS": {
					$this->_container = $this->_firstclasscontainertype;
					$this->_size = $this->_firstclasspackagesize;
					break;
				}
				case "PRIORITY": {
					$this->_container = $this->_prioritycontainertype;
					$this->_size = $this->_prioritypackagesize;
					break;
				}
				case "PARCEL": {
					$this->_size = $this->_parcelpostmachpackagesize;
					break;
				}
				case "BPM": {
					$this->_size = $this->_bpmpackagesize;
					break;
				}
				case "LIBRARY": {
					$this->_size = $this->_librarypackagesize;
					break;
				}
				case "MEDIA": {
					$this->_size = $this->_mediapackagesize;
					break;
				}
			}

			$this->_container = $this->GetContainerType($this->_container);

			$this->_size = $this->GetContainerSize($this->_size);

			$usps_xml .= sprintf("<Container>%s</Container>", $this->_container);
			$usps_xml .= sprintf("<Size>%s</Size>", $this->_size);

			if($this->_service == "PRIORITY" && $this->_size == "LARGE") {
				$usps_xml .= sprintf("<Width>%s</Width>", $this->_prioritywidth);
				$usps_xml .= sprintf("<Length>%s</Length>", $this->_prioritylength);
				$usps_xml .= sprintf("<Height>%s</Height>", $this->_priorityheight);

				if($this->_prioritygirth > 0) {
					$usps_xml .= sprintf("<Girth>%s</Girth>", $this->_prioritygirth);
				}
			}

			// Add the Machinable element if it's a parcel post
			if($this->_service == "PARCEL") {
				$usps_xml .= "<Machinable>true</Machinable>";
			}

			$usps_xml .= "</Package>";
			$usps_xml .= sprintf("</%sRequest>", $this->_api);

			// If it's an international quote then we'll strip out
			// the service, container and size elements
			if($this->_api == "IntlRate") {
				$usps_xml = preg_replace("#<Service>(.*)</Service>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Container>(.*)</Container>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Size>(.*)</Size>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Width>(.*)</Width>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Length>(.*)</Length>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Height>(.*)</Height>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Girth>(.*)</Girth>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<FirstClassMailType>(.*)</FirstClassMailType>#si", "", $usps_xml);
				$usps_xml = preg_replace("#<Machinable>(.*)</Machinable>#si", "", $usps_xml);
			}

			// Connect to USPS to retrieve a live shipping quote
			$result = "";
			$valid_quote = false;

			// Should we test on the test or production server?
			$usps_mode = $this->GetValue("servertype");

			if($usps_mode == "test") {
				$usps_url = "http://testing.shippingapis.com/ShippingAPITest.dll?";
			} else {
				$usps_url = "http://production.shippingapis.com/ShippingAPI.dll?";
			}

			$post_vars = implode("&",
			array("API=$this->_api",
				"XML=$usps_xml"
				)
			);

			if(function_exists("curl_exec")) {
				// Use CURL if it's available
				$ch = @curl_init($usps_url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars);
				curl_setopt($ch, CURLOPT_TIMEOUT, 60);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

				// Setup the proxy settings if there are any
				if (GetConfig('HTTPProxyServer')) {
					curl_setopt($ch, CURLOPT_PROXY, GetConfig('HTTPProxyServer'));
					if (GetConfig('HTTPProxyPort')) {
						curl_setopt($ch, CURLOPT_PROXYPORT, GetConfig('HTTPProxyPort'));
					}
				}

				if (GetConfig('HTTPSSLVerifyPeer') == 0) {
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				}

				$result = curl_exec($ch);

				if($result != "") {
					$valid_quote = true;
				}
			}

			$this->DebugLog($result);

			if($valid_quote) {
				// Was the user authenticated?
				if(is_numeric(isc_strpos($result, "Authorization failure"))) {
					$this->SetError(GetLang('USPSAuthError'));
					return false;
				}
				else {
					$xml = xmlize($result);

					// Are we dealing with a domestic or international shipment?
					if(isset($xml['RateV3Response'])) {
						// Domestic
						if(is_numeric(isc_strpos($result, "Error"))) {
							// Bad quote
							$this->SetError($xml['RateV3Response']["#"]['Package'][0]["#"]['Error'][0]["#"]['Description'][0]["#"]);
							return false;
						}
						else {
							// Create a quote object
							$quote = new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetDisplayName(), $xml['RateV3Response']["#"]['Package'][0]["#"]['Postage'][0]["#"]['Rate'][0]["#"], $xml['RateV3Response']["#"]['Package'][0]["#"]['Postage'][0]["#"]['MailService'][0]["#"]);
							return $quote;
						}
					}
					else if(isset($xml['IntlRateResponse'])) {
						// International
						if(is_numeric(isc_strpos($result, "Error"))) {
							// Bad quote
							$this->SetError($xml['IntlRateResponse']["#"]['Package'][0]["#"]['Error'][0]["#"]['Description'][0]["#"]);
							return false;
						}
						else {
							// Success
							// Create a quote object
							$quote = new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetDisplayName(), $xml['IntlRateResponse']["#"]['Package'][0]["#"]['Service'][0]["#"]['Postage'][0]["#"]);
							return $quote;
						}
					}
					else if(isset($xml['Error'])) {
						// Error
						$this->SetError($xml['Error']["#"]['Description'][0]["#"]);
						return false;
					}
				}
			}
			else {
				// Couldn't get to USPS
				$this->SetError(GetLang('USPSOpenError'));
				return false;
			}
		}

		function GetServiceQuotes()
		{
			$QuoteList = array();

			// Set the USPS-specific variables
			$api = "";
			$pounds = 0;
			$ounces = 0;

			// Setup all of the shipping variables
			$this->_username = $this->GetValue("username");
			$this->_origincountry = GetConfig('CompanyCountry');
			$this->_originzip = GetConfig('CompanyZip');
			$this->_destcountry = $this->_destination_country['country_name'];
			$this->_destzip = $this->_destination_zip;

			// Is express mail enabled?
			if($this->GetValue("expressmailstatus") == "enabled") {
				$this->_service = "EXPRESS";
				$this->_expressmailcontainertype = $this->GetValue("expressmailcontainertype");
				$this->_expressmailpackagesize = $this->GetValue("expressmailpackagesize");

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}

			// Is first class enabled?
			if($this->GetValue("firstclassstatus") == "enabled") {
				$this->_service = "FIRST CLASS";
				$this->_firstclasscontainertype = "F";
				$this->_firstclasspackagesize = $this->GetValue("firstclasspackagesize");

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}

			// Is priority mail enabled?
			if($this->GetValue("prioritymailstatus") == "enabled") {
				$this->_service = "PRIORITY";
				$this->_prioritycontainertype = $this->GetValue("prioritymailcontainertype");
				$this->_prioritypackagesize = $this->GetValue("prioritymailpackagesize");

				// If it's a large box we need to specify dimensions
				if($this->_prioritypackagesize == "L") {
					$this->_prioritycontainertype = "R";
					$dimensions = $this->getcombinedshipdimensions();
					$this->_prioritywidth = $dimensions['width'];
					$this->_prioritylength = $dimensions['length'];
					$this->_priorityheight = $dimensions['height'];
				}

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}

			// Is parcel post (machinable) enabled?
			if($this->GetValue("parcelpostmachinablestatus") == "enabled") {
				$this->_service = "PARCEL";
				$this->_parcelpostmachpackagesize = $this->GetValue("parcelpostmachinablepackagesize");

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}

			// Is BPM enabled?
			if($this->GetValue("bpmstatus") == "enabled") {
				$this->_service = "BPM";
				$this->_bpmpackagesize = $this->GetValue("bpmpackagesize");

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}

			// Is library enabled?
			if($this->GetValue("librarystatus") == "enabled") {
				$this->_service = "LIBRARY";
				$this->_librarypackagesize = $this->GetValue("librarypackagesize");

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}

			// Is media enabled?
			if($this->GetValue("mediastatus") == "enabled") {
				$this->_service = "MEDIA";
				$this->_mediapackagesize = $this->GetValue("mediapackagesize");

				// Next actually retrieve the quote
				$result = $this->GetQuote();
				if(is_object($result)) {
					$QuoteList[] = $result;
				}
				else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_service.": " .GetLang('ShippingQuoteError'), $error);
					}
				}
			}
			return $QuoteList;
		}

		function GetTrackingLink()
		{
			return "http://www.usps.com/shipping/trackandconfirm.htm";
		}

		function GetContainerType($container)
		{
			$result = '';

			switch($container) {
				case "F": {
					$result = "FLAT RATE ENVELOPE";
					break;
				}
				case "B": {
					$result = "FLAT RATE BOX";
					break;
				}
				case "R": {
					$result = "RECTANGULAR";
					break;
				}
				case "N": {
					$result = "NONRECTANGULAR";
					break;
				}
			}

			return $result;
		}

		function GetContainerSize($size)
		{
			$result = '';

			switch($size) {
				case "R": {
					$result = "REGULAR";
					break;
				}
				case "L": {
					$result = "LARGE";
					break;
				}
				case "O": {
					$result = "OVERSIZE";
					break;
				}
			}

			return $result;
		}


		/**
		 * Get a human readable list of of the delivery methods available for the shipping module
		 *
		 * @return array
		 **/
		public function GetAvailableDeliveryMethods()
		{
			$methods = array();

			// Is express mail enabled ?
			if ($this->GetValue("expressmailstatus") == "enabled") {
				$method = "EXPRESS ".$this->GetContainerType($this->GetValue("expressmailcontainertype"));
				$methods[] = $method;
			}

			// Is first class enabled?
			if ($this->GetValue("firstclassstatus") == "enabled") {
				$method = "FIRST CLASS ".$this->GetContainerSize($this->GetValue("firstclasspackagesize"));
				$methods[] = $method;
			}

			// Is priority mail enabled?
			if ($this->GetValue("prioritymailstatus") == "enabled") {
				$method = "PRIORITY ".$this->GetContainerType($this->GetValue("prioritymailcontainertype"));
				$methods[] = $method;
			}

			// Is parcel post (machinable) enabled?
			if ($this->GetValue("parcelpostmachinablestatus") == "enabled") {
				$method = "PARCEL ".$this->GetContainerSize($this->GetValue("parcelpostmachinablepackagesize"));
				$methods[] = $method;
			}

			// Is BPM enabled?
			if ($this->GetValue("bpmstatus") == "enabled") {
				$method = "BPM ";
				$methods[] = $method;
			}

			// Is library enabled?
			if ($this->GetValue("librarystatus") == "enabled") {
				$method = "LIBRARY ".$this->GetContainerSize($this->GetValue("librarypackagesize"));
				$methods[] = $method;
			}

			// Is media enabled?
			if ($this->GetValue("mediastatus") == "enabled") {
				$method = "MEDIA ".$this->GetContainerSize($this->GetValue("mediapackagesize"));
				$methods[] = $method;
			}

			$displayName = $this->GetDisplayName();

			foreach ($methods as $key => $method) {
				$methods[$key] = $displayName.' '.$method;
			}

			return $methods;
		}

	}

?>