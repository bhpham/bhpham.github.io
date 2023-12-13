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
define( 'DB_NAME', 'u653383390_blog' );

/** MySQL database username */
define( 'DB_USER', 'u653383390_binhpham' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Soide113' );

/** MySQL hostname */
define( 'DB_HOST', 'sql427.main-hosting.eu' );

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
define( 'AUTH_KEY',         ',1#D>_?PwL$)@F1Gau9=(-W]B,5$[Sx!Y2v$;=<foEK&W:0?~tgdp9Peb[ESK/.f' );
define( 'SECURE_AUTH_KEY',  'CV, ^Z;&mS??`){lz)WY.h|LOO[ym:O)A*@f2iE=2!+|b@[oRdrnb&vIQ*@gE*rK' );
define( 'LOGGED_IN_KEY',    ')9Z2,>:Wtk0*yhA1=Yo%HaUvRA(7 8(QxL(vDnSg@s_1u0Aes5a(1,[C3zw(Oq~+' );
define( 'NONCE_KEY',        'pW8[rmfkW{Pz%mX?m#lx.JF}E*%#@@lp97kU4QSdIdsC7q-`WoJ7d~m|JHju7}`S' );
define( 'AUTH_SALT',        '&&}zZ0a<<,CaaVH&|F%)2UK~KiWs#enM8*:cNGEthD: PW1z!,>{r6q4*0zdK&k+' );
define( 'SECURE_AUTH_SALT', 'p1s:YX~S8flmNou747}, $gl#q8p*Oa`+]bX)qlE48!T%w8_/a+9jkYF|ry}u6[=' );
define( 'LOGGED_IN_SALT',   '_wI_M6dfFl./(0H@*S0qLZn+L7&swS6-x 8_WwSxgTU};1_&<~c&VH[;QJ0Z(wAK' );
define( 'NONCE_SALT',       'Mb&#,mAzbSV:[j-C$IPK?^#xn`Y1kQz`6bQI>PtKpZP{|MUU,/;39@r@@>c.0]0#' );

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
