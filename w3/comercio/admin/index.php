<?php

	/*
		----------------------------------------------------------------------------------------

		If you are seeing this message in your web browser, it means PHP has not been setup
		or enabled on your web server. Enable PHP from your web hosting control panel or contact
		your web host to enable it for you.

		----------------------------------------------------------------------------------------
		<!--
	/*

	/**
	* Interspire Shopping Cart Copyright (c) 2008 Interspire Pty. Ltd.
	* http://www.interspire.com/shoppingcart
	*
	* All code is open source and can freely be modified to customize the product,
	* however licensing functions cannot be removed or altered in any way. All
	* "Powered by" links, images and references to Interspire cannot be modified in any way.
	*
	* This is a commercial product and you must own a license to use it.
	* If you would like to learn more about customizing Interspire Shopping
	* Cart please click the "Help" link in the control panel and read the developer's guide.
	*
	* Credits:
	*
	* Product Features/Concept/Manager/Testing/Lead/Usability: Mitchell Harper
	* Product Features/Testing/Usability: Eddie Machaalani
	* Product Development/Database Optimization: Rodney Amato
	* Product Development/Templates/JQuery: Chris Boulton
	* Database Optimization: Chris Smith
	*
	* Development Timeframe:
	*
	* Concept: July 2005
	* Development: July 2005 - December 2005, July 2007 - Current
	*
	*/



	require_once(dirname(__FILE__).'/init.php');

	/**
	* Get a session variable or null if the variable doesn't exist
	* it doesn't return false in case you want to store a boolean true/false
	* in the session
	*
	* @param string $var The var to get the value of
	*
	* @return mixed null if it doesn't exist in the session, otherwise it's value
	*/
	function GetSession($var)
	{
		if (isset($_SESSION[md5($GLOBALS['ShopPath'])][$var])) {
			return $_SESSION[md5($GLOBALS['ShopPath'])][$var];
		} else {
			return null;
		}
	}

	/**
	* Set a value in a session. Avoid objects where possible
	*
	* @param string $var the name of the variable
	* @param mixed $val the value to store
	*
	* @return void
	*/
	function SetSession($var, $val)
	{
		$_SESSION[md5($GLOBALS['ShopPath'])][$var] = $val;
	}

	/**
	* Unset a value from a session
	*
	* @param string $var the name of the unset
	*
	* @return void
	*/
	function UnsetSession($var)
	{
		unset($_SESSION[md5($GLOBALS['ShopPath'])][$var]);
	}

	// Internal ping system to maintain session login for long viewed pages (editing etc.)
	if (isset($_GET['ping'])) {
		die("pong");
	}

	// The main page handling class
	$GLOBALS['ISC_CLASS_ADMIN_ENGINE'] = new ISC_ADMIN_ENGINE();
	$GLOBALS['ISC_CLASS_ADMIN_ENGINE']->HandlePage();

?>