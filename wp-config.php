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
define('DB_NAME', 'game');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ')4h]$c7Ji`sG&$@[wXY(F]u_C_*N9BON=EuO?J*]1 Oxg)M|&{<-g8bqzQ;gGj0s');
define('SECURE_AUTH_KEY',  'EgTY>!w?w}|vEYgdNIgghZJu1|fPh6R8DI2slDvImoU4<~i-v{fs5WpbgrZWgpV$');
define('LOGGED_IN_KEY',    'V9YE9K -?FRgPF:<nqD)p88!da+vjc]zoQHw}_gd` w /|c(U f8:/H&tHm*YnW&');
define('NONCE_KEY',        'Xv~6QXA]X[H[PbC&}[B#;|4P!90`WfM4I#oh8):hAF;{mBCDP[]*zG]I[/fkt9lL');
define('AUTH_SALT',        'EPylEElYIe>m(a3/Q(w]ZADV+)(K$L0t@o5(^P,A;UJ(|;nZ816qzAYBreEA0Pr4');
define('SECURE_AUTH_SALT', '^Gb`jQD:( (C{YTm6K-Q|zzaqxv WDES1;Q~=!ky$/[^o|6Nt:=IT5n6rm=b:% =');
define('LOGGED_IN_SALT',   '-p~H97J{3/?Enx?1DfjUYee{0>+]lN-$P(n-IhJZ;@ )dm#jFz?4#2>*6arbpPqH');
define('NONCE_SALT',       'e*r=H`+]q-P]Ft~*N;lI~}bs5)u,()4sone+Y@m 1K&4B|8&8M,DM<=j?]G%OEhn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bc_';

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

define( 'WP_AUTO_UPDATE_CORE', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
