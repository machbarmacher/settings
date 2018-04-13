<?php

$siteConfig = json_decode(file_get_contents('../config/site-config.json'), TRUE);
$instanceName = $siteConfig['environment'];
$protocol = is_file('../private/_envx.d/PROTO') ?
  file_get_contents('../private/_envx.d/PROTO') : 'http';
$domain = $siteConfig['main_domain'];
$siteUrl = "$protocol://$domain";
$isLive = strpos($siteUrl, '://test.') !== FALSE;

require '../config/drupal/settings-d8-site.php';
require glob('../config/drupal/settings-d8-db*.php')[0];
// This breaks the site without memcache module.
// require '../config/drupal/settings-d8-memcache.php';

$conf['file_private_path'] = '../private/default';
if (!file_exists('../private/default')) { mkdir('../private/default'); }

@include '../private/_settings/settings.local.php';

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

