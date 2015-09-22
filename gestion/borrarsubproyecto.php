<?PHP
/*
 *Elimina el subproyecto recibido por ajax. 
 */
include_once("./seguridad.php");
$id = $_GET['id'];
include_once( "../ini_base_datos.php" );
$strQuery3 = "DELETE FROM proy_subproy WHERE id='$id'";
$query3 = mysql_query( $strQuery3, $db_resource ); 
?>
