<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( dirname(__FILE__).'/'.'helper.php' );
$facebookslider = modFacebookslider::getmodFacebookslider( $params);
require( JModuleHelper::getLayoutPath( 'mod_fblikeboxslider' ) );
//require JModuleHelper::getLayoutPath('mod_twitterslider', $params->get('layout', 'default'));



?>