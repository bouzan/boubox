<?php 
session_start();
$usuario = $_SESSION['sesion'];
$nombreUser = $_POST["nombreUser"];
$user = $_GET['user'];
$user2 = $_GET['user2'];

  if(empty($_SESSION['sesion']) || $usuario!="admin") { 
				header("Location: ../inicio.php");
			} 
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
							or die('No se pudo conectar: ' . mysql_error());
							mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Usuarios Registrados</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="../estilos.css">
<!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 <script type="text/javascript">

function abrir(nombre){
		
		document.getElementById("nombre").innerHTML += nombre;
		document.getElementById("nombreCorreo").value = nombre;
		document.getElementById('body').classList.add("blur");
		document.getElementById('body2').classList.add("blur");
		document.getElementById('notificar').style.display = 'block';
		

}
</script>
 
  <script type="text/javascript">

function cerrar(){
document.getElementById("nombre").innerHTML = "Escribe tu mensaje a ";
document.getElementById('notificar').style.display = 'none';
document.getElementById('body').className="table table-hover";
document.getElementById('body2').className="container";

}
</script>




 

</head>



<body class="color1">

<header>


	<nav class="navbar navbar-default navbar-fixed-top">
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
	<li><a href="../inicio.php">Inicio</a></li>
	<li><a  href="../inicio.php">Mis Archivos</a></li>
	<li><a href="../carreras.php">Grados</a></li>
	<li><a href="../amigos.php">Amigos</a></li>
	</ul>
	<ul class="nav navbar-nav pull-right">
	<?php if ($usuario=="admin"){?>
	<li><a href="archivos.php">Archivos</a></li>
	<li  class="active"><a href="usuarios.php">Usuarios</a></li>
	<?php }?>
	<li><a href="salir.php">Salir <span class="glyphicon glyphicon-log-out"></span></a></li>
	</ul>
	
  </div>
</div>
	</div>
	</nav>
		
</header>




<br>
<br>
<br>
<div class="container" id="body2">
	<h1 class="text-center">Usuarios registrados</h1>
	<?php if ($user!=""){?>
				<div class="alert alert-success">Has añadido a <?php echo $user?> correctamente</div>
				<?php }?>
	<?php if ($user2!=""){?>
				<div class="alert alert-danger">Has eliminado a <?php echo $user2?> correctamente</div>
				<?php }?>
</div>

<br>
</header>

<div class="container">
<form action="usuarios.php" method="POST">
	<div class="input-group">
      <input   type="text" class="form-control" placeholder="Usuarios" name="nombreUser">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Buscar <span class="glyphicon glyphicon-search"></span></button>
      </span>
	</form>
	 </div>
	<br>
		<?php 

							$query = 'SELECT * FROM  usuarios where nombre like "%'.$nombreUser.'%" order by nombre;';
							$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());?>
							<table class="table table-hover" id="body">  
							<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Contraseña</th>
							<th class="text-center">Email</th>
							<th class="text-center">Eliminar</th>
							<th class="text-center">Notificar</th>
							</tr>
						<?php
						while ($row = mysql_fetch_row($result)){ ?>
															
						<tr>
						<td class="text-center"><?php echo $row[0]?></td> 
						<td class="text-center"><?php echo $row[1]?></td> 
						<td class="text-center"><?php echo $row[2]?></td> 
						<form action="eliminarUsuario.php" method ="POST">
					<input type="hidden" name="usuario" value="<?php echo $row[0];?>">
					<td class="text-center"><button class="btn btn-danger " type="submit"  name="eliminar" value="si" >  <span class="glyphicon glyphicon-remove"></span> Eliminar </button>
					</td></form>
					<td class="text-center"><a class="btn btn-primary" id="nombreUsuario>"  onclick="abrir('<?php echo $row[0];?>')" >  <span class="glyphicon glyphicon-comment"></span> Notificar </a>
					</td></tr>
						<?php } ?>
						
					</table>
					<div class="medio" id="notificar" style='display:none;'>
	<form action="notificacion.php" method="POST">
	<label id="nombre">Escribe tu mensaje a </label>
  <textarea name="mensaje" class="form-control" rows="5"></textarea>
  <input id="nombreCorreo" name="nombreCorreo" type="hidden" value="">
  <br>
  <button class="btn btn-primary pull-right " type="submit">  <span class="glyphicon glyphicon-send"></span> Enviar </button>
  </form>
  <a class="btn btn-danger" onclick="cerrar()" class="btn btn-danger pull-left ">  <span class="glyphicon glyphicon-remove"></span> Cancelar </a>
  
</div>
						</div>
						

</body>

</html>
