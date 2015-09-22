<?php
	include_once("../ini_base_datos.php");
	$id = $_GET['id'];
	$campo = $_GET['campo'];
	
	if($campo == 'not')
	{
		mysql_query("DELETE FROM infocorp WHERE id = $id");
	}
	else
	{
		mysql_query("DELETE FROM adjuntos_corporativos WHERE id = $id");
	}
?>
