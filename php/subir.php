<?php
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "From: Apuntes <antonbouzan@gmail.com>\r\n"; 
$headers .= "Reply-To: antonbouzan@gmail.com\r\n"; 
$headers .= "Return-path: antonbouzan@gmail.com\r\n";
 $link = mysql_connect('db643427529.db.1and1.com', 'dbo643427529', '1Anton2')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('db643427529') or die('No se pudo seleccionar la base de datos');

$enviar = $_POST["enviar"];
$usuario = $_POST["usuario"];
$usuario2 = $_POST["usuario2"];
$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile'][size];
$nombre= $_FILES[uploadedfile][name];

$file_name=$_FILES[uploadedfile][name];
if($enviar=="si"){
$add="../archivos/$usuario/recibidos/$file_name";	
$query = 'INSERT INTO archivos values ("'.$usuario.'", "'.$file_name.'", "si","'.$usuario2.'");';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


if ($link-->exec($query) === TRUE) {
			$query2 = 'SELECT email FROM  usuarios where nombre like "'.$usuario.'";';
			$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
			while ($row = mysql_fetch_row($result2)){  
			$correo=$row[0];					
			} 
			mail($correo,'Archivo Recibido',"Hola $usuario, $usuario2 te ha enviado el archivo $file_name. Accede a través de http://anton.bouzan.net",$headers); 
			header("Location: ../inicio.php");
			
}
}else{
$add="../archivos/$usuario/$file_name";
$query = 'INSERT INTO archivos values ("'.$usuario.'", "'.$file_name.'", "no", "'.$usuario.'");';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if ($link-->exec($query) === TRUE) {
			header("Location: ../misArchivos.php");
			
}

}
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
if($enviar=="si"){
header("Location: ../misArchivos.php");
}else{
	header("Location: ../misArchivos.php");
}
}else{echo "Error al subir el archivo";}

}else{echo $msg;}
?>


