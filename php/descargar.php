<?php
 header('Content-Type: text/html; charset=UTF-8'); 
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');
mysql_query("SET NAMES 'UTF8'");


$nombre = $_POST["nombreArchivo"]; 
$usuario = $_POST["usuario"];
$descargar = $_POST["descargar"]; 
$eliminar = $_POST["eliminar"]; 
$admin = $_POST["eliminarAdmin"];
$recibido = $_POST["recibido"];
$descargarAsignatura= $_POST["descargarAsignatura"];
$asignatura=$_POST["asignatura"];




if ($descargar == "si"){
header("Content-disposition: attachment; filename=$nombre");
readfile("../archivos/$usuario/$nombre");
}
else if ($eliminar == "si"){
				$trozos = explode("/", $nombre);
			$nombreFinal = end($trozos);
$query = 'DELETE FROM archivos where propietario like "'.$usuario.'" AND nombre like "'.$nombreFinal.'" ;';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if ($link-->exec($query) === TRUE) {
	if($recibido == "si"){
			unlink("../archivos/$usuario/recibidos/$nombreFinal");
	}else{
		unlink("../archivos/$usuario/$nombre");
	}
			if($admin == "si"){
			header("Location: archivos.php");
			}else{
			header("Location: ../misArchivos.php");
			}
}
			
}
else if($descargarAsignatura=="si"){
header("Content-disposition: attachment; filename=$nombre");
readfile("../grados/Informatica/Primero/$asignatura/$nombre");

}




?>

