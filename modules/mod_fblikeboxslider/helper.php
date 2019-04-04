<?php

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class modFacebookslider {

static function getmodFacebookslider( $params)   {
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_fblikeboxslider/css/style.css');
$margintop = $params->get('margintop');
$fbheight = $params->get('fbheight');
$face = $params->get('face');
$stream = $params->get('stream');
$show_header = $params->get('show_header');
$show_border = $params->get('show_border');
$facebook_width= $params->get('facebook_width');
$total_width=$facebook_width+10;

        if ( $params->get( 'jquery' ) == 1){
        $document->addScript("http://code.jquery.com/jquery-latest.min.js");
        }
        else {}
    ?>

  <script type="text/javascript">
    jQuery.noConflict();
    jQuery(function (){
    jQuery(document).ready(function()
    {
    jQuery.noConflict();
    jQuery(function (){
    jQuery("#facebookbox1").hover(function(){ 
    jQuery('#facebookbox1').css('z-index',101009);
    
    <?php if($params->get('align')=='right'){?>
    
    jQuery(this).stop(true,false).animate({right:  0}, 500); },
    function(){ 
    jQuery('#facebookbox1').css('z-index',10000);
    jQuery("#facebookbox1").stop(true,false).animate({right: -<?php echo $total_width;?>}, 500); });
    });}); });
    
  <?php } else {?>
  
  jQuery(this).stop(true,false).animate({left:  0}, 500); },
    function(){ 
    jQuery('#facebookbox1').css('z-index',10000);
    jQuery("#facebookbox1").stop(true,false).animate({left:-<?php echo $total_width;?>}, 500); });
    });}); });
      
    <?php  } ?>
  </script>
	<div id="awesome_facebook">
        <div id="facebookbox1"
        
        <?php if($params->get('align')=='right'){?>
            <div style="right: -<?php echo $total_width;?>px; top: <?php echo $margintop;?>px; z-index: 10000;">
        <?php }else { ?> 
          <div style="left: -<?php echo $total_width;?>px; top: <?php echo $margintop;?>px; z-index: 10000;">
        
         <?php }?>
            <div id="facebookbox2" style="text-align: left;height:<?php echo $fbheight; ?>px;">
            
           <?php if($params->get('align')=='left'){?> 
              <img style="top: 0px;right:-47px;" src="modules/mod_fblikeboxslider/images/fb_left.png" alt="">
           <?php }else { ?>       
                <img style="top: 0px;left:-46px;" src="modules/mod_fblikeboxslider/images/fb.png" alt="">
                
            <?php }?>   
            <div id="fb-root"></div>
      <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
            </script>  
            <div class="fb-like-box" data-href="<?php echo $params->get('facebook_name');?>" <?php if ($params->get('color_schem')=='light')
             { ?>data-colorscheme="light" <?php } else { ?>data-colorscheme="dark" <?php } ?> 
             <?php if ($params->get('face')=='yes') { ?> data-show-faces="true" <?php } else {?>data-show-faces="false" <?php } ?>  <?php if ($params->get('show_header')=='yes') 
             { ?>data-header="yes" <?php } else {?>data-header="no" <?php } ?> 
             data-width="<?php echo $facebook_width;?>"  data-height="<?php echo $params->get('facebook_height');?>"
              <?php if ($params->get('stream')=='yes') { ?> data-stream="true" <?php } else { ?> data-stream="false" <?php } ?>
              <?php if ($params->get('show_border')=='yes') { ?> data-show-border="true"> <?php } else { ?> data-show-border="false" <?php } ?>
            </div>
            
            
<?php 
}
}
?>
