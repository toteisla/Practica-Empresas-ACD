<?PHP
	include_once("./seguridad.php");
	include_once( "../ini_base_datos.php" );
	$id_proyecto = $_GET['proyecto'];
	$id = $_COOKIE['id'];
	$strQuery = "SELECT DISTINCT PSB.id, SB.nombre 
	FROM proyectos P, subproyecto SB, proy_subproy PSB, area_proy_subproy APS,areas A
	WHERE P.id=$id_proyecto 
	AND P.id=PSB.id_proyecto
	AND SB.id=PSB.id_subproyecto
	AND APS.id_proy_subproy=PSB.id
	AND APS.id_area = A.id
	AND (APS.id_usuario=$id OR PSB.id_jefe=$id OR P.id_jefe=$id);";
	$query = mysql_query( $strQuery, $db_resource );
	echo "<select id='lista_subproyecto' size='1' onchange='vaciaDiv(); cargaFechas(this.value,\"subproyecto\"); cargaAreas(this.value);'>";
	echo "<option value='0'>-Selecciona un subproyecto-</option>";
	while ($fila = mysql_fetch_array($query))
	{
		echo "<option value=$fila[0]>$fila[1]</option>";
	}
	echo "</select>";
	mysql_free_result($query);
	mysql_close($db_resource);
?>
