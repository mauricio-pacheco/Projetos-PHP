<?php

	/**
	* This addon will check the permissions of the install to make sure that the files
	* and directories that are supposed to be writable actually are.
	*
	* @author: Rodney Amato
	* @copyright: Interspire Pty. Ltd.
	* @date: 23 May 2008
	*/

	require_once(dirname(__FILE__) . '/../../includes/classes/class.addon.php');

	define("TARGET_DOESNT_EXIST", 50001);
	define("TARGET_NOT_WRITABLE", 50002);

	class ADDON_PERMISSIONCHECK extends ISC_ADDON
	{

		var $FoldersToCheck = null;

		/**
		* Constructor
		* Setup the addon-specific variables through the addon parent class
		*/
		function __construct()
		{
			// Call all standard addon functions
			$this->SetId(strtolower(__CLASS__));
			$this->LoadLanguageFile();
			$this->SetName(GetLang('PermCheckName'));

			$this->RegisterMenuItem(
				array(
				'location'		=> 'mnuTools',
				'text'			=> GetLang('PermCheckMenuText'),
				'break'			=> true,
				'icon'			=> '',
				'description'	=> '',
				)
			);

			$this->SetImage('');
		}

		/**
		* Init
		* Initialize any other addon-specific code that needs to run
		*/
		function init()
		{
			$this->SetHelpText(GetLang('PermCheckHelpText'));
			$this->ShowSaveAndCancelButtons(false);

			if ($this->FoldersToCheck === null) {
				$this->GetFoldersToCheck();
			}
		}

		function GetFoldersToCheck()
		{
			$install = GetClass('ISC_ADMIN_INSTALL');
			$this->FoldersToCheck = $install->FoldersToCheck;
		}

		function CheckPermissions()
		{
			if ($this->FoldersToCheck === null) {
				$this->GetFoldersToCheck();
			}

			// Make the folders appear in alphabetical order to make it easier to go through and fix up permissions
			natsort($this->FoldersToCheck);

			// Then order them by their depth
			usort($this->FoldersToCheck, array($this, 'dir_depth_compare'));

			include_once(ISC_BASE_PATH.'/lib/class.file.php');

			$f = new FileClass();
			$result = array();

			foreach($this->FoldersToCheck as $folder) {
				$path = ISC_BASE_PATH . '/' . $folder;

				if(file_exists($path)) {
					if (is_file($path)) {
						$file = true;
						$mode = '0666';
					} elseif (is_dir($path)) {
						$file = false;
						$mode = '0777';
					}

					if(is_dir($path) && $f->CheckDirWritable($path)) {
					}
					else if (is_file($path) && $f->CheckFileWritable($path)) {
					}
					else {
						$result[] = array($folder, TARGET_NOT_WRITABLE, $file);
					}
				}
				else {
					$result[] = array($folder, TARGET_DOESNT_EXIST);
				}
			}
			return $result;
		}

		function EntryPoint()
		{
			$folders = $this->CheckPermissions();

			foreach($folders as $folder) {
				switch($folder[1]) {
					case TARGET_NOT_WRITABLE:
					{
						if ($folder[2]) {
							$type = GetConfig('PermCheckTypeFile');
						} else {
							$type = GetConfig('PermCheckTypeFolder');
						}
						$message = sprintf(GetLang('PermCheckNotWritable'), $type, $folder[0]);

						if (isset($folder[2]) && $folder[2] === true) {
							$message .= GetLang('PermCheckFilePerms');
						} else {
							$message .= GetLang('PermCheckDirPerms');
						}
						$code = "filePermissions";
						break;
					}
					case TARGET_DOESNT_EXIST:
					{
						$message = sprintf(GetLang('PermCheckNotThere'), $folder[0]);
						$code = "doesntExist";
						break;
					}
					default:
					{
						$code = '';
						$message = '';
					}
				}
				if($code != '' && $message != '') {
					$folder_messages[] = array(
						"code" => $code,
						"extra" => $folder[0],
						"message" => $message
					);
				}
			}

			echo "<div style='padding:10px 10px 10px 20px'>";
				echo "<div class='Heading1' style='padding-bottom:10px'>" . GetLang("PermCheckName") . "</div>";

				if (empty($folder_messages)) {
					echo MessageBox(GetLang('PermCheckSuccess'), MSG_SUCCESS)."<br/>\n";
					echo "</div>";
					return;
				}

				echo MessageBox(sprintf(GetLang('PermCheckFailure'), GetConfig('ProductName')), MSG_ERROR)."<br/>\n";

				echo "<ul>\n";
				foreach ($folder_messages as $message) {
					echo "<li>".$message['message']."</li>\n";
				}
				echo "</ul>\n";

			echo "</div>";

		}

		function dir_depth_compare($a, $b)
		{
			if (substr_count($a, '/') > substr_count($b, '/')) {
				return 1;
			} elseif (substr_count($a, '/') < substr_count($b, '/')) {
				return -1;
			} else {
				return 0;
			}
		}
	}
?>