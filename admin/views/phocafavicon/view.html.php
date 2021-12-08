<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die();
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Toolbar\Toolbar;
jimport( 'joomla.application.component.view' );

class PhocaFaviconCpViewPhocaFavicon extends JViewLegacy
{
	protected $form;
	protected $t;

	public function display($tpl = null) {
		$this->t	= PhocaFaviconUtils::setVars('');
		$this->r	= new PhocaFaviconRenderAdminview();
		$this->form		= $this->get('Form');
		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar() {

		require_once JPATH_COMPONENT.'/helpers/phocafaviconcp.php';
		$canDo	= PhocaFaviconHelperControlPanel::getActions($this->t);

		$text = Text::_( 'COM_PHOCAFAVICON_CREATE' );
		ToolbarHelper::title( Text::_( 'COM_PHOCAFAVICON_FAVICON' ).': <small><small>[ ' . $text.' ]</small></small>' , 'wand');

		if ($canDo->get('core.create')) {
			ToolbarHelper::custom('phocafavicon.create', 'new.png', '','COM_PHOCAFAVICON_CREATE', false);
		}
		ToolbarHelper::cancel( 'phocafavicon.cancel', 'COM_PHOCAFAVICON_CLOSE' );
		ToolbarHelper::divider();
		ToolbarHelper::help( 'screen.phocafavicon', true );
	}
}
?>
