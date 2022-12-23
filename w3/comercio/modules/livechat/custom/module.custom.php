<?php
/**
 * Custom live chat integration module for Interspire Shopping Cart.
 */
class LIVECHAT_CUSTOM extends ISC_LIVECHAT
{
	/**
	 * Constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->SetName(GetLang('CustomName'));
		$this->SetHelpText(GetLang('CustomHelp'));
	}
	
	/**
	 * Define the configurable settings for the custom live integration.
	 */
	public function SetCustomVars()
	{
		$this->_variables['livechatcode'] = array(
			'name' => GetLang('CustomLiveChatCode'),
			'type' => 'textarea',
			'help' => GetLang('CustomLiveChatCodeHelp'),
			'default' => '',
			'required' => true
		);

		$this->_variables['position'] = array(
			'name' => GetLang('CustomPosition'),
			'type' => 'dropdown',
			'help' => GetLang('CustomPositionHelp'),
			'default' => 'panel',
			'options' => array(
				GetLang('CustomPositionTop') => 'header',
				GetLang('CustomPositionSide') => 'panel'
			),
			'required' => true
		);
	}
	
	/**
	 * Get the live chat tracking code for this module for the specified page position.
	 *
	 * @param string The position (header or panel) to fetch the tracking code for. If not the position that's
	 *				 enabled for this module, then this method should return an empty string.
	 * @return string String containing the live chat code.
	 */
	public function GetLiveChatCode($position)
	{
		if($position == $this->GetValue('position')) {
			return $this->GetValue('livechatcode');
		}
	}
}
?>