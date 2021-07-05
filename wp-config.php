<?php
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));
define('FS_METHOD', 'direct');
define('AUTH_KEY',         '({R+nX`_H }tIl0BZS%-R_U&q5gqjggB5rHv-9+h*GAc5-/{Q- sH-f-+{+^7eh/');
define('SECURE_AUTH_KEY',  'nJ!0{|qx@WoeiRn+?=ceD2S(m69^rSSiYk^~cG9I>6dT;k7mu/([or1A-aVV#a)X');
define('LOGGED_IN_KEY',    '?=C=hPbILY+SL[k&N4,#0#4-{y]0h_f/t@5X|/&s?3v[zE=m@5bhuC0Lr !`E9VL');
define('NONCE_KEY',        ' LAB,0%Q ^iGDPNCuj+w6D8%Hcu||EmS-4|Vvs+U:sq|v=-#+vfQwe,wXA3hGvM3');
define('AUTH_SALT',        'pw4MY[TC#L@=!$:KQwVIsk]n@D/ab!hjx;Kt=;ZtFsyUK9:va,_SAa>YtVEf]XS|');
define('SECURE_AUTH_SALT', 'bfNRz|#! S#tiaE/A-A5~nDH33&B73qP{22ZyP_.+P3Q;A+*Uz<9Wv(r6+K#cX_Q');
define('LOGGED_IN_SALT',   '`P`zF;$./NL!x*n0]#W8|umDVrs`-K$n!@.-|t|KR q>c.z-e1/x|M}cODuBq@ey');
define('NONCE_SALT',       'M+-V,OP>f&r!QGrNsi[VONhJFEO*5Laf0<JK]vo+[N|xv[p&.>nbT,EZ]E_G5;+$');


$table_prefix  = 'toqoa_';
define('WP_DEBUG', true);
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
$_SERVER['HTTPS'] = 'on';
}
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');