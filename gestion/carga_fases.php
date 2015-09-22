<?PHP
	include_once("./seguridad.php");
	include_once( "../ini_base_datos.php" );
	$iduser = $_COOKIE['id'];
	$id_area = $_GET['area'];
	$nombre_fase = $_GET['nombre_fase'];
	$strQuery = "SELECT comenzada,finalizada,id,fecha_inicio_estimada,fecha_fin_estimada FROM fases WHERE id_area_proy_subproy=$id_area AND nombre_fase='$nombre_fase'";
	$query = mysql_query( $strQuery, $db_resource );
	
	$strPermisos = "SELECT tipo_usuario FROM usuarios WHERE id=$iduser";
	$queryPermisos = mysql_query( $strPermisos, $db_resource );
	$tipo_permisos = mysql_fetch_array($queryPermisos);
	
	while ($fila = mysql_fetch_array($query))
	{
		$id_anterior = $fila[2]-1;
		$strQuery2 = "SELECT finalizada FROM fases WHERE id=$id_anterior AND id_area_proy_subproy=$id_area";
		$query2 = mysql_query( $strQuery2, $db_resource );
		$fila2 = mysql_fetch_array($query2);
		if($fila2[0] == "")
			$fila2[0] = 1;
			
		$strQuery3 = "SELECT id, nombre, tipo FROM archivos_fases WHERE id_fase=$fila[2]";
		$query3 = mysql_query( $strQuery3, $db_resource );
		if(mysql_num_rows($query3) == 0)
			echo "No hay archivos.";
		else
		{
			while($fila3 = mysql_fetch_array($query3))
			{
				echo "<a style='cursor:pointer;' onclick='window.open(\"./gestion/archivos.php?id=$fila3[0],_blank\")'	>Nombre: $fila3[1]</a>  |  Tipo: $fila3[2]<br>";
			}
		}
		echo "%&#@|$fila[0]%&#@|$fila[1]%&#@|$fila2[0]%&#@|$fila[2]%&#@|$fila[3]%&#@|$fila[4]%&#@|$tipo_permisos[0]";
	}
	mysql_free_result($query);
	if(isset($query2))
		mysql_free_result($query2);
	else
		echo "No hay archivos.";
	if(isset($query2))
		mysql_free_result($query3);
	mysql_close($db_resource);
?>
