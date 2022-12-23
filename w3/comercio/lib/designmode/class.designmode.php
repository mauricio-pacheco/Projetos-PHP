<?php

/**
* Design Mode Base Class
*
* @version     $Id: class.designmode.php,v 1.3 2007-11-13 07:05:07 jordie Exp $
* @author Jordie <jordie@interspire.com>
*
*/

class DesignMode
{

	var $FileName;
	var $ErrorMsg;
	var $PanelString;
	var $BasePath;
	var $FileContent;

	var	$DirList = array (
		'StyleSheet'=> "Styles",
		'Layout'	=> '',
		'Snippet'	=> "Panels/Snippets",
		'Panel'		=> "Panels"
	);

	function Set($name, $val)
	{
		if($name == "FileName") {
			$val = str_replace(array("..", "\x0"), "", $val);
		}
		$this->$name = $val;
	}

	function SetError($error)
	{
		$this->ErrorMsg = $error;
	}

	function GetError()
	{
		return $this->ErrorMsg;
	}

  /**
   * DesignMode::SaveFile()
   *
   * @return
   */
	function SaveFile()
	{
		if(stripos(basename($this->FileName), ".html") === false && stripos(basename($this->FileName), ".css") === false) {
			exit;
		}

		$FilePath = $this->BasePath . $this->FileName;

		if(!file_exists($FilePath)) {
			$this->SetError('File does not exist: ' . $FilePath);
			return false;
		}

		if(!is_writable($FilePath)) {
			$this->SetError('File is not writable: ' . $FilePath);
			return false;
		}

		if(isc_strlen(trim($this->FileContent)) < 1) {
			$this->SetError('No content was submitted.');
			return false;
		}

		if(!file_put_contents($FilePath, $this->FileContent)) {
			$this->SetError('Unable to write to file.');
			return false;
		}

		return true;
	}

	/**
	 * DesignMode::RevertFile()
	 *
	 * @return
	 */
	function RevertFile()
	{
		$FilePath = $this->BasePath . $this->FileName;
		$BackupPath = $this->BasePath."Backup/".$this->FileName;

		if(!file_exists($FilePath)) {
			$this->SetError('File does not exist: ' . $FilePath);
			return false;
		}

		if(!is_writable($FilePath)) {
			$this->SetError('File is not writable: ' . $FilePath);
			return false;
		}

		if(!file_exists($BackupPath)) {
			$this->SetError('This file does not have an original version.');
			return false;
		}

		// Copy the backup of the template
		if(!@copy($BackupPath, $FilePath)) {
			$this->SetError('Unable to revert file.');
			return false;
		}

		return true;
	}

  /**
   * DesignMode::EditFile()
   *
   * @return
   */
	function EditFile()
	{

		$style_files	= array();
		$layout_files	= array();
		$panel_files	= array();
		$snippet_files	= array();

		$GLOBALS["FileContent"] = htmlspecialchars($this->FileContent);
		$GLOBALS["FileName"]	= $this->FileName;
		$GLOBALS["StyleSheetFileList"]	= "";
		$GLOBALS["LayoutFileList"]		= "";
		$GLOBALS["PanelFileList"]		= "";
		$GLOBALS["SnippetFileList"]		= "";

		/* Make the list of panels and snippets that are inside the file we're currently editing */
		$GLOBALS['SnippetsList'] = $this->MakeFileList('snippets');
		$GLOBALS['PanelList']	 = $this->MakeFileList('panels');

		// If this isn't an Ajax request, we need to load the entire editor, which includes the list of files
		if(!array_key_exists('Ajax', $_REQUEST)) {
			// work out the filename without the directory
			$tmp = explode("/",$this->FileName);
			$pos = (sizeof($tmp)-1);
			$CompareName = $tmp[$pos];

			foreach($this->DirList as $FileType=>$FileDir) {
				$FileList = array();

				if (is_dir($this->BasePath.$FileDir)) {
					if ($dh = opendir($this->BasePath.$FileDir)) {
						while (($file = readdir($dh)) !== false) {
							if ($file != "CVS" && $file != ".svn" && isc_substr($file, 0, 1) != "." && isc_strpos($file, ".bak") === false && isc_strpos($file, ".php") === false && !is_dir($this->BasePath.$FileDir.$file)) {
								$FileList[] = $file;
							}
						}
						closedir($dh);
					}
				}

				sort($FileList);

				foreach ($FileList as $file) {
					if ($file == GetConfig('SiteColor').'.css' || $file == 'styles.css') {
						// this is a style file thats in use on the site, highlight it
						$class = "ActiveStylesheet";
					}else {
						$class = "";
					}

					// Generate a unique file ID (for example, Panel_Test)
					$FileExp = explode(".", $file, 2);
					$FileId = $FileType."_".$FileExp[0];

					$GLOBALS[$FileType."FileList"] .= sprintf("<li><a href=\"#\" onclick=\"DesignModeEditor.load_file('%s'); this.blur(); return false;\" class=\"%s %s\">%s</a></li>", $FileDir."/".$file, $FileId, $class, $file);
				}
			}
		}

		if (array_key_exists('SavedOK', $GLOBALS) && $GLOBALS['SavedOK'] === true) {
			$GLOBALS["SavedOKAlert"] = sprintf("DesignModeEditor.show_status('%s', 'success');", GetLang("DesignModeFileSaved"));
		}
		else if (array_key_exists('FileRevertedOK', $GLOBALS) && $GLOBALS['FileRevertedOK'] === true) {
			$GLOBALS["SavedOKAlert"] = sprintf("DesignModeEditor.show_status('%s', 'success');", "The file has successfully been reverted to its original version.");
		}
		elseif(array_key_exists('SavedOK', $GLOBALS) && $GLOBALS['SavedOK'] === false) {

			$GLOBALS["SavedOKAlert"] = sprintf("DesignModeEditor.show_status('%s', 'error');", GetLang("DesignModeFileSavedFail").' ' .$this->GetError());
		}

		$FileType = trim(dirname($this->FileName), "/");
		$FileExp = explode(".", $this->FileName, 2);
		$FileExp[0] = str_replace($FileType, '', $FileExp[0]);
		$FileType = array_search($FileType, $this->DirList);
		if(!$FileType) {
			$FileType = "Layout";
		}
		$FileType = str_replace("/", "_", $FileType);
		$FileId = $FileType."_".trim($FileExp[0], "/");

		$backupSupport = "false";
		if(file_exists($this->BasePath."Backup/".$this->FileName) && file_get_contents($this->BasePath."Backup/".$this->FileName) != $this->FileContent) {
			$backupSupport = "true";
		}
		$GLOBALS['LoadFileJS'] = sprintf("DesignModeEditor.load_file_contents('%s', '%s', '%s', '%s', %s);", $FileId, $this->FileName, $this->FormatJSString($this->FileContent), $this->FormatJSString($GLOBALS['SnippetsList'].$GLOBALS['PanelList']), $backupSupport)."\n";

		// If this is an Ajax request, we handle the response here. All responses are text/javascript
		if(array_key_exists('Ajax', $_REQUEST)) {
			header("Content-type: text/javascript");

			// Simply loading a file
			echo $GLOBALS['LoadFileJS'];

			// Just saved a file
			if(array_key_exists('SavedOK', $GLOBALS)) {
				header("Content-type: text/javascript");
				echo $GLOBALS["SavedOKAlert"];
			}

			// Just reverted
			if(array_key_exists('FileRevertedOK', $GLOBALS)) {
				header("Content-type: text/javascript");
				echo $GLOBALS["FileRevertedOK"];
			}
			exit;
		}

	}

	function MakeFileList($type)
	{

		$ListHTML = '';
		if ($type == 'snippets') {
			$SnippetDir = $this->BasePath . $this->DirList['Snippet'].'/';

			preg_match_all("/(?siU)(%%SNIPPET_[a-zA-Z0-9_]{1,}%%)/", $this->FileContent, $matches);

			$GLOBALS['SnippetsInFileCount'] = count($matches[0]);

			foreach ($matches[0] as $key => $val) {
				$pattern1 = $val;
				$pattern2 = str_replace("%", "", $pattern1);
				$pattern2 = str_replace("SNIPPET_", "", $pattern2);

				if (file_exists($SnippetDir . $pattern2 . '.html')) {
					$ListHTML .= "<li><a href=\"#\" onclick=\"DesignModeEditor.load_file('".$this->DirList['Snippet'].'/'.$pattern2.".html'); return false;\" class=\"Snippet_".$pattern2."\">".$pattern2.".html</a></li>\n";
				}
			}

			if ($ListHTML != '') {
				$ListHTML = "<div class=\"title\">".GetLang('SnippetsinTemplate')."</div>\n<ul>\n".$ListHTML."</ul>";
			}
		} elseif($type == 'panels') {
			$PanelDir = $this->BasePath . $this->DirList['Panel'].'/';

			preg_match_all("/(?siU)(%%Panel[\._][a-zA-Z0-9]{1,}%%)/", $this->FileContent, $matches);
			$GLOBALS['PanelsInFileCount'] = count($matches[0]);

			foreach ($matches[0] as $key => $k) {
				$pattern1 = $k;
				$pattern2 = str_replace("%", "", $pattern1);
				$pattern2 = str_replace("Panel_", "", $pattern2);
				$pattern2 = str_replace("Panel.", "", $pattern2);

				if (file_exists($PanelDir . $pattern2 . '.html')) {
					$ListHTML .= "<li><a href=\"#\" onclick=\"DesignModeEditor.load_file('".$this->DirList['Panel']."/".$pattern2.".html'); return false;\" class=\"Pattern_".$pattern2."\">".$pattern2.".html</a></li>\n";
				}
			}

			if ($ListHTML != '') {
				$ListHTML = "<div class=\"title\">".GetLang('PanelsinTemplate')."</div>\n<ul>\n".$ListHTML."</ul>";
			}
		}
		return $ListHTML;
	}

  /**
   * DesignMode::UpdateLayoutPanels()
   *
   * @return
   */
	function UpdateLayoutPanels()
	{

		$FileContent = "";
		$LayoutFile		= $this->FileName;
		$PanelString	= $this->PanelString;

		// we need to put the columns into an associative array
		$cols = explode("|", $PanelString);

		foreach ($cols as $key=>$val) {
			if($val == '') {
				unset($cols[$key]);
			}
		}

		foreach($cols as $key=>$val) {
			$PanelSplit = explode(":", $val);
			$Columns[$PanelSplit[0]] = explode(",",$PanelSplit[1]);
		}

		// Workout the path to the template
		$LayoutFilePath = $this->BasePath . $LayoutFile;
		$FileContent	= file_get_contents($LayoutFilePath);

		foreach($Columns as $PanelName=>$PanelList) {
			// we need to get the content between a div, but there might be sub-divs that we still want included...
			// we do this loop to get the whole bit of the correct div
			$inDivCount 	= 0;
			$position		= 0;
			$count			= 0;
			$LastReplace	= '';
			$LastPosition	= '';
			$found_gt = false; // gt  = greater than

			$divPos	= isc_strpos($FileContent, $PanelName);
			$size	= isc_strlen($FileContent);

			// start the loop through the html to get it all
			for($i = $divPos; $i < $size; ++$i) {
				if($found_gt == false) {
					if($FileContent[$i] == ">") {
						// we found the end of the starting div tag, now we can search for the correct </div>
						$found_gt = true;
						$start_pos = $i+1;
					}
				} else {
					// looping through the content
					if($FileContent[$i] == "<") {
						if($FileContent[$i+1].$FileContent[$i+2].$FileContent[$i+3].$FileContent[$i+4] == "/div") {
							// we've found a closing div!
							if($inDivCount == 0) {
								// we found the end! hooray!
								$end_pos = $i;
								break;
							} else {
								// we're in a sub-div, but it closed! =D
								--$inDivCount;
							}
						} elseif($FileContent[$i+1].$FileContent[$i+2].$FileContent[$i+3] == "div") {
							// found a sub-div, up the count =(
							++$inDivCount;
						}
					}
				}
			}
			// now we get the content!
			$origcontent = $content = isc_substr($FileContent, $start_pos, ($end_pos - $start_pos));

			// find the panel placeholders

			$regex_one = '%%GLOBAL_[a-zA-Z0-9]+_Position[0-9]+%%';
			$regex_two = '%%Panel[\._]([a-zA-Z0-9]{1,})%%';
			preg_match_all("/(?siU)(" . $regex_one . ")|(" . $regex_two . ")/", $content , $panel_matches);

			// loop through the matches and replace them with temporary position placeholders
			foreach ($panel_matches[0] as $key => $k) {
				$content = str_replace($panel_matches[0][$key], "%%GLOBAL_".$PanelName."_Position".$position.'%%', $content);
				++$position;
			}

			// loop through and replace the temporary position placeholders with the new panels
			foreach($PanelList as $key=>$NewPanel) {
				if($count == ($position-1)) {
					// reached the last one!
					$LastPosition = "%%GLOBAL_".$PanelName."_Position".$count.'%%';
					$LastReplace .= '%%Panel.'.$NewPanel."%%\r\n";
				} else {
					$content = str_replace("%%GLOBAL_".$PanelName."_Position".$count.'%%','%%Panel.'.$NewPanel.'%%', $content);
					++$count;
				}
			}

			if($LastPosition != '') {
				$content = str_replace($LastPosition,$LastReplace, $content);
			}
			$FileContent = str_replace($origcontent,$content, $FileContent);
		}

		// Fix up any stray tags we may still have
		$FileContent= preg_replace("#%%GLOBAL_[a-zA-Z0-9]+_Position[0-9]+%%#isu",'', $FileContent);

		// All done, now write the file back
		isc_chmod($LayoutFilePath, ISC_WRITEABLE_FILE_PERM);

		if (@file_put_contents($LayoutFilePath, $FileContent)) {
			return true;
		} else {
			$this->SetError($LayoutFilePath);
			return false;
		}
	}

	function FormatJSString($string)
	{
		$string = str_replace(array("\r\n", "\r", "\n"), "\\n", $string);
		$string = str_replace("'", "\\'", $string);
		$string = str_replace("</script>", "</scr' + 'ipt>", $string);
		return $string;
	}

}
?>