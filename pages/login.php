<?php 
session_start();

require_once('../config/database.php');
require_once ('../lib/validation.php');
require_once('../lib/db_utils.php');

?>
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
--><html>
	<head><title>The Book Club</title><meta charset="utf-8"><meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"><meta name="viewport" content="width=device-width, initial-scale=1"><!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link rel="icon" href="https://img.icons8.com/?size=100&id=37917&format=png&color=000000" type="image/x-icon">
		
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]--><!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]--></head><body class="landing">

		<!-- Header -->
		 
		<?php require_once("./../includes/header.php")?>
				
			<!-- Main --><section id="main" class="wrapper">
				<div >
					<article class="feature left">
						<span class="image"><img src="../images/login.jpg" alt=""  height="100%" ></span>
							<div class="content">
							
							<form action="#" method="POST">
								<h2>Login</h2>
								<p>Identificate y accede a tu espacio personal</p>
									
								<div class="container 75%">
									
									<div class="row uniform 50%">
										
										<div class="6u$ 12u$(xsmall)">
											<input name="email" placeholder="Email" type="email"></div>
										<div class="6u 12u$(xsmall)">
											<input type="password" name="password" placeholder="Password" ></input></div>
									</div>

					<!--Codigo PHP para recoger datos y auth--><?php 
					if ($_SERVER["REQUEST_METHOD"] == "POST") {


						$email = sanitizeInput($_POST["email"]);
						$password = sanitizeInput($_POST["password"]);
					
						if (authUser($email, $password)) {
							echo '<h3 style="color:green;">✅ Inicio de sesión exitoso. Redirigiendo...</h3>';
							header("Location:dashboard.php"); // Redirigir al usuario
							exit();
							
						} else {
							echo '<h3 style="color:red;">❌ Email o contraseña incorrectos.</h3>';
						}
					}
					
					
					?>
											
									<ul class="actions"><li><input type="submit" class="special " value="Entrar"></li>
										<li><input type="reset" class="alt " value="Limpiar Formulario"></li>
									</ul>
									<p>Si aún no te has registrado haz <a href="./register.php">click aquí</a></p>
								</div>
							
							</form>

							
						</div>
					</article>				
				</div>
			</section>
			<!-- Footer y scripts-->

			<?php require_once("./../includes/footer.php");?>
			<?php require_once("./../includes/scripts.php");?>
		
		</body>
		</html>
