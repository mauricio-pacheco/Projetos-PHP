<?php

	/**
	* This is the flat rate per item shipping module for Interspire Shopping Cart. To enable
	* flat rate per item shipping in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Shipping Settings tab in the menu.
	*/
	class SHIPPING_BYTOTAL extends ISC_SHIPPING
	{

		/**
		* Variables for the flat rate shipping module
		*/

		/*
			The flat rate per item shipping cost for all orders
		*/
		var $_shippingcost = 0;

		var	$_id = "shipping_bytotal";

		var $rules = array(
			'cost' => array(),
			'upper' => array(),
			'lower' => array(),
		);
		/**
		* Functions for the flat rate shipping module
		*/

		/*
			Shipping class constructor
		*/
		function SHIPPING_BYTOTAL()
		{

			// Setup the required variables for the flat rate per item shipping module
			parent::__construct();
			$this->_name = GetLang('ByTotalName');
			$this->_image = "";
			$this->_description = GetLang('ByTotalDesc');
			$this->_help = GetLang('ByTotalHelp');
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 0;
			$this->_showtestlink = false;
			$this->_flatrate = true;

			// Flat rate is available worldwide
			$this->_countries = array("all");
		}

		/**
		* Custom variables for the shipping module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{

			$this->_variables = array (
				'defaultcost' => array (
					"name" => GetLang('DefaultShippingCost'),
					"type" => "textbox",
					"help" => GetLang('DefaultShippingCostHelp'),
					"default" => "",
					"required" => true,
					"size" => 7,
				),
				'placeholder' => array (
					'name' => 'Total Ranges',
					'type' => 'custom',
					'callback' => 'BuildForm',
					'default' => '',
					'required' => false,
					'help' => '',
					'javascript' => '',
				),
			);

		}

		function GetQuote()
		{
			// The following array will be returned to the calling function.
			// It will contain at one ISC_SHIPPING_QUOTE object

			$pi_quote = array();

			// Workout the cost by multiplying peritemcost * numproducts
			$num_items = 0;

			// Create a quote object
			$this->_shippingcost = $this->GetCost();
			$pi_quote = new ISC_SHIPPING_QUOTE($this->GetId(), $this->GetName(), $this->_shippingcost, $this->_description);
			return $pi_quote;
		}

		function getpropertiessheet($tab_id)
		{
			// Load up the module variables
			$this->SetCustomVars();

			$output = $this->ParseTemplate('total_range_header', true);
			$this->_variables['placeholder']['javascript'] = $this->GetJavascript();

			$output .= parent::getpropertiessheet($tab_id);
			return $output;
		}

		function BuildForm()
		{

			if (GetConfig('CurrencyLocation') === 'left') {
				$GLOBALS['CurrencyTokenLeft'] = GetConfig('CurrencyToken');
				$GLOBALS['CurrencyTokenRight'] = '';
			} else {
				$GLOBALS['CurrencyTokenLeft'] = '';
				$GLOBALS['CurrencyTokenRight'] = GetConfig('CurrencyToken');
			}

			if (empty($this->rules['cost'])) {
				$this->LoadTotalRanges();
			}

			if (empty($this->rules['cost'])) {
				$GLOBALS['POS'] = 0;
				$GLOBALS['COST_VAL'] = '';
				$GLOBALS['LOWER_VAL'] = '';
				$GLOBALS['UPPER_VAL'] = '';
				return $this->ParseTemplate('total_range_row', true);
			}

			$output = '';
			for ($i = 0; $i < count($this->rules['cost']); $i++) {
				$GLOBALS['POS'] = $i;
				if(!isset($this->rules['cost'][$i])) {
					continue;
				}
				$GLOBALS['COST_VAL'] = $this->rules['cost'][$i];
				$GLOBALS['LOWER_VAL'] = $this->rules['lower'][$i];
				$GLOBALS['UPPER_VAL'] = $this->rules['upper'][$i];
				$output .= $this->ParseTemplate('total_range_row', true);
			}
			return $output;
		}

		function GetJavascript()
		{
			return $this->ParseTemplate('total_range_javascript', true);
		}

		function LoadTotalRanges()
		{
			$query = "SELECT variablename, variableval
			FROM [|PREFIX|]shipping_vars
			WHERE methodid='".$this->methodId."' AND modulename='shipping_bytotal'
			AND (
				variablename LIKE 'cost_%'
				OR variablename LIKE 'lower_%'
				OR variablename LIKE 'upper_%'
			)";

			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

			$this->rules = array (
				'cost' => array(),
				'lower' => array(),
				'upper' => array(),
			);

			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				list($name, $pos) = explode('_', $row['variablename'], 2);
				$this->rules[$name][$pos] = $row['variableval'];
			}

			return $this->rules;
		}

		function GetCost()
		{
			if (empty($this->rules['cost'])) {
				$this->LoadTotalRanges();
			}

			$keys = array_keys($this->rules['cost']);
			$last_rule = max($keys);

			if (($this->rules['lower'][0] === '' && $this->rules['upper'][0] !== '') && $this->_subtotal < $this->rules['upper'][0]) {
				return $this->rules['cost'][0];
			} elseif (($this->rules['upper'][$last_rule] === '' && $this->rules['lower'][0] !== '') && $this->_subtotal >= $this->rules['lower'][$last_rule]) {
				return $this->rules['cost'][$last_rule];
			}

			for ($i = 0; $i < $last_rule+1; $i++) {
				if (isset($this->rules['lower'][$i]) && $this->_subtotal >= $this->rules['lower'][$i] && isset($this->rules['upper'][$i]) && $this->_subtotal < $this->rules['upper'][$i]) {
					return $this->rules['cost'][$i];
				}
			}

			return $this->GetValue('defaultcost');

		}

	}

?>
