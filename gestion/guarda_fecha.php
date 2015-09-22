<?PHP
	include_once("./seguridad.php");
	include_once( "../ini_base_datos.php" );
	$id_div = $_GET['id_div'];
	$fecha = $_GET['fecha'];
	$id_area_proy_subproy = $_GET['id_area_proy_subproy'];
	$nombre_fase = $_GET['nombre_fase'];
	$id = $_COOKIE['id'];
	
	$strQueryS = "SELECT id,fecha_inicio_estimada,fecha_fin_estimada FROM fases WHERE nombre_fase='$nombre_fase' AND id_area_proy_subproy=$id_area_proy_subproy";
	$queryS = mysql_query($strQueryS,$db_resource);
	$fila = mysql_fetch_array($queryS);
	
	$arrayFecha = explode("/",$fecha);
	$fecha_ordenada = $arrayFecha[2]."-".$arrayFecha[1]."-".$arrayFecha[0];
	if($id_div == "fie")
	{
		if($fecha_ordenada <= $fila[2] || $fila[2] == '0000-00-00')
		{
			$strQuery = "UPDATE fases SET fecha_inicio_estimada='$fecha_ordenada' WHERE nombre_fase='$nombre_fase' AND id_area_proy_subproy=$id_area_proy_subproy";
			$query = mysql_query( $strQuery, $db_resource ) or die(mysql_error());
		}
		else
		{
			echo "Introduzca una fecha inferior o igual a la fecha estimada final.";
		}
	}
	else
	{
		if($fecha_ordenada >= $fila[1] || $fila[1] == '0000-00-00')
		{
			$strQuery = "UPDATE fases SET fecha_fin_estimada='$fecha_ordenada' WHERE nombre_fase='$nombre_fase' AND id_area_proy_subproy=$id_area_proy_subproy";
			$query = mysql_query( $strQuery, $db_resource ) or die(mysql_error());
		}
		else
		{
			echo "Introduzca una fecha superior o igual a la fecha estimada inicial.";
		}
		
	}
	
	echo "$%&".$fila[0];
	
	mysql_free_result($queryS);
	mysql_close($db_resource);
?>
