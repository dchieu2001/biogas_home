<?php
// custom.sef.php : custom.configuration file for sh404SEF
// 2.4.4.1017 - anything-digital.com/sh404SEF/

// DO NOT REMOVE THIS LINE :
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');
// DO NOT REMOVE THIS LINE

// compatibility with past version. Set to 0 so that
// section is not added in (table) category links. This was a bug in past versions
// as sh404SEF would not insert section, even if ShowSection param was set to Yes
$shDefaultParams['SH404SEF_COMPAT_SHOW_SECTION_IN_CAT_LINKS'] = 1;

// set to 1 if using other than port 80 for http
$shDefaultParams['sh404SEF_USE_NON_STANDARD_PORT'] = 0;

// if not 0, will be used instead of Homepage itemid to display 404 error page
$shDefaultParams['sh404SEF_PAGE_NOT_FOUND_FORCED_ITEMID'] = 0;

// if not 0, urls for pdf documents and rss feeds  will be only partially turned into sef urls. 
//The query string &format=pdf or &format=feed will be still be appended.
// This will protect against malfunctions when using some plugins which makes a call
// to JFactory::getDocument() from a onAfterInitiliaze handler
// At this time, SEF urls are not decoded and thus the document type is set to html instead of pdf or feed
// resulting in the home page being displayed instead of the correct document
$shDefaultParams['sh404SEF_PROTECT_AGAINST_DOCUMENT_TYPE_ERROR'] = 0;

// Joomla mod_mainmenu module forces usage of JURI::base() for the homepage link
// On multilingual sites, this causes homepage link in other than default language to
// be wrong. If the following parameter is non-zero, such a homepage link
// will be replaced by the correct link, similar to www.mysite.com/es/ for instance
$shDefaultParams['sh404SEF_PROTECT_AGAINST_BAD_NON_DEFAULT_LANGUAGE_MENU_HOMELINK'] = 1;

// if not 0, sh404SEF will do a 301 redirect from http://yoursite.com/index.php
// or http://yoursite.com/index.php?lang=xx to http://yoursite.com/
// this may not work on some web servers, which transform yoursite.com into
// yoursite.com/index.php, thus creating and endless loop. If your server does
// that, set this param to 0
$shDefaultParams['sh404SEF_REDIRECT_IF_INDEX_PHP'] = 1;

// if superadmin logged in, force non-sef, for testing and setting up purpose
$shDefaultParams['sh404SEF_NON_SEF_IF_SUPERADMIN'] = 0;

// set to 1 to prevent 303 auto redirect based on user language
// use with care, will prevent language switch to work for users without javascript
$shDefaultParams['sh404SEF_DE_ACTIVATE_LANG_AUTO_REDIRECT'] = 1;

// if 1, SEF URLs will only be built for installed components.
$shDefaultParams['sh404SEF_CHECK_COMP_IS_INSTALLED'] = 1;

// if 1, all outbound links on page will be reached through a redirect
// to avoid page rank leakage
$shDefaultParams['sh404SEF_REDIRECT_OUTBOUND_LINKS'] = 0;

// if not empty, urls to pdf produced by Joomla will be prefixed with this
// path. Can be : 'pdf' or 'pdf/something' (ie: don't put leading or trailing slashes)
// Allows you to store some pre-built PDF in a directory called /pdf, with the same name
// as a page. Such a pdf will be served directly by the web server instead of being built on
// the fly by Joomla. This will save CPU and RAM. (only works this way if using htaccess
$shDefaultParams['sh404SEF_PDF_DIR'] = 'pdf';

// time to live for url cache in hours : default = 168h = 1 week
// Set to 0 to keep cache forever
$shDefaultParams['SH404SEF_URL_CACHE_TTL'] = 168;

// number of cache write before checking cache TTL.
$shDefaultParams['SH404SEF_URL_CACHE_WRITES_TO_CHECK_TTL'] = 1000;

// if set to 1, an email will be send to site admin when an attack is logged
// if the site is live, you could be drowning in email rapidly !!!
$shDefaultParams['sh404SEF_SEC_MAIL_ATTACKS_TO_ADMIN'] = 0;

$shDefaultParams['sh404SEF_SEC_EMAIL_TO_ADMIN_SUBJECT'] = 'Your site %sh404SEF_404_SITE_NAME% was subject to an attack';

$shDefaultParams['sh404SEF_SEC_EMAIL_TO_ADMIN_BODY'] = 'Hello !

This is sh404SEF security component, running at your site (%sh404SEF_404_SITE_URL%).

I have just blocked an attack on your site. Please check details below : 
------------------------------------------------------------------------
%sh404SEF_404_ATTACK_DETAILS%
------------------------------------------------------------------------

Thanks for using sh404SEF!

';

// number of pages between checks to remove old log files
// if 1, we check at every page request
$shDefaultParams['SH404SEF_PAGES_TO_CLEAN_LOGS'] = 10000;

// SECTION : Virtuemart plugin parameters ----------------------------------------------------------------------------

// set to 1 for products to have requested category name included in url
// useful if some products are in more than one category. By default (param set to 0),
// only one category will be used. If set to 1, all categories can be used
$shDefaultParams['SH_VM_ALLOW_PRODUCTS_IN_MULTIPLE_CATS'] = 0;

// SECTION : SOBI2 plugin parameters ----------------------------------------------------------------------------

// set to 1 to always include categories in SOBI2 entries
// details pages url
$shDefaultParams['sh404SEF_SOBI2_PARAMS_ALWAYS_INCLUDE_CATS'] = 0;

// set to 1 so that entry id is prepended to url
$shDefaultParams['sh404SEF_SOBI2_PARAMS_INCLUDE_ENTRY_ID'] = 0;

// set to 1 so that category id is prepended to category name
$shDefaultParams['sh404SEF_SOBI2_PARAMS_INCLUDE_CAT_ID'] = 0;
