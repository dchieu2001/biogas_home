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
class GantryFeatureIE6Warn extends GantryFeature {
    var $_feature_name = 'ie6warn';
	
	function isInPosition($position) {
        return false;
    }
	function isOrderable(){
		return false;
	}
	
	function init() {
		global $gantry;
		
		if ($gantry->browser->name == 'ie' && $gantry->browser->shortversion == '6') {
			if ($this->get('enabled')) {
				$gantry->addScript('gantry-ie6warn.js');
				$gantry->addInlineScript($this->_ie6Warn());
			}
		}
	}
	
	function _ie6Warn() {
		global $gantry;
		
		$delay = $this->get('delay');
		$msg = $gantry->ie6Warning;
		
		$js = "
			window.addEvent('domready', function() {
				if (window.ie6) { (function() {var iewarn = new RokIEWarn(\"$msg\");}).delay($delay); }
			});
		";
		
		return $js;
	}
}