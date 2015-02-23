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
define('DB_NAME', 'vsundman_wp');

/** MySQL database username */
define('DB_USER', 'vsundman_wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'gusman88');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '<+dNMZh}t5L2SOo/z|D%~j,|x/cX>KA_C5fRI4/G#+|R6xuQ_9M9en{e_B-nEFdV');
define('SECURE_AUTH_KEY',  'Ga-iks$MY`|zE$h*,sXfwCxAPz+ 66pzOXQsnAKu`V|V20 7EO)pxU=%)4@CIzz<');
define('LOGGED_IN_KEY',    'Ba|y`75ho/I]x-{KBfYAXl5+AGy-C_<G:gTc|*$e=0Q^I$+G6qh4 5P1oN=riMY:');
define('NONCE_KEY',        'o[g8}&aE&p0yK/)aIP+oKIK@j_&c96HQg!B?sux?t+tvTWX$?_z^jod@,V$rQZ|Y');
define('AUTH_SALT',        '.=c8(=3grzq6U0uYzGWo8&Up|-N]yZ~6Lh(x)k/^CkVPrVL0j80L5?ju+{d$ALZ ');
define('SECURE_AUTH_SALT', '`+c|b|Q?AD`tz5$mj3Q]/ *?YPS;+K#+YpjT9-AYre3-Of|X9Y{-V5~I9gmU3&n]');
define('LOGGED_IN_SALT',   'OoOt*Wuc>{FTgAay27E-&)`SU}-wF/i6(#0yJTN{2:)3p-h|+{Po6V5|@^ovl|]:');
define('NONCE_SALT',       '8u+3.405|41Kig|^(v}v8km24+>a^-pAfAhs-GT[jY@>`BqIu5n?`C|AS.Fs6<b:');
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
