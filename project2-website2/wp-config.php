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
define( 'DB_NAME', 'wp-bookswap2' );

/** MySQL database username */
define( 'DB_USER', 'wp-bookswap2' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '192.168.0.26' );

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
define( 'AUTH_KEY',         'cu5n{dV=L,v,;Po=./[UECFEmF2&irKmmd@RdIg(V)AcP $chO/rpjZjb9Rv)izs' );
define( 'SECURE_AUTH_KEY',  'A*!DLWR7/rT:xjnk!)mKj3^i}{r$R5]kDhqbRq/e*}qi<Tb}eHkPR&.L,xY!)pWY' );
define( 'LOGGED_IN_KEY',    '|!YR{B|f?>.qeGEvBlw#&ZpI-8jFdEQ4Nt.?mD5_7=9oIsod}^$m#xW~ yU09}[)' );
define( 'NONCE_KEY',        'J# Ujvxs4||a6WP.L8?hhi+pAled:Fo+k/-p,mYPQ|]L: `mWhRvQv$SyK=`o1dt' );
define( 'AUTH_SALT',        '@ZB[F6 lA?SNyH9t9vOFzAu)-Y>6Md[F).Wjpo=g(d=$c11 bex:^R,yqUSdXe3Q' );
define( 'SECURE_AUTH_SALT', '? u8(.L>DkkoCEZL:U#u,i`}km)fZ[ gHDS$sq!awDD=l!2Y|[>R|4#bvgXkd[MN' );
define( 'LOGGED_IN_SALT',   '(hUL=P40/FPri^ZMt[)T:cQRLuYex9kb~bS#pd##oQR/Ob 6=exIX=,e;c/t`s=/' );
define( 'NONCE_SALT',       'sbP(/3rD#F>0_FZoNE-YMX8l$0|%;p:p,>ww[tu~A]gwl19=6fB*q7YRxNY<{y&?' );

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
