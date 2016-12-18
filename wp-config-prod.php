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
define('DB_NAME', 'process_two');

/** MySQL database username */
define('DB_USER', 'ysl150');

/** MySQL database password */
define('DB_PASSWORD', 'Holiday100');

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
define('AUTH_KEY',         'UJs3cPKSbUlWHcRd3VjuKREaAuy3UFXlG8kLgsYMQ0CizPjQbGBCcMNQGjz4r4Bg');
define('SECURE_AUTH_KEY',  'zVlzZzhY07JBTa3uDz4onVkMDrfNxGQf8RaZULjbpD2OSsyqYEKTJq22kexEFHRB');
define('LOGGED_IN_KEY',    'yBbYtKEPYZXLaalPcHArYz9QHS1YBvgJHTnHzF9qXCvUhsE70AwPH05MGUstGIx0');
define('NONCE_KEY',        'mbCW8YuLLxtvec9YCQdQjIjAGxyO7X2iw4DAijfuAgeCYrhjpOJLbOxGx0vqJxm9');
define('AUTH_SALT',        'HOfGRjJbp62brGZ2c7ghOph79Kr4TIEUX3vxHnTDP2hfoMmLIyUisCkZC2ykPZ9F');
define('SECURE_AUTH_SALT', 'V25IK8ERRo34y95nezwhE5318IkTcKvYyEs0AOQnjiwkIYJIrV87T11IYIEzrwNK');
define('LOGGED_IN_SALT',   'TfHvw9c9IS6jyPZcnvLa7D4D3tIN3cnpACmM3yYSq3MhcDiW1dcHNXGQW4pj6D45');
define('NONCE_SALT',       'xMxEqPv0LzAXJxjwjfmUOOlPp85EO1mNcvnVQZSesz4uQbfSKlInPOERuwrwAYce');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
