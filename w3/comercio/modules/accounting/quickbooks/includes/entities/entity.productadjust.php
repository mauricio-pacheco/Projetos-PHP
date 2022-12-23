<?php

class ACCOUNTING_QUICKBOOKS_ENTITIES_PRODUCTADJUST extends ACCOUNTING_QUICKBOOKS_ENTITIES_BASE
{
	protected function xml()
	{
		/**
		 * The ordering of the elements matter to QBWC so DO NOT CHANGE THE ORDERING!!!
		 */
		if (is_object($child = $this->qbXMLNode->addChild('AccountRef'))) {
			$child->addChild('FullName', GetLang('QuickBooksIncomeAccountName'));
		}

		if (is_object($adjustment = $this->qbXMLNode->addChild('InventoryAdjustmentLineAdd'))) {
			if (is_object($child = $adjustment->addChild('ItemRef'))) {
				$child->addChild('ListID', trim($this->data->info->listid));
			}
			if (is_object($child = $adjustment->addChild('QuantityAdjustment'))) {
				if (property_exists($this->data->info, 'difference')) {
					$child->addChild('QuantityDifference', trim($this->data->info->difference));
				} else if (property_exists($this->data->info, 'newquantity')) {
					$child->addChild('NewQuantity', trim($this->data->info->newquantity));
				}
			}
		}

		return $this->xmlNode->asXML();
	}

	protected function xmlrevert()
	{
		$this->xml2string($xml);

		$record			= new StdClass();
		$record->listid	= (string)$xml->InventoryAdjustmentLineRet->ItemRef->ListID;

		if (property_exists($xml->InventoryAdjustmentLineRet, 'QuantityDifference')) {
			$this->data->info->difference = (string)$xml->InventoryAdjustmentLineRet->QuantityDifference;
		} else if (property_exists($xml->InventoryAdjustmentLineRet, 'NewQuantity')) {
			$this->data->info->newquantity = (string)$xml->InventoryAdjustmentLineRet->NewQuantity;
		}

		/**
		 * We also need the product id
		 */
		$record->productid	= null;
		$result				= $GLOBALS['ISC_CLASS_DB']->Query("SELECT productid FROM [|PREFIX|]products WHERE prodname='" . $GLOBALS['ISC_CLASS_DB']->Quote((string)$xml->InventoryAdjustmentLineRet->ItemRef->FullName) . "'");

		if ($xml->InventoryAdjustmentLineRet->ItemRef->FullName !== '' && ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result))) {
			$record->productid = $row['productid'];
		}

		return $record;
	}

	/**
	 * No queries as they are broken in QuickBooks
	 */
	protected function xmlquery()
	{
	}

	/**
	 * No queries as they are broken in QuickBooks
	 */
	protected function xmlqueryrevert()
	{
	}

	/**
	 * No genxml as this is a special entity
	 */
	protected function genxml()
	{
	}
}