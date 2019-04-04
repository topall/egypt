<?php 
/**
 * ------------------------------------------------------------------------
 * JA Builder Component
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - GNU/GPL, http://www.gnu.org/licenses/gpl.html
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites: http://www.joomlart.com - http://www.joomlancers.com
 * ------------------------------------------------------------------------
 */
defined('_JEXEC') or die;

class JabuilderViewRevisions extends JViewLegacy
{
	public function display($tpl = null) {
		
		$this->items = $this->get('Items');
		
		$this->pagination = $this->get('Pagination');
		
		parent::display($tpl);
	}
}
