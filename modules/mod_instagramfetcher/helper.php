<?php
/**
* @Author  Mostafa Shahiri
*@license	GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/
defined('_JEXEC') or die();

class modInstagramfetcherHelper{
public static function &Fetchdata(&$params){
  $token=$params->get('token');
  $customcaption=$params->get('custom');
  $url="https://api.instagram.com/v1/users/self/media/recent/?access_token=$token";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  $result = curl_exec($ch);
  curl_close($ch);
  $result = json_decode($result);
  $post = $result->data;
 if(trim($customcaption)!="")
 {
 $custom=explode('@#',$customcaption);
   for($i=0;$i<count($post);$i++)
   {
   $post[$i]->caption->text=$custom[$i];
   }
 }
  return $post;
}


}