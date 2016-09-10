<?php
 header('Content-Type: text/html; charset=UTF-8'); 
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');
mysql_query("SET NAMES 'UTF8'");

$usuario = $_POST["usuario"];



$query = 'DELETE FROM usuarios where nombre like "'.$usuario.'";';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if ($link-->exec($query) === TRUE) {
	header("Location: usuarios.php");

}
			




?>

