<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'entity.base.php');

class ISC_ENTITY_SHIPPING extends ISC_ENTITY_BASE
{
	/**
	 * Add a shipping address
	 *
	 * Method will add a shipping address to the database
	 *
	 * @access public
	 * @param array $input The shipping address details
	 * @return int The shipping address record ID on success, FALSE otherwise
	 */
	public function add($input)
	{
		if(!$input['destination']) {
			$input['destination'] = 'residential';
		}
		$savedata = array(
			"shipcustomerid"	=> $input['customerid'],
			"shipfullname"		=> $input['fullname'],
			"shipaddress1"		=> $input['address1'],
			"shipaddress2"		=> $input['address2'],
			"shipcity"			=> $input['city'],
			"shipstate"			=> $input['state'],
			"shipzip"			=> $input['zip'],
			"shipcountry"		=> $input['country'],
			"shipphone"			=> $input['phone'],
			"shipstateid"		=> (int)$input['stateid'],
			"shipcountryid"		=> (int)$input['countryid'],
			"shipdestination"	=> $input['destination'],
		);

		return $GLOBALS['ISC_CLASS_DB']->InsertQuery("shipping_addresses", $savedata, 1);
	}

	/**
	 * Edit a shipping address
	 *
	 * Method will edit a customer's shipping address details
	 *
	 * @access public
	 * @param array $input The shipping address details
	 * @return bool TRUE if the shipping address exists and the details were updated successfully, FALSE oterwise
	 */
	public function edit($input)
	{
		if (!array_key_exists('shipid', $input)) {
			return false;
		}
		
		if(!$input['destination']) {
			$input['destination'] = 'residential';
		}
		
		$savedata = array(
			"shipfullname"		=> $input['fullname'],
			"shipaddress1"		=> $input['address1'],
			"shipaddress2"		=> $input['address2'],
			"shipcity"			=> $input['city'],
			"shipstate"			=> $input['state'],
			"shipzip"			=> $input['zip'],
			"shipcountry"		=> $input['country'],
			"shipphone"			=> $input['phone'],
			"shipstateid"		=> (int)$input['stateid'],
			"shipcountryid"		=> (int)$input['countryid'],
			"shipdestination"	=> $input['destination'],
		);

		$query = "shipid='".$GLOBALS['ISC_CLASS_DB']->Quote($input['shipid'])."'";
		if (array_key_exists('customerid', $input)) {
			$query .= " and shipcustomerid='".$GLOBALS['ISC_CLASS_DB']->Quote($input['customerid'])."'";
		}

		$GLOBALS['ISC_CLASS_DB']->UpdateQuery("shipping_addresses", $savedata, $query, 1);
	}

	/**
	 * Delete a shipping address
	 *
	 * Method will delete a shipping address
	 *
	 * @access public
	 * @param int $addressid The shipping address ID
	 * @param int $customerid The optional customer ID
	 * @return bool TRUE if the shipping address was deleted successfully, FASLE otherwise
	 */
	public function delete($addressid, $customerid=null)
	{
		if (!isId($addressid)) {
			return false;
		}

		$query = "delete from [|PREFIX|]shipping_addresses where shipid='" . $GLOBALS['ISC_CLASS_DB']->Quote($addressid) . "'";
		if (isId($customerid)) {
			$query .= " and shipcustomerid='" . $GLOBALS['ISC_CLASS_DB']->Quote($customerid) . "'";
		}

		return (bool)$GLOBALS['ISC_CLASS_DB']->Query($query);
	}
}

?>
