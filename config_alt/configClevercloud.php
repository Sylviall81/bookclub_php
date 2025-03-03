<?php
// Configuración general
define('SITE_NAME', 'The Book Club');
define('BASE_URL', 'http://www.myphpproject.net.mialias.net/bookclub');//hay q reemplazar con esto?http://www.myphpproject.net.mialias.net/index.php

// Configuración de la base de datos
define('DB_HOST', 'localhost'); //reemplazar con datos phpadmin
define('DB_NAME', 'bookclubdb');
define('DB_USER', 'mymyphpprod2');// user: mymyphpprod2 psswd: Vj8q0DlP
define('DB_PASS', 'Vj8q0DlP');



$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL.'/public';


// Habilitar o deshabilitar errores (para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
