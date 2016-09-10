<?php
session_start();
$usuario = $_SESSION['sesion'];

  if(!empty($_SESSION['sesion'])) { 
				header("Location: inicio.php?usuario=$usuario");
			} 

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registro</title>
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

<script>
function validar(){
var x1 = document.getElementById("pass").value;
var x2 = document.getElementById("pass2").value; 
if( x1 != x2){
alert("Las contraseñas no coinciden");
return false;
}
else{
return true;
}
}
</script>


</head>



<body>

<header>
<div class="container">
	<h1 class="text-center">Registro</h1>
</div>
</header>
	<div class="container">
		<br>
		<form action="registrar.php" method="POST" onsubmit="return validar()">
		<input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario">
		<br>
		<input class="form-control" id="correo" name="correo" type="email" placeholder="Correo electronico">
		<br>
		<input class="form-control" id="pass" name="pass" type="password" placeholder="Contraseña">
		<br>
		<input class="form-control" id="pass2" name="pass2" type="password" placeholder="Repetir contraseña">
		<br>
		<input type="submit" class="btn btn-primary pull-left" value="Registrar">
		</form>
		
		<form action="../index.php">
		<input type="submit" class="btn btn-primary pull-right" value="Cancelar">
		</form>
		
			
			
</div>

</body>
</html>

