<?php

	/**
	* Send product update emails through Interspire Email Marketer if they have
	* been selected after placing an order
	*
	* @author		Mitchell Harper
	* @date			Feb 5th 2008
	* @copyright	Interspire Pty. Ltd.
	*
	*/
	include(dirname(__FILE__) . "/init.php");

	if(isset($_POST["Email"]) && isset($_POST["ProductIds"])) {
		$email = $_POST["Email"];
		$product_ids = $_POST["ProductIds"];
		$ids_in = "";

		foreach($product_ids as $product_id) {
			$ids_in .= (int)$product_id . ",";
		}

		$ids_in = preg_replace("/,$/", "", $ids_in);

		// Make sure there's at least one product id
		if(strlen($ids_in) > 0) {
			// Firstly how are we saving the subscriber? By product name, category or brand?
			switch(GetConfig('MailProductUpdatesListType')) {
				case "PRODUCT_NAME": {
					// Get the name of the products
					$query = sprintf("SELECT prodname as listname FROM [|PREFIX|]products WHERE productid IN (%s)", $GLOBALS["ISC_CLASS_DB"]->Quote($ids_in));
					break;
				}
				case "PRODUCT_CATEGORY": {
					// Get the category of the products
					$query = sprintf("SELECT DISTINCT(c.catname) as listname FROM [|PREFIX|]products p INNER JOIN [|PREFIX|]categoryassociations ca on p.productid = ca.productid INNER JOIN [|PREFIX|]categories c ON ca.categoryid = c.categoryid WHERE p.productid IN (%s)", $GLOBALS["ISC_CLASS_DB"]->Quote($ids_in));
					break;
				}
				case "PRODUCT_BRAND": {
					// Get the brand of the products
					$query = sprintf("SELECT DISTINCT(brandname) as listname FROM [|PREFIX|]brands INNER JOIN [|PREFIX|]products ON brandid = prodbrandid WHERE productid IN (%s)", $GLOBALS["ISC_CLASS_DB"]->Quote($ids_in));
					break;
				}
			}

			$result = $GLOBALS["ISC_CLASS_DB"]->Query($query);

			// Get the existing mailing lists from Interspire Email Marketer
			$GLOBALS['ISC_CLASS_ADMIN_SENDSTUDIO'] = GetClass('ISC_ADMIN_SENDSTUDIO');
			$lists = $GLOBALS['ISC_CLASS_ADMIN_SENDSTUDIO']->GetAvailableMailingLists();

			// Find any lists that match by name then add the subscriber
			while($row = $GLOBALS["ISC_CLASS_DB"]->Fetch($result)) {
				foreach($lists as $list) {
					if(strtolower($row["listname"]) == strtolower($list["name"])) {
						// Add the subscriber to this list
						$GLOBALS['ISC_CLASS_ADMIN_SENDSTUDIO']->AddSubscriberToList($email, $list["id"]);
						continue;
					}
				}
			}

			// We're done, show a generic success message
			$GLOBALS["MessageTitle"] = GetLang("ProductUpdates");
			$GLOBALS["MessageText"] = GetLang("ProductUpdatesDone");
			$GLOBALS["ISC_CLASS_TEMPLATE"]->SetTemplate("message");
			$GLOBALS["ISC_CLASS_TEMPLATE"]->ParseTemplate();
		}
		else {
			// No products selected
			header("Location: " . $GLOBALS["ShopPath"]);
		}
	}
	else {
		// Bad form details
		header("Location: " . $GLOBALS["ShopPath"]);
	}

?>