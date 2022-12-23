<?php
/**
 * Disk Based Data Storage Module for Interspire Shopping Cart
 */
class ISC_DATA_STORE_DISK
{

	/**
	 * @var string The base directory we'll be saving everything to.
	 */
	private $baseDir = '';

	/**
	 * Connect to the data storage engine.
	 *
	 * @return boolean True if a successful connection, false on failure.
	 */
	public function Connect()
	{
		$this->baseDir = ISC_BASE_PATH.'/cache/datastore';
		return true;
	}

	/**
	 * Read an item from the data store by the specified name.
	 *
	 * @param string The name of the item to read.
	 * @return mixed The data if successfully read, false if not.
	 */
	public function Read($name)
	{
		if(!file_exists($this->baseDir.'/'.$name.'.php')) {
			return false;
		}

		@include($this->baseDir.'/'.$name.'.php');

		if(isset($cacheData)) {
			return $cacheData;
		}

		return false;
	}

	/**
	 * Save an item to the data store.
	 *
	 * @param string The name of the item to save.
	 * @param mixed The data to be saved in the data store.
	 * @return boolean True if the data was saved successfully, false if not.
	 */
	public function Save($name, $data)
	{
		$contents = "<"."?php\n\n/** Interspire Shopping Cart Data Store File **\n  *\n";
		$contents .= "  * Generated: ".isc_date('r')."\n  *\n  * DO NOT EDIT THIS FILE MANUALLY\n  *\n*/\n\n";
		$contents .= "\$cacheData = ".var_export($data, true).";\n\n?".">";

		if(file_put_contents($this->baseDir.'/'.$name.'.php', $contents)) {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Delete an item from the data store.
	 *
	 * @param string The name of the item to delete.
	 * @return boolean True if successful, false if there was a problem.
	 */
	public function Delete($name)
	{
		return @unlink($this->baseDir.'/'.$name.'.php');
	}

	/**
	 * Disconnect from the data store.
	 */
	public function Disconnect()
	{
		return true;
	}

	/**
	 * Clear the content from the data store. Empties the entire data store cache.
	 *
	 * @return boolean True if successful, false if there was an error.
	 */
	public function Clear()
	{
		$files = scandir($this->baseDir);
		foreach($files as $file) {
			if(!preg_match("#\.php\$#i", $file)) {
				continue;
			}
			$cacheName = preg_replace("#\.php\$#i", "", $file);
			if(!$this->Delete($cacheName)) {
				return false;
			}
		}
		return true;
	}
}