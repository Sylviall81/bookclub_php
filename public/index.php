
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
--><html>

	<head>
		<title>The Book Club</title><meta charset="utf-8"><meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"><meta name="viewport" content="width=device-width, initial-scale=1"><!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]--><link rel="stylesheet" href="../assets/css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link rel="icon" href="https://img.icons8.com/?size=100&id=37917&format=png&color=000000" type="image/x-icon">
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]--><!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]--></head><body class="landing">

		<!-- Header -->
		 <?php 
		 session_start();
		 require_once('../config/database.php');
		 require_once('../lib/db_utils.php');
		 require_once('../lib/validation.php');
		 require_once('../includes/header.php');
		 require_once('../includes/banner.php');
		 
		 ?>

				
				<!-- PRUEBAOne -- seccion de post mas recientes-->
		
					
		
				
			




				 <!--seccion de PRUEBA FINAL AQUI-->

				 <!--seccion post recientes-->

				<section id="one" class="wrapper style1">
					<center>
					<h2>Publicaciones recientes</h2>
					</center>
							
    <div class="inner" >

        <?php
		$limit = 2; // Limitamos los posts a 2
        $recentPosts = getRecentPosts($limit); // Obtiene los 3 más recientes
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
						$post_id = $post['id'];  // Obtener el id del post para buscar el autor
						$author = getAuthorByPostId($post_id);
						if (!$author){
							$author = "Autor no encontrado";
						}

                       
                        ?>
                        <h5> Publicado por: <?php echo $author; ?> | Fecha: <?php echo $post['created_at']; ?></h5>
                        <p><?php echo substr($post['post_content'], 0, 300) . "..."; ?></p>
                        <ul class="actions">
                            <li>
                                <a href= "../pages/post.php?id=<?php echo $post['id']; ?>" class="button alt">Ver más</a>
                            </li>
                        </ul>
                    </div>
                </article>

        <?php 
          
		  $index++;
			} // Fin del foreach
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

			<!-- Three --><section id="three" class="wrapper style3 special"><div class="inner">
			<header class="major narrow	"><h2>¿Quieres contribuir a la comunidad?</h2>
						<p>Regístrate para que puedas publicar tus propios artículos...</p>
					</header><ul class="actions"><li><a href="../pages/register.php" class="button big alt">Registrarme</a></li>
					</ul></div>
			</section>




		<!-- Store-->
		 <?php require_once("../includes/store.php");?>
			
			<!-- Formulario de contacto no sirve --><section id="four" class="wrapper style2 special"><div class="inner">
					<header class="major narrow"><h2>Contacto</h2>
						<p>Contactanos y haznos saber cualquier inquietud o sugerencia:</p>
					</header><form action="#" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="name" placeholder="Name" type="text"></div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email"></div>
								<div class="12u$">
									<textarea name="message" placeholder="Message" rows="4"></textarea></div>
							</div>
						</div>
						<ul class="actions"><li><input type="submit" class="special" value="Enviar"></li>
							<li><input type="reset" class="alt" value="Limpiar Formulario"></li>
						</ul></form>
				</div>
			</section>
			<!-- Footer y scripts-->

			<?php require("../includes/footer.php"); ?>
			<?php require("../includes/scripts.php"); ?>
		</body></html>
