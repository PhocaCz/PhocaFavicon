<?php
/*
 * @package Joomla
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
jimport( 'joomla.filesystem.file' );
$image['width'] = $image['height'] = 100;

?><div class="ph-item-box">
    <div class="ph-item-image"><a title="<?php echo $this->_tmp_img->name ?>" href="#" onclick="if (window.parent) window.parent.<?php echo $this->fce; ?>('<?php echo $this->_tmp_img->path_with_name_relative_no;; ?>');"><?php


	        echo HTMLHelper::_( 'image', $this->_tmp_img->linkthumbnailpath, '', array('width' => $image['width'], 'height' => 'auto'), '', null);

            ?></a></div>

	    <div class="ph-item-name" title="<?php echo $this->_tmp_img->name ?>"><?php echo PhocaFaviconUtils::WordDelete($this->_tmp_img->name, 15); ?></div>

        <div class="ph-item-action-box">
			<a href="#" onclick="if (window.parent) window.parent.<?php echo $this->fce; ?>('<?php echo $this->_tmp_img->path_with_name_relative_no;; ?>');" title="<?php echo Text::_('COM_PHOCAFAVICON_INSERT_IMAGE') ?>"><span class="ph-cp-item"><i class="phi duotone phi-fs-m phi-fc-gd icon-download"></i></span></a></div>
</div>
