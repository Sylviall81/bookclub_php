<?php
define('SITE_NAME', 'The Book Club');
define('BASE_URL', 'https://app-828c7e83-e0b0-41c5-855f-c3cf129aecf1.cleverapps.io/');
// Configuración general
define('DB_HOST', getenv('MYSQL_ADDON_HOST'));      // Obtiene el host de la base de datos
define('DB_NAME', getenv('MYSQL_ADDON_DB'));        // Obtiene el nombre de la base de datos
define('DB_USER', getenv('MYSQL_ADDON_USER'));      // Obtiene el usuario de la base de datos
define('DB_PASS', getenv('MYSQL_ADDON_PASSWORD'));  // Obtiene la contraseña de la base de datos
define('DB_PORT', '3306');


$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL.'/public';


// Habilitar o deshabilitar errores (para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
