<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;


$class		= $this->r;
$r 			=  new $class();


$js ='
Joomla.submitbutton = function(task) {
	if (task == "'. $this->t['task'] .'.cancel" || document.formvalidator.isValid(document.getElementById("adminForm"))) {
		Joomla.submitform(task, document.getElementById("adminForm"));
	} else {
		Joomla.renderMessages({"error": ["'. Text::_('JGLOBAL_VALIDATION_FORM_FAILED', true).'"]});
	}
}
';
JFactory::getDocument()->addScriptDeclaration($js);

echo $r->startForm($this->t['o'], $this->t['task'], 1, 'adminForm', 'adminForm');
// First Column
echo '<div class="span12 form-horizontal">';
$tabs = array (
'general' 		=> Text::_($this->t['l'].'_GENERAL_OPTIONS')
);
echo $r->navigation($tabs);

echo $r->startTabs();

echo $r->startTab('general', $tabs['general'], 'active');
$formArray = array ('template', 'filename');
echo $r->group($this->form, $formArray);

echo '<div class="clearfix"></div>';
echo '<div class="alert alert-info alert-dismissible fade show">';
echo '';
echo Text::_( 'COM_PHOCAFAVICON_INFO_TEXT' ).'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="'.Text::_('COM_PHOCAFAVICON_CLOSE').'"></button></div>';

echo $r->endTab();
echo $r->endTabs();
echo '</div>';//end span10

echo $r->formInputs();
echo $r->endForm();
?>
