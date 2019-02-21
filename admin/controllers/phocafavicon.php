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
		//$this->setRedirect($link, $msg);

		$app		= JFactory::getApplication();
		$app->enqueueMessage($msg, 'message');
		$app->redirect(JRoute::_($link));
	}

	function create() {

        $app		= JFactory::getApplication();
	    if (!JSession::checkToken('request')) {
            $link = 'index.php?option=com_phocafavicon&view=phocafavicon';
            $app->enqueueMessage(JText::_('JINVALID_TOKEN'), 'error');
            $app->redirect(JRoute::_($link));
        }

	    $post = array();
	    $post['jform'] = JFactory::getApplication()->input->get('jform', array(), 'raw');

		//$post		= JFactory::getApplication()->input->get('post');
		$model		= $this->getModel( 'phocafavicon' );
		$message 	= '';

		if ($model->create($post['jform'], $message)) {
			$msg = JText::_( 'COM_PHOCAFAVICON_SUCCESS_CREATING_FAVICON' );

		} else {
			$message = PhocaFaviconHelper::setMessage($message, JText::_( 'COM_PHOCAFAVICON_ERROR_CREATING_FAVICON' ));
		}

		$link = 'index.php?option=com_phocafavicon&view=phocafavicon';
		$app->enqueueMessage($message, 'message');
		$app->redirect(JRoute::_($link));
	}

	function cancel($key = NULL)
	{
		$link = 'index.php?option=com_phocafavicon';
		//$this->setRedirect($link);
		$app		= JFactory::getApplication();
		//$app->enqueueMessage($message, 'message');
		$app->redirect(JRoute::_($link));
	}
}
?>
