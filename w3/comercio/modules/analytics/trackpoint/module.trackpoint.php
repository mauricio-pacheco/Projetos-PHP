<?php

	/**
	* This is the TrackPoint analytics module for Interspire Shopping Cart. To enable
	* this module in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Analytics Settings tab in the menu.
	*/
	class ANALYTICS_TRACKPOINT extends ISC_ANALYTICS
	{
		/*
			Analytics class constructor
		*/
		function ANALYTICS_TRACKPOINT()
		{
			// Setup the required variables for the TrackPoint analytics module
			parent::__construct();

			$this->_name = GetLang('TrackPointName');
			$this->_image = "trackpoint_logo.gif";
			$this->_description = GetLang('TrackPointDesc');
			$this->_help = GetLang('TrackPointHelp');
			$this->_enabled = $this->_CheckEnabled();
			$this->_height = 0;
		}

		/**
		* Custom variables for the analytics module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{

			$this->_variables['trackingcode'] = array("name" => "Tracking Code",
			   "type" => "textarea",
			   "help" => GetLang('TrackPointTrackingCodeHelp'),
			   "default" => "",
			   "required" => true,
			   "rows" => 7
			);

			$this->_variables['conversioncode'] = array("name" => "Conversion Code",
			   "type" => "textarea",
			   "help" => GetLang('TrackPointConversionCodeHelp'),
			   "default" => "",
			   "required" => true,
			   "rows" => 7
			);
		}

		/**
		*	Return the JavaScript to show on the "Finish Order" page. We will regex out amount=0
		*	and replace it with the right order total
		*/
		function getconversioncode($order_total)
		{
			$code = $this->GetValue("conversioncode");
			$code = str_replace("amount=0", "amount=" . $order_total, $code);
			return $code;
		}
	}

?>