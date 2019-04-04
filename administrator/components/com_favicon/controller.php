<?php

/**
 * @copyright	Copyright (C) 2005 - 2010 Michael Richey. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');
require_once(JPATH_COMPONENT . '/helpers/favicon.php');

/**
 * Favicon master display controller.
 *
 * @package		Favicon
 * @subpackage	com_favicon
 * @since		1.6
 */
class FaviconController extends JControllerLegacy {

	/**
	 * Method to display a view.
	 */
	public function display($cachable = false, $urlparams = array()) {
		$input = JFactory::getApplication()->input;
		if (!$input->get('view')) {
			$input->set('view', 'favicons');
		}
		parent::display($cachable, $urlparams);
		// Load the submenu.
		FaviconHelper::addSubmenu($input->get('view', 'favicons', 'WORD'));
	}

}
