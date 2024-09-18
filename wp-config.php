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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Q?7o;7C.1LS)FN^s-*UnM4713|,%uI9#iD|[vS!5S~@zvV} rpJApgVQRCZ@w1}R' );
define( 'SECURE_AUTH_KEY',   'R_V1=K0P}i~Z@<SoOOL(mYpr 7gooDqVg(gvcWEY$j*<n%a)jHD&r-jY=oEF )|{' );
define( 'LOGGED_IN_KEY',     '.Oxqo+V eU1gD}M%LG>tz:tDq|h2uW?:qeXg@_8r[3Lx6g0+ij0xd(b9Aw8m;U=F' );
define( 'NONCE_KEY',         'EJa.uC-v+S{dnvkPs0cjJruV:.0U]z6K-%]lOH/f1&kU!rvK,Lp+g(;lZ(~V4Ci@' );
define( 'AUTH_SALT',         'j/:k;6+@3c4:Bue6oJZ/7o,={wU2p#GB)x&l5?2nnR]rNF7|o5_zZG8ms?I9ZQ$!' );
define( 'SECURE_AUTH_SALT',  '^SK;lo_;$4*zCX[ur=dy/?h`GJ?Q,}[xffY7w/XauK6=Ci+o?`Wf_-asr!h5hu3>' );
define( 'LOGGED_IN_SALT',    '_w0A!x>&&Nt7l(vsxY*;z;yNDa;[kS40gi?%*`@H|!:WxVeG%9Qwwi89j/N|.7QV' );
define( 'NONCE_SALT',        'e%G6#M[&?0~Ug)zz.kt^84UCX[y(I6AtPRExvI|gr4sbz6$ECET{b.N%ObKA``>l' );
define( 'WP_CACHE_KEY_SALT', 'WS0,hWQ_tR{?Cm<gMAds_`hg8uJ5?OsJs(pp<veFaZ9A*LK=2~9E]6VSL3L.R7H[' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
