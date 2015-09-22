<?PHP
/*
 *Este script mira si ambos usuarios el que recibe y el que envia ha borrado el correo.
 *El correo se eliminará solamente si los dos usuarios lo eliminan. 
 */
include_once("./seguridad.php");
$id = $_GET['id'];
include_once( "../ini_base_datos.php" );
$pantalla=$_GET['pant'];
if($pantalla=='rec')
$strQuery2 = "SELECT borrado_env from correos where id='$id'";
if($pantalla=='env')
$strQuery2 = "SELECT borrado_rec from correos where id='$id'";	
$query2 = mysql_query( $strQuery2, $db_resource ); 
$numero='';
while ($fila = mysql_fetch_array($query2)) {
$numero=$fila[0];
}
if($numero==0){
	/*
	 *Actualiza la tabla correo y añade 1 si ha borrado el mensaje 
	 */
	if($pantalla=='rec')
		$strQuery3 = "UPDATE correos SET borrado_rec='1' WHERE id='$id'";
	if($pantalla=='env')
		$strQuery3 = "UPDATE correos SET borrado_env='1' WHERE id='$id'";
}else{
	/*
	 *Elimina el correo siempre que lo eliminen los dos 
	 */
	$strQuery3 = "DELETE FROM correos WHERE id='$id'";
}
$query3 = mysql_query( $strQuery3, $db_resource ); 
?>
