<?php
require '../config/drupal/settings-d8-site.php';
require glob('../config/drupal/settings-d8-db*.php')[0];
// This breaks the site without memcache module.
// require '../config/drupal/settings-d8-memcache.php';

$settings['file_private_path'] = "../private";
@include '../private/_settings/settings.local.php';

$siteurl = '../settings/siteurl.php';
$isLive = strpos($siteurl, '://test.') !== FALSE;

// Redirect to HTTP(S) if necessary.
if (PHP_SAPI !== 'cli') {
  if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== "on") {
    if (file_exists($_SERVER['HOME'] . '/ssl')) {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
    }
  }
}

