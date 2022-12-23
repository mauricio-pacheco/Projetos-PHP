<?php
// ------------------------------------------------------------------------- //
// Coppermine Photo Gallery 1.2.2a for CMS                                   //
// ------------------------------------------------------------------------- //
// Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
// http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
// Updated by the Coppermine Dev Team                                        //
// (http://coppermine.sf.net/team/)                                          //
// see /docs/credits.html for details                                        //
// ------------------------------------------------------------------------- //
// New Port by GoldenTroll                                                  //
// http://coppermine.findhere.org/                                          //
// Based on coppermine 1.1d by Surf  http://www.surf4all.net/               //
// ------------------------------------------------------------------------- //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
define('SEARCH_PHP', true);
require("modules/" . $name . "/include/load.inc.php");

pageheader($lang_search_php[0]);

starttable(500, $lang_search_php[0]);
echo <<< EOT
    <tr>
        <form method="get" action="">
        <input type="hidden" name="name" value="{$name}">
        <input type="hidden" name="file" value="thumbnails">
        <input type="hidden" name="album" value="search">
        <input type="hidden" name="type" value="full">
        <td class="tableb" align="center" height="60">
                <input type="input" style="width: 90%" name="search" maxlength="255" value="" class="textinput">
        </td>
    </tr>
    <tr>
        <td colspan="8" align="center" class="tablef">
            <input type="submit" value="{$lang_search_php[0]}" class="button">
        </td>
        </form>
    </tr>

EOT;
endtable();
pagefooter();
include("footer.php");
?>
