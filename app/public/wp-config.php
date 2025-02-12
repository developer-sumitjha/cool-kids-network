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
define( 'AUTH_KEY',          '+hz88*&yU}ir[NS6{]A1Y -.~25V>dpF*8,BdYg;rVr}H2zX&+uw=>U72|1Y1reo' );
define( 'SECURE_AUTH_KEY',   'v>y}1TOQu9$~0]W6p6k(g$$27n.}d ey4]IRKe=hlbnf xFtB$fCacZ(k[@e9J{&' );
define( 'LOGGED_IN_KEY',     'mAFUxwA sNO#g_CfxJ5I54H2j6~65&|lu$cc41Xh( b.$(l^QXqYFn%LjS>1aoXN' );
define( 'NONCE_KEY',         'Q*H#/1|AF<SR,/ixRt+X#HAfO8TVnli}Y&_lf78n0?CSwz]R>]MLlaOYUt)Cyk_s' );
define( 'AUTH_SALT',         't&gpky*Tv*qXGsWY&v*y3&A&T>&yP`?#RjMI0qzl<r?.#ySDF~wgs oBVaUjzS0.' );
define( 'SECURE_AUTH_SALT',  '~+FHA 60r|:9}<Td%I] g7Bkl77XnKt6lSC]=slP @]MWYNuT($8np1(Zj|Q,Y<F' );
define( 'LOGGED_IN_SALT',    '^-*:tfwf_$kG4a|Ml^m[z*lUCJrQtKhZOj~AO8*8/j<76<.EH <>Ai$YQ=uzJTld' );
define( 'NONCE_SALT',        '_l#w2>1>(;8FBv} )QsR>;9V1S$Sv:aI?mO2I,+m~bixCu% Xfl(MGAf(lE5+LHN' );
define( 'WP_CACHE_KEY_SALT', ',QAM*XKv+cO+@w>}Wewor2he7[9(U[sZ ^T0WkVoH^UhB{2#;w!aQ=JrH&eBr3S-' );


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
