<?php
/**
 * Sample addon for Interspire Shopping Cart
 *
 * Export the latest orders as an XML feed.
 *
 * @author Chris Boulton
 */
class ADDON_ORDERXML extends ISC_ADDON
{
	/**
	 * Set up the addon specific variables for this addon.
	 */
	public function __construct()
	{
		// Call the parent constructor (this is required!)
		parent::__construct();
		
		// Set the display name for this addon
		$this->SetName(GetLang('OrderXMLAddonName'));
		
		// Set the image for this addon
		$this->SetImage('');
		
		// Set the help text for this addon
		$this->SetHelpText(GetLang('OrderXMLAddonHelp'));
		
		// Register a menu item for this addon under the orders menu
		$this->RegisterMenuItem(array(
			'location'		=> 'mnuOrders',
			'icon'			=> 'icon.gif',
			'text'			=> GetLang('OrderXMLAddonName'),
			'description'	=> GetLang('OrderXMLAddonDescription')
		));
		
		
		// Register a menu item under the tools menu
		$this->RegisterMenuItem(array(
			'location'	=> 'mnuTools',
			'text'		=> 'Test Menu Callback',
			'link'		=> 'index.php?ToDo=runAddon&addon='.$this->GetId().'&func=ToolsMenuExample'
		));
	}
	
	/**
	 * Setup the settings for this addon.
	 */
	public function SetCustomVars()
	{
		// Register the 'Order Status' setting - a drop down menu with two options
		$this->_variables['orderstatus'] = array(
			'type' => 'dropdown',
			'name' => GetLang('OrderStatus'),
			'default' => 'all',
			'options' => array(
				GetLang('ExportAllorders') => 'all',
				GetLang('ExportShippedOrders') => 'shipped'
			),
			'required' => true
		);
	}
	
	/**
	 * Initialise any addon specific code that should be run when displaying the settings for this addon.
	 */
	public function Init()
	{
		//$this->ShowSaveAndCancelButtons(false);
	}
	
	/**
	 * The main entry point for this addon. In this case, show a template asking for user input.
	 */
	public function EntryPoint()
	{
		$this->ParseTemplate('export.form');
	}
	
	/**
	 * An additional action that's called by this module when the above form is submitted.
	 */
	public function ExportOrders()
	{
		// Load up the orders class
		$GLOBALS['ISC_CLASS_ADMIN_ORDERS'] = GetClass('ISC_ADMIN_ORDERS');
		
		// Get the value of the order status setting
		if($this->GetValue('orderstatus') == 'shipped') {
			$_GET['orderStatus'] = 2;
		}
		
		$numOrders = 0;
		$ordersResult = $GLOBALS['ISC_CLASS_ADMIN_ORDERS']->_GetOrderList(0, 'orderid', 'desc', $numOrders, true);
		
		if($numOrders == 0) {
			$GLOBALS['ISC_CLASS_ADMIN_ORDERS']->ManageOrders(GetLang('NoOrders'));
			return;
		}
		
		require_once(ISC_BASE_PATH.'/lib/class.xml.php');
		$xml = new xml();
		
		$tags = array();
		
		while($order = $GLOBALS['ISC_CLASS_DB']->Fetch($ordersResult)) {
			$orderTags = array();
			$orderTags[] = $xml->MakeXMLTag('amount', number_format($order['ordtotalamount'], 2));
			$orderTags[] = $xml->MakeXMLTag('customer', $order['ordbillfullname'], true);
			$orderTags[] = $xml->MakeXMLTag('date', CDate($order['orddate']), true);
			$attributes = array(
				'orderid' => $order['orderid']
			);
			$tags[] = $xml->MakeXMLTag('order', implode('', $orderTags), false, $attributes);
		}
		
		@ob_end_clean();
		$xml->SendXMLHeader();
		$xml->SendXMLResponse($tags);
		exit;
	}
	
	/**
	 * And another example page that's exclusively called from the tools menu directly.
	 */
	public function ToolsMenuExample()
	{
		echo "This page will be called from a menu item in the tools menu.";
	}
}