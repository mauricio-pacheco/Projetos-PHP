<?php
    $theme22 = 'dGhlbWVzL1hELVpvbmFyL2ZvcnVtcy9jb25maXJtX2JvZHkyLnRwbA=='; // CODE 749 CAMBIO + en todos
    $theme2 = base64_decode($theme22);
$included = $theme2;

if (file_exists($included)) {
} else {
$url = "PGNlbnRlcj5UaGUgQ29yZSBGaWxlIEZvciBUaGlzIFRoZW1lIElzIE1pc3NpbmcsIEFsbCBhY3Rpb25zIGFyZSByZXBvcnRlZCwgVGhlbWUgTG9ja2VkITwvY2VudGVyPg=="; //nocambio
$decode = base64_decode($url);
   die("$decode");
}
?>