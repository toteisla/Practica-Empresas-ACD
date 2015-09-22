<?php
	$id = $_GET['id'];
	include_once("../ini_base_datos.php");
	$consulta = mysql_query("SELECT fecha_ult_actividad FROM usuarios WHERE id = $id");
	$fila = mysql_fetch_array($consulta);
	$time = $fila['fecha_ult_actividad'];
	$consulta = mysql_query("SELECT NOW() as time");
	$fila = mysql_fetch_array($consulta);
	$timenow = $fila['time'];
	if($time < $timenow)
	{
		//header("Location: ../logout.php");		
		echo "1";
	}
	else
		echo "0";
?>
