<?php

class ACCOUNTING_QUICKBOOKS_ENTITIES_CUSTOMER extends ACCOUNTING_QUICKBOOKS_ENTITIES_BASE
{
	protected function xml()
	{
		/**
		 * The ordering of the elements matter to QBWC so DO NOT CHANGE THE ORDERING!!!
		 */
		if (property_exists($this->data->info, 'listid')) {
			$this->qbXMLNode->addChild('ListID', trim($this->data->info->listid));
			$this->qbXMLNode->addChild('EditSequence', trim($this->data->info->edit_sequence));
		}

		$this->qbXMLNode->addChild('Name', trim($this->data->info->firstname . ' ' . $this->data->info->lastname));

		if (property_exists($this->data->info, 'isactive') && $this->data->info->isactive !== '') {
			$this->qbXMLNode->addChild('IsActive', trim($this->data->info->isactive));
		}

		$this->qbXMLNode->addChild('CompanyName', trim($this->data->info->company));
		$this->qbXMLNode->addChild('FirstName', trim($this->data->info->firstname));
		$this->qbXMLNode->addChild('LastName', trim($this->data->info->lastname));

		/**
		 * Assign the billing address if we don't have any
		 */
		if (!property_exists($this->data->info, 'billing_address') && property_exists($this->data->info, 'shipping_address')) {
			$this->data->info->billing_address =& $this->data->info->shipping_address;
		}

		if (property_exists($this->data->info, 'billing_address') && is_object($billing = $this->qbXMLNode->addChild('BillAddress'))) {
			$billdata =& $this->data->info->billing_address;

			$billing->addChild('Addr1', $billdata['address1']);
			$billing->addChild('Addr2', $billdata['address2']);
			$billing->addChild('City', $billdata['city']);
			$billing->addChild('State', $billdata['state']);
			$billing->addChild('PostalCode', $billdata['zip']);
			$billing->addChild('Country', $billdata['country']);
		}

		if (property_exists($this->data->info, 'shipping_address') && is_object($shipping = $this->qbXMLNode->addChild('ShipAddress'))) {
			$shipdata =& $this->data->info->shipping_address;

			$shipping->addChild('Addr1', $shipdata['address1']);
			$shipping->addChild('Addr2', $shipdata['address2']);
			$shipping->addChild('City', $shipdata['city']);
			$shipping->addChild('State', $shipdata['state']);
			$shipping->addChild('PostalCode', $shipdata['zip']);
			$shipping->addChild('Country', $shipdata['country']);
		}

		$this->qbXMLNode->addChild('Phone', trim($this->data->info->phone));
		$this->qbXMLNode->addChild('Email', trim($this->data->info->email));

		if (property_exists($this->data->info, 'customergroupid') && is_object($priceref = $this->qbXMLNode->addChild('PriceLevelRef'))) {
			$priceref->addChild('ListID', $this->data->info->customergroupid);
		}

		return $this->xmlNode->asXML();
	}

	protected function xmlrevert()
	{
		$this->xml2string($xml);

		$record				= new StdClass();
		$record->firstname	= (string)$xml->FirstName;
		$record->lastname	= (string)$xml->LastName;
		$record->company	= (string)$xml->CompanyName;
		$record->phone		= (string)$xml->Phone;
		$record->email		= (string)$xml->Email;

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

		if (property_exists($xml, 'ListID')) {
			$record->listid			= (string)$xml->ListID;
			$record->edit_sequence	= (string)$xml->EditSequence;
		}

		if (property_exists($xml, 'IsActive')) {
			$record->isactive = (string)$xml->IsActive;
		}

		if (property_exists($xml, 'PriceLevelRef') && property_exists($xml->PriceLevelRef, 'ListID')) {
			$record->customergroupid = (string)$xml->PriceLevelRef->ListID;
		}

		/**
		 * We also need the customer id
		 */
		$record->customerid	= null;
		$result				= $GLOBALS['ISC_CLASS_DB']->Query("SELECT customerid FROM [|PREFIX|]customers WHERE custconemail='" . $GLOBALS['ISC_CLASS_DB']->Quote((string)$xml->Email) . "'");

		if ($xml->Email !== '' && ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result))) {
			$record->customerid = $row['customerid'];
		}

		return $record;
	}

	protected function xmlquery()
	{
		$this->qbXMLNode->addChild('FullName', trim($this->data->info->firstname . ' ' . $this->data->info->lastname));

		/**
		 * The query XML does not have the <CustomerQuery> tags. Why can't everything be the same
		 */
		$xml = $this->xmlNode->asXML();
		$xml = str_replace('<' . $this->data->type . '>', '', $xml);
		$xml = str_replace('</' . $this->data->type . '>', '', $xml);

		return $xml;
	}

	protected function xmlqueryrevert()
	{
		$this->xml2string($xml);

		if (property_exists($xml, 'ListID')) {
			return self::xmlrevert();
		}

		return false;
	}

	protected function genxml()
	{
		if (!property_exists($this->data, 'customerid') || !isId($this->data->customerid)) {
			return false;
		}

		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customers WHERE customerid='" .  addslashes($this->data->customerid) . "'");
		if (!($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result))) {
			return false;
		}

		$this->data->info->customerid	= $row['customerid'];
		$this->data->info->firstname	= $row['custconfirstname'];
		$this->data->info->lastname		= $row['custconlastname'];
		$this->data->info->company		= $row['custconcompany'];
		$this->data->info->email		= $row['custconemail'];
		$this->data->info->phone		= $row['custconphone'];

		/**
		 * Set the billing and shipping addresses
		 */
		$type	= '';
		$result	= $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]shipping_addresses WHERE shipcustomerid='" . $row['customerid'] . "'");
		while ($addr = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			if ($type == '') {
				$type = 'billing_address';
			} else {
				$type = 'shipping_address';
			}

			$address = array(
					'address1'	=> $addr['shipaddress1'],
					'address2'	=> $addr['shipaddress2'],
					'city'		=> $addr['shipcity'],
					'state'		=> $addr['shipstate'],
					'zip'		=> $addr['shipzip'],
					'country'	=> $addr['shipcountry']
			);

			$this->data->info->$type = $address;
		}

		if (!$row['custgroupid'] && ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customer_groups WHERE isdefault='1'")))) {
			$this->data->info->customergroupid = $row['customergroupid'];
		}

		if (property_exists($this->data, 'asObject') && $this->data->asObject) {
			return $this->data->info;
		} else {
			return $this->xml();
		}
	}
}