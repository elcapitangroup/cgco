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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'culturegearco' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'vo)5PonA,S<|pt=?)zUY&N26y2ZP&#~z5~Oy*AMWPnXZ98u=v8H[|=Z69f|)y~hX' );
define( 'SECURE_AUTH_KEY',  '9)%pmR`>%Hn[)`2QLa#Z@u*W_i6Nvu~%%1seW><!@,T`Ez,UNI_NOC[P0UK7oy$@' );
define( 'LOGGED_IN_KEY',    'I#@MNY(tnTjX7ITjCo7(=/h_bDxEW:XDMt]&aSrJI`4{.(glw]Z8b#: Ye*#K])T' );
define( 'NONCE_KEY',        'x_ +|i05x8Qqa1om%A#=@kFprs(.%~h2Iw!}<&UQJkA{iJypDI^n/>1/[u%8a4$V' );
define( 'AUTH_SALT',        '-/#53CUPGHy<pWVva{=y]>tV&|d6&?dBp`T`Gs~!TnijY?~2ueYU8KrZM@T{<?BZ' );
define( 'SECURE_AUTH_SALT', 'f##Goo3qw|z,]XFl&RN8>)Ii.j%^-V=/8hxnTLkP$HeF^Ky$ImTYqWHSQCs/;zRw' );
define( 'LOGGED_IN_SALT',   'mAxT_:ojcQc&/?&LWweNsrKndLr<5Pv?C7l^wj3b5?:O{rq{OL$!?G_+vE+DpjDm' );
define( 'NONCE_SALT',       'W|PI7>lEhMeSH@ZmyUHhWnrsT{el`TIGzWz5!zP|bjqQOW=V[sc}:o}GL,@}LJ<5' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
