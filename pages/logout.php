<?php
require_once("../config/config.php");

session_start();
session_destroy(); // Destruye la sesión
header("Location: " . BASE_URL . "/public"); // Redirige al home
exit();
?>