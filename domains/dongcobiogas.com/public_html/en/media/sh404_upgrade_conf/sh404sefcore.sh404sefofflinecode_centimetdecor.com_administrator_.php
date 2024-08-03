<?php // Extension params save file for sh404sef
//    
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');
$shConfig = array (
  'name' => 'sh404sef - Offline code plugin',
  'element' => 'sh404sefofflinecode',
  'folder' => 'sh404sefcore',
  'access' => '0',
  'ordering' => '10',
  'published' => '1',
  'iscore' => '0',
  'client_id' => '0',
  'checked_out' => '0',
  'checked_out_time' => '0000-00-00 00:00:00',
  'params' => 'retry_after_delay=7400
plugin_element=sh404sefofflinecode
plugin_folder=sh404sefcore
plugin_event=onAfterDispatch
plugin_functions=plgSh404sefofflinecode
',
);
