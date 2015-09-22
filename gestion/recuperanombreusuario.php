<?PHP
/*
 *Recuperamos el nombre del usuario con el id recibido por ajax 
 */
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
$datosp='';
$id=$_GET['id'];
$usuario='';
$strQuery = "SELECT nombre from usuarios where id='$id';";
$query = mysql_query( $strQuery, $db_resource ); 
while ($fila0 = mysql_fetch_array($query)) {
$usuario=$fila0[0];
}
echo $usuario;
?>
