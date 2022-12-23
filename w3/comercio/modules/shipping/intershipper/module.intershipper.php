<?php

	/*
		Include the XMLize xml class
	*/
	require_once(ISC_BASE_PATH."/includes/classes/class.xmlize.php");

	/**
	* This is the Intershipper shipping module for Interspire Shopping Cart. To enable
	* Intershipper in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Shipping Settings tab in the menu.
	*/
	class SHIPPING_INTERSHIPPER extends ISC_SHIPPING
	{

		/**
		* Variables for the Intershipper shipping module
		*/

		/*
			The username for Intershipper
		*/
		var $_username = "";

		/*
			The password for Intershipper
		*/
		var $_password = "";

		/*
			The carriers for the Intershipper quote
		*/
		var $_carriers = array();

		/*
			The classes for the Intershipper quote
		*/
		var $_shipclasses = array();

		/*
			The shipping method for the Intershipper quote
		*/
		var $_shippingmethod = "";

		/*
			The destination type for the Intershipper quote
		*/
		var $_destinationtype = array();

		/*
			The packing method for the Intershipper quote
		*/
		var $_packingmethod = "";

		/*
			The packaging type for the Intershipper quote
		*/
		var $_packagingtype = "";

		/*
			The sort order for Intershipper quotes
		*/
		var $_sort = "";

		/*
			The origin country zip for Intershipper shipments
		*/
		var $_originzip = "";

		/*
			The origin country ISO for Intershipper shipments
		*/
		var $_origincountry = "";

		/*
			The destination country zip for Intershipper shipments
		*/
		var $_destzip = "";

		/*
			The destination country ISO for Intershipper shipments
		*/
		var $_destcountry = "";

		/**
		* Functions for the Intershipper shipping module
		*/

		/*
			Shipping class constructor
		*/
		function SHIPPING_INTERSHIPPER()
		{

			// Setup the required variables for the Intershipper shipping module
			parent::__construct();
			$this->_name = GetLang('IntershipperName');
			$this->_image = "intershipper_logo.gif";
			$this->_description = GetLang('IntershipperDesc');
			$this->_help = GetLang('IntershipperHelp');
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 460;

			// Intershipper is available in the US only
			$this->_countries = array("United States");
		}

		/**
		* Custom variables for the shipping module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{

			$this->_variables['username'] = array("name" => "Username",
			   "type" => "textbox",
			   "help" => GetLang('IntershipperUsernameHelp'),
			   "default" => "doug",
			   "required" => true
			);

			$this->_variables['password'] = array("name" => "Password",
			   "type" => "textbox",
			   "help" => GetLang('IntershipperPasswordHelp'),
			   "default" => "password",
			   "required" => true
			);

			$this->_variables['carriers'] = array("name" => "Carriers",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperCarriersHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('IntershipperCarrier1') => "ARB",
							  GetLang('IntershipperCarrier2') => "DHL",
							  GetLang('IntershipperCarrier3') => "FDX",
							  GetLang('IntershipperCarrier4') => "UPS",
							  GetLang('IntershipperCarrier5') => "USP",
							  GetLang('IntershipperCarrier6') => "CAN",
							),
				"multiselect" => true,
				"multiselectheight" => 6
			);


			$this->_variables['shipclasses'] = array("name" => "Classes",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperClassesHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('IntershipperClass1') => "1DY",
							  GetLang('IntershipperClass2') => "2DY",
							  GetLang('IntershipperClass3') => "3DY",
							  GetLang('IntershipperClass4') => "GND"
							),
				"multiselect" => true,
				"multiselectheight" => 4
			);

			$this->_variables['packagingtype'] = array("name" => "Packaging Type",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperPackagingTypeHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('IntershipperPackagingType1') => "BOX",
							  GetLang('IntershipperPackagingType2') => "CBX",
							  GetLang('IntershipperPackagingType3') => "CPK",
							  GetLang('IntershipperPackagingType4') => "ENV",
							  GetLang('IntershipperPackagingType5') => "MEM",
							  GetLang('IntershipperPackagingType6') => "TUB"
							),
				"multiselect" => false
			);

			$this->_variables['packingmethod'] = array("name" => "Packing Method",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperPackingMethodHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('IntershipperPackingMethod1') => "single",
							  GetLang('IntershipperPackingMethod2') => "multiple"
							),
				"multiselect" => false
			);

			$this->_variables['shippingmethod'] = array("name" => "Shipping Method",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperShippingMethodHelp'),
			   "default" => "SCD",
			   "required" => true,
			   "options" => array(GetLang('IntershipperShippingMethod1') => "DRP",
							  GetLang('IntershipperShippingMethod2') => "PCK",
							  GetLang('IntershipperShippingMethod3') => "SCD"
							),
				"multiselect" => false
			);

			$this->_variables['destinationtype'] = array("name" => "Destination Type",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperDestinationHelp'),
			   "default" => "",
			   "required" => true,
			   "options" => array(GetLang('IntershipperDestination1') => "RES",
							  GetLang('IntershipperDestination2') => "COM"
							),
				"multiselect" => false
			);

			$this->_variables['sort'] = array("name" => "Sort Quotes",
			   "type" => "dropdown",
			   "help" => GetLang('IntershipperSortHelp'),
			   "default" => "Rate",
			   "required" => true,
			   "options" => array(GetLang('IntershipperSort1') => "Carrier",
							  GetLang('IntershipperSort2') => "Rate",
							  GetLang('IntershipperSort3') => "DeliveryDate"
							),
				"multiselect" => false
			);
		}

		/**
		* Test the shipping method by displaying a simple HTML form
		*/
		function TestQuoteForm()
		{

			$GLOBALS['Carriers'] = "";
			$carriers = $this->GetValue("carriers");

			if(!is_array($carriers)) {
				$carriers = array($carriers);
			}

			// Load up the module variables
			$this->SetCustomVars();

			foreach($this->_variables['carriers']['options'] as $k=>$v) {
				if(in_array($v, $carriers)) {
					$sel = 'selected="selected"';
				} else {
					$sel = "";
				}

				$GLOBALS['Carriers'] .= sprintf("<option %s value='%s'>%s</option>", $sel, $v, $k);
			}

			// Which countries has the user chosen to ship orders to?
			$GLOBALS['Countries'] = GetCountryList("United States");

			$GLOBALS['Measurement'] = isc_strtolower(GetConfig('WeightMeasurement'));
			$GLOBALS['Image'] = $this->_image;

			$this->ParseTemplate("module.intershipper.test");
		}

		/**
		* Get the shipping quote and display it in a form
		*/
		function TestQuoteResult()
		{

			// Add a single test item - dimensions needed for Intershipper
			$this->additem($_POST['delivery_weight'], $_POST['delivery_length'], $_POST['delivery_width'], $_POST['delivery_height'], 1, "Item #1");

			$this->_username = $this->GetValue("username");
			$this->_password = $this->GetValue("password");
			$this->_originzip = GetConfig('CompanyZip');
			$this->_origincountry = GetCountryISO2ByName(GetConfig('CompanyCountry'));
			$this->_shipclasses = $this->GetValue("shipclasses");
			$this->_destinationtype = $this->GetValue("destinationtype");
			$this->_shippingmethod = $this->GetValue("shippingmethod");
			$this->_packingmethod = $this->GetValue("packingmethod");
			$this->_packagingtype = $this->GetValue("packagingtype");
			$this->_sort = $this->GetValue("sort");
			$this->_carriers = $_POST['delivery_carriers'];
			$this->_destzip = $_POST['delivery_zip'];
			$this->_destcountry = GetCountryISO2ById($_POST['delivery_country']);

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

					if($quote->gettransit() != -1) {
						if($quote->gettransit() == 0) {
							// Same day
							$transit = ", today";
						}
						else {
							$transit = ", " . $quote->gettransit() . " day(s)";
						}
					}
					else {
						$transit = "";
					}

					$GLOBALS['Message'] .= $quote->getdesc(false) . " - $" . number_format($quote->getprice(), GetConfig('DecimalPlaces')) . " USD" . $transit;

					if(sizeof($result) > 1) {
						$GLOBALS['Message'] .= "</li>";
					}
				}
			}

			$GLOBALS['Image'] = $this->_image;
			$this->ParseTemplate("module.intershipper.testresult");
		}

		function GetQuote()
		{

			// The following array will be returned to the calling function.
			// It will contain at least one ISC_SHIPPING_QUOTE object if
			// the shipping quote was successful.

			$is_quote = array();

			// Connect to Intershipper to retrieve a live shipping quote
			$items = "";
			$result = "";
			$valid_quote = false;
			$is_url = "http://www.intershipper.com/Interface/Intershipper/XML/v2.0/HTTP.jsp?";

			// Workout the carrier data
			$carrier_data = array();
			$carrier_count = 1;

			if(!is_array($this->_carriers) && $this->_carriers != "") {
				$this->_carriers = array($this->_carriers);
			}

			foreach($this->_carriers as $carrier) {
				array_push($carrier_data, sprintf("CarrierCode%d=%s", $carrier_count, $carrier));
				array_push($carrier_data, sprintf("CarrierInvoiced%d=1", $carrier_count));
				$carrier_count++;
			}

			$post_vars = implode("&",
			array("Version=2.0.0.0",
				"Username=" . $this->_username,
				"Password=" . $this->_password,
				"TotalCarriers=" . sizeof($this->_carriers)
				)
			);

			$post_vars .= "&" . implode("&", $carrier_data);
			$post_vars .= "&TotalClasses=" . sizeof($this->_shipclasses);

			// Workout the classes data
			$class_data = array();
			$class_count = 1;

			if(!is_array($this->_shipclasses) && $this->_shipclasses != "") {
				$this->_shipclasses = array($this->_shipclasses);
			}

			foreach($this->_shipclasses as $shipclass) {
				array_push($class_data, sprintf("ClassCode%d=%s", $class_count, $shipclass));
				$class_count++;
			}

			$post_vars .= "&" . implode("&", $class_data) . "&";

			$post_vars .= implode("&",
			array("DeliveryType=" . $this->_destinationtype,
				"ShipMethod=" . $this->_shippingmethod,
				"OriginationPostal=" . $this->_originzip,
				"OriginationCountry=" . $this->_origincountry,
				"DestinationPostal=" . $this->_destzip,
				"DestinationCountry=" . $this->_destcountry,
				"Currency=USD",
				"SortBy=" . $this->_sort,
				"TotalPackages=" . $this->getnumproducts()
				)
			);

			// Workout the box data
			$box_data = array();
			$box_count = 1;

			
			if(isc_strtolower(GetConfig('LengthMeasurement')) == "inches") {
				$length_measure = "IN";
			} else {
				$length_measure = "CM";
			}

			foreach($this->getproducts() as $item) {
				array_push($box_data, sprintf("BoxID%d=item%d", $box_count, $box_count));
				array_push($box_data, sprintf("Weight%d=%s", $box_count, ConvertWeight($item->getweight(), 'kgs')));
				array_push($box_data, sprintf("WeightUnit%d=%s", $box_count, 'KG'));
				array_push($box_data, sprintf("Length%d=%s", $box_count, $item->getlength()));
				array_push($box_data, sprintf("Width%d=%s", $box_count, $item->getwidth()));
				array_push($box_data, sprintf("Height%d=%s", $box_count, $item->getheight()));
				array_push($box_data, sprintf("DimensionalUnit%d=%s", $box_count, $length_measure));
				array_push($box_data, sprintf("Packaging%d=%s", $box_count, $this->_packagingtype));
				array_push($box_data, sprintf("Contents%d=OTR", $box_count));
				$box_count++;
			}

			$post_vars .= "&" . implode("&", $box_data);
			$post_vars .= "&TotalOptions=0";

			if(function_exists("curl_exec")) {
				// Use CURL if it's available
				$ch = @curl_init($is_url);
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
			else {
				// Use fopen instead
				if($fp = @fopen($is_url . $post_vars, "rb")) {
					$result = "";

					while(!feof($fp)) {
						$result .= fgets($fp, 4096);
					}

					@fclose($fp);
					$valid_quote = true;
				}
			}

			if($valid_quote) {
				if(is_numeric(isc_strpos($result, "Invalid User"))) {
					$this->SetError(GetLang('IntershipperAuthError'));
					return false;
				}
				else {
					$xml = xmlize($result);

					if(isset($xml['shipment'])) {
						// Is there an error?
						if(isset($xml['shipment']["#"]['error'])) {
							$this->SetError($xml['shipment']["#"]['error'][0]["#"]);
							return false;
						}
						else {
							if(isset($xml['shipment']["#"]['package'][0]["#"]['quote'])) {
								// Successful quote

								foreach($xml['shipment']["#"]['package'][0]["#"]['quote'] as $quote) {

									$shipper = $quote["#"]['carrier'][0]["#"]['name'][0]["#"];

									// Shorten the length of the shipper's name
									// DHL
									$shipper = str_replace(" World Wide Express", "", $shipper);
									// UPS
									$shipper = str_replace("United Parcel Service", "", $shipper);
									//  FedEx
									$shipper = str_replace("Federal Express", "FedEx", $shipper);
									// USPS
									$shipper = str_replace("U.S. Postal Service", "USPS", $shipper);

									$method = $quote["#"]['service'][0]["#"]['name'][0]["#"];

									// Shorten the length of the method
									// USPS
									$method = str_replace("USP ", "", $method);

									$desc = trim(sprintf("%s %s", $shipper, $method));
									$price = $quote["#"]['rate'][0]["#"]['amount'][0]["#"] / 100;
									$transit_time = -1;

									// Workout the time in transit (if any)
									$today_stamp = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

									if(isset($quote["#"]['guaranteedarrival'])) {
										$delivered = $quote["#"]['guaranteedarrival'][0]["#"]['date'][0]["#"];
										$arr_delivered = explode("/", $delivered);

										if(sizeof($arr_delivered) == 3) {
											$delivered_stamp = mktime(0, 0, 0, $arr_delivered[0], $arr_delivered[1], $arr_delivered[2]);
											$transit_time = $delivered_stamp - $today_stamp;

											// Convert transit time to days
											$transit_time = floor($transit_time/60/60/24);
										}
									}
									else if(isset($quote["#"]['nonguaranteedarrival'])) {
										$delivered = $quote["#"]['nonguaranteedarrival'][0]["#"]['earliestarrivaldate'][0]["#"];
										$arr_delivered = explode("/", $delivered);

										if(sizeof($arr_delivered) == 3) {
											$delivered_stamp = mktime(0, 0, 0, $arr_delivered[0], $arr_delivered[1], $arr_delivered[2]);
											$transit_time = $delivered_stamp - $today_stamp;

											// Convert transit time to days
											$transit_time = floor($transit_time/60/60/24);
										}
									}

									// Create a quote object
									$quote = new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetDisplayName(), $price, $desc, $transit_time);

									// Append it to the list of shipping methods
									array_push($is_quote, $quote);
								}
							}
							else {
								$this->SetError(GetLang('IntershipperBadDestination'));
								return false;
							}
						}
					}
					else {
						// Error
						$this->SetError(GetLang('IntershipperBadResponse'));
						return false;
					}
				}
			}
			else {
				// Couldn't get to Intershipper
				$this->SetError(GetLang('IntershipperOpenError'));
				return false;
			}

			return $is_quote;
		}

		function GetServiceQuotes()
		{
			$QuoteList = array();
			// Set the Intershipper-specific variables
			$this->_username = $this->GetValue("username");
			$this->_password = $this->GetValue("password");
			$this->_originzip = GetConfig('CompanyZip');
			$this->_origincountry = GetCountryISO2ByName(GetConfig('CompanyCountry'));
			$this->_shipclasses = $this->GetValue("shipclasses");
			$this->_destinationtype = $this->GetValue("destinationtype");
			$this->_shippingmethod = $this->GetValue("shippingmethod");
			$this->_packingmethod = $this->GetValue("packingmethod");
			$this->_packagingtype = $this->GetValue("packagingtype");
			$this->_sort = $this->GetValue("sort");
			$this->_destcountry = $this->_destination_country['country_iso'];
			$this->_destzip = $this->_destination_zip;
			$this->_carriers = $this->GetValue("carriers");

			// Next actually retrieve the quote
			$err = "";
			$result = $this->GetQuote($err);

			// Was it a valid quote?
			if($err == "") {

				// Split up each quote and return them separately
				foreach($result as $quote) {
					$shipper_quote = array(new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetDisplayName(), $quote->getprice(), $quote->getdesc(), $quote->gettransit()));
					array_push($QuoteList, $shipper_quote);
				}
			}
			// Invalid quote, log the error
			else {
				$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('shipping', $this->_name), GetLang('ShippingQuoteError'), $result['error']);
			}
			return $QuoteList;
		}

		/**
		 * Get a human readable list of of the delivery methods available for the shipping module
		 *
		 * @return array
		 **/
		public function GetAvailableDeliveryMethods()
		{
			$methods = array();

			$this->SetCustomVars();

			$shipClasses = $this->GetValue("shipclasses");
			$carriers = $this->GetValue('carriers');

			if(!is_array($shipClasses) && $shipClasses != "") {
				$shipClasses = array($shipClasses);
			}

			foreach($carriers as $carrier) {
				foreach ($shipClasses as $class) {
					$methods[] = array_search($carrier, $this->_variables['carriers']['options']).' '.array_search($class, $this->_variables['shipclasses']['options']);
				}
			}

			return $methods;
		}
	}

?>