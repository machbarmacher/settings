<?php
// Adjust this file to your needs.

// Disable shield if live.
if (!empty($isLive)) {
  $conf['shield_enabled'] = FALSE;
}

// Set solr server for index with name "content". The required file is auto-symlinked.
// @todo Figure out how to mangle the server name into the array keys.
// $conf += array_map(..., require '../settings/solr.php');

