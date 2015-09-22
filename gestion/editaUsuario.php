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
	$id = $_POST['id'];
	include_once("../ini_base_datos.php");
	
	$strQuery = "UPDATE usuarios SET tipo_usuario='$grupo', nombre='$nombre', dni='$dni', direccion='$direccion', telefono='$telf', telefono_movil='$movil', email='$email', nick='$nick', pasS='$pass' WHERE id=$id";
	echo $strQuery;
	$query = mysql_query($strQuery, $db_resource);
	mysql_close($db_resource);
	header("Location: ../apli.php");
?>
