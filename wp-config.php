<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'brief10_plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'G.YJ3^!OH/C`,n^[!mVBO:^57|3C(q<~?l2S>hI4gi0).<A({akLy-oorJfn,6fE' );
define( 'SECURE_AUTH_KEY',  'i;A#e{}$PR%Eg/9[q$NC$8Yf1:U!06O4;.o=U{$*2?E00k<ujhk1)/Y3an`c@_y`' );
define( 'LOGGED_IN_KEY',    '({8+dy)iWSAc3A%TV|0>>e-Pb-[hS%dw[N`CNG7q)JtXG40oVEO)ZswACQs45NB]' );
define( 'NONCE_KEY',        '^kw2Mi$0I@u,%x~3q]G#f7>GeG<Ax#]5hh#WCM)aCX5}3V%u?65aK%#-lOvy~L4P' );
define( 'AUTH_SALT',        'ejZdxBSjAe/W]=.cq9G}v#F]WsMA{)wi1ZT~B`[|z`@-?8?4CVOzpXe,1niuQi`}' );
define( 'SECURE_AUTH_SALT', 'P>;d=n@APMCy{x8 A;b3LK;yr8trR~2{u(mgMzsoG6|ReFGu{D/:3nT5QXGd(-$a' );
define( 'LOGGED_IN_SALT',   'b+5TscRI=?bh55l2p{8Q2)%D9zAnd$jTH}=F-gdfI&vi;)r+wWB6kKnITzzJcpq7' );
define( 'NONCE_SALT',       ']}HS`;&M?JAz,YM/{u,J_ =D(h~b89YX?i23KA2#BG}t:mg5cgJcMaZXraCB!T~{' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
