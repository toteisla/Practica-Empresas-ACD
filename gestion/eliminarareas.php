<?php
	/*
	 *Elimina el area que recibimos por ajax y recogemos con JSON 
	 */
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$texto=$_GET['texto'];
	$idsub=$_GET['idsubp'];
	require_once("JSON.phps");
	$json = new Services_JSON();
	$usuarea=$json->decode($texto);
	$strQuery = "DELETE from area_proy_subproy WHERE id_proy_subproy='$idsub' and id_area='".$usuarea->idarea."'";
	$query = mysql_query($strQuery, $db_resource);		
?>
