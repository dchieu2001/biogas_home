<?php
ob_start ("ob_gzhandler");
header("Content-type: text/css; charset: UTF-8");
header("Cache-Control: must-revalidate");
$expires_time = 1440;
$offset = 60 * $expires_time ;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);
                ?>

/*** gantry.css ***/

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, caption {margin: 0;padding: 0;border: 0;outline: 0;font-size: 100%;background: transparent;}.rt-container {margin: 0 auto;width: 960px;}body {min-width: 960px;}.rt-block {padding: 15px;margin-bottom: 10px;position: relative;}#rt-content-top .rt-alpha, #rt-content-bottom .rt-alpha {margin-left: 0;}#rt-content-top .rt-omega, #rt-content-bottom .rt-omega {margin-right: 0;}#rt-logo {width: 185px;height: 115px;display: block;}#rt-content-top, #rt-content-bottom {overflow: hidden;}#rocket {display: block;width: 92px;height: 16px;margin: 0 auto;}#rt-copyright {text-align: center;}#rt-menu .rt-container {height: 3em;}#rt-menu ul.menu {list-style: none;margin: 0 10px;padding: 0;}#rt-menu ul.menu li {float: left;padding: 0;background: none;}#rt-menu ul.menu li a {font-weight: bold;line-height: 3em;display: block;padding: 0 15px;font-size: 1em;}#rt-menu ul.menu ul {display: none;}.font-family-optima {font-family: Optima, Lucida, 'MgOpen Cosmetica', 'Lucida Sans Unicode', sans-serif;}.font-family-geneva {font-family: Geneva, Tahoma, "Nimbus Sans L", sans-serif;}.font-family-helvetica {font-family: Helvetica, Arial, FreeSans, sans-serif;}.font-family-lucida {font-family: "Lucida Grande",Helvetica,Verdana,sans-serif;}.font-family-georgia {font-family: Georgia, sans-serif;}.font-family-trebuchet {font-family: "Trebuchet MS", sans-serif;}.font-family-palatino {font-family: "Palatino Linotype", "Book Antiqua", Palatino, "Times New Roman", Times, serif;}body {font-size: 12px;line-height: 1.7em;font-family: Helvetica,Arial, Sans-Serif;}body.font-size-is-xlarge {font-size: 15px;line-height: 1.7em;}body.font-size-is-large {font-size: 14px;line-height: 1.7em;}body.font-size-is-default {font-size: 12px;line-height: 1.7em;}body.font-size-is-small {font-size: 11px;line-height: 1.7em;}body.font-size-is-xsmall {font-size: 10px;line-height: 1.7em;}form {margin: 0;padding: 0;}p {margin: 0 0 15px 0;}h1, h2, h3, h4, h5 {margin: 15px 0;line-height: 1.1em;}h1 {font-size: 260%;}h2 {font-size: 200%;}h3 {font-size: 175%;}h4 {font-size: 120%;}h5 {font-size: 120%;}h2.title {font-size: 170%;letter-spacing: -1px;line-height: 1em;}a {text-decoration: none;outline: none;}code {color: #000;margin: -1px 0 0 0;font: 10px Courier;}blockquote {font: italic 16px/22px Georgia, Serif;}.left-1, .left-2, .left-3, .left-4, .left-5, .left-6, .left-7, .left-8, .left-9, .left-10, .left-11 {float: left;margin-right: 50px;margin-bottom: 15px;display: inline;position: relative;}.right-1, .right-2, .right-3, .right-4, .right-5, .right-6, .right-7, .right-8, .right-9, .right-10, .right-11 {float: right;margin-left: 50px;margin-bottom: 15px;display: inline;position: relative;}.date-block {padding: 15px;}ul,ol {padding-left:15px;}ul li {padding: 0;margin: 0;}ul li a {font-size: 1.2em;line-height: 1.8em;}ul ul {margin-left: 25px;padding: 5px 0;}ul li.author {margin: 0;letter-spacing: 1px;list-style: none;font-weight: bold;text-align: right;}ul li.date {margin: 0;letter-spacing: 1px;list-style: none;text-align: right;font-weight: bold;}ul li.comments {list-style: none;text-align: right;font-weight: bold;}ul li.author span, ul li.date span, ul li.comments span {display: block;font-weight: normal;margin-bottom: 10px;line-height: 1em;}body.rtl {direction: rtl;}body.rtl #rt-menu ul.menu {float: right;}body.rtl #rt-menu ul.menu li {float: right;}body.rtl #rt-content-top .rt-alpha, body.rtl #rt-content-bottom .rt-alpha {margin-right: 0;margin-left: 10px;}body.rtl #rt-content-top .rt-omega, body.rtl #rt-content-bottom .rt-omega {margin-left: 0;margin-right: 10px;}body.rtl {min-width: inherit;}html,body {margin-bottom: 1px;}body {color: #333;}#rt-header, #rt-bottom {color: #aaa;}.rt-container {background: #fff;} a:hover {color: #000;}#rt-logo {background: url(../images/header-assets.png) 0 0 no-repeat;}#rt-menu ul.menu li a {color: #fff;}#rt-menu ul.menu li a:hover {background: #444;color: #fff;}#rt-menu ul.menu li.active a, #rt-menu ul.menu li.active a:hover {background: #fff;color: #000;}#rt-footer, #rt-copyright {color: #ddd;}#rt-sidebar-a {background-color:#e0e0e0;}#rt-sidebar-b {background-color:#e9e9e9;}#rt-sidebar-c {background-color:#f0f0f0;}#rocket {background: url(../images/rocket.png) 0 0 no-repeat;}#gantry-viewswitcher {background-image: url(../images/iphone/switcher.png); background-repeat: no-repeat; background-position: top left; width: 60px; height: 20px;display:block;position:absolute;right: 10px;top:40%;}#gantry-viewswitcher.off {background-position: bottom left;}#gantry-viewswitcher span {display: none;}html body * span.clear, html body * div.clear, html body * li.clear, html body * dd.clear {background: none;border: 0;clear: both;display: block;float: none;font-size: 0;list-style: none;margin: 0;padding: 0;overflow: hidden;visibility: hidden;width: 0;height: 0;}.clearfix:after {clear: both;content: '.';display: block;visibility: hidden;height: 0;}.clearfix {display: inline-block;}* html .clearfix {height: 1%;}.clearfix {display: block;}#debug #rt-main {overflow:hidden;border-bottom: 4px solid #666; margin-top:15px;position:relative}#debug .status {position: absolute;background:#333;opacity:.3;padding:0px 15px;z-index:10000;color:#fff;font-weight:bold;font-size:150%}

/*** grid-12.css ***/

.rt-grid-1, .rt-grid-2, .rt-grid-3, .rt-grid-4, .rt-grid-5, .rt-grid-6, .rt-grid-7, .rt-grid-8, .rt-grid-9, .rt-grid-10, .rt-grid-11, .rt-grid-12 {display: inline;float: left;position: relative;margin-left: 10px;margin-right: 10px;}.rt-container .rt-grid-1 {width: 60px;}.rt-container .rt-grid-2 {width: 140px;}.rt-container .rt-grid-3 {width: 220px;}.rt-container .rt-grid-4 {width: 300px;}.rt-container .rt-grid-5 {width: 380px;}.rt-container .rt-grid-6 {width: 460px;}.rt-container .rt-grid-7 {width: 540px;}.rt-container .rt-grid-8 {width: 620px;}.rt-container .rt-grid-9 {width: 700px;}.rt-container .rt-grid-10 {width: 780px;}.rt-container .rt-grid-11 {width: 860px;}.rt-container .rt-grid-12 {width: 940px;}.rt-container .rt-push-1 {left: 80px;}.rt-container .rt-push-2 {left: 160px;}.rt-container .rt-push-3 {left: 240px;}.rt-container .rt-push-4 {left: 320px;}.rt-container .rt-push-5 {left: 400px;}.rt-container .rt-push-6 {left: 480px;}.rt-container .rt-push-7 {left: 560px;}.rt-container .rt-push-8 {left: 640px;}.rt-container .rt-push-9 {left: 720px;}.rt-container .rt-push-10 {left: 800px;}.rt-container .rt-push-11 {left: 880px;}.rt-container .rt-pull-1 {left: -80px;}.rt-container .rt-pull-2 {left: -160px;}.rt-container .rt-pull-3 {left: -240px;}.rt-container .rt-pull-4 {left: -320px;}.rt-container .rt-pull-5 {left: -400px;}.rt-container .rt-pull-6 {left: -480px;}.rt-container .rt-pull-7 {left: -560px;}.rt-container .rt-pull-8 {left: -640px;}.rt-container .rt-pull-9 {left: -720px;}.rt-container .rt-pull-10 {left: -800px;}.rt-container .rt-pull-11 {left: -880px;}.rt-container .rt-prefix-1 {padding-left:80px;}.rt-container .rt-prefix-2 {padding-left:160px;}.rt-container .rt-prefix-3 {padding-left:240px;}.rt-container .rt-prefix-4 {padding-left:320px;}.rt-container .rt-prefix-5 {padding-left:400px;}.rt-container .rt-prefix-6 {padding-left:480px;}.rt-container .rt-prefix-7 {padding-left:560px;}.rt-container .rt-prefix-8 {padding-left:640px;}.rt-container .rt-prefix-9 {padding-left:720px;}.rt-container .rt-prefix-10 {padding-left:800px;}.rt-container .rt-prefix-11 {padding-left:880px;}.left-1, .right-1 {width: 30px;}.left-2, .right-2 {width: 110px;}.left-3, .right-3 {width: 190px;}.left-4, .right-4 {width: 270px;}.left-5, .right-5 {width: 350px;}.left-6, .right-6 {width: 430px;}.left-7, .right-7 {width: 510px;}.left-8, .right-8 {width: 590px;}.left-9, .right-9 {width: 670px;}.left-10, .right-10 {width: 750px;}.left-11, .right-11 {width: 830px;}

/*** joomla.css ***/

.rt-joomla h1 {letter-spacing: -2px;}.rt-joomla h2, .rt-joomla h3, .rt-joomla h4, .rt-joomla h5 {letter-spacing: -1px;}.componentheading {font-weight: bold;display: block;margin-bottom: 15px;}.contentheading {font-size: 140%;font-weight: bold;margin-bottom: 15px;display: block;}.sectiontableheader {font-weight: bold;padding: 3px;line-height: 25px;text-align: left;}.sectiontablefooter {padding-bottom: 8px;}tr.sectiontableentry0 td, tr.sectiontableentry1 td, tr.sectiontableentry2 td, td.sectiontableentry0, td.sectiontableentry1, td.sectiontableentry2 {text-align: left;padding: 6px 5px;vertical-align: middle;}tr.sectiontableentry0 td, td.sectiontableentry0, tr.sectiontableentry1 td, td.sectiontableentry1, tr.sectiontableentry2 td, td.sectiontableentry2 {height: 30px;}.contentpane, .contentpaneopen {width: 100%;}.rt-joomla .float-left {float: left;}.rt-joomla .float-right {float: right;}.rt-joomla .width25 {width: 24.999%;}.rt-joomla .width33 {width: 33.333%;}.rt-joomla .width50 {width: 49.999%;}.rt-joomla .width100 {width: 100%;}.rt-joomla .rt-blog .rt-description {margin: 10px 0px 15px 0px;padding-bottom: 20px;border-bottom: 1px #c8c8c8 dotted;}.rt-joomla .rt-article {margin-bottom: 35px;}.rt-joomla .rt-article-bg {padding-bottom: 5px;border-bottom: 1px #c8c8c8 dotted;}.rt-joomla .multicolumns .rt-article {margin: 0px 15px 15px 15px;}.rt-joomla .multicolumns .first .rt-article {margin-left: 0px;}.rt-joomla .multicolumns .last .rt-article {margin-right: 0px;}.rt-joomla .rt-article-links {margin: 10px 0px 10px 0px;}.rt-joomla h1.rt-article-title {width: auto;}.rt-joomla span.edit {margin-left: 10px;float: left;}.rt-joomla .rt-articleinfo {margin-bottom: 15px;}.rt-joomla .rt-articleinfo span.modified, .rt-joomla .rt-articleinfo span.author, .rt-joomla .rt-articleinfo span.created, .rt-joomla .rt-articleinfo span.url {display: block;font-size: 95%;}.rt-joomla .rt-articleinfo span.author {color: #969696;font-style: italic;}.rt-joomla .rt-articleinfo span.created {font-weight: bold;}.rt-joomla .rt-description {margin: 10px 0px 10px 0px;overflow: hidden;}.rt-description img.left {margin-right: 15px;float: left;}.rt-description img.right {margin-left: 15px;float: right;}.rt-joomla .filter {margin: 10px 0px;}.rt-joomla span.number {color: #969696;font-style: italic;}.rt-joomla .rt-article-icons {width: 65px;overflow: hidden;float: right;}.rt-joomla .icon {display:block;width:16px;height:16px;float: right;margin-left:3px;background-image: url(../images/typography.png);background-repeat: no-repeat;}.rt-joomla .printscreen {display: none;}.rt-joomla .print {background-position: 0 0;}.rt-joomla .email {background-position: -16px 0;}.rt-joomla .pdf {background-position: -32px 0;}.rt-joomla .edit {background-position: -48px 0;margin-left: 0 !important;margin-right:5px;}.rt-joomla .edit img {opacity: 0 !important;}.rt-joomla .rt-article-cat {font-weight: bold;margin-top: 15px;margin-bottom: 0;}.rt-pagination {text-align: center;}.rt-pagination .tab {display: inline-block;margin-right: 8px;}.rt-pagination .tab .page-active {background: none;}.rt-pagination .page-block {display: inline-block;margin-right: 4px;font-weight: bold;}.rt-pagination .page-active, .rt-pagination .page-inactive {padding: 0 4px;}.rt-pagination .page-inactive:hover {cursor: pointer;}.rt-pagination .rt-results {margin-bottom: 5px;}.rt-joomla .edit-article fieldset {margin-bottom: 30px;}.rt-joomla .edit-article fieldset div {overflow: hidden;margin-bottom: 5px;}.rt-joomla .edit-article label.label-left {display: block;width: 150px;float: left;}.rt-joomla .edit-article .save {margin: 0px;float: right;}.rt-joomla .edit-article #editor-xtd-buttons {margin-bottom: 0px;overflow: hidden;}.rt-joomla .edit-article #editor-xtd-buttons div {margin: 0px;}.rt-joomla .edit-article #editor-xtd-buttons .button2-left {margin-right: 5px;}.rt-joomla .edit-article #editor-xtd-buttons a:link, .rt-joomla .edit-article #editor-xtd-buttons a:visited, .rt-joomla .edit-article #editor-xtd-buttons a:hover {color: #323232;}.rt-joomla .edit-article .inputbox, .rt-joomla .edit-article textarea {border: 1px solid #ddd;}#form-login .inputbox, #com-form-login .inputbox, #josForm .inputbox {border: 1px solid #ddd;font-size: 1.2em;padding: 2px;margin: 0;}#com-form-login fieldset div, #josForm fieldset div {margin-bottom: 10px;}#form-login ul {margin-top: 10px;}#form-login p {margin-bottom: 10px;}#form-login .user-greeting {font-weight: bold;font-size: 120%;margin-bottom: 15px;}.rt-joomla .user label.label-left, .rt-joomla .user span.label-left {display: block;width: 130px;float: left;font-weight: bold;font-size: 120%;}.col12 .rt-grid-2 #form-login .inputbox {width: 104px;}.col12 .rt-grid-3 #form-login .inputbox {width: 184px;}.col12 .rt-grid-4 #form-login .inputbox {width: 264px;}.col12 .rt-grid-5 #form-login .inputbox {width: 344px;}.col12 .rt-grid-6 #form-login .inputbox {width: 424px;}.col12 .rt-grid-7 #form-login .inputbox {width: 504px;}.col12 .rt-grid-8 #form-login .inputbox {width: 584px;}.col12 .rt-grid-9 #form-login .inputbox {width: 664px;}.col12 .rt-grid-10 #form-login .inputbox {width: 744px;}.col12 .rt-grid-12 #form-login .inputbox {width: 904px;}.col16 .rt-grid-2 #form-login .inputbox {width: 64px;}.col16 .rt-grid-3 #form-login .inputbox {width: 124px;}.col16 .rt-grid-4 #form-login .inputbox {width: 184px;}.col16 .rt-grid-5 #form-login .inputbox {width: 244px;}.col16 .rt-grid-6 #form-login .inputbox {width: 304px;}.col16 .rt-grid-7 #form-login .inputbox {width: 364px;}.col16 .rt-grid-8 #form-login .inputbox {width: 424px;}.col16 .rt-grid-9 #form-login .inputbox {width: 484px;}.col16 .rt-grid-10 #form-login .inputbox {width: 544px;}.col16 .rt-grid-11 #form-login .inputbox {width: 604px;}.col16 .rt-grid-12 #form-login .inputbox {width: 664px;}.col16 .rt-grid-13 #form-login .inputbox {width: 724px;}.col16 .rt-grid-14 #form-login .inputbox {width: 784px;}.col16 .rt-grid-15 #form-login .inputbox {width: 844px;}.rt-joomla .contact h1 {margin-bottom: 0px;font-size: 250%;font-weight: normal;letter-spacing: -1px;}.rt-joomla .contact h2 {margin-bottom: 10px;font-size: 120%;font-weight: normal;text-transform: uppercase;letter-spacing: 0px;}.rt-joomla .contact .image {float: right;}.rt-joomla .contact table {margin-bottom: 10px;}.rt-joomla .contact label.label-top {display: block;}.contact .icon {float: left; width: 40px;}.contact .misc, .contact .webpage, .contact .mobile, .contact .email, .contact .telephone, .contact .fax, .contact .country, .contact .state, .contact .postcode, .contact .suburb, .contact .street-address {overflow: hidden;}.contact .other .surround {margin-top: 5px;}.contact .vcard {margin-top: 15px;}.rt-joomla .contact .inputbox {border: 1px solid #ddd;font-size: 1.2em;padding: 2px;margin: 0;}.rt-joomla .contact .label-top {display: block;font-weight: bold;font-size: 120%;}.rt-joomla .contact fieldset div {margin-bottom: 10px;}.rt-joomla .weblinks fieldset div {overflow: hidden;}.rt-joomla .weblinks label.label-left {display: block;width: 150px;float: left;}.rt-joomla .search p.info {margin: 0px;color: #969696;font-style: italic;}.rt-joomla .search span.highlight {background: #ffffaa;}.rt-joomla .search_result {margin-top: 15px;}.rt-joomla .search_result .inputbox {border: 1px solid #ddd;font-size: 1.2em;padding: 2px;margin: 0;}.rt-joomla .search_result fieldset.word label {display: block;width: 130px;float: left;font-weight: bold;font-size: 120%;}.rt-joomla .search_result fieldset {margin-bottom: 15px;}.rt-joomla .search_result .phrase legend, .rt-joomla .search_result .only legend {line-height: 30px;font-weight: bold;}dl.poll dt {padding-top: 8px;text-transform: uppercase;font-size: 90%;}dl.poll dd {font-weight: bold;padding-bottom: 8px;border-bottom: 1px solid #eaeaea;font-size: 120%;}poll .polls_color_1,.poll .polls_color_2,.poll .polls_color_3,.poll .polls_color_4,.poll .polls_color_5 {border: solid 1px;position: relative;}.rt-poll h3 {border: solid 0;margin: 20px 0;}.rt-poll .td_2 {width: 100px;}.rt-poll .td_3 {width: 300px;}.rt-poll form {margin: 20px 0;}.rt-poll table {font-size: 1em;width: 100%;border: solid 0;position: relative;}.rt-poll table .td_1 {width: 30px;}.rt-poll table caption {color: #93246F;font-size: 1em;font-weight: bold;margin: 10px 0;text-align:left;}.rt-poll td {border: solid 1px #eaeaea;padding: 2px 5px;}.rt-poll td.line {width: 300px;}.rt-poll th {background: #eee;border: solid 1px #ddd;text-transform: uppercase;}.rt-poll .question {font-weight: bold;font-size: 110%;}.rt-poll .rt-pollrow {padding: 6px 0 8px 0;font-size: 110%;}.rt-poll .rt-pollbuttons {padding: 0;overflow: hidden;margin-top: 20px;}.rt-poll .readon {float: left;margin-right: 5px;}.module-newsflash {overflow: hidden;}.module-newsflash .rt-article {padding-bottom: 15px;overflow: hidden;}.module-newsflash .last {padding-bottom: 0px;}#rt-accessibility .rt-desc {float: left;padding-right: 5px;}#rt-accessibility #rt-buttons {float: left;}#rt-accessibility .button {display: block;width:14px;height:14px;float: left;background: url(../images/typography.png);margin: 2px;}#rt-accessibility .large .button {background-position: 0 -17px;}#rt-accessibility .small .button {background-position: -15px -17px;}.rt-joomla .categorylist input {border: 1px solid #ddd;font-size: 1.2em;padding: 2px;margin: 0;}.rt-joomla th {padding: 5px;background: #ebebeb;border-bottom: 2px solid #ddd;font-weight : bold;}.rt-joomla tr.even td {padding: 5px;background: #f0f0f0;border-bottom: 1px solid #ddd;}.rt-joomla tr.odd td {padding: 5px;background: #fafafa;border-bottom: 1px solid #ddd;}.rt-breadcrumb-surround {margin: 0;display: block;position:relative;overflow: hidden;height: 20px;padding: 15px 25px;}#breadcrumbs-gantry {width: 11px;height: 11px;display: block;float: left;margin-top: 4px;margin-right: 8px;background: url(../images/home.png) 0 0 no-repeat;}.tool-tip {float: left;background: #ffc;border: 1px solid #D4D5AA;padding: 5px;max-width: 200px;color: #323232;}.tool-title {padding: 0;margin: 0;font-size: 100%;font-weight: bold;margin-top: -15px;padding-top: 15px;padding-bottom: 5px;background: url(../../system/images/selector-arrow.png) no-repeat;}.tool-text {font-size: 100%;margin: 0;}input.system-openid, input.com-system-openid { background: url(http://openid.net/images/login-bg.gif) no-repeat;background-color: #fff;background-position: 0 50%;color: #000;padding-left: 18px;}.system-unpublished {background: #e8edf1;border-top: 4px solid #c4d3df;border-bottom: 4px solid #c4d3df;}#system-message { margin-bottom: 10px; padding: 0;}#system-message dt { font-weight: bold; }#system-message dd { margin: 0; font-weight: bold; }#system-message dd ul { background: #BFD3E6; color: #0055BB; margin: 10px 0 10px 0; list-style: none; padding: 10px; border: 2px solid #84A7DB;}#system-message dt.message { display: none; }#system-message dt.error { display: none; }#system-message dd.error ul { color: #c00; background-color: #EBC8C9; border: 2px solid #DE7A7B;}#system-message dt.notice { display: none; }#system-message dd.notice ul { color: #A08B4C; background: #F5ECC1; border: 2px solid #F0DC7E;}#system-debug { color: #ccc; background-color: #fff; padding: 10px; margin: 10px; }#system-debug div { font-size: 11px;}