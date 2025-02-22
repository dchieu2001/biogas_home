<?php
/**
 * @package     gantry
 * @subpackage  core.renderers
 * @version   3.1.19 March 5, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('GANTRY_VERSION') or die();
/**
 * @package     gantry
 * @subpackage  core.renderers
 */
class GantryOrderedMainBodyRenderer  {
	// wrapper for mainbody display
    function display($bodyLayout = 'mainbody', $sidebarLayout = 'sidebar', $sidebarChrome = 'standard', $contentTopLayout = 'standard', $contentTopChrome = 'standard', $contentBottomLayout = 'standard', $contentBottomChrome = 'standard', $grid = null) {
        global $gantry;

        if ($grid == null) {
            $grid = GRID_SYSTEM;
        }


        $editmode = JRequest::getCmd('task')=='edit' ? true:false;
        $position_renders = array();

        if (!$editmode) {
	        //get current sidebar count based on module usages
	        $positions = $gantry->getPositions('sidebar');
	        $sidebarCount = $gantry->countModules('sidebar');

	        foreach($positions as $position) {
	            $contents = '';
	            $features = $gantry->_getFeaturesForPosition($position);
				$modules = JModuleHelper::getModules($position);

	            if (!count($modules) and !count($features)) continue;

	            foreach($features as $feature_name){
	                $feature = $gantry->_getFeature($feature_name);
	                $rendered_feature = $feature->render($position);
	                if (!empty($rendered_feature)) {
					    $contents .= $rendered_feature."\n";
	                }
				}
	            $position_renders[$position] = $contents;

	            if (!count($modules)) continue;

	            $shortname = $gantry->_getShortName($position);
	            $contents .= '<jdoc:include type="modules" name="'.$position.'" style="'.$sidebarChrome.'" />' . "\n";
	            $position_renders[$position] = $contents;
	        }

	        foreach($position_renders as $position => $contents){
	            if (empty($contents)){
	                $sidebarCount--;
	            }
	        }
        } else {
        	$sidebarCount = 0;
        }

        $columnCount = $sidebarCount+1;

        // see if the mainbodySchema exists, if not probably old cached file
        if (!isset($gantry->mainbodySchemas[$grid][$columnCount])) {
        	// Clear the cache gantry cache
        	$cache =& JFactory::getCache('', 'callback', 'file');
        	$cache->clean( 'Gantry' );
        }

        //here we would see if the mainbody schema was set to soemthing else
        $defaultSchema     = $gantry->mainbodySchemas[$grid][$columnCount];

		$position = @unserialize($gantry->get('mainbodyPosition'));

        if (!$position || !isset($position[$grid]) || !array_key_exists($columnCount,$position[$grid])) $schema = $defaultSchema;
        else {
            $schema = $position[$grid][$columnCount];
        }


        $end = end(array_keys($schema));
        $start = reset(array_keys($schema));

        // If RTL then flip the array
        if ($gantry->document->direction == 'rtl' && $gantry->get('rtl-enabled')) {
        	$position_renders = array_reverse($position_renders);
        	$schema = $gantry->_flipBodyPosition($schema);
        }



        $classKey   = $gantry->_getKey($schema);
        $pushPull   = $gantry->pushPullSchemas[$classKey];

        $output         = '';
        $sidebars       = '';
        $contentTop     = null;
        $contentBottom  = null;

        $index = 1;
        // remove the mainbody and use the schema array for grid sizes
        $sidebarSchema = $schema;
        unset ($sidebarSchema['mb']);

        $layoutSidebar = 'modLayout_'.$sidebarLayout;




        $sidebars = array();
        foreach($position_renders as $position => $contents){
            $extraClass = '';
            if (empty($contents)) continue;

            $shortname = $gantry->_getShortName($position);
            if ($shortname == $start) $extraClass = " rt-alpha";
            if ($shortname == $end) $extraClass = " rt-omega";
            if ($shortname == $start && $shortname == $end) $extraClass = " rt-alpha rt-omega";

            $sidebars[$gantry->_getShortName($position)] = $gantry->renderLayout('mod_'.$sidebarLayout, array(
                                                                                                               'contents'=>$contents,

                                                                                                               'position'=>$position,
                                                                                                               'gridCount'=>current($sidebarSchema),
                                                                                                               'pushPull'=>$pushPull[$index++],
                                                                                                               'extraClass'=>$extraClass
                                                                                                        ));
            next($sidebarSchema);
        }


        if ($gantry->countModules('content-top')) {
            $contentTop = $gantry->displayModules('content-top',$contentTopLayout,$contentTopChrome,$schema['mb']);
        }

        if ($gantry->countModules('content-bottom')) {
            $contentBottom = $gantry->displayModules('content-bottom',$contentBottomLayout,$contentBottomChrome,$schema['mb']);
        }

        $extraClass = '';
        if ('mb' == $start) $extraClass = " rt-alpha";
        if ('mb' == $end) $extraClass = " rt-omega";
        if ('mb' == $start && 'mb' == $end) $extraClass = " rt-alpha rt-omega";
        $output = $gantry->renderLayout('orderedbody_'.$bodyLayout, array('schema'=>$schema,'pushPull'=>$pushPull,'classKey'=>$classKey,
                                                        'sidebars'=>$sidebars, 'contentTop'=>$contentTop,
                                                        'contentBottom'=>$contentBottom,'extraClass'=>$extraClass));
        return $output;

    }
}