<?php
/**
* AKB_PANEL Class
*
* Defines the common functions for panel classes to extend upon
*
* @name 		PANEL
* @package     Interspire Shopping Cart
* @author	Jordie Bodlay <jordie@interspire.com>
* @link        http://www.interspire.com/activekb/
*
*/
class PANEL
{
	/**
	 * Stores the html filename
	 */
	var $_htmlFile;

	/**
	* Stores the template filename in which this panel exists.
	* This is used in the UI API as required
	* @author	Mitchell Harper <mitch@interspire.com>
	* @version 	1.10
	*
	*/
	var $_tplFile;

	/**
	* ParsePanel() Function
	*
	* Loads the HTML file and parses all the constants and globals
	*
	* @name		ParsePanel()
	* @author	Jordie Bodlay <jordie@interspire.com>
	* @author	Chris Smith <chris@interspire.com>
	* @author	Mitchell Harper <mitch@interspire.com>
	* @version 	1.00
	*
	*/
	function ParsePanel($TplFile="")
	{
		$htmlPanelData = '';
		$parsedPanelData = '';

		$this->_tplFile = $TplFile;

		// check for file and load the contents
		if (file_exists($this->_htmlFile)) {
			if ($fp = @fopen($this->_htmlFile, 'rb')) {
				while (!feof($fp)) {
					$htmlPanelData .= fgets($fp, 4096);
				}
				@fclose($fp);
			}
		}

		// set the global settings/variables for all panels
		$this->SetGlobalPanelSettings();

		// sets the local panel settings, defined within the extendee
		if (method_exists($this, 'SetPanelSettings')) {
			$this->SetPanelSettings();
		}

		// some panels require the option to return blank
		if (isset($this->DontDisplay) && $this->DontDisplay == true) {
			$parsedPanelData = '';
		} else {
			// parse panel as normal
			$parsedPanelData = $htmlPanelData;
		}

		return $parsedPanelData;
	}

	/**
	* SetHTMLFile() Function
	*
	* Sets the Class-wide html filename variable. Only used within the extended panel class.
	*
	* @name		SetHTMLFile()
	* @author	Jordie Bodlay <jordie@interspire.com>
	* @version 	1.00
	* @param 	string $HTMLFile
	*
	*/
	function SetHTMLFile($HTMLFile)
	{
		$this->_htmlFile = $HTMLFile;
	}

	/**
	* SetGlobalPanelSettings() Function
	*
	* Sets variables and settings that can then be accessed from any panel.
	*
	* @name		SetGlobalPanelSettings()
	* @author	Jordie Bodlay <jordie@interspire.com>
	* @version 	1.00
	*
	*/
	function SetGlobalPanelSettings()
	{
		// make the site's URL global. e.g. use for image path's
	}

}


?>