<?php
// Adjust this file to your needs.

// Disable shield if live.
if (!empty($isLive)) {
  $conf['shield_enabled'] = FALSE;
}

// Set master scope.
$conf['master_version'] = 2;
$conf['master_modules'] = array(
  'base' => array(
    // 'XXX',
  ),
  'dev' => array(),
  'live' => array(),
);
$conf['master_removable_blacklist'] = array(
  0 => 'modules/*',
);
$conf['master_current_scope'] = $isLive ? 'live' : 'dev';

// Set solr server for index with name "content". The required file is auto-symlinked.
// @todo Figure out how to mangle the server name into the array keys.
// $conf += array_map(..., require '../settings/generated/solr.php');

