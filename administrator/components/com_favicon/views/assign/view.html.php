<?php

/**
 * @version		$Id: view.html.php 17071 2010-05-15 08:03:01Z chdemko $
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
jimport('joomla.filesystem.folder');
require_once(JPATH_COMPONENT . '/models/favicon.php');
require_once(JPATH_COMPONENT . '/models/favicons.php');

/**
 * View to edit a style.
 */
class FaviconViewAssign extends JViewLegacy {

	protected $form;
	public $id;
	public $icon;
	public $icons;
	public $iconkey;
	public $plugin;

	/**
	 * Display the view
	 */
	public function display($tpl = null) {
		$input = JFactory::getApplication()->input;
		if ($input->get('closewindow', false) == 'true')
		{
			JFactory::getDocument()->addScriptDeclaration("window.addEvent('domready',function(){ window.parent.location.reload(true); });");
		}
		$input->set('tmpl', 'component');
		$this->id = $input->get('id');
		$this->icons = JFolder::folders(JPATH_ROOT . '/media/com_favicon/icons');
		$faviconmodel = new FaviconModelFavicon;
		$this->iconkey = $faviconmodel->get16($faviconmodel->getIcon($this->id));
		$faviconsmodel = new FaviconModelFavicons;
		$this->plugin = json_decode($faviconsmodel->plugin->params, true);
		$this->form = $this->get('Form');
		$this->colorizeAssignments();
		parent::display($tpl);
	}

	private function colorizeAssignments() {
		$a = new stdClass();
		if (!is_array($this->plugin['assignments']))
			$this->plugin['assignments'] = array();
		foreach ($this->plugin['assignments'] as $icon => $assignment)
		{
			$assignments = array();
			foreach ($assignment as $menuitem)
			{
				$assignments[] = (int)$menuitem;
			}
			$a->{$icon} = $assignments;
		}
		JHtml::_('jquery.framework');
		$config = JFactory::getConfig();
		$menu = JMenu::getInstance('site');
		$doc = JFactory::getDocument();
		$doc->addScriptOptions('com_favicon_options',array(
			'icondefault'=>isset($this->plugin['default']) ? $this->plugin['default'] : false,
			'icons'=>array_map(function($i){return (int)$i;},$this->icons),
			'assignments'=>$a,
			'menus'=>array_map(function($item){return array('i'=>(int)$item->id,'p'=>(int)$item->parent_id);},$menu->getItems(null,null))
		));
		$doc->addScript(JURI::root(true).'/media/com_favicon/assets/js/assign.class'.($config->get('debug')?'':'.min').'.js',array('version'=>'auto'));
	}

}
