<?php
	/*
	 *Modifica el area los datos los recibimos por ajax tanto JSON como el id del proy_subproy_area
	 */
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	require_once("JSON.phps");
	$json = new Services_JSON();
	$texto=$_GET['texto'];
	$idsub=$_GET['idsubp'];
	$usuarea=$json->decode($texto);
	$strQuery = "UPDATE area_proy_subproy SET id_usuario='".$usuarea->idusu."',fecha_inicio_estimada='".$usuarea->fechaestini."',fecha_fin_estimada='".$usuarea->fechaestfin."' WHERE id_proy_subproy='$idsub' and id_area='".$usuarea->idarea."'";
	$query = mysql_query($strQuery, $db_resource);		
?>
