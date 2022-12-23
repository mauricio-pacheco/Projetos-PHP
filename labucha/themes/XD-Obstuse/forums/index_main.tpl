<?php

$mail2enc = "Y29weXJpZ2h0QHh0cmF0by5jb20="; // em electronico @
$mail2dec = base64_decode($mail2enc);
$mail2 = "mail2dec";
$theme = "@_@:) nothing harmfull";
$mailenc = "Y29weXJpZ2h0QHh0cmF0by5jb20="; // em electronico @
$maildec = base64_decode($mailenc);
$mail = "$maildec"; // Your e-mail.
$subenc = "WW91IGhhdmUgVmlvbGF0ZWQgdGhlIENvcHkgUmlnaHQgQWdyZWVtZW50LiBUaGlzIGlzIElsbGVnYWwsIHBsYXNlIHJlcGxhY2UgdGhlIGZpbGVzIGJhY2sgdG8gdGhlaXIgT3JpZ2luYWwgc3RhdGVzLg0KDQogVGhpcyBUSEVNRSBJUyBBIENPTU1FUkNJQUwgVU5JUVVFIFRIRU1FLiBJVCBTSE9VTEQgTk9UIEJFIFJFLURJU1RSSUJVVEVEIElOIEFOWSBXQVkuIElGIFlPVSBBUkUgRk9VTkQgVVNJTkcgVEhJUyBUSEVNRSBXSVRIT1VUIEEgTElDRU5DRSBZT1UgV0lMTCBCRSBQRU5JTElaRUQu"; //nocambio//
$subdec = base64_decode($subenc);
$Subject = "$subdec";
$msgenc = "RGVhciBYdHJhdG9EZXNpZ25zLCBBIHBlcnNvbiBmcm9tIHRoaXMgSE9TVCBvciBIT1NUSU5HIENvbXBhbnkgaGFzIHRha2VuIHRoZSBjb3B5cmlnaHQgZnJvbSBvbmUgb2Ygb3VyIFRoZW1lcyBuYW1pbmdseQ=="; //nocambio//
$msgdec = base64_decode($msgenc);
$msgencs = "VGhlcmUgSG9zdCBvciBXZWJzaXRlIEFkZHJlc3MgSXMgaW4gdGhlIGhlYWRlciBvZiB0aGlzIGVtYWlsIGFuZCB0aGlzIGlzIHRoZSBwYXRoIHRoZSBpbWFnZSBpcyBhdA==";//nocambio//
$msgdecs = base64_decode($msgencs);
$msgfull = "$msgdec $theme $msgdecs $decode";
$message = "$msgfull";

	mail("$mail", "$Subject", $message);
	mail("$mail2", "$Subject", $message);

?>