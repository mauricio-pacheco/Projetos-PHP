<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'entity.base.php');

class ISC_ENTITY_CUSTOMER extends ISC_ENTITY_BASE
{
	private $shipping;

	/**
	 * Constructor
	 *
	 * Base constructor
	 *
	 * @access public
	 */
	public function __construct()
	{
		parent::__construct();

		$this->shipping = new ISC_ENTITY_SHIPPING;
	}

	/**
	 * Add a customer
	 *
	 * Method will add a customer to the database
	 *
	 * @access public
	 * @param array $input The customer details
	 * @return int The customer record ID on success, FALSE otherwise
	 */
	public function add($input)
	{
		$savedata = array(
			'custpassword'		=> md5($input['password']),
			'custconcompany'	=> $input['company'],
			'custconfirstname'	=> $input['firstname'],
			'custconlastname'	=> $input['lastname'],
			'custconemail'		=> $input['email'],
			'custconphone'		=> $input['phone'],
			'customertoken'		=> $input['token'],
			'custnewpassword'	=> "",
			'custdatejoined'	=> time()
		);

		if (array_key_exists('customergroupid', $input)) {
			$savedata['custgroupid'] = $input['customergroupid'];
		} else {
			$input['customergroupid']	= 0;
			$savedata['custgroupid']	= 0;
		}

		if (!array_key_exists('is_import', $input) || !$input['is_import']) {
			$savedata['custregipaddress'] = GetIP();
		} else {
			$savedata['customertoken'] = $input['token'];
		}

		$input['customerid'] = $GLOBALS['ISC_CLASS_DB']->InsertQuery('customers', $savedata);
		if (!isId($input['customerid'])) {
			return false;
		}

		if (array_key_exists('shipping_address', $input)) {
			$input['shipping_address']['customerid'] = $input['customerid'];
			$this->shipping->add($input['shipping_address']);
		}

		/**
		 * Create the spool file
		 */
		$this->setCustomerGroup($input);
		$this->createServiceRequest('customeradd', 'customer_create', $input);

		return $input['customerid'];
	}

	/**
	 * Edit a customer
	 *
	 * Method will edit a customer's details
	 *
	 * @access public
	 * @param array $input The customer's details
	 * @return bool TRUE if the customer exists and the details were updated successfully, FALSE oterwise
	 */
	public function edit($input)
	{
		if (!array_key_exists('customerid', $input) || !isId($input['customerid'])) {
			return false;
		}

		$savedata = array(
			'custconcompany'	=> $input['company'],
			'custconfirstname'	=> $input['firstname'],
			'custconlastname'	=> $input['lastname'],
			'custconemail'		=> $input['email'],
			'custconphone'		=> $input['phone']
		);

		if (array_key_exists('token', $input)) {
			$savedata['customertoken'] = $input['token'];
		}

		if (array_key_exists('password', $input)) {
			$savedata['custpassword'] = md5($input['password']);
		}

		if (array_key_exists('customergroupid', $input)) {
			$savedata['custgroupid'] = $input['customergroupid'];
		}

		if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery('customers', $savedata, "customerid='".$GLOBALS['ISC_CLASS_DB']->Quote($input['customerid'])."'")) {
			if (array_key_exists('shipping_address', $input)) {
				$input['shipping_address']->edit($input['shipping_address']);
			}

			/**
			 * Create the spool file
			 */
			$this->setCustomerGroup($input);
			$this->createServiceRequest('customermod', 'customer_edit', $input);

			return true;
		}

		return false;
	}

	/**
	 * Edit the customer's group ID
	 *
	 * Method will only edit the customer's group ID
	 *
	 * @access public
	 * @param int $customerid The customer ID
	 * @param int $customergroupid The new customer group ID. Default is 0 (the default group)
	 * @return bool TRUE if the customer's group was successfully updated, FALSE otherwise
	 */
	public function editGroup($customerid, $customergroupid=0)
	{
		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customers WHERE customerid='" . $customerid . "'");

		if (!isId($customerid) || !($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) || $customergroupid == '') {
			return false;
		}

		if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery('customers', array('custgroupid' => $customergroupid), "customerid='" . (int)$customerid . "'") === false) {
			return false;
		}

		$input = array(
			'customerid'		=> $row['customerid'],
			'company'			=> $row['custconcompany'],
			'firstname'			=> $row['custconfirstname'],
			'lastname'			=> $row['custconlastname'],
			'email'				=> $row['custconemail'],
			'phone'				=> $row['custconphone'],
			'customergroupid'	=> $customergroupid
		);

		$this->setCustomerGroup($input);
		$this->createServiceRequest('customermod', 'customer_edit', $input);

		return true;
	}

	/**
	 * Delete a customer
	 *
	 * Method will delete a customer
	 *
	 * @access public
	 * @param int $customerid The customer ID
	 * @return bool TRUE if the customer was deleted successfully, FASLE otherwise
	 */
	public function delete($customerid)
	{
		if (!isId($customerid) || !($row = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customers WHERE customerid='" . (int)$customerid . "'")))) {
			return false;
		}

		if ($GLOBALS['ISC_CLASS_DB']->Query("DELETE FROM [|PREFIX|]customers WHERE customerid='" . (int)$customerid . "'") !== false) {

			/**
			 * Create the spool file. Some fields are reuqired
			 */
			$input = array(
				'customerid'	=> $row['customerid'],
				'company'		=> $row['custconcompany'],
				'firstname'		=> $row['custconfirstname'],
				'lastname'		=> $row['custconlastname'],
				'email'			=> $row['custconemail'],
				'phone'			=> $row['custconphone'],
				'isactive'		=> 0,
			);

			$this->createServiceRequest('customermod', 'customer_edit', $input);
			return true;
		}

		return false;
	}

	/**
	 * Delete multiple customers
	 *
	 * Method will delete multiple customers
	 *
	 * @access public
	 * @param array $customerids The array containing the IDs of the customers to delete
	 * @return bool TRUE if the customers were all deleted, FASLE otherwise
	 */
	public function multiDelete($customerids)
	{
		if (!is_array($customerids)) {
			return false;
		}

		$customerids = array_filter($customerids, 'isId');

		foreach ($customerids as $customerid) {
			self::delete($customerid);
		}

		return true;
	}

	/**
	 * Get the current default customer group
	 *
	 * Method will set the default customer group if the customer group equals 0
	 *
	 * @access private
	 */
	private function setCustomerGroup(&$input)
	{
		if (!array_key_exists('customergroupid', $input) || isId($input['customergroupid'])) {
			return;
		}

		/**
		 * We must either have a customer group to set or we unset it else we'll cause a error
		 */
		if ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customer_groups WHERE isdefault='1'"))) {
			$input['customergroupid'] = $row['customergroupid'];
		} else {
			unset($input['customergroupid']);
		}
	}

	/**
	 * Import a customer
	 *
	 * Method will return the customer record that can be directly inserted into the accounting module. It is up the the calling function to actually
	 * import the record. This method just basically gives you the proper data to do it
	 *
	 * @access public
	 * @param int $customerid The customer ID
	 * @param array &$import The referenced array containing all the import data of the customer
	 * @return bool TRUE if the data was retrived successfully, FALSE otherwise
	 */
	public function import($customerid, &$import)
	{
		if (!isId($customerid) || !($row = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customers WHERE customerid='" . (int)$customerid . "'")))) {
			return false;
		}

		$import = array(
			'customerid'	=> $customerid,
			'company'		=> $row['custconcompany'],
			'firstname'		=> $row['custconfirstname'],
			'lastname'		=> $row['custconlastname'],
			'email'			=> $row['custconemail'],
			'phone'			=> $row['custconphone'],
		);

		$this->setCustomerGroup($import);

		return true;
	}
}

?>
