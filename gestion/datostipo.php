<?php
	$nombre = $_GET['nombre'];
	$cadena = "";
	include_once("../ini_base_datos.php");
	$consulta = mysql_query("SELECT * FROM tipo_usuarios WHERE nombre_tipo = '$nombre'");
	while($fila = mysql_fetch_array($consulta))
		$cadena = $fila[2]."---".$fila[3]."---".$fila[4]."---".$fila[5]."---".$fila[6]."---".$fila[7]."---".$fila[8]."---".$fila[9];
	echo $cadena;
?>
