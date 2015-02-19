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
define('AUTH_KEY',         'pD`qc<qO`q-qws[UbOD%`<e.BaE#[;9M}~C1LD#n`;%29?!JO43&=x@@n+%Rk-;7');
define('SECURE_AUTH_KEY',  '&Rq|m)&`,_?%jwq#if{ep!<_W G8@h17QtQg|xL{)5iiQT~g.!dyn^t+#2>U5_~h');
define('LOGGED_IN_KEY',    ',wVU#]q@|FscQq}N|pKc[[dM@L<0{HC F1]329t@Z#V Eo5H5|3OFx~-E+9alCR/');
define('NONCE_KEY',        'UQbK-jIY001)w24]:HeFpq,s,dDe!C1 N7k|X#F1-enK(.dW{>@cdb2T!gh@WNJ2');
define('AUTH_SALT',        'p+WV(I26={zh|-T/z~-aS#+k]:ddVM*TW}@G+`9lKr8rBJp^y3(([DtqqQ$a+IbM');
define('SECURE_AUTH_SALT', 'Dm)xEy><k;,5;ZDQ*)1YHW5,IWuCD!ho;2n?4<>>!Q-Z)%T=}u`z:D1O+0GJlUNj');
define('LOGGED_IN_SALT',   'lT~X+FA#t|2yU.0MhQG:0Y|k]C^fIotg@GAp:>-@%1264PCCQ|`*Sl<{=DAmmw^l');
define('NONCE_SALT',       '4|uB,?X(eexA%IJU1<Z^~|&++Xn|I&522VF1@WmPa/09)6c(.nS-Gh?bMCv--oX-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sundman_';

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
