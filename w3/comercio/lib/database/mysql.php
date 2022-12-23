<?php
/**
* This file handles mysql database connections, queries, procedures etc.
* Most functions are overridden from the base object.
*
* @version     $Id: mysql.php 127 2008-07-11 01:02:06Z hendri $
* @author Chris <chris@interspire.com>
*
* @package Db
* @subpackage MySQLDb
*/

/**
* Include the base database class.
*/
require(dirname(__FILE__).'/db.php');

if (!function_exists('mysql_connect')) {
	die("Your PHP installation does not have MySQL support. Please enable MySQL support in PHP or ask your web host to do so for you.");
}

/**
* This is the class for the MySQL database system.
*
* @package Db
* @subpackage MySQLDb
*/
class MySQLDb extends Db
{
	/**
	* Should we use mysql_real_escape_string or the older mysql_escape_string function ?
	*
	* @var Boolean
	*/
	var $use_real_escape = false;

	/**
	* Is magic quotes runtime on ?
	*
	* @var Boolean
	*/
	var $magic_quotes_runtime_on = false;

	/**
	 * MySQL uses ` to escape table/database names
	 *
	 * @var String
	 */
	var $EscapeChar = '`';

	/**
	* This flag is checked when Query is called to see which mode to run the query in.
	* Calling the UnbufferedQuery function sets this flag to true, then lets the main Query function handle the rest.
	*
	* @see UnbufferedQuery
	* @see Query
	*
	* @var Boolean Defaults to false (don't run in unbuffered mode).
	*/
	var $_unbuffered_query = false;

	/**
	* Constructor
	* Sets up the database connection.
	* Can pass in the hostname, username, password and database name if you want to.
	* If you don't it will set up the base class, then you'll have to call Connect yourself.
	*
	* @param String $hostname Name of the server to connect to.
	* @param String $username Username to connect to the server with.
	* @param String $password Password to connect with.
	* @param String $databasename Database name to connect to.
	*
	* @see Connect
	* @see GetError
	*
	* @return Mixed Returns false if no connection can be made - the error can be fetched by the Error() method. Returns the connection result if it can be made. Will return Null if you don't pass in the connection details.
	*/
	function MySQLDb($hostname='', $username='', $password='', $databasename='')
	{
		$this->use_real_escape = version_compare(PHP_VERSION, '4.3.0', '>=');
		$this->magic_quotes_runtime_on = get_magic_quotes_runtime();

		if ($hostname && $username && $databasename) {
			$connection = $this->Connect($hostname, $username, $password, $databasename);
			return $connection;
		}
		return null;
	}

	/**
	* Connect
	* This function will connect to the database based on the details passed in.
	*
	* @param String $hostname Name of the server to connect to.
	* @param String $username Username to connect to the server with.
	* @param String $password Password to connect with.
	* @param String $databasename Database name to connect to.
	*
	* @see SetError
	*
	* @return False|Resource Returns the resource if the connection is successful. If anything is missing or incorrect, this will return false.
	*/
	function Connect($hostname=null, $username=null, $password=null, $databasename=null)
	{

		if ($hostname === null && $username === null && $password === null && $databasename === null) {
			$hostname = $this->_hostname;
			$username = $this->_username;
			$password = $this->_password;
			$databasename = $this->_databasename;
		}

		if ($hostname == '') {
			$this->SetError('No server name to connect to');
			return false;
		}

		if ($username == '') {
			$this->SetError('No username name to connect to server '.$hostname.' with');
			return false;
		}

		if ($databasename == '') {
			$this->SetError('No database name to connect to');
			return false;
		}

		if ($this->_retry && is_resource($this->connection)) {
			$this->Disconnect($this->connection);
		}

		$connection_result = @mysql_connect($hostname, $username, $password, true);
		if (!$connection_result) {
			$this->SetError(mysql_error());
			return false;
		}
		$this->connection = &$connection_result;

		$db_result = @mysql_select_db($databasename, $connection_result);
		if (!$db_result) {
			$this->SetError('Unable to select database \''.$databasename.'\': '.mysql_error());
			return false;
		}
		$this->_hostname = $hostname;
		$this->_username = $username;
		$this->_password = $password;
		$this->_databasename = $databasename;

		return $this->connection;
	}

	/**
	* Disconnect
	* This function will disconnect from the database handler passed in.
	*
	* @param String $resource Resource to disconnect from
	*
	* @see SetError
	*
	* @return Boolean If the resource passed in is not valid, this will return false. Otherwise it returns the status from pg_close.
	*/
	function Disconnect($resource=null)
	{
		if ($resource === null) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}
		$close_success = mysql_close($resource);
		if ($close_success) {
			$this->connection = null;
		}
		return $close_success;
	}

	/**
	* Query
	* This function will run a query against the database and return the result of the query.
	*
	* @param String $query The query to run.
	*
	* @see LogQuery
	* @see SetError
	*
	* @return Mixed Returns false if the query is empty or if there is no result. Otherwise returns the result of the query.
	*/
	function Query($query='')
	{
		// if we're retrying a query, we have to kill the old connection and grab it again.
		// if we don't, we get a cached connection which won't work.
		if ($this->_retry) {
			$this->Connect();
		}

		if (!$query) {
			$this->_retry = false;
			$this->SetError('Query passed in is empty');
			return false;
		}

		if (!$this->connection) {
			$this->_retry = false;
			$this->SetError('No valid connection');
			return false;
		}

		if ($this->TablePrefix !== null) {
			$query = str_replace("[|PREFIX|]", $this->TablePrefix, $query);
		}

		$this->NumQueries++;

		if ($this->TimeLog !== null || $this->StoreQueryList ==  true) {
			$timestart = $this->GetTime();
		}

		if (!$this->_unbuffered_query) {
			$result = mysql_query($query, $this->connection);
		} else {
			$result = mysql_unbuffered_query($query, $this->connection);
			$this->_unbuffered_query = false;
		}

		if ($this->TimeLog !== null) {
			$timeend = $this->GetTime();
			$this->TimeQuery($query, $timestart, $timeend);
		}

		if($this->StoreQueryList) {
			if(!isset($timeend)) {
				$timeend = $this->GetTime();
			}
			$this->QueryList[] = array(
				"Query" => $query,
				"ExecutionTime" => $timeend-$timestart
			);
		}

		if ($this->QueryLog !== null) {
			if ($this->_retry) {
				$this->LogQuery("*** Retry *** Result type: " . gettype($result) . "; value: " . $result . "\t" . $query);
			} else {
				$this->LogQuery("Result type: " . gettype($result) . "; value: " . $result . "\t" . $query);
			}
		}

		if (!$result) {
			$error = mysql_error($this->connection);
			$errno = mysql_errno($this->connection);

			if ($this->ErrorLog !== null) {
				$this->LogError($query, $error);
			}

			$this->SetError($error, E_USER_ERROR, $query);

			// we've already retried? don't try again.
			// or if the error is not '2006', then don't bother going any further.
			if ($this->_retry || $errno !== 2006) {
				$this->_retry = false;
				return false;
			}

			// error 2006 is 'server has gone away'
			// http://dev.mysql.com/doc/refman/5.0/en/error-messages-client.html
			if ($errno === 2006) {
				$this->_retry = true;
				return $this->Query($query);
			}
		}

		// make sure we set the 'retry' flag back to false if we are returning a result set.
		$this->_retry = false;
		return $result;
	}

	/**
	* UnbufferedQuery
	* Runs a query in 'unbuffered' mode which means that the whole result set isn't loaded in to memory before returning it.
	* Calling this function sets a flag in the class to say run the query in unbuffered mode, then uses Query to handle the rest.
	*
	* @param String $query The query to run in unbuffered mode.
	*
	* @see _unbuffered_query
	* @see Query
	*
	* @return Mixed Returns the result from the Query function.
	*/
	function UnbufferedQuery($query='')
	{
		$this->_unbuffered_query = true;
		return $this->Query($query);
	}

	/**
	* Fetch
	* This function will fetch a result from the result set passed in.
	*
	* @param String $resource The result from calling Query. Returns an associative array (not an indexed based one)
	*
	* @see Query
	* @see SetError
	* @see StripslashesArray
	*
	* @return Mixed Returns false if the result is empty. Otherwise returns the next result.
	*/
	function Fetch($resource=null)
	{
		if ($resource === null) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}

		if($this->magic_quotes_runtime_on) {
			return $this->StripslashesArray(mysql_fetch_assoc($resource));
		}
		else {
			return mysql_fetch_assoc($resource);
		}
	}

	/**
	* NextId
	* Fetches the next id from the sequence passed in
	*
	* @param String $sequencename Sequence Name to fetch the next id for.
	* @param String $idcolumn The name of the column for the id field. By default this is 'id'.
	*
	* @see Query
	*
	* @return Mixed Returns false if there is no sequence name or if it can't fetch the next id. Otherwise returns the next id
	*/
	function NextId($sequencename=false, $idcolumn='id')
	{
		if (!$sequencename) {
			return false;
		}
		$query = 'UPDATE '.$sequencename.' SET ' . $idcolumn . '=LAST_INSERT_ID(' . $idcolumn . '+1)';
		$result = $this->Query($query);
		if (!$result) {
			return false;
		}
		return mysql_insert_id($this->connection);
	}

	/**
	* FullText
	* Fulltext works out how to handle full text searches. Returns an sql statement to append to enable full text searching.
	*
	* @param Mixed $fields Fields to search against. This can be an array or a single field.
	* @param String $searchstring String to search for against the fields
	* @param Bool $booleanmode In MySQL, is this search in boolean mode ?
	*
	* @return Mixed Returns false if either fields or searchstring aren't present, otherwise returns a string to append to an sql statement.
	*/
	function FullText($fields=null, $searchstring=null, $booleanmode=false)
	{
		if ($fields === null || $searchstring === null) {
			return false;
		}
		if (is_array($fields)) {
			$fields = implode(',', $fields);
		}
		if ($booleanmode) {
			$query = 'MATCH ('.$fields.') AGAINST (\''.$this->Quote($this->CleanFullTextString($searchstring)).'\' IN BOOLEAN MODE)';
		} else {
			$query = 'MATCH ('.$fields.') AGAINST (\''.$this->Quote($searchstring).'\')';
		}
		return $query;
	}

	/**
	 * CleanFullTextString
	 * Cleans and properly formats an incoming search query in to a string MySQL will love to perform fulltext queries on.
	 * For example, the and/or words are replaced with correct boolean mode formats, phrases are supported.
	 *
	 * @param String $searchstring The string you wish to clean.
	 * @return String The formatted string
	 */
	function CleanFullTextString($searchstring)
	{
		$searchstring = strtolower($searchstring);
		$searchstring = str_replace("%", "\\%", $searchstring);
		$searchstring = preg_replace("#\*{2,}#s", "*", $searchstring);
		$searchstring = preg_replace("#([\[\]\|\.\,:])#s", " ", $searchstring);
		$searchstring = preg_replace("#\s+#s", " ", $searchstring);

		$words = array();

		// Does this search string contain one or more phrases?
		$quoted_string = false;
		if (strpos($searchstring, "\"") !== false) {
			$quoted_string = true;
		}
		$in_quote = false;
		$searchstring = explode("\"", $searchstring);
		foreach ($searchstring as $phrase) {
			$phrase = trim($phrase);
			if ($phrase == "") {
				continue;
			}

			if ($in_quote == true) {
				$words[] = "\"{$phrase}\"";
			} else {
				$split_words = preg_split("#\s{1,}#", $phrase, -1);
				if (!is_array($split_words)) {
					continue;
				}

				foreach ($split_words as $word) {
					if (!$word) {
						continue;
					}
					$words[] = trim($word);
				}
			}
			if ($quoted_string) {
				$in_quote = !$in_quote;
			}
		}
		$searchstring = ''; // Reset search string
		$boolean = '';
		$first_boolean = '';
		foreach ($words as $k => $word) {
			if ($word == "or") {
				$boolean = "";
			} else if ($word == "and") {
				$boolean = "+";
			} else if ($word == "not") {
				$boolean = "-";
			} else {
				$searchstring .= " ".$boolean.$word;
				$boolean = '';
			}
			if ($k == 0) {
				if ($boolean == "-") {
					$first_boolean = "+";
				} else {
					$first_boolean = $boolean;
				}
			}
		}
		$searchstring = $first_boolean.trim($searchstring);
		return $searchstring;
	}

	/**
	* AddLimit
	* This function creates the SQL to add a limit clause to an sql statement.
	*
	* @param Int $offset Where to start fetching the results
	* @param Int $numtofetch Number of results to fetch
	*
	* @return String The string to add to the end of the sql statement
	*/
	function AddLimit($offset=0, $numtofetch=0)
	{
		$offset = intval($offset);
		$numtofetch = intval($numtofetch);

		if ($offset < 0) {
			$offset = 0;
		}
		if ($numtofetch <= 0) {
			$numtofetch = 10;
		}
		$query = ' LIMIT '.$offset.', '.$numtofetch;
		return $query;
	}

	/**
	* FreeResult
	* Frees the result from memory.
	*
	* @param String $resource The result resource you want to free up.
	*
	* @return Boolean Whether freeing the result worked or not.
	*/
	function FreeResult($resource=null)
	{
		if ($resource === null) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}
		$result = mysql_free_result($resource);
		return $result;
	}

	/**
	* CountResult
	* Returns the number of rows returned for the resource passed in
	*
	* @param String $resource The result from calling Query
	*
	* @see Query
	* @see SetError
	*
	* @return Int Number of rows from the result
	*/
	function CountResult($resource=null)
	{
		if ($resource === null) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}
		$count = mysql_num_rows($resource);
		return $count;
	}

	/**
	* Concat
	* Concatentates multiple strings together. This method is mysql specific. It doesn't matter how many arguments you pass in, it will handle them all.
	* If you pass in one argument, it will return it straight away.
	* Otherwise, it will use the mysql specific CONCAT function to put everything together and return the new string.
	*
	* @return String Returns the new string with all of the arguments concatenated together.
	*/
	function Concat()
	{
		$num_args = func_num_args();
		if ($num_args < 1) {
			return func_get_arg(0);
		}
		$all_args = func_get_args();
		$returnstring = 'CONCAT('.implode(',', $all_args).')';
		return $returnstring;
	}

	/**
	* Quote
	* Quotes the string ready for database queries. Runs mysql_escape_string or mysql_real_escape_string depending on the php version.
	*
	* @param Mixed $var Variable you want to quote ready for database entry.
	*
	* @return Mixed $var with quotes applied to it appropriately
	*/
	function Quote($var='')
	{
		if (is_string($var) || is_numeric($var) || is_null($var)) {
			if ($this->use_real_escape) {
				return @mysql_real_escape_string($var, $this->connection);
			} else {
				return @mysql_escape_string($var, $this->connection);
			}
		} else if (is_array($var)) {
			return array_map(array($this, 'Quote'), $var);
		} else if (is_bool($var)) {
			return (int) $var;
		} else {
			trigger_error("Invalid type passed to DB quote ".gettype($var), E_USER_ERROR);
			return false;
		}
	}

	/**
	* LastId
	*
	* Returns the last insert id
	*
	* @return Int Returns mysql_insert_id from the database.
	*/
	function LastId($seq='')
	{
		return mysql_insert_id($this->connection);
	}

	/**
	* CheckSequence
	*
	* Checks to make sure a sequence doesn't have multiple entries.
	*
	* @return Boolean Returns true if there is exactly 1 entry in the sequence table, otherwise returns false.
	*/
	function CheckSequence($seq='')
	{
		if (!$seq) {
			return false;
		}
		$query = "SELECT COUNT(*) AS count FROM " . $seq;
		$count = $this->FetchOne($query, 'count');
		if ($count == 1) {
			return true;
		}
		return false;
	}

	/**
	* ResetSequence
	*
	* Resets a sequence to a new id.
	*
	* @param String $seq The sequence name to reset.
	* @param Int $newid The new id to set the sequence to.
	*
	* @return Boolean Returns true if the sequence is reset, otherwise false.
	*/
	function ResetSequence($seq='', $newid=0)
	{
		if (!$seq) {
			return false;
		}

		$newid = (int)$newid;
		if ($newid <= 0) {
			return false;
		}

		$query = "TRUNCATE TABLE " . $seq;
		$result = $this->Query($query);
		if (!$result) {
			return false;
		}

		// since a sequence table only has one field, we don't care what the fieldname is.
		$query = "INSERT INTO " . $seq . " VALUES (" . $newid . ")";
		$result = $this->Query($query);
		if (!$result) {
			return false;
		}

		return $this->CheckSequence($seq);
	}

	/**
	* OptimizeTable
	*
	* Runs "optimize" over the tablename passed in. This is useful to keep the database reasonably speedy.
	*
	* @param String $tablename The tablename to optimize.
	*
	* @see Query
	*
	* @return Mixed If no tablename is passed in, this returns false straight away. Otherwise it calls Query and returns the result from that.
	*/
	function OptimizeTable($tablename='')
	{
		if (!$tablename) {
			return false;
		}
		$query = "OPTIMIZE TABLE " . $tablename;
		return $this->Query($query);
	}

	/**
	* NumAffected
	*
	* Returns the number of affected rows on success, and -1 if the last query failed.
	*
	* @param  mixed $null Placeholder for postgres compatability
	*
	* @return int
	*/
	function NumAffected($null=null)
	{
		return mysql_affected_rows($this->connection);
	}
}

?>