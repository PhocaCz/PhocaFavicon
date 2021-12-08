<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');


if (!Factory::getUser()->authorise('core.manage', 'com_phocafavicon')) {
	throw new Exception(Text::_('JERROR_ALERTNOAUTHOR'), 404);
}

require JPATH_ADMINISTRATOR . '/components/com_phocafavicon/libraries/autoloadPhoca.php';
require_once( JPATH_COMPONENT.'/controller.php' );
require_once( JPATH_COMPONENT.'/helpers/phocafaviconrenderadmin.php' );
require_once( JPATH_COMPONENT.'/helpers/phocafavicon.php' );
require_once( JPATH_COMPONENT.'/helpers/phocafaviconico.php' );
require_once( JPATH_COMPONENT.'/helpers/phocafaviconcp.php' );
require_once( JPATH_COMPONENT.'/helpers/phocafaviconfileupload.php' );
require_once( JPATH_COMPONENT.'/helpers/phocafaviconutils.php' );
require_once( JPATH_COMPONENT.'/helpers/renderadminview.php' );
require_once( JPATH_COMPONENT.'/helpers/renderadminviews.php' );
jimport('joomla.application.component.controller');
$controller	= JControllerLegacy::getInstance('PhocaFaviconCp');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
?>
