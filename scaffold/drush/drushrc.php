<?php
if (defined('DRUPAL_ROOT') && is_file(DRUPAL_ROOT . '/../settings/generated/siteurl.php')) {
  $options['l'] = require DRUPAL_ROOT . '/../settings/generated/siteurl.php';
}

// Leave out unnecessary DB data in sql-sync and sql-dump.
$options['structure-tables']['common'] = array('cache', 'cache_*', 'cachetags', 'history', 'sessions', 'watchdog');
$options['structure-tables-key'] = 'common';

$options['skip-tables']['common'] = array('migrate_*');
$options['skip-tables-key'] = 'common';

// Leave out unnecessary files.
$command_specific['deploya-pull-data']['public-files-exclude-paths'] = 'advagg_css/:advagg_js/:css/:ctools/:feeds/:js/:languages/:styles/';

