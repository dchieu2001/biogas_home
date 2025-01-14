<?php
// config.sef.php : configuration file for sh404SEF for Joomla 1.5.x
// 2.4.4.1017
// saved at: 2012-01-06 09:51:26
// by: admin (id: 62 )
// domain: http://centimetdecor.com

if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

$version = '2.4.4.1017';
$Enabled = '1';
$replacement = '-';
$pagerep = '-';
$stripthese = ',|~|!|@|%|^|(|)|<|>|:|;|{|}|[|]|&|`|„|‹|’|‘|“|â?|â¢|âº|Â«|Â´|Â»|Â°';
$shReplacements = 'á|a, à|a, ả|a, ã|a, ạ|a, â|a, ấ|a, ầ|a, ẩ|a, ẫ|a, ậ|a, ă|a, ắ|a, ằ|a, ẳ|a, ẵ|a, ặ|a, đ|d, é|e, è|e, ẻ|e, ẽ|e, ẹ|e, ê|e, ế|e, ề|e, ể|e, ễ|e, ệ|e, í|i, ì|i, ỉ|i, ĩ|i, ị|i, ó|o, ò|o, ỏ|o, õ|o, ọ|o, ô|o, ố|o, ồ|o, ổ|o, ỗ|o, ộ|o, ơ|o, ớ|o, ờ|o, ở|o, ỡ|o, ợ|o, ú|u, ù|u, ủ|u, ũ|u, ụ|u, ư|u, ứ|u, ừ|u, ử|u, ữ|u, ự|u, ý|y, ỳ|y, ỷ|y, ỹ|y, ỵ|y, Á|A, À|A, Ả|A, Ã|A, Ạ|A, Â|A, Ấ|A, Ầ|A, Ẩ|A, Ẫ|A, Ậ|A, Ă|A, Ắ|A, Ằ|A, Ẳ|A, Ẵ|A, Ặ|A, Đ|D, É|E, È|E, Ẻ|E, Ẽ|E, Ẹ|E, Ê|E, Ế|E, Ề|E, Ể|E, Ễ|E, Ệ|E, Í|I, Ì|I, Ỉ|I, Ĩ|I, Ị|I, Ó|O, Ò|O, Ỏ|O, Õ|O, Ọ|O, Ô|O, Ố|O, Ồ|O, Ổ|O, Ỗ|O, Ộ|O, Ơ|O, Ớ|O, Ờ|O, Ở|O, Ỡ|O, Ợ|O, Ú|U, Ù|U, Ủ|U, Ũ|U, Ụ|U, Ư|U, Ứ|U, Ừ|U, Ử|U, Ữ|U, Ự|U, Ý|Y, Ỳ|Y, Ỷ|Y, Ỹ|Y, Ỵ|Y';
$suffix = '.html';
$addFile = '';
$friendlytrim = '-|.';
$LowerCase = '0';
$ShowSection = false;
$ShowCat = true;
$UseAlias = true;
$page404 = 0;
$predefined = array();
$skip = array();
$nocache = array();
$shDoNotOverrideOwnSef = array();
$shLog404Errors = '1';
$shUseURLCache = '1';
$shMaxURLInCache = '10000';
$shTranslateURL = '1';
$shInsertLanguageCode = '1';
$notTranslateURLList = array();
$notInsertIsoCodeList = array();
$shInsertGlobalItemidIfNone = '0';
$shInsertTitleIfNoItemid = '0';
$shAlwaysInsertMenuTitle = '0';
$shAlwaysInsertItemid = '0';
$shDefaultMenuItemName = '';
$shAppendRemainingGETVars = true;
$shVmInsertShopName = false;
$shInsertProductId = false;
$shVmUseProductSKU = false;
$shVmInsertManufacturerName = false;
$shInsertManufacturerId = false;
$shVMInsertCategories = 1;
$shVmAdditionalText = true;
$shVmInsertFlypage = true;
$shInsertCategoryId = false;
$shInsertNumericalId = '0';
$shInsertNumericalIdCatList = array("");
$shRedirectNonSefToSef = '1';
$shRedirectJoomlaSefToSef = '0';
$shConfig_live_secure_site = '';
$shActivateIJoomlaMagInContent = true;
$shInsertIJoomlaMagIssueId = false;
$shInsertIJoomlaMagName = false;
$shInsertIJoomlaMagMagazineId = false;
$shInsertIJoomlaMagArticleId = false;
$shInsertCBName = false;
$shCBInsertUserName = false;
$shCBInsertUserId = true;
$shCBUseUserPseudo = true;
$shLMDefaultItemid = 0;
$shInsertFireboardName = false;
$shFbInsertCategoryName = true;
$shFbInsertCategoryId = false;
$shFbInsertMessageSubject = true;
$shFbInsertMessageId = true;
$shInsertMyBlogName = false;
$shMyBlogInsertPostId = true;
$shMyBlogInsertTagId = false;
$shMyBlogInsertBloggerId = true;
$shInsertDocmanName = false;
$shDocmanInsertDocId = true;
$shDocmanInsertDocName = true;
$shDMInsertCategories = 1;
$shDMInsertCategoryId = false;
$shEncodeUrl = '0';
$guessItemidOnHomepage = '0';
$shForceNonSefIfHttps = '0';
$shRewriteMode = '0';
$shRewriteStrings = array("/","/index.php/","/index.php?/");
$shRecordDuplicates = true;
$shRemoveGeneratorTag = true;
$shPutH1Tags = false;
$shMetaManagementActivated = true;
$shInsertContentTableName = true;
$shContentTableName = 'Table';
$shAutoRedirectWww = '1';
$shVmInsertProductName = true;
$shForcedHomePage = '';
$shInsertContentBlogName = false;
$shContentBlogName = '';
$shInsertMTreeName = false;
$shMTreeInsertListingName = true;
$shMTreeInsertListingId = true;
$shMTreePrependListingId = true;
$shMTreeInsertCategories = 1;
$shMTreeInsertCategoryId = false;
$shMTreeInsertUserName = true;
$shMTreeInsertUserId = true;
$shInsertNewsPName = false;
$shNewsPInsertCatId = false;
$shNewsPInsertSecId = false;
$shInsertRemoName = false;
$shRemoInsertDocId = true;
$shRemoInsertDocName = true;
$shRemoInsertCategories = 1;
$shRemoInsertCategoryId = false;
$shCBShortUserURL = false;
$shKeepStandardURLOnUpgrade = '1';
$shKeepCustomURLOnUpgrade = '1';
$shKeepMetaDataOnUpgrade = '1';
$shKeepModulesSettingsOnUpgrade = true;
$shMultipagesTitle = true;
$encode_page_suffix = '';
$encode_space_char = '-';
$encode_lowercase = '0';
$encode_strip_chars = ',|~|!|@|%|^|(|)|<|>|:|;|{|}|[|]|&|`|„|‹|’|‘|“|â?|â¢|âº|Â«|Â´|Â»|Â°';
$spec_chars_d = 'á,à,ả,ã,ạ,â,ấ,ầ,ẩ,ẫ,ậ,ă,ắ,ằ,ẳ,ẵ,ặ,đ,é,è,ẻ,ẽ,ẹ,ê,ế,ề,ể,ễ,ệ,í,ì,ỉ,ĩ,ị,ó,ò,ỏ,õ,ọ,ô,ố,ồ,ổ,ỗ,ộ,ơ,ớ,ờ,ở,ỡ,ợ,ú,ù,ủ,ũ,ụ,ư,ứ,ừ,ử,ữ,ự,ý,ỳ,ỷ,ỹ,ỵ,Á,À,Ả,Ã,Ạ,Â,Ấ,Ầ,Ẩ,Ẫ,Ậ,Ă,Ắ,Ằ,Ẳ,Ẵ,Ặ,Đ,É,È,Ẻ,Ẽ,Ẹ,Ê,Ế,Ề,Ể,Ễ,Ệ,Í,Ì,Ỉ,Ĩ,Ị,Ó,Ò,Ỏ,Õ,Ọ,Ô,Ố,Ồ,Ổ,Ỗ,Ộ,Ơ,Ớ,Ờ,Ở,Ỡ,Ợ,Ú,Ù,Ủ,Ũ,Ụ,Ư,Ứ,Ừ,Ử,Ữ,Ự,Ý,Ỳ,Ỷ,Ỹ,Ỵ,';
$spec_chars = 'a,a,a,a,a,a,a,a,a,a,a,a,a,a,a,a,a,d,e,e,e,e,e,e,e,e,e,e,e,i,i,i,i,i,o,o,o,o,o,o,o,o,o,o,o,o,o,o,o,o,o,u,u,u,u,u,u,u,u,u,u,u,y,y,y,y,y,A,A,A,A,A,A,A,A,A,A,A,A,A,A,A,A,A,D,E,E,E,E,E,E,E,E,E,E,E,I,I,I,I,I,O,O,O,O,O,O,O,O,O,O,O,O,O,O,O,O,O,U,U,U,U,U,U,U,U,U,U,U,Y,Y,Y,Y,Y,';
$content_page_format = '%s-%d';
$content_page_name = 'Page-';
$shKeepConfigOnUpgrade = '1';
$shSecEnableSecurity = '1';
$shSecLogAttacks = true;
$shSecOnlyNumVars = array("itemid","limit","limitstart");
$shSecAlphaNumVars = array();
$shSecNoProtocolVars = array("task","option","no_html","mosmsg","lang");
$shSecCheckHoneyPot = false;
$shSecHoneyPotKey = '';
$shSecEntranceText = '<p>Sorry. You are visiting this site from a suspicious IP address, which triggered our protection system.</p>
    <p>If you <strong>ARE NOT</strong> a malware robot of any kind, please accept our apologies for the inconvenience. You can access the page by clicking here : ';
$shSecSmellyPotText = 'The following link is here to further trap malicious internet robots, so please don\'t click on it : ';
$monthsToKeepLogs = 1;
$shSecActivateAntiFlood = true;
$shSecAntiFloodOnlyOnPOST = false;
$shSecAntiFloodPeriod = 10;
$shSecAntiFloodCount = 10;
$shLangTranslateList = array("en-GB"=>"0","vi-VN"=>"0");
$shLangInsertCodeList = array("en-GB"=>"0","vi-VN"=>"0");
$defaultComponentStringList = array("content"=>"","banners"=>"","ckeditor"=>"","contact"=>"","mailto"=>"","newsfeeds"=>"","poll"=>"","rsform"=>"","search"=>"","user"=>"","vvisit_counter"=>"","weblinks"=>"","wrapper"=>"");
$pageTexts = array("en-GB"=>"Page-%s","vi-VN"=>"Page-%s");
$shAdminInterfaceType = 1;
$shInsertNoFollowPDFPrint = true;
$shInsertReadMorePageTitle = true;
$shMultipleH1ToH2 = false;
$shVmUsingItemsPerPage = true;
$shSecCheckPOSTData = true;
$shSecCurMonth = 0;
$shSecLastUpdated = 0;
$shSecTotalAttacks = 0;
$shSecTotalConfigVars = 0;
$shSecTotalBase64 = 0;
$shSecTotalScripts = 0;
$shSecTotalStandardVars = 0;
$shSecTotalImgTxtCmd = 0;
$shSecTotalIPDenied = 0;
$shSecTotalUserAgentDenied = 0;
$shSecTotalFlooding = 0;
$shSecTotalPHP = 0;
$shSecTotalPHPUserClicked = 0;
$shInsertSMFName = true;
$shSMFItemsPerPage = 20;
$shInsertSMFBoardId = true;
$shInsertSMFTopicId = true;
$shinsertSMFUserName = false;
$shInsertSMFUserId = true;
$appendToPageTitle = '';
$prependToPageTitle = '';
$debugToLogFile = '0';
$debugStartedAt = 0;
$debugDuration = 3600;
$shInsertOutboundLinksImage = false;
$shImageForOutboundLinks = 'external-black.png';
$useCatAlias = false;
$useSecAlias = false;
$useMenuAlias = false;
$shEnableTableLessOutput = false;
$alwaysAppendItemsPerPage = '0';
$redirectToCorrectCaseUrl = '1';
$jclInsertEventId = false;
$jclInsertCategoryId = false;
$jclInsertCalendarId = false;
$jclInsertCalendarName = false;
$jclInsertDate = false;
$jclInsertDateInEventView = true;
$ContentTitleShowSection = false;
$ContentTitleShowCat = true;
$ContentTitleUseAlias = false;
$ContentTitleUseCatAlias = false;
$ContentTitleUseSecAlias = false;
$pageTitleSeparator = ' | ';
$ContentTitleInsertArticleId = false;
$shInsertContentArticleIdCatList = '';
$shJSInsertJSName = true;
$shJSShortURLToUserProfile = true;
$shJSInsertUsername = true;
$shJSInsertUserFullName = false;
$shJSInsertUserId = false;
$shJSInsertGroupCategory = true;
$shJSInsertGroupCategoryId = false;
$shJSInsertGroupId = false;
$shJSInsertGroupBulletinId = false;
$shJSInsertDiscussionId = true;
$shJSInsertMessageId = true;
$shJSInsertPhotoAlbum = true;
$shJSInsertPhotoAlbumId = false;
$shJSInsertPhotoId = true;
$shJSInsertVideoCat = true;
$shJSInsertVideoCatId = false;
$shJSInsertVideoId = true;
$shFbInsertUserName = true;
$shFbInsertUserId = true;
$shFbShortUrlToProfile = true;
$shPageNotFoundItemid = 0;
$autoCheckNewVersion = '1';
$error404SubTemplate = 'index';
$enablePageId = '0';
$compEnablePageId = array();
$analyticsEnabled = false;
$analyticsReportsEnabled = true;
$analyticsType = 'ga';
$analyticsId = '';
$analyticsExcludeIP = array();
$analyticsMaxUserLevel = '';
$analyticsUser = '';
$analyticsPassword = '';
$analyticsAccount = '';
$analyticsProfile = '';
$autoCheckNewAnalytics = true;
$analyticsDashboardDateRange = 'week';
$analyticsEnableTimeCollection = true;
$analyticsEnableUserCollection = true;
$analyticsDashboardDataType = 'pageviews';
$slowServer = '0';
$insertContactCat = false;
$useJoomsefRouter = array();
$useAcesefRouter = array();
$insertShortlinkTag = '1';
$insertRevCanTag = '0';
$insertAltShorterTag = '0';
$canReadRemoteConfig = '1';
$stopCreatingShurls = '0';
$shurlBlackList = '';
$shurlNonSefBlackList = '';
$enableOpenGraphData = false;
$ogEnableDescription = true;
$ogType = 'article';
$ogImage = '';
$ogEnableSiteName = true;
$ogSiteName = '';
$ogEnableLocation = false;
$ogLatitude = '';
$ogLongitude = '';
$ogStreetAddress = '';
$ogLocality = '';
$ogPostalCode = '';
$ogRegion = '';
$ogCountryName = '';
$ogEnableContact = false;
$ogEmail = '';
$ogPhoneNumber = '';
$ogFaxNumber = '';
$fbAdminIds = '';
$socialButtonType = 'facebook';
$fileAccessStatus = array(" <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>");
?>