<?php

class ISC_ENTITY_BASE
{
	protected $accounting;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this->accounting = GetClass('ISC_ACCOUNTING');
	}

	/**
	 * Create a service request (a spooled accounting job file)
	 *
	 * Method will create the necessary service requests (spooled job files) for each available accounting module
	 *
	 * @access protected
	 * @param string $service The service type of the service request (customeradd, customermod, etc)
	 * @param string $permission The permission string that is required for this service to be created
	 * @param array $input the data that the service will use
	 */
	protected function createServiceRequest($service, $permission, $input)
	{
		$input = (object)$input;

		$this->accounting->createServiceRequest($service, $permission, $input);
	}
}

?>