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
 * File Name: fcktablehandler_ie.js
 * 	Manage table operations (IE specific).
 * 
 * Version:  2.0 RC1
 * Modified: 2004-09-05 02:17:58
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

FCKTableHandler.GetSelectedCells = function()
{
	var aCells = new Array() ;

	var oRange = FCK.EditorDocument.selection.createRange() ;
	var oParent = oRange.parentElement() ;
	
	if ( oParent && oParent.tagName == "TD" )
		aCells[0] = oParent ;
	else
	{
		var oParent = FCKSelection.MoveToAncestorNode( "TABLE" ) ;
		
		if ( oParent )
		{
			// Loops throw all cells checking if the cell is, or part of it, is inside the selection
			// and then add it to the selected cells collection.
			for ( var i = 0 ; i < oParent.cells.length ; i++ )
			{
				var oCellRange = FCK.EditorDocument.selection.createRange() ;
				oCellRange.moveToElementText( oParent.cells[i] ) ;
				
				if ( oRange.inRange( oCellRange ) 
					|| ( oRange.compareEndPoints('StartToStart',oCellRange) >= 0 &&  oRange.compareEndPoints('StartToEnd',oCellRange) <= 0 )
					|| ( oRange.compareEndPoints('EndToStart',oCellRange) >= 0 &&  oRange.compareEndPoints('EndToEnd',oCellRange) <= 0 ) )
				{
					aCells[aCells.length] = oParent.cells[i] ;
				}
			}
		}
	}
	
	return aCells ;
}
