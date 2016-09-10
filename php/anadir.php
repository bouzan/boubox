<?php
$usuario1 = $_POST["usuario1"];
$usuario2 = $_POST["usuario2"];
$anadir = $_POST["anadir"]; 
$eliminar = $_POST["eliminar"]; 

// Conectando, seleccionando la base de datos
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');

if($anadir =="si"){
$query = 'INSERT INTO amigos values ("'.$usuario1.'", "'.$usuario2.'") ';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
if ($link-->exec($query) === TRUE) {
			header("Location: ../amigos.php?user=$usuario2");
}
}else{
$query = 'DELETE FROM amigos where (usuario1 like "'.$usuario1.'" AND usuario2 like "'.$usuario2.'") or (usuario1 like "'.$usuario2.'" AND usuario2 like "'.$usuario1.'") ;';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if ($link-->exec($query) === TRUE) {
			header("Location: ../amigos.php?user2=$usuario2");
			
}
}

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);


?>

