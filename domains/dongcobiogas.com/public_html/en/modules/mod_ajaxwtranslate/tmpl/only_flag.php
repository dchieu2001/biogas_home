<?php 
/**
 * Module to translate the text using ajax technology from googla
 *
 * @version 1.0
 * @author Dima Kuprijanov (ageent.ua@gmail.com)
 * @copyright (C) 2010 by Dima Kuprijanov (http://www.ageent.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
// no direct access

defined('_JEXEC') or die('Restricted access');

echo "<div id='image_list'>";
foreach($lang_country_array as $key=>$val) {
    $action=$array_languages[$key];
    if($action==1) echo '<a class="languagelink" href="" onclick="return false;" name="'.$key.'"><img height="32" width="46" alt="'.$val.'" src="'.JURI::root().'/modules/mod_ajaxwtranslate/tmpl/images/'.$key.'.gif" /></a>'; 
}
echo "</div>";

echo '<select id="pleaseTranslate" name="'.$lang.'" style="display:none;">';
echo '<option value="">Select Language</option>';
echo "</select>";
if($method=="standard") echo '<div id="type_work" style="display:none;">Redirect</div>';
if($method=="new-windows") echo '<div id="type_work" style="display:none;">new windows</div>';
if($use_cookie!=1) echo '<div id="use_cookie" style="display:none;">cookie</div>';
if(!empty($not_translator)) echo '<div id="not_translator" style="display:none;">'.$not_translator.'</div>';
echo '<div id="ajaxeffect_img" style="display:none;">'.$effect_img.'</div>';