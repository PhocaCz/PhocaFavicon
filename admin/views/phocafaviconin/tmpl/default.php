<?php defined('_JEXEC') or die;

echo '<div id="j-sidebar-container" class="span2">'.JHtmlSidebar::render().'</div>';
echo '<div id="j-main-container" class="span10">'
	.'<form action="index.php" method="post" name="adminForm" id="'.$this->t['c'].'info-form">';




	echo '<div style="float:right;margin:10px;">'
	. JHTML::_('image', $this->t['i'] . 'logo-phoca.png', 'Phoca.cz' );

	echo '</div>';
	echo '<div class="ph-cpanel-logo">'.JHtml::_('image', 'media/com_phocafavicon/images/administrator/logo-phoca-favicon.png', 'Phoca.cz') . '</div>';
	echo '<h3>'.JText::_($this->t['l'].'_PHOCA_FAVICON').' - '. JText::_($this->t['l'].'_INFORMATION').'</h3>'
	.'<div style="clear:both;"></div>';

echo '<h3>'.  JText::_($this->t['l'].'_HELP').'</h3>';

echo '<p>'
.'<a href="https://www.phoca.cz/phocafavicon/" target="_blank">Phoca Favicon Main Site</a><br />'
.'<a href="https://www.phoca.cz/documentation/" target="_blank">Phoca Favicon User Manual</a><br />'
.'<a href="https://www.phoca.cz/forum/" target="_blank">Phoca Favicon Forum</a><br />'
.'</p>';

echo '<h3>'.  JText::_($this->t['l'] . '_VERSION').'</h3>'
.'<p>'.  $this->t['version'] .'</p>';

echo '<h3>'.  JText::_($this->t['l'] . '_COPYRIGHT').'</h3>'
.'<p>© 2007 - '.  date("Y"). ' Jan Pavelka</p>'
.'<p><a href="https://www.phoca.cz/" target="_blank">www.phoca.cz</a></p>';

echo '<h3>'.  JText::_($this->t['l'] . '_LICENCE').'</h3>'
.'<p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>';

echo '<h3>'.  JText::_($this->t['l'] . '_TRANSLATION').': '. JText::_($this->t['l'] . '_TRANSLATION_LANGUAGE_TAG').'</h3>'
        .'<p>© 2007 - '.  date("Y"). ' '. JText::_($this->t['l'] . '_TRANSLATER'). '</p>'
        .'<p>'.JText::_($this->t['l'] . '_TRANSLATION_SUPPORT_URL').'</p>';


echo '<input type="hidden" name="task" value="" />'
.'<input type="hidden" name="option" value="'.$this->t['o'].'" />'
.'<input type="hidden" name="controller" value="'.$this->t['c'].'info" />'
.'</form>';

echo '<p>&nbsp;</p>';

echo JHTML::_('image', $this->t['i'] . 'logo.png', 'Phoca.cz');
echo '<p>&nbsp;</p>';

echo '<div style="border-top:1px solid #eee"></div><p>&nbsp;</p>'
.'<div class="btn-group">
<a class="btn btn-large btn-primary" href="https://www.phoca.cz/version/index.php?'.$this->t['c'].'='.  $this->t['version'] .'" target="_blank"><i class="icon-loop icon-white"></i>&nbsp;&nbsp;'.  JText::_($this->t['l'].'_CHECK_FOR_UPDATE') .'</a></div>';

echo '<div style="margin-top:30px;height:39px;background: url(\''.JURI::root(true).'/media/com_'.$this->t['c'].'/images/administrator/line.png\') 100% 0 no-repeat;">&nbsp;</div>';

echo '</div>';


echo '</div>';
?>
