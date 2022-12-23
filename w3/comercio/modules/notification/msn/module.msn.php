<?php

	// Require the libraries to connect to the MSN Messenger servers
	include_once(ISC_BASE_PATH."/includes/msn/sendMsg.php");

	class NOTIFICATION_MSN extends ISC_NOTIFICATION
	{

		var $_msnfromuser = "";
		var $_msnfrompass = "";
		var $_msntouser = "";

		var $_message = "";

		/*
			Notification class constructor
		*/
		function NOTIFICATION_MSN()
		{
			// Setup the required variables for the module
			parent::__construct();

			$this->_name = GetLang('MSNName');
			$this->_description = GetLang('MSNDesc');
			$this->_help = GetLang('MSNHelp');
			$this->_enabled = $this->_CheckEnabled();
		}

		function LECheck()
		{
			if(!gzte11(ISC_LARGEPRINT)) {
				return false;
			}
		}

		/**
		* Custom variables for the checkout module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		function SetCustomVars()
		{

			$this->_variables['msnfrom'] = array("name" => "MSN Username (From)",
			   "type" => "textbox",
			   "help" => GetLang('MSNUsernameFromHelp'),
			   "default" => "",
			   "required" => true
			);

			$this->_variables['msnpass'] = array("name" => "MSN Password (From)",
			   "type" => "password",
			   "help" => GetLang('MSNPasswordFromHelp'),
			   "default" => "",
			   "required" => true
			);

			$this->_variables['msnto'] = array("name" => "MSN Username (To)",
			   "type" => "textbox",
			   "help" => GetLang('MSNUsernameToHelp'),
			   "default" => "",
			   "required" => true
			);
		}

		/**
		* Build and format the message to be sent
		*/
		function BuildMsnMessage()
		{
			$store_name = GetConfig('StoreName');
			$message = sprintf(GetLang('MSNMessageContents'), $this->_orderid, $store_name, $this->_ordernumitems, FormatPrice($this->_ordertotal), $this->_orderpaymentmethod, $GLOBALS['ShopPath'], $this->_orderid);
			return str_replace("{NL}", chr(10), $message);
		}

		/**
		* Send the order notification MSN messenger message
		*/
		function SendNotification()
		{

			$this->_msnfromuser = $this->GetValue("msnfrom");
			$this->_msnfrompass = $this->GetValue("msnpass");
			$this->_msntouser = $this->GetValue("msnto");
			$this->_message = $this->BuildMsnMessage();

			$sendMsg = new sendMsg();
			$sendMsg->simpleSend($this->_msnfromuser, $this->_msnfrompass, $this->_msntouser, $this->_message);

			// Convert the response to a friendly message
			if($this->_makefriendly($sendMsg->result, $err)) {
				$result = array("outcome" => "success",
								"message" => sprintf(GetLang('MSNSentUser'), $this->_msntouser)
				);
			}
			else {
				$result = array("outcome" => "fail",
								"message" => $err
				);
			}

			return $result;
		}

		/**
		* Convert the MSN status code to a human-readable mesage
		*/
		function _makefriendly($msg, &$friendly)
		{
			switch($msg) {
				case "911": {
					$friendly = GetLang('MSNError911');
					break;
				}
				case "500":
				case "601":
				case "910":
				case "911":
				case "921":
				case "928":
				case "600": {
					$friendly = GetLang('MSNError600');
					return false;
					break;
				}
				case "217": {
					$friendly = GetLang('MSNError217');
					return false;
					break;
				}
				case "800": {
					$friendly = GetLang('MSNError800');
					return false;
					break;
				}
				case "1": {
					$friendly = GetLang('MSNError1');
					return true;
					break;
				}
				default: {
					$friendly = GetLang('MSNError999');
					return false;
					break;
				}
			}
		}

		/**
		* Test the notification method by displaying a simple HTML form
		*/
		function TestNotificationForm()
		{

			// Set the values that will be sent in the test message
			$this->SetOrderId(30243);
			$this->SetOrderTotal(99.95);
			$this->SetOrderNumItems(2);
			$this->SetOrderPaymentMethod("Credit Card");

			// Send the MSN message
			$result = $this->SendNotification();

			if($result['outcome'] == "success") {
				$GLOBALS['Icon'] = "success";
				$GLOBALS['MSNResultMessage'] = sprintf(GetLang('MSNTestSuccess'), $this->_msntouser);
			}
			else {
				$GLOBALS['Icon'] = "error";
				$GLOBALS['MSNResultMessage'] = sprintf(GetLang('MSNTestFail'), $this->_msntouser, $result['message']);
			}

			$this->ParseTemplate("module.msn.test");
		}
	}

?>