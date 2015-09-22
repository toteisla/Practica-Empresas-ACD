<?php
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$id_proyecto = $_GET['id_proyecto'];
	$texto = $_GET['texto'];
	$titulo = $_GET['titulo'];
	
	$strQuery = "INSERT INTO notificaciones VALUES('','$id_proyecto','$titulo','$texto',NOW())";
	$query = mysql_query($strQuery, $db_resource) or die(mysql_error());
	echo 1;
	mysql_close($db_resource);
?>
