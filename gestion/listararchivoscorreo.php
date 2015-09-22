<?PHP
include_once("./seguridad.php");
require("dbconnect.inc.php");

$qry = "SELECT id, nombre, titulo, tipo FROM archivos";
$res = mysql_query($qry);

while($fila = mysql_fetch_array($res))
{
print "$fila[titulo]
<br>
$fila[nombre] ($fila[tipo])
<br>
<a href='descargar_archivo.php?id=$fila[id]'>Descargar</a>
<br>
<br>";
}
?>
