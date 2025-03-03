<?php
require_once('../config/database.php');
require_once('../lib/db_utils.php');
require_once('../lib/validation.php');

session_start();

echo print_r($_GET);

// Verifica si hay un ID en la URL y si es un número válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post_id = $_GET['id'];

    if (deletePostById($post_id)) {
        // Redirigir con un mensaje de éxito
        header("Location: admin_posts.php?message=success");
        exit();
    } else {
        // Redirigir con un mensaje de error
        header("Location: admin_posts.php?message=error");
        exit();
    }
} else {
    // Redirigir si el ID es inválido
    header("Location: admin_posts.php?message=invalid");
    exit();
}
?>