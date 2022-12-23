<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'entity.base.php');

class ISC_ENTITY_PRODUCT extends ISC_ENTITY_BASE
{
	/**
	 * Parse the product data
	 *
	 * Method will parse the product data to be inserted into the database
	 *
	 * @access private
	 * @param array &$input The input data
	 * @return NULL
	 */
	private function parsedata(&$input)
	{
		// Workout the calculated price for this product as it will be displayed
		$input['prodcalculatedprice'] = CalcRealPrice($input['prodprice'], $input['prodretailprice'], $input['prodsaleprice']);

		// If inventory tracking is on a product option basis, then product options are required
		if ($input['prodinvtrack'] == 2) {
			$input['prodoptionsrequired'] = 1;
		}

		// If we are importing and don't have any variations
		if (!array_key_exists('prodvariationid', $input)) {
			$input['prodvariationid'] = 0;
		}

		if (!array_key_exists('prodallowpurchases', $input)) {
			$input['prodallowpurchases'] = 1;
			$input['prodhideprice'] = 0;
			$input['prodcallforpricinglabel'] = '';
		}

		if (!array_key_exists('prodhideprice', $input)) {
			$input['prodhideprice'] = 0;
		}

		if (!array_key_exists('prodcallforpricinglabel', $input)) {
			$input['prodcallforpricinglabel'] = '';
		}

		if (array_key_exists('prodcats', $input)) {
			$input['prodcatids'] = implode(',', $input['prodcats']);
		} else {
			$input['prodcatids'] = '';
		}

		$id = null;
		if (array_key_exists('productid', $input)) {
			$id = $input['productid'];
		}

		$input = array(
			'prodname' => $input['prodname'],
			'prodtype' => $input['prodtype'],
			'prodcode' => $input['prodcode'],
			'proddesc' => $input['proddesc'],
			'prodsearchkeywords' => $input['prodsearchkeywords'],
			'prodavailability' => $input['prodavailability'],
			'prodprice' => $input['prodprice'],
			'prodcostprice' => $input['prodcostprice'],
			'prodretailprice' => $input['prodretailprice'],
			'prodsaleprice' => $input['prodsaleprice'],
			'prodcalculatedprice' => $input['prodcalculatedprice'],
			'prodistaxable' => $input['prodistaxable'],
			'prodsortorder' => $input['prodsortorder'],
			'prodvisible' => $input['prodvisible'],
			'prodfeatured' => $input['prodfeatured'],
			'prodrelatedproducts' => $input['prodrelatedproducts'],
			'prodinvtrack' => $input['prodinvtrack'],
			'prodcurrentinv' => $input['prodcurrentinv'],
			'prodlowinv' => $input['prodlowinv'],
			'prodoptionsrequired' => $input['prodoptionsrequired'],
			'prodwarranty' => $input['prodwarranty'],
			'prodweight' => $input['prodweight'],
			'prodwidth' => $input['prodwidth'],
			'prodheight' => $input['prodheight'],
			'proddepth' => $input['proddepth'],
			'prodfixedshippingcost' => $input['prodfixedshippingcost'],
			'prodfreeshipping' => $input['prodfreeshipping'],
			'prodbrandid' => $input['prodbrandid'],
			'prodpagetitle' => $input['prodpagetitle'],
			'prodmetakeywords' => $input['prodmetakeywords'],
			'prodmetadesc' => $input['prodmetadesc'],
			'prodlayoutfile' => $input['prodlayoutfile'],
			'prodvariationid' => $input['prodvariationid'],
			'prodallowpurchases' => $input['prodallowpurchases'],
			'prodhideprice' => $input['prodhideprice'],
			'prodcallforpricinglabel' => $input['prodcallforpricinglabel'],
			'prodcatids' => $input['prodcatids'],
		);

		if (!is_null($id)) {
			$input['productid'] = $id;
		}
	}

	/**
	 * Add a product
	 *
	 * Method will add a product to the database
	 *
	 * @access public
	 * @param array $input The product details
	 * @return int The product record ID on success, FALSE otherwise
	 */
	public function add($input)
	{
		$this->parsedata($input);

		$input['proddateadded'] = time();

		if (!isId($id = $GLOBALS['ISC_CLASS_DB']->InsertQuery("products", $input))) {
			return false;
		}

		$input['productid'] = $id;
		$this->createServiceRequest('iteminventoryadd', 'product_create', $input);

		return $id;
	}

	/**
	 * Edit a product
	 *
	 * Method will edit a product's details
	 *
	 * @access public
	 * @param array $input The product's details
	 * @return bool TRUE if the product exists and the details were updated successfully, FALSE oterwise
	 */
	public function edit($input)
	{
		if (!array_key_exists('productid', $input) || !isId($input['productid'])) {
			return false;
		}

		$this->parsedata($input);

		if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery("products", $input, "productid='" . (int)$input['productid'] . "'") === false) {
			return false;
		}

		$this->createServiceRequest('iteminventorymod', 'product_edit', $input);

		return true;
	}

	/**
	 * Edit a product with the batch imported
	 *
	 * Method is used by the batch importer the edit the products details
	 *
	 * @access public
	 * @param array $input The product's details
	 * @return bool TRUE if the product exists and the details were updated successfully, FALSE oterwise
	 */
	public function bulkEdit($input)
	{
		if (!array_key_exists('productid', $input) || !isId($input['productid'])) {
			return false;
		}

		if ($GLOBALS['ISC_CLASS_DB']->UpdateQuery("products", $input, "productid='" . (int)$input['productid'] . "'") === false) {
			return false;
		}

		$this->createServiceRequest('iteminventorymod', 'product_edit', $input);

		return true;
	}

	/**
	 * Delete a product
	 *
	 * Method will delete a product
	 *
	 * @access public
	 * @param int $productid The product ID
	 * @return bool TRUE if the product was deleted successfully, FASLE otherwise
	 */
	public function delete($productid)
	{
		if (!isId($productid) || !($input = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]products WHERE productid='" . (int)$productid . "'")))) {
			return false;
		}

		if ($GLOBALS['ISC_CLASS_DB']->Query("DELETE FROM [|PREFIX|]products WHERE productid='" . (int)$productid . "'") !== false) {

			/**
			 * Create the spool file
			 */
			$input['isactive'] = 0;

			$this->createServiceRequest('iteminventorymod', 'product_edit', $input);
			return true;
		}

		return false;
	}

	/**
	 * Delete multiple products
	 *
	 * Method will delete multiple products
	 *
	 * @access public
	 * @param array $productids The array containing the IDs of the products to delete
	 * @return bool TRUE if the products were all deleted, FASLE otherwise
	 */
	public function multiDelete($productids)
	{
		if (!is_array($productids)) {
			return false;
		}

		$productids = array_filter($productids, 'isId');

		foreach ($productids as $productid) {
			$this->delete($productid);
		}

		return true;
	}

	/**
	 * Import a product
	 *
	 * Method will return the product record that can be directly inserted into the accounting module. It is up the the calling function to actually
	 * import the record. This method just basically gives you the proper data to do it
	 *
	 * @access public
	 * @param int $productid The product ID
	 * @param array &$import The referenced array containing all the import data of the product
	 * @return bool TRUE if the data was retrived successfully, FALSE otherwise
	 */
	public function import($productid, &$import)
	{
		if (!isId($productid) || !($row = $GLOBALS['ISC_CLASS_DB']->Fetch($GLOBALS['ISC_CLASS_DB']->Query("SELECT * FROM [|PREFIX|]products WHERE productid='" . (int)$productid . "'")))) {
			return false;
		}

		$import = $row;

		$import['prodprice'] = DefaultPriceFormat(CPrice($import['prodprice']));

		if ($import['prodcostprice'] > 0) {
			$import['prodcostprice'] = DefaultPriceFormat(CPrice($import['prodcostprice']));
		}

		return true;
	}
}

?>