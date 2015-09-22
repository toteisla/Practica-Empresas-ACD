<?php
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$id_noticia = $_GET['id_noticia'];
	$texto = $_GET['texto'];
	$titulo = $_GET['titulo'];
	
	$strQuery = "UPDATE notificaciones SET texto='$texto',titulo='$titulo',fecha=NOW() WHERE id=$id_noticia";
	$query = mysql_query($strQuery, $db_resource) or die(mysql_error());
	echo 1;
	mysql_close($db_resource);
?>
