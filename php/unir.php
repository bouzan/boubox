<?php
$grado = $_POST["grado"];
$usuario = $_POST["usuario"];
$anadir = $_POST["anadir"]; 
$eliminar = $_POST["eliminar"]; 

// Conectando, seleccionando la base de datos
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');

if($anadir =="si"){
$query = 'INSERT INTO grados values ("'.$grado.'", "'.$usuario.'") ';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
if ($link-->exec($query) === TRUE) {
			header("Location: ../carreras.php?user=$grado");
}
}else{
$query = 'DELETE FROM grados where nombre like "'.$grado.'" AND usuario like "'.$usuario.'" ;';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if ($link-->exec($query) === TRUE) {
			header("Location: ../carreras.php?user2=$grado");
			
}
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);


?>
