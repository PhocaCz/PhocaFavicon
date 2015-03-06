<?php
/*
 * @package		Joomla.Framework
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
 
defined('_JEXEC') or die();
jimport('joomla.application.component.controllerform');
jimport('joomla.client.helper');

class PhocaFaviconCpControllerPhocaFavicon extends JControllerLegacy
{
	protected	$option 	= 'com_phocafavicon';
	


	function __construct()
	{
		parent::__construct();
	//	$this->registerTask( 'create'  , 'create' );
	//	$this->registerTask( 'favicon'  , 'favicon' );
	}
	function favicon()
	{
		$msg = JText::_( 'COM_PHOCAFAVICON_SUCCESS_CREATING_FAVICON' );
		$link = 'index.php?option=com_phocafavicon';
		$this->setRedirect($link, $msg);
	}

	function create() {
		
		$post		= JRequest::get('post');
		$model		= $this->getModel( 'phocafavicon' );
		$message 	= '';
		
		if ($model->create($post['jform'], $message)) {
			$msg = JText::_( 'COM_PHOCAFAVICON_SUCCESS_CREATING_FAVICON' );
			
		} else {
			$message = PhocaFaviconHelper::setMessage($message, JText::_( 'COM_PHOCAFAVICON_ERROR_CREATING_FAVICON' ));
		}

		$link = 'index.php?option=com_phocafavicon&view=phocafavicon';
		$this->setRedirect($link, $message);
	}

	function cancel()
	{
		$link = 'index.php?option=com_phocafavicon';
		$this->setRedirect($link);
	}
}
?>
