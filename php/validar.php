<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');
$usuario = $_POST["usuario"];
$pass = $_POST["pass"];

$query = 'SELECT * FROM  usuarios where nombre like "'.$usuario.'"  and pass like "'.$pass.'";';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			session_start();
			$_SESSION['sesion'] = "$usuario";
			header("Location: ../inicio.php");
			
}
	header('Location: ../index.php?var=1');

		

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);


?>

