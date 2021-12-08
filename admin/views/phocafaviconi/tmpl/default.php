<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die('Restricted access'); ?>

<?php
echo '<div class="ph-item-list-box ph-item-list-box-admin">';
echo $this->loadTemplate('up');

?>
<?php if (count($this->images) > 0 || count($this->folders) > 0) { ?>
		<?php for ($i=0,$n=count($this->folders); $i<$n; $i++) :
			$this->setFolder($i);
			echo $this->loadTemplate('folder');
		endfor; ?>

		<?php for ($i=0,$n=count($this->images); $i<$n; $i++) :
			$this->setImage($i);
			echo $this->loadTemplate('image');
		endfor; ?>

<?php } else { ?>
<div>
	<div style="clear:both;font-size:large;font-weight:bold;color:#b3b3b3;font-family: Helvetica, sans-serif;">
		<?php echo Text::_( 'COM_PHOCAFAVICON_THERE_IS_NO_IMAGE' ); ?>
	</div>
</div>
<?php } ?>

</div>

<?php echo '<div class="ph-item-list-box-hr"></div>'; ?>



<?php
	echo $this->loadTemplate('upload');
?>
