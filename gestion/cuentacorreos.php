<?PHP
/*
 *Calcula cuantos mensajes tenemos sin leer.
 *Este script se ejecuta periodicamente  
 */
if(isset($_COOKIE['id'])){
$miid = $_COOKIE['id'];
include_once( "../ini_base_datos.php" );
$mensnoleidos=0;
$miidbuzon=0;
$strQuery1 = "SELECT id FROM buzon_correos WHERE id_user='$miid';";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) 
{
$miidbuzon=$fila[0];
}
$strQuery2 = "SELECT count( * ) FROM correos WHERE id_buzon_correo ='$miidbuzon' AND leido='0'";
$query2 = mysql_query( $strQuery2, $db_resource ); 
$fila = mysql_fetch_array($query2);
$mensnoleidos=$fila[0];
echo $mensnoleidos;
}else{
echo "undefined";
}
?>
