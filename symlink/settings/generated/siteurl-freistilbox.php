<?php
$siteConfig = json_decode(file_get_contents('../config/site-config.json'), TRUE);
$protocol = is_file('../private/_envx.d/PROTO') ?
file_get_contents('../private/_envx.d/PROTO') : 'http';
$domain = $siteConfig['main_domain'];
$siteUrl = "$protocol://$domain";
return $siteUrl;
