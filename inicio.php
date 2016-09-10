<?php 
session_start();
$usuario = $_SESSION["sesion"];

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
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 
<title>Apuntes</title>
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
		document.getElementById('primeroActivo').className="colorMenu";
		
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
		document.getElementById('segundoActivo').className="colorMenu";
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
		document.getElementById('terceroActivo').className="colorMenu";
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
		document.getElementById('cuartoActivo').className="colorMenu";
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
	<li class="active"><a href="">Inicio</a></li>
	<li><a  href="misArchivos.php">Mis Archivos</a></li>
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
	
			<section class="main row color1">
			<article class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 color1">
				<h4 id="usuarios"><strong>
				Grados
				<span class="glyphicon glyphicon-pencil"></span>
				</strong>
				</h4>
					
				<?php 
						
							$query = 'SELECT * FROM  grados where usuario like "'.$usuario.'"';
							$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());?>
							
							<table class="table table-hover">  
						
						<?php
						while ($row = mysql_fetch_row($result)){  ?>
											
						
						<tr>					
						<td><strong><?php echo $row[0]?></strong></td> 
						</tr>
						</table>
						<?php
						$numeroCursos=0;
						$query2 = 'SELECT * FROM  cursos where grado like "'.$row[0].'"';
						$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());?>
						<?php while ($row2 = mysql_fetch_row($result2)){
						$numeroCursos= $row2[0];
						 }?>
						 <?php if($numeroCursos==4){?>
						<div class="container">
						<ul class="nav nav-pills nav-justified ">
							<li id="primeroActivo" class="colorMenu"><a onclick="mostrarPrimero()">Primero</a></li>
							<li id="segundoActivo"><a onclick="mostrarSegundo()">Segundo</a></li>
							<li id="terceroActivo"><a onclick="mostrarTercero()">Tercero</a></li>
							<li id="cuartoActivo"><a onclick="mostrarCuarto()">Cuarto</a></li>
						</ul>
						</div>
						<br>
						<table class="table">
						<tr>
						<td>
						</td>
						</tr>
						</table>
						 <?php }?>
				
						<?php 
						$query3 = 'SELECT * FROM  `'.$row[0].'` where curso like "Primero" order by asignatura';
						$result3 = mysql_query($query3) or die('Consulta fallida: ' . mysql_error());
						
						$query4 = 'SELECT * FROM  `'.$row[0].'` where curso like "Segundo" order by asignatura';
						$result4 = mysql_query($query4) or die('Consulta fallida: ' . mysql_error());
						
						$query5 = 'SELECT * FROM  `'.$row[0].'` where curso like "Tercero" order by asignatura';
						$result5 = mysql_query($query5) or die('Consulta fallida: ' . mysql_error());
						
						$query6 = 'SELECT * FROM  `'.$row[0].'` where curso like "Cuarto" order by asignatura';
						$result6 = mysql_query($query6) or die('Consulta fallida: ' . mysql_error());
						?>
						<div class="container" id='primerCurso' style='display:block;'>
							<div class="container">
							<ul class="nav nav-pills nav-stacked">
							<?php while ($row3 = mysql_fetch_row($result3)){ ?>
							<li><a href="asignatura.php?nombre=<?php echo $row3[0]?>" target="_blank" onclick="mostrarPrimero()"><?php echo $row3[0]?></a></li>
							<?php }?>
							</ul>
							</div>
						</div>
						
						<div class="container" id='segundoCurso' style='display:none;'>
							<div class="container">
							<ul class="nav nav-pills nav-stacked">
							
							<?php while ($row4 = mysql_fetch_row($result4)){ ?>
							<li><a href="asignatura.php?nombre=<?php echo $row4[0]?>" target="_blank" onclick="mostrarSegundo()"><?php echo $row4[0]?></a></li>
							<?php }?>
							</ul>
							</div>
						</div>
						<div class="container" id='tercerCurso' style='display:none;'>
							<div class="container">
							<ul class="nav nav-pills nav-stacked">
							
							<?php while ($row5 = mysql_fetch_row($result5)){ ?>
							<li><a href="asignatura.php?nombre=<?php echo $row5[0]?>" target="_blank" onclick="mostrarTercero()"><?php echo $row5[0]?></a></li>
							<?php }?>
							</ul>
							</div>
						</div>
						<div class="container" id='cuartoCurso' style='display:none;'>
							<div class="container">
							<ul class="nav nav-pills nav-stacked">
							
							<?php while ($row6 = mysql_fetch_row($result6)){ ?>
							<li><a href="asignatura.php?nombre=<?php echo $row6[0]?>" target="_blank" onclick="mostrarCuarto()"><?php echo $row6[0]?></a></li>
							<?php }?>
							</ul>
							</div>
						</div>
					<?php	}  ?>
					<br>
				<table class="table">
						<tr>
						<td>
						</td>
						</tr>
						</table>
			</article>
			</section>
			<!--
			<div class="container">
			<h4><strong>Subir archivos a Ingeniería Informática</strong></h4>
			<form>
			<input type="file">
			<br>
			<div class="form-group">
				<label for="sel1">Selecciona Curso</label>
				<select class="form-control" id="sel1">
					<option>Primero</option>
					<option>Segundo</option>
					<option>Tercero</option>
					<option>Cuarto</option>
				</select>
			</div>
			<div class="form-group">
				<label for="sel1">Selecciona Asignatura</label>
				<select class="form-control" id="sel1">
					<option>Primero</option>
					<option>Segundo</option>
					<option>Tercero</option>
					<option>Cuarto</option>
				</select>
			</div>
			<input type="submit" class="btn btn-primary" value="Subir">
			</form>
			</div>-->
			
</div>



</body>
</html>
