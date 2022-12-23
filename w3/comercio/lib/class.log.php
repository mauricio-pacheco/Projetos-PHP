<?php
// If we're calling this directly, exit
if(!defined('ISC_BASE_PATH')) {
	exit;
}

define("LOG_SEVERITY_SUCCESS", 1);
define("LOG_SEVERITY_WARNING", 3);
define("LOG_SEVERITY_ERROR", 4);
define("LOG_SEVERITY_NOTICE", 2);
define("LOG_SEVERITY_DEBUG", 5);

/**
 * Logging class for Interspire Shopping Cart.
 *
 * This class serves as the central location for storing
 * items in the store logs. This includes things like
 * database errors, PHP errors, general notifications and
 * messages.
 */
class ISC_LOG
{
	/**
	 * @var array An array of types of severities supported by the logging system.
	 */
	private $validSeverities = array (
		'success'	=> LOG_SEVERITY_SUCCESS,
		'warnings'	=> LOG_SEVERITY_WARNING,
		'errors'	=> LOG_SEVERITY_ERROR,
		'notices'	=> LOG_SEVERITY_NOTICE,
		'debug'		=> LOG_SEVERITY_DEBUG
	);

	/**
	 * @var array An array of types of messages that can be logged by the logging system.
	 */
	private $validTypes = array(
		'general',
		'php',
		'sql',
		'shipping',
		'payment',
		'notification',
		'ssnx',
		'accounting'
	);

	/**
	 * @var array An array of filenames that are the database classes. This is used so we can determine
	 *            how far back up a backtrace we need to go to get the actual error.
	 */
	private $dbClasses = array(
		"database/db.php",
		"database/mysql.php",
		"database/pgsql.php"
	);

	/**
	 * The constructor.
	 */
	public function __construct()
	{
		// Enable database error logging if we have it enabled
		if (GetConfig('SystemLogTypes')) {
			$types = explode(",", GetConfig('SystemLogTypes'));
			if (in_array("sql", $types)) {
				$GLOBALS['ISC_CLASS_DB']->ErrorCallback = array(&$this, "LogSQLError");
			}
		}
	}

	/**
	 * Handle a PHP error, called automatically by PHP with the details of the error message.
	 *
	 * @param int The error number triggered by PHP.
	 * @param string The error message.
	 * @param string The file that the error occurred in.
	 * @param string The line that the error occurred on.
	 * @return boolean True if the internal PHP error handler should run, false if not.
	 */
	public function HandlePHPErrors($errno, $errstr, $errfile, $errline)
	{
		// Error reporting turned off (either globally or by @ before erroring statement)
		if(error_reporting() == 0) {
			return;
		}

		$msg = "$errstr in $errfile at $errline<br/>\n";
		$msg .= trace(false,true);

		// This switch uses case fallthrough's intentionally
		switch ($errno) {
			case E_USER_ERROR:
			case E_ERROR:
			case E_PARSE:
			case E_CORE_ERROR:
			case E_COMPILE_ERROR:
				$this->LogSystemError('php', isc_substr($errstr, 0, 250), $msg);
				exit(1);
				break;

			case E_USER_WARNING:
			case E_WARNING:
			case E_CORE_WARNING:
			case E_COMPILE_WARNING:
				$this->LogSystemWarning('php', isc_substr($errstr, 0, 250), $msg);
				break;

			case E_USER_NOTICE:
			case E_NOTICE:
				$this->LogSystemNotice('php', isc_substr($errstr, 0, 250), $msg);
				break;

			case E_STRICT:
				//$this->LogSystemNotice('php', isc_substr($errstr, 0, 250), $msg);
				break;

			default:
				$this->LogSystemNotice('php', isc_substr($errstr, 0, 250), $msg);
				break;
		}

		// If we're stopping the default PHP error handler then we return true
		if(GetConfig('HidePHPErrors') == 1) {
			return true;
		}
		// Otherwise allow the PHP error handler to run after ours
		else {
			return false;
		}
	}

	/**
	 * Log a database error message to the system log.
	 *
	 * @param string The message to log.
	 * @param string The query, if any, that was executed that caused this error message.
	 */
	public function LogSQLError($message, $query="")
	{
		$details = '';
		if (isc_strlen($message) > 70) {
			$details = "<h5>".$message."</h5>";
			$message = isc_substr($message, 0, 70)."...";
		} else if($query) {
			$details = "<h5>".GetLang('Query').":</h5>";
		}

		if($query) {
			$details .= "<p>" . isc_html_escape($query) . "</p>";
		}
		if (function_exists("debug_backtrace")) {
			$backtrace = debug_backtrace();
			array_shift($backtrace);
			$dbClasses = implode("|", array_map("preg_quote", $this->dbClasses));
			$dbClasses = str_replace("/", "\\".DIRECTORY_SEPARATOR, $dbClasses);
			while (preg_match("#".$dbClasses."#i", $backtrace[0]['file'])) {
				if (count($backtrace) == 1) {
					break;
				}
				array_shift($backtrace);
			}
			if (isset($backtrace[0]['file'])) {
				$details .= '<h5>'.GetLang('Location').':</h5>' . $backtrace[0]['file'] . ' (Line ' . $backtrace[0]['line'] . ')';
			}
		}
		$this->WriteSystemLog(LOG_SEVERITY_ERROR, "sql", $message, $details);
	}

	/**
	 * Log a debug message to the system log.
	 *
	 * @param mixed The type of message to log. If a string, a type of message or if an array, the type of message and the module.
	 * @param string The summary (short version) of the message.
	 * @param string The long extended version of the message if there is one.
	 */
	public function LogSystemDebug($type, $summary, $message="")
	{
		if (!$message) {
			$message = $summary;
		}
		$this->WriteSystemLog(LOG_SEVERITY_DEBUG, $type, $summary, $message);
	}

	/**
	 * Log a success message to the system log.
	 *
	 * @param mixed The type of message to log. If a string, a type of message or if an array, the type of message and the module.
	 * @param string The summary (short version) of the message.
	 * @param string The long extended version of the message if there is one.
	 */
	public function LogSystemSuccess($type, $summary, $message="")
	{
		if (!$message) {
			$message = $summary;
		}
		$this->WriteSystemLog(LOG_SEVERITY_SUCCESS, $type, $summary, $message);
	}

	/**
	 * Log an error message to the system log.
	 *
	 * @param mixed The type of message to log. If a string, a type of message or if an array, the type of message and the module.
	 * @param string The summary (short version) of the message.
	 * @param string The long extended version of the message if there is one.
	 */
	public function LogSystemError($type, $summary, $message="")
	{
		if (!$message) {
			$message = $summary;
		}
		$this->WriteSystemLog(LOG_SEVERITY_ERROR, $type, $summary, $message);
	}

	/**
	 * Log a warning message to the system log.
	 *
	 * @param mixed The type of message to log. If a string, a type of message or if an array, the type of message and the module.
	 * @param string The summary (short version) of the message.
	 * @param string The long extended version of the message if there is one.
	 */
	public function LogSystemWarning($type, $summary, $message="")
	{
		if (!$message) {
			$message = $summary;
		}
		$this->WriteSystemLog(LOG_SEVERITY_WARNING, $type, $summary, $message);
	}

	/**
	 * Log a notice to the system log.
	 *
	 * @param mixed The type of message to log. If a string, a type of message or if an array, the type of message and the module.
	 * @param string The summary (short version) of the message.
	 * @param string The long extended version of the message if there is one.
	 */
	public function LogSystemNotice($type, $summary, $message="")
	{
		if (!$message) {
			$message = $summary;
		}
		$this->WriteSystemLog(LOG_SEVERITY_NOTICE, $type, $summary, $message);
	}

	/**
	 * Actually write a message to the system log.
	 *
	 * @param int The severity of the message being logged.
	 * @param mixed The type of message to log. If a string, a type of message or if an array, the type of message and the module.
	 * @param string The summary (short version) of the message.
	 * @param string The long extended version of the message if there is one.
	 */
	private function WriteSystemLog($severity, $type, $summary, $message="")
	{
		if (!$message) {
			$message = $summary;
		}

		// Is system logging disabled?
		if (!GetConfig('SystemLogging')) {
			return;
		}

		if (!in_array($severity, $this->validSeverities)) {
			return;
		}

		// Is logging for this severity disabled?
		if (GetConfig('SystemLogSeverity')) {
			$severities = explode(",", GetConfig('SystemLogSeverity'));
			$value = array_search($severity, $this->validSeverities);
			if (!in_array($value, $severities)) {
				return;
			}
		}

		$module = '';
		if (is_array($type)) {
			$module = $type[1];
			$type = $type[0];
		}

		if (!in_array($type, $this->validTypes)) {
			return;
		}

		// Are we allowed to log messages of this type?
		if (GetConfig('SystemLogTypes')) {
			$types = explode(",", GetConfig('SystemLogTypes'));
			if (!in_array($type, $types)) {
				return;
			}
		}

		$logEntry = array(
			"logtype" => $type,
			"logmodule" => $module,
			"logseverity" => $severity,
			"logsummary" => $summary,
			"logmsg" => $message,
			"logdate" => time()
		);
		$GLOBALS['ISC_CLASS_DB']->InsertQuery("system_log", $logEntry);
		return true;
	}

	/**
	 * Prune old entries from the system log. This will automatically be triggered if necessary.
	 */
	public function PruneSystemLog()
	{
		// Is system logging disabled?
		if (!GetConfig('SystemLogging') || !GetConfig('SystemLogMaxLength')) {
			return;
		}

		$query = "SELECT COUNT(logid) FROM [|PREFIX|]system_log";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$numEntries = $GLOBALS['ISC_CLASS_DB']->FetchOne($result);
		if ($numEntries > GetConfig('SystemLogMaxLength')) {
			$toDelete = $numEntries - GetConfig('SystemLogMaxLength');
			if ($toDelete <= 0) {
				return;
			}
			// Delete x oldest entries from the log
			$query = sprintf("DELETE FROM [|PREFIX|]system_log ORDER BY logdate ASC LIMIT %d", $toDelete);
			$GLOBALS['ISC_CLASS_DB']->Query($query);
		}
	}

	/**
	 * Log an administrator action to the administrator logs. Any argument passed is automatically saved.
	 *
	 * @return boolean True if the action was logged. False if not.
	 */
	public function LogAdminAction()
	{
		if(!gzte11(ISC_HUGEPRINT)) {
			return;
		}

		// Is admin logging disabled?
		if (!GetConfig('AdministratorLogging')) {
			return;
		}
		$args = func_get_args();
		if (is_array($args)) {
			$args = serialize($args);
		}

		if (isset($_REQUEST['ToDo'])) {
			$todo = $_REQUEST['ToDo'];
		} else if (isset($_REQUEST['w'])) {
			$todo = $_REQUEST['w'];
		} else {
			$todo = '';
		}

		$logEntry = array(
			"loguserid" => $GLOBALS['ISC_CLASS_ADMIN_AUTH']->GetUserId(),
			"logip" => GetIP(),
			"logdate" => time(),
			"logtodo" => $todo,
			"logdata" => $args
		);
		$GLOBALS['ISC_CLASS_DB']->InsertQuery("administrator_log", $logEntry);
		return true;
	}

	/**
	 * Prune old entries from the administrator log. This will be triggered automatically if necessary.
	 */
	public function PruneAdminLog()
	{
		if(!gzte11(ISC_HUGEPRINT)) {
			return;
		}

		// Is admin logging disabled?
		if (!GetConfig('AdministratorLogging') || !GetConfig('AdministratorLogMaxLength')) {
			return;
		}

		$query = "SELECT COUNT(logid) FROM [|PREFIX|]administrator_log";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$numEntries = $GLOBALS['ISC_CLASS_DB']->FetchOne($result);
		if ($numEntries > GetConfig('AdministratorLogMaxLength')) {
			$toDelete = $numEntries - GetConfig('AdministratorLogMaxLength');
			if ($toDelete <= 0) {
				return;
			}
			// Delete x oldest entries from the log
			$query = sprintf("DELETE FROM [|PREFIX|]administrator_log ORDER BY logdate ASC LIMIT %d", $toDelete);
			$GLOBALS['ISC_CLASS_DB']->Query($query);
		}
	}
}
?>
