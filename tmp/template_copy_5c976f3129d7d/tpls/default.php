<?php
/**
 * ------------------------------------------------------------------------
 * JA Mason Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
*/


defined('_JEXEC') or die;

$tempEffect = '';
if($this->params->get('enable-effect')) {
  $tempEffect = 'enable-effect';
};

$menuType = 'menu-horizontal';
if($this->params->get('nav-type')) {
  $menuType = 'menu-vertical';
};

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"
	  class='<jdoc:include type="pageclass" />'>

<head>
	<jdoc:include type="head" />
	<?php $this->loadBlock('head') ?>
</head>

<body>

<div class="t3-wrapper <?php echo $tempEffect.' '.$menuType ;?>"> <!-- Need this wrapper for off-canvas menu. Remove if you don't use of-canvas -->

  <?php $this->loadBlock('header') ?>

  <?php $this->loadBlock('slideshow') ?>

  <?php $this->loadBlock('masthead') ?>

  <?php $this->loadBlock('sections-top') ?>

  <?php $this->loadBlock('mainbody') ?>

  <?php $this->loadBlock('sections-bottom') ?>

  <?php $this->loadBlock('navhelper') ?>

  <?php $this->loadBlock('footer') ?>

</div>

</body>

</html>