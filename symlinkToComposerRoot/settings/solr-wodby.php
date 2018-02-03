<?php
return [
  'backend' => 'search_api_solr',
  'backend_config' => [
    'connector' => 'standard',
    'connector_config' => [
      'scheme' => 'http',
      'host' => 'solr',
      'port' => '8983',
      'path' => '/solr',
      'core' => 'default',
    ],
  ],
];

