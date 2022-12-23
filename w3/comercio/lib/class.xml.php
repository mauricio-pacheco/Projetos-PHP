<?php

class xml
{

	var $charset;

	function xml($charset=null)
	{
		if($charset === null) {
			if(GetConfig('CharacterSet') != '') {
				$this->charset = GetConfig('CharacterSet');
			}else {
				$this->charset = 'utf-8';
			}
		}else {
			$this->charset = $charset;
		}
	}

	function MakeXMLWrapTag($tagname,$text)
	{
		$tag = "<".$tagname. ">";
		$tag .= $text;
		$tag .= "</".$tagname.">";
		return $tag;
	}

	function MakeXMLTag($tagname,$text,$cdata=false,$attributes='')
	{
		$tag = "<".$tagname;

		// check for any attributes
		if(is_array($attributes)) {
			foreach ($attributes as $name=>$value) {
				$tag .= " ".$name."=\"".addslashes($value)."\"";
			}
		}

		// we can set the text to be false if we want a single tag
		if($text !== false) {

			$tag .= ">";

			// we get javascript on the other end if there is no text/data
			if(isc_strlen(trim($text)) == 0) {
				$tag .= "false";
			}
			elseif($cdata == true) {
				$tag .= "<![CDATA[".$text."]]>";
			}
			else {
				$tag .= $text;
			}
			$tag .= "</".$tagname.">";

		}else {
			$tag .= " />";
		}
		return $tag;
	}

	function XMLDeclaration($charset=null)
	{
		if($charset == null || empty($charset)) {
			$charset = 'utf-8';
		}
		return '<?xml version="1.0" encoding="' .$charset . '"?>';
	}

	function SendXMLResponse($tags,$echo=true)
	{

		// needs to be an array
		if(!is_array($tags)) {
			$tags = array($tags);
		}

		// load and format
		$XMLTags = '';
		foreach ($tags as $key=>$value) {
			$XMLTags.= $value;
		}

		$charset = $this->charset;
		$response = '<?xml version="1.0" encoding="'.$charset .'"?>'.'<response>'.$XMLTags.'</response>';

		if($echo == true) {
			echo trim($response);
		}
		else {
			return trim($response);
		}

	}

	function FormatXML($xml)
	{
		$xml = (string)$xml;
		$newxml = '';

		$len = isc_strlen($xml);
		$tags = array();
		$InCData = false;
		$alphabet = array_merge(range('a','z'), range('A','Z'), range('0', '9'), range(0, 9));
		$numbers = range('0', '9');

		for($char=0;$char < $len; ++$char) {

			if($xml[$char] == "<" && $InCData !== true && $xml[$char+1] != "?") {
				// starting some sort of tag!
				// is it a closing tag?!
				if($xml[$char+1] == "/") {
					// its a closing tag! for what tho?
					$num = 2;
					$tagName = '';
					while(in_array($xml[$char+$num], $alphabet, true) || (in_array((int)$xml[$char+$num], $numbers, true) && is_numeric($xml[$char+$num]))) {
						$tagName .= $xml[$char+$num];
						++$num;
					}

					// continue until the end of the tag
					while($xml[$char+$num] != '>') {
						++$num;
					}

					if($lastaction == "closed") {
						$newxml = $newxml . "\n". str_repeat("\t",max(sizeof($tags)-1,0)).isc_substr($xml, $char, $num+1);
					}else {
						$newxml = $newxml . isc_substr($xml, $char, $num+1);
					}


					$char = $char + $num;

					if(in_array($tagName, $tags)) {
						// we need to kill the tag, but only the most recent one
						$size = sizeof($tags);
						if($size > 0) {
							foreach($tags as $key=>$tmpTag) {
								if($tmpTag == $tagName) {
									$lastKey = $key;
								}
							}
							// $lastKey holds the tag we want to kill
							$tmpArray = array();
							foreach($tags as $key=>$tmpTag) {
								if($key != $lastKey) {
									$tmpArray[] = $tmpTag;
								}
							}
							$tags = $tmpArray;
						}
					}

				$lastaction = "closed";

				} elseif($xml[$char].$xml[$char+1].$xml[$char+2].$xml[$char+3].$xml[$char+4].$xml[$char+5].$xml[$char+6].$xml[$char+7].$xml[$char+8] == "<![CDATA[") {
					// its a cdata!
					$InCData = true; // don't need to do anything else
					$newxml = $newxml . $xml[$char];
					$lastaction = '';
				} else {
					// must be an opening tag...
					$num = 1;
					$tagName = '';
					while(in_array($xml[$char+$num], $alphabet, true) || (in_array((int)$xml[$char+$num], $numbers, true) && is_numeric($xml[$char+$num]))) {
						$tagName .= $xml[$char+$num];
						++$num;
					}
					$owntag = false;

					// continue until the end of the tag, make sure its not a single one
					while($xml[$char+$num] != '>') {
						if($xml[$char+$num].$xml[$char+$num+1] == "/>") {
							// self contained tag! don't add it
							$owntag = true;
							break;
						}
						++$num;
					}

					if(!$owntag) {

						$newxml = $newxml."\n".str_repeat("\t",sizeof($tags)). isc_substr($xml, $char, $num+1);

						$tags[] = $tagName;

						$char = $char + $num;
					}else {
						$newxml = $newxml."\n".str_repeat("\t",sizeof($tags)). isc_substr($xml, $char, $num+2) ;
						$char = $char + $num + 1;
					}
					$lastaction = 'opened';

				}

			}elseif($InCData === true && $xml[$char-2].$xml[$char-1].$xml[$char] == "]]>") {
				$newxml = $newxml . '>';
				$InCData = false;
			}else {
				$newxml = $newxml . $xml[$char];
			}

		}
		return $newxml;
	}

	function SendXMLHeader()
	{
		header('Content-Type: text/xml; charset='. $this->charset);
	}
}
?>