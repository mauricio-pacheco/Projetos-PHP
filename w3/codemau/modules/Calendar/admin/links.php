<?php

/********************************************************/
/* Event Calendar for PHP-Nuke 7.0                      */
/*                                                      */
/* Based on Event Calendar 1.5 by Rob Sutton            */
/* Development & enhancments by Holbrookau and friends  */
/* http://phpnuke.holbrookau.net                        */
/********************************************************/

global $module_name;
if (($radminsuper==1) OR ($radminCalendarAdmin==1)) {
            adminmenu("modules.php?name=Calendar&file=submit", "Administração de Eventos", "calendar.gif");
}

?>