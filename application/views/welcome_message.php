<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		html,
		body {
			height: 100%;
			background-color: #a0a399;
		}

		body {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-align: center;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
		}

		.form-signin {
			width: 100%;
			max-width: 330px;
			padding: 15px;
			margin: auto;
		}

		.form-signin .checkbox {
			font-weight: 400;
		}

		.form-signin .form-control {
			position: relative;
			box-sizing: border-box;
			height: auto;
			padding: 10px;
			font-size: 16px;
		}

		.form-signin .form-control:focus {
			z-index: 2;
		}

		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>
</head>

<body>

	<body id="bodylogin" class="text-center">
		<form class="form-signin bg-secondary rounded-lg border-warning shadow-lg" method="post"
			action="<?php echo site_url();?>/login">
			<img class="mb-3" src="#" alt="" width="162" height="92">
			<h3 class="h3 mb-3 font-weight-bold text-white">Acceso al sistema</h3>
			<label for="inputRut" class="sr-only">Rut</label>
			<input type="text" name="rut" id="inputRut" class="form-control mb-2" placeholder="Rut" required autofocus>
			<label for="inputPassword" class="sr-only">Contraseña</label>
			<input type="password" name="clave" id="inputPassword" class="form-control" placeholder="Constraseña"
				required>
			<label for="slRol" class="control-label" >Entrar como:</label>
			<select name="slRol" id="slRol" class="form-control">
				<option value="0">Estudiante</option>
				<option value="1">Profesor</option>
				<option value="2">Guia</option>
			</select>
			<button class="btn btn-lg btn-warning btn-block my-2" type="submit"><i class="fas fa-sign-in-alt"></i>
				Entrar</button>
			<p class="mt-3 mb-2 text-danger">Proyecto de prueba</p>
			<p>Acceso alumno(Rut, Contraseña): 111111111 , 123</p>
			<p>Acceso profesor(Rut, Contraseña): Aun no implementado</p>
			<p>Acceso guia(Rut, Contraseña): Aun no implementado</p>
			<label class="error"
				style="color:#f00; font-size:15px; text-align: center; font-weight: bold; margin-top: 0,5em;"><?php if (isset($error)) {echo $error;}?></label>
		</form>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
			integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
			integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		</script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
		</script>
	</body>

</html>