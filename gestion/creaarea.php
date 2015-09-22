<?PHP
/*
 *Inserta una nueva area a la tabla areas con el nombre recibido por ajax 
 */
include_once("./seguridad.php");
include_once("../ini_base_datos.php");
$nombre = $_GET['nombre'];	
$strQuery = "INSERT INTO areas VALUES('', '$nombre')";
$query = mysql_query($strQuery, $db_resource);
?>

