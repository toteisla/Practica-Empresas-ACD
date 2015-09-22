<?php
/*Este script inserta un area nuevo al subproyecto. Tanto el Json con la informacion necesaria del area como el id del subproyecto son recibidos por ajax. 
 */
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$nombres[0]="Requisitos";
	$nombres[1]="Analisis";
	$nombres[2]="Desarrollo";
	$nombres[3]="Implantacion";
	$nombres[4]="Seguimiento";
	$texto=$_GET['texto'];
	$idsub=$_GET['idsubp'];
	/* La libreria JSON.phps ha tenido que ser añadida puesto que el servidor php no incorpora Json 
	 * por lo que hay que crear un objeto de la clase Services_JSON(). Éste recibirá los datos con el metodo decode.
	 */
	require_once("JSON.phps");
	$json = new Services_JSON();
	$usuarea=$json->decode($texto);
	/*
	*Insertamos el area a la base de datos. 
	*/
	$strQuery = "INSERT INTO area_proy_subproy VALUES('','$idsub','".$usuarea->idarea."','".$usuarea->idusu."','".$usuarea->fechaestini."','".$usuarea->fechaestfin."','','');";
	$query = mysql_query($strQuery, $db_resource);		
	$idasp=mysql_insert_id($db_resource);
	for($a=1;$a<6;$a++){
		$m=$a-1;
		/*
		 *Insertamos las fases de ese area a la base de datos. 
		 */
		$strQuery = "INSERT INTO fases VALUES('', '$idasp', '".$nombres[$m]."','','','','','0','0')";
		$query = mysql_query($strQuery, $db_resource);	
	}
?>
