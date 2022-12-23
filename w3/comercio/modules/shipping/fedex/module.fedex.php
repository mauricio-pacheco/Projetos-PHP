<?php

	/*
		Include the XMLize xml class
	*/
	require_once(ISC_BASE_PATH."/includes/classes/class.xmlize.php");

	/**
	* This is the FedEx shipping module for Interspire Shopping Cart. To enable
	* FedEx in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Shipping Settings tab in the menu.
	*/
	class SHIPPING_FEDEX extends ISC_SHIPPING
	{

		/**
		* Variables for the FedEx shipping module
		*/

		/*
			The carrier code for the FedEx shipping quote
		*/
		var $_carriercode = "";

		/*
			The dropoff type for FedEx shipments
		*/
		var $_dropofftype = "";

		/*
			The shop owners FedEx account number
		*/
		var $_accountno = 0;

		/*
			The shop owners FedEx meter number
		*/
		var $_meterno = 0;

		/*
			The service for FedEx shipments
		*/
		var $_service = "";

		/*
			The destination country ISO code for FedEx shipments
		*/
		var $_destcountry = "";

		/*
			The origin state ISO code for FedEx shipments
		*/
		var $_originstate = "";

		/*
			The destination state ISO code for FedEx shipments
		*/
		var $_deststate = "";

		/*
			The destination country zip for FedEx shipments
		*/
		var $_destzip = "";

		/*
			The packaging type for FedEx shipments
		*/
		var $_packagingtype = "";

		/*
			The types of delivery types supported by this provider
		*/
		var $_deliverytypes = array();

		/**
		 * A list of international service types. All other services are domestic.
		 */
		private $_internationalservices = array(
			'INTERNATIONALPRIORITY',
			'INTERNATIONALECONOMY',
			'INTERNATIONALFIRST',
			'INTERNATIONALPRIORITY FREIGHT',
			'INTERNATIONALECONOMY FREIGHT',
			'EUROPEFIRSTINTERNATIONALPRIORITY'
		);

		/**
		* Functions for the FedEx shipping module
		*/

		/*
			Shipping class constructor
		*/
		function SHIPPING_FEDEX()
		{

			// Setup the required variables for the FedEx shipping module
			parent::__construct();
			$this->_name = GetLang('FedExName');
			$this->_image = "fedex_logo.gif";
			$this->_description = GetLang('FedExDesc');
			$this->_help = GetLang('FedExHelp');
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 290;
			$this->_servicetypes = array(
				"PRIORITYOVERNIGHT" => GetLang('FedExServiceType1'),
				"STANDARDOVERNIGHT" => GetLang('FedExServiceType2'),
				"FIRSTOVERNIGHT" => GetLang('FedExServiceType3'),
				"FEDEX2DAY" => GetLang('FedExServiceType4'),
				"FEDEXEXPRESSSAVER" => GetLang('FedExServiceType5'),
				"INTERNATIONALPRIORITY" => GetLang('FedExServiceType6'),
				"INTERNATIONALECONOMY" => GetLang('FedExServiceType7'),
				"INTERNATIONALFIRST" => GetLang('FedExServiceType8'),
				"FEDEX1DAYFREIGHT" => GetLang('FedExServiceType9'),
				"FEDEX2DAYFREIGHT" => GetLang('FedExServiceType10'),
				"FEDEX3DAYFREIGHT" => GetLang('FedExServiceType11'),
				"FEDEXGROUND" => GetLang('FedExServiceType12'),
				"GROUNDHOMEDELIVERY" => GetLang('FedExServiceType13'),
				"INTERNATIONALPRIORITY FREIGHT" => GetLang('FedExServiceType14'),
				"INTERNATIONALECONOMY FREIGHT" => GetLang('FedExServiceType15'),
				"EUROPEFIRSTINTERNATIONALPRIORITY" => GetLang('FedExServiceType16')
			);

			$this->_deliverytypes = array(
				"FDXE" => GetLang('FedExDeliveryType1'),
				"FDXG" => GetLang('FedExDeliveryType2')
			);

			// FedEx is available worldwide
			$this->_countries = array("all");
		}

		/*
		 * Check if this shipping module can be enabled or not.
		 *
		 * @return boolean True if this module is supported on this install, false if not.
		 */
		function IsSupported()
		{
			if(!function_exists("curl_exec")) {
				$this->SetError(GetLang('FedExErrorNoCurl'));
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

			$this->_variables['accountno'] = array("name" => "Account Number",
			   "type" => "textbox",
			   "help" => GetLang('FedExAccountNumberHelp'),
			   "default" => "123123123",
			   "required" => true
			);

			$this->_variables['meterno'] = array("name" => "Meter Number",
			   "type" => "textbox",
			   "help" => GetLang('FedExMeterNumberHelp'),
			   "default" => "0",
			   "required" => true
			);

			$this->_variables['service'] = array("name" => "Service Types",
			   "type" => "dropdown",
			   "help" => GetLang('FedExServiceHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(),
				"multiselect" => true,
				"multiselectheight" => 5
			);

			foreach($this->_servicetypes as $type => $name) {
				$this->_variables['service']['options'][$name] = $type;
			}

			$this->_variables['carriercode'] = array("name" => "Delivery Types",
			   "type" => "dropdown",
			   "help" => GetLang('FedExDeliveryTypesHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(),
				"multiselect" => true,
				"multiselectheight" => 3
			);

			foreach($this->_deliverytypes as $type => $name) {
				$this->_variables['carriercode']['options'][$name] = $type;
			}

			$this->_variables['dropofftype'] = array("name" => "Drop-Off Type",
			   "type" => "dropdown",
			   "help" => GetLang('FedExDropOffTypeHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('FedExDropOffType1') => "REGULARPICKUP",
							  GetLang('FedExDropOffType2') => "REQUESTCOURIER",
							  GetLang('FedExDropOffType3') => "DROPBOX",
							  GetLang('FedExDropOffType4') => "BUSINESSSERVICE CENTER",
							  GetLang('FedExDropOffType5') => "STATION"
							),
				"multiselect" => false
			);

			$this->_variables['packagingtype'] = array("name" => "Packaging Type",
			   "type" => "dropdown",
			   "help" => GetLang('FedExPackagingTypeHelp'),
			   "default" => "YOURPACKAGING",
			   "required" => true,
			   "options" => array(GetLang('FedExPackagingType1') => "FEDEXENVELOPE",
							  GetLang('FedExPackagingType2') => "FEDEXPAK",
							  GetLang('FedExPackagingType3') => "FEDEXBOX",
							  GetLang('FedExPackagingType4') => "FEDEXTUBE",
							  GetLang('FedExPackagingType5') => "FEDEX10KGBOX",
							  GetLang('FedExPackagingType6') => "FEDEX25KGBOX",
							  GetLang('FedExPackagingType7') => "YOURPACKAGING"
							),
				"multiselect" => false
			);
		}

		/**
		* Test the shipping method by displaying a simple HTML form
		*/
		function TestQuoteForm()
		{

			$GLOBALS['ServiceTypes'] = "";
			$service_types = $this->GetValue("service");

			if(!is_array($service_types)) {
				$service_types = array($service_types);
			}

			// Load up the module variables
			$this->SetCustomVars();

			foreach($this->_variables['service']['options'] as $k=>$v) {
				if(in_array($v, $service_types)) {
					$sel = 'selected="selected"';
				} else {
					$sel = "";
				}
				$GLOBALS['ServiceTypes'] .= sprintf("<option %s value='%s'>%s</option>", $sel, $v, $k);
			}

			$GLOBALS['DeliveryTypes'] = "";
			$del_types = $this->GetValue("carriercode");

			if(!is_array($del_types)) {
				$del_types = array($del_types);
			}

			foreach($this->_variables['carriercode']['options'] as $k=>$v) {
				if(in_array($v, $del_types)) {
					$sel = 'selected="selected"';
				} else {
					$sel = "";
				}
				$GLOBALS['DeliveryTypes'] .= sprintf("<option %s value='%s'>%s</option>", $sel, $v, $k);
			}

			// Which countries has the user chosen to ship orders to?
			$first_country = "United States";
			$GLOBALS['Countries'] = GetCountryList("United States");

			$GLOBALS['Measurement'] = isc_strtolower(GetConfig('sMeasurement'));

			$num_states = 0;
			$GLOBALS['StateList'] = $state_options = GetStatesByCountryNameAsOptions($first_country, $num_states);

			$GLOBALS['Image'] = $this->_image;

			$this->ParseTemplate("module.fedex.test");
		}

		/**
		* Get the shipping quote and display it in a form
		*/
		function TestQuoteResult()
		{

			// Add a single test item - no dimensions needed for FedEx
			$this->additem($_POST['delivery_weight']);

			// Setup all of the shipping variables
			$this->_deliverytype = $_POST['delivery_type'];
			$this->_origincountry = GetCountryISO2ByName(GetConfig('CompanyCountry'));
			$this->_originzip = GetConfig('CompanyZip');
			$this->_destcountry = GetCountryISO2ById($_POST['delivery_country']);
			$this->_deststate = GetStateISO2ById($_POST['delivery_state']);
			$this->_destzip = $_POST['delivery_zip'];
			$this->_service = $_POST['service_type'];
			$this->_carriercode = $_POST['delivery_type'];

			$this->_dropofftype = $this->GetValue("dropofftype");
			$this->_accountno = $this->GetValue("accountno");
			$this->_meterno = $this->GetValue("meterno");
			$this->_packagingtype = $this->GetValue("packagingtype");

			// Next actually retrieve the quote
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

					$GLOBALS['Message'] .= $quote->getdesc(false) . " - $" . $quote->getprice() . " USD";

					if(sizeof($result) > 1) {
						$GLOBALS['Message'] .= "</li>";
					}
				}
			}

			$GLOBALS['Image'] = $this->_image;
			$this->ParseTemplate("module.fedex.testresult");
		}

		function GetQuote()
		{

			// The following array will be returned to the calling function.
			// It will contain at least one ISC_SHIPPING_QUOTE object if
			// the shipping quote was successful.

			$fx_quote = array();

			// Connect to FedEx to retrieve a live shipping quote
			$items = "";
			$result = "";
			$valid_quote = false;
			$fx_url = "https://gateway.fedex.com/GatewayDC";

			$weight = number_format(max(ConvertWeight($this->_weight, 'kgs'), 0.1), 1);

			// If we're shipping from US or Canada, originstate is required
			if(GetConfig('CompanyCountry') == "United States" || GetConfig('CompanyCountry') == "Canada") {
				$this->_originstate = GetStateISO2ByName(GetConfig('CompanyState'));
			}

			// If we're shipping to the US or Canada, deststate is required, otherwise it isn't - based off post codes
			if($this->_destcountry != "US" && $this->_destcountry != "CA") {
				$this->_deststate = '';
			}
			$fx_xml = sprintf("<" . "?" . "xml version=\"1.0\" encoding=\"UTF-8\" " . "?" . ">
				<FDXRateRequest xmlns:api=\"http://www.fedex.com/fsmapi\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"FDXRateRequest.xsd\">
					<RequestHeader>
						<CustomerTransactionIdentifier>Express Rate</CustomerTransactionIdentifier>
						<AccountNumber>%s</AccountNumber>
						<MeterNumber>%s</MeterNumber>
						<CarrierCode>%s</CarrierCode>
					</RequestHeader>
					<DropoffType>%s</DropoffType>
					<Service>%s</Service>
					<Packaging>%s</Packaging>
					<WeightUnits>KGS</WeightUnits>
					<Weight>%s</Weight>
					<OriginAddress>
						<StateOrProvinceCode>%s</StateOrProvinceCode>
						<PostalCode>%s</PostalCode>
						<CountryCode>%s</CountryCode>
					</OriginAddress>
					<DestinationAddress>
						<StateOrProvinceCode>%s</StateOrProvinceCode>
						<PostalCode>%s</PostalCode>
						<CountryCode>%s</CountryCode>
					</DestinationAddress>
					<Payment>
						<PayorType>SENDER</PayorType>
					</Payment>
					<PackageCount>1</PackageCount>
				</FDXRateRequest>
			", $this->_accountno, $this->_meterno, $this->_carriercode, $this->_dropofftype, $this->_service, $this->_packagingtype, $weight, $this->_originstate, $this->_originzip, $this->_origincountry, $this->_deststate, $this->_destzip, $this->_destcountry);

			$result = PostToRemoteFileAndGetResponse($fx_url, $fx_xml);
			if($result === false) {
				$valid_quote = false;
			}
			else {
				$valid_quote = true;
				$xml = @simplexml_load_string($result);
			}

			if(!$valid_quote || !is_object($xml)) {
				$this->SetError(GetLang('FedExBadResponse').' '.isc_html_escape(print_r($result, true)));
				return false;
			}

			if(isset($xml->EstimatedCharges->DiscountedCharges->NetCharge)) {
				$serviceType = $this->_deliverytypes[$this->_deliverytype].", ".$this->_servicetypes[$this->_service];
				$quote = new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetDisplayName(), (float)$xml->EstimatedCharges->DiscountedCharges->NetCharge, $serviceType);
				return $quote;
			}
			else {
				$Error = true;
				if(isset($xml->Error->Message)) {
					$this->SetError((string)$xml->Error->Message);
					return false;
				} else {
					$this->SetError(GetLang('FedExBadResponse').' '.print_r($result, true));
					return false;
				}
			}
		}

		function GetServiceQuotes()
		{
			$QuoteList = array();

			// Set the FedEx-specific variables
			$this->_origincountry = GetCountryISO2ByName(GetConfig('CompanyCountry'));
			$this->_originzip = GetConfig('CompanyZip');
			$this->_destcountry = $this->_destination_country['country_iso'];
			$this->_destzip = $this->_destination_zip;
			$this->_deststate = $this->_destination_state['state_iso'];
			$this->_dropofftype = $this->GetValue("dropofftype");
			$this->_accountno = $this->GetValue("accountno");
			$this->_meterno = $this->GetValue("meterno");
			$this->_packagingtype = $this->GetValue("packagingtype");

			// Return all available FedEx service types
			$services = $this->GetValue("service");
			if(!is_array($services) && $services != "") {
				$services = array($services);
			}

			// Return all available FedEx delivery types
			$delivery_types = $this->GetValue("carriercode");

			if(!is_array($delivery_types) && $delivery_types != "") {
				$delivery_types = array($delivery_types);
			}

			// Loop through each service using each delivery type
			foreach($services as $service) {
				// Only perform lookups for quotes we can fetch - so don't bother trying for quotes for local services when shipping internationally
				if((in_array($service, $this->_internationalservices))) {
					if($this->_origincountry == $this->_destcountry) {
						continue;
					}
				}
				else {
					if($this->_origincountry != $this->_destcountry && $this->_destcountry != "US" && $this->_destcountry != "AU") {
						continue;
					}
				}

				foreach($delivery_types as $delivery_type) {
					$this->_deliverytype = $delivery_type;
					$this->_carriercode = $delivery_type;
					$this->_service = $service;

					// Next actually retrieve the quote
					$err = "";
					$result = $this->GetQuote($err);

					// Was it a valid quote?
					if(is_object($result)) {
						$QuoteList[] = $result;
					// Invalid quote, log the error
					} else {
						foreach($this->GetErrors() as $error) {
							$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_servicetypes[$service]." / ".$this->_deliverytypes[$delivery_type].": " .GetLang('ShippingQuoteError'), $error);
						}
						$this->ResetErrors();
					}
				}

			}
			return $QuoteList;
		}

		function GetTrackingLink()
		{
			return "http://www.fedex.com/Tracking?cntry_code=us";
		}

		/**
		 * Get a human readable list of of the delivery methods available for the shipping module
		 *
		 * @return array
		 **/
		public function GetAvailableDeliveryMethods()
		{
			$methods = array();

			// Return quotes for all available UPS service types
			$services = $this->GetValue('service');

			if (!is_array($services) && $services != '') {
				$services = array($services);
			} elseif (!is_array($services)) {
				$services = array();
			}

			// Return all available FedEx delivery types
			$delivery_types = $this->GetValue('carriercode');

			if(!is_array($delivery_types) && $delivery_types != '') {
				$delivery_types = array($delivery_types);
			} elseif (!is_array($delivery_types)) {
				$delivery_types = array();
			}

			foreach ($services as $key => $service) {
				foreach ($delivery_types as $delivery_type) {
					$methods[$key] = $this->_deliverytypes[$delivery_type].' '.$this->_servicetypes[$service];
				}
			}

			return $methods;
		}
	}

?>
