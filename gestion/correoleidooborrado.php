<?PHP
/*
 *Actualiza un mensaje no leido a leido. 
 */
include_once("./seguridad.php");
$id = $_GET['mens'];
$miid = $_COOKIE['id'];
include_once( "../ini_base_datos.php" );
$miidbuzon=0;
$strQuery1 = "SELECT id FROM buzon_correos WHERE id_user='$miid';";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) 
{
$miidbuzon=$fila[0];
}
$strQuery2 = "UPDATE correos SET leido=1 WHERE id='$id' AND id_buzon_correo='$miidbuzon' AND leido='0';";
$query2 = mysql_query( $strQuery2, $db_resource );
mysql_free_result($query2);
mysql_close($db_resource);
?>
