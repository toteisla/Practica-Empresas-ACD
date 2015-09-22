<?PHP
	include_once("./seguridad.php");
	include_once( "../ini_base_datos.php" );
	$accion = $_GET['accion'];
	$id_area_proy_subproy = $_GET['area_proy_subproy'];
	$nombre_fase = $_GET['nombre_fase'];
	if($accion == "start")
	{
		//Actualizamos la fecha de la fase
		$strQuery = "UPDATE fases SET comenzada = 1,fecha_inicio_real=NOW() WHERE id_area_proy_subproy=$id_area_proy_subproy AND nombre_fase='$nombre_fase'";
		$query = mysql_query( $strQuery, $db_resource );
		if($nombre_fase == "Requisitos")
		{
			//Actualizamos la fecha de la area_proy_subproy
			$strQuery1 = "UPDATE area_proy_subproy SET fecha_inicio_real=NOW() WHERE id=$id_area_proy_subproy;";
			$query1 = mysql_query( $strQuery1, $db_resource );
		}
		//Comprobamos que si es la primera area que empieza
		$strQuery2 = "SELECT APS.id_proy_subproy as subproyecto, COUNT( APS.id ) as cont FROM area_proy_subproy APS
		WHERE fecha_inicio_real != 0 AND id_proy_subproy = ( SELECT DISTINCT id_proy_subproy FROM area_proy_subproy WHERE id = $id_area_proy_subproy ) ";
		$query2 = mysql_query( $strQuery2, $db_resource );
		$filas2 = mysql_fetch_array($query2);
		if($filas2[1] == 1)
		{
			//En caso de devolver la consulta anterior 1, significa que es la primera area que empieza por lo tanto
			//actualizamos la fecha de inicio proy_subproy
			$strQuery3 = "UPDATE proy_subproy SET fecha_inicio_real=NOW() WHERE id=$filas2[0]";
			$query3 = mysql_query( $strQuery3, $db_resource );
		}
		//Comprobamos que si es el primer subproyecto que empieza
		$strQuery4 = "SELECT PS.id_proyecto as proyecto, COUNT( PS.id ) as cont FROM proy_subproy PS
		WHERE fecha_inicio_real != 0 AND id_proyecto = ( SELECT DISTINCT id_proyecto FROM proy_subproy WHERE id = $filas2[0] ) ";
		$query4 = mysql_query( $strQuery4, $db_resource );
		$filas4 = mysql_fetch_array($query4);
		if($filas4[1] == 1)
		{
			//En caso de devolver la consulta anterior 1, significa que es el primer subproyecto que empieza por lo tanto
			//actualizamos la fecha de inicio de proyecto
			$strQuery5 = "UPDATE proyectos SET fecha_inicio_real=NOW() WHERE id=$filas4[0]";
			$query5 = mysql_query( $strQuery5, $db_resource );
		}
		
	}
	else
	{
		$strQuery = "UPDATE fases SET finalizada = 1,fecha_fin_real=NOW() WHERE id_area_proy_subproy=$id_area_proy_subproy AND nombre_fase='$nombre_fase'";
		$query = mysql_query( $strQuery, $db_resource );
		if($nombre_fase == "Seguimiento")
		{
			$strQuery1 = "UPDATE area_proy_subproy SET fecha_fin_real=NOW() WHERE id=$id_area_proy_subproy;";
			$query1 = mysql_query( $strQuery1, $db_resource );
		}
		//Comprobamos si era el ultimo area en acabar
		
		//Escogemos el id_proy_subproy del area con la que estamos trabajando. No lo hacemos en forma de
		//subconsulta porque en el caso de que el cont encuentre 0, el id_proy_subproy será null.
		$strQuery6 = "SELECT id_proy_subproy FROM area_proy_subproy WHERE id = $id_area_proy_subproy";
		$query6 = mysql_query( $strQuery6, $db_resource );
		$filas6 = mysql_fetch_array($query6);
		
		$strQuery2 = "SELECT COUNT( APS.id ) as cont FROM area_proy_subproy APS
		WHERE fecha_fin_real = 0 AND id_proy_subproy = $filas6[0] ";
		$query2 = mysql_query( $strQuery2, $db_resource );
		$filas2 = mysql_fetch_array($query2);
		if($filas2[0] == 0)
		{
			$strQuery3 = "UPDATE proy_subproy SET fecha_fin_real=NOW() WHERE id=$filas6[0]";
			$query3 = mysql_query( $strQuery3, $db_resource );
		}
		
		//Escogemos el id_proyecto del subproyecto con el que estamos trabajando. No lo hacemos en forma de
		//subconsulta porque en el caso de que el cont encuentre 0, el id_proyecto será null.
		$strQuery7 = "SELECT id_proyecto FROM proy_subproy WHERE id = $filas6[0]";
		$query7 = mysql_query( $strQuery7, $db_resource );
		$filas7 = mysql_fetch_array($query7);
		
		//Comprobamos que si es el ultimo subproyecto que acaba
		$strQuery4 = "SELECT PS.id_proyecto as proyecto, COUNT( PS.id ) as cont FROM proy_subproy PS
		WHERE fecha_fin_real = 0 AND id_proyecto = $filas7[0]";
		$query4 = mysql_query( $strQuery4, $db_resource );
		$filas4 = mysql_fetch_array($query4);
		if($filas4[1] == 0)
		{
			//En caso de devolver la consulta anterior 0, significa que es el no hay subproyectos por acabar por lo tanto
			//actualizamos la fecha de fin del proyecto.
			$strQuery5 = "UPDATE proyectos SET fecha_fin_real=NOW() WHERE id=$filas7[0]";
			$query5 = mysql_query( $strQuery5, $db_resource );
		}
	}
	mysql_free_result($query2);
	mysql_free_result($query4);
	if($query6)
		mysql_free_result($query6);
	if($query7)
		mysql_free_result($query7);
	mysql_close($db_resource);
?>
