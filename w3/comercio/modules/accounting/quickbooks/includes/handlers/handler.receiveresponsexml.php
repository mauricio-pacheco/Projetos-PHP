<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_RECEIVERESPONSEXML extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	private $qbAction;
	private $qbObject;
	private $job;

	protected $inputVars = array('ticket', 'response', 'hresult', 'message');

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

		$this->qbAction	= null;
		$this->qbObject	= null;
		$this->job		= null;
	}

	/**
	 * Parse the qbXML response
	 *
	 * Method will validate and convert the qbXML response into a SimpleXML object
	 *
	 * @access private
	 * @return bool true if the qbXML was valid and successfully parsed, FALSE otherwise
	 */
	private function parseResponse()
	{
		if (!is_object($obj = simplexml_load_string(trim($this->data->response))) || !($obj = $obj->xpath('/QBXML/QBXMLMsgsRs/*[1]'))) {
			return false;
		}

		$obj = $obj[0];

		/**
		 * Check to see if we have an 'Rs' appended to the element name. If not then return false as this is not a response
		 */
		if (substr($obj->getName(), -2) !== 'Rs') {
			return false;
		}

		/**
		 * Ok, the response is good
		 */
		$this->qbAction = substr($obj->getName(), 0, -2);
		$this->qbObject = $obj;

		/**
		 * Now we assign the response XML object to the current jobs savedata array
		 */
		foreach ($obj->children() as $key => $child) {
			if (strtolower(substr($key, -3)) == 'ret') {
				$this->session->setSpoolJobData($this->job, $child);
				break;
			}
		}

		return true;
	}

	/**
	 * Execute a qbXML service
	 *
	 * Method will execute the qbXML service script. Errors will be set automatically
	 *
	 * @access private
	 * @param mixed &$output The referenced variable to store the output in
	 * @return bool true if the service was executed successfully, FALSE if not
	 */
	private function execResponse()
	{
		if ($this->qbAction == '' || !is_object($this->qbObject)) {
			return false;
		}

		$data = array(
			'job'	=> $this->job,
			'info'	=> $this->qbObject
		);

		if (!($rtn = $this->service->exec($output, $this->qbAction, 'response', $data))) {
			$this->session->setQBSession('LAST_ERROR', $this->service->getLastError());
		}

		return $rtn;
	}

	/**
	 * Return the output with the percentage completed
	 *
	 * Method will return the class output with the percentage completed as the output argument value
	 *
	 * @access private
	 * @return object The output class object
	 */
	private function returnWithPercentageRate()
	{
		/**
		 * We set a hard limit of 99 to ensure that we will always get a response back
		 */
		return new receiveResponseXMLResultSOAPOut(99);
	}

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the receiveResponseXML handling
	 *
	 * @access protected
	 * @return object The receiveResponseXMLResultSOAPOut object containing the receiveResponseXML result
	 */
	protected function handle()
	{
		/**
		 * Firstly, lets find the current job
		 */
		$this->job = $this->getCurrentJob();

		/**
		 * Mark this job as executed. We do it here and not in the sendRequestXML handler as that handler could have sent a child service instead. Atleast here we can
		 * properly mark which job was just executed
		 */
		$this->setJobAsExecuted($this->job);

		/**
		 * Do our authenticity check
		 */
		if (!$this->check()) {
			return $this->returnWithPercentageRate();
		}

		/**
		 * Check to see if we have a valid XML request to preform
		 */
		if (!$this->parseResponse() || $this->qbAction == '') {
			if ($this->qbAction !== '') {
				$this->session->setQBSession('LAST_ERROR', 'Missing action');
			} else {
				$this->session->setQBSession('LAST_ERROR', 'Unsupported action service "' . $this->qbAction . '"');
			}

		/**
		 * Ok, we got a valid response, now we act on it
		 */
		} else {
			$this->execResponse();
		}

		/**
		 * Assign the next spool service in line
		 */
		 $this->assignNextService($this->job);

		/**
		 * All good. Go home
		 */
		return $this->returnWithPercentageRate();
	}
}

/**
 * The SOAP output object
 *
 * Class is the serverVersion SOAP output object
 */
class receiveResponseXMLResultSOAPOut
{
	public $receiveResponseXMLResult;

	public function __construct($msg='')
	{
		$this->receiveResponseXMLResult = $msg;
	}
}

?>