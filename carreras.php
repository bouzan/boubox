<?php 
session_start();
$usuario = $_SESSION['sesion'];
$nombreCarrera = $_POST["nombreCarrera"];
$user = $_GET['user'];
$user2 = $_GET['user2'];

  if(empty($_SESSION['sesion'])) { 
				header("Location: index.php");
			} 
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
							or die('No se pudo conectar: ' . mysql_error());
							mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Grados</title>
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
	<li  class="active"><a href="carreras.php">Grados</a></li>
	<li><a href="amigos.php">Amigos</a></li>
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
	<h1 class="text-center">Únete a un grado de la USC</h1>
	<?php if ($user!=""){?>
				<div class="alert alert-success">Te has unido a <?php echo $user?> correctamente</div>
				<?php }?>
	<?php if ($user2!=""){?>
				<div class="alert alert-danger">Has salido del grupo de <?php echo $user2?> correctamente</div>
				<?php }?>
</div>

<br>
</header>
<form action="carreras.php" method="POST">
<div class="container">
	<div class="input-group">
      <input type="text" class="form-control" placeholder="Grado" name="nombreCarrera">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Buscar <span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>

	</form>
	<br>
	<?php/* if($nombreUser!=""){*/?>
		<?php 

							$query = 'SELECT * FROM  carrera where nombre like "%'.$nombreCarrera.'%" order by nombre;';
							$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());?>
							<table class="table">  
						<?php
						while ($row = mysql_fetch_row($result)){
								?>							
						<tr>
						<td><?php echo $row[0]?></td> 
						<?php
							$query2 = 'SELECT * FROM grados where nombre like "'.$row[0].'" and usuario like "'.$usuario.'" ;';
							$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
							while ($row2 = mysql_fetch_row($result2)){
								$varAmigo=1;
							}
					?>
					<form action="php/unir.php" method ="POST">
					<input type="hidden" name="grado" value="<?php echo $row[0];?>">
					<input type="hidden" name="usuario" value="<?php echo $usuario;?>">	
					<?php if($varAmigo!=1){?>
					<td><button class="btn btn-success pull-right" type="submit"  name="anadir" value="si" >  <span class="glyphicon glyphicon-user"></span> Unirte </button>
					</td>
					<?php }else{?>
					<td><button class="btn btn-danger pull-right" type="submit"  name="eliminar" value="si" >  <span class="glyphicon glyphicon-user"></span> Salir </button>
					<?php $varAmigo=0;}?>
						</tr></form><?php
						
						 } ?>
					</table>
	<?php /*}*/?>
						</div>

</body>
</html>
