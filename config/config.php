<?php
// Configuración general
define('SITE_NAME', 'The Book Club');
define('BASE_URL', 'https://app-828c7e83-e0b0-41c5-855f-c3cf129aecf1.cleverapps.io/');
define('DB_HOST', 'b1rqdpwocrarevqbq2qs-mysql.services.clever-cloud.com'); //reemplazar con datos phpadmin
define('DB_NAME', 'b1rqdpwocrarevqbq2qs');
define('DB_USER', 'u6uds9yt2hhhbnhs');
define('DB_PASS', 'Vx2xIg0KSTec57MTmDPX');


$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL.'/public';


// Habilitar o deshabilitar errores (para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
