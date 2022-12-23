<?php

class ACCOUNTING_QUICKBOOKS_HANDLERS_AUTHENTICATE extends ACCOUNTING_QUICKBOOKS_HANDLERS_BASE
{
	protected $inputVars = array('strUserName', 'strPassword');

	/**
	 * Generate the UUID
	 *
	 * Method will generate the UUID needed for communicating back and forth with QuickBoks
	 *
	 * @access private
	 * @param string $prefix The optional prefix for the generated UUID
	 * @return string The UUID
	 */
	private function generateUUID($prefix='')
	{
		$chars = uniqid(md5(mt_rand()));
		$uuid = substr($chars,0,8) . '-';
		$uuid .= substr($chars,8,4) . '-';
		$uuid .= substr($chars,12,4) . '-';
		$uuid .= substr($chars,16,4) . '-';
		$uuid .= substr($chars,20,12);

		return $prefix . $uuid;
	}

	/**
	 * Handle the handler operation
	 *
	 * Method is the main function that will do the authentication handling
	 *
	 * @access protected
	 * @return object The authenticateResultSOAPOut object containing the authentication result
	 */
	protected function handle()
	{
		$uuid = $this->generateUUID();

		if (!$this->checkInput()) {
			return new authenticateResultSOAPOut($uuid, 'nvu');
		}

		$this->quickbooks->getSetupVariable($password, 'password');
		$this->quickbooks->getSetupVariable($username, 'username');

		/**
		 * Check our credentials
		 */
		if ($this->data->strUserName !== $username || $this->data->strPassword !== $password) {
			return new authenticateResultSOAPOut($uuid, 'nvu');

		/**
		 * Also check to see if we are already running
		 */
		} else if ($this->quickbooks->checkLockFile(true)) {
			return new authenticateResultSOAPOut($uuid, 'none');
		}

		/**
		 * Destroy the current session
		 */
		$this->session->unsetQBSession();

		/**
		 * Now create it again
		 */
		$this->session->setQBSessSession();

		/**
		 * Now set our lock file
		 */
		$this->quickbooks->setLockFile();

		/**
		 * Now assign our UUID that will be the passkey for this session
		 */
		$this->session->setQBSession('UUID', $uuid);

		return new authenticateResultSOAPOut($uuid, '');
	}
}

/**
 * The SOAP output object
 *
 * Class is the authentication SOAP output object
 */
class authenticateResultSOAPOut
{
	public $authenticateResult;

	public function __construct($ticket, $status)
	{
		$this->authenticateResult = array($ticket, $status);
	}
}

?>
