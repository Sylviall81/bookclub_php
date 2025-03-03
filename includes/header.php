<?php 
require_once __DIR__ . '/../config/config.php'; 

//session_start();

$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Invitad@ ';
?> <!-- Incluye la configuración -->

<!-- Header -->
<header id="header">
    <h1><a href="<?= BASE_URL ?>/public">The Book Club</a></h1>

<?php

    if (!isset($_SESSION['user_name'])) {
        echo '<a href="' . BASE_URL . '/pages/login.php"><i class="fa-solid fa-circle-user"></i> Login</a>';
    } else {
        echo '<a href="' . BASE_URL . '/pages/dashboard.php"><i class="fa-solid fa-circle-user"></i> ' . htmlspecialchars($userName) . '</a> |';
        echo '<a href="' . BASE_URL . '/pages/logout.php">Logout</a>';
    }


// if (session_status() == PHP_SESSION_NONE) {
    
//     echo '<a href="' . BASE_URL . '/pages/login.php"><i class="fa-solid fa-circle-user"></i> Login</a>';
// } else {

//          // Si el usuario está autenticado, mostrar su nombre y Logout
//          echo '<a href ="'.BASE_URL.'/pages/dashboard.php"><i class="fa-solid fa-circle-user"></i> '. htmlspecialchars($userName).'</a> |';
//          echo '<a href="' . BASE_URL . '/pages/logout.php">Logout</a>';
  
    
// }

?>
    <a href="#nav">Menu</a>
</header>

<!-- Nav -->
<nav id="nav">
    <ul class="links">
        <li><a href="<?= BASE_URL ?>/public">Home</a></li>
        <li><a href="<?= BASE_URL ?>/pages/register.php">Registro</a></li>
        <li><a href="<?= BASE_URL ?>/pages/blog.php">Blog</a></li>
        <li><a href="<?= BASE_URL ?>/public/#store">Tienda</a></li>
        <li><a href="<?= BASE_URL ?>/public/#four">Contacto</a></li>
    </ul>
</nav>
