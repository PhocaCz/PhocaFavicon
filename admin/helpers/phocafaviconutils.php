<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

use Joomla\String\StringHelper;

defined( '_JEXEC' ) or die( 'Restricted access' );
class PhocaFaviconUtils
{
	public static function setVars( $task = '') {

		$a			= array();
		$app		= JFactory::getApplication();
		$a['o'] 	= htmlspecialchars(strip_tags($app->input->get('option')));
		$a['c'] 	= str_replace('com_', '', $a['o']);
		$a['n'] 	= 'Phoca' . ucfirst(str_replace('com_phoca', '', $a['o']));
		$a['l'] 	= strtoupper($a['o']);
		$a['i']		= 'media/'.$a['o'].'/images/administrator/';
		$a['ja']	= 'media/'.$a['o'].'/js/administrator/';
		$a['jf']	= 'media/'.$a['o'].'/js/';
		$a['s']		= 'media/'.$a['o'].'/css/administrator/'.$a['c'].'.css';
		$a['task']	= $a['c'] . htmlspecialchars(strip_tags($task));
		$a['tasks'] = $a['task']. 's';
		return $a;
	}

    public static function filterValue($string, $type = 'html') {

		switch ($type) {

			case 'url':
				return rawurlencode($string);
			break;

			case 'number':
				return preg_replace( '/[^.0-9]/', '', $string );
			break;

			case 'number2':
				//return preg_replace( '/[^0-9\.,+-]/', '', $string );
				return preg_replace( '/[^0-9\.,-]/', '', $string );
			break;

			case 'alphanumeric':
				return preg_replace("/[^a-zA-Z0-9]+/", '', $string);
			break;

			case 'alphanumeric2':
				return preg_replace("/[^\\w-]/", '', $string);// Alphanumeric plus _  -
			break;

			case 'alphanumeric3':
				return preg_replace("/[^\\w.-]/", '', $string);// Alphanumeric plus _ . -
			break;

			case 'folder':
			case 'file':
				$string =  preg_replace('/[\"\*\/\\\:\<\>\?\'\|]+/', '', $string);
				return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
			break;

			case 'folderpath':
			case 'filepath':
				$string = preg_replace('/[\"\*\:\<\>\?\'\|]+/', '', $string);
				return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
			break;

			case 'text':
				return htmlspecialchars(strip_tags($string), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
			break;

			case 'html':
			default:
				return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
			break;

		}

    }

	public static function wordDelete($string,$length,$end = '...') {
		if (StringHelper::strlen($string) < $length || StringHelper::strlen($string) == $length) {
			return $string;
		} else {
			return StringHelper::substr($string, 0, $length) . $end;
		}
	}

	public static function correctSizeWithRate($width, $height, $corWidth = 100, $corHeight = 100) {
		$image['width']		= $corWidth;
		$image['height']	= $corHeight;



		if ($width > $height) {
			if ($width > $corWidth) {
				$image['width']		= $corWidth;
				$rate 				= $width / $corWidth;
				$image['height']	= $height / $rate;
			} else {
				$image['width']		= $width;
				$image['height']	= $height;
			}
		} else {
			if ($height > $corHeight) {
				$image['height']	= $corHeight;
				$rate 				= $height / $corHeight;
				$image['width'] 	= $width / $rate;
			} else {
				$image['width']		= $width;
				$image['height']	= $height;
			}
		}
		return $image;
	}
}
?>
