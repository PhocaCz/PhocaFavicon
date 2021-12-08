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

class PhocaFaviconCpViewPhocaFaviconIn extends JViewLegacy
{
	protected $t;
	protected $r;

	public function display($tpl = null) {
		$this->t	= PhocaFaviconUtils::setVars('phocafaviconin');
		$this->r	= new PhocaFaviconRenderAdminview();
		$this->t['component_head'] 	= 'COM_PHOCAFAVICON_PHOCA_FAVICON';
		$this->t['component_links']	= $this->r->getLinks(1);
		$this->t['version'] = PhocaFaviconHelper::getPhocaVersion('com_phocafavicon');
		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar() {
		ToolbarHelper::title( Text::_( 'COM_PHOCAFAVICON_PF_INFO' ), 'info.png' );

		$bar = Toolbar::getInstance( 'toolbar' );
		$dhtml = '<a href="index.php?option=com_phocafavicon" class="btn btn-small"><i class="icon-home-2" title="'.Text::_('COM_PHOCAFAVICON_CONTROL_PANEL').'"></i> '.Text::_('COM_PHOCAFAVICON_CONTROL_PANEL').'</a>';
		$bar->appendButton('Custom', $dhtml);


		//JToolbarHelper::cancel( 'phocafavicon.cancel', 'COM_PHOCAFAVICON_CLOSE' );
		ToolbarHelper::divider();
		ToolbarHelper::help( 'screen.phocafavicon', true );
	}
}
?>
