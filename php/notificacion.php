<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');
$usuario = $_POST["nombreCorreo"];
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "From: Apuntes <antonbouzan@gmail.com>\r\n"; 
$headers .= "Reply-To: antonbouzan@gmail.com\r\n"; 
$headers .= "Return-path: antonbouzan@gmail.com\r\n";
$mensaje=$_POST["mensaje"];


$query = 'SELECT email FROM  usuarios where nombre like "'.$usuario.'" ;';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($row = mysql_fetch_row($result)){
	
			mail($row[0],'Notificacion',$mensaje,$headers); 
			header("Location: usuarios.php");
			
}

		

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);


?>

