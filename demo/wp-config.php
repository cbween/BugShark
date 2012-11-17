<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bugsha_wordpress');

/** MySQL database username */
define('DB_USER', 'bugsha_wpUser');

/** MySQL database password */
define('DB_PASSWORD', '^7zTeVb-_Jt=');

/** MySQL hostname */
define('DB_HOST', '174.127.126.211');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Of=OcLN4x]iwu]FISI#_^Mb,Jy`1UN#vb$ntaluAkrof.DJ7,4A[~O!]tZRcUCJ`');
define('SECURE_AUTH_KEY',  '0*+3(&/K.=SX2w+!qqhd-V~x/FNF+e}Gt#5!&j&dPdO8cT?=yYg~[uP}{WE@ sD+');
define('LOGGED_IN_KEY',    ';G<C.fX/ pTz_iY2uR0dN-M:lzvV6O&!;Xk/.TuIRrv2t`WXA@eG Tzl;g0-+;cu');
define('NONCE_KEY',        'QszH $`*bIyPq,+WrB-oGA.,s-%Ez`eLkQ:,f@_e;(:J5Sk~|C8nGn.-;nM-|x-_');
define('AUTH_SALT',        'o-qfookPL+m+8|e.pttIV)E}+Q|+uV(:@+#fwf0b]/>tO@9IW37^y&tw6:BX:Tvs');
define('SECURE_AUTH_SALT', 'n6odKQJ=K+FT1ztAbSV4$KB^A8H-.*tZHc^hwn4} >Y|l5VH.;Mx[2Tw2R#~{t.]');
define('LOGGED_IN_SALT',   '8}j!=-c|MZy~ul)9YOS^,Ngf5jG^u6EvL{WSSL/q$8u`|u01c,<_445}z~cli_W-');
define('NONCE_SALT',       'R6b + |oXE&o6cPGxs`#q*a4ooa6<Tj|9|zt6A0WhVf#`fqOr?/q=i5qIni*|)sT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
