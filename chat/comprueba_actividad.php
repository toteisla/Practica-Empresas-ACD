<?php
	$id = $_GET['id'];
	include_once("../ini_base_datos.php");
	$consulta = mysql_query("UPDATE usuarios SET fecha_ult_actividad = NOW()+INTERVAL 30 MINUTE WHERE id = $id");
	mysql_close($db_resource);
?>
