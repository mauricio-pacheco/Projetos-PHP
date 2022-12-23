<?php

$parentDir	= realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "..") . DIRECTORY_SEPARATOR;
$includeDir	= realpath($parentDir . DIRECTORY_SEPARATOR . "includes") . DIRECTORY_SEPARATOR;

/**
 * Directories
 */
define("___MODULE_QB_CLASSES___" , realpath($includeDir . "classes" ) . DIRECTORY_SEPARATOR);
define("___MODULE_QB_HANDLERS___", realpath($includeDir . "handlers") . DIRECTORY_SEPARATOR);
define("___MODULE_QB_SERVICES___", realpath($includeDir . "services") . DIRECTORY_SEPARATOR);
define("___MODULE_QB_ENTITIES___", realpath($includeDir . "entities") . DIRECTORY_SEPARATOR);
define("___MODULE_QB_SPOOL___"   , realpath($includeDir . "spool"   ) . DIRECTORY_SEPARATOR);

/**
 * Files
 */
define("___MODULE_QB_HANDLER_CLASS___", realpath(ISC_BASE_PATH . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "servicehandler" . DIRECTORY_SEPARATOR . "handler.php"));
define("___MODULE_QB_SERVICE_CLASS___", realpath(ISC_BASE_PATH . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "servicehandler" . DIRECTORY_SEPARATOR . "service.php"));
define("___MODULE_QB_WSDL___"         , realpath($parentDir . "templates" . DIRECTORY_SEPARATOR . "module.quickbooks.wsdl.html"));

unset($parentDir);
unset($includeDir);

?>
