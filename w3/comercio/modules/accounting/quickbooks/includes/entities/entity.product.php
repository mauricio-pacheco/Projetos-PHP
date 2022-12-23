<?php

class ACCOUNTING_QUICKBOOKS_ENTITIES_PRODUCT extends ACCOUNTING_QUICKBOOKS_ENTITIES_BASE
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

		$this->qbXMLNode->addChild('Name', trim($this->data->info->prodname));

		if (property_exists($this->data->info, 'isactive') && $this->data->info->isactive !== '') {
			$this->qbXMLNode->addChild('IsActive', trim($this->data->info->isactive));
		}

//		if (property_exists($this->data->info, 'prodcode') && $this->data->info->prodcode !== '') {
//			$this->qbXMLNode->addChild('ManufacturerPartNumber', trim($this->data->info->prodcode));
//		}

		if (is_object($child = $this->qbXMLNode->addChild('SalesTaxCodeRef'))) {
			if ($this->data->info->prodistaxable) {
				$child->addChild('FullName', GetLang('QuickBooksSalesTaxCodeTaxName'));
			} else {
				$child->addChild('FullName', GetLang('QuickBooksSalesTaxCodeNonTaxName'));
			}
		}

		$this->qbXMLNode->addChild('SalesDesc', trim($this->data->info->prodname));
		$this->qbXMLNode->addChild('SalesPrice', trim($this->data->info->prodprice));

		/**
		 * We can only set this for the add process as the mod process is only available in versions 7.0 and above
		 */
		if ($this->data->type !== 'ItemInventoryMod') {
			if (is_object($child = $this->qbXMLNode->addChild('IncomeAccountRef'))) {
				$child->addChild('FullName', GetLang('QuickBooksIncomeAccountName'));
			}
		}

		if (property_exists($this->data->info, 'prodcostprice') && $this->data->info->prodcostprice > 0) {
			$this->qbXMLNode->addChild('PurchaseDesc', trim($this->data->info->prodname));
			$this->qbXMLNode->addChild('PurchaseCost', trim($this->data->info->prodcostprice));
		}

		if (is_object($child = $this->qbXMLNode->addChild('COGSAccountRef'))) {
			$child->addChild('FullName', GetLang('QuickBooksCOGSAccountName'));
		}

		if (is_object($child = $this->qbXMLNode->addChild('AssetAccountRef'))) {
			$child->addChild('FullName', GetLang('QuickBooksAssetAccountName'));
		}

		if (property_exists($this->data->info, 'prodlowinv') && isId($this->data->info->prodlowinv)) {
			$this->qbXMLNode->addChild('ReorderPoint', trim($this->data->info->prodlowinv));
		}

		if (property_exists($this->data->info, 'prodcurrentinv') && isId($this->data->info->prodcurrentinv)) {
			$this->qbXMLNode->addChild('QuantityOnHand', trim($this->data->info->prodcurrentinv));
		}

		return $this->xmlNode->asXML();
	}

	protected function xmlrevert()
	{
		$this->xml2string($xml);

		$record				= new StdClass();
		$record->prodname	= (string)$xml->Name;

//		if (property_exists($xml, 'ManufacturerPartNumber')) {
//			$record->prodcode = (string)$xml->ManufacturerPartNumber;
//		}

		if (strtolower($xml->SalesTaxCodeRef->FullName) == strtolower(GetLang('QuickBooksSalesTaxCodeTaxName'))) {
			$record->prodistaxable = 1;
		} else {
			$record->prodistaxable = 0;
		}

		$record->prodprice	= (string)$xml->SalesPrice;

		if (property_exists($xml, 'PurchaseCost')) {
			$record->prodcostprice = (string)$xml->PurchaseCost;
		}

		if (property_exists($xml, 'ReorderPoint')) {
			$record->prodlowinv = (string)$xml->ReorderPoint;
		}

		if (property_exists($xml, 'QuantityOnHand')) {
			$record->prodcurrentinv = (string)$xml->QuantityOnHand;
		}

		if (property_exists($xml, 'ListID')) {
			$record->listid			= (string)$xml->ListID;
			$record->edit_sequence	= (string)$xml->EditSequence;
		}

		if (property_exists($xml, 'IsActive')) {
			$record->isactive = (string)$xml->IsActive;
		}

		/**
		 * We also need the product id
		 */
		$record->productid	= null;
		$result				= $GLOBALS['ISC_CLASS_DB']->Query("SELECT productid FROM [|PREFIX|]products WHERE prodname='" . $GLOBALS['ISC_CLASS_DB']->Quote((string)$xml->Name) . "'");

		if ($xml->Name !== '' && ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result))) {
			$record->productid = $row['productid'];
		}

		return $record;
	}

	protected function xmlquery()
	{
		$this->qbXMLNode->addChild('FullName', trim($this->data->info->prodname));

		/**
		 * The query XML does not have the <ItemInventoryQuery> tags. Why can't everything be the same
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
		if (!property_exists($this->data, 'productid') || !isId($this->data->productid)) {
			return false;
		}

		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]products WHERE productid='" .  addslashes($this->data->productid) . "'");
		if (!($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result))) {
			return false;
		}

		$this->data->info = (object)$row;

		if (property_exists($this->data, 'asObject') && $this->data->asObject) {
			return $this->data->info;
		} else {
			return $this->xml();
		}
	}
}