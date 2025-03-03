<!DOCTYPE HTML>
<html>
<head>
    <?php 
        // Ver errores en pantalla
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();
    
        require_once('../includes/head.php'); 
    ?>
</head>
<body>

    <!-- Header -->
    <?php require_once("../includes/header.php");?>

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="container">

            <!-- Debugging: Verifica si GET está recibiendo el mensaje -->
            <?php //var_dump($_GET); ?>

            <?php if (isset($_GET['message'])): ?>
                <?php if ($_GET['message'] == 'success'): ?>
                    <h3 style="color: green;">✅ Post eliminado correctamente.</h3>
                <?php elseif ($_GET['message'] == 'error'): ?>
                    <h3 style="color: red;">❌ Error al eliminar el post.</h3>
                <?php elseif ($_GET['message'] == 'invalid'): ?>
                    <h3 style="color: red;">⚠ ID de post inválido.</h3>
                <?php endif; ?>
            <?php endif; ?>

			<header class="major special">
                <h2>Generic</h2>
                <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
            </header>
            <a href="#" class="image fit">
                <img src="images/pic11.jpg" alt="" width="1680" height="658">
            </a>

        </div> <!-- Cierra el div container -->
    </section>

    <!-- Footer -->
    <?php require_once("../includes/footer.php");?>
    <?php require_once("../includes/scripts.php");?>

</body>
</html>
