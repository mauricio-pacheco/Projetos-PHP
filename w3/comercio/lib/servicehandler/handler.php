<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "services.php");

abstract class ISC_SERVICEHANDLER_HANDLER
{
	private $lastError;

	protected $filePath;
	protected $filePrefix;
	protected $classPrefix;
	protected $defaultOp;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 */
	public function __construct($filePath, $filePrefix="", $classPrefix="", $defaultOp="main")
	{
		if ($filePath == "" || !is_dir($filePath)) {
			trigger_error("Invalid service path '" . $filePath . "'", E_USER_ERROR);
			return false;
		}

		$this->filePath		= $filePath;
		$this->filePrefix	= $filePrefix;
		$this->classPrefix	= $classPrefix;
		$this->defaultOp	= $defaultOp;
		$this->lastError	= "";
	}

	/**
	 * Get the file path of a service
	 *
	 * Method will return the file path of the service
	 *
	 * @access protected
	 * @param string $service The service name of the service, which is also the file name of the service
	 * @return string The full service file path on success
	 */
	protected function getPath($service)
	{
		return (string)realpath($this->filePath . DIRECTORY_SEPARATOR . $this->filePrefix . strtolower($service) . ".php");
	}

	/**
	 * Get the service class name
	 *
	 * Method will return the service class name
	 *
	 * @access protected
	 * @param string $service The name of the service
	 * @return string The service class name
	 */
	protected function getClassName($service)
	{
		return $this->classPrefix . strtoupper($service);
	}

	/** 
	 * Get the service
	 *
	 * Method will initialise an instance of the service and return the object
	 *
	 * @access protected
	 * @param object &$output The referenced variable to store the output object in
	 * @param string $service The name of the service
	 * @param string $op The operation for the service to preform
	 * @param object &$data The referenced data object to pass to the service object
	 * @return bool true if the object was created and stored successfully, FALSE otherwise
	 */
	protected function getService(&$output, $service, $op, &$data)
	{
		if (strtolower($service) == "base") {
			$this->setLastError("Cannot call the abstract class 'base'");
			return false;
		}
		else if (!$this->exists($service) || !include_once($this->getPath($service))) {
			$this->setLastError("Undefined service '" . $service . "'");
			return false;
		}

		$className = $this->getClassName($service);

		if (!method_exists($className, "exec")) {
			$this->setLastError("Undefined executing method 'exec'");
			return false;
		}

		try {
			$output = new $className($op, $data, $this);
		} catch (Exception $e) {
			$this->setLastError($e->getMessage());
			return false;
		}

		return true;
	}

	/**
	 * Get the last error message
	 *
	 * Method will get the last error message
	 *
	 * @access public
	 * @return string The last error message
	 */
	public function getLastError()
	{
		return $this->lastError;
	}

	/**
	 * Set the last error message
	 *
	 * Method will set the last error message
	 *
	 * @access protected
	 * @param string $error The error message to set
	 */
	protected function setLastError($error)
	{
		return $this->lastError = $error;
	}

	/**
	 * Check to see if a service exists or not
	 *
	 * Method will check to see if the service exists or not
	 *
	 * @access public
	 * @param string $service The name of the service
	 * @return bool true if the service exists, FALSE if not
	 */
	public function exists($service)
	{
		return ($service !== "" && file_exists($this->getPath($service)));
	}

	/**
	 * Execute a service
	 *
	 * Method will initialise and then execute the service. Return will be the output of the service. If an error has occured then the lastError property
	 * will be populate with the error message, which can be accessed with $this->getLastError()
	 *
	 * @access public
	 * @param mixed &$output The referenced variable to store the output of the service
	 * @param string $service The name of the service
	 * @param string $op The optional operation for the service to preform. Default is $this->defaultOp
	 * @param object $data The optional data object to pass to the service object. Default is empty object
	 * @return bool true if the service was executed successfully, FALSE otherwise
	 */
	public function exec(&$output, $service, $op="", $data=null)
	{
		if (is_null($data)) {
			$data = new StdClass();
		} else {
			$data = (object)$data;
		}

		if ($op == "") {
			$op = $this->defaultOp;
		}

		if ($op == "") {
			$this->setLastError("Must either provide the second argument 'op' OR set the default Op in the constructor");
			return false;
		}

		if ($this->getService($newService, $service, $op, $data)) {
			try {
				$output = $newService->exec();
				return true;
			} catch (Exception $e) {
				$this->setLastError($e->getMessage());
			}
		}

		return false;
	}

	/**
	 * Execute an undefined service
	 *
	 * Method is a wrapper for cathcing undefined method in hopes that the user was actually meaning to execute a service. If the caught method name $method
	 * contains an underscore, then the method name will be split in 2 with the first part being the service name and the rest being the operation
	 *
	 * @access public
	 * @param string $method The method to match to a service. Can contain an underscore to separate the service name and the operartion
	 * @param array $args The arguments to pass to the service
	 * @return array An array containing the result if the service was successfully executed or not and the second element being the output of the service
	 */
	public function __call($method, $args)
	{
		if (strpos($method, "_") !== false) {
			list($service, $op) = explode("_", $method, 2);
		} else {
			$service= $method;
			$op		= "";
		}

		if (!$this->exists($service)) {
			$this->setLastError('Undefined service "' . $service . '"');
			return array(false, null);
		}

		/**
		 * Modify the arguments. If there is only one argument then pop it out of the array and pass the element, else just pass as is
		 */
		if (count($args) == 1) {
			$args = $args[0];
		}

		$rtn = self::exec($output, $service, $op, $args);

		return array($rtn, $output);
	}
}

?>
