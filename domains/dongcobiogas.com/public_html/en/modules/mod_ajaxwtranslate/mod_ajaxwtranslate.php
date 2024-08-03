<?php
/**
 * Module to translate the text using ajax technology from googla
 *
 * @version 1.0
 * @author Dima Kuprijanov (ageent.ua@gmail.com)
 * @copyright (C) 2010 by Dima Kuprijanov (http://www.ageent.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
 
defined('_JEXEC') or die('Restricted access');
global $mainframe;

JLoader::import('helper', dirname( __FILE__ ), 'jfmodule');


$type = trim( $params->get( 'type', 'fallindown' ));
$layout = JModuleHelper::getLayoutPath('mod_ajaxwtranslate',$type);
$show_active=intval( $params->get( 'show_active', 1 ) );
$fallindowntwo=$params->get( 'fallindow_two', "click" );
$effect=$params->get( 'effect', "slideDown" );
$translator=$params->get( 'translator','Translator');
$use_cookie=$params->get( 'use_cookie', 1);
$method=$params->get( 'method', "standard");
$not_translator=$params->get( 'not_translator', 1);
$identify_lang=$params->get( 'identify_lang', 0);
$effect_img=$params->get( 'effect_img', "opacity");
$lang = JComponentHelper::getParams('com_languages');
$lang=$lang->get("site", 'en-GB');
if(!empty($lang)) {
    $lang=substr($lang,0,2);
} 
if($identify_lang==1) $lang="";

preg_match_all("/show_(.*?)=(.*)/i",$params->_raw, $out, PREG_PATTERN_ORDER);
$array_languages=array();
foreach($out[1] as $key=>$val) {
    $array_languages[$val]=$out[2][$key];
}
$hide_panel=$params->get( 'hide_panel', 0);

$lang_country_array = array('en'=>'English','ar'=>'Arabic','bg'=>'Bulgarian','hr'=>'Croatian','cs'=>'Czech','da'=>'Danish','nl'=>'Dutch','fi'=>'Finnish','fr'=>'French','de'=>'German','el'=>'Greek','hi'=>'Hindi','it'=>'Italian','ja'=>'Japanese','ko'=>'Korean','no'=>'Norwegian','pl'=>'Polish','pt'=>'Portuguese','ro'=>'Romanian','ru'=>'Russian','es'=>'Spanish','sv'=>'Swedish','ca'=>'Catalan','tl'=>'Filipino','iw'=>'Hebrew','id'=>'Indonesian','lv'=>'Latvian','lt'=>'Lithuanian','sr'=>'Serbian','sk'=>'Slovak','sl'=>'Slovenian','uk'=>'Ukrainian','vi'=>'Vietnamese','sq'=>'Albanian','et'=>'Estonian','gl'=>'Galician','hu'=>'Hungarian','mt'=>'Maltese','th'=>'Thai','tr'=>'Turkish','fa'=>'Persian','af'=>'Afrikaans','ms'=>'Malay','sw'=>'Swahili','ga'=>'Irish','cy'=>'Welsh','be'=>'Belarusian','is'=>'Icelandic','mk'=>'Macedonian','yi'=>'Yiddish','hy'=>'Armenian','az'=>'Azerbaijani','eu'=>'Basque','ka'=>'Georgian','ht'=>'Haitian Creole','ur'=>'Urdu','zh-CN'=>'Chinese (S)','zh-TW'=>'Chinese (T)');

foreach($array_languages as $key=>$val) {
    if($val==2) {
        if (array_key_exists($key, $lang_country_array)) {
           unset($lang_country_array[$key]);
        }
    }
}

require($layout);

$header='  <link rel="stylesheet" href="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/mod_ajaxwtranslate.css" type="text/css" />'."\n";
if($params->get( 'include_jquery', 1)) {
        if($type=="select_list" || $type=="beautiful_select_list") {
            $header.="  <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>\n";
        } else {
            $header.="  <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>\n";
        }
}

$header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/jquery-translate.js"></script>'."\n";

if($type=="beautiful_select_list") {
    $header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/custom-form-elements.js"></script>'."\n";
}
if($type=="fallindown") {
switch ($fallindowntwo) {
    case "click":
        switch ($effect) {
            case "slideDown":
                $header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/click_slidedown.js"></script>'."\n";
            break;
            case "fadeIn":
                $header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/click_fedein.js"></script>'."\n";
            break;
        }
    break;
    case "move_mouse":
        switch ($effect) {
            case "slideDown":
                $header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/mouse_slidedown.js"></script>'."\n";
            break;
            case "fadeIn":
                $header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/mouse_fedein.js"></script>'."\n";
            break;
        }
    break;
}
} elseif($type=="blackbar") {
        $header.='  <script type="text/javascript" src="'.JURI::base().'modules/mod_ajaxwtranslate/tmpl/js/blackbar.js"></script>'."\n";
}
        $header.='  <!-- Copyright AjaxWtranslate  http://www.ageent.ru -->'."\n";
$mainframe->addCustomHeadTag($header);
?>