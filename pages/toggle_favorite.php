<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require ('../config/database.php'); // Conexión a la base de datos
require ('../lib/db_utils.php'); 

if (isset($_GET['postId'])) {
    $post_id = $_GET['postId'];
    if (toggleFavorite($post_id)) {
        header("Location: ".$_SERVER['HTTP_REFERER']); // Redirige a la misma página
    } else {
        echo "Error al actualizar el favorito.";
    }
}
?>