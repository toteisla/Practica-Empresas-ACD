<?PHP
/*
 *Inserta un nuevo subproyecto a la tabla subproyecto con el nombre que recibimos por ajax 
 */
include_once("./seguridad.php");
include_once("../ini_base_datos.php");
$nombre = $_GET['nombre'];	
$strQuery = "INSERT INTO subproyecto VALUES('', '$nombre')";
$query = mysql_query($strQuery, $db_resource);
?>
