<?php

require_once('../config/config.php');
require_once('../config/database.php');
require_once __DIR__ . '/../lib/validation.php';
require_once __DIR__. '/../lib/db_utils.php';
//require('./lib/fecha.php');




?>
<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
--><html>
	<head><title>The Book Club</title><meta charset="utf-8"><meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"><meta name="viewport" content="width=device-width, initial-scale=1"><!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]--><link rel="stylesheet" href="../assets/css/main.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link rel="icon" href="https://img.icons8.com/?size=100&id=37917&format=png&color=000000" type="image/x-icon">
		
		
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]--><!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]--></head><body class="landing">

<?php require_once("../includes/header.php");?>
	<!-- Main --><section id="main" class="wrapper">
					<article class="feature left">
						<span class="image">
							<img src="<?=BASE_URL?>/images/pic01.jpg" alt=""  height="100%" >
						</span>
							<div class="content">
							<h2>Registro</h2>
								<p>Registrate y accede a las ventajas de pertenecer a la comunidad internacional 
									mas grande y actualizada de lectores!</p>
							
							<form action="#" method="POST">
						
								<div class="container 75%">
									
									<div class="row uniform 50%">
										<div class="6u$ 12u$(xsmall)">
											<input name="name" placeholder="Name" type="text" required>
										</div>

										<div class="6u$ 12u$(xsmall)">
												<input name="last_name" placeholder="Last Name" type="text" ></div>

										<div class="6u$ 12u$(xsmall)">
											<input name="email" placeholder="Email" type="email" required>
										</div>
											
										<div class="6u 12u$(xsmall)">
											<input type="password" name="password" placeholder="Password" required></input>
										</div>
									</div>
									<br>
		<!--PHP para registrar usuario e insertar en base de datos-->
									<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") { 

$name = trim($_POST["name"]);
$lastname = trim($_POST["last_name"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

//print_r($_POST);

// Verificación de campos vacíos
	if (empty($name) || empty($lastname) || empty($email) || empty($password)) {
	$mensaje = '<h4> ❌ Todos los campos son obligatorios. <br>Por favor, completa tus datos.</h4>';
	echo $mensaje;
	} else {

	$errors=[];

	$name = sanitizeInput($name);
	$lastname = sanitizeInput($lastname);
	$email = sanitizeInput($email);
	$password = sanitizeInput($password);

	/*echo $name;
	echo $lastname;
	echo $password;
	echo $email;*/

		// Validaciones específicas
		if (!validateText($name)) {
			$errors['name'] = "El nombre solo debe contener letras y espacios.";
		}
		if (!validateText($lastname)) {
			$errors['last_name'] = "El apellido solo debe contener letras y espacios.";
		}
		if (!validateEmail($email)) {
			$errors['email'] = "El correo electrónico no es válido.";
		}
		if (!validatePassword($password)) {
			$errors['password'] = "La contraseña debe tener al menos 8 caracteres, incluyendo números y letras.";
		}


		// Si hay errores, mostrar mensaje
		if (!empty($errors)) {
			$mensaje = "<h4 style='color:red;'>" . implode("<br>", $errors) . "</h4>";
		} else {
		
			if (insertUser($name, $lastname, $email, $password)) {
				// Si la inserción fue exitosa, mostrar mensaje
				echo '<h4 style="color:green;">✅ Bienvenid@ '.$name.'!</h4><p>Tu registro fue exitoso.<a href="login.php">Inicia sesión aquí</a>.</p>';
			} else {
				// Si la inserción falló, mostrar mensaje de error
				echo '<h3 style="color:red;">❌ Hubo un problema al registrarte. Inténtalo de nuevo más tarde.</h3>';
			}

		}
	}
	}?>
									
									<!--Botones form--->
									<ul class="actions">
											<li><input type="submit" class="special " value="Registro"></li>
											<li><input type="reset" class="alt " value="Limpiar Formulario"></li>
									</ul>
										    <p>¿Ya tienes cuenta? <a href="login.php">Identificate aquí</a></p>
									
								</div>
							</form>	


					
						</div>
					</article>		
	</section>
			





<!--Footer y scripts-->

	<?php require_once("../includes/footer.php");?>
	<?php require_once("./../includes/scripts.php");?>


</body>
</html>
