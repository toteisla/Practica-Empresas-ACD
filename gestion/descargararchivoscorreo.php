<?PHP
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
$id=$_GET['id'];
$qry = "SELECT archivo,nombrearchivo,tipo from archivos_correos where id='$id';";
$res = mysql_query($qry);
$tipo = mysql_result($res, 0, "tipo");
$contenido = mysql_result($res, 0, "archivo");
$nombre= mysql_result($res, 0, "nombrearchivo");

header("Content-type: $tipo");
header("Content-Disposition: ; filename=\"$nombre\"");
print $contenido; 
?>
