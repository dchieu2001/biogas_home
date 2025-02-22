<?php
/**
 * @package     gantry
 * @subpackage  features
 * @version		3.1.19 March 5, 2012
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeatureSmartLoad extends GantryFeature {
    var $_feature_name = 'smartload';

	function init() {
		global $gantry, $option;

        $ignores = explode(",",$this->get('ignores'));
        if (!is_array($ignores)) $ignores = array();

        if ($this->get('enabled') && !in_array($option,$ignores)) {

            $blank = $gantry->templateUrl.'/images/blank.gif';
            $offset = "{'x': ".$this->get('text').", 'y': ".$this->get('text')."}";
            $gantry->addScript('gantry-smartload.js');
            $gantry->addInlineScript("window.addEvent('domready', function() {new GantrySmartLoad({'offset': ".$offset.", 'placeholder': '".$blank."', 'exclusion': ['".$this->get('exclusion')."']}); });");

        }
    }

	function isOrderable() {
		return false;
	}

}