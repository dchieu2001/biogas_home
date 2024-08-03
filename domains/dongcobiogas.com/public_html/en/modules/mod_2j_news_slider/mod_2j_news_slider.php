<?php
defined('_JEXEC') or die('Restricted access');

if (!function_exists( 'twoj_get_news_text' )) {
	echo 'Please install and publish "2J News Slide Plugin"';
	return '';
}
echo twoj_get_news_text($params);
?>