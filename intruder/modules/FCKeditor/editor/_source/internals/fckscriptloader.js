/*
 * FCKeditor - The text editor for internet
 * Copyright (C) 2003-2004 Frederico Caldeira Knabben
 * 
 * Licensed under the terms of the GNU Lesser General Public License:
 * 		http://www.opensource.org/licenses/lgpl-license.php
 * 
 * For further information visit:
 * 		http://www.fckeditor.net/
 * 
 * File Name: fckscriptloader.js
 * 	Defines the FCKScriptLoader object that is used to dynamically load
 * 	scripts in the editor.
 * 
 * Version:  2.0 RC1
 * Modified: 2004-05-31 23:07:50
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

// This object is used to download scripts and css files sequentialy.
// A file download is not started until the previous file was not completelly
// downloaded.
var FCKScriptLoader = new Object() ;
FCKScriptLoader.IsLoading = false ;
FCKScriptLoader.Queue = new Array() ;

// Adds a script or css to the queue.
FCKScriptLoader.AddScript = function( scriptPath )
{
	FCKScriptLoader.Queue[ FCKScriptLoader.Queue.length ] = scriptPath ;
	
	if ( !this.IsLoading )
		this.CheckQueue() ;
}

// Checks the queue to see if there is something to load.
// This function should not be called by code. It's a internal function
// that's called recursively.
FCKScriptLoader.CheckQueue = function() 
{
	// Check if the queue is not empty.
	if ( this.Queue.length > 0 )
	{
		this.IsLoading = true ;
		
		// Get the first item in the queue
		var sScriptPath = this.Queue[0] ;
		
		// Removes the first item from the queue
		var oTempArray = new Array() ;
		for ( i = 1 ; i < this.Queue.length ; i++ )
			oTempArray[ i - 1 ] = this.Queue[ i ] ;
		this.Queue = oTempArray ;
		
//		window.status = ( 'Loading ' + sScriptPath + '...' ) ;

		// Dynamically load the file (it can be a CSS or a JS)
		var e ;
		
		// If is a CSS
		if ( sScriptPath.lastIndexOf( '.css' ) > 0 )
		{
			e = document.createElement( 'LINK' ) ;
			e.rel	= 'stylesheet' ;
			e.type	= 'text/css' ;
		}
		// It is a JS
		else
		{
			e = document.createElement( "script" ) ;
			e.type	= "text/javascript" ;
		}
		
		// Add the new object to the HEAD.
		document.getElementsByTagName("head")[0].appendChild( e ) ; 

		var oEvent = function()
		{
			// Gecko doesn't have a "readyState" property
			if ( this.tagName == 'LINK' || !this.readyState || this.readyState == 'loaded' )
				// Load the next script available in the queue
				FCKScriptLoader.CheckQueue() ;
		}
		
		// Start downloading it.
		if ( e.tagName == 'LINK' )
		{
			// IE must wait for the file to be downloaded.
			if ( FCKBrowserInfo.IsIE )
				e.onload = oEvent ;
			// Gecko doens't fire any event when the CSS is loaded, so we 
			// can't wait for it.
			else
				FCKScriptLoader.CheckQueue() ;
				
			e.href = sScriptPath ;
		}
		else
		{
			// Gecko fires the "onload" event and IE fires "onreadystatechange"
			e.onload = e.onreadystatechange = oEvent ;
			e.src = sScriptPath ;
		}
	}
	else
	{
		this.IsLoading = false ;
		
		// Call the "OnEmpty" event.
		if ( this.OnEmpty ) 
			this.OnEmpty() ;
	}
}