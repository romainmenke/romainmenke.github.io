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
define('DB_NAME', 'romainmenke_com');

/** MySQL database username */
define('DB_USER', 'romainmenke_com');

/** MySQL database password */
define('DB_PASSWORD', '8SnC4fus');

/** MySQL hostname */
define('DB_HOST', 'romainmenke.com.mysql');

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
define('AUTH_KEY',         'i*NbX?2N7xB#Y: qxA>:Q+r whuI8t?*,i9_m4N0?eFjY=tJmdE:-2X,RLwX1&2.');
define('SECURE_AUTH_KEY',  'yKQ{7[>u|LosL+}Ei$iQ&v|yy$UwF1)6#Q?Y#pBZ1_{fd0|~tA=r=G;ZoEQszP]F');
define('LOGGED_IN_KEY',    'cw_a--Cv}vv+;R5]VO(0>8`/xPbnoaMgbHm99wR&a(_VN;w.=J(wp+]$Ef {=cU8');
define('NONCE_KEY',        '8)xCs7#2}D;BsTuSnTbA_,!z$I~1m|?7+@i|zdTR)=rLM>YIuBD]+s&:hud;zB;[');
define('AUTH_SALT',        's6lh xGaCi2`DHt5jq-ckIx(3(!2H+x>oHvF}U`[|Ze.2lz<1p%4cM/0$,Bng3U2');
define('SECURE_AUTH_SALT', '<6{+(|bkDDLD+K=P7UP^3FltT1Jsz,Zc<T||4hdL|SJfJt8bB4s&B1,b$#5>$kXU');
define('LOGGED_IN_SALT',   'To(5t{EG~0rg,|[#0[j@HxJ_IBK3w$+`+l4O>Y=~evW!if0s+bmAq+6CG#N_Azl_');
define('NONCE_SALT',       '-Y!QBYn|+!+}n)I`*b=Q=3!,ai*J(0Nhkjb6BL=+Z1MJW+t]1.P;-jB~uE|TPd%2');

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
