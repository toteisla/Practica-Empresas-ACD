<?php
	include_once("./ini_base_datos.php");
	$consulta = mysql_query("SELECT id FROM usuarios WHERE fecha_ult_actividad < NOW()");
	while($fila=mysql_fetch_array($consulta))
	{
		$id = $fila['id'];
		$strQuery = "UPDATE usuarios set bolLogged=0 WHERE id=$id";
		$query = mysql_query( $strQuery, $db_resource ) or die("Ha habido un error en logout.php. Consulte al administrador");
	}
?>
