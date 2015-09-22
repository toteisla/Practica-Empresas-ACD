<?PHP
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
$strQuery1 = "SELECT id,nombre_proyecto from proyectos;";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) {
echo "<option onclick='cargaProyectos(this.id)' value='$fila[0]'>$fila[1]</option>";
}
mysql_free_result($query1);
?>
