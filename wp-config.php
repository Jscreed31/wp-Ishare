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
define( 'DB_NAME', 'ishare' );

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
define( 'AUTH_KEY',         '3T`V?m)IN`Vt<-MW])FdPMxwHa`/?%vaYCG1b}h)#q8a+1@bQ:w!(}j?`_;p^p97' );
define( 'SECURE_AUTH_KEY',  'M@azkx(=yDK]:%JI@Q4nw&.~|)YF[_>hR{.nDU,8eeGb&Q#Fe4~d2ftvT.0-/ve3' );
define( 'LOGGED_IN_KEY',    '5|IBgqVF%5xKN1JgU<?)PNdsYIuo&6`W,be2TW^AiTGh@s<,iHlGSmYaR,pqG/Q-' );
define( 'NONCE_KEY',        'cS>~+_qU`<VmXhN+%t_VyE)&(LcqRg BXmC>Bimz/tzgZ-~/5ndpQAV]}$aTnT.2' );
define( 'AUTH_SALT',        'it$wFo,V%HB[TO2?8n1N?-30])Y@-$Jh[-Vt1.p,m5vRo]dE^c-~Jbo-WZ^9})Fr' );
define( 'SECURE_AUTH_SALT', 'Fu,m_3}{&Yd}3X;STU=<xhArP-m>Z*bbPkI?(j6{MIHrd)I(>6ST4W,yGZpr>Nf:' );
define( 'LOGGED_IN_SALT',   '$>OByCm>,,zT_/z5w;s~T+yc[7{R&h=[SDc[k~),dD3,!Z+pWH=>6B_4$CUbF5l_' );
define( 'NONCE_SALT',       'x;[<tQ}X#L#VDMCX_?@OPL$~Y#*yb>:~aL$=ns{D2HvVqx,f-_eYmL G/}vPFp{2' );

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
