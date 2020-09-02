<?php
/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */
if(array_key_exists('HTTP_ORIGIN', $_SERVER)) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
}
elseif(array_key_exists('HTTP_REFERER', $_SERVER)) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_REFERER']}");
}
header("Access-Control-Allow-Headers: 'DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Range'");
header("Access-Control-Allow-Credentials: true");

require_once '../civicrm.config.php';
CRM_Core_Config::singleton();

if (defined('PANTHEON_ENVIRONMENT')) {
  ini_set('session.save_handler', 'files');
}
if(session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
$rest = new CRM_Utils_REST();

// Json-appropriate header will be set by CRM_Utils_Rest
// But we need to set header here for non-json
if (empty($_GET['json'])) {
  header('Content-Type: text/xml');
}
echo $rest->bootAndRun();
