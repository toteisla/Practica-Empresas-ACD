<?php
/*Insertamos un nuevo subproyecto recibimos el Json con los datos correspondientes tanto del subproyecto
 *  como de las areas que los componen.
 */
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$texto=$_GET['texto'];
	$nombres[0]="Requisitos";
	$nombres[1]="Analisis";
	$nombres[2]="Desarrollo";
	$nombres[3]="Implantacion";
	$nombres[4]="Seguimiento";
	require_once("JSON.phps");
	$json = new Services_JSON();
	$datos=$json->decode($texto);
	/*
	 *Inserta el subproyecto a la base de datos. 
	 */
	$strQuery = "INSERT INTO proy_subproy VALUES ('','".$datos->id."','".$datos->idsub."','".$datos->idj."','".$datos->fechainiA."','".$datos->fechafinA."','','')";
	$query = mysql_query($strQuery, $db_resource);
	$id=mysql_insert_id($db_resource);
	for($i=0;$i<count($datos->Areas);$i++){
		/*
		 *Inserta las areas del subproyecto a la base de datos 
		 */
		$strQuery = "INSERT INTO area_proy_subproy VALUES ('',$id,'".$datos->Areas[$i]->idarea."','".$datos->Areas[$i]->idusu."','".$datos->Areas[$i]->fechaestini."','".$datos->Areas[$i]->fechaestfin."','','')";
		$idasp=mysql_insert_id($db_resource);
		for($a=1;$a<6;$a++){
			$m=$a-1;
			/*
			 *Insertamos las fases de cada area a la base de datos. 
			 */
			$strQuery = "INSERT INTO fases VALUES('', '$idasp', '".$nombres[$m]."','','','','','0','0')";
			$query = mysql_query($strQuery, $db_resource);	
		}
		echo $strQuery;
		$query = mysql_query($strQuery, $db_resource);	
	}
?>
