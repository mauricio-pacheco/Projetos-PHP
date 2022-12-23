<?php

	/**

		----------------------------------------------------------------------------------------

		If you are seeing this message in your web browser, it means PHP has not been setup
		or enabled on your web server. Enable PHP from your web hosting control panel or contact
		your web host to enable it for you.

		----------------------------------------------------------------------------------------

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

	include(dirname(__FILE__)."/init.php");

	// Visitor tracking Javascript
	if(isset($_REQUEST['action'])) {
		if($_REQUEST['action'] == "tracking_script") {
			$visitor = GetClass('ISC_VISITOR');
			$visitor->OutputTrackingJavascript();
		}
		else if($_REQUEST['action'] == "track_visitor") {
			$visitor = GetClass('ISC_VISITOR');
			$visitor->TrackVisitor();
		}
	}

	/**
	 * Index.php does something special - it passes off all requests
	 * to a worker function which decide on the page that should be
	 * shown.
	 */
	RewriteIncomingRequest();
?>
