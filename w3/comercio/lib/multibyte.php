<?php
// This file handles all of the multi-byte compatible string functionality.
//
// Each of these functions replaces a standard PHP version of the function with
// the multibyte equivilent.

/**
 * Set the internal encoding to be used by multi-byte string functions.
 *
 * @param string The name of the encoding to use (ISO-8859-1, UTF-8, etc.)
 */
function STSSetEncoding($encoding)
{
	if($encoding && function_exists("mb_internal_encoding")) {
		return mb_internal_encoding($encoding);
	}
}

/**
 * Get the length of a string.
 *
 * @param string The string to fetch the length of.
 * @return int The length of the string with multi-byte characters taken in to account.
 */
function isc_strlen($string)
{
	if(function_exists("mb_strlen")) {
		return mb_strlen($string);
	}
	else {
		return strlen($string);
	}
}

/**
 * Find the position of the first occurance of a string in another string.
 *
 * @param string The string to search within.
 * @param string The string we're trying to find.
 * @param int The search offset.
 * @return The numeric position of the first occorance of needle in haystack.
 */
function isc_strpos($haystack, $needle, $offset=0)
{
	if(function_exists("mb_strpos")) {
		return mb_strpos($haystack, $needle, $offset);
	}
	else {
		return strpos($haystack, $needle, $offset);
	}
}

/**
 * Find the position of the last occurance of a string in another string.
 *
 * @param string The string to search within.
 * @param string The string we're trying to find.
 * @param int The search offset.
 * @return The numeric position of the first occorance of needle in haystack.
 */
function isc_strrpos($haystack, $needle)
{
	if(function_exists("mb_strpos")) {
		return mb_strrpos($haystack, $needle);
	}
	else {
		return strrpos($haystack, $needle);
	}
}


/**
 * Find the position of the first occurance of a string in another string, case insensitive.
 *
 * @param string The string to search within.
 * @param string The string we're trying to find.
 * @param int The search offset.
 * @return The numeric position of the first occorance of needle in haystack.
 */
function isc_stripos($haystack, $needle, $offset=0)
{
	if(function_exists("mb_stripos")) {
		return mb_stripos($haystack, $needle, $offset);
	}
	else {
		return stripos($haystack, $needle, $offset);
	}
}

/**
 * Make a string lowercase.
 *
 * @param string The string to convert to lowercase.
 * @return string The converted string.
 */
function isc_strtolower($str)
{
	if(function_exists("mb_strtolower")) {
		return mb_strtolower($str);
	}
	else {
		return strtolower($str);
	}
}

/**
 * Make a string uppercase.
 *
 * @param string The string to convert to uppercase.
 * @return string The converted string.
 */
function isc_strtoupper($str)
{
	if(function_exists("mb_strtoupper")) {
		return mb_strtoupper($str);
	}
	else {
		return strtoupper($str);
	}
}

/**
 * Count the number of substring occurances within a string.
 *
 * @param string The string to search in.
 * @param string The string we're trying to find.
 * @return int The number of occurances of needle in hackstack.
 */
function isc_substr_count($haystack, $needle)
{
	if(function_exists("mb_substr_count")) {
		return mb_substr_count($haystack, $needle);
	}
	else {
		return substr_count($haystack, $needle);
	}
}

/**
 * Return part of a string.
 *
 * @param string The string to return part of.
 * @param int Where to start in the string.
 * @param int The length of the string after the start to return.
 * @return string Part of str with the speicified bounds.
 */
function isc_substr($str, $start, $length=0)
{
	if(function_exists("mb_substr")) {
		if($length == 0) {
			return mb_substr($str, $start);
		}
		else {
			return mb_substr($str, $start, $length);
		}
	}
	else {
		if($length == 0) {
			return substr($str, $start);
		}
		else {
			return substr($str, $start, $length);
		}
	}
}

/**
 * Convert a string between 2 character sets.
 *
 * @param string Character set to convert from.
 * @param string Character set to convert to.
 * @param string String to convert.
 * @return string The converted string.
 */
function isc_convert_charset($in, $out, $str)
{
	if ($in === $out) {
		return $str;
	} elseif (function_exists('mb_convert_encoding')) {
		return mb_convert_encoding($str, $out, $in);
	} else {
		return $str;
	}
}

?>