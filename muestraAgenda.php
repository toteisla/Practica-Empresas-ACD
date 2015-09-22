<?PHP
	include_once( "./ini_base_datos.php" );
	$id = $_COOKIE['id'];
	$strQuery = "SELECT fecha,texto,id FROM agenda WHERE id_user = $id";
	$query1 = mysql_query( $strQuery, $db_resource );
	
	while ($fila = mysql_fetch_array($query1))
	{
		//#AHORA
		$strNow="SELECT CURDATE() as fechacur";
		$queryNow = mysql_query( $strNow, $db_resource );
		$fila2 = mysql_fetch_array($queryNow);
		$fecha_actual = $fila2['fechacur'];
		
		//#Fecha con la que queremos operar
		//SELECT STR_TO_DATE('30,10,1991','%Y,%m,%d');
		
		list($año,$mes,$dia) = explode('-',$fila['fecha']);
		$strOperar = "SELECT STR_TO_DATE('".$año.",".$mes.",".$dia."','%Y,%m,%d') as fechaope";
		$queryOperar = mysql_query( $strOperar, $db_resource );
		$fila3 = mysql_fetch_array($queryOperar);
		$fecha_operar = $fila3['fechaope'];
		
		//#PRUEBAS
		//echo "fecha ___ ->".$fecha_operar."</br>";
		//echo "fecha now ->".$fecha_actual;
		
		if($fecha_actual > $fecha_operar)
		{
			echo "<div onclick='opcion_borra_agenda(this.id);' id=".$fila[2]." style='cursor:pointer' ><span style='color:#990000;' >".$dia."-".$mes."-".$año." : </br>".$fila['texto']."</span></div>";
		}
		else	
		{
			echo "<div onclick='opcion_borra_agenda(this.id);' id=".$fila[2]." style='cursor:pointer' ><span style='color:#009900;' >".$dia."-".$mes."-".$año." : </br>".$fila['texto']."</span></div>";
		}
	}
	if(isset($query1))
		mysql_free_result($query1);
	if(isset($queryNow))
		mysql_free_result($queryNow);	
	if(isset($queryOperar))
		mysql_free_result($queryOperar);
	mysql_close($db_resource);	
?>
