<?php 
session_start();
$usuario = $_SESSION['sesion'];
$nombreArchivo = $_POST["nombreArchivo"];
$user = $_GET['user'];
$asignatura = $_GET['nombre'];

  if(empty($_SESSION['sesion'])) { 
				header("Location: index.php");
			} 
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
							or die('No se pudo conectar: ' . mysql_error());
							mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');
							mysql_query("SET NAMES 'UTF8'");

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $asignatura; ?></title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="estilos.css">
<!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>



<body class="color1">

<header>


	<nav class="navbar navbar-default navbar-fixed-top colorMenu">
	<div class="container-fluid">
	<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
	<span class="sr-only"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a href="" class="navbar-brand"><?php echo $usuario; ?></a>
	</div>
	<div class="collapse navbar-collapse" id="navbar-1">
	<ul class="nav navbar-nav">
	<li><a href="inicio.php">Inicio</a></li>
	<li><a  href="misArchivos.php">Mis Archivos</a></li>
	<li><a href="carreras.php">Grados</a></li>
	<li><a href="#usuarios">Amigos</a></li>
	</ul>
	<ul class="nav navbar-nav pull-right">
	<?php if ($usuario=="admin"){?>
	<li><a href="php/archivos.php">Archivos</a></li>
	<li><a href="php/usuarios.php">Usuarios</a></li>
	<?php }?>
	<li><a href="php/salir.php">Salir <span class="glyphicon glyphicon-log-out"></span></a></li>
	</ul>
	
  </div>
</div>
	</div>
	</nav>
		
</header>


<br>
<br>
<br>
<div class="container">
	<h1 class="text-center"><?php echo $asignatura?></h1>
</div>

<br>
</header>
<form action="asignatura.php?nombre=<?php echo $asignatura; ?>" method="POST">
<div class="container">
	<div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar" name="nombreArchivo">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Buscar <span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>

	</form>
	<br>
	<?php/* if($nombreUser!=""){*/?>
		<?php 

							$query = 'SELECT * FROM  archivosGrados where nombre like "%'.$nombreArchivo.'%" and asignatura like "'.$asignatura.'" order by nombre;';
							$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());?>
							<table class="table">  
						<?php
						while ($row = mysql_fetch_row($result)){?>					
						<tr>
						<td><?php echo $row[0]?></td> 
						
					<form action="php/descargar.php" method ="POST">
					<input type="hidden" name="nombreArchivo" value="<?php echo $row[0];?>">
					<input type="hidden" name="asignatura" value="<?php echo $asignatura;?>">
					<td><button class="btn btn-success pull-right" type="submit"  name="descargarAsignatura" value="si" >  <span class="glyphicon glyphicon-download-alt"></span> Descargar</button>
					</td>
						</tr></form><?php
						
						 } ?>
					</table>
	<?php /*}*/?>
						</div>

</body>
</html>
