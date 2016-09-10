<?php
$usuario = $_POST["usuario"];
$pass = $_POST["pass"];
$pass2 = $_POST["pass2"];
$correo = $_POST["correo"];
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "From: Apuntes <antonbouzan@gmail.com>\r\n"; 
$headers .= "Reply-To: antonbouzan@gmail.com\r\n"; 
$headers .= "Return-path: antonbouzan@gmail.com\r\n";

// Conectando, seleccionando la base de datos
$link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');


$query = 'INSERT INTO usuarios values ("'.$usuario.'", "'.$pass.'", "'.$correo.'");';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
if ($link-->exec($query) === TRUE) {
		mkdir("../archivos/$usuario/", 0777, true);
		mkdir("../archivos/$usuario/recibidos", 0777, true);
		mail($correo,'Registro correcto',"Hola $usuario, gracias por registrarte!",$headers); 
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

