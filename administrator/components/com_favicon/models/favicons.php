<?php

/**
 * @copyright	Copyright (C) 2010 Michael Richey. All rights reserved.
 * @license		GNU General Public License version 3; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class FaviconModelFavicons extends JModelAdmin {

	public $plugin;

	public function __construct($config = array()) { 
		$this->plugin = self::getPluginInfo(); 
		parent::__construct($config); 
	}

	public function getForm($data = array(), $loadData = true) { 
		return;
	}

	public function getPluginInfo() { 
		$db = JFactory::getDbo(); 
		$query = $db->getQuery(true); 
		$query->select('extension_id,params')->from('#__extensions')->where('name = "plg_system_favicon"')->where('enabled = 1'); 
		$db->setQuery($query);
		$result = $db->loadObject();
		return $result;
	}

	public function setPluginInfo($id, $params = array()) { 
		if(array_key_exists('assignments',$params) && $params['assignments'] == '{"scalar":"{}"}') unset($params['assignments']); 
		$o = new stdClass(); 
		$o->extension_id = $id; 
		$o->params = json_encode((object) $params); 
		return JFactory::getDbo()->updateObject('#__extensions', $o, 'extension_id');
	}

	public function setdefault($id) { 
		$plugin = $this->getPluginInfo(); 
		$params = json_decode($plugin->params, true); 
		if (!is_array($params)) { 
			$params = array();
		} 
		$params = $this->setDefaultParam($params, $id); 
		if (isset($params['assignments']) && isset($params['assignments'][$id]))
		{ 
			$params = $this->removeAssignmentParams($params, $id);
		} 
		return $this->setPluginInfo($plugin->extension_id, $params);
	}

	public function setDefaultParam($params, $id) { 
		$params['default'] = $id; 
		return $params;
	}

	public function removeAssignmentParams($params, $id) { 
		if (is_array($params['assignments']) && array_key_exists($id, $params['assignments'])) { 
			unset($params['assignments'][$id]);
		} 
		return $params;
	}

	public function deleteIcon($id) { 
		$plugin = $this->getPluginInfo(); 
		$params = json_decode($plugin->params, true); 
		$params = $this->removeAssignmentParams($params, $id); 
		if (array_key_exists('default',$params) && $params['default'] == $id) { 
			unset($params['default']);
		} 
		$this->setPluginInfo($plugin->extension_id, $params); 
		$path = JPATH_ROOT . '/media/com_favicon/icons/' . $id; 
		if (JFolder::exists($path))
		{ 
			return (JFolder::delete($path));
		}
		else
		{ 
			return false;
		} 
	}

}
