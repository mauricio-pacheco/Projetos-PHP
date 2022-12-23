<?php

class Email_API
{

	/**
	* An array containing the text and html versions of the body. This is before any replacements are made so we don't have to keep fetching the same content from the database before sending it through.
	*
	* If either is null, it is not included in the outgoing email.
	*
	* @see AddBody
	* @see AppendBody
	* @see JoinBody
	* @see _SetupHeaders
	* @see _SetupBody
	* @see ForgetEmail
	*
	* @var Array
	*/
	var $body = array('t' => null, 'h' => null);

	/**
	* _AttachmentBody
	* This holds the attachments in 'memory' so it only has to load them up once if multiple emails have to be sent.
	*
	* @var String $_AttachmentBody
	*
	* @see _SetupBody
	* @see _SetupAttachments
	*/
	var $_AttachmentBody = '';

	/**
	* _ImageBody
	* This holds the images for embedding in 'memory' so it only has to load them up once if multiple emails have to be sent.
	*
	* @var String $_ImageBody
	*
	* @see _SetupBody
	* @see _SetupImages
	*/
	var $_ImageBody = '';

	/**
	* _AssembledEmail
	* The email all put together ready for sending.
	*
	* @see _SetupBody
	* @see _SetupHeaders
	*/
	var $_AssembledEmail = array(
			'Headers' => array(
				't' => null,
				'h' => null,
				'm' => null
			),
			'Body' => array(
				't' => null,
				'h' => null,
				'm' => null
			)
		);

	/**
	* An array containing attachment information. This is used to temporarily store paths and names for the attachments we're going to add.
	*
	* If it's empty, nothing is added to the outgoing email.
	*
	* @see _SetupHeaders
	* @see _SetupBody
	* @see ForgetEmail
	* @see _SetupAttachments
	* @see Send
	*
	* @var Array
	*/
	var $_Attachments = array();

	/**
	* The newline character to use between headers, boundaries and so on.
	*
	* @var String
	*/
	var $_newline = "\n";

	/**
	* Boundary between parts. Used with multipart emails and also if there are any attachments.
	*
	* @see _SetupBody
	*
	* @var String
	*/
	var $_Boundaries = array();

	/**
	* Whether to embed images in the email or not. This is off by default.
	* This is used to work out boundaries and whether we need to fetch images that need embedding.
	*
	* @var Boolean
	*/
	var $EmbedImages = false;

	/**
	* Images to embed in the content.
	*
	* @see GetImages
	*
	* @var Array
	*/
	var $_EmbeddedImages = array();

	/**
	* The base href found in the email body.
	*
	* @see _GetBaseHref
	* @var String
	*/
	var $_basehref = null;

	/**
	* The temporary location for storing images that need embedding in an email.
	*
	* @see CleanupImages
	* @see _SaveImages
	*
	* @var String
	*/
	var $imagedir = null;

	/**
	* The From email address.
	*
	* @var String
	*/
	var $FromAddress = '';

	/**
	* The From name.
	*
	* @var String
	*/
	var $FromName = '';

	/**
	* The bounce email address (used if safe-mode is off).
	*
	* @var String
	*/
	var $BounceAddress = '';

	/**
	* The reply-to email address.
	*
	* @var String
	*/
	var $ReplyTo = '';

	/**
	* The subject of the email.
	*
	* @var String
	*/
	var $Subject = '';

	/**
	* The character set of the email.
	*
	* @var String
	*/
	var $CharSet = 'iso-8859-1';

	/**
	* The content encoding of the email.
	*
	* @var String
	*/
	var $ContentEncoding = '7bit';

	/**
	* Length to wrap lines at.
	*
	* @var Int
	*/
	var $WrapLength = 72;

	/**
	* SMTP Server Information. The server name to connect to.
	*
	* @see SetSmtp
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var String
	*/
	var $SMTPServer = false;

	/**
	* SMTP Server Information. The smtp username used for authentication.
	*
	* @see SetSmtp
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var String
	*/
	var $SMTPUsername = false;

	/**
	* SMTP Server Information. The smtp password used for authentication.
	*
	* @see SetSmtp
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var String
	*/
	var $SMTPPassword = false;

	/**
	* SMTP Server Information. The smtp port number.
	*
	* @see SetSmtp
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var Int
	*/
	var $SMTPPort = 25;

	/**
	* An array of recipients to send the email to. You go through this one by one and send emails individually.
	*
	* @var Array
	*/
	var $_Recipients = array();

	/**
	* Sendmail parameters is used to temporarily store the sendmail-from information.
	* Should only be set up once per sending session.
	*
	* @see _Send_Email
	*
	* @var String
	*/
	var $_sendmailparameters = null;

	/**
	* SMTP connection to see if we are connected to the smtp server. By default this is null.
	* When you reach _smtp_max_email_count it will drop the connection and re-establish it.
	*
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	* @see _smtp_max_email_count
	*
	* @var String
	*/
	var $_smtp_connection = null;

	/**
	* Max number of emails to send per smtp connection.
	*
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var Int
	*/
	var $_smtp_max_email_count = 50;

	/**
	* Number of emails that have been sent with this particular smtp connection. Gets reset after a set number of emails.
	*
	* @see _smtp_max_email_count
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var Int
	*/
	var $_smtp_email_count = 0;

	/**
	* Newline characters for the smtp servers to use.
	*
	* @see _smtp_max_email_count
	* @see _Send_SMTP
	* @see _Put_Smtp_Connection
	* @see _get_response
	* @see _Get_Smtp_Connection
	* @see _Close_Smtp_Connection
	*
	* @var String
	*/
	var $_smtp_newline = "\r\n";

	/**
	* Debug
	*
	* Whether to log decisions about how the email is put together and how the email is sent.
	*
	* @see LogFile
	*
	* @var Boolean
	*/
	var $Debug = false;

	/**
	* LogFile
	*
	* Where to store decisions etc that get made about how to send the email.
	* This is only used when debug mode is switched on.
	*
	* @see Debug
	* @see Email_API
	*
	* @var String
	*/
	var $LogFile = null;

	/**
	* MemoryLogFile
	*
	* Where to store decisions etc that get made about how to send the email.
	* This is only used when debug mode is switched on.
	*
	* @see Debug
	* @see Email_API
	*
	* @var String
	*/
	var $MemoryLogFile = null;

	/**
	* Whether this email is multipart or not.
	*
	* @var Boolean
	*/
	var $Multipart = false;

	/**
	* safe_mode
	*
	* Stores whether safe-mode is on for the server or not.
	*
	* @see Email_API
	* @see Send
	* @see CleanupImages
	*
	* @var Boolean
	*/
	var $safe_mode = false;

	/**
	* use_curl
	* Whether curl functions are available or not.
	*
	* @see GetImage
	* @see Email_API
	*/
	var $use_curl = false;

	/**
	* allow_fopen
	* Whether allow_url_fopen is on or not.
	*
	* @see GetImage
	* @see Email_API
	*/
	var $allow_fopen = false;

	/**
	* wrap_length
	* The number of characters to wrap the emails at.
	*
	* @var Int
	*
	* @see _SetupBody
	*/
	var $wrap_length = 72;

	/**
	* extra_headers
	* In case we need any extra email headers.
	* These are without any newlines.
	*
	* @var Array
	*
	* @see _SetupHeaders
	*/
	var $extra_headers=array();

	/**
	* message_id_server
	* The server the message is coming from.
	* This defaults to 'localhost.localdomain', but should be overwritten where possible.
	*
	* @var String
	*
	* @see _SetupHeaders
	*/
	var $message_id_server = 'localhost.localdomain';

	/**
	* memory_limit
	* Whether the server has 'memory_get_usage' available or not.
	* This is only used for debugging.
	*/
	var $memory_limit = false;

	/**
	* Constructor
	* Sets up the logfile in case debug mode gets switched on.
	*
	* @return Void Doesn't return anything.
	*/
	function Email_API()
	{
		if ((substr(strtolower(PHP_OS), 0, 3) == 'win') && ini_get('sendmail_path') == '') {
		   $this->_newline = "\r\n";
		}

		$this->safe_mode = (bool)ini_get('safe_mode');

		$this->use_curl = (bool)function_exists('curl_init');
		$this->allow_fopen = (bool)ini_get('allow_url_fopen');

		$this->memory_limit = (bool)function_exists('memory_get_usage');

		if (is_null($this->LogFile)) {
			if (defined('TEMP_DIRECTORY')) {
				$this->LogFile = TEMP_DIRECTORY . '/email.debug.log';
			}
		}

		if (is_null($this->MemoryLogFile)) {
			if (defined('TEMP_DIRECTORY')) {
				$this->MemoryLogFile = TEMP_DIRECTORY . '/email_memory.debug.log';
			}
		}

		if (isset($_SERVER['SERVER_NAME'])) {
			$this->message_id_server = $_SERVER['SERVER_NAME'];
		}
	}

	/**
	* Set
	* This sets the class var to the value passed in.
	* If the variable doesn't exist in the object, this will return false.
	*
	* @param String $varname Name of the class var to set.
	* @param Mixed $value The value to set the class var (this can be an array, string, int, float, object).
	*
	* @return Boolean True if it works, false if the var isn't present.
	*/
	function Set($varname='', $value='')
	{
		if ($varname == '') {
			return false;
		}

		// make sure we're setting a valid variable.
		$my_vars = array_keys(get_object_vars($this));
		if (!in_array($varname, $my_vars)) {
			return false;
		}

		$this->$varname = $value;
		return true;
	}

	/**
	* Get
	* Returns the class variable based on the variable passed in.
	* If the object variable doesn't exist, this will return false.
	*
	* @param String $varname Name of the class variable to return.
	*
	* @return False|Mixed Returns false if the class variable doesn't exist, otherwise it will return the value in the variable.
	*/
	function Get($varname='')
	{
		if ($varname == '') {
			return false;
		}

		if (!isset($this->$varname)) {
			return false;
		}

		return $this->$varname;
	}

	/**
	* From
	* Set the from email and name in one go.
	*
	* @param String $email The email address to set the from address to.
	* @param String $name The name to set the from name to.
	*
	* @return Boolean Returns false if it can't be set (invalid data), or true if it worked.
	*/
	function From($email='', $name='')
	{
		if (!preg_match("%\n|\r%", $name) && !preg_match("%\n|\r%", $email)) {
			$this->Set('ReplyTo', $email);
			$this->Set('BounceAddress', $email);
			$this->Set('FromAddress', $email);
			if (!empty($name)) {
				$this->Set('FromName', $name);
			}
			return true;
		}
		return false;
	}

	/**
	* Adds an address and name to the list of recipients to email.
	*
	* @param String $address Email Address to add.
	* @param String $name Their name (if applicable). This is checked before constructing the email to make sure it's available.
	* @param String $format Which format the recipient wants to receive. Either 'h' or 't'.
	*
	* @see _Recipients
	*
	* @return Void Doesn't return anything - just adds the information to the _Recipients array.
	*/
	function AddRecipient($address, $name = '', $format='h')
	{
		$curr = count($this->_Recipients);
		$this->_Recipients[$curr]['address'] = trim($address);
		$this->_Recipients[$curr]['name'] = $name;
		$this->_Recipients[$curr]['format'] = isc_strtolower($format);
	}

	/**
	* ClearRecipients
	* Clears out all recipients for the email. Useful if you want to send emails one by one.
	*
	* @see _Recipients
	* @see _RecipientsCustomFields
	*
	* @return Void Doesn't return anything - just empties out the recipients information.
	*/
	function ClearRecipients()
	{
		$this->_Recipients = array();
	}

	/**
	* Adds a body part of the email. This also checks to make sure you're adding a valid part (only accepts text or html).
	*
	* @param String $bodytype Type of body to add.
	* @param String $body The content to add.
	*
	* @see body
	*
	* @return Boolean Returns true if it's accepted, otherwise false.
	*/
	function AddBody($bodytype='text', $body='')
	{
		$bodytype = strtolower($bodytype{0});
		if (!in_array($bodytype, array_keys($this->body))) {
			return false;
		}

		$this->body[$bodytype] = $body;
		return true;
	}

	/**
	* Appends to a body part of the email. This also checks to make sure you're adding a valid part (only accepts text or html). If there is no body to add, then it will simply return (whether use_newline is set on or off).
	*
	* If the new body type is html, then it places the new body before the </body> tag (should already be there for valid html so we don't really need to check this first).
	*
	* @param String $bodytype The type of body we're adding to.
	* @param String $body The message to add to the end of the body that already exists.
	* @param Boolean $use_newline If this is true, then a new line character is added before the text is appended. Depending on the bodytype, this is either a "\n" (text) or a "<br/>" (html).
	*
	* @see body
	*
	* @return Boolean Returns true if it's accepted, otherwise false.
	*/
	function AppendBody($bodytype='t', $body='', $use_newline=true)
	{
		if (!$body) {
			return true;
		}

		$bodytype = strtolower($bodytype{0});
		if (!in_array($bodytype, array_keys($this->body))) {
			return false;
		}

		if ($use_newline) {
			if($bodytype == 'h') {
				$newline = '<br />';
			}
			else {
				$newline = "\n";
			}
			$body = $newline . $body;
		}

		if ($bodytype == 'h') {
			$this->body['h'] = preg_replace('%<\/body>%i', $body . '</body>', $this->body['h']);
			return true;
		}

		$this->body[$bodytype] .= $body;
		return true;
	}

	/**
	* Removes all attachments from the email.
	*
	* @see _Attachments
	* @see ForgetEmail
	*
	* @return Void Doesn't return anything - simply forgets the attachments.
	*/
	function ClearAttachments()
	{
		$this->_Attachments = array();
	}

	/**
	* Adds an attachment to the email. This checks whether the file is valid (it exists), whether it's readable.
	*
	* @param String $path The path to the file to attach.
	* @param String $name The name to place on the attachment.
	*
	* @return Boolean Returns true if it's accepted, otherwise false.
	*/
	function AddAttachment($path=null, $name='')
	{
		if (is_null($path)) {
			return false;
		}
		if (!is_file($path)) {
			return false;
		}
		if (!is_readable($path)) {
			return false;
		}

		$curr = count($this->_Attachments);
		$this->_Attachments[$curr]['path'] = $path;
		$this->_Attachments[$curr]['name'] = $name;
		return true;
	}

	/**
	* Adds an attachment to the email. The content of the attachment is passed to the function.
	*
	* @param String $data The contents of the file to attach.
	* @param String $name The name to place on the attachment.
	*
	* @return Boolean Returns true if it's accepted, otherwise false.
	*/
	function AddAttachmentData($data=null, $name='')
	{
		if (is_null($data)) {
			return false;
		}

		$curr = count($this->_Attachments);
		$this->_Attachments[$curr]['data'] = $data;
		$this->_Attachments[$curr]['name'] = $name;
		return true;
	}

	/**
	* _SetupHeaders
	* Sets up the headers for each type ('m'ultipart, 't'ext and 'h'tml).
	* Each type is slightly different with different requirements for boundaries and content-type's.
	* We also set up all of the boundaries here.
	*
	* @return Void Doesn't return anything, everything gets stored in the _AssembledEmail['Headers'] array.
	*/
	function _SetupHeaders()
	{
		// the headers are already set up? Just return.
		// one or the other must have been set up, this handles whether the email is text or html.
		if (!is_null($this->_AssembledEmail['Headers']['t']) || !is_null($this->_AssembledEmail['Headers']['h'])) {
			return;
		}

		if (strtolower($this->CharSet) == 'utf-8') {
			$this->ContentEncoding = '8bit';
		}

		$this->_AssembledEmail['Headers']['m'] = null;
		$this->_AssembledEmail['Headers']['t'] = null;
		$this->_AssembledEmail['Headers']['h'] = null;

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; assembling headers' . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$headers = 'Return-Path: ' . $this->BounceAddress . $this->_newline;

		$headers .= 'Date: ' . date('r') . $this->_newline;

		$headers .= 'From: ';
		if ($this->FromName) {
			$headers .= '"' . $this->_utf8_encode($this->FromName) . '" ';
		}

		$headers .= '<' . $this->FromAddress . '>' . $this->_newline;

		$headers .= 'Reply-To: ' . $this->ReplyTo . $this->_newline;

		$semi_rand = md5(uniqid('ssb', true)); // 'ssb' = sendstudio boundary :)

		$headers .= 'Message-ID: <' . $semi_rand . '@' . $this->message_id_server . '>' . $this->_newline;

		$mime_boundary = 'b1_'.$semi_rand;

		$this->_Boundaries = array($mime_boundary);
		$this->_Boundaries[] = str_replace('b1_', 'b2_', $mime_boundary);
		$this->_Boundaries[] = str_replace('b1_', 'b3_', $mime_boundary);

		$headers .= 'MIME-Version: 1.0' . $this->_newline;

		if (!empty($this->extra_headers)) {
			foreach ($this->extra_headers as $p => $header) {
				$headers .= $header . $this->_newline;
			}
		}

		$multipart_headers = $headers;
		$html_headers = $headers;
		$text_headers = $headers;

		$this->_EmbeddedImages = $this->GetImages();
		if (!empty($this->_EmbeddedImages)) {
			$this->EmbedImages = true;
			$this->_SaveImages();
		} else {
			$this->EmbedImages = false;
		}

		$add_boundary = false;

		if (empty($this->_Attachments)) {
			if ($this->EmbedImages) {
				$add_boundary = true;
				$html_headers .= 'Content-Type: multipart/related;' . $this->_newline . "\t" . 'type="multipart/alternative"';
				$multipart_headers .= 'Content-Type: multipart/related;' . $this->_newline . "\t" . 'type="multipart/alternative"';
			} else {
				$html_headers .= 'Content-Type: text/html';
				$multipart_headers .= 'Content-Type: multipart/alternative';
			}
			$text_headers .= 'Content-Type: text/plain; format=flowed';
		} else {
			$add_boundary = true;
			$line = 'Content-Type: multipart/mixed';
			$html_headers .= $line;
			$multipart_headers .= $line;
			$text_headers .= $line;
		}

		$html_headers .= '; charset="' . $this->CharSet . '"';
		$text_headers .= '; charset="' . $this->CharSet . '"';
		$multipart_headers .= '; charset="' . $this->CharSet . '"';

		if ($add_boundary) {
			$html_headers .= "; boundary=" . '"' . $mime_boundary . '"';
			$text_headers .= "; boundary=" . '"' . $mime_boundary . '"';
		}

		// regardless of whether we are adding the boundary,
		// we need a newline anyway before the content-transfer-encoding.
		$html_headers .= $this->_newline;
		$text_headers .= $this->_newline;

		// multipart headers always need the boundary, so we'll do it now.
		$multipart_headers .= "; boundary=" . '"' . $mime_boundary . '"' . $this->_newline;

		$html_headers .= 'Content-Transfer-Encoding: ' . $this->ContentEncoding . $this->_newline;
		$text_headers .= 'Content-Transfer-Encoding: ' . $this->ContentEncoding . $this->_newline;
		$multipart_headers .= 'Content-Transfer-Encoding: ' . $this->ContentEncoding . $this->_newline;

		if ($add_boundary) {
			$html_headers .= "Content-Disposition: inline" . $this->_newline;
			$text_headers .= "Content-Disposition: inline" . $this->_newline;
			$multipart_headers .= "Content-Disposition: inline" . $this->_newline;
		}

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; html_headers: ' . $html_headers . "\n", 3, $this->LogFile);
			error_log('Line ' . __LINE__ . '; time ' . time() . '; text_headers: ' . $text_headers . "\n", 3, $this->LogFile);
			error_log('Line ' . __LINE__ . '; time ' . time() . '; multipart_headers: ' . $multipart_headers . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$this->_AssembledEmail['Headers']['m'] = $multipart_headers;
		$this->_AssembledEmail['Headers']['t'] = $text_headers;
		$this->_AssembledEmail['Headers']['h'] = $html_headers;
	}

	/**
	* _SetupBody
	* Sets up the html, text, and multipart bodies ready to send.
	* Depending on whether attachments are present, images are embedded etc it will be put together differently.
	*
	* @see _FixStyles
	* @see _Attachments
	* @see _JoinBody
	* @see Multipart
	* @see EmbedImages
	* @see _Send_Recipient
	*
	* @return Void Doesn't return anything. All email bodies get put into the _AssembledEmails['Body'] array ready for easy use.
	*/
	function _SetupBody()
	{
		if (!is_null($this->_AssembledEmail['Body']['t']) || !is_null($this->_AssembledEmail['Body']['h'])) {
			return;
		}

		$this->_FixStyles();

		$text_body = $html_body = $multipart_body = '';

		if ($this->body['t']) {
			if (!empty($this->_Attachments)) {
				$text_body .= '--' . $this->_Boundaries[0] . $this->_newline;
				$text_body .= 'Content-Type: multipart/alternative;' . $this->_newline;
				$text_body .= "\t" . 'boundary="' . $this->_Boundaries[2] . '"';
				$text_body .= $this->_newline . $this->_newline;

				$text_body .= $this->_JoinBody('t');
			} else {
				$text_body = $this->body['t'];
			}
			$this->_AssembledEmail['Body']['t'] = wordwrap($text_body, $this->wrap_length);
		} else {
			$this->Multipart = false;
		}

		/**
		* If there's no html body, then don't set up anything.
		* Multipart won't work either, so we can just return.
		*/
		if (!$this->body['h']) {
			$this->Multipart = false;
			return;
		}

		/**
		* This handles no attachments and no embedded images.
		* We can just join the two bodies together ('text' + 'html') and that makes up the multipart email.
		* Of course, the html body will appear exactly as it is now.
		*/
		if (empty($this->_Attachments) && !$this->EmbedImages) {
			$html_body = $this->body['h'];

			if ($this->body['t']) {
				$multipart_body = $this->_JoinBody('t', 0, false);
				$multipart_body .= $this->_JoinBody('h', 0);
			} else {
				$multipart_body = null;
			}

			$this->_AssembledEmail['Body']['h'] = wordwrap($html_body, $this->wrap_length);
			if ($this->Multipart) {
				$this->_AssembledEmail['Body']['m'] = wordwrap($multipart_body, $this->wrap_length);
			}
			return;
		}

		/**
		* This handles attachments and no embedded images.
		* For both types (html + multipart) we need to put headers at the top of the body.
		* Attachments actually get added later on.
		*
		* @see _Send_Recipient
		*/
		if (!empty($this->_Attachments) && !$this->EmbedImages) {
			$body = '';
			$body .= '--' . $this->_Boundaries[0] . $this->_newline;
			$body .= 'Content-Type: multipart/alternative;' . $this->_newline;
			$body .= "\t" . 'boundary="' . $this->_Boundaries[2] . '"';
			$body .= $this->_newline . $this->_newline;

			$html_body = $body;
			$html_body .= $this->_JoinBody('h');

			if ($this->body['t']) {
				$multipart_body = $body;
				$multipart_body .= $this->_JoinBody('t', 2, false);
				$multipart_body .= $this->_JoinBody('h');
			} else {
				$multipart_body = null;
			}

			$this->_AssembledEmail['Body']['h'] = wordwrap($html_body, $this->wrap_length);
			if ($this->Multipart) {
				$this->_AssembledEmail['Body']['m'] = wordwrap($multipart_body, $this->wrap_length);
			}
			return;
		}

		/**
		* This handles attachments and embedded images.
		* For both types (html + multipart) we need to put headers at the top of the body.
		* The boundary is different because we have to separate the sections a little differently.
		* Attachments & embedded images actually get added later on.
		*
		* @see _Send_Recipient
		*/
		if (!empty($this->_Attachments) && $this->EmbedImages) {
			$body = '';
			$body .= '--' . $this->_Boundaries[0] . $this->_newline;
			$body .= 'Content-Type: multipart/related;' . $this->_newline;
			$body .= "\t" . 'type="multipart/alternative";' . $this->_newline;
			$body .= "\t" . 'boundary="' . $this->_Boundaries[1] . '"' . $this->_newline . $this->_newline;

			$body .= '--' . $this->_Boundaries[1] . $this->_newline;
			$body .= 'Content-Type: multipart/alternative;' . $this->_newline;
			$body .= "\t" . 'boundary="' . $this->_Boundaries[2] . '"' . $this->_newline . $this->_newline;

			$html_body = $body;
			$multipart_body = $body;

			if ($this->body['t']) {
				$multipart_body .= $this->_JoinBody('t', 2, false);
				$multipart_body .= $this->_JoinBody('h');
			} else {
				$multipart_body = null;
			}

			$html_body .= $this->_JoinBody('h');

			$this->_AssembledEmail['Body']['h'] = wordwrap($html_body, $this->wrap_length);
			if ($this->Multipart) {
				$this->_AssembledEmail['Body']['m'] = wordwrap($multipart_body, $this->wrap_length);
			}
			return;
		}

		/**
		* This handles no attachments but we have embedded images.
		* For both types (html + multipart) we need to put headers at the top of the body. They are different for each type (of course!).
		* The boundary is different because we have to separate the sections a little differently.
		* Attachments & embedded images actually get added later on.
		*
		* @see _Send_Recipient
		*/
		if (empty($this->_Attachments) && $this->EmbedImages) {
			if ($this->body['t']) {
				$multipart_body = '';
				$multipart_body .= '--' . $this->_Boundaries[0] . $this->_newline;
				$multipart_body .= 'Content-Type: multipart/alternative;' . $this->_newline;
				$multipart_body .= "\t" . 'boundary="' . $this->_Boundaries[2] . '"' . $this->_newline . $this->_newline;

				$multipart_body .= $this->_JoinBody('t', 2, false);
				$multipart_body .= $this->_JoinBody('h');
			} else {
				$multipart_body = null;
			}

			$html_body	 = '';
			$html_body	.= '--' . $this->_Boundaries[0] . $this->_newline;
			$html_body	.= 'Content-Type: multipart/alternative;' . $this->_newline;
			$html_body	.= "\t" . 'boundary="' . $this->_Boundaries[2] . '"' . $this->_newline . $this->_newline;

			$html_body .= $this->_JoinBody('h');

			$this->_AssembledEmail['Body']['h'] = wordwrap($html_body, $this->wrap_length);
			if ($this->Multipart) {
				$this->_AssembledEmail['Body']['m'] = wordwrap($multipart_body, $this->wrap_length);
			}
			return;
		}
	}

	/**
	* _SetupAttachments
	* Sets up the _AttachmentBody ready to just add to the end of the emails when it goes to send.
	* It puts boundaries around the whole body and gets it all set up ready to go.
	*
	* @see _AttachmentBody
	* @see _Attachments
	* @see _Send_Recipient
	*
	* @return Void Doesn't return anything.
	*/
	function _SetupAttachments()
	{

		if (empty($this->_Attachments)) {
			$this->_AttachmentBody = '';
			return;
		}

		// if the attachment body is not empty, then just return - it has already been set up.
		if ($this->_AttachmentBody) {
			return;
		}

		$body = '';

		$boundary = '--' . $this->_Boundaries[0];

		foreach ($this->_Attachments as $p => $attachment) {
			$body .= $boundary . $this->_newline;

			$body .= 'Content-Type: application/octet-stream;';
			if ($attachment['name']) {
				$body .= $this->_newline . ' name="' . $attachment['name'] . '"';
			}

			$body .= $this->_newline;
			$body .= 'Content-Transfer-Encoding: base64' . $this->_newline;

			$body .= 'Content-Disposition: attachment;' . $this->_newline;
			if(!$attachment['name']) {
				$attachment['name'] = basename($attachment['path']);
			}
			$body .= ' filename="' . $attachment['name'] . '"' . $this->_newline . $this->_newline;

			if(isset($attachment['data'])) {
				$filedata = $attachment['data'];
			} else {
				$fp = fopen($attachment['path'], 'rb');
				$filedata = fread($fp, filesize($attachment['path']));
				fclose($fp);
			}
			$body .= chunk_split(base64_encode($filedata)) . $this->_newline . $this->_newline;
			unset($filedata);
			unset($fp);
		}
		$body .= $boundary . '--' . $this->_newline . $this->_newline;

		$this->_AttachmentBody = $body;
	}

	/**
	* _SetupImages
	* Sets up the _ImageBody ready to just add to the end of the html/multipart bodies when it goes to send.
	* It puts boundaries around the whole body and gets it all set up ready to go.
	* The boundary will change depending on whether attachments are present or not.
	*
	* @see _EmbeddedImages
	* @see _Attachments
	* @see _Send_Recipient
	*
	* @return Void Doesn't return anything.
	*/
	function _SetupImages()
	{
		if (empty($this->_EmbeddedImages)) {
			$this->_ImageBody = '';
			return;
		}

		// if the image body is not empty, then just return - it has already been set up.
		if ($this->_ImageBody) {
			return;
		}

		$body = $this->_newline;

		$boundary = $this->_Boundaries[0];
		if (!empty($this->_Attachments)) {
			$boundary = $this->_Boundaries[1];
		}

		/**
		* Taken from the php manual for getimagesize:
		* Index 2 is a flag indicating the type of the image: 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM
		*/
		foreach ($this->_EmbeddedImages as $md5 => $image) {
			$body .= '--' . $boundary . $this->_newline;

			$imgdetails = @getimagesize($image);

			$imgtype = '';

			/**
			* the mime type only came in with php4.3+.
			*  if it's set, use it. If it's not, look at the more common types and set the type accordingly.
			*/
			if (isset($imgdetails['mime'])) {
				$imgtype = $imgdetails['mime'];
			} else {
				switch ($imgdetails[2]) {
					case '1':
						$imgtype = 'image/gif';
					break;
					case '2':
						$imgtype = 'image/jpg';
					break;
					case '3':
						$imgtype = 'image/png';
					break;
					case '6':
						$imgtype = 'image/bmp';
					break;
				}
			}

			$body .= 'Content-Type: ' . $imgtype . ';';
			$body .= ' name="' . basename($image) . '"';
			$body .= $this->_newline;
			$body .= 'Content-Transfer-Encoding: base64' . $this->_newline;
			$body .= 'Content-ID: <' . $md5 . '>' . $this->_newline . $this->_newline;

			$filedata = '';

			$fp = @fopen($image, 'rb');
			if ($fp) {
				$filedata = @fread($fp, filesize($image));
				fclose($fp);
			}

			$body .= chunk_split(base64_encode($filedata)) . $this->_newline . $this->_newline;
			unset($filedata);
			unset($fp);
		}
		$body .= '--' . $boundary . '--' . $this->_newline . $this->_newline;
		$this->_ImageBody = $body;
	}

	/**
	* _JoinBody
	* Returns the body with the correct content type, character set, encoding and boundaries set up.
	*
	* The only time the boundary won't be set to '2' will be when there is a multipart email with no attachments and no embedded images.
	*
	* @param String $type The type of body we're trying to join together ('h'tml or 't'ext).
	* @param Int $boundary The boundary to put around the content.
	* @param Boolean $add_bottom_boundary Whether to add the bottom boundary or not. Multipart emails don't need the bottom boundary between the text/html components, but attachments/embedded images do need it.
	*
	* @see _Boundaries
	* @see CharSet
	* @see ContentEncoding
	* @see body
	*
	* @return String The body with the content type, character set, encoding and boundaries set up.
	*/
	function _JoinBody($type='', $boundary=2, $add_bottom_boundary=true)
	{
		$type = strtolower($type{0});
		if($type == 'h') {
			$content_type = 'text/html';
		}
		else {
			$content_type = 'text/plain; format=flowed';
		}
		$body = '';
		$body .= '--' . $this->_Boundaries[$boundary] . $this->_newline;

		$body .= 'Content-Type: ' . $content_type . '; charset="' . $this->CharSet . '"' . $this->_newline;
		$body .= 'Content-Transfer-Encoding: ' . $this->ContentEncoding . $this->_newline . $this->_newline;

		$body .= $this->body[$type];
		$body .= $this->_newline . $this->_newline;
		if ($add_bottom_boundary) {
			$body .= '--' . $this->_Boundaries[$boundary] . '--' . $this->_newline;
		}
		return $body;
	}

	/**
	* _GetHeaders
	* Gets the assembled headers based on the format of the recipient.
	* If multipart is enabled (and both body types are available), then the multipart header is always returned.
	* If the recipient prefers html, make sure that the header has been assembled & there is a html body present.
	* If neither of those conditions are true, then return the text headers.
	*
	* @param String $format The preferred format of the recipient.
	*
	* @see Multipart
	* @see _SetupBody
	* @see _SetupHeaders
	* @see _AssembledEmail
	*
	* @return String Returns the right header for the email based on the format.
	*/
	function _GetHeaders($format='')
	{
		if ($this->Multipart) {
			return $this->_AssembledEmail['Headers']['m'];
		}

		/**
		* make sure there is a header & body present.
		* otherwise if the header has been assembled, but no body is present we end up with a mismatch.
		* the header says 'text/html' but the body is plain text.
		*/
		if ($format == 'h' && !is_null($this->_AssembledEmail['Headers']['h']) && !is_null($this->_AssembledEmail['Body']['h'])) {
			return $this->_AssembledEmail['Headers']['h'];
		}

		return $this->_AssembledEmail['Headers']['t'];
	}

	/**
	* _GetBody
	* Gets the assembled body based on the format of the recipient.
	* If multipart is enabled (and both body types are available), then the multipart body is always returned.
	* If the recipient prefers html, make sure that the body isn't empty.
	* If neither of those conditions are true, then return the text email.
	*
	* @param String $format The preferred format of the recipient.
	*
	* @see Multipart
	* @see _SetupBody
	* @see _SetupHeaders
	* @see _AssembledEmail
	*
	* @return String Returns the right body for the email based on the format.
	*/
	function _GetBody($format='')
	{
		if ($this->Multipart) {
			return $this->_AssembledEmail['Body']['m'];
		}

		if ($format == 'h' && !is_null($this->_AssembledEmail['Body']['h'])) {
			return $this->_AssembledEmail['Body']['h'];
		}

		return $this->_AssembledEmail['Body']['t'];
	}

	/**
	* Send
	* Sends the email to each of the recipients.
	*
	* @see _SetupHeaders
	* @see _SetupAttachments
	* @see _SetupImages
	* @see _SetupBody
	* @see _Recipients
	* @see _GetBody
	* @see _GetHeaders
	* @see _Send_Recipient
	*
	* @return Array Returns an array of results. The number that sent ok and the email addresses that failed to be sent an email.
	*/
	function Send()
	{
		$results = array('success' => 0, 'fail' => array());

		$headers = $this->_SetupHeaders();

		$this->_SetupAttachments();

		$this->_SetupImages();

		$body = $this->_SetupBody();

		foreach ($this->_Recipients as $p => $details) {

			$to = '';
			if ($details['name']) {
				$to .= '"' . $this->_utf8_encode($details['name']) . '" <';
			}
			$to .= $details['address'];

			if ($details['name']) {
				$to .= '>';
			}

			$rcpt_to = $details['address'];

			$headers = $this->_GetHeaders($details['format']);
			$body = $this->_GetBody($details['format']);

			$subject = $this->Subject;

			list($mail_result, $reason) = $this->_Send_Recipient($to, $rcpt_to, $subject, $details['format'], $headers, $body);

			if ($mail_result) {
				$results['success']++;
			} else {
				$results['fail'][] = array($rcpt_to, $reason);
			}
		}
		$this->_Close_Smtp_Connection();
		return $results;
	}

	/**
	* _Send_Recipient
	* Grab a whole lot of information and pass it to the _Send_Email function.
	* Why have this function? Because sendstudio needs to change placeholders & links and running everything through this function means less duplication of code.
	*
	* @param String $to The "to" address of the recipient.
	* @param String $rcpt_to The bare email address of the recipient.
	* @param Char $format The format the recipient wants the email in.
	* @param String $headers The headers for the email.
	* @param String $body The body of the email.
	*
	* @see _GetHeaders
	* @see _GetBody
	* @see Multipart
	* @see _ImageBody
	* @see _AttachmentBody
	* @see _Send_Email
	*
	* @return Array Returns the status from _Send_Email.
	*/
	function _Send_Recipient(&$to, &$rcpt_to, &$subject, &$format, &$headers, &$body)
	{
		/**
		* Do the checking for null characters before we add the image or attachments to the body.
		* Saves a little bit of memory doing it this way
		* Otherwise php uses extra memory where it shouldn't.
		*/

		// Avoid a bug with the mail command
		// See http://www.php-security.org/MOPB/MOPB-33-2007.html for details
		$body = str_replace("\0", "", $body);

		// Shouldn't have a null in the headers either
		$headers = str_replace("\0", "", $headers);

		// Fix for http://www.php-security.org/MOPB/MOPB-34-2007.html
		$subject = str_replace(array("\r", "\n", "\t"), ' ', $subject);
		$to = str_replace(array("\r", "\n", "\t"), ' ', $to);
		$rcpt_to = str_replace(array("\r", "\n", "\t"), ' ', $rcpt_to);

		if ($this->Multipart || ($format == 'h' && !is_null($this->_AssembledEmail['Body']['h']))) {
			$body .= $this->_ImageBody;
		}

		$body .= $this->_AttachmentBody;

		return $this->_Send_Email($rcpt_to, $to, $subject, $body, $headers);
	}

	/**
	* _Send_Email
	* This decides whether to try and send the email through the smtp server (if specified) or send it through the php mail function (which is the default method).
	*
	* @param String $rcpt_to The 'receipt to' address to send the email to. This is a bare email address only.
	* @param String $to The 'to' address to send this to. This can contain a name / email address in the standard format ("Name" <email@address>)
	* @param String $subject The subject of the email to send.
	* @param String $body The body of the email to send.
	* @param String $headers The headers of the email to send.
	*
	* @see Send
	* @see _Send_SMTP
	* @see safe_mode
	* @see BounceAddress
	* @see _sendmailparameters
	*
	* @return Array Returns an array including whether the email was sent and a possible error message (for logging).
	*/
	function _Send_Email(&$rcpt_to, &$to, &$subject, &$body, &$headers)
	{

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; rcpt_to: ' . $rcpt_to . '; to: ' . $to . '; subject: ' . $subject . '; headers: ' . $headers . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$subject = $this->_utf8_encode($subject);

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; rcpt_to: ' . $rcpt_to . '; to: ' . $to . '; subject: ' . $subject . '; headers: ' . $headers . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if ($this->SMTPServer) {
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; sending through smtp server' . "\n", 3, $this->LogFile);
			}
			if ($this->Debug) {
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}
			return $this->_Send_SMTP($rcpt_to, $to, $subject, $body, $headers);
		}

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; sending through php mail' . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$reason = false;

		/*
		* We change the "to" address here to the bare rcpt_to address if it's a windows server.
		* Windows smtp servers will only take bare addresses in the mail() command.
		*/
		if ((substr(strtolower(PHP_OS), 0, 3) == 'win')) {
			$to = $rcpt_to;
			if (ini_get('sendmail_path') == '') {
				$body = str_replace("\r\n", "\n", $body);
				$body = str_replace("\n", $this->_newline, $body);
			}
		}

		$php_errormsg='';

		if ($this->safe_mode || !$this->BounceAddress) {
			$mail_result = mail($to, $subject, $body, rtrim($headers));
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; no bounce address or safe mode is on' . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}
		} else {
			if (is_null($this->_sendmailparameters)) {
				$old_from = ini_get('sendmail_from');
				ini_set('sendmail_from', $this->BounceAddress);
				$params = sprintf('-f%s', $this->BounceAddress);
				$this->_sendmailparameters = $params;
			}

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; bounce address set to ' . $this->_sendmailparameters . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			$mail_result = mail($to, $subject, $body, rtrim($headers), $this->_sendmailparameters);
		}

		if (!$mail_result) {
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Mail broken' . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}
			$reason = 'Unable To Email (not queued), reason: '.$php_errormsg;
		} else {
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Mail queued' . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}
		}
		return array($mail_result, $reason);
	}

	/**
	* _Send_SMTP
	* Send an email through an smtp server instead of through the php mail function.
	* This handles all of the commands that need to be sent and return code checking for each part of the process.
	*
	* @param String $rcpt_to The 'receipt to' address to send the email to. This is a bare email address only.
	* @param String $to The 'to' address to send this to. This can contain a name / email address in the standard format ("Name" <email@address>)
	* @param String $subject The subject of the email to send.
	* @param String $body The body of the email to send.
	* @param String $headers The headers of the email to send.
	*
	* @see _Get_Smtp_Connection
	* @see _Put_Smtp_Connection
	* @see _Close_Smtp_Connection
	* @see ErrorCode
	* @see Error
	* @see _get_response
	* @see _smtp_email_count
	*
	* @return Array Returns an array including whether the email was sent and a possible error message (for logging).
	*/
	function _Send_SMTP(&$rcpt_to, &$to, &$subject, &$body, &$headers)
	{
		$connection = $this->_Get_Smtp_Connection();

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Connection is ' . gettype($connection) . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if (!$connection) {
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; No connection' . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}
			return array(false, 'No connection');
		}

		$data = "MAIL FROM: <" . $this->BounceAddress . ">";

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if (!$this->_Put_Smtp_Connection($data)) {
			$this->ErrorCode = 10;
			$this->Error = GetLang('UnableToSendEmail_MailFrom');
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$response = $this->_get_response();

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$responsecode = substr($response, 0, 3);
		if ($responsecode != '250') {
			$this->ErrorCode = $responsecode;
			$this->Error = $response;
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$data = "RCPT TO: <" . $rcpt_to . ">";

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if (!$this->_Put_Smtp_Connection($data)) {
			$this->ErrorCode = 11;
			$this->Error = GetLang('UnableToSendEmail_RcptTo');
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$response = $this->_get_response();

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$responsecode = substr($response, 0, 3);

		if ($responsecode != '250') {
			$this->ErrorCode = $responsecode;
			$this->Error = $response;
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$data = "DATA";

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if (!$this->_Put_Smtp_Connection($data)) {
			$this->ErrorCode = 12;
			$this->Error = GetLang('UnableToSendEmail_Data');
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$response = $this->_get_response();

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$responsecode = substr($response, 0, 3);

		if ($responsecode != '354') {
			$this->ErrorCode = $responsecode;
			$this->Error = $response;
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$msg = "To: " . $to . $this->_smtp_newline . "Subject: " . $subject . $this->_smtp_newline . $headers . $this->_smtp_newline . $body;

		$msg = str_replace("\r\n","\n",$msg);
		$msg = str_replace("\r","\n",$msg);
		$lines = explode("\n",$msg);
		foreach ($lines as $no => $line) {
			// we need to rtrim here so we don't get rid of tabs before the start of the line.
			// the tab is extremely important for boundaries (eg sending multipart + attachment)
			// so it needs to stay.
			$data = rtrim($line);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			if (!$this->_Put_Smtp_Connection($data)) {
				$this->ErrorCode = 13;
				$this->Error = GetLang('UnableToSendEmail_DataWriting');
				$this->_Close_Smtp_Connection();

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return array(false, $this->Error);
			}
		}

		$data = $this->_smtp_newline . ".";

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if (!$this->_Put_Smtp_Connection($data)) {
			$this->ErrorCode = 14;
			$this->Error = GetLang('UnableToSendEmail_DataFinished');
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		$response = $this->_get_response();

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$responsecode = substr($response, 0, 3);
		if ($responsecode != '250') {
			$this->ErrorCode = $responsecode;
			$this->Error = $response;
			$this->_Close_Smtp_Connection();

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return array(false, $this->Error);
		}

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Mail accepted ' . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$this->_smtp_email_count++;
		return array(true, false);
	}

	/**
	* SetSmtp
	* Sets smtp server information
	* If the servername is set to false, then this will "forget" the current smtp information by setting the class variables back to their defaults.
	*
	* @param String $servername SMTP servername to use to send emails through
	* @param String $username SMTP username to authenticate with when sending through the smtp server
	* @param String $password SMTP password to authenticate with when sending through the smtp server
	* @param Int $port The SMTP port number to use when sending
	*
	* @see SMTPServer
	* @see SMTPUsername
	* @see SMTPPassword
	* @see SMTPPort
	*
	* @return True Always returns true.
	*/
	function SetSmtp($servername=false, $username=false, $password=false, $port=25)
	{
		if (!$servername) {
			$this->SMTPServer = false;
			$this->SMTPUsername = false;
			$this->SMTPPassword = false;
			$this->SMTPPort = 25;
			return true;
		}

		$this->SMTPServer = $servername;
		$this->SMTPUsername = $username;
		$this->SMTPPassword = $password;
		$this->SMTPPort = (int)$port;
		return true;
	}

	/**
	* _Put_Smtp_Connection
	* This puts data through the smtp connection.
	* If a valid connection isn't passed in, the _smtp_connection is used instead.
	*
	* @param String $data The data to put through the connection. A newline is automatically added here, there is no need to do it before calling this function.
	* @param Resource $connection The connection to send the data through. If not specified, the resource _smtp_connection is used instead.
	*
	* @see _smtp_newline
	* @see _smtp_connection
	*
	* @return Mixed Returns whether the 'fputs' works to the connection resource.
	*/
	function _Put_Smtp_Connection($data='', $connection=null)
	{
		$data .= $this->_smtp_newline;
		if (is_null($connection)) {
			$connection = $this->_smtp_connection;
		}

		return fputs($connection, $data, strlen($data));
	}

	/**
	* SMTP_Logout
	* A wrapper for the _Close_Smtp_Connection function
	*
	* @see _Close_Smtp_Connection
	*
	* @return Void Doesn't return anything.
	*/
	function SMTP_Logout()
	{
		$this->_Close_Smtp_Connection();
	}

	/**
	* _Get_Smtp_Connection
	* This fetches the smtp connection stored in _smtp_connection
	* If that isn't valid, this will attempt to set it up and authenticate (if necessary).
	* If the number of emails sent through the connection has reached the maximum (most smtp servers will only let you send a certain number of emails per connection), the connection will be reset.
	* If the connection is not available or has been reset, this will then attempt to re-set up the connection socket.
	*
	* @see _smtp_connection
	* @see _smtp_email_count
	* @see _smtp_max_email_count
	* @see SMTPServer
	* @see SMTPUsername
	* @see SMTPPassword
	* @see SMTPPort
	* @see ErrorCode
	* @see Error
	* @see _Put_Smtp_Connection
	* @see _get_response
	*
	* @return False|Resource If the connection in _smtp_connection is valid, this will return that connection straight away. If it's not valid it will try to re-establish the connection. If it can't be done, this will return false. If it can be done, the connection will be stored in _smtp_connection and returned.
	*/
	function _Get_Smtp_Connection()
	{
		if ($this->_smtp_email_count > $this->_smtp_max_email_count) {
			$this->_Close_Smtp_Connection();
			$this->_smtp_email_count = 0;
		}

		if (!is_null($this->_smtp_connection)) {
			return $this->_smtp_connection;
		}

		$server = $this->SMTPServer;
		$username = $this->SMTPUsername;
		$password = $this->SMTPPassword;
		$port = (int)$this->SMTPPort;

		if ($port <= 0) {
			$port = 25;
		}

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; smtp details: server: ' . $server . '; username: ' . $username . '; password: ' . $password . '; port: ' . $port . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$timeout = 10;

		$socket = @fsockopen($server, $port, $errno, $errstr, $timeout);
		if (!$socket) {
			$this->ErrorCode = 1;
			$this->Error = sprintf(GetLang('UnableToConnectToEmailServer'), $errstr . '(' . $errno . ')');
			return false;
		}

		$response = $this->_get_response($socket);

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$responsecode = substr($response, 0, 3);

		if ($responsecode != '220') {
			$this->ErrorCode = $responsecode;
			$this->Error = $response;
			fclose($socket);
			return false;
		}

		// say hi!
		$data = 'EHLO ' . $this->message_id_server;
		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if (!$this->_Put_Smtp_Connection($data, $socket)) {
			$this->ErrorCode = 2;
			$this->Error = GetLang('UnableToConnectToMailServer_EHLO');
			fclose($socket);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			return false;
		}

		$response = $this->_get_response($socket);

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		$responses = explode($this->_smtp_newline, $response);
		$response = array_shift($responses);

		$responsecode = substr($response, 0, 3);
		if ($responsecode == '501') {
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got responsecode ' . $responsecode . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}
			$this->ErrorCode = 7;
			$this->Error = GetLang('UnableToConnectToMailServer_EHLO');
			return false;
		}

		// before we check for authentication, put the first response at the start of the stack.
		// just in case the first line is 250-auth login or something
		// if we didn't do this i'm sure it would happen ;)
		array_unshift($responses, $response);

		$requireauth = false;

		foreach ($responses as $line) {
			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; checking line ' . $line . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			if (preg_match('%250[\s|-]auth(.*?)login%i', $line)) {
				$requireauth = true;
				break;
			}
		}

		if ($this->Debug) {
			error_log('Line ' . __LINE__ . '; time ' . time() . '; require authentication: ' . (int)$requireauth . "\n", 3, $this->LogFile);
			if ($this->memory_limit) {
				error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
			}
		}

		if ($requireauth && $username) {
			if (!$password) {
				$this->ErrorCode = 3;
				$this->Error = GetLang('UnableToConnectToMailServer_RequiresAuthentication');
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}
			$data = "AUTH LOGIN";

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			if (!$this->_Put_Smtp_Connection($data, $socket)) {
				$this->ErrorCode = 4;
				$this->Error = GetLang('UnableToConnectToMailServer_AuthLogin');
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}

			$response = $this->_get_response($socket);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			$responsecode = substr($response, 0, 3);
			if ($responsecode != '334') {
				$this->ErrorCode = 5;
				$this->Error = GetLang('UnableToConnectToMailServer_AuthLoginNotSupported');
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}

			$data = base64_encode($username);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			if (!$this->_Put_Smtp_Connection($data, $socket)) {
				$this->ErrorCode = 6;
				$this->Error = GetLang('UnableToConnectToMailServer_UsernameNotWritten');
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}

			$response = $this->_get_response($socket);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			$responsecode = substr($response, 0, 3);
			if ($responsecode != '334') {
				$this->ErrorCode = $responsecode;
				$this->Error = $response;
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}

			$data = base64_encode($password);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Trying to put ' . $data . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			if (!$this->_Put_Smtp_Connection($data, $socket)) {
				$this->ErrorCode = 7;
				$this->Error = GetLang('UnableToConnectToMailServer_PasswordNotWritten');
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}

			$response = $this->_get_response($socket);

			if ($this->Debug) {
				error_log('Line ' . __LINE__ . '; time ' . time() . '; Got response ' . $response . "\n", 3, $this->LogFile);
				if ($this->memory_limit) {
					error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
				}
			}

			$responsecode = substr($response, 0, 3);
			if ($responsecode != '235') {
				$this->ErrorCode = $responsecode;
				$this->Error = $response;
				fclose($socket);

				if ($this->Debug) {
					error_log('Line ' . __LINE__ . '; time ' . time() . '; Got error ' . $this->Error . "\n", 3, $this->LogFile);
					if ($this->memory_limit) {
						error_log(basename(__FILE__) . "\t" . __LINE__ . "\t" . __FUNCTION__ . "\t" . number_format((memory_get_usage()/1024), 5) . "\n", 3, $this->MemoryLogFile);
					}
				}

				return false;
			}
		}

		$this->_smtp_connection = $socket;
		return $this->_smtp_connection;
	}

	/**
	* _Close_Smtp_Connection
	* Closes the smtp connection by issuing a 'QUIT' command and then forgets the smtp server connection.
	* If the smtp connection isn't valid, this will return straight away.
	*
	* @see _smtp_connection
	* @see _Put_Smtp_Connection
	*
	* @return Void Doesn't return anything.
	*/
	function _Close_Smtp_Connection()
	{
		if (is_null($this->_smtp_connection)) {
			return;
		}

		$this->_Put_Smtp_Connection('QUIT');
		fclose($this->_smtp_connection);
		$this->_smtp_connection = null;
	}

	/**
	* _get_response
	* Gets the response from the last message sent to the smtp server.
	* This is only used by smtp sending. If the connection passed in is not valid, this will return nothing.
	*
	* @param Resource $connection The smtp server connection we're trying to fetch information from. If this is not passed in, we check the _smtp_connection to see if that's available.
	*
	* @see _smtp_connection
	*
	* @return String Returns the response from the smtp server.
	*/
	function _get_response($connection=null)
	{
		if (is_null($connection)) {
			$connection = $this->_smtp_connection;
		}

		if (is_null($connection)) {
			return;
		}

		$data = "";
		while ($str = fgets($connection,515)) {
			$data .= $str;
			# if the 4th character is a space then we are done reading
			# so just break the loop
			if (substr($str,3,1) == " " || $str == "") {
				break;
			}
		}
		return trim($data);
	}

	/**
	* This is used to fix stylesheets so that class elements have a space before the "."
	* otherwise the mta strips off the dot and the stylesheet element doesn't work.
	*/
	function _FixStyles()
	{
		$matches = array();
		preg_match('%<style[^>]*>(.*)</style>%is', $this->body['h'], $matches);

		if (isset($matches[1])) {
			$new_styles = str_replace("\n.", "\n .", $matches[1]);
			$this->body['h'] = str_replace($matches[1], $new_styles, $this->body['h']);
		}
	}

	/**
	* GetImages
	* Looks for images in the content that we may need to fetch.
	* If embedimages is not enabled, this will quickly return.
	* It looks for:
	* <img src="..." tags
	* "background=..." (eg from a table background
	* ":url" from stylesheets
	* and that should be it.
	* The only way to do this is through regular expressions so this may need tweaking
	*
	* @see EmbedImages
	*
	* @return Void|Array If embedimages is not enabled or if the html body is empty, this will return nothing. If images are found, this will return an containing their urls.
	*/
	function GetImages()
	{
		if (!$this->EmbedImages) {
			return;
		}

		if (!isset($this->body['h']) || !$this->body['h']) {
			return;
		}

		$images = array();
		preg_match_all('%<img.+src\s*=\s*["\']*([^"\' >]+)["\']*.+>%isU', $this->body['h'], $matches);
		$image_matches = $matches[0];

		foreach ($image_matches as $p => $image_match) {
			#preg_match_all('%<a.+href\s*=\s*["\']*((http[^"\' >]+))["\']*>%isU', $this->body['h'], $matches);
			preg_match('%src\s*=\s*["\']*([^"\'>]+)["\']*%is', $image_match, $matches);

			if (!empty($matches[1])) {
				if (!in_array($matches[1], $images)) {
					$contentid = md5($matches[1]);
					$images[$contentid] = $matches[1];
				} else {
					$contentid = array_search($matches[1], $images);
				}
				$this->body['h'] = str_replace($matches[0], 'src="cid:' . $contentid . '"', $this->body['h']);
			}
		}
		$image_matches = array();

		preg_match_all('%background=(["\']*[^"\' >]+["\'> ])%i', $this->body['h'], $matches);

		$image_matches = $matches[0];
		foreach ($image_matches as $p => $image_match) {
			preg_match('%background\s*=\s*["\']*([^"\']+)["\']*%is', $image_match, $matches);

			if (!empty($matches[1])) {
				if (!in_array($matches[1], $images)) {
					$contentid = md5($matches[1]);
					$images[$contentid] = $matches[1];
				} else {
					$contentid = array_search($matches[1], $images);
				}
				$this->body['h'] = str_replace($matches[0], 'background="cid:' . $contentid . '"', $this->body['h']);
			}
		}
		$image_matches = array();

		preg_match_all('%:\s*url\((.*?)\)%is', $this->body['h'], $matches);

		$image_matches = $matches[0];
		foreach ($image_matches as $p => $image_match) {
			preg_match('%:\s*url\(["\']*([^"\']+)["\']*\)%is', $image_match, $matches);
			if (!empty($matches[1])) {
				if (!in_array($matches[1], $images)) {
					$contentid = md5($matches[1]);
					$images[$contentid] = $matches[1];
				} else {
					$contentid = array_search($matches[1], $images);
				}
				$this->body['h'] = str_replace($matches[0], ':url(cid:' . $contentid . ')', $this->body['h']);
			}
		}

		$image_types = array('gif', 'jpg', 'png', 'jpeg');

		preg_match_all('%url\((.*?)\)%is', $this->body['h'], $matches);

		$image_matches = $matches[0];
		foreach ($image_matches as $p => $image_match) {
			preg_match('%url\(["\']*([^"\']+)["\']*\)%is', $image_match, $matches);

			if (!empty($matches[1])) {
				if (!in_array($matches[1], $images)) {
					// if an image has 'cid:' at the start,
					// this image has already been dealt with. keep going!
					if (substr($matches[1], 0, 4) == 'cid:') {
						continue;
					}
					$image_parts = pathinfo($matches[1]);
					if (!isset($image_parts['extension']) || !in_array($image_parts['extension'], $image_types)) {
						continue;
					}
					$contentid = md5($matches[1]);
					$images[$contentid] = $matches[1];
				} else {
					$contentid = array_search($matches[1], $images);
				}
				$this->body['h'] = str_replace($matches[0], 'url(cid:' . $contentid . ')', $this->body['h']);
			}
		}

		$image_matches = array();

		return $images;
	}

	/**
	* GetImage
	* Gets an image from the url passed in and returns it as binary data to _SaveImages for saving.
	* Tries to use curl if it's available as an extension, otherwise it tries to use fopen natively and hopefully allow_url_fopen is allowed.
	*
	* @see _SaveImages
	*
	* @return Array Returns an array with a status and a message. If the url is invalid or can't be fetched, the status is false. Otherwise it contains the image data. The 2nd field in the array is either an error message or true (if the image could be fetched).
	*/
	function GetImage($url='')
	{
		if (!$url) {
			return array(false, 'No URL');
		}

		$parts = parse_url($url);

		if (!isset($parts['host'])) {
			$url = $this->_GetBaseHref() . $url;
		}

		if ($this->use_curl) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FAILONERROR, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);

			$pageData = curl_exec($ch);

			if (!$pageData) {
				$error = curl_error($ch);
			}
			curl_close($ch);

			if (!$pageData) {
				return array(false, $error);
			}
			return array($pageData, true);
		}

		if (!$this->allow_fopen) {
			return array(false, GetLang('NoCurlOrFopen'));
		}

		if (!@$fp = fopen($url, "rb")) {
			return array(false, GetLang('URLCantBeRead'));
		}

		// Grab the files content
		$pageData = "";

		while (!feof($fp)) {
			$pageData .= fgets($fp, 4096);
		}

		fclose($fp);

		return array($pageData, true);
	}

	/**
	* CleanupImages
	* This cleans up the images that _SaveImages have saved previously, and finally cleans up the temporary image directory.
	*
	* @see _SaveImages
	* @see imagedir
	*
	* @return Boolean Returns true if the cleanup worked, false otherwise.
	*/
	function CleanupImages()
	{
		if (is_null($this->imagedir) || !is_dir($this->imagedir)) {
			return false;
		}

		$all_images = list_files($this->imagedir);
		foreach ($all_images as $p => $image) {
			if ($image == 'BLANK' && $this->safe_mode) {
				continue;
			}
			@unlink($this->imagedir . '/' . $image);
		}

		if (!$this->safe_mode) {
			rmdir($this->imagedir);
		}

		return true;
	}

	/**
	* _SaveImages
	* This goes through the images in _EmbeddedImages and saves them for us to access easily when we need to add them to the content.
	* If it needs to, it will create the image directory to store the files in.
	*
	* @see _EmbeddedImages
	* @see imagedir
	* @see GetImage
	* @see _JoinImages
	*
	* @return Void Doesn't return anything. If it doesn't need to save anything, it will quickly return.
	*/
	function _SaveImages()
	{
		if (empty($this->_EmbeddedImages)) {
			return;
		}

		if (!is_dir($this->imagedir)) {
			mkdir($this->imagedir, 0777);
		}

		$new_list = array();

		foreach ($this->_EmbeddedImages as $md5 => $imageurl) {
			list($img_contents, $status) = $this->GetImage($imageurl);
			$imagefile = basename($imageurl);
			$img_parts = parse_url($imagefile);

			/*
			* for stupid "urls" in stylesheets like:
			* BEHAVIOR: url(#default#VML)
			* there is no 'path' to the url. so skip that one.
			*/
			if (!isset($img_parts['path'])) {
				unset($this->_EmbeddedImages[$md5]);
				$this->body['h'] = str_replace('cid:' . $md5, $imageurl, $this->body['h']);
				continue;
			}

			$imagefile = $img_parts['path'];

			$ext = substr($imagefile, (strrpos($imagefile, '.')+1));

			$imgfile = $this->imagedir . '/' . $imagefile;
			$imghandle = fopen($imgfile, 'wb');
			fputs($imghandle, $img_contents);
			fclose($imghandle);
			// we set "666" here in case we start a send through the popup, enable cron jobs and finish it in scheduled mode. Otherwise the job won't be able to read the file to embed it.
			@isc_chmod($imgfile, ISC_WRITEABLE_FILE_PERM);
			$new_list[$md5] = $imgfile;
		}
		$this->_EmbeddedImages = $new_list;
	}

	/**
	* _GetBaseHref
	* This gets the base href from the html content in body['h'].
	* If this is already set, this will return straight away.
	* This also cleans up the base href by removing the trailing '/' if it needs to
	*
	* @see _basehref
	* @see body
	*
	* @return String Returns the base href straight away if it has been set before, otherwise it finds it, remembers it and returns it.
	*/
	function _GetBaseHref()
	{
		if (!is_null($this->_basehref)) {
			return $this->_basehref;
		}

		$basehref = false;
		if (preg_match('%<base href\s*=\s*?(["\']*http[^"\' >]+["\']*)>%is', $this->body['h'], $matches)) {
			$basehref = $matches[1];

			$basehref = str_replace(array('"', "'"), '', $basehref);

			// make sure the base href has a / on the end so we don't need to keep checking later on.
			if (substr($basehref, -1) != '/') {
				$basehref .= '/';
			}
		}
		$this->_basehref = $basehref;
		return $basehref;
	}

	/**
	* ForgetEmail
	* Forgets the email settings ready for another send.
	*
	* @return Void Doesn't return anything.
	*/
	function ForgetEmail()
	{
		$this->body['t'] = null;
		$this->body['h'] = null;
		$this->_AssembledEmail = Array(
			'Headers' =>
				array('m' => null, 'h' => null, 't' => null),
			'Body' =>
				array('m' => null, 'h' => null, 't' => null)
		);
	#	$this->SetSmtp(false);
		$this->_sendmailparameters = null;
		$this->_AttachmentBody = '';
		$this->_ImageBody = '';
		$this->ClearAttachments();
		$this->EmbedImages = false;
		$this->_EmbeddedImages = Array();
	}

	/**
	* _utf8_encode
	* This encodes a string based on the character set in the email class.
	* This basically base64-encodes the subject or to/from 'name's so utf-8 characters
	* show up properly in an email program.
	*
	* This works around us having to require multibyte character support (mb_ functions in PHP).
	*
	* @param String $in_str The string you want to encode
	*
	* @see CharSet
	* @see _smtp_newline
	*
	* @return String Returns the encoded string
	*/
	function _utf8_encode($in_str)
	{
		$out_str = $in_str;
		if (strtolower($this->CharSet) == 'utf-8' && preg_match('/[\x00-\x08\x0b\x0c\x0e-\x1f\x7f-\xff]/', $in_str)) {
			if ($out_str) {
				// define start delimimter, end delimiter and spacer
				$end = "?=";
				$start = "=?" . $this->CharSet . "?B?";
				$spacer = $end . ' ' . $start;

				// determine length of encoded text within chunks
				// and ensure length is even
				$length = 75 - strlen($start) - strlen($end);
				$length = floor($length/4) * 4;

				// encode the string and split it into chunks
				// with spacers after each chunk
				$out_str = base64_encode($out_str);
				$out_str = chunk_split($out_str, $length, $spacer);

				// remove trailing spacer and
				// add start and end delimiters
				$spacer = preg_quote($spacer);
				$out_str = preg_replace("/" . $spacer . "$/", "", $out_str);
				$out_str = $start . $out_str . $end;
			}
		}
		return $out_str;
	}
}

?>