<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tu_misubishi' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         'fA&Gm3[?QE?WB6Wb6{%{O01L>u5T/LfyJ}#d<_y B_7UC!i$1*~>YVJ9yR62-~2V' );
define( 'SECURE_AUTH_KEY',  'p]&`Y#BaxP)a,}K#&ke`M9@$T>~NOKhDcZu!0.K(JA+<g_Xeg*IV8p}AWfB85U~E' );
define( 'LOGGED_IN_KEY',    'DmhYR:o%oV$D|o=<,8HmfgrK~ed#lfW>2!fzuYI;<XJr_W94#vN7zv+/21#;I7pC' );
define( 'NONCE_KEY',        '$AA`BV8I&jg!c3^x@p80>JM9iPY#|COg37bC[%SB4^TGoLcwKlk-c-B&>~}H!#^O' );
define( 'AUTH_SALT',        '<(svfnjrv;<dvn/WIHkDzI;o$;60f+E/7M]!)cyxx%H1BD2+NVZ>5#e>5D_DGhk_' );
define( 'SECURE_AUTH_SALT', '&hSvvbcKA*:Cns`@l(EW0Zxh@mzBGSO$Qv;6Iw#2];BS!3s_4ql#a/XD(z8dqgRc' );
define( 'LOGGED_IN_SALT',   '2iz:EK86jpp~>9Th.oL1Hl6nP)t!lQgzj{giL5FwCR`*uH3][SH|eMb:dR,h>F;H' );
define( 'NONCE_SALT',       'D.Z`w;E5O^t RmTKoEgoxjuMq-rnpB]yKW/Mqyc<O;~`X%A{9N.<FiI3)Dk]f7R]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
