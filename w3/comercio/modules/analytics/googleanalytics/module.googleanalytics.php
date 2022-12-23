<?php

	/**
	* This is the Google analytics module for Interspire Shopping Cart. To enable
	* this module in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Analytics Settings tab in the menu.
	*/
	class ANALYTICS_GOOGLEANALYTICS extends ISC_ANALYTICS
	{

		/*
			Analytics class constructor
		*/
		function ANALYTICS_GOOGLEANALYTICS()
		{

			// Setup the required variables for the Google analytics module
			parent::__construct();

			$this->_name = GetLang('GoogleAnalyticsName');
			$this->_image = "googleanalytics_logo.gif";
			$this->_description = GetLang('GoogleAnalyticsDesc');
			$this->_help = sprintf(GetLang('GoogleAnalyticsHelp'), $GLOBALS['ShopPath'], $GLOBALS['StoreName']);
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 0;
		}

		/**
		* Custom variables for the analytics module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{
			$this->_variables['trackingcode'] = array(
				"name" => "Tracking Code",
				"type" => "textarea",
				"help" => GetLang('GoogleAnalyticsTrackingCodeHelp'),
				"default" => "",
				"required" => true,
				"rows" => 7
			);
		}

		/**
		* Return the tracking code for this analytics module.
		*/
		function GetTrackingCode()
		{
			$trackingCode = $this->GetValue("trackingcode");

			// If we're on a secure server, make sure we're loading the tracking code for the secure server too
			if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == "on") {
				$trackingCode = str_replace("http://www.", "https://ssl.", $trackingCode);
			}

			return $trackingCode;
		}

		/**
		 * Return the conversion tracking code for this module.
		 */
		function GetConversionCode($orderTotal)
		{
			$trackingCode = $this->GetValue('trackingcode');

			$order = $GLOBALS['ISC_CLASS_ORDER']->GetOrder();

			// Load up all of the information we have about this order
			$orderData = GetOrder($order['orderid']);

			// If we're using the old version of the tracking code (urchin.js) we do things a little differently
			if(strpos($trackingCode, 'urchin.js') === true) {
				$conversionCode = "UTM:T|".$order['orderid']."|".GetConfig('StoreName')."|".number_format($orderData['ordtotalamount'], 2, '.', '')."|".number_format($orderData['ordtaxtotal'], 2, '.', '')."|".number_format($orderData['ordshipcost'], 2, '.', '')."|".$orderData['ordbillsuburb']."|".$orderData['ordbillstate']."|".$orderData['ordbillcountry']."\n";

				foreach($orderData['products'] as $product) {
					$productId = $product['ordprodid'];
					if($product['ordprodvariationid'] > 0) {
						$productId .= '-'.$product['ordprodvariationid'];
					}
					$prodCode = $product['ordprodsku'];
					if (empty($prodCode)) {
						$prodCode = $product['ordprodid'];
					}

					$conversionCode .= "UTM:I|".$orderData['orderid']."|".$prodCode."|".$productName."||".number_format($product['ordprodcost'], 2, '.', '')."|".$product['ordprodqty']."\n";
				}

				$conversionCode = "<form style='display: none;' name='utmform'><textarea id='utmtrans'>".$conversionCode."</textarea></form>";
				$conversionCode .= "<script type=\"text/javascript\">__utmSetTrans();</script>";
			}
			else {
				$conversionCode = "
					<script type=\"text/javascript\">
					if(typeof(pageTracker) != 'undefined') {
						pageTracker._addTrans(
							'".$orderData['orderid']."',
							'".addslashes(GetConfig('StoreName'))."',
							'".number_format($orderData['ordtotalamount'], 2, '.', '')."',
							'".number_format($orderData['ordtaxtotal'], 2, '.', '')."',
							'".number_format($orderData['ordshipcost'], 2, '.', '')."',
							'".$orderData['ordbillsuburb']."',
							'".$orderData['ordbillstate']."',
							'".$orderData['ordbillcountry']."'
						);
				";
				foreach($orderData['products'] as $product) {
					$productId = $product['ordprodid'];
					if($product['ordprodvariationid'] > 0) {
						$productId .= '-'.$product['ordprodvariationid'];
					}
					$prodCode = $product['ordprodsku'];
					if (empty($prodCode)) {
						$prodCode = $product['ordprodid'];
					}

					$conversionCode .= "
						pageTracker._addItem(
							'".$orderData['orderid']."',
							'".addslashes($prodCode)."',
							'".addslashes($product['ordprodname'])."',
							'',
							'".number_format($product['ordprodcost'], 2, '.', '')."',
							'".$product['ordprodqty']."'
						);
					";
				}
				$conversionCode .= "}
				pageTracker._trackTrans();
				</script>";
			}
			return $conversionCode;
		}
	}

?>