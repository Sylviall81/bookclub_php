<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php"); // Redirige a la página de login
    exit(); // Detiene la ejecución del script
}

require_once('../config/database.php');
require_once('../lib/db_utils.php');
require_once('../lib/validation.php');

//session_start();
// Inicio de sesión
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
--><html>
	<head>
	<?php 
	require_once("../includes/head.php");
	?>
	</head>
		
<body class="landing">
		<!-- Header -->
		 <?php require_once('../includes/header.php');?>
		 

				<section class="wrapper style2">
					<div class="inner">
					
		 <h2>Hola <?php echo isset($_SESSION)? $_SESSION['user_name']:"Invitad@";?></h2>
		 <h3>Bienvenid@ a tu espacio personal! </h3>
					
					
						<article style="background-color:#1e2832;" class="feature left">
							<span class="image"><img src="../images/user_placeholder.png" alt=""></span>
								<div>
										
										<h5>Datos de usuario:</h5>					
								<?php 
								    $userId = isset($_SESSION['user_id'])? $_SESSION['user_id']:null;
									if($userId){
                                        $userData = getUserById($userId);
										//echo "ID: " . $userData['id'] . "<br>";
										echo "Nombre: " . $userData['name'] . "<br>";
										echo "Apellido: " . $userData['lastname'] . "<br>";
										echo "Email: " . $userData['email'] . "<br>";
									} else {
										echo "Usuario no encontrado.";
                                    }
								?>
								
								<br>
								<h4>¿Que quieres hacer hoy?</h4>
									
							<ul class="row actions">
							
								<li>
									<a href="#create_post" class="button small ">Crear post</a>
								</li>
								<li><a href="#user_posts" class="button small">Mis posts</a></li>
								<li>
									<a href="#store" class="button small">Tienda</a>
								</li> 
							</ul>
							
						</div>
						</article>

					</div>
						
			</section>

			<section id="one" class="wrapper style1">
					<center>
					<h2>Publicaciones recientes</h2>
					</center>
							
    <div class="inner">
        <?php
		$limit = 2;
        $recentPosts = getRecentPosts($limit); // Obtiene los 2 más recientes
        if (empty($recentPosts)) {
            echo "<h3>No hay posts disponibles.</h3>";
        } else { 
			$index = 0;
            foreach ($recentPosts as $post) {
                $postClass = ($index % 2 == 0) ? "feature left" : "feature right";        
        ?>
                <article class="<?php echo $postClass; ?>">
                    <span class="image"><img src="<?php echo $post['image_url']; ?>" alt="" height="600"></span>
                    <div class="content">
                        
						<h2> <?php echo $post['title']; ?> </h2>

                        <!-- Código PHP para buscar autor -->

                        <?php  
						$post_id = $post['id'];
						$author = getAuthorByPostId($post_id);
						if (!$author){
                            $author = "Autor no encontrado";
                        }
						 
                        ?>
                        <h5> Publicado por: <?php echo $author; ?> | Fecha: <?php echo $post['created_at']; ?></h5>
                        <p><?php echo substr($post['post_content'], 0, 300) . "..."; ?></p>
                        <ul class="actions">
                            <li>
                                <a href="./post.php?id=<?php echo $post['id']; ?>" class="button alt">Ver más</a>
                            </li>
                        </ul>
						<!-- Favoritos -->
						<span>
							<?php
							$isFavorite = $post['favorito'] ? '<i class="fa-solid fa-heart"></i>' : '<i class="fa-regular fa-heart"></i>'; // Corazón lleno o vacío
							?>
							<a  href="toggle_favorite.php?postId=<?php echo $post['id']; ?>" class="favorite-toggle">
								<?php echo $isFavorite; ?>
							</a>
							</span>
                    </div>
                </article>
        <?php 
           $index++; } // Fin del foreach
        } // Fin del else
        ?>
        <div>                            
            <center>
                <ul class="actions">
                    <li>
                        <a href="../pages/blog.php" class="button big special">Ver más..</a>
                    </li>
                </ul>
            </center>
        </div>
    </div>
</section>


					<!-- seccion de gestionar mis publicaciones tabla-->
<!--Logica para borrar el post sin irme a otro fichero-->
<?php 
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["deleteId"])){
	$post_id = $_GET['deleteId'];
	//print_r($_GET['deleteId']);
	
	if (!deletePostById($post_id)){
			// mensaje de éxito
			echo "<h3 style= 'color: red;'>❌ Error al eliminar el post.</h3>";
	}
}
?>


<section id="user_posts" class="wrapper style2">
    <header class="major narrow"><h4>Mis Publicaciones</h4></header>
    <div class="inner">
        <!-- Logica para borrar sin irme a otro fichero -->
        <div class="table-wrapper">
            <?php
                $posts = getPostsByUser($userId);

                if (count($posts) > 0) { 
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <td><?php echo $post['title']; ?></td>
                            <td>
                                <?php echo substr($post['post_content'], 0, 50) . "..."; ?> <br>
                                
                            </td>
                            <td><?php echo $post['created_at']; ?></td>
                            <td>
                                <ul class="actions">
                                    <li>
									<a href="post.php?id=<?php echo $post['id']; ?>" class="button alt">Ver Artículo</a>
                                    </li>
									<li><a href="?deleteId=<?php echo $post['id']; ?>" class="button alt"
                                   onclick="return confirm('¿Estás seguro de que quieres eliminar este post?');"
                                   style="color: red; text-decoration: none;">🗑 Borrar</a></li>
                                </ul>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                </tfoot>
            </table>
            <?php 
                } else { 
                    // Si no hay posts, mostrar mensaje
                    echo '<h3>📭 Vaya, parece que no tienes posts todavía.</h3>';
                    echo '<p>¡No esperes más! <a href="#create_post">Haz clic aquí para crear tu primer post</a>.</p>';
                } 
            ?>
        </div>
    </div>
</section>
 <?php require_once('../includes/store.php')?>

				<!-- From para crear posts -->
				<section id="create_post" class="wrapper style1"><div class="inner">
					<header class="major narrow">
						<h2>Crea una publicación</h2>
					<p>¿Qué has leido ultimamente? ¿Hay algo que nos quieras recomendar?</p>
						<p>	Publica un nuevo post y contribuye a nuestra comunidad:</p>
					</header><form action="post.php" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="title" placeholder="Título" type="text"></div>
								<div class="6u$ 12u$(xsmall)">
									<input name="image_url" placeholder="Imagen (inserta una URL válida)" type="text"></div>
								<div class="12u$">
									<textarea name="post_content" placeholder="Contenido.." rows="6"></textarea></div>
							</div>
						</div>

		<!--BOTONES DEL FORM-->				
						<center>
						<ul class="actions"><li><input type="submit" class="special" value="Publicar"></li>
							<li><input type="reset" class="alt" value="Limpiar Formulario"></li>
						</ul>
					</center>
					
					</form>
				</div>
			</section>
			
					
					
		
			
			
		
			
			
			<?php 
		require_once('../includes/footer.php');
		require_once('../includes/scripts.php');
		?>
		</body>
		</html>
