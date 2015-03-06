<?php
/*
 * @package		Joomla.Framework
 * @copyright	Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
jimport( 'joomla.filesystem.folder' );

class com_phocafaviconInstallerScript
{
	function install($parent) {
		
		$folder[0][0]	=	'images' . DS . 'phocafavicon' . DS ;
		$folder[0][1]	= 	JPATH_ROOT . DS .  $folder[0][0];
		
		$message = '';
		$error	 = array();
		foreach ($folder as $key => $value)
		{
			if (!JFolder::exists( $value[1]))
			{
				if (JFolder::create( $value[1], 0755 ))
				{
					
					$data = "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>";
					JFile::write($value[1].DS."index.html", $data);
					$message .= '<div><b><span style="color:#009933">Folder</span> ' . $value[0] 
							   .' <span style="color:#009933">created!</span></b></div>';
					$error[] = 0;
				}	 
				else
				{
					$message .= '<div><b><span style="color:#CC0033">Folder</span> ' . $value[0]
							   .' <span style="color:#CC0033">creation failed!</span></b> Please create it manually.</div>';
					$error[] = 1;
				}
			}
			else//Folder exist
			{
				$message .= '<div><b><span style="color:#009933">Folder</span> ' . $value[0] 
							   .' <span style="color:#009933">exists!</span></b></div>';
				$error[] = 0;
			}
		}
		$parent->getParent()->setRedirectURL('index.php?option=com_phocafavicon');
	}
	function uninstall($parent) {
	}

	function update($parent) {

		$folder[0][0]	=	'images' . DS . 'phocafavicon' . DS ;
		$folder[0][1]	= 	JPATH_ROOT . DS .  $folder[0][0];
		
		$message = '';
		$error	 = array();
		foreach ($folder as $key => $value)
		{
			if (!JFolder::exists( $value[1]))
			{
				if (JFolder::create( $value[1], 0755 ))
				{
					
					$data = "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>";
					JFile::write($value[1].DS."index.html", $data);
					$message .= '<div><b><span style="color:#009933">Folder</span> ' . $value[0] 
							   .' <span style="color:#009933">created!</span></b></div>';
					$error[] = 0;
				}	 
				else
				{
					$message .= '<div><b><span style="color:#CC0033">Folder</span> ' . $value[0]
							   .' <span style="color:#CC0033">creation failed!</span></b> Please create it manually.</div>';
					$error[] = 1;
				}
			}
			else//Folder exist
			{
				$message .= '<div><b><span style="color:#009933">Folder</span> ' . $value[0] 
							   .' <span style="color:#009933">exists!</span></b></div>';
				$error[] = 0;
			}
		}
		
		$msg =  JText::_('COM_PHOCAFAVICON_UPDATE_TEXT');
		$msg .= ' (' . JText::_('COM_PHOCAFAVICON_VERSION'). ': ' . $parent->get('manifest')->version . ')';
		$app		= JFactory::getApplication();
		$app->redirect(JRoute::_('index.php?option=com_phocafavicon'), $msg);
	}

	function preflight($type, $parent) {}

	function postflight($type, $parent)  {}
}