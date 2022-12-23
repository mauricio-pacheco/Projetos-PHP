<?php
/**
* This file only has the base Db class in it. This sets up class variables and basic constructs only.
* Each subclass (different database type) overrides most functions (except logging) and handles database specific instances.
*
* @version     $Id: db.php 125 2008-06-19 02:22:00Z chrisb $
* @author Chris <chris@interspire.com>
*
* @package Library
* @subpackage Db
*/

/**
* This is the base class for the database system.
* Almost all methods are overwritten in subclasses, except for logging and for the 'FetchOne' method.
*
* @package Library
* @subpackage Db
*/
class Db
{
	/**
	* The global database connection.
	*
	* @see Connect
	*
	* @var Resource
	*/
	var $connection = null;

	/**
	* Where any database errors are stored.
	*
	* @see GetError
	* @see SetError
	*
	* @access private
	*
	* @var String
	*/
	var $_Error = null;

	/**
	* What type of error this is.
	*
	* @see GetError
	* @see SetError
	*
	* @access private
	*
	* @var String
	*/
	var $_ErrorLevel = E_USER_ERROR;

	/**
	* Determines if the list of queries executed on a page will be stored in the QueryList array.
	* Useful for development / debug purposes to show a list of queries at the bottom of a page.
	*
	* @see Query
	* @var Boolean
	*/
	var $StoreQueryList = false;

	/**
	* Determines whether a query will be logged or not. If it's false or null it won't log, if it's a filename (or path to a file) it will log.
	* Useful for debug / development purposes to see all the queries being run.
	*
	* @see LogQuery
	*
	* @var String
	*/
	var $QueryLog = null;

	/**
	* Determines whether a time query will be logged or not. If it's false or null it won't log, if it's a filename (or path to a file) it will log.
	* Useful for debug / development purposes to find slow queries.
	*
	* @see TimeQuery
	*
	* @var String
	*/
	var $TimeLog = null;

	/**
	* Determines whether an error will be logged or not. If it's false or null it won't log, if it's a filename (or path to a file) it will log.
	* Useful for debug / development purposes to find queries that create errors.
	*
	* @see LogError
	*
	* @var String
	*/
	var $ErrorLog = null;

	/**
	* The number of queries that have been executed
	*
	* @var Integer
	*/
	var $NumQueries = 0;

	/**
	* Array of queries for debug purposes
	*
	* @var Integer
	*/
	var $QueryList = array();

	/**
	* Is magic quotes runtime on ?
	*
	* @var Boolean
	*/
	var $magic_quotes_runtime_on = false;

	/**
	* The database table prefix that is being used.
	*
	* @var String
	*/
	var $TablePrefix = null;

	/**
	 * The character to enclose fields/tables with to escape the field name
	 *
	 * @var String
	 */
	var $EscapeChar='';

	/**
	* The function to call whenever there is a database error. Useful for logging errors.
	*
	* @var String
	*/
	var $ErrorCallback = null;

	/**
	* Are we in the error callback function ? Used to avoid logging errors that happen inside
	* the callback function
	*
	* @var Boolean
	*/
	var $_InErrorCallback = false;

	/**
	 * The number of transactions that have been 'started'.
	 * This is used to work out whether a 'COMMIT' will really do a commit or just a 'SAVEPOINT'.
	 *
	 * @see StartTransaction
	 * @see CommitTransaction
	 * @see RollbackTransaction
	 */
	var $_transaction_counter = 0;

	var $_transaction_names = array();

	/**
	* Whether a query is being automatically retried or not.
	* This is set in the Query method as a flag so we know whether to re-establish the database connection
	* This only happens when a particular error code comes back so we don't try to re-run bad queries
	*
	* @see Query
	* @see Connect
	*
	* @var Boolean
	*/
	var $_retry = false;

	/**
	* The hostname we are connected to.
	* This is needed so we can re-establish a database connection under particular circumstances
	*
	* @see Connect
	*
	* @var String
	*/
	var $_hostname = '';

	/**
	* The username we are connected with.
	* This is needed so we can re-establish a database connection under particular circumstances
	*
	* @see Connect
	*
	* @var String
	*/
	var $_username = '';

	/**
	* The password we are connected with.
	* This is needed so we can re-establish a database connection under particular circumstances
	*
	* @see Connect
	*
	* @var String
	*/
	var $_password = '';

	/**
	* The database name we are connected to.
	* This is needed so we can re-establish a database connection under particular circumstances
	*
	* @see Connect
	*
	* @var String
	*/
	var $_databasename = '';

	/**
	* Constructor
	*
	* Sets up the database connection.
	* Since this is the parent class the others inherit from, this returns null when called directly.
	*
	* @return Null This will always return null in the base class.
	*/
	function Db()
	{
		$this->magic_quotes_runtime_on = get_magic_quotes_runtime();
		return null;
	}

	/**
	* Connect
	*
	* This function will connect to the database based on the details passed in.
	* Since this is the parent class the others inherit from, this returns false when called directly.
	*
	* @return False Will always return false when called in the base class.
	*/
	function Connect()
	{
		$this->SetError('Cannot call base class method Connect directly');
		return false;
	}

	/**
	* Disconnect
	*
	* This function will disconnect from the database resource passed in.
	* Since this is the parent class the others inherit from, this returns false when called directly.
	*
	* @return False Will always return false when called in the base class.
	*/
	function Disconnect()
	{
		$this->SetError('Cannot call base class method Disconnect directly');
		return false;
	}

	/**
	* SetError
	*
	* Stores the error in the _error var for retrieval. This function will also call the error callback if there is one specified.
	*
	* @param String $error The error you wish to store for retrieval.
	* @param String $errorlevel The error level you wish to store.
	* @param String $query (Optional) The query that was executed that caused the error if there is one.
	*
	* @return Void Doesn't return anything, only sets the values and leaves it at that.
	*/
	function SetError($error='', $errorlevel=E_USER_ERROR, $query='')
	{
		$this->_Error = $error;
		$this->_ErrorLevel = $errorlevel;

		$callback_valid = false;
		if (is_string($this->ErrorCallback)) {
			$callback_valid = function_exists($this->ErrorCallback);
		} elseif (is_array($this->ErrorCallback)) {
			$callback_valid = method_exists($this->ErrorCallback[0], $this->ErrorCallback[1]);
		}
		if ($this->ErrorCallback !== null && $callback_valid && !$this->_InErrorCallback) {
			$this->_InErrorCallback = true;
			call_user_func($this->ErrorCallback, $error, $query);
			$this->_InErrorCallback = false;
		}
	}

	/**
	* GetError
	*
	* This simply returns the $_Error var and it's error level.
	*
	* @see SetError
	*
	* @return Array Returns the error and it's error level.
	*/
	function GetError()
	{
		return array($this->_Error, $this->_ErrorLevel);
	}

	/**
	* Error
	*
	* This returns just the error message from the database.
	*
	* @see SetError
	* @see _Error
	*
	* @return String Returns just the error message from SetError.
	*/
	function Error()
	{
		return $this->_Error;
	}

	/**
	* GetErrorMsg
	*
	* This simply returns the $_Error var
	*
	* @access public
	*
	* @see SetError
	*
	* @return String Returns the error
	*/
	function GetErrorMsg()
	{
		return $this->_Error;
	}

	/**
	* Query
	*
	* This runs a query against the database and returns the resource result.
	*
	* @return False Will always return false when called in the base class.
	*/
	function Query()
	{
		$this->SetError('Cannot call base class method Query directly');
		return false;
	}

	/**
	* Fetch
	* This function will fetch a result from the result set passed in.
	*
	* @see Query
	* @see SetError
	*
	* @return False Will always return false when called in the base class.
	*/
	function Fetch()
	{
		$this->SetError('Cannot call base class method Fetch directly');
		return false;
	}

	/**
	* LogError
	* This will log all errors if ErrorLog is not false or null. Is called from Query.
	*
	* @param String $query The query to log.
	* @param String $error The error message to log.
	*
	* @see ErrorLog
	* @see Query
	*
	* @return Boolean Returns whether the query & error are logged or not. Will return false if there is no query, or if the ErrorLog variable is set to false or null.
	*/
	function LogError($query='', $error=false)
	{
		if (!$query) {
			return false;
		}

		if (!$this->ErrorLog || $this->ErrorLog === null) {
			return false;
		}

		if (!$fp = fopen($this->ErrorLog, 'a+')) {
			return false;
		}

		$backtrace = '';
		if (function_exists('debug_backtrace')) {
			$backtrace = debug_backtrace();
			$called_from = $backtrace[1];
			// if the called_from[file] entry is this particular file, we used FetchOne to do the query.
			// so we need to go back one more level.
			if ($called_from['file'] == __FILE__) {
				$called_from = $backtrace[2];
			}
			$backtrace = $called_from['file'] . ' (' . $called_from['line'] . ')';
		}
		$line = date('M d H:i:s') . "\t" . getmypid() . "\t" . $backtrace . "\t" . "Error!: " . $error . "\t" . preg_replace('%\s+%', ' ', $query) . "\n";
		fputs($fp, $line, strlen($line));
		fclose($fp);
		return true;
	}

	/**
	* LogQuery
	* This will log all queries if QueryLog is not false or null. Is called from Query.
	*
	* @param String $query The query to log.
	*
	* @see QueryLog
	* @see Query
	* @see SetError
	*
	* @return Boolean Returns whether the query is logged or not. Will return false if there is no query or if the QueryLog variable is set to false or null.
	*/
	function LogQuery($query='')
	{
		if (!$query) {
			return false;
		}

		if (!$this->QueryLog || $this->QueryLog === null) {
			return false;
		}

		if (!$fp = fopen($this->QueryLog, 'ab+')) {
			return false;
		}

		$backtrace = '';
		if (function_exists('debug_backtrace')) {
			$backtrace = debug_backtrace();
			$called_from = $backtrace[1];
			// if the called_from[file] entry is this particular file, we used FetchOne to do the query.
			// so we need to go back one more level.
			if ($called_from['file'] == __FILE__) {
				$called_from = $backtrace[2];
			}
			$backtrace = $called_from['file'] . ' (' . $called_from['line'] . ')';
		}
		$line = date('M d H:i:s') . "\t" . getmypid() . "\t" . $backtrace . "\t" . str_replace('`', '', preg_replace('%\s+%', ' ', $query)) . "\n";
		fputs($fp, $line, strlen($line));
		fclose($fp);
		return true;
	}

	function TimeQuery($query='', $timestart=0, $timeend=0)
	{
		if (!$this->TimeLog || $this->TimeLog === null) {
			return false;
		}

		if (!$query) {
			return false;
		}

		if (!$fp = fopen($this->TimeLog, 'a+')) {
			return false;
		}

		$backtrace = '';
		if (function_exists('debug_backtrace')) {
			$backtrace = debug_backtrace();
			$called_from = $backtrace[1];
			// if the called_from[file] entry is this particular file, we used FetchOne to do the query.
			// so we need to go back one more level.
			if ($called_from['file'] == __FILE__) {
				$called_from = $backtrace[2];
			}
			$backtrace = $called_from['file'] . ' (' . $called_from['line'] . ')';
		}
		$line = date('M d H:i:s') . "\t" . getmypid() . "\t" . $backtrace . "\t" . sprintf("%01.2f", ($timeend - $timestart)) . "\t" . preg_replace('%\s+%', ' ', $query) . "\n";
		fputs($fp, $line, strlen($line));
		fclose($fp);
		return true;
	}

	/**
	* FreeResult
	* Frees the result from memory. The base class always returns false.
	*
	* @see Query
	* @see SetError
	*
	* @return Boolean Whether freeing the result worked or not.
	*/
	function FreeResult()
	{
		$this->SetError('Can\'t call FreeResult from the base class.');
		return false;
	}

	/**
	* CountResult
	* Returns the number of rows returned for the resource passed in. The base class always returns 0.
	*
	* @see Query
	* @see SetError
	*
	* @return False Always returns false in the base class.
	*/
	function CountResult()
	{
		$this->SetError('Can\'t call CountResult from the base class.');
		return false;
	}

	/**
	* FetchOne
	* Fetches one item from a result and returns it.
	*
	* @param String $result Result to fetch the item from.
	* @param String $item The item to look for and return.
	*
	* @see Fetch
	*
	* @return Mixed Returns false if there is no result or item, or if the item doesn't exist in the result. Otherwise returns the item's value.
	*/
	function FetchOne($result=null, $item=null)
	{
		if ($result === null) {
			return false;
		}
		if (!is_resource($result)) {
			$result = $this->Query($result);
		}
		$row = $this->Fetch($result);
		if (!$row) {
			return false;
		}
		if ($item === null) {
			$item = key($row);
		}
		if (!isset($row[$item])) {
			return false;
		}
		if($this->magic_quotes_runtime_on) {
			$row[$item] = stripslashes($row[$item]);
		}
		return $row[$item];
	}

	/**
	* Concat
	* Concatentates multiple strings together. The base class returns nothing - it needs to be overridden for each database type.
	*
	* @return False Always returns false in the base class.
	*/
	function Concat()
	{
		return false;
	}

	/**
	* StripslashesArray
	* Strips the slashes from all the elements in an entire (multidimensional) array
	*
	* @param Mixed $value Item you want to strip the slashes from
	*
	* @return Mixed Returns the same type as passed in
	*/
	function StripslashesArray($value)
	{
		if(is_array($value)) {
			$value = array_map(array($this, 'StripslashesArray'), $value);
		}
		else {
			$value = stripslashes($value);
		}
		return $value;
	}

	/**
	* Quote
	* Quotes the string ready for database queries. This uses addslashes if not overridden in subclasses.
	*
	* @param String $string String you want to quote ready for database entry.
	*
	* @return String String with quotes!
	*/
	function Quote($string='')
	{
		return addslashes($string);
	}

	/**
	* LastId
	*
	* Returns the last insert id
	*
	* @param String $seq The sequence name to fetch the last id from.
	*
	* @return False The base class always returns false.
	*/
	function LastId($seq='')
	{
		$this->SetError('Can\'t call LastId from the base class.');
		return false;
	}

	/**
	* NextId
	*
	* Returns the next insert id
	*
	* @param String $seq The sequence name to fetch the next id from.
	*
	* @return False The base class always returns false.
	*/
	function NextId($seq='')
	{
		$this->SetError('Can\'t call NextId from the base class.');
		return false;
	}

	/**
	* CheckSequence
	*
	* Checks to make sure a sequence doesn't have multiple entries.
	*
	* @return False The base class always returns false.
	*/
	function CheckSequence()
	{
		$this->SetError('Can\'t call CheckSequence from the base class.');
		return false;
	}

	/**
	* ResetSequence
	*
	* Resets a field in a sequence table.
	*
	* @return False The base class always returns false.
	*/
	function ResetSequence()
	{
		$this->SetError('Can\'t call ResetSequence from the base class.');
		return false;
	}

	/**
	* OptimizeTable
	*
	* Runs "optimize" or "analyze" over the tablename passed in. This is useful to keep the database reasonably speedy.
	*
	* @param String $tablename The tablename to optimize.
	*
	* @return False The base class always returns false.
	*/
	function OptimizeTable($tablename='')
	{
		$this->SetError('Can\'t call OptimizeTable from the base class.');
		return false;
	}

	/**
	* GetTime
	*
	* Returns a float microtime so we can record how long it took to get a result from the database.
	*
	* @see TimeQuery
	* @see MySQLDB::Query
	* @see PgSQLDB::Query
	*
	* @return Float Returns a float microtime.
	*/
	function GetTime()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}

	/**
	* FetchRow
	*
	* Fetch a single row from the database or false on error
	*
	* @param string $query The sql query to fetch the row
	*
	* @return mixed array of data or false on error
	*/
	function FetchRow($query)
	{
		if (empty($query)) {
			return false;
		}
		$result = $this->Query($query);
		return $this->Fetch($result);
	}

	/**
	* NumAffected
	*
	* The base class always returns false.
	* @param  mixed $null Placeholder for postgres compatability
	*
	* @return False The base class always returns false.
	*/
	function NumAffected($null=null)
	{
		$this->SetError('Can\'t call NumAffected from the base class.');
		return false;
	}

	/**
	* UnbufferedQuery
	*
	* The base class always returns false. UnbufferedQuery is also a mysql-only feature.
	*
	* @param String This is a placeholder which the sub-classes take, not used in the base class.
	*
	* @return False The base class always returns false.
	*/
	function UnbufferedQuery($query=null)
	{
		$this->SetError('Can\'t call UnbufferedQuery from the base class. Also note this is a mysql-only feature.');
		return false;
	}


	/**
	 * Build and execute a database insert query from an array of keys/values.
	 *
	 * @param string The table to insert into.
	 * @param array Associative array of key/value pairs to insert.
	 * @param bool TRUE to interpret NULL as being database NULL, FALSE to mean an empty string
	 * @return mixed Insert ID on successful insertion, false on failure.
	 */
	function InsertQuery($table, $values, $useNullValues=false)
	{
		$keys = array_keys($values);
		$fields = implode($this->EscapeChar.",".$this->EscapeChar, $keys);

		foreach ($keys as $key) {

			if ($useNullValues) {
				if (is_null($values[$key])) {
					$values[$key] = "NULL";
				} else {
					$values[$key] = "'" . $this->Quote($values[$key]) . "'";
				}
			} else {
				$values[$key] = "'" . $this->Quote($values[$key]) . "'";
			}
		}

		$values = implode(",", $values);
		$query = sprintf('INSERT INTO %1$s[|PREFIX|]%2$s%1$s (%1$s%3$s%1$s) VALUES (%4$s)', $this->EscapeChar, $table, $fields, $values);

		if ($this->Query($query)) {
			return $this->LastId();
		}
		else {
			return false;
		}
	}

	/**
	 * Build and execute a database update query from an array of keys/values.
	 *
	 * @param string The table to insert into.
	 * @param array Associative array containing key/value pairs to update.
	 * @param string The where clause to apply to the update
 	 * @param bool TRUE to interpret NULL as being database NULL, FALSE to mean an empty string
	 *
	 * @return boolean True on success, false on error.
	 */
	function UpdateQuery($table, $values, $where="", $useNullValues=false)
	{
		$fields = array();
		foreach ($values as $k => $v) {

			if ($useNullValues) {
				if (is_null($v)) {
					$v = "NULL";
				} else {
					$v = "'" . $this->Quote($v) . "'";
				}
			} else {
				$v = "'" . $this->Quote($v) . "'";
			}

			$fields[] = sprintf("%s=%s", $k, $v);
		}
		$fields = implode(", ", $fields);
		if ($where != "") {
			$fields .= sprintf(" WHERE %s", $where);
		}

		$query = sprintf('UPDATE [|PREFIX|]%s SET %s', $table, $fields);
		if ($this->Query($query)) {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	* DeleteQuery
	* Formats a delete query based on the table name passed in and the query which could include a where clause and/or an order by etc.
	* If the database type supports a delete query with a limit clause, this is the method called.
	* If the database type doesn't support this (for example postgresql), then this method is overridden in the subclass.
	* If a query is not passed in, then this returns false as a safe-guard against accidentally deleting all of your table records.
	*
	* @param String $table The table you want to delete from.
	* @param String $query The query to restrict which entries to delete. If this is not supplied, the function returns false.
	* @param Int $limit The number of entries you want to delete. This is usually left off altogether.
	*
	* @see Query
	*
	* @return Mixed Returns false if no query is passed in, or if an invalid limit is supplied. Otherwise returns the result from Query
	*/
	function DeleteQuery($table='', $query=null, $limit=0)
	{
		if ($query === null) {
			return false;
		}

		$limit = intval($limit);

		if ($limit < 0) {
			return false;
		}

		$query = 'DELETE FROM [|PREFIX|]' . $table . ' ' . $query;

		if ($limit > 0) {
			$query .= ' LIMIT ' . $limit;
		}

		return $this->Query($query);
	}

	/**
	 * Start a transaction
	 *
	 * Method will start a transaction
	 * If a transaction is already in progress, then it will issue a "SAVEPOINT" command.
	 *
	 * @access public
	 * @return bool TRUE if the transaction was successfully created, FALSE otherwise
	 */
	function StartTransaction()
	{
		/**
		 * If there are no transactions open, start one up.
		 */
		if ($this->_transaction_counter == 0) {
			$this->_transaction_counter++;
			return (bool)$this->Query("START TRANSACTION");
		}

		/**
		 * If there is a transaction open, work out a new "name" and issue a "SAVEPOINT" command.
		 */
		$name = $this->_generate_transaction_name();
		$this->_transaction_counter++;
		return (bool)$this->Query("SAVEPOINT " . $name);
	}

	/**
	 * Commit all open transactions and save points
	 *
	 * This will commit all save points and open transactions until everything is done.
	 * By issuing a "COMMIT" statement, the db will automatically commit everything it has done.
	 * We need to clear the transaction counter & transaction names.
	 *
	 * @return Boolean Returns whether the "COMMIT" call was successful or not.
	 */
	function CommitAllTransactions()
	{
		$this->_transaction_counter = 0;
		$this->_transaction_names = array();
		return (bool)$this->Query("COMMIT");
	}

	/**
	 * Commit a transaction
	 *
	 * Method will commit a transaction if it's the last transaction in progress.
	 * If more than one transaction is in progress, then it will simply "ignore" the commit (there is no way to "commit" a savepoint or sub-transaction).
	 * This will just decrement the number of transactions we have open and remove the last transaction name from the queue.
	 *
	 * @access public
	 * @return bool TRUE if the transaction was successfully commited, FALSE otherwise
	 */
	function CommitTransaction()
	{
		/**
		 * If there are no transactions open, return false.
		 */
		if ($this->_transaction_counter < 1) {
			return false;
		}

		if ($this->_transaction_counter == 1) {
			$this->_transaction_counter--;
			return (bool)$this->Query("COMMIT");
		}

		/**
		 * If we're in a transaction, all we need to do is get rid of the last 'savepoint' name
		 * We can't actually "commit" a savepoint.
		 */
		$name = array_pop($this->_transaction_names);
		$this->_transaction_counter--;
		return true;
	}

	/**
	 * Rollback a transaction
	 *
	 * Method will completely rollback a transaction if it's the last one in progress.
	 * If more than one transaction is in progress, then it will rollback to the last savepoint.
	 *
	 * @access public
	 * @return bool TRUE if the transaction was successfully rolled back, FALSE otherwise
	 */
	function RollbackTransaction()
	{
		/**
		 * If there are no transactions open, return false.
		 */
		if ($this->_transaction_counter < 1) {
			return false;
		}

		if ($this->_transaction_counter == 1) {
			$this->_transaction_counter--;
			return (bool)$this->Query("ROLLBACK");
		}

		$this->_transaction_counter--;
		$name = array_pop($this->_transaction_names);
		return (bool)$this->Query("ROLLBACK TO SAVEPOINT " . $name);
	}

	/**
	 * Rollback all open transactions and save points
	 *
	 * This will rollback all save points and open transactions until everything is done.
	 * By issuing a "ROLLBACK" statement, the db will automatically clear everything it has done.
	 * We need to clear the transaction counter & transaction names.
	 *
	 * @return Boolean Returns whether the "ROLLBACK" call was successful or not.
	 */
	function RollbackAllTransactions()
	{
		$this->_transaction_counter = 0;
		$this->_transaction_names = array();
		return (bool)$this->Query("ROLLBACK");
	}

	/**
	 * _generate_transaction_name
	 * Generates a random transaction name for use with "SAVEPOINT" calls.
	 * This saves having to name your transactions, it's all handled automatically.
	 * The name is kept in the _transaction_names array so we can check it is unique and also be able to go back to a previous savepoint if necessary.
	 *
	 * @see _transaction_names
	 * @see StartTransaction
	 * @see CommitTransaction
	 * @see RollbackTransaction
	 *
	 * @return String Returns a random transaction name starting with 'interspire'.
	 */
	function _generate_transaction_name()
	{
		while (true) {
			$name = uniqid('interspire');
			if (!in_array($name, $this->_transaction_names)) {
				$this->_transaction_names[] = $name;
				return $name;
			}
		}
	}
}

?>
