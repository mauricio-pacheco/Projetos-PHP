<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'entity.base.php');

class ISC_ENTITY_CUSTOMERGROUP extends ISC_ENTITY_BASE
{
	/**
	 * Add a customer group
	 *
	 * Method will add a customer group to the database
	 *
	 * @access public
	 * @param array $input The customer group details
	 * @return int The customer group record ID on success, FALSE otherwise
	 */
	public function add($input)
	{
		$savedata = array(
			'groupname'			=> $input['name'],
			'discount'			=> $input['discount'],
			'isdefault'			=> $input['isdefault'],
			'accesscategories'	=> $input['accesscategories']
		);

		$input['customergroupid'] = $GLOBALS['ISC_CLASS_DB']->InsertQuery('customer_groups', $savedata);
		if (!$input['customergroupid']) {
			return false;
		}

		/**
		 * Create the spool file
		 */
		$this->createServiceRequest('priceleveladd', 'customer_create', $input);

		if ($input['isdefault']) {
			$this->setDefaultCustomerGroup($input['customergroupid']);
		}

		return $input['customergroupid'];
	}

	/**
	 * Edit a customer group
	 *
	 * Method will edit a customer group's details
	 *
	 * @access public
	 * @param array $input The customer group's details
	 * @return bool TRUE if the customer group exists and the details were updated successfully, FALSE oterwise
	 */
	public function edit($input)
	{
		if (!array_key_exists('customergroupid', $input) || !isId($input['customergroupid'])) {
			return false;
		}

		/**
		 * We need to check to see if this is already the default customer group. If this is aready a default and we ar also setting this as the
		 * default, then we can skip the setDefaultCustomerGroup method as that will just set thats that are already set
		 */
		$orig = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customer_groups WHERE customergroupid='" . (int)$input['customergroupid'] . "'"));

		$savedata = array(
			'groupname'			=> $input['name'],
			'discount'			=> $input['discount'],
			'isdefault'			=> $input['isdefault'],
			'accesscategories'	=> $input['accesscategories']
		);

		if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery('customer_groups', $savedata, "customergroupid='" . (int)$input['customergroupid'] . "'")) {

			/**
			 * Create the spool file
			 */
			$this->createServiceRequest('pricelevelmod', 'customer_edit', $input);

			if ($input['isdefault'] && $orig['isdefault'] == '0') {
				$this->setDefaultCustomerGroup($input['customergroupid']);
			}

			return true;
		}

		return false;
	}

	/**
	 * Delete a customer group
	 *
	 * Method will delete a customer group
	 *
	 * @access public
	 * @param int $customergroupid The customer group ID
	 * @return bool TRUE if the customer group was deleted successfully, FASLE otherwise
	 */
	public function delete($customergroupid)
	{
		if (!isId($customergroupid) || !($row = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customer_groups WHERE customergroupid='" . (int)$customergroupid . "'")))) {
			return false;
		}

		if ($GLOBALS['ISC_CLASS_DB']->Query("DELETE FROM [|PREFIX|]customer_groups WHERE customergroupid='" . (int)$customergroupid . "'") !== false) {

			/**
			 * Create the spool file
			 */
			$input = array(
				'customergroupid'	=> $customergroupid,
				'name'				=> $row['groupname'],
				'discount'			=> $row['discount'],
				'isactive'			=> 0,
			);

			$this->createServiceRequest('pricelevelmod', 'customer_edit', $input);
			return true;
		}

		return false;
	}

	/**
	 * Delete multiple customer groups
	 *
	 * Method will delete multiple customer groups
	 *
	 * @access public
	 * @param array $customergroupids The array containing the IDs of the customer groups to delete
	 * @return bool TRUE if the customer groups were all deleted, FASLE otherwise
	 */
	public function multiDelete($customergroupids)
	{
		if (!is_array($customergroupids)) {
			return false;
		}

		$customergroupids = array_filter($customergroupids, 'isId');

		foreach ($customergroupids as $customergroupid) {
			self::delete($customergroupid);
		}

		return true;
	}

	/**
	 * Set the default group on all the customers
	 *
	 * Method will reset the default group on all the customers in the accounting world
	 *
	 * @access private
	 */
	private function setDefaultCustomerGroup($customergroupid)
	{
		if (!isId($customergroupid)) {
			return false;
		}

		/**
		 * Ok, now we have to set this customergroup on all the customers that have the default customer group
		 */
		$result = $GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]customers WHERE custgroupid='0'");
		while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {

			$input = array(
				'customerid'		=> $row['customerid'],
				'company'			=> $row['custconcompany'],
				'firstname'			=> $row['custconfirstname'],
				'lastname'			=> $row['custconlastname'],
				'email'				=> $row['custconemail'],
				'phone'				=> $row['custconphone'],
				'customergroupid'	=> $customergroupid
			);

			$this->createServiceRequest('customermod', 'customer_edit', $input);
		}

		return true;
	}
}

?>