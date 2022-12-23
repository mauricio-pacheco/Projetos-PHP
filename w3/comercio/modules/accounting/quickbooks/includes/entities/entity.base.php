<?php

abstract class ACCOUNTING_QUICKBOOKS_ENTITIES_BASE extends ISC_SERVICEHANDLER_SERVICES
{
	protected $quickbooks;
	protected $xmlNode;
	protected $qbXMLNode;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 * @param string $op The operation to preform
	 * @param array &$data The referenced data array
	 * @param array &$parent The referenced handler parent object
	 */
	public function __construct($op, &$data, &$parent)
	{
		parent::__construct($op, $data, $parent);

		GetModuleById('accounting', $this->quickbooks, 'accounting_quickbooks');

		$this->xmlNode		= null;
		$this->qbXMLNode	= null;

		/**
		 * Setup our SimpleXML node. One will be the main XML node and the other one will be the node to append all the children qbXML to 
		 */
		$GLOBALS['EntityType'] = $this->data->type;

		$xml = $this->quickbooks->ParseTemplate('module.quickbooks.qbxml', true);

		$this->xmlNode		= simplexml_load_string($xml);
		$this->qbXMLNode	= $this->xmlNode->xpath('/QBXML/QBXMLMsgsRq/' . $this->data->type . 'Rq/' . $this->data->type);
		$this->qbXMLNode	= $this->qbXMLNode[0];
	}

	/**
	 * Convert an XML string into an object
	 *
	 * Method is a wrapper function for converting an XML string into an XML object
	 *
	 * @access protected
	 * @param object &$xml The referenced variable to store the converted object into
	 */
	protected function xml2string(&$xml)
	{
		if (is_string($this->data->info)) {
			if (!property_exists($this->data, 'stripped') || !$this->data->stripped) {
				$xml = simplexml_load_string($this->data->info);
				$xml = $xml->xpath('/QBXML/QBXMLMsgsRq/' . $this->data->type . 'Rq/' . $this->data->type);
				$xml = $xml[0];
			
			/**
			 * Else if we are a stripped text then wrap it up in a tag as SimpleXML will not parse it. Don't worry, this tag will not be included
			 * within the output
			 */
			} else {
				$xml = simplexml_load_string('<' . $this->data->type . '>' . $this->data->info . '</' . $this->data->type . '>');
			}
		} else {
			$xml = $this->data->info;
		}
	}
}

?>