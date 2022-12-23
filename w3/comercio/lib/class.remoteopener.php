<?php

	/*
		Class to determine which remote file opening method to use -
		either fopen or CURL, depending on what is available.
	*/

	class connect_remote
	{
		var $_method = 'OPENER_NONE';

		// Constructor PHP 4
		function connect_remote()
		{
			$this->__construct();
		}

		// Constructor PHP 5
		function __construct()
		{
			if(@function_exists("curl_init")) {
				$this->_method = 'OPENER_CURL';
			}elseif((int)@ini_get("allow_url_fopen") != 0) {
				$this->_method = 'OPENER_FOPEN';
			}else {
				$this->_method = 'OPENER_NONE';
			}
		}

		function CanOpen()
		{
			if($this->_method == 'OPENER_NONE') {
				return false;
			}

			return true;
		}

		function Open($URL, &$RetVal)
		{
			// Open the remote file using fopen or CURL
			$data = "";

			if($this->_method == 'OPENER_FOPEN') {
				// Try with FOPEN
				if($fp = fopen($URL, "rb")) {
					while(!feof($fp)) {
						$RetVal .= fgets($fp, 4096);
					}

					fclose($fp);
					return true;
				}
				else {
					return false;
				}
			}
			else if($this->_method == 'OPENER_CURL') {
				// Try with CURL
				if($ch = curl_init()) {
					curl_setopt($ch, CURLOPT_URL, $URL);
					if (!ISC_SAFEMODE && ini_get('open_basedir') == '') {
						@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					}
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FAILONERROR, true);
					curl_setopt($ch, CURLOPT_TIMEOUT, 30);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

					// Setup the proxy settings if there are any
					if (GetConfig('HTTPProxyServer')) {
						curl_setopt($ch, CURLOPT_PROXY, GetConfig('HTTPProxyServer'));
						if (GetConfig('HTTPProxyPort')) {
							curl_setopt($ch, CURLOPT_PROXYPORT, GetConfig('HTTPProxyPort'));
						}
					}

					if (GetConfig('HTTPSSLVerifyPeer') == 0) {
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					}

					$RetVal = curl_exec($ch);
					curl_close($ch);
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	}

?>
