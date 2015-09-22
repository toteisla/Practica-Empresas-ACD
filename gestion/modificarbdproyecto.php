<?php
	/*
	*Recibimos el JSON con los datos del proyecto y modificamos la tabla proyectos con el id recibido por ajax 
	*/
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$texto=$_GET['texto'];
	$id=$_GET['id'];
	require_once("JSON.phps");
	$json = new Services_JSON();
	$datos=$json->decode($texto);
	$strQuery = "UPDATE proyectos SET nombre_proyecto='".$datos->nombre."',id_cliente='".$datos->cliente."',id_jefe='".$datos->jefe."',fecha_inicio_estimada='".$datos->fini."',fecha_fin_estimada='".$datos->ffin."' WHERE id='$id'";
	$query = mysql_query($strQuery, $db_resource);
?>
