<?php
/**
* @Author  Mostafa Shahiri
*@license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/
 defined('_JEXEC') or die();

  $document =& JFactory::getDocument();
$document->addStyleSheet('modules/mod_instagramfetcher/css/instagramfetcher.css');
?>
 <div class="col-lg-12 padding-clear insta-list">
 <?php
 for($i=0; $i<$count; $i++) {
    echo '<div class="col-lg-2 col-xs-6 insta-padding">
  <a class="" href="'.$post[$i]->link.'" target="_blank"><div class="insta-item '.$style.'" style="background:url('.$post[$i]->images->standard_resolution->url.');background-repeat: no-repeat;background-size: cover;background-position: center center;">';
 if($like=='1')
 {
  echo '<div class="insta-like">'.$post[$i]->likes->count.'</div>';
  }
  if($comment=='1')
  {
   echo '<div class="insta-comment">'.$post[$i]->comments->count.'</div>';
   }
   if($createddate=='1')
  {
   echo '<div class="insta-createdate">'. JHtml::_('date',date('Y-m-d',$post[$i]->created_time), JText::_('DATE_FORMAT_LC3')).'</div>';
   }
  echo '</div>  </a>';
  if($caption=='1')
  {
  echo '<div class="insta-caption">'.JHTML::_('string.truncate',$post[$i]->caption->text,$limitcaption).'</div>';
  }
  echo   '</div>';
  }
        ?>
   </div>
