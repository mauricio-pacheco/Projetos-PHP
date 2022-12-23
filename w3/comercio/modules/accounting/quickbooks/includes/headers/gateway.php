<?php

/**
 * Important to include the base include
 */
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "base.php");

/**
 * Now for the other includes
 */
require_once(___MODULE_QB_CLASSES___ . DIRECTORY_SEPARATOR . "class.server.php");
require_once(___MODULE_QB_CLASSES___ . DIRECTORY_SEPARATOR . "class.spool.php");

/**
 * Any other options that we might want to set here
 */
ini_set("soap.wsdl_cache_enabled", "0");

?>
