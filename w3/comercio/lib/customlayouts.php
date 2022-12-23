<?php
//	This file handles everything to do with choosing a custom layout file when adding/editing
//	products, categories, etc from the control panel

/**
 * Get a list of all custom layout files (they are prefixed with an underscore) and return them as <option> tags
 *
 * @param string The default layout file
 * @param string The layout file to select (defaults to first parameter if none)
 * @return string The list of layout files.
 */
function GetCustomLayoutFilesAsOptions($defaultLayoutFile, $selectedLayoutFile="")
{
	$options = sprintf("<option value='%s'>%s</option>", $defaultLayoutFile, $defaultLayoutFile);
	$tplPath = dirname(__FILE__) . "/../templates/" . GetConfig("template");

	$files = scandir($tplPath);
	foreach($files as $file) {
			if(substr($file, 0, 1) != "_") {
				continue;
			}
			$sel = '';
			if($selectedLayoutFile == $file) {
				$sel = 'selected="selected"';
			}
			$options .= sprintf("<option %s value='%s'>%s</option>\n", $sel, $file, $file);
	}

	return $options;
}
