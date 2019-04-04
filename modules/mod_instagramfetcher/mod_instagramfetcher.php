<?php
/**
* @Author  Mostafa Shahiri
*@license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/
defined('_JEXEC') or die();
if(!defined('DS'))
{  define('DS',DIRECTORY_SEPARATOR);
}
// Include the helper class
require_once dirname(__FILE__) . DS . 'helper.php';
jimport( 'joomla.application.module.helper' );

$count=htmlspecialchars($params->get('count'));
$like=$params->get('like');
$comment=$params->get('comment');
$createddate=$params->get('createddate');
$caption=$params->get('caption');
$limitcaption=$params->get('limitcaption',0);
$imagestyle=$params->get('imagestyle');
if($imagestyle=='1')
{$style="insta-style1";
}
elseif($imagestyle=='2')
{ $style="insta-style2";
}
elseif($imagestyle=='3')
{ $style="insta-style3";
}
elseif($imagestyle=='4')
{ $style="insta-style4";
}
elseif($imagestyle=='5')
{ $style="insta-style5";
}

$post=&modInstagramfetcherHelper::Fetchdata($params);

// Display the template
require(JModuleHelper::getLayoutPath('mod_instagramfetcher'));

?>