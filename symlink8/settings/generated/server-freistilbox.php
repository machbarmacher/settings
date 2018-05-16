<?php

$siteConfig = json_decode(file_get_contents('../config/site-config.json'), TRUE);
$instanceName = $siteConfig['environment'];
$isLive = $siteConfig['environment'] === 'live';
$siteUrl = require '../settings/generated/siteurl.php';

$settings['trusted_host_patterns'] = array_map(function ($domain) {
  return '^' . preg_quote($domain) . '$';
}, array_merge([$siteConfig['main_domain']], $siteConfig['alias_domains']));

require '../config/drupal/settings-d8-site.php';
require glob('../config/drupal/settings-d8-db*.php')[0];
// This breaks the site without memcache module.
// require '../config/drupal/settings-d8-memcache.php';

$settings['file_private_path'] = '../private/default';
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

