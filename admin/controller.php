<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
jimport('joomla.application.component.controller');
$app		= JFactory::getApplication();
$option 	= $app->input->get('option');

$l['cp']	= array('COM_PHOCAFAVICON_CONTROL_PANEL', '');
$l['cf']	= array('COM_PHOCAFAVICON_CREATE_FAVICON', 'phocafavicon');
$l['in']	= array('COM_PHOCAFAVICON_INFO', 'phocafaviconin');

// Submenu view
//$view	= JFactory::getApplication()->input->get( 'view', '', '', 'string', JREQUEST_ALLOWRAW );
//$layout	= JFactory::getApplication()->input->get( 'layout', '', '', 'string', JREQUEST_ALLOWRAW );
$view	= JFactory::getApplication()->input->get('view');
$layout	= JFactory::getApplication()->input->get('layout');

if ($layout == 'edit') {
} else {
	foreach ($l as $k => $v) {

		if ($v[1] == '') {
			$link = 'index.php?option='.$option;
		} else {
			$link = 'index.php?option='.$option.'&view=';
		}

		if ($view == $v[1]) {
			//HtmlSidebar::addEntry(Text::_($v[0]), $link.$v[1], true );
		} else {
			//HtmlSidebar::addEntry(Text::_($v[0]), $link.$v[1]);
		}
	}
}
class phocaFaviconCpController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = array()) {
		parent::display();
	}
}
