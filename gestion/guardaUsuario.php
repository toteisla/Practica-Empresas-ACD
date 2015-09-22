<?php
	include_once("./seguridad.php");
	$nombre = $_POST['nombreUsuario'];
	$dni = $_POST['DNI'];
	$nick = $_POST['nick'];
	$grupo = $_POST['select3'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$telf = $_POST['telefono'];
	$movil = $_POST['telefonomvl'];
	$pass = sha1($_POST['pass']);
	include_once("../ini_base_datos.php");
	
	$strQuery = "INSERT INTO usuarios VALUES('', '$grupo', '$nombre', '$dni', '$direccion', '$telf', '$movil', '$email', '$nick', '$pass', now(), '', '', 0)";
	$query = mysql_query($strQuery, $db_resource);
	$id_user = mysql_insert_id($db_resource);
	
	$strQuery2 = "INSERT INTO buzon_correos VALUES('',$id_user)";
	$query2 = mysql_query($strQuery2, $db_resource);
	
	mysql_close($db_resource);
	header("Location: ../apli.php");
?>

