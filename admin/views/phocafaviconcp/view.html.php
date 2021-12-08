<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Toolbar\Toolbar;
jimport( 'joomla.application.component.view' );


class PhocaFaviconCpViewPhocaFaviconCp extends JViewLegacy
{
	protected $t;
	protected $r;
	protected $views;

	public function display($tpl = null) {

		$this->t	= PhocaFaviconUtils::setVars('cp');
		$this->r	= new PhocaFaviconRenderAdminview();
		$i = ' icon-';
		$d = 'duotone ';

		$this->views= array(
		''		=> array($this->t['l'] . '_CREATE_FAVICON', $d.$i.'click', '#9900CC'),
		'in'		=> array($this->t['l'] . '_INFO', $d.$i.'info-circle', '#3378cc')
		);

		$this->t['version'] = PhocaFaviconHelper::getPhocaVersion('com_phocafavicon');

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar() {
		require_once JPATH_COMPONENT.'/helpers/phocafaviconcp.php';

		$state	= $this->get('State');
		$canDo	= PhocaFaviconHelperControlPanel::getActions($this->t);
		JToolbarHelper::title( JText::_( 'COM_PHOCAFAVICON_PF_CONTROL_PANEL' ), 'home-2 cpanel' );

		$bar = JToolbar::getInstance( 'toolbar' );
		$dhtml = '<a href="index.php?option=com_phocafavicon" class="btn btn-small"><i class="icon-home-2" title="'.Text::_('COM_PHOCAFAVICON_CONTROL_PANEL').'"></i> '.Text::_('COM_PHOCAFAVICON_CONTROL_PANEL').'</a>';
		$bar->appendButton('Custom', $dhtml);

		if ($canDo->get('core.admin')) {
			JToolbarHelper::preferences('com_phocafavicon');
			JToolbarHelper::divider();
		}

		JToolbarHelper::help( 'screen.phocafavicon', true );
	}
}
?>
