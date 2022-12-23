<?php

class ACCOUNTING_QUICKBOOKS_ENTITIES_ORDER extends ACCOUNTING_QUICKBOOKS_ENTITIES_BASE
{
	protected function xml()
	{
		/**
		 * The ordering of the elements matter to QBWC so DO NOT CHANGE THE ORDERING!!! 
		 */
		
		/**
		 * Yes, TnxID, don't ask, just do
		 */
		if (property_exists($this->data->info, 'txnid')) {
			$this->qbXMLNode->addChild('TxnID', trim($this->data->info->txnid));
			$this->qbXMLNode->addChild('EditSequence', trim($this->data->info->edit_sequence));
		}

		if (is_object($child = $this->qbXMLNode->addChild('CustomerRef'))) {
			$child->addChild('ListID', $this->data->info->customerid);
		}

		if (property_exists($this->data->info, 'date')) {
			$this->qbXMLNode->addChild('TxnDate', $this->data->info->date);
		}

		if (property_exists($this->data->info, 'orderid')) {
			$this->qbXMLNode->addChild('RefNumber', 'CART:' . str_pad($this->data->info->orderid, 6, '0', STR_PAD_LEFT));
		}

		if (property_exists($this->data->info, 'billingaddress') && is_object($child = $this->qbXMLNode->addChild('BillAddress'))) {
			$bill =& $this->data->info->billingaddress;

			$child->addChild('Addr1', trim($bill['shipaddress1']));

			if (array_key_exists('shipaddress2', $bill) && $bill['shipaddress2'] !== '') {
				$child->addChild('Addr2', trim($bill['shipaddress2']));
			}

			$child->addChild('City', trim($bill['shipcity']));
			$child->addChild('State', trim($bill['shipstate']));
			$child->addChild('PostalCode', trim($bill['shipzip']));
			$child->addChild('Country', trim($bill['shipcountry']));
		}

		if (property_exists($this->data->info, 'shipingaddress') && is_object($child = $this->qbXMLNode->addChild('ShipAddress'))) {
			$ship =& $this->data->info->shipingaddress;

			$child->addChild('Addr1', trim($ship['shipaddress1']));

			if (array_key_exists('shipaddress2', $ship) && $ship['shipaddress2'] !== '') {
				$child->addChild('Addr2', trim($ship['shipaddress2']));
			}

			$child->addChild('City', trim($ship['shipcity']));
			$child->addChild('State', trim($ship['shipstate']));
			$child->addChild('PostalCode', trim($ship['shipzip']));
			$child->addChild('Country', trim($ship['shipcountry']));
		}

		/**
		 * Now to recursively add the products
		 */
		if (property_exists($this->data->info, 'products') && is_array($this->data->info->products)) {
			foreach ($this->data->info->products as $product) {
				if (is_object($child = $this->qbXMLNode->addChild('SalesOrderLineAdd'))) {
					if (is_object($ref = $child->addChild('ItemRef'))) {
						$ref->addChild('ListID', $product['productid']);
					}

					$child->addChild('Desc', trim($product['name']));
					$child->addChild('Quantity', (int)$product['quantity']);
					$child->addChild('Amount', $product['amount']);
				}
			}
		}

		return $this->xmlNode->asXML();
	}

	protected function xmlrevert()
	{
		$this->xml2string($xml);

		$record				= new StdClass();
		$record->customerid	= (string)$xml->CustomerRef->ListID;
		
		if (property_exists($xml, 'BillAddress')) {
			$record->billing_address = array(
								'address1'	=> (string)$xml->BillAddress->Addr1,
								'address2'	=> (string)$xml->BillAddress->Addr2,
								'city'		=> (string)$xml->BillAddress->City,
								'state'		=> (string)$xml->BillAddress->state,
								'zip'		=> (string)$xml->BillAddress->PostalCode,
								'country'	=> (string)$xml->BillAddress->Country,
			);
		}

		if (property_exists($xml, 'ShipAddress')) {
			$record->shipping_address = array(
								'address1'	=> (string)$xml->BillAddress->Addr1,
								'address2'	=> (string)$xml->BillAddress->Addr2,
								'city'		=> (string)$xml->BillAddress->City,
								'state'		=> (string)$xml->BillAddress->state,
								'zip'		=> (string)$xml->BillAddress->PostalCode,
								'country'	=> (string)$xml->BillAddress->Country,
			);
		}

		/**
		 * Get all the products
		 */
		$tmp				= $xml->xpath('//SalesOrderLineAdd');
		$record->products	= array();

		if (is_array($tmp)) {
			foreach($tmp as $product) {

				$setup				= array();
				$setup['productid']	= (string)$product->ItemRef->ListID;
				$setup['name']		= (string)$product->Desc;
				$setup['quantity']	= (string)$product->Quantity;
				$setup['amount']	= (string)$product->Amount;

				$record->products[] = $setup;
			}
		}

		/**
		 * We also need the order id. The only way to do that is to parse it out of the TnxID element
		 */
		$record->orderid = null;
		if (property_exists($xml, 'RefNumber')) {
			$record->orderid = str_replace('CART:', '', (string)$xml->RefNumber);
		}

		return $record;
	}
}