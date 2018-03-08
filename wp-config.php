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
define('DB_NAME', 'store');

/** MySQL database username */
define('DB_USER', 'storeuser');

/** MySQL database password */
define('DB_PASSWORD', '5zEQQNDaaIjMfkhbOBEC');

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
define('AUTH_KEY',         'ljj C.oQ^[cd>GfzCn=!&r;)1)U:-4P2S&$y1[8:nxzNC/(47YTc_,BZ3%( Hz61');
define('SECURE_AUTH_KEY',  '~P0O#v=jvrYHm~Etdv 1GlF/xLTQ]hpQr^5ee$<h94*%QWb?2|Z_$&:*DpqDU~ZP');
define('LOGGED_IN_KEY',    'D7E/63+&n*1)1$9e:Dh7V4N*^66ZvjNZsgRbZ1Ey35JM 0?as&ttgxD-egq9;9MR');
define('NONCE_KEY',        '8~IYO@FL{Y7QBh{@C$YE]r$W7ZSV^^#TC@mA$yE[fO3o,[dF/x^#0W3H1RO%3]m ');
define('AUTH_SALT',        'ulg%{&pso_Q7tI~790|,*:!-KGI{_,O-Ab8sy,nUGJ35dVj6:gEwJoc^gXNFyeR+');
define('SECURE_AUTH_SALT', 'BRq$.jd,.g`O)t6 Z{Aa:GJ:I^=BZqIIXi  aYN8yA;RPV|shN,@<-[F;1Y<{X5U');
define('LOGGED_IN_SALT',   '2`sWG%`a$Oi1w3AWG#gl3,ztM9dRI9,N|P&M8ty35`Vs*|I]Y,&JMqX_spX0h6~6');
define('NONCE_SALT',       't}%<uXT@bv{,KG>Q0pT%8W=lx%tvuZ6_:hcW..w_>;?+=QlTUGt:J3<AU+A<f.V{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ie_';

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
