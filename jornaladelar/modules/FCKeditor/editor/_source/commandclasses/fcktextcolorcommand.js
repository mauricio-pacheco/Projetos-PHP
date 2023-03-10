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
 * File Name: fcktextcolorcommand.js
 * 	FCKTextColorCommand Class: represents the text color comand. It shows the
 * 	color selection panel.
 * 
 * Version:  2.0 RC1
 * Modified: 2004-11-19 08:16:00
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

// FCKTextColorCommand Contructor
//		type: can be 'ForeColor' or 'BackColor'.
var FCKTextColorCommand = function( type )
{
	this.Name = type == 'ForeColor' ? 'TextColor' : 'BGColor' ;
	this.Type = type ;

	/*	BEGIN ###
		The panel should be created in the "Execute" method for best
		memory use, but it not works in Gecko in that way.
	*/

	this._Panel = new FCKPanel() ;
	this._Panel.StyleSheet = FCKConfig.SkinPath + 'fck_contextmenu.css' ;
	this._Panel.Create() ;

	this._CreatePanelBody( this._Panel.Document, this._Panel.PanelDiv ) ;
	
	//	END ###
}

FCKTextColorCommand.prototype.Execute = function( panelX, panelY, relElement )
{
	/*
		BEGIN ###
		This is the right code to create the panel, but it is not
		working well with Gecko, so it has been moved to the 
		class contructor.
	
	// Create the Color Panel if needed.
	if ( ! this._Panel )
	{
		this._Panel = new FCKPanel() ;
		this._Panel.StyleSheet = FCKConfig.SkinPath + 'fck_contextmenu.css' ;
		this._Panel.Create() ;

		this._CreatePanelBody( this._Panel.Document, this._Panel.PanelDiv ) ;
	}
		END ###
	*/

	// We must "cache" the actual panel type to be used in the SetColor method.
	FCK._ActiveColorPanelType = this.Type ;

	// Show the Color Panel at the desired position.
	this._Panel.Show( panelX, panelY, relElement ) ;
}

FCKTextColorCommand.prototype.SetColor = function( color )
{
	if ( FCK._ActiveColorPanelType == 'ForeColor' )
		FCK.ExecuteNamedCommand( 'ForeColor', color ) ;
	else if ( FCKBrowserInfo.IsGecko )
		FCK.ExecuteNamedCommand( 'hilitecolor', color ) ;
	else
		FCK.ExecuteNamedCommand( 'BackColor', color ) ;
	
	// Delete the "cached" active panel type.
	delete FCK._ActiveColorPanelType ;
}

FCKTextColorCommand.prototype.GetState = function()
{
	return FCK_TRISTATE_OFF ;
}

FCKTextColorCommand.prototype._CreatePanelBody = function( targetDocument, targetDiv )
{
	function CreateSelectionDiv()
	{
		var oDiv = targetDocument.createElement( "DIV" ) ;
		oDiv.className = 'ColorDeselected' ;
		oDiv.onmouseover	= function() { this.className='ColorSelected' ; } ;
		oDiv.onmouseout		= function() { this.className='ColorDeselected' ; } ;
		
		return oDiv ;
	}

	// Create the Table that will hold all colors.
	var oTable = targetDiv.appendChild( targetDocument.createElement( "TABLE" ) ) ;
	oTable.style.tableLayout = 'fixed' ;
	oTable.cellPadding = 0 ;
	oTable.cellSpacing = 0 ;
	oTable.border = 0 ;
	oTable.width = 150 ;

	var oCell = oTable.insertRow(-1).insertCell(-1) ;
	oCell.colSpan = 8 ;

	// Create the Button for the "Automatic" color selection.
	var oDiv = oCell.appendChild( CreateSelectionDiv() ) ;
	oDiv.innerHTML = 
		'<table cellspacing="0" cellpadding="0" width="100%" border="0">\
			<tr>\
				<td><div class="ColorBoxBorder"><div class="ColorBox" style="background-color: #000000"></div></div></td>\
				<td nowrap width="100%" align="center" unselectable="on">' + FCKLang.ColorAutomatic + '</td>\
			</tr>\
		</table>' ;

	oDiv.Command = this ;
	oDiv.onclick = function()
	{
		this.className = 'ColorDeselected' ;
		this.Command.SetColor( '' ) ;
		this.Command._Panel.Hide() ;
	}

	// Create an array of colors based on the configuration file.
	var aColors = FCKConfig.FontColors.split(',') ;

	// Create the colors table based on the array.
	var iCounter = 0 ;
	while ( iCounter < aColors.length )
	{
		var oRow = oTable.insertRow(-1) ;
		
		for ( var i = 0 ; i < 8 && iCounter < aColors.length ; i++, iCounter++ )
		{
			var oDiv = oRow.insertCell(-1).appendChild( CreateSelectionDiv() ) ;
			oDiv.Color = aColors[iCounter] ;
			oDiv.innerHTML = '<div class="ColorBoxBorder"><div class="ColorBox" style="background-color: #' + aColors[iCounter] + '"></div></div>' ;

			oDiv.Command = this ;
			oDiv.onclick = function()
			{
				this.className = 'ColorDeselected' ;
				this.Command.SetColor( '#' + this.Color ) ;
				this.Command._Panel.Hide() ;
			}
		}
	}

	// Create the Row and the Cell for the "More Colors..." button.
	var oCell = oTable.insertRow(-1).insertCell(-1) ;
	oCell.colSpan = 8 ;

	var oDiv = oCell.appendChild( CreateSelectionDiv() ) ;
	oDiv.innerHTML = '<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td nowrap align="center">' + FCKLang.ColorMoreColors + '</td></tr></table>' ;

	oDiv.Command = this ;
	oDiv.onclick = function()
	{
		this.className = 'ColorDeselected' ;
		this.Command._Panel.Hide() ;
		FCKDialog.OpenDialog( 'FCKDialog_Color', FCKLang.DlgColorTitle, 'dialog/fck_colorselector.html', 400, 330, this.Command.SetColor ) ;
	}
}