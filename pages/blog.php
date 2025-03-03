<?php

require_once('../config/database.php');
require_once('../lib/db_utils.php');
require_once('../lib/validation.php');
//session_start();
// Inicio de sesión
error_reporting(E_ALL);
ini_set('display_errors', 1);



session_start();
$user_id = $_SESSION['user_id'] ?? null;


?>

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

	
				<!-- Banner --><section id="banner"><i class="icon fa-thin fa-book"></i>
				<h3>The Book Club</h3>
				<p>El mejor blog sobre libros, autores y noticias del mundo editorial.</p>
				<!---
				<ul class="actions"><li><a href="#" class="button big special">Learn More</a></li>
				</ul>--></section>
		
			
			<section id="latest_posts" class="wrapper style1">
				<center>
			<header>
			<h2>Bienvenid@ al blog</h2></header>
			
			</center>
			<header class="major narrow"><h4>Aquí encontrarás todas las publicaciones de nuestros usuarios:</h4></header>
					<div class="inner">						
                        <?php
						    $index = 0;  // Variable para controlar el estilo de las columnas (feature left, feature right)
                            $posts = getAllPosts();
                            foreach($posts as $post){
								$postClass = ($index % 2 == 0) ? "feature left" : "feature right";		
                        ?>
						<article class="<?php echo $postClass; ?>"><span class="image"><img src="<?php echo $post['image_url']?>" alt=""  height="600"></span>
						<div class="content">
									
							<h2> <?php echo $post['title'];?> </h2>
							
						
							<!---codigo php para buscar autor-->
							<?php  
							$post_id = $post['id'];  // Obtener el id del post para buscar el autor
							$author =  getAuthorByPostId($post_id);

							$author ? $author : $author ="Autor no encontrado";
							?>

							<h5> Publicado por: <?php echo $author;?> | Fecha: <?php echo $post['created_at']?></h5>
							<p><?php echo substr($post['post_content'], 0, 300). "...";?></p>
							<ul class="actions"><li>
									<a href="post.php?id=<?php echo $post['id']?>" class="button alt">Ver más</a>
								</li>
							</ul>
							<!-- favorito-->
								<div>
								<?php
								
									$favorite_icon = $post['favorito'] ? '<i class="fa-solid fa-heart"></i>' : '<i class="fa-regular fa-heart"></i>'; 
									$favorite_link = isset($_SESSION['user_id']) ? "toggle_favorite.php?postId=" . $post['id'] : "login.php"; // Falta el punto y coma aquí
								?>
									<a class="favorite-toggle" href="<?php echo $favorite_link ?>" style="font-size: 20px; text-decoration: none;">
										<?php echo $favorite_icon; ?>
									</a>
								</div> <!--favoritos-->
						</div>
		
									
						
					</article>
					    
                        <?php $index++; }?>
                    
					
						
					
					
					</div>
					
						
				</div>
					
			</section>
				<!-- Three --><section id="three" class="wrapper style3 special"><div class="inner">
				<header class="major narrow	"><h2>¿Quieres contribuir a la comunidad?</h2>
						<p>Regístrate para que puedas publicar tus propios artículos...</p>
					</header><ul class="actions"><li><a href="./register.php" class="button big alt">Registrarme</a></li>
					</ul></div>
			</section>
			
			<!-- Store-->
			<?php require_once('../includes/store.php');?>
			
		
			
			<?php 
		require_once('../includes/footer.php');
		require_once('../includes/scripts.php');
		?>
		</body>
		</html>
