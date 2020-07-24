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
define( 'DB_NAME', 'projetTattaguine' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '^3;B,Dg{r)~)UT6@r$6aXMG)?EFQ|;)YT}yac&{AB~@+Gr;T(/;Wh@B^lY%xn8<S' );
define( 'SECURE_AUTH_KEY',  '@_^PJ>0A;1l`!})JgFM<:]*01bJ#J_=~&e0KsxPy[V~T!n?AX3Kb9:0e(AdP]#O|' );
define( 'LOGGED_IN_KEY',    'PDjF^~K;Rb,H%=aaa6($5u=I^j=vk#Luo![s#Ze_oy<&Y r/PeE-V<d.{fkR3l+k' );
define( 'NONCE_KEY',        'Ed:h|mpjhlM[-lN8W+uw)Iv0&{:DSreIW?Y!}sT|r%A RRl++Z3l?.*-#S{h$Y]V' );
define( 'AUTH_SALT',        '/{USZce|;.OJ(0RSDppt2&GP~bJ/}6]<yjW_SEt5975mq*/C)T/%IDCKvT*SIM7%' );
define( 'SECURE_AUTH_SALT', '<W{X[pN;NA{CQO]o8_4[q0rA5FYZ*6EJy(a@H[/h_P6u7h.B ckIszB]Pj$25q$M' );
define( 'LOGGED_IN_SALT',   '_;zl]QariMGY z,s@}cz(7Ak,Rp.?q&&)#Msd:5LejKpvMs&G9$06&! /hddGb+H' );
define( 'NONCE_SALT',       '$#Z)UNrjY<DDkd $kzd6TD$&VyXo=&@=Ah#*INI3._q82qsI!fs$bZi+d:ll-:|3' );

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
