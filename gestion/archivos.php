<?PHP
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
$id=$_GET['id'];
$qry = "SELECT archivo,nombre,tipo from archivos_fases where id='$id';";
$res = mysql_query($qry);
$tipo = mysql_result($res, 0, "tipo");
$contenido = mysql_result($res, 0, "archivo");
$nombre= mysql_result($res, 0, "nombre");

header("Content-type: $tipo");
header("Content-Disposition: ; filename=\"$nombre\"");
print $contenido; 
?>
