<?PHP
	include_once("./seguridad.php");
	$id = $_GET['id'];
	$tipo = $_GET['tipo'];
	if($id != 0)
	{
		include_once( "../ini_base_datos.php" );
		if($tipo == "proyecto")
		{
			$strQuery = "SELECT fecha_inicio_estimada,fecha_fin_estimada FROM proyectos WHERE id=$id";
			$query = mysql_query($strQuery,$db_resource);
			$fila = mysql_fetch_array($query);
			$fecha_inicio = explode("-",$fila[0]);
			$fecha_fin = explode("-",$fila[1]);
			echo $fecha_inicio[2]."-".$fecha_inicio[1]."-".$fecha_inicio[0]."&%$".$fecha_fin[2]."-".$fecha_fin[1]."-".$fecha_fin[0];
		}
		else if($tipo == "subproyecto")
		{
			$strQuery = "SELECT fecha_inicio_estimada,fecha_fin_estimada FROM proy_subproy WHERE id=$id";
			$query = mysql_query($strQuery,$db_resource);
			$fila = mysql_fetch_array($query);
			$fecha_inicio = explode("-",$fila[0]);
			$fecha_fin = explode("-",$fila[1]);
			echo $fecha_inicio[2]."-".$fecha_inicio[1]."-".$fecha_inicio[0]."&%$".$fecha_fin[2]."-".$fecha_fin[1]."-".$fecha_fin[0];
		}
		else if($tipo == "area")
		{
			$strQuery = "SELECT fecha_inicio_estimada,fecha_fin_estimada FROM area_proy_subproy WHERE id=$id";
			$query = mysql_query($strQuery,$db_resource);
			$fila = mysql_fetch_array($query);
			$fecha_inicio = explode("-",$fila[0]);
			$fecha_fin = explode("-",$fila[1]);
			echo $fecha_inicio[2]."-".$fecha_inicio[1]."-".$fecha_inicio[0]."&%$".$fecha_fin[2]."-".$fecha_fin[1]."-".$fecha_fin[0];
		}
		else
		{
			$strQuery = "SELECT fecha_inicio_estimada,fecha_fin_estimada FROM fases WHERE id=$id";
			$query = mysql_query($strQuery,$db_resource);
			$fila = mysql_fetch_array($query);
			$fecha_inicio = explode("-",$fila[0]);
			$fecha_fin = explode("-",$fila[1]);
			echo $fecha_inicio[2]."-".$fecha_inicio[1]."-".$fecha_inicio[0]."&%$".$fecha_fin[2]."-".$fecha_fin[1]."-".$fecha_fin[0];
		}
		mysql_free_result($query);
		mysql_close($db_resource);
	}
?>
