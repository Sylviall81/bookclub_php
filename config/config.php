<?php
// Configuración general
define('SITE_NAME', 'The Book Club');
define('BASE_URL', 'http://localhost/httpdocs/bookclub/');//hay q reemplazar con esto?http://www.myphpproject.net.mialias.net/index.php

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'bookclubdb');
define('DB_USER', 'root');
define('DB_PASS', '45960967Kk*');
//define('DB_PORT', '3306'); // Especifica el puerto



$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL.'/public';


// Habilitar o deshabilitar errores (para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
