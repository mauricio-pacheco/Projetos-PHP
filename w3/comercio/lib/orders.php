<?php
/**
 * Fetch an order from the database based on the specified order ID.
 *
 * @param int The order ID
 * @param boolean True to fetch products in the order too.
 * @return array Array of fetched information for this product.
 */
function GetOrder($orderId, $products=true)
{
	static $orderCache;

	if (isset($orderCache[$orderId])) {
		if($products == false || ($products == true && isset($orderCache[$orderId]['products']))) {
			return $orderCache[$orderId];
		}
	}

	$query = sprintf("SELECT * FROM [|PREFIX|]orders WHERE orderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId));
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	$order = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

	// Do we need to fetch the products in this order too?
	if ($products == true) {
		$order['products'] = array();
		$query = sprintf("SELECT * FROM [|PREFIX|]order_products WHERE orderorderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while ($product = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$order['products'][] = $product;
		}
	}

	$orderCache[$orderId] = $order;
	return $order;
}

/**
 *	Is an order completed? If the status is complete or shipped then it is.
 *
 * @param int The status of the order
 * @return boolean True if the order is complete
 */
function OrderIsComplete($OrderStatus)
{
	if ($OrderStatus == ORDER_STATUS_COMPLETED || $OrderStatus == ORDER_STATUS_SHIPPED) {
		return true;
	} else {
		return false;
	}
}

/**
 * Checks if an order exists in the database.
 *
 * @param int The order ID
 * @return boolean True if the order exists and is valid
 */
function OrderExists($orderId)
{
	// Check if a record is found for a order and return true/false
	$query = sprintf("select orderid from [|PREFIX|]orders where orderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId));
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		return true;
	} else {
		return false;
	}
}

/**
 * Get a friendly name for an order status from the database.
 *
 * @param int The order status ID
 * @return string The status description/name/
 */
function GetOrderStatusById($StatusId)
{
	static $status = Array();

	if (empty($status)) {
		$query = "select statusid, statusdesc from [|PREFIX|]order_status";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$status[$row['statusid']] = $row['statusdesc'];
		}
	}

	if (isset($status[$StatusId])) {
		return $status[$StatusId];
	} else {
		return '';
	}
}

/**
 *	Email the invoice from an order to a customer
 *
 * @param int The ID of the order to email the invoice for.
 */
function EmailInvoiceToCustomer($orderId)
{
	// Load the details for this order
	$is_digital_download = true;
	$query = sprintf("select * from [|PREFIX|]orders where orderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId));
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	if ($order_row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$GLOBALS['OrderNumber'] = $orderId;
		$order_status = $order_row['ordstatus'];
		$order_payment_module = $order_row['orderpaymentmodule'];

		if($order_row['ordcustid'] > 0) {
			$GLOBALS['ViewOrderStatusMsg'] = GetLang('ASummaryIsShownBelow')." <a href='".$GLOBALS['ShopPath']."/orderstatus.php'>".GetLang('ClickHere')."</a>.";
		} else {
			$GLOBALS['ViewOrderStatusMsg'] = "";
		}

		$emailTemplate = FetchEmailTemplateParser();

		// Is there a shipping address, or is it a digital download?
		if ($order_row['ordshipfullname'] == "") {
			$GLOBALS['ShippingAddress'] = GetLang('NA');
		} else {
			$GLOBALS['ShipFullName'] = isc_html_escape($order_row['ordshipfullname']);
			$GLOBALS['ShipAddressLine1'] = isc_html_escape($order_row['ordshipstreet1']);

			if($order_row['ordshipstreet2'] != "") {
				$GLOBALS['ShipAddressLine2'] = isc_html_escape($order_row['ordshipstreet2']);
			} else {
				$GLOBALS['ShipAddressLine2'] = '';
			}

			$GLOBALS['ShipSuburb'] = isc_html_escape($order_row['ordshipsuburb']);
			$GLOBALS['ShipState'] = isc_html_escape($order_row['ordshipstate']);
			$GLOBALS['ShipZip'] = isc_html_escape($order_row['ordshipzip']);
			$GLOBALS['ShipCountry'] = isc_html_escape($order_row['ordshipcountry']);

			$GLOBALS['ShipPhone'] = "";
			$GLOBALS['ShippingAddress'] = $emailTemplate->GetSnippet("AddressLabel");
		}

		// Format the billing address
		$GLOBALS['ShipFullName'] = isc_html_escape($order_row['ordbillfullname']);
		$GLOBALS['ShipAddressLine1'] = isc_html_escape($order_row['ordbillstreet1']);

		if($order_row['ordbillstreet2'] != "") {
			$GLOBALS['ShipAddressLine2'] = isc_html_escape($order_row['ordbillstreet2']);
		} else {
			$GLOBALS['ShipAddressLine2'] = '';
		}

		$GLOBALS['ShipSuburb'] = isc_html_escape($order_row['ordbillsuburb']);
		$GLOBALS['ShipState'] = isc_html_escape($order_row['ordbillstate']);
		$GLOBALS['ShipZip'] = isc_html_escape($order_row['ordbillzip']);
		$GLOBALS['ShipCountry'] = isc_html_escape($order_row['ordbillcountry']);

		$GLOBALS['ShipPhone'] = "";
		$GLOBALS['BillingAddress'] = $emailTemplate->GetSnippet("AddressLabel");

		// Format the shipping provider's details
		$ship_method = $order_row['ordshipmethod'];
		$ship_cost = $order_row['ordshipcost'];

		$GLOBALS['ItemTotal'] = CurrencyConvertFormatPrice($order_row['ordsubtotal'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);

		if ($order_row['ordshipcost'] > 0) {
			$GLOBALS['ShippingCost'] = CurrencyConvertFormatPrice($order_row['ordshipcost'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);
			$GLOBALS['SNIPPETS']['InvoiceEmailShippingTotal'] = $emailTemplate->GetSnippet('InvoiceEmailShippingTotal');
		}

		if ($order_row['ordhandlingcost'] > 0) {
			$GLOBALS['HandlingCost'] = CurrencyConvertFormatPrice($order_row['ordhandlingcost'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);
			$GLOBALS['SNIPPETS']['InvoiceEmailHandlingTotal'] = $emailTemplate->GetSnippet('InvoiceEmailHandlingTotal');
		}

		if ($order_row['ordtaxtotal'] > 0) {
			if($order_row['ordtaxname']) {
				$GLOBALS['TaxName'] = isc_html_escape($order_row['ordtaxname']);
			}
			else {
				$GLOBALS['TaxName'] = GetLang('InvoiceSalesTax');
			}
			$GLOBALS['TaxCost'] = CurrencyConvertFormatPrice($order_row['ordtaxtotal'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);
			if($order_row['ordtotalincludestax']) {
				$GLOBALS['TaxName'] .= ' '.GetLang('IncludedInTotal');
				$GLOBALS['SNIPPETS']['InvoiceEmailTaxTotalIncluded'] = $emailTemplate->GetSnippet('InvoiceEmailTaxTotal');
				$GLOBALS['SNIPPETS']['InvoiceEmailTaxTotal'] = '';
			}
			else {
				$GLOBALS['SNIPPETS']['InvoiceEmailTaxTotal'] = $emailTemplate->GetSnippet('InvoiceEmailTaxTotal');
				$GLOBALS['SNIPPETS']['InvoiceEmailTaxTotalIncluded'] = '';
			}
		}

		$GLOBALS['TotalCost'] = CurrencyConvertFormatPrice($order_row['ordtotalamount'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);

		$email = $order_row['ordbillemail'];
		if(!$order_row['ordbillemail']) {
			// Get the customer's email address
			$query = sprintf("select custconemail from [|PREFIX|]customers where customerid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($order_row['ordcustid']));
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

			if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$email = $row['custconemail'];
			}
		}

		if(!$email) {
			return false;
		}


		// Load up the items in the order
		$query = sprintf("select * from [|PREFIX|]order_products where orderorderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId));
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		$GLOBALS['SNIPPETS']['CartItems'] = "";

		if ($GLOBALS['ISC_CLASS_DB']->CountResult($result) > 0) {

			while ($product_row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {

				if ($product_row['ordprodtype'] == "physical") {
					$is_digital_download = false;
				}

				$pOptions = '';
				if($product_row['ordprodoptions'] != '') {
					$options = @unserialize($product_row['ordprodoptions']);
					if(!empty($options)) {
						$pOptions = "<br /><small>(";
						$comma = '';
						foreach($options as $name => $value) {
							$pOptions .= $comma.isc_html_escape($name).": ".isc_html_escape($value);
							$comma = ', ';
						}
						$pOptions .= ")</small>";
					}
				}
				$GLOBALS['ProductOptions'] = $pOptions;

				$GLOBALS['ProductPrice'] = CurrencyConvertFormatPrice($product_row['ordprodcost'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);
				$GLOBALS['ProductTotal'] = CurrencyConvertFormatPrice($product_row['ordprodcost'] * $product_row['ordprodqty'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);
				$GLOBALS['ProductQuantity'] = $product_row['ordprodqty'];
				$GLOBALS['ProductName'] = isc_html_escape($product_row['ordprodname']);
				$GLOBALS['SNIPPETS']['CartItems'] .= $emailTemplate->GetSnippet("InvoiceCartItem");
			}

			// Set the shipping method
			if ($ship_method == "") {
				if ($is_digital_download) {
					$GLOBALS['ShippingMethod'] = GetLang('ImmediateDownload');
				} else {
					$GLOBALS['ShippingMethod'] = sprintf(GetLang('FreeShippingFromX'), $GLOBALS['StoreName']);
				}
			}
			else {
				$GLOBALS['ShippingMethod'] = sprintf("%s %s %s", isc_html_escape($order_row['ordshipmethod']), GetLang('For'), CurrencyConvertFormatPrice($ship_cost, $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']));
			}

			// What's the status of the order? If it's awaiting payment (7) then show the awaiting payment notice
			if ($order_status == 7) {
				// Get the awaiting payment snippet, for offline payment providers also show the "how to pay for your order" message"
				$checkout_provider = null;
				GetModuleById('checkout', $checkout_provider, $order_payment_module);
				if ($checkout_provider->getpaymenttype() == PAYMENT_PROVIDER_OFFLINE) {
					$GLOBALS['PaymentGatewayAmount'] = CurrencyConvertFormatPrice($order_row['ordgatewayamount'], $order_row['ordcurrencyid'], $order_row['ordcurrencyexchangerate']);
					$GLOBALS['PaymentMessage'] = str_replace("\n", "<br />", $checkout_provider->getofflinepaymentmessage());
					$GLOBALS['PendingPaymentDetails'] = $emailTemplate->GetSnippet("InvoicePendingPaymentDetails");
				}
				$GLOBALS['PendingPaymentNotice'] = $emailTemplate->GetSnippet("InvoicePendingPaymentNotice");
			}

			$emailTemplate->SetTemplate("invoice_email");
			$message = $emailTemplate->ParseTemplate(true);

			// Create a new email API object to send the email
			$store_name = GetConfig('StoreName');

			$obj_email = GetEmailClass();
			$obj_email->From(GetConfig('OrderEmail'), $store_name);
			$obj_email->Set("Subject", sprintf(GetLang('YourOrderFrom'), $store_name));
			$obj_email->AddBody("html", $message);
			$obj_email->AddRecipient($email, "", "h");
			$email_result = $obj_email->Send();

			// If there are any additional recipients (forward invoices to addresses), send them as well
			if(GetConfig('ForwardInvoiceEmails')) {
				$forwardTo = explode(',', GetConfig('ForwardInvoiceEmails'));
				foreach($forwardTo as $address) {
					$emailClass = GetEmailClass();
					$emailClass->Set('CharSet', GetConfig('CharacterSet'));
					$emailClass->From(GetConfig('OrderEmail'), $store_name);
					$emailClass->Set("Subject", "Fwd: ".sprintf(GetLang('YourOrderFrom'), $store_name)." (#".$order_row['orderid'].")");
					$emailClass->AddBody("html", $message);
					$emailClass->AddRecipient($address, "", "h");
					$status = $emailClass->Send();
				}
			}

			// If the email was sent ok, show a confirmation message
			if ($email_result['success']) {
				return true;
			}
			else {
				// Email error
				return false;
			}
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
}

/**
 * Decrease the inventory levels for items from an order and update the maount of an item sold.
 *
 * @param int The order ID
 * @return boolean True if successful
 */
function DecreaseInventoryFromOrder($orderId)
{
	$order = GetOrder($orderId, false);

	// Fetch all of the products in this order
	// (we can't use the function above because we also need to fetch the inventory tracking option for each product)
	$query = sprintf("
		SELECT op.*, p.prodinvtrack, p.prodcurrentinv, p.prodlowinv, v.vcstock, v.vclowstock
		FROM [|PREFIX|]order_products op
		LEFT JOIN [|PREFIX|]products p ON (p.productid=op.ordprodid)
		LEFT JOIN [|PREFIX|]product_variation_combinations v ON (v.combinationid=op.ordprodvariationid)
		WHERE orderorderid='%d' and ordprodtype!=3",
		$orderId
	);
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	while ($product = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$query = sprintf("UPDATE [|PREFIX|]products SET prodnumsold=prodnumsold+%d WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodqty']), $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodid']));
		$GLOBALS['ISC_CLASS_DB']->Query($query);
		if (gzte11(ISC_LARGEPRINT)) {
			// Is inventory tracking enabled on a per product or per product option basis?
			if ($product['prodinvtrack'] == 1 && $product['ordprodvariationid'] == 0) {
				// This product doesn't use options or one wasn't selected
				$newQty = $product['prodcurrentinv'] - $product['ordprodqty'];
				if ($newQty < 0) {
					$newQty = 0;
				}
				$query = sprintf("UPDATE [|PREFIX|]products SET prodcurrentinv=%d WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($newQty), $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodid']));
				$GLOBALS['ISC_CLASS_DB']->Query($query);

				// Have we reached the inventory warning level for this product?
				if ($product['prodlowinv'] > 0 && $newQty <= $product['prodlowinv'] && $product['prodcurrentinv'] > $product['prodlowinv']) {
					sendLowInventoryWarning($product['ordprodid'], 0, $newQty);
				}
			}
			else if ($product['prodinvtrack'] == 2) {
				// This product uses variations
				$newQty = $product['vcstock'] - $product['ordprodqty'];
				if ($newQty < 0) {
					$newQty = 0;
				}
				$query = sprintf("UPDATE [|PREFIX|]product_variation_combinations SET vcstock = %d WHERE combinationid='%d' AND vcproductid='%d' AND vcstock > 0", $newQty, $product['ordprodvariationid'], $product['ordprodid']);
				$GLOBALS['ISC_CLASS_DB']->Query($query);

				// We also need to update the product
				$newQty = $product['prodcurrentinv'] - $product['ordprodqty'];
				if ($newQty < 0) {
					$newQty = 0;
				}
				$query = sprintf("UPDATE [|PREFIX|]products SET prodcurrentinv=%d WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($newQty), $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodid']));
				$GLOBALS['ISC_CLASS_DB']->Query($query);

				// Have we reached the inventory warning level for this product?
				if ($product['vclowstock'] > 0 && $newQty <= $product['vclowstock'] && $product['vcstock'] > $product['vclowstock']) {
					sendLowInventoryWarning($product['ordprodid'], $product['ordprodvariationid'], $newQty);
				}
			}
		}
	}
	// Update this order to say we've decreased the quantity
	$updatedOrder = array('ordinventoryupdated' => 1);
	$GLOBALS['ISC_CLASS_DB']->UpdateQuery("orders", $updatedOrder, sprintf("orderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId)));
	return true;
}

/**
 * Send a low inventory warning ot the store owner when a certain product/option reaches the
 * defined low inventory level.
 *
 * @param int The product ID.
 * @param int The variation ID.
 * @param int The current (new) quantity of the item.
 * @return boolean Returns true if successful.
 */
function sendLowInventoryWarning($productId, $variationId)
{
	// Only send the emails if we have this feature enabled
	if(GetConfig('LowInventoryNotificationAddress') == '') {
		return;
	}

	// Fetch the name of this product as well as the product option
	if ($variationId > 0) {
		$query = sprintf("
			SELECT p.prodname, p.prodcurrentinv, p.prodlowinv, v.vclowstock, v.vcstock, v.vcoptionids
			FROM [|PREFIX|]products p
			LEFT JOIN [|PREFIX|]product_variation_combinations v ON (v.combinationid='%d')
			WHERE p.productid='%d'",
			$variationId, $productId
		);
	}
	else {
		$query = sprintf("SELECT prodname, prodcurrentinv, prodlowinv FROM [|PREFIX|]products WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($productId));
	}

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	$product = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
	if ($variationId > 0) {
		// Fetch out the variation
		$query = "SELECT * FROM [|PREFIX|]product_variation_options WHERE voptionid IN (".$product['vcoptionids'].")";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$optionName = '';
		$comma = '';
		while($option = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$optionName .= $comma.$option['voname']." :".$option['vovalue'];
			$comma = ', ';
		}
		$prodName = $product['prodname'] . " (" . $optionName . ")";
		$stock = $product['vcstock'];
		$lowStockLevel = $product['vclowstock'];
	}
	else {
		$prodName = $product['prodname'];
		$stock = $product['prodcurrentinv'];
		$lowStockLevel = $product['prodlowinv'];
	}

	$GLOBALS['ProductId'] = $productId;

	// Now we build the email
	$GLOBALS['ISC_LANG']['LowInventoryWarningIntro'] = sprintf(GetLang('LowInventoryWarningIntro'), $GLOBALS['StoreName']);
	$GLOBALS['ISC_LANG']['LowInventoryWarning'] = sprintf(GetLang('LowInventoryWarning'), isc_html_escape($product['prodname']));
	$GLOBALS['ISC_LANG']['LowInventoryWarningProduct'] = sprintf(GetLang('LowInventoryWarningProduct'), sprintf('<a href="%s">%s</a>', ProdLink($product['prodname']), isc_html_escape($prodName)));
	$GLOBALS['ISC_LANG']['LowInventoryWarningCurrentStock'] = sprintf(GetLang('LowInventoryWarningCurrentStock'), $stock);
	$GLOBALS['ISC_LANG']['LowInventoryWarningNotice'] = sprintf(GetLang('LowInventoryWarningNotice'), $lowStockLevel);

	$emailTemplate = FetchEmailTemplateParser();
	$emailTemplate->SetTemplate("low_inventory_email");
	$message = $emailTemplate->ParseTemplate(true);

	// Create a new email API object to send the email
	$store_name = GetConfig('StoreName');
	$subject = sprintf(GetLang('LowInventoryWarningSubject'), isc_html_escape($product['prodname']));

	require_once(ISC_BASE_PATH . "/lib/email.php");
	$obj_email = GetEmailClass();
	$obj_email->Set('CharSet', GetConfig('CharacterSet'));
	$obj_email->From(GetConfig('AdminEmail'), $store_name);
	$obj_email->Set('Subject', $subject);
	$obj_email->AddBody("html", $message);
	$obj_email->AddRecipient(GetConfig('LowInventoryNotificationAddress'), "", "h");
	$email_result = $obj_email->Send();

	if ($email_result['success']) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Increase the inventory for items from an order when an order is returned. Also updates the number sold (decreases it)
 *
 * @param int The order ID
 * @return boolean True if successful
 */
function UpdateInventoryOnReturn($orderId)
{
	$order = GetOrder($orderId, false);

	// Fetch all of the products in this order
	// (we can't use the function above because we also need to fetch the inventory tracking option for each product)
	$query = sprintf("
		SELECT op.*, p.prodinvtrack
		FROM [|PREFIX|]order_products op
		LEFT JOIN [|PREFIX|]products p ON (p.productid=op.ordprodid)
		WHERE orderorderid='%d' and ordprodtype!=3",
		$orderId
	);
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	while ($product = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$query = sprintf("UPDATE [|PREFIX|]products SET prodnumsold=prodnumsold-%d WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodqty']), $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodid']));
		$GLOBALS['ISC_CLASS_DB']->Query($query);

		if (gzte11(ISC_LARGEPRINT)) {
			// Is inventory tracking enabled on a per product or per product option basis?
			if ($product['prodinvtrack'] == 1 && $product['ordprodvariationid'] == 0) {
				// This product doesn't use options or one wasn't selected
				$query = sprintf("UPDATE [|PREFIX|]products SET prodcurrentinv=prodcurrentinv+%d WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodqty']), $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodid']));
				$GLOBALS['ISC_CLASS_DB']->Query($query);
			}
			else if ($product['prodinvtrack'] == 2) {
				// This product uses options
				$query = sprintf("UPDATE [|PREFIX|]product_variation_combinations SET vcstock = vcstock+%d WHERE combinationid='%d' AND vcproductid='%d' AND vcstock > 0", $product['ordprodqty'], $product['ordprodvariationid'], $product['ordprodid']);
				$GLOBALS['ISC_CLASS_DB']->Query($query);

				// We also need to update the product as it holds the "cached" values
				$query = sprintf("UPDATE [|PREFIX|]products SET prodcurrentinv=prodcurrentinv+%d WHERE productid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodqty']), $GLOBALS['ISC_CLASS_DB']->Quote($product['ordprodid']));
				$GLOBALS['ISC_CLASS_DB']->Query($query);
			}
		}
	}

	// Update this order to say we've increased the quantity
	$updatedOrder = array('ordinventoryupdated' => 0);
	$GLOBALS['ISC_CLASS_DB']->UpdateQuery("orders", $updatedOrder, sprintf("orderid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($orderId)));
	return true;
}

/**
 * Update the ip address of an order. This is useful for checkout providers like google checkout who provide
 * the customers ip address after the initial notification of a new order
 *
 * @return boolean
 **/
function UpdateOrderIpAddress($orderid, $ipaddress, $dogeoip=true)
{
	$value = trim($ipaddress);
	if (empty($ipaddress)) {
		return false;
	}

	if (!preg_match('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#', $ipaddress)) {
		return false;
	}

	$data = array (
		'ordipaddress' => $ipaddress
	);

	if ($dogeoip) {
		// Attempt to determine the GeoIP location based on their IP address
		require_once ISC_BASE_PATH."/lib/geoip/geoip.php";
		$gi = geoip_open(ISC_BASE_PATH."/lib/geoip/GeoIP.dat", GEOIP_STANDARD);


		$data['ordgeoipcountrycode'] = geoip_country_code_by_addr($gi, $ipaddress);

		// If we get the country, look up the country name as well
		if($data['ordgeoipcountrycode']) {
			$data['ordgeoipcountry'] = geoip_country_name_by_addr($gi, $ipaddress);
		}
	}

	$result = $GLOBALS['ISC_CLASS_DB']->UpdateQuery('orders', $data, "orderid='".$GLOBALS['ISC_CLASS_DB']->Quote($orderid)."'");

	// If the sendstudio api isn't enabled or there was a problem just return the result
	if (!$result || !$GLOBALS['ISC_CFG']["MailXMLAPIValid"]) {
		return $result;
	}

	$sendstudio = GetClass('ISC_ADMIN_SENDSTUDIO');

	$query = "SELECT ordbillemail
	FROM [|PREFIX|]orders
	WHERE orderid = '".$GLOBALS['ISC_CLASS_DB']->Quote($orderid)."'";

	$email = $GLOBALS['ISC_CLASS_DB']->FetchOne($query);

	if (!$email) {
		return false;
	}

	$result = $sendstudio->UpdateSubscribersIp($email, GetConfig('MailNewsletterList'), $ipaddress);
	$result = $sendstudio->UpdateSubscribersIp($email, GetConfig('MailOrderList'), $ipaddress);
}

/**
 * Update the status of an order.
 *
 * @param int The order ID to update the status for.
 * @param int The new status of the order.
 * @param boolean Should emails be sent out if the email on status change feature is enabled?
 * @return boolean True if successful.
 */
function UpdateOrderStatus($orderId, $status, $email=true)
{
	$order = GetOrder($orderId, false);

	if (!$order['orderid']) {
		return false;
	}

	// Start transaction
	$GLOBALS['ISC_CLASS_DB']->Query("START TRANSACTION");

	$existing_status = $order['ordstatus'];

	// If the order is incomplete, it needs to be completed first
	if($existing_status == 0) {
		CompletePendingOrder($order['ordtoken'], $status);
	}

	$updatedOrder = array(
		"ordstatus" => (int)$status
	);

	// If the order status is 2 or 10 (completed, shipped) then set the orddateshipped timestamp
	if (OrderIsComplete($status)) {
		$updatedOrder['orddateshipped'] = time();
	}

	// Update the status for this order
	if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery("orders", $updatedOrder, "orderid='".$GLOBALS['ISC_CLASS_DB']->Quote($orderId)."'")) {
		// Fetch the name of the status this order was changed to
		$query = sprintf("SELECT statusdesc FROM [|PREFIX|]order_status WHERE statusid='%d'", $GLOBALS['ISC_CLASS_DB']->Quote($status));
		$result2 = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$statusName = $GLOBALS['ISC_CLASS_DB']->FetchOne($result2);

		// Log this action if we are in the control panel
		if (defined('ISC_ADMIN_CP')) {
			$GLOBALS['ISC_CLASS_LOG']->LogAdminAction($orderId, $statusName);
		}

		// This order was marked as refunded or cancelled
		if ($status == ORDER_STATUS_REFUNDED || $status == ORDER_STATUS_CANCELLED) {
			// If the inventory levels for products in this order have previously been changed, we need to
			// return the inventory too
			if ($order['ordinventoryupdated'] == 1) {
				UpdateInventoryOnReturn($orderId);
			}

			// Marked as refunded or cancelled, need to cancel the gift certificates in this order too if there are any
			$updatedCertificates = array(
				"giftcertstatus" => 3
			);
			$GLOBALS['ISC_CLASS_DB']->UpdateQuery("gift_certificates", $updatedCertificates, "giftcertorderid='" . $GLOBALS['ISC_CLASS_DB']->Quote($orderId) . "'");
		}
		// This order was marked as completed/shipped as long as the inventory hasn't been adjusted previously
		else if (OrderIsComplete($status)) {
			if ($order['ordinventoryupdated'] == 0) {
				DecreaseInventoryFromOrder($orderId);
			}

			// Send out gift certificates if the order wasn't already complete
			if (!OrderIsComplete($existing_status)) {
				$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES'] = GetClass('ISC_GIFTCERTIFICATES');
				$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES']->ActivateGiftCertificates($orderId);
			}
		}

		// Was there an error? If not, commit
		if ($GLOBALS['ISC_CLASS_DB']->Error() == "") {
			$GLOBALS['ISC_CLASS_DB']->Query("COMMIT");

			// Does the customer now need to be notified for this status change?
			$statuses = explode(",", GetConfig('OrderStatusNotifications'));
			if (in_array($status, $statuses) && $email == true) {
				EmailOnStatusChange($orderId, $status);
			}

			// If the checkout module that was used for an order is still enabled and has a function
			// to handle a status change, then call that function
			$valid_checkout_modules = GetAvailableModules('checkout', true, true);
			$valid_checkout_module_ids = array();
			foreach ($valid_checkout_modules as $valid_module) {
				$valid_checkout_module_ids[] = $valid_module['id'];
			}

			if (in_array($order['orderpaymentmodule'], $valid_checkout_module_ids)) {
				GetModuleById('checkout', $checkout_module, $order['orderpaymentmodule']);
				if (method_exists($checkout_module, 'HandleStatusChange')) {
					call_user_func(array($checkout_module, 'HandleStatusChange'), $orderId, $existing_status, $status);
				}
			}

			return true;
		}
		else {
			return false;
		}
	}

	return false;
}

/**
 *	Send an email notification to a customer when the status of their order changes.
 *
 * @param int The ID of the order to email the invoice for.
 * @return boolean True if successful.
 */
function EmailOnStatusChange($orderId, $status)
{
	// Load the order
	$order = GetOrder($orderId);

	// Load the customer we'll be contacting
	if ($order['ordcustid'] > 0) {
		$customer = GetCustomer($order['ordcustid']);
		$GLOBALS['ViewOrderStatusLink'] = '<a href="'.$GLOBALS['ShopPathSSL'].'/orderstatus.php">'.GetLang('ViewOrderStatus').'</a>';
	} else {
		$customer['custconemail'] = $order['ordbillemail'];
		$customer['custconfirstname'] = $order['ordbillfullname'];
		$GLOBALS['ViewOrderStatusLink'] = '';
	}

	if (empty($customer['custconemail'])) {
		return;
	}

	$statusName = GetOrderStatusById($status);
	$GLOBALS['ISC_LANG']['OrderStatusChangedHi'] = sprintf(GetLang('OrderStatusChangedHi'), isc_html_escape($customer['custconfirstname']));
	$GLOBALS['ISC_LANG']['OrderNumberStatusChangedTo'] = sprintf(GetLang('OrderNumberStatusChangedTo'), $order['orderid'], $statusName);
	$GLOBALS['OrderTotal'] = CurrencyConvertFormatPrice($order['ordtotalamount'], $order['ordcurrencyid'], $order['ordcurrencyexchangerate']);
	$GLOBALS['DatePlaced'] = CDate($order['orddate']);

	if ($order['orderpaymentmethod'] === 'giftcertificate') {
		$GLOBALS['PaymentMethod'] = GetLang('PaymentGiftCertificate');
	} elseif ($order['orderpaymentmethod'] === 'storecredit') {
		$GLOBALS['PaymentMethod'] = GetLang('PaymentStoreCredit');
	} else {
		$GLOBALS['PaymentMethod'] = $order['orderpaymentmethod'];
	}

	$query = "SELECT COUNT(*)
	FROM [|PREFIX|]order_products
	WHERE ordprodtype='digital'
	AND orderorderid='".$GLOBALS['ISC_CLASS_DB']->Quote($orderId)."'";

	$numDigitalProducts = $GLOBALS['ISC_CLASS_DB']->FetchOne($query);

	$emailTemplate = FetchEmailTemplateParser();

	$GLOBALS['SNIPPETS']['CartItems'] = "";

	if (OrderIsComplete($status) && $numDigitalProducts > 0) {
		$query = "SELECT *
		FROM [|PREFIX|]order_products op INNER JOIN [|PREFIX|]products p ON (op.ordprodid = p.productid)
		WHERE ordprodtype='digital'
		AND orderorderid='".$GLOBALS['ISC_CLASS_DB']->Quote($orderId)."'";

		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

		while ($product_row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$pOptions = '';
			if($product_row['ordprodoptions'] != '') {
				$options = @unserialize($product_row['ordprodoptions']);
				if(!empty($options)) {
					$pOptions = "<br /><small>(";
					$comma = '';
					foreach($options as $name => $value) {
						$pOptions .= $comma.isc_html_escape($name).": ".isc_html_escape($value);
						$comma = ', ';
					}
					$pOptions .= ")</small>";
				}
			}
			$GLOBALS['ProductOptions'] = $pOptions;

			$GLOBALS['ProductQuantity'] = $product_row['ordprodqty'];
			$GLOBALS['ProductName'] = isc_html_escape($product_row['ordprodname']);

			$GLOBALS['ISC_CLASS_ACCOUNT'] = GetClass('ISC_ACCOUNT');
			$DownloadItemEncrypted = $GLOBALS['ISC_CLASS_ACCOUNT']->EncryptDownloadKey($product_row['orderprodid'], $product_row['ordprodid'], $orderId, $order['ordtoken']);
			$GLOBALS['DownloadsLink'] = $GLOBALS['ShopPathSSL'].'/account.php?action=download_item&amp;data='.$DownloadItemEncrypted;

			$GLOBALS['SNIPPETS']['CartItems'] .= $emailTemplate->GetSnippet("StatusCompleteDownloadItem");
		}
	}

	if (empty($GLOBALS['SNIPPETS']['CartItems'])) {
		$emailTemplate->SetTemplate("order_status_email");
	} else {
		$emailTemplate->SetTemplate("order_status_downloads_email");
	}
	$message = $emailTemplate->ParseTemplate(true);

	// Create a new email API object to send the email
	$store_name = GetConfig('StoreName');
	$subject = GetLang('OrderStatusChangedSubject');

	require_once(ISC_BASE_PATH . "/lib/email.php");
	$obj_email = GetEmailClass();
	$obj_email->Set('CharSet', GetConfig('CharacterSet'));
	$obj_email->From(GetConfig('OrderEmail'), $store_name);
	$obj_email->Set('Subject', $subject);
	$obj_email->AddBody("html", $message);
	$obj_email->AddRecipient($customer['custconemail'], '', "h");
	$email_result = $obj_email->Send();

	if ($email_result['success']) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Verifies that a pending order is actually valid and has been paid for.
 * If the pending order is valid, it will return the order status that the
 * order should be set to. Returns false if the order is invalid.
 *
 * @param string The token for the pending order.
 * @return mixed Integer for the order status if the order is valid, false if invalid.
 */
function VerifyPendingOrder($pendingOrderToken, &$paymentStatus)
{
	$status = false;
	$order = LoadPendingOrderByToken($pendingOrderToken);
	if(!$order) {
		return false;
	}

	// This order was paid for entirely using a gift certificate, it's automatically valid
	if($order['orderpaymentmethod'] == "giftcertificate") {
		if($order['ordisdigital']) {
			$status = ORDER_STATUS_COMPLETED;
		}
		// Otherwise, the order is awaiting fulfillment
		else {
			$status = ORDER_STATUS_AWAITING_FULFILLMENT;
		}
	}
	// This order was paid for entirely using store credit, it's automatically valid
	else if($order['orderpaymentmethod'] == "storecredit") {
		if($order['ordisdigital']) {
			$status = ORDER_STATUS_COMPLETED;
		}
		// Otherwise, the order is awaiting fulfillment
		else {
			$status = ORDER_STATUS_AWAITING_FULFILLMENT;
		}
	}
	// Don't have to pay for this order because the total is $0.00
	else if($order['ordtotalamount'] == 0 && $order['orderpaymentmethod'] == '') {
		if($order['ordisdigital']) {
			$status = ORDER_STATUS_COMPLETED;
		}
		// Otherwise, the order is awaiting fulfillment
		else {
			$status = ORDER_STATUS_AWAITING_FULFILLMENT;
		}
	}
	// Otherwise we went through a payment gateway
	else {
		// Invalid payment module - this is an invalid order
		if(!GetModuleById('checkout', $provider, $order['orderpaymentmodule'])) {
			return false;
		}
		// The payment provider thinks the order is invalid
		if($provider->GetPaymentType() != PAYMENT_PROVIDER_OFFLINE && !$provider->VerifyOrder($order)) {
			return false;
		}

		// The payment provider's VerifyOrder method thinks the payment for this order
		// was successful.
		if($provider->GetPaymentType() == PAYMENT_PROVIDER_ONLINE) {
			if(isset($order['paymentstatus'])) {
				$paymentStatus = $order['paymentstatus'];
			}

			if((isset($order['paymentstatus']) && $order['paymentstatus'] == 1) || !isset($order['paymentstatus'])) {
				// If this is a digital order only, then the order is "Completed"
				if($order['ordisdigital']) {
					$status = ORDER_STATUS_COMPLETED;
				}
				// Otherwise, the order is awaiting fulfillment
				else {
					$status = ORDER_STATUS_AWAITING_FULFILLMENT;
				}
			}
			// Payment provider says this payment was processed but still pending. We should mark the order as 'awaiting payment'
			else if(isset($order['paymentstatus']) && $order['paymentstatus'] == 2) {
				$status = ORDER_STATUS_AWAITING_PAYMENT;
			}
			// Payment provider says this payment was declined. Mark the order as declined
			else if(isset($order['paymentstatus']) && $order['paymentstatus'] == 3) {
				$status = ORDER_STATUS_DECLINED;
			}
		}
		// This payment was through an offline payment method. It should always be "awaiting payment"
		else {
			$status = ORDER_STATUS_AWAITING_PAYMENT;
		}

		// Does the module force its own order status? If so we need to take that into account.
		// The only module that does this at the moment is credit card (manual) because to the
		// system it looks like a valid online payment method, but we don't want the status of
		// the order to be completed. We want it to be awaiting payment (7)
		if($provider->GetForcedStatus() != 0) {
			$status = $provider->GetForcedStatus();
		}
	}
	return $status;
}

/**
 * Completes a pending order and marks it's status as whatever it should be next.
 * This function will process any payments, capture amounts from gateways, increase
 * # sold for each product in the order, etc.
 *
 * @param string The pending order token.
 * @param int The status to set the completed order to.
 * @return boolean True if successful, false on failure.
 */
function CompletePendingOrder($pendingOrderToken, $status, $sendInvoice=true)
{
	$order = LoadPendingOrderByToken($pendingOrderToken);
	if(!$order) {
		return false;
	}

	// Wait, was the order already complete? Then we don't do anything
	if($order['ordstatus'] != 0) {
		return true;
	}

	// Don't email the customer if this order was declined
	if($status != ORDER_STATUS_DECLINED) {
		if($sendInvoice && !EmailInvoiceToCustomer($order['orderid'])) {
			$GLOBALS['HideError'] = "";
			$GLOBALS['ErrorMessage'] = GetLang('ErroSendingInvoiceEmail');
			$GLOBALS['HideSuccess'] = "none";
		}

		// Are we updating the inventory levels when an order has been placed?
		if(GetConfig('UpdateInventoryLevels') == 1) {
			DecreaseInventoryFromOrder($order['orderid']);
		}
	}

	// If this order now complete, we need to activate any gift certificates
	if(OrderIsComplete($status)) {
		$GLOBALS['ISC_CLASS_GIFTCERTIFICATES'] = GetClass('ISC_GIFTCERTIFICATES');
		$GLOBALS['ISC_CLASS_GIFTCERTIFICATES']->ActivateGiftCertificates($order['orderid']);
	}

	// If we've had one or more coupons been applied to this order, we now need to increment the number of uses
	$couponIds = array();
	$query = "SELECT * FROM [|PREFIX|]order_coupons WHERE ordcouporderid='".(int)$order['orderid']."'";
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	while($coupon = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$couponIds[] = $coupon['ordcouponid'];
	}
	if(!empty($couponIds)) {
		$couponsUsed = array_unique($couponIds);
		$couponList = implode(",", array_map("intval", $couponsUsed));
		$query = sprintf("UPDATE [|PREFIX|]coupons SET couponnumuses=couponnumuses+1 WHERE couponid IN (%s)", $couponList);
		$GLOBALS['ISC_CLASS_DB']->Query($query);
	}

	// If we used store credit on this order, we now need to subtract it from the users account.
	if($order['ordstorecreditamount'] > 0) {
		$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');
		$currentCredit = $GLOBALS['ISC_CLASS_CUSTOMER']->GetCustomerStoreCredit($order['ordcustid']);
		$newCredit = (float)CPrice($currentCredit - $order['ordstorecreditamount']);
		if($newCredit < 0) {
			$newCredit = 0;
		}
		$query = sprintf("UPDATE [|PREFIX|]customers SET custstorecredit='%s' WHERE customerid='%s'", $newCredit, $order['ordcustid']);
		$GLOBALS['ISC_CLASS_DB']->Query($query);
	}

	$extraInfo = @unserialize($order['extrainfo']);
	if(!is_array($extraInfo)) {
		$extraInfo = array();
	}

	// If one or more gift certificates were used we need to apply them to this order and subtract the total
	if($order['ordgiftcertificateamount'] > 0 && isset($extraInfo['giftcertificates']) && !empty($extraInfo['giftcertificates'])) {
		$usedCertificates = array();
		$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES'] = GetClass('ISC_GIFTCERTIFICATES');
		$GLOBALS['ISC_CLASS_GIFT_CERTIFICATES']->ApplyGiftCertificatesToOrder($order['orderid'], $order['ordtotalamount'], $extraInfo['giftcertificates'], $usedCertificates);
		unset($extraInfo['giftcertificates']);
	}

	// If there are one or more digital products in this order then we need to create a record in the order_downloads table
	// for each of them and set the expiry dates
	$query = "
		SELECT ordprodid, ordprodqty
		FROM [|PREFIX|]order_products
		WHERE orderorderid='".$order['orderid']."' AND ordprodtype='digital'
	";
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	$digitalProductIds = array();
	while($digitalProduct = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$digitalProductIds[$digitalProduct['ordprodid']] = $digitalProduct;
	}

	if(!empty($digitalProductIds)) {
		$query = "
			SELECT downloadid, productid, downexpiresafter, downmaxdownloads
			FROM [|PREFIX|]product_downloads
			WHERE productid IN (".implode(',', array_keys($digitalProductIds)).")
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($digitalDownload = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$expiryDate = 0;

			// If this download has an expiry date, set it to now + expiry time
			if($digitalDownload['downexpiresafter'] > 0) {
				$expiryDate = time() + $digitalDownload['downexpiresafter'];
			}

			// If they've purchased more than one, we need to give them max downloads X quantity downloads
			$quantity = $digitalProductIds[$digitalDownload['productid']]['ordprodqty'];

			$newDownload = array(
				'orderid' => $order['orderid'],
				'downloadid' => $digitalDownload['downloadid'],
				'numdownloads' => 0,
				'downloadexpires' => $expiryDate,
				'maxdownloads' => $digitalDownload['downmaxdownloads'] * $quantity
			);
			$GLOBALS['ISC_CLASS_DB']->InsertQuery('order_downloads', $newDownload);
		}
	}

	// Now update the order and set the status
	$updatedOrder = array(
		"ordstatus" => $status,
		"extrainfo" => serialize($extraInfo)
	);
	$GLOBALS['ISC_CLASS_DB']->UpdateQuery("orders", $updatedOrder, "orderid='".$order['orderid']."'");
	return true;
}
/**
 * Load a pending order from the pending orders table.
 *
 * @param string The token of the pending order to load.
 * @return array Array containing the pending order.
 */
function LoadPendingOrderByToken($Token="")
{
	if($Token == '' && isset($_COOKIE['SHOP_ORDER_TOKEN'])) {
		$Token = $_COOKIE['SHOP_ORDER_TOKEN'];
	}

	static $lastToken = null;
	static $lastOrder = null;

	if ($lastToken !== null && $Token === $lastToken) {
		return $lastOrder;
	}

	if($Token == '') {
		return false;
	}

	$query = sprintf("select * from [|PREFIX|]orders where ordtoken='%s'", $GLOBALS['ISC_CLASS_DB']->Quote($Token));
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	if($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$lastToken = $Token;
		$lastOrder = $row;
		return $row;
	}
	else {
		return false;
	}
}

/**
 *	Checks the token against the pendingtoken field in the pending_orders table to see if it's a valid pending order.
 *
 * @param string The token to look for.
 * @return boolean True if the order is valid.
 */
function IsValidPendingOrderToken($Token)
{
	$query = sprintf("select count(ordtoken) as num from [|PREFIX|]orders where ordtoken='%s' AND ordstatus=0", $GLOBALS['ISC_CLASS_DB']->Quote($Token));
	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
	$row = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

	if ($row['num'] > 0) {
		return true;
	} else {
		return false;
	}
}

/**
 * Create an actual order.
 *
 * @param array An array of information about the order.
 * @param array An array of items in the order.
 * @return string The token of the pending order.
 */
function CreateOrder($orderData, $orderProducts)
{
	$entity = new ISC_ENTITY_ORDER();

	// Delete any orders that are incomplete and were placed more than a week ago. This helps keep the database clean
	$entity->deleteOldOrders();

	$pendingToken = GenerateOrderToken();

	$orderData['products']		= $orderProducts;
	$orderData['pending_token'] = $pendingToken;

	if (isId($orderId = $entity->add($orderData))) {
		return $pendingToken;
	} else {
		return false;
	}
}

/**
 * Save an address from an order in to the shipping addresses table.
 *
 * @param int The customer ID to assign this address to
 * @param array An array of details about the address.
 */
function SaveOrderShippingAddress($customerId, $address)
{
	// First, does an address already exist under this street address 1 & full name? If so, don't add it
	$query = "
		SELECT shipid
		FROM [|PREFIX|]shipping_addresses
		WHERE shipcustomerid='".(int)$customerId."' AND LOWER(shipaddress1)='".$GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($address['shipaddress1']))."' AND LOWER(shipfullname)='".$GLOBALS['ISC_CLASS_DB']->Quote(isc_strtolower($address['shipfullname']))."'
	";
	$existingAddress = $GLOBALS['ISC_CLASS_DB']->FetchOne($query);
	if($existingAddress) {
		return;
	}

	$address['shiplastused'] = time();
	unset($address['saveAddress']);
	unset($address['shipemail']);
	$address['shipcustomerid'] = (int)$customerId;

	$GLOBALS['ISC_CLASS_DB']->InsertQuery('shipping_addresses', $address);
}

/**
 * Generate a unique order token.
 *
 * @return string THe unique order token (32 characters)
 */
function GenerateOrderToken()
{
	return md5(uniqid());
}

/**
 * Rebuild the prices of an item in the customers shopping cart to the present
 * default currency.
 */
function RecompileOrderPrices()
{
	if (!isset($_SESSION['CART']['ITEMS']) || empty($_SESSION['CART']['ITEMS'])) {
		return false;
	}

	$defaultCurrency = GetDefaultCurrency();

	foreach ($_SESSION['CART']['ITEMS'] as $k => $item) {
		// If currencies are the same then leave it alone
		if(!isset($item['default_currency']) && $defaultCurrency['currencyid'] == $item['default_currency']) {
			continue;
		}

		if (array_key_exists('original_price', $item)) {
			$item['original_price'] = ConvertPriceToDefaultCurrency($item['original_price'], $item['default_currency']);
		}

		$item['product_price'] = ConvertPriceToDefaultCurrency($item['product_price'], $item['default_currency']);
		$item['default_currency'] = $defaultCurrency['currencyid'];
		$_SESSION['CART']['ITEMS'][$k] = $item;
	}

	return true;
}

/**
 * Get a list of order statuses that orders that have been paid for may be set to. This is primarily used for store statistics.
 *
 * @return array An array of paid order statuses.
 */
function GetPaidOrderStatusArray()
{
	return array(
		ORDER_STATUS_SHIPPED,
		ORDER_STATUS_PARTIALLY_SHIPPED,
		ORDER_STATUS_AWAITING_PICKUP,
		ORDER_STATUS_AWAITING_SHIPMENT,
		ORDER_STATUS_COMPLETED,
		ORDER_STATUS_AWAITING_FULFILLMENT,
	);
}

//
/**
 * We need to sort the gift certificates from least balance to most balance remaining and apply them in that order
 *
 * @param array The first gift certificate
 * @param array The second gift certificate
 *
 * @return integer
 **/
function GiftCertificateSort($a, $b)
{
	if ($a['giftcertbalance'] == $b['giftcertbalance']) {
		return 0;
	}
	if ($a['giftcertbalance'] < $b['giftcertbalance']) {
		return -1;
	}
	else {
		return 1;
	}
}
?>
