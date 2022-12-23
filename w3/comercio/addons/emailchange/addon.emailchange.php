<?php

	/**
	* This addon will update all instances of one email address with
	* another in the database. Useful if a customer mis-spells their email address.
	*
	* @author: Rodney Amato
	* @copyright: Interspire Pty. Ltd.
	* @date: 20 June 2008
	*/
	require_once(dirname(__FILE__) . '/../../includes/classes/class.addon.php');

	class ADDON_EMAILCHANGE extends ISC_ADDON
	{

		/**
		* Constructor
		* Setup the addon-specific variables through the addon parent class
		*/
		function __construct()
		{
			// Call all standard addon functions
			$this->SetId(strtolower(__CLASS__));
			$this->LoadLanguageFile();
			$this->SetName(GetLang('EmailChangeName'));

			if ($this->HasPermission()) {
				$this->RegisterMenuItem(
					array(
					'location'		=> 'mnuCustomers',
					'text'			=> GetLang('EmailChangeMenuText'),
					'icon'			=> 'email_edit.gif',
					'description'	=> GetLang('EmailChangeMenuDesc'),
					)
				);
			}

			$this->SetImage('');
		}

		/**
		 * Check that the user has permission to run this addon
		 *
		 * @return boolean
		 **/
		function HasPermission()
		{
			static $perms = null;
			if ($perms === null) {
				$perms = $GLOBALS["ISC_CLASS_ADMIN_AUTH"]->GetPermissions();
			}

			if (in_array(AUTH_Edit_Customers, $perms)
				&& in_array(AUTH_Edit_Orders, $perms)
				&& in_array(AUTH_Newsletter_Subscribers, $perms)) {
					return true;
			} else {
				return false;
			}
		}

		/**
		 * Display an error if the user doesn't have permission to do something they try to do
		 *
		 * @return void
		 **/
		function NoPermission()
		{
			$GLOBALS['ISC_CLASS_ADMIN_ENGINE']->DoHomePage(GetLang('Unauthorized'), MSG_ERROR);
		}

		/**
		* Init
		* Initialize any other addon-specific code that needs to run
		*/
		function init()
		{
			$this->SetHelpText(GetLang('EmailChangeHelpText'));
			$this->ShowSaveAndCancelButtons(false);
		}

		/**
		 * The default entry point for the addon. Just show our form
		 *
		 * @return void
		 **/
		function EntryPoint()
		{
			$this->init();

			if (!$this->HasPermission()) {
				$this->NoPermission();
				return;
			}

			$this->ShowForm();
		}

		/**
		 * Show the form to get the from and to email address
		 *
		 * @return void
		 */
		function ShowForm()
		{
			if (!$this->HasPermission()) {
				$this->NoPermission();
				return;
			}

			$GLOBALS['AddonId'] = $this->GetId();
			$GLOBALS['Message'] = GetFlashMessageBoxes();
			$this->ParseTemplate('emailchange.form');
		}

		/**
		 * Do the actual update of the email address and show a flash message with the result
		 *
		 * @return void
		 */
		function UpdateEmail()
		{
			if (!$this->HasPermission()) {
				$this->NoPermission();
				return;
			}

			$from = trim($_POST['fromemail']);
			$to = trim($_POST['toemail']);

			$update = array (
				'orders' => array (
					'ordbillemail',
					'ordshipemail',
				),
				'customers' => array (
					'custconemail',
				),
				'subscribers' => array (
					'subemail',
				),
			);
			$recordsUpdated = 0;

			foreach ($update as $table => $fields) {
				foreach ($fields as $field) {
					$updateData = array (
						$field => $to
					);
					$restriction = $field ."='".$GLOBALS['ISC_CLASS_DB']->Quote($from)."'";
					$GLOBALS['ISC_CLASS_DB']->UpdateQuery($table, $updateData, $restriction);
					$recordsUpdated += $GLOBALS['ISC_CLASS_DB']->NumAffected();
				}
			}

			if ($recordsUpdated > 1) {
				$message = sprintf(GetLang('EmailCheckNumUpdatedPlural'), $recordsUpdated);
				$status = MSG_SUCCESS;
			} elseif ($recordsUpdated == 1) {
				$message = sprintf(GetLang('EmailCheckNumUpdatedSingular'), $recordsUpdated);
				$status = MSG_SUCCESS;
			} else {
				$message = GetLang('EmailCheckNoneUpdated');
				$status = MSG_ERROR;
			}

			FlashMessage($message, $status, 'index.php?ToDo=runAddon&addon=addon_emailchange');
		}
	}
?>