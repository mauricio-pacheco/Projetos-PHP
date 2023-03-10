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
 * File Name: fckstylecommand.js
 * 	FCKStyleCommand Class: represents the "Style" command.
 * 
 * Version:  2.0 RC1
 * Modified: 2004-11-22 11:07:24
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

var FCKStyleCommand = function()
{
	this.Name = 'Style' ;

	// Load the Styles defined in the XML file.
	this.StylesLoader = new FCKStylesLoader() ;
	this.StylesLoader.Load( FCKConfig.StylesXmlPath ) ;
	this.Styles = this.StylesLoader.Styles ;
}

FCKStyleCommand.prototype.Execute = function( styleName, styleComboItem )
{
	if ( styleComboItem.Selected )
		styleComboItem.Style.RemoveFromSelection() ;
	else
		styleComboItem.Style.ApplyToSelection() ;

	FCK.Focus() ;
	
	FCK.Events.FireEvent( "OnSelectionChange" ) ;
}

FCKStyleCommand.prototype.GetState = function()
{
	var oSelection = FCK.EditorDocument.selection ;
	
	if ( FCKSelection.GetType() == 'Control' )
	{
		var e = FCKSelection.GetSelectedElement() ;
			if ( e )
				return this.StylesLoader.StyleGroups[ e.tagName ] ? FCK_TRISTATE_OFF : FCK_TRISTATE_DISABLED ;
			else
				FCK_TRISTATE_OFF ;
	}
	else
		return FCK_TRISTATE_OFF ;
}

FCKStyleCommand.prototype.GetActiveStyles = function()
{
	var aActiveStyles = new Array() ;
	
	if ( FCKSelection.GetType() == 'Control' )
		this._CheckStyle( FCKSelection.GetSelectedElement(), aActiveStyles, false ) ;
	else
		this._CheckStyle( FCKSelection.GetParentElement(), aActiveStyles, true ) ;
		
	return aActiveStyles ;
}

FCKStyleCommand.prototype._CheckStyle = function( element, targetArray, checkParent )
{
	if ( ! element )
		return ;

	if ( element.nodeType == 1 )
	{
		var aStyleGroup = this.StylesLoader.StyleGroups[ element.tagName ] ;
		if ( aStyleGroup )
		{
			for ( var i = 0 ; i < aStyleGroup.length ; i++ )
			{
				if ( aStyleGroup[i].IsEqual( element ) )
					targetArray[ targetArray.length ] = aStyleGroup[i] ;
			}		
		}
	}
	
	if ( checkParent )
		this._CheckStyle( element.parentNode, targetArray, checkParent ) ;
}