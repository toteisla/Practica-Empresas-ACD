<?PHP
/*
 *Recuperamos los datos de un proyecto, los subproyectos y las areas.
 *Creamos un JSON y lo retornamos 
 */
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
$datosp='';
$id=$_GET['id'];
$strQuery = "SELECT id,nombre_proyecto,id_admin,id_cliente,id_jefe,fecha_inicio_estimada,fecha_fin_estimada from proyectos where id='$id';";
$query = mysql_query( $strQuery, $db_resource ); 
while ($fila0 = mysql_fetch_array($query)) {
$datosp[0]=$fila0[0];
$datosp[1]=$fila0[1];
$datosp[2]=$fila0[2];
$datosp[3]=$fila0[3];
$datosp[4]=$fila0[4];
$datosp[5]=$fila0[5];
$datosp[6]=$fila0[6];
}
$JSON='{ 
	"id": "'.$datosp[0].'",
	"nombre": "'.$datosp[1].'",
	"cliente":"'.$datosp[3].'",
	"jefe":"'.$datosp[4].'",
	"fini":"'.$datosp[5].'",
	"ffin":"'.$datosp[6].'",
	"SubProyecto":[';
$strQuery1 = "SELECT id,id_subproyecto,id_jefe,fecha_inicio_estimada,fecha_fin_estimada from proy_subproy where id_proyecto='$id';";
$query1 = mysql_query( $strQuery1, $db_resource ); 
$max_sub=mysql_num_rows($query1);
$y=0;
while ($fila = mysql_fetch_array($query1)) {
	$y+=1;
	$h=0;
	$JSON.='{"id": "'.$fila[0].'","fechafinA": "'.$fila[4].'","fechainiA": "'.$fila[3].'","idsub": "'.$fila[1].'","idj": "'.$fila[2].'",	"Areas":[';
	$strQuery2 = "SELECT id,id_area,id_usuario,fecha_inicio_estimada,fecha_fin_estimada from area_proy_subproy where id_proy_subproy='$fila[0]';";
	$query2 = mysql_query( $strQuery2, $db_resource ); 
	$max_filas=mysql_num_rows($query2);
		while ($fila1 = mysql_fetch_array($query2)) {
				$h+=1;
				$JSON.='{ 	"fechaestini": "'.$fila1[3].'" , 
							"fechaestfin": "'.$fila1[4].'" ,
							"idarea": "' . $fila1[1] .'" ,';
				if($h<$max_filas){
				$JSON.='"idusu": "' . $fila1[2] . '"},';
				}else{
				$JSON.='"idusu": "' . $fila1[2] . '"}]';	
				}
		}
	if($y<$max_sub){
		$JSON.='},';	
	}else{
		$JSON.='}]}';	
	}
}
echo $JSON;
?>
