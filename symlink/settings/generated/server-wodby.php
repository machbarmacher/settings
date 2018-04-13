<?php
$isLive = getenv('WODBY_INSTANCE_TYPE') === 'prod';
$siteUrl = require '../settings/generated/siteurl.php';
$instanceName = getenv('WODBY_INSTANCE_NAME');
// We include this here, rather than relying on wodby adding to s/d/settings.php.
include '/var/www/conf/wodby.settings.php';
// If www-data writes files, wodby should own them too.
umask(002);
