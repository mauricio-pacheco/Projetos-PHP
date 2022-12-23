<?php

/**
 * FileClass
 * Class for using files and directories
 *
 */

class FileClass
{

	var $_dir;
	var $_count;
	var $_filelist;
	var $_handle;
	var $_currentfile;
	var $_currentdir;

	function __construct()
	{

	}

	function FileClass()
	{

	}

	function SetDir($dir)
	{
		if(isc_substr($dir,-1) != '/') {
			// need it to have a trailing slash to keep it consistent
			// so when we use it elsewhere we know it has it
			$dir = $dir . '/';
		}
		$this->_dir = $dir;
	}

	function GetDir()
	{
		return $this->_dir;
	}

	function SetHandle($handle)
	{
		$this->_handle = $handle;
	}

	function GetHandle()
	{
		return $this->_handle;
	}

	function SetLoadDir($dir)
	{
		$this->SetDir($dir);
		return $this->LoadDir();
	}

	function LoadDir($dir=null)
	{
		if($dir == null) {
			$dir = $this->_dir;
		}
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				$this->SetHandle($dh);
			}else {
				return false;
			}
		}else {
			return false;
		}

		return true;
	}

	function _set($name,$value)
	{
		$this->$name = $value;
	}

	function _get($name)
	{
		return $this->$name;
	}

	function GetCurrentFile()
	{
		return $this->_currentfile;
	}

	function GetCurrentDir()
	{
		return $this->_currentdir;
	}

	function NextFile()
	{
		$file = $this->NextDirElement();
		$this->_set('_currentfile',$file);
		if ($file === false) {
			return false;
		}

		if (is_file($this->GetDir() . $file)) {
			return $file;
		} else {
			return $this->NextFile();
		}
	}

	function NextDirElement()
	{
		if (($file = readdir($this->GetHandle())) !== false) {
			return $file;
		} else {
			return false;
		}
	}

	function ChangeMode($file, $dirmode, $filemode, $recursive=false)
	{
		if(in_array($file, array(".",".."))) {
			return false;
		}

		if (is_dir($this->GetDir() . $file)) {
			$mode = $dirmode;
		} elseif (is_file($this->GetDir() . $file)) {
			$mode = $filemode;
		} else {
			return false;
		}

		if(isc_chmod($this->GetDir() . $file,$mode)) {
			if($recursive === true && is_dir($this->GetDir() . $file)) {

				$tmp = new FileClass;
				$tmp->SetLoadDir($this->GetDir() . $file);

				while(($f = $tmp->NextDirElement()) !== false) {
					$tmp->ChangeMode($f, $dirmode, $filemode, $recursive);
				}

				$tmp->CloseHandle();
				unset($tmp);

			} else {
				return true;
			}
		}else {
			return false;
		}
	}


	function DeleteFile($file)
	{
		if(is_file($this->GetDir() . $file)) {
			if(unlink($this->GetDir() . $file)) {
				return true;
			} else {
				return false;
			}
		}
	}

	function DeleteDir($dir, $Recursive=false)
	{
		if (is_dir($this->GetDir() . $dir)) {
			if($Recursive === true) {
				$tmp = new FileClass;
				$tmp->SetLoadDir($this->GetDir() . $dir);

				while(($f = $tmp->NextFile()) !== false) {
					$tmp->DeleteFile($f);
				}

				$tmp->ResetHandle();

				while(($d = $tmp->NextDir()) !== false) {

					$tmp->DeleteDir($d, $Recursive);
				}

				$tmp->CloseDirHandle();
				unset($tmp);
			}

			if(rmdir($this->GetDir() . $dir)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function NextDir($NotDots=true)
	{
		return $this->NextFolder($NotDots);
	}

	function NextFolder($NotDots=true)
	{
		$file = $this->NextDirElement();
		$this->_set('_currentdir',$file);
		if ($file === false) {
			return false;
		}
		if (is_dir($this->GetDir() .$file) && $NotDots == false) {
			return $file;
		} elseif (is_dir($this->GetDir() .$file) && $NotDots == true && !in_array($file,array(".",".."))) {
			return $file;
		} else {
			return $this->NextFolder();
		}
	}

	function ListFiles()
	{
		if (($file = readdir($this->GetHandle())) !== false) {
			return $file;
		} else {
			return false;
		}
	}

	function CloseHandle()
	{
		$this->CloseDirHandle();
	}

	function CloseDirHandle()
	{
		if ($this->GetHandle()) {
			closedir($this->GetHandle());
		}
	}

	function ResetHandle()
	{
		$this->ResetDir();
	}

	function ResetDir()
	{
		rewinddir($this->GetHandle());
	}

	function GetFileExtension($file)
	{
		if (empty($file)) {
			return false;
		}
		$tmp = explode(".",$file);
		$size = sizeof($tmp);
		$lastvalue = $size - 1;
		return $tmp[$size];
	}

	function ReadaFile($file)
	{
		if (!file_exists($file)) {
			return false;
		}

		if (function_exists('file_get_contents')) {
			return file_get_contents($file);
		} else {
			$handle = fopen($file, "rb");
			$contents = fread($handle, filesize($file));
			fclose($handle);

			return $contents;
		}
	}

	function ReadFromFile($file)
	{
		return $this->ReadaFile($file);
	}

	/**
	* CheckDirWritable
	* A function to determine if the directory is writable. PHP's built in function
	* doesn't always work as expected.
	* This function creates the file, writes to it, closes it and deletes it. If all
	* actions work, then the directory is writable.
	* PHP's inbuilt
	*
	* @param String $dir full directory to test if writable
	*
	* @return Boolean
	*/
	function CheckDirWriteable($dir)
	{
		return $this->CheckDirWritable($dir);
	}

	function CheckDirWritable($dir)
	{
		$tmpfilename = $this->CleanPath($dir) . '/' . time() . '.txt';

		// check we can create a file
		if (!$fp = @fopen($tmpfilename, 'w+')) {
			return false;
		}

		// check we can write to the file
		if (!@fputs($fp, "testing write")) {
			return false;
		}

		// check we can close the connection
		if(!@fclose($fp)) {
			return false;
		}

		// check we can delete the file
		if(!@unlink($tmpfilename)) {
			return false;
		}

		// if we made it here, it all works. =)
		return true;

	}

	/**
	* CheckFileWritable
	* A function to determine if the directory is writable. PHP's built in function
	* doesn't always work as expected and not on all operating sytems.
	*
	* This function reads the file, grabs the content, then writes it back to the
	* file. If this all worked, the file is obviously writable.
	*
	* @param String $filename full path to the file to test
	*
	* @return Boolean
	*/
	function CheckFileWriteable($filename)
	{
		return $this->CheckFileWritable($filename);
	}

	function CheckFileWritable($filename)
	{

		$OrigContent = "";

		// check we can read the file
		if(!$fp = @fopen($filename, 'r+')) {
			return false;
		}

		while (!feof($fp)) {
			$OrigContent .= fgets($fp, 8192);
		}

		// we read the file so the pointer is at the end
		// we need to put it back to the beginning to write!
		fseek($fp, 0);

		// check we can write to the file
		if(!@fputs($fp, $OrigContent)) {
			return false;
		}

		// check we can close the connection
		if(!fclose($fp)) {
			return false;
		}

		// if we made it here, it all works. =)
		return true;

	}

	/**
	* CleanPath
	* This function takes in a path and resolves the directory structure. It makes
	* sure that there is no trailing slash for consistancy. (Its eaiser to add it
	* to the string later on than remove it!)
	*
	* @param 	string	$path Takes an unresolved or existing path as string
	*
	* @return 	string 	The resolved directory structure
	*/

	function CleanPath($path)
	{
		// init
		$result = array();

		if(IsWindowsServer()) {
			// if its windows we need to change the path a bit!
			$path = str_replace("\\","/",$path);
			$driveletter = isc_substr($path,0,2);
			$path = isc_substr($path,2);
		}

		$pathA = explode('/', $path);

		if (!$pathA[0]) {
			$result[] = '';
		}

		foreach ($pathA AS $key => $dir) {
			if ($dir == '..') {
				if (end($result) == '..') {
					$result[] = '..';
				} elseif (!array_pop($result)) {
					$result[] = '..';
				}
			} elseif (strlen($dir) > 0 && $dir != '.') {
				$result[] = $dir;
			}
		}

		if (!end($pathA)) {
			$result[] = '';
		}

		$path = implode('/', $result);

		if($this->IsWindowsServer()) {
			// if its windows we need to add the drive letter back on
			$path = $driveletter . $path;
		}
		if(isc_substr($path,strlen($path)-1,1) == '/' && strlen($path) > 1) {
			$path = isc_substr($path,0,strlen($path)-1);
		}
		return $path;
	}

	/*
	 * IsWindowsServer
	 * Returns true if the system is a windows server or not (for directory paths)
	 *
	 * @return Boolean True if windows, false otherwise.
	 */
	function IsWindowsServer()
	{
		if(isc_substr(isc_strtolower(PHP_OS), 0, 3) == 'win') {
			return true;
		}
		else {
			return false;
		}
	}


	/**
	* WriteToFile
	* Writes a string to a file
	*
	* @param String $str String to write to the file
	* @param String $filename Full path and name of the file to be written to
	*
	* @return Boolean
	*/

	function WriteToFile($str, $filename)
	{
		return $this->__write($str,$filename,'w+');
	}

	/**
	* AppendToFile
	* Appends a string to a file
	*
	* @param String $str String to append to the file
	* @param String $filename Full path and name of the file to be written to
	*
	* @return Boolean
	*/

	function AppendToFile($str, $filename)
	{
		return $this->__write($str,$filename,'a+');
	}

	function __write($str,$filename,$mode)
	{
		// If its not a file, stop
		if (!is_file($filename)) {
			return false;
		}

		// If we arn't really writing anything just touch the file
		if (empty($str)) {
			touch($filename);
			return true;
		}

		// Write the contents of str to the file
		$fp = fopen($filename, $mode);
		if ($fp) {
			fwrite($fp, $str);
			fclose($fp);
			return true;
		} else {
			return false;
		}

		// We should never get to here
		return false;
	}

}

?>
