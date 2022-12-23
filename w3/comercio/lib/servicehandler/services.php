<?php

abstract class ISC_SERVICEHANDLER_SERVICES
{
	protected $op;
	protected $data;
	protected $handler;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 * @param string $op The function name of the operation to execute
	 * @param object &$data The referenced arguments object to pass to the sevrice
	 * @param object &$handler The reference to the handler object
	 */
	public function __construct($op, &$data, &$handler)
	{
		if ($op == "") {
			throw new Exception("The operation string cannot be empty");
		}

		if (!method_exists($this, strtolower($op))) {
			throw new Exception("The operation '" . $op . "' does not exists");
		}

		$this->op		= $op;
		$this->data		= $data;
		$this->handler	= $handler;
	}

	/**
	 * Execute the operation
	 *
	 * Method will execute the operation specified in the $op variable. The operation variable is set to lowercase, so the operation
	 * method should also be lowercase
	 *
	 * @access public
	 * @return mixed The output of the operation method called
	 */
	public function exec()
	{
		$className = strtolower($this->op);
		return $this->$className();
	}

	/**
	 * Execute a sibling operation
	 *
	 * Method will execute an existing sibling operation using the existing handler
	 *
	 * @access protected
	 * @param mixed &$output The referenced variable to store the output of the service
	 * @param string $service The name of the service
	 * @param string $op The optional operation for the service to preform. Default is $this->defaultOp
	 * @param object $data The optional data object to pass to the service object. Default is empty object
	 * @return bool true if the service was executed successfully, FALSE otherwise
	 */
	protected function execSibling(&$output, $service, $op="", $data=null)
	{
		return $this->handler->exec($output, $service, $op, $data);
	}
}

?>