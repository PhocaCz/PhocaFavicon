<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die();
jimport( 'joomla.application.component.view' );

class PhocaFaviconCpViewPhocaFaviconIn extends JViewLegacy
{
	protected $t;
	
	public function display($tpl = null) {
		$this->t	= PhocaFaviconUtils::setVars('phocafaviconin');
		JHTML::stylesheet( $this->t['s'] );
		$this->t['version'] = PhocaFaviconHelper::getPhocaVersion('com_phocafavicon');
		$this->addToolbar();
		parent::display($tpl);
	}
	
	protected function addToolbar() {
		JToolBarHelper::title( JText::_( 'COM_PHOCAFAVICON_PF_INFO' ), 'info.png' );
		JToolBarHelper::cancel( 'phocafavicon.cancel', 'COM_PHOCAFAVICON_CLOSE' );
		JToolBarHelper::divider();
		JToolBarHelper::help( 'screen.phocafavicon', true );
	}
}
?>
