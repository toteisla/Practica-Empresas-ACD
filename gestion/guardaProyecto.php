<?php
/*
 *Guarda el proyecto en la base de datos junto con los subproyectos, areas y fases  
 * Todos los datos los recibimos en un JSON
 */
	include_once("./seguridad.php");
	$nombre = $_GET['nombre'];
	//$admin=$_SESSION['admin'];
	$cliente = $_GET['cliente'];
	$jefe = $_GET['jefe'];
	$fechainiM = $_GET['fechainiM'];
	$fechafinM=	$_GET['fechafinM'];
	$texto=$_GET['texto'];
	$miid = $_COOKIE['id'];
	include_once("../ini_base_datos.php");
	require_once("JSON.phps");
	$json = new Services_JSON();
	$nombres[0]="Requisitos";
	$nombres[1]="Analisis";
	$nombres[2]="Desarrollo";
	$nombres[3]="Implantacion";
	$nombres[4]="Seguimiento";
	$idproy=-1;
	$idsubproy='';
	$fecha1M=explode("/",$fechainiM);
	$fechaestiniM=$fecha1M[2]."-".$fecha1M[1]."-".$fecha1M[0];
	$fecha2M=explode("/",$fechafinM);
	$fechaestfinM=$fecha2M[2]."-".$fecha2M[1]."-".$fecha2M[0];
	$strQuery = "INSERT INTO proyectos VALUES('', '$nombre', '$miid', '$cliente','$jefe', '$fechaestiniM', '$fechaestfinM','','')";
	$query = mysql_query($strQuery, $db_resource);
	$idproy=mysql_insert_id($db_resource);
	if($idproy>0){
		$usuarea=$json->decode($texto);
		for($i=0;$i<count($usuarea->SubProyecto);$i++)
			{
				$idsub=$usuarea->SubProyecto[$i]->idsub;
				$idjefe=$usuarea->SubProyecto[$i]->idj;
				$fechainiA=$usuarea->SubProyecto[$i]->fechainiA;
				$fechafinA=$usuarea->SubProyecto[$i]->fechafinA;
				$explofechax=explode("/",$fechainiA);
				$fechax=$explofechax[2]."-".$explofechax[1]."-".$explofechax[0];
				$explofechay=explode("/",$fechafinA);
				$fechay=$explofechay[2]."-".$explofechay[1]."-".$explofechay[0];
				$strQuery = "INSERT INTO proy_subproy VALUES('', '$idproy', '$idsub','$idjefe','$fechax','$fechay','','')";
				$query = mysql_query($strQuery, $db_resource);	
				$idsubproy[$i]=mysql_insert_id($db_resource);
				for($j=0;$j<count($usuarea->SubProyecto[$i]->Areas);$j++)
				{
				$area=$usuarea->SubProyecto[$i]->Areas[$j]->idarea;
				$usuario=$usuarea->SubProyecto[$i]->Areas[$j]->idusu;
				$fechaareai=$usuarea->SubProyecto[$i]->Areas[$j]->fechaestini;
				$fechaareaf=$usuarea->SubProyecto[$i]->Areas[$j]->fechaestfin;
				$strQuery = "INSERT INTO area_proy_subproy VALUES('', '$idsubproy[$i]', '$area','$usuario','$fechaareai','$fechaareaf','','')";
				$query = mysql_query($strQuery, $db_resource);	
				$idareasubproy[$j]=mysql_insert_id($db_resource);
					for($a=1;$a<6;$a++){
					$m=$a-1;
					$strQuery = "INSERT INTO fases VALUES('', '$idareasubproy[$j]', '".$nombres[$m]."','','','','','0','0')";
					$query = mysql_query($strQuery, $db_resource);	
					}
				}
			}
	}
	
?>
