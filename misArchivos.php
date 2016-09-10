<?php 
$mostrar=0;
$var = $_GET["var"];
session_start();
$usuario = $_SESSION["sesion"];
if($_SESSION["contador"]>0){
	$notificacion=1;
}
if($usuario==""){
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
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 
<title>Subir Archivos</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="estilos.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>  
<script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>  
<link rel="stylesheet" type="text/css" href="../js/jquery.fancybox.css" />  


<script type="text/javascript">  
$(document).ready(function(){  
    $(".fotoAmpliar").fancybox({ });  
});  
</script>

<script type="text/javascript">
var x;
function mostrarPrimero(){
	
	if(x >= 1){
document.getElementById('primerCurso').style.display = 'none';
document.getElementById('primeroActivo').className="";
 x= 0;
	}else{
		document.getElementById('primerCurso').style.display = 'block';
		document.getElementById('primeroActivo').className="active";
		
		document.getElementById('segundoCurso').style.display = 'none';
		document.getElementById('segundoActivo').className="";
		document.getElementById('tercerCurso').style.display = 'none';
		document.getElementById('terceroActivo').className="";
		document.getElementById('cuartoCurso').style.display = 'none';
		document.getElementById('cuartoActivo').className="";
		  x = 1;
	}

}
</script>

<script type="text/javascript">
var x;
function mostrarSegundo(){
	
	if(x >= 1){
document.getElementById('segundoCurso').style.display = 'none';
document.getElementById('segundoActivo').className="";
 x= 0;
	}else{
		document.getElementById('segundoCurso').style.display = 'block';
		document.getElementById('primerCurso').style.display = 'none';
		document.getElementById('primeroActivo').className="";
		document.getElementById('tercerCurso').style.display = 'none';
		document.getElementById('terceroActivo').className="";
		document.getElementById('cuartoCurso').style.display = 'none';
		document.getElementById('cuartoActivo').className="";
		document.getElementById('segundoActivo').className="active";
		  x = 1;
	}

}
</script>

<script type="text/javascript">
var x;
function mostrarTercero(){
	
	if(x >= 1){
document.getElementById('tercerCurso').style.display = 'none';
document.getElementById('terceroActivo').className="";
 x= 0;
	}else{
		document.getElementById('tercerCurso').style.display = 'block';
		document.getElementById('terceroActivo').className="active";
		document.getElementById('primerCurso').style.display = 'none';
		document.getElementById('primeroActivo').className="";
		document.getElementById('cuartoCurso').style.display = 'none';
		document.getElementById('cuartoActivo').className="";
		document.getElementById('segundoCurso').style.display = 'none';
		document.getElementById('segundoActivo').className="";
		
		  x = 1;
	}

}
</script>

<script type="text/javascript">
var x;
function mostrarCuarto(){
	
	if(x >= 1){
document.getElementById('cuartoCurso').style.display = 'none';
document.getElementById('cuartoActivo').className="";
 x= 0;
	}else{
		document.getElementById('cuartoCurso').style.display = 'block';
		document.getElementById('cuartoActivo').className="active";
		document.getElementById('tercerCurso').style.display = 'none';
		document.getElementById('terceroActivo').className="";
		document.getElementById('segundoCurso').style.display = 'none';
		document.getElementById('segundoActivo').className="";
		document.getElementById('primerCurso').style.display = 'none';
		document.getElementById('primeroActivo').className="";
		  x = 1;
	}

}
</script>




</head>



<body class="color1">
<div class="container">
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
	<li  class="active"><a  href="#misArchivos">Mis Archivos</a></li>
	<li><a href="carreras.php">Grados</a></li>
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

			
			<section class="main row">
			<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				<h4 id="misArchivos"><strong>Mis Archivos <span class="glyphicon glyphicon-hdd"></span></strong>
				</h4>
				<?php
				$query = 'SELECT * FROM  archivos where propietario  like "'.$usuario.'" and recibido like "no";';
				$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
				while ($row = mysql_fetch_row($result)){
							$_SESSION["contador"] = $_SESSION["contador"] +1;
							$archivo = $row[1];?>
				<table class="table">
						<tr>  			
						<td><?php echo $archivo?>
						<form action="php/descargar.php" method="POST">
			<input type="hidden" name="usuario" value="<?php echo "$usuario"; ?>">
			<input type="hidden" name="nombreArchivo" value="<?php echo $archivo; ?>">
			<button class="btn btn-success" name="descargar" type="submit" value="si"> <span class="glyphicon glyphicon-download-alt"></span> Descargar</button>
			<button class="btn btn-danger" name="eliminar" type="submit" value="si"> <span class="glyphicon glyphicon-remove"></span> Eliminar</button>
			<?php
			$trozos = explode(".", $archivo);
			$extension = end($trozos);
			if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPEG"){?>
			<a class="fotoAmpliar btn btn-primary" href="archivos/<?php echo $usuario; ?>/<?php echo $archivo; ?>" title="<?php echo $archivo; ?>"> <span class="glyphicon glyphicon-eye-open"></span> Ver</a>
			 <?php } ?>
				</form>
						</td>
						</tr>
						</table>
				<?php }?>
					<?php if ($_SESSION["contador"]==0){?>
					<br>
				<div class="alert alert-info">No has subido ningun archivo</div>
				<?php }?>
				<form enctype="multipart/form-data" action="php/subir.php" method="POST">
				<table class="table"><tr>
					<td><input name="uploadedfile" type="file"></td>
				<td><button class="btn btn-primary pull-right" type="submit" value="Subir archivo" > <span class="glyphicon glyphicon-open"></span> Subir </button></td>
					<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
					
						</tr>
						</table>
					<br>
				</form>
			</article>
		
			<article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">

				<h4 id="archivosRecibidos"><strong>
				Archivos Recibidos
				 <span class="glyphicon glyphicon-inbox"></span></strong>
				</h4>
				<?php
				$_SESSION["contador"] = 0;
				$query = 'SELECT * FROM  archivos where propietario  like "'.$usuario.'" and recibido like "si";';
				$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
				while ($row = mysql_fetch_row($result)){
							$_SESSION["contador2"] = $_SESSION["contador2"] +1;
							$archivo = $row[1];
							$enviadopor=$row[3];?>
				<table class="table">
						<tr>  			
						<td><?php echo $archivo?> enviado por <strong><?php echo $enviadopor;?></strong>
						<form action="php/descargar.php" method="POST">
			<input type="hidden" name="usuario" value="<?php echo "$usuario"; ?>">
			<input type="hidden" name="nombreArchivo" value="<?php echo "recibidos/$archivo"; ?>">
			<button class="btn btn-success" name="descargar" type="submit" value="si"> <span class="glyphicon glyphicon-download-alt"></span> Descargar</button>
			<button class="btn btn-danger" name="eliminar" type="submit" value="si"> <span class="glyphicon glyphicon-remove"></span> Eliminar</button>
			
			<?php
			$trozos = explode(".", $archivo);
			$extension = end($trozos);
			if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPEG"){?>
			<a class="fotoAmpliar btn btn-primary" href="archivos/<?php echo $usuario; ?>/recibidos/<?php echo $archivo; ?>" title="<?php echo $archivo; ?>"> <span class="glyphicon glyphicon-eye-open"></span> Ver</a>
			 <?php } ?>
				</form>
						</td>
						</tr>
						</table>
						
				<?php }?>
				<?php if ($_SESSION["contador2"]==0){?>
				<div class="alert alert-info">No has recibido ningun archivo</div>
				<?php }?>
			</article>
			</section>	
			<section class="main row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<h4 id="usuarios"><strong>
				Amigos
				<span class="glyphicon glyphicon-user"></span>
				</strong>
				</h4>
				
				<?php 

							$query = 'SELECT * FROM  amigos where usuario1 like "'.$usuario.'" or usuario2 like "'.$usuario.'" ;';
							$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());?>
							<table class="table table-hover">  
						
						<?php
						while ($row = mysql_fetch_row($result)){  
						if($row[0] != $usuario){	?>					
						<tr>  			
						<td><?php echo $row[0]?></td> 
						<form enctype="multipart/form-data" action="php/subir.php" method="POST">
					<td> <input name="uploadedfile" type="file" /></td>
					<input type="hidden" name="usuario" value="<?php echo $row[0];?>">
					<input type="hidden" name="usuario2" value="<?php echo $usuario;?>">
					<td><button class="btn btn-primary" type="submit" value="si" name="enviar" >  <span class="glyphicon glyphicon-send"></span> Enviar </button>
					</td>
					</form>
						</tr><?php
						}else{?>
							<tr>  			
						<td><?php echo $row[1]?></td> 
						<form enctype="multipart/form-data" action="php/subir.php" method="POST">
					<td> <input name="uploadedfile" type="file" /></td>
					<input type="hidden" name="usuario" value="<?php echo $row[1];?>">
					<input type="hidden" name="usuario2" value="<?php echo $usuario;?>">
					<td>
					<button class="btn btn-primary" type="submit" value="si" name="enviar" >  <span class="glyphicon glyphicon-send"></span> Enviar </button>
					</td>
					</form>
						</tr>
				<?php } ?>
					<?php	}  ?>
					</table>
				
			</article>
			</section>
			
</div>

</body>
</html>
