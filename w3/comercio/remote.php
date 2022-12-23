<?php
	define('ISC_AJAX', 1);
	include(dirname(__FILE__)."/init.php");
	$GLOBALS['ISC_CLASS_REMOTE'] = GetClass('ISC_REMOTE');
	$GLOBALS['ISC_CLASS_REMOTE']->HandleToDo();
?>
