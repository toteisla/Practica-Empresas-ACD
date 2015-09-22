<?php
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$nick = $_GET['nick'];
	$strQuery = "SELECT id,nombre,dni,direccion,telefono,telefono_movil,email,nick,pass,tipo_usuario FROM usuarios WHERE nick='$nick'";
	$query = mysql_query($strQuery, $db_resource) or die(mysql_error());
	$filas = mysql_fetch_array($query);
	//echo json_encode($filas);
	echo "{\"id\":\"$filas[0]\",\"nombre\":\"$filas[1]\",\"dni\":\"$filas[2]\",\"direccion\":\"$filas[3]\",\"telefono\":\"$filas[4]\",\"telefono_movil\":\"$filas[5]\",\"email\":\"$filas[6]\",\"nick\":\"$filas[7]\",\"pass\":\"$filas[8]\",\"tipo_usuario\":\"$filas[9]\"}";
	mysql_free_result($query);
	mysql_close($db_resource);
?>
