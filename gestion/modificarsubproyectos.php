<?php
	/*
	 *Modificamos proy_subproy con los datos JSON. El id del subproyecto viene en el JSON. 
	 */
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$texto=$_GET['texto'];
	require_once("JSON.phps");
	$json = new Services_JSON();
	$datos=$json->decode($texto);
	$strQuery = "UPDATE proy_subproy SET id_subproyecto='".$datos->idsub."',id_jefe='".$datos->idj."',fecha_inicio_estimada='".$datos->fechainiA."',fecha_fin_estimada='".$datos->fechafinA."' WHERE id='".$datos->id."'";
	echo $strQuery;
	$query = mysql_query($strQuery, $db_resource);		
?>
