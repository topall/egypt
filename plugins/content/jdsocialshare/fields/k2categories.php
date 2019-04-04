<?php
/**
 * @package	JD Social Share
 * @version	1.0
 * @author	joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_PLATFORM') or die;
class JFormFieldK2categories extends JFormField
{
    protected $type = 'K2categories'; 

    protected function getInput()
	{
		$value = $this->value;
		if(!is_array($value))
		$value = array();
	
		jimport( 'joomla.filesystem.file' );		
		$k2file = JPATH_BASE.'/components/com_k2/k2.php';		
		if(JFile::exists($k2file)){
			$db    =  JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__k2_categories'));
			$query->where($db->quoteName('published') . ' = 1');
			$query->order('ordering ASC');
			$db->setQuery($query);
			$rows = $db->loadObjectList();
		}else{
			$rows = array();
		}
		
		$options = '';
		$options .= '<select id="'.$this->id.'" name="'.$this->name.'" multiple="multiple" >';
		foreach($rows as $row){
				$selected = (in_array($row->id,$value)) ? 'selected="selected"' : '';
                $options .= '<option '.$selected.' value="'.$row->id.'" >'.$row->name.'</option>';
         }
		$options .= '</select>';	
		return $options; 
	} 
}