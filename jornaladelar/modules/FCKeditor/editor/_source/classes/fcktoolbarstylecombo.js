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
 * File Name: fcktoolbarstylecombo.js
 * 	FCKToolbarPanelButton Class: Handles the Fonts combo selector.
 * 
 * Version:  2.0 RC1
 * Modified: 2004-11-19 07:50:11
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

var FCKToolbarStyleCombo = function()
{
	this.Command = FCKCommands.GetCommand( 'Style' ) ;
}

// Inherit from FCKToolbarSpecialCombo.
FCKToolbarStyleCombo.prototype = new FCKToolbarSpecialCombo ;

FCKToolbarStyleCombo.prototype.GetLabel = function()
{
	return FCKLang.Style ;
}

FCKToolbarStyleCombo.prototype.CreateItems = function( targetSpecialCombo )
{
	// Add the Editor Area CSS to the Styles panel so the style classes are previewed correctly.
	FCKTools.AppendStyleSheet( targetSpecialCombo._Panel.Document, FCKConfig.EditorAreaCSS ) ;

	// For some reason Gecko is blocking inside the "RefreshVisibleItems" function.
	if ( ! FCKBrowserInfo.IsGecko )
		targetSpecialCombo.OnBeforeClick = this.RefreshVisibleItems ;

	// Add the styles to the special combo.
	for ( var s in this.Command.Styles )
	{
		var oStyle = this.Command.Styles[s] ;
		if ( oStyle.IsObjectElement )
			var oItem = targetSpecialCombo.AddItem( s, s ) ;
		else
			var oItem = targetSpecialCombo.AddItem( s, oStyle.GetOpenerTag() + s + oStyle.GetCloserTag() ) ;
		oItem.Style = oStyle ;
	}
}

FCKToolbarStyleCombo.prototype.RefreshActiveItems = function( targetSpecialCombo )
{
	// Clear the actual selection.
	targetSpecialCombo.DeselectAll() ;
	
	// Get the active styles.
	var aStyles = this.Command.GetActiveStyles() ;
	
	if ( aStyles.length > 0 )
	{
		// Select the active styles in the combo.
		for ( var i = 0 ; i < aStyles.length ; i++ )
			targetSpecialCombo.SelectItem( aStyles[i].Name ) ;

		// Set the combo label to the first style in the collection.
		targetSpecialCombo.SetLabelById( aStyles[0].Name ) ;
	}
	else
		targetSpecialCombo.SetLabel('') ;
}

FCKToolbarStyleCombo.prototype.RefreshVisibleItems = function( targetSpecialCombo )
{
	if ( FCKSelection.GetType() == 'Control' )
		var sTagName = FCKSelection.GetSelectedElement().tagName ;

	for ( var i in targetSpecialCombo.Items )
	{
		var oItem = targetSpecialCombo.Items[i] ;
		if ( ( sTagName && oItem.Style.Element == sTagName ) || ( ! sTagName && ! oItem.Style.IsObjectElement ) )
			oItem.style.display = '' ;
		else
			oItem.style.display = 'none' ;	// For some reason Gecko is blocking here.
	}
}