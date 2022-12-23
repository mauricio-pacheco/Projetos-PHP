<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "headers" . DIRECTORY_SEPARATOR . "handlers.php");

class ACCOUNTING_QUICKBOOKS_HANDLERS extends ISC_SERVICEHANDLER_HANDLER
{
	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 */
	public function __construct()
	{
		$filePath	= ___MODULE_QB_HANDLERS___;
		$filePrefix	= "handler.";
		$classPrefix	= __CLASS__ . "_";

		parent::__construct($filePath, $filePrefix, $classPrefix);
	}

	/**
	 * Provide the server version
	 *
	 * Method will provide the server version
	 *
	 * @access public
	 * @param object $obj The SOAP input object
	 * @return string The result string to pass back
	 */
	public function serverVersion($obj)
	{
		return $this->execHandler(__FUNCTION__, $obj);
	}

	/**
	 * Provide the client version
	 *
	 * Method will provide the client version
	 *
	 * @access public
	 * @param object $obj The SOAP input object
	 * @return string The result string to pass back
	 */
	public function clientVersion($obj)
	{
		return $this->execHandler(__FUNCTION__, $obj);
	}

	/**
	 * Authentication handler
	 *
	 * Method will authenticate the current user
	 *
	 * @access public
	 * @param object $obj The SOAP input object
	 * @return object The result object to pass back
	 */
	public function authenticate($obj)
	{
		return $this->execHandler(__FUNCTION__, $obj);
	}

	/**
	 * closeConnection handler
	 *
	 * Method will close the currency connection
	 *
	 * @access public
	 * @param object $obj The SOAP input object
	 * @return object The result object to pass back
	 */
	public function closeConnection($obj)
	{
		return $this->execHandler(__FUNCTION__, $obj);
	}

	/**
	 * sendRequestXML handler
	 *
	 * Method will handle all request to QBWC
	 *
	 * @access public
	 * @param object $obj The SOAP input object
	 * @return object The result object to pass back
	 */
	public function sendRequestXML($obj)
	{
		return $this->execHandler(__FUNCTION__, $obj);
	}

	/**
	 * receiveResponseXML handler
	 *
	 * Method will handle all resopnses from QBWC
	 *
	 * @access public
	 * @param object $obj The SOAP input object
	 * @return object The result object to pass back
	 */
	public function receiveResponseXML($obj)
	{
		return $this->execHandler(__FUNCTION__, $obj);
	}

	/**
	 * Execute a handler service
	 *
	 * Method is a wrapper for handling all executed services
	 *
	 * @access private
	 * @param string $handler The service to execute
	 * @param array &$data The referenced data array
	 * @return mixed The output of the executed service
	 */
	private function execHandler($handler, &$data)
	{
		if (!parent::exec($output, $handler, "handle", $data)) {
			$this->setLastError("An error occured in the " . $handler . " SOAP handler: " . $this->getLastError());
		}

		return $output;
	}
}

?>
