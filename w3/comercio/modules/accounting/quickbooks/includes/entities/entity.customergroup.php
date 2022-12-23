<?php

class ACCOUNTING_QUICKBOOKS_ENTITIES_CUSTOMERGROUP extends ACCOUNTING_QUICKBOOKS_ENTITIES_BASE
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

		$this->qbXMLNode->addChild('Name', trim((string)$this->data->info->name));

		if (property_exists($this->data->info, 'isactive') && $this->data->info->isactive !== '') {
			$this->qbXMLNode->addChild('IsActive', trim($this->data->info->isactive));
		}

		/**
		 * Must have this regardless if we have a percentage rate or not
		 */
		if (!property_exists($this->data->info, 'discount') || $this->data->info->discount == '') {
			$this->data->info->discount = 0;
		}

		$this->qbXMLNode->addChild('PriceLevelFixedPercentage', (float)$this->data->info->discount);

		return $this->xmlNode->asXML();
	}

	protected function xmlrevert()
	{
		$this->xml2string($xml);

		$record			= new StdClass();
		$record->name	= (string)$xml->Name;

		if (property_exists($xml, 'IsActive')) {
			$record->isactive = (string)$xml->IsActive;
		}

		$record->discount = (string)$xml->PriceLevelFixedPercentage;

		if (property_exists($xml, 'ListID')) {
			$record->listid			= (string)$xml->ListID;
			$record->edit_sequence	= (string)$xml->EditSequence;
		}

		/**
		 * We also need the customer id
		 */
		$record->customergroupid	= null;
		$result						= $GLOBALS['ISC_CLASS_DB']->Query("SELECT customergroupid FROM [|PREFIX|]customer_groups WHERE groupname='" . $GLOBALS['ISC_CLASS_DB']->Quote((string)$xml->Name) . "'");

		if ($xml->Name !== '' && ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result))) {
			$record->customergroupid = $row['customergroupid'];
		}

		return $record;
	}

	protected function xmlquery()
	{
		$this->qbXMLNode->addChild('FullName', trim($this->data->info->name));

		/**
		 * The query XML does not have the <PriceLevelQuery> tags. Why can't everything be the same
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
}