<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
 //Added by WP-Cache Manager




/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
 //Added by WP-Cache Manager
ob_start();
error_reporting(0);

define( 'WPCACHEHOME', '/home/mynational1/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'nia_2015');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '<Qo5V,4yOOZ3Y<oj3p1Tm+*q|tY.{e>IhuDndouW)P^70wu90eu?Zy>lZCumwe^]');
define('SECURE_AUTH_KEY',  'YV8Z!UWp~W~_eg$Qcj_-yiX^~h0RcV-c)`]+D7vc+-h2h78N;AAUL|-@Ep>@KEm ');
define('LOGGED_IN_KEY',    'bTM`w*:lIl>d8+uH+b$N!CAASKHT4N|KT-s&yAD8H[?(A?,|?9{TJ%$Lr-KqMm/$');
define('NONCE_KEY',        '#&)2!C -K/PLl[LnE-p`q;dI8G<]Vdw7bry|Up(]>eWh7Q/gf|ASrVz#VRz!inq7');
define('AUTH_SALT',        ')dy(yCGaGxd&f3HSc@t.d]a9I$*at4)tZIa+Ddl|kvw6HT:a>OU$9y7M&O~KKl[1');
define('SECURE_AUTH_SALT', 'y:GA-}PtsI8 CCYJp9nY&<!(7>t}6?.t=3^8KcPaItiIgf*lS[b@B cNw/} R]Tr');
define('LOGGED_IN_SALT',   '4xx=]K0lBgU<8J^L#9Y0W2> |f}3Jbvv# o?*E;?Av^WPxY*IQ:%=@{(?>SQ-x/j');
define('NONCE_SALT',       'GWfBl+^;;g5|]#xp-rU<HWA,Q!E[M}ygpX9|4F9j|Bq4aHa+O`GeC[S2wjVsT8n8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_nia_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
