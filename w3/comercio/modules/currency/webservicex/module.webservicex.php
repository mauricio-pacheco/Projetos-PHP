<?php

	class CURRENCY_WEBSERVICEX extends ISC_CURRENCY
	{
		private $id;

		public function __construct()
		{
			// Setup the required variables for the module
			parent::__construct();

			$this->_id          = "currency_webservicex";
			$this->_name        = GetLang("CWebXName");
			$this->_description = GetLang("CWebXDesc");
			$this->_help        = GetLang("CWebXHelp");
			$this->_url         = "http://www.webservicex.net";
			$this->_enabled     = $this->_CheckEnabled();

			// Target URL
			$this->_targetURL = "http://www.webservicex.net/CurrencyConvertor.asmx/ConversionRate";
		}

		public function FetchExchangeRate($fromCode, $toCode)
		{
			// Can make a SOAP request but a REST (POST or GET) request is quicker
			// The fields to post
			$postFields = "FromCurrency=" . urlencode(strtoupper($fromCode)) . "&ToCurrency=" . urlencode(strtoupper($toCode));

			$rtn = PostToRemoteFileAndGetResponse($this->GetTargetURL(), $postFields);

			// If we have failed then there is nothing really useful you can tell the client other than this service is temporarly unavailable
			if (!$rtn) {
				$this->SetError(GetLang("CurrencyProviderRequestUnavailable"));
				return false;
			}

			// Now we parse the return XML. Its not a big XML result and we only need one value out of it so we don't need anything heavy to read it.
			// If the parsing failed or if we didn't receive a value then we wern't given a valid XML due to the code(s) being incorrect
			$xml = @simplexml_load_string($rtn);
			if(!is_object($xml)) {
				$this->SetError(GetLang("CurrencyProviderRequestInvalidCode"));
				return false;
			}

			if (count($xml) === 0) {
				return (double)$xml;
			} else {
				return (double)$xml[0];
			}
		}
	}

?>