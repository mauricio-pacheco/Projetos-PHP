<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'entity.base.php');

class ISC_ENTITY_ORDER extends ISC_ENTITY_BASE
{
	/**
	 * Parse the order data
	 *
	 * Method will parse the order data to be inserted into the database
	 *
	 * @access private
	 * @param array &$input The referenced input data
	 * @param array &$parsed The referneced array to store the parsed information in
	 * @return NULL
	 */
	private function parsedata(&$input, &$parsed)
	{
		// Load the shipping address if we don't have a custom one
		if (array_key_exists('shippingaddressid', $input) && isId($input['shippingaddressid'])) {
			$input['shippingaddress'] = $GLOBALS['ISC_CLASS_ACCOUNT']->GetShippingAddress($input['shippingaddressid']);
		}

		// Load the billing address if we don't have a custom one
		if (array_key_exists('billingaddressid', $input) && isId($input['billingaddressid'])) {
			$input['billingaddress'] = $GLOBALS['ISC_CLASS_ACCOUNT']->GetShippingAddress($input['billingaddressid']);
		}

		// If we don't have a shipping address for this order then it's a digital order - we need to set up an empty
		// array with the address fields
		if(!isset($input['shippingaddress'])) {
			$input['shippingaddress'] = array(
				'shipfullname'		=> '',
				'shipaddress1'		=> '',
				'shipaddress2'		=> '',
				'shipcity'			=> '',
				'shipstate'			=> '',
				'shipzip'			=> '',
				'shipcountry'		=> '',
				'shipcountryid'		=> '',
				'shipstateid'		=> '',
			);
		}

		$status = 0;

		// Get the amount that went through the payment gateway
		if (array_key_exists('gatewayamount', $input)) {
			$orderGatewayAmount = $input['gatewayamount'];
		}
		else {
			$orderGatewayAmount = 0;
		}

		// Get the amount of store credit that was used
		if (array_key_exists('storecreditamount', $input)) {
			$orderStoreCreditAmount = $input['storecreditamount'];
		}
		else {
			$orderStoreCreditAmount = 0;
		}

		// Get the amount used from any gift certificates
		if (array_key_exists('giftcertificateamount', $input)) {
			$orderGiftCertificateAmount = $input['giftcertificateamount'];
		}
		else {
			$orderGiftCertificateAmount = 0;
		}

		$providerName = '';
		$providerId = '';

		// Order was paid for entirely with gift certificates
		if ($input['paymentmethod'] == "giftcertificate") {
			$providerName = "giftcertificate";
			$providerid = '';
		}
		// Order was paid for entirely using store credit
		else if ($input['paymentmethod'] == "storecredit") {
			$providerName = 'storecredit';
			$providerId = '';
		}
		// Went through some sort of payment gateway
		else {
			if ($input['gatewayamount'] > 0) {
				if (!GetModuleById('checkout', $provider, $input['paymentmethod'])) {
					return false;
				}
				$providerName = $provider->GetName();
				$providerId = $provider->GetId();
			}
			else {
				$providerName = '';
				$providerId = '';
			}
		}

		// Get the customer ID
		if (!array_key_exists('customerid', $input)) {
			$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');
			$input['customerid'] = $GLOBALS['ISC_CLASS_CUSTOMER']->GetCustomerIdByToken($input['customertoken']);
		}

		// Loop through all of the products in this order to see if they're entirely
		// gift certificates
		$onlyGiftCertificates = true;
		foreach ($input['products'] as $product) {
			if (isset($product['type']) && $product['type'] != 'giftcertificate') {
				$onlyGiftCertificates = false;
			}
		}

		// Fetch the country codes for the billing and shipping addresses
		$billingCountryCode = GetCountryISO2ByName($input['billingaddress']['shipcountry']);
		$shippingCountryCode = '';
		if(isset($input['shippingaddress']['shipcountry'])) {
			$shippingCountryCode = GetCountryISO2ByName($input['shippingaddress']['shipcountry']);
		}

		$ipCountryName = '';
		$ipCountryCode = '';

		if (!array_key_exists('geoipcountry', $input) && !array_key_exists('geoipcountrycode', $input)) {
			// Attempt to determine the GeoIP location based on their IP address

			require_once ISC_BASE_PATH."/lib/geoip/geoip.php";
			$gi = geoip_open(ISC_BASE_PATH."/lib/geoip/GeoIP.dat", GEOIP_STANDARD);
			$ipCountryCode = geoip_country_code_by_addr($gi, GetIP());

			// If we get the country, look up the country name as well
			if ($ipCountryCode) {
				$ipCountryName = geoip_country_name_by_addr($gi, GetIP());
			}
		}

		if (!array_key_exists('extraInfo', $input)) {
			$input['extraInfo'] = array();
		}

		if (array_key_exists('giftcertificates', $input) && is_array($input['giftcertificates'])) {
			$input['extraInfo']['giftcertificates'] = $input['giftcertificates'];
		}

		if (!array_key_exists('ordshippingzoneid', $input)) {
			$input['ordshippingzoneid'] = 0;
		}

		if (!array_key_exists('ordshippingzone', $input)) {
			$input['ordshippingzone'] = '';
		}

		if (array_key_exists('ipaddress', $input)) {
			$input["ordipaddress"] = $input['ipaddress'];
		} else {
			$input["ordipaddress"] = '';
		}
		if (array_key_exists('shipemail', $input['billingaddress'])) {
			$input["ordbillemail"] = $input['billingaddress']['shipemail'];
		}
		else {
			$input['ordbillemail'] = '';
		}
		if (array_key_exists('shipphone', $input['billingaddress'])) {
			$input["ordbillphone"] = $input['billingaddress']['shipphone'];
		}
		else {
			$input['ordbillphone'] = '';
		}
		if (isset($input['shippingaddress']) && is_array($input['shippingaddress']) && array_key_exists('shipemail', $input['shippingaddress'])) {
			$input["ordshipemail"] = $input['shippingaddress']['shipemail'];
		}
		else {
			$input["ordshipemail"] = '';
		}
		if (isset($input['shippingaddress']) && is_array($input['shippingaddress']) && array_key_exists('shipphone', $input['shippingaddress'])) {
			$input["ordshipphone"] = $input['shippingaddress']['shipphone'];
		}
		else {
			$input['ordshipphone'] = '';
		}

		$defaultCurrency = GetDefaultCurrency();

		$parsed	= array(
			'ordtoken' => $input['pending_token'],
			'ordcustid' => $input['customerid'],
			'orddate' => time(),
			'ordsubtotal' => $input['itemtotal'],
			'ordtaxtotal' => $input['taxcost'],
			'ordtaxrate' => $input['taxrate'],
			'ordtaxname' => $input['taxname'],
			'ordtotalincludestax' => $input['totalincludestax'],
			'ordshipcost' => $input['shippingcost'],
			'ordshipmethod' => $input['shippingprovider'],
			'ordershipmodule' => $input['shippingmodule'],
			'ordhandlingcost' => $input['handlingcost'],
			'ordtotalamount' => $input['totalcost'],
			'ordgatewayamount' => $orderGatewayAmount,
			'ordstorecreditamount' => $orderStoreCreditAmount,
			'ordgiftcertificateamount' => $orderGiftCertificateAmount,
			'ordstatus' => $status,
			'orderpaymentmethod' => $providerName,
			'orderpaymentmodule' => $providerId,
			'ordbillfullname' => $input['billingaddress']['shipfullname'],
			'ordbillstreet1' => $input['billingaddress']['shipaddress1'],
			'ordbillstreet2' => $input['billingaddress']['shipaddress2'],
			'ordbillsuburb' => $input['billingaddress']['shipcity'],
			'ordbillstate' => $input['billingaddress']['shipstate'],
			'ordbillzip' => $input['billingaddress']['shipzip'],
			'ordbillcountry' => $input['billingaddress']['shipcountry'],
			'ordshipfullname' => $input['shippingaddress']['shipfullname'],
			'ordshipstreet1' => $input['shippingaddress']['shipaddress1'],
			'ordshipstreet2' => $input['shippingaddress']['shipaddress2'],
			'ordshipsuburb' => $input['shippingaddress']['shipcity'],
			'ordshipstate' => $input['shippingaddress']['shipstate'],
			'ordshipzip' => $input['shippingaddress']['shipzip'],
			'ordshipcountry' => $input['shippingaddress']['shipcountry'],
			'ordbillcountryid' => (int)$input['billingaddress']['shipcountryid'],
			'ordbillstateid' => (int)$input['billingaddress']['shipstateid'],
			'ordshipcountryid' => (int)$input['shippingaddress']['shipcountryid'],
			'ordshipstateid' => (int)$input['shippingaddress']['shipstateid'],
			'ordisdigital' => $input['isdigitalorder'],
			'ordonlygiftcerts' => (int) $onlyGiftCertificates,
			'extrainfo' => serialize($input['extraInfo']),
			'ordbillcountrycode' => $billingCountryCode,
			'ordshipcountrycode' => $shippingCountryCode,
			'ordgeoipcountry' => $ipCountryName,
			'ordgeoipcountrycode' => $ipCountryCode,
			'ordcurrencyid' => (int)$input['currencyid'],
			'orddefaultcurrencyid' => (int)$defaultCurrency['currencyid'],
			'ordcurrencyexchangerate' => $input['currencyexchangerate'],
			'ordshippingzoneid' => $input['ordshippingzoneid'],
			'ordshippingzone' => $input['ordshippingzone'],
			'ordbillemail' => $input['ordbillemail'],
			'ordbillphone' => $input['ordbillphone'],
			'ordshipemail' => $input['ordshipemail'],
			'ordshipphone' => $input['ordshipphone'],
			'ordcustmessage' => $input['ordercomments'],
			'ordipaddress' => $input['ordipaddress']
		);
	}

	/**
	 * Add all the products
	 *
	 * Method will add all the products within the $input['products'] array
	 *
	 * @access private
	 * @param array &$input The referenced input data
	 * @return bool TRUE if all the products were added, FALSE otherwise
	 */
	private function addProducts(&$input)
	{
		if (!array_key_exists('products', $input) || !is_array($input['products'])) {
			return false;
		}

		$couponsUsed = array();
		$giftCertificates = array();

		foreach ($input['products'] as $product) {
			// This product is a gift certificate so set the appropriate values
			if (isset($product['type']) && $product['type'] == "giftcertificate") {
				$price = $product['giftamount'];
				$product['data']['prodweight'] = 0;
				$product['option_id'] = 0;
				$product['data']['prodcostprice'] = 0;
				$product['data']['prodcalculatedprice'] = 0;
				$prodtype = 'giftcertificate';
				$product['data']['productid'] = 0;
				$giftCertificates[] = $product;
				$sku = '';
			}

			// Normal product
			else {
				$product['type'] = 'product';
				if (isset($product['discount_price'])) {
					$price = $product['discount_price'];
				} else {
					$price = $product['product_price'];
				}
				$prodtype = GetTypeByProductId($product['data']['productid']);
				$sku = GetSKUByProductId($product['data']['productid'], $product['variation_id']);
			}

			if (isset($product['options'])) {
				$options = serialize($product['options']);
			}
			else {
				$options = '';
			}

			if (!isset($product['variation_id'])) {
				$product['variation_id'] = 0;
			}

			$newProduct = array(
				"ordprodsku" => $sku,
				"ordprodname" => $product['data']['prodname'],
				"ordprodtype" => $prodtype,
				"ordprodcost" => $price,
				"ordprodweight" => $product['data']['prodweight'],
				"ordprodqty" => $product['quantity'],
				"orderorderid" => $input['orderid'],
				"ordprodid" => $product['data']['productid'],
				"ordprodvariationid" => (int)$product['variation_id'],
				"ordprodoptions" => $options,
				"ordprodcostprice" => $product['data']['prodcostprice'],
			);

			if (isset($product['original_price'])) {
				$newProduct['ordoriginalprice'] = $product['original_price'];
			}

			$GLOBALS['ISC_CLASS_DB']->InsertQuery("order_products", $newProduct);

			// Ensure that coupons aren't being saved with gift certificates
			if (isset($product['couponcode']) && $product['type'] != "giftcertificate") {
				$newOrderCoupon = array(
					"ordcouporderid" => $input['orderid'],
					"ordcoupprodid" => $product['data']['productid'],
					"ordcouponid" => $product['coupon'],
					"ordcouponcode" => $product['couponcode'],
					"ordcouponamount" => $product['discount']
					);
				$GLOBALS['ISC_CLASS_DB']->InsertQuery("order_coupons", $newOrderCoupon);
			}
		}

		// If we have one or more gift certificates to create, we need to create them now.
		if (count($giftCertificates) > 0) {
			$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES'] = GetClass('ISC_GIFTCERTIFICATES');
			$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES']->CreateGiftCertificatesFromOrder($input['orderid'], $giftCertificates, 1);
		}

		return true;
	}

	/**
	 * Add all the shipping addresses
	 *
	 * Method will add all the shipping addresses within the $input['shippingaddress'] and $input['billingaddress'] arrays
	 *
	 * @access private
	 * @param array &$input The referenced input data
	 * @return bool TRUE if all the shipping addresses were added, FALSE otherwise
	 */
	private function addAddresses(&$input)
	{
		if (array_key_exists('shippingaddressid', $input) || array_key_exists('billingaddressid', $input)) {
			$addressesToUpdate = array();
			if (array_key_exists('shippingaddressid', $input)) {
				$addressesToUpdate[] = (int)$input['shippingaddressid'];
			}
			if (array_key_exists('billingaddressid', $input)) {
				$addressesToUpdate[] = (int)$input['billingaddressid'];
			}

			$updatedAddress = array(
				'shiplastused' => time()
			);
			$GLOBALS['ISC_CLASS_DB']->UpdateQuery('shipping_addresses', $updatedAddress, "shipid IN (".implode(',', $addressesToUpdate).")");
		}

		// Do we need to save an address?
		if (is_array($input['billingaddress']) && array_key_exists('saveAddress', $input['billingaddress']) && isId($input['customerid'])) {
			SaveOrderShippingAddress($input['customerid'], $input['billingaddress']);
		}
		// Are we saving the shipping address too? We only do this if the customer chose to and the billing & shipping address line 1 aren't the
		// same
		if(isset($input['shippingaddress'])) {
			if (is_array($input['shippingaddress']) && array_key_exists('saveAddress', $input['shippingaddress']) && !array_key_exists('saveAddress', $input['billingaddress']) && isId($input['customerid'])) {
				SaveOrderShippingAddress($input['customerid'], $input['shippingaddress']);
			}
		}

		return true;
	}

	/**
	 * Reformat the products array
	 *
	 * Method will reformat the products aray into something more standardised
	 *
	 * @access private
	 * @param array &$input The referenced input data
	 */
	private function reformatProducts(&$input)
	{
		if (!array_key_exists('products', $input) || !is_array($input['products'])) {
			return null;
		}

		$newProducts = array();

		foreach ($input['products'] as $product) {
			$tmpProd	= array();
			$price		= 0;

			if (array_key_exists('type', $product) && strtolower($product['type']) == 'giftcertificate') {
				$price = $product['giftamount'];
			} else if (array_key_exists('discount_price', $product)) {
				$price = $product['discount_price'];
			} else {
				$price = $product['product_price'];
			}

			$tmpProd['productid']	= $product['data']['productid'];
			$tmpProd['name']		= $product['data']['prodname'];
			$tmpProd['amount']		= DefaultPriceFormat(CPrice($price));
			$tmpProd['quantity']	= $product['quantity'];

			$newProducts[]			= $tmpProd;
		}

		$input['products'] = $newProducts;
	}

	/**
	 * Add a order
	 *
	 * Method will add a order to the database
	 *
	 * @access public
	 * @param array $input The order details
	 * @return int The order record ID on success, FALSE otherwise
	 */
	public function add($input)
	{
		$GLOBALS['ISC_CLASS_ACCOUNT'] = GetClass('ISC_ACCOUNT');
		$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');

		$this->parsedata($input, $parsed);

		$GLOBALS['ISC_CLASS_DB']->StartTransaction();

		if (!isId($id = $GLOBALS['ISC_CLASS_DB']->InsertQuery("orders", $parsed))) {
			$GLOBALS['ISC_CLASS_DB']->RollbackTransaction();
			return false;
		}

		$input['orderid']	= $id;
		$input['date']		= time();

		if (!$this->addProducts($input)) {
			$GLOBALS['ISC_CLASS_DB']->RollbackTransaction();
			return false;
		}

		if (!$this->addAddresses($input)) {
			$GLOBALS['ISC_CLASS_DB']->RollbackTransaction();
			return false;
		}

		$GLOBALS['ISC_CLASS_DB']->CommitTransaction();

		$this->reformatProducts($input);
		$this->createServiceRequest('salesorderadd', 'order_create', $input);

		return $input['orderid'];
	}

	/**
	 * Edit a customer
	 *
	 * Method will edit a customer's details
	 *
	 * @access public
	 * @param array $input The customer's details
	 * @return bool TRUE if the customer exists and the details were updated successfully, FALSE oterwise
	 */
	public function edit($input)
	{
		if (!array_key_exists('orderid', $input) || !isId($input['orderid'])) {
			return false;
		}

		$this->parsedata($input, $parsed);

		unset($parsed['orddate']);

		if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery("orders", $parsed, "orderid='" . (int)$input['orderid'] . "'") === false) {
			return false;
		}

		$this->createServiceRequest('salesordermod', 'order_edit', $input);

		return true;
	}

	/**
	 * Delete a order
	 *
	 * Method will delete a order
	 *
	 * @access public
	 * @param int $orderid The order ID
	 * @param bool $delete TRUE to delete the spool file, FALSE to mark it as deleted. Default is FALSE
	 * @param boolean True to delete any gift certificates that were purchased in this order (only use when deleting incomplete/pending orders)
	 * @return bool TRUE if the order was deleted successfully, FASLE otherwise
	 */
	public function delete($orderid, $delete=false, $deleteGiftCertificates=false)
	{
		// Set up the delete queries we'll be using
		$queries = array(
			"DELETE FROM [|PREFIX|]orders WHERE orderid='".(int)$orderid."'",
			"DELETE FROM [|PREFIX|]order_products WHERE orderorderid='".(int)$orderid."'",
			"DELETE FROM [|PREFIX|]order_coupons WHERE ordcouporderid='".(int)$orderid."'"
		);
		// If deleting gift certificates too, add that in to the mix
		if($deleteGiftCertificates) {
			$queries[] = "DELETE FROM [|PREFIX|]gift_certificates WHERE giftcertorderid='".(int)$orderid."'";
		}
		foreach($queries as $query) {
			if(!$GLOBALS['ISC_CLASS_DB']->Query($query)) {
				return false;
			}
		}
		
		// Create the spool file
		$input = array(
			'orderid' => $orderid,
		);

		if ($delete) {
			$input['delete'] = true;
		}

		$this->createServiceRequest('salesordermod', 'order_delete', $input);
		return true;
	}

	/**
	 * Delete old incomplete orders
	 *
	 * Method will delete all incomplete orders that are a week old
	 *
	 * @access public
	 * @return bool TRUE if all the incomplete old orders were deleted, FALSE otherwise
	 */
	public function deleteOldOrders()
	{
		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT orderid FROM [|PREFIX|]orders WHERE ordstatus=0 AND orddate < '".(time()-604800)."'");
		while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			self::delete($row['orderid'], true, true);
		}

		return true;
	}

	/**
	 * Delete multiple orders
	 *
	 * Method will delete multiple orders
	 *
	 * @access public
	 * @param array $orderids The array containing the IDs of the orders to delete
	 * @return bool TRUE if the orders were all deleted, FASLE otherwise
	 */
	public function multiDelete($orderids)
	{
		if (!is_array($orderids)) {
			return false;
		}

		$orderids = array_filter($orderids, 'isId');

		foreach ($orderids as $orderid) {
			self::delete($orderid);
		}

		return true;
	}

	/**
	 * Import a order
	 *
	 * Method will return the order record that can be directly inserted into the accounting module. It is up the the calling function to actually
	 * import the record. This method just basically gives you the proper data to do it
	 *
	 * @access public
	 * @param int $orderid The product ID
	 * @param array &$import The referenced array containing all the import data of the order
	 * @return bool TRUE if the data was retrived successfully, FALSE otherwise
	 */
	public function import($orderid, &$import)
	{
		if (!isId($orderid)) {
			return false;
		}

		/**
		 * We must only import this only ONCE otherwise we will get duplicate orders. The only way to safeguard this is to match it againt the
		 * accountingref table AND to check in the current pending jobs . If a record does not exist in both, then we can assume that it hasn't been imported yet
		 */
		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT o.* FROM [|PREFIX|]orders o WHERE o.orderid='" . (int)$orderid . "' AND NOT EXISTS(SELECT * FROM [|PREFIX|]accountingref WHERE accountingreftype='order' AND accountingrefmoduleid=o.orderid)");

		/**
		 * Getting the current spool pending jobs. THIS IS A HACK TO GET IT TO WORK! To make it work properly, we should call the accounting class method
		 * createServiceRequest() with an extra flag. This flag will do a check on each accounting module (like QuickBooks and so-to-be MYOB, etc). This MUST be resplaced
		 * when we do incorporate other accounting software. We'll also need to move all the QuickBooks spool code into the accounting to keep everything in one place
		 */
		GetModuleById('accounting', $module, 'accounting_quickbooks');
		$module->getJobList($list);

		$inSpool = false;
		foreach ($list as $job) {
			if ($job['type'] == 'order' && $job['nodeid'] == $orderid) {
				$inSpool = true;
			}
		}

		/**
		 * Now we run our checker
		 */
		if (!($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) || $inSpool) {
			return false;
		}

		$import	= array(
			'orderid'		=> $row['orderid'],
			'customerid'	=> $row['ordcustid'],
			'date'			=> $row['orddate'],
		);

		$import['billingaddress'] = array(
			'shipfullname'	=> $row['ordbillfullname'],
			'shipaddress1'	=> $row['ordbillstreet1'],
			'shipaddress2'	=> $row['ordbillstreet2'],
			'shipcity'		=> $row['ordbillsuburb'],
			'shipstate'		=> $row['ordbillstate'],
			'shipzip'		=> $row['ordbillzip'],
			'shipcountry'	=> $row['ordbillcountry'],
			'shipcountryid'	=> $row['ordbillcountryid'],
			'shipstateid'	=> $row['ordbillstateid'],

		);

		$import['shipingaddress'] = array(
			'shipfullname'	=> $row['ordshipfullname'],
			'shipaddress1'	=> $row['ordshipstreet1'],
			'shipaddress2'	=> $row['ordshipstreet2'],
			'shipcity'		=> $row['ordshipsuburb'],
			'shipstate'		=> $row['ordshipstate'],
			'shipzip'		=> $row['ordshipzip'],
			'shipcountry'	=> $row['ordshipcountry'],
			'shipcountryid'	=> $row['ordshipcountryid'],
			'shipstateid'	=> $row['ordshipstateid'],
		);

		$import['products'] = array();

		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]order_products WHERE orderorderid='" . (int)$orderid . "'");

		while ($prod = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$import['products'][] = array(
										'productid'	=> $prod['orderprodid'],
										'name'		=> $prod['ordprodname'],
										'amount'	=> DefaultPriceFormat(CPrice($prod['ordprodcost'])),
										'quantity'	=> $prod['ordprodqty'],
									);
		}

		return true;
	}
}

?>
