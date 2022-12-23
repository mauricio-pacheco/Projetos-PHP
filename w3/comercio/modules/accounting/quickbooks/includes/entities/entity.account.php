<?php

class ACCOUNTING_QUICKBOOKS_ENTITIES_ACCOUNT extends ACCOUNTING_QUICKBOOKS_ENTITIES_BASE
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

		if (property_exists($this->data->info, 'isactive')) {
			$this->qbXMLNode->addChild('IsActive', (int)$this->data->info->isactive);
		}

		$this->qbXMLNode->addChild('AccountType', trim((string)$this->data->info->type));

		if (property_exists($this->data->info, 'desc')) {
			$this->qbXMLNode->addChild('Desc', trim((string)$this->data->info->desc));
		}

		return $this->xmlNode->asXML();
	}

	protected function xmlrevert()
	{
		$this->xml2string($xml);

		$record			= new StdClass();
		$record->name	= (string)$xml->Name;
		$record->type	= (string)$xml->AccountType;

		if (property_exists($xml, 'Desc')) {
			$record->desc = (int)$xml->Desc;
		}
	
		if (property_exists($xml, 'IsActive')) {
			$record->isactive = (int)$xml->IsActive;
		}

		if (property_exists($xml, 'ListID')) {
			$record->listid			= (string)$xml->ListID;
			$record->edit_sequence	= (string)$xml->EditSequence;
		}

		/**
		 * We also need the sales tax code id (the misc id)
		 */
		$record->accountid = null;

		if ($xml->ListID !== '' && isId($accountid = $this->quickbooks->getAccountingReference($ref, array('ListID' => (string)$xml->ListID), 'account'))) {
			$record->accountid = $accountid;
		}

		return $record;
	}

	protected function xmlquery()
	{
		$this->qbXMLNode->addChild('FullName', trim($this->data->info->name));

		/**
		 * The query XML does not have the <AccountQuery> tags. Why can't everything be the same
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