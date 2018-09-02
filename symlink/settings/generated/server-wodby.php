<?php
$isLive = getenv('WODBY_INSTANCE_TYPE') === 'prod';
$siteUrl = require '../settings/generated/siteurl.php';
$instanceName = getenv('WODBY_INSTANCE_NAME');
// We include this here, rather than relying on wodby adding to s/d/settings.php.
include '/var/www/conf/wodby.settings.php';
// If www-data writes files, wodby should own them too.
umask(002);
// Set sgid so dirs written by drush from wodby user inherit www-data group.
if ((fileperms('sites/default/files/') & 07777) !== 02775) {
  chmod('sites/default/files/', 02775);
}
// Set dir mask accordingly.
$settings['file_chmod_directory'] = 02775;
// This is standard.
$settings['file_chmod_file'] = 0664;
