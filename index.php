<?php $var = $_GET["var"];
session_start();
$usuario = $_SESSION['sesion'];

  if(!empty($_SESSION['sesion'])) { 
				header("Location: inicio.php");
			} 

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Inicio sesion</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="estilos.css">
<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
-->

</head>



<body class="color1">

<header>
<div class="container">
	<h1 class="text-center">Iniciar sesión</h1>
</div>
</header>
	<div class="container">
		<br>
		<form action="php/validar.php" method="POST">
		<input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario">
		<br>
		<input class="form-control" id="pass" name="pass" type="password" placeholder="Contraseña">
		<br>
		<?php if($var == "1"){?>
		<div class="alert alert-danger">Usuario o contraseña incorrectos</div>
		<?php } ?>
		<br>
		<input type="submit" class="btn btn-primary pull-left" value="Iniciar">
		</form>
		
		<form action="php/registro.php" method="POST">
		<input type="submit" class="btn btn-primary pull-right" value="Registrarse">
		</form>
		
			
			
</div>

</body>
</html>
