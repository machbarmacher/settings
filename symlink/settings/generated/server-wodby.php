<?php
$isLive = WODBY_INSTANCE_TYPE === 'prod';
$siteurl = $WODBY_URL_PRIMARY;
// We include this here, rather than relying on wodby adding to s/d/settings.php.
include '/var/www/conf/wodby.settings.php';

