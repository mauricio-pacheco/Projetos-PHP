<?php
/**
* This file handles postgresql database connections, queries, procedures etc.
* Most functions are overridden from the base object.
*
* @version     $Id: pgsql.php 127 2008-07-11 01:02:06Z hendri $
* @author Chris <chris@interspire.com>
*
* @package Db
* @subpackage PGSQLDb
* @filesource
*/

/**
* Include the base database class.
*/
require(dirname(__FILE__).'/db.php');

if (!function_exists('pg_connect')) {
	die("Your PHP installation does not have PostgreSQL support. Please enable PostgreSQL support in PHP or ask your web host to do so for you.");
}

/**
* Here are some backwards compatibility functions.
* If the pg_query function doesn't exist, try to use pg_exec.
*/
if (!function_exists('pg_query')) {

	/**
	* pg_query
	* Backwards compatible function
	*/
	function pg_query($query)
	{
		return pg_exec($query);
	}

}

/**
* Here are some backwards compatibility functions.
* If the pg_fetch_assoc function doesn't exist, try to use the pg_fetch_array function with appropriate variables.
*/
if (!function_exists('pg_fetch_assoc')) {

	/**
	* pg_fetch_assoc
	* Backwards compatible function
	*/
	function pg_fetch_assoc($result)
	{
		return pg_fetch_array($result, null, PGSQL_ASSOC);
	}

}

/**
* Here are some backwards compatibility functions.
* If the pg_free_result function doesn't exist, try to use the pg_freeresult function with appropriate variables.
*/
if (!function_exists('pg_free_result')) {

	/**
	* pg_free_result
	* Backwards compatible function
	*/
	function pg_free_result($result)
	{
		return pg_freeresult($result);
	}

}

/**
* This is the class for the PostgreSQL database system.
*
* @package Db
* @subpackage PGSQLDb
*/
class PGSQLDb extends Db
{
	/**
	* Is magic quotes runtime on ?
	*
	* @var Boolean
	*/
	var $magic_quotes_runtime_on = false;

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
	function PGSQLDb($hostname='', $username='', $password='', $databasename='')
	{
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

		$connection_string = 'dbname='.$databasename;
		if ($hostname != 'localhost') {
			$connection_string .= ' host='.$hostname;
		}
		$connection_string .= ' user='.$username;
		if ($password != '') {
			$connection_string .= ' password='.$password;
		}

		$connection_result = @pg_connect($connection_string);
		if (!$connection_result) {
			$this->SetError('Unable to connect to the database. Please check the settings and try again');
			return false;
		}
		$this->connection = &$connection_result;

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
		if (is_null($resource)) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}
		$close_success = pg_close($resource);
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

		$result = @pg_query($query);

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
			$error = pg_last_error($this->connection);
			$server_died_message = 'server closed the connection unexpectedly';
			$found_server_died_message = strpos($error, $server_died_message);

			if ($this->ErrorLog !== null) {
				$this->LogError($query, $error);
			}

			$this->SetError($error, E_USER_ERROR, $query);

			if ($this->_retry || $found_server_died_message === false) {
				$this->_retry = false;
				return false;
			}

			if ($found_server_died_message !== false) {
				$this->_retry = true;
				return $this->Query($query);
			}
		}

		$this->_retry = false;
		return $result;
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
		if (is_null($resource)) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}

		if($this->magic_quotes_runtime_on) {
			return $this->StripslashesArray(pg_fetch_assoc($resource));
		}
		else {
			return pg_fetch_assoc($resource);
		}
	}

	/**
	* NextId
	* Fetches the next id from the sequence passed in
	*
	* @param String $sequencename Sequence Name to fetch the next id for.
	* @param String $idcolumn The name of the column for the id field. This is not used in pgsql.
	*
	* @see Query
	*
	* @return Mixed Returns false if there is no sequence name or if it can't fetch the next id. Otherwise returns the next id
	*/
	function NextId($sequencename=false, $idcolumn=false)
	{
		if (!$sequencename) {
			return false;
		}

		$query = "SELECT nextval('".$sequencename."') AS nextid";
		$nextid = $this->FetchOne($query);
		return $nextid;
	}

	/**
	* FullText
	* Fulltext works out how to handle full text searches. Returns an sql statement to append to enable full text searching.
	*
	* @param Mixed $fields Fields to search against. This can be an array or a single field.
	* @param String $searchstring String to search for against the fields
	* @param Bool $booleanmode MySQL specific switch. Doesn't do anything in PostgreSQL
	*
	* @return Mixed Returns false if either fields or searchstring aren't present, otherwise returns a string to append to an sql statement.
	*/
	function FullText($fields=null, $searchstring=null, $booleanmode=false)
	{
		if (is_null($fields) || is_null($searchstring)) {
			return false;
		}
		if (!is_array($fields)) {
			$fields = explode(',', $fields);
		}

		$query = '';
		$subqueries = array();
		foreach ($fields as $field) {
			$subqueries[]= $field.' ILIKE \'%'.$this->Quote($searchstring).'%\'';
		}
		$query = implode(' OR ', $subqueries);
		return $query;
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
		$query = ' LIMIT '.$numtofetch.' OFFSET '.$offset;
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
		if (is_null($resource)) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}
		$result = pg_free_result($resource);
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
		if (is_null($resource)) {
			$this->SetError('Resource is a null object');
			return false;
		}
		if (!is_resource($resource)) {
			$this->SetError('Resource '.$resource.' is not really a resource');
			return false;
		}
		$count = pg_num_rows($resource);
		return $count;
	}

	/**
	* Concat
	* Concatentates multiple strings together. This method is postgresql specific. It doesn't matter how many arguments you pass in, it will handle them all.
	* If you pass in one argument, it will return it straight away.
	* Otherwise, it will use the postgresql specific CONCAT function to put everything together and return the new string.
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
		$returnstring = implode(' || ', $all_args);
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
			return pg_escape_string($var);
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
	* @param String $seq The sequence name to fetch the last id from.
	*
	* @return False|Int If there is no sequence name passed in, this will return false. Otherwise it returns the last number from the sequence name passed in.
	*/
	function LastId($seq='')
	{
		if (!$seq) {
			return false;
		}
		$query = "SELECT currval('".$seq."') AS lastid";
		$nextid = $this->FetchOne($query);
		return $nextid;
	}

	/**
	* CheckSequence
	*
	* Checks to make sure a sequence doesn't have multiple entries.
	*
	* @return True Postgresql doesn't have an issue with being able to have multiple id's in a sequence.
	*/
	function CheckSequence()
	{
		return true;
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

		$query = "SELECT setval('" . $seq . "', " . $newid . ", true)";
		$result = $this->Db->Query($query);
		if (!$result) {
			return false;
		}
		return $this->CheckSequence;
	}

	/**
	* OptimizeTable
	*
	* Runs "analyze" over the tablename passed in. This is useful to keep the database reasonably speedy.
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
		$query = "ANALYZE " . $tablename;
		return $this->Query($query);
	}

	/**
	* NumAffected
	*
	* Returns The number of rows affected by the query. If no tuple is affected, it will return 0.
	*
	* @param $result The result of a pg_ operation
	*
	* @return int
	*/
	function NumAffected($result=null)
	{
		return pg_affected_rows($result);
	}

	/**
	* DeleteQuery
	* Formats a delete query based on the table name passed in and the query which could include a where clause and/or an order by etc.
	* If a query is not passed in, then this returns false as a safe-guard against accidentally deleting all of your table records.
	* If a limit is specified, postgresql doesn't support a delete with a limit so turn it into a subselect instead.
	*
	* @param String $table The table you want to delete from.
	* @param String $query The query to restrict which entries to delete. If this is not supplied, the function returns false.
	* @param Int $limit The number of entries you want to delete. This is usually left off altogether.
	*
	* @see Query
	*
	* @return Mixed Returns false if no query is passed in, or if an invalid limit is supplied. Otherwise returns the result from Query
	*/
	function DeleteQuery($table='', $query=null, $limit=null)
	{
		if ($query === null) {
			return false;
		}

		if ($limit === null) {
			return $this->Query('DELETE FROM [|PREFIX|]' . $table . ' ' . $query);
		}

		$limit = intval($limit);

		if ($limit < 0) {
			return false;
		}

		$query = 'DELETE FROM [|PREFIX|]' . $table . ' WHERE EXISTS (SELECT * FROM [|PREFIX|]' . $table . ' ' . $query . ' LIMIT ' . $limit . ')';
		return $this->Query($query);
	}

}
?>