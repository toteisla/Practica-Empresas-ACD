<?PHP
include_once("./seguridad.php");
require("dbconnect.inc.php");

$archivo = $_FILES["archivito"]["tmp_name"];
$tamanio = $_FILES["archivito"]["size"];
$tipo    = $_FILES["archivito"]["type"];
$nombre  = $_FILES["archivito"]["name"];
$titulo  = $_POST["titulo"];

if ( $archivo != "none" )
{
$fp = fopen($archivo, "rb");
$contenido = fread($fp, $tamanio);
$contenido = addslashes($contenido);
fclose($fp);

$qry = "INSERT INTO archivos VALUES
(0,'$nombre','$titulo','$contenido','$tipo')";

mysql_query($qry);

if(mysql_affected_rows($conn) > 0)
print "Se ha guardado el archivo en la base de datos.";
else
print “NO se ha podido guardar el archivo en la base de datos.";
}
else
print "No se ha podido subir el archivo al servidor";
El archivo dbconnect.inc.php contiene únicamente las instrucciones para conectarse a MySQL y seleccionar la base de datos que se va a utilizar. El código de este programita se muestra a continuación.
/* dbconnect.inc.php */

$conn = mysql_connect(“localhost","bingo","holahola");
mysql_select_db("repositorio");
?>
