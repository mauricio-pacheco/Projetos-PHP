<?php

	/**
	* This is the Australia Post shipping module for Interspire Shopping Cart. To enable
	* Australia Post in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Shipping Settings tab in the menu.
	*/
	class SHIPPING_AUSPOST extends ISC_SHIPPING
	{

		/**
		* Variables for the Australia Post shipping module
		*/

		/*
			The delivery type for Australia Post shipments
		*/
		var $_deliverytype = "";

		/*
			The origin country ISO code for Australia Post shipments
		*/
		var $_origincountry = "";

		/*
			The origin country zip for Australia Post shipments
		*/
		var $_originzip = "";

		/*
			The destination country ISO code for Australia Post shipments
		*/
		var $_destcountry = "";

		/*
			The destination country zip for Australia Post shipments
		*/
		var $_destzip = "";

		/*
			The total length dimension of all products in the shipment
		*/
		var $_totallength = 0;

		/*
			The total width dimension of all products in the shipment
		*/
		var $_totalwidth = 0;

		/*
			The total height dimension of all products in the shipment
		*/
		var $_totalheight = 0;

		/*
			The total number of packages in the shipment
		*/
		var $_totalpackages = 0;

		/*
			The types of delivery types supported by this provider
		*/
		var $_deliverytypes = array();

		/**
		 * @var array Array containing the shipping method's delivery types that are international.
		 */
		private $internationalTypes = array(
			'ECI_D',
			'ECI_M',
			'Air',
			'Sea'
		);

		/**
		* Functions for the Australia Post shipping module
		*/

		/*
			Shipping class constructor
		*/
		function SHIPPING_AUSPOST()
		{

			// Setup the required variables for the Australia Post shipping module
			parent::__construct();
			$this->_name = GetLang('AusPostName');
			$this->_image = "auspost_logo.gif";
			$this->_description = GetLang('AusPostDesc');
			$this->_help = GetLang('AusPostHelp');
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 315;
			$this->_deliverytypes = array(
				"Express" => GetLang('AusPostDeliveryType1'),
				"Standard" => GetLang('AusPostDeliveryType2'),
				"ECI_D" => GetLang('AusPostDeliveryType3'),
				"ECI_M" => GetLang('AusPostDeliveryType4'),
				"Air" => GetLang('AusPostDeliveryType5'),
				"Sea" => GetLang('AusPostDeliveryType6')
			);

			// Australia Post is only available in Australia
			$this->_countries = array("Australia");
		}

		/**
		* Custom variables for the shipping module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{

			$this->_variables['deliverytypes'] = array("name" => "Delivery Types",
			   "type" => "dropdown",
			   "help" => GetLang('AusPostDeliveryTypesHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(),
				"multiselect" => true,
				"multiselectheight" => 7
			);

			foreach($this->_deliverytypes as $type => $name) {
				$this->_variables['deliverytypes']['options'][$name] = $type;
			}

			$this->_variables['packingmethod'] = array("name" => "Packing Method",
			   "type" => "dropdown",
			   "help" => GetLang('AusPostPackingMethodHelp'),
			   "default" => "",
			   "required" => false,
			   "options" => array(GetLang('AusPostPackingMethod1') => "single",
							  GetLang('AusPostPackingMethod2') => "multiple"
							),
				"multiselect" => false
			);
		}

		/**
		* Test the shipping method by displaying a simple HTML form
		*/
		function TestQuoteForm()
		{

			$GLOBALS['DeliveryTypes'] = "";
			$del_types = $this->GetValue("deliverytypes");

			if(!is_array($del_types)) {
				$del_types = array($del_types);
			}

			// Load up the module variables
			$this->SetCustomVars();

			foreach($this->_variables['deliverytypes']['options'] as $k=>$v) {
				if(in_array($v, $del_types)) {
					$sel = 'selected="selected"';
				} else {
					$sel = "";
				}

				$GLOBALS['DeliveryTypes'] .= sprintf("<option %s value='%s'>%s</option>", $sel, $v, $k);
			}

			// Which countries has the user chosen to ship orders to?
			$GLOBALS['Countries'] = GetCountryList("Australia");

			$GLOBALS['Image'] = $this->_image;

			$this->ParseTemplate("module.auspost.test");
		}

		/**
		* Get the shipping quote and display it in a form
		*/
		function TestQuoteResult()
		{

			// Add a single test item - no dimensions needed for UPS
			$this->AddItem($_POST['delivery_weight'],
						   $_POST['delivery_length'],
						   $_POST['delivery_width'],
						   $_POST['delivery_height']
			);

			$this->_deliverytype = $_POST['delivery_type'];
			$this->_origincountry = GetCountryISO2ByName(GetConfig('CompanyCountry'));
			$this->_originzip = GetConfig('CompanyZip');
			$this->_destcountry = GetCountryISO2ById($_POST['delivery_country']);
			$this->_destzip = $_POST['delivery_postcode'];

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

					$GLOBALS['Message'] .= $quote->getdesc(false) . " - $" . $quote->getprice() . " AUD, " . $quote->gettransit() . " day(s)";

					if(sizeof($result) > 1) {
						$GLOBALS['Message'] .= "</li>";
					}
				}
			}

			$GLOBALS['Image'] = $this->_image;
			$this->ParseTemplate("module.auspost.testresult");
		}

		function GetQuote()
		{
			$packages = $this->BuildPackages();
			$shippingCharge = 0;
			$transitTime = 0;

			// Set the description of the method
			$description = "";

			// Load up the module variables
			$this->SetCustomVars();

			foreach($this->_variables['deliverytypes']['options'] as $k=>$v) {
				if($v == $this->_deliverytype) {
					$description = $k;
				}
			}

			// Now loop through all of the packages we'll be sending
			foreach($packages as $package) {
				// Convert the dimensions, and convert the weight to grams
				$height	= ConvertLength($package['height'], 'mm');
				$length	= ConvertLength($package['length'], 'mm');
				$width	= ConvertLength($package['width'], 'mm');
				$weight = ConvertWeight($package['weight'], 'grams');

				if($length < '250') {
					$length =  '250';
				}

				$data = array();

				// Connect to Australia Post to retrieve a live shipping quote
				$validQuote = false;
				$ausPostURL = 'http://drc.edeliver.com.au/ratecalc.asp?';
				$postVars = array(
					'Height' => $height,
					'Length' => $length,
					'Width' => $width,
					'Weight' => $weight,
					'Quantity' => 1,
					'Pickup_Postcode' => $this->_originzip,
					'Destination_Postcode' => $this->_destzip,
					'Country' => $this->_destcountry,
					'Service_Type' => $this->_deliverytype
				);

				$postRequest = '';
				foreach($postVars as $k => $v) {
					$postRequest .= '&'.$k.'='.urlencode($v);
				}
				$postRequest = ltrim($postRequest, '&');

				$result = PostToRemoteFileAndGetResponse($ausPostURL, $postRequest);
				if($result !== false) {
					$result = str_replace("\n", "&", $result);
					$result = str_replace("\r", "", $result);
					$result = rtrim($result, '&');
					parse_str($result, $data);

					if(isset($data['charge']) && isset($data['days']) && isset($data['err_msg']) && $data['err_msg'] == "OK") {
						$shippingCharge += $data['charge'];
						$transitTime = max($transitTime, $data['days']);
					}
					// Shipping quote failed, return false
					else {
						if(isset($data['err_msg'])) {
							$this->SetError($data['err_msg']);
							return false;
						} else {
							$this->SetError(GetLang('AusPostOpenError'));
							return false;
						}
					}
				}
				else {
					$this->SetError(GetLang('AusPostOpenError'));
					return false;
				}
			}

			// OK, so create the actual quote
			$packageCount = '';
			if(count($packages) > 1) {
				$packageCount = count($packages). ' x ';
			}
			$quote = new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetDisplayName(), number_format($shippingCharge, 2), $packageCount.$description, $transitTime);
			return $quote;
		}

		function GetServiceQuotes()
		{
			$QuoteList = array();

			// Set the Australia Post-specific variables
			$this->_origincountry = GetCountryISO2ByName(GetConfig('CompanyCountry'));
			$this->_originzip = GetConfig('CompanyZip');
			$this->_destcountry = $this->_destination_country['country_iso'];
			$this->_destzip = $this->_destination_zip;

			// Get the selected delivery types
			$delivery_types = $this->GetValue("deliverytypes");

			if(!is_array($delivery_types) && $delivery_types != "") {
				$delivery_types = array($delivery_types);
			}

			foreach($delivery_types as $delivery_type) {
				// Only perform lookups for quotes we can fetch - so don't bother trying for quotes for local services when shipping internationally
				if((in_array($delivery_type, $this->internationalTypes))) {
					if($this->_origincountry == $this->_destcountry) {
						continue;
					}
				}
				else {
					if($this->_origincountry != $this->_destcountry) {
						continue;
					}
				}

				$this->_deliverytype = $delivery_type;

				// Next actually retrieve the quote
				$err = "";
				$result = $this->GetQuote($err);

				// Was it a valid quote?
				if(is_object($result)) {
					$QuoteList[] = $result;
				// Invalid quote, log the error
				} else {
					foreach($this->GetErrors() as $error) {
						$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), $this->_deliverytypes[$delivery_type].": " .GetLang('ShippingQuoteError'), $error);
					}
					$this->ResetErrors();
				}
			}
			return $QuoteList;
		}

		function GetTrackingLink()
		{
			return "http://ice.auspost.com.au";
		}

		public function BuildPackages()
		{
			$packages = array();

			// Everything is going to be sent in different packages, break down per item
			if($this->GetValue('packingmethod') == 'multiple') {
				foreach($this->_products as $product) {
					for($i = 1; $i <= $product->GetQuantity(); ++$i) {
						$packages[] = array(
							'height'	=> $product->GetHeight(),
							'width'		=> $product->GetWidth(),
							'length'	=> $product->GetLength(),
							'weight'	=> $product->GetWeight(),
							'items'		=> 1
						);
					}
				}
				return $packages;
			}
			// Everything is going in the one package, simply calculate the dimensions
			else {
				// Workout the dimensions of the package Australia posts measures in grams and cms hence the multiplication
				$dimensions = $this->getcombinedshipdimensions();
				$dimensions['weight'] = $this->GetWeight();
				$dimensions['items'] = count($this->_products);
				$packages[] = $dimensions;
				return $packages;
			}
		}

		/**
		 * Get a human readable list of of the delivery methods available for the shipping module
		 *
		 * @return array
		 **/
		public function GetAvailableDeliveryMethods()
		{
			$methods = array();

			// Get the selected delivery types
			$delivery_types = $this->GetValue("deliverytypes");

			if(!is_array($delivery_types) && $delivery_types != "") {
				$delivery_types = array($delivery_types);
			}

			foreach($delivery_types as $delivery_type) {
				$methods[] = $this->_deliverytypes[$delivery_type];
			}

			return $methods;
		}
	}

?>
