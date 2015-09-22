<?PHP
	include_once("./seguridad.php");
	include_once( "../ini_base_datos.php" );
	$id_subproyecto = $_GET['id_subproyecto'];
	$id = $_COOKIE['id'];
	$strQuery = "SELECT APSB.id, A.nombre
	FROM proyectos P, subproyecto SB, proy_subproy PSB, areas A, area_proy_subproy APSB
	WHERE P.id = PSB.id_proyecto
	AND PSB.id=$id_subproyecto
    AND SB.id=PSB.id_subproyecto
	AND APSB.id_proy_subproy = PSB.id
	AND A.id = APSB.id_area
	AND (APSB.id_usuario=$id OR PSB.id_jefe=$id OR P.id_jefe=$id )";
	$query = mysql_query( $strQuery, $db_resource );
	echo "<select id='lista_area' size='1' onchange='cargaBotones(); vaciaArea(); cargaFechas(this.value,\"area\");' >";
	echo "<option value='0'>-Selecciona un area-</option>";
	while ($fila = mysql_fetch_array($query))
	{
		echo "<option value=$fila[0]>$fila[1]</option>";
	}
	echo "</select>";
	mysql_free_result($query);
	mysql_close($db_resource);
?>
