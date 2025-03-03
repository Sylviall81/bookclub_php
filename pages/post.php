<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
--><html>
<head>
	<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require_once('../config/database.php');
	require_once('../config/config.php');
	require_once('../lib/db_utils.php');
	require_once('../lib/validation.php');
	require_once('../includes/head.php');
	
	session_start();
	?>
</head>
<body>
<!-- Header -->
<?php 	require_once('../includes/header.php');	?>

				

				<!--PHP para crear insertar post en DB-->
<!--PHP para registrar usuario e insertar en base de datos-->
<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") { 

$title = trim($_POST["title"]);
$post_content = trim($_POST["post_content"]);
$image_url = trim($_POST["image_url"]);
$user_id = $_SESSION['user_id'];

//print_r($_POST);

	$title = sanitizeInput($title);
	$post_content= sanitizeInput($post_content);
	$image_url = sanitizeInput($image_url);

	$errors = [];

// Verificación de campos vacíos
	if (empty($title) || empty($post_content) || empty($image_url) || empty($user_id)) {

	$mensaje = '<h4> ❌ Todos los campos son obligatorios. <br>Por favor, rellenalos todos.</h4>';
	echo $mensaje;
	echo "<a href='$referrer'><h3 style= 'color: blue;'>🔙Volver </h3></a>";
	
} else {


		// Validaciones específicas
		if (!validateText($title)) {
			$errors[] = "❌ El título solo debe contener letras y espacios.";
		}
	
		if (!validateMinLength($post_content, 20)) { // Ahora requerimos mínimo 20 caracteres
			$errors[] = "❌ El contenido del post debe tener al menos 20 caracteres.";
		}
	
		if (!filter_var($image_url, FILTER_VALIDATE_URL)) { // Validación correcta para URLs
			$errors[] = "❌ La URL de la imagen no es válida.";
		}
		

		// Si hay errores, mostrar mensaje
		if (!empty($errors)) {
			print_r($errors);
			$mensaje = "<h4 style='color:red;'>" . implode("<br>", $errors) . "</h4>";
		} else {
				echo "<br>";
			echo $user_id;
			echo $title;
			echo $post_content;
			echo $image_url;

			if (createPost($user_id, $title, $post_content, $image_url)) {
				header('Location:./dashboard.php');
				echo '<h4 style="color:green;">✅ ¡Enhorabuena!</h4>';
				echo '<p>Tu post ha sido creado correctamente. <a href="blog.php">puedes verlo aqui</a>.</p>';
			} else {
				echo '<h3 style="color:red;">❌ Hubo un problema con la publicación. Inténtalo de nuevo más tarde.</h3>';
			
			
			}

		}
	}
	}?>


<!-- recibimos con el get el detalle de articulo -->

<?php 
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])){
	$post_id = $_GET['id'];
	//echo $post_id;
	$post = getPostById($post_id);
	//print_r($post);
	$author = getAuthorByPostId($post_id);
	//print_r($author);

	
	if (!$post){
			// mensaje de éxito
			echo "<h3 style= 'color: red;'>❌ No se encuentra el post solicitado.</h3><br>";
			echo "<a href='$referrer'><h3 style= 'color: blue;'>🔙Volver </h3></a>";
	} else { ?>  

		<!-- Main --><section id="main" class="wrapper"><div class="container">
		<header class="major special"><h2><?php echo $post['title']?></h2>
						<h4>Publicado por: <?=$author;?> | Fecha: <?= $post['created_at'];?></h4>
						<a href="./blog.php">Ir al Blog</a> | <a href="../public/index.php">Home</a>
					</header>
					<a class = "image fit" href="#" ><img src="<?php echo $post['image_url']?>" alt="" ></a>
					<p><?php echo $post['post_content']?></p>

				</div>
			</section>


<?php


	    }
}
?>

					

<?php 	require_once('../includes/store.php');?>	
			
			
			<!-- Footer -->
			
			<?php 	require_once('../includes/footer.php');?>
			
		
		<!-- Scripts -->
		<?php 	require_once('../includes/scripts.php');?>
			
		</body></html>
