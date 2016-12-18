<?php
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
define('DB_NAME', 'samconew');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '<FXUztXns+jB_`3lEx4Ra. 1sT}hmQ4]3] 5+p25B@|rwkY3xNoe_~V$KIhMlVua');
define('SECURE_AUTH_KEY',  '_g>7)hXln-}HxclB>0Y3mo&R^u+|[=E~)vHDQ*!o>_U~B{)KEpd0EB3E2j0(D 4m');
define('LOGGED_IN_KEY',    'Ci16c`!Jtf#Bv?uAUYv^J^}JZ<lT`cWYw?3`/8dvZk2ry#,_e,.~%%_mJ+MWwQdP');
define('NONCE_KEY',        '#pvf`8(KSH=y(M*UDWxv)5dhLgWN~/El@0#U*U^&&5;4K$Mm}Aj0y&a?~<m|}u):');
define('AUTH_SALT',        '1S]@+5UhFkWv/E>Yt#dl<dIIih<Bd3r[ex 3Y8;b-F}|Ib|~r<~;aW^LNSAQieT0');
define('SECURE_AUTH_SALT', 'LnW%|TwR8hG4@}SleZ,DTX#pkWs3/->IFw<^|`y**jErlmB.idzo0lX[@)`6<B!=');
define('LOGGED_IN_SALT',   '4~aD+rTm|s+6]K9A8zA`x|v[E)(2nP,u+:.G={+*x@`_IYn!__^(Rr?<6lQh@tT#');
define('NONCE_SALT',       'cy%JZ~Ks#bTd^SR HS^miLu=u>#MsM f$|9^K6>5Jc{CPB[iY~uUe|%-MuEL,)It');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
