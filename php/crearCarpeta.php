<?php

$nombre = $_POST["nombreCarpeta"]; 
$usuario = $_POST["usuario"]; 
 
mkdir("../archivos/$usuario/$nombre", 0777, true);

header("Location: ../inicio.php?usuario=$usuario");


?>

