<?php
// Adjust this file to your needs.

// Disable shield if live.
if (!empty($isLive)) {
  $config['shield.settings']['user'] = '';
}

# DEBUG
# Switch off aggregation without messing with settings.
#$config['system.performance']['css']['preprocess'] = FALSE;
#$config['system.performance']['js']['preprocess'] = FALSE;
# Enable TWIG debugging.
#$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/services.twigdebug.yml';
# Switch off render cache and dynamic page cache.
#$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/services.nullcache.yml';
#$settings['cache']['bins']['render'] = 'cache.backend.null';
#$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
#$settings['cache']['bins']['page'] = 'cache.backend.null';
# Enable http cache headers.
#$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/services.cacheheaders.yml';

// Set solr server for index with name "content". The required file is auto-symlinked.
// $config['search_api.server.content'] = require '../settings/solr.php';

