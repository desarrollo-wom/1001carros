<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', '1001db' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', "314156aA@" );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');


/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '$ea]5%+plBME5}9(hsT1jH1S3NEYfc@ 6l)m1K:zsNzNf{|/8bI+<>xDaI~-d_&Q' );
define( 'SECURE_AUTH_KEY', '4WC]vN&t&QXBMZ~QKom4KeO.e[_q*?u:CgP<V(*gjmC+h+ tC0i$C:gxt)ZhI|Q:' );
define( 'LOGGED_IN_KEY', '<Z@?d{}^OpaQ0u_FVC8y-8, raVpnZdy-w%MAN.;_]G-8$R_LD<}(W/InXuKvQJO' );
define( 'NONCE_KEY', 'pgmx&q+k,AQXnU4IB^/U,sWp;!D%lU{}].%#8%kRgvCv.j{M,JhmE(j*5<V){k(i' );
define( 'AUTH_SALT', 'n:f{zv-z+J1+?QAa[Ajh(xMs@b_j4JT~WtlwNpWI~<G+]. -~FqZl_3RqVhKZ$1=' );
define( 'SECURE_AUTH_SALT', 'r]&htz]9J+}BvS!E$nRiD90BG2`8K`&~+11vc;o{Tpgx#bA-zmT~Ma=L%KY}CU%p' );
define( 'LOGGED_IN_SALT', 'w3%r^3b(z2.H3._J{|ie3,8VP/g=Oh.B;v&[llhD31: Af[Gz{Z0x6|?#l@x9j~;' );
define( 'NONCE_SALT', 'vr=!uBM1]#>$7Zkn{5ti/5z#J{gks?PN8cf$[5J`pu,txNFsoUyH 3,80d*WsO/w' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = '1001wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


//mis constasntes de desarrollo
define('WP_IVA', 12);
define( 'WP_CACHE', false );


